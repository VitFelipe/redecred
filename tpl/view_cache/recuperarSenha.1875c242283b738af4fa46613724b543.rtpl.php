<?php if(!class_exists('Rain\Tpl')){exit;}?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Recuperação</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">Redefinir  Senha</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"></p>
    
    <form action="/admin/recuperar/redefinir" method="post">
        <input type="hidden" class="form-control" name="user_id" value="<?php echo htmlspecialchars( $userId, ENT_COMPAT, 'UTF-8', FALSE ); ?>"  />
        <input type="hidden" class="form-control" name="tokken_id" value="<?php echo htmlspecialchars( $tokken_id, ENT_COMPAT, 'UTF-8', FALSE ); ?>"  />
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Senha" name="senha"  minlength="8" required="true">
        <span class=" form-control-feedback"></span>
      </div>

      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Confirmação de Senha" name="conf_senha"  minlength="8" required="true">
        <span class=" form-control-feedback"></span>
      </div>

      <div class="row">
        <!-- /.col -->
        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Enviar</button>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
            <?php if( $msg != null ){ ?><h5 class="alert alert-danger"><?php echo htmlspecialchars( $msg, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5><?php } ?>

        </div>
      </div>
 
    </form>

  
 

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="/tpl/admin/res/Admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="/tpl/admin/res/Admin/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="/tpl/admin/res/Admin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
