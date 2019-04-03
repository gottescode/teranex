 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Event List</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."events/admin"?>">Event List</a></li>
			
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="padd-15"><a href="<?=site_url()."events/admin/createEvent/". $eid ?>" class="btn btn-info" role="button">Add Event List</a></div>
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
												<!--<th>Event Description</th>-->  
												<th>Level</th> 
												<th>Price</th> 
												<th>Event start date</th>  
												<th>Event start Time</th> 
												<th>Event End Time</th>   
												<th>Publish</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($event_list >0){ $i=1;
												foreach($event_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['event_name']?></td> 
													<!--<td><?=$rowData['event_description']?></td>-->
													<td><?=$rowData['event_level']?></td>
													<td><?=$rowData['event_price']?></td>
													<td><?=date_dmy($rowData['event_start_date'])?></td> 
													<td><?=$rowData['event_start_time']?></td>
													<td><?=$rowData['event_end_time']?></td>
													<!--<td>
													<?php if($rowData['event_image']){?>
														  <img src="<?=site_url().'/uploads/events/'.$rowData['event_image']?>" width="100px">
														  <input type="hidden" id="old_image" name="old_image"  value="<?=$rowData['event_image']?>">
													<?php }?></td>  -->
													
													<td><input type="checkbox" name="publish_<?=$rowData['event_id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>
													<td><a href="<?=site_url()."events/admin/updateEvent/".$rowData['event_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."events/admin/deleteEvent/$eid/".$rowData['event_id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
														 
														<input  type="hidden" name="event_id[]" value="<?php echo $rowData["event_id"]; ?>"> 
													</td> 

												</tr>
											
											<?php }
												echo "";
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
											 
											</tbody>
											<tr><td></td><td></td><td></td><td colspan="2"><center><input  type='submit' class="btn btn-primary" name='btnSubmit' value='Update'></center></td><td></td></tr>
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