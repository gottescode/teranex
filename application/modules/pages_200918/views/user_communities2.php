<?php session_start();
include('header.php'); 
?>

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Join our Forum</li>
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
          <li><a href="">Forum ></a></li>
          <li><a href="">User Communities ></a></li>
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
  <div class="col-sm-3 col-lg-3">
    <div class="legal-sidebar blog-sidebar">
      <h3>Forum</h3>
      <ul>
        <li ><a href="#">Discussion Boards</a></li>
        <li class="active"><a href="#">User Communities</a></li>
        <li><a href="#">Events</a></li>
      </ul>
    </div>
  </div>
  
  <div class="col-sm-6 col-lg-6">
	<h3>Activity Story Stream</h3>
<hr>
 <div class="blog-stelmac">
	 <section class="comment-list">
          <!-- First Comment -->
          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail"><img src="images/joshua-img.png" /></figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> That Guy 
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time></div>
                  </header>
                  <div class="comment-post">
                    <p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </article>
		  <article class="row">
            <div class="col-md-2 col-sm-2 col-md-offset-1 col-sm-offset-0 hidden-xs">
              <figure class="thumbnail"><img src="images/joshua-img.png"/>
              </figure>
            </div>
            <div class="col-md-9 col-sm-9">
              <div class="panel panel-default arrow left">
                <div class="panel-heading right">Reply</div>
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> That Guy
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time></div>
                  </header>
                  <div class="comment-post">
                    <p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </article>

          <article class="row">
            <div class="col-md-2 col-sm-2 hidden-xs">
              <figure class="thumbnail"><img src="images/joshua-img.png" /></figure>
            </div>
            <div class="col-md-10 col-sm-10">
              <div class="panel panel-default arrow left">
                <div class="panel-body">
                  <header class="text-left">
                    <div class="comment-user"><i class="fa fa-user"></i> That Guy 
                    <time class="comment-date" datetime="16-12-2014 01:05"><i class="fa fa-clock-o"></i> Dec 16, 2014</time></div>
                  </header>
                  <div class="comment-post">
                    <p>quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                  </div>
                  <p class="text-right"><a href="#" class="btn btn-default btn-sm"><i class="fa fa-reply"></i> reply</a></p>
                </div>
              </div>
            </div>
          </article>
     </section>
</div>
  </div>
   <div class="col-sm-3 col-lg-3">
		<div class="text-center">
			<h3>Community Owners</h3>
			<img src="images/joshua-img.png" />
			<img src="images/joshua-img.png" />
		</div>
		<div class="members">
			<h3 class="text-center">Members</h3>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
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