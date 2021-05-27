<?php



use \Model\Usuario;
use \Page\PageAdmin;
use \Page\PageUtil;
use \Page\Relatorio;
use \Dao\UsuarioDao;
use \Dao\StatusDao;
use \Dao\BancoDao;
use \Dao\SolicitacaoDao;
use \Dao\ArquivoSolicitacaoDao;
use Dompdf\Dompdf;

//------Inicio Tipo Contrato


$app->get("/admin/relatorio/solicitacao",function(){

    Usuario::verificaSession();
    $pageAdmin  =  new PageAdmin();
    try{
  
        $usuarioDao =  new UsuarioDao();
        $bancoDao =  new BancoDao();
        $statusDao =  new StatusDao();

    
     $pessoas  =    $usuarioDao->findAllPessoa();
     $bancos  = $bancoDao->findAll();
     $status =  $statusDao->findAll();
    $pageAdmin->setTpl("consultaSolicitacao",array("pessoas"=>$pessoas,"bancos"=>$bancos,"status"=>$status));

    }catch(Exception $e){

        $pageAdmin->setTpl("erro",array("err"=>$e->getMessage()));
        
    }
	 
});




$app->post("/admin/relatorio/solicitacao/gerar",function(){
    Usuario::verificaSession();
    $solicitacaoDao  =  new SolicitacaoDao();

    $usuario  = Usuario::getSession();

	$perfil = $usuario["perfil_id"] ;

    $pessoaId  = isset($_POST['pessoa_id']) ? $_POST['pessoa_id'] : null;

    $dataInicio  = isset($_POST['data_inicio']) ? $_POST['data_inicio'] : null;

    $dataFim  = isset($_POST['data_fim']) ? $_POST['data_fim'] : null;

    $statuId = isset($_POST['status_id']) ? $_POST['status_id'] : null;
                 
    $solicitacoes =   $solicitacaoDao->findSolicitacaoRelatorio($pessoaId,null,$statuId, $dataInicio,$dataFim);


   $page  =  new  PageUtil();

   $arquivo = "solicitações.xls";

   $relatorio =  $page->setTpl("relatorio-xls",array("solicitacoes"=>$solicitacoes,"perfil"=>$perfil),true);


   // Força o Download do Arquivo Gerado
   $arquivo = "solicitacoes.xls";  
   // Configurações header para forçar o download  
   header('Content-Type: application/vnd.ms-excel');
   header('Content-Disposition: attachment;filename="'.$arquivo.'"');
   header('Cache-Control: max-age=0');
   // Se for o IE9, isso talvez seja necessário
   header('Cache-Control: max-age=1');
   
   echo $relatorio;
   exit;
});



$app->get("/admin/relatorio/solicitacao/view/pdf/:solicitacaoId",function($solicitacaoId){

    
   
     $dompdf = new Dompdf();

     $arquivoDao =  new ArquivoSolicitacaoDao();
     
     $relatorio =  new Relatorio();

     $solicitacaoDao =  new SolicitacaoDao();

     $solicitacao = $solicitacaoDao->findPrimary($solicitacaoId);
      


     $html =  $relatorio->setTpl("templateRelatorio",array("solicitacao"=>$solicitacao),true);





     //inserindo o HTML que queremos converter

$dompdf->loadHtml($html);

// Definindo o papel e a orientação

$dompdf->setPaper('A4', 'landscape');

// Renderizando o HTML como PDF

$dompdf->render();

// enviar documento destino para download
$dompdf->stream("dompdf_out.pdf");

exit(0);


});