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
			<form class="form-horizontal" role="form" action="" id="client_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="name">Client Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="name" id="name" class="form_bor_bot required" value="<?=$client_data['name']?>">
					</div>
				  </div> 
				  
					<div class="form-group">
					<label class="control-label col-sm-3" for="client_image">Image :<span class="star">*</span> </label>
					<div class="col-sm-6">
					<input type="file" name="client_image" id="client_image" class=""  >
					 <?php if($client_data['client_image']){?>
					  <img src="<?=site_url().'/uploads/client/'.$client_data['client_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$client_data['client_image']?>">
					  <?php }?>
					</div>
				  </div> 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $client_data['client_id']?>"  > 
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
$("#client_form").validate({
   rules: {  
			   name:{
				   required:true
			   },
				
			},
			messages: { 
				name:{
				   required:"Please enter name"
			   },
			
			}
});  
//CKEDITOR.replace( 'specialization' );
</script> 
<?php $this->template->contentEnd();	?> 