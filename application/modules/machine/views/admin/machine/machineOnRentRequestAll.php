 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine On-Rent Request List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine On-Rent Request List</a></li>
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
												<th>Customer</th> 
												<th>Agreement</th> 
												<th>Finance</th> 
												<th>Insurance</th> 
												<th>TimeLine</th> 
												<th>Enquiry Date</th>
												<th>Quote</th> 
												<th>Status</th> 
												<th>Action</th>
												<!-- 
												<th>Supplier Quote</th>
												--> 
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($machineOnRentRequestList as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td><?=$row['customer_name'];?></td>
												<td>
														<?  if($row['is_competition']==='Y'){	?>
															<a target="_blank" href="<?=site_url()."uploads/on_rent_documents/".$row['competition_file'];?>" class="btn btn-xs btn-primary">Competition Doc</a>
														<?	}else{ ?>
															
														<?	} ?>
														
														<?	if($row['is_nda']==='Y'){	?>
															<a target="_blank" href="<?=site_url()."uploads/on_rent_documents/".$row['nda_file'];?>" class="btn btn-xs btn-primary">NDA Doc</a>
															
														<?	}else{ ?>
															
														<?	}	?>
												</td>
												<td>
														<?	if($row['is_finance']){ ?>
															<a target="_blank" href="<?=site_url()."machine/admin/machineOnRentFinanceDetails/".$row['id'];?>" class="btn btn-xs btn-primary">Finance Details</a>
															
														<?	}else{ ?>
															
														<?	}	?>
														
												</td>
												<td>
												<?
															if($row['is_insurance']){ ?>
															<a target="_blank" href="<?=site_url()."machine/admin/insuranceDetailsOnRent/".$row['id'];?>" class="btn btn-xs btn-primary">Insurance Details</a>
															
														<?	}else{	?>
														
														<?	} ?>

												</td>
												<td>
													<a target="_blank" href="<?=site_url()."machine/admin/timeLineDetailsOnRent/".$row['id'];?>" class="btn btn-xs btn-primary">TimeLine Details</a>
												</td> 
												<td><?=$row['created_date'];?></td> 
												<td>
													<?  if($row['quote']){	?>
														<a target="_blank" href="<?=site_url()."uploads/on_rent_documents/".$row['quote'];?>" class="btn btn-xs btn-primary">View Quote</a>
													<?	}else{ ?>
														-
													<?	} ?>
												</td>
											
												<td><?php 
														if($row['status'] == 'CA'){ ?>Accepted<?php }
														elseif($row['status'] == 'CR') { ?>Rejected<?php }
														elseif($row['status'] == 'H') { ?>Requested<?php } 
														elseif($row['status'] == 'QS'){ ?>Quote Submitted<?php }
													?>	
												</td>
												<td>
													<a target="_blank" href="<?php echo site_url()."machine/admin/sendQuoteToCustomer/".$row['id']?>" class="btn btn-xs btn-primary"> Send Quote </a>
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