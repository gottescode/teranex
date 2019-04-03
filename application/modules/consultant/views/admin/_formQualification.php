 

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

			<form class="form-horizontal" role="form" action="" id="consultant_form" method="post" enctype="multipart/form-data">

				<fieldset>

				   <div class="form-group">

					<label class="control-label col-sm-3" for="qualification">Qualification :<span class="star">*</span></label>

					<div class="col-sm-6">

					<input type="text" name="qualification" id="qualification" class="form_bor_bot required" value="<?=$singleQualData['qualification']?>">

					</div>

				  </div> 

				  <div class="form-group"> 

					<div class="text-center">

					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 

					  <input type="hidden" name="id" value="<?php echo $singleQualData['id']?>"  > 

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

$("#consultant_form").validate({

   rules: {  

				qualification: "required", 

			},

			messages: { 

				qualification: "Please Enter Qualification", 

			}

		}); 

var x = 0;

$("#somebutton").click(function () {

	 x++;

  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');

});

</script>

<?php $this->template->contentEnd();	?> 