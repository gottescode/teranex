 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Update Company Details</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
        <li class="">Welcome  </li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->


<div class="row margin_0">
		<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="bg_white">
		<div class="col-sm-9 col-md-9 col-lg-10">
		<div class="border_bot col-sm-offset-2 col-sm-8 col-md-8 supplier-form " style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ;margin-top: 30px;">   
			<form class="form" name="company" id="company" method="post" action="">
				<div class="form-group">
					<select class="form_bor_bot" id="user_company_type" name="user_company_type">
					 	<option value="">Select Company Type</option> 
						<option value="Patnership" <?php if($customer_data['user_company_type']=='Patnership'){echo "selected";}?>>Patnership</option>
						<option value="Proprietorship" <?php if($customer_data['user_company_type']=='Proprietorship'){echo "selected";}?>>Proprietorship</option>
						<option value="Private Limited" <?php if($customer_data['user_company_type']=='Private Limited'){echo "selected";}?>>Private Limited</option>
						<option value="Public Limited" <?php if($customer_data['user_company_type']=='Public Limited'){echo "selected";}?>>Public Limited</option>
					</select><span class="compulsary">*</span>
				</div>
				<div class="form-group">
					<input type="text" class="form_bor_bot" id="user_company_name" name="user_company_name" placeholder="Company Commercial Name" value="<? echo $customer_data['user_company_name'];?>"  /><span class="compulsary">*</span>
				</div><div class="clearfix"></div>
			
				<div class="form-group">
					<input type="text" class="form_bor_bot alphaNumeric" id="user_gst_no" name="user_gst_no" placeholder="GSTIN Number" value="<? echo $customer_data['user_gst_no'];?>"  />
				</div>
				<div class="form-group">
					<input type="text" class="form_bor_bot alphaNumeric" id="user_pan_no" name="user_pan_no" placeholder="PAN Number" value="<? echo $customer_data['user_pan_no'];?>"  />
				</div><div class="clearfix"></div>
			
				<div class="form-group">
					<input type="text" class="form_bor_bot" id="user_company_website" name="user_company_website" placeholder="Company Website"  value="<? echo $customer_data['user_company_website'];?>"  />
				</div>
			 	<div class="clearfix"></div><br/>
				<div class="form-group">
				   <center><input type="submit" name="btnCompany" id="submit" class="btn btn_orange" value="Update Company Details" /></center>
				</div>
			</form>
		</div><div class="clearfix"></div>
	</div>
	</div>
</div>
<div class="clearfix"></div>
<!-- /.row --> 
 <?php $this->template->contentBegin(POS_BOTTOM);?>
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
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery('.alphaNumeric').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z0-9\.]/g,'');
});
$("#company").validate({
   rules: {  
				user_company_type:{
					required:true
				},
				user_company_name:{
					required:true
				},
			},
			messages: { 
				user_company_type:{
					required:"Please select company type"
				},
				user_company_name:{
					required:"Please enter company commercial name"
				},
			}
		}); 
		</script>
<?php echo $this->template->contentEnd();	?> 