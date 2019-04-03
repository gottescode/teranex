 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Service Agreement Requests</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."consultant/admin/service_agreement_request"?>">Service Agreement Request</a></li>
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
												<th>User Name</th>  
												<th>Service Type</th>  
												<th>Company Name</th>  
												<th>Machine Model No. </th>  
												<th>Problem Note</th>  
												<th>Request Date</th>  
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
													<td><?=$rowData['u_name']?></td>
													<td><?=$rowData['service_type']?></td>
													<td><?=$rowData['company_name']?></td>
													<td><?=$rowData['machine_model_no']?></td>
													<td><?=$rowData['problem_note']?></td>
													<td><?
													$phpdate = strtotime($rowData['request_date_time']);
													echo $mysqldate = date( 'd-m-Y H:i:s', $phpdate );
													?></td>
													<td>
														<a href="<?php echo site_url()."consultant/admin/request_to_consultant/".$rowData['rar_id']; ?>" class="btn btn-success btn-xs">Request To Consultant</a>
													</td>
												</tr>
											<?php }
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
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