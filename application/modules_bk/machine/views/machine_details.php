<?php $this->template->contentBegin(POS_TOP); ?>
<!-- <link href="<?php echo $theme_url ?>/css/jquery.bxslider.min.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/css/machine.css"/>
<style type="text/css">
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
        background: #fff;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
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
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 8%;
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
        /*float: left;*/
        padding: 10px 0px 0 10px;
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
        border: medium none;
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
        height: 150px;
        overflow-y: auto;
    }
    #slideshow {
        overflow: hidden;
        width: 389px;
        height: 240px;
        padding: 0;
        margin: 0 auto;
        list-style-type: none;
    }
    .bx-viewport, .bx-viewport img {
        min-height: 250px;
    }
    .finance_type h3 {
        /* padding: 36px 75px; */
        padding: 0px 14px;
    }
    video {
        display: inline-block;
        vertical-align: baseline;
        object-fit: unset;
        width: 476px;
        height: 271px;
        /* object-fit: cover; */
    }
    #slideshow li {
        list-style-type: none;
    }
    .bx-pager { text-align: center; }
    .bx-pager-item { display: inline-block; margin: 0 10px; }
    .bx-pager-item .active { color: #F08A22; }
    .bx-prev { float: left; }
    .bx-next { float: right; }
    /*.bx-prev:before{content: '\f101';} */
    #slide-counter {
        text-align: center;
        /*margin: 15px 0 0 0;*/
        font-size: 14px;
        color: #a5c049;
    }
    .cadcam1 .nbs-flexisel-item img{
        /*height: 170px;  */  
        width: 100%;
    }
    .sldsft .nbs-flexisel-nav-right {
        right: 0px;
    }
    .popover.right{
        right:125px!important;
        margin-left:0px!important;
    }
    .nbs-flexisel-nav-left, .nbs-flexisel-nav-right{display:none}
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-left, 
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-right{display:block;}
    .nbs-flexisel-nav-left {
        left: 10px!important;
    }
    .nbs-flexisel-nav-right {
        right: 10px!important;
    }
    .mar-tb-20 {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .softbx-bdr {
        /* min-height: 304px;*/
    }
    .videosize{    /*margin-top: 5px;*/
        height: 240px;}

    .table_nb .table>tbody>tr>td, 
    .table_nb .table>tbody>tr>th, 
    .table_nb .table>tfoot>tr>td, 
    .table_nb .table>tfoot>tr>th, 
    .table_nb .table>thead>tr>td, 
    .table_nb .table>thead>tr>th{
        padding-top: 0;
        padding-bottom: 15px;
        line-height: 22px;
        padding-left:0px;
    }
    .bx-controls-direction a {
        margin-top: 2px;
    }
    .row {
        margin-right: -8px;
        margin-left: -8px;
    }
    .finance_type h3 {
        color: #fff;
        font-family: "Helvetica Neue",Helvetica;
    }
    .finance_type .fn {
        border-radius: 10px;
        background-color: rgba(0, 0, 0, 0.6);
        /*-webkit-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        -moz-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);*/
        border-radius: 10px;
    }
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
    .fg_span {
        margin-top: 5px;
        margin-bottom: 20px;
        /* float: left;*/
        /*width: 100%;*/
        display: block;
        margin-left: 10px;
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
        margin-top:5px;
        width:100%;
        float:left;
    }
    table.member_table tr td, th{
        border: 0 !important;
    }
    .technical_spec table.table>thead>tr>th{
        border: 0 !important;
    }
    .service_avail{
        font-size: 20px;
        color: green;
    }
    .service_navail{
        font-size: 20px;
        color: red;
    }
    .dad:hover > .son-1 {
        -moz-transform: scale(2,2);
        -webkit-transform: scale(2,2);
        transform: none;
    }
    /*GALLERY*/
    .gallery .card {
        cursor: pointer;
    }

    .galleryShadow {
        display: none;
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .galleryModal {
        -webkit-transform: scale(0);
        transform: scale(0);
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: #000;
        z-index: 10111;
    }

    .galleryModal .galleryContainer {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 80%;
        height: 80%;
    }

    .galleryModal .galleryContainer img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
        border: 10px solid #fff;
        border-radius: 10px;
    }

    .galleryModal .galleryContainer .galleryText {
        position: absolute;
        width: 100%;
        height: auto;
        top: 100%;
        color: #fff;
        text-align: center;
    }

    .galleryModal .galleryIcon {
        position: absolute;
        font-size: 2rem;
        width: 2rem;
        height: 2rem;
        text-align: center;
        color: #fff;
    }

    .galleryModal .gIquit {
        right: 10px;
        top: 10px;
    }

    .galleryModal .gIleft {
        top: 50%;
        left: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .galleryModal .gIright {
        top: 50%;
        right: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>
<?php
echo $this->template->contentEnd();
$user_id = $this->session->userdata('uid');
$machineID = $this->uri->segment(3);
//print_r($product_id);exit;
?> 
<div class="cons-details">
    <div class="container-fluid myprofile-bg dahboard-bg">
        <div class="container">
            <div class="col-sm-12 padd-0">
                <span class="couns-heading">
                    <h2><?php echo $machineDetails['modelName'] ?></h2>
                    <p><?php echo $machineDetails['city_name'] ?> | <?php echo $machineDetails['state_name'] ?></p>
                </span>
            </div>
        </div>
    </div>
    <!-- /.container --> 

    <!-- /.myprofile-bg -->
    <div class="container-fluid used-machines-nav">
        <div class="container">
            <div class="clearfix"></div>
            <?php
            // display messages
            if (hasFlash("dataMsgEnquirySuccess")) {
                ?>
                <br><div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgEnquirySuccess"); ?>
                </div>
            <?php } ?>
            <div class="clearfix"></div>
            <div class="col-sm-12 padd-0">
                <ul class="tab_h text-center">
                    <li><a href="#at_glance" id="ag1">At a Glance</a></li> 
                    <li>|</li> 
                    <li><a href="#at_glance">Gallery</a></li>
                    <li>|</li> 
                    <li><a href="#machineHistory">Machine History</a> </li>
                    <li>|</li>
                    <li><a href="#time_Study">Time Study</a></li>
                    <li>|</li>
                    <li><a href="#machineHistory">Machine Services</a> </li>
                    <li>|</li>
                    <li><a href="#technical_spec">Machine Specifications</a></li>
                    <li>|</li> 
                    <li><a href="#Software">Software</a></li>
                    <li>|</li>  
                    <li><a href="#financesection">Finance</a></li>
                    <li>|</li>  
                    <li style="padding: 0;"><a href="#chatWithus">Chat With Us</a></li>
                    <li>|</li>  
                </ul>
                <div class="clearfix"></div>
                <hr/>
            </div>
        </div>
        <!-- /.container --> 
    </div>
    <!-- /.myprofile-bg -->
    <div class="feature-this-month-bg" id="desc">
        <div class="container">
            <div class="col-sm-12 padd-0">
                <p class="rcomment readmore">
                    <?php echo strhtmldecode($machineDetails['machine_description']) ?>
                </p>
            </div>
        </div>
    </div>
    <div class="detail_heading">
        <div class="container">
            <div class="col-sm-12 padd-0">
                <div class="" id="at_glance">
                    <div class="col-sm-6 padd-0 consu-table table_nb">
                        <h2>At a Glance</h2>
                        <?php //echo strhtmldecode($machineDetails['machine_at_a_glance'])  ?>
                        <table class="table tbl-responsive " style="margin-top: -5px;">
                            <tbody>
                                <tr>
                                    <th>Brand <span class="pull-right">:</span></th><td> <?php echo $machineDetails['brandName'] ?></td>
                                </tr>
                                <tr>
                                    <th>Model <span class="pull-right">:</span></th><td> <?php echo $machineDetails['modelName'] ?></td>
                                </tr>
                                <tr>
                                    <th>Type <span class="pull-right">:</span></th><td><?php echo $machineDetails['category_name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Year <span class="pull-right">:</span></th><td><?php echo $machineDetails['year_production'] ?></td>
                                </tr>
                                <tr>
                                    <th>Condition <span class="pull-right">:</span></th><td> <?php echo $machineDetails['machine_condition'] ?></td>
                                </tr>
                                <tr>
                                    <th>Location <span class="pull-right">:</span></th><td> <?php echo $machineDetails['city_name'] . ", " . $machineDetails['state_name'] ?></td>
                                </tr>
                                <tr>
                                    <th>Seller <span class="pull-right">:</span></th><td><?php echo $machineDetails['seller_name'] ?></td>
                                </tr>
                                <tr>
                                    <th style="padding-bottom:0;line-height:1;">Price <span class="pull-right">:</span></th>
                                    <td style="padding-bottom:0;line-height:1;"><?php echo $machineDetails['price'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="col-sm-6 padd-0  consu-table" style="padding-top:0">
                        <h2>Gallery</h2>
                        <div>
                            <!-- <ul class="bxslider">
                            <?php
                            if ($machineAllImages) {
                                foreach ($machineAllImages as $rowMachine) {
                                    if ($rowMachine['photo_name']) {
                                        ?>                                                                           
                                                                            <li><img src="<?php echo base_url() . "uploads/machine/" . $rowMachine['photo_name'] ?>" width="100%" style="min-height: 187px;"/></li>
                                        <?php
                                    }
                                }
                            }
                            ?> 
                            </ul> -->
                            <ul id="slideshow">

                                <?php
                                if ($machineAllImages) {
                                    foreach ($machineAllImages as $rowMachine) {
                                        if ($rowMachine['photo_name']) {
                                            ?>

                                            <li><div class="gallery">
                                                    <div class="galleryItem card">
                                                        <img src="<?php echo base_url() . "uploads/machine/" . $rowMachine['photo_name'] ?>" width="100%" style="min-height: 187px;" class="card-img-top" data-text=""/>
                                                    </div>
                                                </div>
                                            </li>
                                            <li><div class="gallery">
                                                    <div class="galleryItem card">
                                                        <video controls class="pull-right videosize card-img-top">
                                                            <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                                            <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                                            Your browser does not support the video tag.
                                                        </video>
                                                    </div>
                                                </div>
                                            </li>

                                            <?php
                                        }
                                    }
                                }
                                ?>
                            </ul> 
                            <div id="slide-counter"></div>

                        </div>
                    </div>

                    <hr/>
                    <div class="clearfix"></div>
                </div>
                <div class="" id="machineHistory">
                    <div class="col-sm-6 padd-8 consu-table" style="padding-top:0">
                        <div class="" id="machine_history">
                            <h2>Machine History</h2>
                            <?php echo strhtmldecode($machineDetails['machine_history']) ?>
                        </div>
                    </div>
                    <div class="col-sm-6 padd-0 consu-table table_nb">
                        <h2>Available Services</h2>
                        <table class="table tbl-responsive " style="margin-top: -5px;">
                            <tbody>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;Remote Machine Service</th>
                                </tr>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;Remote Training</th>
                                </tr>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;Remote Application Support</th>
                                </tr>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;Deffered LC</th>
                                </tr>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;Warranty</th>
                                </tr>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;Installation & Commissioning</th>
                                </tr>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;CAD/CAM Training</th>
                                </tr>
                                <tr>
                                    <th><span class="service_avail"><i class="fa fa-check" aria-hidden="true"></i></span>&nbsp;&nbsp;Machine Operator Training</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="" id="technical_spec">
                    <div class="pull-left full-width">
                        <h2>Machine Specifications</h2> 
                        <?php /* if($machineDetails['category_id'] == 13 || $machineDetails['category_id'] == 14 || $machineDetails['category_id'] == 15 ) { */ ?>
                        <!-- FOR LASER MACHINE -->
                        <div class="col-sm-12 technicalSpecifications padd-0">
                            <div class="col-sm-3">
                                <center><h3>Technical Data</h3></center>
                                <?php echo strhtmldecode($machineDetails['technical_specification']) ?>
                            </div>
                            <div class="col-sm-6" style="padding-left: 0;">
                                <center><h3>Standard Configuration</h3></center>
                                <?php echo strhtmldecode($machineDetails['standard_specification']) ?>
                            </div>
                            <div class="col-sm-3 padd-0" >
                                <center><h3>Additional Equipment</h3></center>
                                <?php echo strhtmldecode($machineDetails['additional_equipment']) ?>
                            </div>
                        </div>
                        <?php /* } */ ?>
                        <!-- FOR PUNCHING MACHINE -->
                        <?php /* if($machineDetails['category_id'] == 17) { */ ?>
                        <!--<div class="col-sm-12 technicalSpecifications padd-0">
                                <table class="table ">
                                        <tr class="col-sm-12 " >
                                                <td class="" style="padding: 0;">
                                                        <h3 class="text-center">Technical Data</h3>
                        <?php echo strhtmldecode($machineDetails['technical_specification']) ?>
                                                </td>
                                                <div class="col-sm-7" style="padding-left: 0;">
                                                        <center><h3>Standard Configuration</h3></center>
                        <?php echo strhtmldecode($machineDetails['standard_specification']) ?>
                                                </div>
                                                <td class="" style="padding: 0;">
                                                        <h3 class="text-center">Additional Equipments</h3>
                        <?php echo strhtmldecode($machineDetails['additional_equipment']) ?>
                                                </td>
                                        </tr>
                                </table>
                        </div>-->
                        <?php /* } */ ?>
                        <!-- FOR BENDING MACHINE -->
                        <?php /* if($machineDetails['category_id'] == 12) { */ ?>
                        <!--<div class="col-sm-12 technicalSpecifications padd-0">
                                <table class="table ">
                                        <tr class="col-sm-12 padd-0">
                                                <td class="text-center" style="padding: 0;">
                                                        <h3 class="text-center">Technical Data</h3>
                        <?php echo strhtmldecode($machineDetails['technical_specification']) ?>
                                                </td>
                                                <td class="" style="padding: 0;">
                                                        <h3 class="text-center">Standard Configuration</h3>
                        <?php echo strhtmldecode($machineDetails['standard_specification']) ?>
                                                </td>
                                                <td class="" style="padding: 0;">
                                                        <h3 class="text-center">Machine Configuration</h3>
                        <?php echo strhtmldecode($machineDetails['additional_equipment']) ?>
                                                </td>
                                        </tr>
                                </table>
                        </div>-->
                        <?php /* } */ ?>
                    </div><br/>
                    <center class="pull-left full-width"><?php
                        if ($user_id == '') {
                            echo '<a href="" class="btn btn_orange " data-toggle="modal" data-target="#signinModal">Enquire</a>';
                        } else {
                            echo '<a href="" class="btn btn_orange" data-toggle="modal" data-target="#enquiremodal">Enquire</a>';
                        }
                        ?></center><div class="clearfix"></div><br/>
                    <hr/><div class="clearfix"></div>
                </div> 	
                <div class="clearfix"></div><br/>
                <div class="" id="Software">
                    <div class="pull-left full-width">
                        <div class="col-sm-12 padd-0 sldsft">
                            <div class="row">
                                <div class="col-sm-1 myDIV"><h2 class="" style="transform:rotate(270deg);margin-top:100px;">Softwares</h2></div>
                                <div class="col-sm-11">
                                    <ul class="cadcam1">
                                        <?php
                                        if (isset($softwareList)) {

                                            foreach ($softwareList as $key) {
                                                //  print_r($key);die;
                                                ?>
                                                <li>
                                                    <div style="margin: 8px;">
                                                        <!-- <div class="softbx-bdr soft-list-details" data-toggle="popover" title="Software Name" data-content="Software Details"> -->
                                                        <div class="softbx-bdr soft-list-details">
                                                            <img src="<?php echo site_url() . "uploads/machine_software/" . $key['machine_image'] ?>" width="" height="" class="img-responsive" />

                                                            <img src="http://www.teranex.io/beta-V*SRJ!-110918-230718/themes/site/images/logo20_old.jpg" alt=""/>
                                                            <h3><?php echo $key['machine_name']; ?></h3>
                                                        </div>
                                                        <div class="checkbox text-center padd-0">
                                                            <label style="line-height: 22px;"><input type="checkbox" value="">Add to Machine</label>
                                                        </div>
                                                    </div>
                                                </li>
                                            <?php }
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="clearfix"></div><hr/><div class="clearfix"></div>
            </div>
            <!-- <div class="" id="">
                    <div class="col-sm-6 consu-table" style="padding-top:0">
                            <h2>Available Finance</h2>
                            <div class="col-sm-12 padd-0 finance_types">
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn1">
                                                            <h3>Flexible Payment</h3>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn2">
                                                            <h3>Machine as Collateral</h3>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn3">
                                                            <h3>Easy Documentation</h3>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn4">
                                                            <h3>LC Opening Facility</h3>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                            <h5 class="pull-right">Require a Loan ? Let us help you..<a href="" data-toggle='modal' data-target='#loanrequire' class="orng_clr">Click here</a></h5>
                    </div>
                    <div class="col-sm-6 consu-table" style="padding-top:0">
                            <h2>Available Insurance</h2>
                            <div class="col-sm-12 padd-0 finance_types">
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn1">
                                                            <h3>Flexible Payment</h3>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn2">
                                                            <h3>Machine as Collateral</h3>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn3">
                                                            <h3>Easy Documentation</h3>
                                                    </div>
                                            </div>
                                    </div>
                                    <div class="col-sm-6 padd-0">
                                            <div class="finance_type">
                                                    <div class="fn fn4">
                                                            <h3>LC Opening Facility</h3>
                                                    </div>
                                            </div>
                                    </div>
                            </div>
                            <h5 class="pull-right">Require a Loan ? Let us help you..<a href="" data-toggle='modal' data-target='#loanrequire' class="orng_clr">Click here</a></h5>
                    </div>
            </div> -->
            <div class="" id="financesection">
                <div class="col-sm-6 consu-table" style="padding-top:0">
                    <h2>Available Finance</h2>
                    <div class="col-sm-12 padd-0 ">
                        <a href="" data-toggle="modal" data-target="#loanrequire">
                            <div class=" dad">
                                <div class="son-1" style="background-image: url('<?php echo $theme_url ?>/images/financetype.jpg');"></div>
                                <div class="son-text">
                                    <h3>Require a Loan ? Let us help you..Click here..</h3>
                                    <ul style="padding: 0 20px;">
                                        <li>Flexible Payment</li>
                                        <li>Machine as Collateral</li>
                                        <li>Easy Documentation</li>
                                        <li>LC Opening Facility</li>
                                    </ul>					
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-sm-6 consu-table" style="padding-top:0">
                    <h2>Available Insurance</h2>
                    <div class="col-sm-12 padd-0">
                        <a href="" data-toggle="modal" data-target="#insurancerequire">
                            <div class=" dad">
                                <div class="son-1" style="background-image: url('<?php echo $theme_url ?>/images/financetype.jpg');"></div>
                                <div class="son-text">
                                    <h3>Require an Insurance ? Let us help you..Click here..</h3>
                                    <ul style="padding: 0 20px;">
                                        <li>Flexible Payment</li>
                                        <li>Machine as Collateral</li>
                                        <li>Easy Documentation</li>
                                        <li>LC Opening Facility</li>
                                    </ul>					
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
             <div class="" id="time_Study">
                <div class="col-sm-12 consu-table" style="padding-top:0">
                    <h2>Request for time Study</h2>
                    <div class="col-sm-12 padd-0 ">
                        
                            <div class=" dad">
                                <div class="son-1" style="background-image: url('<?php echo $theme_url ?>/images/financetype.jpg');"></div>
                                <div class="son-text">
                                    <?php if ($user_id == '') { ?>
                                       <h3>Request for time Study ? Let us help you..<a href=""data-toggle="modal" data-target="#signinModal"> Click here..</a></h3>
                                    <?php } else { ?>
                                    <a href="" data-toggle="modal" data-target="#timestudy"><h3>Request for time Study ? Let us help you..Click here..</h3> </a> <?php } ?>        
                                </div>
                            </div>
                       
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <!-- <div class="" id="chatWithus">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-5  consu-table" style="padding-top:0">
                            <h2>Chat with Us</h2>
                            <div>
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
            $user_id = 1;
            ?>
                                                    <input type="hidden" class="write_msg" value="<?php echo $user_id; ?>" id="userid" placeholder="Type a message" />
                                                    <input type="hidden" class="write_msg" value="<?php echo $machineID; ?>" id="machineId" placeholder="Type a message" />
                                                      <input type="text" class="write_msg" id="message" placeholder="Type a message" />
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
                                            </div>
                                    </div>
                                    <div class="V chatbox" style="display: none;">
                                            <video controls class="pull-right videosize">
                                                    <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                                    <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                                    Your browser does not support the video tag.
                                            </video>
                                    </div>
                                    <div class="B chatbox" style="display: none;">
                                            <video controls class="pull-right videosize">
                                                    <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                                    <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                                    Your browser does not support the video tag.
                                            </video>
                                    </div>
                                    <div class="clearfix"></div>
                                    <div>
                                            <span class="fg_span"><input type="radio" value="T" name="video_chat" checked> Text chat</span> &nbsp; &nbsp;
                                            <span class="fg_span"><input type="radio" value="V" name="video_chat"> Video chat</span> &nbsp; &nbsp;
                                            <span class="fg_span"><input type="radio" value="B" name="video_chat"> Book live demo</span>
                                    </div>
                                    
                            </div>
                    </div>
            </div> -->

        </div>
    </div> 
    <div style="background: #f9f9f9;">
        <div class="container">
            <div class="col-sm-12 padd-8">
                <div class="full-width pull-left mar-tb-20" id="chatWithus">
                    <div class="pull-left full-width">
                        <center><h2 style="margin-top: 0;">Chat with Us </h2></center>
                        <div class="col-sm-offset-2 col-sm-4 padd-0">	
                            <form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
                                <h3 class="vconf">What would you likes to do?</h3>
                                <div class="form-group" style="margin-bottom:30px;">
                                    <span class="fg_span" ><input type="radio" value="T" name="video_chat" checked> Text chat</span>
                                    <span class="fg_span" ><input type="radio" value="V" name="video_chat"> Video chat </span>
                                    <span class="fg_span" ><input type="radio" value="B" name=""> Book a live demo</span>
                                </div> 
                                <div class="videobtn">
                                    <?php if ($user_id == '') { ?>
                                        <input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
                                    <?php } else { ?>
                                        <input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit" id="submitrequest" data-custom="<?php echo $this->session->userdata('uid'); ?>"/> 
<?php } ?> 
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4 padd-0">
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
                                <video controls class="pull-right videosize">
                                    <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                    <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                            <div class="B chatbox" style="display: none;">
                                <video controls class="pull-right videosize">
                                    <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                    <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
</div> 

<!-- Machine Enquiry modal  -->
<div id="enquiremodal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h2 class="modal-title">Machine Enquiry</h2></center>
            </div>
            <div class="modal-body">
                <div class="border_bot col-sm-offset-1 col-sm-10">
                    <form class="form-horizontal" name="#" id="machine_enquiry" method="post" action=""> 
                        <div class="form-group ">
                            <input type="text" class="form_bor_bot" id="]" name="" value="<?php echo $machineDetails['brandName'] ?>" placeholder="Brand" >
                            <input type="hidden" class="form_bor_bot" id="brand" name="brand" value="<?php echo $machineDetails['brand_name'] ?>" placeholder="Brand" >
                        </div>
                        <div class="form-group ">
                            <input type="text" class="form_bor_bot" id="machinetype" name="machinetype" value="<?php echo ucwords($machineDetails['category_name']) ?>" readonly >
                        </div>
                        <div class="form-group ">
                            <input type="text" class="form_bor_bot" id="model" name="model" value="<?php echo $machineDetails['modelName'] ?>" readonly>
                        </div>
                        <div class="form-group ">
                            <textarea type="text" name="message" id="MEmessage" class="form_bor_bot" placeholder="Message"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="btnEnquiry" id="submit" class="btn input-form adv-search form-control btn_orange" value="Submit" />
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div><br/>
            </div>
        </div>
    </div>
</div>

<!-- Loan require modal  -->
<div id="loanrequire" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h2 class="modal-title">Loan Enquiry</h2></center>
            </div>
            <div class="modal-body">
                <div class="border_bot col-sm-12">
                    <form role="form" action="" id="loanEnquiry" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="company_name" id="" class="form_bor_bot" placeholder="Company Name"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="contact_person" id="contact_person" class="form_bor_bot lettersOnly" placeholder="Contact Person"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone_no" id="phone_no" class="form_bor_bot numbersOnly" minlength="10" maxlength="10" placeholder="Phone Number"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email_id" id="email_id1" class="form_bor_bot" placeholder="Email"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <select name="country_id" id="country_id" class="form_bor_bot">
                                <option value="">Country</option>
                                <option>india</option>
                            </select><span class="compulsary">*</span>
                        </div>
                        <div>
                            <center><input type="submit" class="btn btn_orange" name ="btnRequest" value="Submit"></center>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div><br/>
            </div>
        </div>
    </div>
</div>

<!-- Request Timestudy  -->
<div id="timestudy" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h3 class="modal-title">Time Study Request</h3></center>
            </div>
            <div class="modal-body">
                <div class="border_bot col-sm-12">
                    <form role="form" action="" id="timestudy" method="post" enctype="multipart/form-data"> 
                        <div class="form-group">
                            <label>Tell Us About Your Part</label>
                            <textarea type="text" name="description" id="description" class="form_bor_bot" placeholder="Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Upload Your Design</label>
                            <input type="file" class="" id="drawing_upload" name="drawing_upload" placeholder="Drawing upload"  />
                        </div>
                         <div>
                          <center><input type="submit" class="btn btn_orange" name ="btnRequestTimeStudy" value="Submit"></center>
                        </div>
                        
                    </form>
                </div>
                <div class="clearfix"></div><br/>
            </div>
        </div>
    </div>
</div>
<!-- Insurance require modal  -->
<div id="insurancerequire" class="modal fade" role="dialog">
    <div class="modal-dialog insurancerequiremodal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h2 class="modal-title">Insurance Enquiry</h2></center>
            </div>
            <div class="modal-body">
                <div class="border_bot col-sm-12">
                    <form role="form" action="" id="insuranceEnquiry" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="company_name" id="company_name" class="form_bor_bot" placeholder="Company Name"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="contact_person" id="contact_person" class="form_bor_bot lettersOnly" placeholder="Contact Person"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="phone_no" id="phone_no" class="form_bor_bot numbersOnly" minlength="10" maxlength="10" placeholder="Phone Number"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <input type="text" name="email_id" id="email_id" class="form_bor_bot" placeholder="Email"><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <select name="country_id" id="country_id" class="form_bor_bot">
                                <option value="">Country</option>
                                <option>india</option>
                            </select><span class="compulsary">*</span>
                        </div>
                        <div>
                            <center><input type="submit" class="btn btn_orange" name ="btnRequestInsurance" value="Submit"></center>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div><br/>
            </div>
        </div>
    </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM); ?>

                                                                        <!-- <script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script>  --> 
<script src="<?= $theme_url ?>/js/jquery.bxslider.js"></script>
<script src="<?= $theme_url ?>/js/jquery.flexisel.js"></script>	
<script type="text/javascript">
                                            $(document).ready(function () {
                                                getChatHistory();
                                            });
                                            setInterval(function ()
                                            {
                                                getChatHistory();
                                            }, 10000);//time in milliseconds
                                            // enter text box function

                                            //                                                    document.getElementById("txt_username").onkeypress = function (event) {
                                            //                                                        if (event.keyCode == 13 || event.which == 13) {
                                            //                                                            alert("You are clicked");
                                            //                                                        }
                                            //                                                    };

                                            //                                                    function myFunction(userId, machineId, type) {
                                            //                                                        $('#message').val();
                                            //                                                        var msg = $('#message').val();
                                            //                                                        var type = $("#type").val()
                                            //                                                         chatingFunction(userId, machineId, type);
                                            //                                                     }

                                            //                                                     function getChatHistory()
                                            //                                                        chatingFunction(userId, machineId, type);
                                            //                                                    }

                                            function getChatHistory()
                                            {
                                                var userId = $("#userid").val();
                                                var machineId = $("#machineId").val();
                                                $.ajax({
                                                    type: 'POST',
                                                    url: "<?php echo base_url(); ?>machine/getChat/",
                                                    data: {userId: userId, machineId: machineId},
                                                    success: function (msg) {
                                                        var data = JSON.stringify(msg);
                                                        var datapars = JSON.parse(data);
                                                        var msg = "";
                                                        var msgFrom = "";
                                                        var msgTo = "";
                                                        var created_at = "";
                                                        var htmlStr = "";
                                                        $.each(datapars, function (eventindex, eventData) {
                                                            msg = eventData.message;
                                                            msgFrom = eventData.msg_from;
                                                            msgTo = eventData.msg_to;
                                                            created_at = eventData.created_at;
                                                            if (msgFrom == userId)
                                                            {
                                                                htmlStr += "<div class='incoming_msg'>";
<?php if ($u_avatar = $this->session->userdata('u_avatar') != '') { ?>
                                                                    htmlStr += "<div class='incoming_msg_img'> <img src='<?php echo site_url() . "uploads/customer/" . $u_avatar = $this->session->userdata('u_avatar'); ?>' alt='sunil'> </div>";
<?php } else { ?>
                                                                    htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
<?php } ?>
                                                                htmlStr += "<div class='received_msg'>";
                                                                htmlStr += "<div class='received_withd_msg'>";
                                                                htmlStr += "<p>" + msg + "</p>";
                                                                htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                                                                htmlStr += "</div>";
                                                                htmlStr += "</div>";
                                                            } else
                                                            {
                                                                htmlStr += "<div class='outgoing_msg'>";
                                                                htmlStr += "<div class='sent_msg'>";
                                                                htmlStr += "<p>" + msg + "</p>";
                                                                htmlStr += "<span class='time_date'>" + created_at + "</span> ";
                                                                htmlStr += "</div>";
                                                                htmlStr += "</div>";
                                                            }
                                                        });
                                                        $("#msghistory").html(htmlStr);
                                                    },
                                                    error: function (result)
                                                    {
                                                        //alert("3232");
                                                    },
                                                    fail: (function (status) {
                                                        //alert("8888");
                                                    }),
                                                    beforeSend: function (d) {
                                                        //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                                                    }
                                                });
                                            }
                                            function chatingFunction(userId, machineId, type)
                                            {
                                                // alert('hi');
                                                $('#message').val();
                                                var msg = $('#message').val();
                                                var type = $("#type").val();
                                                /// alert(type);

                                                if (msg != "") {
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: "<?php echo base_url(); ?>machine/saveChat/",
                                                        // data: "userId="+userId+",machineId="+machineId+",msg="+msg,
                                                        data: {userId: userId, machineId: machineId, msg: msg, type: type},
                                                        success: function (msg) {
                                                            $("#message").val("");
                                                            $.ajax({
                                                                type: 'POST',
                                                                url: "<?php echo base_url(); ?>machine/getChat/",
                                                                data: {userId: userId, machineId: machineId},
                                                                success: function (msg) {
                                                                    var data = JSON.stringify(msg);
                                                                    var datapars = JSON.parse(data);
                                                                    var msg = "";
                                                                    var msgFrom = "";
                                                                    var msgTo = "";
                                                                    var created_at = "";
                                                                    var htmlStr = "";
                                                                    $.each(datapars, function (eventindex, eventData) {
                                                                        msg = eventData.message;
                                                                        msgFrom = eventData.msg_from;
                                                                        msgTo = eventData.msg_to;
                                                                        created_at = eventData.created_at;
                                                                        if (msgFrom == userId)
                                                                        {
                                                                            htmlStr += "<div class='incoming_msg'>";
                                                                            htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
                                                                            htmlStr += "<div class='received_msg'>";
                                                                            htmlStr += "<div class='received_withd_msg'>";
                                                                            htmlStr += "<p>" + msg + "</p>";
                                                                            htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                                                                            htmlStr += "</div>";
                                                                            htmlStr += "</div>";
                                                                        } else
                                                                        {
                                                                            htmlStr += "<div class='outgoing_msg'>";
                                                                            htmlStr += "<div class='sent_msg'>";
                                                                            htmlStr += "<p>" + msg + "</p>";
                                                                            htmlStr += "<span class='time_date'>" + created_at + "</span> ";
                                                                            htmlStr += "</div>";
                                                                            htmlStr += "</div>";
                                                                        }
                                                                    });
                                                                    $("#msghistory").html(htmlStr);
                                                                },
                                                                error: function (result)
                                                                {
                                                                    //alert("3232");
                                                                },
                                                                fail: (function (status) {
                                                                    //alert("8888");
                                                                }),
                                                                beforeSend: function (d) {
                                                                    //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                                                                }
                                                            });
                                                        },
                                                        error: function (result)
                                                        {
                                                            //alert("3232");
                                                        },
                                                        fail: (function (status) {
                                                            //alert("8888");
                                                        }),
                                                        beforeSend: function (d) {
                                                            //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                                                        }
                                                    });
                                                }
                                            }
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
<script language="javascript" type="text/javascript">
    $(".tab_h").find("a").click(function (e) {
        e.preventDefault();
        var section = $(this).attr("href");
        $("html, body").animate({
            scrollTop: $(section).offset().top - 130
        });
    });
    function toggleIcon(e) {
        $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('glyphicon-plus glyphicon-minus');
    }

    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
    $('.technicalSpecifications table').addClass('table table-striped');
</script>

<script type="text/javascript">
    // 	$(document).ready(function(){
    //     $("ag1").click(function(){
    //         $("at_glance").css("padding-top", "100");
    //     });
    // });
    //readmore
    $(document).ready(function () {
        var showChar = 600;
        var ellipsestext = "...";
        var moretext = "Read More";
        var lesstext = "Show Less";
        $('.readmore').each(function () {
            var content = $(this).html();

            if (content.length > showChar) {

                var c = content.substr(0, showChar);
                var h = content.substr(showChar - 1, content.length - showChar);

                var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

                $(this).html(html);
            }

        });

        $(".morelink").click(function () {
            if ($(this).hasClass("less")) {
                $(this).removeClass("less");
                $(this).html(moretext);
            } else {
                $(this).addClass("less");
                $(this).html(lesstext);
            }
            $(this).parent().prev().toggle();
            $(this).prev().toggle();
            return false;
        });
    });

    function SaveDataToLocalStorage(machineId)
    {

        var machineIds = [];
        // Parse the serialized data back into an aray of objects
        machineIds = JSON.parse(localStorage.getItem('sessionMachine'));
        // Push the new data (whether it be an object or anything else) onto the array
        machineIds = jQuery.grep(machineIds, function (value) {
            return value != machineId;
        });
        machineIds.push(machineId);
        // Re-serialize the array back into a string and store it in localStorage
        localStorage.setItem('sessionMachine', JSON.stringify(machineIds));
    }

    $(document).ready(function () {
        machineId = localStorage.getItem('sessionMachine');
        var startMachineId = [];
        if (machineId == '' || !machineId) {
            startMachineId.push('0');
            localStorage.setItem('sessionMachine', JSON.stringify(startMachineId));
        }
        SaveDataToLocalStorage('<?php echo $machineDetails['md_id'] ?>');

        // $('.bxslider').bxSlider({
        // 	auto: true,
        // 			autoControls: false,
        // 	mode: 'horizontal',
        // 	moveSlides: 1,
        // 	slideMargin: 0,
        // 	infiniteLoop: true,
        // 	slideWidth: 660,
        // 	minSlides: 1,
        // 	maxSlides: 1,
        // 	speed: 400,
        // 	controls:true,
        // 	pager:true,
        // });
    });

    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.lettersOnly').keyup(function () {
        this.value = this.value.replace(/[^A-Za-z \.]/g, '');
    });
    jQuery.validator.addMethod("valEmail", function (value, element) {
        return this.optional(element) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value);
    }, 'Please enter a valid email address');

    // $('#loanrequire').on('hidden.bs.modal', function () {
    //     $('#machine_enquiry').validate().resetForm();
    //     $('.error').removeClass('error');
    //     $(this).find('form').trigger('reset');
    // });
    $('#enquiremodal').on('hidden.bs.modal', function () {
        $('#machine_enquiry').validate().resetForm();
        $('.error').removeClass('error');
        $(this).find('form').trigger('reset');
    });
    $("#machine_enquiry").validate({
        rules: {
            name: {
                required: true
            },
            companyname: {
                required: true
            },
            email: {
                required: true,
                valEmail: true
            },
            phone: {
                required: true
            },
            message: {
                required: true
            },
        },
        messages: {
            name: {
                required: "Please enter name"
            },
            companyname: {
                required: "Please enter company name"
            },
            email: {
                required: "Please enter email id"
            },
            phone: {
                required: "Please enter phone number"
            },
            message: {
                required: "Please enter your message"
            },
        }
    });
    //loanEnquiry validation
    $('#loanrequire').on('hidden.bs.modal', function () {
        $('#loanEnquiry').validate().resetForm();
        $('.error').removeClass('error');
        $(this).find('form').trigger('reset');
    });
    $("#loanEnquiry").validate({
        rules: {
            contact_person: {
                required: true
            },
            company_name: {
                required: true
            },
            email_id: {
                required: true,
                valEmail: true
            },
            phone_no: {
                required: true
            },
            country_id: {
                required: true
            },
        },
        messages: {
            contact_person: {
                required: "Please enter contact person name"
            },
            company_name: {
                required: "Please enter company name"
            },
            email_id: {
                required: "Please enter email id"
            },
            phone_no: {
                required: "Please enter phone number"
            },
            country_id: {
                required: "Please select country"
            },
        }
    });
    //insuranceEnquiry validation
    $('#insurancerequire').on('hidden.bs.modal', function () {
        $('#insuranceEnquiry').validate().resetForm();
        $('.error').removeClass('error');
        $(this).find('form').trigger('reset');
    });
    $("#insuranceEnquiry").validate({
        rules: {
            contact_person: {
                required: true
            },
            company_name: {
                required: true
            },
            email_id: {
                required: true,
                valEmail: true
            },
            phone_no: {
                required: true
            },
            country_id: {
                required: true
            },
        },
        messages: {
            contact_person: {
                required: "Please enter contact person name"
            },
            company_name: {
                required: "Please enter company name"
            },
            email_id: {
                required: "Please enter email id"
            },
            phone_no: {
                required: "Please enter phone number"
            },
            country_id: {
                required: "Please select country"
            },
        }
    });
    //contactEnquiry
    $("#contactEnquiry").validate({
        rules: {
            message: {
                required: true
            },
        },
        messages: {
            message: {
                required: "Please enter message"
            },
        }
    });

    $(document).ready(function () {
        $("#listDetails").hide();
        $("#showllist").click(function () {
            $("#listDetails").toggle();
        });
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({
            placement: 'right',
            trigger: 'hover'
        });
    });
</script>
<script type="text/javascript">
    (function ($) {
        $(document).ready(function () {

            //bxslider
            $('#slide-counter').prepend('<strong class="current-index"></strong>/');

            var slider = $('#slideshow').bxSlider({
                auto: false,
                pager: false,
                onSliderLoad: function (currentIndex) {
                    $('#slide-counter .current-index').text(currentIndex + 1);
                },
                onSlideBefore: function ($slideElement, oldIndex, newIndex) {
                    $('#slide-counter .current-index').text(newIndex + 1);
                }
            });

            $('#slide-counter').append(slider.getSlideCount());
        });
    })(jQuery);

    $(window).load(function () {
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
    });

</script>
<script type="text/javascript">
    $(function () {
        $('body').append(`
                <div class="galleryShadow"></div>
                <div class="galleryModal">
                  <i class="galleryIcon gIquit fa fa-times-circle"></i>
                  <i class="galleryIcon gIleft fa fa-chevron-left"></i>
                  <i class="galleryIcon gIright fa fa-chevron-right"></i>
                  <div class="galleryContainer">
                      <img src="">
                  </div>  
                </div>
                `)
        $('.gIquit').click(function () {
            $('.galleryModal').css({'transform': 'scale(0)'})
            $('.galleryShadow').fadeOut()
        })
        $('.gallery').on('click', '.galleryItem', function () {
            galleryNavigate($(this), 'opened')
            $('.galleryModal').css({'transform': 'scale(1)'})
            $('.galleryShadow').fadeIn()
        })
        let galleryNav
        let galleryNew
        let galleryNewImg
        let galleryNewText
        $('.gIleft').click(function () {
            galleryNew = $(galleryNav).prev()
            galleryNavigate(galleryNew, 'last')
        })
        $('.gIright').click(function () {
            galleryNew = $(galleryNav).next()
            galleryNavigate(galleryNew, 'first')
        })
        function galleryNavigate(gData, direction) {
            galleryNewImg = gData.children('img').attr('src')
            if (typeof galleryNewImg !== "undefined") {
                galleryNav = gData
                $('.galleryModal img').attr('src', galleryNewImg)
            } else {
                gData = $('.galleryItem:' + direction)
                galleryNav = gData
                galleryNewImg = gData.children('img').attr('src')
                $('.galleryModal img').attr('src', galleryNewImg)
            }
            galleryNewText = gData.children('img').attr('data-text')
            if (typeof galleryNewText !== "undefined") {
                $('.galleryModal .galleryContainer .galleryText').remove()
                $('.galleryModal .galleryContainer').append('<div class="galleryText">' + galleryNewText + '</div>')
            } else {
                $('.galleryModal .galleryContainer .galleryText').remove()
            }
        }
    });

    $("#message").keyup(function (event) {
        if (event.keyCode === 13) {
            chatingFunction('<?php echo $user_id; ?>', '<?php echo $machineID; ?>');
        }
    });
    // video chat onclick function

    $("#submitrequest").click(function () {
        var customAttr = $(this).attr("data-custom");
        var radioBoxValue = $("input[name='video_chat']:checked").val();
        if (radioBoxValue == "V") {

            window.open("<?php echo site_url(); ?>/welcome/opentok", "_blank");


        }
    });
</script>

<?php echo $this->template->contentEnd(); ?> 