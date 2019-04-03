<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
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
				<?php 	// display messages
						if(hasFlash("dataMsgSuccess"))	{	?>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgSuccess"); ?>
							</div>
				<?php	}	?>
				<div class="box-body"> 
					<div class="box-header">
		              <h3 class="box-title">RFQ details</h3>
					  <a href= "<?php echo site_url()."groupbuying/consumable/adminRfqList"?>" class="btn btn-xs btn-warning pull-right">GO BACK</a>
		            </div>
		          		<div class="col-sm-12 " style ="">
							<?php 
							$sum = 0;
							foreach($rfqDetails as $row){ ?> <p><?php 
							  $total = $row['cons_quantity']; 
							 $sum = $sum+$total;
							// print_r($row);?></p>
							 <div class="col-sm-4 col-xs-12">
								<table class="table table-bordered table-striped " id="" role="grid" aria-describedby="">
									<thead>
										<tr role="row"><th>Customer Name </th><td><?php echo $row['u_name']; ?></td></tr>
										<tr role="row"><th>Consumable Name </th><td><?php echo $row['Consumablename']; ?></td></tr>
										<tr role="row"><th>Consumable Category </th><td><?php echo $row['consumable_category']; ?></td></tr>
										<tr role="row"><th>Consumable Type </th><td><?php echo $row['consumable_type']; ?></td></tr>
										<tr role="row"><th>Consumable Brand </th><td><?php echo $row['consumable_brand']; ?></td></tr>
										<tr role="row"><th>Consumable Frequency</th><td><?php echo $row['cons_freq']; ?></td></tr>
										<tr role="row"><th>Consumable Quantity</th><td><b><?php echo $row['cons_quantity']; ?></b></td></tr>
										<tr role="row"><th>Request Date</th><td><?php echo $row['created_date']; ?></td></tr>
									</thead>
								</table>
							</div>
							<? } ?>
						</div>
				
				
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