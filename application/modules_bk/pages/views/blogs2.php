<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">blogs@teranex</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

<div class="welcome-j-bg">
  <div class="container">
    <div class="col-xs-8 col-sm-8 col-lg-10">
<ol class="breadcrumb blog-breadcrumb">
          <li><a href="">News Room ></a></li>
          <li><a href="">News ></a></li>
        </ol>
        </div>
    <div class="col-xs-4 col-sm-4 col-lg-2">
      <ul>
        <li class="blog-advanced"><a href="#">Advanced Search</a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="container">
  <div class="col-sm-4 col-lg-3">
    <div class="legal-sidebar blog-sidebar">
      <h3>News Room</h3>
      <ul>
        <li><a href="blogs.php">blogs@teranex</a></li>
        <li><a href="events.php">Events</a></li>
        <li><a href="forum.php">Forum</a></li>
		<li class="dropdown-toggle" type="button" id="menu1" data-toggle="dropdown"> <a href="#">Appointments</a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="menu1">
              <li> <a href="#">All (3)</a></li>
              <li><a href="#">Appointments (5)</a></li>
              <li><a href="#">Interested Events (0)</a></li>
              <li><a href="#">Live Demo (0)</a></li>
              <li><a href="#">Live Inspection (1)</a></li>
              <li><a href="#">Live Event (1)</a></li>
              <li><a href="#">Remote Service (0)</a></li>
              <li><a href="#">Training (0)</a></li>
              <li><a href="#">Sales Video Chat (1)</a></li>
            </ul>
          </li>
        <li class="active"><a href="news.php">News</a></li>
      </ul>
    </div>
  </div>
  
  <div class="col-sm-8 col-lg-9">
 <div class="blog-Teranex">
 <h3>Laser Engineering and implications on industry</h3>  
 <p>By <span class="ylian-date">Ylian S.</span> on <span class="ylian-date">17/06/2017</span></p>
 <p class="share-icon"><span>Share</span><span><a href="#"><img src="images/blog-icon1.jpg"></a></span><span><a href="#"><img src="images/blog-icon2.jpg"></a></span><span><a href="#"><img src="images/blog-icon3.jpg"></a></span>
 <span><a href="#"><img src="images/blog-icon4.jpg"></a></span><span><a href="#"><img src="images/blog-icon5.jpg"></a></span><span><a href="#"><img src="images/blog-icon6.jpg"></a></span><span><a href="#"><img src="images/blog-icon7.jpg"></a></span>
 </p>  
<p>Panel discussion_Teranex era of smart 6 Aug Panel discussion_Teranex era of smart 6 Aug Panel discussion era of smart 6 Aug Date added: 06 Aug 2013 Panel discussion_ ... Kolkata-based digital printing company Speed Print has installed two Teranex Versant 80 printing presses. Vinod Dutia, founder and managing partner, Speed Print, said, "In order to meet the growing demand of good quality products, the Teranex seemed to be the best fit. It is a 2400dpi virtual print production press and has a much better and wider colour gamut. The speed and stability of the machine attracted us."<br>
<br>


Dutia believes it was a sound business decision, as with Teranex, the company is printing on 350gsm paper on regular basis. "Moreover, the machine has opened more avenues and provides us with wider options as far as printing on specialty media is concerned, which we were not able to do until now," he said.<br>
<br>


Speed Print caters to more than 600 customers and offers designing and printing of corporate brochures, calendars, greeting cards, visiting cards, certificates, manuals and other documents. "We expect a minimum of 25-30% growth on our sales within the first year of installation," said Dutia, adding, "Our printing capacity has increased up to 50,000 prints with two Versant 80 machines." </p>
</div>







  </div>
</div>  <!-- /.container --> 

<div class="container">
    <nav aria-label="...">
  <ul class="news-room-pagi pagination pagination-sm">
    <li class="page-item">
      <a class="page-link" href="#" tabindex="-1">< Previous</a>
    </li>
    <li class="page-item">
      <a class="page-link" href="#">Next ></a>
    </li>
  </ul>
</nav>
</div><!-- /.container -->

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