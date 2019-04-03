 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css"> 
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>Project Category</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."settings/pojectcategory"?>">Project Category</a></li>
			
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
						<a href="<?=site_url()."settings/pojectcategory/create/"?>" ><button  name="create"   class="btn btn-primary pull-right"> Create</button></a>
						<div class="clearfix"></div><br/>
						<div class="box-body"> 
							<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="comapny_table">
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
											if($pojectcategory_list >0){ $i=1;
												foreach($pojectcategory_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['name']?></td> 
													<td><input type="checkbox" name="publish_<?=$rowData['id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  
													<td><a href="<?=site_url()."settings/pojectcategory/update/".$rowData['id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."settings/pojectcategory/deleteCategory/".$rowData['id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
													<input  type="hidden" name="id[]" value="<?php echo $rowData["id"]; ?>">
													</td> 
												</tr>
											
											<?php }
											
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
											</tbody>
											 <tr><td colspan='2'></td><td ><input type="submit" name="btnSubmit" class="btn btn-primary" value="Update"></td><td></td></tr>
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
		$("#comapny_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 