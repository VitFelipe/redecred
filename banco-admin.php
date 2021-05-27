<?php


use \Model\Banco;

use \Dao\BancoDao;
use \Model\Usuario;
use \Page\PageAdmin;

//===== Inicio Banco





$app->get("/admin/banco",function(){
	pageBanco(null);
});





$app->get("/admin/banco/:idBnaco/delete",function($id){
	try{
	$bancoDao =  new BancoDao();
	$bancoDao->excluir($id);
	pageBanco("banco excluido com sucesso !!");

}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
});






$app->post("/admin/banco/editar/",function(){
	try{
	$banco = 	new Banco();
	$banco->setBancoId($_POST['id']);
    $banco->setDescricao($_POST['descricao']);
    $banco->setSigla($_POST['sigla']);
	$bancoDao =  new BancoDao();
	$bancoDao->alterar($banco);
	pageBanco("banco atualizado com sucesso");
}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}
});






$app->post("/admin/banco/create",function(){
	try{
	$banco = 	new Banco();
    $banco->setDescricao($_POST['descricao']);
    $banco->setSigla($_POST['sigla']);
	$bancoDao =  new BancoDao();
	$bancoDao->salvar($banco);

	pageBanco("banco criado com sucesso");
}catch(Exception $e){
	$pageAdmin =  new PageAdmin();
	$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
}

});

//===== Fim Banco

//Pagina Banco do Brasil

function pageBanco($msg){
	try{
		Usuario::verificaSession();
		$bancoDao =  new BancoDao();
		$pageAdmin  =  new PageAdmin();
		 $bancos  = $bancoDao->findAll();
		$pageAdmin->setTpl("formBanco",array("bancos"=> $bancos,"msg"=>$msg));
		exit;
		}catch(Exception $e){
			$pageAdmin =  new PageAdmin();
			$pageAdmin->setTpl("erro",array("erro"=>$e->getMessage()));
		}
}