<section class="banner banner_image aboutus_banner align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>About Us</p>
                    <h1 class="basic-head">Teranex</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="em_sect mrgn-top" id="about-us-pa">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="padd_all_50 bx-shdw white">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="em-cnt">
                                <?php echo strhtmldecode($aboutList['page_content']);?>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" em_mont">
                                <img src="<?php echo $theme_url?>/images/logo.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


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