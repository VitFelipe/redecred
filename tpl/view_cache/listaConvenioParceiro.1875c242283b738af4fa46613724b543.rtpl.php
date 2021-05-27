<?php if(!class_exists('Rain\Tpl')){exit;}?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
            <h1>
                  Parceiro <small>Convenio</small>
           </h1>
 
    </section>

    <section class="content">

            <div class="row">
                    <div class="col-md-12">
                        <a class="btn btn-info" href="/admin/usuario">voltar</a>
                    </div>
                </div>


            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
      
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                        <div class="col-md-4">
                <label>Pessoa</label>
                 <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['nome'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                        </div>
                
            
                <div class="col-md-4">
                <div class="form-group">
                   
                            
                    <label>CPF</label>
                     <input type="text"class="form-control" value="<?php echo htmlspecialchars( $usuario['cpf'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                            </div>
                    </div>

                   
                </div>
                </div>
               
            </div>
            </div>
            </div>
            </div>

            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Convenios</h3>
                        </div>
            <div class="box-body">
                
                    <table  class="table table-bordered table-hover table-style">
                      <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Convenio</th>
                        <th>Banco</th>
                        <th>Opções</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php $counter1=-1;  if( isset($convenios) && ( is_array($convenios) || $convenios instanceof Traversable ) && sizeof($convenios) ) foreach( $convenios as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                                <td><?php echo htmlspecialchars( $value1["convenio_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["banco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td> 
                                <a href="/admin/usuario/<?php echo htmlspecialchars( $usuario['pessoa_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>/convenio/<?php echo htmlspecialchars( $value1["convenio_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success" ><span class="fa  fa-search"></span>Atualizar</a> 
                                  </td>
                                
                          </tr>

                          <?php } ?>

                          
 
                     </tbody>
                        <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Convenio</th>
                            <th>Banco</th>
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






