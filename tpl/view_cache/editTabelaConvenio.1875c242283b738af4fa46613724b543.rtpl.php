<?php if(!class_exists('Rain\Tpl')){exit;}?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="row">
                <div class="col-md-12">
                    <div class=" page-header">
                <h1>
                    Atualização Tabela de Convênios
                    
               </h1>
            </div>
            </div>
            </div>
         
        </section>
    
        <section class="content" >
    <form id="form-user-id" method="POST" action="/admin/tabelaConvenio/edit">
        <input type="hidden" name="tabela_convenio_id" value="<?php echo htmlspecialchars( $tabela['tabela_convenio_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control"/>
    <div class="box box-danger">
        
        <div class="box-body">
          <div class="row">


         
                <div class="form-group">
                        <label>Banco</label>
                        <select class="form-control select-banco" required >
                          <option value="0" disabled selected>Selecione um Banco</option>
                            <?php $counter1=-1;  if( isset($bancos) && ( is_array($bancos) || $bancos instanceof Traversable ) && sizeof($bancos) ) foreach( $bancos as $key1 => $value1 ){ $counter1++; ?>

                          <option value="<?php echo htmlspecialchars( $value1["banco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"   <?php if( $value1["banco_id"] == $tabela['banco_id'] ){ ?> selected  <?php } ?>  ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           
                          <?php } ?>

                        </select>
                      </div>
                  <div class="form-group">
                        <label>Convênio</label>
                        <select class="form-control select-convenio" name="convenio_id" required>
                          <?php $counter1=-1;  if( isset($convenios) && ( is_array($convenios) || $convenios instanceof Traversable ) && sizeof($convenios) ) foreach( $convenios as $key1 => $value1 ){ $counter1++; ?>

                          <option value="<?php echo htmlspecialchars( $value1["convenio_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"   <?php if( $value1["convenio_contrato_id"] == $tabela['convenio_contrato_id'] ){ ?> selected  <?php } ?>  ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                          <?php } ?>

                        </select>
                      </div class="form-group">

                      <label class="control-label">Descrição</label>

                      <input class="form-control"  value="<?php echo htmlspecialchars( $tabela['descricao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required name="descricao"  />

                      <div>


                      </div>


        </div>
            
    
      <div class="row" style="padding:10px;">
    
     <div class="col-md-4 col-md-offset-4">
     <div class="col-md-6">
    
        <button type="submit" class="btn btn-primary btn-block" >Atualizar</button>
    
     </div>
     <div class="col-md-6">
            <a href="/admin/tabelaConvenio" class="btn btn-primary btn-block" >Cancelar</a>
    
        </div>
    
     </div>
    
     
    </div>
    
    <div class="row">
    
      <div class="col-md-4 msg-erro-id" style="margin-left:10px;" >
        
      </div>
    
    </div>
    
   
     
    </form>
      </section>
    
      </div>
    