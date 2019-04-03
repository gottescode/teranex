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



<?php $this->template->contentBegin(POS_TOP); ?>
<style type="text/css">

    .star_rating22 ul{margin:0;padding:0;}
    .star_rating22 .spanStar{cursor:pointer;list-style-type: none;display: inline-block;color: #F0F0F0;text-shadow: 0 0 1px #666666;font-size:18px;}
    .star_rating22 .selected {color:#F4B30A;text-shadow: 0 0 1px #F48F0A;}
    .rating_cnt{color: #000; font-size:15px;}
    .rating_active{    color: #ff8a43 !important;}
    .son-text a{
        color: #a5c049;
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
    
    .videosize {
        margin-top: 5px;
        height: 243px;
    }
</style>
<?php echo $this->template->contentEnd(); ?> 
<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url ?>/images/remotetraining.jpg" alt=" ">
</div>

<!-- <?php
if ($category_list) {
    $b = 0;
    $cat_count = 1;
    $id = 0;
    $id1 = count($category_list);
    foreach ($category_list as $rowCategory) {
        $counts = round($id1 / 2);
        $cat_count++;
        $b++;
        $courseUrl = site_url() . "remotetraining/api/findMultipleCourse/$rowCategory[id]";
        $course_list = apiCall($courseUrl, "get");
        ?>
                                <?
                                        if($id==$counts){
                                ?>
                                        <?
                                        }
                                ?>

                                <div class="container-fluid <?php
        if ($b % 2) {
            echo "gray-bg";
        } else {
            echo "black-bg";
        }
        ?>">
                                        <div class="container">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-flex pading_left_0 pading_right_0 ">
                                                        <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 catgry_name pading_left_0 ">
                                                                <h2>Top Courses in "<?php echo $rowCategory['cat_name'] ?>"</h2>
                                                        </div>
                                                        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-12" style="padding: 0;">
                                                                <a href="<?php echo site_url() . "remotetraining/courseList/$rowCategory[id]/" . formaturl($rowCategory[cat_name]) ?>" target="_blank" class="btn btn-default addmore-btn" style="margin-top: 10%;float: right;">View All</a>
                                                        </div>
                                                </div>
                                                <ul class="cadcam">
        <?php
        if ($course_list) {
            $courseList = $course_list['result'];
            $ai = 0;
            foreach ($courseList as $rowCourse) {
                $cat_count++;
                $rateIng = round($rowCourse['totalCommentedRate'] / $rowCourse['totalCommentedUser'])
                ?>
                                                                                                        <li id="demo_<?php echo $rowCourse[cid] . '_' . $rowCategory[id]; ?>" >
                                                                                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                                                                                                                        <a class="" href="<?php echo site_url() . "remotetraining/course_details/$rowCourse[cid]/" . formaturl($rowCourse[name]) ?>" >
                                                                                                                                <div class="anti_shadow ">
                                                                                                                                        <div class="courses-section ">
                <?php if ($rowCourse['course_image']) { ?> 
                                                                                                                                                                <img class="img-responsive"  src="<?= site_url() . '/uploads/remotetraining/' . $rowCourse['course_image'] ?>" alt="<?php echo $rowCourse['name'] ?>">
                <?php } ?>
                                                                                                                                                <div class="abt_course">
                                                                                                                                                        <span class="pull-left full-width">
                                                                                                                                                          <h4><strong><?php echo $rowCourse['name'] ?></strong></h4>
                                                                                                                                                          <p class="course_trainer">CAD/CAM TruTops Laser</p>
                                                                                                                                                        </span>
                                                                                                                                                        <div class="star_rating22"> 
                                                                                                                                                                <ul  class="list-unstyled">
                <?php
                for ($i = 1; $i <= 5; $i++) {
                    $selected = "";
                    if (!empty($rateIng) && $i <= $rateIng) {
                        $selected = "selected";
                    }
                    ?>
                                                                                                                                                                                  <span class='spanStar <?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"  >&#9733;</span>  
                <?php } ?>
                                                                                                                                                                  <span class="rating_cnt"><?php
                if ((int) $rateIng) {
                    echo $rateIng;
                } else {
                    echo "0";
                }
                ?> ( <?php echo $rowCourse['totalCommentedUser'] ?> )</span>
                                                                                                                                                                </ul>
                                                                                                                                                        </div>
                                                                                                                                                </div>
                                                                                                                                        </div>
                                                                                                                                </div>
                                                                                                                        </a>
                                                                                                                </div>
                                                                                                        </li>    
                <?php
            }
        }
        ?>		 
                                                </ul>
                                        </div>
                                </div>
        <?php
        $id++;
    }
}
?> -->


<div class="col-sm-12 box-padd padd-0">
    <div class="" style="padding: 0 !important;">
        <div class="container-fluid myprofile-bg dahboard-bg">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
                    <center><h2 class="margin-0">Search Courses</h2></center>
                </div>
            </div> 
        </div>
        <div class="container-fluid programmers-grey-bg">
            <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
                    <form action="" method="post">
                        <div class="col-sm-3 col-md-3 padd-0">
                            <div class="form-group advanced-marg">
                                <label for="inputEmail3" class="col-sm-4 sort-by padd-0">Sort by:</label>
                                <div class="col-sm-8 padd-0">
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
                        <div class="col-sm-4 col-md-4">
                            <div class="col-sm-12 input-group">
                                <input type="text" class="form-control input-form search-go" placeholder="Search" name="trainerName">
                                <div class="input-group-btn">
                                    <button class="btn btn-default search-go" type="submit" name="btnSearch"><span>Go</span></button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="col-sm-2 col-md-2"> 
                        <a href="" class="btn btn_orange" data-toggle="modal" data-target="#advsearchmodal"><span class="advanced-search">Advanced Search</span></a>
                    </div>
                    <div class="col-sm-3 col-md-3 sortby-marg padd-0">
                        <p class="pull-right"><span class="one-ten-text"><?php echo $pageintation['start'] ?> - <?php echo $pageintation['end'] ?></span> of <?php echo $pageintation['totalCount']; ?> Courses</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container padd-0">
        <div class="">
            <center>
                <h2>Remote Training</h2>
                <p>At Stelmac, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance.</p>
            </center>
            <div class="col-sm-4 col-xs-12 padd-8">
                <!-- <?php if ($this->session->userdata('uid') == '') { ?>
                                       <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit">
                <?php } else { ?>
                               <a href="javascript:void(0)" data-toggle="modal" data-target="#requestCourse">
                <?php } ?> -->
                <div class=" dad">
                    <div class="son-1" style="background-image: url('<?php echo $theme_url ?>/images/cadcam-min.jpg');"></div>
                    <div class="son-text">
                        <h3>CAD/CAM</h3>
                        <p>We offer a wide variety of online training courses, tutorials, books & also live training through our virtual classroom offering. </p>
                        <?php if ($this->session->userdata('uid') == '') { ?>
                            <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit">
                            <?php } else { ?>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#requestCourse">
                                <?php } ?>View More >></a>
                    </div>
                </div>
                <!-- </a> -->
            </div>
            <div class="col-sm-4 col-xs-12 padd-8">
                <!-- <?php if ($this->session->userdata('uid') == '') { ?>
                                        <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit">
                <?php } else { ?>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#requestCourse">
                <?php } ?> -->
                <div class=" dad">
                    <div class="son-1" style="background-image: url('<?php echo $theme_url ?>/images/machine-operation-min.jpg');"></div>
                    <div class="son-text">
                        <h3>Machine Operation</h3>
                        <p>Our technical training covers all types of machines and their operation.</p>
                        <?php if ($this->session->userdata('uid') == '') { ?>
                            <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit">
                            <?php } else { ?>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#requestCourse">
                                <?php } ?>View More >></a>
                    </div>
                </div>
                <!-- </a> -->
            </div>
            <div class="col-sm-4 col-xs-12 padd-8">
                <!-- <?php if ($this->session->userdata('uid') == '') { ?>
                                        <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit">
                <?php } else { ?>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#requestCourse">
                <?php } ?> -->
                <div class=" dad">
                    <div class="son-1" style="background-image: url('<?php echo $theme_url ?>/images/machine-maintenance2-min.jpg');"></div>
                    <div class="son-text">
                        <h3>Machine Maintenance</h3>
                        <p>Our in-house trained engineers can help put your machine back into action. We can also connect you with the OEMs & have them regularly check the condition of the machine.</p>
                        <?php if ($this->session->userdata('uid') == '') { ?>
                            <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit">
                            <?php } else { ?>
                                <a href="javascript:void(0)" data-toggle="modal" data-target="#requestCourse">
                                <?php } ?>View More >></a>
                    </div>
                </div>
                <!-- </a> -->
            </div>
        </div>
    </div>
</div>
<div class="clearfix"></div>
<!-- <div class="container-fluid <?php
if ($b % 2) {
    echo "gray-bg";
} else {
    echo "black-bg";
}
?>">
        <div class="container">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-flex pading_left_0 pading_right_0 ">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 catgry_name pading_left_0 ">
                                <center><h2>Our Top Courses in "<?php echo $rowCategory['cat_name'] ?>"</h2></center>
                        </div>
                
                </div>
                <ul class="cadcam">
<?php
if ($course_list) {
    $courseList = $course_list['result'];
    $ai = 0;
    foreach ($courseList as $rowCourse) {
        $cat_count++;
        $rateIng = round($rowCourse['totalCommentedRate'] / $rowCourse['totalCommentedUser'])
        ?>
                                                                <li id="demo_<?php echo $rowCourse[cid] . '_' . $rowCategory[id]; ?>" >
                                                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                                                                                <a class="" href="<?php echo site_url() . "remotetraining/course_details/$rowCourse[cid]/" . formaturl($rowCourse[name]) ?>" >
                                                                                        <div class="anti_shadow ">
                                                                                                <div class="courses-section ">
        <?php if ($rowCourse['course_image']) { ?> 
                                                                                                                        <img class="img-responsive"  src="<?= site_url() . '/uploads/remotetraining/' . $rowCourse['course_image'] ?>" alt="<?php echo $rowCourse['name'] ?>">
        <?php } ?>
                                                                                                        <div class="abt_course">
                                                                                                                <span class="pull-left full-width">
                                                                                                                  <h4><strong><?php echo $rowCourse['name'] ?></strong></h4>
                                                                                                                
                                                                                                                  <p class="course_trainer">CAD/CAM TruTops Laser</p>
                                                                                                                </span>
                                                                                                                <div class="star_rating22"> 
                                                                                                                        <ul  class="list-unstyled">
        <?php
        for ($i = 1; $i <= 5; $i++) {
            $selected = "";
            if (!empty($rateIng) && $i <= $rateIng) {
                $selected = "selected";
            }
            ?>
                                                                                                                                          <span class='spanStar <?php echo $selected; ?>' onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);" onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"  >&#9733;</span>  
        <?php } ?>
                                                                                                                          <span class="rating_cnt"><?php
        if ((int) $rateIng) {
            echo $rateIng;
        } else {
            echo "0";
        }
        ?> ( <?php echo $rowCourse['totalCommentedUser'] ?> )</span>
                                                                                                                        </ul>
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                        </div>
                                                                                </a>
                                                                        </div>
                                                                </li>    
        <?php
    }
}
?>		 
                </ul>
        </div>
</div> -->
<div class="clearfix"></div>
<div class="container-fliud">
    <div class="container">
        <div class="col-sm-12  padd-0 expert-row">
            <h2 class="col-sm-12 text-center">Meet Our Trainers</h2>
            <div class="row xpert">
                <ul class="cadcam1">
                    <?php
                    if ($trainerList) {
                        $url = site_url() . "xpertconnect/api/findFeaturedListRemoteTraining/1";
                        $assigned_details = apiCall($url, "get");

                        $assigned_id = $assigned_details['result']['user_id'];
                        $assigned_text = $assigned_details['result']['description'];

                        foreach ($trainerList as $rowConsult) {
                            if ($rowConsult['uid'] == $assigned_id) {
                                $name = $rowConsult['u_name'];
                                $u_avatar = $rowConsult['u_avatar'];
                            }
                            ?>
                            <li id="" >
                                <div class="col-sm-12 col-md-12 padd-8">
                                    <div class="prgrmr amit-border">
                                        <div class="amit_img_bag">
                                            <img src="<?php echo $theme_url ?>/images/krishna.PNG">
                                            <!-- <?php if ($rowConsult['u_avatar']) { ?>
                                                            <img src="<?= site_url() . '/uploads/customer/' . $rowConsult['u_avatar'] ?>" width="100px" height="100px">
                                            <?php } else { ?>
                                                            <img src="<?= site_url() . '/uploads/customer/user-default.png' ?>" width="100px" height="100px">
                                            <?php } ?> -->
                                        </div>
                                        <div class="amit-text">
                                            <span class="amit-das-text"><?php echo $rowConsult['u_name']; ?></span>
                                            <!--<span class="certified">Certified Public Bookkeeper</span>-->
                                            <p>Certified Public Bookkeeper</p>
                                            <div class="prgrmr_det">
                                                <p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
                                                <p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
                                                <p></p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <a href="<?php echo site_url() . "consultant/training/trainerDetails/" . $rowConsult['uid']; ?>"><button class="btn btn-default addmore-btn">View Profile </button></a>
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
<div class="clearfix"></div>
<!--<div class="container">-->
<!--  	<h2 style="margin-top: 4px;"><center>Request for Quotation</center></h2>-->
<!--	<div class="col-sm-12 rfq-bg row-flex">-->
<!--		<div class="col-sm-8 col-xs-12" style="padding-left: 0;">-->
<!--			<div class="gray-bg1 collaboration-sec1">-->
<!--				<img src="<?php echo $theme_url ?>/images/used-machines.jpg" class="img-responsive" style="height:350px;">-->
<!--				<div class="sec-collaboration1">-->
<!--					<h2 class="h2-tag">An Easy Way to Send buying request to suppliers & get quotes quickly.-->
<!--						<ul>-->
<!--							<li>Get quote sfoe your custom request</li>-->
<!--							<li>Let the right suppliesrs find you</li>-->
<!--							<li>Close deals with one click</li>-->
<!--						</ul>-->
<!--					</h2>-->
<!--				</div>-->
<!--			</div>-->
<!--		</div>-->

<!--		<div class="col-sm-4" style="background: #fff;">-->
<!--	        <form class="form-horizontal" name="#" id="#" method="post" action="">-->
<!--				  <br/><br/>-->
<!--				<?php if ($this->session->userdata('uid') && $this->session->userdata('user_type')) { ?>-->
                <!--				<a href="<?php echo site_url() . "remoteprogramming/rfq" ?>" type="submit" class="btn btn_orange">Request for Quote</a>-->
    <!--				 <?php } else { ?>-->
    <!--				<a href='#' type="submit" data-toggle='modal' data-target='#signinModal' class="btn btn_orange">Request for Quote</a>-->
    <!--				 <?php } ?>-->
<!--			</form>-->
<!--		</div>-->
<!--	</div>-->
<!--</div>-->
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
                                                <input type="hidden" id="videochat_request_for" name="videochat_request_for" value="RemoteTraining">

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
                                        <?php
                                        $user_id = $this->session->userdata('uid');
                                        ?>
                                        <input type="hidden" class="write_msg"  placeholder="Type a message" />
                                        <input type="hidden" class="write_msg"  placeholder="Type a message" />
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
<div class="clearfix"></div><br/>
<div class="" id="recentlyViewed">
    <div class="container-fliud r-programming recent-view">
        <div class="container">
            <center><h2>Recently Viewed</h2></center>
            <ul class="cadcam">
                <li>
                    <a class="thumbnail" href="https://www.teranex.io/beta-V*SRJ!-452656-230718/consultant/expert/consultantDetail/9">
                        <img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">
                        <div class="amit-text text-center">
                            <span class="amit-das-text">Elle</span>
                            <span class="certified">Certified Public Bookkeeper</span>
                        </div>
                    </a>
                </li>
                <li>
                    <a class="thumbnail" href="https://www.teranex.io/beta-V*SRJ!-452656-230718/consultant/expert/consultantDetail/11">
                        <img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">
                        <div class="amit-text text-center">
                            <span class="amit-das-text">Justin</span>
                            <span class="certified">Certified Public Bookkeeper</span>
                        </div>
                    </a>
                </li>
                <?php if ($recently_viewed_data) { ?>
                    <?php
                    $count_recently_viewed = count($recently_viewed_data);
                    foreach ($recently_viewed_data as $row) {
                        ?>
                        <li>
                            <a class="thumbnail" href="<?php echo site_url() . "consultant/expert/consultantDetail/" . $row['uid']; ?>">
                                <img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">
                                <div class="amit-text text-center">
                                    <span class="amit-das-text"><?php echo $row['u_name']; ?></span>
                                    <span class="certified">Certified Public Bookkeeper</span>
                                </div>
                            </a>
                        </li>
                        <?php
                    }
                    ?>
                <?php } ?>

            </ul>     
        </div>
    </div>


</div>



<div class="container-fliud ">
    <div class="container">
        <div class="col-sm-12 padd-0">
            <center><h2>Remote Training Featured This Month</h2></center>
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
</div>
<div class="clearfix"></div>

<!-- <section class="other-section other-section-10 elearning dark">
        <div class="container padd-0 paralax-section1" style="margin-top:30px;width: 100%;">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" style="">
                        <center>
                                <h1 class="white-text">TERANEX <span style="text-transform:lowercase">e</span>Academy for Vocational Training</h1>
                                <p class="white-text">TERANEX offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting <br/> undertakes proactive collaboration with clients to identify new opportunities, new customers and sources of incremental revenues.</p>
                        </center>
                        <div>
                                <ul class="tab-widget icon-tab tab-pd">
                                        <li>
                                                <a target="_blank" href="" data-tb="#service-tab-1" class="flex-cc">
                                                <i class="fa fa-address-card-o" aria-hidden="true"></i></a>
                                                <h3 class="fs16 bold-2 mr-t-10">Online Courses</h3>
                                        </li>
                                        <li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
                                        <li><a target="_blank" href="" data-tb="#service-tab-2" class="flex-cc">
                                                <i class="fa fa-university" aria-hidden="true"></i></a>
                                                <h3 class="fs16 bold-2 mr-t-10">Virtual Classroom</h3>
                                        </li>
                                        <li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
                                        <li>
                                                <a target="_blank" href="" data-tb="#service-tab-3" class="flex-cc">
                                                <i class="fa fa-tasks" aria-hidden="true"></i></a>
                                                <h3 class="fs16 bold-2 mr-t-10">Unified Contents</h3>
                                        </li>
                                        <li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
                                        <li>
                                                <a target="_blank" href="" data-tb="#service-tab-4" class="flex-cc">
                                                <i class="fa fa-flask" aria-hidden="true"></i></a>
                                                <h3 class="fs16 bold-2 mr-t-10">Practical</h3>
                                        </li>
                                        <li><i class="fa fa-arrow-right  fa-lg" aria-hidden="true"></i></li>
                                        <li><a target="_blank" href="" data-tb="#service-tab-5" class="flex-cc">
                                                <i class="fa fa-file-text-o" aria-hidden="true"></i></a>
                                                <h3 class="fs16 bold-2 mr-t-10">Projects</h3>
                                        </li>
                                        <li><i class="fa fa-arrow-right fa-lg" aria-hidden="true"></i></li>
                                        <li><a target="_blank" href="" data-tb="#service-tab-6" class="flex-cc">
                                                <i class="fa fa-check" aria-hidden="true"></i></a>
                                                <h3 class="fs16 bold-2 mr-t-10">Online Testing</h3>
                                        </li>
                                </ul>
                        </div>
                </div>
        </div>
</section> --> 
<div class="clearfix"></div>
<!-- requestCourse modal -->
<div id="requestCourse" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h4 class="modal-title">Request for Course</h4></center>
            </div>
            <div class="modal-body">
                <div class="col-sm-12 border_bot">
                    <form class="" name="requestforCourse" id="requestforCourse" method="post" enctype="multipart/form-data" action="#" >
                        <div class="form-group ">
                            <input type="text" class="form_bor_bot" id="company_name" name="company_name" value= "" placeholder="Company name" required><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <select class="form_bor_bot" name="product_cat" id="product_cat">
                                <option value="">Select Product Category</option>
                                <?php
                                if ($machineCatList) {
                                    foreach ($machineCatList as $rowCat) {
                                        ?>
                                        <option value="<?php echo $rowCat['mc_id'] ?>" ><?php echo $rowCat['category_name'] ?></option>
                                        <?php
                                    }
                                }
                                ?>
                            </select> 
                           <!--  <input type="text" id="product_cat" name="product_cat" class="form_bor_bot" value="value come from backend" readonly> -->
                        </div>
                        <div class="form-group">
                            <select class="form_bor_bot" name="prod_brandName" id="prod_brandName">
                                <option value="">Select Brand</option>
                                <?php
                                if ($brandList) {
                                    foreach ($brandList as $rowBrand) {
                                        ?>
                                        <option value="<?php echo $rowBrand['mb_id'] ?>"  <?php
                                        if ($rowProduct['prod_brandName'] == $rowBrand['mb_id']) {
                                            echo "selected";
                                        }
                                        ?>><?php echo $rowBrand['brand_name'] ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                            </select><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <select class="form_bor_bot" name="prod_model" id="prod_model">
                                <option value="">Select Product Model</option>
                            </select><span class="compulsary">*</span>
                        </div>
                        <div class="form-group ">
                            <input type="text" class="form_bor_bot" id="noofparticipants" name="noofparticipants" value= "" placeholder="No. of Participants" required><span class="compulsary">*</span>
                        </div><br/>
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
<div class="clearfix"></div><br/>
<?php $this->template->contentBegin(POS_BOTTOM); ?>
<script src="<?php echo $theme_url; ?>/js/jquery.flexisel.js"></script>	
<script type="text/javascript">
    $(document).ready(function () {
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".chatbox").not(targetBox).hide();
            $(targetBox).show();
        });
    });
// function highlightStar(obj,id) {
// 	removeHighlight(id);		
// 	$('.demo-table #tutorial-'+id+' li').each(function(index) {
// 		$(this).addClass('highlight');
// 		if(index == $('.demo-table #tutorial-'+id+' li').index(obj)) {
// 			return false;	
// 		}
// 	});
// }
// function removeHighlight(id) {
// 	$('.demo-table #tutorial-'+id+' li').removeClass('selected');
// 	$('.demo-table #tutorial-'+id+' li').removeClass('highlight');
// }
    $(document).ready(function () {
        $("#requestforCourse").validate({
            rules: {
                company_name: {
                    required: true
                },
                product_cat: {
                    required: true
                },
                prod_brandName: {
                    required: true
                },
                noofparticipants: {
                    required: true
                },
            },
            messages: {
                company_name: {
                    required: "Please enter company name"
                },
                technology: {
                    required: "Please select technology"
                },
                machinemodel: {
                    required: "Please select machine model"
                },
                noofparticipants: {
                    required: "Please enter no. of participants"
                },
            }
        });
    });

    $('#prod_brandName').on('change', function () {
        var prod_brandName = $("#prod_brandName").val();
        $.ajax({
            type: "GET",
            url: site_url + "/machine/api/machineBrandModelList/" + prod_brandName,
            data: {},
            success: function (result) {
                $('#prod_model').empty();
                if (result) {
                    var state_list = result.result.result;
                    $('#prod_model')
                            .append($("<option></option>")
                                    .attr("value", '')
                                    .text('Select Product Module'));
                    $.each(state_list, function (key, value) {
                        $('#prod_model')
                                .append($("<option></option>")
                                        .attr("value", value.md_id)
                                        .text(value.model_name));
                    });
                } else if (result.error) {

                }
            }

        });
    });

    $('body').on('mouseenter', 'li', function () {
        $(this).addClass('adasd');
    });
//	CADCAM1
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
//	CADCAM
    $(window).load(function () {
        $('.cadcam').each(function () {
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



<?php echo $this->template->contentEnd(); ?> 