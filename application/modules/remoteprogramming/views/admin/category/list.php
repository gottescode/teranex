 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">

  <!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">

    <!-- Content Header (Page header) -->

		<section class="content-header">

		  <span style="font-size: 24px;padding: 10px;">Remote Programming Category</span>

		  

		  <ol class="breadcrumb">

			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>

			<li class=""><a href="<?=site_url()."remoteprogramming/admin/createCategory"?>">Remote Programming Category</a></li>

			

		  </ol>

		</section>

	 <!-- Main content -->

		<section class="content">

			<div class="row">

				<div class="col-xs-12">

					<div class="box">

						<div class="padd-15"><a href="<?=site_url()."remoteprogramming/admin/createCategory"?>" class="btn btn-info" role="button">Add Remote Programming  Category</a></div>

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

												<th>Image</th> 

												<th>Name</th>

												<th>Description</th>    

												<th>Publish</th>  

												<th>Action</th>

											</tr>

										</thead>

										<tbody>

										<?php 

											if($category_list >0){ $i=1;

												foreach($category_list  as $rowData){

												?>

												<tr>

													<td><?=$i++?></td>

													<td><?php if($rowData['cat_image']){?> 

							<img class="img-responsive event-img" src="<?=site_url().'uploads/remoteprogramming_images/'.$rowData['cat_image']?>" height="72" width="72">

							  <?php }?></td>

													<td><?=$rowData['cat_name']?></td> 

													<td><?=$rowData['cat_description']?></td> 



													<td><input type="checkbox" name="publish_<?=$rowData['cat_id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  

													<td><a href="<?=site_url()."remoteprogramming/admin/updateCategory/".$rowData['cat_id']?>" aria-haspopup="true" title="Edit"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;

														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."remoteprogramming/admin/deleteCategory/".$rowData['cat_id']?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp; &nbsp;

														<!-- <a href="<?=site_url()."remoteprogramming/admin/remoteprogrammingCategory/".$rowData['cat_id']?>"<i style="" class="fa fa-plus-square"></i></a> -->

														<input  type="hidden" name="cat_id[]" value="<?php echo $rowData["cat_id"]; ?>"> 

													</td> 



												</tr>

											

											<?php }

												echo "";

											}else{

												echo "<tr><td colspan='6'>Record not found</td></tr>";

											}?>

											 

											</tbody>

											<tr>

												<td colspan="6"><input  type='submit' class="btn btn-primary pull-right" name='btnSubmit' value='Update'></td></tr>

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