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
 <div class="blog-stelmac">
    <table class="table">
    <thead class="forum-table-bg">
      <tr>
        <th>Questions and  Discussions</th>
        <th>Date Created</th>
        <th>Posts</th>
        <th>Views</th>
      </tr>
    </thead>
    <tbody class="forum-text">
      <tr>
        <td>Advertisement's in posts are prohibited<br>
        <em class="forum-ylian">By Ylian S.</em>
         </td>
        <td>17/06/2017</td>
        <td>2</td>
        <td>762</td>
      </tr>
     <tr>
        <td>Advertisement's in posts are prohibited<br>
        <em class="forum-ylian">By Ylian S.</em>
         </td>
        <td>17/06/2017</td>
        <td>2</td>
        <td>762</td>
      </tr>
      
      <tr>
        <td>Advertisement's in posts are prohibited<br>
        <em class="forum-ylian">By Ylian S.</em>
         </td>
        <td>17/06/2017</td>
        <td>2</td>
        <td>762</td>
      </tr>
      
      <tr>
        <td>Advertisement's in posts are prohibited<br>
        <em class="forum-ylian">By Ylian S.</em>
         </td>
        <td>17/06/2017</td>
        <td>2</td>
        <td>762</td>
      </tr>
      <tr>
        <td>Advertisement's in posts are prohibited<br>
        <em class="forum-ylian">By Ylian S.</em>
         </td>
        <td>17/06/2017</td>
        <td>2</td>
        <td>762</td>
      </tr>
      <tr>
        <td>Advertisement's in posts are prohibited<br>
        <em class="forum-ylian">By Ylian S.</em>
         </td>
        <td>17/06/2017</td>
        <td>2</td>
        <td>762</td>
      </tr>

     
    </tbody>
  </table>

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