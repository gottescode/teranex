<style type="text/css">
ul.admin_sidebar li.cust1{
	white-space: normal !important;
}
ul.admin_sidebar li.cust1 a span{
	display: inline-block;
    margin-left: 24px;
    margin-top: -20px;
}
</style>

	
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
 
      <!-- sidebar menu: : style can be found in sidebar.less -->
		<ul class="sidebar-menu admin_sidebar" data-widget="tree">  
			<li><a href="<?=site_url()?>dashboard/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li> 
			<li><a href="<?=site_url()?>pages/admin/dashboardSidemenu/"><i class="fa fa-list-ul"></i> <span>Dashboard Menu</span></a></li>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Request List</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>consultant/admin/technical_services"><i class="fa fa-list-ul"></i> <span>Technical Services</span></a></li> 
					<li><a href="<?=site_url()?>consultant/admin/application_support_requests"><i class="fa fa-list-ul"></i> <span>Application Support Request</span></a></li>
					<li><a href="<?=site_url()?>consultant/admin/spare_part_requests"><i class="fa fa-list-ul"></i> <span>Spare Request List</span></a></li>
				</ul>
			</li>  
						
			<li><a href="<?=site_url()?>consultant/admin/videoRequests"><i class="fa fa-list-ul"></i> <span>Remote Service Video Request</span></a></li>
			<li class="cust1"><a href="<?=site_url()?>consultant/admin/requestListMachineConsultant"><i class="fa fa-list-ul"></i> <span> Remote Machine On-demand Service Request </span></a></li>
			<!-- <li><a href="<?=site_url()?>remoteprogramming/admin/"><i class="fa fa-list-ul"></i> <span> Remote Programming Service </span></a></li> -->
		   <li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Remote Programming</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>remoteprogramming/admin/"><i class="fa fa-angle-right"></i><span>Remote Programming Service </span></a></li>
					<li><a href="<?=site_url()?>remoteprogramming/admin/remoteprogrammingCategory"><i class="fa fa-angle-right"></i><span>Remote Programming Category List</span></a></li>
				</ul>
			</li>  
			 <li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Xpert Connect</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>xpertconnect/admin/xpertconnectCategory"><i class="fa fa-angle-right"></i><span>Xpert Connect Category List</span></a></li>
				</ul>
			</li>  
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Remote Application</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>remoteapplication/admin/"><i class="fa fa-angle-right"></i><span>Remote Application RFQ</span></a></li>
					<li><a href="<?=site_url()?>remoteapplication/admin/videoRequests"><i class="fa fa-angle-right"></i><span>Remote Video Request</span></a></li>					
				</ul>
			</li>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Machine </span><i class="fa fa-chevron-left pull-right-container"></i></a>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>RFQ </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>machine/admin/machineTimeStudyRequestAll"><i class="fa fa-angle-right"></i><span>Machine Time Study </span></a></li>					
					<li><a href="<?=site_url()?>machine/admin/machineFinanceRequestAll"><i class="fa fa-angle-right"></i><span>Machine Finance</span></a></li>					
					<li><a href="<?=site_url()?>machine/admin/onDemandManufacturingRfq"><i class="fa fa-angle-right"></i><span>On Demand Manufacturing </span></a></li>					
					<li><a href="<?=site_url()?>machine/admin/onDemandProgrammingRfq"><i class="fa fa-angle-right"></i><span>On Demand Programming </span></a></li>					
					<li><a href="<?=site_url()?>machine/admin/machineOnRentRequestList"><i class="fa fa-angle-right"></i><span>Machine On-Rent </span></a></li>
				</ul>
			</li>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Automation </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>automation/admin/"><i class="fa fa-angle-right"></i><span>Automation Category </span></a></li>					
					<li><a href="<?=site_url()?>automation/admin/automation_brand"><i class="fa fa-angle-right"></i><span>Automation Brand</span></a></li>					
					<li><a href="<?=site_url()?>automation/admin/automation_brand_model"><i class="fa fa-angle-right"></i><span>Automation Brand Model</span></a></li>					
					<li><a href="<?=site_url()?>automation/admin/automationList"><i class="fa fa-angle-right"></i><span>Automation List</span></a></li>
					<li><a href="<?=site_url()?>automation/admin/automationFinaceRequest"><i class="fa fa-angle-right"></i><span>Automation Finance Request </span></a></li>
					<li><a href="<?=site_url()?>automation/admin/automationFinaceComment"><i class="fa fa-angle-right"></i><span>Automation Comment Request </span></a></li>
					<li><a href="<?=site_url()?>automation/admin/automationRequest"><i class="fa fa-angle-right"></i><span>Automation Enquiry</span> </a></li>
					<li><a href="<?=site_url()?>automation/admin/videoRequests"><i class="fa fa-angle-right"></i><span>Automation Video Request</span></a></li>
				</ul>
			</li>
		<!-- <li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Collective buying </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>groupbuying/admin"><i class="fa fa-angle-right"></i><span>Product List</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/admin/collective_buying_req_list"><i class="fa fa-angle-right"></i><span>Collective buying request</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/admin/rfqList"><i class="fa fa-angle-right"></i><span>RFQ List</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/admin/groupbuyingCategory"><i class="fa fa-angle-right"></i><span>Group Buying Category List</span></a></li>
				</ul>
			</li>-->
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Collective buying Consumable</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>groupbuying/consumable"><i class="fa fa-user"></i><span>Customer RFQ Consumable</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/consumable/adminRfqList"><i class="fa fa-user"></i><span>RFQ List</span></a></li>
				
				</ul>
			</li>	
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Collective Service Part </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>groupbuying/serviceparts"><i class="fa fa-user"></i><span>Customer RFQ Service Part</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/serviceparts/adminRfqList"><i class="fa fa-user"></i><span>RFQ List</span></a></li>
				
				</ul>
			</li>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Collective Sheet Metal </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>groupbuying/sheetmetal"><i class="fa fa-user"></i><span>Customer RFQ Service Part</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/sheetmetal/adminRfqList"><i class="fa fa-user"></i><span>RFQ List</span></a></li>
				
				</ul>
			</li>

			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Digital Manufacturing</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>digitalmanufacturing/admin/RequestList"><i class="fa fa-angle-right"></i><span>Digital Manufacturing RFQ Request</span></a></li>
					<li><a href="<?=site_url()?>digitalmanufacturing/admin"><i class="fa fa-angle-right"></i><span>Category List</span></a></li>
				</ul>
			</li>  
			<li><a href="<?=site_url()?>supplier/admin"><i class="fa fa-list-ul"></i> <span>Supplier List</span></a></li>
			<li><a href="<?=site_url()?>customer/admin"><i class="fa fa-list-ul"></i><span>Customer List</span></a></li>
			<li><a href="<?=site_url()?>community/admin"><i class="fa fa-list-ul"></i></i> <span>Community List</span></a></li>
			<li><a href="<?=site_url()?>pages/admin/VideoChatRequestList"><i class="fa fa-list-ul"></i><span>Video Chat Request List</span></a></li>
			<!-- <li><a href="#"><i class="fa fa-picture-o"></i> <span>RFQ's</span></a></li>
			<li><a href="<?=site_url()?>pages/admin/contactList"><i class="fa fa-phone" aria-hidden="true"></i> <span>Forum</span></a></li> -->
			<!-- <li><a href="<?=site_url()?>events/admin/index"><i class="fa fa-calendar"></i> <span>Event </span></a></li>  -->
			<li><a href="<?=site_url()?>exchangegroups/admin"><i class="fa fa-list-ul"></i> <span>Exchange Group List </span></a></li>  
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Research</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>research/admin/index"><i class="fa fa-angle-right"></i><span>Research List</span></a></li>
					<li><a href="<?=site_url()?>research/admin/researchReportSample"><i class="fa fa-angle-right"></i><span>Research Report Sample</span></a></li>
					<li><a href="<?=site_url()?>research/admin/researchSpeakConsultant"><i class="fa fa-angle-right"></i><span>Speak to Consultant</span></a></li>
					<li><a href="<?=site_url()?>research/admin/analystQuery"><i class="fa fa-angle-right"></i><span>Analyst Query</span></a></li>
					<li><a href="<?=site_url()?>research/admin/salesQuery"><i class="fa fa-angle-right"></i><span>Sales Query</span></a></li>
					<li><a href="<?=site_url()?>research/admin/reportCustomizationList"><i class="fa fa-angle-right"></i><span>Research Report Customization</span></a></li>
					<li><a href="<?=site_url()?>research/admin/salesPurchaseList"><i class="fa fa-angle-right"></i><span>Research Purchase List</span></a></li>
					
				</ul>
			</li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Featured Of Month</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>xpertconnect/admin/XpertsFeaturedThisMonth"><i class="fa fa-user"></i><span>Freelancer</span></a></li>
					<li><a href="<?=site_url()?>xpertconnect/admin/remoteTrainingFeaturedThisMonth"><i class="fa fa-user"></i><span>Remote Training</span></a></li>
					<li><a href="<?=site_url()?>xpertconnect/admin/remoteApplicationFeaturedThisMonth"><i class="fa fa-user"></i><span>Remote Application</span></a></li>
					<li><a href="<?=site_url()?>xpertconnect/admin/remoteProgrammingFeaturedThisMonth"><i class="fa fa-user"></i><span>Remote Programming</span></a></li>
				</ul>
			</li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Analytics</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>analytics/admin/index"><i class="fa fa-angle-right"></i><span>Analytics List</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/teamList"><i class="fa fa-angle-right"></i><span>Analytics Team List</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/analyticsRequestCall"><i class="fa fa-angle-right"></i><span>Analytics Request Call</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/analyticsSpeakConsultant"><i class="fa fa-angle-right"></i><span>Speak To Consultant</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/webinar"><i class="fa fa-angle-right"></i><span>Webinar</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/reportCustomizationList"><i class="fa fa-angle-right"></i><span>Analytics Report Customization</span></a></li>
				</ul>
			</li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Snapshots</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>snapshot/admin/index"><i class="fa fa-angle-right"></i><span>Category List</span></a></li>
					<li><a href="<?=site_url()?>snapshot/admin/snapshotSpeakConsultant"><i class="fa fa-angle-right"></i><span>Speak To Consultant</span></a></li>
					<li><a href="<?=site_url()?>snapshot/admin/subscriptionlist"><i class="fa fa-angle-right"></i><span>Subscription Plans</span></a></li>
					<li><a href="<?=site_url()?>snapshot/admin/salesPurchaseList"><i class="fa fa-angle-right"></i><span>Subscriber User List</span></a></li>
				</ul>
			</li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Consulting</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>consulting/admin/index"><i class="fa fa-angle-right"></i><span>Consulting List</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/consultingSpeakConsultant"><i class="fa fa-angle-right"></i><span>Speak To Consultant</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/consultingRequestCall"><i class="fa fa-angle-right"></i><span>Consulting Request Call</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/analystQuery"><i class="fa fa-angle-right"></i><span>Analyst Query</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/salesQuery"><i class="fa fa-angle-right"></i><span>Sales Query</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/teamList"><i class="fa fa-angle-right"></i><span>Consulting Team List</span></a></li>
					<!--<li><a href="<?=site_url()?>consulting/admin/webinar"><i class="fa fa-user"></i><span>Webinar</span></a></li>-->
				</ul>
			</li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Additive Manufacturing</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
	                <li><a href="<?=site_url()?>additivemanufacturing/admin/"><i class="fa fa-angle-right"></i><span>Additive Manufacturing List</span></a></li>
					<li><a href="<?=site_url()?>additivemanufacturing/admin"><i class="fa fa-angle-right"></i><span>First Section Description</span></a></li>
					<li><a href="<?=site_url()?>additivemanufacturing/admin/additiveManufacturingProcessesList"><i class="fa fa-angle-right"></i><span>Processes</span></a></li>
					<li><a href="<?=site_url()?>additivemanufacturing/admin/PrintingMaterials3DList"><i class="fa fa-angle-right"></i><span>3D Printing Materials</span></a></li>
					<li><a href="<?=site_url()?>additivemanufacturing/admin/PrintingApplicationList"><i class="fa fa-angle-right"></i><span>Top 3D Printing Applications</span></a></li>
					<li><a href="<?=site_url()?>additivemanufacturing/admin/RequestList"><i class="fa fa-angle-right"></i><span>RFQ Request</span></a></li>
				</ul>
			</li>  
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Laser Processing</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>laserprocessing/admin"><i class="fa fa-angle-right"></i><span>Description</span></a></li>
					<li><a href="<?=site_url()?>laserprocessing/admin/laserProcessingMaterialList"><i class="fa fa-angle-right"></i><span>Laser Processing Materials</span></a></li>
					<li><a href="<?=site_url()?>laserprocessing/admin/RequestList"><i class="fa fa-angle-right"></i><span>RFQ Request</span></a></li>
				</ul>
			</li>  
			 <li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Rapid Prototyping</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>rapidprototyping/admin/"><i class="fa fa-angle-right"></i><span>TERANEX 3D Printing Services </span></a></li>
					<li><a href="<?=site_url()?>rapidprototyping/admin/rapidprototypingOnlineFeatures"><i class="fa fa-angle-right"></i><span>TERANEX Exclusive Online Features</span></a></li>
					<li><a href="<?=site_url()?>rapidprototyping/admin/RequestList"><i class="fa fa-angle-right"></i><span>RFQ Request</span></a></li>
				</ul>
			</li>   
			 <li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Administartion</span>  <i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>allusers/admin/"><i class="fa fa-user"></i><span>Users</span></a></li>
					
				</ul>
			</li>   
			<!--<li><a href="<?=site_url()?>site/admin"><i class="fa fa-list-ul"></i><span>Manufacturing Processes</span></a></li>-->
			<li  class="treeview"><a href="#"><i class="fa fa-gear" aria-hidden="true"></i> <span>Settings</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>settings/suppliertype/"><i class="fa fa-user"></i><span>Supplier Type</span></a></li>
					<li><a href="<?=site_url()?>machine/admin/index"><i class="fa fa-angle-right"></i><span>Machine Category</span></a></li>
					<li><a href="<?=site_url()?>settings/companytype/"><i class="fa fa-building"></i><span>Company Type</span></a></li>
					<!--<li><a href="<?=site_url()?>pages/admin/contactList"><i class="fa fa-user"></i><span>Admin Role</span></a></li>-->
					<li><a href="<?=site_url()?>settings/materialtype"><i class="fa fa-angle-right"></i><span>Material Type</span></a></li>
					<li><a href="<?=site_url()?>settings/language"><i class="fa fa-angle-right"></i><span>Language</span></a></li>
					<li><a href="<?=site_url()?>settings/applicationrequired"><i class="fa fa-angle-right"></i><span>Application(s) Required</span></a></li>
					<li><a href="<?=site_url()?>settings/programmertype"><i class="fa fa-users"></i><span>Programmer Type</span></a></li>
					<li><a href="<?=site_url()?>settings/consultancytype"><i class="fa fa-angle-right"></i><span>Consultancy Type</span></a></li>
					<li><a href="<?=site_url()?>settings/usertype"><i class="fa fa-users"></i><span>User Type</span></a></li>
					<li><a href="<?=site_url()?>consultant/admin/qualification"><i class="fa fa-angle-right"></i><span>Qualification</span></a></li>
					<li class="treeview">
						  <a href="#"><i class="fa fa-map-marker"></i> Location
							<span class="pull-right-container">
							  <i class="fa fa-angle-left pull-right"></i>
							</span>
						  </a>
						  <ul class="treeview-menu">
							<li><a href="<?=site_url()?>location/country"><i class="fa fa-list-ul"></i>Country List</a></li>
							<li><a href="<?=site_url()?>location/state"><i class="fa fa-list-ul"></i>State List</a></li>
							<li><a href="<?=site_url()?>location/city"><i class="fa fa-list-ul"></i>City List</a></li>
						  </ul>
					</li>
				</ul>
			</li> 
			<li><a href="<?=site_url()?>eacademy/admin/index"><i class="fa fa-desktop"></i> <span>Eacadmy Course </span></a></li>  
			<li><a href="<?=site_url()?>remotetraining/admin/index"><i class="fa fa-desktop"></i> <span>Remotetraining Course </span></a></li> 
			<!--<li><a href="<?=site_url()?>mediacenter/wp-admin" target="blank"><i class="fa fa-list-ul"></i> <span>Media Center Dashboard</span></a></li>
			<li><a href="<?=site_url()?>ecommerce/wp-admin" target="blank"><i class="fa fa-list-ul"></i> <span>Spare and Tooling Dashboard</span></a></li>-->
<?php  
	
	$url = site_url()."pages/api/pagesList";
	$result = apiCall($url,"GET");
	
		?>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Pages </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
				<?php 
				foreach($result['result'] as $row){
				?>
					<li><a href="<?=site_url()?>pages/admin/index/<?php echo $row['id']; ?>"><i class="fa fa-angle-right"></i><span><?php echo $row['page_title']?> </span></a></li>
				<?
				}
			?>
			
			
			
				
					<li class="treeview"><a href="#"><i class="fa fa-users"></i> <span>Team</span><i class="fa fa-chevron-left pull-right-container"></i></a>
						<ul class="treeview-menu">
							<li><a href="<?=site_url()?>pages/team/"><i class="fa fa-user"></i><span>Team</span></a></li>
							<li><a href="<?=site_url()?>pages/team/AdvisoryboardList/"><i class="fa fa-user"></i><span>Advisory board Team</span></a></li>
						</ul>
					</li>
					<li><a href="#"><i class="fa fa-angle-right"></i><span>Sitemap</span></a></li>
					<li><a href="<?=site_url()?>pages/allcategorie"><i class="fa fa-angle-right"></i><span>All Categories</span></a></li>
					<li><a href="<?=site_url()?>helpcenter/admin"><i class="fa fa-angle-right"></i><span>Help Center</span></a></li>
					<li><a href="<?=site_url()?>pages/admin/requestforQuotation"><i class="fa fa-angle-right"></i><span>Request for Quotation</span></a></li>
					<li><a href="<?=site_url()?>pages/admin/SupplierMembershipList"><i class="fa fa-angle-right"></i><span>Supplier</span></a></li>
					<li><a href="<?=site_url()?>pages/admin/ServiceProvidersList"><i class="fa fa-angle-right"></i><span>Service Provider</span></a></li>
					<li><a href="<?=site_url()?>pages/faq"><i class="fa fa-angle-right"></i><span>FAQ</span></a></li>
			        <li><a href="<?=site_url()?>pages/admin/PaidForYourFeedbackList"><i class="fa fa-angle-right"></i><span>Paid Feedback List</span></a></li>
					 <li><a href="<?=site_url()?>pages/admin/ReportAbuseList"><i class="fa fa-angle-right"></i><span>Report Abuse</span></a></li>
					 <li><a href="<?=site_url()?>/contact_us/admin/contactUs"><i class="fa fa-angle-right"></i><span>Contact Us</span></a></li>
					 <li><a href="<?=site_url()?>/subscribe/admin/subscribe"><i class="fa fa-angle-right"></i><span>Subscribe Us</span></a></li>
				</ul>
			</li>			
		 
			
		</ul>
	</section>
    <!-- /.sidebar -->
</aside>
