<?php if(!class_exists('Rain\Tpl')){exit;}?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-md-12">
                <a class="btn btn-info" href="/admin/convenio">voltar</a>
            </div>
        </div>
      <h1>
           Atualização de  Convênio
      </h1>
    </section>

    <section class="content">
    <form  method="post" action="/admin/convenio/editar/">
        <div class="row">
        
            <div class="col-md-6 col-md-offset-3">
        <p id="statu-edicao">
        
        
        </p>
        
        
            </div>
        
            <div class="col-md-12">
             
                    <input type="hidden"  name="convenio_id" value="<?php echo htmlspecialchars( $convenio['convenio_contrato_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control"/>
    
             <div class="col-md-4">
                <div class="form-group">
                <label class="control-label">Banco</label>
                <select  class="form-control" required name="banco_id"  id="selecao-banco-id">
                    <?php $counter1=-1;  if( isset($bancos) && ( is_array($bancos) || $bancos instanceof Traversable ) && sizeof($bancos) ) foreach( $bancos as $key1 => $value1 ){ $counter1++; ?>

                  <option value="<?php echo htmlspecialchars( $value1["banco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" <?php if( $value1["banco_id"] == $convenio['banco_id'] ){ ?> selected  <?php } ?> ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                     <?php } ?>

                  </select>
                </div>
                
        
            </div>   
        
            <div class="col-md-3">
                    <div class="form-group">
                            <label class="control-label">Descrição</label>
                            <input type="text" required name="descricao_convenio" value="<?php echo htmlspecialchars( $convenio['descricao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="desc_con_editar_id" class="form-control" placeholder="Percentual" aria-describedby="basic-addon2">
                    </div>          
                </div>         
            <div class="col-md-4">
                <div class="col-md-6">
                    <button type="submit" id="btn-atualizar-banco"  class="btn btn-primary btn-block" >Atualizar</button>
                </div>
                <div class="col-md-6">
                        <a class="btn btn-primary btn-block" style="margin-top:22px;" href="/admin/convenio">Cancelar</a>
                </div>
                </div>
        
            </div>
            
        </div>

        <div class="row">
          <div class="col-md-12">
              <?php if( $err != null ){ ?>


              <h5 class="alert alert-danger">$<?php echo htmlspecialchars( $err, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>
 
               <?php } ?>

          </div>
 
        </div>
        
        </form>

        </section>
        </div>




