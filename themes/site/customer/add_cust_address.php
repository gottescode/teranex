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
        <li class="myprofile">Add Address</li>
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

			$AddressType = mysqli_real_escape_string($cn, $_POST["AddressType"]);
			$Address1 = mysqli_real_escape_string($cn, $_POST["Address1"]);
			$Address2 = mysqli_real_escape_string($cn, $_POST["Address2"]);
			$Country = mysqli_real_escape_string($cn, $_POST["Country"]);
			$State = mysqli_real_escape_string($cn, $_POST["State"]);
			$City = mysqli_real_escape_string($cn, $_POST["City"]);
			$PinCode = mysqli_real_escape_string($cn, $_POST["PinCode"]);
			$Landmark = mysqli_real_escape_string($cn, $_POST["Landmark"]);
			$AddShortName = mysqli_real_escape_string($cn, $_POST["AddShortName"]);
			
			$result1 = "INSERT INTO cust_address (CustomerID, AddressType, Address1, Address2, Country, State, City, PinCode, Landmark, AddShortName, doe, dou) VALUES ('$CustomerID', '$AddressType', '$Address1', '$Address2', '$Country', '$State', '$City', '$PinCode', '$Landmark', '$AddShortName', '$doe', '$doe')";
			$result2 = mysqli_query($cn, $result1);
					
				
			if($result2)
			{
				?>
					<div class="alert alert-success">Customer address details added successfully.</div>
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
											
											
		<form class="form" name="address" id="address" method="post" action="add_cust_address.php">
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Type</label>
				<div class="col-sm-12">
					<select class="form-control" id="AddressType" name="AddressType">
						<option value="">Select Address Type</option>
						<option value="Registered Office">Registered Office</option>
						<option value="Corporate Office">Corporate Office</option>
						<option value="Regional Office">Regional Office</option>
						<option value="Branch Office">Branch Office</option>
						<option value="Factory-Plant">Factory-Plant</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Line 1</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Address1" name="Address1" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Line 2</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Address2" name="Address2" placeholder=""  />
				</div>
			</div>
			
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Country</label>
				<div class="col-sm-12">
					<select class="form-control" id="Country" name="Country">
						<option value="">Select Country</option>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">State</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="State" name="State" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">City</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="City" name="City" placeholder=""  />
				</div>
			</div>
			 
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Zip/Pin Code</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="PinCode" name="PinCode" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Landmark</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Landmark" name="Landmark" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Short Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="AddShortName" name="AddShortName" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12 col-xs-6">
			   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Add Address" />
			</div>
		</form>
		
		<?
		$qy_add="select AddressType, Address1, Address2, Country, State, City, doe from cust_address where CustomerID='$_SESSION[CustomerID]'";
		$qy_add1=mysqli_query($cn, $qy_add);
		
		if(mysqli_num_rows($qy_add1) > 0)
		{
		?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td>Address Type</td><td>Address Line 1</td><td>Address Line 2</td><td>Country</td><td>Sate</td><td>City</td><td>Addition Date</td></tr>
				</thead>
				<tbody>
						<?
						$SNo = 1;
						while($data = mysqli_fetch_assoc($qy_add1))
						{
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><? echo $data['AddressType'];?></td>
								<td><? echo $data['Address1'];?></td>
								<td><? echo $data['Address2'];?></td>
								<td><? echo $data['Country'];?></td>
								<td><? echo $data['State'];?></td>
								<td><? echo $data['City'];?></td>
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
$("#address").submit(function(){
			
	if($("#AddressType").val() == "")
	{
		alert("Address Type is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>