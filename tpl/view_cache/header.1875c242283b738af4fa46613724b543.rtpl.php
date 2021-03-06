<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>RedCred</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="/tpl/admin/res/Admin/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/tpl/admin/res/Admin/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect.
  -->
  <link rel="stylesheet" href="/tpl/admin/res/Admin/dist/css/skins/skin-blue.min.css">
  <!-- Meu Estilo-->
  <link rel="stylesheet"  href="/tpl/admin/_css/estilo.css"/>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="/admin/main" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>R</b>CD</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>RedCred</b>CRED</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav ">
          <!-- Messages: style can be found in dropdown.less-->
       

          <!-- Notifications Menu -->
          <?php if( $usuario['perfil_id'] == 1 ){ ?>

          <audio src="/tpl/admin/son/slow-spring-board-longer-tail.mp3"></audio>
          <li class="dropdown notifications-menu">
            <!-- Menu toggle button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <i class="fa fa-bell-o"></i>
              <span class="label label-warning"><span class="total-not-cl"></span></span>
            </a>
            <ul class="dropdown-menu">
              <li class="header"> <span class="total-not-cl"></span> Notifica????es</li>
              <li>
                <!-- Inner Menu: contains the notifications -->
                <ul class="menu">
                  <li id="start-notfic-id"><!-- start notification -->
              
                  </li>
                  <!-- end notification -->
                </ul>
              </li>
              <li class="footer"><a href="#">View all</a></li>
            </ul>
          </li>
          <?php } ?>

      
          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <?php if( $usuario['perfil_id'] == 1 ){ ?>

              <img src="/tpl/admin/res/Admin/dist/img/avatar5.png" class="user-image" alt="User Image">
               <?php }else{ ?>

               <img src="/tpl/admin/res/Admin/dist/img/avatar04.png" class="user-image" alt="User Image">
              <?php } ?>

              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs"> <?php echo htmlspecialchars( $usuario['nome'], ENT_COMPAT, 'UTF-8', FALSE ); ?></span>     <span class="fa fa-angle-down"></span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                  <?php if( $usuario['perfil_id'] == 1 ){ ?>

                <img src="/tpl/admin/res/Admin/dist/img/avatar5.png" class="img-circle" alt="User Image">
                <?php }else{ ?>

                <img src="/tpl/admin/res/Admin/dist/img/avatar04.png" class="img-circle" alt="User Image">
                <?php } ?>

                <p>
                  <?php echo htmlspecialchars( $usuario['nome'], ENT_COMPAT, 'UTF-8', FALSE ); ?> -   <?php echo htmlspecialchars( $usuario['perfil'], ENT_COMPAT, 'UTF-8', FALSE ); ?>

                  <small ><?php echo formatData($usuario['data_criacao_usuario']); ?> </small>
                </p>
              </li>
              <!-- Menu Body -->
              <!--
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
               
              </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <button data-toggle="modal" data-target="#redefibirsenhaid" class="btn btn-default"> Redefinir Senha</button>
                </div>
                <div class="pull-right">
                  <a href="/admin/logout" class="btn btn-default btn-flat">Sair</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         <!-- <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>-->
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

    

     
      <!-- Sidebar Menu -->
      
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <?php if( $usuario['perfil_id'] == 1 ){ ?>

        <li class="treeview">
          <a href="#"><i class="fa fa-plus-square-o"></i> <span>Cadastro</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/banco">Banco</a></li>
            <li><a href="/admin/convenio">Convenio</a></li>
            <li><a href="/admin/tabelaConvenio">Tabela de Convenio</a></li>
            <li><a href="/admin/tipoContrato">Tipo Contrato</a></li>
          </ul>
        </li>
        <?php } ?>

        <?php if( $usuario['perfil_id'] == 1 ){ ?>

         
        <li class="treeview">
          <a href="/admin/usuario"><i class="glyphicon glyphicon-user"></i> <span>Usuario</span>
           
          </a>
        </li>
       

        <li class="treeview">
          <a href="/admin/cliente"><i class=" fa fa-users"></i> <span>Cliente</span>
           
          </a>
        </li>
        <?php } ?>

      


        <li class="treeview">
            <a href="#"><i class="fa fa-credit-card"></i> <span>Solicita????o</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/admin/solicitacao/enviar">Enviar Solicita????o</a></li>
              <li><a href="/admin/solicitacao/acompanhamento">Acompanhar Solicita????o</a></li>
            </ul>
          </li>

          <li class="treeview">
              <a href="#"><i class="glyphicon glyphicon-user"></i> <span>Chamado</span>
               
              </a>
            </li>

          <li class="treeview">
            <a href="#"><i class="fa fa-file-excel-o"></i> <span>Relat??rios</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/admin/relatorio/solicitacao">Solcita????o</a></li>
             
            </ul>
          </li>

      
      </ul>
    
      
     
     

     
      <!-- /.sidebar-menu -->
    </section>



    <!-- /.sidebar -->
  </aside>



   
  <div class="modal fade  " id="redefibirsenhaid" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
    <div class="modal-dialog modal-sm" role="document">
           
      <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Redefinir Senhar</h4>
                  </div>
          <div class="modal-body">
  <!-- Inicio formulario-->
<form  method="post" action="/admin/usuario/alterar" >
<div class="row">
  <input type="hidden" name="usuario_id" value="<?php echo htmlspecialchars( $usuario['idusuario'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />

  <div class="col-md-12">
        <div class="form-group">
        <label class="control-label">Nova Senha</label>
     <input type="password" name="senha" class="form-control" id="definir-senha" minlength="8" required   />
        </div>

        <div class="form-group">
            <label class="control-label">Confirma????o da Senha</label>
         <input type="password" name="confi-senha" id="definir-confirmacao" class="form-control"  minlength="8" required />
            </div>
    </div>
    

    <div class="col-md-12">
   <div class="col-md-10 col-md-offset-1">
     
    <div class="col-md-7">
    <button type="submit" class="btn btn-primary btn-block"  ><span class="fa fa-check-square"></span></button>
    </div>

    <div class="col-md-5">
    <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-danger btn-block" ><span class="fa fa-close "></span></button>
    </div>
    

   </div>

    </div>
    

 
</div>





</form>




<!-- Fim formulario-->
</div>
      </div>
    </div>
  </div>