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
			<form class="form-horizontal" role="form" action="" id="training_courses" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="requestcoursetitle">Request Course Title:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="requestcoursetitle" id="requestcoursetitle" class="form_bor_bot required" value="<?=$result['machinebrand']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="duration">Duration :<span class="star">*</span></label>
					<div class="col-sm-8">
                                            <input type="text"   name="duration" id="duration" class="form_bor_bot required" value="<?=$result['duration']?> ">
					</div>
				  </div> 
				
				   <div class="form-group">
					<label class="control-label col-sm-3" for="cost">Cost :<span class="star">*</span></label>
					<div class="col-sm-8">
                                       <input type="text"   name="cost" id="cost" class="form_bor_bot required" value="<?=$result['cost']?> ">
					</div>
				  </div> 
						
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnUpdate" value="Submit" class="btn btn_orange"> 
					  <input type="hidden" name="id" value="<?php echo $result['ccr_id']?>"  > 
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
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script> 

$("#machine_services").validate({
	ignore: [],
   rules: {  
			   requestcoursetitle:{
				   required:true
			   },
				duration:{
				   required:true
			   },
				company_name:{
				   required:true
			   },
				servicetype:{
				   required:true
			   },
				servicetype:{
				   required:true
			   },
			},
		messages: { 
			requestcoursetitle:{
				required:"Please enter requestcoursetitle"
			},
			duration:{
				required:"Please enter duration"
			},
                        cost:{
				required:"Please enter cost "
			},
                        
		}
});  

CKEDITOR.replace( 'short_description' );
CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 