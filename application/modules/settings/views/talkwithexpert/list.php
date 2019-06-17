 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>Talkwithexpert Request List List</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."settings/Talkwithexpert Request List"?>">Talkwithexpert Request List List</a></li>
			
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="padd-15">
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
						
									<table class="table table-bordered table-striped" id="Talkwithexpert">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Email</th>    
												<th>Name</th>    
												<th>Job Title</th>    
												<th>Company Name</th>    
												<th>People Qty.</th>    
												<th>Technology Intrest</th>    
												<th>Technology Intrest Duration</th>    
												<th>Project Decription</th>    
												<th>Email Notification</th>    
												<th>3D hub</th>    
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($data >0){ $i=1;
												foreach($data  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['customer_email']?></td> 
													<td><?=$rowData['f_name']." ".$rowData['l_name']?></td> 
													<td><?=$rowData['job_title']?></td> 
													<td><?=$rowData['company_name']?></td> 
													<td><?=$rowData['people_quantity']?></td> 
													<td><?=$rowData['technology_intrest']?></td> 
													<td><?=$rowData['technology_interest_duration']?></td> 
													<td><?=$rowData['project_description']?></td> 
													<td><? if($rowData['is_rcv_email']){ echo "On";	}else{	echo "Off"; }?></td> 
													<td><? if($rowData['is_agree_3d_hub']){ echo "Registered"; } ?></td> 
													<td><? echo $rowData['created_on']; ?></td> 
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
		$("#Talkwithexpert").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 