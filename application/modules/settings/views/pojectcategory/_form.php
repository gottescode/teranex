 <script src="<?= $theme_url; ?>/ckeditor/ckeditor.js"></script>
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
			<form class="form-horizontal" role="form" action="" id="projectcategory_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="name">Category Name :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="name" id="name" class="form-control required" value="<?=$supplier_data['name']?>">
					</div>
				  </div> 
				 
				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					 <input type="hidden" name="id" value="<?php echo $supplier_data['id']?>"  > 
					</div>
				  </div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script> 
$("#projectcategory_form").validate({
   rules: {  
				name: "required", 
			},
			messages: { 
				name: "Please Add name", 
			}
		});  
</script>
<?php $this->template->contentEnd();	?> 