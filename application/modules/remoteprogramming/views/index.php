<?php
$this->template->contentBegin(POS_TOP); ?>


<?php $this->template->contentBegin(POS_TOP); ?>


<?php echo $this->template->contentEnd(); ?>
    <div class="home-page-container banner-without-overlay height-550" style="background: url(<?php echo $theme_url ?>/images/web-2a-bg.jpg)">
        <div class="container">
            <div class="banner-content-text">
                <span>At Teranex, We Provide</span>
                <b>All Your Remote Programming Needs</b>
            </div>
        </div>
    </div>
    <div class="home-page-body-container get-an-instant-quote-page">
    <div class="home-inner-block-set">
        <div class="container">
            <div class="full-width">
                <div class="row">
                    <?php foreach ($remoteprogramming_list as $remoteprogrammings) { ?>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="home-card-set ">
                            <div class="card-title">
                                <br> <?php echo $remoteprogrammings['cat_name'] ?></div>
                            <p>
                                <?php echo $remoteprogrammings['cat_description'] ?>
                            </p>
                        </div>
                    </div>

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    </div>

    <div class="strichy-center-margin">
        <div class="support-now-card-container mt-3">
            <div class="support-now-card-right-img" style="background: url(<?php echo $theme_url ?>/images/10-2.jpg)"></div>
            <div class="container">
                <div class="full-width">
                    <div class="row align-items-center flex">
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="support-now-card-left-content">
                                An Easy Way To Send Buying <br>
                                Requests To Suppliers & Get <br>
                                Quotes Quickly
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="support-now-card-right-content text-center">
                                <?php if ($this->session->userdata('uid') && $this->session->userdata('user_type')) { ?>
                                    <a href="<?php echo site_url() . "remoteprogramming/rfq" ?>" class="a-green-btn" type="submit">Click Here</a>

                                <?php } else { ?>
                                <div class="full-width">Get Your Quote Now!</div>
                                <a href=""data-toggle="modal" data-target='#signinModal' class="btn submit-btn mt-15">Click Here</a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- support-now-card-container -->
        <!-- Meet Our Programmers -->
        <div class="home-inner-block-set">
            <div class="container">
                <div class="card-title pb-0">Meet Our Programmers</div>
            </div>
        </div>
    </div>
    <div class="home-inner-block-set get-an-instant-quote-batch">
        <div class="container">
            <div class="full-width">
                <div class="additive-card align-items-center flex web-additive-card">
                    <div class="full-width">
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-3 col-xl-3">
                                <div class="form-set-content d-lg-flex p-0">
                                    <label class="mr-2 w-auto">
                                        <span class="web-additive-card-title">Sort</span>
                                    </label>

                                    <select class="form-select-box web-additive-card-title w-auto">
                                        <?php
                                        if ($language_list) {

                                        foreach ($language_list as $rowLang) {
                                        ?>
                                        <option value="<?php echo $rowLang['lid']; ?>"><?php echo $rowLang['name']; ?></option>
                                            <?php
                                        }
                                        } ?>
                                    </select>

                                </div>
                            </div>

                            <div class="col-12 col-sm-12 col-md-6 col-lg-7 col-xl-7">
                                <div class="form-set-content p-0 flex">
                                    <div class="mr-2 w-auto">
                                        <span class="web-additive-card-title">Search</span>
                                    </div>
                                    <div class="headerbar-search mr-0">
                                        <input type="text" class="input-control" placeholder="Enter your keywords...">
                                        <i class="fa fa-search header-search-icon"></i>
                                        <i class="fa fa-close header-Msearch-close"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-2 col-xl-2 text-right">
                                <a href=""  class="btn submit-btn" data-target="#advsearchmodal" data-toggle="modal">Advanced</a>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="web-additive-card-title">
                                    Showing 1-6 of 99 Consultants
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="home-inner-block-set">
        <div class="container">
            <div class="full-width">
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
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="home-card-set ">
                        <?php if ($rowConsult['u_avatar']) { ?>
                            <img class="thumb-img" src="<?= base_url() . '/uploads/customer/' . $rowConsult['u_avatar'] ?>" alt="Jane Doe">
                        <?php }else { ?>
                            <img class="thumb-img" src="<?= base_url() . '/uploads/customer/user-default.png' ?>" alt="Jane Doe">
                        <?php } ?>
                            <div class="programmer-name"><?php echo $rowConsult['u_name']; ?></div>
                            <div class="programmer-desigination mb-2">Senior Programmer</div>
                            <div class="programmer-hour mb-2">$80/hour</div>
                            <div class="programmer-location mb-2">Melbourne, Australia</div>
                            <a href="#" class="btn submit-btn mt-4">View Profile</a>
                        </div>
                    </div>
                        <?php
                    }
                    } ?>

                </div>
                <div class="card-pagination">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="javascript:;"><i class="ion-ios-arrow-back"></i></a>
                        </li>
                        <li class="page-item active">
                            <a class="page-link" href="javascript:;">1</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">2</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">3</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">4</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">5</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">6</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">7</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">8</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">9</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;">10</a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="javascript:;"><i class="ion-ios-arrow-forward"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="home-inner-block-set">
        <div class="container">
            <div class="card-title pb-4">Recently Viewed</div>
            <div class="machines-recently-viewed">
                <div id="recently_viewed_machine" class="owl-carousel owl-theme">
                    <div class="item">
                        <div class="home-card-set text-center">
                            <div class="programmer-image mb-4">
                                <img class="thumb-img box-shadow" src="<?php echo $theme_url ?>/images/trainers-img1.jpg" alt="Jane Doe">
                            </div>
                            <div class="programmer-name text-16">John Smith</div>
                            <div class="programmer-desigination mb-2 text-13">Service Programmer</div>
                            <a href="#" class="btn small-btn mt-4">View Profile</a>
                        </div>
                    </div>
                    <div class="item">
                        <div class="home-card-set text-center">
                            <div class="programmer-image mb-4">
                                <img class="thumb-img box-shadow" src="<?php echo $theme_url ?>/images/profile.jpg" alt="Jane Doe">
                            </div>
                            <div class="programmer-name text-16">John Smith</div>
                            <div class="programmer-desigination mb-2 text-13">Service Programmer</div>
                            <a href="#" class="btn small-btn mt-4">View Profile</a>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>


    <div class="home-inner-block-set">
        <div class="container">
            <div class="card-title">Programmer Of The Month</div>
            <div class="programmer-card p-40">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-4 col-lg-4 col-xl-4">
                        <div class="programmer-card-image">
                            <img src="<?php echo $theme_url ?>/images/profile.jpg" class="img-fluid" alt="Card image">
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-8 col-lg-8 col-xl-8">
                        <div class="programmer-card-content">
                            <div class="card-title">
                                <span class="full-width">Jane Doe</span>
                                <small class="full-width">Senier Programmer</small>
                            </div>
                            <p class="text-dark"><?php echo $assigned_text; ?></p>
                            <div class="bending-machine-card-footer">
                                <button class="btn submit-btn">View Profile</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>

    <div class="support-now-card-container mt-3">
        <div class="support-now-card-right-img" style="background: url(<?php echo $theme_url ?>/images/10-2.jpg)"></div>
        <div class="container">
            <div class="full-width">
                <div class="row align-items-center flex">
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="support-now-card-left-content">
                            Are You Interested <br>
                            In Outsourcing <br>
                            Your Production?
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                        <div class="support-now-card-right-content text-center">
                            <div class="full-width">Manufacturing-on-Demand</div>
                            <button class="btn submit-btn mt-15">View More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- Footer Container end -->
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