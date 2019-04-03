<?php
$this->template->contentBegin(POS_TOP);

// remote application
?>
<style type="text/css">
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        /* width: 40%; */
        border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
        background: #fff;
    }
    .top_spac{ 
        margin: 20px 0 0;
    }

    .recent_heading {
        float: left; width:40%;
    }
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{
        padding:10px 29px 10px 20px; 
        overflow:hidden; 
        border-bottom:1px solid #c4c4c4;
    }
    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{
        border:1px solid #cdcdcd; 
        /* border-width:0 0 1px 0;
          width:80%; 
          padding:2px 0 4px 6px; */
        width: 85%;
        padding: 6px;
        background:none;
    }
    .srch_bar button{
        padding: 5px;
        margin: 0;
        margin-left: -6px;
    }
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}
    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:11px; float:right;padding: 4px;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }
    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        /*padding: 18px 16px 10px;*/
        padding: 15px;
    }
    .inbox_chat { height: 365px; overflow-y: scroll;}
    .active_chat{ background:#ebebeb;}
    .incoming_msg_img {
        display: inline-block;
        width: 8%;
        float: left;
    }
    .incoming_msg_img img{
        border-radius: 15px;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 10px;
        margin: 0px 0 8px 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 10px 0px 0 10px;
        width: 100%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        /*border: medium none;*/
        color: #4c4c4c;
        font-size: 15px;
        min-height: 50px;
        width: 100%;
        border: 1px solid #c4c4c4;
        /*border-radius: 25px;*/
        padding: 0 10px;
    }
    .type_msg {/*border-top: 1px solid #c4c4c4;*/position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 8px;
        top: 8px;
        width: 33px;
    }
    .msg_send_btn:focus{
        outline: none;
    }
    .input_msg_write input:focus{
        outline: #a5c049;
    }
    .messaging { padding: 0 0 10px 0;}
    .msg_history {
        height: 250px;
        overflow-y: auto;
    }

    .tab-content{
        border: 0;
    }
    .nav-tabs>li.chat_list.active>a, .nav-tabs>li.chat_list.active>a:focus, .nav-tabs>li.chat_list.active>a:hover{
        color: #555;
        cursor: default;
        background-color: transparent !important;
        border: 0;
        border-bottom-color: transparent;
        padding: 0;
    }
    .nav>li.chat_list>a:focus, .nav>li.chat_list>a:hover {
        text-decoration: none;
        background-color: #eee0;
        border:0;
    }

</style>

<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" ">
</div>
<div class=" sq-tiles ">
  <div class="col-sm-12 padd-0 ">
 
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
        <center> <h2>collective buying</h2>
        <p>At Stelmac, we provide live online consulting for business development etc.</p></center>
        <div class="col-sm-12 padd-0">
          <?php 
		  $i = 1;
		  foreach($groupbuying_list as $groupbuyings) { ?>
             <?php if($this->session->userdata('uid')==''){ ?>
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
              <!-- <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> -->
                <div class="dad">
                    <div class="son-1" style="background-image: url('<?php echo base_url()."uploads/groupbuying/".$groupbuyings['groupbuying_cat_image']?>');"></div>
                    <div class="son-text">
                      <h3><?php echo $groupbuyings['groupbuying_cat_name']; ?> </h3>
                      <p><?php echo $groupbuyings['groupbuying_cat_description']; ?> </p>
                      <a href="" data-toggle="modal" class="btn btn_orange" data-target="#new_modal_<?php echo $i;?>">ASK</a>
					<a href="" data-toggle="modal" class="btn btn_orange" data-target="#new_modal_<?php echo $i;?>_offer">Offer</a>
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
					   <a href="" data-toggle="modal" class="btn btn_orange" data-target="#new_modal_<?php echo $i;?>">ASK</a>
					<a href="" data-toggle="modal" class="btn btn_orange" data-target="#new_modal_<?php echo $i;?>_offer">Offer</a>
                <!-- <a href="" data-toggle="modal" data-target="#groupbuyingmodal"> View More >></a> -->      
					
                    </div>
                </div>
               <!-- </a>     -->
             </div>
                <?php }?>
         <?php $i++; } ?> 
    </div>
	<!--
	<div class="col-sm-12">
		<?php if($this->session->userdata('uid') && $this->session->userdata('user_type')){ ?>
		<h4 style="text-transform: initial;"><a href="" data-toggle="modal" data-target="#newModal">Click here</a> to buy your frequent needs at optimum prices yet with our best service.</h4>
			<?php }else{?>
			<h4 style="text-transform: initial;"><a href="" data-toggle="modal" data-target="#signinModal">Click here</a> to buy your frequent needs at optimum prices yet with our best service.</h4>
		<?php }?>
	</div> -->
    </div>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
</div><!--.// sq-tiles -->
<div class="clearfix"></div><br/>
<div style="background: #f9f9f9;">
 <div class="container">
        <center><h2 style="margin: 0;">Chat with Us </h2></center>
        <div class="col-xs-12 bg_white" style="padding-top: 0;">  
            <div class="">
                <h3 class=" text-center"></h3>
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="col-sm-4 padd-0 inbox_people">
                            <div class="headind_srch">
                                <div class="recent_heading">
                                    <h4>Recent</h4>
                                </div>
                             <div class="form-group">
                                <div class="srch_bar">
                                    <div class="stylish-input-group">
                                        <input type="text" class="search-bar"  placeholder="Search" >
                                        <!-- <span class="input-group-addon"> -->
                                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                        <!-- </span>  -->
<!--                                        <br>    
                                        <br> 
                                         <a href="" class="btn btn_orange" data-toggle="modal" data-target="#Chatgroupmodal"><i class="fa fa-users" aria-hidden="true"></i></a>
-->

                                    </div>

                                </div>
                             </div>
                 
                            <ul class="nav nav-tabs inbox_chat" id="msglisthistory">
                            </ul>


                            </div>
                        </div>
                        <div class="col-sm-8 padd-8">
                            <div class="full-width pull-left mar-tb-20" id="chatWithus">
                                <div class="pull-left full-width">
                                    <!-- <center><h2 style="margin-top: 0;">Chat with Us </h2></center> -->
                                    <div class="col-sm-12 padd-0">   
                                        <form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
                                            <h3 class="vconf" style="margin-top: 0">What would you like to do?</h3>
                                            <div class="form-group" style="margin-bottom:;">
                                                <span class="col-sm-3 fg_span" ><input type="radio" value="T" name="video_chat" checked> Text chat</span>
                                                <span class="col-sm-3 fg_span" ><input type="radio" value="V" name="video_chat"> Video chat </span>
                                             <!-- 
											 
											 <span class="col-sm-3 fg_span" ><input type="radio" value="B" name="video_chat"> Book a live demo</span>
											 -->   
                                                <input type="hidden" id="videochat_request_for" name="videochat_request_for" class="form_bor_bot " value="groupbuying"> 

                                            </div> 
                                            <div class="videobtn">
                                                <?php if ($user_id == '') { ?>
                                                    <input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
                                                <?php } else { ?>
                                                    <input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/> 
                                                <?php } ?> 
                                            </div>
                                        </form><div class="clearfix"></div><br/>
                                    </div>
                                </div>
                                <div class="tab-content col-sm-12 padd-0">
                                    <div id="home" class="tab-pane fade in active">
                                        <div class="T chatbox" style="margin-top: 8px;">
                                            <div class="messaging">
                                                <div class="inbox_msg">
                                                    <div class="mesgs">
                                                        <div class="msg_history">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
<!--                                            <div class="type_msg">
                                                <div class="input_msg_write">
                                                    <input type="text" class="write_msg" id="message" reply-to=''  placeholder="Type  message" />
                                                    <input type="hidden" id="msgTo"/>
                                                    <input type="hidden" id="referenceId"/>
                                                    <input type="hidden" id="type"/>
                                                    <input type="hidden" id="chatType"/>
                                                    <button class="msg_send_btn" onclick="chatingFunction()" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                </div>
                                            </div>-->
                                            
                                  <div class="type_msg">
                                    <div class="input_msg_write">
                                        <input type="text" class="write_msg" placeholder="Type a message" />
                                       
                                        <?php
                                        if ($user_id == '' || $user_id == null) {
                                            ?>
                                            <button class="msg_send_btn" type="button" data-toggle="modal" data-target="#signinModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        <?php } else { ?>
                                            <button class="msg_send_btn" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        <?php } ?>
                                    </div>

                                </div>
                                            
                                        </div>
                                        <div class="V chatbox" style="display: none;">
                                            <!--                                            <video controls class="pull-right videosize">
                                                                                            <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                                                                            <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                                                                            Your browser does not support the video tag.
                                                                                        </video>-->
                                        </div>
                                        <div class="B chatbox" style="display: none;">
                                            <!--                                            <video controls class="pull-right videosize">
                                                                                            <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                                                                            <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                                                                            Your browser does not support the video tag.
                                                                                        </video>-->
                                        </div>
                                    </div>
                                    <div id="menu1" class="tab-pane fade">
                                        <div class="T chatbox" style="margin-top: 8px;">
                                            <div class="messaging">
                                                <div class="inbox_msg">
                                                    <div class="mesgs">
                                                        <div class="msg_history">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                          
                                        </div>
                                 
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div><br/>
        </div>
    </div>
</div>
<div class="clearfix"></div><br/>
<!-- <a href=""  data-toggle="modal" data-target="#consumablesmodal" type="submit" class="btn btn_orange">Consumables</a>
<a href=""  data-toggle="modal" data-target="#servicepartmodal" type="submit" class="btn btn_orange">service parts</a>
<a href=""  data-toggle="modal" data-target="#sheetmetalmodal" type="submit" class="btn btn_orange">sheet metals</a>
<div class="clearfix"></div><br/> 
<div id="newModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
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
          <div class="serviceparts reqDet" style="display: none;">
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
          <div class="sheetmetals reqDet" style="display: none;">
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
-->
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
