<?php $this->template->contentBegin(POS_TOP);?>
<link href="<?php echo $theme_url?>/css/scrollheader.css" rel="stylesheet" type="text/css"> 
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/Eacademy.css"/>
<?php echo $this->template->contentEnd();	?> 
 <div class="" style="margin-top: 80px;">
		<img class="img-responsive" src="<?php echo $theme_url?>/images/eacademyindex.jpg" alt=" ">
 </div>

<?php
 if($category_list){ $b=0;
	$cat_count = 1;
	$id = 0;
	$id1 = count($category_list);
	foreach($category_list as $rowCategory){ 
	$cat_count++;
	$b++;
	$counts = round($id1/2);
	$courseUrl = site_url()."eacademy/api/findMultipleCourse/$rowCategory[id]";
	$course_list =  apiCall($courseUrl, "post");
?>
<?
	if($id==$counts){
?>
<section class="other-section other-section-10 elearning dark">
	<div class="container padd-0 paralax-section1" style="margin-top:30px">
	<div class="col-sm-12" style="">
		<center>
			<h1 class="white-text">TERANEX <span style="text-transform:lowercase">e</span>Academy for Vocational Training</h1>
			<p class="white-text">TERANEX offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting <br/> undertakes proactive collaboration with clients to identify new opportunities, new customers and sources of incremental revenues.</p>
		</center>
		<div>
			<ul class="tab-widget icon-tab tab-pd">
				<li>
					<a target="_blank" href="<?php echo site_url();?>research/" data-tb="#service-tab-1" class="flex-cc">
					<i class="fa fa-address-card-o" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Online Courses</h3>
				</li>
				<li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
				<li><a target="_blank" href="<?php echo site_url();?>analytics/" data-tb="#service-tab-2" class="flex-cc">
					<i class="fa fa-university" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Virtual Classroom</h3>
				</li>
				<li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
				<li>
					<a target="_blank" href="<?php echo site_url();?>consulting/" data-tb="#service-tab-3" class="flex-cc">
					<i class="fa fa-tasks" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Unified Contents</h3>
				</li>
				<li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
				<li>
					<a target="_blank" href="<?php echo site_url();?>mediacenter" data-tb="#service-tab-4" class="flex-cc">
					<i class="fa fa-flask" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Practical</h3>
				</li>
				<li><i class="fa fa-arrow-right  fa-lg" aria-hidden="true"></i></li>
				<li><a target="_blank" href="<?php echo site_url();?>events" data-tb="#service-tab-5" class="flex-cc">
					<i class="fa fa-file-text-o" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Projects</h3>
				</li>
				<li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
				<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon" data-tb="#service-tab-6" class="flex-cc">
					<i class="fa fa-check" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Online Testing</h3>
				</li>
			</ul>
		</div>
	</div>
	</div>
</section> 
	<?
	}

?>
 <div class="container-fluid <?php if($b%2){echo "gray-bg";}else{ echo "black-bg";}?> ">
	<div class="container Eacademy">
		<div class="col-sm-12 row-flex pading_left_0 pading_right_8">
			<div class="col-sm-10 catgry_name pading_left_0">
				<h2>Top Courses in "<?php echo $rowCategory['cat_name']?>"</h2>
			</div>
			<div class="col-sm-2" style="padding: 0;">
				<a href="<?php echo site_url()."eacademy/courseList/$rowCategory[id]/".formaturl($rowCategory[cat_name])?>" target="_blank" class="btn btn-default addmore-btn" style="margin-top: 10%;float: right;">View All</a>
			</div>
		</div>
		<ul class="cadcam ">
		<?php if($course_list){  
		$courseList = $course_list['result'];
		$ai=0;
	
			foreach($courseList as $rowCourse){  
				$cat_count++;
			
			$rateIng= round($rowCourse['totalCommentedRate']/$rowCourse['totalCommentedUser'] )
			?>
				<li id="demo_<?php echo $rowCourse[cid].'_'.$rowCategory[id]; ?>" >
				  	<div class="col-sm-12 padd-lr-5 ">
						<a class="" href="<?php echo site_url()."eacademy/course_details/$rowCourse[cid]/".formaturl($rowCourse[name])?>" >
							<div class="anti_shadow ">
								<div class="courses-section ">
								 <?php if($rowCourse['course_image']){?> 
									<img class="img-responsive"  src="<?=site_url().'/uploads/course/'.$rowCourse['course_image']?>" alt="<?php echo $rowCourse['name']?>">
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
<?php $id++;}

 } ?>

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
	<script  src="<?php echo $theme_url;?>/js/scrollheader.js"></script>
<?php echo $this->template->contentEnd();	?> 