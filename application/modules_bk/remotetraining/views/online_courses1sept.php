<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
 
.star_rating22 ul{margin:0;padding:0;}
.star_rating22 .spanStar{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:18px;}
.star_rating22 .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
.rating_cnt{color: #000; font-size:15px;}
.rating_active{    color: #ff8a43 !important;}
.other-section-10 .tab-widget li>a:hover {
    background-color: #00000070;
    color: #a5c049;
    box-shadow: 0 3px 10px 0 rgba(0,0,0,0.15);
}
.explore-marketplace .tab-widget li>a:hover ~ h3{
	color: #a5c049;
}
.other-section-10 .tab-widget li>a {
    border-radius: 0;
    border-bottom: 1px solid #a5c049;
}
.other-section-10 .tab-widget li>a {
    width: 120px;
    height: 120px;
    color: #fff;
    font-size: 60px;
    /*border-radius: 80px;*/
    background-color: #00000070;
    box-shadow: 0 7px 22px rgba(19, 19, 19, 0.5);
}
</style>
<?php echo $this->template->contentEnd();	?> 
 <!--<div class="" style="margin-top: 80px;">-->
	<!--	<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/macademy2-min.png" alt=" ">-->
 <!--</div>-->
<section class="other-section other-section-10 dark">
	<!-- <div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/machineindex.jpg');height: 100%;width: 100%;background-size: cover;"> -->
	<div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/onlinecourse-macademy-min.jpg');height: 100%;width: 100%;background-size: cover;">
		<div style="width: 100%;background-color: #0000007d">
			<div class="col-sm-12" style="padding: 30px 0;">
				<center>
					<h1 class="white-text"> Manufacturing Technology Learning Platform</h1>
					<p class="white-text" style="padding: 20px 0;">TERANEX offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting <br/> undertakes proactive collaboration with clients to identify new opportunities, new customers and sources of incremental revenues.</p>
				</center>
				<div>
					<ul class="tab-widget icon-tab tab-pd">
						<li>
							<a target="_blank" href="<?php echo site_url()."remotetraining/online_courses";?>" data-tb="#service-tab-1" class="flex-cc">
							<i class="fa fa-address-card-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Online Courses</h3>
						</li>
						<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						<li>
							<a target="_blank" href="<?php echo site_url()."macademy/virtual_classroom";?>" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-university" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Virtual Classroom</h3>
						</li>
						<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						<li>
							<a target="_blank" href="<?php echo site_url()."macademy/unified_contents";?>" data-tb="#service-tab-3" class="flex-cc">
							<i class="fa fa-tasks" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Unified Contents</h3>
						</li>
						<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						<li>
							<a target="_blank" href="javascript:void(0)" data-tb="#service-tab-5" class="flex-cc">
							<i class="fa fa-file-text-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Projects</h3>
						</li>
						<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						<li>
							<a target="_blank" href="<?php echo site_url()."macademy/online_testing";?>" data-tb="#service-tab-6" class="flex-cc">
							<i class="fa fa-check" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Online Testing</h3>
						</li>
					</ul>
				</div>
			</div><div class="clearfix"></div>
		</div><div class="clearfix"></div>
	</div>
</section>
<?php

 if($category_list){ $b=0;
	$cat_count = 1;
	$id = 0;
	$id1 = count($category_list);
	foreach($category_list as $rowCategory){ 
	$counts = round($id1/2);
	$cat_count++;
	$b++;
	$courseUrl = site_url()."remotetraining/api/findMultipleCourse/$rowCategory[id]";
	$course_list =  apiCall($courseUrl, "get");
?>
<?
	if($id==$counts){
?>

	<?
	}
?>
<div class="container-fluid <?php if($b%2){echo "gray-bg";}else{ echo "black-bg";}?>">
	<div class="container">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-flex pading_left_0 pading_right_0 ">
			<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 catgry_name pading_left_0 ">
				<h2>Top Courses in "<?php echo $rowCategory['cat_name']?>"</h2>
			</div>
			<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="padding: 0;">
				<a href="<?php echo site_url()."remotetraining/courseList/$rowCategory[id]/".formaturl($rowCategory[cat_name])?>" target="_blank" class="btn btn-default addmore-btn" style="margin-top: 10%;float: right;">View All</a>
			</div>
		</div>
		<ul class="cadcam">
		<?php if($course_list){  
		$courseList = $course_list['result'];
		$ai=0;
			foreach($courseList as $rowCourse){  
				$cat_count++;
			$rateIng= round($rowCourse['totalCommentedRate']/$rowCourse['totalCommentedUser'] )
			?>
				<li id="demo_<?php echo $rowCourse[cid].'_'.$rowCategory[id]; ?>" >
				  	<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
						<a class="" href="<?php echo site_url()."remotetraining/course_details/$rowCourse[cid]/".formaturl($rowCourse[name])?>" >
							<div class="anti_shadow ">
								<div class="courses-section ">
								 <?php if($rowCourse['course_image']){?> 
									<img class="img-responsive"  src="<?=site_url().'/uploads/remotetraining/'.$rowCourse['course_image']?>" alt="<?php echo $rowCourse['name']?>">
									  <?php }?>
									<div class="abt_course">
										<span class="pull-left full-width">
										  <h4><strong><?php echo $rowCourse['name']?></strong></h4>
										  <!-- <p><?php echo strhtmldecode(substr($rowCourse['description'], 0, 70));?></p> -->
										  <p class="course_trainer">CAD/CAM TruTops Laser</p>
										</span>
										<div class="star_rating22"> 
											<ul  class="list-unstyled">
											  <?php
											  for($i=1;$i<=5;$i++) {
											  $selected = "";
											  if(!empty($rateIng) && $i<=$rateIng) {
												$selected = "selected";
											  }
											  ?>
											  <span class='spanStar <?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"  >&#9733;</span>  
											  <?php }  ?>
											  <span class="rating_cnt"><?php if((int)$rateIng){echo $rateIng;}else{ echo "0";} ?> ( <?php echo $rowCourse['totalCommentedUser']?> )</span>
											</ul>
										</div>
									</div><!-- .//abt_course -->
								</div><!-- .//courses-section -->
							</div>
						</a>
				  	</div>
				</li>    
		<?php }}?>		 
		</ul>
	</div><!-- container -->
</div>
<?php $id++;} } ?>

<div class="clearfix"></div><br/>

<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>	
	<script type="text/javascript">
function highlightStar(obj,id) {
	removeHighlight(id);		
	$('.demo-table #tutorial-'+id+' li').each(function(index) {
		$(this).addClass('highlight');
		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
			return false;	
		}
	});
}

function removeHighlight(id) {
	$('.demo-table #tutorial-'+id+' li').removeClass('selected');
	$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
}

//	 $('li').bind("mouseenter", function() { console.log("you rolled over") });
$('body').on('mouseenter', 'li', function() {

		$(this).addClass('adasd');

 });
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