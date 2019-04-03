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
			<form class="form-horizontal" role="form" action="" id="machine_services" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="machinebrand">Brand Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="machinebrand" id="machinebrand" class="form_bor_bot required" value="<?=$result['machinebrand']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="machinemodel">Model :<span class="star">*</span></label>
					<div class="col-sm-8">
                                            <input type="text"   name="machinemodel" id="machinemodel" class="form_bor_bot required" value="<?=$result['machinemodel']?> ">
					</div>
				  </div> 
				
				   <div class="form-group">
					<label class="control-label col-sm-3" for="company_name">AMC Y/N :<span class="star">*</span></label>
					<div class="col-sm-8">
                                       <input type="text"   name="company_name" id="company_name" class="form_bor_bot required" value="<?=$result['company_name']?> ">
					</div>
				  </div> 
				   <div class="form-group">
					<label class="control-label col-sm-3" for="servicetype">Service Type :<span class="star">*</span></label>
					<div class="col-sm-8">
                                       <input type="text"   name="servicetype" id="servicetype" class="form_bor_bot required" value="<?=$result['servicetype']?> ">
					</div>
				  </div> 
				
						
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn_orange"> 
					  <input type="hidden" name="id" value="<?php echo $result['rmr_id']?>"  > 
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
			   machinebrand:{
				   required:true
			   },
				machinemodel:{
				   required:true
			   },
				company_name:{
				   required:true
			   },
				servicetype:{
				   required:true
			   },
			},
		messages: { 
			category_name:{
				required:"Please enter machine brand name"
			},
			machinemodel:{
				required:"Please enter maachine model description"
			},
                        company_name:{
				required:"Please enter company "
			},
                        servicetype:{
				required:"Please enter servicetype "
			},
		}
});  

CKEDITOR.replace( 'short_description' );
CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 