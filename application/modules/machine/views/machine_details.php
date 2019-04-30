<?php $this->template->contentBegin(POS_TOP); ?>

<?php
echo $this->template->contentEnd();
$user_id = $this->session->userdata('uid');
$machineID = $this->uri->segment(3);
//print_r($product_id);exit;
?>

<section class="banner banner_image align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- <div class="banner_text">
                    <p>Lorem Ipsum has been the industry's standard dummy text ever</p>
                </div> -->
            </div>
        </div>
    </div>
</section>

<section class="mrgn-top sticky-top" >
    <div class="container ">
        <div class="row">
            <div class="col-12">
                <div class="booking_box bx-shdw padd_all_50 white " id="video-call"  data-spy="affix" data-offset-top="197">
                    <div class="child_menu_btm country_area">
                        <h4 class="basic-head"><?php echo $machineDetails['modelName'] ?></h4>
                        <p><?php echo $machineDetails['city_name'] ?>,<?php echo $machineDetails['state_name'] ?>  <?php echo $machineDetails['price'] ?></p>
                    </div>
                    <div class="child_menu_btm em_payrs video-op ">

                        <button class="green-btn">Enquire Now!</button>
                        <a href="#"><i class="fa fa-phone" aria-hidden="true"></i></a>
                        <a href="#"><i class="fa fa-video-camera" aria-hidden="true"></i></a>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padd_tb_50">
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <div class="padd_all_50 bx-shdw glance according-height white">
                    <h2 class="basic-head">At a Glance</h2>
                    <div class="be_table mrgn-top">
                        <table>
                            <tbody>
                            <tr>
                                <td>Brand</td>
                                <td><?php echo $machineDetails['brandName'] ?></td>
                            </tr>
                            <tr>
                                <td>Model</td>
                                <td><?php echo $machineDetails['modelName'] ?></td>
                            </tr>
                            <tr>
                                <td>Type</td>
                                <td><?php echo $machineDetails['category_name'] ?></td>
                            </tr>
                            <tr>
                                <td>Year</td>
                                <td><?php echo $machineDetails['year_production'] ?></td>
                            </tr>
                            <tr>
                                <td>Condition</td>
                                <td><?php echo $machineDetails['machine_condition'] ?></td>
                            </tr>
                            <tr>
                                <td>Location</td>
                                <td> <?php echo $machineDetails['city_name'] . ", " . $machineDetails['state_name'] ?></td>
                            </tr>
                            <tr>
                                <td>Seller</td>
                                <td><?php echo $machineDetails['seller_name'] ?></td>
                            </tr>
                            <tr>
                                <td>Price</td>
                                <td><?php echo $machineDetails['price'] ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="padd_all_50 bx-shdw strngth according-height white">
                    <h2 class="basic-head">How Does It Run?</h2>
                    <div class="ex-strngth mrgn-top">
                        <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words.</p>
                    </div>
                    <div class="mrgn-top">
                        <div class="row">
                            <div class="col-lg-5 col-md-5">
                                <div class="time-request">
                                    <h4 class="basic-head">Request a Time Study</h4>
                                    <button class="green-btn mar-25"href="" data-toggle="modal" data-target="#timestudy">Click Here</button>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5">
                                <div class="time-request">
                                    <h4 class="basic-head">Book a Live Demo</h4>
                                    <button class="green-btn mar-25">Click Here</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mrgn-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="bx-shdw padd_all_50  white ">
                    <div class="fifty">
                        <h3 class="basic-head">Machine History</h3>
                        <p class="mrgn-top"><?php echo strhtmldecode($machineDetails['machine_history']) ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="mrgn-top bx-shdw downld-app">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 white">
                <div class="padd-left ">
                    <div class="down-cntnt  our-app-txt loan-require ">
                        <p>do you require a loan?</p>
                        <p>let us help you?</p>
                        <!-- <a href="" data-toggle="modal" data-target="#loanrequire">-->
                        <button class="green-btn mar-25" data-toggle="modal" data-target="#loanrequire">Click Here</button>

                    </div>
                </div>
            </div>
            <div class="col-md-6 commut">
                <div class="down-cntnt padd_all_50 app-box_child loan-require">
                    <h3 class="basic-head white-color">Do You need Security?</h3>
                    <h3 class="basic-head white-color">Smart Contract </h3>
                    <button class="green-btn mar-25">Click Here</button>
                </div>
            </div>
        </div>
    </div>
</section>


<section class=" ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="padd_tb_50"><h2 class="basic-head">Machine Specifications</h2></div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="padd_all_50 bx-shdw glance according-height white">
                    <h2 class="basic-head">standard Configuration</h2>
                    <div class="standrd_lisitng_page">
                        <h4 class=" basic-head">Machine</h4>

                            <?php echo strhtmldecode($machineDetails['standard_specification']) ?>


                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="padd_all_50 bx-shdw strngth according-height white">
                    <h2 class="basic-head">How Does It Run?</h2>
                    <div class="standrd_lisitng_page">
                        <ul class="mrgn-top">
                            <li>2 support tables on linear bearing</li>
                            <li>4-axe back stop system(X,R,Z1,Z2)</li>
                            <li>Hydraulic and hardended top tool clamping</li>
                            <li>hydraulic bottom tool clamping</li>
                            <li>CNC camber</li>
                            <li>prepared for ACB</li>
                            <li>lite working chamber</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padd_tb_50">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="padd_all_50 bx-shdw glance according-height white">
                    <h2 class="basic-head">Technical Data</h2>
                    <div class="be_table mrgn-top agin">
                        <table>
                            <tbody>
                            <tr>
                                <td><?php echo strhtmldecode($machineDetails['technical_specification']) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="padd_all_50 bx-shdw strngth according-height white">
                    <h2 class="basic-head">All Services</h2>
                    <div class="padd_tb_50">
                        Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text
                        <button class="green-btn mrgn-top">Learn More</button>
                    </div>
                    <div class="standrd_lisitng_page">
                        <ul class="mrgn-top">
                            <li>Standard Services</li>
                            <li>Remote Services</li>
                            <li>Trade Services</li>
                            <li>Remote Machine Service</li>
                            <li>Remote Training</li>
                            <li>Remote Application Support</li>
                            <li>Defferd LC</li>
                            <li>Warranty</li>
                            <li>Installation & Commissioning</li>
                            <li>CAD/CAM Training</li>
                            <li>Machine Operator Training</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section>
    <div class="container" id="Software">
        <div class="row">
            <div class="col-12">
                <div class="padd_tb_50">
                    <h3 class="basic-head">Softwares</h3>
                </div>
            </div>
        </div>
        <div class="padd_all_50 bx-shdw white">
            <?php
            if (isset($softwareList)) {

                foreach ($softwareList as $key) {
                    if (in_array($key['id'], $machine_software_list)) {

                        ?>
                        <div id="owl-four" class="owl-carousel owl-theme">

                            <div class="item">
                                <img src="<?php echo base_url() . "uploads/machine_software/" . $key['machine_image'] ?>" alt="img">
                            </div>
                            <div class="item">
                                <img src="http://www.teranex.io/beta-V*SRJ!-110918-230718/themes/site/images/logo20_old.jpg" alt="img">
                                <h3><?php echo $key['machine_name']; ?></h3>
                            </div>

                        </div>
                    <?php } }
            }
            ?>
        </div>
    </div>
</section>

<section class="mrgn-top">
    <div class="container">
        <div class="padd_all_50 bx-shdw white appointment">
            <div class="row">
                <div class="col-md-8">
                    <div class="child">
                        <div class="col-12">
                            <h3 class="basic-head">Download Our App!</h3>
                            <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book</p>
                            <div class="lisitng mrgn-top">
                                <ul>
                                    <li>Machine Breakdown</li>
                                    <li>Machine Maintenance</li>
                                </ul>
                                <ul>
                                    <li>Application Support</li>
                                    <li>Spare Parts</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="content mrgn-top">
                        <h4 class="basic-head mar-rt-25">Get it now!</h4>
                        <a href="#" class="mar-rt-25"><img src="<?php echo $theme_url?>/images/apple.png" alt="img"></a>
                        <a href="#" class="mar-rt-25"><img src="<?php echo $theme_url?>/images/google.png" alt="img"></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="child center_lcs">
                        <img src="<?php echo $theme_url?>/images/single_mobile.jpg" alt="img">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="detail_heading">
    <div class="container">
        <div class="col-sm-12 padd-0">


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
                            <textarea type="text" name="description" class="form-control rounded-0" id="exampleFormControlTextarea2" rows="6" ></textarea>
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

    });

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





    function chatingFunction(userId, machineId)
    {
        var userId=userId;                                                 $('#message').val();
        var machineId=machineId;                                                 $('#message').val();
        var msg = $('#message').val();
        var type = $("#type").val();
        var chatType = $("#chatTypeId").val();
        // alert(chatType);
        var u_name = '<?php echo $this->session->userdata('u_name'); ?>';
        var uid = '<?php echo $this->session->userdata('uid'); ?>';
        var u_avatar = '<?php echo $this->session->userdata('u_avatar');  ?>';

        // alert(userId+''+chatType);

        if (msg != "") {
            $.ajax({
                type: 'POST',

                // data: "userId="+userId+",machineId="+machineId+",msg="+msg,
                data: {userId: userId, machineId: machineId, msg: msg, type: type,u_name: u_name,u_avatar: u_avatar,chatType: chatType},
                success: function (msg) {
                    $("#message").val("");
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>customer/getChatUnique/",
                        data: {userId: userId,chatType:chatType},
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

                                // alert(msgFrom+''+userId);
                                if (msgFrom != userId)
                                {
                                    htmlStr += "<div class='incoming_msg'>";
                                    htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='stelmac admin'> </div>";
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
    //  $(document).ready(function(){
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
        //  auto: true,
        //          autoControls: false,
        //  mode: 'horizontal',
        //  moveSlides: 1,
        //  slideMargin: 0,
        //  infiniteLoop: true,
        //  slideWidth: 660,
        //  minSlides: 1,
        //  maxSlides: 1,
        //  speed: 400,
        //  controls:true,
        //  pager:true,
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

                <?php $count=count($softwareList);

                $machine_count=$count-1;

                ?>
                visibleItems: <?php echo $machine_count; ?>,
                itemsToScroll: 2,
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


<?php echo $this->template->contentEnd(); ?>


