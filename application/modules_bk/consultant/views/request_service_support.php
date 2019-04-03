<style type="text/css">

</style>
<div class="gray-bg">
	<div class="container">
<?php 	// display messages
		if(hasFlash("dataMsgServiceRequestSuccess"))	{	?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgServiceRequestSuccess"); ?>
			</div>
<?php	}	?>
		<br/>
		<div class="col-sm-6">
			<div class=" col-sm-offset-2 col-sm-8 border_bot " style="background-color: #fff;padding:10px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
				<center>
				  <h2>Service Agreement</h2>
				</center>
				<form class="form-horizontal" name="#" id="service_agreement_form" method="post" action="">
						<div class="form-group ">
							<input type="text" class="form_bor_bot" id="company_name" name="company_name" value= "" placeholder="Company name" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot" id="machine_model_no" name="machine_model_no" value= "" placeholder="Machnine Model ID" required><span class="compulsary">*</span>
						</div>
					  <div class="form-group ">
					  		<select class="form_bor_bot" id="service_type" name="service_type">
					  			<option value="">Select Service Type</option>
					  			<option value="Machine Breakdown">Machine Breakdown</option>
					  			<option value="Machine Maintenance">Machine Maintenance</option>
					  			<option value="Service Agreement">Service Agreement</option>
					  			<option value="On-Demand Service">On-Demand Service</option>
					  		</select><span class="compulsary">*</span>
					  </div>
					  <div class="form-group">
					  	<textarea type="text" class="form_bor_bot" name="problem_note" id="problem_note" placeholder="Nature of problem"></textarea><span class="compulsary">*</span>
					  </div><br/>
					  <div class="form-group">
							<div class="">
								<input type="submit" name="btnRequest" id="submit" class="btn btn_orange" value="Service Request" style="width: 100%"> 
								<!-- <input type="submit" name="" id="submit" class="btn btn_orange" value="Service Request" style="width: 100%" /> -->
							</div>
					  </div>
					</form>
			</div>
		</div>
		<div class="col-sm-6" style="border-left: 1px solid gray;">
			<div class="col-sm-offset-2 col-sm-8 border_bot" style="background-color: #fff;padding:10px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
				<center>
				  <h2>On-Demand Service</h2>
				</center>
				<form class="form-horizontal" name="#" id="ondemand_form" method="post" >
						<div class="form-group ">
							<input type="text" class="form_bor_bot" id="companyname" name="companyname" value= "" placeholder="Company name" required><span class="compulsary">*</span>
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
						  	<input type="text" class="form_bor_bot" id="machineage" name="machineage" value= "" placeholder="Age of Machnine " required><span class="compulsary">*</span>
						</div>
					  <div class="form-group ">
					  		<select class="form_bor_bot" id="servicetype" name="servicetype">
					  			<option value="">Select Service Type</option>
					  			<option value="1">service 1</option>
					  			<option value="2">service 2</option>
					  		</select>
					  </div>
					  <br/>
					  <div class="form-group">
							<div class="">
								<input type="submit" name="" id="submit" class="btn btn_orange" value="Service Request" style="width:100% " />
							</div>
					  </div>
					</form>
			</div>
		</div>
	</div>
</div>

		
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url;?>/js/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript">

$(document).ready()
	$("#service_agreement_form").validate({ 
            rules: {
				company_name:{
                	required: true
                }, 
				machine_model_no:{
                	required: true
                },
				service_type:{
                	required: true
                },
				problem_note:{
                	required: true
                },
            },
			messages: { 
				company_name:{
                	required: "Please enter company name"
                }, 
				machine_model_no:{
                	required: "Please enter machine model id"
                },
				service_type:{
                	required: "Please select service type"
                },
				problem_note:{
                	required: "Please enter nature of problem"
                },		
			}
	}); 

	//on demand service 
	$("#ondemand_form").validate({ 
            rules: {
				companyname:{
                	required: true
                }, 
				machinebrand:{
                	required: true
                },
				machinetype:{
                	required: true
                },
				machinemodel:{
                	required: true
                },
                machineage:{
                	required:true
                },
                servicetype:{
                	required:true
                },
            },
			messages: { 
				companyname:{
                	required: "Please enter company name"
                }, 
				machinebrand:{
                	required: "Please enter machine brand"
                },
				machinetype:{
                	required: "Please enter machine type"
                },
				machinemodel:{
                	required: "Please enter machine model"
                },
                machineage:{
                	required:"Please enter age of machine"
                },
                servicetype:{
                	required:"Please select service type"
                },
				servicetype:{
                	required: "Please select service type"
                },	
			}
	}); 
</script>
	<?php echo $this->template->contentEnd();	?> 