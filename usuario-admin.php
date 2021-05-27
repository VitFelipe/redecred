
<?php

use \Dao\PerfilDao;
use \Dao\UsuarioDao;
use \Dao\ConvenioDao;
use \Dao\ItemTipoContratoDao;
use \Dao\ItemPrazoConvenioDao;
use \Dao\ComissaoPrazoParceiroDao;
use \Dao\SolicitacaoDao;


use \Model\Usuario;
use \Page\PageAdmin;


//------------------------------
//------Usuario

$app->get("/admin/usuario",function(){

	Usuario::verificaSession();
	$pageAdmin  =  new PageAdmin();
	$usuarioDao =  new UsuarioDao();

	$usuarios = $usuarioDao->findAll();
    $pageAdmin->setTpl("listUsuario",array("usuarios"=>$usuarios,"msg"=>null,"tipo"=>null));
});




$app->get("/admin/usuario/add",function(){

	Usuario::verificaSession();
	$pageAdmin  =  new PageAdmin();
	$perfilDao  =  new PerfilDao();

	$perfis = $perfilDao->findAll();
      
    $pageAdmin->setTpl("addUsuario",array("perfis"=>$perfis,"msg"=>null));
});


$app->post("/admin/usuario/create",function(){
	Usuario::verificaSession();
	$usuarioDao =  new UsuarioDao();

	
	try{
	  
	$nome  = $_POST['nome'];
	$email  = $_POST['email'];
	$cpf  = $_POST['cpf'];
	$telefone  = $_POST['telefone'];
	$login  = $_POST['login'];
	$perfilId = $_POST['perfil_id'];
	$cidade = $_POST['cidade']; 
	$endereco = $_POST['endereco'];
	$bairro = $_POST['bairro'];
	$banco = $_POST['banco'];
	$agencia = $_POST['agencia'];
	$conta = $_POST['conta'];
	$cep  = $_POST['cep'];
	$comissao  = "";
    $senha  ;
	$pessoaId  ;

	if(isset($_POST['senha'])){
		$senha  =   md5($_POST['senha']);
	}
	
    if(isset($_POST['pessoa_id'])){
		$pessoaId =    $_POST['pessoa_id'] ;
	}
	

    
	$dataTime  = new \DateTime();
	$dataCriacao =  $dataTime->format('Y-m-d H:i:s');

	if(empty($cpf)){
		$page  =  new PageAdmin();
		if(isset($_POST['pessoa_id'])){

			$page->setTpl("editUsuario",array("msg"=>"O campo de cpf não pode ficar vazio !!"));

		}else{
  
			$page->setTpl("addUsuario",array("msg"=>"O campo de cpf não pode ficar vazio !!"));

		}
		
		exit;
	}

	if($usuarioDao->findPessoaCpf($cpf)){
		$page  =  new PageAdmin();
		$perfilDao  =  new PerfilDao();
	    $perfis = $perfilDao->findAll();
		
		if(!isset($_POST['pessoa_id'])){
  
			$page->setTpl("addUsuario",array("perfis" =>$perfis,"msg"=>"Já possui um usuario com o cpf informado !!"));
			   
			exit;
		}
		
		
		
	}



	
	 if(isset($_POST['pessoa_id'])){

		$usuarioDao->alterar($nome,$email,$telefone,$cpf,$login,$perfilId,$pessoaId,$cidade ,
		$endereco ,
		$bairro ,
		$banco ,
		$agencia ,
		$conta ,
		$cep,$comissao);
	 }else{
	  
			//Savar Usuario e Comissao


	 $pessoaIdNew = $usuarioDao->salvar($nome,$email,$telefone,$cpf,$login,$senha,$perfilId,$dataCriacao, $cidade, $endereco,
		$bairro, $banco, 
		$agencia, $conta, 
		$cep,$comissao);



		$itemPrazoConvenioDao = new ItemPrazoConvenioDao();
		$comissaoPrazoParceiroDao = new ComissaoPrazoParceiroDao(); 
	
		$itensPrazosResult  = $itemPrazoConvenioDao->findAll();
		
		foreach($itensPrazosResult as $itemComissao){
		
		  $comissaoPrazoParceiroDao->salvar($pessoaIdNew ,$itemComissao['modelo_prazo']  ,$itemComissao['item_tipo_contrato_id'],0,$itemComissao['item_prazo_convenio_id']);
		
		}

		//Codigo Insert Comissao Parceiro Falta Criar Procedure Ediçao
	 }
	
	header("Location:/admin/usuario");
	exit;

	}catch(Exception $e){

		$pageAdmin =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));


	}

  });


$app->post("/admin/usuario/login",function(){

	$usuarioDao =  new UsuarioDao(); 
	
	$login  = $_POST['login']; 
	 
	
	 echo $usuarioDao->loginExist($login);
    
});


//Alterar Senha do Usuario
$app->post("/admin/usuario/alterar",function(){

	try{
    	$usuarioDao =  new UsuarioDao(); 
		
		$usuarioId  = $_POST['usuario_id']; 
		$senha  = $_POST['senha']; 
		$confSenha  = $_POST['confi-senha']; 

	    if($senha == $confSenha){
			$usuarioDao->alterarSenha(md5($senha),$usuarioId);
			$pageAdmin =  new PageAdmin();
			$pageAdmin->setTpl("sucesso",array("msg"=>"Senha Redefinida com Sucesso !"));
		}else{
			throw new Exception("Sua Confirmação de Senha está diferente da Senha !!", 1);		
		}
	
	   


	}catch(Exception $e){
		$pageAdmin =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));


	}  
	
	
});




$app->get("/admin/usuario/:id/delete",function($id){

	

	$pageAdmin =  new PageAdmin();

	try{
	$solicitacaoDao  = new SolicitacaoDao();
	$usuarioDao =  new UsuarioDao(); 
    $result  = $solicitacaoDao->findAllToUser($id);
	 
	//Validação para excluir o usuario só se ele não possuir Solicitaçõa de Contrato
   
	if($result != null){
	 
		throw new \Exception("Você não pode excluir um usuario que possuir solicitação de contrato !! Para excluir entre em contato com o programador !!");

	}


	$comissaoPrazoParceiroDao = 	new ComissaoPrazoParceiroDao();

	$comissaoPrazoParceiroDao->deletePorPessoa($id);
	$usuarioDao->excluirUsuarioPorPessoa($id);
	$usuarios = $usuarioDao->findAll();

	$pageAdmin->setTpl("listUsuario",array("usuarios"=>$usuarios,"msg"=>"Usuario excluido com sucesso !!","tipo"=>1));
	exit;

	}catch(Exception $e){
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));


	}  
});

$app->get("/admin/usuario/:id",function($id){
	$usuarioDao =  new UsuarioDao(); 
	$perfilDao  =  new PerfilDao();
	$pageAdmin  =  new PageAdmin();

	
	$usuario  = $usuarioDao->findPessoaId($id);
	$perfis = $perfilDao->findAll();

    
	 
	$pageAdmin->setTpl("editUsuario",array("perfis"=>$perfis,"msg"=>null,"usuario"=>$usuario[0]));
    

});


$app->get("/admin/usuario/:id/convenios",function($id){
try{
	$usuarioDao =  new UsuarioDao(); 
	$perfilDao  =  new PerfilDao();
	$pageAdmin  =  new PageAdmin();
	$convenioDao =  new ConvenioDao();
	
	$usuario  = $usuarioDao->findPessoaId($id);
	$perfis = $perfilDao->findAll();
    $convenios = $convenioDao->findAll();
    
	 
	$pageAdmin->setTpl("listaConvenioParceiro",array("convenios"=>$convenios,"usuario"=>$usuario[0]));
    
}catch(Exception $e){

	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));

}

});







//Busca os Tipos Contratos por Convenio Contrato
$app->get("/admin/usuario/:userId/convenio/:convenioId",function($pessoaId , $convenioid){
	$pageAdmin  =  new PageAdmin();
try{

$itenTipoContratoDao = 	new ItemTipoContratoDao();
$usuarioDao =  new UsuarioDao(); 



$itensTipoConvenio = $itenTipoContratoDao->findAllToConvenio($convenioid);
$usuario  = $usuarioDao->findPessoaId($pessoaId);
$banco = null;
$convenio = null;

try{
	$banco  =   $itensTipoConvenio [0]['banco'];
	}catch(Exception $e){
	$banco = "";
}

try{
$convenio  = $itensTipoConvenio [0]['convenio'];
}catch(Exception $e){
$convenio = "";
}


$pageAdmin->setTpl("listaItemTipoContratoParceiro",array("banco"=>$banco,
"convenio"=>$convenio,"itens"=>$itensTipoConvenio,"usuario"=>$usuario[0]));


}catch(Exception $e){
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
});







//Busca as Comissao do Parceiro Por Pessoa e Item Tipo Contrato
$app->get("/admin/usuario/:pessoaId/convenio/itemprazo/:itemTipoId",function($pessoaId,$itemTipoId){
    pagePrazoPraceiro($itemTipoId,$pessoaId,null);
 });


 //Metodo que atera Dados de Comissao
 $app->post("/admin/usuario/convenio/itemprazo",function(){
	 try{
    
	$itemTipoContratoId = $_POST['item_tipo_contrato_id'];
	$pessoaId = $_POST['pessoa_id'];
	$prazos = $_POST['prazo'];


	$comissaoPrazoParceiroDao = 	new ComissaoPrazoParceiroDao();


  

	$comissaoPrazoParceiroDao->alterarPrazos($prazos);

	pagePrazoPraceiro($itemTipoContratoId,$pessoaId,"Comissões salvas com Sucesso !!");
	exit;

	 
	}catch(Exception $e){
		$pageAdmin  =  new PageAdmin();
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
	} 
	 
	});



//Atualiza as Comissao do Parceiro 
$app->get("/admin/usuario/:pessoaId/atualizarPrazo",function($pessoaId){
$pageAdmin  =  new PageAdmin();
$usuario = null;

try{

	Usuario::verificaSession();
	$usuarioDao =  new UsuarioDao();
	$comissaoPrazoParceiroDao = 	new ComissaoPrazoParceiroDao();
	$itemPrazoConvenioDao  =  new ItemPrazoConvenioDao();

	$ids  =   $comissaoPrazoParceiroDao->findAllToPrazoConvenioPorPessoa($pessoaId);

	
	if(empty($ids)){
    $ids = 0;
	}
   
	$usuarios = $usuarioDao->findAll();

	$prazos  =  $itemPrazoConvenioDao->findPrazosNaoAtualizados($ids);
	
	
		
	$comissaoPrazoParceiroDao->salvarPorPrazoConvenio($pessoaId,$prazos);

	

	$pageAdmin->setTpl("listUsuario",array("usuarios"=>$usuarios,"msg"=>"Atualizações efetuadas com sucesso !!","tipo"=>1));
 
 }catch(Exception $e){
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));


  }


 });






	//Functions --------Utils 
 function pagePrazoPraceiro($itemTipoId,$pessoaId,$msg){

	$pageAdmin  =  new PageAdmin();
try{
$comissaoPrazoParceiroDao = 	new ComissaoPrazoParceiroDao();
$itensPrazoConvenioParceiro = $comissaoPrazoParceiroDao->findAllToPessoaItemTipo($pessoaId,$itemTipoId);
//echo "Tipo : ".$itensPrazoConvenioParceiro[0]['item_tipo_contrato_id'];
//echo json_encode($itensPrazoConvenioParceiro);
//exit;

$banco  =   $itensPrazoConvenioParceiro [0]['banco'];
$convenio  = $itensPrazoConvenioParceiro [0]['convenio'];
$tipoContrato  = $itensPrazoConvenioParceiro [0]['tipo_contrato'];

$pageAdmin->setTpl("listaComissaoParceiro",array("banco"=>$banco,"convenio"=>$convenio,"tipoContrato"=>$tipoContrato,"itens"=>$itensPrazoConvenioParceiro,"msg"=>$msg));

exit;
}catch(Exception $e){
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
}


//------------------------------
//------Fim Usuario
