<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $title;?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="<?php echo asset_url('bootstrap/css/bootstrap.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/font-awesome-4.6.3/css/font-awesome.min.css'); ?>"/>
    <!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo asset_url('plugins/ionicons/css/ionicons.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo asset_url('plugins/daterangepicker/daterangepicker-bs3.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/iCheck/all.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/colorpicker/bootstrap-colorpicker.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/timepicker/bootstrap-timepicker.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/select2/select2.min.css'); ?>"/>
	<!-- Theme style -->
	<link rel="stylesheet" href="<?php echo asset_url('plugins/jvectormap/jquery-jvectormap-1.2.2.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('core/css/AdminLTE.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('core/css/skins/_all-skins.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/datatables/css/jquery.dataTables.min.css'); ?>"/>
	<link rel="shortcut icon" href="<?php echo asset_url('favicon.png'); ?>" />
	
	<script src="<?php echo asset_url('plugins/datatables.tools/jquery-3.3.1.js'); ?>"></script>
	<script src="<?php echo asset_url('bootstrap/js/bootstrap.min.js'); ?>"></script>

	<script src="<?php echo asset_url('plugins/select2/select2.full.min.js'); ?>"></script>
    <script src="<?php echo asset_url('plugins/input-mask/jquery.inputmask.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/input-mask/jquery.inputmask.date.extensions.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/input-mask/jquery.inputmask.extensions.js'); ?>"></script>
	<!-- moment style -->
	<script src="<?php echo asset_url('plugins/moment/min/moment.min.js'); ?>"></script>
    <script src="<?php echo asset_url('plugins/daterangepicker/daterangepicker.js'); ?>"></script>
    <script src="<?php echo asset_url('plugins/colorpicker/bootstrap-colorpicker.min.js'); ?>"></script>

    <script src="<?php echo asset_url('plugins/timepicker/bootstrap-timepicker.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/iCheck/icheck.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/fastclick/fastclick.min.js'); ?>"></script>
	
	<!--datatable-->
	<script src="<?php echo asset_url('plugins/datatables.tools/jszip.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/pdfmake.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/vfs_fonts.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/dataTables.buttons.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/buttons.bootstrap.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/buttons.html5.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/datatables.tools/buttons.print.js'); ?>"></script>

	<script src="<?php echo asset_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/fastclick/fastclick.min.js'); ?>"></script>
	<script src="<?php echo asset_url('core/js/app.min.js'); ?>"></script>
	
	<!--general-->
	<script src="<?php echo asset_url('plugins/sparkline/jquery.sparkline.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/jvectormap/jquery-jvectormap-world-mill-en.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/chartjs/Chart.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/ckeditor/ckeditor.js'); ?>"></script>
	<script src="<?php echo asset_url('core/js/demo.js'); ?>"></script>
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <a href="<?php echo site_url();?>" class="logo">   
			<span class="logo-mini"><b>PETS</b></span>
			<span class="logo-lg"><b>PETS JOURNEY</b></span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">

              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo asset_url('images/admin/'.$this->foto.''); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs"><?php echo $this->nama;?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo asset_url('images/admin/'.$this->foto.''); ?>" class="img-circle" alt="User Image">
                    <p><?php echo $this->nama;?></p>
					<i>login as <?php echo $this->email;?></i>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo site_url('profile/index'); ?>" class="btn btn-primary btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('logout'); ?>" class="btn btn-warning btn-flat">Logout</a>
                    </div>
                  </li>
                </ul>
              </li>
               <li>
                <a href="#" data-toggle="control"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo asset_url('images/admin/'.$this->foto.''); ?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
			<p><?php echo $this->nama;?></p>
			<small><i class="fa fa-circle text-success"></i> Online</small>
            </div>
          </div>
          <ul class="sidebar-menu">
			<li class="header">NAVIGATION MENU</li>
			<li class=" activetreeview">
              <a href="<?php echo site_url();?>">
                 <i class="fa fa-home"></i>
                <span>Home</span>
              </a>
            </li>
			<li><a href="<?php echo site_url('user');?>"><i class="fa fa-user" aria-hidden="true"></i> <span>User</span></a></li>
			<li><a href="<?php echo site_url('peliharaan');?>"><i class="fa fa-paw" aria-hidden="true"></i> <span>Pets</span></a></li>
			<li><a href="<?php echo site_url('vaksin');?>"><i class="fa fa-calendar-o" aria-hidden="true"></i> <span>Vaksin</span></a></li>
			<li><a href="<?php echo site_url('info');?>"><i class="fa fa-volume-up" aria-hidden="true"></i> <span>Info</span></a></li>
			<li><a href="<?php echo site_url('artikel');?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i> <span>Artikel</span></a></li>
			<li><a href="<?php echo site_url('notifikasi');?>"><i class="fa fa-bell" aria-hidden="true"></i> <span>Notifikasi</span></a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cogs"></i> <span>Pengaturan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
				<li><a href="<?php echo site_url('admin');?>"><i class="fa fa-user" aria-hidden="true"></i> <span>Admin</span></a></li>
				<li><a href="<?php echo site_url('profile/index');?>"><i class="fa fa-cog" aria-hidden="true"></i> <span>Profile</span></a></li>
                <li><a href="<?php echo site_url('logout');?>"><i class="fa fa-sign-out" aria-hidden="true"></i> <span>Logout</span></a></li>
              </ul>
            </li>			
          </ul>
        </section>
      </aside>
	  <div class="modal" style="display: none;  padding-top: 250px;" align="center">
		<div class="center">
			<img src="<?php echo asset_url('core/img/loader.gif');?>" />
		</div>
	  </div>
	  <?php $this->load->view($pages);?>
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Page rendered in <strong>{elapsed_time}</strong> seconds, memory usage : <strong>{memory_usage}</strong>
        </div>
        <strong>Copyright &copy; 2019</a></strong> All rights reserved.
      </footer>
      <aside class="control-sidebar control-sidebar-dark">
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        </ul>
        <div class="tab-content">
          <div class="tab-pane" id="control-sidebar-home-tab">
          </div>
		</div>
      </aside>
      <div class="control-sidebar-bg"></div>
    </div>
  </body>
</html>
