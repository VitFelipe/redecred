<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
                Tipo Contrato
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Cadastro</li>
            <li class="active">Tipo Contrato</li>
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
                  <h3 class="box-title">Tabela de Tipos de Contrato</h3>
                  </div>
    <div class="box-body">
        <table class="table table-bordered table-condensed table-striped table-style" id="table-banco">
            <thead>
            <tr>
        <th>Codigo</th>
        <th >Descrição</th>
        <th>Opções</th>
        </tr>
        </thead>
        <tbody>
        <?php $counter1=-1;  if( isset($tipoContratos) && ( is_array($tipoContratos) || $tipoContratos instanceof Traversable ) && sizeof($tipoContratos) ) foreach( $tipoContratos as $key1 => $value1 ){ $counter1++; ?>

        <tr>
        <td class="id-tipo-contrato"><?php echo htmlspecialchars( $value1["tipo_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td class="descricao-tipo-contrato"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
        <td> 
         <div class="row">
            <button type="button" class="btn btn-info tipo_contrato_edit"  data-target=".modal-editar"  data-toggle="modal" ><span class="fa  fa-pencil"></span></button>
            <a class="btn btn-danger " style="margin-left:8px;" href="/admin/tipoContrato/<?php echo htmlspecialchars( $value1["tipo_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete" onclick="return confirm('Tem certeza que deseja excluir o tipo Relatorio  <?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?');" ><span class="fa  fa-close"></span></a>
        </div>
        </td>
        </tr>
        <?php } ?>

        </tbody>
        </table>
        
        </div>
        </div>
        </div>
        </div>
        
        <!-- Fim Tabela-->
        
        
        <!-- Cadastro  -->
        
        <div class="modal fade bs-example-modal-lg " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
                <div class="modal-dialog modal-lg" role="document">
                       
                  <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Cadastro Tipo Contrato</h4>
                              </div>
                      <div class="modal-body">
              <!-- Inicio formulario-->
        <form  method="post" action="/admin/tipoContrato/create">
            <div class="row">
            
                <div class="col-md-6 col-md-offset-3">
            <p id="statu">
            
            
            </p>
            
            
                </div>
            
                <div class="col-md-12">
             
                 <div class="col-md-4">
                    <div class="form-group">
                    <label class="control-label">Descrição Tipo Contrato</label>
                    <input type="text"  name="descricao" id="desc-banco-id" class="form-control"/>
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
        
           
        
            <!-- Editar Banco -->
        
        <div class="modal fade modal-editar " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
                <div class="modal-dialog modal-lg" role="document">
                       
                  <div class="modal-content">
                        <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel2">Atualização de Tipo de Relatório</h4>
                        </div>
                      <div class="modal-body">
              <!-- Inicio formulario-->
        <form  method="post" action="/admin/tipoContrato/editar">         
                <div class="row">
                        <input type="hidden"  name="tipo_contrato_id" id="tipo-contrato-id" class="form-control"/>
                 <div class="col-md-4">
                    <div class="form-group">
                        <label class="control-label">Descrição</label>
                        <input type="text"  name="descricao" id="desc-tipo-contrato-id" class="form-control"/>
                    </div>
                    
                </div>   
                <div class="col-md-2">
                    <button type="submit" style="margin-top:25px;"   class="btn btn-primary btn-block" >Atualizar</button>
                </div>
            
                </div>
            </form>
                
            </div>
            <!-- Fim formulario-->
        </div>
                  </div>
                </div>
              <!--Fim Edição-->
        
        
        
    
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
   

