 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Admin Approval</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."consultant/admin/admin_approval"?>">Admin Approval</a></li>
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
						
									<table class="table table-bordered table-striped" id="consultant_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>User Email Id</th>  
												<th>User Mobile No</th>  
												<th>Company Name</th>  
												<th>Company Website</th>  
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
											<?php 
                                                $i=1;
											if (isset($approval_data) && !empty($approval_data)) {

												if($key->company_id==''){

												foreach ($approval_data as $key) {
											 ?>
					                      <tr>
					                      	<td><?php echo $i;?></td>
					                        <td><?php echo $key->u_email;?></td>
					                      	<td><?php echo $key->u_mobileno;?></td>
					                      	<td><?php echo $key->company_name;?></td>
					                      	<td><?php echo $key->company_website;?></td>
					                      	<td>
                                                    <?php if($key->is_active!=0){ ?>
                                                        <a data-toggle="modal" data-id="<?php echo $key->uid; ?>" href="javascript:;" title="Complete dental appointment" class="opennew-AddBookDialog btn btn-success btn-xs" data-target=".modal-manage-supplier" href="#myModalnew">Approve</a>

                                                        <?php } else{?>  

   <a  href="javascript:;" title="Complete dental appointment" class="btn btn-success btn-xs">Approved</a>

                                                        <?php } ?>
											</td>
					                      	 </tr>
                                           
					                  <?php  $i++; } } } ?>

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
		$("#consultant_table").DataTable({
			'pageLength':50
	});	
	}); 
	</script>

<script>
    $(document).on("click", ".opennew-AddBookDialog", function ()
  {
     if (confirm('Are you sure you want to approve ?')) 
  	{
        var uid = $(this).data('id');
     //  alert(uid);


        $.ajax({
        url: "<?php echo site_url(); ?>consultant/admin/assign_approval",
        data: {uid:uid}, 
        dataType:"json",
        type: "post",
        success: function(data){
              alert('success');
        
        }
    });


    }
       
    });

</script> 
<?php $this->template->contentEnd();	?> 
