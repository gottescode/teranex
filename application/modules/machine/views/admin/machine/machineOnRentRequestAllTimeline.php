 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine On-Rent TimeLine</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine On-Rent TimeLine </a></li>
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
												<th>Quote Needed by</th> 
												<th>Set-Up Form</th> 
												<th>Weekdays Form</th> 
												<th>Shift Form </th> 
												<th>Work Will Be Awarded By</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;$row = $machineOnRentRequestList;
											?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p>Preferred Date: <?=$row['quote_needed_pref_date']?></p>
													<p>Currency: <?=$row['currency']?></p>
												</td>
												<td>
													<p>Preferred Date: <?=$row['set_up_form_pref_date']?></p>
													<p>To: <?=$row['set_up_to_date']?></p>
												</td>
												<td>
													<p>Preferred Date: <?=$row['weekdays_pref_date_from']?></p>
													<p>To: <?=$row['weekdays_pref_date_to']?></p>
												</td>
												<td>
													<p>Preferred Date: <?=$row['shift_from']?></p>
													<p>To: <?=$row['shift_to']?></p>
												</td>
												<td>
													<p><?=$row['work_awarded_date']?></p>
												</td>
											</tr>
											
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
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 