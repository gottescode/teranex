 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine RFQ List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine Machine RFQ List</a></li>
			
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
												<th>Customer</th> 
												<th>Supplier</th> 
												<th>Quote Needed by</th> 
												<th>Delivery Needed by</th> 
												<th>Mode Of Payment</th> 
												<th>Enquiry Date</th>
												<th>RFQ Status</th> 
												<th>Supplier Quote</th> 
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($machineRfqAll as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p><b>Machine ID:</b> <?php echo $row['machine_unique_id']?></p>
													<p><b>Brand: </b><?php echo $row['brand_name']?></p>
													<p><b>Model: </b><?php echo $row['model_name']?></p>
												</td>
												<td><?=$row['customer_name'];?></td>
												<td><?=$row['supplier_name'];?></td>
												<td>
													<p><b>Preferred Date: </b><?=date_dmy($row['preferred_date']);?></p>
													<p><b>Currency	: </b><?=$row['currency'];?></p>
												</td> 
												<td>
													<p><b>Preferred Date: </b><?=date_dmy($row['delivery_preferred_date']);?></p>
													<p><b>Paid By	: </b><?=$row['paid_by'];?></p>
													<?php if($row['delivery_address']!=''){ ?>
													<p><b>Delivery Address	: </b><?=$row['delivery_address'];?></p>
													<?	} ?>
												</td> 
												<td>
													<p><b>Advance Payment: </b><?=$row['mode_of_advance_payment'];?></p>
													<p><b>Remaining Payment: </b><?=$row['remaining_payment'];?></p>
												</td> 
												<td><?=$row['created_date'];?></td> 
												<td><?php 
														if($row['status'] == 'CA'){ ?>Accepted<?php }
														elseif($row['status'] == 'CR') { ?>Rejected<?php }
														elseif($row['status'] == 'H') { ?>Requested<?php } 
														elseif($row['status'] == 'QS'){ ?>Quote Submitted<?php }
													?>	
												</td>
												<td>
													<?php if($row['supplier_quote']){
														?>
														
													<a target="_blank" href="<?php echo site_url()."uploads/".$row['supplier_quote']?>" class="btn btn-xs btn-primary"> Quote </a>
													<?
														}
													?>
												</td> 
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