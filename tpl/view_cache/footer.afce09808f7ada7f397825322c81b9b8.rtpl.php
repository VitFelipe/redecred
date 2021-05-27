<?php if(!class_exists('Rain\Tpl')){exit;}?>


  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane active" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:;">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="pull-right-container">
                  <span class="label label-danger pull-right">70%</span>
                </span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.2.3 -->
<script src="/crede_cred/tpl/admin/_js/jquery-3.3.1.min.js"></script>

<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>

<!-- Bootstrap 3.3.6 -->
<script src="/crede_cred/tpl/admin/res/Admin/bootstrap/js/bootstrap.min.js"></script>


<!-- Script -->



<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/crede_cred/tpl/admin/res/Admin/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/crede_cred/tpl/admin/res/Admin/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/knob/jquery.knob.js"></script>

<!-- Select2 -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/select2/select2.full.min.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/crede_cred/tpl/admin/res/Admin/plugins/daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/fastclick/fastclick.js"></script>

<!-- DataTables -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="/crede_cred/tpl/admin/res/Admin/plugins/datatables/dataTables.bootstrap.min.js"></script>

<!-- InputMask -->
<script src="/crede_cred/tpl/admin/res/Admin/plugins/input-mask/jquery.inputmask.js"></script>
<script src="/crede_cred/tpl/admin/res/Admin/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="/crede_cred/tpl/admin/res/Admin/plugins/input-mask/jquery.inputmask.extensions.js"></script>

<!-- AdminLTE App -->
<script src="/crede_cred/tpl/admin/res/Admin/dist/js/app.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/crede_cred/tpl/admin/res/Admin/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/crede_cred/tpl/admin/res/Admin/dist/js/demo.js"></script>

<script src="/crede_cred/tpl/admin/_js/jquery.maskedinput.js"></script>

<script src="/crede_cred/tpl/admin/_js/jquery.mask.js"></script>



<script src="/crede_cred/tpl/admin/_js/script.js"></script>






<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
