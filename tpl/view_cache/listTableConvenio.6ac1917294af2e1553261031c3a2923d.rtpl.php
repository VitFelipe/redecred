<?php if(!class_exists('Rain\Tpl')){exit;}?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
            <h1>
                Tabela de Convênio
           </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Cadastro</li>
            <li >Tabela de Convênio</li>
            
          </ol>
        
      
     
    </section>

    <section class="content">
      
        <div class="row">
           <div class="col-md-12">
            <button data-toggle="modal" data-target="#modal-tabela-conv" class="btn btn-primary"><span class="fa fa-plus"> </span> Novo</button>
           </div>
        </div>

            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Tabela de Convênio</h3>
                        </div>
            <div class="box-body">
                    <table  class="table table-bordered table-hover table-style">
                      <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Convenio</th>
                        <th>Banco</th>
                        <th>Opções</th>
                      </tr>
                      </thead>
                      <tbody>
                            <?php $counter1=-1;  if( isset($tabelas) && ( is_array($tabelas) || $tabelas instanceof Traversable ) && sizeof($tabelas) ) foreach( $tabelas as $key1 => $value1 ){ $counter1++; ?>

                          <tr>
                                <td><?php echo htmlspecialchars( $value1["tabela_convenio_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["convenio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["banco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td> 
                                        <a class="btn btn-info" href="/admin/tabelaConvenio/<?php echo htmlspecialchars( $value1["tabela_convenio_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><span class="fa  fa-pencil"> </span></a>
                                        <a href="/admin/tabelaConvenio/<?php echo htmlspecialchars( $value1["tabela_convenio_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Tem certeza que deseja excluir esse item ?');" class="btn btn-danger"><span class="fa  fa-close"> </span></a>
                                </td>
                                
                          </tr>

                          <?php } ?>


                          
 
                     </tbody>
                        <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Convenio</th>
                            <th>Banco</th>
                            <th>Opções</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
   
</div>
</div>


<div class="modal fade" tabindex="-1" role="dialog" id="modal-tabela-conv" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <h4 class="modal-title" id="gridSystemModalLabel">Cadastro Tabela de Convênios</h4>
            </div>
            <div class="modal-body">

         <form action="/admin/tabelaConvenio/create" method="POST"> 


                <div class="form-group">
                        <label>Banco</label>
                        <select class="form-control select-banco" required >
                          <option value="0" disabled selected>Selecione um Banco</option>
                            <?php $counter1=-1;  if( isset($bancos) && ( is_array($bancos) || $bancos instanceof Traversable ) && sizeof($bancos) ) foreach( $bancos as $key1 => $value1 ){ $counter1++; ?>

                          <option value="<?php echo htmlspecialchars( $value1["banco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           
                          <?php } ?>

                        </select>
                      </div>
                      <div class="form-group">
                        <label>Convênio</label>
                        <select class="form-control select-convenio" name="convenio_id" required>
                         
                        </select>
                      </div class="form-group">

                      <label class="control-label">Descrição</label>

                      <input class="form-control" required name="descricao"  />

                      <div>


                      </div>
      




          
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Salvar</button>
            </div>
            
         </form>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->

    </div>

    </section>
        </div>




