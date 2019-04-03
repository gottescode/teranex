<style type="text/css">
	/*ul.main_ul li{
		padding-left: 15px;
	}
	li.has-sub ul li{
		padding: 0;
	}*/
</style>
<?php $user_type = $this->session->userdata('user_type'); ?>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 col-flex padd-0" style="min-height: 100%;">
      	<div class="sidebar-navigation">
	        <ul class="main_ul">
	          <li class="has-sub"> <a href="<?php echo site_url()."customer/profile_detail";?>">Profile</a>
	            <ul>
					<li><a href="<?php echo site_url()."customer/profile";?>">View Profile</a></li>  
					<li><a href="<?php echo site_url()."customer/profile_edit";?>">Edit Profile</a></li>	
					<li><a href="<?php echo site_url()."customer/companyDetails";?>">Company Details</a></li>
					<li><a href="<?php echo site_url()."customer/document";?>">Upload Company Docs</a></li>
					<li><a href="<?php echo site_url()."customer/otherDocument";?>">Upload Other Files</a></li>
					<li><a href="<?php echo site_url()."customer/contact";?>">Add Contact Details</a></li>
					<li><a href="<?php echo site_url()."customer/address";?>">Add Address</a></li>
					<li><a href="<?php echo site_url()."customer/bankDetails";?>">Bank Details</a></li>
					<li><a href="<?php echo site_url()."customer/workExperince";?>">Work Experience</a></li>
					<?php if($user_type=='T'){?>  
						<li><a href="<?php echo site_url()."customer/trainingSpecialties";?>">Training Specialties List</a></li> 
					<?php }?>
					<li><a href="<?php echo site_url()."customer/changePassword";?>">Change Password</a></li>
	            </ul>
	          </li>
	         <!--  <li class="has-sub"> <a href="#">RFQ's</a>
	            <ul>
				  <li> <a href="create_rfq.php">Create New RFQ</a></li>
				  
	            </ul>
	          </li> -->
			<?php if($user_type=='P'){?>  
				<li> <a href="<?php echo site_url()."customer/remoteApplicationProgrammer/";?>">Remote Programming Request</a></li>
				<li><a href="<?php echo site_url()."customer/remoteServiceVideoEnquiryProgrammer";?>">Remote Service Video Request List</a></li>
				
			<?php }?>

			<?php if($user_type=='C'){?>  
				<li><a href="<?php echo site_url()."customer/attendeeList";?>">Attendee List</a></li>
				<li> <a href="<?php echo site_url()."customer/courseEnrollment";?>">Course Enrollment List</a></li>
				<li> <a href="<?php echo site_url()."customer/remoteApplicationService/";?>">Remote Application Service Agreement</a></li>
				<li> <a href="<?php echo site_url()."customer/remoteApplicationMachineService/";?>">Remote Machine On Demand Service</a></li>
				<li> <a href="<?php echo site_url()."customer/remoteApplicationProgramm/";?>">Remote Programming</a></li>
				<li> <a href="<?php echo site_url()."customer/remote_machine_req_customers/";?>">Remote Application Consultant</a></li>
				<li> <a href="<?php echo site_url()."customer/research_purchases_list/";?>">Research Purchase List</a></li>
				<li><a href="<?php echo site_url()."customer/groupbuyingQuotationList";?>">Groupbuying Quotation</a></li>
				<li><a href="<?php echo site_url()."customer/courseRfqList";?>">Course Quotation</a></li>
				<li> <a href="<?php echo site_url()."customer/xpert_enquiry/";?>">Xpert Request List</a></li>
				<li> <a href="<?php echo site_url()."customer/remote_application_enquiry/";?>">Remote Application Consultant(NEW)</a></li>
				<li><a href="<?php echo site_url()."customer/remote_digitalmanufacturing_req_customers/";?>">Digital Manufacturing RFQ</a></li>
				<li> <a href="<?php echo site_url()."customer/RapidprototypingRfqList/";?>">Rapid Prototyping RFQ</a></li>
				<li> <a href="<?php echo site_url()."customer/LaserprocessingRfqList/";?>">Laser Processing RFQ</a></li>
				<li> <a href="<?php echo site_url()."customer/remoteappVideoEnquiry";?>">Remote application Video Request</a></li>
				<li> <a href="<?php echo site_url()."customer/remoteServiceVideoEnquiry";?>">Remote Service Video Request</a></li>
				
			<?php }?>
			<?php if($user_type=='T'){?>  
				<li><a href="<?php echo site_url()."customer/assignCourseList";?>">Assign Course List</a></li> 
			<?php }?>
			<?php if($user_type=='A'){?>  
				<li><a href="<?php echo site_url()."customer/attendeeAssignCourseList";?>">Assign Course List</a></li> 
			<?php }?>
			<?php if($user_type=='S'){?>  
				<li><a href="<?php echo site_url()."customer/traineeList";?>">Trainee / Consultant List</a></li>
				<li><a href="<?php echo site_url()."customer/groupbuyingList";?>">Groupbuying RFQ List</a></li>
				<li><a href="<?php echo site_url()."customer/digitalmanufacturingList";?>">Additive Manufacturing RFQ List</a></li>
				<li><a href="<?php echo site_url()."customer/rapidprototypingList";?>">Rapid Prototyping RFQ List</a></li>
				<li><a href="<?php echo site_url()."customer/laserprocessingList";?>">Laser Processing RFQ List</a></li>
					<li><a href="<?php echo site_url()."customer/courseList";?>">Course RFQ List</a></li>
					<li><a href="<?php echo site_url()."customer/remoteappVideoEnquirySupplier";?>">Remote Application Video Request List</a></li>
			<?php }?>
			<?php if($user_type=='CN'){?>  
				<li> <a href="<?php echo site_url()."customer/remoteApplicationConsultant/";?>">Remote Application Request</a></li>
				<li> <a href="<?php echo site_url()."customer/remoteOnDemandConsultant/"; //remoteMachineServiceRequest?>">Remote Machine On Demand </a></li>
				<li> <a href="<?php echo site_url()."customer/remote_application_consultant/";?>">Remote Application Consultant</a></li>
				<li> <a href="<?php echo site_url()."customer/xpert_enquiry_details/";?>">Xpert Request List</a></li>
				<li> <a href="<?php echo site_url()."customer/remote_application_enquiry_details/";?>">Remote Application Consultant(NEW)</a></li>
			<?php }?>
			  <li> <a href="<?php echo site_url()."customer/forum/index";?>">Communities</a>
	           <!--  <ul> 
	      				<li> <a href="<?php echo site_url()."customer/forum/index";?>">Discussion Board</a></li>
	      				<li> <a href="<?php echo site_url()."customer/forum/index";?>">Communities</a></li>
	      				<li> <a href="<?php echo site_url()."customer/forum/send_invite_code";?>">Send Invite</a></li>
	            </ul> -->
	          </li>
				<li class="has-sub"><a href="<?php echo site_url()."customer/machinelist";?>">Machine Contact/Enquiry</a>
					 <ul> 
	      				<li> <a href="<?php echo site_url()."customer/machinelist";?>">Contact Board</a></li>
	      				<li> <a href="<?php //echo site_url()."customer/machineEnquiry";?>">Enquiry</a></li>
	      				<li> <a href="<?php //echo site_url()."customer/machineFinanceEnquiry";?>">Finance Request</a></li>
						<?php if($user_type=='C'){ ?>
							<li> <a href="<?php echo site_url()."customer/machineVideoEnquiry";?>">Video / Chat Request</a></li>
						<? } if($user_type=='S'){?>
	      				<li> <a href="<?php echo site_url()."customer/machineVideoEnquirySupplier";?>">Video / Chat Request</a></li>
							
							<? } ?>  
					</ul>
				</li>
				<li class="has-sub"><a href="<?php echo site_url()."customer/automationlist";?>">Automation Contact/Enquiry</a>
					 <ul> 
	      				<li> <a href="<?php echo site_url()."customer/automationlist";?>">Contact Board</a></li>
	      				<!-- <li> <a href="<?php echo site_url()."customer/automationEnquiry";?>">Enquiry</a></li>
	      				<li> <a href="<?php //echo site_url()."customer/machineFinanceEnquiry";?>">Finance Request</a></li> -->
						<?php if($user_type=='C'){ ?>
							<li> <a href="<?php echo site_url()."customer/automationVideoEnquiry";?>">Video / Chat Request</a></li>
						<? } if($user_type=='S'){?>
	      				<li> <a href="<?php echo site_url()."customer/automationVideoEnquirySupplier";?>">Video / Chat Request</a></li>
							
							<? } ?>  
					</ul>
				</li>
	          <li> <a href="<?php echo site_url()."customer/eventsList/";?>">My Events</a></li> 
	          <li><a href="<?php echo site_url()."customer/invoiceList/";?>">Invoices</a></li> 
	          <li><a href="">My Orders</a></li>
	          <li><a href="">My Reviews</a></li>  
	          <li><a href="">Subscriptions</a></li>
	        </ul>
      	</div>
    </div>
    <!-- /.col-sm-3 col-md-2 -->
