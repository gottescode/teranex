<?php
$this->template->contentBegin(POS_TOP);

// remote application
?>
<div class="home-page-container height-550" style="background: url(<?php echo $theme_url ?>/images/collective-buyer.jpg)">
    <div class="container">
        <div class="banner-content-text">
            <span>Teranex Community Platform</span>
            <b>Collective Buyers</b>
        </div>
    </div>
</div>
<div class="home-page-body-container">
    <div class="home-inner-block-set">
        <div class="container">
            <?php 	// display messages

            if(hasFlash("dataMsgSuccess"))	{	?>
                <br/>
                <div class="alert alert-success alert-dismissible" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <?php echo getFlash("dataMsgSuccess"); ?>

                </div>

            <?php }	?>
            <?php 	// display messages

            if(hasFlash("dataMsgError"))	{	?>

                <div class="alert alert-warning alert-dismissible" role="alert">

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

                    <?php echo getFlash("dataMsgError"); ?>

                </div>

            <?php }	?>
            <div class="full-width">
                <div class="row">
                    <?php
                    $i = 1;
                    foreach($groupbuying_list as $groupbuyings) { ?>
                    <?php if($this->session->userdata('uid')==''){ ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="home-card-set">
                            <div class="card-title"><?php echo $groupbuyings['groupbuying_cat_name']; ?></div>
                            <p>
                                <?php echo $groupbuyings['groupbuying_cat_description']; ?>
                            </p>
                            <div class="flex justify-content-between full-width mt-2">
                                <button data-toggle="modal" class="btn submit-btn min-w-110" data-target="#new_modal_<?php echo $i;?>">Ask</button>
                                <button data-toggle="modal"class="btn submit-btn min-w-110" data-target="#new_modal_<?php echo $i;?>_offer">Offer</button>


                            </div>
                        </div>
                    </div>
                        <?php }?>
                        <?php $i++; } ?>
                </div>
            </div>

        </div>
    </div>
    <div class="support-now-card-container">
        <div class="support-now-card-right-img" style="background: url(images/card-img.jpg)"></div>
        <div class="container">
            <div class="full-width">
                <div class="row align-items-center flex">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="support-now-card-left-content">
                            Are You Looking To <br>
                            Exchange Spare Parts Or <br>
                            Machines With Others Shops?
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="support-now-card-right-content text-center">
                            <div class="full-width">Teranex<br> Exchange Communities</div>
                            <button class="btn submit-btn mt-15">View Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div id="new_modal_1" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Details for request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">


          <div class="consumables reqDet">
            <div class="col-sm-12">
              <form class="" name="" id="consumablesform" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_category_id" id="consumable_category">
                          <option value="">Select Consumable Category</option>
                          <?php foreach($consumableCategoryData as $row){ ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_category']; ?></option>
                          <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_type_id" id="consumable_type">
                        <option value="">Select Consumable Type</option>
                        <?php foreach($consumableTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_type']; ?></option>
                         <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_brand_id" id="consumable_brand">
                        <option value="">Select Consumable Brand</option>
                        <?php foreach($consumableBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>

                  </div>
                  <div class="form-group">
                       <select class="form_bor_bot consumable" name="cons_name_id"id="cons_name_id">
                        <option value="">Select Consumable Name</option>
                        <?php foreach($consumableNameData as $row){ ?>
                          <option value="<?php echo $row['id']; ?>"  data-unit = "<?php echo $row['unit']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>


                  </div>
                  <div class="">
                    <div class="col-sm-8 padd-0">
                      <input type="text" id="cons_quantity" name="cons_quantity" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                    </div>
                    <div class="col-sm-3">
                       <input type="text" id="consumable_units" name="consumable_unit" class="form_bor_bot " placeholder="Unit" readonly>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_freq" id="cons_freq">
                        <option value="">Select Consumable Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select>
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="consumable_buying_price" name="consumable_buying_price" class="form_bor_bot " placeholder="Current Buying Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="consumableSubmit" id="submit" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div id="new_modal_2" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Details for request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">
          <div class="serviceparts reqDet">
            <div class="col-sm-12">
              <form class="" name="" id="servicepartform" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="service_category_id" id="servicepart_category">
                        <option value="">Select Service Part Category</option>
                        <?php foreach($serviceCategoryData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_category']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="service_type_id" id="servicepart_type">
                        <option value="">Select Service Part Type</option>
                        <?php foreach($serviceTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_type']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="service_brand_id" id="servicepart_brand">
                        <option value="">Select Service Part Brand</option>
                        <?php foreach($serviceBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
					<select class="form_bor_bot servicePart" name="service_name_id" id="servicepart_name">
                        <option value="">Select Service Part Name</option>
                        <?php foreach($serviceName as $row){ ?>
                          <option value="<?php echo $row['id'] ?>" data-unit = <?php echo $row['unit'];?>><?php echo $row['servicepart_name']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>

                  </div>
                  <div class="">
                    <div class="col-sm-8 padd-0">
                      <input type="text" id="servicepart_qty" name="service_quantity" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" id="servicepart_unit" name="servicepart_unit" class="form_bor_bot " placeholder="Unit" readonly>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_freq" id="cons_freq">
                        <option value="">Select Service Part Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select>
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="servicepart_buying_price" name="servicepart_buying_price" class="form_bor_bot " placeholder="Current Buying Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="servicepartSubmit" id="submit" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div id="new_modal_3" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Details for request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">

            <div class="clearfix"></div><br/>

         <div class="sheetmetals reqDet" >
            <div class="col-sm-12">
              <form class="" name="" id="sheetmetalform" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheet_category_id" id="sheet_category_id">
                        <option value="">Select Sheet Metal Category</option>
                        <?php foreach($sheetMetalCategoryData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_category']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheet_type_id" id="sheet_type_id">
                        <option value="">Select Sheet Metal Type</option>
                        <?php foreach($sheetMetalTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_type']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheet_brand_id" id="sheetmetal_brand">
                        <option value="">Select Sheet Metal Brand</option>
                        <?php foreach($sheetMetalBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_thickness" id="sheetmetal_thickness">
                        <option value="">Select Sheet Metal Thickness</option>
                        <?php foreach($SheetMetalThicknessData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_thickness']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_size" id="sheetmetal_size">
                        <option value="">Select Sheet Metal Size</option>
                        <?php foreach($SheetMetalSizeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_size']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
					<select class="form_bor_bot" name="sheet_name_id" id="sheet_name_id">
                        <option value="">Select Sheet Metal Name</option>
                        <?php foreach($SheetMetalName as $row){ ?>
                          <option value="<?php echo $row['id'] ?>" data-unit="<?php echo $row['unit'];?>"><?php echo $row['sheetmetal_name']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>

                  </div>
                  <div class="">
                    <div class="col-sm-8 padd-0">
                      <input type="text" id="sheetmetal_qty" name="sheet_quantity" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" id="sheetmetal_unit" name="sheetmetal_unit" class="form_bor_bot " placeholder="Unit" readonly>
                    </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_freq" id="cons_freq">
                        <option value="">Select Sheet Metal Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select>
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="sheetmetal_buying_price" name="sheetmetal_buying_price" class="form_bor_bot " placeholder="Current Buying Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="sheetMetalSubmit" id="submit" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div class="clearfix"></div><br/>
<div id="new_modal_1_offer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Details for offer</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">


          <div class="consumables reqDet">
            <div class="col-sm-12">
              <form class="" name="" id="consumablesofferform" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_category_id" id="consumable_category_offer">
                          <option value="">Select Consumable Category</option>
                          <?php foreach($consumableCategoryData as $row){ ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_category']; ?></option>
                          <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_type_id" id="consumable_type_offer">
                        <option value="">Select Consumable Type</option>
                        <?php foreach($consumableTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_type']; ?></option>
                         <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_brand_id" id="consumable_brand_offer">
                        <option value="">Select Consumable Brand</option>
                        <?php foreach($consumableBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>

                  </div>
                  <div class="form-group">
                       <select class="form_bor_bot consumable" name="cons_name_id"id="cons_name_id_offer">
                        <option value="">Select Consumable Name</option>
                        <?php foreach($consumableNameData as $row){ ?>
                          <option value="<?php echo $row['id']; ?>"  data-unit = "<?php echo $row['unit']; ?>"><?php echo $row['name']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>


                  </div>
                  <div class="">
                    <div class="col-sm-8 padd-0">
                      <input type="text" id="cons_quantity_offer" name="cons_quantity" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                    </div>
                    <div class="col-sm-3">
                       <input type="text" id="consumable_units_offer" name="consumable_unit" class="form_bor_bot " placeholder="Unit" readonly>
                    </div>
                    <div class="clearfix"></div>
                  </div>

                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_freq" id="cons_freq_offer">
                        <option value="">Select Consumable Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select>
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="consumable_sale_price_offer" name="consumable_sale_price" class="form_bor_bot" placeholder="Sale Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="consumableofferSubmit" id="submitConsumable" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div id="new_modal_2_offer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Details for offer</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">
          <div class="serviceparts reqDet">
            <div class="col-sm-12">
              <form class="" name="" id="servicepartform_offer" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="service_category_id" id="servicepart_category_offer">
                        <option value="">Select Service Part Category</option>
                        <?php foreach($serviceCategoryData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_category']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="service_type_id" id="servicepart_type_offer">
                        <option value="">Select Service Part Type</option>
                        <?php foreach($serviceTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_type']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="service_brand_id" id="servicepart_brand_offer">
                        <option value="">Select Service Part Brand</option>
                        <?php foreach($serviceBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
					<select class="form_bor_bot servicePart" name="service_name_id" id="servicepart_name_offer">
                        <option value="">Select Service Part Name</option>
                        <?php foreach($serviceName as $row){ ?>
                          <option value="<?php echo $row['id'] ?>" data-unit = <?php echo $row['unit'];?>><?php echo $row['servicepart_name']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>

                  </div>
                  <div class="">
                    <div class="col-sm-8 padd-0">
                      <input type="text" id="servicepart_qty_offer" name="service_quantity" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" id="servicepart_unit_offer" name="servicepart_unit" class="form_bor_bot " placeholder="Unit" readonly>
                    </div>
                    <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_freq" id="cons_freq_offer">
                        <option value="">Select Service Part Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select>
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="servicepart_buying_price_offer" name="servicepart_buying_price" class="form_bor_bot " placeholder="Current Buying Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="servicepart_offerSubmit" id="submit_service_part_offer" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div id="new_modal_3_offer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Details for offer</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">

            <div class="clearfix"></div><br/>

         <div class="sheetmetals reqDet" >
            <div class="col-sm-12">
              <form class="" name="" id="sheetmetalform_offer" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheet_category_id" id="sheet_category_id_offer">
                        <option value="">Select Sheet Metal Category</option>
                        <?php foreach($sheetMetalCategoryData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_category']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheet_type_id" id="sheet_type_id">
                        <option value="">Select Sheet Metal Type</option>
                        <?php foreach($sheetMetalTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_type']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheet_brand_id" id="sheetmetal_brand_offer">
                        <option value="">Select Sheet Metal Brand</option>
                        <?php foreach($sheetMetalBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_thickness" id="sheetmetal_thickness_offer">
                        <option value="">Select Sheet Metal Thickness</option>
                        <?php foreach($SheetMetalThicknessData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_thickness']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_size" id="sheetmetal_size_offer">
                        <option value="">Select Sheet Metal Size</option>
                        <?php foreach($SheetMetalSizeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['sheetmetal_size']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
					<select class="form_bor_bot" name="sheet_name_id" id="sheet_name_id_offer">
                        <option value="">Select Sheet Metal Name</option>
                        <?php foreach($SheetMetalName as $row){ ?>
                          <option value="<?php echo $row['id'] ?>" data-unit="<?php echo $row['unit'];?>"><?php echo $row['sheetmetal_name']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>

                  </div>
                  <div class="">
                    <div class="col-sm-8 padd-0">
                      <input type="text" id="sheetmetal_qty_offer" name="sheet_quantity" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                    </div>
                    <div class="col-sm-3">
                      <input type="text" id="sheetmetal_unit_offer" name="sheetmetal_unit" class="form_bor_bot " placeholder="Unit" readonly>
                    </div>
                      <div class="clearfix"></div>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="cons_freq" id="cons_freq_offer">
                        <option value="">Select Sheet Metal Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Quarterly">Quarterly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select>
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="sheetmetal_sale_price" name="sheetmetal_sale_price" class="form_bor_bot " placeholder="Current Sale Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="sheetMetalOfferSubmit" id="submit_sheet_metal_submit" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> -->
<script type="text/javascript">
  //FOR REQUEST DETAILS
  $(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".reqDet").not(targetBox).hide();
        $(targetBox).show();
    });
});
  //FOR CHATING
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chatbox").not(targetBox).hide();
        $(targetBox).show();
    });
});
jQuery('.numbersOnly').keyup(function () {
this.value = this.value.replace(/[^0-9\.]/g,'');
});
$(".decimal").keyup(function() {
    var $this = $(this);
    $this.val($this.val().replace(/[^\d.]/g, ''));
});


$('#groupbuyingmodal').on('hidden.bs.modal', function () {
    $('#buyingrequest').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#buyingrequest").validate({
    rules: {
        product_cat:{
          required:true
        },
        prod_brandName:{
          required:true
        },
        monthly_consum:{
          required:true
        },
        quartly_consum:{
          required:true
        },
        monthly_forcast:{
          required:true
        },
        buying_price:{
          required:true
        },
        prod_model:{
        	required:true
        },
      },
    messages: {
      product_cat:{
        required:"Please select product category"
      },
      prod_brandName:{
        required:"Please select brand"
      },
      monthly_consum:{
          required:"Please enter average monthly consumption"
        },
        quartly_consum:{
          required:"Please enter average quarterly consumption"
        },
        monthly_forcast:{
          required:"Please enter expected monthly forecast for next 1 year"
        },
        buying_price:{
          required:"Please enter current buying price"
        },
        prod_model:{
        	required:"Please select product model"
        },
    }
  });
  $('#prod_brandName').on('change', function() {
	var prod_brandName = $("#prod_brandName").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/machine/api/machineBrandModelList/"+prod_brandName,
		  data: {},
			success: function(result){
				$('#prod_model').empty();
				 if(result){
						var state_list=result.result.result;
						$('#prod_model')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select Product Module'));
						$.each(state_list, function(key, value) {
							$('#prod_model')
							.append($("<option></option>")
							.attr("value",value.md_id)
							.text(value.model_name));
						});
					}
				else if(result.error){

				}
			}

		});
});

//CONSUMABLES
$('#consumablesmodal').on('hidden.bs.modal', function () {
    $('#consumablesform').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#consumablesform").validate({
    rules: {
        consumable_category:{
          required:true
        },
        consumable_type:{
          required:true
        },
        consumable_brand:{
          required:true
        },
        consumable_name:{
          required:true
        },
        consumable_qty:{
          required:true
        },
        consumable_frequency:{
          required:true
        },
        consumable_buying_price:{
          required:true
        },
      },
    messages: {
      consumable_category:{
          required:"Please select category"
        },
        consumable_type:{
          required:"Please select type"
        },
        consumable_brand:{
          required:"Please select brand"
        },
        consumable_name:{
          required:"Please enter name"
        },
        consumable_qty:{
          required:"Please enter quantity"
        },
        consumable_frequency:{
          required:"Please select frequency"
        },
        consumable_buying_price:{
          required:"Please enter price"
        },
    }
});
//servicepart
$('#servicepartmodal').on('hidden.bs.modal', function () {
    $('#servicepartform').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#servicepartform").validate({
    rules: {
        servicepart_category:{
          required:true
        },
        servicepart_type:{
          required:true
        },
        servicepart_brand:{
          required:true
        },
        servicepart_name:{
          required:true
        },
        servicepart_qty:{
          required:true
        },
        servicepart_frequency:{
          required:true
        },
        servicepart_buying_price:{
          required:true
        },
      },
    messages: {
      servicepart_category:{
          required:"Please select category"
        },
        servicepart_type:{
          required:"Please select type"
        },
        servicepart_brand:{
          required:"Please select brand"
        },
        servicepart_name:{
          required:"Please enter name"
        },
        servicepart_qty:{
          required:"Please enter quantity"
        },
        servicepart_frequency:{
          required:"Please select frequency"
        },
        servicepart_buying_price:{
          required:"Please enter price"
        },
    }
});
//sheetmetal
$('#sheetmetalmodal').on('hidden.bs.modal', function () {
    $('#sheetmetalform').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#sheetmetalform").validate({
    rules: {
        sheetmetal_category:{
          required:true
        },
        sheetmetal_type:{
          required:true
        },
        sheetmetal_brand:{
          required:true
        },
        sheetmetal_thickness:{
          required:true
        },
        sheetmetal_size:{
          required:true
        },
        sheetmetal_name:{
          required:true
        },
        sheetmetal_qty:{
          required:true
        },
        sheetmetal_frequency:{
          required:true
        },
        sheetmetal_buying_price:{
          required:true
        },
      },
    messages: {
      sheetmetal_category:{
          required:"Please select category"
        },
        sheetmetal_type:{
          required:"Please select type"
        },
        sheetmetal_brand:{
          required:"Please select brand"
        },
        sheetmetal_thickness:{
          required:"Please enter sheet metal thickness"
        },
        sheetmetal_size:{
          required:"Please enter sheet metal size"
        },
        sheetmetal_name:{
          required:"Please enter name"
        },
        sheetmetal_qty:{
          required:"Please enter quantity"
        },
        sheetmetal_frequency:{
          required:"Please select frequency"
        },
        sheetmetal_buying_price:{
          required:"Please enter price"
        },
    }
});
$(".consumable").change(function(){
	debugger;
   var  consumable = $(this).data('unit');
   var option = $('option:selected', this).attr('data-unit');
   $('#consumable_units').val(option);
});

$(".servicePart").change(function(){
	debugger;
   var  consumable = $(this).data('unit');
   var option = $('option:selected', this).attr('data-unit');
   $('#servicepart_unit').val(option);
});

$(".servicePart").change(function(){
	debugger;
   var  consumable = $(this).data('unit');
   var option = $('option:selected', this).attr('data-unit');
   $('#servicepart_unit').val(option);
});

</script>
<script type="text/javascript">



                                            $(document).ready(function () {
                                                // $(".chatbox").hide();
                                                $('input[type="radio"]').click(function () {
                                                    var inputValue = $(this).attr("value");
                                                    var targetBox = $("." + inputValue);
                                                    $(".chatbox").not(targetBox).hide();
                                                    $(targetBox).show();
                                                });
                                            });

</script>


<?php $this->template->contentEnd();  ?>
