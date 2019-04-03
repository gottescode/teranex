<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Admin RFQ List</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Admin RFQ</li>
	
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
				<div class="padd-15">
				</div>
					<form id="" name="" action= "<?php echo site_url()."groupbuying/serviceparts/createAdminRfq"; ?>"class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Title</th>
										<th>Name</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php if($rfqList){ $i=1;
							
									foreach($rfqList as $row){?>
									<tr>
										<td><?=$i++?></td>
										<td><?php echo $row['title']; ?></td>
										<td><?php echo $row['service_parts_name']; ?></td>
										<td>
											<a href ="<?php echo site_url()."groupbuying/serviceparts/singleRfqDetails/".$row['id']; ?>" class="btn btn-xs btn-success">Details</a>
											<a href ="<?php echo site_url()."groupbuying/serviceparts/quotationList/".$row['id']; ?>" class="btn btn-xs btn-success">Quotation</a>
										</td>
									</tr>
								<?php }}?>
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
		    "order": [[ 0, "desc" ]]
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 