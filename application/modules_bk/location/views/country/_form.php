<div class="box-body">
	<div class="col-xs-12">
	
		<?php	// display messages
			if(hasFlash("countryErrorMsg"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("countryErrorMsg"); ?>
				</div>
	<?php	}	?>
		
		<!-- form -->
		<div class="col-xs-12 border_bot">
							
			<form id="country_form" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
									
				<div class="form-group">
					<label class="col-md-3 control-label" for="text-field">Name:<span class="star">*</span></label>
					<div class="col-md-6">
						<input type="text" id="country_name" name="country_name" class="form_bor_bot required" value="<?php echo $data["country_name"]; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="text-field">Country Code:<span class="star">*</span></label>
					<div class="col-md-6">
						<input type="text" id="country_code" name="country_code" class="form_bor_bot required" value="<?php echo $data["country_code"]; ?>" >
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="text-field">Display Order :</label>
					<div class="col-md-6">
						<input type="text" id="display_order" name="display_order" class="form_bor_bot" value="<?php echo $data["display_order"]; ?>">
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="text-field">Publish :</label>
					<div class="col-md-6">
						<input type="checkbox" name="publish" value="Y" 
							<?php if($data["publish"] == 'Y') echo "checked"; ?> >
					</div>
				</div>
				 
				<div class="form-group">
					<div class="text-center">
						<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
					</div>
				</div>
					
			</form>
			
		</div>	
		<!-- end form -->
	</div>
	<!-- end widget content -->
</div>
<!-- end widget div -->

<!-- form validation -->
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script type="text/javascript"> 
	$("#country_form").validate({
		rules: { 
			country_code:{
				required:true
			},
			country_name: {
				required:true
			},
			},
		messages: { 
		country_name: {
				required:"Please enter country name"
			},
			country_code:{
				required:"Please enter country code"
			}, 
		 
			}
	}); 
</script>
<?php echo $this->template->contentEnd();	?>   