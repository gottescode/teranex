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
			<form class="form-horizontal" role="form" action="" id="faq_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="faq_question">Faq Question<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="faq_question" id="faq_question" class="form_bor_bot required" value="<?=$faq_data['faq_question']?>">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="faq_answer">Faq Answer<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="faq_answer" id="faq_answer" class="form_bor_bot required" value="<?=$faq_data['faq_answer']?>">
					</div>
				  </div> 				 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $faq_data['faq_id']?>"> 
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
$("#faq_form").validate({
   rules: {  
			   	faq_question:{
				   required:true
			   	},
			  	faq_answer:{
				   required:true
			   	},
			  
			},
			messages: { 
				faq_question:{
				   required:"Please enter question"
			   	},
			   	faq_answer:{
				   required:"Please enter answer"
			   	},
			 
			}
});  
// CKEDITOR.replace( 'faq_answer' );
</script> 
<?php $this->template->contentEnd();	?> 