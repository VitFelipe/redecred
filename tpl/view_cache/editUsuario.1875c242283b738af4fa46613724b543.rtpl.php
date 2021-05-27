<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <div class=" page-header">
            <h1>
                Atualização de Pessoa
                <small>Usuario</small>
           </h1>
        </div>
        </div>
        </div>
     
    </section>

    <section class="content" >
<form id="form-user-id" method="POST" action="/admin/usuario/create">
    <input type="hidden" name="pessoa_id" value="<?php echo htmlspecialchars( $usuario['pessoa_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control"/>
<div class="box box-danger">
    <div class="box-header with-border">
      <h3 class="box-title">Dados Pessoais</h3>
    </div>
    <div class="box-body">
      <div class="row">
        <div class="col-xs-3">
            <label class="control-label">Nome</label>
          <input type="text"  class="form-control" value="<?php echo htmlspecialchars( $usuario['nome'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required name="nome" placeholder="Digite seu Nome Completo">
        </div>
        <div class="col-xs-3">
            <label class="control-label">Email</label>
          <input type="email" class="form-control" required name="email" value="<?php echo htmlspecialchars( $usuario['email'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite seu Email">
        </div>
        
        <div class="col-xs-3">
                <label class="control-label">Cpf</label>
          <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['cpf'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  required name="cpf" placeholder="CPF">
        </div>

        <div class="col-xs-3">
                <div class="form-group">
                        <label>Telefone</label>
        
                        <div class="input-group">
                          <div class="input-group-addon">
                            <i class="fa fa-phone"></i>
                          </div>
                          <input type="text" name="telefone" value="<?php echo htmlspecialchars( $usuario['telefone'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required class="form-control">
                        </div>
                        <!-- /.input group -->
                      </div></div>
    </div>
    </div>
    <!-- /.box-body -->
      <!-- Dados Endereco-->
      <div class="box box-info">
        <div class="box-header with-border">
          <h3 class="box-title">Endereço</h3>
        </div>
        <div class="box-body">
          <div class="row">
            <div class="col-xs-3">
                <label class="control-label">Cep</label>
              <input type="number"  class="form-control" value="<?php echo htmlspecialchars( $usuario['cep'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="cep-id" required name="cep" placeholder="Digite o nome cep">
            </div>
            <div class="col-xs-3">
                <label class="control-label">bairro</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['bairro'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="bairro-id" required name="bairro" placeholder="Informe o Bairro">
            </div>
            
            <div class="col-xs-3">
                    <label class="control-label">Cidade</label>
              <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['cidade'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="municipio-id" required name="cidade" placeholder="Infome a Cidade">
            </div>

        <div class="col-xs-3">
              <label class="control-label">Endereço</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['endereco'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="endereco-id" required name="endereco" placeholder="Informe o endereço">
      </div>

          
        </div>
        </div>
        </div>
        <!-- /.box-body -->

<!-- Dados Bancarios-->
<div class="box box-success">
<div class="box-header with-border">
  <h3 class="box-title">Dados Bancarios</h3>
</div>
<div class="box-body">
  <div class="row">
    <div class="col-xs-3">
        <label class="control-label">Banco</label>
      <input type="text"  class="form-control" value="<?php echo htmlspecialchars( $usuario['banco'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required name="banco" placeholder="Digite o nome Banco">
    </div>
    <div class="col-xs-3">
        <label class="control-label">Agência</label>
      <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['agencia'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required name="agencia" placeholder="Digite o numero da agencia">
    </div>
    
    <div class="col-xs-3">
            <label class="control-label">Conta</label>
      <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['conta'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required name="conta" placeholder="Numero da Conta">
    </div>

    <div class="col-xs-3">
      <label class="control-label">Comissao</label>
<input type="number" class="form-control" value="<?php echo htmlspecialchars( $usuario['comissao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" step=".01" required name="comissao" placeholder="Comissão" />
</div>

  
</div>
</div>
</div>
<!-- /.box-body -->
    
  
    <div class="box box-primary" style="margin-top:25px;">
            <div class="box-header with-border">
              <h3 class="box-title">Dados Usario</h3>
            </div>
            <div class="box-body">
              <div class="row">
                <div class="col-xs-3 login-layout" >
                    <label class="control-label ">Login</label>
                  <input type="text" name="login"  required minlength="6" value="<?php echo htmlspecialchars( $usuario['login'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control login-add-id" placeholder="Digite o login">
                  <span  class="help-block msg-user-statu" ></span>
                </div>
            
                <div class="col-xs-3">
                        <label class="control-label">Perfil</label>
                 <select class="form-control"  name="perfil_id" required>
                     <?php $counter1=-1;  if( isset($perfis) && ( is_array($perfis) || $perfis instanceof Traversable ) && sizeof($perfis) ) foreach( $perfis as $key1 => $value1 ){ $counter1++; ?>

                     <option value="<?php echo htmlspecialchars( $value1["perfil_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["perfil_id"] == $usuario['perfil_id'] ){ ?> selected  <?php } ?> ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> - <?php echo htmlspecialchars( $value1["sigla"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                     <?php } ?>

                 </select>
                </div>

              
            
              </div>
            </div>
        
            <!-- /.box-body -->
    

  </div>


  <div class="row" style="padding:10px;">

 <div class="col-md-4 col-md-offset-4">
 <div class="col-md-6">

    <button type="submit" class="btn btn-primary btn-block" >Atualizar</button>

 </div>
 <div class="col-md-6">
        <a href="/admin/usuario" class="btn btn-primary btn-block" >Cancelar</a>

    </div>

 </div>

 
</div>

<div class="row">

  <div class="col-md-4 msg-erro-id" style="margin-left:10px;" >
    
  </div>

</div>

<div class="row">

  <div class="col-md-4" style="margin-left:10px;" >
    
    <?php if( $msg != null ){ ?><p class='alert alert-danger' ><?php echo htmlspecialchars( $msg, ENT_COMPAT, 'UTF-8', FALSE ); ?></p><?php } ?>

  </div>

</div>
 
</form>
  </section>

  </div>
