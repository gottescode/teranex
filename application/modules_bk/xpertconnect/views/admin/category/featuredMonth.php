 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Xpert Connect Category</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."xpertconnect/admin/xpertconnectCategory"?>">Xpert Connect Category</a></li>
			
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
							<form class="form-horizontal" role="form" action="" id="category_form" method="post" enctype="multipart/form-data">
								<fieldset>
									<div class="form-group">
										<label class="control-label col-sm-3" for="">Name:<span class="star">*</span></label>
										<div class="col-sm-3">
											<select class="form-control " name="programmer_id" id="programmer_id">
												<?php 
													$url = site_url()."xpertconnect/api/findFeaturedListProgrammer/1";
													$assigned_details =  apiCall($url, "get");
													foreach($programmerList as $row){
													?>
														<option value="<?php echo $row['uid']; ?>" <?php if($row['uid']==$assigned_details['result']['programmer_id']){ echo "selected"; }?>>
															<?php echo $row['u_name'];?>
														</option>
													<?	
													}
												 ?>
											</select>
										</div>
									</div> 
									<div class="form-group">
										<label class="control-label col-sm-3" for="xpertconnect_cat_description">Description:<span class="star">*</span></label>
										<div class="col-sm-6">
											<textarea   name="description" id="description" class="form-control required" rows="6" ><?=$assigned_details['result']['description']; ?></textarea>
										</div>
									</div>
									<div class="form-group"> 
										<div class="col-sm-8 text-center">
											<input type="submit" name="btnSubmit" value="Update" class="btn btn-primary">
										</div>
									</div>
								</fieldset>
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