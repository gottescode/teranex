 <?php    
	$theme_url = theme_url(); 
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin Panel | <?php echo $title;?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=$theme_url;?>/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=$theme_url;?>/font-awesome/css/font-awesome.min.css">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css"> -->
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
 
  <!-- Theme style -->
  <link rel="stylesheet" href="<?=$theme_url;?>/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="<?=$theme_url;?>/css/skins/skin-blue.min.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/custom.css">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
 <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
	 
		<?php
        if (isset($content_buffer[POS_TOP])) {
            foreach ($content_buffer[POS_TOP] as $row) {
                echo $row;
            }
        }
        ?>
		 <script> var site_url = "<?php echo site_url(); ?>"; </script>
	</head><!--/head--> 
<body class="hold-transition skin-blue sidebar-mini">
 <div class="wrapper"> 
		 
        <?php echo $content; ?> 
        <!-- JS Page Level -->
		<?php
        if (isset($content_buffer[POS_PAGE_LEVEL])) {
            foreach ($content_buffer[POS_PAGE_LEVEL] as $row) {
                echo $row;
            }
        }
        ?>
<!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  
</div>
<!-- ./wrapper -->

 
<!-- Bootstrap 3.3.6 -->
<script src="<?=$theme_url;?>/js/jquery.min.js"></script>
<script src="<?=$theme_url;?>/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="<?=$theme_url;?>/jquery-ui/jquery-ui.min.js"></script>
<script src="<?=$theme_url;?>/js/adminlte.min.js"></script>
<!-- FastClick -->   
 <!--<script src="https://code.jquery.com/jquery-1.12.4.js"></script>--> 
  
		<?php
        if (isset($content_buffer[POS_BOTTOM])) {
            foreach ($content_buffer[POS_BOTTOM] as $row) {
                echo $row;
            }
        }
        ?>  
	 
    </body>
</html>