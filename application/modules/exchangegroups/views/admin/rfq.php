 
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
		            </div>
					<div class="border_bot"> 
					<form class="form-horizontal" role="form" action="" id="groupbuying_rfq" method="post" enctype="multipart/form-data" novalidate="novalidate">
						<fieldset>
							<div class="form-group">
								<label class="control-label col-sm-3" for="prod_category">Product Category: <span class="star">*</span></label>
								<div class="col-sm-6"> 
									<select name="prod_category" id="prod_category" class="form_bor_bot">
										<option value="">Select product category</option>
										<?php if($machineCatList){
											foreach($machineCatList as $rowCat){?>
												<option value="<?php echo $rowCat['mc_id']?>" ><?php echo $rowCat['category_name']?></option>
										<?php }}?>
									</select>						
								</div>
						  	</div>
						  	<div class="form-group">
								<label class="control-label col-sm-3" for="prod_brand">Brand: <span class="star">*</span></label>
								<div class="col-sm-6"> 
									<select name="prod_brand" id="prod_brand" class="form_bor_bot">
										<option value="">Select Brand</option>
										  <?php if($brandList){
												foreach($brandList as $rowBrand){?>
											<option value="<?php echo $rowBrand['mb_id']?>"  <?php if($rowProduct['prod_brandName']==$rowBrand['mb_id']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
												<?php }}?>
									</select>						
								</div>
						  	</div>
						  	<div class="form-group">
								<label class="control-label col-sm-3" for="prod_model">Product Model: <span class="star">*</span></label>
								<div class="col-sm-6"> 
										<select class="form_bor_bot" name="prod_model" id="prod_model">
										  <option value="">Select Product Model</option> 
										</select>				
								</div>
						  	</div>
						   	<div class="form-group">
								<label class="control-label col-sm-3" for="product_specification">Product Specification :<span class="star">*</span></label>
								<div class="col-sm-6">
									<input type="text" name="product_specification" id="product_specification" class="form_bor_bot required" value="" placeholder="">
								</div>
						  	</div> 
						  	<div class="form-group">
								<label class="control-label col-sm-3" for="">Expected Yearly Forecast :<span class="star">*</span></label>
								<div class="col-sm-6">
									<input type="text" name="expyearlyforecast" id="expyearlyforecast" class="form_bor_bot numbersOnly required" value="" placeholder="">
								</div>
						  	</div>
						  	<div class="form-group">
								<label class="control-label col-sm-3" for="">No. of Customers Interested :<span class="star">*</span></label>
								<div class="col-sm-6">
									<input type="text" name="no_of_custumer" id="no_of_custumer" class="form_bor_bot numbersOnly required" value="" placeholder="">
								</div>
						  	</div>
						  	<div class="form-group"> 
								<div class="text-center">
								 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
								</div>
						  	</div>
						</fieldset>
					</form>
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