<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/Eacademy.css"/>
<?php echo $this->template->contentEnd();	?> 
<div class="cons-details trainer_details">
	<div class="container-fluid myprofile-bg dahboard-bg">
		  <div class="container">
			  <div class="col-sm-12">
					<!-- <img src="<?=site_url().'/uploads/consultantFile/'.$consultant_data['c_pictures']?>" class="img-responsive pull-left"style="margin-right: 20px;"> -->
					<div class="col-sm-12 no_padng">
						<span class="col-sm-1 no_padng"> 
							<?php if($consultant_data['u_avatar']){ ?>
						<img src="<?php echo site_url()."uploads/customer/".$consultant_data['u_avatar']?>"  class="img-rounded img-responsive"  style="margin-top: 20px;border-radius: 50%;height: 70px;width: 70px;" />
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
	    <div class="col-sm-12">
	        <ul class="tab_h tab_h1">
		      	<li><a href="#t_description">Overview</a></li> 
		       	<li>|</li> 
		        <li><a href="#t_ataglance">At a Glance</a> </li>
		        <li>|</li>
		        <li><a href="#t_wrkexp">Work Experience  </a></li>
		        <li>|</li> 
		        <li><a href="#t_speclty">Training Specialties  </a></li>
		        <li>|</li>  
		        <li><a href="#t_review">Reviews</a></li>
	        </ul>
	        <div class="clearfix"></div><hr/>
	    </div>
	  </div>
	  <!-- /.container --> 
	</div>
	<!-- /.myprofile-bg -->

	<div class="feature-this-month-bg" id="t_description">
		<div class="container">
			<div class=" col-sm-12">
				<p class="rcomment readmore"><?php echo $consultant_data['profile_summary'];?></p>
			</div>
		</div>
	</div>
	<div class="detail_heading">
		
			<div id="t_ataglance">
				<div class="container">
					<div class=" col-sm-12 consu-table ">
						<h1>At a Glance	</h1>
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
						<div class="clearfix"></div><hr/>
					</div>
				</div>
			</div>
		
			<div id="t_wrkexp">
				<div class="container">
					<div class=" col-sm-12 work_experience">
								<h1>Work Experience</h1>
							<?php if($workList){
								foreach($workList as $rowWork){?>	
							<div class="lern">
								<h3><?php echo $rowWork['title'];?></h3>
								<p><?php echo $rowWork['exp_details'];?></p>
							</div>
							<?php }}?> 
							<div class="clearfix"></div><hr/>
					</div>
				</div>
			</div>
		
			<div id="t_speclty">
				<div class="container"> 
					<div class=" col-sm-12">
						<h1>Training Specialties</h1>
						<ul class="TrainingSpec">
							<?php if($trainingList){
								foreach($trainingList as $rowPecial){?>	
									<li><?php echo $rowPecial['title'];?></li> 
							<?php }}?> 
						</ul>
						<div class="clearfix"></div><hr/>
					</div>
				</div>
			</div>
		
			<div id="t_review">
				<div class="container">
					<div class="col-sm-12">
						<h1>Reviews</h1>
						<div class="review-block">
							<div class="row">
								<div class="col-sm-2">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">The course is very informative and detailed.</div>
								</div>
								<div class="col-sm-3">
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
							<div class="row">
								<div class="col-sm-2">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">The course is very informative and detailed.</div>
								</div>
								<div class="col-sm-3">
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
							<div class="row">
								<div class="col-sm-2">
									<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-rounded img-responsive">
								</div>
								<div class="col-sm-7">
									<div class="review-block-name"><a href="#">Amit Das </a></div>
									<div class="review-block-title">SCM Analyst at Tata Consultancy Services</div>
									<div class="review-block-description">For an introduction this is a little dense. However I enjoyed the course for its broad detailed approach. I’m very glad I’ve taken the time to write what </div>
								</div>
								<div class="col-sm-3">
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
						</div>
						<div class="col-sm-offset-2 col-sm-10 mar-20-0">
							<span class="lern"><a>Read More ></a></span>
						</div>
					</div>
				</div>
			</div>
	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
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


</script>
<?php echo $this->template->contentEnd();	?> 