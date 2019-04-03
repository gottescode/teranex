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
        <li class="myprofile">Update Bank Details</li>
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

			$AccountNumber = mysqli_real_escape_string($cn, $_POST["AccountNumber"]);
			$ReAccountNumber = mysqli_real_escape_string($cn, $_POST["ReAccountNumber"]);
			if($AccountNumber == $ReAccountNumber)
			{
				$AccountName = mysqli_real_escape_string($cn, $_POST["AccountName"]);
				$AccountType = mysqli_real_escape_string($cn, $_POST["AccountType"]);
				$BankName = mysqli_real_escape_string($cn, $_POST["BankName"]);
				$BranchName = mysqli_real_escape_string($cn, $_POST["BranchName"]);
				$BCountry = mysqli_real_escape_string($cn, $_POST["BCountry"]);
				$BState = mysqli_real_escape_string($cn, $_POST["BState"]);
				$BCity = mysqli_real_escape_string($cn, $_POST["BCity"]);
				$BPinCode = mysqli_real_escape_string($cn, $_POST["BPinCode"]);
				$BankPhone = mysqli_real_escape_string($cn, $_POST["BankPhone"]);
				$IFSC = mysqli_real_escape_string($cn, $_POST["IFSC"]);
				$MICR = mysqli_real_escape_string($cn, $_POST["MICR"]);
				$SWIFT = mysqli_real_escape_string($cn, $_POST["SWIFT"]);
				$Comments = mysqli_real_escape_string($cn, $_POST["Comments"]);
				
				$result1 = "UPDATE customer SET AccountNumber='$AccountNumber', AccountName='$AccountName', AccountType='$AccountType', BankName='$BankName', BranchName='$BranchName', BCountry='$BCountry', BState='$BState', BCity='$BCity', BPinCode='$BPinCode', BankPhone='$BankPhone', IFSC='$IFSC', MICR='$MICR', SWIFT='$SWIFT', Comments='$Comments', dou='$doe' WHERE CustomerID='$CustomerID'";
				$result2 = mysqli_query($cn, $result1);
						
					
				if($result2)
				{
					?>
						<div class="alert alert-success">Bank details added successfully.</div>
					<?
					
				}
				else
				{
					?>
						<div class="alert alert-danger">There was some problem. Please contact admininstrator.</div>
					<?
				}
			}
			else
			{
				?>
					<div class="alert alert-danger">Re entered Account Number doesnot match with the Account Number.</div>
				<?
			}
		}
	
	
	$qy_comp_details="select AccountName, AccountType, BankName, BranchName, BCountry, BState, BCity, BPinCode, BankPhone, IFSC, MICR, SWIFT, Comments from customer where CustomerID='$_SESSION[CustomerID]'";
	$qy_comp_details1=mysqli_fetch_array(mysqli_query($cn, $qy_comp_details));	
	?>
											
											
		<form class="form" name="bank" id="bank" method="post" action="cust_bank_details.php">
			
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Account Number</label>
				<div class="col-sm-12">
					<input type="password" class="form-control" id="AccountNumber" name="AccountNumber" placeholder="" />
				</div>
			</div> 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Re Confirm Account Number</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="ReAccountNumber" name="ReAccountNumber" placeholder="" />
				</div>
			</div> 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Account Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="AccountName" name="AccountName" placeholder="" value="<? echo $qy_comp_details1['AccountName'];?>" />
				</div>
			</div> 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Account Type</label>
				<div class="col-sm-12">
					<select class="form-control" id="AccountType" name="AccountType">
						<?
						if($qy_comp_details1['AccountType']!="")
						{
							?><option value="<? echo $qy_comp_details1['AccountType'];?>"><? echo $qy_comp_details1['AccountType'];?></option><?
						}
						else
						{
							?><option value="">Select Account Type</option><?
						}
						?>
						
						<option value="Saving Account">Saving Account</option>
						<option value="Current Account">Current Account</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Bank Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="BankName" name="BankName" placeholder="" value="<? echo $qy_comp_details1['BankName'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Branch Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="BranchName" name="BranchName" placeholder="" value="<? echo $qy_comp_details1['BranchName'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Country</label>
				<div class="col-sm-12">
					<select class="form-control" id="BCountry" name="BCountry">
						<?
						if($qy_comp_details1['BCountry']!="")
						{
							?><option value="<? echo $qy_comp_details1['BCountry'];?>"><? echo $qy_comp_details1['BCountry'];?></option><?
						}
						else
						{
							?><option value="">Select Country</option><?
						}
						?>
						<option value="A">A</option>
						<option value="B">B</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">State</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="BState" name="BState" placeholder="" value="<? echo $qy_comp_details1['BState'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">City</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="BCity" name="BCity" placeholder="" value="<? echo $qy_comp_details1['BCity'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Zip/Pin Code</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="BPinCode" name="BPinCode" placeholder="" value="<? echo $qy_comp_details1['BPinCode'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Bank Phone Numner</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="BankPhone" name="BankPhone" placeholder=""  value="<? echo $qy_comp_details1['BankPhone'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">IFSC Code</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="IFSC" name="IFSC" placeholder=""  value="<? echo $qy_comp_details1['IFSC'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">MICR Code</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="MICR" name="MICR" placeholder=""  value="<? echo $qy_comp_details1['MICR'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">SWIFT Code</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="SWIFT" name="SWIFT" placeholder=""  value="<? echo $qy_comp_details1['SWIFT'];?>"  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Comments if Any</label>
				<div class="col-sm-12">
					<textarea class="form-control" id="Comments" name="Comments" placeholder=""><? echo $qy_comp_details1['Comments'];?></textarea>
				</div>
			</div>
			<div class="form-group col-sm-12 col-xs-6">
			   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Update Bank Details" />
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
$("#bank").submit(function(){
			
	if($("#AccountNumber").val() == "")
	{
		alert("Account Number is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>