<?php
$this->template->contentBegin(POS_TOP); ?>


<?php $this->template->contentBegin(POS_TOP); ?>


<?php echo $this->template->contentEnd(); ?>

    <section class="banner banner_image help_banner on-dmnd align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="banner_text">
                        <p>At Teranex, We Provide</p>
                        <h1 class="basic-head white-color">All Your Remote Programming Needs</h1>
                    </div>

                </div>
            </div>
        </div>
    </section>
    <section class="mrgn-top addvantage-box">
        <div class="container">
            <div class="row">
                <?php foreach ($remoteprogramming_list as $remoteprogrammings) { ?>
                    <div class="col-md-4">
                        <div class="text_cnt bx-shdw padd_all_50 white">
                            <h3 class="basic-head"><?php echo $remoteprogrammings['cat_name'] ?></h3>
                            <p class=" "><?php echo $remoteprogrammings['cat_description'] ?></p>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
    <section class=" bx-shdw downld-app mrgn-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 white">
                    <div class="padd-left">
                        <div class="down-cntnt  our-app-txt ">
                            <p>an easy way to send buying requests to suppliers & get qutoes quickly</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 commut">
                    <form class="form-horizontal" name="#" id="#" method="post" action="">
                        <div class="down-cntnt app-box_child">
                            <h3 class="basic-head white-color">get your quote Now!</h3>
                            <?php if ($this->session->userdata('uid') && $this->session->userdata('user_type')) { ?>
                                <a href="<?php echo site_url() . "remoteprogramming/rfq" ?>" class="a-green-btn" type="submit">Click Here</a>

                            <?php } else { ?>
                                <a href="" type="submit" data-toggle='modal' data-target='#signinModal' class="a-green-btn mrgn-top">Click Here</a>

                            <?php } ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <section class=" ">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="mrgn-top our-engn_head ">
                        <h2 class="basic-head">meet our Programmers</h2>
                    </div>

                    <div class="sort-catg mrgn-top bx-shdw padd_all_50 white">
                        <form action="" method="post" name="searchinglist" id="searchinglist">
                            <div class="sort-text">
                                <div class="languge-sel">
                                    <p>Sort</p>

                                    <div class="dropdown padd-left">
                                        <button type="button" class="btn dropdown-toggle" data-toggle="dropdown">
                                            Language
                                        </button>
                                        <?php
                                        if ($language_list) {

                                            foreach ($language_list as $rowLang) {
                                                ?>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item"
                                                       value="<?php echo $rowLang['lid']; ?>"><?php echo $rowLang['name']; ?></a>
                                                    <a class="dropdown-item" href="#">Link 2</a>
                                                    <a class="dropdown-item" href="#">Link 3</a>
                                                </div>
                                                <?php
                                            }
                                        } ?>
                                    </div>
                                </div>
                                <div class="search_sec">
                                    <div class="parnt_serch  languge-sel parnt_serch_respn">
                                        <p class="">Search</p>
                                        <div class="serchbar mar-lt-rt bx-shdw">
                                            <input type="text" placeholder="Enter your kewords..." name="programerName"
                                                   value="<?php
                                                   if ($this->session->userdata('programerName')) {

                                                       $value = $this->session->userdata('programerName');
                                                   } else {

                                                       $value = '';
                                                   }

                                                   echo $value;
                                                   ?>">
                                            <i class="fa fa-search" id="programSearch" name="btnSearch"></i>
                                        </div>
                                        <div class="">
                                            <a href="" class="a-green-btn" data-toggle="modal"
                                               data-target="#advsearchmodal">Advanced</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </form>
                        <div class="pagin-sort mrgn-top">
                            <span>Showing <?php echo $pageintation['start'] ?> - <?php echo $pageintation['end'] ?>
                                of <?php echo $pageintation['totalCount']; ?> Consultants</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="padd_tb_50">
        <div class="container br-bt">
            <div class="row">
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
                        <div class="col-md-4">
                            <div class="profile_enginer padd_all_50 bx-shdw white b-h-ourteam">

                                <?php if ($rowConsult['u_avatar']) { ?>
                                    <div class="profile_man">
                                        <img src="<?= base_url() . '/uploads/customer/' . $rowConsult['u_avatar'] ?>" alt="img">
                                    </div>
                                <?php } else { ?>
                                    <div class="profile_man">
                                        <img src="<?= base_url() . '/uploads/customer/user-default.png' ?>" alt="img">
                                    </div>
                                <?php } ?>

                                <div class="profile_cntnt">
                                    <h3 class="mrgn-top"><?php echo $rowConsult['u_name']; ?></h3>
                                    <p>Certified Public Bookkeeper</p>
                                    <!-- <button class="green-btn mrgn-top"></button> -->
                                    <a href="javascript:void(0)" class="link_in"> <i class="fa fa-linkedin-square"
                                                                    aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                } ?>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="text-center mrgn-top custom-paigntion">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination ">
                                <li class="page-item disabled">
                                    <?php echo pagination($pageintation['totalCount'], $pageintation['page'], $pageintation['show'], site_url() . "remoteprogramming/index/", ''); ?>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="prgorma_demnd">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="padd_tb_50">
                        <h3 class="basic-head">Recently Viewed</h3>
                    </div>
                </div>
            </div>
            <div class="c padd_all_50 bx-shdw white">
                <div id="owl-two" class="owl-carousel owl-theme">
                    <div class="item ">
                        <div class="padd_all_50  bx-shdw profile_one text-center">
                            <img src="<?php echo $theme_url ?>/images/trainers-img1.jpg" alt="">
                            <div class="enginr">
                                <h4 class="basic-head">John Smith</h4>
                                <p>Service Engineer</p>
                            </div>
                            <button type="submit" class="green-btn"> View Profile</button>
                        </div>
                    </div>
                    <div class="item ">
                        <div class="padd_all_50  bx-shdw profile_one text-center">
                            <img src="<?php echo $theme_url ?>/images/profile.jpg" alt="">
                            <div class="enginr">
                                <h4 class="basic-head">John Smith</h4>
                                <p>Service Engineer</p>
                            </div>
                            <button type="submit" class="green-btn"> View Profile</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="em_sect">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="padd_tb_50 ">
                        <h3 class="basic-head">Programmer of the month</h3>
                    </div>
                </div>
                <div class="col-12">
                    <div class="padd_all_50 bx-shdw white">
                        <div class="row">
                            <div class="col-md-4">
                                <div class=" em_mont">
                                    <img src="<?php echo $theme_url ?>/images/profile.jpg" alt="img">
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
    <section class=" bx-shdw downld-app mrgn-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6 white">
                    <div class="padd-left">
                        <div class="down-cntnt  our-app-txt ">
                            <p> are you a job shop intrested in buying a machine?</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 commut">
                    <div class="down-cntnt app-box_child">
                        <h3 class="basic-head white-color">On Demand</h3>
                        <h3 class="basic-head white-color">manufacturing</h3>
                        <button class="green-btn mrgn-top">View More</button>
                    </div>
                </div>
            </div>
        </div>
    </section>


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

                                <input type="submit" name="btnSearch" id="submit"
                                       class="btn input-form adv-search form-control" value="Submit"/>

                            </div>

                        </form>

                    </div>

                    <div class="clearfix"></div>

                </div>

            </div>

        </div>

    </div>


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

            $('#programSearch').click(function () {
                $('#searchinglist').submit();
            });
        });


        $('body').on('mouseenter', 'li', function () {

            //$(this).addClass('adasd');

        });


    </script>

    <script type="text/javascript">

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