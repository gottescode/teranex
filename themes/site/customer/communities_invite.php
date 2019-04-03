<?php session_start();

if(!isset($_SESSION["CustomerLogged"]) || $_SESSION["CustomerLogged"] == 0)
{
	header("Location: ../customer_registration.php");
}
include('../lib/config.php');
include('cust_header.php'); 
include_once "../lib/helpers.php";
?>

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Send Invites</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->


<?
include('cust_side_menu.php'); 
?>


<div class="col-md-10 col-sm-12 col-xs-12 supplier-form">
		
			<form class="form" name="communities" id="communities" method="post" action="communities_invite_1.php">
				<input type="hidden" name="CommunityID" value="<? echo $_GET['CommunityID'];?>" />
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Enter email address with comma as separator and max 10-15 a time</label>
					<div class="col-sm-12">
						<input type="text" class="form-control" id="Email" name="Email" placeholder=""  />
					</div>
				</div>
				
				
				<div class="form-group col-sm-12 col-xs-6">
				   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Send Invite" />
				</div>
				
			</form>
	
</div>
</div>
<!-- /.row --> 
	  
</div>
<!-- /.container -->
<?
include('cust_footer.php'); 
?>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#communities").submit(function(){
			
	if($("#Email").val() == "")
	{
		alert("Email address is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>