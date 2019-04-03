 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Remote Application Video Request List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Remote application Request List </a></li>
			
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
										<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<!--<th>Machine Name</th>  -->
												<th>User Name</th>  												
												<th>Requirement</th>  												
												<th>Action</th>
											</tr>
										</thead>
							 			<tbody>
										<?php 
											if($videoRequestList >0){ $i=1;
												foreach($videoRequestList['result'] as $row){
												?>
												<tr>
													<td><?=$i++?></td>
													<!--<td><?=$row['brand_name']." ".$row['model_no']; ?></td>-->
													<td><?=$row['username']; ?></td>
													<td>
													<?php 
														if($row['video_chat']=='C'){
															echo "Consultant";
														}elseif($row['video_chat']=='B'){
															echo " Book a live demo or machine inspection ";
														}else{
															echo " Hire a third party consultant ";
														}
													?>
													</td>
													<td>
													<?php if($row['supplier_id']==0){
													?>
													<a href="<?php echo site_url()."remoteapplication/admin/assignSupplier/".$row['ravr_id']; ?>" class="btn btn-xs btn-success "> Assign Supplier</a></td>
													<?
														}else{
													?>	
														Assigned
													<?
														}
													?>
												</tr>
											<?php }
												echo "";
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
			$("#community_table").DataTable({ });	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 
