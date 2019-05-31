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
					<label class="control-label col-sm-3" for="sub_title">Title:<span class="star">*</span> </label>
					<div class="col-sm-6">
					<input type="text" name="title" id="title" class="form_bor_bot	" value="<?=$content_data['title']?>">
					</div>
				  </div> 
				  
				  <div class="form-group">
						<label class="control-label col-sm-3" for="videoLink">Video : </label>
						<div class="col-sm-6">
							<input type="file" name="data" id="data" class="form_bor_bot" value="">
							<?php if($content_data['data']){?>
								<a href="<?=site_url().'uploads/course_data/'.$content_data['data']?>" target="_blank"class="btn btn-xs">View</a>
								<input type="hidden" id="old_image" name="old_image"  value="<?=$content_data['data']?>">
							<?php }?>
						</div>
					</div> 			
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">  
					  <input type="hidden" name="id" value="<?php echo $content_data['id']?>"  > 
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