 <style type="text/css">
 	
 </style>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Add Attendee User</li>
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
<?php   $this->load->view("cust_side_menu" );  ?> 
<div class="col-md-10 col-sm-12 col-xs-12 supplier-form">  
<?php 	// display messages
		if(hasFlash("dataMsgAddError"))	{	?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgAddError"); ?>
			</div>
<?php }	?>
		<form class="form" name="attendeeAdd" id="attendeeAdd" method="post" action="" enctype="multipart/form-data">
			 
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">User Name <span class="red">*</span></label>
					<input type="text" class="form-control input-form lettersOnly" id="u_name" name="u_name" placeholder="User Name"  value="<?php echo $addressEdit['u_name']?>" />
				</div>
				<div class="col-sm-6">
					<label class="">Email ID <span class="red">*</span></label>
					<input type="text" class="form-control input-form" id="u_email" name="u_email" placeholder="Email Id"   value="<?php echo $addressEdit['u_email']?>"/>
				</div><div class="clearfix"></div>
			</div> 
			
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Mobile No. <span class="red">*</span></label>
					<input type="text" class="form-control input-form numbersOnly" id="u_mobileno" name="u_mobileno" placeholder="Mobile Number" minlength="10" maxlength="10" value="<?php echo $addressEdit['u_mobileno']?>" />
				</div>
				<div class="col-sm-6">
					<label class="">Photo <span class="red">*</span></label>
					<input type="file" class="form-control input-form" id="uAvatar" name="uAvatar" placeholder="" value="" accept="image/*" /><div class="clearfix"></div>
				</div><div class="clearfix"></div>
			</div>
			 
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">User Type <span class="red">*</span></label>
					<select name="u_user_type" id="u_user_type" class="form-control input-form">
						<option value="A">Attendee</option>
					</select>
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group col-sm-12 col-xs-6">
			   <center><input type="submit" name="addSubmit" id="addSubmit" class="btn btn-default submit-btn" value="Add User" /></center>
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
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#attendeeAdd").validate({
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
			},
			messages: { 
				u_name:{
					required:"Please enter user name"
				},
				u_email:{
					required:"Please enter email id"
				},
				u_mobileno:{
					required:"Please enter Mobile number"
				},
				uAvatar:{
					required:"Please select photo"
				},
			}
		}); 
</script>
<?php $this->template->contentEnd();	?> 