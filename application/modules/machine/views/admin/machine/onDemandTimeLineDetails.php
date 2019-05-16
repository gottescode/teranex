 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">OnDemand Manufacturing Request List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=site_url()."machine/admin/onDemandManufacturingRfq"?>"><i class="fa fa-dashboard"></i> OnDemand Rfq</a></li>
			<li><a href="#"><i class="fa fa-dashboard"></i> OnDemand Timeline Details</a></li>
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
						 
								<div class="table-responsive">
											<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Quote Needed by</th> 
												<th>Work Will Be Awarded by</th> 
												<th>Part needed by</th>
												<th>Quote Quantity</th>  
												<th>Invite Suppliers I Know</th>  
												<th>Delivery Needed by</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
$row = $manufacturingRequestData;
//											foreach($manufacturingRequestData as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p>Preferred Date: <?=$row['quote_needed_preferred_date'];?></p>
													<p>Currency: <?=$row['currency'];?></p>
												</td>
												<td><p>Preferred Date: <?=$row['work_awarded_by_preferred_date'];?></p></td>
												<td><p>Preferred Date: <?=$row['part_needed_date'];?></p></td>
												<td><?=$row['quote_quantity'];?></td>
												<td><?=$row['invite_suppliers'];?></td>
												<td><p>Paid By: <?=$row['paid_by'];?></p>
												<p>Delivery Address: <?=$row['delivery_address'];?></p></td>
											</tr>
											<?// } ?>
										</tbody>
									</table>  
							
								</div>
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