<?php $this->template->contentBegin(POS_TOP);?>
<style>
.mar-tb-20 {
    margin-top: 20px;
    margin-bottom: 20px;
}
video {
    display: inline-block;
    vertical-align: baseline;
    object-fit: unset;
    width: 396px;
    }
.fg_span {
    margin-bottom: 30px;
    float: left;
    width: 100%;
}
h3.vconf {
    margin-bottom: 30px;
    margin-top: -2px;
}
.videobtn{
    margin-top:57px;
    width:100%;
    float:left;
}
.videosize {
    margin-top: 5px;
    height: 243px;
}
</style>
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" ">
</div>
<div class=" sq-tiles ">
  <div class="col-sm-12 padd-0 ">
    <div class="container">
        <center> <h2>collective buying</h2>
        <p>At Stelmac, we provide live online consulting for business development etc.</p></center>
        <div class="col-sm-12 padd-0">
          <?php foreach($groupbuying_list as $groupbuyings) { ?>
             <?php if($this->session->userdata('uid')==''){ ?>
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
              <!-- <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> -->
                <div class="dad">
                    <div class="son-1" style="background-image: url('<?php echo base_url()."uploads/groupbuying/".$groupbuyings['groupbuying_cat_image']?>');"></div>
                    <div class="son-text">
                      <h3><?php echo $groupbuyings['groupbuying_cat_name']; ?> </h3>
                      <p><?php echo $groupbuyings['groupbuying_cat_description']; ?> </p>
                      <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> View More >></a>
                    </div>
                </div>
              <!-- </a> -->
            </div>
               <?php } else {?>
              <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <!-- <a href="" data-toggle="modal" data-target="#groupbuyingmodal"> -->
                  <div class=" dad">
                    <div class="son-1" style="background-image: url('<?php echo base_url()."uploads/groupbuying/".$groupbuyings['groupbuying_cat_image']?>');"></div>
                    <div class="son-text">
                      <h3><?php echo $groupbuyings['groupbuying_cat_name']; ?> </h3>
                      <p><?php echo $groupbuyings['groupbuying_cat_description']; ?> </p>
                      <a href="" data-toggle="modal" data-target="#groupbuyingmodal"> View More >></a>
                    </div>
                </div>
               <!-- </a>     -->
             </div>
                <?php }?>
         <?php } ?> 
    </div>
    <div class="col-sm-12">
      <h4 style="text-transform: initial;"><a href="" data-toggle="modal" data-target="#newModal">Click here</a> to buy your frequent needs at optimum prices yet with our best service.</h4>
    </div>
    </div>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
</div><!--.// sq-tiles -->
<div class="clearfix"></div><br/>
<div style="background: #f9f9f9;">
	<div class="container">
		<div class="col-sm-12 padd-8">
			<div class="full-width pull-left mar-tb-20" id="">
				<div class="pull-left full-width">
						<center><h2 style="margin-top: 0;">Chat with Us </h2></center>
					<div class="col-sm-offset-2 col-sm-4 padd-0">
						<form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
							<h3 class="vconf">What would you like to do?</h3>
							<div class="form-group">
								<span class="fg_span"><input type="radio" value="T" name="video_chat" checked> Text chat with a Teranex Consultant</span><br/>
								<span class="fg_span"><input type="radio" value="V" name="video_chat"> Video chat with a Teranex Consultant</span><br/>
								<!--<span class="fg_span"><input type="radio" value="B" name="video_chat"> Video chat with a Teranex Programmer</span><br/>-->
							</div>
							<div class="videobtn">
								<?php
								if($user_id==''){ ?>
								<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/>
								<?php }else{?>
								<input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/>
								<?php }?>
							</div>
						</form>
					</div>
					<div class="col-sm-4 padd-0">
						<div class="T chatbox" style="margin-top: 8px;">
							<form role="form" action="" id="contactEnquiry" method="post" enctype="multipart/form-data">
							<!-- <?php
								if($user_id==''){ echo "<h3 style='margin-top: 23px; float:right;'>Please login before submit request. <a class='orng_clr' href='#'  data-toggle='modal' data-target='#signinModal'>Click Here</a></h3> ";}?> -->
								<div class="form-group">
								   <textarea class="form-control required" name="message" id="message" placeholder="Write here.." rows="9"> </textarea>
								</div>
								<div>
								<?php
									if($user_id==''){ ?>
									<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-right" value="Send"/>
									<?php }else{?>
									<input type="submit" name="btnContactEnquiry" class="btn btn_orange pull-right" value="Send"/>
									<?php }?>
								</div>
							</form>
						</div>
						<div class="V chatbox" style="display: none;">
							<video controls class="pull-right videosize" >
							  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
							  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
							  	Your browser does not support the video tag.
							</video>
						</div>
						<div class="B chatbox" style="display: none;">
							<video controls class="pull-right videosize" >
							  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
							  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
							  	Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>
			</div>
		</div><div class="clearfix"></div>
	</div>
</div>
<div class="clearfix"></div><br/>
<a href=""  data-toggle="modal" data-target="#consumablesmodal" type="submit" class="btn btn_orange">Consumables</a>
<a href=""  data-toggle="modal" data-target="#servicepartmodal" type="submit" class="btn btn_orange">service parts</a>
<a href=""  data-toggle="modal" data-target="#sheetmetalmodal" type="submit" class="btn btn_orange">sheet metals</a>
<div class="clearfix"></div><br/>
<div id="newModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Details for request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">
            <div class="padd-0"> 
              <label class="radio-inline"><input type="radio" id="" value="consumables" name="requestdetails" checked>Consumables</label>
              <label class="radio-inline"><input type="radio" id="" value="serviceparts" name="requestdetails">Service Parts</label>
              <label class="radio-inline"><input type="radio" id="" value="sheetmetals" name="requestdetails">Sheet Metals</label>
            </div>
            <div class="clearfix"></div><br/>
          
          <div class="consumables reqDet">
            <div class="col-sm-12">
              <form class="" name="" id="consumablesform" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="consumable_category" id="consumable_category">
                          <option value="">Select Consumable Category</option>
                          <?php foreach($consumableCategoryData as $row){ ?>
                            <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_category']; ?></option>
                          <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="consumable_type" id="consumable_type">
                        <option value="">Select Consumable Type</option>
                        <?php foreach($consumableTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_type']; ?></option>
                         <?php } ?>
                      </select><span class="compulsary">*</span> 
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="consumable_brand" id="consumable_brand">
                        <option value="">Select Consumable Brand</option>
                        <?php foreach($consumableBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span> 
                  </div>
                  <div class="form-group">
                      <input type="text" id="consumable_name" name="consumable_name" class="form_bor_bot " placeholder="Name" ><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <input type="text" id="consumable_qty" name="consumable_qty" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <input type="text" id="consumable_unit" name="consumable_unit" class="form_bor_bot " placeholder="Unit" readonly>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="consumable_frequency" id="consumable_frequency">
                        <option value="">Select Consumable Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Qtrly">Qtrly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select> 
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="consumable_buying_price" name="consumable_buying_price" class="form_bor_bot numbersOnly" placeholder="Current Buying Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
          <div class="serviceparts reqDet" style="display: none;">
            <div class="col-sm-12">
              <form class="" name="" id="servicepartform" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="servicepart_category" id="servicepart_category">
                        <option value="">Select Service Part Category</option>
                        <?php foreach($serviceCategoryData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_category']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="servicepart_type" id="servicepart_type">
                        <option value="">Select Service Part Type</option>
                        <?php foreach($serviceTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_type']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span> 
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="servicepart_brand" id="servicepart_brand">
                        <option value="">Select Service Part Brand</option>
                        <?php foreach($serviceBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_brand']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span> 
                  </div>
                  <div class="form-group">
                      <input type="text" id="servicepart_name" name="servicepart_name" class="form_bor_bot " placeholder="Name" ><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <input type="text" id="servicepart_qty" name="servicepart_qty" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <input type="text" id="servicepart_unit" name="servicepart_unit" class="form_bor_bot " placeholder="Unit" readonly>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="servicepart_frequency" id="servicepart_frequency">
                        <option value="">Select Service Part Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Qtrly">Qtrly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select> 
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="servicepart_buying_price" name="servicepart_buying_price" class="form_bor_bot numbersOnly" placeholder="Current Buying Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
                  </div>
              </form>
            </div>
          </div>
          <div class="sheetmetals reqDet" style="display: none;">
            <div class="col-sm-12">
              <form class="" name="" id="sheetmetalform" method="post" enctype="multipart/form-data" action="#" >
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_category" id="sheetmetal_category">
                        <option value="">Select Sheet Metal Category</option>
                        <?php foreach($sheetMetalTypeData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_type']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_type" id="sheetmetal_type">
                        <option value="">Select Sheet Metal Type</option>
                        <?php foreach($consumableCategoryData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_category']; ?></option>
                        <?php } ?>
                      </select><span class="compulsary">*</span> 
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_brand" id="sheetmetal_brand">
                        <option value="">Select Sheet Metal Brand</option>
                        <?php foreach($sheetMetalBrandData as $row){ ?>
                          <option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_brand']; ?></option>
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
                      <input type="text" id="sheetmetal_name" name="sheetmetal_name" class="form_bor_bot " placeholder="Name" ><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <input type="text" id="sheetmetal_qty" name="sheetmetal_qty" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
                  </div>
                  <div class="form-group">
                      <input type="text" id="sheetmetal_unit" name="sheetmetal_unit" class="form_bor_bot " placeholder="Unit" readonly>
                  </div>
                  <div class="form-group">
                      <select class="form_bor_bot" name="sheetmetal_frequency" id="sheetmetal_frequency">
                        <option value="">Select Sheet Metal Frequency</option>
                        <option value="Monthly">Monthly</option>
                        <option value="Qtrly">Qtrly</option>
                        <option value="Half">Half Year</option>
                        <option value="Yearly">Yearly</option>
                      </select> 
                  </div><span class="compulsary">*</span>
                  <div class="form-group">
                      <input type="text" id="sheetmetal_buying_price" name="sheetmetal_buying_price" class="form_bor_bot numbersOnly" placeholder="Current Buying Price" ><span class="compulsary">*</span>
                  </div>
                  <div class="clearfix"></div>
                  <div class="text-center">
                      <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
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

<!-- Modal -->
<div id="groupbuyingmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Details for collective buying request</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot">
          <form class="" name="" id="buyingrequest" method="post" enctype="multipart/form-data" action="#" >
              <div class="form-group">
                  <select class="form_bor_bot" name="product_cat" id="product_cat">
                    <option value="">Select Product Category</option>
                      <?php if($machineCatList){
                        foreach($machineCatList as $rowCat){?>
                          <option value="<?php echo $rowCat['mc_id']?>" ><?php echo $rowCat['category_name']?></option>
                      <?php }}?>
                  </select> 
                 <!--  <input type="text" id="product_cat" name="product_cat" class="form_bor_bot" value="value come from backend" readonly> -->
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="prod_brandName" id="prod_brandName">
                    <option value="">Select Brand</option>
                    <?php if($brandList){
                      foreach($brandList as $rowBrand){?>
                    <option value="<?php echo $rowBrand['mb_id']?>"  <?php if($rowProduct['prod_brandName']==$rowBrand['mb_id']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
                      <?php }}?>
                  </select><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="prod_model" id="prod_model">
                    <option value="">Select Product Model</option>
                  </select><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="monthly_consum" name="monthly_consum" class="form_bor_bot numbersOnly" placeholder="Average Monthly Consumption" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="quartly_consum" name="quartly_consum" class="form_bor_bot numbersOnly" placeholder="Average Quarterly Consumption" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="monthly_forcast" name="monthly_forcast" class="form_bor_bot numbersOnly" placeholder="Expected Monthly Forecast" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="buying_price" name="buying_price" class="form_bor_bot decimal" placeholder="Current Buying Price" ><span class="compulsary">*</span>
              </div>
              <div class="clearfix"></div>
              <div class="text-center">
                  <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
              </div>
          </form>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!--CONSUMABLES Modal -->
<div id="consumablesmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Consumables Request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot">
          <form class="" name="" id="consumablesform" method="post" enctype="multipart/form-data" action="#" >
              <div class="form-group">
                  <select class="form_bor_bot" name="consumable_category" id="consumable_category">
          				    <option value="">Select Consumable Category</option>
            					<?php foreach($consumableCategoryData as $row){ ?>
            						<option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_category']; ?></option>
            					<?php } ?>
                  </select><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="consumable_type" id="consumable_type">
                    <option value="">Select Consumable Type</option>
          					<?php foreach($consumableTypeData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_type']; ?></option>
        					   <?php } ?>
        				  </select><span class="compulsary">*</span> 
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="consumable_brand" id="consumable_brand">
                    <option value="">Select Consumable Brand</option>
          					<?php foreach($consumableBrandData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_brand']; ?></option>
          					<?php } ?>
                  </select><span class="compulsary">*</span> 
              </div>
              <div class="form-group">
                  <input type="text" id="consumable_name" name="consumable_name" class="form_bor_bot " placeholder="Name" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="consumable_qty" name="consumable_qty" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="consumable_unit" name="consumable_unit" class="form_bor_bot " placeholder="Unit" readonly>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="consumable_frequency" id="consumable_frequency">
                    <option value="">Select Consumable Frequency</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Qtrly">Qtrly</option>
                    <option value="Half">Half Year</option>
                    <option value="Yearly">Yearly</option>
                  </select> 
              </div><span class="compulsary">*</span>
              <div class="form-group">
                  <input type="text" id="consumable_buying_price" name="consumable_buying_price" class="form_bor_bot numbersOnly" placeholder="Current Buying Price" ><span class="compulsary">*</span>
              </div>
              <div class="clearfix"></div>
              <div class="text-center">
                  <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
              </div>
          </form>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!--SERVICE PART Modal -->
<div id="servicepartmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Service Part Request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot">
          <form class="" name="" id="servicepartform" method="post" enctype="multipart/form-data" action="#" >
              <div class="form-group">
                  <select class="form_bor_bot" name="servicepart_category" id="servicepart_category">
                    <option value="">Select Service Part Category</option>
          					<?php foreach($serviceCategoryData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_category']; ?></option>
          					<?php } ?>
                  </select><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="servicepart_type" id="servicepart_type">
                    <option value="">Select Service Part Type</option>
          					<?php foreach($serviceTypeData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_type']; ?></option>
          					<?php } ?>
                  </select><span class="compulsary">*</span> 
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="servicepart_brand" id="servicepart_brand">
                    <option value="">Select Service Part Brand</option>
          					<?php foreach($serviceBrandData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_brand']; ?></option>
          					<?php } ?>
                  </select><span class="compulsary">*</span> 
              </div>
              <div class="form-group">
                  <input type="text" id="servicepart_name" name="servicepart_name" class="form_bor_bot " placeholder="Name" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="servicepart_qty" name="servicepart_qty" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="servicepart_unit" name="servicepart_unit" class="form_bor_bot " placeholder="Unit" readonly>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="servicepart_frequency" id="servicepart_frequency">
                    <option value="">Select Service Part Frequency</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Qtrly">Qtrly</option>
                    <option value="Half">Half Year</option>
                    <option value="Yearly">Yearly</option>
                  </select> 
              </div><span class="compulsary">*</span>
              <div class="form-group">
                  <input type="text" id="servicepart_buying_price" name="servicepart_buying_price" class="form_bor_bot numbersOnly" placeholder="Current Buying Price" ><span class="compulsary">*</span>
              </div>
              <div class="clearfix"></div>
              <div class="text-center">
                  <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
              </div>
          </form>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<!--SHEET METAL Modal -->
<div id="sheetmetalmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Sheet Metal Request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot">
          <form class="" name="" id="sheetmetalform" method="post" enctype="multipart/form-data" action="#" >
              <div class="form-group">
                  <select class="form_bor_bot" name="sheetmetal_category" id="sheetmetal_category">
                    <option value="">Select Sheet Metal Category</option>
          					<?php foreach($sheetMetalTypeData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_type']; ?></option>
          					<?php } ?>
                  </select><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="sheetmetal_type" id="sheetmetal_type">
                    <option value="">Select Sheet Metal Type</option>
          					<?php foreach($consumableCategoryData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['consumable_category']; ?></option>
          					<?php } ?>
                  </select><span class="compulsary">*</span> 
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="sheetmetal_brand" id="sheetmetal_brand">
                    <option value="">Select Sheet Metal Brand</option>
          					<?php foreach($sheetMetalBrandData as $row){ ?>
          						<option value="<?php echo $row['id'] ?>"><?php echo $row['servicepart_brand']; ?></option>
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
                  <input type="text" id="sheetmetal_name" name="sheetmetal_name" class="form_bor_bot " placeholder="Name" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="sheetmetal_qty" name="sheetmetal_qty" class="form_bor_bot numbersOnly" placeholder="Quantity" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="sheetmetal_unit" name="sheetmetal_unit" class="form_bor_bot " placeholder="Unit" readonly>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="sheetmetal_frequency" id="sheetmetal_frequency">
                    <option value="">Select Sheet Metal Frequency</option>
                    <option value="Monthly">Monthly</option>
                    <option value="Qtrly">Qtrly</option>
                    <option value="Half">Half Year</option>
                    <option value="Yearly">Yearly</option>
                  </select> 
              </div><span class="compulsary">*</span>
              <div class="form-group">
                  <input type="text" id="sheetmetal_buying_price" name="sheetmetal_buying_price" class="form_bor_bot numbersOnly" placeholder="Current Buying Price" ><span class="compulsary">*</span>
              </div>
              <div class="clearfix"></div>
              <div class="text-center">
                  <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
              </div>
          </form>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
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
</script>
<?php $this->template->contentEnd();  ?> 
