<?php $this->template->contentBegin(POS_TOP); ?>
<!-- <link href="<?php echo $theme_url ?>/css/jquery.bxslider.min.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/css/machine.css"/>
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
    .inbox_chat { height: 700px; overflow-y: scroll;}
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
        height: 550px;
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
<?php
echo $this->template->contentEnd();
$user_id = $this->session->userdata('uid');
?> 

<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">Messaging</li>
            </ul>
        </div>
        <div class="col-sm-8 padd-0">
            <ul>
                <li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url(); ?>">Go To My Stelmac </a></li>
            </ul>
        </div>
    </div>
    <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
    <div class="container">

    </div>
    <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">
    <?php $this->load->view("cust_side_menu"); ?> 
    <div class="">
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 bg_white" style="padding-top: 0;">  
            <div class="">
                <h3 class=" text-center"></h3>
                <div class="messaging">
                    <div class="inbox_msg">
                        <div class="col-sm-4 padd-0 inbox_people">
                            <div class="headind_srch">
                                <div class="recent_heading">
                                    <h4>Recent</h4>
                                </div>
                                <div class="srch_bar">
                                    <div class="stylish-input-group">
                                        <input type="text" class="search-bar"  placeholder="Search" >
                                        <!-- <span class="input-group-addon"> -->
                                        <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                                        <!-- </span>  -->
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-tabs inbox_chat" id="msglisthistory">
                            </ul>


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
                                                    <input type="text" class="write_msg" id="message" reply-to=''  placeholder="Type  message" />
                                                    <input type="hidden" id="msgTo"/>
                                                    <input type="hidden" id="referenceId"/>
                                                    <input type="hidden" id="type"/>
                                                    <button class="msg_send_btn" onclick="chatingFunction()" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
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
                                                        <div class="msg_history" id="msghistory">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!--<div class="type_msg">
                                                    <div class="input_msg_write">
                                                     
                                                        <input type="text" class="write_msg" id="message" placeholder="Type a message" />
                                                            <button class="msg_send_btn" onclick="chatingFunction()" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                                        </div>
                                                </div>-->
                                        </div>
                                        <!--<div class="V chatbox" style="display: none;">
                                                <video controls class="pull-right videosize">
                                                    <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                                    <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>-->
                                        <!--<div class="B chatbox" style="display: none;">
                                                <video controls class="pull-right videosize">
                                                    <source src="<?php echo site_url() . "uploads/machine/" . $machineDetails['machine_video'] ?>" type="video/mp4">
                                                    <source src="<?php echo $theme_url ?>/images/sample-video.ogg" type="video/ogg">
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>-->
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
<div class="clearfix"></div>



<?php $this->template->contentBegin(POS_BOTTOM); ?>

                <!-- <script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script>  --> 
<script src="<?= $theme_url ?>/js/jquery.bxslider.js"></script>
<script src="<?= $theme_url ?>/js/jquery.flexisel.js"></script>	
<script type="text/javascript">
                                                        $(document).ready(function () {
                                                            //getChatHistory();
                                                            getListChatHistory();
                                                        });
                                                        setInterval(function ()
                                                        {
                                                            //getChatHistory();
                                                            getListChatHistory();
                                                        }, 10000);//time in milliseconds

                                                        // getListChat

                                                        function getListChatHistory()
                                                        {
                                                            $.ajax({
                                                                type: 'GET',
                                                                url: "<?php echo base_url(); ?>customer/getListChat/",
                                                                success: function (msg) {

                                                                    //alert(msg);
                                                                    var data = JSON.stringify(msg);
                                                                    var datapars = JSON.parse(data);
                                                                    //alert(datapars);
                                                                    var msg = "";
                                                                    // var chatID = "";
                                                                    var msgFrom = "";
                                                                    var msgTo = "";
                                                                    var created_at = "";
                                                                    var htmlStr = "";
                                                                    var u_avatar = ""
                                                                    var u_name = ""

                                                                    $.each(datapars, function (eventindex, eventData) {
                                                                        //    chatID = eventData.id;
                                                                        msg = eventData.message;
                                                                        msgFrom = eventData.msg_from;
                                                                        msgTo = eventData.msg_to;
                                                                        created_at = eventData.created_at;
                                                                        u_avatar = eventData.u_avatar;
                                                                        u_name = eventData.u_name;
                                                                        //htmlStr += "<ul class='nav nav-tabs inbox_chat'>";
                                                                        htmlStr += " <li class='active chat_list active_chat 'onclick='myChatCilck(" + msgFrom + ")'  'onclick='chatingFunction(" + msgFrom + ")' data-id=" + msgFrom + ">";
                                                                        htmlStr += " <input type='hidden' class='form-control' id='chat_id' value=" + msgFrom + " >";
                                                                        htmlStr += " <a data-toggle='tab' href='#home'>";
                                                                        htmlStr += "<div class='chat_people'>";
                                                                        if(u_avatar != "")
                                                                        {
                                                                            htmlStr += "<div class='incoming_msg_img'><img src='<?php echo site_url(); ?>uploads/customer/" + u_avatar + "' alt='sunil'> </div>";
                                                                        } 
                                                                        else 
                                                                        {
                                                                            htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";

                                                                        }
                                                                        htmlStr += "<div class='chat_ib'>";
                                                                        if(u_name!='')
                                                                        {
                                                                         htmlStr += "<h5>"+u_name+"  <span class='chat_date'>" + created_at + "</span></h5>";
                                                                        }
                                                                        else if(u_name=='')
                                                                        {
                                                                           htmlStr += "<h5>Sunil  <span class='chat_date'>" + created_at + "</span></h5>";

                                                                        }
                                                                        htmlStr += "<p id='msg'>" + msg + "</p>";
                                                                        htmlStr += "</div>";
                                                                        htmlStr += "</div>";
                                                                        htmlStr += "</a>";
                                                                        //htmlStr += "<button type='submit' class='btn btn-success'onclick='myChatCilck()' >" + chatID + "</button>";
                                                                        htmlStr += "</li>";
                                                                        htmlStr += "<hr>";
                                                                    });
                                                                    $("#msglisthistory").html(htmlStr);
                                                                },
                                                                error: function (result)
                                                                {
                                                                    //alert("3232");
                                                                },
                                                                fail: (function (status) {
                                                                   // alert("8888");
                                                                }),
                                                                beforeSend: function (d) {
                                                                    //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                                                                }
                                                            });
                                                        }

                                                        function myChatCilck(msgFrom) {
                                                            //  console.log(chatID);
                                                            //debugger;
                                                            var chatid = msgFrom;

                                                            //   alert(chatid);


                                                            $.ajax({
                                                                type: 'POST',
                                                                url: "<?php echo base_url(); ?>customer/getChatUnique/",
                                                                data: {chatid: chatid},
                                                                success: function (msg) {
                                                                    //    alert(msg);
                                                                    var data = JSON.stringify(msg);
                                                                    var datapars = JSON.parse(data);
                                                                    var msg = "";
                                                                    //  var userId = "";
                                                                    // alert(msg);
                                                                    var msgFrom = "";
                                                                    var msgTo = "";
                                                                    var created_at = "";
                                                                    var htmlStr = "";
                                                                    var referenceId = "";
                                                                    var type = "";
                                                                    var u_avatar = ""

                                                                    $.each(datapars, function (eventindex, eventData) {
                                                                        // alert(eventData.message);
                                                                        //userId = eventData.id;
                                                                        if (eventindex == 1)
                                                                        {

                                                                            msgFrom = eventData.msg_from;
                                                                            $('#msgTo').val(msgFrom);
                                                                            $('#referenceId').val(referenceId);
                                                                            $('#type').val(type);


                                                                        }
                                                                        msg = eventData.message;
                                                                        msgFrom = eventData.msg_from;
                                                                        referenceId = eventData.reference_id;
                                                                        type = eventData.type;
                                                                        u_avatar = eventData.u_avatar;

                                                                        //alert(u_avatar);

                                                                        msgTo = eventData.msg_to;
                                                                        created_at = eventData.created_at;

                                                                        if (msgFrom == chatid)
                                                                        {
                                                                            htmlStr += "<div class='incoming_msg'>";
                                                                            if (u_avatar != "")
                                                                            {
                                                                                htmlStr += "<div class='incoming_msg_img'> <img src='<?php echo site_url(); ?>uploads/customer/" + u_avatar + "' alt='sunil'> </div>";
                                                                            } else
                                                                            {
                                                                                htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";

                                                                            }
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
                                                                  //  alert("8888");
                                                                }),
                                                                beforeSend: function (d) {
                                                                    //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                                                                }
                                                            });


                                                            //alert("The paragraph was clicked." + chatid);
                                                        }




                                                        function chatingFunction()
                                                        {
                                                            //alert(chatID);
                                                            $('#message').val();
                                                            var msg = $('#message').val();
                                                            var machineId = $("#referenceId").val();
                                                            var type = $("#type").val();
                                                            var userId = $("#msgTo").val();
                                                            var chatid = userId;
                                                            // alert(userId);
                                                            var admin_user =<?php echo $this->session->userdata('uid'); ?>

                                                            $.ajax({
                                                                type: 'POST',
                                                                url: "<?php echo base_url(); ?>machine/saveChat/",
                                                                // data: "userId="+userId+",machineId="+machineId+",msg="+msg,
                                                                data: {userId: userId, admin_user: admin_user, msg: msg, machineId: machineId, type: type},
                                                                success: function (msg) {
                                                                    $.ajax({
                                                                        type: 'POST',
                                                                        // url: "<?php echo base_url(); ?>machine/getChat/",
                                                                        url: "<?php echo base_url(); ?>customer/getChatUnique/",

                                                                        data: {chatid: chatid},
                                                                        success: function (msg) {
                                                                            // alert(msg);
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
                                                                   // alert("3232");
                                                                },
                                                                fail: (function (status) {
                                                                   // alert("8888");
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




</script>
<script type="text/javascript">
    $(document).ready(function () {
        $('[data-toggle="popover"]').popover({
            placement: 'right',
            trigger: 'hover'
        });
    });
</script>


<?php echo $this->template->contentEnd(); ?> 