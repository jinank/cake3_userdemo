<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="<?php echo $this->request->webroot?>bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $this->request->webroot?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $this->request->webroot?>plugins/iCheck/square/blue.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?php echo $this->request->webroot?>css/custom.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="<?php echo $this->request->webroot?>">Admin Panel</a>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <?= $this->Flash->render() ?>
        <p class="login-box-msg">Sign in to start your session</p>
        <div class="users form">
          <?= $this->Flash->render('auth') ?>
          <?= $this->Form->create() ?>
              <fieldset>
                  <?= $this->Form->input('username',array('class'=>'form-control','required'=>'required')) ?>
                  <?= $this->Form->input('password',array('class'=>'form-control','required'=>'required')) ?>
              </fieldset>
          <?= $this->Form->button(__('Login'),array('class'=>'btn btn-primary btn-block btn-flat loginSubmitButton')); ?>
          <?= $this->Form->end() ?>
        </div>
        <!-- <a class="forgotPasswordButton" href="#">I forgot my password</a><br> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo $this->request->webroot?>plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- Bootstrap 3.3.5 -->
    <script src="<?php echo $this->request->webroot?>bootstrap/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo $this->request->webroot?>plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
    <style type="text/css">    
    .message.error{color: red;}
    </style>
  </body>
</html>
