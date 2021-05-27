<?php if(!class_exists('Rain\Tpl')){exit;}?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
            <h1>
                  Acompanhamento <small>Solicitação</small>
           </h1>
           <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li >Solicitação</li>
            <li class="active" >Acompanhamento Solicitação</li>
            
          </ol>
        
      
     
    </section>

    <section class="content">



            <div class="row" style="margin-top:10px;">
                    <div class="col-xs-12">
                      <div class="box">
      
        <div class="row">
            <div class="col-md-10 col-md-offset-1">

            <h5 class="alert alert-success" style="text-align:center;">Acompanhamento de Solicitações</h5>
            
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
                          <h3 class="box-title">Solicitações</h3>
                        </div>
            <div class="box-body">
                
                    <table  class="table table-bordered table-hover table-style">
                      <thead>
                      <tr>
                        <th>Codigo</th>
                        <th>Cliente</th>
                        <th>Municipio</th>
                        <th>Valor</th>
                        <th>Prazo</th>
                        <th>Convenio</th>
                        <th>Data</th>
                        <th>Status</th>
                        <th>Opções</th>
                      </tr>
                      </thead>
                      <tbody>
                            <?php $counter1=-1;  if( isset($solicitacoes) && ( is_array($solicitacoes) || $solicitacoes instanceof Traversable ) && sizeof($solicitacoes) ) foreach( $solicitacoes as $key1 => $value1 ){ $counter1++; ?>
                          <tr>
                                <td class="codigo-solicitacao"><?php echo htmlspecialchars( $value1["solicitacao_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td style="width: 15%"><?php echo htmlspecialchars( $value1["nome_cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo htmlspecialchars( $value1["municipio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td>R$ <?php echo formatNumber($value1["valor_emprestimo"]); ?></td>
                                <td><?php echo htmlspecialchars( $value1["prazo"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                           
                                <td><?php echo htmlspecialchars( $value1["convenio"], ENT_COMPAT, 'UTF-8', FALSE ); ?></td>
                                <td><?php echo formatData($value1["data_solicitacao"]); ?></td>
                                <td style="width: 8%"><?php if( $value1["statu_id"] != 1 ){ ?> <span style="color:red;"> <?php echo htmlspecialchars( $value1["statu"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span><?php }else{ ?> <span style="color:green;"> <?php echo htmlspecialchars( $value1["statu"], ENT_COMPAT, 'UTF-8', FALSE ); ?> </span> <?php } ?></td>
                                <td> 
                                <a href="/crede_cred/admin/solicitacao/<?php echo htmlspecialchars( $value1["solicitacao_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/view" class="btn btn-success" ><span class="fa  fa-search"></span></a> 
                                <?php if( $usuario['perfil_id'] == 1 ){ ?>
                                <button class="btn btn-primary statu_solicitacao" data-toggle="modal" data-target=".modal-statu" ><span class="fa  fa-refresh"></span></button>                             
                                <?php } ?>
                                <?php if( $value1["pessoa_id"] == $usuario['pessoa_id'] ){ ?>
                                <?php if( $value1["statu_id"] != 1 ){ ?>
                                <a href="/crede_cred/admin/solicitacao/<?php echo htmlspecialchars( $value1["solicitacao_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" class="btn btn-info" ><span class="fa  fa-pencil"></span></a> 
                                <a href="/crede_cred/admin/solicitacao/<?php echo htmlspecialchars( $value1["solicitacao_contrato_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>/delete"  onclick="return confirm('Tem Certeza que deseja excluir a solicitação do cliente <?php echo htmlspecialchars( $value1["nome_cliente"], ENT_COMPAT, 'UTF-8', FALSE ); ?>  ? ');" class="btn btn-danger" ><span class="fa  fa-close"></span></a>                                
                                 <?php } ?>
                                 <?php } ?>
                            </td>
                                
                          </tr>

                          <?php } ?>
                     </tbody>
                        <tfoot>
                        <tr>
                                <th>Codigo</th>
                                <th>Cliente</th>
                                <th>Municipio</th>
                                <th>Valor</th>
                                <th>Prazo</th>
                                <th>Convenio</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Opções</th>
                        </tr>
                        </tfoot>
                      </table>
                    </div>
   
</div>
</div>


<div class="modal fade modal-arquivo" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Anexos</h4>
      </div>
      <div class="modal-body">
          
        <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Tipo</th>
              <th>Nome</th>
            
            </tr>
          </thead>
          <tbody id="data-anexos-doc">
         
           
          </tbody>
        </table>

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- Modal Status-->

<div class="modal fade modal-statu" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Status Solicitação</h4>
      </div>
      <div class="modal-body">
    
        <form method="POST" action="/crede_cred/admin/solicitacao/acompanhamento/status" id="form-status"> 
      <input type="hidden" name="solicitacao_id" id="solicitacao_hid_id" />
      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          <div class="form-group">
            <label class="control-label">Status da Solicitação</label>
            <select name="statu_id" class="form-control">
              <?php $counter1=-1;  if( isset($status) && ( is_array($status) || $status instanceof Traversable ) && sizeof($status) ) foreach( $status as $key1 => $value1 ){ $counter1++; ?>
                <option value="<?php echo htmlspecialchars( $value1["statu_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
              <?php } ?>
            </select>
          </div>
        </div>  
        <div class="col-md-4 col-md-offset-4">
          <input type="submit" value="Alterar Status" class="btn btn-primary btn-block" />
          </div>
      </div>
     

        </form>
       

      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

    </section>
        </div>






