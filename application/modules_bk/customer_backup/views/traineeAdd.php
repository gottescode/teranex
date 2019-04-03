 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Add Trainee / Consultant User</li>
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
        <li class=""><a href="<?php echo site_url()."";?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="bg_white"> 
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
			<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:500px;">  
				<?php 	// display messages
						if(hasFlash("dataMsgAddError"))	{	?>
							<div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgAddError"); ?>
							</div>
				<?php }	?>
					<form class="form" name="traineeAdd" id="traineeAdd" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<input type="text" class="form_bor_bot alphaSpace" id="u_name" name="u_name" placeholder="User name"  value="<?php echo $addressEdit['u_name']?>" /><span class="compulsary">*</span>
						</div>
						<div class="form-group">
							<input type="email" class="form_bor_bot" id="u_email" name="u_email" placeholder="Email"   value="<?php echo $addressEdit['u_email']?>"/><span class="compulsary">*</span>
						</div><div class="clearfix"></div>
						<div class="form-group ">
							<input type="text" class="form_bor_bot numbersOnly" id="u_mobileno" name="u_mobileno" placeholder="Mobile Number" minlength="10" maxlength="10" value="<?php echo $addressEdit['u_mobileno']?>" /><span class="compulsary">*</span>
						</div>
						<div class="form-group">
							<input type="file" class="form_bor_bot" id="uAvatar" name="uAvatar" placeholder="" value="" accept="image/*" /><span class="compulsary">*</span>
						</div><div class="clearfix"></div>
						<div class="form-group">
							<input type="text" class="form_bor_bot numbersOnly" id="consultant_per_hour_rate" name="consultant_per_hour_rate" placeholder="Consultant Per Hour Rate" value="" /><span class="compulsary">*</span>
						</div><div class="clearfix"></div>
						<div class="form-group">
							<select name="u_user_type" id="u_user_type" class="form_bor_bot">
								<option value="">Select user type</option>
								<option value="T">Trainee</option>
								<option value="CN">Consultant</option>
								<option value="P">Programmer</option>
							</select><span class="compulsary">*</span>
						</div><div class="clearfix"></div>
						<div class="form-group col-sm-12 col-xs-12">
						   <center><input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Add User" /></center>
						</div>
						<input type="hidden"  id="u_address_id" name="u_address_id"  value="<?php echo $addressEdit['u_address_id']?>" />
					</form>
			</div>
		</div>/<div class="clearfix"></div>
	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/location.js"></script>  
<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#attendeeAdd").submit(function(){
			
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
<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>  -->
<script>  
	jQuery('.alphaSpace').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');
$("#traineeAdd").validate({
   rules: {  
				u_name:{
					required:true
				},
				u_email:{
					required:true,
					valEmail:true
				},
				u_mobileno:{
					required:true
				},
				uAvatar:{
					required:true
				},
				consultant_per_hour_rate:{
					required:true
				},
				u_user_type:{
					required:true
				},
			},
			messages: { 
				u_name:{
					required:"Please enter user name"
				},
				u_email:{
					required:"Please enter user email"
				},
				u_mobileno:{
					required:"Please enter mobile number"
				},
				uAvatar:{
					required:"Please select photo"
				},
				consultant_per_hour_rate:{
					required:"Please enter consultant per hour rate"
				},
				u_user_type:{
					required:"Please select user type"
				},
			}
		}); 
</script>
<?php $this->template->contentEnd();	?> 