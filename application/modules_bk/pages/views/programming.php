<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Service – Programming</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->

<div class="container">
<div class="servic–programming-bg">
<div class="col-sm-3 host-menu-bg">

 <nav class="host-event-navigation">
  <ul class="host-event-mainmenu">
    <h3>Programming</h3>
    <li><a href="">Assembly</a></li>
    <li><a href="">Component</a>
      <ul class="host-event-submenu">
        <li><a href="">Part</a></li>
      </ul>
    </li>
    <li><a href="">Part</a></li>
  </ul>
</nav> 

</div>
</div>
</div>

<div class="container">
  <div class="col-sm-12">
  <center>
    <h1 class="host-event-hd">Programming with Teranex</h1>
    <h4 class="host-event-text">At Stelmac, we provide both live and structured training courses in the fields of<br>
 CAD/CAM, Machine Operation and Maintenance.</h4>
 <button type="submit" class="btn btn-default addmore-btn">Meet Our Programmers</button>
 </center>
 
   <center>
    <h1 class="host-event-hd">Programming Assembly</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
 CAD/CAM, Machine Operation and Maintenance.</h4>
 <button type="submit" class="btn btn-default addmore-btn">Enquire</button>
 </center>
 
 <center>
    <h1 class="host-event-hd">Programming a Component</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
 CAD/CAM, Machine Operation and Maintenance.</h4>
 <button type="submit" class="btn btn-default addmore-btn">Enquire</button>
 </center>
 
  <center>
    <h1 class="host-event-hd">Programming a Part</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
 CAD/CAM, Machine Operation and Maintenance.</h4>
 <button type="submit" class="btn btn-default addmore-btn">Enquire</button><br>
<br>
 </center>
 
 
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