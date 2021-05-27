<?php

use \Dao\TipoContratoDao;

use \Model\Usuario;
use \Page\PageAdmin;

//------Inicio Tipo Contrato


$app->get("/admin/tipoContrato",function(){
   
	try{
	Usuario::verificaSession();
	$tipoContratoDao = new TipoContratoDao();
	$pageAdmin  =  new PageAdmin();

	$tiposContratos =  $tipoContratoDao->findAll();

    $pageAdmin->setTpl("listTipoContrato",array("tipoContratos"=>$tiposContratos));
	}catch(Exception $e){

	}
	 
});


$app->post("/admin/tipoContrato/create",function(){

	Usuario::verificaSession();

	$tipoContratoDao = new TipoContratoDao();
	
	$descricao = $_POST['descricao'];
	
	$tipoContratoDao->salvar($descricao);

	header("Location:/admin/tipoContrato");
	exit;
	
	 
});

$app->get("/admin/tipoContrato/:id/delete",function($id){
try{
	Usuario::verificaSession();
	$tipoContratoDao = new TipoContratoDao();
	
	$tipoContratoDao->excluir($id);

   
	header("Location:/admin/tipoContrato");
	exit;

}catch(Exception $e){
	$pageAdmin  =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
	
	 
});



$app->post("/admin/tipoContrato/editar",function(){

	Usuario::verificaSession();
	$tipoContratoDao = new TipoContratoDao();

	$descricao = $_POST['descricao'];
	$id = $_POST['tipo_contrato_id'];
	
	$tipoContratoDao->alterar($id,$descricao);


	header("Location:/admin/tipoContrato");
	exit;
	
	 
});


//------------------------------
//------Fim Tipo Contrato