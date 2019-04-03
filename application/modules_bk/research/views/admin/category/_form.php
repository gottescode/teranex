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
					<label class="control-label col-sm-3" for="report_category_name">Category Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="report_category_name" id="report_cat_name" class="form_bor_bot required" value="<?=$category_data['report_category_name']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="report_category_description">Category Description:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="report_category_description" id="report_category_description" class="form_bor_bot required" value="<?=$category_data['report_category_description']?>">
					</div>
				  </div> 
				  
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $category_data['report_category_id']?>"  > 
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