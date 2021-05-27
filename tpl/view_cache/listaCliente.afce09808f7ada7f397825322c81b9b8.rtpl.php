<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
            <h1>
                Clientes
           </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Cadastro</li>
            <li >Cliente</li>
            
          </ol>
        
      
     
    </section>

    <section class="content">
      
        <!--<div class="row">
           <div class="col-md-12">
            <a href="/crede_cred/admin/usuario/add" class="btn btn-primary"><span class="fa fa-plus"> </span> Novo</a>
           </div>
        </div>-->

            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Tabela de Clientes</h3>
            <div class="box-body">
                    <table  class="table table-bordered table-hover table-style">
                      <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Rg</th>
                        <th>Cpf</th>
                        <th>Email</th>
                        <th>Municipio</th>
                        <th>Telefone</th>
                        <th>Opções</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php $counter1=-1;  if( isset($clientes) && ( is_array($clientes) || $clientes instanceof Traversable ) && sizeof($clientes) ) foreach( $clientes as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                                <td><?php echo htmlspecialchars( $value1["cliente_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["rg"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td> 
                                        <a class="btn btn-info" href="#"><span class="fa  fa-search"> </span></a>
                                </td>
                          </tr>
                          <?php } ?>
 
                     </tbody>
                        <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Rg</th>
                            <th>Cpf</th>
                            <th>Email</th>
                            <th>Municipio</th>
                            <th>Telefone</th>
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




