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
        <li class="myprofile">Create RFQ</li>
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
			
			$Quantity = mysqli_real_escape_string($cn, $_POST["Quantity"]);
			$ProductType = mysqli_real_escape_string($cn, $_POST["ProductType"]);
			$ProductName = mysqli_real_escape_string($cn, $_POST["ProductName"]);
			
			$result1 = "INSERT INTO rfq (CustomerID, Quantity, ProductType, ProductName, doe, dou) VALUES ('$CustomerID', '$Quantity', '$ProductType', '$ProductName', '$doe', '$doe')";
			$result2 = mysqli_query($cn, $result1);
			
			if($result2)
			{
				?>
					<div class="alert alert-success">RFQ created successfully.</div>
				<?
				
			}
			else
			{
				?>
					<div class="alert alert-danger">There was some problem. Please contact admininstrator.</div>
				<?
			}
		
		}
		
	
		if(isset($_GET['submit_stat']))
		{
			if($_GET['submit_stat'] == "success")
			{
				?>
				<div class="alert alert-success">RFQ submitted successfully</div>
				<?
			}
			else
			{
				?>
				<div class="alert alert-danger">There was some problem. Please contact administrator</div>
				<?
			}
		}
	
	?>
											
											
		<form class="form" name="rfq" id="rfq" method="post" action="create_rfq.php">
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">RFQ Quantity</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Quantity" name="Quantity" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Product Type</label>
				<div class="col-sm-12">
					<select class="form-control" id="ProductType" name="ProductType">
						<option value="">Select Product Type</option>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Product Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="ProductName" name="ProductName" placeholder=""  />
				</div>
			</div>
			
			<legend>Product Requirement</legend>
			
			<legend>Product Specification</legend>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Material</label>
				<div class="col-sm-12">
					<select class="form-control" id="Material" name="Material">
						<option value="">Select Product Type</option>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Dimensions</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Dimensions" name="Dimensions" placeholder="LxWxH"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Technical Details</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="TechDetails" name="TechDetails" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Other Details</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="OtherDetails" name="OtherDetails" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Product Sample Available</label>
				<div class="col-sm-12">
					<select class="form-control" id="SampleAvailable" name="SampleAvailable">
						<option value="">Select...</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
			</div>
			
			<div class="form-group col-sm-12 col-xs-6">
			   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Create RFQ" />
			</div>
		</form>
		
		<?
		$qy_add="select RFQID, Quantity, ProductType, ProductName, doe, SubmitStat from rfq where CustomerID='$_SESSION[CustomerID]'";
		$qy_add1=mysqli_query($cn, $qy_add);
		
		if(mysqli_num_rows($qy_add1) > 0)
		{
		?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td>RFQ ID</td><td>Quantity</td><td>ProductType</td><td>ProductName</td><td>Creation Date</td><td>Submit RFQ</td></tr>
				</thead>
				<tbody>
						<?
						$SNo = 1;
						while($data = mysqli_fetch_assoc($qy_add1))
						{
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><? echo $data['RFQID'];?></td>
								<td><? echo $data['Quantity'];?></td>
								<td><? echo $data['ProductType'];?></td>
								<td><? echo $data['ProductName'];?></td>
								<td><? echo FormatMysqlDateTimeReport($data['doe']);?></td>
								<?
								if($data['SubmitStat'] == 0)
								{
									?><td><a href="submit_rfq.php?RFQID=<? echo $data['RFQID'];?>">Submit</a></td><?
								}
								else
								{
									?><td>Already submitted</td><?
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
$("#rfq").submit(function(){
			
	if($("#Quantity").val() == "")
	{
		alert("Quantity is required");
		return false;
	}
	if($("#ProductType").val() == "")
	{
		alert("Product Type selection is required");
		return false;
	}
	if($("#ProductName").val() == "")
	{
		alert("Product Name is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>