<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Exchange Group Request List</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Request List</li>
	
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
				<div class="box-body"> 
				<div class="padd-15">
				
				</div>
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								     <thead>
                        <tr bgcolor="#CCCCCC">
						<td>Sr.No</td>
						<td>Requseted On</td> 
						<td>Requseted BY</td> 
						<td>Accepted BY</td> 
						<td>Accepted On</td> 
						<td>Category</td>
						
					
						<td>Status</td>
						<td>Action</td></tr>
                    </thead>
                   
               
							 <tbody>
						<?php if($rfqList['result']){ $i=1;
								foreach($rfqList['result'] as $row){ 
							
								?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$row['request_on']?></td>
										<td><? if($row['customer_name']){ echo $row['customer_name'];	}else{ echo "-"; } ?></td>
										<td><? if($row['supplier_name']){ echo $row['supplier_name'];	}else{ echo "-"; } ?></td>
										<td><? if($row['request_accepted']){ echo $row['request_accepted'];	}else{ echo "-"; } ?></td>
									
										<td><?=$row['category']?></td>
										
									
						<td>		<?php if($row['status']=='R'){
										echo "Waiting";
									}else if($row['status']=='A'){
										echo "Accepted";
									}else if($row['status']=='CN'){
										echo "Cancelled";
									}else if($row['status']=='R'){
										echo "Requested";
									}

									?>
									
									<? ?>
								</td> 
                                <td>
								
								
									
									<a href="<?php echo site_url() ?>exchangegroups/admin/viewDetailsSupplier/<?=$row['id']; ?>" class= "btn btn-xs" >View Details</a> 	
							
									
								</td>
										
									</tr>
							<?php }
						}?>
                        
                    </tbody></table>  
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
		$("#product_table").DataTable({
		   // "order": [[ 0, "desc" ]]
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 