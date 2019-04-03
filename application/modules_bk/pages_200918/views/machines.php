<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Machines</li>
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
        <li><a href="#">Laser Cutting</a> </li>
         <li>|</li>
           <li><a href="#">Laser Marking</a></li>
            <li>|</li> 
             <li><a href="#">Laser Welding</a></li>
               <li>|</li>  
               <li><a href="#">MIG Welding</a></li>
                 <li>|</li> 
                  <li><a href="#">Punching</a></li> 
                   <li>|</li>
                     <li><a href="#">Shearing</a></li>
                       <li>|</li> 
                       <li><a href="#">TIG Welding</a></li> 
                        <li>|</li> 
                         <li><a href="#">Tube Cutting</a></li> 
      

      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->



<div class="container">
  <div class="col-sm-12">
  <img src="images/used-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">Used Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
  </div>
</div>

<div class="host-event-bg-grey"> 
<div class="container">   
<img src="images/used-video-img.jpg" class="img-responsive">
</div>
</div>

<div class="container">
  <div class="col-sm-12">
  <img src="images/bending-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">Bending Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View Bending Machines</button></center><br>
<br>

  </div>
  
  <div class="col-sm-12">
  <img src="images/laser-cutting-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">Laser Cutting Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields <br>
of laser technology and electronics</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View Laser Cutting Machines</button></center><br>
<br>

  </div>
  
  <div class="col-sm-12">
  <img src="images/laser-marking-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">Laser Marking Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields <br>
of laser technology and electronics</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View Laser Marking Machines</button></center><br>
<br>

  </div>
  
  <div class="col-sm-12">
  <img src="images/laser-welding-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">Laser Welding Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View Laser Welding Machines</button></center><br>
<br>

  </div>
  
  <div class="col-sm-12">
  <img src="images/mig-welding-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">MIG Welding Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View MIG Welding Machines</button></center><br>
<br>

  </div>
  
  <div class="col-sm-12">
  <img src="images/punching-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">Punching Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of<br>
 laser technology and electronics
</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View Punching Machines</button></center><br>
<br>

  </div>
  
  <div class="col-sm-12">
  <img src="images/tig-welding-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">TIG Welding Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of <br>
laser technology and electronics</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View TIG Welding Machines</button></center><br>
<br>

  </div>
  
  <div class="col-sm-12">
  <img src="images/tube-cutting-machines.jpg" class="img-responsive">
    <h1 class="host-event-hd">Tube Cutting Machines</h1>
    <h4 class="host-event-text">At Teranex, we provide manufacturing solutions in the fields of<br>
 laser technology and electronics</h4>
<center><button type="submit" class="btn btn-default addmore-btn">View Tube Cutting Machines</button></center><br>
<br>

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