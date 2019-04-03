 <?php $this->template->contentBegin(POS_TOP);?>
 <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
 <?php $this->template->contentEnd();	?> 
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
	<?php	}	?>
	
		<!-- form -->
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="course_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="name">Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="name" id="name" class="form_bor_bot required lettersOnly" value="<?=$course_data['name']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="sub_title">Sub Title:<span class="star">*</span> </label>
					<div class="col-sm-6">
					<input type="text" name="sub_title" id="sub_title" class="form_bor_bot lettersOnly" value="<?=$course_data['sub_title']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="description">Description:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="description" id="description" class="form-control required" ><?=$course_data['description']?></textarea>
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="key_features">Key Features:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="key_features" id="key_features" class="form-control required" ><?=$course_data['key_features']?></textarea>
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="video_link">Course  Level:<span class="star">*</span> </label>
					<div class="col-sm-6">
					<select class="form_bor_bot required" id="course_level" name="course_level">
						<option value="">Select Level</option>
						<option value="Beginner" <?php if($course_data['course_level']=='Beginner'){echo "selected";}?>>Beginner </option>
						<option value="Intermediate"  <?php if($course_data['course_level']=='Intermediate'){echo "selected";}?>>Intermediate</option>
						<option value="Advanced"  <?php if($course_data['course_level']=='Advanced'){echo "selected";}?>>Advanced</option>
					</select>
					</div>
				  </div> 
				    <div class="form-group">
					<label class="control-label col-sm-3" for="video_link">Video Link: </label>
					<div class="col-sm-6">
					<input type="file" name="videoLink" id="videoLink" class="  " >
					</div>
				  </div> 
				    <div class="form-group">
					<label class="control-label col-sm-3" for="course_image">Image : </label>
					<div class="col-sm-6">
					<input type="file" name="courseImage" id="course_image" class="" value="" accept="image/*">
					 <?php if($course_data['course_image']){?>
					  <img src="<?=site_url().'/uploads/remotetraining/'.$course_data['course_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$course_data['course_image']?>">
					  <?php }?>
					  <input type="hidden" id="old_video" name="old_video"  value="<?=$course_data['video_link']?>">
					</div>
				  </div> 
				      <div class="form-group">
				   	 <label class="control-label col-sm-3" for="datepicker">Event Start Date:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="course_start_date" id="datepicker" class="form_bor_bot required" value="<?=$course_data['course_start_date']?>">
					</div>
				 </div>
				<!--  <div class="form-group">
					<label class="control-label col-sm-3" for="datepicker1">Event End Date:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="course_end_date" id="datepicker1" class="form-control required" value="<?=$course_data['course_end_date']?>">
					</div>
				  </div>-->
 				  <div class="form-group">
					<label class="control-label col-sm-3" for="timepicker">Event Start Time::<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="course_start_time" id='timepicker' class="form_bor_bot required" value="<?=$course_data['course_start_time']?>">
					</div>
				  </div>
					<div class="form-group">
					<label class="control-label col-sm-3" for="timepicker1">Event End Time::<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="course_end_time" id="timepicker1" class="form_bor_bot required" value="<?=$course_data['course_end_time']?>">
					</div>
				  </div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="course_amount">Amount:<span class="star">*</span></label>
						<div class="col-sm-6">
						<input type="text" name="course_amount" id="course_amount" class="form_bor_bot required numbersOnly" value="<?=$course_data['course_amount']?>">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="trainee_user_id">Trainer:<span class="star">*</span> </label>
						<div class="col-sm-6">
						<select class="form_bor_bot required trainee_user_id" id="trainee_user_id" name="trainee_user_id" >
							<option value="">Select Trainer</option>
							<?php if($traineeuData){
								foreach($traineeuData as $rowTrainee){?>
							<option value="<?php echo $rowTrainee['uid']?>"  <?php if($rowTrainee['uid']==$course_data['trainee_user_id']){echo "selected";}?>><?php echo ucwords($rowTrainee['u_name'])?> </option> 
							<?php }}?>
						</select>
						</div>
					</div> 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">  
					  <input type="hidden" name="course_id" value="<?php echo $course_data['cid']?>"  > 
					  <input type="hidden" name="cat_id" value="<?php echo $catid?>"  > 
					</div>
				  </div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script>  
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
 $(function () {
		$("#datepicker,#datepicker1").datepicker({ dateFormat: "dd-mm-yy", minDate:0, }).val()
		$('#timepicker,#timepicker1').datetimepicker({
			format: 'HH:mm'
		});
	});

$("#course_form").validate({
	 ignore: [],
   rules: {  
				name: {
					required:true
				}, 
				sub_title: {
					required:true
				}, 
				description: {
					required:true
				}, 
				key_features: {
					required:true
				}, 
				course_level: {
					required:true
				}, 
				course_start_date: {
					required:true
				}, 
				course_start_time: {
					required:true
				}, 
				course_end_time: {
					required:true
				}, 
				course_amount: {
					required:true
				}, 
				trainee_user_id: {
					required:true
				}, 
			},
			messages: { 
				name: {
					required:"Please enter name"
				}, 
				sub_title: {
					required:"Please enter sub title"
				}, 
				description: {
					required:"Please enter description"
				}, 
				key_features: {
					required:"Please enter key features"
				}, 
				course_level: {
					required:"Please select course level"
				},  
				course_start_date: {
					required:"Please select start date"
				}, 
				course_start_time: {
					required:"Please select start time"
				}, 
				course_end_time: {
					required:"Please select end time"
				}, 
				course_amount: {
					required:"Please enter amount"
				}, 
				trainee_user_id: {
					required:"Please select trainer"
				}, 
			}
});  
 
CKEDITOR.replace( 'description' );
CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 