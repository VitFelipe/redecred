<?php


use \Dao\ConvenioDao;
use \Dao\BancoDao;
use \Dao\SolicitacaoDao;



use \Model\Usuario;
use \Model\Convenio;
use \Page\PageAdmin;



//===== Inicio Convenio

$app->get("/admin/convenio/:convenioId/delete",function($id){
	try{
	$convenioDao =  new ConvenioDao();
	$solicitacaoDao = new SolicitacaoDao();
	$total =  $solicitacaoDao->findSolicitacoesConvenio($id);
	//Verificando se o convenio possui solicitaçõés de emprestimos caso sim não permita excluir 
	if($total['quantidade'] > 0){
		throw new Exception("Esse Convênio possui solicitação de contrato , por esse motivo não será permitido sua exclusão !! ", 1);		

	}else{
    	$convenioDao->excluir($id);
		pageHomeConvenio("Convenio excluido com sucesso");
	}

}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
});

$app->get("/admin/convenio/",function(){
	pageHomeConvenio(null);
});


$app->post("/admin/convenio/create",function(){

	try{
	$Convenio = 	new Convenio();
	$ConvenioDao =  new ConvenioDao();
    

    $Convenio->setDescricao($_POST['descricao']);
    $Convenio->setBancoId($_POST['banco_id']);
	
	$ConvenioDao->salvar($Convenio);

	pageHomeConvenio("Convenio salvo com sucesso !!");

}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}

});



$app->post("/admin/convenio/editar/",function(){
	
	$ConvenioDao =  new ConvenioDao();
	
	$id = $_POST['convenio_id'];
	$bancoId = $_POST['banco_id'];
	$descricao = $_POST['descricao_convenio']
;	

	if(empty($bancoId)){
		pageUpdateConv($convenioid,"Selecione o Banco !!");
	}

	if(empty($descricao)){
		pageUpdateConv($convenioid,"Informe  a Descrição  !!");
	}

	$ConvenioDao->alterar($descricao,$bancoId,$id);

	pageHomeConvenio("Convenio Atualizado com sucesso");
});


$app->get("/admin/convenio/:convenioId/editar",function($convenioid){
	pageUpdateConv($convenioid,null);
});


$app->post("/admin/convenio/banco",function(){
	$convenioDao =  new ConvenioDao();
	
	$bancoId = $_POST['banco_id'];
	echo json_encode($convenioDao->findbyConvenioToBancoId($bancoId));

});









function pageUpdateConv($convenioid,$err){
	Usuario::verificaSession();
	$pageAdmin  =  new PageAdmin();
	$bancoDao =  new BancoDao();
	$convenioDao =  new ConvenioDao();


	$bancos  = $bancoDao->findAll();
    $convenio = $convenioDao->findbyConvenioId($convenioid);
	$pageAdmin->setTpl("editaConvenio",array("bancos"=>$bancos,"convenio"=>$convenio[0],"err"=>$err));
	exit ;
}





function pageHomeConvenio($msg){

	Usuario::verificaSession();
	try{
	$pageAdmin  =  new PageAdmin();
	$bancoDao =  new BancoDao();
	$convenioDao =  new ConvenioDao();


	$bancos  = $bancoDao->findAll();
    $convenios = $convenioDao->findAll();

	$pageAdmin->setTpl("convenio",array("bancos"=>$bancos,"convenios"=>$convenios,"msg"=>$msg));
	exit;
}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
}