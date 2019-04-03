<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Collective Buying Admin RFQ</span>
  
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
				<div class="padd-15">
					<a href="<?php echo site_url()."groupbuying/admin/rfq"?>" class="btn btn-info">Create RFQ</a>
				</div>
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Product Category</th>
										<th>Brand</th>  
										<th>Model</th>  
										<th>Product Specification</th>  
										<th>Expected Yearly Forecast </th>
										<th>No. of Customers</th> 
										<th>Action</th> 
									</tr>
								</thead>
								<tbody>
								<?php if($machineRaqList){ $i=1;
									foreach($machineRaqList as $rowBuy){?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$rowBuy['category_name']?></td>
										<td><?=$rowBuy['brand_name']?></td>
										<td><?=$rowBuy['model_name']?></td>
										<td><?=$rowBuy['product_specification']?></td>
										<td><?=$rowBuy['expyearlyforecast']?></td>
										<td><?=$rowBuy['no_of_custumer']?></td>
										<td><a href="<?php echo site_url()."groupbuying/admin/supplierList/$rowBuy[gar_id]"?>" class="btn btn-primary">Assign Supplier</a></td>
										<td><a href="<?php echo site_url()."groupbuying/admin/groupbuying_req_suppliers/$rowBuy[gar_id]"?>" class="btn btn-primary">Suppliers Quotation</a></td>
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
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 