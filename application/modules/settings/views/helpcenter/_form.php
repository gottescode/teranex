 <script src="<?= $theme_url; ?>/ckeditor/ckeditor.js"></script>
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
	<?php	} ?>
	
		<!-- form -->
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="materialType_form" method="post" enctype="multipart/form-data">
				<fieldset>
				    
				   <div class="form-group">
					<label class="control-label col-sm-3" for="type_name">Topic Name :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="name" id="type_name" class="form_bor_bot required" value="<?=$type_data['name']?>">
					</div>
				  </div>
				<div class="form-group">
							<label class="control-label col-sm-3" for="description">Topic Content :<span class="star">*</span></label>
							<div class="col-sm-8">
							<textarea name="topic_text" id="page_dcontent" class="form-control required" ><?=strhtmldecode($type_data['topic_text'])?> </textarea>
							</div>
						</div>				  
				 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					 <input type="hidden" name="id" value="<?php echo $type_data['id']?>"  > 
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
$("#materialType_form").validate({
		rules: {    
				type_name: "required",
			},
			messages: {  
				type_name: "Please enter name",
			}
		});  
</script>
<?php $this->template->contentEnd();	?> 