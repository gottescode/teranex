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
					<label class="control-label col-sm-3" for="consulting_category_name">Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="consulting_category_name" id="consulting_category_name" class="form_bor_bot required" value="<?=$category_data['consulting_category_name']?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="consulting_category_description">Description :<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea name="consulting_category_description" id="consulting_category_description" class="form-control required" ><?=$category_data['consulting_category_description']?></textarea>	
					</div>
				  </div> 
				 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $category_data['consulting_category_id']?>"  > 
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
			   consulting_category_name:{
				   required:true
			   },
			   consulting_category_description:{
				   required:true
			   },				
			},
			messages: { 
				consulting_category_name:{
				   required:"Please enter name"
			   },
			   consulting_category_description:{
				   required:"Please enter category description"
			   },
			
			}
});  
CKEDITOR.replace( 'consulting_category_description' );
</script> 
<?php $this->template->contentEnd();	?> 