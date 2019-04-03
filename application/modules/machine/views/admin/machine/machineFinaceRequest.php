 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine Finance Request List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine Finance Request List </a></li>
			
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
												<th>Machine</th> 
												<th>Company Name</th> 
												<th>Brand</th> 
												<th>Model</th> 
												<th>Contact Person</th> 
												<th>Phone No.</th> 
												<th>Email Id</th>  
												<th>Enquiry Dates</th>
												<th>Request Status</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($machineFinace as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<!--<td><?=$row['model_no'].", ".$row['brand_name'];?>--></td>
												<td><?=$row['category_name'];?></td>
												<td><?=$row['brand_name'];?></td>
												<td><?=$row['model_name'];?></td>
												<td><?=$row['company_name'];?></td>
												<td><?=$row['contact_person'];?></td>
												<td><?=$row['phone_no'];?></td>
												<td><?=$row['email_id'];?></td>
												<td><?=$row['enquiry_date'];?></td> 
												<td><?php if($row['request_status'] == 'A'){ ?>Accepted<?php }
						      elseif($row['request_status'] == 'R') { ?>Rejected<?php }
							  elseif($row['request_status'] == 'H') { ?>On Hold<?php } 
							  elseif($row['request_status'] == 'R') { ?>Rejected<?php }
							  elseif($row['request_status'] == 'P') { ?>Processing<?php }  
							  elseif($row['request_status'] == 'QS'){ ?>Quote Submitted<?php }
							  elseif($row['request_status'] == 'QG') { ?>Quote Genrated<?php } 
							  elseif($row['request_status'] == 'D') { ?>Delivered  <?php } 
							  elseif($row['request_status'] == 'C') { ?>Completed  <?php } 
							  else { ?>Requested<?php } ?>	</td>
											</tr>
											<? } ?>
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
		$("#community_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 