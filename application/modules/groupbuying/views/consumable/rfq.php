 
<div class="content-wrapper">
<!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Collective buying</span>
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">RFQ</li>
	
  </ol>
</section>
 <!-- Main content -->
<section class="content">
	<div class="row">
		<?php 	// display messages
								if(hasFlash("dataMsgError"))	{	?>
									<div class="alert alert-warning alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <?php echo getFlash("dataMsgError"); ?>
									</div>
						<?php	}	?>
		<div class="col-xs-12">
			<div class="box">
				<div class="box-body"> 
					<div class="box-header">
		              <h3 class="box-title">RFQ</h3>
					  <a href="<?php echo site_url()."groupbuying/consumable/"?>" class="pull-right btn btn-xs btn-warning">Back</a>
		            </div>
					<div class="border_bot"> 
						
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
						
						

						<div>
							<div class="clearfix"></div>
							<h3 class = "text-center">Total Quantity: <?php echo $sum;?></h3>
							 <form class="form-horizontal" name="" id="adminRfq" method="post" enctype="multipart/form-data" action="<?php echo site_url()."groupbuying/consumable/assignSupplierForRequest"?>" >
								<div class="form-group">
									<input type="hidden" id="rfq_ids" name="rfq_ids" class="" placeholder="" value="<?php echo $rfq_ids; ?>">
									<input type="hidden" id="cons_quantity" name="cons_quantity" class="" placeholder="" value="<?php echo $sum;?>">
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="ConsumableName">RFQ Title: </label>
									<div class="col-sm-4">
										<input type="text" id="title" name="title" class="form-control" placeholder="" value="">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-4" for="ConsumableName">Consumable Name: </label>
									<div class="col-sm-4">
										<input type="text" id="consumable_name" name="consumable_name" class="form-control" placeholder="" value="<?php echo $row['Consumablename']; ?>">
									</div>
								</div>
								  <div class="clearfix"></div>
								  <div class="text-center">
									  <input type="submit" name="addAdminRfq" id="submit" class="btn btn-success" value="Submit" />
								  </div>
							  </form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>			
</section> 
</div>
	
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script type="text/javascript">
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
	$("#groupbuying_rfq").validate({
   	rules: {  
			prod_category: {
				required:true
			}, 
			prod_brand: {
				required:true
			}, 
			prod_model:{
				required:true
			},
			product_specification: {
				required:true
			}, 
			expyearlyforecast: {
				required:true
			}, 
			no_of_custumer: {
				required:true
			}, 
		},
	messages: { 
			prod_category: {
				required:"Please select product category"
			}, 
			prod_brand: {
				required:"Please select brand"
			}, 
			prod_model:{
				required:"Please select product model"
			},
			product_specification: {
				required:"Please enter product specification"
			}, 
			expyearlyforecast: {
				required:"Please enter expected yearly forecast"
			}, 
			no_of_custumer: {
				required:"Please enter no. of customer interested"
			},  
		}
		}); 
//
$('#prod_brand').on('change', function() {
	var prod_brand = $("#prod_brand").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/machine/api/machineBrandModelList/"+prod_brand,
		  data: {},
			success: function(result){ 
				$('#prod_model').empty();
				 if(result){ 	 
						var state_list=result.result.result; 
						$('#prod_model')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select Product Module'));	
						$.each(state_list, function(key, value) { 
							$('#prod_model')
							.append($("<option></option>")
							.attr("value",value.md_id)
							.text(value.model_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});
});
</script>
<?php $this->template->contentEnd();	?> 