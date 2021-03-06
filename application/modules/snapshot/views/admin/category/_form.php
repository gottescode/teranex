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
					<label class="control-label col-sm-3" for="snapshot_category_name">Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="snapshot_category_name" id="snapshot_category_name" class="form_bor_bot required" value="<?=$category_data['snapshot_category_name']?>">
					</div>
				  </div> 
				
				 <div class="form-group">
					<label class="control-label col-sm-3" for="snapshot_category_description">Description :<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea name="snapshot_category_description" id="snapshot_category_description" class="form-control required" ><?=$category_data['snapshot_category_description']?></textarea>	
					</div>
				  </div> 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $category_data['snapshot_category_id']?>"  > 
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
	ignore: [],
   rules: {  
			   snapshot_category_name:{
				   required:true
			   },
			   snapshot_category_description:{
			   	required:true
			   },
				
			},
			messages: { 
				snapshot_category_name:{
				   required:"Please enter name"
			   },
				snapshot_category_description:{
			   	required:"Please enter description"
			   },
			}
});  
CKEDITOR.replace( 'snapshot_category_description' );
</script> 
<?php $this->template->contentEnd();	?> 