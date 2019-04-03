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
        <li class="myprofile">Add Other Files</li>
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
			
			$Name = mysqli_real_escape_string($cn, $_POST["Name"]);
			$UploadedFile1 = "";
			if(file_exists($_FILES["UploadedFile"]["tmp_name"]) || is_uploaded_file($_FILES["UploadedFile"]["tmp_name"]))
			{
				$UploadedFile = $_FILES['UploadedFile'];
				$name = basename($_FILES["UploadedFile"]["name"]);
				if ($name != "")
				{
					$tmp_name = $_FILES["UploadedFile"]["tmp_name"];
					$new_name_1 = explode('.',$name);
					$extn = $new_name_1[1];
					$UploadedFile1 = "$CustomerID-$Name.$extn";
					move_uploaded_file($tmp_name, "../../../teranex_img/customer/$UploadedFile1");
				}
			}
			
			$result1 = "INSERT INTO cust_file (CustomerID, Name, UploadedFile, doe, dou) VALUES ('$CustomerID', '$Name', '$UploadedFile1', '$doe', '$doe')";
			$result2 = mysqli_query($cn, $result1);
				
			if($result2)
			{
				?>
					<div class="alert alert-success">Files uploaded successfully.</div>
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
											
											
		<form class="form" name="company" id="company" method="post" action="upload_other_files.php" enctype="multipart/form-data">
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">File Name</label>
				<div class="col-sm-12">
					<input type="text" name="Name" id="Name" class="form-control" />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Upload File</label>
				<div class="col-sm-12">
					<input type="file" name="UploadedFile" id="UploadedFile" class="form-control" />
				</div>
			</div>
			
			
			<div class="form-group col-sm-12 col-xs-6">
			   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Add Files" />
			</div>
		</form>
		
		<?
		$qy_add="select Name, UploadedFile, doe from cust_file where CustomerID='$_SESSION[CustomerID]'";
		$qy_add1=mysqli_query($cn, $qy_add);
		
		if(mysqli_num_rows($qy_add1) > 0)
		{
		?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td>File Name</td><td>Uploaded Date</td></tr>
				</thead>
				<tbody>
						<?
						$SNo = 1;
						while($data = mysqli_fetch_assoc($qy_add1))
						{
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><? echo $data['Name'];?></td>
								<td><? echo FormatMysqlDateTimeReport($data['doe']);?></td>
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
$("#company").submit(function(){
			
	if($("#Name").val() == "")
	{
		alert("File Name is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>