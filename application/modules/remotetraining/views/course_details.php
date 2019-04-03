<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/Eacademy.css"/>
<style>
	
	video {
    display: inline-block;
    vertical-align: baseline;
    object-fit: unset;
    width: 396px;
    height: 271px;
    /* object-fit: cover; */
}
@media screen and (max-width: 1024px){
	video{
		width: 100%;
	}
}
@media only screen and (max-width: 1024px) and (min-width: 769px)  {
	.container{
		padding: 0;
	}
}
#slideshow li {
    list-style-type: none;
}
.bx-viewport, .bx-viewport img {
    min-height: 250px;
}
.bx-viewport{
    width: auto!important;
    height: auto!important;
    min-height: 200px;
}
.bx-pager { text-align: center; }
.bx-pager-item { display: inline-block; margin: 0 10px; }
.bx-pager-item .active { color: #F08A22; }
.bx-prev { float: left; }
.bx-next { float: right; }
/*.bx-prev:before{content: '\f101';} */
#slide-counter {
	/*margin: 15px 0 0 0;*/
	text-align: center;
	font-size: 14px;
	color: #a5c049;
}
.consu-table>.table>tbody>tr>td, .consu-table>.table>tbody>tr>th, .consu-table>.table>tfoot>tr>td, .consu-table>.table>tfoot>tr>th, .consu-table>.table>thead>tr>td, .consu-table>.table>thead>tr>th {
    border-top: 1px solid #ddd0;
    padding-top: 0;
    line-height: 22px;
    padding-bottom: 19px;
	padding-left: 0;
}
.row {
    margin-right: 0px;
    margin-left: -5px;
}
.review-block .col-sm-2 img {
    height: 70px;
    margin-top: 12px;
}
.review-block-rate {
    margin-top: 5px;
}
.review-block .row{
    padding: 10px 0;
}
</style>
<?php echo $this->template->contentEnd();	?> 
<div class="cons-details course-details">
	<div class="container-fluid myprofile-bg dahboard-bg">
	  	<div class="container">
		  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
				<h2><?php echo $course_data['name'] ?></h2>
				<p><?php echo $course_data['sub_title'] ?></p>
			</div>
	  	</div>
	</div>
	<div class="clearfix"></div>
	<div class="container-fluid used-machines-nav">
	  	<div class="container">
		  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
		      <ul class="tab_h">
				<li><a href="#desc">Description</a></li> 
				<li>|</li> 
				<li><a href="#keyfeature">Key Features</a> </li>
		        <li>|</li>
		        <li><a href="#CourseContent">Course Content</a></li>
		        <li>|</li> 
		        <li><a href="#Trainers">Trainers</a></li>
		        <li>|</li>  
		        <li><a href="#faq">FAQs</a></li>
		        <li>|</li> 
		        <li style="padding:0px"><a href="#Reviews">Reviews</a></li>
		        <li>|</li> 
		      </ul>
		      <div class="clearfix"></div><hr/>
		    </div>
	  	</div><!-- /.container --> 
	</div>
	<div class="container">
	  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
		  	<div class="feature-this-month-bg" id="desc">
				<p class="rcomment readmore">
				<?php 
					$text = strhtmldecode($course_data['description']);
					echo $text = strip_tags($text);
		// echo $text=str_ireplace('</p>','',$course_data['description']);    
				 ?>
				</p>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="container detail_heading">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
			<div class="" id="keyfeature">
				<?php 	// display messages
				if(hasFlash("ErrorMsg"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("ErrorMsg"); ?>
				</div>
				<?php }	?>
			  	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padd-0 consu-table ">
					<h2 style="margin-top: 20px;margin-bottom: 14px;">Key Features</h2>
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
								<td>: Certificate of completion</td>
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
					
			  	</div>
			  	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padd-8 consu-table" style="padding-top:0">
			  		<h2>Photos</h2>
						<div>
						<ul id="slideshow">
						  <li><img src="<?php echo $theme_url?>/images/123.jpg" width="100%" style="min-height: 187px; height:240px; margin-bottom: 10px;"/></li>
							<li><img src="<?php echo $theme_url?>/images/Application_support.jpg" width="100%" style="min-height: 187px; height:240px; margin-bottom: 10px;"/></li>
						</ul> 
						<div id="slide-counter"></div>
						
			  		</div>
			  	</div>
			  	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 padd-8 consu-table" style="padding-top:0">
			  		<h2>Video</h2>
					<video width="100%" height="auto" controls>
					  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
					  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
					  	Your browser does not support the video tag.
					</video>
			  	</div>
				<hr/>
				<div class="clearfix"></div>
			</div>
			<div class="" id="CourseContent">
				<div class="course-content  ">
					<h2>Course Content</h2>
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
				</div><hr/>
				<div class="clearfix"></div>
			</div>
			<div class="" id="Trainers">
				<h2>Trainers</h2>
				<?php if($course_data['u_name']){?>
					<h2>Meet Some of Your Trainers	</h2> 
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 padd-8">
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
					<div class="clearfix"></div><br/>
					</div>
				<?php }?>	
					<center>
						<button class="btn adv-search btn_orange">View more</button>
					</center>
					<br/>
				<div class="clearfix"></div>
			</div> 
		</div>
	</div>
	<div class="" id="recentlyViewed">
		<div class="container-fliud r-programming recent-view">
		  	<div class="container">
				<div class="col-sm-12 padd-0">
					<h2>Recently Viewed Trainers</h2>
				  	<ul class="cadcam">
					  	<li id="" >
						  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
								<div class="amit-text text-center">
									<span class="amit-das-text">Amit Das</span><br/>
									<span class="certified">Certified Public Bookkeeper</span>
								</div>
							</a>
						</li>
						<li id="" >
						  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
								<div class="amit-text text-center">
									<span class="amit-das-text">Amit Das</span><br/>
									<span class="certified">Certified Public Bookkeeper</span>
								</div>
							</a>
						</li> 
						<li id="" >
						  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
								<div class="amit-text text-center">
									<span class="amit-das-text">Amit Das</span><br/>
									<span class="certified">Certified Public Bookkeeper</span>
								</div>
							</a>
						</li>
						<li id="" >
						  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
								<div class="amit-text text-center">
									<span class="amit-das-text">Amit Das</span><br/>
									<span class="certified">Certified Public Bookkeeper</span>
								</div>
							</a>
						</li>
						<li id="" >
						  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
								<div class="amit-text text-center">
									<span class="amit-das-text">Amit Das</span><br/>
									<span class="certified">Certified Public Bookkeeper</span>
								</div>
							</a>
						</li>
						<li id="" >
						  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
								<div class="amit-text text-center">
									<span class="amit-das-text">Amit Das</span><br/>
									<span class="certified">Certified Public Bookkeeper</span>
								</div>
							</a>
						</li>
						<li id="" >
						  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
								<div class="amit-text text-center">
									<span class="amit-das-text">Amit Das</span><br/>
									<span class="certified">Certified Public Bookkeeper</span>
								</div>
							</a>
						</li>
				  	</ul>                        
				</div>
		  	</div>
		</div>
	</div>
	<div class="container detail_heading">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
			<div class="container-fliud ">
	<div class="container">
		<div class="col-sm-12 padd-0">
			<h2>Trainers Featured This Month</h2>
			<div class="last-sec">
				<div class="col-sm-2 col-md-1 padd-0">
					<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-responsive" style="border-radius: 50%;height: 70px;width: 70px;">
				</div>
				<div class="col-sm-10 col-md-11 padd-0">
					<p>Swapnali  is an energetic and passionate leader, technologist, and consultant with over 10 years of strategic planning, tactical centered implementation, and management consulting experience. Joshua utilizes proven qualitative and analytical skills driven by business objectives and up to date technology.</p>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div>
<div class="clearfix"></div>
			<div class="" id="faq">
				<h2>FAQs</h2>
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
					<hr/>
				<div class="clearfix"></div>
			</div>
			<div class="" id="Reviews">
				<h2 style="margin-bottom:0">Reviews</h2>
						<div class="review-block">
						<?php if($commentList){  
							foreach($commentList as $rowComment){?>
							<div class="row">
								<div class="col-sm-2 padd-0">
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
								<div class="col-sm-3 padd-0">
									<div class="review-block-rate pull-right">
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
						<?php }}else{ ?>
							<h3>No reviews available for this course..!!</h3>
						<? } ?> 
						</div>
					<!-- <center>
						<button class="btn adv-search btn_orange">Read More</button>
					</center> -->
					<hr/>
				<div class="clearfix"></div>
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
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
</div> 
<style type="text/css">
	.checkbox label.error{
    color: red;
   padding-left: 0;
    position: absolute;
    top: 25px;
}
</style>
<div id="course_enroll_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title">Course Enrollment</h2></center>
      </div>
      <div class="modal-body ">
		  <div class="border_bot col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
				<form class="form-horizontal" name="#" id="course_enroll_form" method="post" action="<?php echo site_url()."eacademy/course_enrollment/"?>">
					<div class="form-group ">
						<div class="col-sm-6 col-xs-12">
							<input type="text" class="form_bor_bot lettersOnly" id="firstname" name="firstname" value= "<?php echo $userData['u_name']?>" placeholder="Name" required><span class="compulsary">*</span>
						</div>
						<div class="col-sm-6 col-xs-12">
						  	<input type="text" class="form_bor_bot numbersOnly" id="phone" name="phone" minlength="10" maxlength="10" value= "<?php echo $userData['u_mobileno']?>" placeholder="Phone Number" required><span class="compulsary">*</span>
						</div>
					</div>
				  <div class="form-group ">
					  <div class="col-sm-6 col-xs-12">
						  <input type="text" class="form_bor_bot" id="company_name" name="company_name" value="<?php echo $userData['user_company_name']?>" placeholder="Company Name" required><span class="compulsary">*</span>
					  </div>
					  <div class="col-sm-6 col-xs-12">
						  <input type="email" class="form_bor_bot" id="email" name="email"  value="<?php echo $userData['u_email']?>" placeholder="Email" required><span class="compulsary">*</span>
					  </div>
				  </div>
				  <div class="form-group ">
					  <div class="col-sm-6 col-xs-12">
						  <input type="text" class="form_bor_bot numbersOnly" id="participant_no" name="participant_no" value="1" placeholder="Number of Participants" required>
					  </div>
					    
					  <div class="col-sm-6 col-xs-12">
						  <input type="text" class="form_bor_bot" id="totalPrice" name="totalPrice" value="<?php echo $course_data['course_amount']?>" Placeholder="Price" readonly> 
					  </div>
				  </div>
				  <div class="form-group ">
					  <div class="col-sm-6 col-xs-12">
						  <input type="text" class="form_bor_bot" id="CstartDate" name="#" value="<?php echo date_dmy($course_data['course_start_date'])?>" placeholder="DD/MM/YYYY" readonly>
					  </div>
					  <div class="col-sm-6 col-xs-12">
						  <input type="text" class="form_bor_bot" id="CaD" name="#" value="CaD" readonly> 
					  </div>
				  </div>
				  <div class="form-group ">
					  <div class="col-sm-6 col-xs-12">
						  <input type="text" class="form_bor_bot" id="CName" name="#" value="<?php echo $course_data['name']?>" placeholder="Course Name" readonly>
					  </div>
					  <div class="col-sm-6 col-xs-12">
						  <input type="text" class="form_bor_bot" id="CLevel" name="#" value="<?php echo $course_data['course_level']?>" placeholder="Course Level" readonly> 
					  </div>
				  </div>
				  <div class="form-group">
						<div class="col-sm-6 col-xs-12">
							<img src="" alt="Random letters" id="captcha" style="margin-top: "/>
							<span style="float: right;font-size: 25px;padding: 25px 50px 0 0"><a href='javascript: captcha_refresh();' data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></span>
						</div>
						<div class="col-sm-6 col-xs-12">
							<label for='message'>Enter the code here </label>
							<br>
							<input id="captcha_image" name="captcha" class="form_bor_bot" type="text"><span class="compulsary">*</span>
						</div><br/>
						<!-- Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh. -->
						<input type="hidden" name="otp_no" id="otp_no" value="<?php echo $otp_no; ?>">
				  </div>
				  <div class="form-group">
						<div class="checkbox">
						  <label><input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" /><span class="red">*</span> I accept privacy policy
						  </label>
						</div>
				  </div>
				  <div class="clearfix"></div><br/><br/>
				  <div class="form-group">
						<div class="col-sm-12 col-xs-12">
							<input type="hidden" name="course_start_date" id="course_start_date" value="<?php echo $course_data['course_start_date']; ?>">
							<input type="hidden" name="course_start_time" id="course_start_time" value="<?php echo $course_data['course_start_time']; ?>">
							<input type="hidden" name="productinfo" id="productinfo" value="<?php echo $course_data['name']; ?>">
							<input type="hidden" name="course_end_date" id="course_end_date" value="<?php echo $course_data['course_end_date']; ?>">
							<input type="hidden" name="course_end_time" id="course_end_time" value="<?php echo $course_data['course_end_time']; ?>">
							<input type="hidden" name="course_id" id="course_id" value="<?php echo $course_data['cid']; ?>">
							<input type="hidden" name="course_amount" id="course_amount" value="<?php echo $course_data['course_amount']; ?>">
							<center><input type="submit" name="btnCourseEnrollment" id="btnCourseEnrollment" class="btn btn_orange" value="Go to Payment" /></center>
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
<script src="<?=$theme_url?>/js/jquery.bxslider.js"></script>
<script language="javascript" type="text/javascript">
	$("ul").find("a").click(function(e) {
   // e.preventDefault();
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
<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  --> 
<script>  
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery.validator.addMethod("valEmail1", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');

$('#course_enroll_modal').on('hidden.bs.modal', function () {
    $('#course_enroll_form').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
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
					valEmail1:true
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

	
/*** image slider ***/	
		(function($){
		$(document).ready(function(){

	            //bxslider
$('#slide-counter').prepend('<strong class="current-index"></strong>/');

var slider = $('#slideshow').bxSlider({
	auto: true,
	pager:false,
	onSliderLoad: function (currentIndex){
		$('#slide-counter .current-index').text(currentIndex + 1);
	},
	onSlideBefore: function ($slideElement, oldIndex, newIndex){
		$('#slide-counter .current-index').text(newIndex + 1);
	}
});

$('#slide-counter').append(slider.getSlideCount());

			});
				 
		})(jQuery);
		
</script>
<script src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>
<script type="text/javascript">
	//	CADCAM
$(window).load(function() {
	$('.cadcam').each(function(){
	$(this).flexisel({
		visibleItems: 5,
		itemsToScroll: 1,         
		autoPlay: {
			enable: false,
			interval: 5000,
			pauseOnHover: true
		},

		responsiveBreakpoints: { 
			portrait: { 
				changePoint:480,
				visibleItems: 1,
				itemsToScroll: 1
			}, 
			landscape: { 
				changePoint:639,
				visibleItems: 2,
				itemsToScroll: 2
			},
			tablet: { 
				changePoint:769,
				visibleItems: 3,
				itemsToScroll: 3
			}
		}				
	});
});
}); 
</script>
		
<?php echo $this->template->contentEnd();	?> 