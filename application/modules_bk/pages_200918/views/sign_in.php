<?php $this->template->contentBegin(POS_TOP);?>
 <style type="text/css">
 	.sign-up-orng li {
    font-size: 12px;
}
.border_bot .form-group{
	margin-bottom: 10px;
}
.border_bot .form_bor_bot{
	display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border-bottom: 1px solid #ccc;
    border-top: none;
    border-left: none;
    border-right: none;
}
.form-signin label{font-weight:normal;}
 </style>

<?php echo $this->template->contentEnd();	?>  
<div style="padding:30px 0">
	<div class="container signup-padding">
	 <?php	// display messages
			if(hasFlash("ErrorMsg"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("ErrorMsg"); ?>
				</div>
			<?php	}		// display messages
			if(hasFlash("dataMsgSuccessSign"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgSuccessSign"); ?>
				</div>
			<?php	}	?>
<!-- SIGN IN FORM FLASH MSG -->
			<?php if(hasFlash("ErrorLoginMsg"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 0;"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("ErrorLoginMsg"); ?>
					</div>
				<?php }?>
	<div class="col-sm-6 signup-border"> 
		<div class="border_bot col-sm-offset-2 col-sm-8 " style="background-color: #fff;padding:10px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
		    <form class="form-signin" name="register" id="register" method="post" enctype="multipart/form-data" action="" > 
		        <h2 class="form-signin-heading">Sign up</h2>
					<div class="form-group ">
						<input type="email" id="s_email" name="s_email" class="form_bor_bot " placeholder="Email ID" ><span class="compulsary">*</span>
					</div>
					<div class="form-group">
					  	<input type="text" class="form_bor_bot numbersOnly"  id="s_mobileno" name="s_mobileno" minlength="10" maxlength="10" placeholder="Mobile Number"><span class="compulsary">*</span>
					</div>
					
		        	<div class="form-group">	        			
	        			<input type="password" id="s_password" name="s_password" class="form_bor_bot " placeholder="Password" ><span class="compulsary">*</span>
	        		</div>
	        		<div class="form-group">
	        			<input type="password" id="conf_password" name="conf_password" class="form_bor_bot" placeholder="Re-confirm password" ><span class="compulsary">*</span>
	        		</div>
	        		<div class="form-group">
						<select class="form_bor_bot required"   id="SignupType" name="SignupType">
							<option value="">Select Type</option>
							<option value="C">Customer</option>
							<option value="S">Supplier</option>
							<option value="T">Trainer</option>
							<option value="P">Programmer</option>
							<option value="CN">Consultant</option>
						</select><span class="compulsary">*</span>
	        		</div>
		        	<div class="form-group">
		        			<img src="" alt="Random letters" id="captcha" style="margin-top:5px; "/>
		        			<span style="float: right;font-size: 25px;padding: 25px 50px 0 0"><a href='javascript: captcha_refresh();' data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></span>
		        			<label for='message'>Enter the code here :</label>
							<input id="captcha_image" name="captcha" class="form_bor_bot" type="text">
							<!-- Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh. -->
					        <input type="hidden" name="otp_no" id="otp_no" value="<?php echo $otp_no; ?>">
					   
		        	</div><div class="clearfix"></div>
		        	<div class="form-group">
		        		<div class="checkbox">
					          <label>
					           <input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" /><span class="red">*</span>I accept <a href="<?php echo site_url()?>pages/privacystatement" target="_blank"> privacy policy</a>
					          </label>
				        </div>
		        	</div>
		        	<div class="form-group">
		        		<div class="text-center">
							<input type="submit" value="Submit" class=" addmore-btn btn_orange" style="height: 34px;width: 100%;"/></center>
						</div>
		        	</div><div class="clearfix"></div>
		        	<div class="form-group">
		        		<ul class="sign-up-orng">
							<li>Email ID will be used as user name for sign in.</li>
							<li>Notifications shall be Sent on the Email ID and Mobile Number </li>
				        </ul>
			          	<div class="">
					          <label>
					            Difficulty signing up? <span><a href="<?php echo site_url()."pages/contact"?>">Write to us</a></span>
					          </label>
			        	</div> 
		        	</div>
		    </form>
		</div>
	</div>
	<div class="col-sm-6 sign-in">
		<div class="border_bot col-sm-offset-2 col-sm-8 " style="background-color: #fff;padding:10px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
		    <form class="form-signin" name="login" id="login" method="post" action="<?php echo site_url()."pages/login"?>">
		    	<!-- <?php if(hasFlash("ErrorLoginMsg"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 0;"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("ErrorLoginMsg"); ?>
					</div>
				<?php }?> -->
		        <h2 class="form-signin-heading">Sign in</h2>
		        <div class="form-group">
			        	<input type="text" name="u_email" id="u_email" class="form_bor_bot" placeholder="Email ID" ><span class="compulsary">*</span>
		        </div>
		        <div class="form-group">
				        <input type="password" name="u_password" id="u_password" class="form_bor_bot" placeholder="Password" > <span class="compulsary">*</span>
		        </div><div class="clearfix"></div><br/>
		        <div class="form-group">
		        		<div class="text-center"><input type="submit" class="btn btn-default form-control addmore-btn btn_orange" name="btnLogin" value="Sign in"></div>
		        </div>
		        <div class="form-group">
			        	<div class="checkbox">
						  <label>
							Forgot Password? <span><a href="" data-toggle="modal" data-target="#resetModal"> Reset Password</a></span>
						  </label>
						</div>
						<div class="checkbox">
						  <label>
							 Difficulty signing in? <span><a href="<?php echo site_url()."pages/contact"?>">Write to us</a></span>
						  </label>
						</div>
		        </div>
		    </form>
	    </div>
	</div>
	 
	</div><!-- container -->
</div>
 <div id="otp_modal"  role="dialog"  class="modal fade" data-backdrop="static"> 
	<div class="modal-dialog modal-sm">
		<div class="modal-content" style="padding:10px;">
			<div class="modal-header" style="padding: 0px ;padding-bottom: 15px; text-align: center;">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">OTP</h4>
			</div>
			<div class=""  id="" style="padding: inherit;">
				<div class="form-group">
					<input type="text" name="otp" id="otp" class="form-control full-width required" placeholder="OTP">
				</div> 
				<div class="form-group">
				   <center><input type="button" name="btnSubmit" id="save_btn" class="btn btn_orange" value="VERIFY OTP">		 </center>
				</div>  
			</div>
            <div class="clearfix"></div> 
        </div>
        </div>
    </div>
		<!--Reset password modal
		<div id="resetModal" class="modal fade" role="dialog">
			  <div class="modal-dialog modal-sm">
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal">&times;</button>
						<h5 class="modal-title">Enter email id</h5>
					  </div>
						<div class="modal-body">
							<div class="border_bot">
								<form class="" name="" id="reset_form" method="post" enctype="multipart/form-data" action="<?php echo site_url()."pages/forgotPassword"?>" >
									<div class="form-group">
										<input type="email" name="r_email" id="e_email" class="form_bor_bot required" placeholder="Email">
									</div>
									<div class="form-group">
										<center><input type="submit" name="resetSubmit" class="btn btn-primary btn_orange" value="Submit" > 
									</div>
								</form>
							</div>
						</div>
					</div>
			  </div>
		</div>-->

	<style type="text/css">
		.checkbox label.error , .radio label.error{
			color: red;
			position: absolute;
    		top: 15px;
    		padding-left: 0;
		}
	</style>
 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script> -->
<script language="javascript" type="text/javascript"> 
	
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address'); 

/* jQuery.validator.addMethod("valemail", function(value, element) {
                return this.optional(element) || /^([a-zA-Z0-9_.\-+])+\@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})$/i.test(value);
            }, "Please enter a valid email address.");
 */
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.alphaSpace').keyup(function () { 
    this.value = this.value.replace(/[^a-zA-Z \.]/g,'');
});
	var submit =0;
	$("#register").validate({ 
            rules: {  
            	s_email:{
                	required: true,
					valEmail:true
                }, 
				s_mobileno:{
                	required: true,
                	digits: true,
                    minlength: 10,
					maxlength:10
                }, 
                SignupType:{
                	required:true
                },
				s_password:{
                	required: true
                },
				conf_password:{
                	required: true,
                	equalTo: "#s_password",
                },
            },
			messages: { 
               s_email:{
                	required: "Please enter email"
                }, 
				s_mobileno:{
                	required: "Please enter mobile number"
                }, 
                SignupType:{
                	required:"Please select user type"
                },
				s_password:{
                	required: "Please enter password"
                },
				conf_password:{
                	required: "Re-enter your password"
                },	
            },
			submitHandler: function() {
			
				var mobile_no = $('#s_mobileno').val();
				var otp_no =  $('#otp_no').val();
			if(submit==0){
					debugger;
				

				$.ajax({
					type: "post",
					url: site_url+'pages/send_otp/',
					data: {mobile_no:mobile_no,otp_no:otp_no}, 
					dataType:'json',
					success: function() {
						$('#otp_modal').modal('show');  
					},
					error: function() { 
					}
				}); 
			}else{
				return true;
			}
			return false;
			}
	});
$("#s_email").keyup(function(){
	var s_email = $('#s_email').val();
   	$.ajax({
					type: "post",
					url: site_url+'pages/api/checkEmailIdExist',
					data: { s_email:s_email }, 
					dataType:'json',
					success: function(result) {
						if(result.result==1){
							alert("This Email-Id Already Registered..!!");
							$('#s_email').val('');	
						}
					},
					error: function() { 
					}
				}); 
});	
  $('#save_btn').click(function(){
		var otp = $("#otp").val();
		var otp_no = $("#otp_no").val();
	if(otp_no==otp){
		debugger;
		 submit = 1;
		//  $('#register').submit();
		  document.getElementById("register").submit();
	}else{
		alert("Please Enter Correct OTP");
	}
	 
});


			
var captchaUrl = "<?php echo base_url(); ?>index.php/captcha?page=SignUp";

//login form validation
$("#login").validate({
   rules: {  
				u_email: {
					required:true,
					valemail:true
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
			},
			submitHandler: function(loginPopop){ 
			$(".loader").show();
				dataUrl = $("#login").serialize();
				$.ajax({
					type : "POST",
					 url : site_url + "pages/ajaxLoginFront",
					data : dataUrl,
				 dataType: 'json', 
				 success : function(result){ 
						$(".loader").fadeOut("slow");
						if(result.success=='success'){
//							result.token
							var	responseToken= JSON.stringify(result.token);
                            localStorage.setItem("_r",responseToken);
							localStorage.setItem("T",result.type);
							location.reload();
						}
						else if(result.fail=='fail'){
							alert('Login Failed ');
						}
					}
				});
			}
		}); 

/* $("#login").validate({
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
 */
//reset form validation
$("#reset_form").validate({
   rules: {  
				r_email: {
					required : true,
					valemail:true
				},
			},
			messages: { 
				r_email: "Please enter registered email "
			}
		}); 
</script>
<script src="<?=$theme_url;?>/js/captcha.js"></script> 
 
<?php echo $this->template->contentEnd();	?> 