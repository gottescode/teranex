 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">OnDemand Manufacturing RFQ List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
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
												<th>RFQ Status</th> 
												<th>NDA</th>
												<th>Finance</th>
												<th>TimeLine</th>
												<th>Supplier Quote</th> 
												<th>Enquiry Date</th>
												<th>Action</th> 
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($data as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p><b>Machine ID:</b> <?php echo $row['machine_unique_id']?></p>
													<p><b>Brand: </b><?php echo $row['brand_name']?></p>
													<p><b>Model: </b><?php echo $row['model_name']?></p>
												</td>
												<td><?=$row['customer_name'];?></td>
												<td><?=$row['supplier_name'];?></td>
												<td><?php 
														if($row['status'] == 'CA'){ ?>Accepted<?php }
														elseif($row['status'] == 'CR') { ?>Rejected<?php }
														elseif($row['status'] == 'H') { ?>Requested<?php } 
														elseif($row['status'] == 'QS'){ ?>Quote Submitted<?php }
													?>	
												</td>
												<td>
													<? if($row['nda']==='Y'){ ?>
													<a target="_blank" href="<?php echo site_url()."uploads/on_demand_manufacturing_nda/".$row['nda_file']?>" class="btn btn-xs btn-primary"> NDA </a>
													<?	}else{	?>
														-
													<?	}	?>
												</td> 
												<td> 
													<? if($row['finance_status']==='Y'){ ?>

													<a target="_blank" href="<?php echo site_url()."machine/admin/financeRequestForMaufacturing/".$row['id']?>" class="btn btn-xs btn-primary"> Finance Details</a>
													<?php } ?>
												</td> 
												<td>
													<a target="_blank" href="<?php echo site_url()."machine/admin/timeLineDetailsForMaufacturing/".$row['id']?>" class="btn btn-xs btn-primary"> TimeLine Details</a>
												</td> 
												<td>
													<?php if($row['supplier_quote']){
														?>
													<a target="_blank" href="<?php echo site_url()."uploads/supplier_quote_on_demand_manufacturing/".$row['supplier_quote']?>" class="btn btn-xs btn-primary"> Quote </a>
													<?
														}
													?>
												</td>
												<td><?=$row['created_date'];?></td> 
												<td>
													<a target="_blank" href="<?php echo site_url()."machine/admin/viewOnDemandManufacturingDetails/".$row['id']?>" class="btn btn-xs btn-primary"> RFQ Details</a>
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