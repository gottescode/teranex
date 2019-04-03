<div class="" style="margin-top: 80px;">
 <img src="<?php echo $theme_url?>/images/feedback-min.png" width="100%" class="img-responsive bnr-images">
 </div>
<div class="container">
    <div class="col-sm-offset-2 col-sm-8">
        <center><h2>Your feedback is important to us.</h2></center>
        <div class="border_bot col-md-12 col-sm-12 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
            <form class="form-horizontal" name="feedback" id="feedback" method="post" action="#" enctype="multipart/form-data">
                  <div class="form-group">
                      <input type="text" class="form_bor_bot" id="name" name="name" placeholder="Name"><span class="compulsary">*</span>
    			        </div>
                  <div class="form-group">
                      <input type="text" class="form_bor_bot" id="Email" name="Email" placeholder="Email"><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                     <textarea rows="4" cols="50" name="Message" id="Message" class="form_bor_bot" placeholder="Message"></textarea><span class="compulsary">*</span>
                  </div>
                <div class="form-group text-center">
              	  <input type="submit" name="submit" id="submit" class="btn btn_orange" value="Submit" />
                </div> 
            </form>
        </div>
    </div>
</div>
<div class="clearfix"></div><br/>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>
  jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#feedback").validate({
   rules: {  
        name:{
          required:true
        },
        Email:{
          required:true,
          valEmail:true
        },
        Message:{
          required:true
        },
      },
      messages: { 
        name:{
          required:"Please enter name"
        },
        Email:{
          required:"Please enter email address"
        },
        Message:{
          required:"Please enter message"
        },
      }
    }); 
</script>
<?php $this->template->contentEnd();  ?> 