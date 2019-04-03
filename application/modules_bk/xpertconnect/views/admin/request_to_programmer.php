 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Remote Application Consultant Requests</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li><a href="<?=site_url()."remoteapplication/admin/"?>"><i class="fa fa-dashboard"></i> Remote Application Consultant List</a></li> 
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
							<form id="req_cons" name="req_cons" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="">
						
									<table class="table table-bordered table-striped" id="">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Programmer Name</th>  
												<th>Email</th>  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($programmer_user_list >0){ $i=1;
												foreach($programmer_user_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['u_name']?></td>
													<td><?=$rowData['u_email']?></td>
													<td><input type="checkbox" name="publish_<?=$rowData['uid']?>" value="Y" ></td>
												</tr>
												<input type="hidden" name="id[]" value="<?php echo $rowData["uid"]; ?>">
												<input type="hidden" name="rpr_id" value="<?php echo $rpr_id; ?>">
											<?php }
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
										</tbody>
											<tr>
												<td  colspan=4>
													<input type="submit" name="btnSubmit" id="updateBtnStyle1" class="btn btn-primary pull-right" value="Assign to Consultant">
												</td>
											</tr>
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