 
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
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10">
      <ul>
        <li class="">Welcome <? echo $_SESSION['CustomerCompany'];?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="container">
  <div class="row row-flex">
<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="col-md-10 col-sm-12 col-xs-12 supplier-form"> 
											
											
		<form class="form" name="bank" id="bank" method="post" action="">
			
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Account Number <span class="red">*</span></label>
					<input type="text" class="form-control input-form numbersOnly" id="user_account_number" name="user_account_number" placeholder="Account Number" value="<? echo $customer_data['user_account_number'];?>" />
				</div>
				<div class="col-sm-6">
					<label class=" ">Account Name <span class="red">*</span></label>
					<input type="text" class="form-control input-form lettersOnly" id="user_account_name" name="user_account_name" placeholder="Account Name" value="<? echo $customer_data['user_account_name'];?>" />
				</div><div class="clearfix"></div>
			</div> 
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Account Type <span class="red">*</span></label>
					<select class="form-control input-form" id="user_account_type" name="user_account_type">
						<option value="">Select Account Type</option>  
						<option value="S" <?php if($customer_data['user_account_type']=='S'){echo "selected";}?>>Saving Account</option>
						<option value="C" <?php if($customer_data['user_account_type']=='C'){echo "selected";}?>>Current Account</option>
					</select>
				</div>
				<div class="col-sm-6">
					<label class=" ">Bank Name <span class="red">*</span></label>
					<input type="text" class="form-control input-form lettersOnly" id="user_bank_name" name="user_bank_name" placeholder="Bank Name" value="<? echo $customer_data['user_bank_name'];?>"  />
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Branch Name <span class="red">*</span></label>
					<input type="text" class="form-control input-form lettersOnly" id="user_branch_name" name="user_branch_name" placeholder="Branch Name" value="<? echo $customer_data['user_branch_name'];?>"  />
				</div>
				<div class="col-sm-6">
					<label class=" ">Country <span class="red">*</span></label>
					<select class="form-control input-form" id="country_id" name="user_branch_country"  >
						<option value="">Select Country</option> 
						<?php if($countryList){
								foreach($countryList as $rowCountry){?>
								<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
							<?php }}?>
					</select>
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class=" ">State <span class="red">*</span></label>
					<select name="user_branch_state" id="state_id" class="form-control input-form">
						<option value="">Select State</option>
						 <?php if($stateList){
							foreach($stateList as $rowState){?>
							<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$customer_data['user_branch_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
						<?php }}?>
					</select>		
				</div>
				<div class="col-sm-6">
					<label class=" ">City <span class="red">*</span></label>
					<select name="user_branch_city" id="city_id" class="form-control input-form">
						<option value="">Select City</option> 
							 <?php if($cityList){
									foreach($cityList as $rowCity){?>
									<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$customer_data['user_branch_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
								<?php }}?>
					</select>	
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Zip/Pin Code <span class="red">*</span></label>
					<input type="text" class="form-control input-form numbersOnly" id="user_branch_pincode" name="user_branch_pincode" placeholder="Zip/Pin Code " value="<? echo $customer_data['user_branch_pincode'];?>" maxlength="6"  minlength="6"/>
				</div>
				<div class="col-sm-6">
					<label class=" ">Bank Phone Number <span class="red">*</span></label>
					<input type="text" class="form-control input-form numbersOnly" id="user_bank_phone_no" name="user_bank_phone_no" placeholder="Bank Phone Number"  value="<? echo $customer_data['user_bank_phone_no'];?>"  />
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class=" ">IFSC Code <span class="red">*</span></label>
					<input type="text" class="form-control input-form alphaNumeric" id="user_ifsc" name="user_ifsc" placeholder="IFSC Code"  value="<? echo $customer_data['user_ifsc'];?>"  />
				</div>
				<div class="col-sm-6">
					<label class="">MICR Code <span class="red">*</span></label>
					<input type="text" class="form-control input-form alphaNumeric" id="user_micr" name="user_micr" placeholder="MICR Code"  value="<? echo $customer_data['user_micr'];?>"  />
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">SWIFT Code <span class="red">*</span></label>
					<input type="text" class="form-control input-form alphaNumeric" id="user_swift" name="user_swift" placeholder="SWIFT Code"  value="<? echo $customer_data['user_swift'];?>"  />
				</div>
				<div class="col-sm-6">
					<label class="">Comments if Any</label>
					<textarea class="form-control input-form" id="user_comments" name="user_comments" placeholder="Comments"><? echo $customer_data['user_comments'];?></textarea>
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group col-sm-12 col-xs-6">
			   <center><input type="submit" name="btnBankDetails" id="submit" class="btn btn-default submit-btn" value="Update Bank Details" /></center>
			</div>
		</form>
		
</div>
</div>
<!-- /.row --> 
	  
</div> 
    <?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/location.js"></script> 
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
$("#bank").validate({
   rules: {  
				user_account_number:{
					required:true
				},
				user_account_name:{
					required:true
				},
				user_account_type:{
					required:true
				},
				user_bank_name:{
					required:true
				},
				user_branch_name:{
					required:true
				},
				user_branch_country:{
					required:true
				},
				user_branch_state:{
					required:true
				},
				user_branch_city:{
					required:true
				},
				user_branch_pincode:{
					required:true
				},
				user_bank_phone_no:{
					required:true
				},
				user_ifsc:{
					required:true
				},
				user_micr:{
					required:true
				},
				user_swift:{
					required:true
				},
			},
			messages: { 
				user_account_number:{
					required:"Please enter account number"
				},
				user_account_name:{
					required:"Please enter account name"
				},
				user_account_type:{
					required:"Please select account type"
				},
				user_bank_name:{
					required:"Please enter bank name"
				},
				user_branch_name:{
					required:"Please enter branch name"
				},
				user_branch_country:{
					required:"PLease select country"
				},
				user_branch_state:{
					required:"Please select state"
				},
				user_branch_city:{
					required:"Please select city"
				},
				user_branch_pincode:{
					required:"Please enter zip/pin code"
				},
				user_bank_phone_no:{
					required:"Please enter bank phone number"
				},
				user_ifsc:{
					required:"Please enter IFSC code"
				},
				user_micr:{
					required:"Please enter MICR code"
				},
				user_swift:{
					required:"Please enter SWIFT code"
				},
			}
		}); 
		</script>
<?php $this->template->contentEnd();    ?> 