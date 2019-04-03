	<div class="container-fluid t-footer-bars">
        <div class="container"> 
			<p class="text-center">Intelligence Alert - Delivering the latest product trends and industry news straight to your inbox.</p>
			<div class="col-sm-offset-3 col-sm-6 padd-0">
				<form style="display: block;" class="text-center mob-center-form" action="#" >
					<input type="text" placeholder="Your email" class="footer-search-text" value="" required>
					<input type="submit" value="Subscribe">
				</form>
				<div class="tips">
					<p>We’ll never share your email address with a third-party.</p>
				</div>
			</div>
		</div>
		<div class="container">
            <!--<div class="footer-col link">
                <h4>Customer Services</h4>
                <a target="_blank" href="<?php echo site_url()."footer/helpCenter";?>">Help Center</a>
                <a target="_blank" href="<?php echo site_url()."pages/contact";?>">Contact Us</a>
                <a target="_blank" href="<?php echo site_url()."footer/ReportAbuse";?>">Report Abuse</a>
                <a target="_blank" href="<?php echo site_url()."footer/submitAdispute";?>">Submit a Dispute</a>
                <a target="_blank" href="<?php echo site_url()."pages/returnscancellations";?>">Policies & Rules</a>
                <a target="_blank" href="<?php echo site_url()."footer/getPaidForYourFeedback";?>">Get Paid for Your Feedback</a>
            </div> -->
            <div class="footer-col link">
                <h4>About Us</h4>
                <a target="_blank" href="<?php echo site_url()."pages/about";?>">About TERANEX</a>
				<a target="_blank" href="<?php echo site_url()."pages/contact";?>">Contact Us</a>
                <a target="_blank" href="<?php echo site_url()."pages/team";?>">Team</a>
                <a target="_blank" href="<?php echo site_url()."footer/siteMap";?>">Sitemap</a>
            </div>
			<div class="footer-col link">
                <h4>Buy on TERANEX</h4>
                <a target="_blank" href="<?php echo site_url()."footer/allCategories";?>">All Categories </a>
                <a target="_blank" href="<?php echo site_url()."footer/rfq";?>">Request for Quotation</a>
            </div>
            <div class="footer-col link">
                <h4>Sell on TERANEX</h4>
                <a target="_blank" href="<?php echo site_url()."footer/supplierMembership";?>">Supplier </a>
                <a target="_blank" href="<?php echo site_url()."footer/serviseProviderMembership";?>">Service Provider </a>
                <!-- <a target="_blank" href="<?php echo site_url()."footer/learningCenter";?>">Learning Center</a> -->
            </div>
			<div class="footer-col link">
                <h4>Policies & Rules</h4>
                <a target="_blank" href="<?php echo site_url()."pages/returnscancellations";?>">Refund Policy</a>
                <a target="_blank" href="<?php echo site_url()."pages/privacystatement";?>">Privacy Statement</a>
                <a target="_blank" href="<?php echo site_url()."pages/termsconditions";?>">Terms & Conditions of Service</a>
                <a target="_blank" href="<?php echo site_url()."pages/termsuse";?>">Terms of Use</a>
            </div>
            <div class="clearfix"></div>
			<hr/>
		</div>
        <div class="container" style="padding: 20px 0;">
			<div class="col-sm-12 padd-0">
				<div class="col-sm-4 padd-0">
				  <div class="text-right mob-center">
					<span class="ui-footer-sociality-text">Download:</span>
					<a target="_blank" title="Available on the App Store" href="#" class="app-store">
					  <img src="<?php echo $theme_url?>/images/apple.png" class="">
					</a>
					<a target="_blank" title="Available on Android" href="#" class="app-store">
					  <img src="<?php echo $theme_url?>/images/playStore.png" class="">
					</a>
				  </div>
				</div>
				<div class="col-sm-4">
				  <div class="text-center mob-center">
					<p>
						<span class="links"><a target="_blank" href="<?php echo site_url()."pages/feedback";?>">Feedback</a>  |  <a target="_blank" href="<?php echo site_url()."pages/disclaimer";?>">Disclaimer</a>  |  <a href="<?php echo site_url()."footer/faq";?>">FAQs</a>  
					</span>
					</p>
				  </div>
				</div>
				<div class="col-sm-4">
					<div class="soc-media_footer mob-center">
						<span class="ui-footer-sociality-text">Follow us:</span>
						<a target="_blank" href=""><i class="fa fa-facebook" aria-hidden="true"></i></a>
						<a target="_blank" href="https://twitter.com/TeranexRA"><i class="fa fa-twitter" aria-hidden="true"> </i> </a>
						<a target="_blank" href="https://www.linkedin.com/company/teranex-research-and-applications"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
						<a target="_blank" href="https://www.youtube.com/channel/UCNaXBz5Nz7bqYmNnIrUJVTw"><i class="fa fa-youtube" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
        </div>
        <!--<div class="container">
			<p>
			    <span class="links"><a target="_blank" href="<?php echo site_url()."pages/feedback";?>">Feedback</a>  |  <a target="_blank" href="<?php echo site_url()."pages/disclaimer";?>">Disclaimer</a>  |  <a href="<?php echo site_url()."footer/faq";?>">FAQs</a>  
			</span>
			</p>
		</div> -->
<?php if($this->session->userdata('uid')==''){?>
<div id="signinModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <!-- <h4 class="modal-title">Sign In</h4> -->
        <h2 class="form-signin-heading">Sign in</h2>
      </div>
      <div class="modal-body">
        <div class="border_bot col-sm-12">
        	<form class="form-signin" name="loginPopop" id="loginPopop" method="post" action="">
		    	<?php if(hasFlash("ErrorLoginMsg"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("ErrorLoginMsg"); ?>
					</div>
				<?php }?>
		        
		        <div class="form-group">
			        <input type="text" name="user_email" id="user_email" class="form_bor_bot" placeholder="Email ID" ><span class="compulsary">*</span>
		        </div>
		        <div class="form-group">
				    <input type="password" name="user_password" id="user_password" class="form_bor_bot" placeholder="Password" ><span class="compulsary">*</span>
		        </div><div class="clearfix"></div><br/>
		        <div class="form-group">
					<div class="text-center"><input type="submit" class="btn btn-default form-control addmore-btn btn_orange" name="btnLogin" value="Sign in"></div>
		        </div>
		        <div class="form-group">
		        	<div class="checkbox">
					  <label>
						Forgot Password? <span><a href="" data-toggle="modal" data-target="#resetModal" data-dismiss="modal"> Reset Password</a></span>
						<span class="pull-right"><a href="<?php echo site_url()."pages/signIn";?>">Sign Up</a></span>
					  </label>
					</div>
		        </div>
		    </form>
		    <div class="clearfix"></div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!--Reset password modal-->
<div id="resetModal" class="modal fade" role="dialog">
	  <div class="modal-dialog modal-sm">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h1 class="form-signin-heading" style="line-height: 1.1;margin-top: 0px;">Enter email id</h1>
			  </div>
				<div class="modal-body">
					<div class="border_bot">
						<form class="" name="" id="reset_form" method="post" enctype="multipart/form-data" action="<?php echo site_url()."pages/forgotPassword"?>" >
							<div class="form-group">
								<input type="email" name="r_email" id="e_email" class="form_bor_bot required" placeholder="Email"><span class="compulsary">*</span>
							</div>
							<div class="form-group">
								<center><input type="submit" name="resetSubmit" class="btn btn-primary btn_orange" value="Submit" > 
								<!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --></center>
							</div>
						</form>
					</div>
				</div>
			</div>
	  </div>
</div>
<?php }?>
  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <?php $this->template->contentBegin(POS_BOTTOM);?>   
	<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		$("#footernews").submit(function(e){
			e.preventDefault();		
			if($("#NewsletterEmail").val() == "")
			{
				alert("Email is required");
				return false;
			}
			if($("#NewsletterEmail").val() != "")
			{
				var b = $("#NewsletterEmail").val();
				var atpos=b.indexOf("@");
				var dotpos=b.lastIndexOf(".");
				if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
				{
				  alert("Not a valid e-mail address");
				  return false;
				}
			}
				var email = $('#NewsletterEmail').val();
				var varData = 'email=' + email;
				$.ajax({
					type: "POST",
					url:'subscribe.php',
					data: varData,
					success: function(result){
							if (jQuery.trim(result) == 'Pass'){
								alert ("Subscribed successfully. Thank you!");
							}
							else if (jQuery.trim(result) == 'AlreadyThere'){
								alert ("This email id is already subscribed with us.");
							}
							else
							{
								alert ("There was problem while subscribing. Please try again later.");						
							}
					}
				});
			});
	});
	</script>
	<script language="javascript" type="text/javascript">
	$(document).ready(function() {
		 $('#sticky-social').hide();
	});
	   $(window).scroll(function() {
			if ($(this).scrollTop()>100)
			 {
				$('#sticky-social').fadeIn();
			 }
			else
			 {
			  $('#sticky-social').fadeOut();
			 }
		 });
	</script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript"> 
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address'); 
</script>
<?php $this->template->contentEnd();	?> 