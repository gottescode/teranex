
 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Get Paid FeedBack List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Get Paid FeedBack List </a></li>			
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
												<th>name</th>
												<th>email</th>
												<th>age</th> 
												<th>phone</th> 
												<th>country</th>  
												<th>city</th> 
												<th>Action</th>
												<!-- <th>how_long</th>   
												<th>interested_category</th>
												<th>usage_mobile_app</th>
												<th>feature_service</th>
												<th>main_purpose</th>
												<th>how_many_employees</th>
												<th>shop_at_teranex</th>
												<th>role_in_company</th>
												<th>business_spend_in_purchasing</th>
												<th>annual_revenue</th>
												<th>paying_supplier</th>
												<th>publish_date</th> -->
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
										foreach($PaidForYourFeedbackList as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td><?=$row['name'];?></td>
												<td><?=$row['email'];?></td>
												<td><?=$row['age'];?></td>
												<td><?=$row['phone'];?></td>
												<td><?=$row['city'];?></td>
												<!-- <td><?=$row['how_long'];?></td>
												<td><?=$row['interested_category'];?></td>
												<td><?=$row['usage_mobile_app'];?></td>
												<td><?=$row['feature_service'];?></td>
												<td><?=$row['main_purpose'];?></td>
												<td><?=$row['how_many_employees'];?></td>
												<td><?=$row['shop_at_teranex'];?></td>
												<td><?=$row['role_in_company'];?></td>
												<td><?=$row['business_spend_in_purchasing'];?></td>
												<td><?=$row['annual_revenue'];?></td>
												<td><?=$row['paying_supplier'];?></td>
												<td><?=$row['publish_date'];?></td> -->
												<td><a href="<?=site_url()."pages/admin/PaidForYourFeedbackSingleDetails/".$row['tpf_id']?>"class="btn btn-info btn-xs" role="button">View More</a></td>
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
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 