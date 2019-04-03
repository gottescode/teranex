 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Application Support Requests</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."consultant/admin/application_support_requests"?>">Application Support Request</a></li>
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
												<th>Cust. Name</th>  
												<th>Machine ID</th>  
												<th>Machine Status</th>  
												<th>Application Type</th> 
												<th>Problem Note</th> 
												<th>Requested Date</th>  
												<th>Service Engg. Name</th>
												<th>Status</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
																					<?php 
											if($service_request_list >0){ $i=1;
												foreach($service_request_list  as $rowData){
												?>
												<tr>
												
												
												
																									<td><?=$i++?></td>
													<td><?=$rowData['u_name'];  ?></td>
													<td><? 
														echo $rowData['machine_unique_id'];
														echo "<br><b>Category:</b> ".$rowData['category_name'];
														echo "<br><b>Brand:</b> ".$rowData['brand_name'];
														echo "<br><b>Model:</b> ".$rowData['model_name'];
													?></td>
													<td><? if($rowData['machine_status']==='O'){ echo "On-Demand"; }elseif($rowData['machine_status']==='S'){ echo "Service Agreement"; }else{ echo "Warrenty"; } ?></td>
													<td><?=$rowData['application_type']?></td>
													<td><?=$rowData['error_description']?></td>
																										<td><?
													$phpdate = strtotime($rowData['created_on']);
													echo $mysqldate = date( 'd-m-Y H:i:s', $phpdate );
													?></td>

													<td><? 
															if($rowData['engg_name']){
														echo $rowData['engg_name'];
														?>
														<a href="<?php echo site_url()."consultant/admin/meeting_list_application/".$rowData['id']; ?>" class="btn btn-success btn-xs">Meetings</a>
													<?
															}else{
													?>
													-			
													<?
															}
													
													?>
													</td>
													<td><?
													if($rowData['status']==='R'){ echo "Requested"; }elseif($rowData['status']==='W'){ echo "Processing"; }elseif($rowData['status']==='D'){ echo "Delivered"; }else{ echo "Closed"; }
													?>
														<a href="<? echo site_url()."consultant/admin/technical_update_status/".$rowData['id']."/".$tech_req_id?>" class="btn btn-xs btn-success">Update Status</a>	
													</td>
													<td>
													<?php if($rowData['machine_status']==='S'||$rowData['machine_status']==='W'){
														?>
														
														<a href="<?php echo site_url()."consultant/admin/request_to_service_aggrement/".$rowData['id']; ?>" class="btn btn-success btn-xs">Request To Service Engg.</a>
													<?
														}else{
															
													?>
														<a href="<?php echo site_url()."consultant/admin/request_to_engg/".$rowData['id']; ?>" class="btn btn-success btn-xs">Request To Engineer</a>
															
													<?
														}
													?>
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