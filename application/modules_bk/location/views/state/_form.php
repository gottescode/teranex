<div class="box-body">
	<div class="col-xs-12">
	
		<?php	// display messages
			if(hasFlash("subMenuErrorMsg"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("subMenuErrorMsg"); ?>
				</div>
	<?php	}	?>
		
		<!-- form -->
		<div class="col-xs-12">	
			<form id="state_form" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
				<div class="form-group">
					<label class="col-md-3 control-label" for="text-field">Country *:</label>
					<div class="col-md-4">
						<select type="text" id="country_id" name="country_id" class="form-control required" required>
							<option value = ""> Select </option>
			<?php	if($countryList){
						foreach($countryList as $row){		?>
							<option value = "<?php echo $row["id"]; ?>"
								<?php if($row["id"] == $data["country_id"]) echo "selected"; ?> > 
									<?php echo $row["country_name"]; ?> 
							</option>
			<?php		}
					}		?>
						</select>
					</div>
				</div>
				
				<div class="form-group">
					<label class="col-md-3 control-label" for="text-field">State Name *:</label>
					<div class="col-md-4">
						<input type="text" id="state_name" name="state_name" class="form-control required"
							value="<?php echo $data["state_name"]; ?>" >
					</div>
				</div>
				 
				<div class="form-group">
					<label class="col-md-3 control-label" for="text-field">Publish :</label>
					<div class="col-md-8">
						<input type="checkbox" name="publish" value="Y" 
							<?php if($data["publish"] == 'Y') echo "checked"; ?> >
					</div>
				</div>
				 
				<div class="form-group">
					<div class="col-md-offset-3 col-md-8">
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
<script src="<?=$theme_url;?>/js/validator/location_validate.js"></script>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
$("#state_form").validate({
   rules: {  
				country_id: "required",
				state_name: "required", 
			},
			messages: { 
				country_id: "Please select country ",
				state_name: "Please enter state name",
			}
		}); 
</script>
<?php echo $this->template->contentEnd();	?>                                
 
 