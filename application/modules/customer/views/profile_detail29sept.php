<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
	.margin_10_top{
		margin-top: 10px;
	}
	.no_border{
		border: none;
	}
	.profile_details>.nav-tabs>li.active>a, .profile_details>.nav-tabs>li.active>a:focus, .profile_details>.nav-tabs>li.active>a:hover, .profile_details>.nav-tabs>li>a:hover {
		border:none;
	}
	.profile_details>.nav-tabs>li{
		/*width: 12.25%;*/
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

<div class="">
  	<div class=" row-flex">
	<!-- /.myprofile-bg dahboard-bg -->
		<?php   $this->load->view("cust_side_menu" ); ?>
		<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 mar-20-btm">
			<div class="profile_details">
				<ul class="nav nav-tabs ">
				    <li class="active"><a data-toggle="tab" href="#menu0">View Profile</a></li>
				    <li><a data-toggle="tab" href="#menu1">Edit Profile</a></li>
				    <li><a data-toggle="tab" href="#menu2">Company Details</a></li><!--
				    <li><a data-toggle="tab" href="#menu3">Company Docs</a></li> -->
				    <li><a data-toggle="tab" href="#menu4">Other Files</a></li>
				    <li><a data-toggle="tab" href="#menu5">Add Contact Details</a></li>
				    <li><a data-toggle="tab" href="#menu6">Add Address</a></li>
				    <li><a data-toggle="tab" href="#menu7">Bank Details</a></li>
				    <li><a data-toggle="tab" href="#menu8">Work Experience</a></li>
				    <!-- <li><a data-toggle="tab" href="#menu9">Change Password</a></li> -->
				</ul>

				<div class="tab-content no_border">
				    <div id="menu0" class="tab-pane fade in active">
				      	<h3>Profile</h3>
				      	<div class="contact-right-text  ">
					       	<br />
							<div class="">
							  	<div class="col-sm-6  white-bg ">
									<div class="profile-left">
									  	<h3>Personal </h3>
									  	<div class="col-sm-12 white-bg">
									 	<form class="form-horizontal">
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">Full Name</label>
											  <div class="col-sm-8">
											  <label class="contact-label-text"style="padding: 0;"><?php echo ucwords($customer_data['u_name'])?></label>
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">Birth date</label>
											  <div class="col-sm-8">
												<label class="contact-label-text"style="padding: 0;"><?php echo $customer_data['u_date_birth']?></label>
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">Language</label>
											  <div class="col-sm-8">
												<label class="contact-label-text"style="padding: 0;"><?php echo $customer_data['language']?></label>
											  </div>
											</div>
									  	</form>
									  	</div>
									</div>
									<div class="profile-left">
									  	<h3>Company</h3>
									  	<div class="col-sm-12 white-bg">
									  	<form class="form-horizontal">
											<div class="form-group">
											  <label class="col-sm-4 contact-label-text">Company Name</label>
											  <div class="col-sm-8 margin_10_top">
											  	<? echo $customer_data['user_company_name'];?>
												<!-- <input type="user_company_name" class="form-control input-form"  placeholder="" value="<? echo $customer_data['user_company_name'];?>" > -->
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">Company Type</label>
											  <div class="col-sm-8 margin_10_top">
												<? echo $customer_data['user_company_type'];?>
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">GSTIN</label>
											  <div class="col-sm-8 margin_10_top">
												<? echo $customer_data['user_gst_no'];?>
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">PAN</label>
											  <div class="col-sm-8 margin_10_top">
												<? echo $customer_data['user_pan_no'];?>
											  </div>
											</div>
									  	</form>
									  	</div>
									</div>
									<div class="profile-left">
									  	<h3>Contact</h3>
									  	<div class="col-sm-12 white-bg">
									  	<form class="form-horizontal">
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">Email Address</label>
											  <div class="col-sm-8 margin_10_top">
												<?php echo $customer_data['u_email'];?>
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">Mobile No</label>
											  <div class="col-sm-8 margin_10_top">
												<?php echo $customer_data['u_mobileno'];?>
											  </div>
											</div>
											<div class="form-group">
											  <label  class="col-sm-4 contact-label-text">Website</label>
											  <div class="col-sm-8 margin_10_top">
												<?php echo $customer_data['user_company_website'];?>
											  </div>
											</div>
									  	</form>
									  	</div>
									</div>
									<div class="profile-left">
									  	<h3>Specific Interests</h3>
									  	<form class="form-horizontal col-sm-6">
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Machines</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Spare Parts</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Toolings</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Contract Manufacturing</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Excess capacity Utilization</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Group Buying</label>
											</div>
									  	</form>
									  	<form class="form-horizontal col-sm-6">
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Programming</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Service Support</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Application Support</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Live Training</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Live Event</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label>
												<input type="checkbox" value="">
												Consulting</label>
											</div>
									  	</form>
									</div>
							  	</div>
								<div class="col-sm-6">
									<div class="contact-right-text comp-profile-img" style="">
										<center>
											<?php if($customer_data['u_avatar']){ ?>
												<img src="<?php echo site_url()."uploads/customer/".$customer_data['u_avatar']?>" width=""class="img-responsive" />
											<?php   }?>
										</center>
										<div class="clearfix"></div>
									</div>
										<div class="clearfix"></div><br/>
										<div id="exTab2" class="col-sm-12" style="margin-top:20px;">
											<ul class="nav nav-tabs profile-tabs">
												<?php  if($customerContactList){ $c=1;
													foreach($customerContactList as $rowCustomer){ ?>
												  <li class="col-sm-4 padd-0 <?php if($c==1){echo "active";}?>"> <a  href="#<?php if($j==1){echo "active";}?>" data-toggle="tab">Contact Details <?php echo $c;?></a> </li>
												  <?php $c++;}}
												  else{?>
												  <li class="col-sm-4 padd-0 <?php if($c==1){echo "active";}?>"> <a  href="#<?php if($j==1){echo "active";}?>" data-toggle="tab">Contact Details</a> </li>
												<?php }?>
											</ul>

											<div class="tab-content">
												<?php if($customerContactList){ $c=1;
												foreach($customerContactList as $rowContact){ ?>
											  	<div class="profile-left tab-pane active <?php if($c==1){echo "active";}?>" id="<?php echo $c;?>">
													<form class="form-horizontal">
														  <div class="form-group">
															<label  class="col-sm-5 contact-label-text">Contact Person Name</label>
															<div class="col-sm-7 margin_10_top">
																<?php echo $rowContact['contact_person_name'];?>
															</div>
														  </div>

														  <div class="form-group">
															<label  class="col-sm-5 contact-label-text">Office Phone No</label>
															<div class="col-sm-7 margin_10_top">
															 <?php echo $rowContact['office_phone_no'];?>
															</div>
														  </div>

														  <div class="form-group">
															<label  class="col-sm-5 contact-label-text">Email</label>
															<div class="col-sm-7 margin_10_top">
															   <?php echo $rowContact['email_id'];?>
															</div>
														  </div>
													</form>
											  	</div>
												<?php $c++;}}

												else{?>
													<form class="form-horizontal">
														  <div class="form-group">
															<label  class="col-sm-5 contact-label-text">Contact Person Name</label>
															<div class="col-sm-7 margin_10_top">
															</div>
														  </div>
														  <div class="form-group">
															<label  class="col-sm-5 contact-label-text">Office Phone No</label>
															<div class="col-sm-7 margin_10_top">
															</div>
														  </div>
														  <div class="form-group">
															<label  class="col-sm-5 contact-label-text">Email</label>
															<div class="col-sm-7 margin_10_top">
															</div>
														  </div>
													</form>
												<?php }?>
											</div>
									  	</div>
									  	<div id="exTab12" class="col-sm-12">
											<ul class="nav nav-tabs profile-tabs">
											<?php if($customerAddressList){ $j=1;
												foreach($customerAddressList as $rowCustomer){?>
											  <li class="col-sm-4 padd-0 <?php if($j==1){echo "active";}?>"> <a  href="#<?=$rowCustomer['u_address_id']?>" data-toggle="tab">Address Details <?=$j?></a> </li>
											<?php $j++;}}
											else{?>
												<li class="col-sm-4 padd-0 <?php if($j==1){echo "active";}?>"> <a  href="#<?=$rowCustomer['u_address_id']?>" data-toggle="tab">Address Details</a> </li>
											<?php }?>
											</ul>

											<div class="tab-content">
												<?php if($customerAddressList){$j=1;
												foreach($customerAddressList as $rowCustomer){?>
											  	<div class="profile-left tab-pane <?php if($j==1){echo "active";}?>" id="<?=$rowCustomer['u_address_id']?>">
													<form class="form-horizontal">
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Address 1</label>
															<div class="col-sm-7 margin_10_top">
															   <? echo $rowCustomer['address1'];?>
															</div>
														</div>
														<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Address 2</label>
															<div class="col-sm-7 margin_10_top">
															  <? echo $rowCustomer['address2'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">City</label>
															<div class="col-sm-7 margin_10_top">
															  <? echo $rowCustomer['city_name'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">State</label>
															<div class="col-sm-7 margin_10_top">
															   <? echo $rowCustomer['state_name'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Country</label>
															<div class="col-sm-7 margin_10_top">
															   <? echo $rowCustomer['country_name'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Post Code</label>
															<div class="col-sm-7 margin_10_top">
															  <? echo $rowCustomer['pincode'];?>
															</div>
													  	</div>
													</form>
											  	</div>
												<?php $j++;}}
												else{?>
													<form class="form-horizontal">
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Address 1</label>
															<div class="col-sm-7 margin_10_top">
															   <? echo $rowCustomer['address1'];?>
															</div>
														</div>
														<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Address 2</label>
															<div class="col-sm-7 margin_10_top">
															  <? echo $rowCustomer['address2'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">City</label>
															<div class="col-sm-7 margin_10_top">
															  <? echo $rowCustomer['city_name'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">State</label>
															<div class="col-sm-7 margin_10_top">
															   <? echo $rowCustomer['state_name'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Country</label>
															<div class="col-sm-7 margin_10_top">
															   <? echo $rowCustomer['country_name'];?>
															</div>
													  	</div>
													  	<div class="form-group">
															<label  class="col-sm-5 contact-label-text">Post Code</label>
															<div class="col-sm-7 margin_10_top">
															  <? echo $rowCustomer['pincode'];?>
															</div>
													  	</div>
													</form>
											<?php }?>
											</div>
									  	</div>
								</div>
							</div>
						</div>
				    </div>
				    <div id="menu1" class="tab-pane fade">

				      	<div class="col-sm-12">
				      		<h3>Edit Profile</h3>
							<div class="border_bot col-md-12 col-sm-12 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ;">
								<form class="form" name="editprofile" id="editprofile" method="post" action="">
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="u_name" name="u_name" placeholder="Full Name" value="<?php echo $customer_data['u_name']?>"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot " id="datepicker" name="birthdate" placeholder="yyyy-mm-dd" value="<?php echo $customer_data['u_date_birth']?>" /><span class="compulsary">*</span>
										</div>
									</div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot " id="language" name="language" placeholder="Language" value="<?php echo $customer_data['language']?>"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="u_mobileno" name="u_mobileno" placeholder="Mobile number" minlength="10" maxlength="10" value="<?php echo $customer_data['u_mobileno']?>" /><span class="compulsary">*</span>
										</div>
									</div>
								 	<div class="clearfix"></div>
								 	<div class="form-group">
								 		<div class="col-sm-6">
											<input type="email" class="form_bor_bot " id="u_email" name="u_email" placeholder="Email" value="<?php echo $customer_data['u_email']?>"/><span class="compulsary">*</span>
										</div>
									 	<div class="col-sm-6">
											<input type="text" class="form_bor_bot " id="c_work_experiance" name="c_work_experiance" placeholder="Work Experince" value="<?php echo $customer_data['c_work_experiance']?>"/>
										</div>
									</div>
								 	<div class="clearfix"></div>
								 	<div class="form-group">
								 		<div class="col-sm-12">
								 		<h5>Specific Interests</h5>
										<div class="col-sm-6 padd-0">
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Machines</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Spare Parts</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Toolings</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Contract Manufacturing</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Excess capacity Utilization</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Group Buying</label>
											</div>
										</div>
										<div class="col-sm-6 padd-0">
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Programming</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Service Support</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Application Support</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Live Training</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Live Event</label>
											</div>
											<div class="form-group checkbox profile-checkbox-label">
											  <label><input type="checkbox" value="">Consulting</label>
											</div>
										</div>
										</div>
									</div>
								 	<div class="clearfix"></div><br/>
									<div class="form-group">
									   <center><input type="submit" name="btnUpdate" id="submit" class="btn btn-default submit-btn" value="Update Profile Details" /></center>
									</div>
								</form>
							</div>
						</div>
						<div class="clearfix"></div><br/>

				    	<div class="col-md-12 col-sm-12 col-xs-12 ">
				    		<h3>Change Password</h3>
				    		<div class="border_bot col-md-4 col-sm-4 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:300px;">
								<form class="form" name="changepassword" id="changepassword" method="post" action="">
									<div class="form-group">
										<input type="text" class="form_bor_bot" id="u_password" name="u_password" placeholder="Old Password " value="<? echo $user_data['u_password'];?>"  /><span class="compulsary">*</span>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<input type="text" class="form_bor_bot" id="newpassword" name="newpassword" placeholder="New Password" value="<? echo $user_data['newpassword'];?>"  /><span class="compulsary">*</span>
						        	</div>
						       	 	<div class="form-group">
										<input type="text" class="form_bor_bot" id="conf_password" name="conf_password" placeholder="Confirm New Password" value="<? echo $user_data['conf_password'];?>"  /><span class="compulsary">*</span>
						        	</div>
								 	<div class="clearfix"></div><br/>
									<div class="form-group">
									   <center><input type="submit" name="btnChangepassword" id="submit" class="btn btn-default submit-btn" value="Change Password" /></center>
									</div>
								</form>
							</div>
				    	</div>

				    </div>
				    <div id="menu2" class="tab-pane fade">
				      <h3>Company Details</h3>
				      	<div class="col-sm-6">
					      	<div class="col-sm-12 border_bot supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ;">
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
									   <center><input type="submit" name="btnCompany" id="submit" class="btn btn-default submit-btn" value="Update Company Details" /></center>
									</div>
								</form>
							</div><div class="clearfix"></div>
				      	</div>
				      	<div class="col-sm-6">
				      		<div class="border_bot supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ;">
								<form class="form" name="company" id="upload_doc_form" method="post" action="" enctype="multipart/form-data">
									<div class="form-group ">
										<label class="col-sm-6">Company Logo <span class="red">*</span></label>
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
									<div class="form-group">
										<label class="col-sm-6">Profile Photo <span class="red">*</span></label>
										<input type="file" name="userProfile" id="userProfile" class="col-sm-6" />
										<?php if($customer_data['u_avatar']){ ?>
											<img src="<?php echo site_url()."uploads/customer/".$customer_data['u_avatar']?>" width="100px" />
										<?php   }?>
									</div><div class="clearfix"></div><br/>
									<div class="form-group col-sm-12 col-xs-6">
									   <center><input type="submit" name="btnDocument" id="submit" class="btn btn-default submit-btn" value="Update Company Docs" /></center>
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
				    <!-- <div id="menu3" class="tab-pane fade">
				      <h3>Menu 3</h3>
				      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
				    </div> -->
				    <div id="menu4" class="tab-pane fade">
				    	<h3>Other Documents</h3>
				    	<div class="col-sm-12">
							<div class="col-sm-12 border_bot supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ;">
								<form class="form" name="upload_otherdoc_form" id="upload_otherdoc_form" method="post" action="" enctype="multipart/form-data">
										<div class="form-group"><!--
											<label class="">File Name <span class="red">*</span></label> -->
											<div class="col-sm-6">
												<input type="text" name="file_name_text" id="file_name_text" class="form_bor_bot" placeholder="File Name" /><span class="compulsary">*</span>
											</div>
											<div class="col-sm-6">
												<label class="">Upload File <span class="red">*</span></label>
												<input type="file" name="UploadedFile" id="UploadedFile" class="" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
											</div>
										</div><div class="clearfix"></div><br/>
										<div class="form-group col-sm-12 col-xs-6">
										   <center><input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Add Files" /></center>
										</div><div class="clearfix"></div><br/>
								</form>
							</div>
							<div class="clearfix"></div><br/>
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
						</div>
				    </div>
				    <div id="menu5" class="tab-pane fade">
				    	<h3>Contact Details</h3>
				    	<div class="col-xs-12">
							<div class="border_bot col-sm-12 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ">
								<form class="form" name="contact" id="contact_form" method="post" action="">
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot lettersOnly" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="person_short_name" name="person_short_name" placeholder="Contact Person Short Name"  /><span class="compulsary">*</span>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="person_designation" name="person_designation" placeholder="Contact Person Designation"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="department" name="department" placeholder="Department"  /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>

									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="email_id" name="email_id" placeholder="Email"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="office_phone_no" name="office_phone_no" placeholder="Office Phone No"  />
										</div>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="phone_ext" name="phone_ext" placeholder="Ext"  />
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="mobile_no" name="mobile_no" placeholder="Mobile Number"  minlength="10" maxlength="10" /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div><br/>
									<div class="form-group col-sm-12 col-xs-6">
									   <center><input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Add Contact" /></center>
									</div>
								</form>
							</div>
							<div class="clearfix"></div><br/>
								<?php
								if($customerContactList)
								{
								?>
									<table id='' class="table table-striped table-hover">
										<thead>
											<tr bgcolor="#CCCCCC"><td>S.No</td><td>Contact Person Name</td><td>Designation</td><td>Department</td><td>Email</td><td>Phone (Ext)</td><td>Mobile</td><td>Addition Date</td><td>Action</td></tr>
										</thead>
										<tbody>
												<?
												$SNo = 1;
												foreach($customerContactList as $rowData)
												{
													?>
													<tr>
														<td><? echo $SNo;?></td>
														<td><? echo $rowData['contact_person_name'];?></td>
														<td><? echo $rowData['person_designation'];?></td>
														<td><? echo $rowData['department'];?></td>
														<td><? echo $rowData['email_id'];?></td>
														<td><? echo $rowData['office_phone_no'];?> <? if($rowData['phone_ext']!="") echo "($data[phone_ext])";?></td>
														<td><? echo $rowData['mobile_no'];?></td>
														<td><? echo  date_dmy($rowData['update_date']);?></td>
														<td> <a href="<?php echo site_url()?>customer/contactUpdate/<?=$rowData[uc_id]?>"   >Edit</a> &nbsp; &nbsp; <a href="<?php echo site_url()?>customer/contactDelete/<?=$rowData[uc_id]?>"   >Delete</a></td>
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
				    <div id="menu6" class="tab-pane fade">
				    	<h3>Address</h3>
				    	<div class="col-xs-12" >
							<div class="border_bot col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ">
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
									   <center><input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Add Address" /></center>
									</div>
								</form>
							</div>
							<div class="clearfix"></div><br/>
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
													<td> <a href="<?php echo site_url()?>customer/addressUpdate/<?=$qy_add1[u_address_id]?>"   >Edit</a> &nbsp; &nbsp; <a href="<?php echo site_url()?>customer/addressDelete/<?=$qy_add1[u_address_id]?>"   >Delete</a></td>
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
				    <div id="menu7" class="tab-pane fade">
				    	<h3>Bank Details</h3>
				    	<div class="col-md-12 col-sm-12 col-xs-12 ">
					    	<div class="border_bot col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
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
										   <center><input type="submit" name="btnBankDetails" id="submit" class="btn btn-default submit-btn" value="Update Bank Details" /></center>
										</div>
								</form>
							</div>
						</div>
				    </div>
				    <div id="menu8" class="tab-pane fade">
				    	<h3>Work Experience</h3>
				    	<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="border_bot supplier-form col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: ">
								<form class="form" name="workexperience" id="workexperience" method="post" action="">
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="title" name="title" placeholder="Work Title" value="" /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<textarea type="text" class="form_bor_bot" id="exp_details" name="exp_details" placeholder="Experince Details"></textarea>
										</div>
									</div>
									<div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot numbersOnly" id="sartDatepicker" name="sartDatepicker" placeholder="Start Date"  /><span class="compulsary">*</span>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form_bor_bot" id="endDatepicker" name="endDatepicker" placeholder="End Date"  /><span class="compulsary">*</span>
										</div>
									</div><div class="clearfix"></div>
									<div class="clearfix"></div>
									<div class="form-group">
										<div class="col-sm-12">
											Current Company	<input type="checkbox" class=" " id="current_company" name="current_company" value="Y"/>
										</div>
									</div><div class="clearfix"></div><br/>
									<div class="form-group col-sm-12 col-xs-6">
									   <center><input type="submit" name="btnExperince" id="submit" class="btn btn-default submit-btn" value="Add Experince" /></center>
									</div>
								</form>
							</div>
							<div class="clearfix"></div><br/>

							<?php
							if($workList)
							{
							?>
								<table id='' class="table table-striped table-hover">
									<thead>
										<tr bgcolor="#CCCCCC"><td>S.No</td><td>Title</td><td>Exp Details</td><td>Start Date</td><td>End Date</td> <td>Action</td></tr>
									</thead>
									<tbody>
											<?php
											$SNo = 1;
											foreach($workList as $rowWork)
											{
												?>
												<tr>
													<td><?php echo $SNo;?></td>
													<td><?php echo $rowWork['title'];?></td>
													<td><?php echo $rowWork['exp_details'];?></td>
													<td><?php echo date_dmy($rowWork['start_date']);?></td>
													<td><?php if($rowWork['current_company']=='Y'){ echo "Current Working";}else{echo date_dmy($rowWork['end_date']);};?></td>
													<td>
														<a href="<?php echo site_url()?>customer/workExperinceDelete/<?=$rowWork['ued_id']?>"   >Delete</a> &nbsp; &nbsp;
													</td>
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
				    <!-- <div id="menu9" class="tab-pane fade">
				    	<h3>Change Password</h3>
				    	<div class="col-md-12 col-sm-12 col-xs-12 ">
				    		<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:300px;">
								<form class="form" name="changepassword" id="changepassword" method="post" action="">
									<div class="form-group">
										<input type="text" class="form_bor_bot" id="u_password" name="u_password" placeholder="Old Password " value="<? echo $user_data['u_password'];?>"  /><span class="compulsary">*</span>
									</div><div class="clearfix"></div>
									<div class="form-group">
										<input type="text" class="form_bor_bot" id="newpassword" name="newpassword" placeholder="New Password" value="<? echo $user_data['newpassword'];?>"  /><span class="compulsary">*</span>
						        	</div>
						       	 	<div class="form-group">
										<input type="text" class="form_bor_bot" id="conf_password" name="conf_password" placeholder="Confirm New Password" value="<? echo $user_data['conf_password'];?>"  /><span class="compulsary">*</span>
						        	</div>
								 	<div class="clearfix"></div><br/>
									<div class="form-group">
									   <center><input type="submit" name="btnChangepassword" id="submit" class="btn btn-default submit-btn" value="Change Password" /></center>
									</div>
								</form>
							</div>
				    	</div>
				    </div> -->
				</div>
			</div>

		</div>
	</div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>
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
	  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
	}, 'Please enter a valid email address');
	$("#editprofile").validate({
	   rules: {
					u_name:{
						required:true
					},
					birthdate:{
						required:true
					},
					language:{
						required:true
					},
					u_mobileno:{
						required:true
					},
					u_email:{
						required:true,
						valEmail:true
					},
				},
				messages: {
					u_name:{
						required:"Please enter full number"
					},
					birthdate:{
						required:"Please select birth date"
					},
					language:{
						required:"Please enter language"
					},
					mobile_no:{
						required:"Please enter mobile number"
					},
					u_email:{
						required:"Please enter email id"
					},
				}
			});
</script>
<!-- COMPANY DETAILS -->
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

//COMPANY DOCUMENTS
var CompanyLogo= '<?=$customer_data['user_company_logo']?>';
$("#upload_doc_form").validate({
   rules: {
				CompanyLogo:{
					required:true
				},
				userProfile:{
					required:true
				},
			},
			messages: {
				CompanyLogo:{
					required:"Please select company logo"
				},
				userProfile:{
					required:"Please select user profile"
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

<!-- CONTACT DETAILS -->
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


jQuery('.numbersOnly').keyup(function () {
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () {
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#contact_form").validate({
   rules: {
				contact_person_name:{
					required:true
				},
				person_short_name:{
					required:true
				},
				person_designation:{
					required:true
				},
				department:{
					required:true
				},
				email_id:{
					required:true,
					valEmail:true
				},
				// office_phone_no:{
				// 	required:true
				// },
				mobile_no:{
					required:true
				},
			},
			messages: {
				contact_person_name:{
					required:"Please enter contact person name"
				},
				person_short_name:{
					required:"Please enter short name"
				},
				person_designation:{
					required:"Please enter designation"
				},
				department:{
					required:"Please enter department"
				},
				email_id:{
					required:"Please enter email id"
				},
				office_phone_no:{
					required:"Please enter office phone number"
				},
				mobile_no:{
					required:"Please enter mobile number"
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

<!-- BANK DETAILS -->
<script src="<?=$theme_url?>/js/location.js"></script>
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

<!-- WORK EXPERIENCE -->
<script type="text/javascript">
	$(function() {
               $("#sartDatepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0}).val()
               $("#endDatepicker").datepicker({ dateFormat: "yy-mm-dd", maxDate: 0}).val()
       });
	$("#workexperience").validate({
	   rules: {
				title:{
					required:true
				},
				sartDatepicker:{
					required:true
				},
				endDatepicker:{
					required:true
				},
			},
			messages: {
				title:{
					required:"Please enter title"
				},
				sartDatepicker:{
					required:"Please select start date"
				},
				endDatepicker:{
					required:"Please select end date"
				},
			}
		});
		</script>
<?php echo $this->template->contentEnd();	?>


