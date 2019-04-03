<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Service – Contract Manufacturing</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->

<div class="container">
  <div class="contract-manufacturing-bg">
    <div class="col-sm-3 contract-manufacturing-menu-bg">
      <nav class="host-event-navigation">
        <ul class="host-event-mainmenu">
          <h3>Contract Manufacturing</h3>
          <li><a href="">Assembly</a></li>
          <li><a href="">Component</a>
            <ul class="host-event-submenu">
              <li><a href="">Tops</a></li>
              <li><a href="">Bottoms</a></li>
              <li><a href="">Footwear</a></li>
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
    <h1 class="host-event-hd">Contract Manufacturing with Teranex</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
      CAD/CAM, Machine Operation and Maintenance.</h4>
  </div>
</div>

<div class="host-event-bg-grey">
  <div class="container">
    <p><img src="images/used-video-img.jpg" class="img-responsive">
    <p> 
  </div>
</div>

<div class="container">

  <div class="col-sm-12">
    <h1 class="host-event-hd">Assembly</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
      CAD/CAM, Machine Operation and Maintenance.</h4>
    <h1 class="host-event-hd">Component</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
      CAD/CAM, Machine Operation and Maintenance.</h4>
    <h1 class="host-event-hd">Part</h1>
    <h4 class="host-event-text">At Teranex, we provide both live and structured training courses in the fields of<br>
      CAD/CAM, Machine Operation and Maintenance.</h4>
    <center>
      <button type="submit" class="btn btn-default addmore-btn">Enquire</button>
    </center>
  </div>
  
  <div class="col-sm-12">
    <center>
      <h1 class="feature-hd">Easy and Fast Way to Start Manufacturing</h1>
    </center>
    <div class="easy-icon"> <span class="raise-img-bord"><img src="images/manufacturing-icon1.jpg"></span> <span>Raise <br>
      RFQ</span> </div>
    <div class="easy-arrow"><img src="images/arrow.jpg"></div>
    <div class="easy-icon"> <span class="raise-img-bord"><img src="images/manufacturing-icon2.jpg"></span> <span>Receive <br>
      Quote from<br>
      Suppliers </span> </div>
    <div class="easy-arrow"><img src="images/arrow.jpg"></div>
    <div class="easy-icon"> <span class="raise-img-bord"><img src="images/manufacturing-icon3.jpg"></span> <span>Confirm <br>
      Order</span> </div>
    <div class="easy-arrow"><img src="images/arrow.jpg"></div>
    <div class="easy-icon"> <span class="raise-img-bord"><img src="images/manufacturing-icon4.jpg"></span> <span>Production </span> </div>
    <div class="easy-arrow"><img src="images/arrow.jpg"></div>
    <div class="easy-icon"> <span class="raise-img-bord"><img src="images/manufacturing-icon5.jpg"></span> <span>Delivery </span> </div>
  </div>
</div>

<div class="feature-grey-bg">

  <div class="container">
    <center>
      <h1 class="feature-hd">Sign Up With Teranex Today</h1>
    </center>
    <div class="col-sm-12 col-sm-offset-1 col-md-6 col-md-offset-3">
      <div class="col-sm-5 col-md-6">
        <div class="signup-feature-text">
          <h1>Customer</h1>
          <ul>
            <li><span class="glyphicon glyphicon-ok"></span>Easy to Use</li>
            <li><span class="glyphicon glyphicon-ok"></span>3D Design Support</li>
            <li><span class="glyphicon glyphicon-ok"></span>On Time Delivery</li>
            <li><span class="glyphicon glyphicon-ok"></span>Quality Management</li>
          </ul>
          <button type="submit" class="btn btn-default addmore-btn">Sign up</button>
        </div>
      </div>
      
      <div class="col-sm-5 col-md-6">
        <div class="signup-feature-text">
          <h1>Partner</h1>
          <ul>
            <li><span class="glyphicon glyphicon-ok"></span>Improve Capacity</li>
            <li><span class="glyphicon glyphicon-ok"></span>On Time Payments</li>
            <li><span class="glyphicon glyphicon-ok"></span>Increase ROI</li>
            <li><span class="glyphicon glyphicon-ok"></span> Continuous Improve</li>
          </ul>
          <button type="submit" class="btn btn-default addmore-btn">Sign up</button>
        </div>
      </div>
    </div>
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