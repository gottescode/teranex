 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Add Address</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10">
      <ul>
        <li class="">Welcome <? echo $_SESSION['CustomerCompany'];?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="container">
  <div class="row row-flex">
<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="col-md-10 col-sm-12 col-xs-12 supplier-form"> 
		<form class="form" name="address" id="address" method="post" action="">
			 
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Address Type <span class="red">*</span></label>
					<select class="form-control input-form" id="address_type" name="address_type">
						<option value="">Select Address Type</option>
						<option value="Registered Office">Registered Office</option>
						<option value="Corporate Office">Corporate Office</option>
						<option value="Regional Office">Regional Office</option>
						<option value="Branch Office">Branch Office</option>
						<option value="Factory-Plant">Factory-Plant</option>
					</select>
				</div>
				<div class="col-sm-6">
					<label class="">Address Line 1 <span class="red">*</span></label>
					<input type="text" class="form-control input-form" id="address1" name="address1" placeholder="Address Line 1"  />
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Address Line 2</label>
					<input type="text" class="form-control input-form" id="address2" name="address2" placeholder="Address Line 2"  />
				</div>
				<div class="col-sm-6">
					<label class=" ">Country <span class="red">*</span></label>
					<select name="country" id="country_id" class="form-control input-form">
						<option value="">Select Country</option>
						<?php if($countryList){
							foreach($countryList as $rowCountry){?>
							<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
						<?php }}?>
					</select>	 
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">State <span class="red">*</span></label>
					<select name="state" id="state_id" class="form-control input-form">
						<option value="">Select State</option>
						 <?php if($stateList){
							foreach($stateList as $rowState){?>
							<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$customer_data['cust_branch_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
						<?php }}?>
					</select>		
				</div>
				<div class="col-sm-6">
					<label class=" ">City <span class="red">*</span></label>
					<select name="city" id="city_id" class="form-control input-form">
						<option value="">Select City</option> 
							 <?php if($cityList){
									foreach($cityList as $rowCity){?>
									<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$customer_data['cust_branch_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
								<?php }}?>
					</select>	
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Zip/Pin Code <span class="red">*</span></label>
					<input type="text" class="form-control input-form numbersOnly" id="pincode" name="pincode" placeholder="Zip/Pin Code" minlength="6" maxlength="6" />
				</div>
				<div class="col-sm-6">
					<label class="">Landmark</label>
					<input type="text" class="form-control input-form" id="landmark" name="landmark" placeholder="Landmark"  />
				</div><div class="clearfix"></div>
			</div>
			<div class="clearfix"></div>
			<div class="form-group">
				<div class="col-sm-6">
					<label class=" ">Address Short Name</label>
					<input type="text" class="form-control input-form" id="addshortname" name="addshortname" placeholder="Address Short Name"  />
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group col-sm-12 col-xs-6">
			   <center><input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Add Address" /></center>
			</div>
		</form>
		
		<?php 
		if(($customerAddressList))
		{
		?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td>Address Type</td><td>Address Line 1</td><td>Address Line 2</td><td>Country</td><td>Sate</td><td>City</td><td>Addition Date</td><td>Action</td></tr>
				</thead>
				<tbody>
						<?php
						$SNo = 1;
						foreach($customerAddressList as $qy_add1)
						{
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><? echo $qy_add1['address_type'];?></td>
								<td><? echo $qy_add1['address1'];?></td>
								<td><? echo $qy_add1['address2'];?></td>
								<td><? echo $qy_add1['country_name'];?></td>
								<td><? echo $qy_add1['state_name'];?></td>
								<td><? echo $qy_add1['city_name'];?></td>
								<td><? echo date_dmy($qy_add1['update_date']);?></td>
								<td> <a href="<?php echo site_url()?>customer/addressUpdate/<?=$qy_add1[u_address_id]?>"   >Edit</a> &nbsp; &nbsp; <a href="<?php echo site_url()?>customer/addressDelete/<?=$qy_add1[u_address_id]?>"   >Delete</a></td>
							</tr>
				<?php
							$SNo = $SNo + 1;
						}
					?>
				</tbody>
			</table>
		<?php
		}
		?>
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
</script>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});

$("#address").validate({
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
<?php $this->template->contentEnd();	?> 