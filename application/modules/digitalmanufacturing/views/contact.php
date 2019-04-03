<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" href="<?=$theme_url?>/smallimap/css/contrib/jquery.smallipop-0.3.0.min.css" type="text/css" media="all" />
<link rel="stylesheet" href="<?=$theme_url?>/smallimap/css/contrib/animate.min.css" type="text/css" media="all" />
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
 <img src="<?php echo $theme_url?>/images/contact-img.jpg" width="100%" class="img-responsive bnr-images">
 </div>
<div class="container">
  <center><h2>Contact Us</h2></center>
  <div class="col-sm-8 padd-0">
      <div class="border_bot col-md-12 col-sm-12 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
          <form class="form-horizontal" name="contact" id="contact" method="post" action="contact.php">
              <div class="form-group ">
                <div class="col-sm-6">
                  <input type="text" class="form_bor_bot" id="Name" name="Name" placeholder="Full Name"><span class="compulsary">*</span>
                </div>
                <div class="col-sm-6">
                  <input type="text" class="form_bor_bot" id="Company" name="Company" placeholder="Company Name"><span class="compulsary">*</span>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <input type="text" class="form_bor_bot numbersOnly" id="Phone" name="Phone" minlength="10" maxlength="10" placeholder="Phone Number"><span class="compulsary">*</span>
                </div>
                <div class="col-sm-6">
                  <select name="Country" id="Country" class="form_bor_bot">
                      <option value="">Select Country</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                  </select><span class="compulsary">*</span>
                </div>
              </div>
              <div class="form-group">
                  <div class="col-sm-6">
                    <select name="State" id="State" class="form_bor_bot">
                      <option value="">Select State</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select><span class="compulsary">*</span>
                  </div>
                  <div class="col-sm-6">
                    <select name="City" id="City" class="form_bor_bot">
                      <option value="">Select City</option>
                      <option value="A">A</option>
                      <option value="B">B</option>
                    </select><span class="compulsary">*</span>
                  </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <input type="text" class="form_bor_bot" id="Email" name="Email" placeholder="Email"><span class="compulsary">*</span>
                </div>
                <div class="col-sm-6">
                  <select name="Subject" id="Subject" class="form_bor_bot">
                    <option value="">Select Subject</option>
                    <option value="A">General Enquiry</option>
                    <option value="B">Sales</option>
                    <option value="B">Service</option>
                  </select><span class="compulsary">*</span>
                </div>
              </div>
              <div class="form-group">
                 <div class="col-sm-12">
                   <textarea rows="4" cols="50" name="Message" id="Message" class="form_bor_bot" placeholder="Message"></textarea><span class="compulsary">*</span>
                 </div>
              </div>
              <div class="form-group col-sm-12 text-center">
            	  <center><input type="submit" name="submit" id="submit" class="btn input-form contact-submit btn_orange" value="Submit" /></center>
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
<script src="<?=$theme_url?>/js/maplace.min.js"></script>  
<script>  
new Maplace({
    locations: LocsAB,
    map_div: '#gmap-menu',
    controls_type: 'list',
    controls_on_map: false
}).Load();

  jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#contact").validate({
   rules: {  
        Name:{
          required:true
        },
        Company:{
          required:true
        },
        Email:{
          required:true,
          valEmail:true
        },
        Phone:{
          required:true
        },
        Country:{
          required:true
        },
        State:{
          required:true
        },
        City:{
          required:true
        },
        Subject:{
          required:true
        },
        Message:{
          required:true
        },
      },
      messages: { 
        Name:{
          required:"Please enter name"
        },
        Company:{
          required:"Please enter company name"
        },
        Email:{
          required:"Please enter email"
        },
        Phone:{
          required:"Please enter Phone number"
        },
        Country:{
          required:"Please select country"
        },
        State:{
          required:"Please select state"
        },
        City:{
          required:"Please select city"
        },
        Subject:{
          required:"Please select subject"
        },
        Message:{
          required:"Please enter message"
        },
      }
    }); 
</script>

 
    <script src="<?=$theme_url?>/smallimap/js/contrib/modernizr-2.6.0.min.js"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/jquery.smallipop-0.3.0.min.js" type="text/javascript"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/suntimes.js"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/renderframe.js"></script>
    <script src="<?=$theme_url?>/smallimap/js/contrib/color-0.4.1.js" type="text/javascript"></script>

    <script src="<?=$theme_url?>/smallimap/js/world.js" type="text/javascript"></script>
    <script src="<?=$theme_url?>/smallimap/js/smallimap.js" type="text/javascript"></script>
    <script src="<?=$theme_url?>/smallimap/js/demo.js" type="text/javascript"></script>
<?php $this->template->contentEnd();  ?> 
