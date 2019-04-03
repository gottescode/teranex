 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Machine Comment List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Machine Comment List</a></li>
			
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box"> 
						 
						<div class="box-body">  
							<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr bgcolor="#CCCCCC"><td>S.No</td><td> Machine Name</td><td>Message</td><td>Enquiry Date</td> <td>Action</td></tr>
										</thead>
										<tbody>
										<?php if($machineContactRequest){ $i=1;
												foreach($machineContactRequest as $requestMachine){?>
														<tr>
															<td><?php echo $i++;?></td>
															<td><?php echo $requestMachine['model_no'].", ".$requestMachine['brand_name'];?></td> 
															<td><?php echo $requestMachine['message'];?></td>
															<td><?php echo $requestMachine['enquiry_date'];?></td> 
															<td> <a href="<?php echo site_url()."machine/admin/machinecomment/".$requestMachine['mc_id']."/".formaturl($requestMachine['model_no'])."/".formaturl($requestMachine['brand_name']);?>" >Comment</a></td>
														</tr>
											<?php }}?>
											 
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