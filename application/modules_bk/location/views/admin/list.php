 <?php 
  $this->page_title = "Banner"; 
  $this->breadcrumbs = array(
      "Banner" => site_url()."banner/admin", 
    ); 
 ?>
 

 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <!-- Content Wrapper. Contains page content -->
 
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
					<?php	// display messages
					if(hasFlash("ErrorMsg"))	{	?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("ErrorMsg"); ?>
						</div>
					<?php	}		// display messages
					if(hasFlash("dataMsgSuccess"))	{	?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("dataMsgSuccess"); ?>
						</div>
					<?php	}	?>
						<div class="box-body">
						<a href="<?=site_url()."banner/admin/create"?>"class="btn btn-success" > Create </a>
						 			<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="banner_listtable">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Image</th>  
												<th>Display Order </th>  
												<th>Publish</th>  
												<th>Action</th>
											</tr>
										</thead>
										<?php   
											if($result['result']>0){ $i=1;
												foreach($result['result'] as $rowData){  
												if($rowData['banner_image']){
													$image=site_url()."uploads/banner/".$rowData['banner_image'];
													$imageresize= "uploads/banner/".$rowData['banner_image'];
												}
												?>
												<tbody>
												<tr>
													<td><?=$i++?></td>
													<td><img src=<?=$image?>  <?php echo imageresize($imageresize,200,100);?>></td> 
													<td> <input type="text" size="5" name="order_<?php echo $rowData["id"]; ?>" value="<?php echo $rowData["display_order"]; ?>">
													 </td> 
													<td><input type="checkbox" name="publish_<?=$rowData['id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  
													<td><a href="<?=site_url()."banner/admin/update/".$rowData['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are you sure delete this entry?')"  href="<?=site_url()."banner/admin/delete/".$rowData['id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													</td> 
												</tr>
											<input  type="hidden" name="id[]" value="<?php echo $rowData["id"]; ?>">
											
											<?php }
											
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
											</tbody>
											<tr>
												<td  colspan="3">
													<input type="submit" name="btnSubmit" id="updateBtnStyle1" class="btn btn-primary pull-right" value="Update">
												</td>
											</tr>
									</table> 
									<br>
									<center>
									<br><br><br>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>			
		</section> 
	 	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript">
	$(document).ready(function() {
		$("#example1").DataTable({
	});	
	} );
	</script>
<?php $this->template->contentEnd();	?> 