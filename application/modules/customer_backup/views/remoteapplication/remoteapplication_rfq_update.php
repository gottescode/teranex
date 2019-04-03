<?php $this->template->contentBegin(POS_TOP);?>
<script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
<?php $this->template->contentEnd();	?> 

<div class="box-body">
	<div class="col-xs-12 border_bot">
		<?php 	// display messages
		if(hasFlash("dataMsgError"))	{	?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgError"); ?>
			</div>
		<?php	}	?>
		<form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
			<fieldset>
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="part_name">App Name</label>
					<div class="col-sm-8">
						<input type="text"  name="part_name" id="control_panel" class="form_bor_bot " value="<?=$result['part_name']?>" >
					</div>
			  	</div>
			  	<div class="form-group">
					<label class="control-label col-sm-3" for="part_description">App Description</label>
					<div class="col-sm-8">
						<input type="textarea"  name="part_description" id="part_description" class="form_bor_bot " value="<?=$result['part_description']?>" >
					</div>
			  	</div> 

			   	<div class="form-group">
					<label class="control-label col-sm-3" for="quotes_needed_by">Quotation expected by:</label>
					<div class="col-sm-8">
						<input type="text"  name="quotes_needed_by" id="quotes_needed_by" class="form_bor_bot " value="<?=$result['quotes_needed_by']?>" >
					</div>
			  	</div> 
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="work_will_awarded">Work to be awarded by::</label>
					<div class="col-sm-8">
						<input type="text"  name="work_will_awarded" id="work_will_awarded" class="form_bor_bot " value="<?=$result['work_will_awarded']?>" >
					</div>
			  	</div> 
				<div class="form-group">
					<label class="control-label col-sm-3" for="program_needed">Work to be completed by:</label>
					<div class="col-sm-8">
						<input type="text"  name="program_needed" id="program_needed" class="form_bor_bot " value="<?=$result['program_needed']?>" >
					</div>
				</div> 
				 
			
			  <div class="form-group"> 
				<div class="text-center">
				 <input type="submit" name="btnSubmit" value="Update" class="btn btn_orange"> 
				  <input type="hidden" name="id" value="<?php echo $result['rpr_id']?>"  >  
				</div>
			  </div> 
			</fieldset>
		</form>
	</div>
</div>

<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
<script src="<?=$theme_url?>/js/location.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script> 
$("#category").validate({
   rules: {  
				category_id: "required", 
				brand_name: "required", 
				model_no: "required", 
			},
			messages: { 
				category_id: "Please select category", 
				brand_name: "Please select brand", 
				model_no: "Please select model", 
			}
		}); 

CKEDITOR.replace( 'machine_description' );
CKEDITOR.replace( 'key_features' );
var x = 0;
$("#somebutton").click(function () {
	 x++;
  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');
});
</script>

 
<?php $this->template->contentEnd();	?> 