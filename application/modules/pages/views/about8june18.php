 

<div class="padd-top">
  <div class=""><img src="<?php echo $theme_url?>/images/about.jpg" width="100%"></div>
</div>
<div class="container section-pad">
  <center>
    <h1> About Us </h1>  
  </center>
    <p>TERANEX is a digital platform that addresses the needs of mechanical engineering industry in a holistic manner. Using technology, it transforms the current business practices of manufacturing industry by providing it with seamless sales and purchase experience on a single integrated platform. Manufacturers can not only sell their production capacities but also avail manufacturing solutions online ranging from procurement of machines, spare parts, toolings and raw material inputs to critical post-sales services such as training, consulting, programming, application and service support. TERANEX also runs an online forum to connect manufacturers with each other via discussion threads, blogging and operation of goal-oriented communities. Furthermore, it provides customers with the opportunity to participate in industrial live events globally from the convenience of their own space.</p>
</div>
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