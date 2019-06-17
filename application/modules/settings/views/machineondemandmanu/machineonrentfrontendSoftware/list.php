 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine On Demand Manufacturing Software</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine On Demand Manufacturing Software</a></li>
			
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
								<a href="<?php echo site_url()."settings/machineondemandmanudata/createfrontEndDataSoftware"?>" class="btn btn-info">Create Software</a></br>
							</div>	
						<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Title</th> 
												<th>Image</th> 
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($data as $row){ ?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$row['title'];?></td>
												<td><img src="<?=site_url().'uploads/machine_on_demand_manu_frontend_images/'.$row['image']?>" width="100px"></td>
												<td>
													<a href="<?=site_url()."settings/machineondemandmanudata/updatefrontEndDataSoftware/".$row['id']; ?>" ><i class="fa fa-pencil" aria-hidden="true"></i></a>
													&nbsp;
													<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."settings/machineondemandmanudata/deleteFrontSoftware/".$row['id']; ?>" ><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												</td> 
											</tr>
											<? } ?>
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
		$("#community_table").DataTable({
			'pageLength':50
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 