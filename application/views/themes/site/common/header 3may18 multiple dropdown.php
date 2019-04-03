		
<?php $this->template->contentBegin(POS_TOP);?> 
<?php echo $this->template->contentEnd();?> 

<div class="navbar-fixed-top">
    <div class="container padd-0">
        <nav id="navigation" class="navbar navbar-default navbar-ex">
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
			<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="ipad-menu ipro-menu">
					<div class="menu-center">
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
							   <img src="<?php echo $theme_url?>/images/user.png" width="17" height="21" class="">
							   </a>
							   <ul class="dropdown-menu" style="margin-left:-110px; min-width:160px;">
								  <?php if($this->session->userdata('uid') && $this->session->userdata('user_type')){ ?>
								  <li><a href="<?php echo site_url()."customer/profile";?>">Dashboard</a></li>
								  <li><a href="<?php echo site_url()."pages/logout";?>">Logout</a></li>
								  <?php } else{ ?>
								  <li><a href="<?php echo site_url()."pages/signIn";?>">Sign in</a></li>
								  <?php } ?>
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
						<div class="navbar1">
							<ul class="nav navbar-nav">
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Marketplace <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Machines & Supplies <b class="caret"> </b> </a>
											<ul class="dropdown-menu">
												<li><a href="<?php echo site_url()?>machine" target="_blank">Machines</a></li>
												<li><a href="<?php echo site_url()?>ecommerce/product-category/spare-parts" target="_blank">Spares</a></li>
												<li><a href="<?php echo site_url();?>ecommerce/product-category/toolings/" target="_blank">Toolings</a></li>
												<li><a href="<?php echo site_url()?>pages/digital_manufacturing" target="_blank">Digital Manufacturing</a></li>
											</ul>
										</li>
										<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Remote Services <b class="caret"></b></a>
											<ul class="dropdown-menu">
												<li><a target="_blank" href="<?php echo site_url();?>eacademy">Remote Tranning</a></li>
												<li><a href="<?php echo site_url()?>consultant" target="_blank">Remote Machine Service</a></li>
												<li><a href="<?php echo site_url()?>consultant/remoteapp_service" target="_blank">Remote Application Consulting</a></li>
												<li><a target="_blank" href="<?php echo site_url();?>remoteprogramming">Remote Programming</a></li>
											</ul>
										</li>
										<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">collaboration Services <b class="caret"> </b> </a>
											<ul class="dropdown-menu">
												<li><a target="_blank" href="<?php echo site_url();?>community/forum">user communities </a></li>
												<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">group buying </a></li>
												<li><a target="_blank" href="<?php echo site_url();?>mediacenter">media center</a></li>
												<li><a target="_blank" href="<?php echo site_url();?>events">live events</a></li>
											</ul>
										</li>
									</ul>
								</li>
								
								<li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Market Intelligence <b class="caret"></b></a>
									<ul class="dropdown-menu">
										<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Market Research</a></li>
										<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Business Analytics</a></li>
										<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon">Consulting</a></li>
									</ul>
								</li>
								<li> <a href="<?php echo site_url()?>eacademy" target="_blank">eAcademy</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<div class="clearfix"></div>
	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script>
	$(document).ready(function() {
		
    $('.navbar1 a.dropdown-toggle').on('click', function(e) {
		var $el = $(this);
        var $parent = $(this).offsetParent(".dropdown-menu");
        $(this).parent("li").toggleClass('open');

        if(!$parent.parent().hasClass('nav')) {
            $el.next().css({"top": $el[0].offsetTop, "left": $parent.outerWidth() - 4});
        }

        $('.nav li.open').not($(this).parents("li")).removeClass("open");

        return false;
    });
});
</script>

<?php $this->template->contentEnd();	?> 