<?php if(!class_exists('Rain\Tpl')){exit;}?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
             <h1>
           Solicitação <small>Emprestimo</small>
      </h1>
    </section>

    <section class="content">

      

            <div class="row">

                        <div class="col-md-5 msg-cad">

                        </div>

                        <div class="col-md-12">


                <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" id="tab-solicitacao-id" class="active" ><a href="#solicitacao" aria-controls="solicitacao" role="tab" data-toggle="tab">Solicitação Contrato</a></li>
        <li role="presentation" id="tab-cliente-id"   class="disabled" ><a href="#cliente" aria-controls="cliente" role="tab"  >Dados do Cliente</a></li>
        <li role="presentation" id="tab-bancario-id"   class="disabled"><a href="#bancario" aria-controls="bancario" role="tab" >Dados Bancarios</a></li>
        <li role="presentation" id="tab-contrato-id" class="disabled"><a href="#contrato" aria-controls="contrato" role="tab" >Dados do Contrato</a></li>
        <li role="presentation" id="tab-documento-id"  class="disabled"><a href="#documento" aria-controls="documento" role="tab" >Anexo de Documentos</a></li>
      </ul>
    
      <!-- Tab panes -->
      <form method="POST" action="/admin/solicitacao/enviar" enctype="multipart/form-data">
            
   

      <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in active" id="solicitacao">

                <div class="row">

                    <div class="col-md-4">

                            <div class="form-group">
                                    <label>Convênio Solicitação</label>
                                    <select class="form-control " name="convenio_solicitacao_id" id="solicitacao_id" required >
                                      <option value="0" disabled selected>Selecione uma Convenio</option>
                                       <?php $counter1=-1;  if( isset($convenioSolicitacoes) && ( is_array($convenioSolicitacoes) || $convenioSolicitacoes instanceof Traversable ) && sizeof($convenioSolicitacoes) ) foreach( $convenioSolicitacoes as $key1 => $value1 ){ $counter1++; ?>

                                       <option value="<?php echo htmlspecialchars( $value1["convenio_solicitacao_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                                       <?php } ?>

                                    </select>
                                </div>


                    </div>



                </div>
                <div class="row">
                        <div class="col-md-4">
                                <a href="#cliente" id="btn-passo-cliente" aria-controls="cliente" role="tab" data-toggle="tab" class="btn btn-primary">Avançar <span class="fa fa-chevron-right"></span></a>
                        </div>
                </div>
                <div class="row" style="margin-top:15px;">
                <div class="msg-solicitacao col-md-5">


                </div>
                </div>



            </div>

        <div role="tabpanel" class="tab-pane " id="cliente">
            <!-- Inicio Tab cliente -->
            <div>
                    <div class="col-md-12">
     <div class="col-md-3">

            <div class="form-group">
                    <label>CPF<span style="color:red;">*</span></label>
                    <input type="text"  name="cpf" id="cpf-id" required class="form-control" placeholder="Digite o CPF">
            </div>

     </div>
                    </div>
     <div class="col-md-12">

            <div class="col-md-6">
                    <div class="col-md-12">
                    <div class="form-group">
                            <label>Nome<span style="color:red;">*</span></label>
                            <input type="text" required  name="nome" id="nome-id"  class="form-control" placeholder="Digite o nome do Cliente">
                    </div>
                    </div>
                    
                    <div class="col-md-6">

                        <div class="form-group">
                                <label>Data de Nascimento</label>
                                <input type="date" name="nascimento" id="data-em-nascimento-id"  class="form-control" placeholder="Digite o nome do Cliente">
                        </div>

                    </div>


                    <div class="col-md-6">

                            <div class="form-group">
                                    <label>RG<span style="color:red;">*</span></label>
                                    <input type="text" required name="rg" id="rg-id"  class="form-control" placeholder="Digite o RG">
                            </div>
                    
                    </div>

                  
                   
                   

                    <div class="inss"> 
                    <div class="col-md-4">

                                <div class="form-group">
                                        <label>  Nº DO BENEFÍCIO <span style="color:red;">*</span></label>
                                        <input type="text" name="numero_beneficio" id="num-beneficio-id"  class="form-control" placeholder="Digite o numero do BENEFÍCIO">
                                </div>
                   </div>
                   <div class="col-md-4">

                                <div class="form-group">
                                        <label>   ESP. DO BENEFÍCIO <span style="color:red;">*</span></label>
                                        <input type="text" name="especie" id="especie-bene-id"  class="form-control" placeholder="Digite a Especie do BENEFÍCIO">
                                </div>
                   </div>
                   <div class="col-md-4">

                                <div class="form-group">
                                        <label>  UF DO BENEFÍCIO <span style="color:red;">*</span></label>
                                        <input type="text" name="uf_beneficio" id="uf-beneficio-id"  class="form-control" placeholder="Digite a UF do BENEFÍCIO">
                                </div>
                   </div>
                    
                </div>
                <div>
                    <div class="outros_conv">
                                <div class="col-md-4">

                                                <div class="form-group">
                                                        <label> Nº DA MATRÍCULA <span style="color:red;">*</span></label>
                                                        <input type="text" name="numero_matricula" id="num-matricula-id"  class="form-control" placeholder="Digite o numero da Matricula">
                                                </div>
                                   </div>
                                   <div class="col-md-4">
                
                                                <div class="form-group">
                                                        <label>  SENHA <span style="color:red;">*</span></label>
                                                        <input type="number" name="senha_matri" id="senha_matri-id"  class="form-control" placeholder="Digite a Senha">
                                                </div>
                                   </div>     
                                </div>
                                
                                




                </div>



                    <div class="col-md-6">

                                <div class="form-group">
                                        <label>Naturalidade</label>
                                        <input type="text" name="naturalidade" id="naturalidade-id"  class="form-control" placeholder="Digite a Naturalidade">
                                </div>
                            </div>

                   


                        <div class="col-md-6">

                                <div class="form-group">
                                        <label>Estado Civil<span style="color:red;">*</span></label>
                                        <select class="form-control" name="estado_civil" id="estado_civil-id">
                                        <option value="Solteiro">Solteiro(a)</option>
                                        <option value="Casado">Casado(a)</option>
                                        <option value="Solteiro">Solteiro(a)</option>
                                        <option value="Viuvo(a)">Viúvo(a)</option>
                                        </select>
                                </div>
                        
                        </div>

                        <div class="col-md-6">

                                <div class="form-group">
                                        <label>CEP<span style="color:red;">*</span></label>
                                        <input type="number"  name="cep" id="cep-id"  class="form-control" placeholder="Digite o cep só numeros">
                                </div>
                        
                        </div>
                        <div class="col-md-6">
    
                                <div class="form-group">
                                        <label>Municipio<span style="color:red;">*</span></label>
                                        <input type="text"  name="municipio" id="municipio-id"  class="form-control" placeholder="Digite o Municipio">
                                </div>
    
                            </div>

                            <div class="col-md-12">

                                    <div class="form-group">
                                            <label>Endereco<span style="color:red;">*</span></label>
                                            <input type="text" required name="endereco" id="endereco-id"  class="form-control" placeholder="Digite o endereço"/>
                                    </div>
                        </div>
                        
            </div>

            <div class="col-md-6">
                <div class="col-md-12">

                    <div class="form-group">
                            <label>Nome da Mãe</label>
                            <input type="text" name="nome_mae" id="nome-mae-id"  class="form-control" placeholder="Digite o nome da Mãe">
                    </div>
                </div>


                <div class="col-md-6">

                        <div class="form-group">
                                <label>Orgão Emissor<span style="color:red;">*</span></label>
                                <input type="text" name="orgao" id="orgao-id"  class="form-control" placeholder="Digite o Orgão">
                        </div>
                    </div>

                    <div class="col-md-6">

                                <div class="form-group">
                                        <label>Data Emissão</label>
                                        <input type="date" required name="data_emissao" id="data-em-rg-id"  class="form-control" placeholder="Digite o nome do Cliente">
                                </div>
    
                            </div>

                            
                            
                           

                            <div class="inss"> 
                                        <div class="col-md-6">
                    
                                                    <div class="form-group">
                                                            <label>SENHA DO  BENEFÍCIO  <span style="color:red;">*</span></label>
                                                            <input type="text" name="senha_beneficio" id="senha-beneficio-id"  class="form-control" placeholder="Digite a Senha do BENEFÍCIO">
                                                    </div>
                                       </div>
                                       <div class="col-md-6">
                    
                                                    <div class="form-group">
                                                            <label>   RENDA <span style="color:red;">*</span></label>
                                                            <input class="simple-field-data-mask-reverse form-control" type="text" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false" name="renda" id="renda-bene-id"    placeholder="Informe a Renda !">
                                                    </div>
                                       </div>     
                            </div>
                   

                    <div class="col-md-6">

                        <div class="form-group">
                                <label>Telefone<span style="color:red;">*</span></label>
                                <input type="tel" name="telefone" id="telefone-id"  class="form-control" placeholder="Digite o Telefone">
                        </div>
                    </div>

                <div class="col-md-12">

                        <div class="form-group">
                                <label>Email<span style="color:red;">*</span></label>
                                <input type="email" name="email" id="email-id"  class="form-control" placeholder="Digite o email">
                        </div>
                    </div>

                    
                    <div class="col-md-6">

                            <div class="form-group">
                                    <label>Bairro<span style="color:red;">*</span></label>
                                    <input type="text" name="bairro" id="bairro-id"  class="form-control" placeholder="Digite o Bairro">
                            </div>
                    
                    </div>
                    <div class="col-md-6">

                            <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="estado" id="estado-id"  class="form-control" placeholder="Digite o Estado">
                            </div>

                        </div>

                        


            </div>
     
     </div>
     <div class="row">
     <div class="col-md-4">
     <a href="#solicitacao" id="btn-passo-solicitacao" aria-controls="solicitacao" role="tab" data-toggle="tab" class="btn btn-primary"> <span class="fa  fa-chevron-left"></span>  voltar </a>
     <a href="#bancario" id="btn-passo-bancario" aria-controls="bancario" role="tab" data-toggle="tab"    class="btn btn-primary">Avançar <span class="fa fa-chevron-right"></span></a>
    </div>
</div>
    <div class="row" style="margin-top:15px;">
  
       
    </div>
    </div>
 <!-- Fim Tab cliente -->

  <!-- Inicio Dados Bancarios -->
       
        </div>
         <!-- Inicio Dados Bancarios -->
        <div role="tabpanel" class="tab-pane "  id="bancario">

                        <div class="row ">        
        
                                <div class="col-md-6">
                                        <div class="col-md-6">

                                                        <div class="form-group">

                                                               <label>TIPO DE CONTA <span style="color:red;">*</span></label>
                                                                   <select class="form-control" name="tipo_conta" id="tipo_conta_id">
                                                                    <option value="0" disabled selected>Selecione</option>  
                                                                    <option value="CONTA_CORRENTE" >CONTA CORRENTE</option>   
                                                                    <option value="CONTA_JURIDICA" >CONTA JURÍDICA</option>  
                                                                    <option value="CONTA_POUPANCA" >CONTA POUPANÇA</option>   
                                                                    <option value="ORDEM_DE_PAGAMENTO" >ORDEM DE PAGAMENTO</option>  
                                                                   </select>
                                                        </div>

                                        </div>
                                        <div class="col-md-6">
                                                
                            <div class="form-group">
                                        <label>Banco<span style="color:red;">*</span></label>
                                        <input type="text" name="banco" id="banco-id"  class="form-control" placeholder="Digite o Banco">
                            </div>
    
                                        </div>
                                      
                                </div>


                                <div class="col-md-6">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                                        <label>Agencia<span style="color:red;">*</span></label>
                                                                        <input type="text" name="agencia" id="agencia-id"  class="form-control" placeholder="Digite o Banco">
                                             </div>



                                        </div>

                                        <div class="col-md-6">
                                                        <div class="form-group div-conta" >
                                                                                    <label>Conta<span style="color:red;">*</span></label>
                                                                                    <input type="text" name="conta" id="conta-id"  class="form-control" placeholder="Digite o Banco">
                                                         </div>
            
            
            
                                                    </div>



                                        </div>
                                
       
        
        
        
        
                       </div>

                       <div class="row">
                                <div class="col-md-4">
                                <a href="#cliente" id="btn-volta-cliente" aria-controls="cliente" role="tab" data-toggle="tab" class="btn btn-primary"> <span class="fa  fa-chevron-left"></span>  voltar </a>
                                <a href="#contrato" id="btn-passo-contrato" aria-controls="contrato" role="tab" data-toggle="tab" class="btn btn-primary">Avançar <span class="fa fa-chevron-right"></span></a>
                               </div>
                           </div>
                               <div class="row" style="margin-top:15px;">
                             
                                   <div class="col-md-5 msg-bancario">
                           
                                   </div>
                                </div>
           
        </div>
         <!-- Fim Dados Bancarios -->

         <!--Inicio Dados Cadastro -->
        <div role="tabpanel" class="tab-pane" id="contrato">
                        
         
                <div class="row">
                        <!--Esquerda -->
                 <div class="col-md-6">

                             


                         <div class="col-md-6">
                                <div class="form-group">
                                                <label>Banco<span style="color:red;">*</span></label>
                                                <select class="form-control select-banco" id="selecao_banco_soli" required >
                                                  <option value="0" disabled selected>Selecione um Banco</option>
                                                    <?php $counter1=-1;  if( isset($bancos) && ( is_array($bancos) || $bancos instanceof Traversable ) && sizeof($bancos) ) foreach( $bancos as $key1 => $value1 ){ $counter1++; ?>

                                                  <option value="<?php echo htmlspecialchars( $value1["banco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           
                                                  <?php } ?>

                                                </select>
                                 </div>
                        </div>




                       

                        <div class="col-md-6">
                                        <div class="form-group">
                                                        <label>Convênio<span style="color:red;">*</span></label>
                                                        <select class="form-control select-convenio" id="selecao-convenio-solit"  required>
                                                                 
                                                        </select>
                                        </div>
        
        
                                </div>




                        <div class="col-md-6">
                                        <div class="form-group">
                                                        <label>Prazo<span style="color:red;">*</span></label>
                                                        <select name="prazo_id" id="prazo-id" class="form-control o"  >
                                                          <option value="0" disabled selected>Selecione um Prazo</option>
                                                           
                                                        </select>
                                         </div>
                                </div>




                        <div class="col-md-6">
                                                
                                        <div class="form-group">
                                                        <label>Fator</label>
                                                        <input class=" form-control"  type="text"  name="fator" >
                                                </div>

                                          </div>    

                       

                 </div>

                          <!--Direrita -->
                          <div class="col-md-6">




                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                        <label>Tipo Contrato<span style="color:red;">*</span></label>
                                                                        <select  id="tipo_contrato" class="form-control"  required>

                                                                       <option value="0" disabled selected>Selecione o Tipo Contrato</option>

                                                                                 
                                                                        </select>
                                                        </div>
                        
                        
                                                </div>

                                       



                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                        <label>Tabela de Convênio<span style="color:red;">*</span></label>
                                                                        <select name="tabela_convenio_id" class="form-control select-tabela-convenio"  required>
                                                                                 
                                                                        </select>
                                                        </div>
                        
                        
                                                </div>

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                                <label>   Valor Emprestimo <span style="color:red;">*</span></label>
                                                                <input class="simple-field-data-mask-reverse form-control"  type="text" data-mask="#.###,##" data-mask-reverse="true" data-mask-maxlength="false" name="valor_emprestimo" id="valor-emprestimo-id"    placeholder="Informe o Valor do Emprestimo !">
                                                </div>
                                                </div>


                                                <div class="col-md-6">
                                                
                                                <div class="form-group">
                                                                <label>   Valor Parcela <span style="color:red;">*</span></label>
                                                                <input class="simple-field-data-mask-reverse form-control"  type="text" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false" name="valor_parcela" id="valor-parcela-id"    placeholder="Informe o valor da parcela !">
                                                        </div>

                                                  </div>      


                                </div>



                </div>


                <div class="row">
                        <div class="col-md-4">
                                <a href="#bancario" id="btn-volta-bancario" aria-controls="bancario" role="tab" data-toggle="tab" class="btn btn-primary"> <span class="fa  fa-chevron-left"></span>  voltar </a>
                                <a href="#documento" id="btn-passo-documento" aria-controls="documento" role="tab" data-toggle="tab" class="btn btn-primary">Avançar <span class="fa fa-chevron-right"></span></a>
                               </div>
                           </div>
                               <div class="row" style="margin-top:15px;">
                             
                                   <div class="col-md-5 msg-contrato">
                           
                                   </div>
                         </div>

        </div>
       <!--Fim Dados Cadastro -->

        <div role="tabpanel" class="tab-pane" id="documento">

                



                <div class="row">

                        <div class="col-md-6 col-md-offset-3">
                                        <div class="form-group">
                                                        <label for="cpf-documento-id">Anexo do CPF/RG</label>
                                                        <input type="file"  required name="documento_cpf[]" multiple id="cpf-documento-id" accept=".png , .pdf, .doc , .jpg">
                                                        <p class="help-block">Upload Apenas de Arquivos no formato (pdf,doc,png,jpg)</p>
                        </div>
                        </div>

                </div>


          

                <div class="row">

                                <div class="col-md-6 col-md-offset-3">
                                                <div class="form-group">
                                                                <label for="residencia-id">Anexo comprovante de Residência</label>
                                                                <input type="file"  required name="documento_residencia[]" id="residencia-id" accept=".png , .pdf, .doc , .jpg">
                                                                <p class="help-block">Upload Apenas de Arquivos no formato (pdf,doc,png,jpg)</p>
                                </div>
                                </div>
        
                        </div>

                        <div class="row">

                                        <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group">
                                                                        <label for="contracheque-id">Anexo do Contracheque</label>
                                                                        <input type="file"  required name="documento_contracheque[]" id="contracheque-id" accept=".png , .pdf, .doc , .jpg">
                                                                        <p class="help-block">Upload Apenas de Arquivos no formato (pdf,doc,png,jpg)</p>
                                        </div>
                                        </div>
                
                        </div>


                        
                        <div class="row">

                                        <div class="col-md-6 col-md-offset-3">
                                                        <div class="form-group">
                                                                        <label for="outros-id">Anexo de Outros Documentos</label>
                                                                        <input type="file" multiple   name="documento_outros[]" id="outros-id" accept=".png , .pdf, .doc , .jpg">
                                                                        <p class="help-block">Upload Apenas de Arquivos no formato (pdf,doc,png,jpg)</p>
                                        </div>
                                        </div>
                
                        </div>







                
                        <div class="row">
                                        <div class="col-md-4">
                                                <a href="#contrato" id="btn-volta-contrato" aria-controls="contrato" role="tab" data-toggle="tab" class="btn btn-primary"> <span class="fa  fa-chevron-left"></span>  voltar </a>
                                                <button type="submit"   class="btn btn-success"   >Enviar Solicitação</button>
                                               </div>
                                           </div>
                                               <div class="row" style="margin-top:15px;">
                                             
                                                   <div class="col-md-5 msg-contrato">
                                           
                                                   </div>
                                         </div>
        </div>
      </div>

    </form>

            </div>



        </div>
   

    </section>
        </div>




