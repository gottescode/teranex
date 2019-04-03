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
                  <div class="menu-right-icon">
                     <form class="navbar-form menu-ico-mar">
                        <div class="form-group" style="margin-bottom:0px;">
                           <input type="text" class="form-control form-control-ser" placeholder="Search" />
                           <button type="submit" class="btn btn-link ser-icon"><span class="glyphicon glyphicon-search"> </span> </button>
                        </div>
                     </form>
                     <div class="btn-group-ico">
                        <div class="btn-group dropdown">
                           <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Sign in">
                           <img src="<?php echo $theme_url?>/images/user.png" width="17" height="21" class="">
                           </a>
                           <ul class="dropdown-menu dropdown-menu-right ddl-user mob-ddl">
                              <?php if($this->session->userdata('uid') && $this->session->userdata('user_type')){ ?>
                              <li><a href="<?php echo site_url()."customer/profile";?>">Dashboard</a></li>
                              <li><a href="<?php echo site_url()."pages/logout";?>">Logout</a></li>
                              <?php } else{ ?>
                              <li><a href="<?php echo site_url()."pages/signIn";?>">Sign in</a></li>
                              <?php } ?>
                              <li class="divider"></li>
							  <li class="socialAcc">
								<div class="col-sm-12">
								<h5>Continue with:</h5>
								<a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
								<a target="_blank" href="https://twitter.com/TeranexRA"><i class="fa fa-twitter" aria-hidden="true"> </i> </a>
								<a target="_blank" href="https://www.linkedin.com/company/teranex-research-and-applications"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
								<a target="_blank" href="https://www.youtube.com/channel/UCNaXBz5Nz7bqYmNnIrUJVTw"><i class="fa fa-youtube" aria-hidden="true"></i></a>
								</div>
							  </li>
							  <li class="agreement"> 
								<div class="form-group">
									<div class="checkbox">
										<label class="full-width pull-left">
											<input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" checked disabled>I agree to Free Membership Agreement
										</label>
										<label class="full-width pull-left">
											<input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" checked disabled>I  agree to Receive Marketing Materials
										</label>
									</div>
								</div>
							  </li>
                              <li class="divider full-width pull-left"></li>
                              <li><a href="#">My Teranex</a></li>
                              <li><a href="#">Message Center</a></li>
                              <li><a href="#">Manage RFQ</a></li>
                              <li><a href="#">My Orders</a></li>
                              <li><a href="#">My Accounts</a></li>
                              <li class="divider"></li>
                              <li>
								<a class="full-width pull-left" href="#" >My Submit RFQ</a>
								<div class="col-sm-12 agreement">
									<label class="full-width pull-left">Get multiple quotes within 24 hours!</label>
								</div>
							  </li>
                           </ul>
                        </div>
                        <div class="btn-group dropdown">
                           <a class="dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Links">
                           <img src="<?php echo $theme_url?>/images/lins.png" width="17" height="21" class="">
                           </a>
                           <ul class="dropdown-menu ddl-menu">
                              <b style="padding-left:15px;">My Teranex</b>
                              <li role="separator" class="divider"></li>
                              <li><a href="#">Payment Options</a></li>
                              <li><a href="#">Refer & Earn</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <ul class="nav navbar-nav navbar-nav-ex">
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Marketplace <span class="caret"></span></a>
                        <ul class="dropdown-menu multi-column columns-2 dropdown-menu-right">
                           <div class="">
                              <div class="col-sm-6 padd-0">
                                 <ul class="multi-column-dropdown">
                                    <h5>Machines & Supplies</h5>
                                    <li class="divider"></li>
                                    <li><a href="<?php echo site_url()?>machine" target="_blank">Machines</a></li>
                                    <li><a href="<?php echo site_url()?>ecommerce/product-category/spare-parts" target="_blank">Spares</a></li>
                                    <li><a href="<?php echo site_url();?>ecommerce/product-category/toolings/" target="_blank">Toolings</a></li>
                                    <!--<li><a href="<?php echo site_url()?>pages/digital_manufacturing" target="_blank">Digital Manufacturing</a></li>-->
                                 </ul>
                              </div>
                              <div class="col-sm-6 padd-0">
                                 <ul class="multi-column-dropdown">
                                    <h5>Remote Services</h5>
                                    <li class="divider"></li>
                                    <li><a target="_blank" href="<?php echo site_url();?>eacademy">Remote Training</a></li>
                                    <li><a href="<?php echo site_url()?>consultant" target="_blank">Remote Machine Service</a></li>
                                    <li><a href="<?php echo site_url()?>consultant/remoteapp_service" target="_blank">Remote Application Consulting</a></li>
                                    <!--<li><a target="_blank" href="<?php echo site_url();?>remoteprogramming">Remote Programming</a></li>-->
                                 </ul>
                              </div>
                           </div>
                        </ul>
                     </li>
                     <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Market Intelligence<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a target="_blank" href="<?php echo site_url();?>research">Research</a></li>
                           <li><a target="_blank" href="<?php echo site_url();?>analytics">Analytics</a></li>
                           <li><a target="_blank" href="<?php echo site_url();?>consulting">Consulting</a></li>
                        </ul>
                     </li>
                     
					 <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="padding-right: 0px!important;">Collaboration<span class="caret"></span> </a>
                        <ul class="dropdown-menu">
                          <li><a target="_blank" href="<?php echo site_url();?>community/forum">Focus Groups</a></li>
                          <li><a target="_blank" href="<?php echo site_url();?>groupbuying">Buyer Groups</a></li>
                        </ul>
                     </li>
                  
                     <!-- <li class="dropdown hide ">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Market Intelligence<span class="caret"></span></a>
                        <ul class="dropdown-menu">
                           <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Research</a></li>
                           <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Analytics</a></li>
                           <li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Consulting</a></li>
                        </ul>
                     </li> -->
				  </ul>
               </div>
            </div>
         </div>
      </nav>
   </div>
   <div class="clearfix"></div>
</div>