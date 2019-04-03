 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Active Users</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."community/admin"?>">Active Users</a></li>
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
							<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Name</th>  
												<th>Email</th>  
												<th>Assign Moderator</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
											if($userList >0){ $i=1;
												foreach($userList  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData->u_name;?></td>
													<td><?=$rowData->community_invite_email;?></td>

													<td><input type="radio" name="publish_<?=$rowData->active_status;?>" value="<?=$rowData->uid;?>" onClick="moderatorAssign('<?=$rowData->uid;?>');"></td>
														</tr>
											
											<?php }
											
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
		$("#community_table").DataTable({
			'pageLength':50
	});	
	}); 
	function moderatorAssign(uid){
		var communiteeID = '<?php echo $community_id ?>';
		
		$.ajax({
		  type: "GET",
		  url: site_url+"/community/api/moderatorAssign/"+communiteeID+"/"+uid,
		  data: {},
			success: function(result){ 
				$('#state_id').empty();
				 if(result){ 					
						var state_list=result.result; 
						 alert('success');
					}
				else if(result.error){
					alert('error');
				} 
			}
			
		});
	}
	</script>
	
<?php $this->template->contentEnd();	?> 