<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Nikado_Theme
 * @since Nikado 1.0
 */
 
$nikado_opt = get_option( 'nikado_opt' );
?>
			<?php if(isset($nikado_opt['footer_layout']) && $nikado_opt['footer_layout']!=''){
				$footer_class = str_replace(' ', '-', strtolower($nikado_opt['footer_layout']));
			} else {
				$footer_class = '';
			} ?>

			<!--<div class="footer <?php echo esc_html($footer_class);?>">-->


				<?php
				/*if ( isset($nikado_opt['footer_layout']) && $nikado_opt['footer_layout']!="" ) {

					$jscomposer_templates_args = array(
						'orderby'          => 'title',
						'order'            => 'ASC',
						'post_type'        => 'templatera',
						'post_status'      => 'publish',
						'posts_per_page'   => 30,
					);
					$jscomposer_templates = get_posts( $jscomposer_templates_args );

					if(count($jscomposer_templates) > 0) {
						foreach($jscomposer_templates as $jscomposer_template){
							if($jscomposer_template->post_title == $nikado_opt['footer_layout']){
								echo do_shortcode($jscomposer_template->post_content);
							}
						}
					}
				} else {*/ ?>
					<div class="widget-copyright default-copyright">
						<?php 
						/*if( isset($nikado_opt['copyright']) && $nikado_opt['copyright']!='' ) {
							echo wp_kses($nikado_opt['copyright'], array(
								'a' => array(
									'href' => array(),
									'title' => array()
								),
								'br' => array(),
								'em' => array(),
								'strong' => array(),
							));
						} else {
							echo 'Copyright <a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo('name').'</a> '.date('Y').'. All Rights Reserved';
						}*/
						?>
					</div>
				<?php
				//}
				?>
		
		</div><!-- .page -->
	</div><!-- .wrapper -->
<?php //$_SERVER['SERVER_NAME'] ="www.teranex.io/beta-V*SRJ!-452656-230718" ?>
<?php $_SERVER['SERVER_NAME'] =str_replace("/ecommerce","",site_url());?>

    <div class="container-fluid t-footer-bars">
        <!-- <div class="container"> 
      <p class="text-center">Intelligence Alert - Delivering the latest product trends and industry news straight to your inbox.</p>
      <div class="col-sm-offset-3 col-sm-6 padd-0">
        <form style="display: block;" id="subscribe_form" name="subscribe_form" class="text-center mob-center-form" method="post" action="" >
          <input type="text" placeholder="Your email" id="email_id" name= "email_id"class="footer-search-text" value="" required>
          <input type="submit" id="subscribe" value="Subscribe">
        </form>
        <div class="tips">
          <p>We’ll never share your email address with a third-party.</p>
        </div>
      </div>
    </div> -->
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
                <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/about">About Stelmac</a>
        <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/contact">Contact Us</a>
                <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/teranex_team">Team</a>
                <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/footer/helpCenter">Help Center</a>
            </div>
      <!-- <div class="footer-col link">
                <h4>Buy on TERANEX</h4>
                <a target="_blank" href="<?php echo site_url()."pages/allcategories";?>">All Categories </a>
                <a target="_blank" href="<?php echo site_url()."pages/teranex_rfq";?>">Request for Quotation</a>
            </div>
            <div class="footer-col link">
                <h4>Sell on TERANEX</h4>
                <a target="_blank" href="<?php echo site_url()."pages/suppliermembership";?>">Supplier </a>
                <a target="_blank" href="<?php echo site_url()."pages/serviceproviders";?>">Service Provider </a>
                <a target="_blank" href="<?php echo site_url()."footer/learningCenter";?>">Learning Center</a>
            </div> -->
      <div class="footer-col link" style="padding-left: 0;">
                <h4>Policies & Rules</h4>
                <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/returnscancellations">Refund Policy</a>
                <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/privacystatement">Privacy Statement</a>
                <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/termsconditions">Terms & Conditions of Service</a>
                <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/termsuse">Terms of Use</a>
            </div>
            <div class="footer-col" style="padding-top: 0px; width:50%;padding-left: 0px;">
              <h4 style="margin-top: 0px;">Newsletter</h4>
              <p class="" style="padding: 0;float: left;text-align: left;">Intelligence Alert - Delivering the latest product trends & industry news to your inbox.</p>
        <div class="">
          <form style="display: block;" id="subscribe_form" name="subscribe_form" class="text-center mob-center-form" method="post" action="" >
            <input type="text" placeholder="Your email" id="email_id" name= "email_id"class="footer-search-text" value="" required>
            <input type="submit" id="subscribe" value="Subscribe">
          </form>
          <div class="tips">
            <p>We’ll never share your email address with a third-party.</p>
          </div>
        </div>
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
            <img src="<?php echo $_SERVER['SERVER_NAME'];?>/themes/site/images/apple.png" class="">
          </a>
          <a target="_blank" title="Available on Android" href="#" class="app-store">
            <img src="<?php echo $_SERVER['SERVER_NAME'];?>/themes/site/images/playStore.png" class="">
          </a>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="text-center mob-center">
          <p>
            <span class="links"><a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/feedback">Feedback</a>  |  <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/disclaimer">Disclaimer</a>  |  <a target="_blank" href="<?php echo $_SERVER['SERVER_NAME'];?>/footer/siteMap">Sitemap</a>  
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
<?php //if($this->session->userdata('uid')==''){?>
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
          <?php //if(hasFlash("ErrorLoginMsg")) { ?>
          <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php //echo getFlash("ErrorLoginMsg"); ?>
          </div>
        <?php //}?>
            
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
            <span class="pull-right" style="padding-top: 0;"><a href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/signIn">Sign Up</a></span>
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
            <form class="" name="" id="reset_form" method="post" enctype="multipart/form-data" action="<?php echo $_SERVER['SERVER_NAME'];?>/pages/forgotPasswords" >
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
<!-- End Custom Footer Teranex Codeigniter --->



	<!--<div class="nikado_loading"></div>-->
	<?php if ( isset($nikado_opt['back_to_top']) && $nikado_opt['back_to_top'] ) { ?>
	<div id="back-top" class="hidden-xs hidden-sm hidden-md"></div>
	<?php } ?>
	<?php wp_footer(); ?> 
</body>
</html>
