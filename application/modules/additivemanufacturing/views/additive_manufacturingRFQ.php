<?php $this->template->contentBegin(POS_TOP); ?>
<style>
    .padd-r{
        padding-right: 0;
    }
    .checkboxes label {
        display: block;
        float: left;
        text-indent: -18px;
        color: #7f7f7f;
        font-size: 13px;
        font-weight: normal;
    }
    .checkboxes input {
        vertical-align: middle;
        margin-top:0;
        margin-right: 5px;
    }
    .checkboxes label span {
        vertical-align: middle;
    }
</style>
<?php $this->template->contentEnd(); ?> 
<div class="container">
    <center><h1>Request for Quote</h1></center>
    <div class="col-sm-offset-3 col-sm-6 border_bot" style="background-color: #fff;padding:40px;box-shadow: 0px 0px 5px #dfdcdc;border: 1px solid #999;">
        <form class="form" name=" " id="#" method="post" action="" enctype="multipart/form-data">
            <h3>Part for Manufacturing:</h3>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Part Name:</label>
                <div class="col-sm-8 padd-r">
                    <input type="text" class="form_bor_bot" id="part_name" name="part_name" placeholder=""  />
                </div>
            </div>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Material Type:</label>
                <div class="col-sm-5 padd-r">
                    <select class="form-control" id="material_type" name="material_type[]" multiple="multiple">
                        <option value="">Select Material Type</option>
                        <?php foreach ($material_list as $rowData) { ?>
                            <option value="<?php echo $rowData['mtid'] ?>"><?php echo $rowData['type_name'] ?></option>
                            <? } ?>
                        </select>
                    </div>
                    <div class="col-sm-3 padd-0">
                        <img class="img-responsive" src="<?php echo $theme_url ?>/images/request-img.jpg" style="height:80px; float: right;"/>
                    </div>
                </div>
                <div class="form-group col-sm-12 padd-0">
                    <label class="col-sm-4 contact-label-text padd-0">Application(s) Required:</label>
                    <div class="col-sm-8 top_10 padd-r">		
                        <?php foreach ($application_required as $rowData) { ?>
                            <label class="col-sm-3 checkbox-inline" style="margin-left: 10px;"><input type="checkbox" name="application_required[]" value="<?php echo $rowData['aid']; ?>"><?php echo $rowData['type_name'] ?></label>
                            <? } ?>

        <!-- <select class="form-control" id="application_required" name="application_required[]" multiple="multiple">
                <option value="">Select Material Type</option>
                            <?php foreach ($application_required as $rowData) { ?>
                            <option value="<?php echo $rowData['aid']; ?>"><?php echo $rowData['type_name'] ?></option>
        <? } ?>
</select> -->
                </div>
            </div>
            <hr class="hr-rfq">
            <h3>Attach Drawings:</h3>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Attach Drawings:</label>
                <div class="col-sm-8 top_10 padd-r">
                    <input type="file" class="" id="attach_drawing" name="attach_drawing" placeholder=""  />
                </div>
            </div>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Part Description:</label>
                <div class="col-sm-8 padd-r">
                    <textarea type="text" class="form_bor_bot" id="part_description" name="part_description" placeholder=""> </textarea>
                </div>
            </div>
            <hr class="hr-rfq">
            <h3>Non-Disclosure Agreement</h3>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Specify NDA:</label>
                <div class="col-sm-8 mar-t-10 checkboxes padd-r">
                    <label><input type="checkbox" value="N"><span>No NDA Required (Allow suppliers to view and quote on the RFQ)</span> </label></br>
                    <label><input type="checkbox" value="Y"><span>NDA Required (Suppliers must sign NDA before viewing and quoting on this RFQ)</span></label>
                </div>
            </div>
            <hr class="hr-rfq">
            <h3>Timeline</h3>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Quotes Needed By:</label>
                <div class="col-sm-4 padd-r">
                    <input type="text" class="form_bor_bot" id="quotes_needed_by" name="quotes_needed_by" placeholder=""  />
                </div>
                <label class="col-sm-1 contact-label-text">in:</label>
                <div class="col-sm-3 padd-0">
                    <select class="form_bor_bot" id="ProductType" name="ProductType">
                        <option value="">Currency Type</option>
                        <option value="A">Indian Rupees, INR</option>
                        <option value="B">Dollar</option>
                        <option value="B">Pound</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Work Will Be Awarded By:</label>
                <div class="col-sm-8 padd-r">
                    <input type="text" class="form_bor_bot" id="work_will_awarded" name="work_will_awarded" placeholder=""  />
                </div>
            </div>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Program Needed By:</label>
                <div class="col-sm-8 padd-r">
                    <input type="text" class="form_bor_bot" id="program_needed" name="program_needed" placeholder=""  />
                </div>
            </div>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Quote Quantity:</label>
                <div class="col-sm-8 padd-r">
                    <input type="text" class="form_bor_bot" id="quote_quantity" name="quote_quantity" placeholder=""  />
                </div>
            </div>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Invite Suppliers I know:</label>
                <div class="col-sm-8 padd-r">
                    <input type="text" class="form_bor_bot" id="invite_supplier" name="invite_supplier" placeholder=""  />
                </div>
            </div>
            <hr class="hr-rfq">
            <h3>delivery of parts :</h3>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 contact-label-text padd-0">Who pays for shipping:</label>
                <div class="col-sm-8 top_10 padd-r checkboxes">
                    <label class="col-sm-4"><input type="checkbox" name="buyer" value="Buyer"><span>Buyer</span></label>
                    <label class="col-sm-4"><input type="checkbox" name="supplier" value="Supplier"><span>Supplier</span></label>
                </div>
            </div>
            <div class="form-group col-sm-12 padd-0">
                <label class="col-sm-4 padd-0 contact-label-text">Address for delivery of parts:</label>
                <div class="col-sm-8 padd-r">
                    <textarea type="text" class="form_bor_bot" id="delivery_address" name="delivery_address"  placeholder="" ></textarea>
                </div>
            </div>
            <div class="clearfix"></div><br/>
            <div class="form-group col-sm-12 col-xs-6">
                <center> <input type="submit" name="btnRfq" id="btnRfq" class="btn btn-default confirm-btn " value="Submit RFQ" /> </center>
            </div>
        </form>
    </div>
    <div class="clearfix"></div><br/>
</div>

    