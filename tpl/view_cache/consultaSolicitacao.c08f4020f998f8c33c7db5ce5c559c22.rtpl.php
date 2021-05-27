<?php if(!class_exists('Rain\Tpl')){exit;}?>




<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
            Consulta Solicitação
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li >Relatório</li>
        <li class="active">Consulta Solicitação</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
     
       


       <div class="box box-primary">
  <div class="box-header with-border">
    <h3 class="box-title">Filtro</h3>
    <div class="box-tools pull-right">
      <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
    </div><!-- /.box-tools -->
  </div><!-- /.box-header -->
  <div class="box-body">
    
    <form method="post" action="/admin/relatorio/solicitacao/gerar" >
   <div class="col-md-12">
      <div class="row">
     
        <div class="col-md-4">
         <div class="form-group">
           <label class="control-label">Parceiro</label>
           <select class="form-control" name="pessoa_id">
             <?php if( $usuario['perfil_id'] == 1 ){ ?>

           <option disabled selected value="0">Selecione o Parceiro</option>
          
           
           <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>

         <option value="<?php echo htmlspecialchars( $value1["pessoa_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
           <?php } ?>

           <?php } ?>

             <?php if( $usuario['perfil_id'] != 1 ){ ?>

          <?php $counter1=-1;  if( isset($pessoas) && ( is_array($pessoas) || $pessoas instanceof Traversable ) && sizeof($pessoas) ) foreach( $pessoas as $key1 => $value1 ){ $counter1++; ?>

             <?php if( $usuario['pessoa_id'] == $value1["pessoa_id"] ){ ?>

         <option value="<?php echo htmlspecialchars( $value1["pessoa_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["nome"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
             <?php } ?>  
         <?php } ?>

         <?php } ?>

          
           </select>

         </div>
        </div>

        <div class="col-md-4">
            <div class="form-group">
              <label class="control-label">Status</label>
              <select class="form-control" name="status_id">
              <option disabled selected value="0">Selecione o Status</option>]

              <?php $counter1=-1;  if( isset($status) && ( is_array($status) || $status instanceof Traversable ) && sizeof($status) ) foreach( $status as $key1 => $value1 ){ $counter1++; ?>

              <option value="<?php echo htmlspecialchars( $value1["statu_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                <?php } ?>


              </select>
   
            </div>
           </div>

           <div class="col-md-4">
              <div class="form-group">
                <label class="control-label">Banco</label>
                <select class="form-control" name="Status">
                <option disabled selected value="0">Selecione o Banco</option>

                <?php $counter1=-1;  if( isset($bancos) && ( is_array($bancos) || $bancos instanceof Traversable ) && sizeof($bancos) ) foreach( $bancos as $key1 => $value1 ){ $counter1++; ?>

                <option value="<?php echo htmlspecialchars( $value1["banco_id"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" ><?php echo htmlspecialchars( $value1["descricao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></option>
                  <?php } ?>


                </select>
     
              </div>
             </div>

      </div>

      <div class="row">
        <fieldset>
          <legend>Solcitação</legend>
     
          <div class="col-md-3">
           <div class="form-group">
             <label class="control-label">Data Inicio</label>
              <input type="date" name="data_inicio" />
           </div>
          </div>
  
          <div class="col-md-3">
              <div class="form-group">
                <label class="control-label">Data Fim</label>
                <input type="date" name="data_fim" />
              </div>
             </div>
            </fieldset>
  
        </div>

        <div class="row">
          <div class="col-md-2 col-md-offset-5">

            <button class="btn btn-success btn-block">Gerar Relatório</button>
 

          </div>

        </div>
  

        </div>  



    </form>
    

  </div><!-- /.box-body -->
</div><!-- /.box -->


    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
