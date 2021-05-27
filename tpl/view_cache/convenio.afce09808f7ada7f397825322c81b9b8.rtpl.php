<?php if(!class_exists('Rain\Tpl')){exit;}?><!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                Convênio
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Cadastro</li>
            <li class="active">Convênio</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
            
        <div class="row">
        <div class="col-md-2">
        <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target=".bs-example-modal-lg">Novo</button>
        </div>
        </div>
        
        <!-- Inicio Tabela-->
        <div class="row" style="margin-top:10px;">
          <div class="col-xs-12">
            <div class="box">
              <div class="box-header">
                <h3 class="box-title">Tabela de Usuarios</h3>
                </div>
  <div class="box-body">
        <table class="table table-bordered table-condensed table-striped table-style" id="table-banco">
       <thead>
          <tr>
        <th>Codigo</th>
        <th >Descrição</th>
        <th >Banco</th>
        <th>Opções</th>
        </tr>
      </thead>
      <tbody>
               <?php $counter1=-1;  if( isset($convenios) && ( is_array($convenios) || $convenios instanceof Traversable ) && sizeof($convenios) ) foreach( $convenios as $key1 => $value1 ){ $counter1++; ?>
        <tr>
        <td class="id_convenio"><?php echo htmlspecialchars( $value1["convenio_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td class="descricao_conv"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td class="descricao_banco"><?php echo htmlspecialchars( $value1["banco"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td> 
         <div class="row">
            
            <a href="/crede_cred/admin/convenio/<?php echo htmlspecialchars( $value1["convenio_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/editar" class="btn btn-info btn-editar-banco" ><span class="fa  fa-pencil"></span></a>
            <a href="/crede_cred/admin/convenio/<?php echo htmlspecialchars( $value1["convenio_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/detalhe" class="btn btn-success btn-editar-banco" ><span class="fa  fa-search"></span></a>
            <button class="btn btn-danger btn-excluir-convenio" style="margin-left:8px;" data-toggle="modal" data-target=".modal-alert-convenio"><span class="fa  fa-close"></span></button>
            
        </div>
        </td>
        </tr>
        <?php } ?>
      </tbody>

        </table>
        
        </div>
        </div>
        
        <!-- Fim Tabela-->
        
        
        <!-- Cadastro  -->
        
        <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                       
                  <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Cadastro</h4>
                              </div>
                      <div class="modal-body">
              <!-- Inicio formulario-->
        <form id="formularioBanco" method="post" action="/crede_cred/admin/convenio/create">
            <div class="row">
            
                <div class="col-md-6 col-md-offset-3">
            <p id="statu">
            
            
            </p>
            
            
                </div>
            
                <div class="col-md-12">


                  
                        <div class="col-md-4">
                                <div class="form-group">
                            <label class="control-label">Banco</label>
                            <select  class="form-control" name="banco_id">
                              <?php $counter1=-1;  if( isset($bancos) && ( is_array($bancos) || $bancos instanceof Traversable ) && sizeof($bancos) ) foreach( $bancos as $key1 => $value1 ){ $counter1++; ?>
                            <option value="<?php echo htmlspecialchars( $value1["banco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                               <?php } ?>
                            </select>
                                </div>
                                
                            </div>   


             
                 <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Descrição</label>
                    <input type="text" required minlength="5" name="descricao" id="desc-banco-id" class="form-control"/>
                    </div>
                    
                </div>   
            

            
                <div class="col-md-2">
            
                        <button id="btn-salvar-banco"  class="btn btn-primary btn-block" >Salvar</button>
                </div>
            
                </div>
                
            </div>
            
            </form>
            
            
            
            
            <!-- Fim formulario-->
        </div>
                  </div>
                </div>
              </div>
        
        
              <!--Fim Cadastro-->
        
           <!--alert excluir-->
              <div class="modal fade modal-alert-convenio" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="gridSystemModalLabel">Alerta</h4>
                        </div>
                        <div class="modal-body">
                            
        
                            <div class="col-md-10 col-md-offset-1">
                              
                                <p id="msg-alert-convenio">
        
                                </p>
        
                            </div>
                         
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default"  data-dismiss="modal" >Não</button>
                          <a  class="btn btn-primary" id="btn-delete-convenio" href="" >Sim</a>
                        </div>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
            <!--Fim Alerta Excluir -->
        
            <!-- Editar Banco -->
      
        
        
              <!--Fim Edição-->
        
             <!-- Fim  Banco -->
        
        
    
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
   