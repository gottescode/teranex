 
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
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="supplier_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="u_mobileno">User Type :<span class="star">*</span></label>
					<div class="col-sm-6">
					 <select class="form_bor_bot" id="user_type" name="user_type">
                            <option value="">Select User Type</option>
                            <?php foreach ($user_type as $userType) { ?>
                                    <option value="<?php echo  $userType['id'];?>"<?php if ($userType['id']==$allusers_data['user_type']) echo ' selected="selected"'; ?>><?php echo $userType['userType']; ?></option>

                            <?php } ?>	
                      </select>
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="u_mobileno">User Role :<span class="star">*</span></label>
					<div class="col-sm-6">
					 <select type="text" name="user_role" id="user_role" class="form_bor_bot required" >
							<option value="">Select User Role</option>
							<?php foreach ($user_role as $userRole) {?>
								 <option value="<?php echo  $userRole['id'];?>"<?php if ($userRole['id']==$allusers_data['user_role']) echo ' selected="selected"'; ?>><?php echo $userRole['roleName']; ?></option>
							<?php }?>
					</select>
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="u_name">Name<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="u_name" id="u_name" class="form_bor_bot required" value="<?=$allusers_data['u_name']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="u_email">Email ID :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input  name="u_email" class="form_bor_bot" value="<?=$allusers_data['u_email']?>" readonly>
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="u_mobileno">Mobile NO :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="u_mobileno" id="u_mobileno"  minlength="10" maxlength="10" class="form_bor_bot numbersOnly" value="<?=$allusers_data['u_mobileno']?>" readonly>
					</div>
				  </div>
				  
				  
				   <div class="form-group">
					<label class="control-label col-sm-3" for="session_exp_time">Status<span class="star">*</span></label>
					 <label class="radio-inline limited-access"><input type="radio"  value="1" name="is_active" id="yesCheck" <?php if ($allusers_data['is_active']=='1') echo ' checked="checked"'; ?>>Limited</label>
					 <label class="radio-inline"><input type="radio" id="is_active"  value="2" name="is_active" <?php if ($allusers_data['is_active']=='2') echo ' checked="checked"'; ?>>Active</label>
					 <label class="radio-inline"><input type="radio" id="is_active"  value="0" name="is_active" <?php if ($allusers_data['is_active']=='0') echo ' checked="checked"'; ?>>Inactive</label>
				  </div>
				  <div class="form-group" id="ifYes"> 
					<label class="control-label col-sm-3" for="session_exp_time">Access Hour:<span class="star">*</span></label>
					<div class="col-sm-6">
						<?php $init = $allusers_data['session_exp_time'];
						$hours = floor($init / 3600);?>
					<input type="text" name="session_exp_time" id="session_exp_time" class="form_bor_bot required" value="<?php echo $hours; ?>">
					</div>
				  </div>
				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Update" class="btn btn-primary">
					  <input type="hidden" name="id" value="<?php echo $allusers_data['uid']?>"  > 
					 
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
<script src="<?=$theme_url?>/js/location.js"></script> 
 <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
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
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');



$("#supplier_form").validate({
   rules: {  
	   	u_name:{
	   		required:true
	   	},
		
		u_password:{
                	required: true
        },
	    conf_password:{
                	required: true,
                	equalTo: "#u_password",
        },

	},
	messages: { 
		u_name:{
	   		required:"Please enter user name"
	   	},
		
		u_password:{
            required: "Please enter password"
        },
	     conf_password:{
            required: "Re-enter your password"
        },	
	}
}); 
$("#u_email").keyup(function(){
	var u_email = $('#u_email').val();
   	$.ajax({
					type: "post",
					url: site_url+'supplier/api/checkEmailIdExist',
					data: { u_email:u_email }, 
					dataType:'json',
					success: function(result) {
						if(result.result==1){
							alert("This Email-Id Already Registered..!!");
							$('#u_email').val('');	
						}
					},
					error: function() { 
					}
				}); 
});	

var x = 0;
$("#somebutton").click(function () {
	 x++;
  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');
});

$("input[name='is_active']").click(function () {
    $('#ifYes').css('display', ($(this).val() === '1') ? 'block':'none');
});


</script>

 
<?php $this->template->contentEnd();	?> 