<?php if(!class_exists('Rain\Tpl')){exit;}?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          
                <h1>
                      Parceiro <small>Tipo Contrato</small>
               </h1>

            
          
         
        </section>
    
        <section class="content">
    
                <div class="row">
                        <div class="col-md-12">
                            <a class="btn btn-info" href="/admin/usuario/<?php echo htmlspecialchars( $usuario['pessoa_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>/convenios">voltar</a>
                        </div>
                    </div>
    
    
                <div class="row" style="margin-top:10px;">
                        <div class="col-xs-12">
                          <div class="box">
          
            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">

                            <div class="col-md-3">
                                    <label>Pessoa</label>
                                     <input type="text" class="form-control" value="<?php echo htmlspecialchars( $usuario['nome'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                            </div>
                                    
                                
                                    <div class="col-md-3">
                                    <div class="form-group">
                                       
                                                
                                        <label>CPF</label>
                                         <input type="text"class="form-control" value="<?php echo htmlspecialchars( $usuario['cpf'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                                </div>
                                        </div>


                            <div class="col-md-3">
                    <label>Banco</label>
                     <input type="text" class="form-control" value="<?php echo htmlspecialchars( $banco, ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                            </div>
                    
                
                    <div class="col-md-3">
                    <div class="form-group">
                       
                                
                        <label>Convênio</label>
                         <input type="text"class="form-control" value="<?php echo htmlspecialchars( $convenio, ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
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
    
                <div class="row" style="margin-top:10px;">
                        <div class="col-xs-12">
                          <div class="box">
                            <div class="box-header">
                              <h3 class="box-title">Tipos Contrato</h3>
                            </div>
                <div class="box-body">
                    
                        <table  class="table table-bordered table-hover table-style">
                          <thead>
                          <tr>
                            <th>Codigo</th>
                            <th>Descição</th>
                            <th>Opções</th>
                          </tr>
                          </thead>
                          <tbody>
                                <?php $counter1=-1;  if( isset($itens) && ( is_array($itens) || $itens instanceof Traversable ) && sizeof($itens) ) foreach( $itens as $key1 => $value1 ){ $counter1++; ?>
                              <tr>
                                    <td><?php echo htmlspecialchars( $value1["item_tipo_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td><?php echo htmlspecialchars( $value1["tipo_contrato"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                    <td> 
                                            <a href="/admin/usuario/<?php echo htmlspecialchars( $usuario['pessoa_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>/convenio/itemprazo/<?php echo htmlspecialchars( $value1["item_tipo_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-success " ><span class="fa  fa-search"></span>  Atualizar Prazo</a>  
                                    </td>
                                    
                              </tr>
    
                              <?php } ?>
    
                              
     
                         </tbody>
                            <tfoot>
                            <tr>
                                <th>Codigo</th>
                                <th>Descrição</th>
    
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
    
             <form action="/crede_cred/admin/tabelaConvenio/create" method="POST"> 
    
    
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
    
    
    
    
    
    
    