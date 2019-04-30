    <div class="container-fluid footer-bars">
        <div class="container">
            <div class="col-sm-3 link">
                <h4>Company</h4>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
                <a href="team.php">Team</a>
            </div>
            <div class="col-sm-3 link">
                <h4>Community</h4>
                <a href="events.php">Events </a>
                <a href="forum.php">Forums</a>
                <a href="news.php">News</a>
            </div>
            <div class="col-sm-3 link">
                <h4>Policies</h4>
                <a href="returns-cancellations.php">Returns & Cancellations </a>
                <a href="terms-conditions.php">T&C of Sales & Service</a>
                <a href="terms-use.php">Terms of Use </a>
            </div>
            <div class="col-sm-3">
                <h4>Policies</h4>
                <a href=""><img src="images/f-icon1.jpg" width="45" height="43"></a><a href=""><img src="images/t-icon.jpg" width="39" height="43"></a><a href=""><img src="images/rss-icon.jpg" width="39" height="43"></a><a href=""><img src="images/gp-icon.jpg" width="39" height="43"></a>
                <a
                    href=""><img src="images/in-icon.jpg" width="39" height="43"></a><a href=""><img src="images/y-icon.jpg" width="39" height="43"></a>
                    <h4>Newsletter</h4>
                    <form class="form-inline" name="footernews" id="footernews" method="post" action="">
                        <div class="form-group">
                            <input type="text" class="form-co
                            ntrol newsl" style="width:60%" id="NewsletterEmail" name="NewsletterEmail" placeholder="Enter your email...">
                            <input type="submit" name="newsletter" id="newsletter" class="btn btn-default newsl-btn" value="Submit" />
                        </div>
                    </form>
            </div>
            <div class="clearfix"></div>
            <hr style=" border-color:#FFF">
            <span class="links">
      &copy; <a href="index.php">Teranex</a>  |  <a href="coming_soon.php">Sitemap</a> |  <a href="coming_soon.php">Feedback</a>  |  <a href="disclaimer.php">Disclaimer</a>  |  <a href="coming_soon.php">FAQs</a>  |  <a href="privacy-statement.php">Privacy</a>
      </span>
        </div>
    </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="slider/js/slider.js"></script>
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
  <!--  <script type='text/javascript' data-cfasync='false'>
        window.purechatApi = { l: [], t: [], on: function () { this.l.push(arguments); } }; (function () { var done = false; var script = document.createElement('script'); script.async = true; script.type = 'text/javascript'; script.src = 'https://app.purechat.com/VisitorWidget/WidgetScript'; document.getElementsByTagName('HEAD').item(0).appendChild(script); script.onreadystatechange = script.onload = function (e) { if (!done && (!this.readyState || this.readyState == 'loaded' || this.readyState == 'complete')) { var w = new PCWidget({c: '12712eb2-bd28-412b-ab46-e9786b41e6ab', f: true }); done = true; } }; })();
    </script>-->
<script type='text/javascript'>
$(function () {
  $(document).scroll(function () {
	  var $nav = $(".navbar-fixed-top");
	  $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
	});
});
</script>
<script>
$(document).ready(function(){
	$(".logo-hide").hide();
});

$(window).scroll(function() {

    if ($(this).scrollTop()>90)
     {
        $('.trans').hide();
        $('.non-trans').show();
		$(".logo-hide").show();
     }
    else
     {
      $('.non-trans').hide();
      $('.trans').show();
	  $(".logo-hide").hide();
     }
 });

</script>