<?php if(!class_exists('Rain\Tpl')){exit;}?><div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            500 Error Page
          </h1>
          <ol class="breadcrumb">
            <li class="active">500 error</li>
          </ol>
        </section>
    
        <!-- Main content -->
        <section class="content">
    
          <div class="error-page">
            <h2 class="headline text-red">500</h2>
    
            <div class="error-content">
              <h3><i class="fa fa-warning text-red"></i> Oops! Desculpe Aconteceu um Erro !! <?php echo htmlspecialchars( $erro, ENT_COMPAT, 'UTF-8', FALSE ); ?></h3>
    
              <p>
                <h5 class="alert alert-danger">Caso Pesista entre em contato com o suporte <i>Vitor  : <b>feliperp321@gmail.com</b></i></h5>
                Caso Deseje Retorna para a Home do Sistema<a href="../../index.html">Clique Aqui !!</a> 
              </p>
    
            
            </div>
          </div>
          <!-- /.error-page -->
    
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->