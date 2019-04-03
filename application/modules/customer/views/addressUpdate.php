 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Update Address</li>
      </ul>
    </div>
    <div class="col-sm-8 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <!-- <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="row margin_0">
  
<?php   $this->load->view("cust_side_menu" );  ?> 
<div class="col-sm-9 col-md-9 col-lg-10">
	<div class="border_bot col-sm-offset-2 col-sm-8 col-xs-8 border_bot" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;margin-top: 30px;"> 
		<form class="form" name="address" id="updateaddress" method="post" action="">
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Type</label>
				<div class="col-sm-12">
					<select class="form_bor_bot" id="address_type" name="address_type">
						<option value="">Select Address Type</option>
						<option value="Registered Office" <?php if( $addressEdit['address_type']=='Registered Office'){ echo "selected";}?>>Registered Office</option>
						<option value="Corporate Office" <?php if( $addressEdit['address_type']=='Corporate Office'){ echo "selected";}?>>Corporate Office</option>
						<option value="Regional Office" <?php if( $addressEdit['address_type']=='Regional Office'){ echo "selected";}?>>Regional Office</option>
						<option value="Branch Office" <?php if( $addressEdit['address_type']=='Branch Office'){ echo "selected";}?>>Branch Office</option>
						<option value="Factory-Plant" <?php if( $addressEdit['address_type']=='Factory-Plant'){ echo "selected";}?>>Factory-Plant</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Line 1</label>
				<div class="col-sm-12">
					<input type="text" class=" form_bor_bot" id="address1" name="address1" placeholder="Address Line 1"  value="<?php echo $addressEdit['address1']?>" />
				</div>
			</div><div class="clearfix"></div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Line 2</label>
				<div class="col-sm-12">
					<input type="text" class=" form_bor_bot" id="address2" name="address2" placeholder="Address Line 2"   value="<?php echo $addressEdit['address2']?>"/>
				</div>
			</div>
			
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Country</label>
				<div class="col-sm-12">
					<select name="country" id="country_id" class=" form_bor_bot">
						<option value="">Select Country</option>
						<?php if($countryList){
							foreach($countryList as $rowCountry){?>
							<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
						<?php }}?>
					</select>	 
				</div>
			</div><div class="clearfix"></div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">State</label>
				<div class="col-sm-12">
					<select name="state" id="state_id" class=" form_bor_bot">
						<option value="">Select State</option>
						 <?php if($stateList){
							foreach($stateList as $rowState){?>
							<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$addressEdit['state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
						<?php }}?>
					</select>		
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">City</label>
				<div class="col-sm-12">
					<select name="city" id="city_id" class="form_bor_bot">
						<option value="">Select City</option> 
							 <?php if($cityList){
									foreach($cityList as $rowCity){?>
									<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$addressEdit['city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
								<?php }}?>
					</select>	
				</div>
			</div>
			 <div class="clearfix"></div>
			 
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Zip/Pin Code</label>
				<div class="col-sm-12">
					<input type="text" class="form_bor_bot numbersOnly" id="pincode" name="pincode" placeholder="Zip/Pin Code" minlength="6" maxlength="6" value="<?php echo $addressEdit['pincode']?>" />
				</div>
			</div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Landmark</label>
				<div class="col-sm-12">
					<input type="text" class="form_bor_bot" id="landmark" name="landmark" placeholder="Landmark" value="<?php echo $addressEdit['landmark']?>" />
				</div>
			</div><div class="clearfix"></div>
			<div class="form-group col-sm-6">
				<label class="col-sm-12 contact-label-text">Address Short Name</label>
				<div class="col-sm-12">
					<input type="text" class="form_bor_bot" id="addshortname" name="addshortname" placeholder="Address Short Name" value="<?php echo $addressEdit['addshortname']?>" />
				</div>
			</div><div class="clearfix"></div><br/>
			<div class="form-group col-sm-12 col-xs-6 text-center">
			   <input type="submit" name="updateSubmit" id="updateSubmit" class="btn btn-default submit-btn btn_orange" value="Update Address" />
			</div>
			<input type="hidden"  id="u_address_id" name="u_address_id"  value="<?php echo $addressEdit['u_address_id']?>" />
		</form>
	</div>
</div>
<!-- /.row --> 
	  
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/location.js"></script>  
<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#address").submit(function(){
			
	if($("#AddressType").val() == "")
	{
		alert("Address Type is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
$("#updateaddress").validate({
   rules: {  
				address_type:{
					required:true
				},
				address1:{
					required:true
				},
				country:{
					required:true
				},
				state:{
					required:true
				},
				city:{
					required:true
				},
				pincode:{
					required:true
				},
			},
			messages: { 
				address_type:{
					required:"Please select address type"
				},
				address1:{
					required:"Please enter address"
				},
				country:{
					required:"PLease select country"
				},
				state:{
					required:"Please select state"
				},
				city:{
					required:"Please select city"
				},
				pincode:{
					required:"Please enter zip/pin code"
				},
			}
		}); 

		</script>
</script>
<?php $this->template->contentEnd();	?> 