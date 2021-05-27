<?php if(!class_exists('Rain\Tpl')){exit;}?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
             <h1>
           Atualização de Solicitação <small>Emprestimo</small>
      </h1>
    </section>

    <section class="content">

      

            <div class="row">
                        <div class="col-md-12">

                <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" id="tab-solicitacao-id" class="active" ><a href="#solicitacao" aria-controls="solicitacao" role="tab" data-toggle="tab">Solicitação Contrato</a></li>
        <li role="presentation" id="tab-cliente-id"   class="disabled" ><a href="#cliente" aria-controls="cliente" role="tab"  >Dados do Cliente</a></li>
        <li role="presentation" id="tab-bancario-id"   class="disabled"><a href="#bancario" aria-controls="bancario" role="tab" >Dados Bancarios</a></li>
        <li role="presentation" id="tab-contrato-id" class="disabled"><a href="#contrato" aria-controls="contrato" role="tab" >Dados do Contrato</a></li>
      </ul>
    
      <!-- Tab panes -->
      <form method="POST" action="/admin/solicitacao/alterar">
            
   

      <div class="tab-content">

            <div role="tabpanel" class="tab-pane fade in active" id="solicitacao">

                <div class="row">


                    <div class="col-md-4">
                            <!--Solcitação contrato id -->
                                <input type="hidden" name="solicitacao_id" id="solicitacao-id"  value="<?php echo htmlspecialchars( $solicitacao['solicitacao_contrato_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"   class="form-control" placeholder="Digite o nome do Cliente">


                            <div class="form-group">
                                    <label>Convênio</label>
                                    <select class="form-control " name="convenio_solicitacao_id" id="solicitacao_id" required >
                                      <option value="0" disabled selected>Selecione uma Convenio</option>
                                       <?php $counter1=-1;  if( isset($convenioSolicitacoes) && ( is_array($convenioSolicitacoes) || $convenioSolicitacoes instanceof Traversable ) && sizeof($convenioSolicitacoes) ) foreach( $convenioSolicitacoes as $key1 => $value1 ){ $counter1++; ?>

                                       <option   <?php if( $value1["convenio_solicitacao_id"] == $solicitacao['convenio_solicitacao_id'] ){ ?> selected  <?php } ?>   value="<?php echo htmlspecialchars( $value1["convenio_solicitacao_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
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

                        <input type="hidden" name="cliente_id" id="cliente-id"  value="<?php echo htmlspecialchars( $solicitacao['cliente_id'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"   class="form-control" placeholder="Digite o nome do Cliente">

                    <div class="col-md-12">
     <div class="col-md-3">

            <div class="form-group">
                    <label>CPF<span style="color:red;">*</span></label>
                    <input type="text"  name="cpf" id="cpf-id" value="<?php echo htmlspecialchars( $solicitacao['cpf'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" required class="form-control" placeholder="Digite o CPF">
            </div>

     </div>
                    </div>
     <div class="col-md-12">

            <div class="col-md-6">
                    <div class="col-md-12">
                    <div class="form-group">
                            <label>Nome<span style="color:red;">*</span></label>
                            <input type="text" required  name="nome" id="nome-id" value="<?php echo htmlspecialchars( $solicitacao['nome_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o nome do Cliente">
                    </div>
                    </div>
                    
                    <div class="col-md-6">

                        <div class="form-group">
                                <label>Data de Nascimento</label>
                                <input type="date" name="nascimento" id="data-em-nascimento-id"  value="<?php echo htmlspecialchars( $solicitacao['data_nascimento'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"   class="form-control" placeholder="Digite o nome do Cliente">
                        </div>

                    </div>


                    <div class="col-md-6">

                            <div class="form-group">
                                    <label>RG<span style="color:red;">*</span></label>
                                    <input type="text" required name="rg" id="rg-id"  value="<?php echo htmlspecialchars( $solicitacao['rg'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o RG">
                            </div>
                    
                    </div>

                  
                   
                   

                    <div class="inss"> 
                    <div class="col-md-4">

                                <div class="form-group">
                                        <label>  Nº DO BENEFÍCIO <span style="color:red;">*</span></label>
                                        <input type="text" name="numero_beneficio" id="num-beneficio-id"  value="<?php echo htmlspecialchars( $solicitacao['numero_beneficio'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o numero do BENEFÍCIO">
                                </div>
                   </div>
                   <div class="col-md-4">

                                <div class="form-group">
                                        <label>   ESP. DO BENEFÍCIO <span style="color:red;">*</span></label>
                                        <input type="text" name="especie" id="especie-bene-id"  value="<?php echo htmlspecialchars( $solicitacao['especie_beneficio'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite a Especie do BENEFÍCIO">
                                </div>
                   </div>
                   <div class="col-md-4">

                                <div class="form-group">
                                        <label>  UF DO BENEFÍCIO <span style="color:red;">*</span></label>
                                        <input type="text" name="uf_beneficio" id="uf-beneficio-id"  value="<?php echo htmlspecialchars( $solicitacao['uf_beneficio'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite a UF do BENEFÍCIO">
                                </div>
                   </div>
                    
                </div>
                <div>
                    <div class="outros_conv">
                                <div class="col-md-4">

                                                <div class="form-group">
                                                        <label> Nº DA MATRÍCULA <span style="color:red;">*</span></label>
                                                        <input type="text" name="numero_matricula"  value="<?php echo htmlspecialchars( $solicitacao['numero_matricula'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="num-matricula-id"  class="form-control" placeholder="Digite o numero da Matricula">
                                                </div>
                                   </div>
                                   <div class="col-md-4">
                
                                                <div class="form-group">
                                                        <label>  SENHA <span style="color:red;">*</span></label>
                                                        <input type="text" name="senha_matri" id="senha_matri-id"  value="<?php echo htmlspecialchars( $solicitacao['senha'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite a Senha">
                                                </div>
                                   </div>     
                                </div>
                                
                                




                </div>



                    <div class="col-md-6">

                                <div class="form-group">
                                        <label>Naturalidade</label>
                                        <input type="text" name="naturalidade" id="naturalidade-id"  value="<?php echo htmlspecialchars( $solicitacao['naturalidade'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite a Naturalidade">
                                </div>
                            </div>

                   


                        <div class="col-md-6">

                                <div class="form-group">
                                        <label>Estado Civil<span style="color:red;">*</span></label>
                                        <select class="form-control" name="estado_civil"   value="<?php echo htmlspecialchars( $solicitacao['estado_civil'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="estado_civil-id">
                                        <option  <?php if( $solicitacao['estado_civil'] =='Solteiro'  ){ ?> selected <?php } ?> value="Solteiro">Solteiro(a)</option>
                                        <option  <?php if( $solicitacao['estado_civil'] =='Casado' ){ ?> selected <?php } ?> value="Casado">Casado(a)</option>
                                        <option  <?php if( $solicitacao['estado_civil'] =='Divorciado'  ){ ?> selected <?php } ?> value="Divorciado">Divorciado(a)</option>
                                        <option  <?php if( $solicitacao['estado_civil'] =='Viuvo'  ){ ?> selected <?php } ?> value="Viuvo">Viúvo(a)</option>
                                        </select>
                                </div>
                        
                        </div>

                        <div class="col-md-6">

                                <div class="form-group">
                                        <label>CEP<span style="color:red;">*</span></label>
                                        <input type="number"  name="cep" id="cep-id"  value="<?php echo htmlspecialchars( $solicitacao['cep'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o cep só numeros">
                                </div>
                        
                        </div>
                        <div class="col-md-6">
    
                                <div class="form-group">
                                        <label>Municipio<span style="color:red;">*</span></label>
                                        <input type="text"  name="municipio" id="municipio-id"  value="<?php echo htmlspecialchars( $solicitacao['cidade_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o Municipio">
                                </div>
    
                            </div>

                            <div class="col-md-12">

                                    <div class="form-group">
                                            <label>Endereco<span style="color:red;">*</span></label>
                                            <input type="text" required name="endereco" id="endereco-id"   value="<?php echo htmlspecialchars( $solicitacao['endereco_cliente'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="form-control" placeholder="Digite o endereço"/>
                                    </div>
                        </div>
                        
            </div>

            <div class="col-md-6">
                <div class="col-md-12">

                    <div class="form-group">
                            <label>Nome da Mãe</label>
                            <input type="text" name="nome_mae" id="nome-mae-id"  class="form-control"  value="<?php echo htmlspecialchars( $solicitacao['nome_mae'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" placeholder="Digite o nome da Mãe">
                    </div>
                </div>


                <div class="col-md-6">

                        <div class="form-group">
                                <label>Orgão Emissor<span style="color:red;">*</span></label>
                                <input type="text" name="orgao" id="orgao-id"  value="<?php echo htmlspecialchars( $solicitacao['orgao_emissor'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o Orgão">
                        </div>
                    </div>

                    <div class="col-md-6">

                                <div class="form-group">
                                        <label>Data Emissão</label>
                                        <input type="date" required name="data_emissao" id="data-em-rg-id"  value="<?php echo htmlspecialchars( $solicitacao['data_emissao'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o nome do Cliente">
                                </div>
    
                            </div>

                            
                            
                           

                            <div class="inss"> 
                                        <div class="col-md-6">
                    
                                                    <div class="form-group">
                                                            <label>SENHA DO  BENEFÍCIO  <span style="color:red;">*</span></label>
                                                            <input type="text" name="senha_beneficio"  value="<?php echo htmlspecialchars( $solicitacao['senha_beneficio'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="senha-beneficio-id"  class="form-control" placeholder="Digite a Senha do BENEFÍCIO">
                                                    </div>
                                       </div>
                                       <div class="col-md-6">
                    
                                                    <div class="form-group">
                                                            <label>   RENDA <span style="color:red;">*</span></label>
                                                            <input class="simple-field-data-mask-reverse form-control"  value="<?php echo htmlspecialchars( $solicitacao['renda'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" type="text" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false" name="renda" id="renda-bene-id"    placeholder="Informe a Renda !">
                                                    </div>
                                       </div>     
                            </div>
                   

                    <div class="col-md-6">

                        <div class="form-group">
                                <label>Telefone<span style="color:red;">*</span></label>
                                <input type="tel" name="telefone" id="telefone-id"  value="<?php echo htmlspecialchars( $solicitacao['telefone'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o Telefone">
                        </div>
                    </div>

                <div class="col-md-12">

                        <div class="form-group">
                                <label>Email<span style="color:red;">*</span></label>
                                <input type="email" name="email"  value="<?php echo htmlspecialchars( $solicitacao['email'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="email-id"  class="form-control" placeholder="Digite o email">
                        </div>
                    </div>

                    
                    <div class="col-md-6">

                            <div class="form-group">
                                    <label>Bairro<span style="color:red;">*</span></label>
                                    <input type="text" name="bairro"  value="<?php echo htmlspecialchars( $solicitacao['bairro'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="bairro-id"  class="form-control" placeholder="Digite o Bairro">
                            </div>
                    
                    </div>
                    <div class="col-md-6">

                            <div class="form-group">
                                    <label>Estado</label>
                                    <input type="text" name="estado"  value="<?php echo htmlspecialchars( $solicitacao['estado'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="estado-id"  class="form-control" placeholder="Digite o Estado">
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
  
        <div class="col-md-5 msg-cliente">

        </div>
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
                                                                   <select class="form-control" name="tipo_conta" value="<?php echo htmlspecialchars( $solicitacao['tipo_conta'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" id="tipo_conta_id">
                                                                    <option value="0" disabled selected>Selecione</option>  
                                                                    <option  <?php if( $solicitacao['tipo_conta'] =='CONTA_CORRENTE' ){ ?> selected <?php } ?> value="CONTA_CORRENTE" >CONTA CORRENTE</option>   
                                                                    <option <?php if( $solicitacao['tipo_conta'] =='CONTA_JURIDICA' ){ ?> selected <?php } ?> value="CONTA_JURIDICA" >CONTA JURÍDICA</option>  
                                                                    <option <?php if( $solicitacao['tipo_conta'] =='CONTA_POUPANCA' ){ ?> selected <?php } ?> value="CONTA_POUPANCA" >CONTA POUPANÇA</option>   
                                                                    <option <?php if( $solicitacao['tipo_conta'] =='ORDEM_DE_PAGAMENTO' ){ ?> selected <?php } ?> value="ORDEM_DE_PAGAMENTO" >ORDEM DE PAGAMENTO</option>  
                                                                   </select>
                                                        </div>

                                        </div>
                                        <div class="col-md-6">
                                                
                            <div class="form-group">
                                        <label>Banco<span style="color:red;">*</span></label>
                                        <input type="text" name="banco" id="banco-id" value="<?php echo htmlspecialchars( $solicitacao['banco'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  class="form-control" placeholder="Digite o Banco">
                            </div>
    
                                        </div>
                                      
                                </div>


                                <div class="col-md-6">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                                        <label>Agencia<span style="color:red;">*</span></label>
                                                                        <input type="text" value="<?php echo htmlspecialchars( $solicitacao['agencia'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="agencia" id="agencia-id"  class="form-control" placeholder="Digite o Banco">
                                             </div>



                                        </div>

                                        <div class="col-md-6">
                                                        <div class="form-group div-conta" >
                                                                                    <label>Conta<span style="color:red;">*</span></label>
                                                                                    <input type="text" value="<?php echo htmlspecialchars( $solicitacao['conta'], ENT_COMPAT, 'UTF-8', FALSE ); ?>" name="conta" id="conta-id"  class="form-control" placeholder="Digite o Banco">
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

                                                  <option <?php if( $solicitacao['banco_id'] == $value1["banco_id"] ){ ?> selected <?php } ?>  value="<?php echo htmlspecialchars( $value1["banco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           
                                                  <?php } ?>

                                                </select>
                                 </div>
                        </div>




                       

                        <div class="col-md-6">
                                        <div class="form-group">
                                                        <label>Convênio<span style="color:red;">*</span></label>
                                                        <select class="form-control select-convenio" id="selecao-convenio-solit"  required>
                                                                <?php $counter1=-1;  if( isset($convenios) && ( is_array($convenios) || $convenios instanceof Traversable ) && sizeof($convenios) ) foreach( $convenios as $key1 => $value1 ){ $counter1++; ?> 
                                                         
                                                                <option <?php if( $solicitacao['convenio_contrato_id'] == $value1["convenio_contrato_id"] ){ ?> selected <?php } ?>  value="<?php echo htmlspecialchars( $value1["convenio_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           


                                                                <?php } ?>


                                                        </select>
                                        </div>
        
        
                                </div>




                        <div class="col-md-6">
                                        <div class="form-group">
                                                        <label>Prazo<span style="color:red;">*</span></label>
                                                        <select name="prazo_id" id="prazo-id"  class="form-control o"  >
                                                         
                                                          <?php $counter1=-1;  if( isset($prazos) && ( is_array($prazos) || $prazos instanceof Traversable ) && sizeof($prazos) ) foreach( $prazos as $key1 => $value1 ){ $counter1++; ?>

                                                          <option <?php if( $solicitacao['item_prazo_convenio_id'] == $value1["item_prazo_convenio_id"] ){ ?> selected <?php } ?>  value="<?php echo htmlspecialchars( $value1["item_prazo_convenio_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           

                                                          <?php } ?>

                                                        </select>
                                         </div>
                                </div>




                        <div class="col-md-6">
                                                
                                        <div class="form-group">
                                                        <label>Fator</label>
                                                        <input class=" form-control" value="<?php echo htmlspecialchars( $solicitacao['fator'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  type="text"  name="fator" >
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
                                                                        <?php $counter1=-1;  if( isset($itemTiposContrato) && ( is_array($itemTiposContrato) || $itemTiposContrato instanceof Traversable ) && sizeof($itemTiposContrato) ) foreach( $itemTiposContrato as $key1 => $value1 ){ $counter1++; ?>

                                                                        <option <?php if( $solicitacao['item_tipo_contrato_id'] == $value1["item_tipo_contrato_id"] ){ ?> selected <?php } ?>  value="<?php echo htmlspecialchars( $value1["item_tipo_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["tipo_contrato"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           

                                                                        <?php } ?>

                                                                                 
                                                                        </select>
                                                        </div>
                        
                        
                                                </div>

                                       



                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                                        <label>Tabela de Convênio<span style="color:red;">*</span></label>
                                                                        <select name="tabela_convenio_id" class="form-control select-tabela-convenio"  required>
                                                                          
                                                                                <?php $counter1=-1;  if( isset($tabelasConvenio) && ( is_array($tabelasConvenio) || $tabelasConvenio instanceof Traversable ) && sizeof($tabelasConvenio) ) foreach( $tabelasConvenio as $key1 => $value1 ){ $counter1++; ?>

                                                                                <option <?php if( $solicitacao['tabela_convenio_id'] == $value1["tabela_convenio_id"] ){ ?> selected <?php } ?>  value="<?php echo htmlspecialchars( $value1["tabela_convenio_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>"><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>           
        
                                                                                <?php } ?>

                                                                                
                                                                                
                                                                        </select>
                                                        </div>
                        
                        
                                                </div>

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                                <label>   Valor Emprestimo <span style="color:red;">*</span></label>
                                                                <input class="simple-field-data-mask-reverse form-control"  value="<?php echo htmlspecialchars( $solicitacao['valor_emprestimo'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  type="text" data-mask="#.###,##" data-mask-reverse="true" data-mask-maxlength="false" name="valor_emprestimo" id="valor-emprestimo-id"    placeholder="Informe o Valor do Emprestimo !">
                                                </div>
                                                </div>


                                                <div class="col-md-6">
                                                
                                                <div class="form-group">
                                                                <label>   Valor Parcela <span style="color:red;">*</span></label>
                                                                <input class="simple-field-data-mask-reverse form-control"  value="<?php echo htmlspecialchars( $solicitacao['valor_parcela'], ENT_COMPAT, 'UTF-8', FALSE ); ?>"  type="text" data-mask="#.##0,00" data-mask-reverse="true" data-mask-maxlength="false" name="valor_parcela" id="valor-parcela-id"    placeholder="Informe o valor da parcela !">
                                                        </div>

                                                  </div>      


                                </div>



                </div>


                <div class="row">
                        <div class="col-md-4">
                                <a href="#bancario" id="btn-volta-bancario" aria-controls="bancario" role="tab" data-toggle="tab" class="btn btn-primary"> <span class="fa  fa-chevron-left"></span>  voltar </a>
                                <input type="submit" class="btn btn-success" value="Atualizar">
                               </div>
                           </div>
                               <div class="row" style="margin-top:15px;">
                             
                                   <div class="col-md-5 msg-contrato">
                           
                                   </div>
                         </div>

        </div>
       <!--Fim Dados Cadastro -->

      </div>

    </form>

            </div>



        </div>
   

    </section>
        </div>




