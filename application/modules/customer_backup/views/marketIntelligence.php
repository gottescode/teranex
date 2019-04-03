<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
	
	.profile-left h3 {
    margin-right: -20px;
    margin-left: -20px;
    margin-top: 0;
}
.company-details ul.nav li{
	width: 20%;
	text-align: center;
	border: 1px solid #ccc !important;
	margin: 0;
}
.company-details ul.nav li a, .nav-tabs>li>a:hover{
	color: #555 !important;
	border: none !important;
	margin:0 !important;
}
.company-details ul.nav-tabs {
    border-bottom: none !important;
}
.company-details ul.nav-tabs li:hover,  .company-details ul.nav-tabs li:focus, .company-details ul.nav-tabs li:active{
   /* border-bottom: none !important;*/
    background-color: #ccc !important;
    outline: none !important;
}
.company-details .nav-tabs>li.active>a, .company-details .nav-tabs>li.active>a:focus, .company-details .nav-tabs>li.active>a:hover, .company-details .nav-tabs>li.active>a:hover, .company-details .nav-tabs>li>a, .company-details .nav-tabs>li>a:focus, .company-details .nav-tabs>li>a:hover, .company-details .nav-tabs>li>a:hover,{
background-color: #ccc !important;
border-radius: 0px !important;
outline: none !important;
border-color: #ccc !important;
}
.company-details .nav-tabs>li.active a{
	background: #ccc !important;
	border-radius: 0 !important;
}
</style> 
<?php echo $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Market Intelligence</li>
      </ul>
    </div>
    <div class="col-sm-8 padd-0">
	  	<ul>
	    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
	  	</ul>
	</div>
  </div>
  <!-- /.container --> 
</div>
<div class="welcome-j-bg">
  	<div class="container">
	    <!-- <div class="col-sm-8 col-lg-10 padd-0">
	      <ul>
	        <li class="">Welcome <? echo ucwords($_SESSION['u_name']);?></li>
	      </ul>
	    </div>
	    <div class="col-sm-4 col-lg-2 padd-0">
	      <ul>
	        <li class=""><a href="<?php echo site_url();?>">Go To My Stelmac </a> |</li>
	        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
	      </ul>
	    </div> -->
  	</div>
</div>
<!-- /.welcome-j-bg -->
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 padd-0">  
		<div class="bg_white">
			<div class="col-sm-12">
				<div class="company-details">
					<ul class="nav nav-tabs ">
					  	<li class="active"><a data-toggle="tab" href="#menu0">Reports </a></li>
					  	<li><a data-toggle="tab" href="#menu1">Monitoring </a></li>
					  	<li><a data-toggle="tab" href="#menu2">Events </a></li>
					</ul>
					<div class="tab-content">
					  	<div id="menu0" class="tab-pane fade in active">
						    <div class="col-sm-12 ">
						    
							 	<table id='' class="table table-striped table-hover">
									<thead>
										<tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Report name </td><td> License type </td> <td>Cost </td><td>Status </td><!-- <td>Action</td> --></tr>
									</thead>
									<tbody>	
										<?php if($report_purchase_list >0){ $i=1; foreach($report_purchase_list  as $rowData){ ?>
										<tr>
											<td><?php echo $i++;?></td>
											<td><?=$rowData['purchase_date']?></td> 
											<td><?=$rowData['report_name']?></td>
											<td><?=$rowData['licence_type']?></td> 
											<td><?=$rowData['licence_amount']?></td> 
											<td><?=$rowData['payment_status']?></td> 
											<!-- <td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
										</tr>
									<?php }} ?>
									</tbody>
								</table>
								<!-- <div class="clearfix"></div><br/>
								<h3>Superuser</h3> -->
							 	<!-- <table id='' class="table table-striped table-hover">
									<thead>
										<tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Report name </td><td> License type </td> <td>Cost </td><td>Status </td><td>Action</td></tr>
									</thead>
									<tbody>
										<?php if($market_monitoring_list >0){ $i=1; foreach($market_monitoring_list  as $rowData){ ?>
										<tr>
											<td><?php echo $i++;?></td>
											<td><?=$rowData['purchase_date']?></td> 
										    <td><?=$rowData['subscription_name']?></td> 
											<td><?=$rowData['subscription_type']?></td> 
											<td><?=$rowData['subscription_amount']?></td> 
											<td><?=$rowData['payment_status']?></td> 
											<td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
										</tr>
										<?php }} ?>
									</tbody>
								</table> -->
								<div class="clearfix"></div><br/>
							</div>
					  	</div>
					  	<div id="menu1" class="tab-pane fade">
						    <div class="col-sm-12 border_bot">
				        	
							 	<table id='' class="table table-striped table-hover">
									<thead>
										<tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Subscription Name</td><td>Duration </td><td> Expires on  </td> <td>Cost </td><td>Status </td><!-- <td>Action</td> --></tr>
									</thead>
									<tbody>
										<?php if($market_monitoring_list >0){ $i=1; foreach($market_monitoring_list  as $rowData){ ?>
										<tr>
											<td><?php echo $i++;?></td>
											<td><?=$rowData['purchase_date']?></td> 
										    <td><?=$rowData['subscription_name']?></td> 
										    <td></td> 
											<td></td> 
											<td><?=$rowData['subscription_amount']?></td> 
											<td><?=$rowData['payment_status']?></td> 
											<!-- <td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
										</tr>
										<?php }} ?>
									</tbody>
								</table>
								<!-- <div class="clearfix"></div><br/>
								<h3>Superuser</h3>
							 	<table id='' class="table table-striped table-hover">
									<thead>
										<tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Customer Name</td><td>Subscription Name</td><td>Duration </td><td> Expires on  </td> <td>Cost </td><td>Status </td><td>Action</td></tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $i++;?></td>
											<td></td> 
											<td></td>
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td> 
											<td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
										</tr>
									</tbody>
								</table> -->
				        	</div><div class="clearfix"></div><br/>
					  	</div>
					  	<div id="menu2" class="tab-pane fade">
						    <div class="col-sm-12 border_bot">
				        
							 	<table id='' class="table table-striped table-hover">
									<thead> 
										<tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Event name </td><td>Level</td><td> Event date</td><td>Start time</td> <td>End time </td><td>Price </td><td>Status </td><!-- <td>Action</td> --></tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $i++;?></td>
											<td></td> 
											<td></td>
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td>
											<!-- <td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td> -->
										</tr>
									</tbody>
								</table>
								<div class="clearfix"></div><br/>
								<!-- <h3>Superuser</h3>
							 	<table id='' class="table table-striped table-hover">
									<thead> 
										<tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Event name </td><td>Customer name</td><td>Level</td><td> Event date</td><td>Start time</td> <td>End time </td><td>Price </td><td>Status </td><td>Action</td></tr>
									</thead>
									<tbody>
										<tr>
											<td><?php echo $i++;?></td>
											<td></td> 
											<td></td>
											<td></td>
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td> 
											<td></td>
											<td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
										</tr>
									</tbody>
								</table> -->
				        	</div><div class="clearfix"></div><br/>
					  	</div>
					  	<div class="clearfix"></div><br/>
					</div>
				</div>
			</div><div class="clearfix"></div><br/>
		</div><div class="clearfix"></div>
	</div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php echo $this->template->contentEnd();	?> 


  