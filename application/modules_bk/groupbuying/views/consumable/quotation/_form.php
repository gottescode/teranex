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
					<label class="control-label col-sm-3" for="groupbuying_cat_name">Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="groupbuying_cat_name" id="groupbuying_cat_name" class="form_bor_bot required" value="<?=$category_data['groupbuying_cat_name']?>">
					</div>
				  </div> 
				  
				   <div class="form-group">
					<label class="control-label col-sm-3" for="groupbuying_cat_description">Description:<span class="star">*</span></label>
					<div class="col-sm-6">
					<textarea   name="groupbuying_cat_description" id="groupbuying_cat_description" class="form_bor_bot required" ><?=$category_data['groupbuying_cat_description']?></textarea>
					</div>
				  </div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="groupbuying_cat_image">Image :<span class="star">*</span> </label>
					<div class="col-sm-6">
					<input type="file" name="groupbuyingImage" id="groupbuying_cat_image" class=""  >
					 <?php if($category_data['groupbuying_cat_image']){?>
					  <img src="<?=site_url().'/uploads/groupbuying/'.$category_data['groupbuying_cat_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$category_data['groupbuying_cat_image']?>">
					  <?php }?>
					</div>
				  </div> 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $category_data['groupbuying_cat_id']?>"  > 
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
			   groupbuying_cat_name:{
				   required:true
			   },
				groupbuying_cat_description:{
				   required:true
			   },
			   groupbuyingImage:{
				   required:true
			   },
			},
			messages: { 
				groupbuying_cat_name:{
				   required:"Please enter name"
			   },
				groupbuying_cat_description:{
				   required:"Please enter description"
			   },
			   groupbuyingImage:{
				   required:"Please select image"
			   }, 
			}
});  
</script> 
<?php $this->template->contentEnd();	?> 