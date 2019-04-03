<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Toolings</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->

<div class="container-fluid used-machines-nav">
  <div class="container">
    <div class="col-sm-12">
      <ul>
        <li><a href="#">Bending</a></li>
        <li>|</li>
        <li><a href="#">Cutting</a> </li>
        <li>|</li>
        <li><a href="#">Drilling</a></li>
        <li>|</li>
        <li><a href="#">Handheld Tools</a></li>
        <li>|</li>
        <li><a href="#">Power Tools</a></li>
        <li>|</li>
        <li><a href="#">Punching</a></li>
        <li>|</li>
        <li><a href="#">Stamping</a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->

<div class="container">
  <div class="col-sm-12"> <img src="images/toolings.jpg" class="img-responsive">
    <h1 class="host-event-hd">Toolings</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
      laser technology and electronics</h4>
  </div>
</div>

<div class="host-event-bg-grey">
  <div class="container">
    <img src="images/used-video-img.jpg" class="img-responsive">
        <center><br>
      <button type="submit" class="btn btn-default addmore-btn">View All Toolings</button>
    </center>

  </div>
</div>

<div class="container">
  
  <div class="col-sm-12">
  
  <img src="images/bending-tools.jpg" class="img-responsive">
    <h1 class="host-event-hd">Bending Tools</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
      laser technology and electronics</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">View All Bending Tools</button>
    </center>
  
    <h1 class="host-event-hd">Cutting Tools</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">Coming Soon!</button>
    </center>
  <h1 class="host-event-hd">Drilling Tools</h1>
    <h4 class="host-event-text">At Stelmac, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">Coming Soon!</button>
    </center>
     <h1 class="host-event-hd">Handheld Tools</h1>
    <h4 class="host-event-text">At Stelmac, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">Coming Soon!</button>
    </center><br>

    
    <img src="images/power-tools.jpg" class="img-responsive">
    <h1 class="host-event-hd">Power Tools</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields <br>
      of laser technology and electronics</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">View All Power Tools</button>
    </center><br>

    
    <img src="images/punching-tools.jpg" class="img-responsive">
    <h1 class="host-event-hd">Punching Tools</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields <br>
      of laser technology and electronics</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">View All Punching Tools</button>
    </center>
    
    <h1 class="host-event-hd">Stamping Tools</h1>
    <h4 class="host-event-text">At Stelmac, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">Coming Soon!</button>
    </center><br>

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