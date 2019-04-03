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
		
		
		<?
		if(isset($_GET['msg_invite']))
		{
			if($_GET['msg_invite'] == "Pass")
			{
			?>
				<div class="alert alert-success">Invites sent successfully.</div>
			<?
			}
			else
			{
			?>
				<div class="alert alert-danger">There was some problem. Please contact admininstrator.</div>
			<?
			}
		}
		
		if(isset($_GET['msg']))
		{
			if($_GET['msg'] == "Pass")
			{
			?>
				<div class="alert alert-success">Registration successful.</div>
			<?
			}
			else
			{
			?>
				<div class="alert alert-danger">There was some problem. Please contact admininstrator.</div>
			<?
			}
		}
				
		$qy_add="select Name, Description, Moderator, doe, CommunityID from community";
		$qy_add1=mysqli_query($cn, $qy_add);
		
		if(mysqli_num_rows($qy_add1) > 0)
		{
		?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td>Community</td><td>Description</td><td>Moderator</td><td>Creation Date</td><td>Send Invite</td></tr>
				</thead>
				<tbody>
						<?
						$SNo = 1;
						while($data = mysqli_fetch_assoc($qy_add1))
						{
							$qy_add4="select CompanyName, Email from customer where CustomerID='$data[Moderator]'";
							$qy_add5=mysqli_fetch_assoc(mysqli_query($cn, $qy_add4));
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><a href="communities.php?CommunityID=<? echo $data['CommunityID'];?>"><? echo $data['Name'];?></a></td>
								<td><? echo $data['Description'];?></td>
								<td><? echo $qy_add5['CompanyName'];?></td>
								<td><? echo FormatMysqlDateTimeReport($data['doe']);?></td>
								<?
								if($_SESSION['CustomerID'] == $data['Moderator'])
								{
									?><td><a href="communities_invite.php?CommunityID=<? echo $data['CommunityID'];?>">Invite</a></td><?
								}
								else
								{
									?><td>-</td><?
								}
								?>
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