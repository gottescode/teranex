 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">All Users</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class="active">All Users</li>
			
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<!-- <div class="padd-15"><a href="<?=site_url()."supplier/admin/create"?>" class="btn btn-info" role="button">Add All User</a></div> -->
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
						
									<table class="table table-bordered table-striped" id="supplier_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Company</th>  
												<th>User Type</th>
												<th>User Role</th>
												<th>Name</th>
												<th>Email</th>     
												<th>Mobile No</th>
												<th>Active status</th>
												<th>Access Hours</th>
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
											//if($alluser_list >0){ $i=1;
										//print_r($alluser_list);exit;
												foreach($alluser_list  as $rowData){
												?>
												<tr>
													<td><?=$rowData['id']?></td>
													<td><?=$rowData['user_company_name']?></td>
													<td>
													<?php
                                    				foreach($user_type as $key)
                                    				{
                                   						if($rowData['user_type']==$key['id'])
                                   						{
                                    						echo $key['userType']; 
                                    					} 
                                    				} ?>
                                    				</td>
													<td>
													<?php
                                    				foreach($user_role as $key)
                                    				{
                                   						if($rowData['user_role']==$key['id'])
                                   						{
                                    						echo $key['roleName']; 
                                    					} 
                                    				} ?>
													</td>
													<td><?=$rowData['u_name']?></td>
													<td><?=$rowData['u_email']?></td>
													<td><?=$rowData['u_mobileno']?></td>
													<td>
														<?php
														if($rowData['is_active']=='0')
                                   						{
                                    						echo "Inactive"; 
                                    					}
                                    					elseif($rowData['is_active']=='1')
                                   						{
                                    						echo "Limited"; 
                                    					}
                                    					else
                                   						{
                                    						echo "Unlimited Access"; 
                                    					}

                                    					?>
													</td>
													<?php $init = $rowData['session_exp_time'];
														  $hours = floor($init / 3600);?>
													<td><?php echo $hours; ?></td>
													<td><a href="<?php echo site_url(); ?>allusers/admin/update/<?php echo $rowData['id'];?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														
														<!-- <a href="<?=site_url()."consultant/admin/create"?>"<i class="fa fa-plus-square"></i></a> -->
											<input  type="hidden" name="id[]" value="<?php echo $rowData["uid"]; ?>">
									
													</td> 

												</tr>
											
											<?php }
											
											?>
											 
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
		$("#supplier_table").DataTable({
			"order": [],
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 