<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Subscribed User List</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="">Subscribed User List</a></li>
			
		  </ol>
		  
		  	<?php 	// display messages
			if(hasFlash("dataMsgSuccess"))	{	?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgSuccess"); ?>
			</div>
			<? } ?>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
					 	<div class="col-sm-12">
					
			
							<div class="table-responsive">
								<table class="table table-bordered table-striped" id="subscribe">
									<thead>
										<tr>
											<th>Sr.No.</th>
											<th>Email</th>  
											<th>Status</th>
											<th>Action</th>  
										</tr>
									</thead>
									<tbody>
										<?php $i=1;
										foreach($subscribeList['result'] as $rowData) { 
										?>
											<tr>
												<td><?=$i++?></td> 
												<td><?echo $rowData['email_id'];?></td> 
												<td><?php if($rowData['status']=='A'){ echo "Active"; }else if($rowData['status']=='R'){ echo "Inactive";	}else{ echo "Hold"; }?></td>
												<td>
												<?php if($rowData['status']=='H'){
													?>
													<a href="<?php echo site_url()."subscribe/admin/approve/".$rowData['id'];?>" class="btn btn-success btn-xs">Active</a>
													<a href="<?php echo site_url()."subscribe/admin/inactive/".$rowData['id'];?>" class="btn btn-danger btn-xs">Inactive</a>
												<? }else{ ?>
													
													<?php if($rowData['status']=='A'){ 
												?>
												<a href="<?php echo site_url()."subscribe/admin/inactive/".$rowData['id'];?>" class="btn btn-danger btn-xs">Deactive</a>
												<?
											    }else if($rowData['status']=='R'){ ?>
												<a href="<?php echo site_url()."subscribe/admin/approve/".$rowData['id'];?>" class="btn btn-success btn-xs">Active</a>
												<? }else{ ?>
												
													<a href="<?php echo site_url()."subscribe/admin/inactive/".$rowData['id'];?>" class="btn btn-danger btn-xs">Deactive</a>
												<? }?>
													
												<? } ?>
												
													
												</td>
											</tr>
										<? } ?>
									</tbody>
								</table> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</section> 
</div>
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
	//DataTable
	$(document).ready(function() {
			$("#subscribe").DataTable({ });
	});
</script>
<?php $this->template->contentEnd();	?> 