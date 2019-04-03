<?php $this->template->contentBegin(POS_TOP);?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
    .margin_10_top{
        margin-top: 10px;
    } 
</style> 

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
                           
                   
                           
                           <div class="cons-details">
 
    <!-- /.container --> 

    
 
    <div class="detail_heading">
        <div class="container">
            <div class="col-sm-12 padd-0">
           
             
              
                <div class="clearfix"></div><br/>
                <div class="" id="Software">
                    <div class="pull-left full-width">
                        <div class="col-sm-12 padd-0 sldsft">
                            <div class="row">
                                <div class="col-sm-1 myDIV"><h2 class="" style="transform:rotate(270deg);margin-top:100px;">Softwares</h2></div>
                                <div class="col-sm-11">
                                    <ul class="cadcam1">
                                        <?php
                                        if (isset($softwareList)) {

                                            foreach ($softwareList as $key) {
                                              //  foreach($machine_software_list as $list){
                                              // print_r($machine_software_list);die;
                                                ?>
                                                <li>
                                                    <div style="margin: 8px;">
                                                        <!-- <div class="softbx-bdr soft-list-details" data-toggle="popover" title="Software Name" data-content="Software Details"> -->
                                                        
                                        
                                                        <div class="softbx-bdr soft-list-details">
                                                            <img src="<?php echo site_url() . "uploads/machine_software/" . $key['machine_image'] ?>" width="" height="" class="img-responsive" />

                                                            <img src="http://www.teranex.io/beta-V*SRJ!-110918-230718/themes/site/images/logo20_old.jpg" alt=""/>
                                                            <h3><?php echo $key['machine_name']; ?></h3>
                                                        </div>
                                                        <div class="checkbox text-center padd-0">
                                                            <label style="line-height: 22px;"><input type="checkbox" name="machine_software_id[]" value="<?php echo $key['id']; ?>" <?php
                                                    if (in_array($key['id'], $machine_software_list)) {
                                                        echo "checked";
                                                    }
                                                    ?> >Add to Machine</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php }
                                        } 
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div><hr/><div class="clearfix"></div>
            </div>
            
         
            <div class="clearfix"></div>
           

        </div>
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
    <br>

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
<?php $this->template->contentBegin(POS_TOP); ?>
<!-- <link href="<?php echo $theme_url ?>/css/jquery.bxslider.min.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/css/machine.css"/>
<style type="text/css">
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
        background: #fff;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 8%;
    }
    .incoming_msg_img img{
        border-radius: 15px;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 10px;
        margin: 0px 0 8px 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        /*float: left;*/
        padding: 10px 0px 0 10px;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 50px;
        width: 100%;
        border: 1px solid #c4c4c4;
        /*border-radius: 25px;*/
        padding: 0 10px;
    }

    .type_msg {/*border-top: 1px solid #c4c4c4;*/position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 8px;
        top: 8px;
        width: 33px;
    }
    .msg_send_btn:focus{
        outline: none;
    }
    .input_msg_write input:focus{
        outline: #a5c049;
    }
    .messaging { padding: 0 0 10px 0;}
    .msg_history {
        height: 150px;
        overflow-y: auto;
    }
    #slideshow {
        overflow: hidden;
        width: 389px;
        height: 240px;
        padding: 0;
        margin: 0 auto;
        list-style-type: none;
    }
    .bx-viewport, .bx-viewport img {
        min-height: 250px;
    }
    .finance_type h3 {
        /* padding: 36px 75px; */
        padding: 0px 14px;
    }
    video {
        display: inline-block;
        vertical-align: baseline;
        object-fit: unset;
        width: 476px;
        height: 271px;
        /* object-fit: cover; */
    }
    #slideshow li {
        list-style-type: none;
    }
    .bx-pager { text-align: center; }
    .bx-pager-item { display: inline-block; margin: 0 10px; }
    .bx-pager-item .active { color: #F08A22; }
    .bx-prev { float: left; }
    .bx-next { float: right; }
    /*.bx-prev:before{content: '\f101';} */
    #slide-counter {
        text-align: center;
        /*margin: 15px 0 0 0;*/
        font-size: 14px;
        color: #a5c049;
    }
    .cadcam1 .nbs-flexisel-item img{
        /*height: 170px;  */  
        width: 100%;
    }
    .sldsft .nbs-flexisel-nav-right {
        right: 0px;
    }
    .popover.right{
        right:125px!important;
        margin-left:0px!important;
    }
    .nbs-flexisel-nav-left, .nbs-flexisel-nav-right{display:none}
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-left, 
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-right{display:block;}
    .nbs-flexisel-nav-left {
        left: 10px!important;
    }
    .nbs-flexisel-nav-right {
        right: 10px!important;
    }
    .mar-tb-20 {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .softbx-bdr {
        /* min-height: 304px;*/
    }
    .videosize{    /*margin-top: 5px;*/
        height: 240px;}

    .table_nb .table>tbody>tr>td, 
    .table_nb .table>tbody>tr>th, 
    .table_nb .table>tfoot>tr>td, 
    .table_nb .table>tfoot>tr>th, 
    .table_nb .table>thead>tr>td, 
    .table_nb .table>thead>tr>th{
        padding-top: 0;
        padding-bottom: 15px;
        line-height: 22px;
        padding-left:0px;
    }
    .bx-controls-direction a {
        margin-top: 2px;
    }
    .row {
        margin-right: -8px;
        margin-left: -8px;
    }
    .finance_type h3 {
        color: #fff;
        font-family: "Helvetica Neue",Helvetica;
    }
    .finance_type .fn {
        border-radius: 10px;
        background-color: rgba(0, 0, 0, 0.6);
        /*-webkit-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        -moz-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);*/
        border-radius: 10px;
    }
    @media screen and (max-width: 1024px){
        video{
            width: 100%;
        }
    }
    @media only screen and (max-width: 1024px) and (min-width: 769px)  {
        .container{
            padding: 0;
        }
    }
    .fg_span {
        margin-top: 5px;
        margin-bottom: 20px;
        /* float: left;*/
        /*width: 100%;*/
        display: block;
        margin-left: 10px;
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
        margin-top:5px;
        width:100%;
        float:left;
    }
    table.member_table tr td, th{
        border: 0 !important;
    }
    .technical_spec table.table>thead>tr>th{
        border: 0 !important;
    }
    .service_avail{
        font-size: 20px;
        color: green;
    }
    .service_navail{
        font-size: 20px;
        color: red;
    }
    .dad:hover > .son-1 {
        -moz-transform: scale(2,2);
        -webkit-transform: scale(2,2);
        transform: none;
    }
    /*GALLERY*/
    .gallery .card {
        cursor: pointer;
    }

    .galleryShadow {
        display: none;
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .galleryModal {
        -webkit-transform: scale(0);
        transform: scale(0);
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: #000;
        z-index: 10111;
    }

    .galleryModal .galleryContainer {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 80%;
        height: 80%;
    }

    .galleryModal .galleryContainer img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
        border: 10px solid #fff;
        border-radius: 10px;
    }

    .galleryModal .galleryContainer .galleryText {
        position: absolute;
        width: 100%;
        height: auto;
        top: 100%;
        color: #fff;
        text-align: center;
    }

    .galleryModal .galleryIcon {
        position: absolute;
        font-size: 2rem;
        width: 2rem;
        height: 2rem;
        text-align: center;
        color: #fff;
    }

    .galleryModal .gIquit {
        right: 10px;
        top: 10px;
    }

    .galleryModal .gIleft {
        top: 50%;
        left: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .galleryModal .gIright {
        top: 50%;
        right: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<?php
echo $this->template->contentEnd();
$user_id = $this->session->userdata('uid');
$machineID = $this->uri->segment(3);
//print_r($product_id);exit;
?> 

</div> 




<?php $this->template->contentBegin(POS_BOTTOM); ?>

                                                                        <!-- <script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script>  --> 
<script src="<?= $theme_url ?>/js/jquery.bxslider.js"></script>
<script src="<?= $theme_url ?>/js/jquery.flexisel.js"></script>	


<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({
            placement: 'right',
            trigger: 'hover'
        });
    });
</script>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {

            //bxslider
            $('#slide-counter').prepend('<strong class="current-index"></strong>/');

            var slider = $('#slideshow').bxSlider({
                auto: false,
                pager: false,
                onSliderLoad: function (currentIndex) {
                    $('#slide-counter .current-index').text(currentIndex + 1);
                },
                onSlideBefore: function ($slideElement, oldIndex, newIndex) {
                    $('#slide-counter .current-index').text(newIndex + 1);
                }
            });

            $('#slide-counter').append(slider.getSlideCount());
        });
    })(jQuery);

    $(window).load(function () {
        $('.cadcam1').each(function () {
            $(this).flexisel({
               
       <?php $count=count($softwareList);
               
                $machine_count=$count;
               
               ?> 
                visibleItems: <?php echo $machine_count; ?>,
                itemsToScroll: 1,
                autoPlay: {
                    enable: false,
                    interval: 5000,
                    pauseOnHover: true
                },
                responsiveBreakpoints: {
                    portrait: {
                        changePoint: 480,
                        visibleItems: 1,
                        itemsToScroll: 1
                    },
                    landscape: {
                        changePoint: 639,
                        visibleItems: 2,
                        itemsToScroll: 2
                    },
                    tablet: {
                        changePoint: 769,
                        visibleItems: 3,
                        itemsToScroll: 3
                    }
                }
            });
        });
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('.js-example-basic-multiple').select2();
                                                    });
</script>


<?php echo $this->template->contentEnd(); ?> 
