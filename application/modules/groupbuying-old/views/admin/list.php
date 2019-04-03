<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Collective Buying</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Product List</li>
	
  </ol>
</section>
	 <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="padd-15"><a href="<?=site_url()."groupbuying/admin/create"?>" class="btn btn-info" role="button">Add Product</a></div>
				<div class="box-body"> 
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Category</th>  
										<th>Name</th>  
										<th>Brand</th>  
										<th>Model</th>  
										<th>Manufacturing Year</th>
										<th>Supplier Product Code</th>
										<th>Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
								<?php if($prodcuctList){ $k=1;
									foreach($prodcuctList as $rowProduct){?>
										<tr>
											<td><?php echo $k++;?></td>
											<td><?php echo $rowProduct['category_name'];?></td>
											<td><?php echo $rowProduct['prod_name'];?></td>
											<td><?php echo $rowProduct['brand_name'];?></td>
											<td><?php echo $rowProduct['prod_model'];?></td>
											<td><?php echo $rowProduct['prod_manufacturing_year'];?></td>
											<td><?php echo $rowProduct['supplier_product_code'];?></td>
											<td><?php echo $rowProduct['product_price'];?></td> 
											  <td><a href="<?=site_url()."groupbuying/admin/productUpdate/".$rowProduct['gp_id']?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
												<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."groupbuying/admin/productDelete/".$rowProduct['gp_id']?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
														 
														 
													</td> 
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