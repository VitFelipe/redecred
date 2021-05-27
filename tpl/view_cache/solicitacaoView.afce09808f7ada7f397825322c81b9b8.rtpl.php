<?php if(!class_exists('Rain\Tpl')){exit;}?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
            <h1>
                  Solicitacao <small>View</small>
           </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Acompanhamento Solicitação</li>
            <li class="active" >View Solicitação</li>
            
          </ol>
        
      
     
    </section>

    <section class="content">
            <section class="content-header">
      

            <div class="row">
                    <div class="col-md-11">
                        <a class="btn btn-info" href="/crede_cred/admin/solicitacao/acompanhamento">voltar</a>
                    </div>
                    <div class="col-md-1">
                   
                        <label>Exportar</label><a href="/crede_cred/admin/relatorio/solicitacao/view/pdf/<?php echo htmlspecialchars( $solcitacao['solicitacao_contrato_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info"><span class="fa fa-file-pdf-o"></span></a></li>
                    </div>  
                    <?php if( $usuario['perfil_id'] == 1 ){ ?>
                    <?php if( $solcitacao['status_id'] != 1 ){ ?>   
                    <div class="col-md-4">
                    <button class="btn btn-primary"  data-toggle="modal" data-target=".modal-dados-complementares" >Editar Dados Complementares</button>
                  </div>
                  <?php } ?>
                    <?php } ?>
                  </div>
                </section>


            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
      
        <div class="row">
            <div class="form-group">
                <div class="col-md-12">
                        <div class="col-md-6">
                <label>Cliente</label>
                 <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['nome_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                        </div>
                
            
           

                    <div class="col-md-3">
                        <div class="form-group">    
                            <label>Cpf</label>
                             <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['cpf'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                    </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">    
                                    <label>Rg</label>
                                     <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['rg'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                            </div>
                                    </div>       

                   
                </div>
                </div>
               
            </div>

            <div class="row">
                <div class="form-group">
                    <div class="col-md-12">
                            <div class="col-md-3">
                    <label>Email</label>
                     <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['email'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                            </div>
                    
                
                    <div class="col-md-3">
                    <div class="form-group">    
                        <label>Tipo Conta</label>
                         <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['tipo_conta'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                </div>
                        </div>
    
                        <div class="col-md-3">
                            <div class="form-group">    
                                <label>Banco</label>
                                 <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['banco'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                        </div>
                                </div>
    
                                <div class="col-md-3">
                                    <div class="form-group">    
                                        <label>Agencia</label>
                                         <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['agencia'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                                </div>
                                        </div>       
    
                       
                    </div>
                    </div>
                   
                </div>


                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                                <div class="col-md-3">
                        <label>Estado Civil</label>
                         <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['estado_civil'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                </div>
                        
                    
                        <div class="col-md-3">
                        <div class="form-group">    
                            <label>Endereço</label>
                             <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['endereco_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                    </div>
                            </div>
        
                            <div class="col-md-3">
                                <div class="form-group">    
                                    <label>Cidade</label>
                                     <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['cidade_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                            </div>
                                    </div>
        
                                    <div class="col-md-3">
                                        <div class="form-group">    
                                            <label>Bairro</label>
                                             <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['bairro'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
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
                          <h3 class="box-title">Contrato</h3>
                        </div>
            <div class="box-body">
                
                <div class="row">
                    <div class="form-group">
                        <div class="col-md-12">
                                <div class="col-md-4">
                        <label>Valor Emprestimo</label>
                         <label class="form-control">R$<?php echo formatNumber($solcitacao['valor_emprestimo']); ?></label>
                                </div>
                        
                    
                        <div class="col-md-4">
                        <div class="form-group">    
                            <label>Valor Parcela</label>
                             <label class="form-control" >R$<?php echo formatNumber($solcitacao['valor_parcela']); ?></label>
                                    </div>
                            </div>
        
                            <div class="col-md-4">
                                <div class="form-group">    
                                    <label>Prazo</label>
                                     <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['prazo'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                            </div>
                                    </div>
        
                           
                        </div>
                        </div>
                       
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12">
                                    <div class="col-md-3">
                            <label>Convênio Solicitação</label>
                             <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['convenio_solicitacao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                    </div>
                            
                        
                            <div class="col-md-3">
                            <div class="form-group">    
                                <label>Convênio</label>
                                 <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['convenio'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                        </div>
                                </div>
            
                                <div class="col-md-3">
                                    <div class="form-group">    
                                        <label>Tipo Contrato</label>
                                         <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['tipo_contrato'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                                </div>
                                        </div>
            
                                        <div class="col-md-3">
                                            <div class="form-group">    
                                                <label>Tabela de Convênio</label>
                                                 <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao['tabela_convenio'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" disabled />
                                                        </div>
                                                </div>       
            
                               
                            </div>
                            <div class="col-md-12">
                            <div class="col-md-3">
                            <div class="form-group">
                              <label class="control-label">Numero Contrato</label>
                              <input type="text" class="form-control" disabled value="<?php echo htmlspecialchars( $solcitacao["numero_contrato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required  name="numero_contrato"    />               
                            </div>
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
          <h3 class="box-title">Anexos</h3>
        </div>
<div class="box-body">
<div class="row">
        <?php if( $solcitacao['status_id'] != 1 ){ ?>   
        <div class="col-md-12">
    <button class="btn btn-primary"  data-toggle="modal" data-target=".modal-anexo-add" >Novo</button>
        </div> 
        <?php } ?>

</div>  
        <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Nome</th>
                    <th>Opções</th>
                  </tr>
                </thead>
                <tbody >

                        <?php $counter1=-1;  if( isset($anexos) && ( is_array($anexos) || $anexos instanceof Traversable ) && sizeof($anexos) ) foreach( $anexos as $key1 => $value1 ){ $counter1++; ?>
                        <tr>
                            <td></td>
                            <td><?php echo htmlspecialchars( $value1["tipo_documento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                            <td>
                                <a href="/crede_cred/<?php echo htmlspecialchars( $value1["arquivo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" target='_blank' class='btn btn-success' ><span class='fa  fa-download'></span></a>
                            <?php if( $solcitacao['status_id'] != 1 ){ ?>   
                                <a href="/crede_cred/admin/solicitacao/<?php echo htmlspecialchars( $solcitacao["solicitacao_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/anexo/delete/<?php echo htmlspecialchars( $value1["arquivo_solicitacao_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class='btn btn-danger' onclick="return confirm('Tem certeza que deseja excluir esse anexo do Tipo <?php echo htmlspecialchars( $value1["tipo_documento"], ENT_COMPAT, 'UTF-8', FALSE ); ?> ?');" ><span class='fa  fa-close'></span></a>
                            <?php } ?>
                            </td>
                          </tr>
                        <?php } ?>
                 
                </tbody>
              </table>

  
</div>

</div>
</div>

        
    </div>

    <?php if( $usuario['perfil_id'] == 1 ){ ?>

    <div class="modal fade modal-dados-complementares" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="gridSystemModalLabel">Dados Complementares</h4>
          </div>
          <div class="modal-body">
        
            <form method="POST" action="/crede_cred/admin/solicitacao/complemento/add" enctype="multipart/form-data" > 
          <input type="hidden" name="solicitacao_id" value="<?php echo htmlspecialchars( $solcitacao["solicitacao_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
                <label class="control-label">Numero Contrato</label>
                <input type="text" class="form-control" value="<?php echo htmlspecialchars( $solcitacao["numero_contrato"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required  name="numero_contrato"    />               
              </div>
            </div>  
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
                <label class="control-label">Valor Emprestimo</label>
                <input class="form-control" required type="text" value="<?php echo htmlspecialchars( $solcitacao["valor_emprestimo"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-mask="##.###,##" data-mask-reverse="true" data-mask-maxlength="false" name="valor_emprestimo" id="valor-emprestimo-id"    placeholder="Informe o Valor do Emprestimo !"    />               
              </div>
            </div>  
            <div class="col-md-6 col-md-offset-3">
              <div class="form-group">
                <label class="control-label">Valor Parcela</label>
                <input  class="form-control" required type="text" value="<?php echo htmlspecialchars( $solcitacao["valor_parcela"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" data-mask="##.###,##" data-mask-reverse="true" data-mask-maxlength="false" name="valor_parcela" id="valor-parcela-id"    placeholder="Informe o Valor da parcela !"        />               
              </div>
            </div>  
            <div class="col-md-4 col-md-offset-4">
              <input type="submit" value="Salvar" onclick="return confirm('deseje editar as informações complementares');" class="btn btn-primary btn-block" />
              </div>
          </div>
         
    
            </form>
           
    
          </div>
        </div><!-- /.modal-content -->
      </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
<?php } ?>


    <div class="modal fade modal-anexo-add" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <h4 class="modal-title" id="gridSystemModalLabel">Adicionar Anexo</h4>
                </div>
                <div class="modal-body">
              
                  <form method="POST" action="/crede_cred/admin/solicitacao/anexo/add" enctype="multipart/form-data" > 
                <input type="hidden" name="solicitacao_id" value="<?php echo htmlspecialchars( $solcitacao["solicitacao_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" />
                <div class="row">
                  <div class="col-md-6 col-md-offset-3">
                    <div class="form-group">
                      <label class="control-label">Tipo Documento</label>
                      <select name="tipo" class="form-control">
                      
                          <option value="CPF/RG">CPF e RG</option>
                          <option value="Comprovate de Residência" >Comprovate de Residência</option>
                          <option value="Contra cheque" >Contra cheque</option>
                          <option value="Outros" >Outros</option>       
                      </select>
                    </div>
                  </div>  
                  <div class="col-md-6 col-md-offset-3">
                        <div class="form-group">
                        <label class="control-label">Busca</label>
                         <input type="file" required  name="anexos[]" style="border:none;" class="form-control" multiple accept=".png , .pdf, .doc , .jpg" />
                        
                        </div>
                  </div>
                  <div class="col-md-4 col-md-offset-4">
                    <input type="submit" value="Adicionar" class="btn btn-primary btn-block" />
                    </div>
                </div>
               
          
                  </form>
                 
          
                </div>
              </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
          </div><!-- /.modal -->

    </section>
        </div>






