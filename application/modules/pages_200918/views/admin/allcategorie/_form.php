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
					<label class="control-label col-sm-3" for="cat_name">Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="cat_name" id="cat_name" class="form_bor_bot required" value="<?=$allcategorie_data['cat_name']?>">
					</div>
				  </div> 
				  <!-- <div class="form-group">
					<label class="control-label col-sm-3" for="cat_link">Category Link :<span class="star">*</span></label>
					<div class="col-sm-8">
					<input type="text" name="cat_link" id="cat_link" class="form_bor_bot required" value="<?=$Allcategorie_list['cat_link']?>">
					</div>
				  </div>  -->
				 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $allcategorie_data['cat_id']?>"  > 
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
			   cat_name:{
				   required:true
			   },
				
			},
			messages: { 
				cat_name:{
				   required:"Please enter name"
			   },
			
			}
});  
</script> 
<?php $this->template->contentEnd();	?> 