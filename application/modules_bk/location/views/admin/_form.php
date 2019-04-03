 <script src="<?= $theme_url; ?>/ckeditor/ckeditor.js"></script>
<div class="box-body">
	<div class="col-xs-12">
	
		<?php	// display messages
			if(hasFlash("dataMsgSuccess"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgSuccess"); ?>
				</div>
	<?php	}	?>
	
		<!-- form -->
		<div class="col-xs-12"> 
			<form class="form-horizontal" role="form" action="" id="banner_form" method="post" enctype="multipart/form-data">
				<fieldset>
				<legend>Banner Image</legend>
				  
				  <!--<div class="form-group">
					<label class="control-label col-sm-3" for="image">Display Text  :</label>
					<div class="col-sm-8">
					<textarea class="ckeditor required  required " cols="80" id="display_text" name="display_text" rows="10"><?=strhtmldecode($result['display_text'])?></textarea>
					  
					</div>
				  </div>-->
				  <input type="hidden" id="display_text" name="display_text"  value="Image">

				  <div class="form-group">
					<label class="control-label col-sm-3" for="image">Image size(2080*1370):<span class="star">*</span></label>
					<div class="col-sm-5"> 
					  <input type="file" id="image" name="image" class="" accept="image/*">
					  <?php if($result['banner_image']){?>
					  <img src="<?=site_url().'/uploads/banner/'.$result['banner_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$result['banner_image']?>">
					  <?php }?>
					  <input type="hidden" id="id" name="id"  value="<?=$result['id']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="image">Display Text  :</label>
					<div class="col-sm-8">
					<input type="text" id="display_order" name="display_order"  value="<?=$result['display_order']?>">
					  
					</div>
				  </div> 
				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
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
</script>
<?php $this->template->contentEnd();	?> 