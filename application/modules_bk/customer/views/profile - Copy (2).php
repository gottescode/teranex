<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
	.margin_10_top{
		margin-top: 10px;
	} 
</style> 
<?php echo $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
  	<div class="col-sm-12">
	    <div class="col-sm-4">
	      <ul>
	        <li class="myprofile"><a href="<?php echo site_url()."customer/dashboard";?>">My Dashboard</a></li>
	      </ul>
	    </div>
    </div>
  </div>
  <!-- /.container --> 
</div>
<div class="welcome-j-bg">
  	<div class="container">
  		<div class="col-sm-12">
		    <div class="col-sm-6 col-lg-6">
		      <ul class="pull-left">
		        <li>Welcome <? echo ucwords($_SESSION['u_name']);?></li>
		      </ul>
		    </div>
		    <div class="col-sm-6 col-lg-6">
		      <ul class="pull-right">
		        <li class=""><a href="#">Go To My Teranex </a> |</li>
		        <li class=""><a href="<?php echo site_url()."customer/profile_edit";?>"><span><i class="fa fa-pencil"></i></span> Edit Profile</a> |</li>
		        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
		      </ul>
		    </div>
		</div>
  	</div>
</div>
<!-- /.welcome-j-bg -->

<div class="container">
  	<div class=" row-flex">
	<!-- /.myprofile-bg dahboard-bg --> 
		  
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mar-20-btm">
			<div class="contact-right-text  ">
		       	<br /> 
				<div class="">
				  	<div class="col-sm-6  white-bg ">
						<div class="profile-left">
						  	<h3>Personal </h3>
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
									<label class="contact-label-text"style="padding: 0;">
										<?php if($languageList){
											foreach($languageList as $rowLang){
												echo $rowLang['name']."<br/>";
											}}	?>
									
									</label>
								  </div>
								</div>
								<div class="form-group">
								  <label  class="col-sm-4 contact-label-text">Resume</label>
								  <div class="col-sm-8">
									<label class="contact-label-text"style="padding: 0;"> <?php  if($customer_data['user_resume']!=''){ echo "<a href='".site_url()."uploads/customer/".$customer_data['user_resume']."' target='_blank'>Click Here</a>";} else{ echo "Resume not available";}?></label>
								  </div>
								</div>
						  	</form>
						</div>
						<div class="profile-left">
						  	<h3>Company</h3>
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
						<div class="profile-left">
						  	<h3>Contact</h3>
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
						<div class="profile-left">
						  	<h3>Specific Interests</h3>
						  	<?php if($userTypeList){ 
									if($customer_data['specific_interests']){ $specificInterests= explode(",",$customer_data['specific_interests']); }
									foreach($userTypeList as $rowType){
									 if(in_array($rowType['utid'],$specificInterests)){	?>
							  	<div class="col-sm-6">
									<div class="form-group checkbox profile-checkbox-label">
									  <label>
										<input type="checkbox" name="specificInterests[]"  id="specificInterests" value="<?=$rowType['utid']?>" checked ><?=$rowType['type_name']?></label>
									</div>
									 
							  	</div>
									 <?php }}}?>
						</div>
				  	</div>
				  
					<div class="col-sm-6">
						<div class="contact-right-text comp-profile-img" style="">
							<!--<center>
								<?php if($customer_data['u_avatar']){ ?>
									<img src="<?php echo site_url()."uploads/customer/".$customer_data['u_avatar']?>" width=""class="img-responsive" />
								<?php   }?>
							</center> -->
							<center>
									<?php if($customer_data['u_avatar']){ ?>
										<img src="<?php echo site_url()."uploads/customer/".$customer_data['u_avatar']?>" width="" class="img-responsive" />
										<?php $c++;}

										else{?>
										<img src="<?php echo theme_url()."/images/PersonPlaceholder.png"?>" width="" class="img-responsive" />

									<?php   }?>
								</center>
							<div class="clearfix"></div>
						</div>
						<div class="clearfix"></div><br/>
							<div id="exTab2" class="col-sm-12" style="margin-top:;">
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
								  	<div class="tab-pane active <?php if($c==1){echo "active";}?>" id="<?php echo $c;?>">
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
								  	<div class="tab-pane <?php if($j==1){echo "active";}?>" id="<?=$rowCustomer['u_address_id']?>">
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
	</div>
</div>
    <!-- /.col-sm-6 col-lg-6 col-lg-offset-1--> 
  