<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Services - Application Support</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->

<div class="container">
  <div class="services-application-support-bg">
    <div class="col-sm-3 services-support-menu-bg">
      <nav class="host-event-navigation">
        <ul class="host-event-mainmenu">
          <h3>Application Support</h3>
          <li><a href="">Efficiency Enhancement</a></li>
          <li><a href="">Product Quality Improvement</a>
            <ul class="host-event-submenu">
              <li><a href="">Tops</a></li>
              <li><a href="">Bottoms</a></li>
              <li><a href="">Footwear</a></li>
            </ul>
          </li>
          <li><a href="">First Part Production</a></li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<div class="container">

  <div class="col-sm-12">
    <h1 class="host-event-hd">Application Support with Teranex</h1>
    <h4 class="host-event-text">Count on our application specialists around the world who know how to harness the flexibility and the economic efficiency of your machine in every phase of your operations – whether commissioning, actual production, product development or prototyping or new application development.</h4>
  </div>
</div>

<div class="host-event-bg-grey">
  <div class="container">
    <p><img src="images/used-video-img.jpg" class="img-responsive">
    <p> 
  </div>
</div>

<?
include('footer.php'); 
?>

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