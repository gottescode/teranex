
<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Rapid Prototyping Suppliers List</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class=""><a href="">Request List</a></li>
	
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
				<div class="box-body">
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Supplier Name</th>
										<th>Supplier Email</th>  
										<th>Request Date Time</th>  
										<th>Status</th> 
										<th>Action</th>
									</tr>
								</thead>
							    <tbody>
								
								<?php 
									if($requestList >0)
										{ 
											$i=1;
										foreach($requestList  as $rowData) {
								?>

											<tr>
											<td><?=$i++?></td>
											<td><?=$rowData['u_name']?></td> 
											<td><?=$rowData['u_email']?></td>
											<td><?=$rowData['qoutation_date']?></td>  
											<td>
											<?php if($rowData['request_status'] == 'A'){ ?>Processing<?php }
										      elseif($rowData['request_status'] == 'R') { ?>Reject<?php }
											  elseif($rowData['request_status'] == 'H') { ?>On Hold<?php } 
											  elseif($rowData['request_status'] == 'R') { ?>Rejected<?php }
											  elseif($rowData['request_status'] == 'P') { ?>Processing<?php }  
											  elseif($rowData['request_status'] == 'QS') { ?>Quote Submitted<?php }
											  elseif($rowData['request_status'] == 'QG') { ?>Processing<?php } 
											  elseif($rowData['request_status'] == 'D') { ?>Processing  <?php } 
											  elseif($rowData['request_status'] == 'C') { ?>Completed  <?php } 
											  else { ?>Requested<?php } ?>	
											</td> 
									        <td><a href="<?php echo site_url()."rapidprototyping/admin/viewRapidprototypingSupplierQoute/$rowData[drrs_id]"?>" class="btn btn-primary btn-xs">View Quotation</a></td>
											</tr>
									<?php }

											echo "";

									} else{

										echo "<tr><td colspan='4'>Record not found</td></tr>";

									} ?>

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
		$("#product_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 