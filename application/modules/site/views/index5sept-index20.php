<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/Landingpage.css"/>
<style type="text/css">
	.padd_60{
		padding: 60px 0;
	}
	.padd_30{
		padding: 30px 0;
	}
	.tab-pd li i.fa-plus{
		margin-bottom: 55px;
	}
	.paralax-section1:after{
		z-index: -1;
		opacity: 0.5;
	}
	#carousel-example-generic a.testimonial-link img{
		width: auto;
		margin-top: -85px;
	}
	.hrline{
		border-top: 1px solid #a5c049!important;
	}	
	.mar-0{margin:0!important;}
	.counterbg{ background-image: url('<?php echo $theme_url?>/images/about-banner.jpg');
	    height: 100%;
	    width: 100%;
	    background-size: cover;}
		.slide-pre, .slide-next{display:none}
		nav#navigation.navbar.navbar-default.navbar-ex, .navbar-ex {
	    height: 0;
	    background: #fff0!important;
	}
	.circleDM {
	    display: inline-block;
	    border-right: 5px solid transparent;
	    border-left: 5px solid transparent;
	    border-bottom: 5px solid;
	    border-top: 5px solid;
	    border-radius: 0%;
	    background: #fff;
	    color: #fff;
	    margin-right: 10px;
	    margin-bottom: 5px;
	    margin-left: 4%;
	}
	.bx-wrapper, .bx-viewport {
	    height: 70px !important; 
	}
	@media screen and (max-width:480px){
		.bx-wrapper, .bx-viewport {
		    height: 90px !important; 
		}
	}
	.index_search .navbar-form{
		top: 30px;
	}

	.other-section-10 .tab-widget li>a{
		border-radius: 0;
		border-bottom: 1px solid #a5c049;
	}
	.explore-marketplace .tab-widget li{
		padding: 15px 30px;
	}
	.explore-marketplace .tab-widget li>a{
		margin:0 auto;
		border-radius: 0;
		background: #00000070;
		/*box-shadow: none;*/
		border-bottom: 1px solid #a5c049;
	}
	.explore-marketplace .tab-widget li>a:hover{
		color: #a5c049;
		background: #00000070;
		/*box-shadow: none;*/
	}
	.explore-marketplace .tab-widget li>a:hover ~ h3{
		color: #a5c049;
	}
	.sec-lr a{
		padding: 10px 0;
	}
	.ico-tiles div >div h3{
		font-size: 16px;
		/*min-height: 69px;*/
	}
	.slider .slide .substrate2 {
	    background: #000000b0;
	}
	p{
		font-size: 14px;
	}
/*css need to change for new effect*/
.ico-tiles div >div a img{
	height: 40px;
}
.ico-tiles div >div a div{
	margin-top: 20px;
}
.ico-tiles div >div:hover a img{
	transform: none;
	opacity: 0;
	transform: translateY(-66px);
}
.ico-tiles div >div:hover h3, .ico-tiles div >div:hover h3:before{
	transform: none;
	opacity: 0;
	transform: translateY(-66px);
}
.ico-tiles p{
	position: absolute;
    /*top: 66px;*/
    top: 25%;
    left: 0;
    padding: 10%;
    width: 100%;
    /*display: flex!important;*/
    opacity: 0;
}
.ico-tiles div >div:hover p{
opacity: 1;
}
.ico-tiles span{
	/*opacity: 0;*/
	text-align: center;
	color: #a5c049;
	display: block;
	/*position: absolute;
    top: */
}
/*.ico-tiles div >div:hover span{
	opacity: 1;
}*/
.ico-tiles div >div{
	/*box-shadow: 0 2px 10px 1px rgba(57,73,76,.4), 0 1px 2px rgba(57,73,76,.25);*/
	/*box-shadow: 0 1px 6px rgba(57,73,76,.35);*/
	box-shadow: 0 1px 6px rgba(57, 73, 76, 0.1);
	margin-bottom: 30px;
	margin-top: 0;
	padding: 0 15px;
}
.ico-tiles div >div:hover{
	box-shadow: 0 2px 10px 1px rgba(57,73,76,.4), 0 1px 2px rgba(57,73,76,.25);
}
</style>
<?php echo $this->template->contentEnd();?>
<div class="section container-fluid padd-0"  style="background-image: url('<?php echo $theme_url?>/images/consumables.jpg');background-repeat: no-repeat;
    background-size: 100% 100%;">
    <div class="slider" slide-interval="3000">
        <div class="slide active">
          
			<div class="substrate2"></div>
			<div class="slide-text2 typewriter">
				<div class="">
					<h1 class="typewriter1" style="color: #ccc;">TERANEX</h1>
					<h2 style="font-weight: normal;font-size: 36px;margin-top: 5px;color: #ccc;">an intelligent assistant for all your fabrication needs</h2>
					
					<div class="bxslider">
					 	
					  	<div><h2><span class="">
							 Connected. Unified. Accountable.
						</span></h2></div>
					</div>
					<div class="clearfix"></div>
					
					<div class="index_search">
						<form class="navbar-form menu-ico-mar" id="index_signup">
	                        <div class="form-group" style="margin-bottom:0px;">
	                           <input type="text" class="form-control form-control-ser" name="index_email" placeholder="Email id" style="background: #fff;" />
	                           <button type="submit" class="btn btn-link ser-icon">Sign Up</button>
	                        </div><div class="clearfix"></div>
	                    </form><div class="clearfix"></div>
					</div>
				</div>
            </div>
        </div>
    </div>
	
</div>
<section class="">
<div class=" sec-marketplace padd_30" style="margin-top: 0;padding: 20px 0;">
	<div class=""></div>
	<!-- <center class="pad-0-0-10" style="margin-bottom: 13px;"> -->
	<center class="pad-0-0-10" style="margin-bottom: 15px;">
		<h1 style="margin-top: 0px;margin-bottom: 15px;">Explore the Machine Market</h1>
		<ul class="feature" style="margin-bottom: 0;"><li>Live Sales Consultation</li><li>|</li><li>Live Machine Demo</li><li>|</li><li>Time Study</li><li>|</li><li>Software</li><li>|</li><li>Finance</li><li>|</li><li>Remote Services</li><li>|</li><li>Trade Assurance</li></ul>
	</center>
	<div class="container">
		<div class="col-sm-12" style="position: relative;" >
			<div class="col-sm-3 col-xs-12" style="border: 1px solid #e2e2e2;">
				<div class="ico-tiles">
				<center>
					<div class="row">
						<h2 style="font-size: 28px;">Collaborate</h2>
					</div>
				</center>
					<div class="">
						<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="<?php echo site_url();?>community/forum">
								<div>
									<img src="<?php echo $theme_url?>/css/marketplace/team.png">
								</div>
								   <h3>User Communities</h3>
								   <p>We provide access to a large user community for you to connect with prior.
								   	<br/><span style="">More >></span></p>
								   
							</a>
						</div>
						<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="<?php echo site_url();?>groupbuying">
							  	<div>
									<img src="<?php echo $theme_url?>/css/marketplace/teamwork.png">
							  	</div>
								   	<h3>Collective Buyers</h3>
								   	<p>Bringing buyers with similar needs together to work out cost effective.
								   	<br/><span style="">More >></span></p>
							</a>
						</div>
						<div class="col-sm-12 col-xs-12">
					        <a target="_blank" href="javascript:void(0)">
							  	<div>
									<img src="<?php echo $theme_url?>/css/marketplace/exchange-groups.png">
							  	</div>
						           	<h3>Exchange Groups</h3>
						           	<p>Benefit from a virtual warehouse of spare parts, trade excess capacities & share.
						           	<br/><span style="">More >></span></p>
					        </a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12" style="border: 1px solid #e2e2e2;border-left: 0;">
				<div class="ico-tiles">
					<!-- <div class="col-sm-4 col-xs-12" style="border-left: 1px solid #333;border-right: 1px solid #333;"> -->
					<center>
					  <div class="row">
						  <h2 style="font-size: 28px;">Source</h2>
						</div>
					</center>
					<div class="">
						<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="<?php echo site_url();?>machine">
								<div>
									<img src="<?php echo $theme_url?>/css/marketplace/machine.png">
								</div>
								<h3>Machines</h3>
								<p>Explore the range of new & used machines for your specific requirement.
								<br/><span style="">More >></span></p>
							</a>
						</div>
						<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="http://www.teranex.io/ecommerce/product-category/toolings/">
							  	<div>
									<img src="<?php echo $theme_url?>/css/marketplace/wrench.png">
							  	</div>
								   <h3>Toolings</h3>
								   <p>Choose from a variety of machine tools from different OEMS all under one roof.
								   <br/><span style="">More >></span></p>
							</a>
						</div>
						<div class="col-sm-12 col-xs-12">
						 	<a target="_blank" href="http://teranex.io/ecommerce/product-category/spare-parts/">
							  	<div>
									<img src="<?php echo $theme_url?>/css/marketplace/car-parts.png">
							  	</div>
								   <h3>Spares</h3>
								   <p>Brand new as well as used spare parts from a range of OEMs to choose from.
								   <br/><span style="">More >></span></p>
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12" style="border: 1px solid #e2e2e2;border-left: 0;">
				<div class="ico-tiles">
					<center>
					  <div class="row">
					        <h2 style="font-size: 28px;">Connect</h2>
					    </div>
					</center>
					<div class="">
					   	<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="<?php echo site_url();?>consultant">
							  	<div>
									<img src="<?php echo $theme_url?>/css/marketplace/television.png">
							  	</div>
								   <h3> Machine Service</h3>
								   <p>We can provide remote servicing of your machines at your convenience.
								   <br/><span style="">More >></span></p>
							</a>
					  	</div>
					  	<div class="col-sm-12 col-xs-12">
						  	<a target="_blank" href="<?php echo site_url();?>remoteapplication/">
							  	<div>
									<img src="<?php echo $theme_url?>/css/marketplace/training.png">
							  	</div>
								   <h3> Application Support</h3>
								   <p>Hassle-free remote application support is also provided.
								   <br/><span style="">More >></span></p>
							</a>
					  	</div>
					  	<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="<?php echo site_url();?>remotetraining">
							  	<div>
									<img src="<?php echo $theme_url?>/css/marketplace/eacadmy.png">
							  	</div>
								   	<h3>Training Courses</h3>
								   	<p>We can provide remote training services for the products. 
								   	<br/><span style="">More >></span></p>
							</a>
					  	</div>
					</div>
				</div>
			</div>
			<div class="col-sm-3 col-xs-12" style="border: 1px solid #e2e2e2;border-left: 0;">
				<div class="ico-tiles">
					<center>
					  <div class="row">
					        <h2 style="font-size: 28px;">Know</h2>
					    </div>
					</center>
					<div class="">
					   	<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="javascript:void(0)">
							  	<div>
									<img src="<?php echo $theme_url?>/images/icons/technical-service.png">
							  	</div>
								   	<h3> Market Intelligence</h3>
								   	<p>We can provide remote servicing of your machines at your convenience.
								   	<br/><span style="">More >></span></p>
							</a>
					  	</div>	
					  	<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="<?php echo site_url();?>pages/trade_services">
							  	<div>
									<img src="<?php echo $theme_url?>/images/icons/sell.png">
							  	</div>
								   	<h3> Trade Service</h3>
								   	<p>We can provide remote servicing of your machines at your convenience.
								   	<br/><span style="">More >></span></p>
							</a>
					  	</div>
					  	<div class="col-sm-12 col-xs-12">
							<a target="_blank" href="<?php echo site_url();?>pages/customer_services">
							  	<div>
									<img src="<?php echo $theme_url?>/images/icons/24-hours.png">
							  	</div>
								   	<h3> Customer Service</h3>
								   	<p>We can provide remote servicing of your machines at your convenience.
								   	<br/><span style="">More >></span></p>
							</a>
					  	</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div><div class="clearfix"></div>
</section>
<div class="clearfix"></div>

<div class="clearfix"></div>

<style type="text/css">
	@font-face {
	    font-family: SharpGrotesk-Thin25;
	    src: url('<?php echo $theme_url?>/fonts/SharpGrotesk-SemiBold20.otf');
	}
	@font-face {
	    font-family: Fabrica;
	    src: url('<?php echo $theme_url?>/fonts/Fabrica.otf');
	}
	.sw--width-full {
	    width: 100%;
	}
	.sw--width-full {
	    width: 100%;
	}
	.sw--position-relative {
	    position: relative;
	}
	.sw-grid-flex__cell-3-4 {
	    flex: 0 0 100%;
	}
	.sw-grid-flex {
	    display: flex;
	}
	.sw--text-white, .text-white {
	    color: white;
	}
	.sw-dms-panel-container-bg__design {
	    background-image: url('<?php echo $theme_url?>/images/factory-design1-min-dark.png');
	    height: 100%;
	    width: 100%;
	    background-size: cover;
	    position: absolute;
	}
	.sw-dms-panel-container-bg__make {
	    background-image: url('<?php echo $theme_url?>/images/factory-make1-min-dark.png');
	    height: 100%;
	    width: 100%;
	    background-size: cover;
	    position: absolute;
	}
	.sw-dms-panel-container-bg__sell {
	    background-image: url('<?php echo $theme_url?>/images/factory-sell1-dark.png');
	    height: 100%;
	    width: 100%;
	    background-size: cover;
	    position: absolute;
	    background-position-x: 65%;
	}
	.sw-dms-panel-container-bg {
	    -webkit-transition: opacity 1.3s ease-in-out;
	    transition: opacity 1.3s ease-in-out;
	    opacity: 0;
	}
	.sw-dms-panel {
	    height: 100vh;
	    -webkit-transition: background-image 0.6s ease-in-out;
	    transition: background-image 0.6s ease-in-out;
	}
	.sw-grid-flex__cell-1-3 {
	    flex: 0 0 33.33%;
	    height: 450px;
	   /* flex: 0 0 44.46%;*/
	}
	.sw-design-panel__bg {
	    background-image: url('<?php echo $theme_url?>/images/factory-design1-min.jpg');
	    height: 100%;
	    -webkit-transition: opacity 0.9s ease-in-out;
	    transition: opacity 0.9s ease-in-out;
	}
	.sw-make-panel__bg {
	    background-image: url('<?php echo $theme_url?>/images/factory-make1-min.jpg');
	    -webkit-transition: opacity 0.9s ease-in-out;
	    transition: opacity 0.9s ease-in-out;
	}
	.sw-sell-panel__bg {
	    background-image: url('<?php echo $theme_url?>/images/factory-sell1-min.png');
	    -webkit-transition: opacity 0.9s ease-in-out;
	    transition: opacity 0.9s ease-in-out;
	}
	.sw-bg-panel {
	    -webkit-transition: opacity 1s ease-in-out;
	    transition: opacity 4s ease-in-out;
	    opacity: 1;
	    height: 100%;
	    width: 100%;
	    background-size: cover;
	}
	.sw-dms-panel__inner-div {
	    top:10%;
	}
	.sw-dms-panel__inner-div p{
		font-family: 'Fabrica';
	}
	.sw--padding-hor-7 {
	    padding-left: 35px;
	    padding-right: 35px;
	}
	.sw--margin-bottom-7 {
	    margin-bottom: 35px;
	}
	.sw--font-size-18 {
	   /* font-size: 1.286rem;*/
	}
	.sw--position-absolute, .sw--ratio__img {
	    position: absolute;
	}
	@media (max-width: 1440px) and (min-width: 1024px){
		.sw-dms__text--responsive {
		    font-size: calc(30px + (46 - 30) * ((100vw - 1024px) / (1440 - 1024)));
		}
	}
	.sw--margin-bottom-1 {
	    /*margin-bottom: 5px;*/
	    margin-bottom: 10px;
	}
	.sw-dms-panel__inner-div__main-text {
	    opacity: 0;
	    -webkit-transition: opacity 1s ease-in-out;
	    transition: opacity 1s ease-in-out;
	}
	.sw--margin-top-1 {
	    margin-top: 5px;
	}
	.sw--margin-top-5 {
	    margin-top: 25px;
	}
	.sw--margin-bottom-5 {
	    margin-bottom: 25px;
	}
	@media (min-width: 769px){
		.hide-desktop, .sw--hide-desktop {
		    display: none !important;
		}
	}
	.sw-make-panel__left-border {
	    border-left: 1px solid white;
	    position: absolute;
	    top: 0%;
	    bottom: 0%;
	    left: 0;
	    opacity: 0.5;
	}
	.sw-make-panel__right-border {
	    border-left: 1px solid white;
	    position: absolute;
	    top: 0%;
	    bottom: 0%;
	    right: 0;
	    opacity: 0.5;
	}
	.sw--text-white, .text-white{
		color: #fff;
	}
	.text-white h2{
		color: #fff !important;
		font-family: 'SharpGrotesk-Thin25';
	}
	.factory_ul li{
		text-align: center;
	    display: inline-block;
	    width: 30%;
	}
	.factory_ul li h3{
		font-family: 'Fabrica';
	}
	.factory_ul li a {
		background: #00000070;
	    border-bottom: 1px solid #a5c049;
	    /*width: 80px;
	    height: 80px;*/
	    padding: 30px 0;
	    color: #fff;
	    /*border-radius: 50%;*/
	    font-size: 30px;
	    background-color: #00000070;
	    box-shadow: 0 7px 22px rgba(19, 19, 19, 0.5);
	}
	.factory_ul li a:hover ~ h3, .factory_ul li a:active ~ h3, .factory_ul li a:focus ~ h3{
	color: #a5c049;
	}
	.factory_ul li a:hover, .factory_ul li a:active, .factory_ul li a:focus{
	color: #a5c049;
	}
	/*MACADEMY CSS*/
	.sw-dms-panel-container-bg__design.macademy_sw-dms-panel-container-bg__design {
	    background-image: url('<?php echo $theme_url?>/images/build-min-dark.png');
	    height: 100%;
	    width: 100%;
	    background-size: cover;
	    position: absolute;
	}
	.sw-dms-panel-container-bg__make.macademy_sw-dms-panel-container-bg__make {
	    background-image: url('<?php echo $theme_url?>/images/factory-make1-min-dark.png');
	    height: 100%;
	    width: 100%;
	    background-size: cover;
	    position: absolute;
	}
	.sw-dms-panel-container-bg__sell.macademy_sw-dms-panel-container-bg__sell {
	    background-image: url('<?php echo $theme_url?>/images/learn-brain-new-dark-min.png');
	    height: 100%;
	    width: 100%;
	    background-size: cover;
	    position: absolute;
	    background-position-x: 65%;
	}
	.sw-design-panel__bg.macademy_sw-design-panel__bg {
	    background-image: url('<?php echo $theme_url?>/images/build-min1.jpg');
	    height: 100%;
	    -webkit-transition: opacity 0.9s ease-in-out;
	    transition: opacity 0.9s ease-in-out;
	}
	.sw-make-panel__bg.macademy_sw-make-panel__bg {
	    background-image: url('<?php echo $theme_url?>/images/factory-make-min-min.jpg');
	    -webkit-transition: opacity 0.9s ease-in-out;
	    transition: opacity 0.9s ease-in-out;
	}
	.sw-sell-panel__bg.macademy_sw-sell-panel__bg {
	    background-image: url('<?php echo $theme_url?>/images/learn-new-brain1.jpg');
	    -webkit-transition: opacity 0.9s ease-in-out;
	    transition: opacity 0.9s ease-in-out;
	}
</style>
<div>
	<center>
		<h1 style="margin: 10px 0;text-transform: inherit;">On-demand eFactory</h1>
		<ul class="feature" style="margin-bottom: 20px;"><li>Learn To Build Products. Design Products. Make Products.</li></ul>
	</center>
</div>


<div class="clearfix"></div>
<div class="sw-dms-section sw-grid-flex sw--width-full sw-grid-flex--wrap--mob sw-grid-flex--wrap--tab sw-dms-flex--nowrap--mob-landscape text-white">
	<div data-sw-dms-panel-container class="sw-dms-panel-container sw--text-white sw-grid-flex sw-grid-flex__cell-3-4 sw-grid-flex__cell-1-1--mob sw-grid-flex__cell-1-1--tab sw-dms-flex__cell-3-4--mob-landscape sw-grid-flex--wrap--mob sw-grid-flex--wrap--tab sw-dms-flex--nowrap--mob-landscape sw--position-relative" style="width: 100%;">
		<div data-sw-dms-panel-container-bg="design" class="sw-dms-panel-container-bg sw-dms-panel-container-bg__design macademy_sw-dms-panel-container-bg__design"></div>
		<div data-sw-dms-panel-container-bg="make" class="sw-dms-panel-container-bg sw-dms-panel-container-bg__make macademy_sw-dms-panel-container-bg__make"></div>
		<div data-sw-dms-panel-container-bg="sell" class="sw-dms-panel-container-bg sw-dms-panel-container-bg__sell macademy_sw-dms-panel-container-bg__sell"></div>
		<div data-sw-dms-panel="sell" class="sw-dms-panel sw-dms-panel--tab-xl sw-dms-panel--mob-tab sw-dms-panel--mob-xs sw-sell-panel sw-sell-panel--mob-tab sw-grid-flex__cell-1-3 sw-grid-flex__cell-1-1--mob sw-grid-flex__cell-1-1--tab sw-dms-flex__cell-1-3--mob-landscape sw--position-relative factory_sell" id="">
			<div class="sw-sell-panel__bg macademy_sw-sell-panel__bg sw-bg-panel sw-bg-panel--mob-tab"></div>
			<div class="sw-dms-panel__inner-div sw-dms-panel__inner-div--tab sw-dms-panel__inner-div--mob sw--position-absolute sw--padding-hor-7">
				<h2 class="sw--margin-bottom-1 sw-dms-panel-header sw-dms-panel-header--big sw-dms__text--responsive sw-dms__text--responsive-small sw-dms-panel-header--mob sw-dms-panel-headerâ-tab sw--font-family-sharp-grotesque" style="color: #fff;">Learn</h2>
				<p class="sw--font-size-18 sw-dms-panel-sub-header sw-dms-panel-sub-headerâ-tab sw-dms-panel-sub-header--mob sw--margin-bottom-7" style="color: #fff;">Do more business,<br> more easily.</p>
				<a data-creator-choice-button="/img/rrstatic/sell.img" class="sw--uppercase sw--hide-mobile sw--hide-tablet sw-dms-button sw-dms-button--red sw-dms-button--big sw--margin-bottom-5 btn btn_orange" href="<?php echo site_url();?>remotetraining/online_courses">START A PROJECT</a><div class="clearfix"></div>
				<p class="sw--margin-top-1 sw-dms-panel__inner-div__main-text sw-dms-panel__inner-div__main-text--tab sw-dms-panel__inner-div__main-text--mob-tab" style="color: #fff;">Outsource your fulfillment with a simple connection to our platform. Services include: ordering, manufacturing, assembly, custom packaging, and shipping.</p>
				<a data-creator-choice-button="/img/rrstatic/sell.img" class="sw--uppercase sw--hide-desktop sw-dms-button sw-dms-button--red sw-dms-button--big sw--margin-top-5 btn btn_orange" href="<?php echo site_url();?>remotetraining/online_courses">START A PROJECT</a>
			</div>
		</div>
		<div data-sw-dms-panel="design" class="sw-dms-panel sw-dms-panel--tab-xl sw-dms-panel--mob-tab sw-dms-panel--mob-xs sw-design-panel sw-design-panel--mob-tab sw-grid-flex__cell-1-3 sw-grid-flex__cell-1-1--mob sw-grid-flex__cell-1-1--tab sw-dms-flex__cell-1-3--mob-landscape sw--position-relative factory_design" id="">
			<div class="sw-design-panel__bg macademy_sw-design-panel__bg sw-bg-panel sw-bg-panel--mob-tab"></div>
			<div class="sw-dms-panel__inner-div sw-dms-panel__inner-div--tab sw-dms-panel__inner-div--mob sw--position-absolute sw--padding-hor-7">
				<h2 class="sw--margin-bottom-1 sw-dms-panel-header sw-dms__text--responsive sw-dms__text--responsive-small sw-dms-panel-header--big sw-dms-panel-header--mob sw-dms-panel-headerâ-tab sw--font-family-sharp-grotesque" style="color: #fff;">Design</h2>
				<p class="sw--font-size-18 sw-dms-panel-sub-header sw-dms-panel-sub-headerâ-tab sw-dms-panel-sub-header--mob sw--margin-bottom-7" style="color: #fff;">Design your product<br> with us.</p>
				<a data-creator-choice-button="/img/rrstatic/design.img" class="sw--uppercase sw--hide-mobile sw--hide-tablet sw-dms-button sw-dms-button--red sw-dms-button--big sw--margin-bottom-5 btn btn_orange" href="javascript:void(0);">START A PROJECT</a><div class="clearfix"></div><!-- <?php echo site_url()."remotetraining/online_courses";?> -->
				<p class="sw--margin-top-1 sw-dms-panel__inner-div__main-text sw-dms-panel__inner-div__main-text--tab sw-dms-panel__inner-div__main-text--mob-tab" style="color: #fff;">
					Work with a skilled product designer to turn your ideas into real products. We can start from scratch or evolve a product for on-going 3D-printed manufacturing.
				</p>
				<a data-creator-choice-button="/img/rrstatic/design.img" class="sw--uppercase sw--hide-desktop sw-dms-button sw-dms-button--red sw-dms-button--big sw--margin-top-5 btn btn_orange" href="javascript:void(0);">START A PROJECT</a>
			</div>
		</div>
		<div data-sw-dms-panel="make" class="sw-dms-panel sw-dms-panel--tab-xl sw-dms-panel--mob-tab sw-dms-panel--mob-xs sw-make-panel sw-make-panel--mob-tab sw-grid-flex__cell-1-3 sw-grid-flex__cell-1-1--mob sw-grid-flex__cell-1-1--tab sw-dms-flex__cell-1-3--mob-landscape sw--position-relative factory_make" id="">
			<div class="sw-make-panel__left-border sw-make-panel-border sw--is-hidden"></div>
			<div class="sw-make-panel__right-border sw-make-panel-border sw--is-hidden"></div>
			<div class="sw-make-panel__bg macademy_sw-make-panel__bg sw-bg-panel sw-bg-panel--mob-tab"></div>
			<div class="sw-dms-panel__inner-div sw-dms-panel__inner-div--tab sw-dms-panel__inner-div--mob sw--position-absolute sw--padding-hor-7">
				<h2 class="sw--margin-bottom-1 sw-dms-panel-header sw-dms-panel-header--big sw-dms__text--responsive sw-dms__text--responsive-small sw-dms-panel-header--mob sw-dms-panel-headerâ-tab sw--font-family-sharp-grotesque" style="color: #fff;">Produce</h2>
				<p class="sw--font-size-18 sw-dms-panel-sub-header sw-dms-panel-sub-headerâ-tab sw-dms-panel-sub-header--mob sw--margin-bottom-7" style="color: #fff;">Industrial 3D printing,<br> scaled for you.</p>
				<a data-creator-choice-button="/img/rrstatic/make.img" class="sw--uppercase sw--hide-mobile sw--hide-tablet sw-dms-button sw-dms-button--red sw-dms-button--big sw--margin-bottom-5 btn btn_orange" href="<?php echo site_url();?>digitalmanufacturing/" target="_blank">START A PROJECT</a><div class="clearfix"></div>
				<p class="sw--margin-top-1 sw-dms-panel__inner-div__main-text sw-dms-panel__inner-div__main-text--tab sw-dms-panel__inner-div__main-text--mob-tab" style="color: #fff;">We manufacture high-quality, affordable products in 40 of the best materials and finishes, from plastics to metals. Upload for an instant quote or contact us to co-develop a solution for unique products.</p>				
				<a data-creator-choice-button="/img/rrstatic/make.img" class="sw--uppercase sw--hide-desktop sw-dms-button sw-dms-button--red sw-dms-button--big sw--margin-top-5 btn btn_orange" href="<?php echo site_url();?>digitalmanufacturing/" target="_blank">START A PROJECT</a>
			</div>
		</div>
		
	</div>
</div>
<div class="clearfix"></div>
<style type="text/css">
	body,html{-webkit-font-smoothing:antialiased;-moz-font-smoothing:antialiased;-ms-font-smoothing:antialiased;-o-font-smoothing:antialiased;font-smoothing:antialiased;text-rendering:optimizeLegibility}
	.slider_plan h2{font-weight:500;margin-bottom:40px}
	.packages{background:#181818;padding:60px 40px;text-align:center;color:#fff;-webkit-font-smoothing:antialiased;-moz-font-smoothing:antialiased;-ms-font-smoothing:antialiased;-o-font-smoothing:antialiased;font-smoothing:antialiased;text-rendering:optimizeLegibility}
	.packages h2{font-weight:700;margin:0 0 45px}
	.package-heading{font-weight:700;font-size:26px;margin-bottom:10px;color: #000;}
	.package-heading1{font-weight:700;font-size:26px;margin-bottom:10px;color: #000;}
	.packages-slider{display:flex;align-items:center}
	.package-wrapper{transition:.5s flex ease-in-out;margin:0 10px;height:24vw;max-height:450px;background:#f9f9f9;position:relative;overflow:hidden;/*box-shadow:0 20px 27px -14px rgba(0,0,0,.35)*/}
	.package-wrapper:first-child{margin-left:0}
	.package-wrapper:last-child{margin-right:0}
	.package-wrapper.swapactive{background-color:#f9f9f9;}
	.package-wrapper.swapactive .package>p{display:none}
	.package-initial,.package-expanded{text-align:center;color:#eee;display:flex;align-items:center;justify-content:center;flex-direction:column;height:100%;width:100%}
	.package-initial{transition:.5s opacity ease-in-out}
	.package-initial h2,.package-expanded h2{font-weight:700}
	.package-initial p,.package-expanded p{color:#999}
	.package-initial img{max-height:80px;margin-bottom:20px}
	.package-expanded h3{font-weight:700;font-size:18px;color: #000;}
	.package-expanded{display:none;opacity:0;background:#f9f9f9;transition:.3s opacity ease-in-out;position:absolute;top:0;left:0;right:0;bottom:0}
	.package-wrapper.swapactive .package-expanded{display:block;opacity:1;transition:.5s opacity ease-in-out}
	.packages-slider.swapactive .package-initial{opacity:.4;padding-left:20px;padding-right:20px}
	.packages-slider.swapactive .package-initial h2,.packages-slider.swapactive .package-initial p{display:none;}
	.packages-slider.swapactive .package-initial img{filter:grayscale(100%)}
	.packages-slider.swapactive .package-initial .package-heading{display:none;}
	.package-expanded--content{display:flex}
	.package-expanded--content>div{padding:10px;flex:1}
	.package-expanded--content img{max-height:36px;margin-bottom:20px;object-fit:contain}
	.package-expanded--content p{font-weight:300;font-size:14px;margin-bottom:0}
	.package-expanded--cta{margin-top:20px}
	@media screen and (min-width:1024px){
		.package-wrapper.swapactive{flex:8}
		.package-wrapper{flex:1}
	}
	@media screen and (max-width:1200px) and (min-width:1024px){
		.package-wrapper{margin:0 10px}
		.package-wrapper.swapactive{height:500px;max-height:unset}
	}
	@media screen and (max-width:1023px){
		.packages-slider{flex-direction:column}
		.package-wrapper{margin:0 0 40px;width:100%;height:520px;max-height:520px}
		.package-expanded{opacity:1}
		.package-expanded--content{flex-direction:column;text-align:left}
		.package-expanded--content div>div{display:flex;align-items:center;flex:0 0 200px;padding-right:20px}
		.package-expanded--content>div{display:flex;flex:1;align-items:center;border-bottom:1px solid #444;height:80px}
		.package-expanded--content img{max-width:25px;margin-bottom:0;margin-right:10px}
		.package-expanded--content h3{margin:0;font-size:14px}
		.package-initial,.package-expanded{padding:25px}
	}
	@media screen and (max-width:768px){
		.package-wrapper.swapactive{height:600px;max-height:600px}
		.package-expanded--content>div{height:110px}
		.package-expanded--content div>div{flex:0 0 150px}
		.package-expanded--content p{font-size:12px}
	}
	@media screen and (max-width:480px){
		.package-wrapper,.package-wrapper.swapactive{height:450px;max-height:450px}
		.package-expanded--content>div{height:100%;flex-direction:column}
		.package-expanded--content div>div{flex:1;margin-bottom:10px;flex-direction:column;padding-right:0}
		.package-expanded--content img{margin-right:0}
		.package-expanded--content p{display:none}
		.package-expanded--content h3{text-align:center}
		}
		.pulse{display:block;margin:0 auto;width:22px;height:22px;border-radius:50%;background:#999;cursor:pointer;animation:pulse 1.5s infinite}@-webkit-keyframes pulse {
	    0% {
	        -webkit-box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
	        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
	    }
	    70% {
	        -webkit-box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
	        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
	    }
	    100% {
	        -webkit-box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
	        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
	    }
	}@keyframes pulse {
	    0% {
	        -moz-box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
	        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0.4);
	    }
	    70% {
	        -moz-box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
	        box-shadow: 0 0 0 10px rgba(255, 255, 255, 0);
	    }
	    100% {
	        -moz-box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
	        box-shadow: 0 0 0 0 rgba(255, 255, 255, 0);
	    }
	}
</style> 

<!-- <div class="">
	<center> 
		 <h1 class="" >Information Services</h1>
		
		<div class="clearfix"></div>
	</center>
	<div class="packages-slider">
		<div class="package-wrapper"> 
			<div class="package-initial">
				<img src="<?php echo $theme_url?>/images/icons/technical-service.png"/>
				<div class="package-heading">Market Services</div>
				<p>Grow your skills and advance your career</p> 
				<a href="" class="btn btn_orange clickmore" id="">More</a>
			</div> 
			<div class="package-expanded"> 
				<div class="package-heading">Market Services</div> <br/>
				<div class="package-expanded--content"> 
					<div>
						<a target="_blank" href="<?php echo site_url();?>research/">
						<div>
							<img src="<?php echo $theme_url?>/css/marketplace/research1.png"/> 
							<h3>Research</h3> 
						</div> 
						<p>Develop your skills with 6,000+ expert-led courses across hundreds of topics.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="<?php echo site_url();?>analytics/">
						<div>
							<img src="<?php echo $theme_url?>/css/marketplace/analytics1.png"/> 
							<h3>Monitoring</h3> 
						</div> 
						<p>Build on your proficiency by knowing which courses to watch in which order,with course work curated by experts.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="<?php echo site_url();?>events/">
						<div>
							<img src="<?php echo $theme_url?>/css/marketplace/calendar.png"/> 
							<h3>Events</h3> 
						</div> 
						<p>Measure your skill level with confidence in as little as 20 questions and five minutes.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="http://teranex.io/mediacenter/category/media/">
						<div>
							<img src="<?php echo $theme_url?>/css/marketplace/newspaper1.png"/> 
							<h3>Industry News</h3> 
						</div> 
						<p>Measure your skill level with confidence in as little as 20 questions and five minutes.</p> 
						</a>
					</div> 
				</div> 
				
			</div> 
		</div> 
		<div class="package-wrapper"> 
			<div class="package-initial">
				<img src="<?php echo $theme_url?>/images/icons/24-hours.png"/> 
				<div class="package-heading">Customer Services</div> 
				<p>Prepare your team and maximize your efforts</p> 
				<a href="" class="btn btn_orange clickmore" id="">More</a>
			</div> 
			<div class="package-expanded"> 
				<div class="package-heading">Customer Services</div> <br/>
				<div class="package-expanded--content"> 
					<div> 
						<a target="_blank" href="<?php echo site_url()."footer/submitAdispute";?>">
						<div>
							<img src="<?php echo $theme_url?>/images/icons/auction.png"/> 
							<h3>Submit a Dispute</h3> 
						</div> 
						<p>Prepare for professional certifications with industry-leading practice exams.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="<?php echo site_url()."pages/ReportAbuse";?>">
						<div>
							<img src="<?php echo $theme_url?>/images/icons/analysis.png"/> 
							<h3><span>Report Abuse</span></h3> 
						</div> 
						<p>View usage,hours spent learning and a leaderboard of your top members.</p> 
						</a>
					</div> 
					<div>
						<a target="_blank" href="javascript:void(0);"> 
						<div>
							<img src="<?php echo $theme_url?>/images/icons/headset.png"/> 
							<h3>Pay Later</h3> 
						</div> 
						<p>Combine sections of different courses or paths to create a custom learning plan aligned to your team goals.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="<?php echo site_url()."pages/getPaidForYourFeedback";?>">
						<div>
							<img src="<?php echo $theme_url?>/images/icons/rating.png"/> 
							<h3>Get Paid for Feedback</h3> 
						</div> 
						<p>Combine sections of different courses or paths to create a custom learning plan aligned to your team goals.</p> 
						</a>/
					</div> 
					
				</div> 
			</div> 
		</div> 
		<div class="package-wrapper"> 
			<div class="package-initial">
				<img src="<?php echo $theme_url?>/images/icons/sell.png"/> 
				<div class="package-heading">Trade Services</div> 
				<p>Measure progress toward business objectives</p> 
				<a href="" class="btn btn_orange clickmore" id="">More</a>
			</div> 
			<div class="package-expanded"> 
				<div class="package-heading">Trade Services</div> <br/>
				<div class="package-expanded--content"> 
					<div> 
						<a target="_blank" href="<?php echo site_url()."footer/tradeAssurance";?>">
						<div>
							<img src="<?php echo $theme_url?>/images/icons/money.png"/> 
							<h3>Trade Assurance</h3> 
						</div> 
						<p>Measure progress towards business objectives by ensuring employees are completing assigned content and courses.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="<?php echo site_url()."footer/businessIdentity";?>">
						<div>
							<img src="<?php echo $theme_url?>/images/icons/id-card.png"/> 
							<h3>Business Identity</h3> 
						</div> 
						<p>See individual skill levels and topic-level insights to understand current proficiency and put the right people on the right projects.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="<?php echo site_url()."footer/inspectionService";?>">
						<div>
							<img src="<?php echo $theme_url?>/images/icons/inspection.png"/> 
							<h3><span>Inspection Service</span></h3> 
						</div> 
						<p>Streamline your team&#39;s experience by giving learners a single username and password to access Pluralsight.</p> 
						</a>
					</div> 
					<div> 
						<a target="_blank" href="<?php echo site_url()."footer/securePayment";?>">
						<div>
							<img src="<?php echo $theme_url?>/images/icons/payment-security.png"/> 
							<h3><span>Secure Payment</span></h3> 
						</div> 
						<p>Streamline your team&#39;s experience by giving learners a single username and password to access Pluralsight.</p> 
						</a>/
					</div> 
					
				</div> 
			</div> 
		</div> 
	</div>
</div> -->

<div class="clearfix"></div><br/>


<div class="clearfix"></div>

<div class="clearfix"></div>
<style type="text/css">
	.bmd-modalButton {
  display: block;
  margin: 15px auto;
  padding: 5px 15px;
}

.close-button {
  overflow: hidden;
}

.bmd-modalContent {
  box-shadow: none;
  background-color: transparent;
  border: 0;
}
  
.bmd-modalContent .close {
  font-size: 30px;
  line-height: 30px;
  padding: 7px 4px 7px 13px;
  text-shadow: none;
  opacity: .7;
  color:#fff;
}

.bmd-modalContent .close span {
  display: block;
}

.bmd-modalContent .close:hover,
.bmd-modalContent .close:focus {
  opacity: 1;
  outline: none;
}

.bmd-modalContent iframe {
  display: block;
  margin: 0 auto;
}
</style>
<section class="testimonial" style="background:#f9f9f9;padding-bottom: 30px;">
	<div class=" padd-0">
		<div class="">
			<div class="col-sm-12">
	        	<h1 class="text-center">What our customers say</h1>
	            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="">
		            <div class="carousel-inner" style="height: 356px;">
		               	<div class="item active">
		                   <div class="row">
		                    <div class="col-sm-6">
								<div class="testimonial-name">
		                        <h4>Kiara Andreson</h4>
		                        <p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span><br>
		                        <span>Officeal All Star Cafe</span>
		                        </p>
								<button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
								<p class="testimonial_para">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo en.</p>
								<button style="border: none; float:right;"><i class="fa fa-quote-right testimonial_fa" aria-hidden="true"></i> </button><br>
		                    </div>
		                    </div>
		                    <div class="col-sm-6 padd-0">
		                     <img src="<?php echo $theme_url?>/images/t1.jpg" class="img-responsive" height="auto">
							  <a type="button" class="testimonial-link bmd-modalButton" data-toggle="modal" data-bmdSrc="https://www.youtube.com/embed/cMNPPgB0_mU" data-bmdWidth="640" data-bmdHeight="480" data-target="#myModal"  data-bmdVideoFullscreen="true">
								<span><img src="<?php echo $theme_url?>/images/play-button.png" class="img-responsive testimonial-img"></span>
							  </a>
		                   </div>
		                 </div>
		              	</div>
		               	<div class="item">
		                   	<div class="row">
		                    <div class="col-sm-6">
								<div class="testimonial-name">
									<h4><strong>Kiara Andreson</strong></h4>
									<p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span><br>
									<span>Officeal All Star Cafe</span>
									</p>
									<button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
									<p class="testimonial_para">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo en.</p>
									<button style="border: none; float:right;"><i class="fa fa-quote-right testimonial_fa" aria-hidden="true"></i> </button><br>	
								</div>	
		                    </div>
		                    <div class="col-sm-6 padd-0">
		                     <img src="<?php echo $theme_url?>/images/t2.jpg" class="img-responsive" height="auto">
							  <a type="button" class="testimonial-link bmd-modalButton" data-toggle="modal" data-bmdSrc="https://www.youtube.com/embed/cMNPPgB0_mU" data-bmdWidth="640" data-bmdHeight="480" data-target="#myModal"  data-bmdVideoFullscreen="true">
								<span><img src="<?php echo $theme_url?>/images/play-button.png" class="img-responsive testimonial-img"></span>
							  </a>
		                   	</div>
		                 	</div>
		              	</div>
		               	<div class="item">
		                   	<div class="row">
		                    <div class="col-sm-6 ">
								<div class="testimonial-name">
									<h4><strong>Kiara Andreson</strong></h4>
									<p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span><br>
									<span>Officeal All Star Cafe</span>
									</p>
									<button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
									<p class="testimonial_para">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo en.</p>
									<button style="border: none; float:right;"><i class="fa fa-quote-right testimonial_fa" aria-hidden="true"></i> </button><br>	
								</div>	
		                    </div>
		                    <div class="col-sm-6 padd-0">
		                     <img src="<?php echo $theme_url?>/images/t3.jpg" class="img-responsive" height="auto">
							  <a type="button" class="testimonial-link bmd-modalButton" data-toggle="modal" data-bmdSrc="https://www.youtube.com/embed/cMNPPgB0_mU" data-bmdWidth="640" data-bmdHeight="480" data-target="#myModal"  data-bmdVideoFullscreen="true">
								<span><img src="<?php echo $theme_url?>/images/play-button.png" class="img-responsive testimonial-img"></span>
							  </a>
		                   	</div>
		                 	</div>
		              	</div>
		               	<div class="item">
		                   	<div class="row">
		                    <div class="col-sm-6">
								<div class="testimonial-name">
									<h4><strong>Kiara Andreson</strong></h4>
									<p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span><br>
									<span>Officeal All Star Cafe</span>
									</p>
									<button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
									<p class="testimonial_para">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo en.</p>
									<button style="border: none; float:right;"><i class="fa fa-quote-right testimonial_fa" aria-hidden="true"></i> </button><br>	
								</div>	
		                    </div>
		                    <div class="col-sm-6 padd-0">
		                     <img src="<?php echo $theme_url?>/images/t4.jpg" class="img-responsive" height="auto">
							  <a type="button" class="testimonial-link bmd-modalButton" data-toggle="modal" data-bmdSrc="https://www.youtube.com/embed/cMNPPgB0_mU" data-bmdWidth="640" data-bmdHeight="480" data-target="#myModal"  data-bmdVideoFullscreen="true">
								<span><img src="<?php echo $theme_url?>/images/play-button.png" class="img-responsive testimonial-img"></span>
							  </a>
		                   	</div>
		                 	</div>
		              	</div>
		               	<div class="item">
		                   	<div class="row">
		                    <div class="col-sm-6">
								<div class="testimonial-name">
									<h4><strong>Kiara Andreson</strong></h4>
									<p class="testimonial_subtitle"><span>Chlinical Chemistry Technologist</span><br>
									<span>Officeal All Star Cafe</span>
									</p>
									<button style="border: none;"><i class="fa fa-quote-left testimonial_fa" aria-hidden="true"></i></button>
									<p class="testimonial_para">Lorem Ipsum ist ein einfacher Demo-Text für die Print- und Schriftindustrie. Lorem Ipsum ist in der Industrie bereits der Standard Demo-Text "Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo en.</p>
									<button style="border: none; float:right;"><i class="fa fa-quote-right testimonial_fa" aria-hidden="true"></i> </button><br>	
								</div>	
		                    </div>
		                    <div class="col-sm-6 padd-0">
		                     <img src="<?php echo $theme_url?>/images/t5.jpg" class="img-responsive" height="auto">
							  <a type="button" class="testimonial-link bmd-modalButton" data-toggle="modal" data-bmdSrc="https://www.youtube.com/embed/cMNPPgB0_mU" data-bmdWidth="640" data-bmdHeight="480" data-target="#myModal"  data-bmdVideoFullscreen="true">
								<span><img src="<?php echo $theme_url?>/images/play-button.png" class="img-responsive testimonial-img"></span>
							  </a>
		                   	</div>
		                 	</div>
		              	</div>
		            </div>
		            <div class="controls testimonial_control pull-right">
		                <a class="left fa fa-chevron-left btn btn-default testimonial_btn" href="#carousel-example-generic"
		                  data-slide="prev"></a>
		                <a class="right fa fa-chevron-right btn btn-default testimonial_btn" href="#carousel-example-generic"
		                  data-slide="next"></a>
		            </div>
		        </div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
	
	<div class="modal fade" id="myModal">
		<div class="modal-dialog">
			<div class="modal-content bmd-modalContent">
				<div class="modal-body">
		          	<div class="close-button">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		          	</div>
		          	<div class="embed-responsive embed-responsive-16by9">
						<iframe class="embed-responsive-item" frameborder="0"></iframe>
		          	</div>
				</div>
			</div>
		</div>
	</div>
</section>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?php echo $theme_url;?>/js/scrollheader.js"></script>
<!-- <script src="<?php echo $theme_url;?>/js/scrollheader.js"></script> -->
<script src="<?php echo $theme_url;?>/slider/js/slider.js"></script> 
<script src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>	
<script type="text/javascript">
        (function($) {
    
    $.fn.bmdIframe = function( options ) {
        var self = this;
        var settings = $.extend({
            classBtn: '.bmd-modalButton',
            defaultW: 640,
            defaultH: 360
        }, options );
      
        $(settings.classBtn).on('click', function(e) {
          var allowFullscreen = $(this).attr('data-bmdVideoFullscreen') || false;
          
          var dataVideo = {
            'src': $(this).attr('data-bmdSrc'),
            'height': $(this).attr('data-bmdHeight') || settings.defaultH,
            'width': $(this).attr('data-bmdWidth') || settings.defaultW
          };
          
          if ( allowFullscreen ) dataVideo.allowfullscreen = "";
          
          // stampiamo i nostri dati nell'iframe
          $(self).find("iframe").attr(dataVideo);
        });
      
        // se si chiude la modale resettiamo i dati dell'iframe per impedire ad un video di continuare a riprodursi anche quando la modale è chiusa
        this.on('hidden.bs.modal', function(){
          $(this).find('iframe').html("").attr("src", "");
        });
      
        return this;
    };
  
})(jQuery);




jQuery(document).ready(function(){
  jQuery("#myModal").bmdIframe();
});
      </script>  
<script type='text/javascript'>
 var a = 0;
$(window).scroll(function() {

  var oTop = $('#counter').offset().top - window.innerHeight;
  if (a == 0 && $(window).scrollTop() > oTop) {
    $('.counter-value').each(function() {
      var $this = $(this),
        countTo = $this.attr('data-count');
      $({
        countNum: $this.text()
      }).animate({
          countNum: countTo
        },

        {

          duration: 2000,
          easing: 'swing',
          step: function() {
            $this.text(Math.floor(this.countNum));
          },
          complete: function() {
            $this.text(this.countNum);
            //alert('finished');
          }

        });
    });
    a = 1;
  }

});
</script>
<script type='text/javascript'>
	$(window).load(function() {
		$('.clients').each(function(){
			$(this).flexisel({
				visibleItems: 5,
				itemsToScroll: 1,         
				autoPlay: {
					enable: false,
					interval: 3000,
					pauseOnHover: true
				},

				responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1,
							itemsToScroll: 1
						}, 
						landscape: { 
							changePoint:639,
							visibleItems: 2,
							itemsToScroll: 2
						},
						tablet: { 
							changePoint:769,
							visibleItems: 3,
							itemsToScroll: 3
						}
					}			
			
			});
		});
	});
</script>
<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> --> 
<script type="text/javascript">
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');
	$(document).ready(function(){
		$('#index_signup').validate({
			rules:{
				index_email:{
					required:true,
					valEmail:true
				},
			},
			messages:{
				index_email:{
					required:"Please enter email id"
			},
		}
		});
	});
</script>
<script src="<?php echo $theme_url;?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript">
	//SERVICES EXPAND N COLLAPSE
	$('.clickmore').click(function(e){
		e.preventDefault();
	  	$(this).parent().parent().addClass('swapactive');
	  	$('.package-expanded').addClass('swapactive');
	  	// $('.package-heading').hide();
	  	$( ".package-initial").children('.package-heading').hide();
	  	$( ".package-initial").children('p').hide();
	});
	$( "div.package-wrapper" ).mouseleave(function() {
    	$( ".package-expanded" ).removeClass('swapactive');
    	$( ".package-wrapper" ).removeClass('swapactive');
    	// $('.package-heading').show();
    	$( ".package-initial").children('.package-heading').show();
    	$( ".package-initial").children('p').show();
  	});
 

//----*****----
// 	$(function(){
//   $('.bxslider').bxSlider({
//     mode: 'vertical',
//     captions: true,
//     auto: true,
//   	controls:false,
//   	autoControls: false,
//   	stopAutoOnClick: false,
//   	pager: false
//   });
// });
</script>

<script>document.documentElement.className = 'js';</script>

  <script type="text/javascript">
  /*! modernizr 3.3.1 (Custom Build) | MIT *
   * https://modernizr.com/download/?-applicationcache-audio-backgroundsize-borderimage-borderradius-boxshadow-canvas-canvastext-cssanimations-csscolumns-cssgradients-cssreflections-csstransforms-csstransforms3d-csstransitions-flexbox-fontface-generatedcontent-geolocation-hashchange-history-hsla-inlinesvg-input-inputtypes-localstorage-multiplebgs-opacity-postmessage-rgba-sessionstorage-smil-svg-svgclippaths-textshadow-touchevents-video-webgl-websockets-websqldatabase-webworkers-domprefixes-hasevent-prefixes-setclasses-testallprops-testprop-teststyles !*/
  !function(e,t,n){function a(e,t){return typeof e===t}function o(){var e,t,n,o,r,s,i;for(var d in T)if(T.hasOwnProperty(d)){if(e=[],t=T[d],t.name&&(e.push(t.name.toLowerCase()),t.options&&t.options.aliases&&t.options.aliases.length))for(n=0;n<t.options.aliases.length;n++)e.push(t.options.aliases[n].toLowerCase());for(o=a(t.fn,"function")?t.fn():t.fn,r=0;r<e.length;r++)s=e[r],i=s.split("."),1===i.length?Modernizr[i[0]]=o:(!Modernizr[i[0]]||Modernizr[i[0]]instanceof Boolean||(Modernizr[i[0]]=new Boolean(Modernizr[i[0]])),Modernizr[i[0]][i[1]]=o),y.push((o?"":"no-")+i.join("-"))}}function r(e){var t=P.className,n=Modernizr._config.classPrefix||"";if(E&&(t=t.baseVal),Modernizr._config.enableJSClass){var a=new RegExp("(^|\\s)"+n+"no-js(\\s|$)");t=t.replace(a,"$1"+n+"js$2")}Modernizr._config.enableClasses&&(t+=" "+n+e.join(" "+n),E?P.className.baseVal=t:P.className=t)}function s(){return"function"!=typeof t.createElement?t.createElement(arguments[0]):E?t.createElementNS.call(t,"http://www.w3.org/2000/svg",arguments[0]):t.createElement.apply(t,arguments)}function i(e,t){return!!~(""+e).indexOf(t)}function d(e){return e.replace(/([a-z])-([a-z])/g,function(e,t,n){return t+n.toUpperCase()}).replace(/^-/,"")}function c(){var e=t.body;return e||(e=s(E?"svg":"body"),e.fake=!0),e}function l(e,n,a,o){var r,i,d,l,u="modernizr",p=s("div"),f=c();if(parseInt(a,10))for(;a--;)d=s("div"),d.id=o?o[a]:u+(a+1),p.appendChild(d);return r=s("style"),r.type="text/css",r.id="s"+u,(f.fake?f:p).appendChild(r),f.appendChild(p),r.styleSheet?r.styleSheet.cssText=e:r.appendChild(t.createTextNode(e)),p.id=u,f.fake&&(f.style.background="",f.style.overflow="hidden",l=P.style.overflow,P.style.overflow="hidden",P.appendChild(f)),i=n(p,e),f.fake?(f.parentNode.removeChild(f),P.style.overflow=l,P.offsetHeight):p.parentNode.removeChild(p),!!i}function u(e,t){return function(){return e.apply(t,arguments)}}function p(e,t,n){var o;for(var r in e)if(e[r]in t)return n===!1?e[r]:(o=t[e[r]],a(o,"function")?u(o,n||t):o);return!1}function f(e){return e.replace(/([A-Z])/g,function(e,t){return"-"+t.toLowerCase()}).replace(/^ms-/,"-ms-")}function m(t,a){var o=t.length;if("CSS"in e&&"supports"in e.CSS){for(;o--;)if(e.CSS.supports(f(t[o]),a))return!0;return!1}if("CSSSupportsRule"in e){for(var r=[];o--;)r.push("("+f(t[o])+":"+a+")");return r=r.join(" or "),l("@supports ("+r+") { #modernizr { position: absolute; } }",function(e){return"absolute"==getComputedStyle(e,null).position})}return n}function g(e,t,o,r){function c(){u&&(delete M.style,delete M.modElem)}if(r=a(r,"undefined")?!1:r,!a(o,"undefined")){var l=m(e,o);if(!a(l,"undefined"))return l}for(var u,p,f,g,h,v=["modernizr","tspan","samp"];!M.style&&v.length;)u=!0,M.modElem=s(v.shift()),M.style=M.modElem.style;for(f=e.length,p=0;f>p;p++)if(g=e[p],h=M.style[g],i(g,"-")&&(g=d(g)),M.style[g]!==n){if(r||a(o,"undefined"))return c(),"pfx"==t?g:!0;try{M.style[g]=o}catch(y){}if(M.style[g]!=h)return c(),"pfx"==t?g:!0}return c(),!1}function h(e,t,n,o,r){var s=e.charAt(0).toUpperCase()+e.slice(1),i=(e+" "+B.join(s+" ")+s).split(" ");return a(t,"string")||a(t,"undefined")?g(i,t,o,r):(i=(e+" "+C.join(s+" ")+s).split(" "),p(i,t,n))}function v(e,t,a){return h(e,n,n,t,a)}var y=[],b="Moz O ms Webkit",T=[],w={_version:"3.3.1",_config:{classPrefix:"",enableClasses:!0,enableJSClass:!0,usePrefixes:!0},_q:[],on:function(e,t){var n=this;setTimeout(function(){t(n[e])},0)},addTest:function(e,t,n){T.push({name:e,fn:t,options:n})},addAsyncTest:function(e){T.push({name:null,fn:e})}},Modernizr=function(){};Modernizr.prototype=w,Modernizr=new Modernizr,Modernizr.addTest("applicationcache","applicationCache"in e),Modernizr.addTest("geolocation","geolocation"in navigator),Modernizr.addTest("history",function(){var t=navigator.userAgent;return-1===t.indexOf("Android 2.")&&-1===t.indexOf("Android 4.0")||-1===t.indexOf("Mobile Safari")||-1!==t.indexOf("Chrome")||-1!==t.indexOf("Windows Phone")?e.history&&"pushState"in e.history:!1}),Modernizr.addTest("postmessage","postMessage"in e),Modernizr.addTest("svg",!!t.createElementNS&&!!t.createElementNS("http://www.w3.org/2000/svg","svg").createSVGRect);var x=!1;try{x="WebSocket"in e&&2===e.WebSocket.CLOSING}catch(S){}Modernizr.addTest("websockets",x),Modernizr.addTest("localstorage",function(){var e="modernizr";try{return localStorage.setItem(e,e),localStorage.removeItem(e),!0}catch(t){return!1}}),Modernizr.addTest("sessionstorage",function(){var e="modernizr";try{return sessionStorage.setItem(e,e),sessionStorage.removeItem(e),!0}catch(t){return!1}}),Modernizr.addTest("websqldatabase","openDatabase"in e),Modernizr.addTest("webworkers","Worker"in e);var C=w._config.usePrefixes?b.toLowerCase().split(" "):[];w._domPrefixes=C;var k=w._config.usePrefixes?" -webkit- -moz- -o- -ms- ".split(" "):["",""];w._prefixes=k;var P=t.documentElement,E="svg"===P.nodeName.toLowerCase(),_=function(){function e(e,t){var o;return e?(t&&"string"!=typeof t||(t=s(t||"div")),e="on"+e,o=e in t,!o&&a&&(t.setAttribute||(t=s("div")),t.setAttribute(e,""),o="function"==typeof t[e],t[e]!==n&&(t[e]=n),t.removeAttribute(e)),o):!1}var a=!("onblur"in t.documentElement);return e}();w.hasEvent=_,Modernizr.addTest("hashchange",function(){return _("hashchange",e)===!1?!1:t.documentMode===n||t.documentMode>7}),Modernizr.addTest("audio",function(){var e=s("audio"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('audio/ogg; codecs="vorbis"').replace(/^no$/,""),t.mp3=e.canPlayType('audio/mpeg; codecs="mp3"').replace(/^no$/,""),t.opus=e.canPlayType('audio/ogg; codecs="opus"')||e.canPlayType('audio/webm; codecs="opus"').replace(/^no$/,""),t.wav=e.canPlayType('audio/wav; codecs="1"').replace(/^no$/,""),t.m4a=(e.canPlayType("audio/x-m4a;")||e.canPlayType("audio/aac;")).replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("canvas",function(){var e=s("canvas");return!(!e.getContext||!e.getContext("2d"))}),Modernizr.addTest("canvastext",function(){return Modernizr.canvas===!1?!1:"function"==typeof s("canvas").getContext("2d").fillText}),Modernizr.addTest("video",function(){var e=s("video"),t=!1;try{(t=!!e.canPlayType)&&(t=new Boolean(t),t.ogg=e.canPlayType('video/ogg; codecs="theora"').replace(/^no$/,""),t.h264=e.canPlayType('video/mp4; codecs="avc1.42E01E"').replace(/^no$/,""),t.webm=e.canPlayType('video/webm; codecs="vp8, vorbis"').replace(/^no$/,""),t.vp9=e.canPlayType('video/webm; codecs="vp9"').replace(/^no$/,""),t.hls=e.canPlayType('application/x-mpegURL; codecs="avc1.42E01E"').replace(/^no$/,""))}catch(n){}return t}),Modernizr.addTest("webgl",function(){var t=s("canvas"),n="probablySupportsContext"in t?"probablySupportsContext":"supportsContext";return n in t?t[n]("webgl")||t[n]("experimental-webgl"):"WebGLRenderingContext"in e}),Modernizr.addTest("cssgradients",function(){for(var e,t="background-image:",n="gradient(linear,left top,right bottom,from(#9f9),to(white));",a="",o=0,r=k.length-1;r>o;o++)e=0===o?"to ":"",a+=t+k[o]+"linear-gradient("+e+"left top, #9f9, white);";Modernizr._config.usePrefixes&&(a+=t+"-webkit-"+n);var i=s("a"),d=i.style;return d.cssText=a,(""+d.backgroundImage).indexOf("gradient")>-1}),Modernizr.addTest("multiplebgs",function(){var e=s("a").style;return e.cssText="background:url(https://),url(https://),red url(https://)",/(url\s*\(.*?){3}/.test(e.background)}),Modernizr.addTest("opacity",function(){var e=s("a").style;return e.cssText=k.join("opacity:.55;"),/^0.55$/.test(e.opacity)}),Modernizr.addTest("rgba",function(){var e=s("a").style;return e.cssText="background-color:rgba(150,255,150,.5)",(""+e.backgroundColor).indexOf("rgba")>-1}),Modernizr.addTest("inlinesvg",function(){var e=s("div");return e.innerHTML="<svg/>","http://www.w3.org/2000/svg"==("undefined"!=typeof SVGRect&&e.firstChild&&e.firstChild.namespaceURI)});var z=s("input"),A="autocomplete autofocus list placeholder max min multiple pattern required step".split(" "),R={};Modernizr.input=function(t){for(var n=0,a=t.length;a>n;n++)R[t[n]]=!!(t[n]in z);return R.list&&(R.list=!(!s("datalist")||!e.HTMLDataListElement)),R}(A);var $="search tel url email datetime date month week time datetime-local number range color".split(" "),N={};Modernizr.inputtypes=function(e){for(var a,o,r,s=e.length,i="1)",d=0;s>d;d++)z.setAttribute("type",a=e[d]),r="text"!==z.type&&"style"in z,r&&(z.value=i,z.style.cssText="position:absolute;visibility:hidden;",/^range$/.test(a)&&z.style.WebkitAppearance!==n?(P.appendChild(z),o=t.defaultView,r=o.getComputedStyle&&"textfield"!==o.getComputedStyle(z,null).WebkitAppearance&&0!==z.offsetHeight,P.removeChild(z)):/^(search|tel)$/.test(a)||(r=/^(url|email)$/.test(a)?z.checkValidity&&z.checkValidity()===!1:z.value!=i)),N[e[d]]=!!r;return N}($),Modernizr.addTest("hsla",function(){var e=s("a").style;return e.cssText="background-color:hsla(120,40%,100%,.5)",i(e.backgroundColor,"rgba")||i(e.backgroundColor,"hsla")});var O="CSS"in e&&"supports"in e.CSS,I="supportsCSS"in e;Modernizr.addTest("supports",O||I);var L={}.toString;Modernizr.addTest("svgclippaths",function(){return!!t.createElementNS&&/SVGClipPath/.test(L.call(t.createElementNS("http://www.w3.org/2000/svg","clipPath")))}),Modernizr.addTest("smil",function(){return!!t.createElementNS&&/SVGAnimate/.test(L.call(t.createElementNS("http://www.w3.org/2000/svg","animate")))});var B=w._config.usePrefixes?b.split(" "):[];w._cssomPrefixes=B;var W=w.testStyles=l;Modernizr.addTest("touch"/* was touchevents */,function(){var n;if("ontouchstart"in e||e.DocumentTouch&&t instanceof DocumentTouch)n=!0;else{var a=["@media (",k.join("touch-enabled),("),"heartz",")","{#modernizr{top:9px;position:absolute}}"].join("");W(a,function(e){n=9===e.offsetTop})}return n});var j=function(){var e=navigator.userAgent,t=e.match(/applewebkit\/([0-9]+)/gi)&&parseFloat(RegExp.$1),n=e.match(/w(eb)?osbrowser/gi),a=e.match(/windows phone/gi)&&e.match(/iemobile\/([0-9])+/gi)&&parseFloat(RegExp.$1)>=9,o=533>t&&e.match(/android/gi);return n||o||a}();j?Modernizr.addTest("fontface",!1):W('@font-face {font-family:"font";src:url("https://")}',function(e,n){var a=t.getElementById("smodernizr"),o=a.sheet||a.styleSheet,r=o?o.cssRules&&o.cssRules[0]?o.cssRules[0].cssText:o.cssText||"":"",s=/src/i.test(r)&&0===r.indexOf(n.split(" ")[0]);Modernizr.addTest("fontface",s)}),W('#modernizr{font:0/0 a}#modernizr:after{content:":)";visibility:hidden;font:7px/1 a}',function(e){Modernizr.addTest("generatedcontent",e.offsetHeight>=7)});var V={elem:s("modernizr")};Modernizr._q.push(function(){delete V.elem});var M={style:V.elem.style};Modernizr._q.unshift(function(){delete M.style});var q=w.testProp=function(e,t,a){return g([e],n,t,a)};Modernizr.addTest("textshadow",q("textShadow","1px 1px")),w.testAllProps=h,w.testAllProps=v,Modernizr.addTest("cssanimations",v("animationName","a",!0)),Modernizr.addTest("backgroundsize",v("backgroundSize","100%",!0)),Modernizr.addTest("borderimage",v("borderImage","url() 1",!0)),Modernizr.addTest("borderradius",v("borderRadius","0px",!0)),Modernizr.addTest("boxshadow",v("boxShadow","1px 1px",!0)),function(){Modernizr.addTest("csscolumns",function(){var e=!1,t=v("columnCount");try{(e=!!t)&&(e=new Boolean(e))}catch(n){}return e});for(var e,t,n=["Width","Span","Fill","Gap","Rule","RuleColor","RuleStyle","RuleWidth","BreakBefore","BreakAfter","BreakInside"],a=0;a<n.length;a++)e=n[a].toLowerCase(),t=v("column"+n[a]),("breakbefore"===e||"breakafter"===e||"breakinside"==e)&&(t=t||v(n[a])),Modernizr.addTest("csscolumns."+e,t)}(),Modernizr.addTest("flexbox",v("flexBasis","1px",!0)),Modernizr.addTest("cssreflections",v("boxReflect","above",!0)),Modernizr.addTest("csstransforms",function(){return-1===navigator.userAgent.indexOf("Android 2.")&&v("transform","scale(1)",!0)}),Modernizr.addTest("csstransforms3d",function(){var e=!!v("perspective","1px",!0),t=Modernizr._config.usePrefixes;if(e&&(!t||"webkitPerspective"in P.style)){var n,a="#modernizr{width:0;height:0}";Modernizr.supports?n="@supports (perspective: 1px)":(n="@media (transform-3d)",t&&(n+=",(-webkit-transform-3d)")),n+="{#modernizr{width:7px;height:18px;margin:0;padding:0;border:0}}",W(a+n,function(t){e=7===t.offsetWidth&&18===t.offsetHeight})}return e}),Modernizr.addTest("csstransitions",v("transition","all",!0)),o(),r(y),delete w.addTest,delete w.addAsyncTest;for(var G=0;G<Modernizr._q.length;G++)Modernizr._q[G]();e.Modernizr=Modernizr}(window,document);
</script>

<script>

	//Load this JS for non-touch devices
	if (!window.Modernizr.touch) {
	  var $dmsSectionPanels = $('[data-sw-dms-panel]');
	  var $dmsSectionContainer = $('[data-sw-dms-panel-container]');
	  var dmsValue = '';

	  $dmsSectionPanels.mouseenter(function () {
	    var _this = $(this);
	    var newDmsValue = _this.data('swDmsPanel');
	    var str = "[data-sw-dms-panel-container-bg=" + newDmsValue + ']';
	    var activeContainerBg = $('.sw-dms-panel-container-bg--active');
	    var container = $dmsSectionContainer.find(str);

	    container.css('opacity', 1);
	    container.addClass('sw-dms-panel-container-bg--active');

	    $('.sw-make-panel-border').show();

	    $dmsSectionPanels.each(function (i, obj) {
	      if ($(obj).data('swDmsPanel') !== newDmsValue) {
	        $(obj).find('.sw-dms-panel__inner-div').addClass('sw-dms-panel__inner-div--transparent');
	      }
	      else {
	        $(obj).find('.sw-dms-panel__inner-div').removeClass('sw-dms-panel__inner-div--transparent');
	        $(obj).find('.sw-dms-panel__inner-div__main-text').css('opacity', 1);
	      }
	      $(obj).find('.sw-bg-panel').css('opacity', 0);
	    });

	    if (dmsValue !== newDmsValue) {
	      dmsValue = newDmsValue;
	      activeContainerBg.css('opacity', 0);
	      activeContainerBg.removeClass('sw-dms-panel-container-bg--active');
	    }
	  });

	  $dmsSectionPanels.mouseleave(function () {
	    $('.sw-make-panel-border').hide();
	    $dmsSectionPanels.each(function (i, obj) {
	      $(obj).find('.sw-bg-panel').css('opacity', 1);
	      $(obj).find('.sw-dms-panel__inner-div').removeClass('sw-dms-panel__inner-div--transparent');
	      $(obj).find('.sw-dms-panel__inner-div__main-text').css('opacity', 0);
	    });
	  });

	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
    $(".factory_design").mouseover(function(){
        $(".factory_make").css("opacity", "0.3");
        $(".factory_sell").css("opacity", "0.3");
    });
    $(".factory_make").mouseover(function(){
        $(".factory_design").css("opacity", "0.3");
        $(".factory_sell").css("opacity", "0.3");
    });
    $(".factory_sell").mouseover(function(){
        $(".factory_design").css("opacity", "0.3");
        $(".factory_make").css("opacity", "0.3");
    });
    $(".factory_design").mouseout(function(){
       $(".factory_make").css("opacity", "1");
        $(".factory_sell").css("opacity", "1");
    });
    $(".factory_make").mouseout(function(){
       $(".factory_design").css("opacity", "1");
        $(".factory_sell").css("opacity", "1");
    });
    $(".factory_sell").mouseout(function(){
       $(".factory_design").css("opacity", "1");
        $(".factory_make").css("opacity", "1");
    });
});
</script>

<?php echo $this->template->contentEnd(); ?> 