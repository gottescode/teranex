<?php $this->template->contentBegin(POS_TOP);?>
<script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
<?php $this->template->contentEnd();	?> 

<div class="box-body">
	<div class="col-xs-12 border_bot">
		<?php 	// display messages
		if(hasFlash("dataMsgError"))	{	?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgError"); ?>
			</div>
		<?php	}	?>
		<form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
			<fieldset>
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="category_id">Category List:<span class="star">*</span></label>
					<div class="col-sm-8">
						<select name="category_id" id="category_id" class="form_bor_bot"  required="">
							<!-- <option value="<?=$machine_data['category_name']?>">Select Category</option> -->
							<option value="">Select Category</option>
							<?php if($categoryList){
								foreach($categoryList['result'] as $rowCat){?>
							<option value="<?=$rowCat['mc_id']?>" <?php if($rowCat['mc_id']==$machine_data['category_id']){ echo "selected";}?>><?=$rowCat['category_name']?></option>
							<?php }}?>
						</select>
						
					</div>
			  	</div> 
			   
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="brand_name">Brand Name:<span class="star">*</span></label>
					<div class="col-sm-8"> 
						<select name="brand_name" id="brandId"  onchange="myFunctionModal()" class="form_bor_bot " required="">
							<option value="">Select Brand</option>
							<?php if($brandList){
								foreach($brandList as $rowBrand){?>
								<option value="<?php echo $rowBrand['mb_id']?>" <?php if($rowBrand['mb_id']==$machine_data['brand_name']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
							<?php }}?>
						</select>
					</div>
			  	</div> 








			   	<div class="form-group">
					<label class="control-label col-sm-3" for="model_no">Model No:<span class="star">*</span></label>
					<div class="col-sm-8"> 
						<select name="model_no" id="brand_model" class="form_bor_bot" required="">
							<option value="">Select Model</option> 
							<?php if($brandModelList){
								foreach($brandModelList as $rowModel){?>
								<option value="<?php echo $rowModel['md_id']?>" <?php if($rowModel['md_id']==$machine_data['model_no']){ echo "selected";}?>><?php echo $rowModel['model_name']?></option>
							<?php }}?>
						</select>
					</div>
			  	</div> 
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="control_panel">Control Panel:</label>
					<div class="col-sm-8">
						<input type="text"  name="control_panel" id="control_panel" class="form_bor_bot " value="<?=$machine_data['control_panel']?>" required="">
					</div>
			  	</div> 
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="table_w">Table W:</label>
					<div class="col-sm-8">
						<input type="text"  name="table_w" id="table_w" class="form_bor_bot " value="<?=$machine_data['table_w']?>" >
					</div>
			  	</div> 
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="table_l">Table L:</label>
					<div class="col-sm-8">
						<input type="text"  name="table_l" id="table_l" class="form_bor_bot " value="<?=$machine_data['table_l']?>" >
					</div>
			  	</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_axes">Machine Axes:</label>
					<div class="col-sm-8">
						<input type="text"  name="machine_axes" id="machine_axes" class="form_bor_bot " value="<?=$machine_data['machine_axes']?>" >
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="travel_long">Travel Long:</label>
					<div class="col-sm-8">
						<input type="text"  name="travel_long" id="travel_long" class="form_bor_bot " value="<?=$machine_data['travel_long']?>" >
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="travel_cross">Travel Cross:</label>
					<div class="col-sm-8">
						<input type="text"  name="travel_cross" id="travel_cross" class="form_bor_bot " value="<?=$machine_data['travel_cross']?>" >
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_power">Machine Power:</label>
					<div class="col-sm-8">
						<input type="text"  name="machine_power" id="machine_power" class="form_bor_bot " value="<?=$machine_data['machine_power']?>" >
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_rpm">Machine RPM:</label>
					<div class="col-sm-8">
						<input type="text"  name="machine_rpm" id="machine_rpm" class="form_bor_bot " value="<?=$machine_data['machine_rpm']?>" >
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_country"> Country: </label>
					<div class="col-sm-8">
					<select name="machine_location_country" id="country_id" onchange="myFunctionState()" class="form_bor_bot">
								<option value="">Select Country</option>
								<?php if($countryList){
									foreach($countryList as $rowCountry){?>
									<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
								<?php }}?>
							</select>	
					</div>
				</div>
				<div class="form-group"><label class="control-label col-sm-3" for="cust_branch_country"> State : </label>
					<div class="col-sm-8">
					<select name="machine_location_state" id="state_id" onchange="myFunctionCity()" class="form_bor_bot">
							<option value="">Select State</option>
							 <?php if($stateList){
								foreach($stateList as $rowState){?>
								<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$machine_data['machine_location_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
							<?php }}?>
						</select>		
				</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_location_city">   City : </label>
					<div class="col-sm-8">
					<select name="machine_location_city" id="city_id" class="form_bor_bot">
						<option value="">Select City</option> 
							 <?php if($cityList){
									foreach($cityList as $rowCity){?>
									<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$machine_data['machine_location_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
								<?php }}?>
					</select>	
					</div>
				 </div>
					 
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_description">Short Description:</label>
					<div class="col-sm-8">
					<textarea   name="machine_description" id="machine_description" class="form-control " ><?=$machine_data['machine_description']?></textarea>
					</div>
				</div> 
			<!--	<div class="form-group">
					<label class="control-label col-sm-3" for="machine_at_a_glance">Machine At A Glance:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="machine_at_a_glance" id="machine_at_a_glance" class="form-control required" ><?=$machine_data['machine_at_a_glance']?></textarea>
					</div>
				</div> -->
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_history">Machine History:</label>
					<div class="col-sm-8">
					<textarea   name="machine_history" id="machine_history" class="form-control " ><?=$machine_data['machine_history']?></textarea>
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="technical_specification">Technical Specification:</label>
					<div class="col-sm-8">
					<textarea   name="technical_specification" id="technical_specification" class="form-control " ><?=$machine_data['technical_specification']?></textarea>
					</div>
				</div> 
				<!--Standard Configuration ---->

			   <div class="form-group">
					<label class="control-label col-sm-3" for="standard_specification">Standard Specification:</label>
					<div class="col-sm-8">
					<textarea   name="standard_specification" id="standard_specification" class="form-control " ><?=$machine_data['standard_specification']?></textarea>
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="additional_equipment">Additional Equipment/Machine Configuration</label>
					<div class="col-sm-8">
					<textarea   name="additional_equipment" id="additional_equipment" class="form-control " ><?=$machine_data['additional_equipment']?></textarea>
					</div>
			  	</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_image">Image : </label>
					<div class="col-sm-8">
						<input type="file" name="machine_image" id="machine_image" class="form_bor_bot" value="" >
						<?php if($machine_data['machine_image']){?>
							<img src="<?=site_url().'uploads/machine/'.$machine_data['machine_image']?>" width="100px">
							<input type="hidden" id="old_image" name="old_image"  value="<?=$machine_data['machine_image']?>">
						<?php }?>
					</div>
				</div> 					

				<div class="form-group">
					<label class="control-label col-sm-3" for="machineVideo">Video Upload: </label>
					<div class="col-sm-8">
						<input type="file" name="machineVideo" id="machineVideo" class="form_bor_bot" >
						<?php if($machine_data['machine_video']){?>
							<a href="<?=site_url().'uploads/machine/'.$machine_data['machine_video']?>" target="_blank">
							Video Uploaded</a>
						<?php }?>
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="capacity">Capacity:</label>
					<div class="col-sm-8">
						<input type="text"  name="capacity" id="capacity" class="form_bor_bot " value="<?=$machine_data['capacity']?>" >
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="weight">Weight:</label>
					<div class="col-sm-8">
						<input type="text"  name="weight" id="weight" class="form_bor_bot " value="<?=$machine_data['weight']?>" >
					</div>
				</div> 				   
			  <div class="form-group">
					<label class="control-label col-sm-3" for="Price">Price:</label>
					<div class="col-sm-8">
						<input type="text"  name="price" id="price" class="form_bor_bot " value="<?=$machine_data['price']?>" >
					</div>
			  </div>				   
			  <div class="form-group">
					<label class="control-label col-sm-3" for="seller_name">Seller: </label>
					<div class="col-sm-8">
						<input type="text"  name="seller_name" id="seller_name" class="form_bor_bot " value="<?=$machine_data['seller_name']?>" >
					</div>
			  </div>				   
			  <div class="form-group">
					<label class="control-label col-sm-3" for="year_production">Year: </label>
					<div class="col-sm-8">
						<input type="text"  name="year_production" id="year_production" class="form_bor_bot" value="<?=$machine_data['year_production']?>" >
					</div>
			  </div>				   
			  <div class="form-group">
					<label class="control-label col-sm-3" for="machine_condition">Condition: </label>
					<div class="col-sm-8">
						<input type="text"  name="machine_condition" id="machine_condition" class="form_bor_bot" value="<?=$machine_data['machine_condition']?>" >
					</div>
			  </div>
			  
			   <!-- 	<div class="form-group">
					<label class="control-label col-sm-3" for="machine_details">Machine</label>
					<div class="col-sm-9">
					<textarea   name="machine_details" id="machine_details" class="form-control " ><?=$machine_data['machine_details']?></textarea>
					</div>
			  	</div> 
			 
			  	<div class="form-group">
					<label class="control-label col-sm-3" for="laser_machine">Laser</label>
					<div class="col-sm-9">
					<textarea   name="laser_machine" id="laser_machine" class="form-control " ><?=$machine_data['laser_machine']?></textarea>
					</div>
			  	</div> 
			  
			  	<div class="form-group">
					<label class="control-label col-sm-3" for="lch">LCH</label>
					<div class="col-sm-9">
					<textarea   name="lch" id="lch" class="form-control " ><?=$machine_data['lch']?></textarea>
					</div>
			  	</div> 
			  	<div class="form-group">
					<label class="control-label col-sm-3" for="control_laser">Control</label>
					<div class="col-sm-9">
					<textarea   name="control_laser" id="control_laser" class="form-control " ><?=$machine_data['control_laser']?></textarea>
					</div>
			  	</div> 
			  		<div class="form-group">
					<label class="control-label col-sm-3" for="data_transfer">Data Transfer</label>
					<div class="col-sm-9">
					<textarea   name="data_transfer" id="data_transfer" class="form-control " ><?=$machine_data['data_transfer']?></textarea>
					</div>
			  	</div> 
			  	<div class="form-group">
					<label class="control-label col-sm-3" for="safty">Safty</label>
					<div class="col-sm-9">
					<textarea   name="safty" id="safty" class="form-control " ><?=$machine_data['safty']?></textarea>
					</div>
			  	</div>  -->
			  	  
				<div class="form-group">
					<label class="control-label col-sm-3" for="used">Machine : </label>
					<div class="col-sm-8">
						<select class="form_bor_bot" name ="isUsed" id="isUsed">
							<option value="Y" <?php if($machine_data['isUsed']=='Y'){ echo "selected"; }?>>Used</option>
							<option value="N" <?php if($machine_data['isUsed']=='N'){ echo "selected"; }?>>New</option>
						</select>
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="used">Recommended  : </label>
					<div class="col-sm-8">
						<input type="checkbox"   name ="recommended" id="recommended" value="Y" <?php if($machine_data['recommended']=='Y'){ echo "checked"; }?>>
							 
					</div>
				</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="used">Status  : </label>
					<div class="col-sm-8">
					<select name="publish" id="publish" class="form_bor_bot required">
							<option value="Y" <?php  if($machine_data['publish']=='Y'){ echo "Selected"; } ?>>Active</option> 
							<option value="N"<?php  if($machine_data['publish']=='N'){ echo "Selected"; } ?>>Deactive</option> 
						</select>
					</div>
				</div> 
				
			  <div class="form-group"> 
				<div class="text-center">
				 <input type="submit" name="btnSubmit" value="Submit" class="btn btn_orange"> 
				  <input type="hidden" name="id" value="<?php echo $machine_data['md_id']?>"  >  
				  <input type="hidden" id="old_video" name="old_video"  value="<?=$machine_data['machine_video']?>">
				</div>
			  </div> 
			</fieldset>
		</form>
	</div>

<script>
function myFunctionModal() {
    //var x = document.getElementById("brandId").value;
   var brandId = $("#brandId").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/machine/api/machineBrandModelList/"+brandId,
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
							.attr("value",value.md_id)
							.text(value.model_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});

}

function myFunctionState() {
    //var x = document.getElementById("brandId").value;
 //  alert(country_id);
	var country_id = $("#country_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getStateList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#state_id').empty();
				 if(result){ 					
						var state_list=result.result; 
						$('#state_id')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select State'));	
						$.each(state_list, function(key, value) { 
							$('#state_id')
							.append($("<option></option>")
							.attr("value",value.sid)
							.text(value.state_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});

}

function myFunctionCity()
{

	var country_id = $("#state_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getCityList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#city_id').empty();
				 if(result){ 					
						var city_list= result.result;  
						$.each(city_list, function(key, value) { 
							$('#city_id')
							.append($("<option></option>")
							.attr("value",value.id)
							.text(value.city_name));
						});		
					}
				else if(result.error){
				
				} 
			}
		});

}

</script>
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>






<script> 
$("#category").validate({
	//alert('hi');

   rules: {  
				category_id: "required", 
				brand_name: "required", 
				model_no: "required", 
			},
			messages: { 
				category_id: "Please select category", 
				brand_name: "Please select brand", 
				model_no: "Please select model", 
			}
		}); 

CKEDITOR.replace( 'machine_description' );
CKEDITOR.replace( 'key_features' );
var x = 0;
$("#somebutton").click(function () {
	 x++;
  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');
});
</script>

 
<?php $this->template->contentEnd();	?> 