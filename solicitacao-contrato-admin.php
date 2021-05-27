<?php
use \Model\Usuario;
use \Dao\BancoDao;
use \Dao\SolicitacaoDao;
use \Dao\ArquivoSolicitacaoDao;
use \Dao\ConvenioSolicitacaoDao;
use \Dao\ClienteDao;
use \Dao\UsuarioDao;
use \Dao\TipoContratoDao;
use \Dao\HistoricoSolicitacaoDao;
use \Dao\ItemPrazoConvenioDao;
use \Dao\TabelaConvenioDao;
use \Dao\ItemTipoContratoDao;
use \Dao\ConvenioDao;
use \Dao\StatusDao;

use \Page\PageAdmin;



//Notificação
$app->get("/admin/solicitacao/notificacao",function(){
	
		
	$solicitacaoDao =  new SolicitacaoDao();

	$solcitacao = $solicitacaoDao->findSolicitacoesNovas();

	echo json_encode($solcitacao);



});




$app->get("/admin/solicitacao/enviar",function(){
	try{
	Usuario::verificaSession();
	$pageAdmin  =  new PageAdmin();
	$convenioSolicitacaoDao = new ConvenioSolicitacaoDao();
	$bancoDao =  new BancoDao();
    $tipoContratoDao = new TipoContratoDao();


	$tiposContratos =  $tipoContratoDao->findAll();
	$convenioS =  $convenioSolicitacaoDao->findAll();
	$bancos  = $bancoDao->findAll();


    $pageAdmin->setTpl("addSolicitacaoEmprestimo",array("convenioSolicitacoes"=>$convenioS,"bancos"=>$bancos,"tiposContratos"=>$tiposContratos));
	}catch(Exception $e){
	 	
	}
	 
});


$app->post("/admin/solicitacao/enviar",function(){
try{

	$clienteDao =  new ClienteDao();
	$solicitacaoDao =  new SolicitacaoDao();

	

	//informaçõés Convenio

	$convenio_solicitacao_id  = $_POST['convenio_solicitacao_id'];


	//Informações Clinte

	$nome  = $_POST['nome'];
	$email  = $_POST['email'];
	$cpf  = $_POST['cpf'];
	$telefone  = $_POST['telefone'];
	$nascimento  = $_POST['nascimento'];
	$rg  = $_POST['rg'];
	$estado_civil  = $_POST['estado_civil'];
	$cep  = $_POST['cep'];
	$cidade  = $_POST['municipio'];
	$nomeMae  = $_POST['nome_mae'];
	$naturalidade  = $_POST['naturalidade'];
	$dataEmissao  = $_POST['data_emissao'];
	$bairro  = $_POST['bairro'];
	$endereco  = $_POST['endereco'];
	$orgaoEmissao  = $_POST['orgao']; 
	$estado  = $_POST['estado']; 

	$clienteId;
	//Salvando Cliente
	$result = $clienteDao->findCpfClientId($cpf);
 
if($result == null){
	$clienteId  = $clienteDao->salvar($nome,$nomeMae,$email,$cpf,$rg,$nascimento,
	$dataEmissao,$orgaoEmissao,$naturalidade,$estado_civil,$telefone,$endereco,$cep,$estado,$cidade,$bairro);
	//bancario

}else{
	$clienteId = $result[0]['cliente_id'];
}

//=========================================================//
//Solicitação===============================================//
//=========================================================//

    $dataTime  = new \DateTime();
	$data_solicitacao =  $dataTime->format('Y-m-d H:i:s');

    $numero_beneficio  = $_POST['numero_beneficio'];
	$uf_beneficio  = $_POST['uf_beneficio'];
	
	$renda  = $_POST['renda'] == "" ?  "" : str_replace( ".", "",$_POST['renda']);
	$senha_beneficio  = $_POST['senha_beneficio'];
	$especie  = $_POST['especie'];
	$numero_matricula  = $_POST['numero_matricula'];
	$tipo_conta  = $_POST['tipo_conta'];
	$senha  = $_POST['senha_matri'];
	$banco  = $_POST['banco'];
	$agencia  = $_POST['agencia'];
	$conta  = $_POST['conta'];
	$prazo_id  = $_POST['prazo_id'];
	$fator  = $_POST['fator'];
	$tabela_convenio_id  = $_POST['tabela_convenio_id'];
	$valor_emprestimo  = str_replace( ".", "",$_POST['valor_emprestimo']);
	$valor_parcela  = str_replace( ".", "",$_POST['valor_parcela']);
	

	$usuario  = Usuario::getSession();
	
    $pessoaId =  $usuario['pessoa_id'];
	
	
	if($usuario["perfil_id"] == 1){
		$view_adm = 'S';
	}else{
        $view_adm = 'N';
	}


$solicitacaoId =  $solicitacaoDao->salvar(
	$data_solicitacao,
	$prazo_id,
	$fator,
	$valor_emprestimo,
	$valor_parcela,
	$clienteId,
	$convenio_solicitacao_id,
	4,
	$tabela_convenio_id,
	$pessoaId,
	$numero_beneficio,
	$especie,
	$uf_beneficio,
	$senha_beneficio,
	$renda,
	$numero_matricula,
	$senha,
	$tipo_conta, 
	$banco ,
	$agencia ,
	$conta,
	$view_adm);

//Historico Solicitação	
$historicoSolicitacaoDao =  new HistoricoSolicitacaoDao();
$itemprazoDao = new ItemPrazoConvenioDao();

$prazoRe = $itemprazoDao->findPrazo($prazo_id);

$historicoSolicitacaoDao->salvar($prazoRe['comissao'],$prazoRe['descricao'],$solicitacaoId,$data_solicitacao);


  

  
//Arquivos 


$arquivoCpf =  $_FILES["documento_cpf"];
$arquivoComprovante =  $_FILES["documento_residencia"];
$arquivoContraCheque =  $_FILES["documento_contracheque"];
$arquivoOutros =  $_FILES["documento_outros"];

$diretorio = "documento".DIRECTORY_SEPARATOR."".$solicitacaoId."".DIRECTORY_SEPARATOR;

//upload CPF

salvaDocumento($diretorio,"CPF/RG",$arquivoCpf,$solicitacaoId);

//upload RG


//upload Comprovante

salvaDocumento($diretorio,"Comprovante de Residencia",$arquivoComprovante,$solicitacaoId);

//upload ContraCheque

salvaDocumento($diretorio,"Contra Cheque",$arquivoContraCheque,$solicitacaoId);

//upload Outros

salvaDocumento($diretorio,"Outros",$arquivoOutros,$solicitacaoId);


header("Location:/admin/solicitacao/acompanhamento");
	exit;
}catch(Exception $e){
		$pageAdmin  =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
         
	}

	//var_dump($_POST);


	//var_dump($_FILES);


  



});


$app->post("/admin/solicitacao/alterar",function(){

try{


	$clienteDao =  new ClienteDao();
	$solicitacaoDao =  new SolicitacaoDao();

	
	$usuario  = Usuario::getSession();
	
    $pessoaId =  $usuario['pessoa_id'];

	//informaçõés Convenio

	$convenio_solicitacao_id  = $_POST['convenio_solicitacao_id'];


	//Informações Clinte

	$nome  = $_POST['nome'];
	$email  = $_POST['email'];
	$cpf  = $_POST['cpf'];
	$telefone  = $_POST['telefone'];
	$nascimento  = $_POST['nascimento'];
	$rg  = $_POST['rg'];
	$estado_civil  = $_POST['estado_civil'];
	$cep  = $_POST['cep'];
	$cidade  = $_POST['municipio'];
	$nomeMae  = $_POST['nome_mae'];
	$naturalidade  = $_POST['naturalidade'];
	$dataEmissao  = $_POST['data_emissao'];
	$bairro  = $_POST['bairro'];
	$endereco  = $_POST['endereco'];
	$orgaoEmissao  = $_POST['orgao']; 
	$estado  = $_POST['estado']; 
	$clienteId = $_POST['cliente_id'];
	$solicitacaoId = $_POST['solicitacao_id'];
	

	$clienteDao-> alterar($nome,$nomeMae,$email,$cpf,$rg,$nascimento,
	$dataEmissao,$orgaoEmissao,$naturalidade,$estado_civil,
	$telefone,$endereco,$cep,$estado,$cidade,$bairro,$clienteId,$pessoaId);
	//bancario



//=========================================================//
//Solicitação===============================================//
//=========================================================//

   

    $numero_beneficio  = $_POST['numero_beneficio'];
	$uf_beneficio  = $_POST['uf_beneficio'];
	$renda  = $_POST['renda'] == "" ?  "" : str_replace( ".", "",$_POST['renda']);
	$senha_beneficio  = $_POST['senha_beneficio'];
	$especie  = $_POST['especie'];
	$numero_matricula  = $_POST['numero_matricula'];
	$tipo_conta  = $_POST['tipo_conta'];
	$senha  = $_POST['senha_matri'];
	$banco  = $_POST['banco'];
	$agencia  = $_POST['agencia'];
	$conta  = $_POST['conta'];
	$prazo_id  = $_POST['prazo_id'];
	$fator  = $_POST['fator'];
	$tabela_convenio_id  = $_POST['tabela_convenio_id'];
	$valor_emprestimo  = str_replace( ".", "",$_POST['valor_emprestimo']);
	$valor_parcela  = str_replace( ".", "",$_POST['valor_parcela']);
	

	
	$view_adm;
	
	if($usuario["perfil_id"] == 1){
		$view_adm = 'S';
	}else{
        $view_adm = 'N';
	}


   $solicitacaoDao->alterar(
	$prazo_id,
	$fator,
	$valor_emprestimo,
	$valor_parcela,
	$clienteId,
	$convenio_solicitacao_id,
	$tabela_convenio_id,
	$pessoaId,
	$numero_beneficio,
	$especie,
	$uf_beneficio,
	$senha_beneficio,
	$renda,
	$numero_matricula,
	$senha,
	$tipo_conta, 
	$banco ,
	$agencia ,
	$conta,
	$view_adm ,
	$solicitacaoId);

	header("Location:/admin/solicitacao/acompanhamento");
	exit;

//Historico Solicitação	
//$historicoSolicitacaoDao =  new HistoricoSolicitacaoDao();
//$itemprazoDao = new ItemPrazoConvenioDao();

//$prazoRe = $itemprazoDao->findPrazo($prazo_id);

//$historicoSolicitacaoDao->salvar($prazoRe['comissao'],$prazoRe['descricao'],$solicitacaoId,$data_solicitacao);


}catch(Exceptio $e){
	$pageAdmin->setTpl("erro",array("msg"=>$e->getMessage()));
}
});







$app->get("/admin/solicitacao/acompanhamento",function(){
	try{
	Usuario::verificaSession();
	$pageAdmin  =  new PageAdmin();
	
	$solicitacoes;
	$status = null;

	$solicitacaoDao =  new SolicitacaoDao();
	$statusDao =  new StatusDao();
	$usuario  = Usuario::getSession();
	
   
	if($usuario["perfil_id"] == 1){
		$solicitacoes = $solicitacaoDao->findAll();
        $status =  $statusDao->findAll();
	}else{
		$solicitacoes = $solicitacaoDao->findAllToUser($usuario["pessoa_id"]);
	}


    $pageAdmin->setTpl("acompanhamentoSolicitacao",array("solicitacoes"=>$solicitacoes,"status"=>$status));
	}catch(Exception $e){
	 
		$pageAdmin->setTpl("erro",array("msg"=>$e->getMessage()));


		
	}
	 
});









$app->post("/admin/solicitacao/acompanhamento/status",function(){
	Usuario::verificaSession();
	try{
	$solicitacaoDao =  new SolicitacaoDao();



	$solicitacaoId =$_POST['solicitacao_id'];
	$statusId = $_POST['statu_id'];
	$solicitacaoDao->alterarStatus($solicitacaoId,$statusId);
	header("Location:/admin/solicitacao/acompanhamento");
	exit;

}catch(Exception $e){
	$pageAdmin  =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
		
}

});




$app->get("/admin/solicitacao/:solicitacaoId",function($solicitacaoId){
	try{
	Usuario::verificaSession();
	$pageAdmin  =  new PageAdmin();
	$solicitacaoDao =  new SolicitacaoDao();
	$convenioSolicitacaoDao = new ConvenioSolicitacaoDao();
	$bancoDao =  new BancoDao();
	$convenioDao = new ConvenioDao();
	$itemPrazoConvenioDao =  new ItemPrazoConvenioDao();
	$itemTipoContratoDao =  new ItemTipoContratoDao();
	$clienteDao =  new ClienteDao();
	$tabelaConvenioDao = new TabelaConvenioDao();



	$solicitacao = $solicitacaoDao->findPrimary($solicitacaoId);
  


    $tabelasConvenio = $tabelaConvenioDao->findToConvenio($solicitacao['convenio_contrato_id']);
	$convenioSolicitacao =  $convenioSolicitacaoDao->findAll();
	$convenios  =  $convenioDao->findbyConvenioToBancoId($solicitacao['banco_id']);
	$bancos  = $bancoDao->findAll(); 
	$cliente = $clienteDao->findPrimaryKey($solicitacao['cliente_id']);
	$itemTipocontratos =  $itemTipoContratoDao->findAllToConvenio($solicitacao['convenio_contrato_id']);

    $prazos = $itemPrazoConvenioDao->findToItemTipoContrato($solicitacao['item_tipo_contrato_id']);


	$pageAdmin->setTpl("editarSolicitacaoEmprestimo",array("solicitacao"=>$solicitacao,"bancos"=>$bancos,"convenios"=>$convenios,
	"convenioSolicitacoes"=>$convenioSolicitacao,"prazos"=> $prazos,"itemTiposContrato"=>$itemTipocontratos,"tabelasConvenio"=> $tabelasConvenio));
	}catch(Exception $e){
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
	}
	
});





$app->get("/admin/solicitacao/anexo/:solicitacaoId",function($solicitacaoId){
	
	$arquivoSolicitacaoDao =  new ArquivoSolicitacaoDao();

	echo json_encode($arquivoSolicitacaoDao->findToSolicitacao($solicitacaoId));
	
});






$app->get("/admin/solicitacao/:solicitacaoId/delete",function($solicitacaoId){
	try{
		Usuario::verificaSession();
	$solicitacaoDao =  new SolicitacaoDao();

	$solicitacaoDao->excluir($solicitacaoId);

	header("Location:/admin/solicitacao/acompanhamento");
	exit;
	}catch(Exception $e){
		$pageAdmin  =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));

	}
	
});



//View
$app->get("/admin/solicitacao/:solicitacaoId/view",function($solicitacaoId){
	
	pageViewSolicitacao($solicitacaoId);
	
});


//View Delete Anexo
$app->get("/admin/solicitacao/:solicitacaoId/anexo/delete/:anexoId",function($solicitacaoId,$anexoId){
	Usuario::verificaSession();

	try{
	$arquivoSolicitacaoDao =  new ArquivoSolicitacaoDao();
	$arquivoSolicitacaoDao->excluirAnexo($anexoId);
	pageViewSolicitacao($solicitacaoId);
	}catch(Exception $e){
		$pageAdmin  =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
	}

});




//View Adicionar  Anexo
$app->post("/admin/solicitacao/anexo/add",function(){
	Usuario::verificaSession();
	try{

		$solicitacaoId = $_POST['solicitacao_id'];
		$tipo = $_POST['tipo'];
		$arquivos = $_FILES['anexos']; 

		$diretorio = "documento".DIRECTORY_SEPARATOR."".$solicitacaoId."".DIRECTORY_SEPARATOR;

//upload CPF

salvaDocumento($diretorio,$tipo,$arquivos,$solicitacaoId);



	pageViewSolicitacao($solicitacaoId);
}catch(Exception $e){
		$pageAdmin  =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
	}

});


//Adicionar Complemento 



$app->post("/admin/solicitacao/complemento/add",function(){
	Usuario::verificaSession();
	try{
		$solicitacaoDao =  new SolicitacaoDao();

		$solicitacaoId = $_POST['solicitacao_id'];
		$valorEmprestimo = str_replace(".","",$_POST['valor_emprestimo']);
		$valorParcela =  str_replace(".","",$_POST['valor_parcela']); 
		$numeroContrato = $_POST['numero_contrato']; 


	


		$solicitacaoDao->addDadosComplementares($solicitacaoId , $valorEmprestimo,$valorParcela,$numeroContrato);

		pageViewSolicitacao($solicitacaoId);

	}catch(Exception $e){

		$pageAdmin  =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
	}

});

//------------------------------
//------Functions Utils 

function salvaDocumento($diretorio,$tipo,$upload,$solicitacaoId){
	Usuario::verificaSession();
	$arquivoSolicitacaoDao =  new ArquivoSolicitacaoDao();
	
	if(!is_dir($diretorio)){
		mkdir($diretorio, 0777, true);
	}

	$dataTime  = new \DateTime();
	$dataCriacao =  $dataTime->format('Y-m-d H:i:s');


	$tm =  count($upload["name"]);
	
	//var_dump($upload);

	//echo "</br></br></br></br></br></br></br></br>";
	for($i = 0 ;  $i < $tm ; $i ++) {
		$path = $upload["name"] [$i];
		$ext = pathinfo($path, PATHINFO_EXTENSION);
		$nome = uniqid("")."-".$i.".".$ext;
		$arquivo =  $diretorio."".$nome;
        
		//echo $arquivo."</br>";
		if(move_uploaded_file($upload["tmp_name"] [$i],$arquivo)){

			$arquivoSolicitacaoDao->salvar($tipo,
			$arquivo,
			$dataCriacao,
			$solicitacaoId,
		    $nome);
		}
	
	
	}
	
	}





  ////Function Page View

  function pageViewSolicitacao($solicitacaoId){
	try{
		$pageAdmin  =  new PageAdmin();
		Usuario::verificaSession();
		$solicitacaoDao =  new SolicitacaoDao();

		$solicitacaoDao->findAlterarView($solicitacaoId);

		$solcitacao = $solicitacaoDao->findPrimary($solicitacaoId);

		$arquivoSolicitacaoDao =  new ArquivoSolicitacaoDao();

	    $anexos =  $arquivoSolicitacaoDao->findToSolicitacao($solicitacaoId);

		$pageAdmin->setTpl("solicitacaoView",array("solcitacao"=>$solcitacao,"anexos"=>$anexos));
	
	}catch(Exception $e){
		
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));

	}
  }




?>

