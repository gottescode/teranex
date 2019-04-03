<style type="text/css">
    .cust_nav_new{
        width: 100%;
    }
    .nav_search{
        width: 59%;
    }
    .width_full_nav{
        width: 100%;
    }
    .sroll_nav_search{
        width: 59%;
    }
    .width41{
        width: 41%;
    }
    @media (min-width: 1024px) and (max-width:1199px) {
        .width_full_nav{
            width: 100%;
        }
        .nav_search {
            width: 49%;
        }
        .sroll_nav_search{
            width: 49%;
        }
        .width41{
            width: 51%;
        }

    }
    @media (min-width: 992px) and (max-width:1023px) {
        .width_full_nav{
            width: 100%;
        }
        .nav_search {
            width: 65%;
        }
        .sroll_nav_search{
            width: 50%;
        }
        .width41{
            width: 51%;
        }

    }
    @media (min-width: 768px) and (max-width:991px) {
        .width_full_nav{
            width: 100%;
        }
        .nav_search {
            width: 40%;
        }
        .sroll_nav_search{
            width: 55%;
        }
        .width41{
            width: 60%;
        }

    }
</style>
<body onload="myFunction1()">
    <!-- //-- FOR ADDING TOP TO HERADER ON FIRST TIME LOAD  --//
    <div class="col-sm-12 text-center" style="background: #0e587b;color: #fff;padding: 20px;">
        <div class="row">
            <div class="col-sm-11">
                <p style="color: #fff;">WE USE COOKIES FOR THE PROVISION AND FUNCTIONALITY OF THIS WEBSITE. IF YOU AGREE THAT WE CAN USE COOKIES FOR OTHER PURPOSES PLEASE CLICK HERE. <a href="" style="color: #a7a7a7;">INFORMATION ON DEACTIVATING COOKIES AND DATA PROTECTION</a></p>
                <a href="" class="btn btn_orange">OK</a>
            </div>
            <div class="col-sm-1">
                <span><a href="" style="color:#a7a7a7;font-size: 30px; ">&times;</a></span>
            </div>
        </div>
    </div> -->
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
                            <!-- <div class="menu-right-icon">
                               <form class="navbar-form menu-ico-mar">
                                  <div class="form-group" style="margin-bottom:0px;">
                                     <input type="text" class="form-control form-control-ser" placeholder="Search" />
                                     <button type="submit" class="btn btn-link ser-icon"><span class="glyphicon glyphicon-search"> </span> </button>
                                  </div>
                               </form>
                               
                            </div> -->

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
                                                    <!-- <li><a href="<?php echo site_url() ?>automation" target="">Automation</a></li> 
                                                    <li><a href="#" target=""> Toolings</a></li>
                                                    <li><a href="#" target="">Spares</a></li>-->

                                                </ul>
                                            </div>
                                            <div class="col-sm-3 padd-0">
                                                <ul class="multi-column-dropdown">
                                                    <h5>Connect</h5>
                                                    <li class="divider"></li>
                                                   <!--
												   <li><a target="" href="<?php echo site_url(); ?>consultant">Machine Services</a></li>
												   --> 
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
                                <!-- <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Market Intelligence <span class="caret"> </span></a>
                                    <ul class="dropdown-menu">
                                       <li><a target="_blank" href="<?php echo site_url() ?>research">Research</a></li>
                                       <li><a target="_blank" href="<?php echo site_url() ?>analytics">Analytics</a></li>
                                       <li><a target="_blank" href="<?php echo site_url() ?>consulting">Consulting</a></li>
                                       <li><a target="_blank" href="http://teranex.io/mediacenter/category/industry-news/">News</a></li>
                                       <li><a target="_blank" href="http://teranex.io/mediacenter/category/customer-blog/">Blogs</a></li>
                                       <li><a target="_blank" href="<?php echo site_url() ?>pages/commingsoon">Webinar</a></li>
                                    </ul>
                                </li> -->
                                <!-- <li class="dropdown mrgn_lft">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Information Services <span class="caret"></span></a>
                                    <ul class="dropdown-menu multi-column columns-3 dropdown-menu-right">
                                       <div class="">
                                          <div class="col-sm-4 padd-0">
                                             <ul class="multi-column-dropdown">
                                                <h5>Market Services</h5>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo site_url() ?>research" target="_blank">Research </a></li>
                                                <li><a href="<?php echo site_url() ?>analytics" target="_blank">Monitoring</a></li>
                                                <li><a href="<?php echo site_url(); ?>events" target="_blank">Events</a></li>
                                                <li><a href="http://teranex.io/mediacenter/category/media/" target="_blank">Industry News</a></li>
                                             </ul>
                                          </div>
                                          <div class="col-sm-4 padd-0">
                                             <ul class="multi-column-dropdown">
                                                <h5>Customer Services</h5>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo site_url() ?>footer/submitAdispute" target="_blank">Submit A Dispute</a></li>
                                                <li><a href="<?php echo site_url() ?>footer/ReportAbuse" target="_blank">Report Abuse</a></li>
                                                <li><a href="" target="_blank">Pay Later</a></li>
                                                <li><a href="<?php echo site_url() ?>pages/getPaidForYourFeedback" target="_blank">Get Paid For Feedback</a></li>
                                             </ul>
                                          </div>
                                          <div class="col-sm-4 padd-0">
                                             <ul class="multi-column-dropdown">
                                                <h5>Trade Services</h5>
                                                <li class="divider"></li>
                                                <li><a target="_blank" href="<?php echo site_url(); ?>footer/tradeAssurance">Trade Assurance</a></li>
                                                <li><a href="<?php echo site_url() ?>footer/businessIdentity" target="_blank">Business Identity</a></li>
                                                <li><a target="_blank" href="<?php echo site_url(); ?>footer/inspectionService">Inspection Services</a></li>
                                                <li><a target="_blank" href="<?php echo site_url(); ?>footer/securePayment">Secure Payment</a></li>
                                             </ul>
                                          </div>
                                       </div>
                                    </ul>
                                </li> -->
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
                <!-- <li><a href="<?php echo site_url() . "customer/dashboard"; ?>">Dashboard</a></li> -->
                <!-- <li><a href="<?php echo site_url() . "pages/logout"; ?>">Sign Out</a></li> -->
                                            <?php } else { ?>
                                                <li><a href="<?php echo site_url() . "pages/signIn"; ?>">Sign In</a></li> 
                                            <?php } ?>

                                            <?php if ($this->session->userdata('uid')) { 
                                              //  $user_id=$this->session->userdata('uid');
                                                              //$profile_data=$this->customer_model->selectAllWhr('master_user','uid',$user_id);
                                                            //$u_avatar=$profile_data['u_avatar'];

                                                
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
    <!--                                                            <form action="<?php echo site_url(); ?>pages/logout" method="POST">
        <p id="countdown"></p>
        <input type="text" id="myValue"  name="countdown" class="form-control"/>
        <a type="submit" href="<?php echo site_url() . "pages/logout"; ?>" class="full-width btn btn-sm btn-default" style="display: inline-block;padding: 5px;">Sign Out</a>
    </form>                                                         </div>-->
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
