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
			<li><a href="<?=site_url()?>consultant/admin/service_agreement_request"><i class="fa fa-list-ul"></i> <span>Service Agreement Request</span></a></li>
			<li class="cust1"><a href="<?=site_url()?>consultant/admin/requestListMachineConsultant"><i class="fa fa-list-ul"></i> <span> Remote Machine On-demand Service Request </span></a></li>
			<li><a href="<?=site_url()?>remoteprogramming/admin/"><i class="fa fa-list-ul"></i> <span> Remote Programming Service </span></a></li>
			<li class="cust1"><a href="<?=site_url()?>remoteapplication/admin/"><i class="fa fa-list-ul"></i> <span> Remote Application Consultant Service </span></a></li>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Machine </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>machine/admin/"><i class="fa fa-user"></i><span>Machine Category </span></a></li>					
					<li><a href="<?=site_url()?>machine/admin/machine_brand"><i class="fa fa-user"></i><span>Machine Brand</span></a></li>					
					<li><a href="<?=site_url()?>machine/admin/machine_brand_model"><i class="fa fa-user"></i><span>Machine Brand Model</span></a></li>					
					<li><a href="<?=site_url()?>machine/admin/machineList"><i class="fa fa-user"></i><span>Machine List</span></a></li>
					<li><a href="<?=site_url()?>machine/admin/machineFinaceRequest"><i class="fa fa-user"></i><span>Machine Finiace Request </span></a></li>
					<li><a href="<?=site_url()?>machine/admin/machineFinaceComment"><i class="fa fa-user"></i><span>Machine Comment Request </span></a></li>
					<li><a href="<?=site_url()?>machine/admin/machineRequest"><i class="fa fa-user"></i><span>Machine Enquiry</span></a></li>
					<li><a href="<?=site_url()?>machine/admin/videoRequests"><i class="fa fa-user"></i><span>Machine Video Request</span></a></li>
					<li><a href="<?=site_url()?>machine/admin/machineSoftwareList"><i class="fa fa-user"></i><span>Machine Software List</span></a></li>
				</ul>
			</li>
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Collective buying </span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>groupbuying/admin"><i class="fa fa-user"></i><span>Product List</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/admin/collective_buying_req_list"><i class="fa fa-user"></i><span>Collective buying request</span></a></li>
					<li><a href="<?=site_url()?>groupbuying/admin/rfqList"><i class="fa fa-user"></i><span>RFQ List</span></a></li>
				</ul>
			</li>
			<li><a href="<?=site_url()?>supplier/admin"><i class="fa fa-list-ul"></i> <span>Supplier List</span></a></li>
			<li><a href="<?=site_url()?>customer/admin"><i class="fa fa-list-ul"></i><span>Customer List</span></a></li>
			<li><a href="<?=site_url()?>community/admin"><i class="fa fa-list-ul"></i></i> <span>Community List</span></a></li>
			<li><a href="#"><i class="fa fa-picture-o"></i> <span>RFQ's</span></a></li>
			<li><a href="<?=site_url()?>pages/admin/contactList"><i class="fa fa-phone" aria-hidden="true"></i> <span>Forum</span></a></li> 
			<li><a href="<?=site_url()?>events/admin/index"><i class="fa fa-calendar"></i> <span>Event </span></a></li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Research</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>research/admin/index"><i class="fa fa-user"></i><span>Research List</span></a></li>
					<li><a href="<?=site_url()?>research/admin/researchReportSample"><i class="fa fa-user"></i><span>Research Report Sample</span></a></li>
					<li><a href="<?=site_url()?>research/admin/inquiryBeforeBuying"><i class="fa fa-user"></i><span>Inquiry Before Buying</span></a></li>
					<li><a href="<?=site_url()?>research/admin/analystQuery"><i class="fa fa-user"></i><span>Analyst Query</span></a></li>
					<li><a href="<?=site_url()?>research/admin/salesQuery"><i class="fa fa-user"></i><span>Sales Query</span></a></li>
					<li><a href="<?=site_url()?>research/admin/salesPurchaseList"><i class="fa fa-user"></i><span>Research Purchase List</span></a></li>
					
				</ul>
			</li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Analytics</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>analytics/admin/index"><i class="fa fa-user"></i><span>Analytics List</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/analyticsRequestCall"><i class="fa fa-user"></i><span>Analytics Request Call</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/analyticsSpeakConsultant"><i class="fa fa-user"></i><span>Speak To Consultant</span></a></li>
					<li><a href="<?=site_url()?>analytics/admin/webinar"><i class="fa fa-user"></i><span>Webinar</span></a></li>
				</ul>
			</li> 
			<li class="treeview"><a href="#"><i class="fa fa-list-ul"></i> <span>Consulting</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>consulting/admin/index"><i class="fa fa-user"></i><span>Consulting List</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/consultingRequestCall"><i class="fa fa-user"></i><span>Consulting Request Call</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/consultingSpeakConsultant"><i class="fa fa-user"></i><span>Speak To Consultant</span></a></li>
					<li><a href="<?=site_url()?>consulting/admin/webinar"><i class="fa fa-user"></i><span>Webinar</span></a></li>
				</ul>
			</li> 
			<li  class="treeview"><a href="#"><i class="fa fa-gear" aria-hidden="true"></i> <span>Settings</span><i class="fa fa-chevron-left pull-right-container"></i></a>
				<ul class="treeview-menu">
					<li><a href="<?=site_url()?>settings/suppliertype/"><i class="fa fa-user"></i><span>Supplier Type</span></a></li>
					<li><a href="<?=site_url()?>machine/admin/index"><i class="fa fa-user"></i><span>Machine Category</span></a></li>
					<li><a href="<?=site_url()?>settings/companytype/"><i class="fa fa-building"></i><span>Company Type</span></a></li>
					<li><a href="<?=site_url()?>pages/admin/contactList"><i class="fa fa-user"></i><span>Admin Role</span></a></li>
					<li><a href="<?=site_url()?>settings/materialtype"><i class="fa fa-users"></i><span>Material Type</span></a></li>
					<li><a href="<?=site_url()?>settings/language"><i class="fa fa-users"></i><span>Language</span></a></li>
					<li><a href="<?=site_url()?>settings/applicationrequired"><i class="fa fa-users"></i><span>Application(s) Required</span></a></li>
					<li><a href="<?=site_url()?>settings/programmertype"><i class="fa fa-users"></i><span>Programmer Type</span></a></li>
					<li><a href="<?=site_url()?>settings/consultancytype"><i class="fa fa-users"></i><span>Consultancy Type</span></a></li>
					<li><a href="<?=site_url()?>settings/usertype"><i class="fa fa-users"></i><span>User Type</span></a></li>
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
			
		</ul>
	</section>
    <!-- /.sidebar -->
</aside>
 