<?php if(!class_exists('Rain\Tpl')){exit;}?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
     
    </section>

    <!-- Main content -->
    <section class="content">


        <section class="content-header">
            <h1>
              Dashboard
              <small>Painel de Controle</small>
            </h1>
            <ol class="breadcrumb">
              <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
              <li class="active">Dashboard</li>
            </ol>
          </section>



      <div class="row" style="margin-top:25px;">  

        <div class="col-md-12">

            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                  <div class="inner">
                    <h3><?php echo htmlspecialchars( $totalCliente, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
      
                    <p>Clientes Cadastrados</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
                  </div>
                  <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
              </div>

              <div class="col-lg-3 col-xs-6">
                  <!-- small box -->
                  <div class="small-box bg-red">
                    <div class="inner">
                      <h3><?php echo htmlspecialchars( $totalSolicitacao, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
        
                      <p>Total de Solicitações</p>
                    </div>
                    <div class="icon">
                      <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                  </div>
                </div>

        </div>

      </div>
   

      <!-- Your Page Content Here -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->