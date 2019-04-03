 <?php $this->template->contentBegin(POS_TOP);?>
<style>
p{
	font-size: 13px!important;
    line-height: 20px;
	min-height: auto!important;
}
</style>
<?php $this->template->contentEnd();  ?> 


<div class="padd-top">
<div class=""><img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/aboutus-bnr.jpg"></div>
</div>
<div class="container section-pad">
  <center>
    <h1> About Us </h1>  
  </center>
    <p>TERANEX is a digital platform that addresses the needs of mechanical engineering industry in a holistic manner. Using technology, it transforms the current business practices of manufacturing industry by providing it with seamless sales and purchase experience on a single integrated platform. Manufacturers can not only sell their production capacities but also avail manufacturing solutions online ranging from procurement of machines, spare parts, toolings and raw material inputs to critical post-sales services such as training, consulting, programming, application and service support. TERANEX also runs an online forum to connect manufacturers with each other via discussion threads, blogging and operation of goal-oriented communities. Furthermore, it provides customers with the opportunity to participate in industrial live events globally from the convenience of their own space.</p>
</div>
<div class="container">
      <center>
          <h2> Meet Our Team </h2>
      </center>
      <center>
          <div class="team-padd-bott">
              <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-1.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>Soumitra Joshi</h3>
                      <p>President & Chief Executive Officer</p>
        			         <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>
              <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-2.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>Sarah Johns</h3>
                      <p>Chief Financial Officer</p>
        			        <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>
              <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-3.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>Don Bradman</h3>
                      <p>Regional Engineer</p>
        			        <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>
              <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-4.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>George Sanders</h3>
                      <p>Chief Sales Manager</p>
        			        <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>
              <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-5.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>Ron Lesley</h3>
                      <p>President & Chief Executive Officer</p>
          			      <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>
          </div>
      </center>
    	
      <center class="full-width pull-left"><h2> Advisory board  </h2></center>
      <div class="row team-padd-bott">
          <div class="col-sm-3"> 
  		        <!--  <img src="<?php echo $theme_url?>/images/team-5.jpg" class="img-responsive"> -->
    		      <img src="https://dummyimage.com/300x300/000/fff" class="img-responsive">
              <div class="team-text">
                  <h3>Joerg Kienast</h3>
                  <p>President & Chief Executive Officer</p>
      			      <a href="#"><i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i></a>
              </div>
          </div>
          <div class="col-sm-3"> 
  		          <!--  <img src="<?php echo $theme_url?>/images/team-6.jpg" class="img-responsive"> -->
  		        <img src="https://dummyimage.com/300x300/000/fff" class="img-responsive">
              <div class="team-text">
                  <h3>Prof. Dr. Ing Arun k. Gairola</h3>
                  <p>President & Chief Executive Officer</p>
      			      <a href="#"><i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i></a>
              </div>
          </div>
          <div class="col-sm-3">
  		        <!--  <img src="<?php echo $theme_url?>/images/team-6.jpg" class="img-responsive"> -->
  		        <img src="https://dummyimage.com/300x300/000/fff" class="img-responsive">
              <div class="team-text">
                  <h3>Michel John</h3>
                  <p>President & Chief Executive Officer</p>
      			      <a href="#"><i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i></a>
              </div>
          </div>
          <div class="col-sm-3"> 
  		        <!--  <img src="<?php echo $theme_url?>/images/team-6.jpg" class="img-responsive"> -->
  		        <img src="https://dummyimage.com/300x300/000/fff" class="img-responsive">
              <div class="team-text">
                  <h3>David Johnson</h3>
                  <p>President & Chief Executive Officer</p>
      			      <a href="#"><i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i></a>
              </div>
          </div>
      </div>
      <div class="clearfix"></div>
</div>


<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#register").submit(function(){
			
	if($("#Email").val() == "" && $("#MobileNo").val() == "")
	{
		alert("Email or Mobile No. is required");
		return false;
	}
	if($("#Email").val() != "")
	{
		var b = $("#Email").val();
		var atpos=b.indexOf("@");
		var dotpos=b.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
		{
		  alert("Not a valid e-mail address");
		  return false;
		}
	}
	if($("#MobileNo").val() != "")
	{
		var check_mobile = $("#MobileNo").val();
		var expression = /\D/;
		if(expression.test(check_this))
		{
			alert("Contact number should be in digits only");
		}
	}

	if($("#Passcode").val() == "")
	{
		alert("Password cannot be empty");
		return false;
	}
		
	if($("#CustomerType").val() == "")
	{
		alert("Customer Type is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to register");
	return yesno;
	});
});
</script>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>