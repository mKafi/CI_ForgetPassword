<?php if(0){ ?>
<section id="mainContent" class="content">
    <div class="box box-info">
        <div class="box-header with-border">        
            <h3 class="box-title edit-page-title"><?php echo $title; ?></h3>
        </div><!-- /.box-header -->
        <!-- form start -->
        
        <div class="row">
            <div class="col-md-8 col-sm-10 col-xs-10 col-md-offset-2">
                
                <?php 
                if($this->session->flashdata('action_flash')){
                    ?>
                    <br/><div class="alert alert-success">
                        <?php echo $this->session->flashdata('action_flash'); ?>
                    </div>
                    <?php
                } 
                if($this->session->flashdata('danger_flash')){
                    ?>
                    <br/><div class="alert alert-danger">
                        <?php echo $this->session->flashdata('danger_flash'); ?>
                    </div>
                    <?php
                } 
                ?>
                
                <form action="" class="form-horizontal" method="post">
                    <br/>
                    <div class="form-group">
                        <label class="col-sm-2 control-label" for="Notes">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="forgot-pass" required="required" value=""/> 
                        </div>
                    </div>
                    <div class="box-footer">
                        <input name="submit" class="btn btn-info pull-right" value="Send Link" type="submit">
                    </div><!-- /.box-footer -->
                </form>
            </div>
            <!-- /.col -->
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modalDatePicker" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-body">
                        <div id="divDatePicker"></div>
                        <input id="sourceObject" value="" type="hidden">
                    </div>
                </div>

            </div>
        </div>
        <!-- END Modal -->
    </div><!-- /.box -->
</section>
<?php } ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Tenant Management | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetsadmin/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetsadmin/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetsadmin/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetsadmin/dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo base_url();?>assetsadmin//plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href=""><b>Tenant</b> Management</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Reset Password</p>
    <?php 
    if($this->session->flashdata('action_flash')){
        ?>
        <br/><div class="alert alert-success">
            <?php echo $this->session->flashdata('action_flash'); ?>
        </div>
        <?php
    } 
    if($this->session->flashdata('danger_flash')){
        ?>
        <br/><div class="alert alert-danger">
            <?php echo $this->session->flashdata('danger_flash'); ?>
        </div>
        <?php
    } 
    ?>

    <form action="" class="form-horizontal" method="post">
        <br/>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="Notes">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="forgot-pass" required="required" value=""/> 
            </div>
        </div>
        <div class="box-footer">
            <input name="submit" class="btn btn-info pull-right" value="Send Link" type="submit">
        </div><!-- /.box-footer -->
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assetsadmin/bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assetsadmin/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url();?>assetsadmin/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
