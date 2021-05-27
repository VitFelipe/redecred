<?php if(!class_exists('Rain\Tpl')){exit;}?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
            <h1>
                Usuario
           </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Cadastro</li>
            
          </ol>
        
      
     
    </section>

    <section class="content">
      
        <div class="row">
           <div class="col-md-12">
            <a href="/admin/usuario/add" class="btn btn-primary"><span class="fa fa-plus"> </span> Novo</a>
           </div>
        </div>

      <div class="row">
   <div class="col-md-12"> 
    <div class="col-md-4">

<?php if( $tipo != null ){ ?>

<?php if( $tipo == 1 ){ ?>

<h5 class="alert alert-success"><?php echo htmlspecialchars( $msg, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
<?php }else{ ?>

<h5 class="alert alert-danger"><?php echo htmlspecialchars( $msg, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
<?php } ?>

<?php } ?>


      

    </div>

   </div>
        </div>



            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Tabela de Usuarios</h3>
            <div class="box-body">
                    <table  class="table table-bordered table-hover table-style">
                      <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Municipio</th>
                        <th>Login</th>
                        <th>Perfil</th>
                        <th>Opções</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php $counter1=-1;  if( isset($usuarios) && ( is_array($usuarios) || $usuarios instanceof Traversable ) && sizeof($usuarios) ) foreach( $usuarios as $key1 => $value1 ){ $counter1++; ?>

                          <tr>
                                <td><?php echo htmlspecialchars( $value1["idusuario"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["login"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["perfil"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>
                                        <a class="btn btn-info" href="/admin/usuario/<?php echo htmlspecialchars( $value1["pessoa_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span class="fa  fa-pencil"> </span></a>
                                        <a href=" /admin/usuario/<?php echo htmlspecialchars( $value1["pessoa_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/convenios" class="btn btn-success"><span class="fa  fa-search"> </span></a>
                                        <a href="/admin/usuario/<?php echo htmlspecialchars( $value1["pessoa_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Tem certeza que deseja excluir esse item ?');" class="btn btn-danger"><span class="fa  fa-close"> </span></a>
                                        <a href="/admin/usuario/<?php echo htmlspecialchars( $value1["pessoa_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/atualizarPrazo" onclick="return confirm('Deseja Atualizar os Prazos da Comissão de <?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?');" class="btn btn-primary"><span class="fa   fa-circle-o-notch"> </span></a>
                                      </td>
                          </tr>

                          <?php } ?>

 
                     </tbody>
                        <tfoot>
                        <tr>
                                <th>Codigo</th>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Municipio</th>
                                <th>Login</th>
                                <th>Perfil</th>
                                <th>Opções</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
   
</div>
</div>
</div>
    </section>
        </div>




