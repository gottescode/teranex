 
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
	<?php	}	?>
	<?php   $this->load->view("cust_side_menu" ); ?> 
		<!-- form -->
		<div class="col-xs-12"> 
			<form class="form-horizontal" role="form" action="" id="community_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="title">Community Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="title" name="title" placeholder="Enter a forum title" value="<?= $title ?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="description">Community Description:<span class="star">*</span></label>
					<div class="col-sm-6">
					<textarea rows="6" class="form-control" id="description" name="description" placeholder="Enter short description for the new forum (max 80 characters)"><?= $description ?></textarea>
					</div>
				  </div>
				   <!--<div class="form-group">
					<label class="control-label col-sm-3" for="com_moderator">Community Moderator :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="com_moderator" id="com_moderator" class="form-control required" value="<?=$community_data['com_moderator']?>">
					</div>
				  </div>-->

				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
						<input type="submit" class="btn btn-primary" value="Create Community">
					 
					</div>
				  </div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
 
<script> 
$("#community_form").validate({
   rules: {  
				image: "required", 
			},
			messages: { 
				image: "Please Select Image", 
			}
		}); 
var x = 0;
$("#somebutton").click(function () {
	 x++;
  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');
});
</script>

 
<?php $this->template->contentEnd();	?> 