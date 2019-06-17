<?php $this->template->contentBegin(POS_TOP);?>
<script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
<?php $this->template->contentEnd();	?> 
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgMachineError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgMachineError"); ?>
				</div>
		<?php	}  	?>
		<!-- form -->
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="Machine_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="title">Title:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text"  name="title" id="title" class="form_bor_bot required" value="<?=$updateData['title']?>" >
						</div>
				  	</div>
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="title">Sub Title:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text"  name="subtitle" id="subtitle" class="form_bor_bot required" value="<?=$updateData['subtitle']?>" >
						</div>
				  	</div>
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="description"> Description:<span class="star">*</span></label>
						<div class="col-sm-6">
							<textarea name="text" id="text" class="form-control required" ><?=strhtmldecode($updateData['text'])?> </textarea>

						</div>
					</div> 
					<?php if($updateData['title']==='Job Shop Specifications'){ ?>
					<div class="form-group">
						<label class="control-label col-sm-3" for="softwareimage">Image : </label>
						<div class="col-sm-6">
							<input type="file" name="image" id="image" class="form_bor_bot" value="" >
							<?php if($updateData['image']){?>
								<img src="<?=site_url().'uploads/machine_on_demand_manu_frontend_images/'.$updateData['image']?>" width="100px">
								<input type="hidden" id="old_image" name="old_image"  value="<?=$updateData['image']?>">
							<?php }?>
						</div>
					</div> 			
				  	<?php } ?>
					
					<div class="form-group"> 
						<div class="text-center">
					 		<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  		<input type="hidden" name="id" value="<?php echo $updateData['id']?>"  >  
						</div>
				  	</div> 
				</fieldset>
			</form>
		</div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script type="text/javascript">
$("#Machine_form").validate({
   rules: {  
			   machine_category_id:{
				   required:true
			   },
			   machine_id:{
				   required:true
			   }, 
			   software_name:{
				   required:true
			   },
			   version_no:{
				   required:true
			   }, 
			   software_price:{
				   required:true
			   }, 
				description:{
				   required:true
			   }, 
			   technical_specification:{
				   required:true
			   }, 
			},
			messages: { 
				machine_category_id:{
				   required:"Please select Category name"
			   },
			   machine_id:{
				   required:"Please select machine"
			   },
				software_name:{
				   required:"Please enter software name"
			   },
			   version_no:{
				   required:"Please enter version no."
			   }, 
			   software_price:{
				   required:"Please enter software price"
			   }, 
				description:{
				   required:"Please enter description"
			   },
			   technical_specification:{
				   required:"Please enter technical specification"
			   },  
			}
});  

CKEDITOR.replace( 'text' );
CKEDITOR.replace( 'key_features' );

$('#machine_category_id').on('change', function() {
	var machine_category_id = $("#machine_category_id").val();
		 $.ajax({
		  type: "POST",
		  url: site_url+"/machine/api/findMachineListCategory/"+machine_category_id+"/blank",
		  data: {},
			success: function(result){ 
				$('#machine_id').empty();
				 if(result){ 					
						var machineList=result.result; 
						$('#machine_id')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select Machine'));	
						$.each(machineList, function(key, value) { 
							$('#machine_id')
							.append($("<option></option>")
							.attr("value",value.md_id)
							.text(value.modelName));
						});		
					}
				else if(result.error){
					//$('#machine_id').html('No data found..!!')
				} 
			}
			
		});
});
//CKEDITOR.replace( 'description' );  
//CKEDITOR.replace( 'technical_specification' );
</script> 
<?php $this->template->contentEnd();	?> 