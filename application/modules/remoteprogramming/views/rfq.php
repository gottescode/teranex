<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" type="text/css">
<div class="container">
	<center><h2>Request for Quote</h2></center>
	<div class="col-sm-offset-3 col-sm-6 border_bot" style="background-color: #fff;padding:40px;box-shadow: 0px 0px 5px #dfdcdc;border:1px solid #999;">
		<form class="form" name="remoteprog_rfq" id="remoteprog_rfq" method="post" action="" enctype="multipart/form-data">
			<h3>Part for Programming:</h3>
			<div class="form-group col-sm-12 padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Part Name:<span class="star">*</span></label>
				<div class="col-sm-8 padd-0">
					<input type="text" class="form_bor_bot" id="part_name" name="part_name" placeholder=""/>
				</div>
			</div>
			<div class="form-group col-sm-12 padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Material Type:</label>
				<div class="col-sm-8 padd-0">
					<select class="form-control select2" id="material_type" name="material_type[]" multiple="multiple">
						<?php foreach($material_list as $rowData) { ?>
							<option value="<?php echo $rowData['mtid']?>"><?php echo $rowData['type_name']?></option>
						<? } ?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12 checkbox padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0" >Application(s) Required:</label>
				<div class="col-sm-8 top_10 padd-0">		
					<?php foreach($application_required as $rowData) { ?>
						<label class="col-sm-3 checkbox-inline" style="margin-left: 10px;"><input type="checkbox" name="application_required[]" value="<?php echo $rowData['aid']; ?>"><?php echo $rowData['type_name']?></label>
					<? } ?>
					
					<!-- <select class="form-control" id="application_required" name="application_required[]" multiple="multiple">
						<option value="">Select Material Type</option>
						<?php foreach($application_required as $rowData) { ?>
							<option value="<?php echo $rowData['aid']; ?>"><?php echo $rowData['type_name']?></option>
						<? } ?>
					</select> -->
				</div>
			</div>
			<hr class="hr-rfq">
			<h3>Attach Drawings:</h3>
			<div class="form-group col-sm-12 padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Attach Drawings:</label>
				<div class="col-sm-8 top_10 padd-0">
					<input type="file" class="" id="attach_drawing" name="attach_drawing" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12 padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Part Description:</label>
				<div class="col-sm-8 padd-0">
					<textarea type="text" class="form_bor_bot" id="part_description" name="part_description" placeholder="" ></textarea>
				</div>
			</div>
			<hr class="hr-rfq">
			<h3>Non-Disclosure Agreement</h3>
			<div class="form-group col-sm-12 checkbox padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Specify NDA:</label>
				<div class="col-sm-8 mar-t-10 profile-checkbox-label padd-0">
					<label><input type="radio" name="nda" value="N"> No NDA Required (Allow suppliers to view and quote on the RFQ) </label></br><br/>
					<label><input type="radio" name="nda" value="Y"> NDA Required (Suppliers must sign NDA before viewing and quoting on this RFQ)</label>
				</div>
			</div>
			<hr class="hr-rfq">
			<h3>Timeline</h3>
			<div class="form-group col-sm-12 padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Quotes Needed By:</label>
				<div class="col-sm-4 padd-0">
					<input type="text" class="form_bor_bot datepicker" id="quotes_needed_by" name="quotes_needed_by" placeholder="dd-mm-yy"  />
				</div>
				<label class="col-sm-1 contact-label-text">in:</label>
				<div class="col-sm-3 padd-0">
					<select class="form_bor_bot" id="ProductType" name="ProductType">
						<option value="INR">Indian Rupees, INR</option> 
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12 padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Work Will Be Awarded By:</label>
				<div class="col-sm-4 padd-0">
					<input type="text" class="form_bor_bot datepicker" id="work_will_awarded" name="work_will_awarded" placeholder="dd-mm-yy"  />
				</div>
			</div>
			<div class="form-group col-sm-12 padd-0">
				<label class="col-sm-4 contact-label-text pading_left_0">Program Needed By:</label>
				<div class="col-sm-4 padd-0">
					<input type="text" class="form_bor_bot datepicker" id="program_needed" name="program_needed" placeholder="dd-mm-yy"  />
				</div>
			</div>
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
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.min.js"></script>   
<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>   -->
<script type="text/javascript">
$(".select2").select2();

$(function() {
           $(".datepicker").datepicker({ dateFormat: "dd-M-yy", minDate: 0,changeYear: true,yearRange: "-70:+0" }).val()
   });
$("#remoteprog_rfq").validate({
   			rules: {  
				part_name:{
					required:true
				},
			},
			messages: { 
				part_name:{
					required:"Please enter part name"
				},
			}
		}); 
		</script>

<?php echo $this->template->contentEnd();?>