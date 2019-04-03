<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/Eacademy.css"/>
<?php echo $this->template->contentEnd();	?> 
<div class="cons-details course-details">
<div class="container-fluid myprofile-bg dahboard-bg">
  	<div class="container">
	  	<div class="col-sm-12">
			<span class="couns-heading">
				<h2><?php echo $course_data['name'] ?></h2>
				<p><?php echo $course_data['sub_title'] ?></p>
			</span>
		</div>
  	</div>
</div>
  <!-- /.container --> 
<!-- /.myprofile-bg -->
<div class="container-fluid used-machines-nav">
  <div class="container">
	  <div class="col-sm-offset-1 col-sm-10 pading_left_0 pading_right_0 ">
	      <ul class="tab_h">
			<li><a href="#desc">Description</a></li> 
			<li>|</li> 
			<li><a href="#keyfeature">Key Features</a> </li>
	        <li>|</li>
	        <li><a href="#CourseContent">Course Content</a></li>
	        <li>|</li> 
	        <li><a href="#Trainers">Trainers</a></li>
	        <li>|</li>  
	        <li><a href="#Reviews">Reviews</a></li>
	        <li>|</li> 
	        <li style="padding: 0;"><a href="#faq">FAQs</a></li>
	        <li>|</li> 
	      </ul>
	    </div>
	    <div class="clearfix"></div>
	    <hr/>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg -->
<div class="feature-this-month-bg" id="desc">
<div class="container">
  <div class="col-sm-12 pading_left_0 pading_right_0">
  	
		<p class="rcomment readmore">
		<?php 
			$text = strhtmldecode($course_data['description']);
			echo $text = strip_tags($text);
// echo $text=str_ireplace('</p>','',$course_data['description']);    
		 ?>
		</p>
	
</div>
</div>
</div>
<div class="container detail_heading">
<div class="row" id="keyfeature">
<?php 	// display messages
		if(hasFlash("ErrorMsg"))	{	?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("ErrorMsg"); ?>
			</div>
<?php }	?>
  <div class="col-sm-6 consu-table ">
	<h1>Key Features</h1>
	  <!-- <?php echo strhtmldecode($course_data['key_features']); ?>  -->
	 <table class="table tbl-responsive">
				<tr>
					<td>Pre-requisites</td>
					<td>: No prior pre-requisites</td>
				</tr>
				<tr>
					<td>Language</td>
					<td>: English</td>
				</tr>
				<tr>
					<td>Certification</td>
					<td>: Cerificate of completion</td>
				</tr>
				<tr>
					<td>Duration</td>
					<td>: 1 week</td>
				</tr>
				<tr>
					<td>Course Start Date & Time</td>
					<td>: <?php echo date_dmy($course_data['course_start_date'])."  ".$course_data['course_start_time'];?></td>
				</tr>
				<tr>
					<td>Course End Date & Time</td>
					<td>: <?php echo date_dmy($course_data['course_end_date'])."  ".$course_data['course_end_time'];?></td>
				</tr>
				<tr>
					<td>Course Cost</td>
					<td>: <?php echo  ($course_data['course_amount']) ;?></td>
				</tr>
			</table>
	 <!-- <div>
		 <p>Pre-requisites : No prior pre-requisites</p>
		 <p>Language : English</p>
		 <p>Certification : Cerificate of completion</p>
		 <p>Duration : 1 week</p>
		<p>Course Start Date & Time : <?php echo date_dmy($course_data['course_start_date'])."  ".$course_data['course_start_time'];?></p>
		<p>Course End Date & Time: <?php echo date_dmy($course_data['course_end_date'])."  ".$course_data['course_end_time'];?></p>
		<p>Course Cost: <?php echo  ($course_data['course_amount']) ;?></p>
	 </div> -->
  </div>
  <div class=" col-sm-6 consu-table">
  <?php if($course_data['video_link']){ ?>
	<video class="pull-right" width="100%" height="360" controls>
	  <source src="<?php echo site_url()."uploads/course/".$course_data['video_link']?>" type="video/mp4">
	  <source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
	  Your browser does not support the video tag.
	</video>
  <?php }?>
  </div>
</div><hr/>
<div class="row" id="CourseContent">
<div class="col-sm-12 course-content">
	<h1>Course Content</h1>
	<ul>
	<?php if($content_list){
		foreach($content_list as $rowContent){
		?>
	<li>
		<div class="block"></div><h3 class="mar-0"><?php echo $rowContent['title']?></h3>
			<p><?php echo strhtmldecode($rowContent['description'])?></p>
	</li>
	<?php }}?> 
	</ul> 
</div>
</div>
<hr/>
<div class="row" id="Trainers">
	<div class="col-sm-12">
	<?php if($course_data['u_name']){?>
		<h1>Meet Some of Your Trainers	</h1> 
		<div class="col-sm-12 padd-0">
			<div class="col-sm-3 padd-8">
				<div class="user-details">
					<div class="user-image">
						<?php if($course_data['u_avatar']){ ?>
									<img src="<?php echo site_url()."uploads/customer/".$course_data['u_avatar']?>"  class="img-rounded img-responsive" />
						<?php   }else{?>
							<img src="<?php echo site_url()."uploads/customer/user-default.png"?>"  class="img-rounded img-responsive" />
						<?php }?> 
					</div>
					<div class="user-info-block">
						<div class="user-heading">
							<h3><?php echo $course_data['u_name'];?></h3>
							<span class="help-block">CAD/CAD Instructor</span>
							<p>Amit has worked as a team leader for a digital company since 2007 and has made innovative progress within the industry. </p>
							<p class="lern mar-20-btm"><a href="<?= site_url()."eacademy/trainer_details/".$course_data['trainee_user_id']."/".formaturl($course_data['u_name']) ?>"  >View Details ></a></p>
						</div>
					</div>
				</div>
			</div>
		</div>
	<?php }?>	
	</div>
</div>
<div class="container padd-0 mar-20">
	<span class="lern pull-left full-width"><a href="" target="_blank" >View more ></a></span>
</div>
<hr/>
<div class="row" id="faq">
	<div class="col-sm-12">
		<h1>FAQs</h1>
		 <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		<?php if($faq_list){ $f=0;
			foreach($faq_list as $rowFaq){?>
        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                    <a role="button" data-toggle="collapse" data-parent="#accordion" href="#<?php echo "collapse".$f?>" aria-expanded="true" aria-controls="<?php echo "collapse".$f?>">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                        <?php echo $rowFaq['title']?>
                    </a>
                </h4>
            </div>
            <div id="<?php echo "collapse".$f?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="panel-body">
                     <?php echo strhtmldecode($rowFaq['description']);?>
                </div>
            </div>
        </div>
		<?php $f++;}}?>
       
    </div><!-- panel-group -->
	</div>
</div>
	<hr/>
<div class="row" id="Reviews">
	<div class="col-sm-12">
		<h1>Reviews</h1>
				<div class="review-block">
				<?php if($commentList){  
					foreach($commentList as $rowComment){?>
					<div class="row">
						<div class="col-sm-2">
							<?php if($rowComment['u_avatar']){?>
								<img src="<?php echo site_url()."uploads/customer/".$rowComment['u_avatar']?>" class="img-rounded img-responsive">
							<?php }else{?>
								<img src="<?php echo site_url()."uploads/customer/user-default.png"?>" class="img-rounded img-responsive">
							<?php }?>
						</div>
						<div class="col-sm-7">
							<div class="review-block-name"><a href="#"><?php echo ucwords($rowComment['u_name'])?></a></div>
							<div class="review-block-title"><?php echo $rowComment['comment_head']?></div>
							<div class="review-block-description"><?php echo $rowComment['user_comment']?></div>
						</div>
						<div class="col-sm-3">
							<div class="review-block-rate">
								<div class="star_rating22"> 
									<ul  class="list-unstyled">
									  <?php $rateIng =$rowComment["course_rating"];
									  for($i=1;$i<=5;$i++) {
									  $selected = "";
									  if(!empty($rateIng) && $i<=$rateIng) {
										$selected = "selected";
									  }
									  ?>
									  <span class='spanStar <?php echo $selected; ?>'  >&#9733;</span>  
									  <?php }  ?> 
								</div>
								
							</div>
						</div>
					</div>
				<?php }} else { ?>
							<h3>No reviews available for this course..!!</h3>
						<? } ?> 
				</div>
				<!--<div class="row">
					<div class="col-sm-offset-2 col-sm-7">
						<span class="lern"><a>Read More ></a></span>
					</div>
				</div>-->
	</div>
</div>
<div class="row mar-20">
<center>
	<?php if($this->session->userdata('uid')){
		$userid= $this->session->userdata('uid');
	 	$url = site_url()."/customer/api/findSingle/$userid";
		$userData =  apiCall($url, "get");
		$userData=$userData['result'];
		?>
	<a href="" data-toggle="modal" data-target="#course_enroll_modal"><button class="btn adv-search btn_orange">Enroll Now</button></a>
	<?php }else{?>
	<a href="" data-toggle="modal" data-target="#signinModal"><button class="btn adv-search btn_orange">Enroll Now</button></a>
	<?php }?>
</center>
</div>
</div>
</div> 
<!-- Modal -->

<div id="course_enroll_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title">Course Enrollment</h2></center>
      </div>
      <div class="modal-body ">
		  <div class="border_bot col-sm-12 padd-0">
				<form class="form-horizontal" name="#" id="course_enroll_form" method="post" action="<?php echo site_url()."eacademy/course_enrollment/"?>">
					<div class="form-group ">
						<div class="col-sm-6">
							<input type="text" class="form_bor_bot lettersOnly" id="firstname" name="firstname" value= "<?php echo $userData['u_name']?>" placeholder="Name" required><span class="compulsary">*</span>
						</div>
						<div class="col-sm-6">
						  	<input type="text" class="form_bor_bot numbersOnly" id="phone" name="phone" minlength="10" maxlength="10" value= "<?php echo $userData['u_mobileno']?>" placeholder="Phone Number" required><span class="compulsary">*</span>
						</div>
					</div>
				  <div class="form-group ">
					  <div class="col-sm-6">
						  <input type="text" class="form_bor_bot" id="company_name" name="company_name" value="<?php echo $userData['user_company_name']?>" placeholder="Company Name" required><span class="compulsary">*</span>
					  </div>
					  <div class="col-sm-6">
						  <input type="email" class="form_bor_bot" id="email" name="email"  value="<?php echo $userData['u_email']?>" placeholder="Email" required><span class="compulsary">*</span>
					  </div>
				  </div>
				  <div class="form-group ">
					  <div class="col-sm-6">
						  <input type="text" class="form_bor_bot numbersOnly" id="participant_no" name="participant_no" value="1" placeholder="Number of Participants" required>
					  </div>
					    
					  <div class="col-sm-6">
						  <input type="text" class="form_bor_bot" id="totalPrice" name="totalPrice" value="<?php echo $course_data['course_amount']?>" Placeholder="Price" readonly> 
					  </div>
				  </div>
				  <div class="form-group ">
					  <div class="col-sm-6">
						  <input type="text" class="form_bor_bot" id="#" name="#" value="<?php echo date_dmy($course_data['course_start_date'])?>" placeholder="DD/MM/YYYY" readonly>
					  </div>
					  <div class="col-sm-6">
						  <input type="text" class="form_bor_bot" id="#" name="#" value="CaD" readonly> 
					  </div>
				  </div>
				  <div class="form-group ">
					  <div class="col-sm-6">
						  <input type="text" class="form_bor_bot" id="#" name="#" value="<?php echo $course_data['name']?>" placeholder="Course Name" readonly>
					  </div>
					  <div class="col-sm-6">
						  <input type="text" class="form_bor_bot" id="#" name="#" value="<?php echo $course_data['course_level']?>" placeholder="Course Level" readonly> 
					  </div>
				  </div>
				 
				  
				  <div class="form-group">
						<div class="col-sm-6">
							<img src="" alt="Random letters" id="captcha" style="margin-top: "/>
							<span style="float: right;font-size: 25px;padding: 25px 50px 0 0"><a href='javascript: captcha_refresh();' data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></span>
						</div>
						<div class="col-sm-6">
							<label for='message'>Enter the code here </label>
							<br>
							<input id="captcha_image" name="captcha" class="form_bor_bot" type="text"><span class="compulsary">*</span>
						</div><br/>
						<!-- Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh. -->
						<input type="hidden" name="otp_no" id="otp_no" value="<?php echo $otp_no; ?>">
				  </div>
				  <div class="form-group">
						<div class="checkbox">
						  <label><span class="red">*</span><input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" /> I accept privacy policy
						  </label>
						</div>
				  </div>
				  <div class="form-group">
						<div class="col-sm-12">
							<input type="hidden" name="course_start_date" id="course_start_date" value="<?php echo $course_data['course_start_date']; ?>">
							<input type="hidden" name="course_start_time" id="course_start_time" value="<?php echo $course_data['course_start_time']; ?>">
							<input type="hidden" name="productinfo" id="productinfo" value="<?php echo $course_data['name']; ?>">
							<input type="hidden" name="course_end_date" id="course_end_date" value="<?php echo $course_data['course_end_date']; ?>">
							<input type="hidden" name="course_end_time" id="course_end_time" value="<?php echo $course_data['course_end_time']; ?>">
							<input type="hidden" name="course_id" id="course_id" value="<?php echo $course_data['cid']; ?>">
							<input type="hidden" name="course_amount" id="course_amount" value="<?php echo $course_data['course_amount']; ?>">
							<center><input type="submit" name="btnCourseEnrollment" id="submit" class="btn btn_orange" value="Go to Payment" /></center>
						</div>
				  </div>
				</form>
		  </div>
		  <div class="clearfix"></div><br/>
	  </div>
     
	  
    </div>

  </div>
</div>
 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
	$("ul").find("a").click(function(e) {
    e.preventDefault();
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top-120
    });
});
	
	function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}

$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#course_enroll_form").validate({
   rules: {  
				firstname:{
					required:true
				},
				lastname:{
					required:true
				},
				company_name:{
					required:true
				},
				email:{
					required:true,
					valEmail:true
				},
				phone:{
					required:true
				},
				participant_no:{
					required:true
				},
				captcha:{
					required:true
				},
			},
			messages: { 
				firstname:{
					required:"Please enter first name"
				},
				lastname:{
					required:"Please enter last name"
				},
				company_name:{
					required:"Please enter company name"
				},
				email:{
					required:"Please enter email id"
				},
				phone:{
					required:"Please enter phone number"
				},
				participant_no:{
					required:"Please enter number of participants"
				},
				captcha:{
					required:"Please enter proper captcha"
				},
			}
		}); 
$(document).ready(function() { 
	$( "#participant_no" ).change(function(e) { 
		var participant_no = $(this).val();
		var coursePrice='<?php echo $course_data['course_amount']?>';
		var totalPrice= parseInt(coursePrice)*parseInt(participant_no);
		$('#totalPrice').val(totalPrice);
	});
});		
var captchaUrl = "<?php echo base_url(); ?>index.php/captcha?page=courseEnrolll";
</script>
<script src="<?=$theme_url;?>/js/captcha.js"></script> 

<script>
//readmore
$(document).ready(function() {
	var showChar = 600;
	var ellipsestext = "...";
	var moretext = "Read More";
	var lesstext = "Show Less";
	$('.readmore').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});


</script>
		
<?php echo $this->template->contentEnd();	?> 