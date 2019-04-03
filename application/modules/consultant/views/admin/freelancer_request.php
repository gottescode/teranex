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
								<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC">
							<th>Sr.No.</th>
							<th>Customer Name</th>  
							<th>Freelancer Name</th>  
							<th>Service Type</th>  
							<th>M/C ID</th>  
							<th>M/C Category</th>  
							<th>M/C Brand</th>  
							<th>M/C Model No</th>  
							<th>Problem Note</th>  
							<th>Request Date</th>   
							<th>Status</th>   
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
							<?php 
							
							if($consultReqList >0){ $i=1;
								foreach($consultReqList  as $rowData){
								
								
								?>
								<tr>
									<td><?=$i?></td>
									<td><?=$rowData['username']?></td>   
									<td><?=$rowData['ufree']?></td>   
									<td><? if($rowData['freelance_type']=='M'){	echo "Machine Service"; }else{ echo "Application Service";	}?></td>   
									<td><?=$rowData['machine_unique_id']?></td>  
									<td><?=$rowData['category_name']?></td>   
									<td><?=$rowData['brand_name']?></td>   
									<td><?=$rowData['model_name']?></td>  
									<td><?=$rowData['error_description']?></td>  
									<td><?
										echo $phpMySqlDate = $rowData['created_on'];	
										?>
									</td>  
									<td><?php if($rowData['status']=='R'){
										echo "Requested";
									}elseif($rowData['status']=='W'){
										echo "Waiting";
									}elseif($rowData['status']=='D'){
										echo "Delivered";
									}elseif($rowData['status']=='C'){
										echo "Closed";
									}?>
									</td>  
									<td>   
									<?php if($rowData['freelance_type']=='M'){
									?>
									
									<a href="<?=site_url()."customer/scheduleCourseFreelancer/".$rowData['id'];?>" class="btn btn-xs btn-primary">TokBox Meeting</a>
									<?	
										}else{
									?>	
									<a href="<?=site_url()."customer/scheduleListFreelancerRequest/".$rowData['id'];?>" class="btn btn-xs btn-primary">Zoom Meeting</a>
									
									<?	} ?>
									</td> 
								</tr>
							
							<?php $i++; }
								echo "";
							}else{
								echo "<tr><td colspan='8'>Record not found</td></tr>";
							}?>
					</tbody>
				</table>
		 
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