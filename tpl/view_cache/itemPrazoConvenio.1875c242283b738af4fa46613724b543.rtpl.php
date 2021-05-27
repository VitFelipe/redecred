<?php if(!class_exists('Rain\Tpl')){exit;}?>





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
                <h1>
                      Tipo Contrato <small>Pazo</small>
               </h1>
               <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li >Cadastro</li>
                <li > Convênio</li>
                <li > Tipo Contrato</li>
                <li  class="active"> Prazo</li>
                
              </ol>
            
          
         
        </section>
    
        <section class="content">
    
                <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-info" href="/admin/convenio/<?php echo htmlspecialchars( $itens["0"]['convenio_contrato_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>/detalhe">voltar</a>
                        </div>
                    </div>
    
    
                <div class="row" style="margin-top:10px;">
                        <div class="col-xs-12">
                          <div class="box">
          
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                            <div class="col-md-4">
                    <label>Banco</label>
                     <input type="text" class="form-control" value="<?php echo htmlspecialchars( $banco, ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                            </div>
                    
                
                    <div class="col-md-4">
                    <div class="form-group">
                       
                                
                        <label>Convênio</label>
                         <input type="text"class="form-control" value="<?php echo htmlspecialchars( $convenio, ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                </div>
                        </div>

                        <div class="col-md-4">
                                <div class="form-group">
                                   
                                            
                                    <label>Tipo Contrato</label>
                                     <input type="text"class="form-control" value="<?php echo htmlspecialchars( $tipoContrato, ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                            </div>
                                    </div>
                    </div>
                    </div>
                   
                </div>
                </div>
                </div>
                </div>
    
            <div class="row">
               
            </div>

            <div class="row">
                <div class="col-md-12">
                  <div class="col-md-6">
                    <?php if( $msg != null ){ ?>

                    <h5 class="alert alert-success"><?php echo htmlspecialchars( $msg, ENT_COMPAT, 'UTF-8', FALSE ); ?></h5>

                    <?php } ?>


                    </div>
                    </div>
                  
                  </div>
    
                <div class="row" style="margin-top:10px;">
                        <div class="col-xs-12">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Prazo - Comissão</h3>
                            </div>
                <div class="box-body">

                    <form action="/admin/convenio/itemprazo" class="form-inline" method="POST">
                      <input type="hidden" name="item_tipo_contrato_id" value="<?php echo htmlspecialchars( $itens["0"]['item_tipo_contrato_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                    <?php $counter1=-1;  if( isset($itens) && ( is_array($itens) || $itens instanceof Traversable ) && sizeof($itens) ) foreach( $itens as $key1 => $value1 ){ $counter1++; ?>

                        <div class="row" style="margin-top:15px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <label><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </label>
                                        </div>
                        
                        <input class="simple-field-data-mask-reverse form-control" required
                        type="number"  data-mask-reverse="true"  step=".01"
                         required value="<?php echo htmlspecialchars( $value1["comissao"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="prazo[<?php echo htmlspecialchars( $value1["item_prazo_convenio_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>][]" />
                        
                         <div class="input-group-addon">
                            <label>%</label>
                        </div>
                        </div>
                        </div>
                    </div>
                    </div>
                    <?php } ?>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="col-md-3">
                     <input type="submit" value="Salvar" style="margin-top:25px;" class="btn btn-primary btn-block" />

                        </div>

                        <div class="col-md-3">
                            <a href="#"   style="margin-top:25px;" class="btn btn-primary btn-block" >Cancelar</a>
       
                               </div>

                      </div>
 

                    </div>

                  
                    </form>
                  
                 
                </div>
       
    </div>
    </div>
    
    
    
    
        </div>
    
        </section>
            </div>
    
    
    
    
    
    
    