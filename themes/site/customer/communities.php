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
        <li class="myprofile">User Communities</li>
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

	<div class="col-sm-10">
		
		<?
		if(isset($_GET['CommunityID']))
		{
			$qy_access="select count(CommunityUserID) from community_user where UserID='$_SESSION[CustomerID]' and CommunityID='$_GET[CommunityID]'";
			$qy_access1=mysqli_fetch_array(mysqli_query($cn, $qy_access));
			if($qy_access1[0]>0)
			{
				if(isset($_GET['submit']))
				{
					$doe = date('Y-m-d H:i:s');
					$CustomerID = $_SESSION["CustomerID"];
					
					$Topic = mysqli_real_escape_string($cn, $_GET["Topic"]);
					$CommunityID = mysqli_real_escape_string($cn, $_GET["CommunityID"]);
			
					$result1 = "INSERT INTO community_topic (Topic, CustomerID, CommunityID, doe) VALUES ('$Topic', '$CustomerID', '$CommunityID', '$doe')";
					$result2 = mysqli_query($cn, $result1);
					
					if($result2)
					{
						?>
							<div class="alert alert-success">Topic created successfully.</div>
						<?
						
					}
					else
					{
						?>
							<div class="alert alert-danger">There was some problem. Please contact admininstrator.</div>
						<?
					}
				
				}
				
			?>
			
				
					<form class="form" name="communities" id="communities" method="get" action="communities.php">
						<input type="hidden" name="CommunityID" value="<? echo $_GET['CommunityID'];?>" />
						<div class="form-group col-sm-6">
							<label class="col-sm-12 contact-label-text">Topic Name</label>
							<div class="col-sm-12">
								<textarea class="form-control" id="Topic" name="Topic" placeholder="" ></textarea>
							</div>
						</div>
						
						
						<div class="form-group col-sm-12 col-xs-6">
						   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Create Topic" />
						</div>
						
					</form>
					
					<?
					$qy_add="select TopicID, Topic, CustomerID, doe from community_topic where CommunityID='$_GET[CommunityID]'";
					$qy_add1=mysqli_query($cn, $qy_add);
					
					if(mysqli_num_rows($qy_add1) > 0)
					{
					?>
						<table id='' class="table table-striped table-hover">
							<thead>
								<tr bgcolor="#CCCCCC"><td>S.No</td><td>Topic</td><td>Author</td><td>Creation Date</td><td>Replies</td></tr>
							</thead>
							<tbody>
									<?
									$SNo = 1;
									while($data = mysqli_fetch_assoc($qy_add1))
									{
										$qy_add2="select count(CommunityReplyID) from community_reply where TopicID='$data[TopicID]' and CommunityID='$_GET[CommunityID]'";
										$qy_add3=mysqli_fetch_array(mysqli_query($cn, $qy_add2));
										
										$qy_add21="select CompanyName from customer where CustomerID='$data[CustomerID]'";
										$qy_add31=mysqli_fetch_array(mysqli_query($cn, $qy_add21));
										?>
										<tr>
											<td><? echo $SNo;?></td>
											<td><a href="communities_replies.php?TopicID=<? echo $data['TopicID'];?>&CommunityID=<? echo $_GET['CommunityID'];?>"><? echo $data['Topic'];?></a></td>
											<td><? echo $qy_add31['CompanyName'];?></td>
											<td><? echo FormatMysqlDateTimeReport($data['doe']);?></td>
											<td><a href="communities_replies.php?TopicID=<? echo $data['TopicID'];?>&CommunityID=<? echo $_GET['CommunityID'];?>"><? echo $qy_add3[0];?></a></td>
											
										</tr>
										<?
										$SNo = $SNo + 1;
									}
								?>
							</tbody>
						</table>
					<?
					}
					?>
					</div>
					<div class="col-sm-2">
					<?
					$qy_add4="select CompanyName, Email from customer where CustomerID in (select Moderator from community where CommunityID='$_GET[CommunityID]')";
					$qy_add5=mysqli_fetch_assoc(mysqli_query($cn, $qy_add4));
					?>
						<table id='' class="table table-striped table-hover">
							<thead>
								<tr bgcolor="#CCCCCC" align="center"><td>Owner</td><td>Moderator</td></tr>
							</thead>
							<tbody>
									
								<tr align="center">
									<td>Admin</td><td><? echo $qy_add5['CompanyName'];?></td>
								</tr>
									
							</tbody>
						</table>
						
						<table id='' class="table table-striped table-hover">
							<thead>
								<tr bgcolor="#CCCCCC" align="center"><td>Member's</td></tr>
							</thead>
							<tbody>
								<?
								$qy_users="select UserID from community_user where CommunityID='$_GET[CommunityID]'";
								$qy_users1=mysqli_query($cn, $qy_users);
								while($qy_users2 = mysqli_fetch_assoc($qy_users1))
								{
									$qy_add6="select CompanyName, Email from customer where CustomerID='$qy_users2[UserID]'";
									$qy_add7=mysqli_fetch_assoc(mysqli_query($cn, $qy_add6));
									?><tr align="center"><td><? echo $qy_add7['CompanyName'];?></td></tr><?
								}
								?>	
																	
							</tbody>
						</table>
						
					</div>		
					<?
			}
			else
			{
				?>
					</div><div class="alert alert-danger">Sorry you are not registered in this community. Please fill your code below to register.</div>
					<form class="form" name="register" id="register" method="post" action="communities_register.php">
						<input type="hidden" name="CommunityID" value="<? echo $_GET['CommunityID'];?>" />
						<div class="form-group col-sm-6">
							<label class="col-sm-12 contact-label-text">Please enter your registration code sent to your email address</label>
							<div class="col-sm-12">
								<input type="text" class="form-control" id="Code" name="Code" placeholder="" />
							</div>
						</div>
						
						
						<div class="form-group col-sm-12 col-xs-6">
						   <input type="submit" name="register" id="register" class="btn btn-default submit-btn" value="Register Me" />
						</div>
						
					</form>
				<?
			}
		
		}
		?>
	
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
			
	if($("#Topic").val() == "")
	{
		alert("Topic can not be blank");
		return false;
	}
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>