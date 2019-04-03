 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Remote Machine Enquiry Requests</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active"><a href="">Request To Supplier</a></li>
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
						
									<table class="table table-bordered table-striped" id="">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Supplier Name</th>  
												<th>Email</th>  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											if($supplier_user_list >0){ $i=1;
												foreach($supplier_user_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['u_name']?></td>
													<td><?=$rowData['u_email']?></td>
													<td>
													<a class="btn btn-primary btn-xs assignSupplier" onclick=""  href="javascript:void(0)" name="assignSupplier" mvr_id ="<? echo $mvr_id; ?>"id="<?php echo $rowData['uid'];?>" >Assign Supplier</a>
													</td>
												</tr>	
										<?php }
											}else{
												echo "<tr><td colspan='4'>Record not found</td></tr>";
											}?>
										</tbody>
										<tr>
												<td  colspan=6>
													<input type="submit" name="btnSubmit" id="updateBtnStyle1" class="btn btn-primary pull-right" value="Update">
												</td>
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
		$("#consultant_table").DataTable({
	});	
	}); 
	
	$(".assignSupplier").click(

		function (){
			var user_id = $(this).attr('id');
			var mvr_id = $(this).attr('mvr_id');
		$.ajax({
			url : site_url+'machine/api/assignSupplier',
			dataType : 'JSON',
			data : { user_id:user_id,mvr_id :mvr_id },
			method :  'GET',
			success: function(response){
				console.log(response);
				if(response.result==1){
					alert('Supplier Assigned Successfully..!!');
					window.location.replace("<?php echo site_url()?>machine/admin/videoRequests");
				}
			}
		})
		}
	);
	</script>
<?php $this->template->contentEnd();	?> 