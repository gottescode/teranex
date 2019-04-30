<?php  $theme_url = theme_url();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title?> | An Intelligent Assistant For All Your Fabrication Needs </title>
    <meta charset="utf-8">
    <meta name="keywords" content="<?php echo $meta_keywords?>" />
    <meta name="description" content="<?php echo $meta_description?> ">
    <meta name="author" content="Teranex">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <!--<link href="<?php /*echo $theme_url;*/?>/css/bootstrap-3.1.1.min.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo $theme_url?>/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $theme_url?>/css/style.css" rel="stylesheet" type="text/css">
    <!-- <link href="<?php echo $theme_url?>/css/customcss.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $theme_url?>/css/custom.css" rel="stylesheet" type="text/css"> -->
    <!--<link href="<?php /*echo $theme_url*/?>/css/bootstrap-3.1.1.min.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo $theme_url?>/css/bootstrap.min.css" rel="stylesheet">
    <!--<link href="<?php /*echo $theme_url*/?>/css/style.css" rel="stylesheet" type="text/css">-->
    <!--<link href="<?php /*echo $theme_url*/?>/css/custom.css" rel="stylesheet" type="text/css">-->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <!--<link href="<?php /*echo $theme_url*/?>/css/customcss.css" rel="stylesheet" type="text/css">-->
    <!--<link href="<?php /*echo $theme_url*/?>/css/custom_new.css" rel="stylesheet" type="text/css">-->
    <link href="<?php echo $theme_url?>/css/headerfooter.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $theme_url?>/css/style_new.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $theme_url?>/css/owl.carousel.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $theme_url?>/css/fonts.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $theme_url?>/slider/css/slider.css" rel="stylesheet" type="text/css">

    <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>-->
    <script>
        var current_url="<?php echo site_url();?>";
        var site_url = "<?php echo site_url();?>";

    </script>
    <?php
    if (isset($content_buffer[POS_TOP])) {
        foreach ($content_buffer[POS_TOP] as $row) {
            echo $row;
        }
    }
    ?>
    <style>
        * {
            margin:0;
            padding:0;
        }

        #color, #centered {
            padding: 1em;
            background: #ff04048c;
            float: left;
            width: 50%;
            box-sizing: border-box;
        }
        #color .nanobar, #centered .nanobar {
            margin-bottom: 2em;
        }
        .bar {
            background: #a5c049;
        }

        #color .nanobar .bar {
            background: #ff04048c;
            border-radius: 4px;
            box-shadow: 0 0 10px #59d;
            height: 6px;
            margin: 0 auto;
        }
        #centered .nanobar .bar {
            background: url('img/rainbow.gif') 100%;
            height: 9px;
        }
    </style>

</head>
<body>
<!-- <div class="loader"></div>
      --><?php echo $content; ?>
<?php
if (isset($content_buffer[POS_PAGE_LEVEL])) {
    foreach ($content_buffer[POS_PAGE_LEVEL] as $row) {
        echo $row;
    }
}
?>
<script src="<?php echo $theme_url;?>/js/jquery.js"></script>
<script src="<?php echo $theme_url;?>/js/owl.carousel.min.js"></script>
<script src="<?php echo $theme_url;?>/js/popper.min.js"></script>
<script src="<?php echo $theme_url;?>/js/bootstrap.min.js"></script>
<script src="<?php echo $theme_url;?>/js/custom.js"></script>

<script src="<?php echo $theme_url;?>/js/nanobar.js"></script>
<script>
    $(document).ready(function(){
        $('.cmn').mouseover(function(){
            $(this).css('width' , '25%');
            $(this).addClass('active');
            $('.npm-acoord>div:first-child').css('width' , '55%');
        });
        $('.cmn').mouseout(function(){
            $(this).css('width' , '10%');
            $(this).removeClass('active');
            $('.npm-acoord>div:first-child').css('width' , '70%');
        });

    });
</script>
<!--<script>
    $(window).load(function() {
        //		$(".loader").fadeOut("slow");
    });
</script>-->
<!--<script src="<?php /*echo $theme_url;*/?>/js/jquery.js?>"></script>
-->

<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>

<!-- <script src="<?php echo $theme_url;?>/js/scrollheader.js"></script> -->
<!--<script src="<?php echo $theme_url;?>/slider/js/slider.js"></script>
			<script  src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>-->
<?php
if (isset($content_buffer[POS_BOTTOM])) {
    foreach ($content_buffer[POS_BOTTOM] as $row) {
        echo $row;
    }
}
?>
<?php if($this->session->userdata('uid')==''){?>
    <script src="<?php echo $theme_url;?>/js/login.js"></script>

<?php }?>
<!--Start of Tawk.to Script-->

<!--<script type="text/javascript">
	var simplebar = new Nanobar();
			simplebar.go(100);
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5ae95eba227d3d7edc24e12f/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>-->
<!--End of Tawk.to Script-->
<footer align="center" style="position:fixed;bottom:0">
    <div class="container-fluid">
        copyright&copy;2018
    </div>


    <script type="text/javascript">
        var chat_appid = '1248ef75b9713b';

    </script>
    <?php if($this->session->userdata('uid') && $this->session->userdata('uid') > 0) {?>

        <script>
            var chat_id = "superhero1";
            var chat_name = "Iron Man";
            var chat_link = ""; //Similarly populate it from session for user's profile link if exists
            var chat_avatar = "https://data.cometchat.com/assets/images/avatars/ironman.png"; //Similarly populate it from session for user's avatar src if exists
            var chat_role = "default"; //Similarly populate it from session for user's role if exists
            var chat_friends = ''; //Similarly populate it with user's friends' site user id's eg: 14,16,20,31
        </script>
    <?php } ?>
    <script>
        (function() {

            var chat_css = document.createElement('link'); chat_css.rel = 'stylesheet'; chat_css.type = 'text/css'; chat_css.href = 'https://fast.cometondemand.net/'+chat_appid+'x_xchat.css';
            document.getElementsByTagName("head")[0].appendChild(chat_css);
            var chat_js = document.createElement('link'); chat_js.type = 'text/javascript'; chat_js.src = 'https://fast.cometondemand.net/'+chat_appid+'x_xchat.js';
            var chat_script = document.getElementsByTagName('script')[0]; chat_script.parentNode.insertBefore(chat_js, chat_script);
        })();
    </script>
    <script>
        $(document).ready(function(){

        });
    </script>
</footer>





</body>
</html>
