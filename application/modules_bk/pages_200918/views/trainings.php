<?php session_start();
include('header.php'); 
?>

<div class="container">
<div class="service-training-bg">
<div class="col-sm-3 host-menu-bg">

 <nav class="host-event-navigation">
  <ul class="host-event-mainmenu">
    <h3>Courses</h3>
    <li><a href="">CAD / CAM</a></li>
    <li><a href="">Machine Operation</a>
      <ul class="host-event-submenu">
        <li><a href="">Operation</a></li>
        <li><a href="">Servicing</a></li>
        <li><a href="">Maintenance</a></li>
      </ul>
    </li>
    <li><a href="">Maintenance</a></li>
    <li><a href="">On Demand Courses</a></li>
  </ul>
</nav> 

</div>
</div>
</div>

<div class="container">
  <div class="col-sm-12">
  <center>
    <h1 class="host-event-hd">Training with Teranex</h1>
    <h4 class="host-event-text">In order to exploit the full potential of your machines, TERANEX offers practical training courses to cover all the aspects of designing, programming, planning, operation and maintenance of your machines. </h4>
 <button type="submit" class="btn btn-default addmore-btn">View All Courses</button>
 </center>
 
   <center>
    <h1 class="host-event-hd">CAD/CAM Courses</h1>
    <h4 class="host-event-text">The programming training courses are designed for beginners and as well as advanced participants to harness the optimal performance of machines. </h4>
 <button type="submit" class="btn btn-default addmore-btn">View CAD/CAM Courses</button>
 </center>
 
 <center>
    <h1 class="host-event-hd">Machine Operation Courses</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
 CAD/CAM, Machine Operation and Maintenance.</h4>
 <button type="submit" class="btn btn-default addmore-btn">View Machine Operation Courses</button>
 </center>
 
  <center>
    <h1 class="host-event-hd">Maintenance Courses</h1>
    <h4 class="host-event-text">Learn how to maintain machines in your environment through practical experience underpinned with sound theoretical foundation.  
</h4>
 <button type="submit" class="btn btn-default addmore-btn">View Maintenance Courses</button>
 </center>
 
   <center>
    <h1 class="host-event-hd">On-Demand Courses</h1>
    <h4 class="host-event-text">In addition to standard courses, we offer individual training courses structured according to the specific nature of your requirements.
</h4>
 <button type="submit" class="btn btn-default addmore-btn">On-Demand Courses</button><br>
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