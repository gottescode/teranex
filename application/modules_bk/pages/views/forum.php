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
          <li><a href="index.html">News Room ></a></li>
          <li><a href="about.html">Forum ></a></li>	
          <li><a href="about.html">Categories ></a></li>
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
         <li ><a href="blogs.php">blogs@teranex</a></li>
        <li><a href="events.php">Events</a></li>
        <li class="active"><a href="forum.php">Forum</a></li>
        
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
        
        <li ><a href="news.php">News</a></li>
      </ul>
    </div>
  </div>
  
  <div class="col-sm-8 col-lg-9">
 <div class="blog-stelmac">
    <table class="table">
    <thead class="forum-table-bg">
      <tr>
        <th>Topic</th>
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