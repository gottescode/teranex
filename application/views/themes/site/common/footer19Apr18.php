	<div class="container-fluid footer-bars">
        <div class="container">
            <div class="col-sm-3 link">
                <h4>Company</h4>
                <a href="<?php echo site_url()."pages/about";?>">About Us</a>
                <a href="<?php echo site_url()."pages/contact";?>">Contact Us</a>
                <a href="<?php echo site_url()."pages/team";?>">Team</a>
            </div>
            <div class="col-sm-3 link">
                <h4>Partners</h4>
                <a href="<?php echo site_url()."pages/suppliers";?>">Suppliers </a>
                <a href="<?php echo site_url()."pages/serviceproviders";?>">Service Providers</a>
                <a href="<?php echo site_url()."pages/market_place";?>">Developer</a>
            </div>
            <div class="col-sm-3 link">
                <h4>Policies</h4>
                <a href="<?php echo site_url()."pages/returnscancellations";?>">Returns & Cancellations </a>
                <a href="<?php echo site_url()."pages/termsconditions";?>">Terms of Service</a>
                <a href="<?php echo site_url()."pages/termsuse";?>">Terms of Use </a>
            </div>
          <div class="col-sm-3">
                <h4>Follow Us</h4>
               <div class="soc-media_footer">
				<i class="fa fa-facebook" aria-hidden="true"></i>
				<i class="fa fa-twitter" aria-hidden="true"></i>
				<i class="fa fa-linkedin" aria-hidden="true"></i>
				<i class="fa fa-youtube" aria-hidden="true"></i>
				<i class="fa fa-rss" aria-hidden="true"></i>
			   </div>
            </div>
            <div class="clearfix"></div>
            <hr style=" border-color:#FFF; margin:5px 0">
            <span class="links">
      &copy; <a href="index.php">Teranex</a>  |  <a href="coming_soon.php">Sitemap</a> |  <a href="coming_soon.php">Feedback</a>  |  <a href="privacy-statement.php">Privacy</a>  |  <a href="<?php echo site_url()."pages/disclaimer";?>">Disclaimer</a>  |  <a href="coming_soon.php">FAQs</a>  
      </span>
        </div>
    </div>

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
	
<?php $this->template->contentEnd();	?> 