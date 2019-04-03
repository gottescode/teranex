 
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
			<form class="form-horizontal" role="form" action="#" id="community_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="title">Community Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="title" id="title" class="form_bor_bot required" value="<?=$community_data['title']?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="com_description">Community Description:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="description" id="description" class="form_bor_bot required" value="<?=$community_data['description']?>">
					</div>
				  </div>
				  
				  <!--<div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_country">Moderator: </label>
					<div class="col-sm-6">
					<select name="moderator" id="moderator" class="form-control">
								<option value="">Select Moderator</option>
								<?php
								foreach ($userList as $row)
								{
								        echo '<option value="'.$row->uid.'">'.$row->u_name.'</option>';     
								}?>
					</select>	
					</div>
				  </div>-->
				   <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $community_data['id']?>"  > 
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
				title:{
					required:true
				}, 
				description:{
					required:true
				},
			},
			messages: { 
				title:{
					required:"Please enter title"
				}, 
				description:{
					required:"Please enter description"
				},
			}
		}); 
var x = 0;
$("#somebutton").click(function () {
	 x++;
  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');
});
</script>

 
<?php $this->template->contentEnd();	?> 