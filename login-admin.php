
<?php

use \Dao\UsuarioDao;
use \Dao\TookenDao;

use \Model\Usuario;
use \Page\PageAdmin;

use \Page\PageUtil;
use \Util\Util;

//============================================
//==================Admin=====================
//============================================


$app->get("/admin",function(){
    $page = new  PageUtil();
    $page->setTpl("index",array("msg"=>null));
        
    
    });
    
    //===== Inicio Login
    
    $app->post("/admin/login",function(){
    
        if(isset($_POST)){
        $login  =  $_POST['login'];
        $senha  =  $_POST['senha'];
        $usuarioDao =  new UsuarioDao();
    
        
         $usuario  =  $usuarioDao->login($login);//Buscando Usuario Por Login
          
         if(empty($usuario)){//Verificando se o Usuario foi encontrado
            $page = new  PageUtil();
            $msg = "Login Incorreto !!";
            $page->setTpl("index",array("msg"=> $msg));
            exit;
         }
      
         
        /*
         var_dump($usuario);
         exit;
         */
         if($usuario[0]["senha"] == md5($senha)){//Verificando caso o usuario seje encontradao se a senha esta correta 
    
        
           $_SESSION['usuario'] = $usuario[0];
            header("Location:/admin/main");
            exit;
         }else{
            $page = new  PageUtil();
            $msg = "Senha Incorreta !!";
            $page->setTpl("index",array("msg"=>	$msg));
         }
    
         }
    
    
    });
    
    
    
    $app->get("/admin/logout",function(){
    
        Usuario::removeSession();
        
    
    });
    
    
    $app->get("/admin/recuperar",function(){
    
        $page = new  PageUtil();
            $msg = "Login Incorreto !!";
            $page->setTpl("esqueceSenha",array("msg"=>null));
            exit;
        
    
    });
    
    $app->post("/admin/recuperar/tokken",function(){
    try{
        $email = $_POST['email'];
    
    
        $usuarioDao =  new UsuarioDao();
        $pessoa  =  $usuarioDao->findEmail($email);//Buscando Usuario Por Login
        if(empty($pessoa)){
            $page = new  PageUtil();
            $msg = "Erro : Email não Cadastrado!!";
            $page->setTpl("esqueceSenha",array("msg"=>	$msg,"statu"=>0));
            exit;
        }
    
        
    
        $tokken  = md5(uniqid());
    
        //=====Enviando Email
    
        $util =  new Util();
        $pageEmail = new  PageUtil();
        
        $envioMsg = $util->enviarEmail($pageEmail->setTpl("conteudoEmail",array("link"=>"http://redecredmb.com/admin/recuperar/$tokken/redefinir
        ","name"=>$pessoa[0]["nome"],"login"=>$pessoa[0]["login"]),true),$email);
        
        if($envioMsg == "Mensagem enviada."){
        $tokkenDao =  new TookenDao();
        
            $tokkenDao->salvar($pessoa[0]['pessoa_id'],$tokken);
        
            $page = new  PageUtil();
            $msg = "Email de definição de Senha enviado com Sucesso!!";
            $page->setTpl("esqueceSenha",array("msg" =>	$msg,"statu"=>1));
                exit;
        }else{
            $page = new  PageUtil();
            
            $page->setTpl("esqueceSenha",array("msg"=>$envioMsg,"statu"=>0));
            exit;
        }
    
    
        
    }catch(Exception $e){
    echo 'Erro: '.$e->getMessage();
    exit;
    }
    
    });
    
    
    $app->get("/admin/recuperar/:tokken/redefinir",function($tokkenLink){
        $tokkenDao =  new TookenDao();
        $tokken =  $tokkenDao ->findTokken($tokkenLink);
    
        if(empty($tokken) || $tokken[0]['valido']=='N'){
            $page  =  new PageUtil();
        $page->setTpl("alerta",array("titulo"=>"Alerta","msg"=>"Link Invalido solicite a recuperação da Senha no Login Adminstrativo!!"));
        exit;	
        }
        
        $page  =  new PageUtil();
        $page->setTpl("recuperarSenha",array("userId"=>$tokken[0]['idusuario'],"tokken_id"=>$tokken[0]['tokken_id'],"msg"=>null));
        exit;
    });
    
    
    
    $app->post("/admin/recuperar/redefinir",function(){
    $tokkenDao =  new TookenDao();
    $usuarioDao =  new UsuarioDao();
    
    $tokkenId  = $_POST['tokken_id'];
    $usuarioId =   $_POST['user_id'];
    
    $senha = $_POST['senha'];
    $confSenha = $_POST['conf_senha'];
    if($senha != $confSenha){
        $page  =  new PageUtil();
        $page->setTpl("recuperarSenha",array("userId"=>$usuarioId,"tokken_id"=>$tokkenId,"msg"=>"Confirmação de Senha Incorretar !!"));
        exit;
    }
    
    $usuarioDao->alterarSenha(md5($senha),$usuarioId);
    $tokkenDao->cancelarTokken($tokkenId);
    
    
    $page  =  new PageUtil();
        $page->setTpl("alerta",array("titulo"=>"Alerta","msg"=>"Senha Redefinida com Sucesso !!"));
        exit;	
        
    });
    
    
    
    
    
    //===== Fim Login