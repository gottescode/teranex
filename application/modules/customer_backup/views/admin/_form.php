
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
	<?php	}	?>
	
		<!-- form -->
		<div class="col-xs-12"> 
			<form class="form-horizontal" role="form" action="" id="customer_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="cust_email">Email ID :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="cust_email" id="cust_email" class="form-control required" value="<?=$customer_data['cust_email']?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_mobile_no">Mobile No  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="cust_mobile_no" id="cust_mobile_no" class="form-control required" value="<?=$customer_data['cust_mobile_no']?>">
					</div>
				  </div>
				 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_company_name">Company Name  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="cust_company_name" id="cust_company_name" class="form-control required" value="<?=$customer_data['cust_company_name']?>">
					</div>
				  </div>
				 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_company_type">Company Type  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="cust_company_type" id="cust_company_type" class="form-control required" value="<?=$customer_data['cust_company_type']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_gst_no">GST No  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="cust_gst_no" id="cust_gst_no" class="form-control required" value="<?=$customer_data['cust_gst_no']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_pan_no">Pane No  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="cust_pan_no" id="cust_pan_no" class="form-control required" value="<?=$customer_data['cust_pan_no']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_company_website">Website  : </label>
					<div class="col-sm-6">
					<input type="text" name="cust_company_website" id="cust_company_website" class="form-control" value="<?=$customer_data['cust_company_website']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_account_number">Bank Account No: </label>
					<div class="col-sm-6">
					<input type="text" name="cust_account_number" id="cust_account_number" class="form-control " value="<?=$customer_data['cust_account_number']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_account_name">Bank Account Name: </label>
					<div class="col-sm-6">
					<input type="text" name="cust_account_name" id="cust_account_name" class="form-control " value="<?=$customer_data['cust_account_name']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_account_type">Bank Account Type: </label>
					<div class="col-sm-6">
					<input type="text" name="cust_account_type" id="cust_account_type" class="form-control" value="<?=$customer_data['cust_account_type']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_bank_name">Bank Name: </label>
					<div class="col-sm-6">
					<input type="text" name="cust_bank_name" id="cust_bank_name" class="form-control" value="<?=$customer_data['cust_bank_name']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_name">Bank Branch: </label>
					<div class="col-sm-6">
					<input type="text" name="cust_branch_name" id="cust_branch_name" class="form-control" value="<?=$customer_data['cust_branch_name']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_country">Bank Branch Country: </label>
					<div class="col-sm-6">
					<select name="country_id" id="country_id" class="form-control">
								<option value="">Select Country</option>
								<?php if($countryList){
									foreach($countryList as $rowCountry){?>
									<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
								<?php }}?>
							</select>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_state">Bank Branch State : </label>
					<div class="col-sm-6">
					<select name="cust_branch_state" id="state_id" class="form-control">
								<option value="">Select State</option>
								 <?php if($stateList){
									foreach($stateList as $rowState){?>
									<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$customer_data['cust_branch_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
								<?php }}?>
							</select>		
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_city">Bank Branch City : </label>
					<div class="col-sm-6">
					<select name="cust_branch_city" id="city_id" class="form-control">
						<option value="">Select City</option> 
							 <?php if($cityList){
									foreach($cityList as $rowCity){?>
									<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$customer_data['cust_branch_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
								<?php }}?>
					</select>	
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_pincode">Bank Branch Pincode : </label>
					<div class="col-sm-6">
					<input type="text" name="cust_branch_pincode" id="cust_branch_pincode" class="form-control" value="<?=$customer_data['cust_branch_pincode']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_bank_phone_no">Bank Phone : </label>
					<div class="col-sm-6">
					<input type="text" name="cust_bank_phone_no" id="cust_bank_phone_no" class="form-control" value="<?=$customer_data['cust_bank_phone_no']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_ifsc">Bank IFSC : </label>
					<div class="col-sm-6">
					<input type="text" name="cust_ifsc" id="cust_ifsc" class="form-control" value="<?=$customer_data['cust_ifsc']?>">
					</div>
				  </div>
			<div class="form-group">
					<label class="control-label col-sm-3" for="cust_micr">Bank MICR : </label>
					<div class="col-sm-6">
					<input type="text" name="cust_micr" id="cust_micr" class="form-control" value="<?=$customer_data['cust_micr']?>">
					</div>
				  </div>
				    <div class="form-group">
					<label class="control-label col-sm-3" for="cust_swift">Bank Swift: </label>
					<div class="col-sm-6">
					<input type="text" name="cust_swift" id="cust_swift" class="form-control" value="<?=$customer_data['cust_swift']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_comments">Comments </label>
					<div class="col-sm-6">
					<input type="text" name="cust_comments" id="cust_comments" rows="5" class="form-control" value="<?=$customer_data['cust_comments']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="image">Company Logo  :<span class="star">*</span></label>
					<div class="col-sm-5"> 
					  <input type="file" id="project_image" name="project_image" class="form-control" accept="image/*">
					  <?php if($customer_data['project_image']){?>
					  <img src="<?=site_url().'/uploads/project_image/'.$customer_data['project_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$customer_data['project_image']?>">
					  <?php }?>
					  <input type="hidden" id="id" name="id"  value="<?=$customer_data['customer_id']?>">
					</div>
				  </div>
				    <div class="form-group">
					<label class="control-label col-sm-3" for="image">GST Image  :<span class="star">*</span></label>
					<div class="col-sm-5"> 
					  <input type="file" id="project_image" name="project_image" class="form-control" accept="image/*">
					  <?php if($customer_data['project_image']){?>
					  <img src="<?=site_url().'/uploads/project_image/'.$customer_data['project_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$customer_data['project_image']?>">
					  <?php }?>
					  <input type="hidden" id="id" name="id"  value="<?=$customer_data['customer_id']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="image">PAN Image  :<span class="star">*</span></label>
					<div class="col-sm-5"> 
					  <input type="file" id="project_image" name="project_image" class="form-control" accept="image/*">
					  <?php if($customer_data['project_image']){?>
					  <img src="<?=site_url().'/uploads/project_image/'.$customer_data['project_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$customer_data['project_image']?>">
					  <?php }?>
					  <input type="hidden" id="id" name="id"  value="<?=$customer_data['customer_id']?>">
					</div>
				  </div>
				   <h2 class="txt-center">Add Address Details:</h2></br>
		<div id="field">
			<?php if($customer_Address_data!=''){
		foreach($customer_Address_data as $rowAddress){
					?>
            <div id="field0">
			
					<div class="form-group">
					<label class="control-label col-sm-3" for="cust_addrescust_type">Address Category</label>
					<div class="col-sm-6">
					<select class="form-control" id="sel1">
    					<option>Registered Office</option>
    					<option>Branch Office</option>
    					<option>Factory Office</option>
 					</select>
					</div>
				  </div>
				  <div class="form-group" >
					<label class="control-label col-sm-3" for="cust_address1">Address Line 1 </label>
					<div class="col-sm-6">
					<input type="text" name="cust_address1[]" id="cust_address1" class="form-control" value="<?=$customer_data['cust_address1[]']?>">
					</div>
				  </div>

				   <div class="form-group" >
					<label class="control-label col-sm-3" for="cust_address2">Address Line 2</label>
					<div class="col-sm-6">
					<input type="text" name="cust_address2[]" id="cust_address2" class="form-control" value="<?=$customer_data['cust_comments']?>">
					</div>
				  </div>
				   <div class="form-group" >
					<label class="control-label col-sm-3" for="cust_country">Country</label>
					<div class="col-sm-6">
					<select type="text" id="countryAddress0" appendId="0"  name="updatecountryAddress[]" class="form-control" onChange="countryAddress(this.value,0)">
							<option value = ""> Select </option>
							<?php	if($countryList){
										foreach($countryList as $row){		?>
											<option value = "<?php echo $row["id"]; ?>"
												<?php if($row["id"] == $data["country_id"]) echo "selected"; ?> > 
													<?php echo $row["country_name"]; ?> 
											</option>
							<?php		}
									}		?>
						</select>
					</div>

				  </div>
				   <div class="form-group" >
					<label class="control-label col-sm-3" for="stateAddress0">Select State</label>
					<div class="col-sm-6"> 
									<select name="updateStateAddress[]" id="stateAddress0" class="form-control" onChange="stateAddress(this.value,0)">
								<option value="">State</option> 
							</select>
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="city_id">Select City</label>
					<div class="col-sm-6">
								<select name="updateCityAddress[]" id="cityAddress0" class="form-control"  >
								<option value="">City</option> 
							</select>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_pincode">zip </label>
					<div class="col-sm-6">
					<input type="text" name="cust_pincode[]" id="cust_pincode" class="form-control" value="<?=$customer_data['cust_pincodes']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="cust_landmark">Landmark </label>
					<div class="col-sm-6">
					<input type="text" name="cust_landmark[]" id="cust_landmark" class="form-control" value="<?=$customer_data['cust_landmark']?>">
					</div>
				  </div>
				    <input type="hidden" name="addressId[]" value="<?=$rowAddress['customer_address_id']?>" >
			<?php 	} 
				}?>


					<h2 class="txt-center">Add Address Details:</h2></br>
            <div id="field0">
			
					<div class="form-group">
					<label class="control-label col-sm-3" for="addressCategory">Address Category</label>
					<div class="col-sm-6">
					<select class="form-control" id="addressCategory0" name="addressCategory[]">
    					<option value="1">Registered Office</option>
    					<option value="2">w Office</option>
    					<option value="3">Factory Office</option>
 					</select>
					</div>
				  </div>
				  <div class="form-group" >
					<label class="control-label col-sm-3" for="cust_address1">Address Line 1 </label>
					<div class="col-sm-6">
					<input type="text" name="cust_address1[]" id="cust_address1" class="form-control" value="">
					</div>
				  </div>

				   <div class="form-group" >
					<label class="control-label col-sm-3" for="cust_address2">Address Line 2</label>
					<div class="col-sm-6">
					<input type="text" name="cust_address2[]" id="cust_address2" class="form-control" value="">
					</div>
				  </div>
				   <div class="form-group" >
					<label class="control-label col-sm-3" for="cust_country">Country</label>
					<div class="col-sm-6">
					<select type="text" id="countryAddress0" appendId="0"  name="countryAddress[]" class="form-control" onChange="countryAddress(this.value,0)">
							<option value = ""> Select </option>
			<?php	if($countryList){
						foreach($countryList as $row){		?>
							<option value = "<?php echo $row["id"]; ?>"
								<?php if($row["id"] == $data["country_id"]) echo "selected"; ?> > 
									<?php echo $row["country_name"]; ?> 
							</option>
			<?php		}
					}		?>
						</select>
					</div>

				  </div>
				   <div class="form-group" >
					<label class="control-label col-sm-3" for="stateAddress0">State</label>
					<div class="col-sm-6"> 
									<select name="stateAddress[]" id="stateAddress0" class="form-control" onChange="stateAddress(this.value,0)">
										<option value="">State</option> 
									</select>
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="city_id">City </label>
					<div class="col-sm-6">
								<select name="cityAddress[]" id="cityAddress0" class="form-control"  >
										<option value="">City</option> 
									</select>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="cust_pincode">zip </label>
					<div class="col-sm-6">
					<input type="text" name="cust_pincode[]" id="cust_pincode" class="form-control" value="">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="cust_landmark">Landmark </label>
					<div class="col-sm-6">
					<input type="text" name="cust_landmark[]" id="cust_landmark" class="form-control" value="">
					</div>
				  </div>

		</div>
	</div>
                  <!-- Button -->
						<div class="form-group">
						  <div class="col-md-4">
						    <button id="add-more" name="add-more" class="btn btn-primary">Add More</button>
						  </div>
						</div>


				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					</div>
				  </div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div>  
<?php   $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POcust_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
 
<script> 
$("#customer_form").validate({
   rules: {  
				image: "required", 
			},
			messages: { 
				image: "Please Select Image", 
			}
		}); 
var x = 0;
$("#somebutton").click(function () {
	 x++;
  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');
});
</script>
<script type="text/javascript">
	

$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next; 
        var country= <?php echo $countList; ?>; 
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = ' <div id="field'+ next +'" name="field'+ next +'"><div class="form-group"><label class="control-label col-sm-3" for="addresscat">Address Category</label><div class="col-sm-6"><select class="form-control" id="sel1"><option>Registered Office</option><option>Branch Office</option><option>Factory Office</option></select></div></div><div class="form-group" ><label class="control-label col-sm-3" for="addressnew1">Address Line 1 </label><div class="col-sm-6"><input type="text" name="addressnew1" id="addressnew1" class="form-control" value=""></div></div><div class="form-group" ><label class="control-label col-sm-3" for="addressnew2">Address Line 2</label><div class="col-sm-6"><input type="text" name="addressnew2" id="addressnew2" class="form-control" value=""></div></div>';
        newIn +='<div class="form-group" ><label class="control-label col-sm-3" for="countryAddress">Country</label><div class="col-sm-6"> <select   name="countryAddress[]" id="countryAddress'+ next +'" appendId="'+ next +'"  class="form-control" onChange="countryAddress(this.value,'+ next +')"> ';
		for(var i = 0; i < country.length; i++) {
				var obj = country[i]; 
         newIn +='<option  value="'+obj.id+'">'+obj.country_name+'</option> ';
		};
        newIn +=' </select></div></div>';
        newIn +='<div class="form-group" ><label class="control-label col-sm-3" for="stateAddress">State</label><div class="col-sm-6"><select name="stateAddress[]" id="stateAddress'+ next +'"  class="form-control" onChange="stateAddress(this.value,'+ next +')"><option value="">Select State</option></select></div></div>';

         newIn +='<div class="form-group" ><label class="control-label col-sm-3" for="cityAddress">City</label><div class="col-sm-6"><select name="cityAddress[]" id="cityAddress'+ next +'"  class="form-control"><option value="">Select City</option></select></div></div>';

        newIn +='<div class="form-group"><label class="control-label col-sm-3" for="zip">zip </label><div class="col-sm-6"><input type="text" name="zip" id="zip" class="form-control" value=""></div></div><div class="form-group"><label class="control-label col-sm-3" for="landmark">Landmark </label><div class="col-sm-6"><input type="text" name="landmark" id="landmark" class="form-control" value=""></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" >Remove</button></div></div><div id="field">';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
            });
    });

});


</script>
 
<?php $this->template->contentEnd();	?> 