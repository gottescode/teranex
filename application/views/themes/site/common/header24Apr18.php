<div class="navbar-fixed-top">
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
                <a class="navbar-brand" style="padding-left: 0;" href="<?php echo site_url()?>">
					<img src="<?php echo $theme_url?>/images/logo20.jpg" class="img-responsive">
				</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <div class="ipad-menu ipro-menu">
                    <div class="menu-center">
                        <ul class="nav navbar-nav navbar-nav-ex">
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
                                                <h5>Community</h5>
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
                            <li> <a href="#">Community</a></li>
                            <li> <a href="#">eAcademy</a></li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Research & Analytics<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="coming_soon.php">Market Research</a></li>
                                  <li><a href="coming_soon.php">Analytics</a></li>
                                  <li><a href="coming_soon.php">Consulting</a></li>
                                </ul>
                            </li>
                        </ul> 
                    </div>
                </div>
                <div class="menu-right-icon">
					<form class="navbar-form menu-ico-mar">
					  <div class="form-group" style="margin-bottom:0px;">
						<input type="text" class="form-control form-control-ser" placeholder="Search" />
						<button type="submit" class="btn btn-link ser-icon"><span class="glyphicon glyphicon-search"></span></button>
					  </div>
					</form>
                    <div class="btn-group-ico"> 
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Cart">
							<img src="<?php echo $theme_url?>/images/shoping.png" width="27" height="21" class=""></a>
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
                        <div class="btn-group">
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
                    </div>
                </div>
            </div>
        </nav>
	 </div>
<div class="clearfix"></div>
</div>