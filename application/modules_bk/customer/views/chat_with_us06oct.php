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
        width: 6%;
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
        font-size: 12px;
        margin: 8px 0 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 15px 0px 0 11px;
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
        min-height: 48px;
        width: 100%;
    }

    .type_msg {border-top: 1px solid #c4c4c4;position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 0;
        top: 11px;
        width: 33px;
    }
    .messaging { padding: 0 0 50px 0;}
    .msg_history {
        height: 516px;
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
?> 

    <!-- /.container --> 

    <!-- /.myprofile-bg -->
  
    <!-- /.myprofile-bg -->

    <div class="container">
<h3 class=" text-center">Messaging</h3>
<div class="messaging">
      <div class="inbox_msg">
        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="srch_bar">
              <div class="stylish-input-group">
                <input type="text" class="search-bar"  placeholder="Search" >
                <span class="input-group-addon">
                <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>
          <div class="inbox_chat">
            <div class="chat_list active_chat">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
            <div class="chat_list">
              <div class="chat_people">
                <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                <div class="chat_ib">
                  <h5>Sunil Rajput <span class="chat_date">Dec 25</span></h5>
                  <p>Test, which is a new approach to have all solutions 
                    astrology under one roof.</p>
                </div>
              </div>
            </div>
          </div>
            
            
            
            
            
            
            
        </div>
          
          <div style="background: #f9f9f9;">
                <div class="container">
                    <div class="col-sm-6 padd-8">
                        <div class="full-width pull-left mar-tb-20" id="chatWithus">
                            <div class="pull-left full-width">
                                <center><h2 style="margin-top: 0;">Chat with Us </h2></center>
                                <div class="col-sm-offset-2 col-sm-4 padd-0">	
                                    <form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
                                        <h3 class="vconf">What would you like to do?</h3>
                                        <div class="form-group" style="margin-bottom:30px;">
                                            <span class="fg_span" ><input type="radio" value="T" name="video_chat" checked> Text chat</span>
                                            <span class="fg_span" ><input type="radio" value="V" name="video_chat"> Video chat </span>
                                            <span class="fg_span" ><input type="radio" value="B" name="video_chat"> Book a live demo</span>
                                        </div> 
                                        <div class="videobtn">
                                            <?php if ($user_id == '') { ?>
                                                <input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
                                            <?php } else { ?>
                                                <input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/> 
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
                                                $user_id=$this->session->userdata('uid');
                                                $toID=2;
                                                ?>
                                                <input type="hidden" class="write_msg" value="<?php echo  $this->session->userdata('uid'); ?>" id="userid" placeholder="Type a message" />
                                                <input type="hidden" class="write_msg" value="<?php echo $toID; ?>" id="machineId" placeholder="Type a message" />
                                                <input type="text" class="write_msg" id="message" placeholder="Type a message" />
                                                <?php
                                                if ($user_id == '' || $user_id == null) {
                                                    ?>
                                                    <button class="msg_send_btn" type="button" data-toggle="modal" data-target="#signinModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                <?php } else { ?>
                                                    <button class="msg_send_btn" onclick="chatingFunction(<?php echo $user_id; ?>,<?php echo $toID; ?>)" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                        </div>
                    </div>
                </div>
            </div>  
            
            
            
            
   
      </div>
    
    
      
      
      
    </div></div>
    
    
    
    
    
    
            <div style="background: #f9f9f9;">
                <div class="container">
                    <div class="col-sm-12 padd-8">
                        <div class="full-width pull-left mar-tb-20" id="chatWithus">
                            <div class="pull-left full-width">
                                <center><h2 style="margin-top: 0;">Chat with Us </h2></center>
                                <div class="col-sm-offset-2 col-sm-4 padd-0">	
                                    <form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
                                        <h3 class="vconf">What would you like to do?</h3>
                                        <div class="form-group" style="margin-bottom:30px;">
                                            <span class="fg_span" ><input type="radio" value="T" name="video_chat" checked> Text chat</span>
                                            <span class="fg_span" ><input type="radio" value="V" name="video_chat"> Video chat </span>
                                            <span class="fg_span" ><input type="radio" value="B" name="video_chat"> Book a live demo</span>
                                        </div> 
                                        <div class="videobtn">
                                            <?php if ($user_id == '') { ?>
                                                <input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
                                            <?php } else { ?>
                                                <input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/> 
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
                                                $user_id=$this->session->userdata('uid');
                                                $toID=2;
                                                ?>
                                                <input type="hidden" class="write_msg" value="<?php echo  $this->session->userdata('uid'); ?>" id="userid" placeholder="Type a message" />
                                                <input type="hidden" class="write_msg" value="<?php echo $toID; ?>" id="machineId" placeholder="Type a message" />
                                                <input type="text" class="write_msg" id="message" placeholder="Type a message" />
                                                <?php
                                                if ($user_id == '' || $user_id == null) {
                                                    ?>
                                                    <button class="msg_send_btn" type="button" data-toggle="modal" data-target="#signinModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                <?php } else { ?>
                                                    <button class="msg_send_btn" onclick="chatingFunction(<?php echo $user_id; ?>,<?php echo $toID; ?>)" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                        </div>
                    </div>
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
                                                                    alert("3232");
                                                                },
                                                                fail: (function (status) {
                                                                    alert("8888");
                                                                }),
                                                                beforeSend: function (d) {
                                                                    //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                                                                }
                                                            });
                                                        }
                                                        function chatingFunction(userId, machineId)
                                                        {
                                                            $('#message').val();
                                                            var msg = $('#message').val();

                                                            $.ajax({
                                                                type: 'POST',
                                                                url: "<?php echo base_url(); ?>machine/saveChat/",
                                                                // data: "userId="+userId+",machineId="+machineId+",msg="+msg,
                                                                data: {userId: userId, machineId: machineId, msg: msg},
                                                                success: function (msg) {
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
                                                                    alert("3232");
                                                                },
                                                                fail: (function (status) {
                                                                    alert("8888");
                                                                }),
                                                                beforeSend: function (d) {
                                                                    //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                                                                }
                                                            });
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
                    contact_person2: {
                        required: true
                    },
                    company_name2: {
                        required: true
                    },
                    email_id2: {
                        required: true,
                        valEmail: true
                    },
                    phone_no2: {
                        required: true
                    },
                    country_id2: {
                        required: true
                    },
                },
                messages: {
                    contact_person2: {
                        required: "Please enter contact person name"
                    },
                    company_name2: {
                        required: "Please enter company name"
                    },
                    email_id2: {
                        required: "Please enter email id"
                    },
                    phone_no2: {
                        required: "Please enter phone number"
                    },
                    country_id2: {
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
        </script>

        <?php echo $this->template->contentEnd(); ?> 