<?php
/**
 * Created by PhpStorm.
 * User: Farhad Zaman
 * Date: 3/11/2017
 * Time: 3:03 PM
 */
?>
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
    <meta charset="utf-8" />
    <title>Im Messenger</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta content="" name="description" />
    <meta content="" name="author" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/plugins/font-awesome/css/font-awesome.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/plugins/simple-line-icons/simple-line-icons.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/plugins/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/plugins/select2/css/select2.min.css') ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/plugins/select2/css/select2-bootstrap.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL STYLES -->
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/css/components.css')."?".rand(5,50000); ?>" rel="stylesheet" id="style_components" type="text/css" />
    <link href="<?php echo base_url('/assets/adminTheme/assets/global/css/plugins.min.css') ?>" rel="stylesheet" type="text/css" />
    <!-- END THEME GLOBAL STYLES -->
    <!-- BEGIN PAGE LEVEL STYLES -->
    <link href="<?php echo base_url('/assets/adminTheme/assets/pages/css/login-3.css')."?".rand(5,50000); ?>" rel="stylesheet" type="text/css" />
    <!-- END PAGE LEVEL STYLES -->
    <!-- BEGIN THEME LAYOUT STYLES -->
    <!-- END THEME LAYOUT STYLES -->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.png') ?>" />

    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/jquery.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/bootstrap/js/bootstrap.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/js.cookie.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/jquery.blockui.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') ?>" type="text/javascript"></script>
    <!-- END CORE PLUGINS -->
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/jquery-validation/js/jquery.validate.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/jquery-validation/js/additional-methods.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/plugins/select2/js/select2.full.min.js') ?>" type="text/javascript"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN THEME GLOBAL SCRIPTS -->
    <script src="<?php echo base_url('/assets/adminTheme/assets/global/scripts/app.min.js') ?>" type="text/javascript"></script>
    <!-- END THEME GLOBAL SCRIPTS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="<?php echo base_url('/assets/adminTheme/assets/pages/scripts/login.min.js') ?>" type="text/javascript"></script>
    <script src="<?php echo base_url("assets/js/scripts/jwt-decode.min.js")."?".rand(5,50000); ?>"></script>
</head>
<body class=" login" style="background-image: url('<?php echo base_url('assets/img/bg.png'); ?>');">
<!-- BEGIN LOGO -->
<div class="logo">
    <a href="#">
        <img src="<?php echo base_url('assets/img/imtwhite.png');?>" alt="" style="width: 200px" /> </a>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
    <!-- BEGIN LOGIN FORM -->
    <form class="login-form" id="loginForm" method="post">
        <h3 class="form-title">Login to your account</h3>
        <?php
         $error=$this->input->get('error', TRUE);
            if($error==true){
                ?>
        <div id="ErrorBlock1" class="alert alert-danger">
            <strong>Error!</strong> Invalid username or password. </div>
        <div class="form-group">
        <?php
            }else{
                ?>
            <div id="ErrorBlock1" class="alert alert-danger hidden">
                <strong>Error!</strong> Invalid username or password. </div>
            <div class="form-group">
            <?php
        }
        ?>
            <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
            <label class="control-label visible-ie8 visible-ie9">Username</label>
            <div class="input-icon">
                <i class="fa fa-user"></i>
                <input id="loginEmail" class="form-control placeholder-no-fix" value="admin@admin.com" type="text" autocomplete="off" placeholder="Username" name="userEmail" /> </div>
        </div>
        <div class="form-group">
            <label class="control-label visible-ie8 visible-ie9">Password</label>
            <div class="input-icon">
                <i class="fa fa-lock"></i>
                <input id="loginPassword" class="form-control placeholder-no-fix" value="123456" type="password" autocomplete="off" placeholder="Password" name="userPassword" /> </div>
        </div>
        <div class="form-actions">
            <!--<label class="rememberme mt-checkbox mt-checkbox-outline">
                <input type="checkbox" name="remember" value="1" /> Remember me
                <span></span>
            </label>-->
            <button id="loginSubmit" type="submit" class="btn green pull-right"> Login </button>
        </div>

        <div class="forget-password">

        </div>

    </form>
    <!-- END LOGIN FORM -->
    <!-- BEGIN FORGOT PASSWORD FORM -->

    <!-- END FORGOT PASSWORD FORM -->
    <!-- BEGIN REGISTRATION FORM -->

    <!-- END REGISTRATION FORM -->
</div>
<!-- END LOGIN -->
<script type="text/javascript">
    localStorage.removeItem("_r");
    function loginValid(){
        var userPassword= $('#loginPassword').val();
        var userEmail=$('#loginEmail').val().trim();

        var ret = true;
        if (userEmail == null || userEmail == "" ) {
            ret = false;
            $('#loginEmail').css("border", "2px solid red");
        }
        if (userPassword == null || userPassword == "") {
            ret = false;
            $('#loginPassword').css("border", "2px solid red");
        }
        return ret;
    }
$('#loginSubmit').on('click',function (e) {
    e.preventDefault();
    if(!$('#ErrorBlock1').hasClass('hidden')){
        $('#ErrorBlock1').addClass('hidden');
    }

    if(!loginValid()){
        return;
    }
    var form=new FormData($('#loginForm')[0]);
    $.ajax({
        "async": true,
        "crossDomain": true,
        "url": "<?php echo base_url('registration/adminLogin/'); ?>",
        "method": "POST",
        "headers": {
            "authorization": "Basic YWRtaW46MTIzNA==",
            "cache-control": "no-cache",
            "postman-token": "1f556563-4fab-eb2f-d5d1-69ab1613398b"
        },
        "processData": false,
        "contentType": false,
        "mimeType": "multipart/form-data",
        "data": form,
        "success":function (response) {
            var data=JSON.parse(response);
            if(data.status.code==200 && data.status.message=="Success")
            {
                var	responseToken= data.response;
                localStorage.setItem("_r",responseToken);
                var type=jwt_decode(responseToken).userType;
                if(type==0){
                    location.href="<?php echo base_url('admin/loginSuccess')."?r="; ?>"+responseToken;
                }
                else {
                    location.href="<?php echo base_url('admin')."?error=true"; ?>";
                }

            }

        },
        "statusCode": {
            404: function(error) {
                var msg=JSON.parse(error.responseText);
                $('#ErrorBlock1').removeClass("hidden");
                //$('.error-message1').html(" "+msg.status.message);
            },
            406: function (error) {
                $('#ErrorBlock1').removeClass("hidden");
                //$('.error-message1').html(" All Inputs Are Required");
            }
        }
    });
});
</script>
</body>

</html>
