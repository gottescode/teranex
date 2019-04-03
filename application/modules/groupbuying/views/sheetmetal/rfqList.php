<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Collective Buying Customer RFQ</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Customer Request List</li>
	
  </ol>
</section>
	 <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<?php 
						if(hasFlash("dataMsgSuccess"))	{	?>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgSuccess");
									
							  ?>
							</div>
				<?php	}	?>
				<div class="box-body"> 
				
					<form id="" name="" action= "<?php echo site_url()."groupbuying/sheetmetal/createAdminRfq"; ?>"class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Customer Name</th>
										<th>Name</th>
										<th>Catergory</th>  
										<th>Type</th>  
										<th>Brand</th>  
										<th>Thickness</th>  
										<th>Size</th>  
										<th>Frequency</th>  
										<th>Qty</th>  
										<th>Status </th>
										<th>Action</th> 
									</tr>
								</thead>
								<tbody>
								<?php if($sheetmetalCustrequestList){ $i=1;
						
									foreach($sheetmetalCustrequestList as $row){
										
										?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$row['u_name']?></td>
										<td><?=$row['sheetmetal_name']?></td>
										<td><?=$row['sheetmetal_category']?></td>
										<td><?=$row['sheetmetal_type']?></td>
										<td><?=$row['sheetmetal_brand']?></td>
										<td><?=$row['sheetmetal_thickness']?></td>
										<td><?=$row['sheetmetal_size']?></td>
										<td><?=$row['cons_freq']?></td>
										<td><?=$row['sheet_quantity']?></td>
										<td>
										<? if($row['rfq_status']=='W'){
											?>
										<span class="pull-right-container">
											<small class="label pull-right bg-red">Waiting</small>
										</span>
									
											<?
										?>
										<?	}else{
										?>
											<span class="pull-right-container">
											<a href="<?=site_url()."groupbuying/sheetmetal/adminRfqList"?>"><small class="label pull-right bg-green">RFQ Generated</small></a>
										</span>
										<?
											
										} ?>
										</td>
										<td>
										<? if($row['rfq_status']=='W'){
											
										?>
											<input type="checkbox" name="rfq_ids[]" value="<?php echo $row['id'];?>">
										<?	} ?>
										</td>
										
									</tr>
								<?php }
								}?>
								</tbody>
							</table>  </br>
						</div>
						<input type="submit" name="btnSubmit" class="btn btn-info pull-right" value="NEXT"/>
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
		    "order": [[ 0, "desc" ]]
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 