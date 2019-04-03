<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
	/*.margin_10_top{
		margin-top: 10px;
	} 
	.no_border{
		border: none;
	}
	.profile_details>.nav-tabs>li.active>a, .profile_details>.nav-tabs>li.active>a:focus, .profile_details>.nav-tabs>li.active>a:hover, .profile_details>.nav-tabs>li>a:hover {
		border:none;
	}*/
	.profile_details>.nav-tabs>li{
		/*width: 12.25%;*/
	}
	.profile-left h3 {
    margin-right: -20px;
    margin-left: -20px;
    margin-top: 0;
}
</style> 
<?php echo $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">My Dashboard</li>
      </ul>
	 
    </div>
  </div>
  <!-- /.container --> 
</div>
<div class="welcome-j-bg">
  	<div class="container">
	    <div class="col-sm-8 col-lg-10 padd-0">
	      <ul>
	        <li class="">Welcome <? echo ucwords($_SESSION['u_name']);?></li>
	      </ul>
	    </div>
	    <div class="col-sm-4 col-lg-2 padd-0">
	      <ul>
	        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
	        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
	      </ul>
	    </div>
  	</div>
</div>
<!-- /.welcome-j-bg -->
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 padd-0">  
		<div class="bg_white">
			<div class="col-sm-12">
				<div class="panel-group" id="accordion">
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Company Details <span class="pull-right"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
				        </h4>
				      </div>
				      <div id="collapse1" class="panel-collapse collapse">
				        <div class="panel-body">
				        	<div class="col-sm-12 border_bot">
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
							</div>
				        </div>
				      </div>
				    </div>
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">Address <span class="pull-right"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
				        </h4>
				      </div>
				      <div id="collapse5" class="panel-collapse collapse">
				        <div class="panel-body">
				        	<div class="col-sm-12 border_bot">
				        		<form class="form" name="address" id="address" method="post" action="">
									<div class="form-group">
										<div class="col-sm-6">
											<select class="form_bor_bot" id="address_type" name="address_type">
												<option value="">Select Address Type</option>
												<option value="Registered Office">Registered Office</option>
												<option value="Corporate Office">Corporate Office</option>
												<option value="Regional Office">Regional Office</option>
												<option value="Branch Office">Branch Office</option>
												<option value="Factory-Plant">Factory-Plant</option>
											</select><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="address1" name="address1" placeholder="Address Line 1"  /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="address2" name="address2" placeholder="Address Line 2"  />
										</div>
										<div class="col-sm-6">
											<select name="country" id="country_id" class="form_bor_bot">
												<option value="">Select Country</option>
												<?php if($countryList){
													foreach($countryList as $rowCountry){?>
													<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
												<?php }}?>
											</select><span class="compulsary">*</span>	
										</div> 
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<select name="state" id="state_id" class="form_bor_bot">
												<option value="">Select State</option>
												 <?php if($stateList){
													foreach($stateList as $rowState){?>
													<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$customer_data['cust_branch_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
												<?php }}?>
											</select>	<span class="compulsary">*</span>	
										</div>
										<div class="col-sm-6">
											<select name="city" id="city_id" class="form_bor_bot">
												<option value="">Select City</option> 
													 <?php if($cityList){
															foreach($cityList as $rowCity){?>
															<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$customer_data['cust_branch_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
														<?php }}?>
											</select>	<span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="pincode" name="pincode" placeholder="Zip/Pin Code" minlength="6" maxlength="6" /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="landmark" name="landmark" placeholder="Landmark"  />
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="addshortname" name="addshortname" placeholder="Address Short Name"  />
										</div>
									</div><div class="clearfix"></div><br/>
									<div class="form-group col-sm-12 col-xs-6">
									   <center><input type="submit" name="submit" id="submit" class="btn btn_orange" value="Add Address" /></center>
									</div>
								</form>
				        	</div><div class="clearfix"></div><br/><br/>
				        	<div class="col-sm-12">
								<?php 
								if(($customerAddressList))
								{
								?>
								<table id='' class="table table-striped table-hover">
									<thead>
										<tr bgcolor="#CCCCCC"><td>S.No</td><td>Address Type</td><td>Address Line 1</td><td>Address Line 2</td><td>Country</td><td>Sate</td><td>City</td><td>Addition Date</td><td>Action</td></tr>
									</thead>
									<tbody>
											<?php
											$SNo = 1;
											foreach($customerAddressList as $qy_add1)
											{
												?>
												<tr>
													<td><? echo $SNo;?></td>
													<td><? echo $qy_add1['address_type'];?></td>
													<td><? echo $qy_add1['address1'];?></td>
													<td><? echo $qy_add1['address2'];?></td>
													<td><? echo $qy_add1['country_name'];?></td>
													<td><? echo $qy_add1['state_name'];?></td>
													<td><? echo $qy_add1['city_name'];?></td>
													<td><? echo date_dmy($qy_add1['update_date']);?></td>
													<td> <a href="<?php echo site_url()?>customer/addressUpdate/<?=$qy_add1[u_address_id]?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="<?php echo site_url()?>customer/addressDelete/<?=$qy_add1[u_address_id]?>"  aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
												</tr>
										<?php
												$SNo = $SNo + 1;
											}
										?>
									</tbody>
								</table>
								<?php
								}
								?>
							</div>
				        </div>
				      </div>
				    </div>
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Company Documents <span class="pull-right"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
				        </h4>
				      </div>
				      <div id="collapse2" class="panel-collapse collapse">
				        <div class="panel-body">
				        	<div class="col-sm-12 border_bot">
				        		<form class="form" name="company" id="upload_doc_form" method="post" action="" enctype="multipart/form-data">
									<div class="form-group ">
										<label class="col-sm-6">Company Logo  </label>
										<input type="file" name="CompanyLogo" id="CompanyLogo" class="col-sm-6" value="<?=$customer_data['user_company_logo']?>" />
										<?php if($customer_data['user_company_logo']){ ?>
											<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_company_logo']?>" width="100px" />
										<?php   }?>
									</div><div class="clearfix"></div><br/>
									<div class="form-group">
										<label class="col-sm-6">GSTIN </label>
										<input type="file" name="GSTINImg" id="GSTINImg" class="col-sm-6" />
										<?php if($customer_data['user_gst_image']){ ?>
											<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_gst_image']?>" width="100px" />
										<?php   }?>
									</div><div class="clearfix"></div><br/>
									<div class="form-group">
										<label class="col-sm-6">PAN </label>
										<input type="file" name="PANImg" id="PANImg" class="col-sm-6" />
										<?php if($customer_data['user_pan_image']){ ?>
											<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_pan_image']?>" width="100px" />
										<?php   }?>
									</div><div class="clearfix"></div><br/>
									<div class="form-group">
										<label class="col-sm-6">Company Incorporation Certificate </label>
										<input type="file" name="CompanyIncorp" id="CompanyIncorp" class="col-sm-6" />
										<?php if($customer_data['user_certificate']){ ?>
											<img src="<?php echo site_url()."uploads/customer/".$customer_data['user_certificate']?>" width="100px" />
										<?php   }?>
									</div><div class="clearfix"></div><br/>
									<div class="form-group col-sm-12 col-xs-6">
									   <center><input type="submit" name="btnDocument" id="submit" class="btn btn_orange" value="Update Company Docs" /></center>
									</div>
									<input type="hidden" name="old_gst"  value="<?php echo $customer_data['user_gst_image'];?>"/>
									<input type="hidden" name="old_pan"  value="<?php echo $customer_data['user_pan_image'];?>"/>
									<input type="hidden" name="old_logo"  value="<?php echo $customer_data['user_company_logo'];?>"/>
									<input type="hidden" name="old_certificate"  value="<?php echo $customer_data['user_certificate'];?>"/>
									<input type="hidden" name="old_user_profile"  value="<?php echo $customer_data['old_user_profile'];?>"/>
								</form>
				        	</div>
				        </div>
				      </div>
				    </div>
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">Other Documents <span class="pull-right"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
				        </h4>
				      </div>
				      <div id="collapse3" class="panel-collapse collapse">
				        <div class="panel-body">
				        	<div class="col-sm-12 border_bot">
				        		<form class="form" name="upload_otherdoc_form" id="upload_otherdoc_form" method="post" action="" enctype="multipart/form-data">
									<div class="form-group"><!-- 
										<label class="">File Name <span class="red">*</span></label> -->
										<input type="text" name="file_name_text" id="file_name_text" class="form_bor_bot" placeholder="File Name" /><span class="compulsary">*</span>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<label class="">Upload File <span class="red">*</span></label>
										<input type="file" name="UploadedFile" id="UploadedFile" class="" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
									</div><div class="clearfix"></div><br/>
									<div class="form-group col-sm-12 col-xs-6">
									   <center><input type="submit" name="submit" id="submit" class="btn btn_orange" value="Add Files" /></center>
									</div>
								</form>
				        	</div>
				        	<div class="clearfix"></div><br/><br/>
				        	<div class="col-sm-12">
				        		<div class="col-flex ">
									<?php
									if($documentList)
									{
									?>
										<table id='' class="table table-striped table-hover">
											<thead>
												<tr bgcolor="#CCCCCC"><td>S.No</td><td>File Name</td><td>Uploaded Date</td><td>View File</td><td>Delete</td></tr>
											</thead>
											<tbody>
													<?php
													$SNo = 1;
													foreach($documentList as $data)
													{
														?>
														<tr>
															<td><?php echo $SNo;?></td>
															<td><?php echo $data['file_name_text'];?></td>
															<td><?php echo date_dmy($data['entry_date']);?></td>
															<td><?php  if($data['uplodded_file']!=''){ echo "<a href='".site_url()."uploads/user_document/".$data[uplodded_file]."' target='_blank' >Click Here</a>" ;}?></td>
															<td><a href="<?php echo site_url()?>customer/otherDocumentDelete/<?=$data[uod_id]?>"   >Delete</a></td>
														</tr>
														<?
														$SNo = $SNo + 1;
													}
												?>
											</tbody>
										</table>
									<?php
									}
									?>
								</div><div class="clearfix"></div>
				        	</div>
				        </div>
				      </div>
				    </div>
				    <div class="panel panel-default">
				      <div class="panel-heading">
				        <h4 class="panel-title">
				          <a data-toggle="collapse" data-parent="#accordion" href="#collapse4">Bank Details <span class="pull-right"><i class="fa fa-caret-down" aria-hidden="true"></i></span></a>
				        </h4>
				      </div>
				      <div id="collapse4" class="panel-collapse collapse">
				        <div class="panel-body">
				        	<div class="col-sm-12 border_bot">
				        		<form class="form" name="bank" id="bank" method="post" action="">
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="user_account_number" name="user_account_number" placeholder="Account Number" value="<? echo $customer_data['user_account_number'];?>" /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot lettersOnly" id="user_account_name" name="user_account_name" placeholder="Account Name" value="<? echo $customer_data['user_account_name'];?>" /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<select class="form_bor_bot" id="user_account_type" name="user_account_type">
												<option value="">Select Account Type</option>  
												<option value="S" <?php if($customer_data['user_account_type']=='S'){echo "selected";}?>>Saving Account</option>
												<option value="C" <?php if($customer_data['user_account_type']=='C'){echo "selected";}?>>Current Account</option>
											</select><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot lettersOnly" id="user_bank_name" name="user_bank_name" placeholder="Bank Name" value="<? echo $customer_data['user_bank_name'];?>"  /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot lettersOnly" id="user_branch_name" name="user_branch_name" placeholder="Branch Name" value="<? echo $customer_data['user_branch_name'];?>"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<select class="form_bor_bot" id="country_id" name="user_branch_country"  >
												<option value="">Select Country</option> 
												<?php if($countryList){
														foreach($countryList as $rowCountry){?>
														<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
													<?php }}?>
											</select><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<select name="user_branch_state" id="state_id" class="form_bor_bot">
												<option value="">Select State</option>
												 <?php if($stateList){
													foreach($stateList as $rowState){?>
													<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$customer_data['user_branch_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
												<?php }}?>
											</select>	<span class="compulsary">*</span>	
										</div>
										<div class="col-sm-6">
											<select name="user_branch_city" id="city_id" class="form_bor_bot">
												<option value="">Select City</option> 
													 <?php if($cityList){
															foreach($cityList as $rowCity){?>
															<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$customer_data['user_branch_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
														<?php }}?>
											</select>	<span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="user_branch_pincode" name="user_branch_pincode" placeholder="Zip/Pin Code " value="<? echo $customer_data['user_branch_pincode'];?>" maxlength="6"  minlength="6"/><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="user_bank_phone_no" name="user_bank_phone_no" placeholder="Bank Phone Number"  value="<? echo $customer_data['user_bank_phone_no'];?>"  /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot alphaNumeric" id="user_ifsc" name="user_ifsc" placeholder="IFSC Code"  value="<? echo $customer_data['user_ifsc'];?>"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot alphaNumeric" id="user_micr" name="user_micr" placeholder="MICR Code"  value="<? echo $customer_data['user_micr'];?>"  /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot alphaNumeric" id="user_swift" name="user_swift" placeholder="SWIFT Code"  value="<? echo $customer_data['user_swift'];?>"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<textarea class="form_bor_bot" id="user_comments" name="user_comments" placeholder="Comments"><? echo $customer_data['user_comments'];?></textarea>
										</div>
									</div><div class="clearfix"></div><br/>
									<div class="form-group col-sm-12 col-xs-6">
									   <center><input type="submit" name="btnBankDetails" id="submit" class="btn btn_orange" value="Update Bank Details" /></center>
									</div>
								</form>
				        	</div>
				        </div>
				      </div>
				    </div>
				</div> 
			</div><div class="clearfix"></div>
		</div><div class="clearfix"></div>
	</div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type="text/javascript">
	//EDIT PROFILE
	 $(function() {
           $("#datepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0,changeYear: true,yearRange: "-70:+0" }).val()
   });


	jQuery('.numbersOnly').keyup(function () { 
	    this.value = this.value.replace(/[^0-9\.]/g,'');
	});
	jQuery('.lettersOnly').keyup(function () { 
	    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
	});
	jQuery('.alphaNumeric').keyup(function () { 
	    this.value = this.value.replace(/[^A-Za-z0-9\.]/g,'');
	});
	jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');
	
// COMPANY DETAILS 
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
<!-- OTHER DOCUMENT -->
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

$("#upload_otherdoc_form").validate({
   rules: {  
				file_name_text:{
					required:true
				},
				UploadedFile:{
					required:true,
					 extension: "pdf|doc|docx|txt|png|jpg|jpeg"
				},
			},
			messages: { 
				file_name_text:{
					required:"Please enter file name"
				},
				UploadedFile:{
					required:"Please select file to upload"
				},
			}
		}); 

</script>
<!-- ADDRESS -->
<script src="<?=$theme_url?>/js/location.js"></script>  
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

jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});

// BANK DETAILS -->
	
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

//ADDRESS
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
$("#address").validate({
   rules: {  
		address_type:{
			required:true
		},
		address1:{
			required:true
		},
		country:{
			required:true
		},
		state:{
			required:true
		},
		city:{
			required:true
		},
		pincode:{
			required:true
		},
	},
	messages: { 
		address_type:{
			required:"Please select address type"
		},
		address1:{
			required:"Please enter address"
		},
		country:{
			required:"PLease select country"
		},
		state:{
			required:"Please select state"
		},
		city:{
			required:"Please select city"
		},
		pincode:{
			required:"Please enter zip/pin code"
		},
	}
}); 
		</script>
<?php echo $this->template->contentEnd();	?> 


  