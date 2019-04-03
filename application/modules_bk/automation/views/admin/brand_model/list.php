 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Brand Model List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">Brand Model List</li>
			
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
							<div class="padd-15">
								<a href="<?php echo site_url()."automation/admin/create_brandModel"?>" class="btn btn-info">Create Brand</a>
							</div>
							
							<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="brand_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Name</th>  
												<th>Brand Name</th>  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($brandModelList >0){ $i=1;
												foreach($brandModelList['result'] as $row){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$row['model_name']?></td> 
													<td><?=$row['brand_name']?></td> 
													<td><a href="<?=site_url()."automation/admin/update_brandModel/".$row['ad_id']; ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
													&nbsp;&nbsp;<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."automation/admin/deleteAutomationBrandModel/".$row['ad_id']; ?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</td> 

														<input  type="hidden" name="id[]" value="<?php echo $row["ad_id"];?>">
												</tr>
											
											<?php }
												echo "";
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
											 
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
		$("#brand_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 