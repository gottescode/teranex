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
			<form class="form-horizontal" role="form" action="" id="subscription_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="subscription_name">Subscription Plan Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="subscription_name" id="subscription_name" class="form_bor_bot required" value="<?=$subscription_data['subscription_name']?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="subscription_amount">Amount:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="subscription_amount" id="subscription_amount" class="form_bor_bot required numbersOnly" value="<?=$subscription_data['subscription_amount']?>">
					</div>
				  </div> 
				 <div class="form-group">
						<label class="control-label col-sm-3" for="publish">Publish : </label>
						<div class="col-sm-6">
							<!-- <input type="checkbox"   name ="publish" id="publish" <?php if ($subscription_data['publish']=='Y') { echo "value='Y'"; } else { echo "value='N'"; } ?>>
 -->						
 							<input type="checkbox" name="publish"  id="publish"  <?php if ($subscription_data['publish']=='Y') { echo "value='Y' checked";} else { echo "value='Y'"; } ?> /> 
 							
						</div>
				 </div> 
				 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="subscription_id" value="<?php echo $subscription_data['subscription_id']?>"  > 
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
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
$("#subscription_form").validate({
   rules: {  
			   subscription_name:{
				   required:true
			   },
			   subscription_amount:{
			   	required:true
			   },
				
			},
			messages: { 
				subscription_name:{
				   required:"Please enter name"
			   },
				subscription_amount:{
			   	required:"Please enter amount"
			   },
			}
});  

</script> 
<?php $this->template->contentEnd();	?> 