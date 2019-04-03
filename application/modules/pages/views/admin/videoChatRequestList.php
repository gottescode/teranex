
 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Request for Quotation List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Request for Quotation List </a></li>			
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
												<th>Video Request For</th> 
												<th>Customer Name</th> 
												<th>Requested Date</th>
												<th>Status</th>  
												<th>Action</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
										foreach($VideoChatRequestList as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td><?=$row['videochat_request_for'];?></td>
												<td><?=$row['u_name'];?></td>
												<td><?=$row['requested_date'];?></td>
												<td>
													<?php if($row['status'] == 'A'){ ?>Processing<?php }
													  elseif($row['status'] == 'R') { ?>Reject<?php }
													  elseif($row['status'] == 'RQ') { ?>Requested<?php }
													  elseif($row['status'] == 'H') { ?>On Hold<?php } 
													  elseif($row['status'] == 'R') { ?>Rejected<?php }
													  elseif($row['status'] == 'P') { ?>Processing<?php }  
													  elseif($row['status'] == 'QS') { ?>Quote Submitted<?php }
													  elseif($row['status'] == 'QG') { ?>Processing<?php } 
													  elseif($row['status'] == 'D') { ?>Processing  <?php } 
													  elseif($rowData['status'] == 'C') { ?>Completed  <?php }  ?>
												</td>
												<td>
													<?php if($row['status'] == 'A'){ ?>Processing<?php }
													  elseif($row['status'] == 'R') { ?>Reject<?php }
													  elseif($row['status'] == 'RQ') { ?><a href="<?php echo site_url()."pages/admin/scheduleVideoChatMeeting/".$row['vcr_id']."/".$row['customer_id']?>" class="btn btn-xs btn-primary">Schedule Meeting</a><?php }
													  elseif($row['status'] == 'H') { ?>On Hold<?php } 
													  elseif($row['status'] == 'R') { ?>Rejected<?php }
													  elseif($row['status'] == 'P') { ?>Processing<?php }  
													  elseif($row['status'] == 'QS') { ?><a href="<?php echo $row['start_url']; ?>" class="btn btn-xs btn-success">Launch Meeting</a><?php }
													  elseif($row['status'] == 'QG') { ?>Processing<?php } 
													  elseif($row['status'] == 'D') { ?>Processing  <?php } 
													  elseif($rowData['status'] == 'C') { ?>Completed  <?php }  ?>
												</td>
											</tr>
											<?php } ?>
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