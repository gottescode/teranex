 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Manufacturing Process List</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."additivemanufacturing/admin"?>">Manufacturing Process List</a></li>
			
		  </ol>
		</section>
		<?php //$amid= $this->uri->segment(4); ?>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="padd-15"><a href="<?=site_url()."additivemanufacturing/admin/createAdditiveManufacturingProcesses/"?>" class="btn btn-info" role="button">Add Process List</a></div>
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
												<th>Name</th> 
												<th>Manufacturing Process Description</th>
												<th>Manufacturing Process Image</th>    
												<th>Publish</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($additiveManufacturingProcesses_list >0){ $i=1;
												foreach($additiveManufacturingProcesses_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['additive_manufacturing_process_name']?></td> 
													<td>
										<?=strhtmldecode($rowData['additive_manufacturing_process_description'])?></td>
												    <td>
													<?php if($rowData['additive_manufacturing_process_image']){?>
														  <img src="<?=site_url().'/uploads/digitalmanufacturing/'.$rowData['additive_manufacturing_process_image']?>" width="100px">
														  <input type="hidden" id="old_image" name="old_image"  value="<?=$rowData['additive_manufacturing_process_image']?>">
													<?php }?></td>
													
													<td><input type="checkbox" name="publish_<?=$rowData['additive_manufacturing_process_id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>
													<td><a href="<?=site_url()."additivemanufacturing/admin/updateAdditiveManufacturingProcesses/".$rowData['additive_manufacturing_process_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."additivemanufacturing/admin/deleteAdditiveManufacturingProcesses/".$rowData['additive_manufacturing_process_id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
														 
														<input  type="hidden" name="additive_manufacturing_id[]" value="<?php echo $rowData["additive_manufacturing_process_id"]; ?>"> 
													</td> 

												</tr>
											
											<?php }
												echo "";
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
											 
											</tbody>
											<!-- <tr><td></td><td></td><td></td><td colspan="2"><center><input  type='submit' class="btn btn-primary" name='btnSubmit' value='Update'></center></td><td></td></tr> -->
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