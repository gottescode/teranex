<body onload="myFunction1()">

<div class="clearfix"></div>
<div class="navbar-fixed-top" style="">
    <div class="container padd-0">
        <nav id="navigation" class="navbar navbar-default navbar-ex">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar "></span>
                    <span class="icon-bar "></span>
                    <span class="icon-bar "></span>
                </button>
                <a class="navbar-brand" style="padding-left: 0;padding: 0;" href="<?php echo site_url() ?>">
                    <!-- <img src="<?php echo $theme_url ?>/images/logo20.png" class="img-responsive main_logo" style="display: none;"> -->
                    <img src="<?php echo $theme_url ?>/images/logo20_old.jpg" class="img-responsive logo-hide" style="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="ipad-menu ipro-menu">
                    <div class="menu-center">

                        <ul class="nav navbar-nav navbar-nav-ex cust_nav_new" style="">
                            <li class="nav_search " style="padding-right: ;">
                                <form class="navbar-form menu-ico-mar">
                                    <div class="form-group" style="margin-bottom:0px;">
                                        <input type="text" class="form-control form-control-ser" placeholder="Search" style="" />
                                        <button type="submit" class="btn btn-link ser-icon"><span class="glyphicon glyphicon-search"> </span> </button>
                                    </div>
                                </form>
                            </li>
                            <li class="dropdown mrgn_lft">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Machine Market <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3 dropdown-menu-right">
                                    <div class="">
                                        <div class="col-sm-3 padd-0">
                                            <ul class="multi-column-dropdown">
                                                <h5>Collaborate</h5>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo site_url() ?>community/forum" target="">User Communities</a></li>
                                                <li><a href="<?php echo site_url() ?>groupbuying" target="">Collective Buyers</a></li>
                                                <!-- <li><a href="<?php echo site_url(); ?>xpertconnect" target="">Freelancer Groups</a></li> -->
                                                <li><a href="<?php echo site_url() ?>exchangegroups" target="">Exchanges Groups</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 padd-0">
                                            <ul class="multi-column-dropdown">
                                                <h5>Source</h5>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo site_url() ?>machine/machineListNew/machineList/machines" target="">Machines</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 padd-0">
                                            <ul class="multi-column-dropdown">
                                                <h5>Connect</h5>
                                                <li class="divider"></li>
                                                <li><a target="" href="<?php echo site_url(); ?>remoteapplication">Machine Services</a></li>
                                                <li><a href="<?php echo site_url() ?>remoteapplication" target="">Application Support</a></li>
                                                <li><a target="" href="<?php echo site_url(); ?>remotetraining">Training Courses</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3 padd-0">
                                            <ul class="multi-column-dropdown">
                                                <h5>Trust</h5>
                                                <li class="divider"></li>
                                                <li><a target="" href="<?php echo site_url(); ?>pages/market_intelligence">Market Intelligence</a></li>
                                                <li><a href="<?php echo site_url() ?>pages/tradeServices" target="">Trade Services</a></li>
                                                <li><a target="" href="<?php echo site_url(); ?>pages/customerServices">Customer Services</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">eFactory <span class="caret"> </span></a>
                                <ul class="dropdown-menu">
                                    <li><a target="" href="<?php echo site_url() ?>remotetraining/online_courses">Learn</a></li>
                                    <li><a target="" href="<?php echo site_url() ?>pages/efactory_design">Design</a></li>
                                    <li><a target="" href="<?php echo site_url() ?>digitalmanufacturing">Produce</a></li>

                                </ul>
                            </li>


                            <li class="dropdown">
                                <?php $user_type = $this->session->userdata('user_type');
                                $url = site_url()."/customer/api/ListUserType/$user_type";
                                $user_type=  apiCall($url,"get",$pageDatas);
                                $designation = $user_type['result']['userType'];
                                $profile_pic = $this->session->userdata('u_avatar'); ?>
                                <?php //print_r($this->session->userdata);exit; ?>
                                <?php if ($this->session->userdata('uid')) { ?>
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo $u_name = $this->session->userdata('u_name'); ?> | Sign Out">
                                    <?php } else { ?>
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Sign In">
                                        <?php } ?>
                                        <img src="<?php echo $theme_url ?>/images/user.png" class="non-trans" style="height: 18px;width: 18px;">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right ddl-user mob-ddl">

                                        <?php if ($this->session->userdata('uid')) { ?>

                                        <?php } else { ?>
                                            <li><a href="<?php echo site_url() . "pages/signIn"; ?>">Sign In</a></li>
                                        <?php } ?>

                                        <?php if ($this->session->userdata('uid')) {


                                            ?>
                                            <div style="">
                                                <!-- <li class="divider"></li> -->
                                                <li class="socialAcc">
                                                    <div class="col-sm-12" style="">
                                                        <div class="col-sm-3">
                                                            <?php if($profile_pic != ''){ ?>
                                                                <img src="<?php echo site_url() . "uploads/customer/$profile_pic"?>" class="img-responsive">

                                                            <?php  } else { ?>
                                                                <img src="<?php echo $theme_url ?>/images/PersonPlaceholder.png" class="img-responsive">
                                                            <?php }?>

                                                        </div>
                                                        <div class="col-sm-9">
                                                            <label><?php echo $u_name = $this->session->userdata('u_name'); ?></label>
                                                            <p><?php echo $designation ?></p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-sm-6 padd-8" style="padding-left: 0;">
                                                            <a href="<?php echo site_url() . "customer/changePassword"; ?>" class="full-width btn btn-sm btn-default" style="display: inline-block;padding: 5px;">Change Password</a>
                                                        </div>
                                                        <div class="col-sm-6 padd-8" style="padding-right: 0;">

                                                            <form action="<?php echo site_url(); ?>pages/logout" method="POST">
                                                                <p id="countdown" style="display:none;" ></p>
                                                                <input type="hidden" class="form-control" placeholder="" value="<?php  echo $_SERVER['REMOTE_ADDR']; ?>" />

                                                                <input type="hidden" id="myValue"  name="countdown" class="form-control"/>
                                                                <button type="submit" class="btn btn-sm btn-default full-width"> Sign Out  </button>
                                                            </form>

                                                        </div>
                                                </li>
                                            </div>
                                        <?php } else { ?>
                                            <div style="display: none;">
                                                <li class="divider"></li>
                                                <li class="socialAcc">
                                                    <div class="col-sm-12" style="">
                                                        <div class="col-sm-3">
                                                            <img src="<?php echo $theme_url ?>/images/PersonPlaceholder.png" class="img-responsive">
                                                        </div>
                                                        <div class="col-sm-9">
                                                            <label><?php echo $u_name = $this->session->userdata('u_name'); ?></label>
                                                            <p><?php echo $designation ?></p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                        <div class="col-sm-6 padd-8" style="padding-left: 0;">
                                                            <a href="<?php echo site_url() . "customer/changePassword"; ?>" class="full-width btn btn-sm btn-default" style="display: inline-block;padding: 5px;">Change Password</a>
                                                        </div>
                                                        <div class="col-sm-6 padd-8" style="padding-right: 0;">
                                                            <a  href="<?php echo site_url() . "pages/logout"; ?>" class="full-width btn btn-sm btn-default" style="display: inline-block;padding: 5px;">Sign Out</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </div>
                                        <?php } ?>
                                    </ul>
                            </li>
                            <?php if ($this->session->userdata('uid')) { ?>
                                <li class="dropdown" >
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="My Stelmac">
                                        <img src="<?php echo $theme_url ?>/images/house-black-silhouette-without-door.png" class="non-trans" style="width: 18px;">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right ddl-user">
                                        <li><a href="<?php echo site_url() . "customer/dashboard"; ?>">Dashboard</a></li>
                                        <li><a href="<?php echo site_url() . "customer/profile"; ?>">My Profile</a></li>
                                        <li><a href="<?php echo base_url(); ?>customer/machineServices">My Machines</a></li>
                                        <!--<li><a href="<?php echo base_url(); ?>ecommerce/my-account/orders">My Orders</a></li>-->
                                        <li><a href="<?php  echo base_url();?>/customer/eventsList">My Events</a></li>
                                    </ul>
                                </li>
                            <?php } else { ?>

                                <li class="dropdown" style="display: none;">
                                    <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="My Stelmac">
                                        <img src="<?php echo $theme_url ?>/images/house-black-silhouette-without-door.png" class="non-trans" style="width: 18px;">
                                    </a>
                                    <ul class="dropdown-menu dropdown-menu-right ddl-user">
                                        <li><a href="<?php echo site_url() . "customer/dashboard"; ?>">Dashboard</a></li>
                                        <li><a href="<?php echo site_url() . "customer/profile"; ?>">My Profile</a></li>
                                        <li><a href="#">My Machines</a></li>
                                        <li><a href="#">My Orders</a></li>
                                        <li><a href="#">My Events</a></li>
                                    </ul>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <div class="clearfix"></div>
</div>