 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine On-Rent Finance Request List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine On-Rent Finance Request List </a></li>
			
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
												<th>Finance Type </th>
												<th>Personal KYC</th>
												<th>Business eKYC</th>
												<th>Company Document</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($machineFinance as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td><?=$row['finance_type'];?></td> 
												<td>
												<p>	<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['personal_adhar_card']?>" target="_blank">Aadhar Card</a>
												</p>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['personal_pan_card']?>" target="_blank">PAN Card</a>
												</p>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['personal_address_proof']?>" target="_blank">Address</a>
												</p>
												</td>
												<td>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['business_pan_card']?>" target="_blank">PAN Card</a>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['business_address_proof']?>"target="_blank">Business Address</a>
												</p>
												</td>
												<td>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['company_bank_statement']?>" target="_blank">Bank Statement</a>
												<p>	<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['company_balance_sheet']?>" target="_blank">Balance Sheet</a>
													</p><a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['company_invoice_sheet']?>" target="_blank">Invoice</a>
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