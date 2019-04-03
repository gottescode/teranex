<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/Eacademy.css"/>
<?php echo $this->template->contentEnd();	?> 
<div class="container-fluid gray-bg course-list">
	<div class="container allcourse catgry_name ">
		<div style="margin-bottom: 0px;">
			<span class="col-sm-8">
				<h2>Courses in <?php echo $category_data['cat_name']?></h2>
			</span>
			<span class="col-sm-4" style="padding: 20px 0 0"><a href="" class="btn-default addmore-btn btn_orange pull-right" data-toggle="modal" data-target="#advance_search_modal">Advanced Search</a></span>
		</div>
		<div class="clearfix"></div>
		<div class="">
		<?php  if($courseList){ $c=1;
			foreach($courseList as  $rowCourse){
				$rateIng= round($rowCourse['totalCommentedRate']/$rowCourse['totalCommentedUser'] );
				?>
			  	<div class="course-block">
				  	<div class="anti_shadow">
					  <div class="courses-section">
					  <a href="<?php echo site_url()."eacademy/course_details/$rowCourse[cid]/".formaturl($rowCourse[name])?>">
						<?php if($rowCourse['course_image']){?> 
								<img class="img-responsive"  src="<?=site_url().'/uploads/course/'.$rowCourse['course_image']?>" alt="<?php echo $rowCourse['name']?>">
								  <?php }?>
								  	<div class="abt_course">
										<span>
										  <h4><strong><?php echo  $rowCourse['name']?></strong></h4>
										  <!-- <p><?php echo $rowCourse['sub_title']?></p> -->
										  <p class="">CAD/CAM TruTops Laser</p>
										</span>
										<div class="star_rating">
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
										<span>
											
										</span>
									</div><!-- abt_course -->
						 </a>
						</div>
					 
					</div><!-- .//anti_shadow -->
				</div>
			
		<?php if($c%4==0){ echo "</div><div class='container allcourse'>";} 
		$c++;}}?> 
		
		</div>
	</div>
		<?php echo pagination($pageintation['totalCount'],$pageintation['page'],$pageintation['show'],'','');?>
</div>
<div id="advance_search_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h2 class="modal-title">Advance Search</h2></center>
      </div>
      <div class="modal-body">
      	<div class="col-sm-12 border_bot " style="padding: 30px;">
	        <form class="form-horizontal" name="" id="adv_search_form" method="post" action="#">
				  <div class="form-group ">
					  <input type="text" class="form_bor_bot" id="keywords" name="keywords" placeholder="Keywords">
				  </div>
				  <div class="form-group">
						<select name="s_category" id="s_category" class="form_bor_bot">
							<option value="">Catrgory</option>
							<?php if($category_list){
								foreach($category_list as $rowCat){
								?>
							<option value="<?php echo $rowCat['id']?>"><?php echo $rowCat['cat_name']?></option>
							<?php }}?>	
						</select>
				  </div>
				  <div class="form-group">
						<select name="course_level" id="course_level" class="form_bor_bot">
							<option value="">Level</option>
							<option value="Beginner ">Beginner </option>
							<option value="Intermediate">Intermediate</option>
							<option value="Advanced">Advanced</option>
						</select>
				  </div>
				  <div class="form-group">
						<select name="training_type" id="training_type" class="form_bor_bot">
							<option value="">Training Type</option>
							<option value="Beginner">Beginner</option> 
						</select>
				  </div>
				  <div class="form-group">
					  <input type="submit" name="btnSearch" id="submit" class="btn input-form adv-search btn_orange form-control" value="Search" />
				  </div>
			</form>
		</div>
      </div><div class="clearfix"></div><br/>
    </div>
  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>

<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
$("#adv_search_form").validate({
  //  rules: {  
		// 		keywords:{
		// 			required:true
		// 		},
		// 		s_topic:{
		// 			required:true
		// 		},
		// 		level:{
		// 			required:true
		// 		},
		// 		training_type:{
		// 			required:true
		// 		},
		// 	},
		// 	messages: { 
		// 		keywords:{
		// 			required:"Please enter keywords"
		// 		},
		// 		s_topic:{
		// 			required:"Please select topic"
		// 		},
		// 		level:{
		// 			required:"Please select level"
		// 		},
		// 		training_type:{
		// 			required:"Please select training type"
		// 		},
		// 	}
		// }); 
</script>
<?php echo $this->template->contentEnd();	?> 