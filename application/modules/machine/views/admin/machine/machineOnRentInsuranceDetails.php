 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine On-Rent Insurance Details</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine On-Rent Insurance Details</a></li>
			
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
											<th>Insurance Type </th>
											<th>Name</th>
											<th>Business Name</th>
											<th>Business Address</th>
											<th>City</th>
											<th>PinCode</th>
											<th>Email-ID</th>
											<th>Phone Number</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$i=1;
										foreach($machineInsurance as $row){ ?>
										<tr>
											<td><?=$i++;?></td> 
											<td><?=$row['insurance_type'];?></td> 
											<td><?=$row['first_name']." ".$row['last_name'];?></td> 
											<td><?=$row['business_name'];?></td> 
											<td><?=$row['business_address'];?></td> 
											<td><?=$row['city'];?></td> 
											<td><?=$row['pincode'];?></td> 
											<td><?=$row['email_id'];?></td> 
											<td><?=$row['phone_no'];?></td>									
										</tr>
										<? } ?>
									</tbody>
								</table>  
							</div>
							<h3> Machine Cover Details</h3>
							<div class="table-responsive">
								<table class="table table-bordered table-striped" id="community_table">
									<thead>
										<tr>
											<th>Sr.No.</th>
											<th>Machine </th>
											<th>Quantity </th>
											<th>Cover End</th>
											<th>Cover Start</th>
											<th>Cover Amount</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$i=1;
										foreach($machineDetailsInsurance as $row){ ?>
										<tr>
											<td><?=$i++;?></td> 
											<td><?=$row['name'];?></td> 
											<td><?=$row['qty'];?></td> 
											<td><?=$row['cover_start_date'];?></td> 
											<td><?=$row['cover_end_date'];?></td> 
											<td><?=$row['cover_amount'];?></td> 
										</tr>
										<? } ?>
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