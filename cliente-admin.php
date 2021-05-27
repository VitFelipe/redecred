<?php
use \Dao\ClienteDao;
use \Model\Usuario;


use \Page\PageAdmin;

$app->post("/admin/cliente/buscacpf/",function(){

    $cpf =   $_POST['cpf'];
	Usuario::verificaSession();

	$clienteDao =  new ClienteDao();

	echo json_encode($clienteDao->findCpf($cpf));
 
});

$app->get("/admin/cliente",function(){
	Usuario::verificaSession();
	$pageAdmin;
	try{


	$clienteDao =  new ClienteDao();

	$clientes = $clienteDao->findAll();

	$pageAdmin  =  new PageAdmin();
	$pageAdmin->setTpl("listaCliente",array("clientes"=>$clientes));
	}catch(Exception $e){
		$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
	}
});




$app->get("/admin/cliente/info/:id",function($id){


	$clienteDao =  new ClienteDao();

	echo json_encode($clienteDao->findPrimaryKey($id));
 
});





?>