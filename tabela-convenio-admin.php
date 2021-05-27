
<?php
use \Dao\BancoDao;
use \Dao\TabelaConvenioDao;
use \Dao\ConvenioDao;  

use \Model\Usuario;
use \Page\PageAdmin;

//------------------------------
//------Inicio Table de Convenio


$app->get("/admin/tabelaConvenio",function(){

	Usuario::verificaSession();
	$tabela =  new TabelaConvenioDao();
	$pageAdmin  =  new PageAdmin();
	$bancoDao =  new BancoDao();
	$bancos  = $bancoDao->findAll();

	$tabelas = $tabela->findAll();
	
	
    $pageAdmin->setTpl("listTableConvenio",array("bancos"=>$bancos,"tabelas"=>$tabelas));
	
	 
});


$app->post("/admin/tabelaConvenio/create",function(){

	Usuario::verificaSession();

	 $tabela =  new TabelaConvenioDao();

	$convenio_id = $_POST['convenio_id'];
	$descricao = $_POST['descricao'];

	$tabela->salvar($convenio_id,$descricao);

	header("Location:/admin/tabelaConvenio");
	exit;
	
});


$app->get("/admin/tabelaConvenio/:id/delete",function($id){

	try{
	Usuario::verificaSession();
	$tabela =  new TabelaConvenioDao();
	

	$tabela->excluir($id);
	
	header("Location:/admin/tabelaConvenio");
	exit;
}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
   
	 
});


$app->get("/admin/tabelaConvenio/:id",function($id){
	try{

	Usuario::verificaSession();
	$pageAdmin  =  new PageAdmin();

    $convenioDao =  new ConvenioDao();
	$tabela =  new TabelaConvenioDao();
	$bancoDao =  new BancoDao();
    
	$bancos  = $bancoDao->findAll();
	$tabelaConvenio = $tabela->findPrimaryKey($id);
	
	$convenios = $convenioDao->findbyConvenioId($tabelaConvenio['convenio_contrato_id']);
$pageAdmin->setTpl("editTabelaConvenio",array("bancos"=>$bancos,"tabela"=>$tabelaConvenio,"convenios"=>$convenios));
	
}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
	 
});

//Atualização
$app->post("/admin/tabelaConvenio/edit",function(){
	
	try{

	Usuario::verificaSession();

	 $tabela =  new TabelaConvenioDao();
	 

	$tabela_convenio_id = $_POST['tabela_convenio_id'];
	$convenio_id = $_POST['convenio_id'];
	$descricao = $_POST['descricao'];


	$tabela->alterar($convenio_id,$descricao,$tabela_convenio_id);

	header("Location:/admin/tabelaConvenio");
	exit;
}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
	
});



//busca Tabela Convenios  Por Convenio
$app->post("/admin/tabelaConvenio/convenio",function(){

	$convenioId  =  $_POST['convenioId'];

	$tabela =  new TabelaConvenioDao();
	
	echo json_encode($tabela->findToConvenio($convenioId));

});





//------------------------------
//------Fim Table de Convenio


