
<div class="home-page-container banner-without-overlay height-550 mb-0" style="background: url(<?php echo $theme_url ?>/images/1-teranex-desktop-aboutus-bg.jpg)">
    <div class="container">
        <div class="banner-content-text">
            <span>About Us</span>
            <b>Teranex</b>
        </div>
    </div>
</div>
<!-- Body container start -->
<div class="home-page-body-container">
    <!-- About Teranex Block -->
    <div class="home-inner-block-set pb-80 pt-80">
        <div class="container">
            <div class="full-width">
                <div class="teranex-card-set-white">
                    <div class="row align-items-center">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-5 col-xl-5">
                            <p>
                                <?php echo strhtmldecode($aboutList['page_content']);?>
                            </p>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-7 text-center">
                            <div class="teranex-card-set">
                                <img class="img-fluid" src="<?php echo $theme_url?>/images/about-logo.jpg" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About Teranex Block -->
</div>




<!-- Body Container End -->



<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#register").submit(function(){

	if($("#Email").val() == "" && $("#MobileNo").val() == "")
	{
		alert("Email or Mobile No. is required");
		return false;
	}
	if($("#Email").val() != "")
	{
		var b = $("#Email").val();
		var atpos=b.indexOf("@");
		var dotpos=b.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
		{
		  alert("Not a valid e-mail address");
		  return false;
		}
	}
	if($("#MobileNo").val() != "")
	{
		var check_mobile = $("#MobileNo").val();
		var expression = /\D/;
		if(expression.test(check_this))
		{
			alert("Contact number should be in digits only");
		}
	}

	if($("#Passcode").val() == "")
	{
		alert("Password cannot be empty");
		return false;
	}

	if($("#CustomerType").val() == "")
	{
		alert("Customer Type is required");
		return false;
	}

	var yesno = confirm("Are you sure to register");
	return yesno;
	});
});
</script>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>