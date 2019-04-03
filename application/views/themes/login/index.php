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

<body>
<!--=== Content Part ===-->    
<div class="container">
    <?php echo $content; ?>
</div><!--/container-->
<!--=== End Content Part ===-->

<!-- JS Global Compulsory -->           
<script type="text/javascript" src="<?=$theme_url;?>/js/jquery.min.js"></script>
<script type="text/javascript" src="<?=$theme_url;?>/bootstrap/dist/js/bootstrap.min.js"></script> 
 

</body>
</html> 