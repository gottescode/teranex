<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Services - Excess Capacity Utilization</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->

<div class="container">
  <div class="host-event-bg">
    <div class="col-sm-3 host-menu-bg">
      <nav class="host-event-navigation">
        <ul class="host-event-mainmenu">
          <h3>Excess Capacity Utilization</h3>
          <li><a href="">Add Available Capacities</a></li>
          <li><a href="">Request for Capacities</a>
            <ul class="host-event-submenu">
              <li><a href="">Tops</a></li>
              <li><a href="">Bottoms</a></li>
              <li><a href="">Footwear</a></li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </div>
</div>

<div class="container">

  <div class="col-sm-12">
    <h1 class="host-event-hd">Live Events with Stelmac</h1>
    <h4 class="host-event-text">At teranex, we provide both live and structured training courses in the fields of<br>
      CAD/CAM, Machine Operation and Maintenance.</h4>
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