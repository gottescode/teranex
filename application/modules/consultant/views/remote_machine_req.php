<div class="container">
	<div class="col-sm-offset-1 col-sm-10">
		<div class="">
			<?php 	 // display messages
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
		<table class="table table-bordered table-striped" id="datatable">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Company Name</th>  
												<th>Topic</th>  
												<th>Customer Name</th>  
												<th>Consultant Name</th>  
												<th>Request On</th>  
												<th>Status</th>  
												<th>Action</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
											if($requestListRemoteService >0){ $i=1;
												foreach($requestListRemoteService as $rowData){
										?>
											<tr>
												<td><?=$i++?></td>
												<td><?=$rowData['company_name']?></td>
												<td><?=$rowData['topic_discussion']?></td>
												<td><?=$rowData['user_Name']?></td>
												<td><?=$rowData['consultant_name']?></td>
												<td><?if($rowData['isAccepted']=='H'){ echo "HOLD"; }elseif($rowData['isAccepted']=='A'){ echo "ACCEPTED"; }else{ echo "REJECTED"; }?></td>
												<td><?=$rowData['request_date_time']?></td>
												<td>
													<a href="<?php echo site_url()."consultant/acceptRequestRemoteService/".$rowData['rmr_id']; ?> " class="btn btn-xs btn-success" onclick="return confirm('Do you want to accept this Request?');">Accept</a>
													<a href="<?php echo site_url()."consultant//rejectRequestRemoteService/".$rowData['rmr_id']; ?> " class="btn btn-xs btn-danger" onclick="return confirm('Do you want to Reject this Request?');">Reject</a>
												</td>
											</tr>
											<?php }
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											} ?>
										</tbody>
									</table>  
									</div>
					</div>
				</div>