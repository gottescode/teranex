 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Update Contact</li>
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
			<form class="form" name="address" id="contact_update" method="post" action="">
				 
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Contact Person Name</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot lettersOnly" id="contact_person_name" name="contact_person_name" placeholder="Contact Person Name"  value="<?php echo $conatactEdit['contact_person_name'];?>" />
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Contact Person Short Name</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot lettersOnly" id="person_short_name" name="person_short_name" placeholder="Contact Person Short Name"  value="<?php echo $conatactEdit['person_short_name'];?>"/>
					</div>
				</div>
				<div class="clearfix"></div>
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Contact Person Designation</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot" id="person_designation" name="person_designation" placeholder="Contact Person Designation" value="<?php echo $conatactEdit['person_designation'];?>" />
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Department</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot" id="department" name="department" placeholder="Department"  value="<?php echo $conatactEdit['department'];?>"/>
					</div>
				</div><div class="clearfix"></div>
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Email</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot" id="email_id" name="email_id" placeholder="Email"  value="<?php echo $conatactEdit['email_id'];?>"/>
					</div>
				</div>
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Office Phone No</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot numbersOnly" id="office_phone_no" name="office_phone_no" placeholder="Office Phone No"  value="<?php echo $conatactEdit['office_phone_no'];?>"/>
					</div>
				</div><div class="clearfix"></div>
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Ext</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot" id="phone_ext" name="phone_ext" placeholder="Ext"  value="<?php echo $conatactEdit['phone_ext'];?>"/>
					</div>
				</div> 
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Mobile No</label>
					<div class="col-sm-12">
						<input type="text" class="form_bor_bot numbersOnly" id="mobile_no" name="mobile_no" placeholder="Mobile No" minlength="10" maxlength="10" value="<?php echo $conatactEdit['mobile_no'];?>" />
					</div>
				</div>
				<div class="clearfix"></div><br/>
				<div class="form-group col-sm-12 col-xs-6 text-center">
				   <input type="submit" name="updateSubmit" id="updateSubmit" class="btn btn-default submit-btn btn_orange" value="Update Contact" />
				</div>
				<input type="hidden"  id="uc_id" name="uc_id"  value="<?php echo $conatactEdit['uc_id']?>" />
			</form>
		</div>
	</div>
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
<script>  
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
jQuery.validator.addMethod("valEmail1", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');
$("#contact_update").validate({
   rules: {  
				contact_person_name:{
					required:true
				},
				person_short_name:{
					required:true
				},
				person_designation:{
					required:true
				},
				department:{
					required:true
				},
				email_id:{
					required:true,
					valEmail1:true
				},
				// office_phone_no:{
				// 	required:true
				// },
				mobile_no:{
					required:true
				},
			},
			messages: { 
				contact_person_name:{
					required:"Please enter contact person name"
				},
				person_short_name:{
					required:"Please enter short name"
				},
				person_designation:{
					required:"Please enter designation"
				},
				department:{
					required:"Please enter department"
				},
				email_id:{
					required:"Please enter email id"
				},
				office_phone_no:{
					required:"Please enter office phone number"
				},
				mobile_no:{
					required:"Please enter mobile number"
				},
			}
		}); 
		</script>
<?php $this->template->contentEnd();	?> 