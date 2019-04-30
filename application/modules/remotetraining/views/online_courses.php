<?php $this->template->contentBegin(POS_TOP); ?>

<?php echo $this->template->contentEnd(); ?>
<section class="banner banner_image align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form method="get" action="" id="PageForm" name="PageForm">
                <div class="banner_text">
                    <p>I Want To Attend A</p>
                    <div class="selct-box get_start">
                        <div class="arrow">
                            <select name="" id="" class="dropdow">
                                <option value="New">Attend a Course</option>
                            </select>
                        </div>
                        <div class="arrow">

                            <select name="courseCategory" id="courseCategory" class="dropdow">
                                <option value="Course Category">Course Category</option>
                                <?php foreach($category_list as $row){ ?>
                                <option value="<?=$row['cat_name']?>" <?php if($_GET['courseCategory'] == $row['cat_name']) { echo "selected"; } ?>><?=$row['cat_name']?></option>
                                <?}?>
                            </select>

                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</section>

<section class="mrgn-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bx-shdw padd_all_50 white">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been
                        the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley
                        of type and scrambled it to make a type specimen book. It has survived not only five centuries,
                        but also the leap into electronic typesetting, remaining essentially unchanged. It was
                        popularised in the 1960s</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course-ext">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Virtual<br>Classroom</h3>
                    <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged.</p>
                    <a href="<?php echo site_url() . "macademy/virtual_classroom"; ?>" class="a-green-btn mrgn-top">View More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Self-paced<br>Learning</h3>
                    <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged.</p>
                    <a href="<?php echo site_url() . "macademy/self_paced_learning"; ?>" class="a-green-btn mrgn-top">View
                        More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Real Life<br> Projects</h3>
                    <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged.</p>
                    <a href="<?php echo site_url() . "macademy/projects"; ?>" class="a-green-btn mrgn-top">View More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Online<br> Testing</h3>
                    <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged.</p>
                    <a href="<?php echo site_url() . "macademy/online_testing"; ?>" class="a-green-btn mrgn-top">View More</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="text_cnt bx-shdw padd_all_50 white">
                    <h3 class="basic-head">Certification<br> Testing</h3>
                    <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer
                        took a galley of type and scrambled it to make a type specimen book. It has survived not only
                        five centuries, but also the leap into electronic typesetting, remaining essentially
                        unchanged.</p>
                    <a href="<?php echo site_url() . "macademy/certification"; ?>" class="a-green-btn mrgn-top">View More</a>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="mrgn-top">
    <div class="container">
        <div class="row">
            <div class="col-12 ">
                <div class="pagin-sort bx-shdw padd_all_50 white">
                    <span>Showing <?php echo $pageintation['start'] ?> - <?php echo $pageintation['end'] ?>
                        of <?php echo $pageintation['totalCount']; ?> <b>CNC Desgin/Programming</b> Online Course</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="course_box">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sort-catg mrgn-top bx-shdw padd_all_50 white">
                    <form action="" name="searchinglist" id="searchinglist" method="post">
                    <div class="sort-text">
                        <div class="languge-sel">
                            <p>Sort</p>

                            <div class="selct-box get_start">
                                <div class="arrow">
                                    <select name="language" class="dropdow">
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
                        <div class="search_sec">
                            <div class="parnt_serch  languge-sel parnt_serch_respn">
                                <p class="">Search</p>
                                <div class="serchbar mar-lt-rt bx-shdw">
                                    <input type="text" placeholder="Enter your kewords..."  name="trainerName">
                                    <i class="fa fa-search" id="coursesOnline" name="btnSearch"></i>
                                </div>
                                <div class="">
                                    <a href="#" class="a-green-btn">Advanced</a>
                                </div>
                            </div>
                        </div>

                    </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



    <section class="padd_tb_50">
        <div class="container br-bt">

<?php
    if($category_list){ $b=0;
    $cat_count = 1;
    $id = 0;
    $id1 = count($category_list);
    foreach($category_list as $rowCategory){
    $counts = round($id1/2);
    $cat_count++;
    $b++;
    $courseUrl = site_url()."remotetraining/api/findMultipleCourse/$rowCategory[id]";
    $course_list =  apiCall($courseUrl, "get"); ?>
<?
if($id==$counts){
    ?>

    <?
}
?>
        <?php if($rowCategory['cat_name'] == $_GET['courseCategory']){?>
            <div class="row">
                <?php if($course_list){
                    $courseList = $course_list['result'];
                    $ai=0;
                    foreach($courseList as $rowCourse){
                        $cat_count++;
                        $rateIng= round($rowCourse['totalCommentedRate']/$rowCourse['totalCommentedUser'] )
                        ?>
                        <div class="col-md-4" id="demo_<?php echo $rowCourse[cid].'_'.$rowCategory[id]; ?>">
                            <div class="profile_enginer bx-shdw white">
                                <div class="course_img_pro">
                                    <?php if($rowCourse['course_image']){?>
                                        <img src="<?=base_url().'/uploads/remotetraining/'.$rowCourse['course_image']?>" alt="<?php echo $rowCourse['name']?>">
                                    <?php }?>
                                </div>
                                <div class="profile_cntnt padd_all_50">
                                    <h3 class=""><?php echo $rowCourse['name']?></h3>
                                    <p class="ht-35 country">CAD/CAM TruTops Laser</p>
                                    <div class="profile-star mrgn-top">
                                        <div class="starrating">
                                            <?php
                                            for ($i = 1; $i <= 5; $i++) {
                                                $selected = "";
                                                if (!empty($rateIng) && $i <= $rateIng) {
                                                    $selected = "selected";
                                                }
                                                ?>
                                                <i class="fa fa-star <?php echo $selected; ?>" aria-hidden="true"
                                                   onmouseover="highlightStar(this,<?php echo $tutorial["id"]; ?>);"
                                                   onmouseout="removeHighlight(<?php echo $tutorial["id"]; ?>);"></i>

                                            <?php } ?>

                                        </div>
                                        <a href="<?php echo site_url()."remotetraining/course_details/$rowCourse[cid]/".formaturl($rowCourse[name])?>" class="a-green-btn mrgn-top">View More</a>

                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }}?>
            </div>
        <?php }?>


        <?php $id++;} } ?>

        </div>
    </section>

    <section class="point laser-course">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="padd_tb_50 ">
                        <h3 class="basic-head">Our Trainers</h3>
                    </div>
                </div>
            </div>
            <div class="c padd_all_50 bx-shdw white">

                <div id="owl-two" class="owl-carousel owl-theme">
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
                    <div class="item ">
                        <div class="padd_all_50  bx-shdw profile_one text-center">
                            <img src="<?php echo $theme_url ?>/images/krishna.PNG" alt="">
                            <div class="enginr">
                                <h4 class="basic-head"><?php echo $rowConsult['u_name']; ?></h4>
                                <p>Service Engineer</p>
                            </div>
                            <a href="<?php echo site_url() . "consultant/training/trainerDetails/" . $rowConsult['uid']; ?>" class="a-green-btn">View Profile</a>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="padd_all_50  bx-shdw profile_one text-center">
                            <img src="<?php echo $theme_url ?>/images/krishna.PNG" alt="">
                            <div class="enginr">
                                <h4 class="basic-head"><?php echo $rowConsult['u_name']; ?></h4>
                                <p>Service Engineer</p>
                            </div>
                            <a href="<?php echo site_url() . "consultant/training/trainerDetails/" . $rowConsult['uid']; ?>" class="a-green-btn">View Profile</a>
                        </div>
                    </div>
                    <?php   } } ?>
                </div>

            </div>
        </div>
    </section>
    <section class="em_sect">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="padd_tb_50 ">
                        <h3 class="basic-head">Trainer of the month</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="padd_all_50 bx-shdw white">
                        <div class="row">
                            <div class="col-md-4">
                                <div class=" em_mont">
                                    <img src="<?php echo $theme_url ?>/images/profile.jpg" alt="img">
                                   <!-- <img src="<?php /*echo base_url(); */?>/uploads/customer/<?php /*echo $u_avatar; */?>" alt="img">-->
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="em-cnt">
                                    <h4 class="basic-head">Jane Doe</h4>
                                    <span>Senior Engineer</span>
                                    <p class="mrgn-top"><?php echo $assigned_text; ?></p>
                                </div>
                                <button type="submit" class="green-btn mrgn-top"> View Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>



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
                    <form class="" name="requestforCourse" id="requestforCourse" method="post"
                          enctype="multipart/form-data" action="#">
                        <div class="form-group ">
                            <input type="text" class="form_bor_bot" id="company_name" name="company_name" value=""
                                   placeholder="Company name" required><span class="compulsary">*</span>
                        </div>
                        <div class="form-group">
                            <select class="form_bor_bot" name="product_cat" id="product_cat">
                                <option value="">Select Product Category</option>
                                <?php
                                if ($machineCatList) {
                                    foreach ($machineCatList as $rowCat) {
                                        ?>
                                        <option value="<?php echo $rowCat['mc_id'] ?>"><?php echo $rowCat['category_name'] ?></option>
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
                                        <option value="<?php echo $rowBrand['mb_id'] ?>" <?php
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
                            <input type="text" class="form_bor_bot" id="noofparticipants" name="noofparticipants"
                                   value="" placeholder="No. of Participants" required><span class="compulsary">*</span>
                        </div>
                        <br/>
                        <div class="clearfix"></div>
                        <div class="text-center">
                            <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit"/>
                        </div>
                    </form>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>


<div class="clearfix"></div><br/>

<?php $this->template->contentBegin(POS_BOTTOM); ?>
<script src="<?php echo $theme_url; ?>/js/jquery.flexisel.js"></script>
<script type="text/javascript">
    function highlightStar(obj, id) {
        removeHighlight(id);
        $('.demo-table #tutorial-' + id + ' li').each(function (index) {
            $(this).addClass('highlight');
            if (index == $('.demo-table #tutorial-' + id + ' li').index(obj)) {
                return false;
            }
        });
    }

    function removeHighlight(id) {
        $('.demo-table #tutorial-' + id + ' li').removeClass('selected');
        $('.demo-table #tutorial-' + id + ' li').removeClass('highlight');
    }

    //	 $('li').bind("mouseenter", function() { console.log("you rolled over") });
    $('body').on('mouseenter', 'li', function () {

        $(this).addClass('adasd');

    });
    /* $(window).load(function() {
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
    });  */
</script>
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

    $('#coursesOnline').click(function () {
        $('#searchinglist').submit();
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

    // video chat onclick function

    $("#submitrequest").click(function () {
        var customAttr = $(this).attr("data-custom");
        var radioBoxValue = $("input[name='video_chat']:checked").val();
        if (radioBoxValue == "V") {

            window.open("<?php echo site_url(); ?>/welcome/opentok", "_blank");


        }
    });
</script>

<script type="text/javascript">
    $(document).ready(function () {
        getChatHistory();
        getListChatHistory();
    });
    setInterval(function () {
        //getChatHistory();
        getListChatHistory();
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


    function getListChatHistory() {
        $.ajax({
            type: 'GET',
            url: "<?php echo base_url(); ?>customer/getListChatSingle/",
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
                var u_avatar = "";
                var u_name = "";
                var chatType = "";
                var chatRoomName = "";

                $.each(datapars, function (eventindex, eventData) {
                    //    chatID = eventData.id;
                    msg = eventData.message;
                    msgFrom = eventData.msg_from;
                    msgTo = eventData.msg_to;
                    created_at = eventData.created_at;
                    u_avatar = eventData.u_avatar;
                    u_name = eventData.u_name;
                    u_name = eventData.u_name;
                    chatType = eventData.chat_type;
                    chatRoomName = eventData.chat_room_name;
                    //htmlStr += "<ul class='nav nav-tabs inbox_chat'>";
                    htmlStr += " <li class='active chat_list active_chat 'onclick='myChatCilck(" + chatType + ")'>";
                    htmlStr += " <a data-toggle='tab' href='#home'>";
                    htmlStr += "<div class='chat_people'>";
                    if (u_avatar != "") {
                        htmlStr += "<div class='incoming_msg_img'><img src='https://ptetutorials.com/images/user-profile.png' alt='stelmac'> </div>";
                    } else {
                        htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='stelmac'> </div>";

                    }
                    htmlStr += "<div class='chat_ib'>";
                    if (chatType == 0) {
                        htmlStr += "<h5><?php echo $this->session->userdata('u_name'); ?>  <span class='chat_date'>" + created_at + "</span></h5>";
                    } else if (chatType != 0) {
                        htmlStr += "<h5>" + chatRoomName + " <span class='chat_date'>" + created_at + "</span></h5>";

                    }
                    // htmlStr += "<p id='msg'>" + msg + "</p>";
                    htmlStr += "</div>";
                    htmlStr += "</div>";
                    htmlStr += "</a>";
                    //htmlStr += "<button type='submit' class='btn btn-success'onclick='myChatCilck()' >" + chatID + "</button>";
                    htmlStr += "</li>";
                    htmlStr += "<hr>";
                });
                $("#msglisthistory").html(htmlStr);
            },
            error: function (result) {
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


    function myChatCilck(chatType) {
        //  console.log(chatID);
        //debugger;
        var chatid = chatType;

        var admin_user =<?php echo $this->session->userdata('uid'); ?>


            // alert(chatid);


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
                    var u_avatar = "";
                    var adminUser = "";
                    var chatType = "";


                    $.each(datapars, function (eventindex, eventData) {
                        // alert(eventData.message);
                        //userId = eventData.id;
                        //alert(eventData);
                        if (eventindex == 0) {

                            msgFrom = eventData.msg_from;
                            chatType = eventData.chat_type;
                            //alert(chatType);
                            $('#msgTo').val(msgFrom);
                            $('#referenceId').val(referenceId);
                            $('#type').val(type);
                            $('#chatTypeId').val(chatType);
                        }
                        msg = eventData.message;
                        msgFrom = eventData.msg_from;
                        referenceId = eventData.reference_id;
                        type = eventData.type;
                        u_avatar = eventData.u_avatar;
                        adminUser = eventData.admin_user;


                        msgTo = eventData.msg_to;
                        created_at = eventData.created_at;

                        if (msgFrom == chatid) {
                            htmlStr += "<div class='incoming_msg'>";
                            if (u_avatar != "") {
                                htmlStr += "<div class='incoming_msg_img'> <img src='<?php echo site_url(); ?>uploads/customer/" + u_avatar + "' alt='sunil'> </div>";
                            } else {
                                htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";

                            }
                            htmlStr += "<div class='received_msg'>";
                            htmlStr += "<div class='received_withd_msg'>";
                            htmlStr += "<p>" + msg + "</p>";
                            htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                            htmlStr += "</div>";
                            htmlStr += "</div>";
                        } else {
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
                error: function (result) {
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

    function getChatHistory() {
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
                    if (msgFrom != userId) {
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
                    } else {
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
            error: function (result) {
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

    function chatingFunction(userId, machineId, type, chatType) {
        // alert('hi');
        $('#message').val();
        var msg = $('#message').val();
        var type = $("#type").val();
        var chatType = $("#chatTypeId").val();
        // alert(chatType);
        var u_name = '<?php echo $this->session->userdata('u_name'); ?>';
        var u_avatar = '<?php echo $this->session->userdata('u_avatar');  ?>';

        //  alert(u_name+''+u_avatar);

        if (msg != "") {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>machine/saveChat/",
                // data: "userId="+userId+",machineId="+machineId+",msg="+msg,
                data: {
                    userId: userId,
                    machineId: machineId,
                    msg: msg,
                    type: type,
                    u_name: u_name,
                    u_avatar: u_avatar,
                    chatType: chatType
                },
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
                                if (msgFrom == userId) {
                                    htmlStr += "<div class='incoming_msg'>";
                                    htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
                                    htmlStr += "<div class='received_msg'>";
                                    htmlStr += "<div class='received_withd_msg'>";
                                    htmlStr += "<p>" + msg + "</p>";
                                    htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                                    htmlStr += "</div>";
                                    htmlStr += "</div>";
                                } else {
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
                        error: function (result) {
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
                error: function (result) {
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
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".chatbox").not(targetBox).hide();
            $(targetBox).show();
        });

        $('#courseCategory').on('change',function(){
            $('#PageForm').submit();

        });

    });

</script>

<script type="text/javascript">
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