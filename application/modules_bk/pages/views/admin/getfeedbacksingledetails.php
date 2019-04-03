
 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Get Paid FeedBack Details</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Get Paid Feedback Details </a></li>			
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
											<tr>
											<th>Name</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['name']; ?></td>
										    </tr>
										    <tr>
											<th>Email</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['email']; ?></td>
										    </tr>
										    <tr>
											<th>Age</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['age']; ?></td>
										    </tr>
										    <tr>
											<th>Phone</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['phone']; ?></td>
										    </tr>
										    <tr>
											<th>Country</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['country']; ?></td>
										    </tr>
										    <tr>
											<th>City</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['city']; ?></td>
										    </tr>
										    <tr>
											<th>How Long Have You Been Using TERANEX</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['how_long']; ?></td>
										    </tr>
										    <tr>
											<th>Interested In Sourcing At TERANEX</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['interested_category']; ?></td>
										    </tr>
										    <tr>
											<th>How Long Have You Been Using TERANEX</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['how_long_using_teranex']; ?></td>
										    </tr>
										    <tr>
											<th>How Often Did You Use TERANEX Mobile App</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['usage_mobile_app']; ?></td>
										    </tr>
										    <tr>
											<th>Features Or Services On TERANEX Used Before</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['feature_service']; ?></td>
										    </tr>
										    <tr>
											<th>MAIN Purpose Of Using TERANEX</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['main_purpose']; ?></td>
										    </tr>
										    <tr>
											<th>BEST Describes Your Business</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['describes_business']; ?></td>
										    </tr>
										    <tr>
											<th>How Many Employeess</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['how_many_employees']; ?></td>
										    </tr>
										     <tr>
											<th>Looking To Shop At TERANEX</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['shop_at_teranex']; ?></td>
										    </tr>
										    <tr>
											<th>Role In The Company</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['role_in_company']; ?></td>
										    </tr>
										     <tr>
											<th>Business Spend In Purchasing In Last 12 Months</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['business_spend_in_purchasing']; ?></td>
										    </tr>
										     <tr>
											<th>The Annual Revenue Of Your Business Last Year</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['annual_revenue']; ?></td>
										    </tr>
										     <tr>
											<th>name</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['paying_supplier']; ?></td>
										    </tr>
										    <tr>
											<th>Company Ever Made A Purchase On TERANEX</th>
											<td><?php echo $PaidForYourFeedbackSingleDetails['publish_date']; ?></td>
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
		$("#community_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 