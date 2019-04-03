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
			<form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="category_name">Category Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="category_name" id="category_name" class="form_bor_bot required" value="<?=$result['category_name']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="short_description">Short Description:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="short_description" id="short_description" class="form-control required" ><?=$result['short_description']?></textarea>
					</div>
				  </div> 
					<!--<div class="form-group">
						<label class="control-label col-sm-3" for="video_link">Video Link: </label>
						<div class="col-sm-6">
							<input type="file" name="videoLink" id="videoLink" class="form-control" >
						</div>
					</div>
					-->
				  <div class="form-group">
					<label class="control-label col-sm-3" for="category_image">Image : </label>
					<div class="col-sm-6">
					<input type="file" name="category_image" id="category_image" class="" value="" >
					 <?php if($result['category_image']){?>
					  <img src="<?=site_url().'/uploads/machine/'.$result['category_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$result['category_image']?>">
					  <?php }?>
					  <input type="hidden" id="old_video" name="old_video"  value="<?=$result['video_upload']?>">
					</div>
				  </div> 					
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $result['mc_id']?>"  > 
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script> 

$("#category").validate({
   rules: {  
			   category_name:{
				   required:true
			   },
				short_description:{
				   required:true
			   },
			},
		messages: { 
			category_name:{
				required:"Please Enter Category Name"
			},
			short_description:{
				required:"Please Enter Short Description"
			},
		}
});  

CKEDITOR.replace( 'short_description' );
CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 