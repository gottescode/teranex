 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>Machine On-Demand Manufacturing Category Data</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."settings/machineondemandmanudata/infrastructureType"?>">Machine On-Demand Manufacturing Category Data</a></li>
			
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="padd-15"><a href="<?=site_url()."settings/machineondemandmanudata/createmachineOnRentCatData/".$cat_id?>" ><button  name="create"   class="btn btn-info"> Create</button></a></div>
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
									<table class="table table-bordered table-striped" id="user_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Category</th>   
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($material_list >0){ $i=1;
												foreach($material_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['title']?></td>   
													<td>
														<a href="<?=site_url()."settings/machineondemandmanudata/updatemachineOnRentCatData/".$rowData['id']?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."settings/machineondemandmanudata/deletemachineOnRentCatData/".$rowData['id']?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
														<a href="<?=site_url()."settings/machineondemandmanudata/machineOnRentCatDataSub/".$rowData['id']?>" class="btn btn-xs btn-primary">Add Sub Data</a>&nbsp; &nbsp;
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
		$("#user_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 