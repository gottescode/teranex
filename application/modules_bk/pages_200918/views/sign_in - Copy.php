<?php $this->template->contentBegin(POS_TOP);?>
 

<?php echo $this->template->contentEnd();	?>  
<div class="container signup-padding">
 <?php	// display messages
		if(hasFlash("ErrorMsg"))	{	?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("ErrorMsg"); ?>
			</div>
		<?php	}		// display messages
		if(hasFlash("dataMsgSuccessSign"))	{	?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgSuccessSign"); ?>
			</div>
		<?php	}	?>
<div class="col-sm-8 signup-border">
	<div class="col-sm-12 enrollment ">
	    <form class="form-signin" name="register" id="register" method="post" enctype="multipart/form-data" action="" > 
	        <h2 class="form-signin-heading">Sign up</h2>
				<div class="form-group ">
					<div class="col-sm-6">
						<label>Email ID <span class="red">*</span></label>
						<input type="email" id="s_email" name="s_email" class="form-control input-form " placeholder="Email ID" >
					</div>
					<div class="col-sm-6">
						<label>Mobile Number <span class="red">*</span></label>
					  	<input type="text" class="form-control input-form numbersOnly"  id="s_mobileno" name="s_mobileno" minlength="10" maxlength="10" placeholder="Mobile Number">
					</div>
				</div>
	        	<div class="form-group">
	        		<div class="col-sm-6">
	        			<label for="inputPassword">Password <span class="red">*</span></label>
	        			<input type="password" id="s_password" name="s_password" class="form-control input-form " placeholder="Password" >
	        		</div>
	        		<div class="col-sm-6">
	        			<label for="inputPassword" >Re-confirm password <span class="red">*</span></label>
	        			<input type="password" id="conf_password" name="conf_password" class="form-control input-form" placeholder="Re-confirm password" >
	        		</div>
	        	</div><div class="clearfix"></div>
	        	<div class="form-group">
	        		<div class="col-sm-6">
	        			<img src="" alt="Random letters" id="captcha" style="margin-top:5px; "/>
	        		</div>
	        		<div class="col-sm-6">
	        			<label for="inputEmail">Customer / Supplier</label>
						<select class="form-control input-form"   id="SignupType" name="SignupType">
							<option value="">Select Type</option>
							<option value="C">Customer</option>
							<option value="S">Supplier</option>
						</select>
	        		</div>
	        	</div><div class="clearfix"></div>
	        	<div class="form-group">
	        		<div class="col-sm-6">
	        			<label for='message'>Enter the code here :</label>
						<br>
						<input id="captcha_image" name="captcha" class="form-control input-form" type="text">
						
						Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh.
				        <input type="hidden" name="otp_no" id="otp_no" value="<?php echo $otp_no; ?>">
	        		</div>
	        		<div class="col-sm-6">
	        			<div class="checkbox">
					          <label>
					           <input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" />I accept privacy policy
					          </label>
				        </div>
	        		</div>        		
	        	</div><div class="clearfix"></div>
	        	<div class="form-group">
	        		<div class="text-center">
						<center><input type="submit" value="Submit" class="col-sm-offset-4 col-sm-5 submit addmore-btn btn_orange" style="height: 34px;"/></center>
					</div>
	        	</div>
	        	<div class="form-group">
	        		<div class="col-sm-12">
		        		<ul class="sign-up-orng">
							<li>Email ID will be used as user name for sign in.</li>
							<li>Notifications shall be Sent on the Email ID and Mobile Number </li>
				        </ul>
			          	<div class="">
					          <label>
					             Difficulty signing in? <span><a href="contact.php">Write to us</a></span>
					          </label>
			        	</div> 
			        </div>
	        	</div>
	    </form>
	</div>
</div>
 
<div class="col-sm-4 sign-in">
	<div class="col-sm-12 enrollment">
	    <form class="form-signin" name="login" id="login" method="post" action="<?php echo site_url()."pages/login"?>">
	    	<?php if(hasFlash("ErrorLoginMsg"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("ErrorLoginMsg"); ?>
				</div>
			<?php }?>
	        <h2 class="form-signin-heading">Sign in</h2>
	        <div class="form-group">
	        	<div class="col-sm-12">
		        	<label for="u_email">User Name <span class="red">*</span></label>
		        	<input type="text" name="u_email" id="u_email" class="form-control input-form" placeholder="Email ID" >
		        </div>
	        </div>
	        <div class="form-group">
	        	<div class="col-sm-12">
			        <label for="u_password">Password <span class="red">*</span></label>
			        <input type="password" name="u_password" id="u_password" class="form-control input-form" placeholder="Password" > 
			    </div>
	        </div><div class="clearfix"></div><br/>
	        <div class="form-group">
	        	<div class="col-sm-12">
	        		<div class="text-center"><input type="submit" class="btn btn-default form-control addmore-btn btn_orange" name="btnLogin" value="Sign in"></div>
	        	</div>
	        </div>
	        <div class="form-group">
	        	<div class="col-sm-12">
		        	<div class="checkbox">
					  <label>
						Forgot Password? <span><a href="" data-toggle="modal" data-target="#resetModal"> Reset Password</a></span>
					  </label>
					</div>
					<div class="checkbox">
					  <label>
						 Difficulty signing in? <span><a href="#">Write to us</a></span>
					  </label>
					</div>
				</div>
	        </div>
	    </form>
    </div>
</div>
 
</div><!-- container -->
 <div id="otp_modal" tabindex="-1" role="dialog"  class="modal"> 
			<div class="modal-header" style="padding: 0px ; padding-bottom: 15px;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">OTP</h4>
			</div>
                
			<div class=""  id="" style="padding: inherit;">
				<div class="form-group">
					<input type="text" name="email" id="email" class="form-control full-width required" placeholder="OTP">
				</div> 
				<div class="form-group">
				   <center> <input type="button" name="loginSubmit" class="btn btn-primary" value="Continue" > </center>
				</div>  
			</div>
            <div class="seperator"></div> 
        </div>
		<!--Reset password modal-->
		<div id="resetModal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Enter email id</h5>
					  </div>
						<div class="modal-body">
							<form class="" name="" id="reset_form" method="post" enctype="multipart/form-data" action="" >
								<div class="form-group">
									<input type="email" name="r_email" id="e_email" class="form-control full-width required" placeholder="email">
								</div>
								<div class="form-group">
									<center><input type="submit" name="resetSubmit" class="btn btn-primary" value="Submit" > 
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>
								</div>
							</form>
						</div>
					</div>
			  </div>
		</div>

		
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript">
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$(document).ready(function () {
 var submit =0;
	$("#register").validate({ 
            rules: {   
				s_email:{
                	required: true,
					email:true, 
					valEmail:true
                }, 
				s_mobileno:{
                	required: true,
                	digits: true,
                    minlength: 10,
					maxlength:10
                }, 
				s_password:{
                	required: true
                },
				conf_password:{
                	required: true,
                	equalTo: "#s_password",
                },
				acceptPrivacy:{
                	acceptPrivacy: true, 
                },
            },
			messages: { 
				s_email:{
                	required: "Please enter email"
                }, 
				s_mobileno:{
                	required: "Please enter mobile number"
                }, 
				s_password:{
                	required: "Please enter password"
                },
				conf_password:{
                	required: "Re-enter your password"
                },				
			},
			 
			submitHandler: function(form) { 
			alert('valid form submitted');
            return false;
			}
	}); 
	}); 
	//OTP LOGIC
	function checkOtp(){
		var user_otp = $('#otp').val();
		var otp_no = $('#otp_no').val();
		if(user_otp == otp_no){
			$('#btnSubmit').click();
		}else{
			alert('Enter Correct OTP');
		}
		
	} 
			
var captchaUrl = "<?php echo base_url(); ?>index.php/captcha?page=SignUp";

//login form validation

$("#login").validate({
   rules: {  
				u_email: {
					required:true
				},
				u_password: {
					required:true
				},
				SigninType: {
					required:true
				},
			},
			messages: { 
				u_email: {
					required:"Please enter email id"
				},
				u_password: {
					required:"Please enter password"
				},
				SigninType: {
					required:"Please select sign in type"
				},
			}
		}); 
//reset form validation
$("#reset_form").validate({
   rules: {  
				r_email: "required" 
			},
			messages: { 
				r_email: "Please enter registered email "
			}
		}); 
</script>
<script src="<?=$theme_url;?>/js/captcha.js"></script> 
 
<?php echo $this->template->contentEnd();	?> 