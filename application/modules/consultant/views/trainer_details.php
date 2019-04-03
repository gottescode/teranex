<?php $this->template->contentBegin(POS_TOP);

$uid = $this->session->userdata('uid');

?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/consultant.css"/>

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
    padding-bottom: 27px;
	padding-left: 0;
}
</style>
 <?php echo $this->template->contentEnd();	?>
<div class="cons-details">
	<div class="myprofile-bg dahboard-bg">
	  	<div class="container">
		  	<div class="col-xs-12 col-sm-12 padd-0">
				<!-- <img src="<?=site_url().'/uploads/consultantFile/'.$consultant_data['c_pictures']?>" class="img-responsive pull-left" style="margin-right: 20px;"> -->
				<span class="col-xs-3 col-sm-1 padd-0">
					<?php if($consultant_data['u_avatar']){ ?>
						<img src="<?php echo site_url()."/uploads/customer/".$consultant_data['u_avatar']?>"  class="img-rounded img-responsive"/>
					<?php   }else{?>
							<img src="<?php echo theme_url()."/images/PersonPlaceholder.png"?>"  class="img-rounded img-responsive"/>
						<?php }?> 
				</span>
				<span class="col-xs-9 col-sm-11 padd-0 couns-heading pad-l-25">
						<h2><?php echo $consultant_data['u_name']?></h2>
						<p>NYU Senior Lecturer | Management Consultant</p>
				</span>
			</div>
	  	</div>
  	</div>
  <!-- /.container --> 
<!-- /.myprofile-bg -->
	<div class="container-fluid used-machines-nav">
	 	<div class="container m-padd-0">
		  	<div class=" col-sm-12 padd-0">
				<div class=" col-sm-12 padd-0">
					<ul class="tab_h tab_h2">
						<li><a href="#c_description">Overview</a></li> 
						<li>|</li> 
						<li><a href="#c_glance">At a Glance</a> </li>
						<li>|</li>
						<li><a href="#t_wrkexp"> Work Experience</a></li>
						<li>|</li>
						<li><a href="#c_speciality">Consultant Specialties</a></li>
						<li>|</li> 
						<li><a href="#c_review">Reviews</a></li>
						<li>|</li>  
						<li style="padding: 0;"><a href="#c_book">Book Appointment</a></li>
						<li>|</li>  
					</ul>
				</div>
		    </div>
		    <div class="clearfix"></div>
		    	<hr/>
	  	</div>
	  <!-- /.container --> 
	</div>
<!-- /.myprofile-bg -->
						
	<div  class="feature-this-month-bg" id="c_description">
		<div class="container m-padd-0">
			<div class="clearfix"></div>
								<?php 	// display messages
								if(hasFlash("dataMsgSuccess"))	{	?>
									<div class="alert alert-success alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <?php echo getFlash("dataMsgSuccess"); ?>
									</div>
									<?php	}	?>
						 <div class="clearfix"></div>
		  	<div class=" col-sm-12 padd-0">
				<p class="rcomment readmore"><?php echo $consultant_data['profile_summary'];?></p>
			</div>
		</div>
	</div>
<div class="clearfix"></div>
	<div class="detail_heading ">

		<div id="c_glance">
			<div class="container">

			
			  	<div class="col-sm-4 padd-8 consu-table" style="padding-left: 0;">
					<h2 class="padd-l-r-15" style="margin-top:12px; margin-bottom: 15px;">At a Glance</h2>
					<table class="table tbl-responsive">
						<tr>
							<td>Qualification(s)<span class="pull-right">:</span></td>
							<td><?php //echo $consultant_data['qualification'];?>BE</td>
						</tr>
						<tr>
							<td>MBA(Strategy) <span class="pull-right">:</span></td>
							<td>Cambridge University</td>
						</tr>
						<tr>
							<td>Language(s)<span class="pull-right">:</span></td>
							<td><?php //echo $consultant_data['language'];?>English, Spanish, German</td>
						</tr>
						<tr>
							<td>Location<span class="pull-right">:</span></td>
							<td><?php //echo $consultant_data['current_location'];?>India</td>
						</tr>
						<tr>
							<td>Rate<span class="pull-right">:</span></td>
							<td> $<?php //echo $consultant_data['c_per_hour_cost'];?> 20 / hour</td>
						</tr>
						<tr>
							<td style="padding-bottom:0; line-height: 26px;">CV / Resume<span class="pull-right">:</span></td>
							<td style="padding-bottom:0; line-height: 26px;"><?php  if($consultant_data['user_resume']!=''){ echo "<a href='".site_url()."uploads/customer/".$consultant_data['user_resume']."' target='_blank'>Click Here</a>";} else{ echo "Resume not available";}?></td>
						</tr>
					</table>
				</div>
				
			  	<div class="col-sm-4 padd-8 consu-table" style="padding-top:0">
			  		<h2>Photos</h2>
						<div>
						<ul id="slideshow">
						  <li><img src="<?php echo $theme_url?>/images/123.jpg" width="100%" style="min-height: 187px; height:240px; margin-bottom: 10px;"/></li>
							<li><img src="<?php echo $theme_url?>/images/Application_support.jpg" width="100%" style="min-height: 187px; height:240px; margin-bottom: 10px;"/></li>
						</ul> 
						<div id="slide-counter"></div>
			  		</div>
			  	</div>
			  	<div class="col-sm-4 padd-8 consu-table" style="padding-top:0">
			  		<h2>Video</h2>
					<video width="100%" height="auto" controls>
					  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
					  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
					  	Your browser does not support the video tag.
					</video>
			  	</div>
				<div class="clearfix"></div><hr/>
			</div>
		</div>
		
		<div id="t_wrkexp">
			<div class="container">
				<div class=" col-sm-12 padd-0 work_experience">
					<h2>Work Experience</h2>
					<?php if($workList){
						foreach($workList as $rowWork){?>	
					<div class="lern">
						<h3><?php echo $rowWork['title'];?></h3>
						<p><?php echo $rowWork['exp_details'];?></p>
					</div>
					<?php }}?> 
				</div>
				<div class="clearfix"></div><hr/>
			</div>
		</div>
			
		<div id="c_speciality">
			<div class="container">
				<div class=" col-sm-12 padd-0 consultant_speclti">
					<h2>Consultant  Specialties</h2>
					<h3><a>MAY 2017 – CURRENT</a></h3>
					<p>
					<span>Business Development</span>
					Joshua has extensive experience with Stelmac as a consultant for business development and has worked for companies such as Microsoft and Oracle as a freelance specialist.
					</p>
					<h3><a>MAY 2017 – CURRENT</a></h3>
					<p>
					<span>Business Development
					</span>
					Joshua has extensive experience with Stelmac as a consultant for business development and has worked for companies such as Microsoft and Oracle as a freelance specialist.
					</p>
				</div>
				<div class="clearfix"></div><hr/>
			</div>
		</div>
		<div id="c_review">
			<div class="container">
				<div class="col-sm-12 padd-0">
					<h2>Reviews</h2>
							<div class="review-block">
							<?php if($commentList){
								foreach($commentList as $rowComment){?>
								<div class="row">
									<div class="col-sm-2">
										<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
									</div>
									<div class="col-sm-7">
										<div class="review-block-name"><a href="#"><?php echo $rowComment['u_name']?></a></div>
										<div class="review-block-title"><?php echo $rowComment['comment_head']?></div>
										<div class="review-block-description"><?php echo $rowComment['user_comment']?></div>
									</div>
									<div class="col-sm-3">
										<div class="review-block-rate">
											<ul  class="list-unstyled">
											  <?php $rateIng=$rowComment['course_rating'];
											  for($i=1;$i<=5;$i++) {
											  $selected = "";
											  if(!empty($rateIng) && $i<=$rateIng) {
												$selected = "selected";
											  }
											  ?>
											  <span class='spanStar <?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"  >&#9733;</span>  
											  <?php }  ?>
											 
											</ul>
										</div>
									</div>
								</div>
								<?php }}?>
							</div>
				</div>
				
			</div>
		</div>
		<div class="row mar-20" id="c_book">
			<center>
				<!-- <a href="<?php echo site_url()."consultant/bookAppointment/".$consultant_data['consultant_id'];?>"><button class="btn adv-search">Book Appointment</button></a> 
				<a data-toggle="modal" data-target="#book_appointment_modal" class="btn btn_orange" onclick="open_modal();">Book Appointment</a>-->
				<?php if($uid){
				?>
				
					<!-- <a data-toggle="modal" data-target="#book_appointment_modal" class="btn btn_orange" onclick="open_modal();">Book Appointment</a>-->
			
			<? }else{ ?>
				<center>
					<!-- 	<a href="" class="btn btn_orange" data-toggle="modal" data-target="#signinModal">Book Appointment</a> -->
				</center>
			<?php }
			?>
			</center>
		</div>
	</div>
</div> 
<?php 
?>
<div id="book_appointment_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title">Book Appointment</h2></center>
      </div>
      <div class="modal-body">
      	<div class="border_bot col-sm-12 ">
       		<form class="form-horizontal" name="c_book_appoinment" id="c_book_appoinment" method="post" action="#">
       			  <div class="form-group ">
       			  	<div class="col-sm-6">
       			  		<input type="text" class="form_bor_bot" id="u_name" name="u_name" placeholder="Name" value="<?php echo $consultant_data['u_name']; ?>" readonly>
       			  	</div>
       			  	<div class="col-sm-6">
       			  		<input type="text" class="form_bor_bot" id="education" name="education" value="<?php echo $consultant_data['education']; ?>" placeholder="Qualification" readonly>
       			  	</div>
				  </div>
				  <div class="form-group ">
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot lettersOnly" id="name" name="name" value= "<?php echo $customer_data['u_name']; ?>" placeholder="Full Name" required><span class="compulsary">*</span>
				  	</div>
				  	<div class="col-sm-6">
				  		<input type="email" class="form_bor_bot" id="email" name="email" value="<?php echo $customer_data['u_email'];?>" placeholder="Email" required><span class="compulsary">*</span>
				  	</div>
				  </div>
				  <div class="form-group ">
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot numbersOnly" minlength="10" maxlength="10" id="ph_no" name="ph_no" value="<?php echo $customer_data['u_mobileno'];?>" placeholder="Phone Number" required><span class="compulsary">*</span>
				  	</div>
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot" id="company_name" name="company_name" placeholder="Company Name" required><span class="compulsary">*</span>
				  	</div>
				  </div>
				  <div class="form-group ">
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot" id="topic_discussion" name="topic_discussion" placeholder="Topic to Discuss" required><span class="compulsary">*</span>
				  	</div>
				  	<div class="col-sm-6">
				  		<input type="text" class="form_bor_bot" id="datepicker" name="date_pref" placeholder="Date Preference" required readonly><span class="compulsary">*</span>
				  	</div>
				  </div>
				  <div class="form-group">
					 <center><input type="submit" name="btnAvailabilty" id="submit" class="btn btn_orange " value="Submit Request" /></center> 
				  </div>
					<input type="hidden"  id="consultant_id" name="consultant_id" value="<?php echo $consultant_data['userId']?>">
					<input type="hidden"  id="user_id" name="user_id" value="<?php echo $customer_data['uid']?>">
			</form>
			
		</div><div class="clearfix"></div><br/>
      </div>
    </div>

  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.bxslider.js"></script>
<script>
	$("ul").find("a").click(function(e) {
  //  e.preventDefault();
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top-120
    });
});
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
 <script type="text/javascript">
 	 $(function() {
               $("#datepicker").datepicker({ dateFormat: "yy-mm-dd", minDate: 0}).val()
       });
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
$("#c_book_appoinment").validate({
   rules: {  
				name:{
					required:true
				},
				company_name:{
					required:true
				},
				email:{
					required:true,
					valEmail:true
				},
				ph_no:{
					required:true
				},
				date_pref:{
					required:true
				},
				topic_discussion:{
					required:true
				},
			},
			messages: { 
				name:{
					required:"Please enter name"
				},
				company_name:{
					required:"Please enter company name"
				},
				email:{
					required:"Please enter email id"
				},
				ph_no:{
					required:"Please enter phone number"
				},
				topic_discussion:{
					required:"Please enter topic to discuss"
				},
				date_pref:{
					required:"Please select date preference"
				},
			}
		}); 


	function open_modal(){
	// Clear Form Validation Message
		var $formID = $('#c_book_appoinment');
	    $formID.validate().resetForm();
	    $formID.find('.error').removeClass('error');
	   // $('#c_book_appoinment :input[type="text"]').val('');	
	}
	
	
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
<?php echo $this->template->contentEnd();	?> 