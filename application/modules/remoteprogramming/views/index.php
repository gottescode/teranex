<?php
$this->template->contentBegin(POS_TOP);
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


<?php $this->template->contentBegin(POS_TOP); ?><!-- 

        <link href="<?php echo $theme_url ?>/css/scrollheader.css" rel="stylesheet" type="text/css"> -->

<link href="<?php echo $theme_url ?>/css/remoteprogramming.css" rel="stylesheet" type="text/css">

<style type="text/css">

    @media screen and (max-width: 1024px){

        video{

            width: 100%;

        }

    }

    @media only screen and (max-width: 1024px) and (min-width: 769px)  {

        .container{

            padding: 0;

        }

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
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videosize {
        margin-top: 5px;
        height: 243px;
    }
    .nbs-flexisel-nav-right {
        right: 0px;
    }

</style>

<?php echo $this->template->contentEnd(); ?>

<div class="" style="margin-top: 69px;">
<img class="img-responsive bnr-images" src="<?php echo $theme_url ?>/images/unnamed.jpg" style="max-height:443px;" width="100%">

</div>

<div class=" sq-tiles ">

    <div class="col-sm-12 padd-0 ">

        <div class="clearfix"></div>

        <div class="padd-0">

            <div class="container-fluid myprofile-bg dahboard-bg">

                <div class="container">

                    <div class="col-sm-12">

                        <center><h2 class="margin-0">Programmer</h2></center>

                    </div>

                </div>

            </div>

            <div class="container-fluid programmers-grey-bg">

                <div class="container m-padd-0">

                    <div class="col-xs-12 col-sm-12 padd-0">

                        <form action="" method="post">

                            <!-- <div class="col-xs-12 col-sm-3 col-md-3 m-padd-0 m-m-b-10 t-p-r-10 "> --><div class="col-sm-3 col-md-3 padd-0">

                                <div class="form-group advanced-marg">

                                    <label for="inputEmail3" class="col-xs-3 col-sm-4 sort-by padd-0">Sort by:</label>

                                    <div class="col-xs-9 col-sm-8 padd-0">

                                        <select name="language" class="form-control input-form ">

                                            <?php
                                            if ($language_list) {

                                                foreach ($language_list as $rowLang) {
                                                    ?>

                                                    <option value="<?php echo $rowLang['lid']; ?>"><?php echo $rowLang['name']; ?></option>

                                                    <?php
                                                }
                                            }
                                            ?>

                                        </select>

                                    </div>

                                </div>

                            </div>

                            <div class="col-xs-12 col-sm-3 col-md-4  m-padd-0 m-m-b-10">

                                <div class="col-sm-12 input-group">

                                    <input type="text" class="form-control input-form search-go" placeholder="Search" name="programerName" value="<?php
                                    if ($this->session->userdata('programerName')) {

                                        $value = $this->session->userdata('programerName');
                                    } else {

                                        $value = '';
                                    }

                                    echo $value;
                                    ?>">

                                    <div class="input-group-btn">

                                        <button class="btn btn-default search-go" type="submit" name="btnSearch"><span>Go</span></button>

                                    </div>

                                </div>

                            </div>

                        </form>

                        <div class="col-xs-12 col-sm-3 col-md-2 m-padd-0 m-m-b-10 text-center">

                            <a href="" class="btn btn_orange" data-toggle="modal" data-target="#advsearchmodal"><span class="advanced-search">Advanced Search</span></a>

                        </div>

                        <div class="col-xs-12 col-sm-3 col-md-3 m-padd-0 m-m-b-10 pading_right_0">

                            <p class="pull-right show-p"><span class="one-ten-text"><?php echo $pageintation['start'] ?> - <?php echo $pageintation['end'] ?></span> of <?php echo $pageintation['totalCount']; ?> Programmer</p>

                        </div>

                    </div>

                </div>

            </div>

        </div>

        <div class="container">

            <center class="pull-left full-width"> <h2>Remote programming</h2>

                <p>At Stelmac, we provide live online consulting for business development etc.</p></center>

            <div class="col-sm-12 padd-0">

                <?php foreach ($remoteprogramming_list as $remoteprogrammings) { ?>

                    <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">

                        <a href="">

                            <div class=" dad">

                                <div class="son-1" style="background-image: url('<?php echo base_url() . "uploads/remoteprogramming_images/" . $remoteprogrammings['cat_image'] ?>');"></div>



                                <div class="son-text">

                                    <h3><?php echo $remoteprogrammings['cat_name'] ?> </h3>

                                    <p><?php echo $remoteprogrammings['cat_description'] ?></p>

                                </div>

                            </div>



                        </a>

                    </div>

                <?php } ?> 

            </div>

        </div>



    </div>

    <div class="clearfix"></div>

    <div>

                <!-- <center>

                        <a href="javascript:void(0)" class="btn btn_orange" id="show_prgrm">Meet Our Programmers</a> </center> -->

    </div>

    <div class="clearfix"></div>

</div><!--.// sq-tiles -->

</div>

<div id="programmer_div">



    <!-- /.container-fluid -->

    <div class="container-fliud">

        <div class="container">

            <div class="col-sm-12 padd-0">

                <h2 class="col-sm-12"><center>Meet Our Programmers</center></h2>

                <div class="">

                    <ul class="cadcam1">

                        <?php
                        if ($programmerList) {



                            $url = site_url() . "xpertconnect/api/findFeaturedListRemoteProgramming/1";

                            $assigned_details = apiCall($url, "get");



                            $assigned_id = $assigned_details['result']['user_id'];

                            $assigned_text = $assigned_details['result']['description'];





                            foreach ($programmerList as $rowConsult) {



                                if ($rowConsult['uid'] == $assigned_id) {

                                    $name = $rowConsult['u_name'];

                                    $u_avatar = $rowConsult['u_avatar'];
                                }
                                ?>

                                <li id="" >

                                    <div class="col-sm-12 col-md-12 padd-8">

                                        <div class="prgrmr amit-border">

                                            <div class="amit_img_bag">

                                                                                                                        <!-- <img src="<?php echo $theme_url ?>/images/krishna.PNG">
                                                -->
                                                <?php if ($rowConsult['u_avatar']) { ?>

                                                    <img src="<?= site_url() . '/uploads/customer/' . $rowConsult['u_avatar'] ?>" width="100px" height="100px">

                                                <?php } else { ?>

                                                    <img src="<?= site_url() . '/uploads/customer/user-default.png' ?>" width="100px" height="100px">

                                                <?php } ?> <!-- -->

                                            </div>

                                            <div class="amit-text">

                                                <span class="amit-das-text"><b><?php echo $rowConsult['u_name']; ?></b></span><br/>

                                                <p>Certified Public Bookkeeper</p>

                                                <div class="prgrmr_det">

                                                    <p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>

                                                    <p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>

                                                    <p></p>

                                                    <div class="clearfix"></div>

                                                </div><br/>

                                                <div class="clearfix"></div>

                                                <a href="<?php echo site_url() . "consultant/consultantDetail/" . $rowConsult['uid']; ?>"><button class="btn btn-default addmore-btn">View Profile </button></a>

                                            </div>

                                        </div>

                                    </div>

                                </li>

                                <?php
                            }
                        }
                        ?>

                    </ul>

                </div>

            </div>

            <nav aria-label="...">

                <?php echo pagination($pageintation['totalCount'], $pageintation['page'], $pageintation['show'], site_url() . "remoteprogramming/index/", ''); ?>

            </nav>

        </div>

        <div class="clearfix"></div>

    </div>

    <div class="container">

        <h2 style="margin-top: 4px;"><center>Request for Quotation</center></h2>

        <div class="col-sm-12 rfq-bg row-flex">

            <div class="col-sm-8 col-xs-12" style="padding-left: 0;">

                <div class="gray-bg1 collaboration-sec1">

                    <img src="<?php echo $theme_url ?>/images/used-machines.jpg" class="img-responsive" style="height:350px;">

                    <div class="sec-collaboration1">

                        <h2 class="h2-tag">An Easy Way to Send buying request to suppliers & get quotes quickly.

                            <ul>

                                <li>Get quote sfoe your custom request</li>

                                <li>Let the right suppliesrs find you</li>

                                <li>Close deals with one click</li>

                            </ul>

                        </h2>

                    </div>

                </div>

            </div>

            <div class="col-sm-4" style="background: #fff;">

                <form class="form-horizontal" name="#" id="#" method="post" action="">

                                        <!-- <h2>Request <span style="text-transform:lowercase">a</span> Quote.</h2>

                                          <div class="col-sm-12">

                                                  <div class="form-group">

                                                          <input type="text" class="form-control input-form form_bor_bot" id="#" name="#" placeholder="What are you looking for…" required>

                                                  </div>

                                          </div> -->

                    <!-- <div class="col-sm-6">

                            <div class="form-group">

                                    <input type="text" class="form-control input-form form_bor_bot" id="#" name="#" placeholder="Quantity"required>

                            </div>

                    </div>

                    <div class="col-sm-6">

                            <div class="form-group">

                                          <select name="pcs" id="#" class="form-control input-form form_bor_bot"required>

                                                  <option value="">Pieces</option>

                                                  <option value="20">20' Container</option>

                                                  <option value="40">40' Container</option>

                                                  <option value="60">60' Container</option>

                                                  <option value="80">80' Container</option>

                                                  <option value="100">100' Container</option>

                                                  <option value="200">200' Container</option>

                                                  <option value="300">300' Container</option>

                                                  <option value="500">500' Container</option>

                                          </select>

                            </div>

                    </div> -->

                    <br/><br/>

                    <?php if ($this->session->userdata('uid') && $this->session->userdata('user_type')) { ?>

                        <a href="<?php echo site_url() . "remoteprogramming/rfq" ?>" type="submit" class="btn btn_orange">Request for Quote</a>

                    <?php } else { ?>

                        <a href='#' type="submit" data-toggle='modal' data-target='#signinModal' class="btn btn_orange">Request for Quote</a>

                    <?php } ?>

                </form>

            </div>

        </div>

    </div>

    <div class="clearfix"></div>

    <!-- <div class="container rmt-programming" style="margin-top: 35px;">

            <div class="r-programming recent-view">

                    <div class="col-sm-12 padd-0">

                            <ul class="cadcam">

                                    <li id="" >

                                            <a class="thumbnail" href="#">

                                                    <img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">

                                                    <div class="amit-text text-center">

                                                            <span class="amit-das-text">Amit Das</span><br/>

                                                            <span class="certified">Certified Public Bookkeeper</span>

                                                    </div>

                                            </a>

                                    </li>

                            </ul>

                    </div>

            </div>

            <div class="clearfix"></div>

    </div> -->
    <div class="clearfix"></div><br/>
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
                                                <span class="col-sm-3 fg_span" ><input type="radio" value="B" name="video_chat"> Book a live demo</span>
<input type="hidden" id="videochat_request_for" name="videochat_request_for" class="form_bor_bot " value="RemoteTraining"> 
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
                                                        <div class="msg_history" >
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

    <div class="container-fliud r-programming recent-view">

        <div class="container">

            <center><h2>Recently Viewed</h2></center>

            <ul class="cadcam">

                <li id="" >

                    <a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">

                        <div class="amit-text text-center">

                            <span class="amit-das-text">Amit Das</span>

                            <span class="certified">Certified Public Bookkeeper</span>

                        </div>

                    </a>

                </li>

                <li id="" >

                    <a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">

                        <div class="amit-text text-center">

                            <span class="amit-das-text">Amit Das</span>

                            <span class="certified">Certified Public Bookkeeper</span>

                        </div>

                    </a>

                </li>

                <li id="" >

                    <a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">

                        <div class="amit-text text-center">

                            <span class="amit-das-text">Amit Das</span>

                            <span class="certified">Certified Public Bookkeeper</span>

                        </div>

                    </a>

                </li>

                <li id="" >

                    <a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">

                        <div class="amit-text text-center">

                            <span class="amit-das-text">Amit Das</span>

                            <span class="certified">Certified Public Bookkeeper</span>

                        </div>

                    </a>

                </li>

                <li id="" >

                    <a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">

                        <div class="amit-text text-center">

                            <span class="amit-das-text">Amit Das</span>

                            <span class="certified">Certified Public Bookkeeper</span>

                        </div>

                    </a>

                </li>

            </ul>     

        </div>

    </div>

    <div class="clearfix"></div>

    <div class="container-fliud ">

        <div class="container">

            <div class="col-sm-12 padd-0">

                <center><h2>Programmer Featured This Month</h2></center>

                <div class="last-sec">

                    <div class="col-sm-2 col-md-1 padd-0">

                        <img src="<?php echo site_url(); ?>/uploads/customer/<?php echo $u_avatar; ?>" class="img-responsive" style="border-radius: 50%;height: 70px;width: 70px;">

                    </div>

                    <div class="col-sm-10 col-md-11 padd-0">

                        <p><?php echo $assigned_text; ?></p>

                    </div>

                </div>



            </div>

        </div>

        <div class="clearfix"></div>

    </div></div>

<!-- #//programmer_div -->

<div id="advsearchmodal" class="modal fade" role="dialog">

    <div class="modal-dialog modal-sm">

        <!-- Modal content-->

        <div class="modal-content">

            <div class="modal-header">

                <button type="button" class="close" data-dismiss="modal">&times;</button>

                <center><h2 class="modal-title">Advance Search</h2></center>

            </div>

            <div class="modal-body">

                <div class="border_bot col-sm-offset-1 col-sm-10">

                    <form class="form-horizontal" name="#" id="#" method="post" action="">

                        <div class="form-group ">

                            <input type="text" class="form_bor_bot" id="keywords" name="#" placeholder="Keywords">

                        </div>

                        <div class="form-group">

                            <select name="programmer_type" id="consultancytype" class="form_bor_bot">

                                <?php foreach ($programmertype_list as $row) { ?>

                                    <option value="<?php echo $row['id'] ?>"><?php echo $row['name']; ?></option>

                                    <? } ?>

                                </select>

                            </div>

                            <div class="form-group">

                                <select name="qualification" id="qualification" class="form_bor_bot">

                                    <?php foreach ($qualificationList as $row) {
                                        ?>

                                        <option value="<?php echo $row['id'] ?>"><?php echo $row['qualification'] ?></option>

                                        <?

                                        }

                                        ?>

                                    </select>

                                </div>

                                <div class="form-group">

                                    <select name="exp_yr" id="exp_yr" class="form_bor_bot">

                                        <option value="">Years of Experience</option>

                                        <option value="1">1</option>

                                        <option value="1.5">1.5</option>

                                        <option value="2">2</option>

                                        <option value="2.5">2.5</option>

                                        <option value="3">3</option>

                                        <option value="3.5">3.5</option>

                                        <option value="4">4</option>

                                        <option value="4.5">4.5</option>

                                        <option value="5">5</option>

                                        <option value="5.5">5.5</option>

                                        <option value="6">6</option>

                                        <option value="6.5">6.5</option>

                                        <option value="7">7</option>

                                    </select>

                                </div>

                                <div class="form-group">

                                    <select name="language" class="form-control input-form ">

                                        <?php
                                        if ($language_list) {

                                            foreach ($language_list as $rowLang) {
                                                ?>

                                                <option value="<?php echo $rowLang['lid']; ?>"><?php echo $rowLang['name']; ?></option>

                                                <?php
                                            }
                                        }
                                        ?>

                                    </select>

                                </div>

                                <div class="form-group">

                                    <select name="rate" id="rate" class="form_bor_bot">

                                        <option value="">Rate</option>

                                        <option value="1">1</option>

                                        <option value="2">2</option>

                                        <option value="3">3</option>

                                        <option value="4">4</option>

                                        <option value="5">5</option>

                                    </select>

                                </div>

                                <div class="form-group">

                                    <input type="submit" name="btnSearch" id="submit" class="btn input-form adv-search form-control" value="Submit" />

                                </div>

                            </form>

                        </div>

                        <div class="clearfix"></div>

                    </div>

                </div>

            </div>

        </div>

        <?php $this->template->contentBegin(POS_BOTTOM); ?>

        <script  src="<?php echo $theme_url; ?>/js/jquery.flexisel.js"></script>

        <script type="text/javascript">
            $(document).ready(function () {
                $('input[type="radio"]').click(function () {
                    var inputValue = $(this).attr("value");
                    var targetBox = $("." + inputValue);
                    $(".chatbox").not(targetBox).hide();
                    $(targetBox).show();
                });
            });


            $('body').on('mouseenter', 'li', function () {

                //$(this).addClass('adasd');

            });

        // $(document).ready(function() {



        //    $("#programmer_div").addClass('hide');



        // 	//$("#programmer_div").addClass('hide');

        // });

        </script>

                                        <!-- <script  src="<?php echo $theme_url; ?>/js/scrollheader.js"></script> -->

        <script type="text/javascript">

        //$("#programmer_div").addClass('hide');

        //var a = 0;

        // $('#show_prgrm').click(function(){





        // 	$("#programmer_div").addClass('show');

            $('.cadcam').each(function () {

                $(this).flexisel({

                    visibleItems: 6,

                    itemsToScroll: 1,

                    autoPlay: {

                        enable: false,

                        interval: 5000,

                        pauseOnHover: true

                    },

                    responsiveBreakpoints: {

                        portrait: {

                            changePoint: 480,

                            visibleItems: 1,

                            itemsToScroll: 1

                        },

                        landscape: {

                            changePoint: 639,

                            visibleItems: 2,

                            itemsToScroll: 2

                        },

                        tablet: {

                            changePoint: 769,

                            visibleItems: 3,

                            itemsToScroll: 3

                        }

                    }

                });

            });



        // });

        //CADCAM1

            $('.cadcam1').each(function () {

                $(this).flexisel({

                    visibleItems: 4,

                    itemsToScroll: 1,

                    autoPlay: {

                        enable: false,

                        interval: 5000,

                        pauseOnHover: true

                    },

                    responsiveBreakpoints: {

                        portrait: {

                            changePoint: 480,

                            visibleItems: 1,

                            itemsToScroll: 1

                        },

                        landscape: {

                            changePoint: 639,

                            visibleItems: 3,

                            itemsToScroll: 3

                        },

                        tablet: {

                            changePoint: 769,

                            visibleItems: 4,

                            itemsToScroll: 4

                        }

                    }

                });

            });
            // video call function

        </script>


        <?php echo $this->template->contentEnd(); ?>