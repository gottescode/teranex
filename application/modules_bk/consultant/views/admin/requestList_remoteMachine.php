 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">

  <!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">

    <!-- Content Header (Page header) -->

		<section class="content-header">

		  <span style="font-size: 24px;padding: 10px;">Remote Machine Service Requests</span>

		  <ol class="breadcrumb">

			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>

			<li><a href="#">Remote Machine Service Requests</a></li>

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

							<form id="req_cons" name="req_cons" class="form-horizontal" enctype="multipart/form-data" method="post">

								<div class="">

						

									<table class="table table-bordered table-striped" id="datatable">

										<thead>

											<tr>

												<th>Sr.No.</th>

												<th>Company Name</th>  

												<!--<th>Topic</th> --> 

												<th>Customer Name</th>  

												<th>Consultant Name</th>  

												<th>Request On</th>  

												<th>STATUS</th>  

												<th>Invoice</th> 

												<th>Action</th>												

											</tr>

										</thead>

										<tbody>

										<?php 

											if($req_machine_consultantList >0){ $i=1;

												foreach($req_machine_consultantList  as $rowData){

												?>

												<tr>

													<td><?=$i++?></td>

													<td><?=$rowData['company_name']?></td>

													<!--<td><?=$rowData['topic_discussion']?></td>-->

													<td><?=$rowData['user_Name']?></td>

													<td><?=$rowData['consultant_name']?></td>

													<td><?=$rowData['request_date_time']?></td>

													<td>

													<?if($rowData['isAccepted']=='H'){ echo "HOLD"; }elseif($rowData['isAccepted']=='A'){ echo "ACCEPTED"; }else{ echo "REJECTED"; }?>

													</td>

													<td>

													<?php if($rowData['invoiceByConsultant']=='Y'&&$rowData['final_invoice']=='N'){ ?>

														<a href="<?php echo site_url().'consultant/admin/remoteMachineInvoiceRequest/'.$rowData['rmr_id'] ?>" class="btn btn-success btn-xs">Invoice</a>

													<?php } ?>

													<?php if($rowData['final_invoice']=='Y'){ ?>

													<a href="<?php echo site_url().'consultant/admin/remoteMachineInvoiceRequestfinal/'.$rowData['rmr_id'] ?>" class="btn btn-info btn-xs">Invoice</a>

													<?php } ?>

													

													</td>

													<td>

														<?php if($rowData['isAccepted']!='A'){?>

															<a href="<?php echo site_url()."consultant/admin/request_on_demand_consultant/".$rowData['rmr_id']; ?>" class="btn btn-success btn-xs">Request To Consultant</a>

														<?php }?>

													</td>

												</tr>

											<?php }

											}else{

												echo "<tr><td colspan='9'>Record not found</td></tr>";

											} ?>

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

		$("#datatable").DataTable({

	});	

	}); 

	</script>

<?php $this->template->contentEnd(); ?> 