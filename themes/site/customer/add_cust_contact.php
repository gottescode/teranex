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
        <li class="myprofile">Add Contact Details</li>
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
			$ShortName = mysqli_real_escape_string($cn, $_POST["ShortName"]);
			$Designation = mysqli_real_escape_string($cn, $_POST["Designation"]);
			$Department = mysqli_real_escape_string($cn, $_POST["Department"]);
			$Email = mysqli_real_escape_string($cn, $_POST["Email"]);
			$Phone = mysqli_real_escape_string($cn, $_POST["Phone"]);
			$Ext = mysqli_real_escape_string($cn, $_POST["Ext"]);
			$CountryCode = mysqli_real_escape_string($cn, $_POST["CountryCode"]);
			$Mobile = mysqli_real_escape_string($cn, $_POST["Mobile"]);
			
			
			$result1 = "INSERT INTO cust_contact (CustomerID, Name, ShortName, Designation, Department, Email, Phone, Ext, CountryCode, Mobile, doe, dou) VALUES ('$CustomerID', '$Name', '$ShortName', '$Designation', '$Department', '$Email', '$Phone', '$Ext', '$CountryCode', '$Mobile', '$doe', '$doe')";
			$result2 = mysqli_query($cn, $result1);
			
			if($result2)
			{
				?>
					<div class="alert alert-success">Cutomer contact details added successfully.</div>
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
											
											
		<form class="form" name="contact" id="contact" method="post" action="add_cust_contact.php">
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Contact Person Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Name" name="Name" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Contact Person Short Name</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="ShortName" name="ShortName" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Contact Person Designation</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Designation" name="Designation" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Department</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Department" name="Department" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Email</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Email" name="Email" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Office Phone No</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Phone" name="Phone" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Ext</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Ext" name="Ext" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Country Code</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="CountryCode" name="CountryCode" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Mobile No</label>
				<div class="col-sm-12">
					<input type="text" class="form-control" id="Mobile" name="Mobile" placeholder=""  />
				</div>
			</div>
			
			<div class="form-group col-sm-12 col-xs-6">
			   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Add Contact" />
			</div>
		</form>
		
		<?
		$qy_add="select Name, Designation, Department, Email, Phone, Ext, Mobile, doe from cust_contact where CustomerID='$_SESSION[CustomerID]'";
		$qy_add1=mysqli_query($cn, $qy_add);
		
		if(mysqli_num_rows($qy_add1) > 0)
		{
		?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td>Contact Person Name</td><td>Designation</td><td>Department</td><td>Email</td><td>Phone (Ext)</td><td>Mobile</td><td>Addition Date</td></tr>
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
								<td><? echo $data['Designation'];?></td>
								<td><? echo $data['Department'];?></td>
								<td><? echo $data['Email'];?></td>
								<td><? echo $data['Phone'];?> <? if($data['Ext']!="") echo "($data[Ext])";?></td>
								<td><? echo $data['Mobile'];?></td>
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
$("#contact").submit(function(){
			
	if($("#Name").val() == "")
	{
		alert("Contact Name is required");
		return false;
	}
	
	if($("#Email").val() != "")
	{
		var b = $("#Email").val();
		var atpos=b.indexOf("@");
		var dotpos=b.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
		{
		  alert("Not a valid e-mail address");
		  return false;
		}
	}
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>