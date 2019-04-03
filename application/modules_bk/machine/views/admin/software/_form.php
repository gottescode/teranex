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
					<label class="control-label col-sm-3" for="machine_category_id">Category List:<span class="star">*</span></label>
					<div class="col-sm-6">
						<select name="machine_category_id" id="machine_category_id" class="form_bor_bot required" >
							<option value="">Select Category</option>
							<?php if($categoryList){
								foreach($categoryList['result'] as $rowCat){?>
							<option value="<?=$rowCat['mc_id']?>" <?php if($rowCat['mc_id']==$machine_data['machine_category_id']){ echo "selected";}?>><?=$rowCat['category_name']?></option>
							<?php }}?>
						</select>
					</div>
				  	</div> 
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="machine_id">Machine List:<span class="star">*</span></label>
						<div class="col-sm-6">
							<select name="machine_id" id="machine_id" class="form_bor_bot required" >
								<option value="">Select Machine</option>
								<?php if($machineList){
									foreach($machineList  as $rowMachine){
										
										?>
								<option value="<?=$rowMachine['md_id']?>" <?php if($rowMachine['md_id']==$machine_data['machine_category_id']){ echo "selected";}?>><?=$rowMachine['modelName']?></option>
								<?php }}?>
							</select>
						</div>
				  	</div> 
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="software_name">Software Name:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text"  name="software_name" id="software_name" class="form_bor_bot required" value="<?=$machine_data['software_name']?>" >
						</div>
				  	</div>
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="version_no">Version No:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text"  name="version_no" id="version_no" class="form_bor_bot required" value="<?=$machine_data['version_no']?>" >
						</div>
				  	</div>
				   	<div class="form-group">
						<label class="control-label col-sm-3" for="software_price">Price :<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text"  name="software_price" id="software_price" class="form_bor_bot required" value="<?=$machine_data['software_price']?>" >
						</div>
				  	</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="description"> Description:<span class="star">*</span></label>
						<div class="col-sm-6">
							<textarea   name="description" id="description" class="form-control required" ><?=$machine_data['description']?></textarea>
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="technical_specification">Technical Specification:<span class="star">*</span></label>
						<div class="col-sm-6">
							<textarea   name="technical_specification" id="technical_specification" class="form-control required" ><?=$machine_data['technical_specification']?></textarea>
						</div>
					</div> 
					<div class="form-group">
						<label class="control-label col-sm-3" for="softwareimage">Image : </label>
						<div class="col-sm-6">
							<input type="file" name="softwareimage" id="softwareimage" class="form_bor_bot" value="" >
							<?php if($machine_data['software_image']){?>
								<img src="<?=site_url().'uploads/machine/'.$machine_data['software_image']?>" width="100px">
								<input type="hidden" id="old_image" name="old_image"  value="<?=$machine_data['software_image']?>">
							<?php }?>
						</div>
					</div> 			
				  	<div class="form-group"> 
						<div class="text-center">
					 		<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  		<input type="hidden" name="id" value="<?php echo $machine_data['ms_id']?>"  >  
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