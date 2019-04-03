 <?php $this->template->contentBegin(POS_TOP);?>
 <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
 <?php $this->template->contentEnd();	?> 
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgAutomationError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgAutomationError"); ?>
				</div>
	<?php	}  	?>
	
		<!-- form -->
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
				<fieldset>
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="category_id">Category List:<span class="star">*</span></label>
						<div class="col-sm-6">
							<select name="category_id" id="category_id" class="form_bor_bot required" >
								<option value="<?=$automation_data['category_name']?>">Select Category</option>
								<?php if($categoryList){
									foreach($categoryList['result'] as $rowCat){?>
								<option value="<?=$rowCat['am_id']?>" <?php if($rowCat['am_id']==$automation_data['category_id']){ echo "selected";}?>><?=$rowCat['category_name']?></option>
								<?php }}?>
							</select>
							
						</div>
				  	</div> 
				   
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="brand_name">Brand Name:<span class="star">*</span></label>
						<div class="col-sm-6"> 
							<select name="brand_name" id="brandId" class="form_bor_bot required">
								<option value="">Select Brand</option>
								<?php if($brandList){
									foreach($brandList as $rowBrand){?>
									<option value="<?php echo $rowBrand['ab_id']?>" <?php if($rowBrand['ab_id']==$automation_data['brand_name']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
								<?php }}?>
							</select>
						</div>
				  	</div> 

				   	<div class="form-group">
						<label class="control-label col-sm-3" for="model_no">Model No:<span class="star">*</span></label>
						<div class="col-sm-6"> 
							<select name="model_no" id="brand_model" class="form_bor_bot required">
								<option value="">Select Model</option> 
								<?php if($brandModelList){
									foreach($brandModelList as $rowModel){?>
									<option value="<?php echo $rowModel['ad_id']?>" <?php if($rowModel['ad_id']==$automation_data['model_no']){ echo "selected";}?>><?php echo $rowModel['model_name']?></option>
								<?php }}?>
							</select>
						</div>
				  	</div> 
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="control_panel">Control Panel:</label>
						<div class="col-sm-6">
							<input type="text"  name="control_panel" id="control_panel" class="form_bor_bot" value="<?=$automation_data['control_panel']?>" >
						</div>
				  	</div> 
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="table_w">Table W:</label>
						<div class="col-sm-6">
							<input type="text"  name="table_w" id="table_w" class="form_bor_bot" value="<?=$automation_data['table_w']?>" >
						</div>
				  	</div> 
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="table_l">Table L:</label>
						<div class="col-sm-6">
							<input type="text"  name="table_l" id="table_l" class="form_bor_bot" value="<?=$automation_data['table_l']?>" >
						</div>
				  	</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="automation_axes">Automation Axes:</label>
						<div class="col-sm-6">
							<input type="text"  name="automation_axes" id="automation_axes" class="form_bor_bot" value="<?=$automation_data['automation_axes']?>" >
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="travel_long">Travel Long:</label>
						<div class="col-sm-6">
							<input type="text"  name="travel_long" id="travel_long" class="form_bor_bot" value="<?=$automation_data['travel_long']?>" >
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="travel_cross">Travel Cross:</label>
						<div class="col-sm-6">
							<input type="text"  name="travel_cross" id="travel_cross" class="form_bor_bot" value="<?=$automation_data['travel_cross']?>" >
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="automation_power">Automation Power:</label>
						<div class="col-sm-6">
							<input type="text"  name="automation_power" id="automation_power" class="form_bor_bot" value="<?=$automation_data['automation_power']?>" >
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="automation_rpm">Automation RPM:</label>
						<div class="col-sm-6">
							<input type="text"  name="automation_rpm" id="automation_rpm" class="form_bor_bot" value="<?=$automation_data['automation_rpm']?>" >
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="cust_branch_country"> Country: </label>
						<div class="col-sm-6">
						<select name="automation_location_country" id="country_id" class="form_bor_bot">
									<option value="">Select Country</option>
									<?php if($countryList){
										foreach($countryList as $rowCountry){?>
										<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
									<?php }}?>
								</select>	
						</div>
					</div>
					<div class="form-group"><label class="control-label col-sm-3" for="cust_branch_country"> State : </label>
						<div class="col-sm-6">
						<select name="automation_location_state" id="state_id" class="form_bor_bot">
								<option value="">Select State</option>
								 <?php if($stateList){
									foreach($stateList as $rowState){?>
									<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$automation_data['automation_location_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
								<?php }}?>
							</select>		
					</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="automation_location_city">   City : </label>
						<div class="col-sm-6">
						<select name="automation_location_city" id="city_id" class="form_bor_bot">
							<option value="">Select City</option> 
								 <?php if($cityList){
										foreach($cityList as $rowCity){?>
										<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$automation_data['automation_location_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
									<?php }}?>
						</select>	
						</div>
					 </div>
						 
					<div class="form-group">
						<label class="control-label col-sm-3" for="automation_description">Short Description:</label>
						<div class="col-sm-9">
						<textarea   name="automation_description" id="automation_description" class="form-control" ><?=$automation_data['automation_description']?></textarea>
						</div>
					</div> 
				<!--	<div class="form-group">
						<label class="control-label col-sm-3" for="automation_at_a_glance">Automation At A Glance:<span class="star">*</span></label>
						<div class="col-sm-8">
						<textarea   name="automation_at_a_glance" id="automation_at_a_glance" class="form-control required" ><?=$automation_data['automation_at_a_glance']?></textarea>
						</div>
					</div> -->
					<div class="form-group">
						<label class="control-label col-sm-3" for="automation_history">Automation History:</label>
						<div class="col-sm-9">
						<textarea   name="automation_history" id="automation_history" class="form-control" ><?=$automation_data['automation_history']?></textarea>
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="technical_specification">Technical Specification:</label>
						<div class="col-sm-9">
						<textarea   name="technical_specification" id="technical_specification" class="form-control" ><?=$automation_data['technical_specification']?></textarea>
						</div>
					</div> 
					
				   <div class="form-group">
						<label class="control-label col-sm-3" for="standard_specification">Standard Specification:</label>
						<div class="col-sm-9">
						<textarea   name="standard_specification" id="standard_specification" class="form-control " ><?=$automation_data['standard_specification']?></textarea>
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="additional_equipment">Additional Equipment/Automation Configuration</label>
						<div class="col-sm-9">
						<textarea   name="additional_equipment" id="additional_equipment" class="form-control " ><?=$automation_data['additional_equipment']?></textarea>
						</div>
				  	</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="automation_image">Image : </label>
						<div class="col-sm-6">
							<input type="file" name="automation_image" id="automation_image" class="form_bor_bot" value="" >
							<?php if($automation_data['automation_image']){?>
								<img src="<?=site_url().'uploads/automation/'.$automation_data['automation_image']?>" width="100px">
								<input type="hidden" id="old_image" name="old_image"  value="<?=$automation_data['automation_image']?>">
							<?php }?>
						</div>
					</div> 					

					<div class="form-group">
						<label class="control-label col-sm-3" for="automationVideo">Video Upload: </label>
						<div class="col-sm-6">
							<input type="file" name="automationVideo" id="automationVideo" class="form_bor_bot" >
							<?php if($automation_data['automation_video']){?>
								<a href="<?=site_url().'uploads/automation/'.$automation_data['automation_video']?>" target="_blank">
								Video Uploaded</a>
							<?php }?>
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="capacity">Capacity:</label>
						<div class="col-sm-6">
							<input type="text"  name="capacity" id="capacity" class="form_bor_bot" value="<?=$automation_data['capacity']?>" >
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="weight">Weight:</label>
						<div class="col-sm-6">
							<input type="text"  name="weight" id="weight" class="form_bor_bot" value="<?=$automation_data['weight']?>" >
						</div>
					</div> 				   
				  <div class="form-group">
						<label class="control-label col-sm-3" for="Price">Price:</label>
						<div class="col-sm-6">
							<input type="text"  name="price" id="price" class="form_bor_bot numbersOnly" value="<?=$automation_data['price']?>" >
						</div>
				  </div>				   
				  <div class="form-group">
						<label class="control-label col-sm-3" for="seller_name">Seller: </label>
						<div class="col-sm-6">
							<input type="text"  name="seller_name" id="seller_name" class="form_bor_bot " value="<?=$automation_data['seller_name']?>" >
						</div>
				  </div>				   
				  <div class="form-group">
						<label class="control-label col-sm-3" for="year_production">Year: </label>
						<div class="col-sm-6">
							<input type="text"  name="year_production" id="year_production" class="form_bor_bot" value="<?=$automation_data['year_production']?>" >
						</div>
				  </div>				   
				  <div class="form-group">
						<label class="control-label col-sm-3" for="automation_condition">Condition: </label>
						<div class="col-sm-6">
							<input type="text"  name="automation_condition" id="automation_condition" class="form_bor_bot" value="<?=$automation_data['automation_condition']?>" >
						</div>
				  </div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="used">Automation : </label>
						<div class="col-sm-6">
							<select class="form_bor_bot" name ="isUsed" id="isUsed">
								<option value="Y" <?php if($automation_data['isUsed']=='Y'){ echo "selected"; }?>>Used</option>
								<option value="N" <?php if($automation_data['isUsed']=='N'){ echo "selected"; }?>>New</option>
							</select>
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="used">Recommended  : </label>
						<div class="col-sm-6">
							<input type="checkbox"   name ="recommended" id="recommended" value="Y" <?php if($automation_data['recommended']=='Y'){ echo "checked"; }?>>
								 
						</div>
					</div> 
					
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $automation_data['ad_id']?>"  >  
					  <input type="hidden" id="old_video" name="old_video"  value="<?=$automation_data['automation_video']?>">
					</div>
				  </div> 
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
<script type="text/javascript">
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
$("#category").validate({
	ignore :[],
   rules: {  
			   category_id:{
				   required:true
			   },
				brand_name:{
				   required:true
			   },
			   model_no:{
				   required:true 
			   },
			  /* control_panel:{
				   required:true
			   },
			   table_w:{
				   required:true
			   },
			   table_l:{
				   required:true
			   },
			   automation_axes:{
				   required:true
			   },
			   travel_long:{
				   required:true
			   },
			   travel_cross:{
				   required:true
			   },
			   automation_power:{
				   required:true
			   },
			   automation_rpm:{
				   required:true
			   },
			   automation_description:{
				   required:true
			   },
			   automation_history:{
				   required:true
			   },
			   technical_specification:{
				   required:true
			   },
			   capacity:{
				   required:true
			   },
			   weight:{
				   required:true
			   },
			   price:{
				   required:true
			   },*/
			},
			messages: { 
				category_id:{
				   required:"Please select category id"
			   },
				brand_name:{
				   required:"Please enter brand name"
			   },
			   model_no:{
				   required:"Please enter model number" 
			   },
			  /* control_panel:{
				   required:"Please enter control panel"
			   },
			   table_w:{
				   required:"Please enter table w"
			   },
			   table_l:{
				   required:"Please enter table l"
			   },
			   automation_axes:{
				   required:"Please enter automation axes"
			   },
			   travel_long:{
				   required:"Please enter travel long"
			   },
			   travel_cross:{
				   required:"Please enter travel cross"
			   },
			   automation_power:{
				   required:"Please enter automation power"
			   },
			   automation_rpm:{
				   required:"Please enter automation rpm"
			   },
			   automation_description:{
				   required:"Please enter automation description"
			   },
			   automation_history:{
				   required:"Please enter automation history"
			   },
			   technical_specification:{
				   required:"Please enter technical specification"
			   },
			   capacity:{
				   required:"PLease enter capacity"
			   },
			   weight:{
				   required:"Please enter weight"
			   },
			   price:{
				   required:"Please enter price"
			   },*/
			}
});  

// ajax request for brand model
$('#brandId').on('change', function() {
	var brandId = $("#brandId").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/automation/api/automationBrandModelList/"+brandId,
		  data: {},
			success: function(result){ 
				$('#brand_model').empty();
				 if(result){ 					
						var state_list=result.result.result; 
						$('#brand_model')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select Model'));	
						$.each(state_list, function(key, value) { 
							$('#brand_model')
							.append($("<option></option>")
							.attr("value",value.ad_id)
							.text(value.model_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});
});		
CKEDITOR.replace( 'automation_description' );
//CKEDITOR.replace( 'automation_at_a_glance' );
CKEDITOR.replace( 'automation_history' );
CKEDITOR.replace( 'technical_specification' );
CKEDITOR.replace( 'additional_equipment' );
CKEDITOR.replace('standard_specification');
</script> 
<?php $this->template->contentEnd();	?> 