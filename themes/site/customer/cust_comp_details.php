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
        <li class="myprofile">Update Company Details</li>
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

			$CompanyType = mysqli_real_escape_string($cn, $_POST["CompanyType"]);
			$CompanyName = mysqli_real_escape_string($cn, $_POST["CompanyName"]);
			$GSTIN = mysqli_real_escape_string($cn, $_POST["GSTIN"]);
			$PAN = mysqli_real_escape_string($cn, $_POST["PAN"]);
			$Website = mysqli_real_escape_string($cn, $_POST["Website"]);
			$OtherInfo = mysqli_real_escape_string($cn, $_POST["OtherInfo"]);
			
			$result1 = "UPDATE customer SET CompanyType='$CompanyType', CompanyName='$CompanyName', GSTIN='$GSTIN', PAN='$PAN', Website='$Website', OtherInfo='$OtherInfo', dou='$doe' WHERE CustomerID='$CustomerID'";
			$result2 = mysqli_query($cn, $result1);
					
				
			if($result2)
			{
				?>
					<div class="alert alert-success">Company details added successfully.</div>
				<?
				
			}
			else
			{
				?>
					<div class="alert alert-danger">There was some problem. Please contact admininstrator.</div>
				<?
			}
		
		}
	
	
	$qy_comp_details="select CompanyType, CompanyName, GSTIN, PAN, Website, OtherInfo from customer where CustomerID='$_SESSION[CustomerID]'";
	$qy_comp_details1=mysqli_fetch_array(mysqli_query($cn, $qy_comp_details));	
	?>
											
											
		<form class="form" name="company" id="company" method="post" action="cust_comp_details.php">
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Company Type</label>
				<div class="col-sm-12">
					<select class="form-control" id="CompanyType" name="CompanyType">
						<?
						if($qy_comp_details1['CompanyType']!="")
						{
							?><option value="<? echo $qy_comp_details1['CompanyType'];?>"><? echo $qy_comp_details1['CompanyType'];?></option><?
						}
						else
						{
							?><option value="">Select Company Type</option><?
						}
						?>
						
						<option value="Patnership">Patnership</option>
						<option value="Proprietorship">Proprietorship</option>
						<option value="Private Limited">Private Limited</option>
						<option value="Public Limited">Public Limited</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Company Commercial Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="CompanyName" name="CompanyName" placeholder="" value="<? echo $qy_comp_details1['CompanyName'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">GSTIN Number</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="GSTIN" name="GSTIN" placeholder="" value="<? echo $qy_comp_details1['GSTIN'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">PAN Number</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="PAN" name="PAN" placeholder="" value="<? echo $qy_comp_details1['PAN'];?>"  />
				</div>
			</div>
			
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Company Website</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Website" name="Website" placeholder=""  value="<? echo $qy_comp_details1['Website'];?>"  />
				</div>
			</div>
			
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Any Other Info</label>
				<div class="col-sm-12">
					<textarea class="form-control" id="OtherInfo" name="OtherInfo" placeholder=""><? echo $qy_comp_details1['OtherInfo'];?></textarea>
				</div>
			</div>
			
			<div class="form-group col-sm-12 col-xs-6">
			   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Update Company Details" />
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
$("#company").submit(function(){
			
	if($("#CompanyType").val() == "")
	{
		alert("Company Type is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>