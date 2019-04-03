<?php $user_type = $this->session->userdata('user_type'); ?>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 col-flex padd-0">
      <div class="sidebar-navigation">
        <ul>
          <li class="has-sub"> <a href="<?php echo site_url()."customer/profile_detail";?>">Profile</a>
            <ul>
				<li><a href="<?php echo site_url()."customer/profile";?>">View Profile</a></li>  
				<li><a href="<?php echo site_url()."customer/editprofile";?>">Edit Profile</a></li>	
				<li><a href="<?php echo site_url()."customer/companyDetails";?>">Company Details</a></li>
				<li><a href="<?php echo site_url()."customer/document";?>">Upload Company Docs</a></li>
				<li><a href="<?php echo site_url()."customer/otherDocument";?>">Upload Other Files</a></li>
				<li><a href="<?php echo site_url()."customer/contact";?>">Add Contact Details</a></li>
				<li><a href="<?php echo site_url()."customer/address";?>">Add Address</a></li>
				<li><a href="<?php echo site_url()."customer/bankDetails";?>">Bank Details</a></li>
				<li><a href="<?php echo site_url()."customer/workExperince";?>">Work Experince</a></li>
				<?php if($user_type=='T'){?>  
					<li><a href="<?php echo site_url()."customer/trainingSpecialties";?>">Training Specialties List</a></li> 
				<?php }?>
				<li><a href="<?php echo site_url()."customer/changePassword";?>">Change Password</a></li>
            </ul>
          </li>
          <li class="has-sub"> <a href="#">RFQ's</a>
            <ul>
			  <li> <a href="create_rfq.php">Create New RFQ</a></li>
            </ul>
          </li>
		<?php if($user_type=='C'){?>  
			<li><a href="<?php echo site_url()."customer/attendeeList";?>">Attendee List</a></li>
			  <li> <a href="<?php echo site_url()."customer/courseEnrollment";?>">Course Enrollment List</a></li>
			<li> <a href="<?php echo site_url()."customer/remoteApplicationService/";?>">Remote Application Service</a></li>
			<li> <a href="<?php echo site_url()."customer/remoteApplicationMachineService/";?>">Remote Machine Service</a></li>
		<?php }?>
		<?php if($user_type=='T'){?>  
			<li><a href="<?php echo site_url()."customer/assignCourseList";?>">Assign Course List</a></li> 
		<?php }?>
		<?php if($user_type=='P'){?>  
			<li> <a href="<?php echo site_url()."remoteprogramming/remoteApplicationProgrammer/";?>">Remote Prgramming Request</a></li>
		<?php }?>
		<?php if($user_type=='A'){?>  
			<li><a href="<?php echo site_url()."customer/attendeeAssignCourseList";?>">Assign Course List</a></li> 
		<?php }?>
		<?php if($user_type=='S'){?>  
			<li><a href="<?php echo site_url()."customer/traineeList";?>">Trainee / Consultant List</a></li>
		<?php }?>
		<?php if($user_type=='CN'){?>  
			<li> <a href="<?php echo site_url()."customer/remoteApplicationConsultant/";?>">Remote Application Request</a></li>
			<li> <a href="<?php echo site_url()."customer/remoteMachineServiceRequest/";?>">Remote Machine Request</a></li>
		<?php }?>
		  <li class="has-sub"> <a href="<?php echo site_url()."customer/forum/index";?>">Forum</a>
            <ul> 
      				<li> <a href="<?php echo site_url()."customer/forum/index";?>">Discussion Board</a></li>
      				<li> <a href="<?php echo site_url()."customer/forum/index";?>">Communities</a></li>
      				<li> <a href="<?php echo site_url()."customer/forum/send_invite_code";?>">Send Invite</a></li>
            </ul>
          </li>
          <li> <a href="<?php echo site_url()."customer/eventsList/";?>">My Events</a></li> 
          <li><a href="<?php echo site_url()."customer/invoiceList/";?>">Invoices</a></li> 
          <li><a href="">My Orders</a></li>
          <li><a href="">My Reviews</a></li> 
          <li><a href="">Quotes</a></li>
          <li><a href="">Requests</a></li>
          <li><a href="">RFQ's</a></li>
          <li><a href="">Subscriptions</a></li>
        </ul>
      </div>
    </div>
    <!-- /.col-sm-3 col-md-2 -->
