 
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
					<label class="control-label col-sm-3" for="u_name">Supplier Name<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="u_name" id="u_name" class="form_bor_bot required" value="<?=$supplier_data['u_name']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="u_email">Email ID :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="email" name="u_email" id="u_email" class="form_bor_bot required" value="<?=$supplier_data['u_email']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="u_password">Password<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="password" name="u_password" id="u_password" class="form_bor_bot required" value="<?=$supplier_data['u_password']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="conf_password">Confirm Password<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="password" name="conf_password" id="conf_password" class="form_bor_bot required" value="<?=$supplier_data['u_password']?>">
					</div>
				  </div>
				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
					  <input type="hidden" name="id" value="<?php echo $supplier_data['uid']?>"  > 
					 <input type="hidden" name="u_user_type" value="S"> 
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
		u_email:{
			required:true,
			valEmail:true
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
	   		required:"Please enter supplier name"
	   	},
		u_email:{
			required:"Please enter email address"
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
</script>

 
<?php $this->template->contentEnd();	?> 