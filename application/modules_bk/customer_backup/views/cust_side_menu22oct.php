<?
	$user_type = $this->session->userdata('user_type'); 
	$user_role = $this->session->userdata('user_role'); 
	$arrayData = array();
	$arrayData['user_type'] = $user_type;
	$arrayData['user_role'] = $user_role;
	$url = site_url()."pages/adminapi/menuListByuserRoleType"; 
		$menuList =  apiCall($url, "post",$arrayData);
		
		$comment = array();
		foreach ($menuList['result'] as $old_key => $asset)
		{	
			 $new_key = $asset['menu_id'];
			 $comment[ $new_key ] = $asset;
		}
		$menuList = $comment;
		
		// now loop your menuList list, and everytime you find a child, push it 
		//   into its parent
		foreach ($menuList as $k => &$v) {
		  if ($v['parent_id'] != 0) {
			$menuList[$v['parent_id']]['childs'][] =& $v;
		  }
		}
		unset($v);

		// delete the childs menuList from the top level
		foreach ($menuList as $k => $v) {
		  if ($v['parent_id'] != 0) {
			unset($menuList[$k]);
		  }
		}
		$details=0;
		// now we display the menuList list, this is a basic recursive function
	function display_menuList(array $menuList, $level = 0) {
		foreach ($menuList as $info) {
	?>		
			<li class="<?php if($info['childs']){ ?>has-sub<?php } ?>"><a href="<?php echo site_url().$info['menu_url'];?>"><?php echo $info['menu_desc'] ?></a>
				<?php if($level!=0){ ?>	<?	} ?>
		<?php if (empty($info['childs'])) { ?>
			</li> 
		<? } ?>
		<?
			if (!empty($info['childs'])) {
			?>
			<ul>
				<?	display_menuList($info['childs'], $level +1); ?>
			</ul>
		<?
			}
		?>		
		<?php if (!empty($info['childs'])) { ?></li> 
			<? } ?>
		<?
	  }
	  
	}
?>

<style type="text/css">
	/*ul.main_ul li{
		padding-left: 15px;
	}
	li.has-sub ul li{
		padding: 0;
	}*/
</style>
<?php 
	
	/*  1 Supplier		2 Customer 		3 Freelancer		4 TERANEX 
			1;"Admin"
			2;"Sales"
			3;"Service"
			4;"Finance"
			5;"Training"
			6;"Applications"	
			7;"Programming"
			8;"Designing"
			9;"Superuser"
			10;"Operator"
			11;"Support"
			12;"Attendee"	*/
?>
    <div class="col-xs-6 col-sm-3 col-md-3 col-lg-2 col-flex padd-0" style="min-height: 100%;">
      	<div class="sidebar-navigation">
		
		 <ul class="main_ul">
	        	<li> 
					<a href="<?php echo site_url()."customer/profile_detail/";?>">Company</a>
				</li>
	        	<li> 
				<a href="<?php echo site_url()."customer/alluserList/";?>">Users</a>
		       </li>
                                
                <li> 
					<a href="<?php echo site_url()."customer/chat_with_us/";?>">Chat With Us</a>
				</li>
	        	<li> 
					<a href="<?php echo site_url()."customer/collectiveBuying/";?>">Collective Buying</a>
				</li>
	        	<li> 
					<a href="<?php echo site_url()."customer/machineServices/";?>">Machine Services</a>
				</li>
	        	<li> 
					<a href="<?php echo site_url()."customer/applicationService/";?>">Application Services</a>
				</li>
				<li>
					<a href="<?php echo site_url()."customer/remoteApplicationProgramm/";?>">Design & Programming</a>
				</li>
				<li class="has-sub">
					<a href="<?php echo site_url()."customer/remoteApplicationProgramm/";?>">Produce</a>
					 <ul> 
						<li>
						<a href="<?php echo site_url()."customer/digitalmanufacturingList";?>">Additive Manufacturing RFQ List</a>
						</li>
						<li>
						<a href="<?php echo site_url()."customer/rapidprototypingList";?>">Rapid Prototyping RFQ List</a>
						</li>
						<li>
						<a href="<?php echo site_url()."customer/laserprocessingList";?>">Laser Processing RFQ List</a>
						</li>
					 </ul>
				</li>
	        	<li>
					<a href="<?php echo site_url()."customer/trainingCourses/";?>">Training Courses</a>
				</li>
	        	<li> 
					<a href="<?php echo site_url()."customer/marketIntelligence/";?>">Market Intelligence</a>
				</li>
<!--	        	<li>
					<a href="<?php echo site_url()."customer/tradeServices/";?>">Trade Services</a>
				</li>-->
	        	<li>
					<a href="<?php echo site_url()."customer/customerServices/";?>">Customer Services</a>
				</li>
				<li>
						<a href="<?php echo site_url()."customer/forum/index";?>">My Discussions</a>
				   <!--  <ul> 
							<li> <a href="<?php echo site_url()."customer/forum/index";?>">Discussion Board</a></li>
							<li> <a href="<?php echo site_url()."customer/forum/index";?>">Communities</a></li>
							<li> <a href="<?php echo site_url()."customer/forum/send_invite_code";?>">Send Invite</a></li>
					</ul> -->
				 </li>
		        <li> 
					<a href="<?php echo site_url()."customer/profile";?>">View Profile</a>

				</li>
		            <ul>
						<!-- <li>
							<a href="<?php echo site_url()."customer/profile";?>">View Profile</a>
						</li>  --> 
					<!-- 	<li>
							<a href="<?php echo site_url()."customer/profile_edit";?>">Edit Profile</a>
						</li>	
						<li>
							<a href="<?php echo site_url()."customer/companyDetails";?>">Company Details</a>
						</li>
						<li>
							<a href="<?php echo site_url()."customer/document";?>">Upload Company Docs</a>
						</li>
						<li>
							<a href="<?php echo site_url()."customer/otherDocument";?>">Upload Other Files</a>
						</li>
						<li>
							<a href="<?php echo site_url()."customer/contact";?>">Add Contact Details</a>
						</li>
						<li>
							<a href="<?php echo site_url()."customer/address";?>">Add Address</a>
						</li>
						<li>
							<a href="<?php echo site_url()."customer/bankDetails";?>">Bank Details</a>
						</li>
						<li>
							<a href="<?php echo site_url()."customer/workExperince";?>">Work Experience</a>
						</li> -->
						
						
						<!-- <li>
							<a href="<?php echo site_url()."customer/changePassword";?>">Change Password</a>
						</li> -->
		            </ul>
		        </li>
		        <?php if($user_role==5) { ?>  
						<li>
							<a href="<?php echo site_url()."customer/trainingSpecialties";?>">Training Specialties List</a>
						</li> 
				<?php } ?>
				<!-- 
					<li class="has-sub"> <a href="#">RFQ's</a>
					<ul><li><a href="create_rfq.php">Create New RFQ</a></li></ul>
				</li> -->
				<?php if($user_type==4&&$user_role==7){?>  
					<li>
						<a href="<?php echo site_url()."customer/remoteApplicationProgrammer/";?>">Remote Programming Request</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/remoteServiceVideoEnquiryProgrammer";?>">Remote Service Video Request List</a>
					</li>
				<?php }?>

				<?php if($user_type==2){?>  
<!--					<li>
						<a href="<?php echo site_url()."customer/attendeeList";?>">Attendee List</a>
					</li>-->
					<li>
						<a href="<?php echo site_url()."customer/courseEnrollment";?>">Course Enrollment List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/remoteApplicationService/";?>">Remote Application Service Agreement</a>
					</li>
					<li> 
						<a href="<?php echo site_url()."customer/remoteApplicationMachineService/";?>">Remote Machine On Demand Service</a>
					</li>
					
					<li> 
						<a href="<?php echo site_url()."customer/remote_machine_req_customers/";?>">Remote Application Consultant</a>
					</li>
<!--				<li>
						<a href="<?php echo site_url()."customer/research_purchases_list/";?>">Research Purchase List</a>
					</li>-->
<!--					<li>
						<a href="<?php echo site_url()."customer/groupbuyingQuotationList";?>">Groupbuying Quotation</a>
					</li>-->
					<li>
						<a href="<?php echo site_url()."customer/courseRfqList";?>">Course Quotation</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/xpert_enquiry/";?>">Xpert Request List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/remote_application_enquiry/";?>">Remote Application Consultant(NEW)</a>
					</li>
				    <!-- 	<li>
						<a href="<?php echo site_url()."customer/remote_digitalmanufacturing_req_customers/";?>">Digital Manufacturing RFQ</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/RapidprototypingRfqList/";?>">Rapid Prototyping RFQ</a>
					</li>
					<li> 
						<a href="<?php echo site_url()."customer/LaserprocessingRfqList/";?>">Laser Processing RFQ</a>
					</li> -->
					<li> 
						<a href="<?php echo site_url()."customer/remoteappVideoEnquiry";?>">Remote application Video Request</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/remoteServiceVideoEnquiry";?>">Remote Service Video Request</a>
					</li>
					
				<?php } ?>
				<?php if($user_role==5){?>  
					<li>
						<a href="<?php echo site_url()."customer/assignCourseList";?>">Assign Course List</a>
					</li> 
				<?php }?>
				<?php if($user_type==12){?>  
					<li>
						<a href="<?php echo site_url()."customer/attendeeAssignCourseList";?>">Assign Course List</a>
					</li> 
				<?php }?>
				<?php if($user_type==1){?>  
					<li>
						<a href="<?php echo site_url()."customer/traineeList";?>">Trainee / Consultant List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/groupbuyingList";?>">Groupbuying RFQ List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/digitalmanufacturingList";?>">Additive Manufacturing RFQ List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/rapidprototypingList";?>">Rapid Prototyping RFQ List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/laserprocessingList";?>">Laser Processing RFQ List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/courseList";?>">Course RFQ List</a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/remoteappVideoEnquirySupplier";?>">Remote Application Video Request List</a>
					</li>
				<?php }?>
				<?php if($user_type==1){?>  
					<li>
						<a href="<?php echo site_url()."customer/remote_application_rfq_request/";?>">Remote Application RFQ Request</a>
					</li>
					<li> 
						<a href="<?php echo site_url()."customer/remoteOnDemandConsultant/"; //remoteMachineServiceRequest?>">Remote Machine On Demand </a>
					</li>
					<li>
						<a href="<?php echo site_url()."customer/remote_application_consultant/";?>">Remote Application Consultant</a>
					</li>
					<li> 
						<a href="<?php echo site_url()."customer/xpert_enquiry_details/";?>">Xpert Request List</a>
					</li>
					<li> 
						<a href="<?php echo site_url()."customer/remote_application_enquiry_details/";?>">Remote Application Consultant(NEW)</a>
					</li>
				<?php }?>
					<li>
						<a href="<?php echo site_url()."customer/forum/index";?>">Communities</a>
				   <!--  <ul> 
							<li> <a href="<?php echo site_url()."customer/forum/index";?>">Discussion Board</a></li>
							<li> <a href="<?php echo site_url()."customer/forum/index";?>">Communities</a></li>
							<li> <a href="<?php echo site_url()."customer/forum/send_invite_code";?>">Send Invite</a></li>
					</ul> -->
				  </li>
					<li class="has-sub"><a href="<?php echo site_url()."customer/machinelist";?>">Machine Contact/Enquiry</a>
						<ul> 
							<li>
								<a href="<?php echo site_url()."customer/machinelist";?>">Contact Board</a>
							</li>
							<li>
								<a href="<?php echo site_url()."customer/AllMachineList";?>">Add Machine</a>
							</li>
<!--							<li>
                                                                                                                        <a href="<?php echo site_url()."customer/MachineCategory";?>">Machine Category</a>
							</li>
							<li>
								<a href="<?php echo site_url()."customer/machine_brand";?>">Machine Brand</a>
							</li>
							<li>
								<a href="<?php echo site_url()."customer/machine_brand_model";?>">Brand Model</a>
							</li>-->
							<li>
								<a href="<?php //echo site_url()."customer/machineEnquiry";?>">Enquiry</a>
							</li>
							<li> 
								<a href="<?php //echo site_url()."customer/machineFinanceEnquiry";?>">Finance Request</a>
							</li>
							<?php if($user_type==2){ ?>
								<li> <a href="<?php echo site_url()."customer/machineVideoEnquiry";?>">Video / Chat Request</a></li>
							<? } if($user_type==1){?>
								<li> 
									<a href="<?php echo site_url()."customer/machineVideoEnquirySupplier";?>">Video / Chat Request</a>
								</li>
							<? } ?>  
						</ul>
					</li>
<!--					<li class="has-sub"><a href="<?php echo site_url()."customer/automationlist";?>">Automation Contact/Enquiry</a>
						 <ul> 
							<li> <a href="<?php echo site_url()."customer/automationlist";?>">Contact Board</a></li>
							 <li> <a href="<?php echo site_url()."customer/automationEnquiry";?>">Enquiry</a></li>
							<li> <a href="<?php //echo site_url()."customer/machineFinanceEnquiry";?>">Finance Request</a></li> 
							<?php if($user_type==2){ ?>
								<li> <a href="<?php echo site_url()."customer/automationVideoEnquiry";?>">Video / Chat Request</a></li>
							<? } if($user_type==1){?>
							<li> <a href="<?php echo site_url()."customer/automationVideoEnquirySupplier";?>">Video / Chat Request</a></li>
								
								<? } ?>  
						</ul>
					</li>-->
					<li> 
						<a href="<?php echo site_url()."customer/eventsList/";?>">My Events</a>
					</li> 
					<li>
						<a href="<?php echo site_url()."customer/invoiceList/";?>">Invoices</a>
					</li> 
	         <!--  <li><a href="">My Orders</a></li>
	          <li><a href="">My Reviews</a></li>  
	          <li><a href="">Subscriptions</a></li> -->
		</ul>
			
	     <ul>
		<li> 
		 <a href="<?php echo site_url()."customer/profile_detail/";?>">===DYNAMIC MENU===</a>
		</li>
			<?php display_menuList($menuList);?>
		
		</ul>  
      	</div>
    </div>
    <!-- /.col-sm-3 col-md-2 -->

					