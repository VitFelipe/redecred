<?php if(!class_exists('Rain\Tpl')){exit;}?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
            <h1>
                Clientes
           </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Cadastro</li>
            <li >Cliente</li>
            
          </ol>
        
      
     
    </section>

    <section class="content">
      
        <!--<div class="row">
           <div class="col-md-12">
            <a href="/crede_cred/admin/usuario/add" class="btn btn-primary"><span class="fa fa-plus"> </span> Novo</a>
           </div>
        </div>-->

            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
                        <div class="box-header">
                          <h3 class="box-title">Tabela de Clientes</h3>
            <div class="box-body">
                    <table  class="table table-bordered table-hover table-style">
                      <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Nome</th>
                        <th>Rg</th>
                        <th>Cpf</th>
                        <th>Email</th>
                        <th>Municipio</th>
                        <th>Telefone</th>
                        <th>Opções</th>
                      </tr>
                      </thead>
                      <tbody>
                          <?php $counter1=-1;  if( isset($clientes) && ( is_array($clientes) || $clientes instanceof Traversable ) && sizeof($clientes) ) foreach( $clientes as $key1 => $value1 ){ $counter1++; ?>

                          <tr>
                                <td class="id-client"><?php echo htmlspecialchars( $value1["cliente_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["rg"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["email"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["cidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["telefone"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>  
                                        <a class="btn btn-info busca-info "  data-target=".modal-informacao"  data-toggle="modal" ><span class="fa  fa-search  "> </span></a>
                                </td>
                          </tr>
                          <?php } ?>

 
                     </tbody>
                        <tfoot>
                        <tr>
                            <th>Codigo</th>
                            <th>Nome</th>
                            <th>Rg</th>
                            <th>Cpf</th>
                            <th>Email</th>
                            <th>Municipio</th>
                            <th>Telefone</th>
                            <th>Opções</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
   
</div>
</div>
</div>


<div class="modal fade  modal-informacao " tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel2">
    <div class="modal-dialog modal-lg" role="document">
           
      <div class="modal-content">
            <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel2">Informações do Cliente</h4>
                  </div>
          <div class="modal-body"> 
            <div class="row">
          <div class="col-md-12">
            <div class="col-md-4">
              <div class="form-group">
                <label class="control-label" >Nome</label>
                <input class="form-control" readonly  id="info-nome" />


              </div>
            </div>
            <!--RG-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >RG</label>
                  <input class="form-control" readonly  id="info-rg" />
  
  
                </div>
              </div>


               <!--CPF-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >CPF</label>
                  <input class="form-control" readonly  id="info-cpf" />
  
  
                </div>
              </div>


                <!--Orgão Emissor-->
            <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label" >Orgão Emissor</label>
                  <input class="form-control" readonly  id="info-orgao" />
  
  
                </div>
              </div>


                <!--Data Emissao-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >Data Emissão</label>
                  <input class="form-control" readonly id="info-data-emissao" />
  
  
                </div>
              </div>


               

              
               <!--Nascimento-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >Data Nascimento</label>
                  <input class="form-control" readonly id="info-nascimento" />
  
  
                </div>
              </div>


                <!--Email-->
            <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label" >Nome da Mãe</label>
                  <input class="form-control" readonly  id="info-mae" />
  
  
                </div>
              </div>
              

                <!--Cidade-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >Cidade</label>
                  <input class="form-control" readonly  id="info-cidade" />
  
  
                </div>
              </div>


                <!--Estado-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >estado</label>
                  <input class="form-control" readonly  id="info-estado" />
  
  
                </div>
              </div>





               <!--Email-->
            <div class="col-md-4">
                <div class="form-group">
                  <label class="control-label" >Email</label>
                  <input class="form-control" readonly  id="info-email" />
  
  
                </div>
              </div>


               <!--Telefone-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >Telefone</label>
                  <input class="form-control" readonly  id="info-telefone" />
  
  
                </div>
              </div>



          

               <!--Estado Civil-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >Estado Civil</label>
                  <input class="form-control" readonly  id="info-estado-civil" />
  
  
                </div>
              </div>


               <!--Endereco-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >Endereco</label>
                  <input class="form-control" readonly  id="info-endereco" />
  
  
                </div>
              </div>


                <!--Endereco-->
            <div class="col-md-3">
                <div class="form-group">
                  <label class="control-label" >Bairro</label>
                  <input class="form-control" readonly  id="info-bairro" />
  
  
                </div>
              </div>






          </div>



            </div>

         </div>
      </div>
    </div>
  </div>


    </section>
        </div>




