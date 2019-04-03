 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>Supplier Type</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."settings/suppliertype"?>">Supplier Type</a></li>
			
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="padd-15">
						<a href="<?=site_url()."settings/suppliertype/create/"?>" ><button  name="create"   class="btn btn-info"> Create</button></a></div>
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
						
						<div class="clearfix"></div><br/>
						<div class="box-body"> 
							<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="supplier_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Name</th>   
												<th>Publish</th>  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($supplier_list >0){ $i=1;
												foreach($supplier_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['name']?></td> 
													<td><input type="checkbox" name="publish_<?=$rowData['id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  
													<td><a href="<?=site_url()."settings/suppliertype/update/".$rowData['id']?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."settings/suppliertype/deleteSupplierType/".$rowData['id']?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											<input  type="hidden" name="id[]" value="<?php echo $rowData["id"]; ?>">
													</td> 
												</tr>
											
											<?php }
											
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
											 
											</tbody>
											<tr><td colspan='4'><input type="submit" name="btnSubmit" class="btn btn-primary pull-right" value="Update"></td></tr>
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
		$("#supplier_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 