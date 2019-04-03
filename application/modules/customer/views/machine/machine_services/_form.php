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
				   <div class="form-group ">
							<input type="text" class="form_bor_bot" id="companyname" name="company_name" value= "" placeholder="Company name" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot" id="machinebrand" name="machinebrand" value= "" placeholder="Machnine Brand" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot" id="machinetype" name="machinetype" value= "" placeholder="Machnine Type" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot" id="machinemodel" name="machinemodel" value= "" placeholder="Machnine Model" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot numbersOnly" id="machineage" name="machineage" value= "" placeholder="Age of Machnine " required><span class="compulsary">*</span>
						</div>
					  	<div class="form-group ">
					  		<select class="form_bor_bot" id="servicetype" name="servicetype">
					  			<option value="">Select Service Type</option>
					  			<option value="Machine Breakdown">Machine Breakdown</option>
					  			<option value="Machine Maintenance">Machine Maintenance</option>
					  		</select>
					  	</div>
					  	<br/>
					  	<div class="form-group">
							<div class="">
								<input type="submit" name="btnMachineService" id="btnMachineService" class="btn btn_orange" value="Service Request" style="width:100% " />
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
			   company_name:{
				   required:true
			   },
				machinebrand:{
				   required:true
			   },
				
			},
		messages: { 
			company_name:{
				required:"Please enter machine brand name"
			},
			machinebrand:{
				required:"Please enter maachine model description"
			},
                 
		}
});  

CKEDITOR.replace( 'short_description' );
CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 