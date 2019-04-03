

 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">

  <!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">

    <!-- Content Header (Page header) -->

		<section class="content-header">

		  <span style="font-size: 24px;padding: 10px;">Sales Query</span>

		  <ol class="breadcrumb">

			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>

			<li class=""><a href="#">Sales Query List </a></li>

			

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

												<th>Reports</th> 

												<th>Name</th> 

												<th>Email</th> 

												<th>Job Title</th>

												<th>Comapany</th>

												<th>Speak Analyst Date</th>

												<th>Speak Analyst Time</th>

												<th>Contact No</th>  

												<th>Requirment</th>  

											</tr>

										</thead>

										<tbody>

										<?php 

										$i=1;

											foreach($salesQuery as $row){ ?>

											<tr>

												<td><?=$i++;?></td> 

												<td><?=$row['case_study_name'];?></td>

												<td><?=$row['name'];?></td>

												<td><?=$row['email'];?></td>

												<td><?=$row['job_title'];?></td>

												<td><?=$row['company'];?></td>

												<td><?=$row['speak_analyst_date'];?></td>

												<td><?=$row['speak_analyst_time'];?></td>

												<td><?=$row['contact_no'];?></td>

												<td><?=$row['requirement'];?></td> 

											</tr>

											<?php } ?>

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
"order": [[ 0, "desc" ]]
	});	

	}); 

	</script>

<?php $this->template->contentEnd();	?> 