<?php $this->template->contentBegin(POS_TOP);?>

<?php $this->template->contentEnd();  ?>
<section class="banner banner_image contact_us_banner align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>Contact Us</p>
                    <h1 class="basic-head"> Teranex</h1>
                </div>
            </div>
        </div>
    </div>
</section>

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


<section class="mrgn-top ">
    <div class="container">
        <div class="bx-shdw padd_all_50 white">
            <div class="row">
                <div class="col-md-6">
                    <div class="formalty_form">
                        <form class="form-horizontal" name="contact" id="contact" method="post" action="" enctype="multipart/form-data">
                            <!--<input type="text" placeholder="Full Name *" class="bx-shdw">-->
                            <input type="email" class="bx-shdw mrgn-top" id="email_id" name="email_id" placeholder="Email *">
                            <input type="text" class="bx-shdw mrgn-top" id="Phone" name="phone_no" minlength="10" maxlength="10" placeholder="Phone Number *">
                            <div class="col-md-12 subject_drpdwn padd_tb_50 ">
                                <div class="selct-box get_start contazt">
                                    <div class="arrow">
                                        <select name="subject" id="Subject" class="dropdow" >
                                            <option value="New">Getting Started</option>
                                            <option value="General Enquiry">General Enquiry</option>
                                            <option value="Sales">Sales</option>
                                            <option value="Service">Service</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <textarea name="message" id="message" cols="30" rows="3" placeholder="Message *" class="bx-shdw "></textarea>
                            <div class="row mrgn-top cpt_box">
                                <div class="col-lg-6 col-md-12">
                                    <div class="cptcha">
                                        <img src="" alt="Random letters" id="captcha" style="margin-top:5px; width: inherit; "/>
<!--                                        <span style="float: right;font-size: 25px;padding: 25px 50px 0 0"><a href='javascript: captcha_refresh();' data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></span>
-->                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <input type="text" id="captcha_image" name="captcha" placeholder="Enter Captcha Code *" class="bx-shdw capdtcha">
                                </div>
                            </div>
                            <div class="mrgn-top">
                                <button type="submit" name="btnSubmit" id="submit"  value="Submit" class="green-btn mrgn-top">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="padd_rl_50">
                        <div class="office_addres">
                            <ul class="adress ">
                                <li class="basic-head">Coporate Office</li>
                                <li><p>B-Win,4th Floor<br>statesman House,Barakhamba Road,<br>connaught Place,New Delgi,Delhi-110001</p></li>
                            </ul>
                            <ul class="adress mrgn-top">
                                <li class="basic-head">Coporate Office</li>
                                <li><p>B-Win,4th Floor<br>statesman House,Barakhamba Road,<br>connaught Place,New Delgi,Delhi-110001</p></li>
                            </ul>
                            <ul class="adress mrgn-top">
                                <li class="basic-head">Coporate Office</li>
                                <li><p>B-Win,4th Floor<br>statesman House,Barakhamba Road,<br>connaught Place,New Delgi,Delhi-110001</p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


 
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
