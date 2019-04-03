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
        <li class="myprofile">Discussion Boards</li>
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
		if(isset($_POST['submit']))
		{
			$doe = date('Y-m-d H:i:s');
			$CustomerID = $_SESSION["CustomerID"];
			
			$YourReply = mysqli_real_escape_string($cn, $_POST["YourReply"]);
			$TopicID = mysqli_real_escape_string($cn, $_POST["TopicID"]);
			
			$result1 = "INSERT INTO topic_reply (TopicID, TopicReply, CustomerID, doe) VALUES ('$TopicID', '$YourReply', '$CustomerID', '$doe')";
			$result2 = mysqli_query($cn, $result1);
			
			if($result2)
			{
				?>
					<div class="alert alert-success">Reply posted successfully.</div>
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
		if(isset($_GET['TopicID']))
		{
			?>
			<form class="form" name="topic" id="topic" method="post" action="topic_replies.php?TopicID=<? echo $_GET['TopicID'];?>">
			 	<input type="hidden" name="TopicID" value="<? echo $_GET['TopicID'];?>" />
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
			$qy_add="select TopicReply, CustomerID, doe from topic_reply where TopicID='$TopicID'";
			$qy_add1=mysqli_query($cn, $qy_add);
			
			//if(mysqli_num_rows($qy_add1) > 0)
			//{
				$qy_add4="select Topic from topic where TopicID='$TopicID'";
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