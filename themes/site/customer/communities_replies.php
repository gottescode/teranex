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
		if(isset($_POST['submit']))
		{
			$doe = date('Y-m-d H:i:s');
			$CustomerID = $_SESSION["CustomerID"];
			
			$YourReply = mysqli_real_escape_string($cn, $_POST["YourReply"]);
			$TopicID = mysqli_real_escape_string($cn, $_POST["TopicID"]);
			$CommunityID = mysqli_real_escape_string($cn, $_POST["CommunityID"]);
			
			$result1 = "INSERT INTO community_reply (TopicID, CommunityID, TopicReply, CustomerID, doe) VALUES ('$TopicID', '$CommunityID', '$YourReply', '$CustomerID', '$doe')";
			$result2 = mysqli_query($cn, $result1);
			
			if($result2)
			{
				?>
					<div class="alert alert-success">Message posted successfully.</div>
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
	
		<?
		if(isset($_GET['TopicID']) && isset($_GET['CommunityID']))
		{
			?>
			<form class="form" name="topic" id="topic" method="post" action="communities_replies.php?TopicID=<? echo $_GET['TopicID'];?>&CommunityID=<? echo $_GET['CommunityID'];?>">
			 	<input type="hidden" name="TopicID" value="<? echo $_GET['TopicID'];?>" />
				<input type="hidden" name="CommunityID" value="<? echo $_GET['CommunityID'];?>" />
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Your Reply</label>
					<div class="col-sm-12">
						<textarea class="form-control" id="YourReply" name="YourReply" placeholder="" ></textarea>
					</div>
				</div>
				
				
				<div class="form-group col-sm-12 col-xs-6">
				   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Reply" />
				</div>
			</form>
			<?
			$TopicID = $_GET['TopicID'];
			$CommunityID = $_GET['CommunityID'];
			$qy_add="select TopicReply, CustomerID, doe from community_reply where TopicID='$TopicID' and CommunityID='$CommunityID'";
			$qy_add1=mysqli_query($cn, $qy_add);
			
			//if(mysqli_num_rows($qy_add1) > 0)
			//{
				$qy_add4="select Topic from community_topic where TopicID='$TopicID'";
				$qy_add5=mysqli_fetch_array(mysqli_query($cn, $qy_add4));
			?>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC"><td><? echo $qy_add5['Topic']?></td></tr>
					</thead>
					<tbody>
							<?

							while($data = mysqli_fetch_assoc($qy_add1))
							{
								$qy_add2="select CompanyName from customer where CustomerID='$data[CustomerID]'";
								$qy_add3=mysqli_fetch_array(mysqli_query($cn, $qy_add2));
								?>
								<tr>
									<td><? echo $qy_add3['CompanyName'];?> (<? echo FormatMysqlDateTimeReport($data['doe']);?>)
									<br>
									<? echo $data['TopicReply'];?>
									</td>
									
									
								</tr>
								<?

							}
						?>
					</tbody>
				</table>
			<?
			//}
		}
			?>
	</div>
	<div class="col-sm-2">
		<?
		$qy_add4="select CompanyName, Email from customer where CustomerID in (select Moderator from community where CommunityID='$CommunityID')";
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
					$qy_users="select UserID from community_user where CommunityID='$CommunityID'";
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
$("#topic").submit(function(){
			
	if($("#YourReply").val() == "")
	{
		alert("Reply can not be blank");
		return false;
	}
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>