
<div class="container">
	<center><h1>Request for Quote</h1></center>
	<div class="col-sm-offset-1 col-sm-10 border_bot" style="background-color: #fff;padding:40px;box-shadow: 0px 0px 5px #dfdcdc;">
		<form class="form" name=" " id="#" method="post" action="" enctype="multipart/form-data">
			<h3>Part for Manufacturing:</h3>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Part Name:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="part_name" name="part_name" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Material Type:</label>
				<div class="col-sm-8">
					<select class="form-control" id="material_type" name="material_type[]" multiple="multiple">
						<option value="">Select Material Type</option>
						<?php foreach($material_list as $rowData) { ?>
							<option value="<?php echo $rowData['mtid']?>"><?php echo $rowData['type_name']?></option>
						<? } ?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12 checkbox">
				<label class="col-sm-4 contact-label-text">Application(s) Required:</label>
				<div class="col-sm-8 top_10">		
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
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Attach Drawings:</label>
				<div class="col-sm-8 top_10">
					<input type="file" class="" id="attach_drawing" name="attach_drawing" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Part Description:</label>
				<div class="col-sm-8">
					<textarea type="text" class="form_bor_bot" id="part_description" name="part_description" placeholder="" ></textarea>
				</div>
			</div>
			<hr class="hr-rfq">
			<h3>Non-Disclosure Agreement</h3>
			<div class="form-group col-sm-12 checkbox">
				<label class="col-sm-4 contact-label-text">Specify NDA:</label>
				<div class="col-sm-8 mar-t-10 profile-checkbox-label">
					<label><input type="checkbox" value="N">No NDA Required (Allow suppliers to view and quote on the RFQ) </label></br>
					<label><input type="checkbox" value="Y">NDA Required (Suppliers must sign NDA before viewing and quoting on this RFQ)</label>
				</div>
			</div>
			<hr class="hr-rfq">
			<h3>Timeline</h3>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Quotes Needed By:</label>
				<div class="col-sm-4">
					<input type="text" class="form_bor_bot" id="quotes_needed_by" name="quotes_needed_by" placeholder=""  />
				</div>
				<label class="col-sm-1 contact-label-text">in:</label>
				<div class="col-sm-3">
					<select class="form_bor_bot" id="ProductType" name="ProductType">
						<option value="">Select currency Type</option>
						<option value="A">Indian Rupees, INR</option>
						<option value="B">Dollar</option>
						<option value="B">Pound</option>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Work Will Be Awarded By:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="work_will_awarded" name="work_will_awarded" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Program Needed By:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="program_needed" name="program_needed" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Quote Quantity:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="quote_quantity" name="quote_quantity" placeholder=""  />
				</div>
			</div>
			<div class="form-group col-sm-12">
				<label class="col-sm-4 contact-label-text">Invite Suppliers I know:</label>
				<div class="col-sm-8">
					<input type="text" class="form_bor_bot" id="suplr" name="suplr" placeholder=""  />
				</div>
			</div>
			<hr class="hr-rfq">
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
			</div>
			<div class="clearfix"></div><br/>
			<div class="form-group col-sm-12 col-xs-6">
			  <center> <input type="submit" name="btnRfq" id="btnRfq" class="btn btn-default confirm-btn " value="Submit RFQ" /></center>
			</div>
		</form>
	</div>
	<div class="clearfix"></div><br/>
</div>
