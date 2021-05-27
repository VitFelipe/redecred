<?php

use \Dao\PerfilDao;
use \Dao\UsuarioDao;

use \Model\Usuario;
use \Page\PageAdmin;
use \Dao\ClienteDao;
use \Dao\SolicitacaoDao;

$app->get("/admin/main",function(){
    Usuario::verificaSession();
    $clienteDao  =  new ClienteDao();
    $solicitacaoDao =  new SolicitacaoDao();


    $usuario  = Usuario::getSession();

    $pessoaId =  $usuario['pessoa_id'];
	
    $resultSolicitacao;
    $resultClient ;
	
	if($usuario["perfil_id"] == 1){
        $resultSolicitacao = $solicitacaoDao->findTotalSolicitacao();
        $resultClient  =  $clienteDao->findTotalCliente();
	}else{
        $resultSolicitacao = $solicitacaoDao->findTotalSolicitacaoPorPessoa($pessoaId);
         $resultClient  =  $clienteDao->findTotalCliente();
	}

    

    $totalCliente = $resultClient['total_cliente'];
    $totalSolicitacao =  $resultSolicitacao['total_solicitacao'];
	$pageAdmin  =  new PageAdmin();
	$pageAdmin->setTpl("main",array("totalCliente"=>$totalCliente,"totalSolicitacao"=> $totalSolicitacao));
});



