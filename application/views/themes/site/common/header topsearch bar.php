 
<div class="navbar-fixed-top">

	<div class="container-fluid padd-0" style="background: #445268;">
			<div class="container padd-0" style="padding: 8px 0;">
				<div class="menu-right-icon">
					<form class="navbar-form menu-ico-mar">
					  <div class="form-group" style="margin-bottom:0px;">
						<input type="text" class="form-control form-control-ser" placeholder="Search" />
						<button type="submit" class="btn btn-link ser-icon"><span class="glyphicon glyphicon-search"></span></button>
					  </div>
					</form>
                    <div class="btn-group-ico"> 
                        <div class="btn-group">
                            <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Sign in">
							<img src="<?php echo $theme_url?>/images/user.png">
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
								<img src="<?php echo $theme_url?>/images/lins.png">
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
	</div>
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
                                                <li><a href="<?php echo site_url()?>machine" target="_blank">Machines</a></li>
                                                <li><a href="<?php echo site_url()?>spare-parts" target="_blank">Spares</a></li>
                                                <li><a href="<?php echo site_url();?>ecommerce/product-category/toolings/" target="_blank">Toolings</a></li>
                                                <li><a href="<?php echo site_url();?>ecommerce/product-category/software/" target="_blank">Software</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h5>Remote Services</h5>
                                                <li class="divider"></li>
                                                <li><a target="_blank" href="<?php echo site_url();?>remoteprogramming">Remote Programming</a></li>
                                                <li><a href="<?php echo site_url()?>consultant" target="_blank">Remote Machine Service</a></li>
                                                <li><a href="<?php echo site_url()?>consultant/remoteapp_service" target="_blank">Remote Application Service</a></li>
                                                <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Remote Monitoring & Control</a></li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4">
                                            <ul class="multi-column-dropdown">
                                                <h5>Production Services</h5>
                                                <li class="divider"></li>
                                                <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">fabrication services</a></li>
                                                <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">programming services</a></li>
                                                <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">3D printing services</a></li>
                                                <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">excess capacity utilization services</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Community<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a target="_blank" href="<?php echo site_url();?>community/forum">User Communities</a></li>
                                  <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Buyer Groups</a></li>
                                  <li><a target="_blank" href="<?php echo site_url();?>events">Industry Events</a></li>
                                </ul>
                            </li>
							<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Research & Analytics<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Market Research</a></li>
                                  <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Analytics</a></li>
                                  <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Consulting</a></li>
                                </ul>
                            </li>
							<li> <a href="<?php echo site_url()?>eacademy" target="_blank">eAcademy</a></li>
                            <li> <a href="<?php echo site_url()."mediacenter";?>" target="_blank">Media</a></li>
						</ul> 
                    </div>
                </div>
            </div>
        </nav>
	 </div>
<div class="clearfix"></div>
</div>