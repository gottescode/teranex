<?php
$this->template->contentBegin(POS_TOP);

// remote application
?>
<!-- chating ui css-->
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
<style type="text/css">
    .row {
        margin-right: -8px;
        margin-left: -8px;
    }
    .mar-tb-20 {
        margin-top: 3px;
        margin-bottom: 4px;
    }
    video {
        display: inline-block;
        vertical-align: baseline;
        object-fit: unset;
        width: 396px;
    }
    .fg_span {
        /*margin-bottom: 30px;*/
        float: left;
        /*width: 100%;*/
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
/*        margin-top:57px;
        width:100%;
        float:left;*/
    }
    .videosize {
        margin-top: 5px;
        height: 243px;
    }
</style><style type="text/css">
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
<style type="text/css">
    .row {
        margin-right: -8px;
        margin-left: -8px;
    }
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
        /*margin-bottom: 30px;*/
        float: left;
        /*width: 100%;*/
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
/*        margin-top:57px;
        width:100%;
        float:left;*/
    }
    .videosize {
        margin-top: 5px;
        height: 243px;
    }
</style>
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
<!-- 

    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/exchangegroup1-min.jpg" alt=" ">
-->

    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/exchange-group-n.jpg" alt=" "style="
    max-height: 446px;
">
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
        <center> <h2>Exchange Groups</h2>
        <p>content not available</p></center>
        <div class="col-sm-12 padd-0">
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <div class="dad">
                    <!-- 
						<div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/exchangegroup2-min.jpeg');"></div>
					-->
                    
					<div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/request-exchangegroup.jpg');"></div>
                    <div class="son-text">
                      <!-- 
					  <h3>Request</h3>
                      <p>content not available</p>
					  <?php if($this->session->userdata('uid')){
						  ?>
						<a href="" data-toggle="modal" class="btn btn_orange" data-target="#newModal">ASK</a>
						<?  } ?>
						
						<?php if($this->session->userdata('uid')==''){
							?>
							<a href="" class="btn btn_orange" data-toggle="modal" data-target="#signinModal">ASK </a>
							<?
						}?>					  
					  -->
					  <h3>Spare Production Capatcity</h3>
                      <p>content not available</p>
					  <?php if($this->session->userdata('uid')){
						  ?>
						<a href="" data-toggle="modal" class="btn btn_orange" data-target="#newModal">Ask</a>
						<a href="#"  data-toggle="modal" class="btn btn_orange" data-target="#signinModal" type="submit"> Offer</a> 
						<?  } ?>
						
						<?php if($this->session->userdata('uid')==''){
							?>
							<a href="" class="btn btn_orange" data-toggle="modal" data-target="#signinModal">Ask </a>
							<a href="" class="btn btn_orange" data-toggle="modal" data-target="#signinModal">Offer </a>
							<?
						}?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <div class="dad">
					<!-- 
                    <div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/exchangegroup3-min.jpg');"></div>
					
					-->
                    <div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/spare-parts-min.jpg');"></div>
                    <div class="son-text">
                      <!-- 
					  <h3>Offer</h3>
					  
					  -->

					  <h3>Spare Parts/Tooling/Raw Materials</h3>



                      <p>content not available</p>

						<?php if($this->session->userdata('uid')){  ?>
						<a href="" data-toggle="modal" class="btn btn_orange" data-target="#newModal">Ask</a>
						<a href="#"  data-toggle="modal" class="btn btn_orange" data-target="#signinModal" type="submit"> Offer</a> 
						<?  } ?>
						
						<?php if($this->session->userdata('uid')==''){
							?>
							<a href="" class="btn btn_orange" data-toggle="modal" data-target="#signinModal">Ask </a>
							<a href="" class="btn btn_orange" data-toggle="modal" data-target="#signinModal">Offer </a>
							<?
						}?>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <div class="dad">
                    <div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/discussion-board.jpg');"></div>
                    <div class="son-text">
                      <h3>Discussion Board</h3>
                      <p>content not available</p>
                       <a href="<?php echo site_url()."community/forum"; ?>" class="btn btn_orange" >View</a> 
                      <!-- <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> View More >></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div><div class="clearfix"></div>
  </div>
</div><!--.// sq-tiles -->
<div class="clearfix"></div><br/>

<div class="container-fluid">
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-flex padd-0">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12  pading_left_0 ">
        <h2>Recent Post Available</h2>
      </div>
    </div>
    <ul class="cadcam">
	<?php foreach($offeredData as $row){ 
	$contry_id = $row['country_id'];
		$state_id = $row['state_id'];
		$city_id = $row['city_id'];
		
		$url = site_url()."customer/exchangegroupapi/findSingleCountry/{$contry_id}";
		$countryName =  apiCall($url,"get");
		
		$url = site_url()."customer/exchangegroupapi/findSingleState/{$state_id}";
		$stateName =  apiCall($url,"get");
	
		$url = site_url()."customer/exchangegroupapi/findSingleCity/{$city_id}";
		$cityName =  apiCall($url,"get");
	
	?>
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong><?php echo $row['supplier_name'];?></strong></h4>
                          <p><b>Category</b>: <?php echo $row['category'];?></p>
                          <p><b>Location</b>: <b>Country</b>: <?php echo $countryName['result']['country_name'].", <b>State</b>: ".$stateName['result']['state_name'].", <b>City:</b> ".$cityName['result']['city_name'];?></p>
                        
                          <p class="course_trainer"><b>Description: </b><?php echo $small = substr($row['description'], 0, 100);?></p>
                          <span class="text-center"><a href="" data-toggle="modal" data-attr-val="<?php echo $row['id']?>"data-supplier-val="<?php echo $row['supplier_id']?>" class="btn btn_orange responseToOffer" >Response</a></center>
                        </span>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li> 
		<? } ?>
           </ul>
  </div>
</div>
<div class="clearfix"></div><br/>
<div class="container-fluid">
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-flex padd-0">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12  pading_left_0 ">
        <h2>Recent Post Requested</h2>
      </div>
    </div>
 <ul class="cadcam1">
	<?php foreach($requestedData as $row){ 
	$contry_id = $row['country_id'];
		$state_id = $row['state_id'];
		$city_id = $row['city_id'];
		
		$url = site_url()."customer/exchangegroupapi/findSingleCountry/{$contry_id}";
		$countryName =  apiCall($url,"get");
		
		$url = site_url()."customer/exchangegroupapi/findSingleState/{$state_id}";
		$stateName =  apiCall($url,"get");
	
		$url = site_url()."customer/exchangegroupapi/findSingleCity/{$city_id}";
		$cityName =  apiCall($url,"get");
	
	?>
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong><?php echo $row['customer_name'];?></strong></h4>
                          <p><b>Category</b>: <?php echo $row['category'];?></p>
                          <p><b>Location</b>: <b>Country</b>: <?php echo $countryName['result']['country_name'].", <b>State</b>: ".$stateName['result']['state_name'].", <b>City:</b> ".$cityName['result']['city_name'];?></p>
                        
                          <p class="course_trainer"><b>Description: </b><?php echo $small = substr($row['description'], 0, 100);?></p>
                       <a href="" data-toggle="modal" data-attr-val="<?php echo $row['id']?>"data-customer-val="<?php echo $row['customer_id']?>" class="btn btn_orange responseToOffer1" >Response</a>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li> 
		<? } ?>
           </ul>
  </div>
</div>
<div class="clearfix"></div><br/>
	               <div class="container">
        <center><h2 style="margin: 0;">Chat with Us </h2></center>
        <div class="col-xs-12 bg_white" style="padding-top: 0;">  
            <div class="">
                <h3 class=" text-center"></h3>
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="col-sm-4 padd-0 inbox_people" style="margin-bottom: 0px;">
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
                            <div class="full-width pull-left mar-tb-20" id="chatWithus" style="margin-top: 3PX;margin-bottom:5px">
                                <div class="pull-left full-width">
                                    <!-- <center><h2 style="margin-top: 0;">Chat with Us </h2></center> -->
                                    <div class="col-sm-12 padd-0">   
                                        <form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
                                            <h3 class="vconf" style="margin-top: 0;margin-bottom:5px">What would you like to do?</h3>
                                            <div class="form-group" style="margin-bottom:;">
                                                <span class="col-sm-3 fg_span" ><input type="radio" value="T" name="video_chat" checked> Text chat</span>
                                                <span class="col-sm-3 fg_span" ><input type="radio" value="V" name="video_chat"> Video chat </span>
                                             <!-- 
												<span class="col-sm-3 fg_span" ><input type="radio" value="B" name="video_chat"> Book a live demo</span>
											 -->  
										<input type="hidden" id="videochat_request_for" name="videochat_request_for" class="form_bor_bot " value="ExchangeGroup"> 
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
                                                        <div class="msg_history" id="msghistory">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            
                                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <?php
                                        $user_id = $this->session->userdata('uid');
                                        ?>
                                        <input type="hidden" class="write_msg" value="<?php echo $user_id; ?>" id="userid" placeholder="Type a message" />
                                        <input type="hidden" class="write_msg" value="<?php echo $machineID; ?>" id="machineId" placeholder="Type a message" />
                                        <input type="text" class="write_msg" id="message"  placeholder="Type a message" />
                                        <input type="hidden" class="write_msg" id="type" value="1" />
                                        <input type="hidden" class="write_msg" id="chatTypeId"/>

                                        <?php
                                        if ($user_id == '' || $user_id == null) {
                                            ?>
                                            <button class="msg_send_btn" type="button" data-toggle="modal" data-target="#signinModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        <?php } else { ?>
                                            <button class="msg_send_btn" onclick="chatingFunction(<?php echo $user_id; ?>,<?php echo $machineID; ?>)" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                                        <div class="T chatbox" style="margin-top: 0px;">
                                            <div class="messaging">
                                                <div class="inbox_msg">
                                                    <div class="mesgs">
                                                        <div class="msg_history" id="msghistory">
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
<div class="clearfix"></div><br/>

<div id="newModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <center><h4 class="modal-title">Details for request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">
          <form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
			<fieldset>
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="category_id">Category:<span class="star">*</span></label>
					<div class="col-sm-8">
						<select name="category" id="category" class="form_bor_bot"  required="">
							<option value="">Select Category</option>
							<option value="Material">Material</option>
							<option value="Spares">Spares</option>
							<option value="Toolings">Toolings</option>
						</select>
						
					</div>
			  	</div> 
			   
				<div class="form-group">
					<label class="control-label col-sm-3" for="description"> Description:</label>
					<div class="col-sm-8">
					<textarea   name="description" id="description" class="form-control " ><?=$machine_data['description']?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_country"> Country: </label>
					<div class="col-sm-8">
					<select name="contry_id" id="country_id" onchange="myFunctionState()" class="form_bor_bot">
								<option value="">Select Country</option>
								<?php if($countryList){
									foreach($countryList as $rowCountry){?>
									<option value="<?=$rowCountry['id']?>" ><?=$rowCountry['country_name']?></option>
								<?php }}?>
							</select>	
					</div>
				</div>
				<div class="form-group"><label class="control-label col-sm-3" for="cust_branch_country"> State : </label>
					<div class="col-sm-8">
					<select name="state_id" id="state_id" onchange="myFunctionCity()" class="form_bor_bot">
							<option value="">Select State</option>
							 <?php if($stateList){
								foreach($stateList as $rowState){?>
								<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$machine_data['machine_location_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
							<?php }}?>
						</select>		
				</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_location_city">   City : </label>
					<div class="col-sm-8">
					<select name="city_id" id="city_id" class="form_bor_bot">
						<option value="">Select City</option> 
							 <?php if($cityList){
									foreach($cityList as $rowCity){?>
									<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$machine_data['machine_location_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
								<?php }}?>
					</select>	
					</div>
				 </div>
					 
				<div class="form-group">
					<label class="control-label col-sm-3" for="timeline">Timeline:</label>
					<div class="col-sm-8">
					<textarea   name="timeline" id="timeline" class="form-control " ><?=$machine_data['timeline']?></textarea>
					</div>
				</div> 
		
			  <div class="form-group"> 
				<div class="text-center">
				 <input type="submit" name="Submit" value="Submit" class="btn btn_orange"> 
					</div>
			  </div> 
			</fieldset>
		</form>
			
</div>
		  <div class="clearfix"></div>
		
			<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<div id="newOffer" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <center><h4 class="modal-title">Response to offer</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">
			<form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label class="control-label col-sm-3" for="description"> Comment:</label>
						<div class="col-sm-8">
						<textarea   name="description" id="description" class="form-control " ><?=$machine_data['description']?></textarea>
						</div>
					</div>
						
					<div class="form-group"> 
						<div class="text-center">
							<input type="submit" name="offerSubmit" value="Submit" class="btn btn_orange"> 
							<input type="hidden" id="offer_id" name="offer_id" value=""/> 
							<input type="hidden" id="supplier_id" name="supplier_id" value=""/> 
							<input type="hidden" name="id" value=""/> 
						</div>
					</div> 
				</fieldset>
			</form>
		</div>
		<div class="clearfix"></div>
	 </div>
    </div>
  </div>
</div>
<div id="newOffer1" class="modal fade" role="dialog">
    <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <center><h4 class="modal-title">Response</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">
			<form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label class="control-label col-sm-3" for="description"> Description:</label>
						<div class="col-sm-8">
						<textarea   name="description" id="description" placeholder = "Enter Description Here" class="form-control " ></textarea>
						</div>
					</div>
						
					<div class="form-group"> 
						<div class="text-center">
							<input type="submit" name="requestSubmit" value="Submit" class="btn btn_orange"> 
							<input type="hidden1" id="req_id" name="req_id" value=""/> 
							<input type="hidden1" id="customer_id" name="customer_id" value=""/> 
							<input type="hidden1" name="id" value=""/> 
						</div>
					</div> 
				</fieldset>
			</form>
		</div>
		<div class="clearfix"></div>
	 </div>
    </div>
  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>
<script type="text/javascript">

function myFunctionState() {
    //var x = document.getElementById("brandId").value;
 //  alert(country_id);
	var country_id = $("#country_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getStateList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#state_id').empty();
				 if(result){ 					
						var state_list=result.result; 
						$('#state_id')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select State'));	
						$.each(state_list, function(key, value) { 
							$('#state_id')
							.append($("<option></option>")
							.attr("value",value.sid)
							.text(value.state_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});

}
/* function responseToOffer(e) {
    //var x = document.getElementById("brandId").value;
 //  alert(country_id);
	alert(id);
	
		 console.log(e);

} */
$('body').on('click', '.responseToOffer', function() {
	var id = $(this).data('attr-val');
	$("#offer_id").val(id);
	var sup_id = $(this).data('supplier-val');
	$("#supplier_id").val(sup_id);
	$('#newOffer').modal('show');
});
$('body').on('click', '.responseToOffer1', function() {
	var id = $(this).data('attr-val');
	$("#req_id").val(id);
	var cust_id = $(this).data('customer-val');
	$("#customer_id").val(cust_id);
	$('#newOffer1').modal('show');
});
function myFunctionCity()
{

	var country_id = $("#state_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getCityList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#city_id').empty();
				 if(result){ 					
						var city_list= result.result;  
						$.each(city_list, function(key, value) { 
							$('#city_id')
							.append($("<option></option>")
							.attr("value",value.id)
							.text(value.city_name));
						});		
					}
				else if(result.error){
				
				} 
			}
		});

}




  $(window).load(function() {
        $('.cadcam').each(function(){
          $(this).flexisel({
          visibleItems: 5,
          itemsToScroll: 1,         
          autoPlay: {
            enable: false,
            interval: 5000,
            pauseOnHover: true
          },

          responsiveBreakpoints: { 
            portrait: { 
              changePoint:480,
              visibleItems: 1,
              itemsToScroll: 1
            }, 
            landscape: { 
              changePoint:639,
              visibleItems: 2,
              itemsToScroll: 2
            },
            tablet: { 
              changePoint:769,
              visibleItems: 3,
              itemsToScroll: 3
            }
          }       
        });
      });
  }); 

  $(window).load(function() {
        $('.cadcam1').each(function(){
          $(this).flexisel({
          visibleItems: 5,
          itemsToScroll: 1,         
          autoPlay: {
            enable: false,
            interval: 5000,
            pauseOnHover: true
          },

          responsiveBreakpoints: { 
            portrait: { 
              changePoint:480,
              visibleItems: 1,
              itemsToScroll: 1
            }, 
            landscape: { 
              changePoint:639,
              visibleItems: 2,
              itemsToScroll: 2
            },
            tablet: { 
              changePoint:769,
              visibleItems: 3,
              itemsToScroll: 3
            }
          }       
        });
      });
      }); 

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
