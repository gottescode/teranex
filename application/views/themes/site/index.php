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


    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo $theme_url;?>/fonts/ionicons/ionicons.css">
    <link rel="stylesheet" href="<?php echo $theme_url;?>/fonts/font-awesome/font-awesome.css">
    <link rel="stylesheet" href="<?php echo $theme_url;?>/bootstrap/css/bootstrap.min.css">
    <!-- owl-carousel -->
    <link rel="stylesheet" href="<?php echo $theme_url;?>/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?php echo $theme_url;?>/owl-carousel/css/owl.theme.default.min.css">
    <!-- Flexbox Accordion -->
    <link rel="stylesheet" href="<?php echo $theme_url;?>/horizontal-accordion/css/style.css">
    <!-- Flexbox Accordion -->
    <link rel="stylesheet" href="<?php echo $theme_url;?>/css/style_new.css">
    <link rel="stylesheet" href="<?php echo $theme_url;?>/teranex-web-pages.css">


    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="<?php echo $theme_url;?>/images/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <script>
        var current_url="<?php echo site_url();?>";
        var site_url = "<?php echo site_url();?>";
        var base_url = "<?php echo base_url();?>";

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
<script type="text/javascript" src="<?php echo $theme_url;?>/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo $theme_url;?>/bootstrap/js/bootstrap.min.js"></script>
<!-- Flexbox Accordion -->
<script type="text/javascript" src="<?php echo $theme_url;?>/horizontal-accordion/horizontal-accordion.js"></script>
<!-- owl-carousel -->
<script type="text/javascript" src="<?php echo $theme_url;?>/owl-carousel/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="<?php echo $theme_url;?>/js/main.js"></script>


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
<script>
    $(document).ready(function() {
        $("#sla_carousel").owlCarousel({
            margin: 10,
            nav: true,
            dots: false,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            loop: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                    loop: true
                },
                600: {
                    items: 1,
                    nav: false,
                    dots: true,
                    loop: true
                },
                1000: {
                    items: 1
                }
            }
        });
        $("#material_carousel").owlCarousel({
            margin: 10,
            nav: true,
            dots: false,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            loop: true,
            responsive: {
                0: {
                    items: 2,
                    nav: false,
                    dots: true,
                    loop: true
                },
                600: {
                    items: 2,
                    nav: false,
                    dots: true,
                    loop: true
                },
                1000: {
                    items: 2
                }
            }
        });
        $("#industrial_carousel").owlCarousel({
            margin: 10,
            nav: true,
            dots: false,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            loop: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                    loop: true
                },
                600: {
                    items: 2,
                    nav: false,
                    dots: true,
                    loop: true
                },
                1000: {
                    items: 1
                }
            }
        });
        $("#experts_say").owlCarousel({
            margin: 10,
            nav: true,
            dots: false,
            navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
            loop: true,
            responsive: {
                0: {
                    items: 1,
                    nav: false,
                    dots: true,
                    loop: true
                },
                600: {
                    items: 2,
                    nav: false,
                    dots: true,
                    loop: true
                },
                1000: {
                    items: 1
                }
            }
        })
    })
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
