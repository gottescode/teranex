<style type="text/css">
	.margin_10_top{
		margin-top: 10px;
	}
</style> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">My Dashboard</li>
      </ul>
	 
    </div>
  </div>
  <!-- /.container --> 
</div>
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
<!-- /.myprofile-bg dahboard-bg --> 
<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 mar-20-btm">
		<div class="contact-right-text  ">
       <br /> 
		<div class="">
		  <div class="col-sm-6  white-bg padd-10">
			<div class="profile-left">
			  <h3>Personal </h3>
			  <form class="form-horizontal">
				<div class="form-group">
				  <label  class="col-sm-4 contact-label-text">First Name</label>
				  <div class="col-sm-8">
				  <label class="contact-label-text"style="padding: 0;">Jaywant</label>
				  </div>
				</div>
				
				<div class="form-group">
				  <label  class="col-sm-4 contact-label-text">Last name </label>
				  <div class="col-sm-8">
					 <label class="contact-label-text"style="padding: 0;">Narawade</label>
				  </div>
				</div>
				
				<div class="form-group">
				  <label  class="col-sm-4 contact-label-text">Birth date</label>
				  <div class="col-sm-8">
					<label class="contact-label-text"style="padding: 0;">12 May 1988</label>
				  </div>
				</div>
				
				<div class="form-group">
				  <label  class="col-sm-4 contact-label-text">Language</label>
				  <div class="col-sm-8">
					<label class="contact-label-text"style="padding: 0;">English</label>
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
				  <label  class="col-sm-4 contact-label-text">Customer Type</label>
				  <div class="col-sm-8 margin_10_top">
					 
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
					<?php echo $customer_data['Email'];?>
				  </div>
				</div>
				
				<div class="form-group">
				  <label  class="col-sm-4 contact-label-text">Mobile No</label>
				  <div class="col-sm-8 margin_10_top">
					<?php echo $customer_data['MobileNo'];?>
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
			<div class="contact-right-text comp-profile-img">
				<center>
					<?php if($customer_data['u_avatar']){ ?>
						<img src="<?php echo site_url()."uploads/customer/".$customer_data['u_avatar']?>" width="100px" />
					<?php   }?>
				</center>
			
			
			  <div id="exTab2" class="col-sm-12"style="margin-top:20px;">
				<ul class="nav nav-tabs profile-tabs">
				
				<?php  if($customerContactList){ $c=1;
					foreach($customerContactList as $rowCustomer){ ?>
				  <li class="col-sm-6 <?php if($c==1){echo "active";}?>"> <a  href="#<?php if($j==1){echo "active";}?>" data-toggle="tab">Contact Details <?php echo $c;?></a> </li>
				  <?php $c++;}}?>
				</ul>
				
				<div class="tab-content">
				<?php if($customerContactList){ $c=1;
					foreach($customerContactList as $rowContact){ ?>
				  <div class="profile-left tab-pane active <?php if($c==1){echo "active";}?>" id="<?php echo $c;?>">
					<form class="form-horizontal">
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">Contact Person Name</label>
						<div class="col-sm-8 margin_10_top">
							<?php echo $rowContact['contact_person_name'];?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">Office Phone No</label>
						<div class="col-sm-8 margin_10_top">
						 <?php echo $rowContact['office_phone_no'];?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">Email</label>
						<div class="col-sm-8 margin_10_top"> 
						   <?php echo $rowContact['email_id'];?>
						</div>
					  </div>
					</form>
				  </div>
					<?php $c++;}}?>
				 
				</div>
			  </div>
			  
			  
			  <div id="exTab12" class="col-sm-12">
				<ul class="nav nav-tabs profile-tabs">
				<?php if($customerAddressList){ $j=1;
					foreach($customerAddressList as $rowCustomer){?>
				  <li class="col-sm-6 <?php if($j==1){echo "active";}?>"> <a  href="#<?=$rowCustomer['u_address_id']?>" data-toggle="tab">Address Details <?=$j?></a> </li>
				<?php $j++;}}?>
				  
				</ul>
			   
				<div class="tab-content">
					<?php if($customerAddressList){$j=1;
					foreach($customerAddressList as $rowCustomer){?>
				  <div class="profile-left tab-pane <?php if($j==1){echo "active";}?>" id="<?=$rowCustomer['u_address_id']?>">
					<form class="form-horizontal">
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">Address 1</label>
						<div class="col-sm-8 margin_10_top">
						   <? echo $rowCustomer['address1'];?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">Address 2</label>
						<div class="col-sm-8 margin_10_top">
						  <? echo $rowCustomer['address2'];?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">City</label>
						<div class="col-sm-8 margin_10_top">
						  <? echo $rowCustomer['city_name'];?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">State</label>
						<div class="col-sm-8 margin_10_top">
						   <? echo $rowCustomer['state_name'];?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">Country</label>
						<div class="col-sm-8 margin_10_top">
						   <? echo $rowCustomer['country_name'];?>
						</div>
					  </div>
					  
					  <div class="form-group">
						<label  class="col-sm-4 contact-label-text">Post Code</label>
						<div class="col-sm-8 margin_10_top">
						  <? echo $rowCustomer['pincode'];?>
						</div>
					  </div>
					</form>
				  </div>
					<?php $j++;}}?>
				</div>
			  </div>
			</div>
		  </div>
		</div>
		</div>
    
</div>
</div>
</div>
    <!-- /.col-sm-6 col-lg-6 col-lg-offset-1--> 
  