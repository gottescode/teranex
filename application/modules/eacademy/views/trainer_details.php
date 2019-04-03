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
.bx-controls-direction {
    margin-top: -3px;
}
.review-block .row-flex img {
    margin-top: 10px;
}
.review-block .col-sm-2 img {
    height: 80px;
}
</style>
<?php echo $this->template->contentEnd();	?> 
<div class="cons-details trainer_details">
	<div class="container-fluid myprofile-bg dahboard-bg">
		  <div class="container">
			  <div class="col-sm-12 padd-0">
					<!-- <img src="<?=site_url().'/uploads/consultantFile/'.$consultant_data['c_pictures']?>" class="img-responsive pull-left"style="margin-right: 20px;"> -->
					<div class="col-sm-12 no_padng">
						<span class="col-sm-1 no_padng"> 
							<?php if($consultant_data['u_avatar']){ ?>
						<img src="<?php echo site_url()."uploads/customer/".$consultant_data['u_avatar']?>"  class="img-rounded img-responsive"  style="margin-top: 10px; height: 90px;width: 90px;" />
					<?php   }else{?>
							<img src="<?php echo site_url()."uploads/customer/user-default.png"?>"  class="img-rounded img-responsive" style="margin-top: 20px;border-radius: 50%;height: 70px;width: 70px;"/>
						<?php }?> 
						</span>
						<span class="col-sm-11 couns-heading no_padng">
								<h2><?php echo $consultant_data['u_name']?></h2>
								<p>NYU Senior Lecturer | Management Consultant</p>
						</span>
					</div>
				</div>
		  </div>
  	</div>
  	<!-- /.container --> 
	<!-- /.myprofile-bg -->
	<div class="container-fluid used-machines-nav">
	  <div class="container">
	    <div class="col-sm-12 padd-0">
	        <ul class="tab_h tab_h1">
		      	<li><a href="#t_description">Overview</a></li> 
		       	<li>|</li> 
		        <li><a href="#t_ataglance">At a Glance</a> </li>
		        <li>|</li>
		        <li><a href="#t_wrkexp">Work Experience  </a></li>
		        <li>|</li> 
		        <li><a href="#t_speclty">Training Specialties  </a></li>
		        <li>|</li>  
		        <li style="padding:0px"><a href="#t_review">Reviews</a></li>
		        <li>|</li>  
	        </ul><hr/>
	        <div class="clearfix"></div>
	    </div>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.myprofile-bg -->

	<div class="feature-this-month-bg" id="t_description">
		<div class="container">
			<div class=" col-sm-12 padd-0">
				<p class="rcomment readmore"><?php echo $consultant_data['profile_summary'];?></p>
			</div>
		</div>
	</div>
	<div class="detail_heading">
		
			<div id="t_ataglance">
				<div class="container">
					<div class=" col-sm-4 consu-table padd-0">
						<h2 style="margin-top:20px; margin-bottom:14px;">At a Glance</h2>
						<table class="table tbl-responsive">
							<tr>
								<td>Qualification(s)<span class="pull-right">:</span></td>
								<td><?php echo $consultant_data['c_qualification'];?></td>
							</tr>
							<tr>
								<td>MBA(Strategy) <span class="pull-right">:</span></td>
								<td> Cambridge University</td>
							</tr>
							<tr>
								<td>Language(s)<span class="pull-right">:</span></td>
								<td><?php echo $consultant_data['c_languages'];?></td>
							</tr>
							<tr>
								<td>Location<span class="pull-right">:</span></td>
								<td>New York, NY, United States</td>
							</tr>
							<tr>
								<td>Rate<span class="pull-right">:</span></td>
								<td> $<?php echo $consultant_data['c_per_hour_cost'];?>/ hour</td>
							</tr>
							<tr>
								<td>CV / Resume<span class="pull-right">:</span></td>
								<td><?php  if($consultant_data['user_resume']!=''){ echo "<a href='".site_url()."uploads/customer/".$consultant_data['user_resume']."' target='_blank'>Click Here</a>";} else{ echo "Resume not available";}?></td>
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
				<hr/>
				<div class="clearfix"></div>
				</div>
			</div>
		
			<div id="t_wrkexp">
				<div class="container">
					<div class=" col-sm-12 work_experience padd-0">
								<h2>Work Experience</h2>
							<?php if($workList){
								foreach($workList as $rowWork){?>	
							<div class="lern">
								<h3><?php echo $rowWork['title'];?></h3>
								<p><?php echo $rowWork['exp_details'];?></p>
							</div>
							<?php }}?> 
							<hr/><div class="clearfix"></div>
					</div>
				</div>
			</div>
		
			<div id="t_speclty">
				<div class="container"> 
					<div class=" col-sm-12 padd-0">
						<h2>Training Specialties</h2>
						<ul class="TrainingSpec">
							<?php if($trainingList){
								foreach($trainingList as $rowPecial){?>	
									<li><?php echo $rowPecial['title'];?></li> 
							<?php }}?> 
						</ul>
						<hr/>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		
			<div id="t_review">
				<div class="container">
					<div class="col-sm-12 padd-0">
						<h2>Reviews</h2>
						<div class="review-block">
							<div class="col-sm-12 padd-0 row-flex">
								<div class="col-sm-2 col-md-1 padd-0">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7 col-md-8">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">The course is very informative and detailed.</div>
								</div>
								<div class="col-sm-3 col-md-3 padd-0">
									<div class="review-block-rate">
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
									</div>
								</div>
							</div>
							<div class="col-sm-12 padd-0 row-flex">
								<div class="col-sm-2 col-md-1 padd-0">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7 col-md-8">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">The course is very informative and detailed.</div>
								</div>
								<div class="col-sm-3 col-md-3 padd-0">
									<div class="review-block-rate">
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
									</div>
								</div>
							</div>
							<div class="col-sm-12 padd-0 row-flex">
								<div class="col-sm-2 col-md-1 padd-0">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7 col-md-8">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">The course is very informative and detailed.</div>
								</div>
								<div class="col-sm-3 col-md-3 padd-0">
									<div class="review-block-rate">
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
									</div>
								</div>
							</div>
							<div class="col-sm-12 padd-0 row-flex">
								<div class="col-sm-2 col-md-1 padd-0">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7 col-md-8">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">The course is very informative and detailed.</div>
								</div>
								<div class="col-sm-3 col-md-3 padd-0">
									<div class="review-block-rate">
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
									</div>
								</div>
							</div>
							<div class="col-sm-12 padd-0 row-flex">
								<div class="col-sm-2 col-md-1 padd-0">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7 col-md-8">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">The course is very informative and detailed.</div>
								</div>
								<div class="col-sm-3 col-md-3 padd-0">
									<div class="review-block-rate">
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-default btn-grey btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
										<button type="button" class="btn btn-warning btn-xs" aria-label="Left Align">
										  <span class="glyphicon glyphicon-star" aria-hidden="true"></span>
										</button>
									</div>
								</div>
							</div>
							<div class="clearfix"></div>
						</div>
						<center class="mar-b-30">
							<button class="btn adv-search btn_orange">Read More</button>
						</center>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.bxslider.js"></script>
<script>
	$("ul").find("a").click(function(e) {
    e.preventDefault();
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