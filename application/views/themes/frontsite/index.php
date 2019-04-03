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
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?=$theme_url;?>/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
    <link rel="stylesheet" href="<?=$theme_url;?>/font-awesome/css/font-awesome.min.css">
  <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
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