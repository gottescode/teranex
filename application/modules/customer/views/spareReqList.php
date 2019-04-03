 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Spare Request List</li>
      </ul>
    </div>
    <div class="col-sm-6 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <!-- <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?>
	<div class="bg_white">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  
			<?php 	// display messages
			if(hasFlash("dataMsgServiceRequestError"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgServiceRequestError"); ?>
				</div>
			<?php }	if(hasFlash("dataMsgAddError"))	{	?>
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgAddError"); ?>
				</div>
			<?php }	?>
	 
					<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="consultant_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Customer Name</th>  
												<th>Machine ID</th>  
												<th>M/C Category</th>  
												<th>M/C Brand</th>  
												<th>M/C Model</th>  
												<th>Owner Of M/C</th>  
												<th>Request Type</th> 
												<th>Problem Note</th>  
												<th>Requested Date</th>  
												<th>Status</th>  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($service_request_list >0){ $i=1;
												foreach($service_request_list  as $rowData){
												$parent_id = $rowData['parent_id'];
												if($parent_id<>0){
													$url = site_url()."/consultant/api/findSingleUserGetInfo/$parent_id";
													$userName =  apiCall($url, "get");
													$userName = $userName['result']['u_name'];
													}else{
														
													$userName = "TERANEX";
													}
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['u_name']?></td>
													<td><?=$rowData['machine_unique_id']?></td>
													<td><?=$rowData['category_name']?></td>
													<td><?=$rowData['brand_name']?></td>
													<td><?=$rowData['model_name']?></td>
													<td> <?php echo $userName; ?></td>
													<td><?=$rowData['spare_type']?></td>
													<td><?=$rowData['error_description']?></td>
													<td><?
														$phpdate = strtotime($rowData['created_on']);
														echo $mysqldate = date( 'd-m-Y H:i:s', $phpdate );
													?></td>
													<td><? if($rowData['status']=='R'){echo "REQUESTED";}elseif($rowData['status']=='W'){echo "PROCESSING";}elseif($rowData['status']=='D'){ echo "DELIVERED";}elseif($rowData['status']=='C'){ echo "CLOSED";}?></td>
													<td>
													
														<a href="<?=site_url()."customer/updateOrderDetails/".$rowData['id'];?>" class="btn btn-xs btn-primary">Process Order</a>
												<br>		<a href="<?=site_url()."customer/spareReqDetails/".$rowData['id'];?>" class="btn btn-xs btn-primary">More Details</a>
										
													</td>
												</tr>
											<?php }
											}?>

										</tbody>
									</table>  
								</div>
							
		</div> <div class="clearfix"></div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 