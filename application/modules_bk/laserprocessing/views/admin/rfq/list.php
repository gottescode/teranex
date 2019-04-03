 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Laser Processing Request List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."laserprocessing/admin/RequestList"?>">Laser Processing Request List </a></li>
			
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
												<th>Customer Name</th> 
												<th>Part Name </th> 
												<th>Request On</th> 
												<!-- <th>Customer Status</th>  -->
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($requestList['result'] as $row){ ?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$row['uname']; ?></td>
												<td><?=$row['part_name']; ?></td>
												<td><?=$row['requested_date']; ?></td>
												<!-- <td><? if($row['supplier_id']!=0) {
													echo "Accepted";
												}else{
													echo "On Hold";
												}?></td> -->
												<td>
												<?php// if($row['supplier_id']==0) {?>
													<a href="<?=site_url()."laserprocessing/admin/request_to_supplier/".$row['dmr_id']; ?>" class="btn btn-success btn-xs">Assign Supplier</a>
												<?php //}?> <a href="<?php echo site_url()."laserprocessing/admin/laserprocessing_req_suppliers/$row[dmr_id]"?>" class="btn btn-primary btn-xs">Suppliers Quotation</a></td>
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