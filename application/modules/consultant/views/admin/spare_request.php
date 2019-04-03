 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Spare Part Requests</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."consultant/admin/spare_part_requests"?>">Spare Part Request List</a></li>
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
							<?php 	// display messages
								if(hasFlash("dataMsgSuccess"))	{	?>
									<div class="alert alert-success alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <?php echo getFlash("dataMsgSuccess"); ?>
									</div>
						<?php	}	?>
							<?php 	// display messages
								if(hasFlash("dataMsgError"))	{	?>
									<div class="alert alert-warning alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <?php echo getFlash("dataMsgError"); ?>
									</div>
						<?php	}	?>
						 
						<div class="box-body"> 
							<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
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
													
														<a href="<?=site_url()."consultant/admin/updateOrderDetails/".$rowData['id'];?>" class="btn btn-xs btn-primary">Process Order</a>
												<br>		<a href="<?=site_url()."consultant/admin/spareReqDetails/".$rowData['id'];?>" class="btn btn-xs btn-primary">More Details</a>
										
													</td>
												</tr>
											<?php }
											}?>

										</tbody>
									</table>  
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</section> 
	</div>
	
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
		$("#consultant_table").DataTable({
			'pageLength':50
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 