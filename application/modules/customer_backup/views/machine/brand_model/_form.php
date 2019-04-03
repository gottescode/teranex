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
			<form class="form-horizontal" role="form" action="" id="brandmodel" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="brand_id">Brand Name:<span class="star">*</span></label>
					<div class="col-sm-6">
						<select type="text" name="brand_id" id="brand_id" class="form_bor_bot required" >
							<option value="">Select Brand</option>
							<?php if($brandList){
								foreach($brandList as $rowBrand){?>
								<option value="<?php echo $rowBrand['mb_id']?>" <?php if( $result['brand_id']==$rowBrand['mb_id']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
							<?php }}?>
						</select>
					</div>
				  </div>  
				   <div class="form-group">
					<label class="control-label col-sm-3" for="model_name">Model Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="model_name" id="model_name" class="form_bor_bot required" value="<?=$result['model_name']?>">
					</div>
				  </div>  
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $result['md_id']?>"  > 
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
$("#brandmodel").validate({
   rules: {  
			   brand_id:{
				   required:true
			   },
			   model_name:{
				   required:true
			   },
			},
		messages: { 
			brand_id:{
				   required:"Please select brand"
			   },
			   model_name:{
				   required:"Please enter model name"
			   },
		}
});  
</script> 
<?php $this->template->contentEnd();	?> 