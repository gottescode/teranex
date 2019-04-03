 
<div class="box-body">
	<div class="col-xs-12">
		<!-- form -->
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="product_form" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label class="control-label col-sm-3" for="prod_category">Product Category :<span class="star">*</span></label>
						<div class="col-sm-6"> 
							<select name="prod_category" id="prod_category" class="form_bor_bot">
								<option value="">Select Product Category</option>
								<?php if($machineCatList){
									foreach($machineCatList as $rowMachine){?>
								<option value="<?php echo $rowMachine['mc_id']?>" <?php if($rowProduct['prod_category']==$rowMachine['mc_id']){ echo "selected";}?>><?php echo $rowMachine['category_name']?></option>
								<?php }}?> 
							</select>						
						</div>
					</div>
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_type">Product Type :</label>
						<div class="col-sm-6">
							<select name="prod_type" id="prod_type" class="form_bor_bot">
								<option value="">Select Product Type</option>
								<option value="Machines" <?php if($rowProduct['prod_type']=='Machines'){ echo "selected";}?>>Machines</option>
								<option value="Tooling" <?php if($rowProduct['prod_type']=='Tooling'){ echo "selected";}?>>Tooling</option>
							</select>
						</div>
				  	</div> 
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_name">Product Name :<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="prod_name" id="prod_name" class="form_bor_bot required" value="<?=$rowProduct['prod_name']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_specification">Product Specification :</label>
						<div class="col-sm-6">
							<input type="text" name="prod_specification" id="prod_specification" class="form_bor_bot " value="<?=$rowProduct['prod_specification']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_brandName">Product Brand Name :<span class="star">*</span></label>
						<div class="col-sm-6">
							<select name="prod_brandName" id="prod_brandName" class="form_bor_bot">
								<option value="">Select Product Brand</option>
									<?php if($brandList){
									foreach($brandList as $rowBrand){?>
								<option value="<?php echo $rowBrand['mb_id']?>"  <?php if($rowProduct['prod_brandName']==$rowBrand['mb_id']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
									<?php }}?>
								 
							</select>
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_model">Product Model :<span class="star">*</span></label>
						<div class="col-sm-6">
							<select name="prod_model" id="prod_model" class="form_bor_bot">
								<option value="">Select Product Model</option> 
								<?php if($brandModelList){
									foreach($brandModelList as $rowBrandModel){?>
								<option value="<?php echo $rowBrandModel['md_id']?>"  <?php if($rowProduct['prod_model']==$rowBrandModel['md_id']){ echo "selected";}?>><?php echo $rowBrandModel['model_name']?></option>
									<?php }}?>
							</select>
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_manufacturing_year	">Product Manufacturing Year :</label>
						<div class="col-sm-6">
							<select name="prod_manufacturing_year" id="prod_manufacturing_year" class="form_bor_bot">
								<option value="">Select Manufacturing Year s</option>
								<?php for($i=date('Y');$i>1980;$i--){?>
								<option value="<?php echo $i;?>" <?php if($rowProduct['prod_manufacturing_year']==$i){ echo "selected";}?>><?php echo $i;?></option>
								<?php }?>
							</select>
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_location">Product Location :</label>
						<div class="col-sm-6">
							<input type="text" name="prod_location" id="prod_location" class="form_bor_bot alphaSpace" value="<?=$rowProduct['prod_location']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="technical_specification">Technical Specification :</label>
						<div class="col-sm-6">
							<input type="text" name="technical_specification" id="technical_specification" class="form_bor_bot " value="<?=$rowProduct['technical_specification']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="moq">MOQ :</label>
						<div class="col-sm-6">
							<select name="moq" id="moq" class="form_bor_bot">
								<option value="">Select MOQ</option>
								<?php for($k=1;$k<11;$k++){?>
								<option value="<?php echo $k?>" <?php if($k==$rowProduct['moq']){ echo "selected";}?>><?php echo $k?></option>
								<?php }?>
							</select>
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="measure_of_unit">Measure of Unit :</label>
						<div class="col-sm-6">
							<input type="text" name="measure_of_unit" id="measure_of_unit" class="form_bor_bot alphaSpace" value="<?=$rowProduct['measure_of_unit']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_key_features">Product Key Features :</label>
						<div class="col-sm-6">
							<input type="text" name="prod_key_features" id="prod_key_features" class="form_bor_bot " value="<?=$rowProduct['prod_key_features']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prodPhoto">Product Picture :</label>
						<div class="col-sm-6">
							<input type="file" name="prodPhoto" id="prodPhoto" class="form_bor_bot" >
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prodVideo">Product Video :</label>
						<div class="col-sm-6">
							<input type="file" name="prodVideo" id="prodVideo" class="form_bor_bot " accept="video/*" >
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_warranty">Product Warranty :</label>
						<div class="col-sm-6">
							<input type="text" name="prod_warranty" id="prod_warranty" class="form_bor_bot " value="<?=$rowProduct['prod_warranty']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_history">Product History :</label>
						<div class="col-sm-6">
							<input type="text" name="prod_history" id="prod_history" class="form_bor_bot " value="<?=$rowProduct['prod_history']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="supplier_product_code">Supplier Product Code :</label>
						<div class="col-sm-6">
							<input type="text" name="supplier_product_code" id="supplier_product_code" class="form_bor_bot " value="<?=$rowProduct['supplier_product_code']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prod_description">Product Description :</label>
						<div class="col-sm-6">
							<input type="text" name="prod_description" id="prod_description" class="form_bor_bot " value="<?=$rowProduct['prod_description']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="">Return Policy :</label>
						<div class="col-sm-6">
							<input type="text" name="return_policy" id="return_policy" class="form_bor_bot" value="<?=$rowProduct['prod_description']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="detailed_comments">Detailed Comments :</label>
						<div class="col-sm-6">
							<input type="text" name="detailed_comments" id="detailed_comments" class="form_bor_bot" value="<?=$rowProduct['detailed_comments']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="prodBrochure">Upload Product Brochure :</label>
						<div class="col-sm-6">
							<input type="file" name="prodBrochure" id="prodBrochure" class="form_bor_bot" >
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="product_price">Product Price :<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="product_price" id="product_price" class="form_bor_bot numbersOnly" value="<?=$rowProduct['product_price']?>">
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="finance_option">Finance Option :</label>
						<div class="col-sm-6">
							<select name="finance_option" id="finance_option" class="form_bor_bot">
								<option value="">Select Finance Option</option>
								<option value="Available"  <?php if($rowProduct['finance_option']=='Available'){ echo "selected";}?>>Available</option>
								<option value="Not Available"  <?php if($rowProduct['finance_option']=='Not Available'){ echo "selected";}?>>Not Available</option>
							</select>
						</div>
				  	</div>
				  	<div class="form-group">
						<label class="control-label col-sm-3" for="quantity">Quantity :</label>
						<div class="col-sm-6">
							<input type="text" name="quantity" id="quantity" class="form_bor_bot numbersOnly" value="<?=$rowProduct['quantity']?>">
						</div>
				  	</div>
				  	<!-- <div class="form-group">
						<label class="control-label col-sm-3" for="">Product Review :</label>
						<div class="col-sm-6">
							<input type="text" name="product_review" id="product_review" class="form_bor_bot" value="">
						</div>
				  	</div> -->
				  	<div class="form-group"> 
						<div class="text-center">
					 		<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					 		<input type="hidden" name="id" value="<?=$rowProduct['gp_id']?>" > 
					 		<input type="hidden" name="old_prod_photo" value="<?=$rowProduct['prod_photo']?>" > 
					 		<input type="hidden" name="old_prod_video" value="<?=$rowProduct['prod_video']?>" > 
					 		<input type="hidden" name="old_prod_brochure" value="<?=$rowProduct['prod_brochure']?>" > 
						</div>
				  	</div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 
<?php   $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script> 
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery('.alphaSpace').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
jQuery('.alphaNumeric').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z0-9\.]/g,'');
});
$("#product_form").validate({
   rules: {  
				prod_category:{
					required:true
				}, 
				prod_name:{
					required:true
				}, 
				prod_brandName:{
					required:true
				}, 
				prod_model:{
					required:true
				}, 
				product_price:{
					required:true
				}, 
			},
			messages: { 
				prod_category:{
					required:"Please select product category"
				}, 
				prod_name:{
					required:"Please enter product name"
				}, 
				prod_brandName:{
					required:"Please select product brand"
				}, 
				prod_model:{
					required:"Please select product model"
				}, 
				product_price:{
					required:"Please enter product price"
				}, 
			}
		});

$('#prod_brandName').on('change', function() {
	var prod_brandName = $("#prod_brandName").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/machine/api/machineBrandModelList/"+prod_brandName,
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
							.attr("value",value.mb_id)
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