<header>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-2 col-md-2">
                <div class="logo">
                    <a href="<?php echo site_url()?>">
                    <img src="<?php echo $theme_url?>/images/logo.png" alt="logo">
                    </a>
                </div>
            </div>
            <div class="col-lg-5 col-md-8 col-sm-9">
                <div class="parnt_serch">
                    <div class="serchbar bx-shdw">
                        <input type="text">
                        <i class="fa fa-search" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-2 col-sm-3">
                <div class="menubar">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand menu_anchor" href="#">Menu</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Machine Market
                                    </a>
                                    <div class="special-menu-parnt dropdown-menu">
                                        <div class="row" >
                                            <div class="col-md-3" >
                                                <div class=" mini-child" aria-labelledby="navbarDropdown">
                                                    <h5>Collaborate</h5>
                                                    <a class="dropdown-item" href="<?php echo site_url() ?>community/forum">User Communities</a>
                                                    <a class="dropdown-item" href="<?php echo site_url() ?>groupbuying">Collective Buyers</a>
                                                    <a class="dropdown-item" href="<?php echo site_url() ?>exchangegroups">Exchanges Groups</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3" >
                                                <div class="mini-child" aria-labelledby="navbarDropdown">
                                                    <h5>Source</h5>
                                                    <a class="dropdown-item" href="<?php echo site_url() ?>machine/machineListNew/machineList/machines">Machines</a>

                                                </div>
                                            </div>
                                            <div class="col-md-3" >
                                                <div class="mini-child" aria-labelledby="navbarDropdown">
                                                    <h5>Connect</h5>
                                                    <a class="dropdown-item" href="<?php echo site_url(); ?>remoteapplication">Machines Services</a>
                                                    <a class="dropdown-item" href="<?php echo site_url() ?>remoteapplication">Application Support</a>
                                                    <a class="dropdown-item" href="<?php echo site_url(); ?>remotetraining">Training Courses</a>
                                                </div>
                                            </div>
                                            <div class="col-md-3" >
                                                <div class="mini-child" aria-labelledby="navbarDropdown">
                                                    <h5>Trust</h5>
                                                    <a class="dropdown-item" href="<?php echo site_url(); ?>pages/market_intelligence">Market Intelligence</a>
                                                    <a class="dropdown-item" href="<?php echo site_url() ?>pages/tradeServices">Trade Services</a>
                                                    <a class="dropdown-item" href="<?php echo site_url(); ?>pages/customerServices">Customer Services</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                       Learning Platform
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="<?php echo site_url() ?>remotetraining/online_courses">Learn</a>
                                        <a class="dropdown-item" href="<?php echo site_url() ?>pages/efactory_design">Design</a>
                                        <a class="dropdown-item" href="<?php echo site_url() ?>digitalmanufacturing">Produce</a>
                                    </div>
                                </li>


                                <?php if ($this->session->userdata('uid')) { ?>
                                <?php } else { ?>
                                    <li class="nav-item">
                                        <a class="nav-link user_icon" href="#" data-toggle="modal" data-target="#login_form"><img src="<?php echo $theme_url?>/images/baseline_person_black_18dp.png" alt=""></a>
                                    </li>
                                <?php } ?>

                                <?php if ($this->session->userdata('uid')) { ?>
                                    <li class="dropdown" >
                                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="My Stelmac">
                                            <img src="<?php echo $theme_url ?>/images/house-black-silhouette-without-door.png" class="non-trans" style="width: 18px;">
                                        </a>
                                        <ul class="dropdown-menu dropdown-menu-right ddl-user">
                                            <li><a href="<?php echo site_url() . "customer/dashboard"; ?>">Dashboard</a></li>
                                            <li><a href="<?php echo site_url() . "customer/profile"; ?>">My Profile</a></li>
                                            <li><a href="<?php echo base_url(); ?>customer/machineServices">My Machines</a></li>
                                            <li><a href="<?php  echo base_url();?>/customer/eventsList">My Events</a></li>
                                            <li class="nav-item">
                                                <form action="<?php echo site_url(); ?>pages/logout" method="POST">
                                                    <p id="countdown" style="display:none;" ></p>
                                                    <input type="hidden" class="form-control" placeholder="" value="<?php  echo $_SERVER['REMOTE_ADDR']; ?>" />

                                                    <input type="hidden" id="myValue"  name="countdown" class="form-control"/>
                                                    <button type="submit" class="btn btn-sm btn-default full-width"> Sign Out  </button>
                                                </form>
                                            </li>
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
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Modal -->
<div class="modal fade" id="login_form" tabindex="-1" role="dialog" aria-labelledby="login_form" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header padd_all_50">
                <h5 class="modal-title basic-head" id="exampleModalLabel">Log In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body padd_rl_50">
                <div class="formalty_form">
                    <form class="form-signin" name="login" id="login" method="post" action="<?php echo site_url() . "pages/login" ?>">
                    <input type="text" name="u_email" id="u_email" class="bx-shdw" placeholder="Email *" >
                        <input type="password" name="u_password" id="u_password" class="bx-shdw mrgn-top" placeholder="Password" >
                        <div class="mrgn-top log-in_btn">
                            <div class="log-in_child">
                                <button type="submit" class="green-btn" name="btnLogin" value="Sign in">Log In</button>
                                <button class="green-btn grey-btn mar-25">Reset Password</button>
                            </div>
                            <div class="log-in_child flx-clm-revs">
                                <a href="#">Not Registerded?</a>
                                <button class="green-btn grey-btn mar-25">Sign Up</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>