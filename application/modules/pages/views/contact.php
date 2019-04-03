<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" href="<?=$theme_url?>/smallimap/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?=$theme_url?>/smallimap/css/contrib/animate.min.css" type="text/css" media="all" />
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
 <img src="<?php echo $theme_url?>/images/contactusbanner1.png" width="100%" class="img-responsive bnr-images">
 </div>
<div class="container">
  <center><h1>Contact Us</h1></center>
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
  <div class="col-sm-8 padd-0">
      <div class="border_bot col-md-12 col-sm-12 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
          <form class="form-horizontal" name="contact" id="contact" method="post" action="" enctype="multipart/form-data">
		  <!-- 
		  
		      <div class="form-group ">
                <div class="col-sm-6">
                  <input type="text" class="form_bor_bot alphaSpace" id="Name" name="person_name" placeholder="Full Name"><span class="compulsary">*</span>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form_bor_bot" id="Company" name="company_name" placeholder="Company Name"><span class="compulsary">*</span>
                </div>
              </div>
          <div class="col-sm-6">
                  <input type="text" class="form_bor_bot" id="country_name" name="country_name" placeholder="Country Name"><span class="compulsary">*</span>
                </div>
		  -->
              <div class="form-group">
			   <div class="col-sm-6">
                  <input type="email" class="form_bor_bot" id="email_id" name="email_id" placeholder="Email"><span class="compulsary">*</span>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form_bor_bot numbersOnly" id="Phone" name="phone_no" minlength="10" maxlength="10" placeholder="Phone Number"><span class="compulsary">*</span>
                </div>
				
				
               </div>
           
              <div class="form-group">
               
                <div class="col-sm-6">
                  <select name="subject" id="Subject" class="form_bor_bot">
                    <option value="">Select Subject</option>
                    <option value="General Enquiry">General Enquiry</option>
                    <option value="Sales">Sales</option>
                    <option value="Service">Service</option>
                  </select><span class="compulsary">*</span>
                </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-12">
                   <textarea rows="4" cols="50" name="message" id="message" class="form_bor_bot" placeholder="Message"></textarea><span class="compulsary">*</span>
                 </div>
              </div>
			  
			  <div class="form-group">
				  <div class="col-sm-6">
					<img src="" alt="Random letters" id="captcha" style="margin-top:5px; "/>
					<span style="float: right;font-size: 25px;padding: 25px 50px 0 0"><a href='javascript: captcha_refresh();' data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></span>
					</div>
					<div class="col-sm-6">
					<input id="captcha_image" name="captcha" placeholder="Enter Captcha Code" class="form_bor_bot" type="text"><span class="compulsary">*</span>
								<!-- Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh. -->
				   </div>
		       </div>
					<div class="clearfix"></div>
              <div class="form-group col-sm-12 text-center">
            	  <center><input type="submit" name="btnSubmit" id="submit" class="btn input-form contact-submit btn_orange" value="Submit" /></center>
              </div>
          </form>
      </div>
      <div class="clearfix"></div><br/>
  </div>
  <div class="col-sm-3 col-sm-offset-1 padd-0">
    <div class="contact-right-text">
      <h3>Corporate Office</h3>
      <p> 
      <span>B-Wing, 4th Floor, </span>
      <span>Statesman House, Barakhamba Road, </span>
      <span>Connaught Place, </span>
      <span>New Delhi, Delhi - 110 001</span>
      </p>
    </div>
    <div class="contact-right-text">
      <h3>Corporate Office</h3>
      <p> 
      <span> Office No. 2K8, </span>
      <span>1st Floor, Kumar Cerebrum IT Park,</span>
      <span> Opposite Cybage, </span>
      <span>Kalyani Nagar, Pune</span>
      <span>India, 411023</span></p>
    </div>
    <div class="contact-right-text">
    	<h3>Corporate Office</h3>
    	<p> 
    	<span>Level 27,</span>
    	<span> Collins Street,  </span>
    	<span>Melbourne, VIC 3000, </span>
    	<span>Australia</span>
    	</p>
    </div>
    <!-- <div class="contact-right-text">
    	<h3>Corporate Office</h3>
    	<p> 
    	<span>258/258, </span>
    	<span>Neshvilla Road,</span>
    	<span> Near Viverly School,</span>
    	<span> Dehradun - </span>
    	<span>India, 248 001</span>
    	</p>
    </div> -->
  </div>
</div>
 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script src="<?=$theme_url?>/js/maplace.min.js"></script>  
<script type="text/javascript">
  jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.alphaSpace').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');

$("#contact").validate({
   rules: {  
        email_id:{
          required:true,
          valEmail:true
        },
        phone_no:{
          required:true
        },
        subject:{
          required:true
        },
        captcha_image:{
          required:true
        },
        message:{
          required:true
        },
      },
      messages: { 
        email_id:{
          required:"Please enter email"
        },
        phone_no:{
          required:"Please enter phone number"
        },
        subject:{
          required:"Please select subject"
        },
        message:{
          required:"Please enter message"
        },
         captcha_image:{
          required:"Please enter captcha code"
        },
      }
    }); 
</script>
<script>  
var captchaUrl = "<?php echo base_url(); ?>index.php/captcha?page=contactUs";
new Maplace({
    locations: LocsAB,
    map_div: '#gmap-menu',
    controls_type: 'list',
    controls_on_map: false
}).Load();

 
</script>
<script src="<?=$theme_url;?>/js/captcha.js"></script> 
 <!-- <script src="<?=$theme_url?>/smallimap/js/contrib/modernizr-2.6.0.min.js"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/jquery.smallipop-0.3.0.min.js" type="text/javascript"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/suntimes.js"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/renderframe.js"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/color-0.4.1.js" type="text/javascript"></script>

    <script src="<?=$theme_url?>/smallimap/js/world.js" type="text/javascript"></script>
    <script src="<?=$theme_url?>/smallimap/js/smallimap.js" type="text/javascript"></script>
    <script src="<?=$theme_url?>/smallimap/js/demo.js" type="text/javascript"></script>-->
    
<?php $this->template->contentEnd();  ?> 
