 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Remote Machine Invoice By Consultant</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="">Remote Machine Invoice By Consultant</a></li>
			
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
									<table class="table table-bordered table-striped" id="consultant_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Name</th>  
												<th>Mobile No</th>  
												<th>Publish</th>  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($invoiceList >0){ $i=1;
												foreach($invoiceList  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['c_email']?></td>
													<td><?=$rowData['c_mobileno']?></td>
													<td><input type="checkbox" name="publish_<?=$rowData['consultant_id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  
													<td><a href="<?=site_url()."consultant/admin/update/".$rowData['consultant_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."consultant/admin/delete/".$rowData['consultant_id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
														<a href="<?=site_url()."consultant/admin/create"?>"<i style="font-size:18px;margin-left: 10px;" class="fa">&#xf0fe;</i></a>
													<input  type="hidden" name="id[]" value="<?php echo $rowData["consultant_id"]; ?>">
									
													</td> 

												</tr>
											
											<?php }
											
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
		$("#consultant_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 