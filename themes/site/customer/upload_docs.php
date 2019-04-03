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
        <li class="myprofile">Update Company Docs</li>
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
			
			$CompanyLogo1 = $GSTINImg1 = $PANImg1 = $CompanyIncorp1 = "";
			
			if(file_exists($_FILES["CompanyLogo"]["tmp_name"]) || is_uploaded_file($_FILES["CompanyLogo"]["tmp_name"]))
			{
				$CompanyLogo = $_FILES['CompanyLogo'];
				$name = basename($_FILES["CompanyLogo"]["name"]);
				if ($name != "")
				{
					$tmp_name = $_FILES["CompanyLogo"]["tmp_name"];
					$new_name_1 = explode('.',$name);
					$extn = $new_name_1[1];
					$CompanyLogo1 = "$CustomerID-CompLogo.$extn";
					move_uploaded_file($tmp_name, "../../../teranex_img/customer/$CompanyLogo1");
				}
			}
			
			if(file_exists($_FILES["GSTINImg"]["tmp_name"]) || is_uploaded_file($_FILES["GSTINImg"]["tmp_name"]))
			{
				$GSTINImg = $_FILES['GSTINImg'];
				$name = basename($_FILES["GSTINImg"]["name"]);
				if ($name != "")
				{
					$tmp_name = $_FILES["GSTINImg"]["tmp_name"];
					$new_name_1 = explode('.',$name);
					$extn = $new_name_1[1];
					$GSTINImg1 = "$CustomerID-GSTINImg.$extn";
					move_uploaded_file($tmp_name, "../../../teranex_img/customer/$GSTINImg1");
				}
			}
			
			if(file_exists($_FILES["PANImg"]["tmp_name"]) || is_uploaded_file($_FILES["PANImg"]["tmp_name"]))
			{
				$PANImg = $_FILES['PANImg'];
				$name = basename($_FILES["PANImg"]["name"]);
				if ($name != "")
				{
					$tmp_name = $_FILES["PANImg"]["tmp_name"];
					$new_name_1 = explode('.',$name);
					$extn = $new_name_1[1];
					$PANImg1 = "$CustomerID-PANImg.$extn";
					move_uploaded_file($tmp_name, "../../../teranex_img/customer/$PANImg1");
				}
			}
			
			if(file_exists($_FILES["CompanyIncorp"]["tmp_name"]) || is_uploaded_file($_FILES["CompanyIncorp"]["tmp_name"]))
			{
				$CompanyIncorp = $_FILES['CompanyIncorp'];
				$name = basename($_FILES["CompanyIncorp"]["name"]);
				if ($name != "")
				{
					$tmp_name = $_FILES["CompanyIncorp"]["tmp_name"];
					$new_name_1 = explode('.',$name);
					$extn = $new_name_1[1];
					$CompanyIncorp1 = "$CustomerID-CompanyIncorp.$extn";
					move_uploaded_file($tmp_name, "../../../teranex_img/customer/$CompanyIncorp1");
				}
			}						
			

			if($CompanyLogo1 == "" && $GSTINImg1 == "" && $PANImg1 == "" && $CompanyIncorp1 == "")
			{
				?>
					<div class="alert alert-danger">Nothing to update.</div>
				<?
			}
			else
			{
				$result1 = "UPDATE customer SET CompanyLogo='$CompanyLogo1', GSTINImg='$GSTINImg1', PANImg='$PANImg1', CompanyIncorp='$CompanyIncorp1', dou='$doe' WHERE CustomerID='$CustomerID'";
				$result2 = mysqli_query($cn, $result1);
					
				if($result2)
				{
					?>
						<div class="alert alert-success">Company docs updated successfully.</div>
					<?
					
				}
				else
				{
					?>
						<div class="alert alert-danger">There was some problem. Please contact admininstrator.</div>
					<?
				}
			}
		}
	
	?>
											
											
		<form class="form" name="company" id="company" method="post" action="upload_docs.php" enctype="multipart/form-data">
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Company Logo</label>
				<div class="col-sm-12">
					<input type="file" name="CompanyLogo" id="CompanyLogo" class="form-control" />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">GSTIN</label>
				<div class="col-sm-12">
					<input type="file" name="GSTINImg" id="GSTINImg" class="form-control" />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">PAN</label>
				<div class="col-sm-12">
					<input type="file" name="PANImg" id="PANImg" class="form-control" />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Company Incorporation Certificate</label>
				<div class="col-sm-12">
					<input type="file" name="CompanyIncorp" id="CompanyIncorp" class="form-control" />
				</div>
			</div>
			
			<div class="form-group col-sm-12 col-xs-6">
			   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Update Company Docs" />
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
/*$("#company").submit(function(){
			
	if($("#CompanyType").val() == "")
	{
		alert("Company Type is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});*/
});
</script>