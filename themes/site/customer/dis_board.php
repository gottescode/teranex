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
			
			$Topic = mysqli_real_escape_string($cn, $_POST["Topic"]);
			
			$result1 = "INSERT INTO topic (Topic, CustomerID, doe) VALUES ('$Topic', '$CustomerID', '$doe')";
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

		<form class="form" name="topic" id="topic" method="post" action="dis_board.php">
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
		$qy_add="select TopicID, Topic, CustomerID, doe from topic";
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
							$qy_add2="select count(TopicReplyID) from topic_reply where TopicID='$data[TopicID]'";
							$qy_add3=mysqli_fetch_array(mysqli_query($cn, $qy_add2));
							
							$qy_add21="select CompanyName from customer where CustomerID='$data[CustomerID]'";
							$qy_add31=mysqli_fetch_array(mysqli_query($cn, $qy_add21));
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><a href="topic_replies.php?TopicID=<? echo $data['TopicID'];?>"><? echo $data['Topic'];?></a></td>
								<td><? echo $qy_add31['CompanyName'];?></td>
								<td><? echo FormatMysqlDateTimeReport($data['doe']);?></td>
								<td><a href="topic_replies.php?TopicID=<? echo $data['TopicID'];?>"><? echo $qy_add3[0];?></a></td>
								
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