<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Collective Buying</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Request List</li>
	
  </ol>
</section>
	 <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				
				<div class="box-body"> 
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Product Category</th>
										<th>Brand</th>  
										<th>Model</th>  
										<th>Avg. Monthly Consumption</th>  
										<th>Avg. Quarterly Consumption</th>
										<th>Expected Monthly Forecast</th>
										<th>Current Buying Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php if($buyingList){ $i=1;
									foreach($buyingList as $rowBuy){?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$rowBuy['category_name']?></td>
										<td><?=$rowBuy['brand_name']?></td>
										<td><?=$rowBuy['model_name']?></td>
										<td><?=$rowBuy['monthly_consum']?></td>
										<td><?=$rowBuy['quartly_consum']?></td>
										<td><?=$rowBuy['monthly_forcast']?></td>
										<td><?=$rowBuy['buying_price']?></td>
										<td><a href="<?php echo site_url()."groupbuying/admin/sendQuotationCustomer/".$rowBuy['gcr_id']?>" class="btn btn-xs btn-primary">Send Quotation</a></td>
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