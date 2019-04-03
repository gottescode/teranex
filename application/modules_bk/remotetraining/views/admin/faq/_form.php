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
		<div class="col-xs-12"> 
			<form class="form-horizontal" role="form" action="" id="faq_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="title">Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="title" id="title" class="form-control required" value="<?=$faq_data['title']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="description">Description:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="description" id="description" class="form-control required" ><?=$faq_data['description']?></textarea>
					</div>
				  </div> 
				   
				    

				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="course_id" value="<?php echo $course_id?>"  > 
					  <input type="hidden" name="fid" value="<?php echo $faq_data['fid']?>"  > 
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
<script> 
$("#faq_form").validate({
     rules: {  
				title: {
					required:true
				}, 
				description: {
					required:true
				}, 
			},
			messages: { 
				title: {
					required:"Please enter title"
				}, 
				description: {
					required:"Please enter description"
				},
			}
});  
//CKEDITOR.replace( 'description' );
//CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 