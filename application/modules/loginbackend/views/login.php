<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<head>

    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalabe=0, maximum-scale=1.0, maximun-scale=1.0">
    <link rel="shortcut icon" href="">

    <title><?=$title; ?></title>

<?php if(isset($meta_keywords)) { ?>
	<meta name="keywords" content="<?php echo $meta_keywords ?>">
<?php } ?>

<?php if(isset($meta_description)) { ?>
	<meta name="description" content="<?php echo $meta_description ?>">
<?php } ?>

<?php	// get theme assets path
	$theme_url = $this->template->theme_url();	?>

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo $theme_url;?>/images/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="<?php echo $theme_url;?>/images/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo $theme_url;?>/images/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo $theme_url;?>/images/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo $theme_url;?>/images/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo $theme_url;?>/images/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo $theme_url;?>/images/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo $theme_url;?>/images/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo $theme_url;?>/images/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="<?php echo $theme_url;?>/images/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo $theme_url;?>/images/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="<?php echo $theme_url;?>/images/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo $theme_url;?>/images/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo $theme_url;?>/images/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $theme_url;?>/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

  <link rel="shortcut icon" href="<?php echo $theme_url;?>/assets/images/icon/favicon.png" type="image/x-icon">
    <!--<link rel="shortcut icon" href="favicon.ico">-->

    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="<?=$theme_url;?>/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=$theme_url;?>/font-awesome/css/font-awesome.min.css">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="<?=$theme_url;?>/Ionicons/css/ionicons.min.css">
    <link rel="stylesheet" href="<?=$theme_url;?>/AdminLTE.min.css">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="<?=$theme_url;?>/css/custom.css">

	 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>

<body class="hold-transition login-page">
<!--=== Content Part ===-->
<div class="container">
   <div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Admin</b></a>
  </div>

			<?php 	if(hasFlash("loginError")){		?>
						<div class="alert alert-warning">
							<?php echo getFlash("loginError");	?>
						</div>
			<?php	}	?>

  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Sign in to start your session</p>

    <form action="" method="post"  id="login_form" name="login_form" autocomplete="off">
      <div class="form-group has-feedback">
        <input type="email" class="form-control" name="username" placeholder="Email">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" autocomplete="new-password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">

        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <input name="btnLogin" type="submit" class="btn btn-primary btn-block btn-flat" value="Sign In">
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->
<script type="text/javascript" src="<?=$theme_url;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$theme_url;?>/bootstrap/dist/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="<?=$theme_url;?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
 	 $(function(){
		 $("#login_form").validate({
			   rules: {
				   username :{
                    required:true,
					maxlength:50,
                    email:true
				},
					password:"required"
			   },
			   messages: {
				  username:{
                    required:"Plese enter usename",
                    email:"Please enter valid usename"
                },
					password:"Plese enter password"

			   },submitHandler: function(login_form) {
           login_form.submit();
        }

	 });
 });
</script>

</body>
</html>