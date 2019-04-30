<?php $this->template->contentBegin(POS_TOP); ?>
    <link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/css/Eacademy.css"/>

<?php echo $this->template->contentEnd(); ?>

    <section class="banner banner_image course_banner align-items-center ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_text ">
                        <p>CNC Desgin/Programming-Online Course</p>
                        <h1 class="basic-head white-color">CAD/CAM:Tru Tops Laser Course</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mrgn-top sticky-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="booking_box bx-shdw padd_all_50 white ">
                        <div class="child_menu_btm country_area">
                            <h4 class="basic-head"><?php echo $course_data['name'] ?></h4>
                            <p><?php echo $course_data['sub_title'] ?></p>
                        </div>
                        <div class="child_menu_btm em_payrs ">
                            <!-- <h4 class="basic-head mar-lt-rt">$68.50/hour</h4> -->
                            <button class="green-btn">Enrol Now!</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="padd_all_50 bx-shdw glance cd_descrt mrgn-top white">
                        <h2 class="basic-head">At a Glance</h2>
                        <div class="be_table mrgn-top">
                            <table>
                                <tbody>
                                <tr>
                                    <td>Pre-Requisites</td>
                                    <td>None</td>
                                </tr>
                                <tr>
                                    <td>Language</td>
                                    <td>English</td>
                                </tr>
                                <tr>
                                    <td>Certification</td>
                                    <td>Certification of Completion</td>
                                </tr>
                                <tr>
                                    <td>Duration</td>
                                    <td>1 Week</td>
                                </tr>
                                <tr>
                                    <td>Commencement Date</td>
                                    <td>5>00, 11/04/18</td>
                                </tr>
                                <tr>
                                    <td>Cost</td>
                                    <td>$1,120.99</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="padd_all_50 bx-shdw strngth cd_descrt mrgn-top white">
                        <h2 class="basic-head">Course Description</h2>
                        <div class="ex-strngth mrgn-top">
                            <p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a
                                piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard
                                McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of
                                the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through
                                the cites of the word in classical literature, discovered the undoubtable source.and
                                going through the cites of the word in classical literature, discovered the undoubtable
                                source</p>
                            <p class=" mrgn-top">Contrary to popular belief, Lorem Ipsum is not simply random text.up
                                one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going
                                through the cites of the word in classical literature, discovered the undoubtable
                                source.and going through the cites of the word in classical literature, discovered the
                                undoubtable source</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="padd_all_50 bx-shdw strngth cd_descrt mrgn-top white">
                        <h2 class="basic-head">Course Content</h2>
                        <div class="lsting_course mrgn-top">
                            <ul>
                                <li><p>1.Introduction</p></li>
                                <li><p>2.Setting Up A Drawing Using CAD</p></li>
                                <li><p>3.Fundamentals</p></li>
                                <li><p>4.Sketching(Not All Disciplines)</p></li>
                                <li><p>5.Orthographic Views</p></li>
                                <li><p>6.Sectional Views</p></li>
                                <li><p>7.Auxiliary Views</p></li>
                                <li><p>8.Dimensions</p></li>
                                <li><p>9.Tolerances(Not All Disciplines)</p></li>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="padd_all_50 bx-shdw strngth cd_descrt mrgn-top white">
                        <h2 class="basic-head">Learning Outcomes</h2>
                        <div class="mrgn-top lsting_course">
                            <p class="mrgn-top">Contrary to popular belief, Lorem Ipsum is not simply random text. </p>
                            <ul>
                                <li><p>1.Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                </li>
                                <li><p>2.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's </p></li>
                                <li><p>3.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's </p></li>
                                <li><p>4.Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                        Lorem Ipsum has been the industry's </p></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="laser-course">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="padd_tb_50 ">
                        <h3 class="basic-head">Meet Your Trainers</h3>
                    </div>
                </div>
            </div>
            <div class="c padd_all_50 bx-shdw white">
                <div id="owl-two" class="owl-carousel owl-theme">
                    <div class="item ">
                        <div class="padd_all_50  bx-shdw profile_one text-center">
                            <?php if($course_data['u_avatar']){ ?>
                                <img src="<?php echo base_url()."uploads/customer/".$course_data['u_avatar']?>"/>
                            <?php   }else{?>
                                <img src="<?php echo base_url()."uploads/customer/user-default.png"?>" />
                            <?php }?>
                            <div class="enginr">
                                <h4 class="basic-head"><?php echo $course_data['u_name'];?></h4>
                                <p>CAD/CAD Instructor</p>
                            </div>
                            <a href="<?= site_url()."eacademy/trainer_details/".$course_data['trainee_user_id']."/".formaturl($course_data['u_name']) ?>" class="a-green-btn mrgn-top">View Details</a>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="padd_all_50  bx-shdw profile_one text-center">
                            <?php if($course_data['u_avatar']){ ?>
                                <img src="<?php echo base_url()."uploads/customer/".$course_data['u_avatar']?>"/>
                            <?php   }else{?>
                                <img src="<?php echo base_url()."uploads/customer/user-default.png"?>" />
                            <?php }?>
                            <div class="enginr">
                                <h4 class="basic-head"><?php echo $course_data['u_name'];?></h4>
                                <p>Service Engineer</p>
                            </div>
                            <a href="<?= site_url()."eacademy/trainer_details/".$course_data['trainee_user_id']."/".formaturl($course_data['u_name']) ?>" class="a-green-btn mrgn-top">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="em_sect section_slider">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="padd_tb_50 ">
                        <h3 class="basic-head">Reviews</h3>
                    </div>
                </div>
                <div class="col-12 ">
                    <div class=" bx-shdw white">
                        <div class="row">
                            <div class="col-lg-9 col-md-8 slider_row">
                                <div class="">
                                    <div class="padd_rl_50 slider_one_top">
                                        <div class="silider_box ">
                                            <div id="owl-one" class="owl-carousel owl-theme owl-loaded owl-drag">

                                                <div class="owl-stage-outer">
                                                    <div class="owl-stage"
                                                         style="transform: translate3d(-10575px, 0px, 0px); transition: all 0.25s ease 0s; width: 15863px;">
                                                        <div class="owl-item cloned"
                                                             style="width: 1047.5px; margin-right: 10px;">
                                                            <div class="item">
                                                                <?php if($commentList){
                                                                    foreach($commentList as $rowComment){?>
                                                                        <div class="row">
                                                                            <div class="col-md-12">
                                                                                <div class="rt-cntnt">
                                                                                    <p><span class="coma">"</span>Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                                                                                        Lorem Ipsum has been the industry's<span class="coma">"</span>
                                                                                    </p>
                                                                                    <div class="st_hfive"><h5 class="compny">
                                                                                            <?php echo ucwords($rowComment['u_name'])?><span>-Company Name</span></h5>
                                                                                        <div class="starrating">
                                                                                            <?php $rateIng =$rowComment["course_rating"];
                                                                                            for($i=1;$i<=5;$i++) {
                                                                                                $selected = "";
                                                                                                if(!empty($rateIng) && $i<=$rateIng) {
                                                                                                    $selected = "selected";
                                                                                                }
                                                                                                ?>
                                                                                                <i class="fa fa-star <?php echo $selected; ?>" aria-hidden="true"></i>
                                                                                            <?php }  ?>


                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php }}else{ ?>
                                                                    <h3>No reviews available for this course..!!</h3>
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <div class="rt-cntnt">
                                                                                <div class="st_hfive"><h5 class="compny">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                <? } ?>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                                <div class="owl-nav">
                                                    <button type="button" role="presentation" class="owl-prev"><span
                                                                aria-label="Previous">‹</span></button>
                                                    <button type="button" role="presentation" class="owl-next"><span
                                                                aria-label="Next">›</span></button>
                                                </div>
                                                <div class="owl-dots">
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                    <button role="button" class="owl-dot active"><span></span></button>
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                </div>
                                                <div class="owl-nav">
                                                    <button type="button" role="presentation" class="owl-prev"><span
                                                                aria-label="Previous">‹</span></button>
                                                    <button type="button" role="presentation" class="owl-next"><span
                                                                aria-label="Next">›</span></button>
                                                </div>
                                                <div class="owl-dots">
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                    <button role="button" class="owl-dot"><span></span></button>
                                                    <button role="button" class="owl-dot active"><span></span></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-4">
                                <div class=" em_mont">
                                    <?php if($rowComment['u_avatar']){?>
                                        <img src="<?php echo base_url()."uploads/customer/".$rowComment['u_avatar']?>">
                                    <?php }else{?>
                                        <img src="<?php echo base_url()."uploads/customer/user-default.png"?>">
                                    <?php }?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>
    </section>

    <section class="">
        <div class="container">
            <div class="row">
                <div class="col-12 ">
                    <div class="padd_tb_50 ">
                        <h3 class="basic-head">Frequently Asked Questions</h3>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="bx-shdw padd_all_50 help_sign_box white">
                        <h3>How do I sign up?</h3>
                        <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
                            Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries.</p>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="bx-shdw padd_all_50 help_sign_box resp_15_help white">
                                <h3 class="padin-15">How do I sign in the Teranex Web Platform?</h3>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bx-shdw padd_all_50 help_sign_box resp_15_help white">
                                <h3 class="padin-15">How do I sign in the Teranex Web Platform?</h3>
                            </div>
                        </div>
                        <div class="col-md-6 mrgn-top">
                            <div class="bx-shdw padd_all_50 help_sign_box resp_15_help white">
                                <h3 class="padin-15">How do I sign in the Teranex Web Platform?</h3>
                            </div>
                        </div>
                        <div class="col-md-6 mrgn-top">
                            <div class="bx-shdw padd_all_50 help_sign_box resp_15_help white">
                                <h3 class="padin-15">How do I sign in the Teranex Web Platform?</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <style type="text/css">
        .checkbox label.error {
            color: red;
            padding-left: 0;
            position: absolute;
            top: 25px;
        }
    </style>
    <div id="course_enroll_modal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <center><h2 class="modal-title">Course Enrollment</h2></center>
                </div>
                <div class="modal-body ">
                    <div class="border_bot col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
                        <form class="form-horizontal" name="#" id="course_enroll_form" method="post"
                              action="<?php echo site_url() . "eacademy/course_enrollment/" ?>">
                            <div class="form-group ">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot lettersOnly" id="firstname" name="firstname"
                                           value="<?php echo $userData['u_name'] ?>" placeholder="Name" required><span
                                            class="compulsary">*</span>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot numbersOnly" id="phone" name="phone"
                                           minlength="10" maxlength="10" value="<?php echo $userData['u_mobileno'] ?>"
                                           placeholder="Phone Number" required><span class="compulsary">*</span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot" id="company_name" name="company_name"
                                           value="<?php echo $userData['user_company_name'] ?>"
                                           placeholder="Company Name" required><span class="compulsary">*</span>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="email" class="form_bor_bot" id="email" name="email"
                                           value="<?php echo $userData['u_email'] ?>" placeholder="Email" required><span
                                            class="compulsary">*</span>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot numbersOnly" id="participant_no"
                                           name="participant_no" value="1" placeholder="Number of Participants"
                                           required>
                                </div>

                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot" id="totalPrice" name="totalPrice"
                                           value="<?php echo $course_data['course_amount'] ?>" Placeholder="Price"
                                           readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot" id="CstartDate" name="#"
                                           value="<?php echo date_dmy($course_data['course_start_date']) ?>"
                                           placeholder="DD/MM/YYYY" readonly>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot" id="CaD" name="#" value="CaD" readonly>
                                </div>
                            </div>
                            <div class="form-group ">
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot" id="CName" name="#"
                                           value="<?php echo $course_data['name'] ?>" placeholder="Course Name"
                                           readonly>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <input type="text" class="form_bor_bot" id="CLevel" name="#"
                                           value="<?php echo $course_data['course_level'] ?>" placeholder="Course Level"
                                           readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-xs-12">
                                    <img src="" alt="Random letters" id="captcha" style="margin-top: "/>
                                    <span style="float: right;font-size: 25px;padding: 25px 50px 0 0"><a
                                                href='javascript: captcha_refresh();' data-toggle="tooltip"
                                                title="Refresh"><i class="fa fa-refresh"
                                                                   aria-hidden="true"></i></a></span>
                                </div>
                                <div class="col-sm-6 col-xs-12">
                                    <label for='message'>Enter the code here </label>
                                    <br>
                                    <input id="captcha_image" name="captcha" class="form_bor_bot" type="text"><span
                                            class="compulsary">*</span>
                                </div>
                                <br/>
                                <!-- Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh. -->
                                <input type="hidden" name="otp_no" id="otp_no" value="<?php echo $otp_no; ?>">
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label><input class="required" name="acceptPrivacy" id="acceptPrivacy"
                                                  type="checkbox"/><span class="red">*</span> I accept privacy policy
                                    </label>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <br/><br/>
                            <div class="form-group">
                                <div class="col-sm-12 col-xs-12">
                                    <input type="hidden" name="course_start_date" id="course_start_date"
                                           value="<?php echo $course_data['course_start_date']; ?>">
                                    <input type="hidden" name="course_start_time" id="course_start_time"
                                           value="<?php echo $course_data['course_start_time']; ?>">
                                    <input type="hidden" name="productinfo" id="productinfo"
                                           value="<?php echo $course_data['name']; ?>">
                                    <input type="hidden" name="course_end_date" id="course_end_date"
                                           value="<?php echo $course_data['course_end_date']; ?>">
                                    <input type="hidden" name="course_end_time" id="course_end_time"
                                           value="<?php echo $course_data['course_end_time']; ?>">
                                    <input type="hidden" name="course_id" id="course_id"
                                           value="<?php echo $course_data['cid']; ?>">
                                    <input type="hidden" name="course_amount" id="course_amount"
                                           value="<?php echo $course_data['course_amount']; ?>">
                                    <center><input type="submit" name="btnCourseEnrollment" id="btnCourseEnrollment"
                                                   class="btn btn_orange" value="Go to Payment"/></center>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                    <br/>
                </div>
            </div>
        </div>
    </div>

<?php $this->template->contentBegin(POS_BOTTOM); ?>
    <script src="<?= $theme_url ?>/js/jquery.bxslider.js"></script>
    <script language="javascript" type="text/javascript">
        $("ul").find("a").click(function (e) {
            // e.preventDefault();
            var section = $(this).attr("href");
            $("html, body").animate({
                scrollTop: $(section).offset().top - 120
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
    </script>
    <!-- <script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script>  -->
    <script>
        jQuery('.numbersOnly').keyup(function () {
            this.value = this.value.replace(/[^0-9\.]/g, '');
        });
        jQuery('.lettersOnly').keyup(function () {
            this.value = this.value.replace(/[^A-Za-z\.]/g, '');
        });
        jQuery.validator.addMethod("valEmail1", function (value, element) {
            return this.optional(element) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value);
        }, 'Please enter a valid email address');

        $('#course_enroll_modal').on('hidden.bs.modal', function () {
            $('#course_enroll_form').validate().resetForm();
            $('.error').removeClass('error');
            $(this).find('form').trigger('reset');
        });
        $("#course_enroll_form").validate({
            rules: {
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                company_name: {
                    required: true
                },
                email: {
                    required: true,
                    valEmail1: true
                },
                phone: {
                    required: true
                },
                participant_no: {
                    required: true
                },
                captcha: {
                    required: true
                },
            },
            messages: {
                firstname: {
                    required: "Please enter first name"
                },
                lastname: {
                    required: "Please enter last name"
                },
                company_name: {
                    required: "Please enter company name"
                },
                email: {
                    required: "Please enter email id"
                },
                phone: {
                    required: "Please enter phone number"
                },
                participant_no: {
                    required: "Please enter number of participants"
                },
                captcha: {
                    required: "Please enter proper captcha"
                },
            }
        });
        $(document).ready(function () {
            $("#participant_no").change(function (e) {
                var participant_no = $(this).val();
                var coursePrice = '<?php echo $course_data['course_amount']?>';
                var totalPrice = parseInt(coursePrice) * parseInt(participant_no);
                $('#totalPrice').val(totalPrice);
            });
        });
        var captchaUrl = "<?php echo base_url(); ?>index.php/captcha?page=courseEnrolll";
    </script>
    <script src="<?= $theme_url; ?>/js/captcha.js"></script>

    <script>
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


        /*** image slider ***/
        (function ($) {
            $(document).ready(function () {

                //bxslider
                $('#slide-counter').prepend('<strong class="current-index"></strong>/');

                var slider = $('#slideshow').bxSlider({
                    auto: true,
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

    </script>
    <script src="<?php echo $theme_url; ?>/js/jquery.flexisel.js"></script>


    <script type="text/javascript">


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

<?php echo $this->template->contentEnd(); ?>