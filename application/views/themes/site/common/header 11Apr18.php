<div class="container-fluid menu-border">
	<nav id="navigation" class="navbar navbar-default navbar-ex navbar-fixed-top">	
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar "></span>
                  <span class="icon-bar "></span>
                  <span class="icon-bar "></span>
                  </button>
                <a class="navbar-brand" href="<?php echo site_url()?>">
					<img src="<?php echo $theme_url?>/images/logo20.jpg" class="img-responsive">
				</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="">
                    <div class="menu-center">
                        <ul class="nav navbar-nav navbar-nav-ex" style="margin-left: 0%;">
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marketplace <span class="caret"></span></a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h5>Machines & Supplies</h5>
                                                <li class="divider"></li>
                                                <li><a href="#">Machines</a></li>
                                                <li><a href="#">Spares</a></li>
                                                <li><a href="#">Toolings</a></li>
                                                <li><a href="#">Software</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h5>Remote Services</h5>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">Remote Programming</a></li>
                                                <li><a href="<?php echo site_url()?>consultant">Remote Machine Service</a></li>
                                                <li><a href="<?php echo site_url()?>consultant/remoteapp_service">Remote Application Service</a></li>
                                                <li><a href="#">Remote Monitoring & Control</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h5>community</h5>
                                                <li class="divider"></li>
                                                <li><a href="<?php echo site_url()?>community/forum/">user communities</a></li>
                                                <li><a href="#">Collaboration Groups</a></li>
                                                <li><a href="<?php echo site_url()?>eacademy"><span style="text-transform:lowercase">e</span>Academy</a></li>
                                                <li><a href="<?php echo site_url()?>events">Industry events</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li> <a href="#">Digital Manufacturing</a></li>
                            <!--<li class="dropdown">
                                <a href="<?php echo site_url()."eacademy";?>" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">eAcademy <span class="caret"></span>
                             </a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="row">
                                        <div class="col-sm-3" style="margin-left:0px;">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="programming.php">Programming</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">CAD / CAM Drawing</a></li>
                                                <li><a href="coming_soon.php">Process Engineering</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="service_support.php">Service Support</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">Warranty Support</a></li>
                                                <li><a href="coming_soon.php">Annual Maintenance Contract</a></li>
                                                <li><a href="coming_soon.php">Machine Repair</a></li>
                                                <li><a href="coming_soon.php">Machine Installation</a></li>
                                                <li><a href="coming_soon.php">Preventive Maintenance</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="application_support.php">Application Support</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">Efficiency Enhancement</a></li>
                                                <li><a href="coming_soon.php">Product Quality Improvement</a></li>
                                                <li><a href="coming_soon.php">First Part Production</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="consulting.php">Consulting</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">Business Development</a></li>
                                                <li><a href="coming_soon.php">Process Engineering</a></li>
                                                <li><a href="coming_soon.php">Product Development</a></li>
                                                <li><a href="coming_soon.php">Project Engineering</a></li>
                                                <li><a href="coming_soon.php">System Engineering</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3" style="margin-left:0px;">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5>Live Trainings</h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="trainings.php">CAD / CAM</a> </li>
                                                <li><a href="trainings.php">Machine Operations</a> </li>
                                                <li><a href="trainings.php">Maintenance</a> </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="services_live_events.php">Live Events</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">Open House</a></li>
                                                <li><a href="coming_soon.php">Machine Auction</a></li>
                                                <li><a href="coming_soon.php">Panel Discussion</a></li>
                                                <li><a href="coming_soon.php">Product Launch</a></li>
                                                <li><a href="coming_soon.php">Technology Seminar</a></li>
                                                <li><a href="coming_soon.php">Trade Show</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="excess_capacity_utilization.php">Excess Capacity Utilization</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">Add Available Capacities</a></li>
                                                <li><a href="coming_soon.php">Request for Capacities</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="collective_buying.php">Group Buying</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="coming_soon.php">Group Buying Request</a></li>
                                                <li><a href="coming_soon.php">Promotional Scheme</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <h5><a href="contract_manufacturing.php">Contract Manufacturing</a></h5>
                                                </li>
                                                <li class="divider"></li>
                                                <li><a href="">Contract Manufacturing</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>-->
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Market Intelligence & Consulting <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="coming_soon.php">Market Research</a></li>
                                  <li><a href="coming_soon.php">Analytics</a></li>
                                  <li><a href="coming_soon.php">Consulting</a></li>
                                </ul>
                            </li>
                        </ul> 
                    </div>
                </div>
                <div class="col-md-4 col-xs-5 right-icon">
                    <div class="row"> 
						<form class="navbar-form ">
							<div class="form-group" style="margin-bottom:0px;">
								<input type="text" class="form-control form-control-ser" placeholder="Search">
							</div>
							<button type="submit" class="btn btn-link ser-icon"><span class="glyphicon glyphicon-search"></span></button>
						</form>
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Help">
							<img src="<?php echo $theme_url?>/images/help1.png" width="23" height="21" class="">
                            <ul class="dropdown-menu" style=" min-width:160px;">
                                <li><a href="#">Quotations</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Track order">
								<img src="<?php echo $theme_url?>/images/truck.png" width="27" height="21" class="">
                            <ul class="dropdown-menu" style=" min-width:160px;">
                                <li><a href="#">Track Order</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cart">
							<img src="<?php echo $theme_url?>/images/shoping.png" width="27" height="21" class="">
                            <ul class="dropdown-menu" style="margin-left:-90px; min-width:160px;">
                                <li><a href="#">My Cart (0)</a></li>
                            </ul>
                        </div>
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Sign in">
							<img src="<?php echo $theme_url?>/images/user.png" width="17" height="21" class="">
							</a>
                            <ul class="dropdown-menu" style="margin-left:-110px; min-width:160px;">
                                <?php if($this->session->userdata('uid') && $this->session->userdata('user_type') ){?>
                                <li><a href="<?php echo site_url()."customer/profile";?>">Dashboard</a></li>
								<li><a href="<?php echo site_url()."pages/logout";?>">Logout</a></li> 
								<?php } else{?>
                                <li><a href="<?php echo site_url()."pages/signIn";?>">Sign in</a></li>
								<?php }?>
                            </ul>
                        </div>
                        <div class="btn-group" style="padding-right: 19px;">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Links">
								<img src="<?php echo $theme_url?>/images/lins.png" width="17" height="21" class="">
							</a>
                            <ul class="dropdown-menu" style="margin-left:-130px; min-width:160px;">
                                <b style="padding-left:15px;">My Teranex</b>
                                <li role="separator" class="divider"></li>
                                <li><a href="#">Payment Options</a></li>
                                <li><a href="#">Refer & Earn</a></li>
                            </ul>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                
            </div>
            <!-- /.navbar-collapse -->
            <!-- </div> -->
            <!-- /.container-fluid -->
        </nav>
    </div>