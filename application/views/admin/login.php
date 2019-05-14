<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Puskesmas Ambulu | Log in</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>bower_components/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>bower_components/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>bower_components/Ionicons/css/ionicons.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>dist/css/AdminLTE.min.css">
  <link rel="stylesheet" href="<?php echo base_url("assets/"); ?>plugins/iCheck/square/blue.css">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <b>Puskesmas</b>Ambulu
  <br>
  Poli Gigi
  </div>
  <div class="login-box-body">
    <p class="login-box-msg">Mohon Login untuk memulai</p>

    <?php echo form_open('login'); ?>
      <div class="form-group has-feedback">
        <input autofocus="" name="username" type="text" class="form-control" placeholder="Username">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input name="password" type="password" class="form-control" placeholder="Password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-4 pull-right">
					
					<?php $button = array('name' => 'login', 'class' => 'btn btn-primary btn-block btn-flat', 'type' => 'submit'); ?>
					<?php echo form_button($button,'Masuk'); ?>
        </div>
      </div>
    <?php echo form_close(); ?>

  </div>
</div>

<script src="<?php echo base_url("assets"); ?>bower_components/jquery/dist/jquery.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?php echo base_url("assets/"); ?>plugins/iCheck/icheck.min.js"></script>
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
