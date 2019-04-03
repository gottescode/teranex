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
.explore-marketplace .tab-widget li{
	padding: 15px 90px;
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
.other-section-10 .tab-pd li {
    padding: 15px 90px;
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
					<h1 class="typewriter1">TERANEX</h1>
					<h2 style="font-weight: normal;font-size: 36px;margin-top: 5px;color: #a5c049;">an intelligent assistant for all your sheet metal needs</h2>
					<!-- <h2>
						<span class="item-1">
							<span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span> Accessible <span class="circle"> </span> affordable <span class="circle"> </span> convenient
						</span>
						<span class="item-2">
							<span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span>research <span class="circle"> </span>analytics <span class="circle"> </span>consulting
						</span>
						<span class="item-3">
							<span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span> open <span class="circle"> </span> transparent <span class="circle"> </span> Accountable
						</span>
					</h2> -->
					<div class="bxslider">
					 	<!-- <div><h2><span class="">
							<span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span> Accessible <span class="circle"> </span> affordable <span class="circle"> </span> convenient
						</span></h2></div>
					  	<div><h2><span class="">
							<span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span>research <span class="circle"> </span>analytics <span class="circle"> </span>consulting
						</span></h2></div> -->
					  	<div><h2><span class="">
							<span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span> Connected <span class="circle"> </span> Unified <span class="circle"> </span> Accountable
						</span></h2></div>
					</div>
					<div class="clearfix"></div>
					<!-- <center><a href="<?php echo site_url();?>pages/signIn" class="btn btn_orange btn-lg" style="margin-top: 80px;"><span><i class="fa fa-user" aria-hidden="true"></i></span> Sign Up</a></center> -->
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
<div class=" sec-marketplace padd_30" style="margin-top: 0;padding-top: 20px;">
	<div class=""></div>
	<center class="pad-0-0-10" style="margin-bottom: 18px;">
		<h1 style="margin-top: 0px;">Explore the Marketplace</h1>
		<ul class="feature"><li>Live Sales Consultation</li><li>|</li><li>Live Machine Demo</li><li>|</li><li>Time Study</li><li>|</li><li>Software</li><li>|</li><li>Finance</li><li>|</li><!-- <li>Smart Contract</li><li>|</li> --><li>Unified Communication</li></ul>
	</center>
	<div class="col-sm-12" style="position: relative;" >
		<div class="col-sm-4 col-xs-12" >
		<center>
			<div class="row">
				<h2>Collaboration Services</h2>
				<p class="marketPlace-heading">Get connected to your peers in the industry</p>
			</div>
		</center>
			<div class="ico-tiles">
				<div class="row">
				   <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>community/forum">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/team.png">
					  </div>
						   <h3>User Communities</h3>
						   <p>Programming services take overload burden from your programming office.</p>
					</a>
				  </div>
				 <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>groupbuying">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/teamwork.png">
					  </div>
						   <h3>Collective Buyers</h3>
						   <p>Subcontracting expands the product range to offer to your markets.</p>
					</a>
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>xpertconnect">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/support.png">
					  </div>
						   <h3>Freelancer Groups</h3>
						   <p>Remote technical service production.</p>
					</a>
				  </div>
				  <div class="col-sm-6 col-xs-12">
					<!-- <a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/stamp.png">
					  </div>
						   <h3>Snapshots</h3>
						   <p>Remote technical service production.</p>
					</a> -->
					<a target="_blank" href="<?php echo site_url();?>events">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/calendar.png">
					  </div>
			           <h3>Live Events</h3>
			           <p>Be part of any live event around the world.</p>
			        </a>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12" style="border-left: 1px solid #333;border-right: 1px solid #333;">
			<center>
			  <div class="row">
				  <h2>Machines & Supplies</h2>
					<p class="marketPlace-heading">Choose from a vast range of machines & accessories</p>
				</div>
			</center>
			<div class="ico-tiles">
				<div class="row">
				  <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>machine">
						<div>
							<img src="<?php echo $theme_url?>/css/marketplace/machine.png">
						</div>
						<h3>Machines</h3>
						<p>Used machines are a cost effective way to enter the industry.</p>
					</a>
				  </div>
				 <div class="col-sm-6 col-xs-12">
				 	<a target="_blank" href="https://teranex.io/ecommerce/product-category/spare-parts/">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/car-parts.png">
					  </div>
						   <h3>Spares</h3>
						   <p>Spare parts are an essential part of the daily use of machines.</p>
					</a>
				    
				  </div>
				</div>
				<div class="row">
				  <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="https://teranex.io/ecommerce/product-category/toolings/">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/wrench.png">
					  </div>
						   <h3>Toolings</h3>
						   <p>Toolings are a the key to outstanding applications and superior part quality.</p>
					</a>
				  </div>
				  <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>automation">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/robot-arm.png">
					  </div>
			           <h3>Automation</h3>
			           <p></p>
			        </a>
				  </div>
				</div>
			</div>
		</div>
		<div class="col-sm-4 col-xs-12" style="">
		
		<center>
		  <div class="row">
		        <h2>Remote Services</h2>
		        <p class="marketPlace-heading">On demand remote services for your machines</p>
		    </div>
		</center>
			<div class="ico-tiles">
				<div class="row">
				   <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>consultant">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/remote-control.png">
					  </div>
						   <h3>Remote Service</h3>
						   <p>Remote technical service production Remote technical service production.</p>
					</a>
				  </div>				 
				  <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>remotetraining">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/eacadmy.png">
					  </div>
						   <h3>Remote training</h3>
						   <p>Remote training covering CAD/CAM, operation & maintenance of machines.</p>
					</a>
				  </div>
				  <div class="col-sm-6 col-xs-12">
				  	<a target="_blank" href="<?php echo site_url();?>remoteapplication/">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/training.png">
					  </div>
						   <h3>Remote Application</h3>
						   <p>Application services help to <br>master new design challenges.</p>
					</a>
				  </div>
				 <div class="col-sm-6 col-xs-12">
					<a target="_blank" href="<?php echo site_url();?>remoteprogramming">
					  <div>
						<img src="<?php echo $theme_url?>/css/marketplace/cloud-coding-.png">
					  </div>
			           <h3>Remote Programming</h3>
			           <p>Programming services take overload burden from your programming.</p>
			        </a>
				  </div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="clearfix"></div>
</div><div class="clearfix"></div>
</section>
<div class="clearfix"></div>

<section class="other-section other-section-10 dark explore-marketplace">
	<div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/market_int_bck.jpg');height: 100%;width: 100%;background-size: cover;">
		<div style="width: 100%;background-color: #000000ad">
			<div class="col-sm-12" style="padding-top: 15px;">
				<center>
					<h1 class="white-text">TERANEX Market Intelligence Portfolio</h1>
					<p class="white-text" style="padding: 10px 0;">TERANEX offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting<br/> undertakes proactive collaboration with clients to identify new opportunities, new customers and sources of incremental revenues.</p>
				</center>
				<div>
					<ul class="tab-widget icon-tab tab-pd ">
						<li class="">
							<a target="_blank" href="<?php echo site_url();?>research/" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-search" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Research</h3>
						</li> 
						<li class="">
							<a target="_blank" href="<?php echo site_url();?>snapshot/" data-tb="#service-tab-3" class="flex-cc">
							<i class="fa fa-line-chart" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Snapshots</h3>
						</li>
						<!-- <li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li> -->
						
						<!-- <li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li> -->
						<li class="">
							<a target="_blank" href="<?php echo site_url();?>consulting/" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-comments-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Consulting</h3>
						</li>
					</ul>
				</div>
			</div><div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div>

<!--<section class="other-section other-section-10 elearning dark">
    <div class="col-sm-12 col-xs-12 padd-0 div_img">
        <img style=" width:100%;" src="<?php echo $theme_url?>/images/machineindex.jpg" class="img-responsive img_bnr">
		<div class="sec-img-heading">
			<div class="sec-img-content">
			<h1>Explore the marketplace for digital manufacturing</h1>
			<p>Used machines are a cost effective way to enter the industry.</p>
			<a target="_blank" href="<?php echo site_url();?>stelmac/contact_manufacturing" class="btn btn-see-more"> See More</a>
			</div>
		</div>
    </div>
</section>-->

<div class="clearfix"></div>

<section class="other-section other-section-10 elearning dark" style="background: #f9f9f9; padding: 20px 0;">
	<div class=" padd-0 paralax-section1" style="background-image: none;">
		<div class="col-sm-12 padd-0" style="">
			<div class="col-sm-6 padd-0" style="">
				<div style="width: 100%;">
					<div class="sec-lr" style="padding:10px; border-right:1px solid">
						<h1 class=" text-center" style="margin-top: 10px;">Customer Services</h1>
						<hr class="hrline"/>
						<ul>
							<div class="col-lg-6 col-sm-6">
								<li><img src="<?php echo $theme_url?>/images/icons/auction.png" />
									<a target="_blank" href="<?php echo site_url()."footer/submitAdispute";?>">Submit a Dispute</a>
								</li>
							</div>
							<div class="col-lg-6 col-sm-6 ">
								<li><img src="<?php echo $theme_url?>/images/icons/analysis.png" />
									<a target="_blank" href="<?php echo site_url()."footer/ReportAbuse";?>">Report Abuse</a>
								</li>
							</div>
							<div class="col-lg-6 col-sm-6">
								<li><img src="<?php echo $theme_url?>/images/icons/rating.png" />
									<a target="_blank" href="<?php echo site_url()."footer/getPaidForYourFeedback";?>">Get Paid for Feedback</a>
								</li>
							</div>
							<div class="col-lg-6 col-sm-6">
								<li>
									<img src="<?php echo $theme_url?>/images/icons/headset.png" />
									<a target="_blank" href="<?php echo site_url()."footer/helpCenter";?>">Help Center</a>
								</li>
							</div>
							
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6 padd-0" style="">
				<div style="width: 100%;">
					<div class="sec-lr" style="padding:10px;">
						<h1 class=" text-center" style="margin-top: 10px;">Trade Services</h1>
						<hr class="hrline"/>
						<ul>
							<div class="col-lg-6 col-sm-6">
								<li>
									<img src="<?php echo $theme_url?>/images/icons/money.png" />
									<a target="_blank" href="<?php echo site_url()."footer/tradeAssurance";?>">Trade Assurance</a>
								</li>
							</div>
							<div class="col-lg-6 col-sm-6 ">
								<li>
									<img src="<?php echo $theme_url?>/images/icons/id-card.png" />
									<a target="_blank" href="<?php echo site_url()."footer/businessIdentity";?>">Business Identity</a>
								</li>
							</div>
							<div class="col-lg-6 col-sm-6 ">
								<li>
									<img src="<?php echo $theme_url?>/images/icons/payment-security.png" />
									<a target="_blank" href="<?php echo site_url()."footer/securePayment";?>">Secure Payment</a>
								</li>
							</div>
							<div class="col-lg-6 col-sm-6 ">
								<li>
									<img src="<?php echo $theme_url?>/images/icons/inspection.png" />
									<a target="_blank" href="<?php echo site_url()."footer/inspectionService";?>">Inspection Service</a>
								</li>
							</div>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<!-- <section class="counterbg">
	
	<div class=" padd-0" style="width: 100%;background-color: #000000c4; height: 388px; position: relative;padding: 0 150px;">
	<h1 style="text-align: center;color: #fff;;font-size: 36px;padding: 45px 0;margin-bottom: 0;">Connect to TERANEX Digital Manufacturing Platform</h1>
	<center><span style="text-align: center;color: #fff;font-size: 13px;">
		<p><span style="color: #a5c049;font-size: 24px;"><i>" Making Contract Manufacturing Virtual, On-Demand and Convenient "</i><br/></span></p>Fabpilot brings together all the tools you need to manage your entire Additive Manufacturing workflow.<br/>
File analysis and repair, 3D review tools, file optimization, quote generation, 3D Nesting, part tracking, printer fleet management, and post-processing management, all on one cloud based platform.<br/>
Built, tested, and powered by the team at Sculpteo, Fabpilot has been proven to work at industrial production scales.
	</span></center><br/>
	<center><a href="<?php echo site_url()."digitalmanufacturing/contact_manufacturing";?>" class="btn btn_orange" style="padding: 10px 20px;">Start</a></center>
		<div class="clearfix"></div>
	</div>
</section> -->
<div class="clearfix"></div>

<!-- <section class="other-section other-section-10 elearning dark">
    <div class="col-sm-12 col-xs-12 padd-0 div_img">
        <img style=" width:100%;" src="<?php echo $theme_url?>/images/remotetraining.jpg" class="img-responsive img_bnr">
    	<div class="sec-img-heading">
			<div class="sec-img-content text-right" style="right:5%;">
			<h1>Teranex manufacturing academy</h1>
			<p>Used machines are a cost effective way to enter the industry.</p>
			<a target="_blank" href="<?php echo site_url();?>pages/commingsoon" class="btn btn-see-more pull-right"> See More</a>
			</div>
		</div>
    </div>
</section> -->

<div class="clearfix"></div>
<!-- <section class="counterbg">
	<div class=" padd-0" style="width: 100%;background-color: #00000085">
		<div class="counter padd_30">
			<div id="counter" class="col-sm-12">
				<div class="col-sm-4 mar-20-0">
					<center><span class="counter-value" data-count="1973">0</span></center>
					<div class="seprator1"></div>
					<h3 class="text-center">No. <span style="text-transform:lowercase">o</span>f users</h3>
				</div>
				<div class="col-sm-4 mar-20-0">
					<center><span class="counter-value" data-count="73">0</span><span class="counter-value"> %</span></center>
					<div class="seprator1"></div>
					<h3 class="text-center">industry participation</h3>
				</div>
				<div class="col-sm-4 mar-20-0">
					<center><span class="counter-value">$</span><span class="counter-value" data-count="150">1</span><span class="counter-value"> Million</span></center>
					<div class="seprator1"></div>
					<h3 class="text-center">transaction volume</h3>
				</div>
			</div>
			<div style="clear:both"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div> -->
<section class="other-section other-section-10 dark">
	<div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/news.jpg');height: 100%;width: 100%;background-size: cover;">
		<div style="width: 100%;background-color: #000000ad">
			<div class="col-sm-12" style="padding-top: 15px;">
				<center>
					<h1 class="white-text">Inside TERANEX Media</h1>
					<p class="white-text" style="padding: 10px 0;">TERANEX offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting <br/> undertakes proactive collaboration with clients to identify new opportunities, new customers and sources of incremental revenues.</p>
				</center>
				<div>
					<ul class="tab-widget icon-tab tab-pd">
						<!-- <li>
							<a target="_blank" href="<?php echo site_url();?>snapshot" data-tb="#service-tab-1" class="flex-cc">
							<i class="fa fa-search" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Market Intelligence</h3>
						</li>
						<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li> -->
						<!-- <li><a target="_blank" href="<?php echo site_url();?>analytics/" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-line-chart" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Analytics</h3>
						</li> -->
						<li>
							<a target="_blank" href="http://teranex.io/mediacenter/category/industry-news/" data-tb="#service-tab-4" class="flex-cc">
							<i class="fa fa-newspaper-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Industry News</h3>
						</li>
						
						<!-- <li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li> -->
						<li>
							<a target="_blank" href="http://teranex.io/mediacenter/category/experts/" data-tb="#service-tab-3" class="flex-cc">
							<i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Expert Blogs</h3>
						</li>
						<!-- <li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li> -->
						<li><a target="_blank" href="http://teranex.io/mediacenter/category/customer-blog/" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-users" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Customer Blogs</h3>
						</li>
						<!-- <li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li> -->
						<!-- <li><a target="_blank" href="http://teranex.io/mediacenter/category/videos/" data-tb="#service-tab-5" class="flex-cc">
							<i class="fa fa-video-camera" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Videos</h3>
						</li> -->
						<!--<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon" data-tb="#service-tab-6" class="flex-cc">
							<i class="fa fa-picture-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Passport</h3>
						</li> -->
					</ul>
				</div>
			</div><div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div>

<section class="testimonial" style="background:#f9f9f9;padding-bottom: 30px;">
<div class=" padd-0">
	<div class="">
		<div class="col-sm-12">
        	<h1 class="text-center">What our customers say</h1>
        	<!--  <div class="seprator"></div> -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel" style="">
              <!-- Wrapper for slides -->
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
						  <a data-toggle="modal" data-target="#myModal" class="testimonial-link">
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
						  <a data-toggle="modal" data-target="#myModal" class="testimonial-link">
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
						  <a data-toggle="modal" data-target="#myModal" class="testimonial-link">
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
						  <a data-toggle="modal" data-target="#myModal" class="testimonial-link">
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
						  <a data-toggle="modal" data-target="#myModal" class="testimonial-link">
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
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
			 <iframe id="cartoonVideo" width="560" height="315" src="//www.youtube.com/embed/YE7VzlLtp-4" frameborder="0" autoplay="true" allowfullscreen> </iframe>
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
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script type="text/javascript">
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
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
	$(function(){
  $('.bxslider').bxSlider({
    mode: 'vertical',
    captions: true,
    auto: true,
  	controls:false,
  	autoControls: false,
  	stopAutoOnClick: false,
  	pager: false
  });
});
</script>
<?php echo $this->template->contentEnd(); ?> 