<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login Page</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="<?php echo asset_url('bootstrap/css/bootstrap.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo asset_url('plugins/font-awesome-4.6.3/css/font-awesome.min.css'); ?>"/>
    <!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo asset_url('plugins/ionicons/css/ionicons.min.css'); ?>"/>
    <link rel="stylesheet" href="<?php echo asset_url('core/css/AdminLTE.min.css'); ?>"/>
	<link rel="stylesheet" href="<?php echo asset_url('plugins/iCheck/square/blue.css'); ?>"/>
	<link rel="shortcut icon" href="<?php echo asset_url('favicon.png'); ?>" />
  </head>

  <body class="hold-transition login-page">
    <div class="login-box">
	  <div class="login-box-body">
		<div class="login-logo">
			<?php
			if ($this->session->flashdata('error_login')){  
				echo $this->session->flashdata('error_login');
			}else{
				echo'LOGIN ADMIN';
			}
			?>
		</div>
		<div style="margin-left:25%;margin-right:25%;margin-bottom:25px;">
			<img src="<?php echo asset_url('core/img/logo.png');?>" class="img-responsive">
		</div>
	  
		
		<form method="post" name="login" action="<?php echo site_url('auth'); ?>">	
          <div class="form-group has-feedback">
            <input type="email" id="email" name="email" class="form-control" placeholder="Email" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script src="<?php echo asset_url('plugins/jQuery/jQuery-2.1.4.min.js'); ?>"></script>
	<script src="<?php echo asset_url('bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo asset_url('plugins/iCheck/icheck.min.js'); ?>"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%'
        });
      });
    </script>
  </body>
</html>
