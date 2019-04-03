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
			<form class="form-horizontal" role="form" action="" id="category_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="client_name">Client Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="client_name" id="client_name" class="form_bor_bot required" value="<?=$testimonial_data['client_name']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="client_designation">Client Designation:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="client_designation" id="client_designation" class="form_bor_bot required" value="<?=$testimonial_data['client_designation']?>">
					</div>
				  </div> 

				   <div class="form-group">
					<label class="control-label col-sm-3" for="description">Client Designation:<span class="star">*</span></label>
					<div class="col-sm-6">
					 <textarea   name="description" id="description" class="form-control required" ><?=$testimonial_data['description']?></textarea>
					</div>
				  </div> 

				  <div class="form-group">
						<label class="control-label col-sm-3" for="testimonialVideo">Video Upload: </label>
						<div class="col-sm-6">
							<input type="file" name="testimonialVideo" id="testimonialVideo" class="form_bor_bot" >
							<?php if($testimonial_data['testimonial_Video']){?>
								<a href="<?=site_url().'uploads/testimonial/'.$testimonial_data['testimonial_Video']?>" target="_blank">
								Video Uploaded</a>
							<?php }?>
						</div>
				   </div> 
				  <div class="form-group">
						<label class="control-label col-sm-3" for="testimonial_image">Image : </label>
						<div class="col-sm-6">
							<input type="file" name="testimonial_image" id="testimonial_image" class="form_bor_bot" value="" >
							<?php if($testimonial_data['testimonial_image']){?>
								<img src="<?=site_url().'uploads/testimonial/'.$testimonial_data['testimonial_image']?>" width="100px">
								<input type="hidden" id="old_image" name="old_image"  value="<?=$testimonial_data['testimonial_image']?>">
							<?php }?>
						</div>
					</div> 					

				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $testimonial_data['testimonial_id']?>"  > 
					  <input type="hidden" id="old_video" name="old_video"  value="<?=$testimonial_data['testimonial_Video']?>">
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
$("#category_form").validate({
   rules: {  
			   report_category_name:{
				   required:true
			   },
				report_category_description:{
				   required:true
			   },
			  
			},
			messages: { 
				report_category_name:{
				   required:"Please enter name"
			   },
				report_category_description:{
				   required:"Please enter description"
			   },
			  
			}
});  
</script> 
<?php $this->template->contentEnd();	?> 