<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<style type="text/css">
	/*.select2-container--default.select2-container--focus .select2-selection--multiple{
	border: 0 !important;
    outline: 0;
    border-bottom: 1px solid #ccc !important;
	}
	.select2-container--default .select2-selection--multiple{
		border: 0;
		border-radius: 0;
		border-bottom: 1px solid #ccc !important;
	}*/
</style>

<?php session_start();
include('header.php'); 
?>
<div class="container">
	<center><h1>Request for Application Quote </h1></center>
	<div class="col-sm-offset-1 col-sm-10 border_bot" style="background-color: #fff;padding:40px;box-shadow: 0px 0px 5px #dfdcdc;">
		<form class="form" name=" " id="rfq_form" method="post" action="" enctype="multipart/form-data">
			
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Application Name: <span class="star">*</span></label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="part_name" name="part_name" placeholder="Application Name"  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Material Type: </label>
				<div class="col-sm-8">
					<select class="js-example-basic-multiple form_bor_bot" name="material_type[]" id="material_type" multiple="multiple">
						<?php foreach($material_list as $rowData) { ?>
							<option value="<?php echo $rowData['mtid']?>"><?php echo $rowData['type_name']?></option>
						<? } ?>
                    </select>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Application Description:</label>
				<div class="col-sm-8">
					 <!-- <select class="form-control" id="material_type" name="material_type[]" multiple="multiple">
						<option value="">Select Material Type</option>
						<?php foreach($material_list as $rowData) { ?>
							<option value="<?php echo $rowData['mtid']?>"><?php echo $rowData['type_name']?></option>
						<? } ?>
					</select> -->
					<textarea class="form_bor_bot" name="part_description" id="part_description" placeholder="Application Description"></textarea>
				</div>
			</div>
			<!-- <div class="form-group col-sm-12 ">
				<label class="col-sm-4 contact-label-text">Application(s) Required:</label>
				<div class="col-sm-8 top_10">		
					<?php foreach($application_required as $rowData) { ?>
						<label class="col-sm-3 checkbox-inline" style="margin-left: 10px;"><input type="checkbox" name="application_required[]" value="<?php echo $rowData['aid']; ?>"><?php echo $rowData['type_name']?></label>
					<? } ?>
				</div>
			</div>  -->
			
			<div class="form-group col-sm-12 ">
				<label class="col-sm-8 contact-label-text">Supplier to sign NDA before sharing requirements and drawings:</label>
				<div class="col-sm-4 mar-t-10 profile-checkbox-label">
					<label><input type="radio" name="nda" value="Y"> Must</label> &nbsp;&nbsp;
					<label><input type="radio" name="nda" value="N"> Not Required</label>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Quotation expected by:</label>
				<div class="col-sm-4">
					<input type="text" class="form_bor_bot" id="datepicker" name="quotes_needed_by" placeholder="dd-mm-yyyy"  />
				</div>
				<label class="col-sm-1 contact-label-text">in</label>
				<div class="col-sm-3">
					<select class="form_bor_bot" id="currency" name="currency"> 
						<option value="INR">Indian Rupees, INR</option> 
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Work to be awarded by:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="datepicker1" name="work_will_awarded" placeholder="dd-mm-yyyy"  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Work to be completed by:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="datepicker2" name="program_needed" placeholder="dd-mm-yyyy"  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Prefer suppliers I know:</label>
				<div class="col-sm-8">
					<select class="js-example-basic-multiple form_bor_bot" name="suplr[]" id="suplr" multiple="multiple">
							<option value="1">supplier 1</option>
							<option value="2">supplier 2</option>
							<option value="3">supplier 3</option>
                    </select>
				</div>
			</div>
			<!-- <div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Quote Quantity:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="quote_quantity" name="quote_quantity" placeholder=""  />
				</div>
			</div>  -->
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Attach Drawings:</label>
				<div class="col-sm-8 top_10">
					<input type="file" class="" id="attach_drawing" name="attach_drawing" placeholder=""  />
				</div>
			</div>
			<!-- <div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Part Name</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="part_name" name="part_name" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Part Description:</label>
				<div class="col-sm-8">
					<textarea type="text" class="form_bor_bot" id="part_description" name="part_description" placeholder="" ></textarea>
				</div>
			</div> -->
			<!-- <hr class="hr-rfq">
			<h3>delivery of parts :</h3>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Who pays for shipping:</label>
				<div class="col-sm-8 top_10">
					<label class="col-sm-3 checkbox-inline"><input type="checkbox" name="vehicle" value="Buyer">Buyer</label>
					<label class="col-sm-3 checkbox-inline"><input type="checkbox" name="vehicle" value="Supplier">Supplier	</label>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Address for delivery of parts:</label>
				<div class="col-sm-8">
					<textarea type="text" class="form_bor_bot" id="delivery_add" name="delivery_add"  placeholder="" ></textarea>
				</div>
			</div> -->
			<div class="clearfix"></div><br/>
			<div class="form-group col-sm-12 col-xs-6">
			  <center> <input type="submit" name="btnRfq" id="btnRfq" class="btn btn-default confirm-btn " value="Submit RFQ" /></center>
			</div>
		</form>
	</div>
	<div class="clearfix"></div><br/>
</div>

<!-- <?
include('footer.php'); 
?> -->
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
$("#rfq_form").validate({ 
            rules: {  
            	part_name:{
                	required: true
                },
            },
			messages: { 
               part_name:{
                	required: "Please enter application name"
                },
            }
        });
</script> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script type="text/javascript">
$(document).ready(function() {
 $(function () {
		$("#datepicker").datepicker({ dateFormat: "dd-M-yy", minDate: 0, changeMonth:true,changeYear: true,yearRange: "-70:+0" }).val()
		$("#datepicker1").datepicker({ dateFormat: "dd-M-yy", minDate: 0, changeMonth:true,changeYear: true,yearRange: "-70:+0" }).val()
		$("#datepicker2").datepicker({ dateFormat: "dd-M-yy", minDate: 0, changeMonth:true,changeYear: true,yearRange: "-70:+0" }).val()
		$('#timepicker').datetimepicker({
			format: 'HH:mm',
		});
	});
});
</script>

<?php echo $this->template->contentEnd();	?> 