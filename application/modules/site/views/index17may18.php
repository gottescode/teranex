<?php $this->template->contentBegin(POS_TOP);?>
<style>  
@media (min-width: 1200px){
	.container {
    width: 1215px;
}
.sec-container{padding: 0 60px;}
}
.sec-container{background: #f9f9f9;}
.sec-text-bg{background: #fff;}
.slider .slide .slide-text {
    padding-right: 0%;
    padding-left: 0%;
    width: 100%;
    text-align: center;
	position: absolute;
    bottom: 0;
}

.slider {height: 530px;}
.slider .slide .substrate {
    background: linear-gradient(to top, rgba(0, 0, 0, 0.78) 0%, rgba(0, 0, 0, 0) 20%);
}
.slider .slide .substrate1 {
   position: absolute;
    width: 100%;
    height: 100%;
    background: linear-gradient(to left, rgba(0, 0, 0, 0.78) 0%, rgba(0, 0, 0, 0) 33%);
}
.slider .slide .substrate2 {
   position: absolute;
    width: 100%;
    height: 100%;
    background: #0000008c;
}
/*.slide-text1 h1{padding-right: 7%;}
.slide-text1 h2{padding-right: 7%;}
.slide-text2 h1{padding-left: 5%;}
.slide-text1{    
	right: 7%;
    width: 100%;
    text-align: right;
    position: absolute;
    bottom: 25%;
    left: 0%;}*/
.slide-text2{    
	left: 0;
    width: 100%;
    text-align: center;
    position: absolute;
    bottom: 28%;
    right: 0%;}
	
.slide-text2 h2{
	padding-left: 0%;
	font-family: Helvetica;
}
	
.slide-text2 h2{text-align:center;}
.ico-tiles p{padding-top: 10px;}
.bg-primary {color: #fff; background-color: #353537;}
.footer-bars {
    background-color: #353537;
    padding: 5px 0px;
}
h1 {
    font-family: 'Ciutadella';
    color: #000000;
    font-size: 36px;
    line-height: normal;
    font-weight: 700;
}
h2{
   font-family: 'Ciutadella';
    color: #000000;
    font-weight: bold;
}
.marketPlace-heading{margin-bottom:35px; font-size:16px;}

.slide h1{
	color:#fff;
	font-size: 50px;
    line-height: 74px;
	font-family: Helvetica;
	text-align:center;
}
	
input#newsletter {
    padding: 1px 12px;
}
@media screen and (min-width:768px){
  .Marketplace {border-right:1px solid #a0a0a0; border-left:1px solid #a0a0a0;}
}
/*counter*/

.counter {
    padding: 20px 0;
}
span.counter-value {
    text-align: center;
    color: #191818;
    margin: 0;
	line-height: 40px;
	/*font-size: 40px;*/
	font-size: 39px;
}
.counter .text-center{margin:0; color: #191818;}
.seprator1 {
    margin: 10px auto;
    width: 65%;
    height: 2px;
    background-color: #ff8a43;
}
/*End Counter*/

/*testimonial*/
.testimonial{background:#fff;}
.testimonial .item{background: #f9f9f9;}
.testimonial_subtitle{
    font-size: 12px;
	letter-spacing: 1px;
}
.controls.testimonial_control {
    position: absolute;
    top: 45%;
    width: 100%;
}
.testimonial .right {
    float: right;
}
.testimonial .left {
    float: left;
}
  .testimonial_btn {
    background-color: #fff !important;
}
.testimonial_btn:focus,.testimonial_btn:active{border-color: #ff8a4300;}
 .seprator {
    height: 2px;
    width: 56px;
    background-color: #ff8a43;
    margin: 7px 0 10px 0;
}
.testimonial-name{padding:25px 50px}
.testimonial button {
    background: #ff8a4300;
	cursor: auto;
}
.testimonial-link {
    position: absolute;
    z-index: 999999999;
    top: 54%;
    left: 45%;
}
.testimonial-img{
    width: 50px;
    height: 50px;
    background: #ffffff4a;
    border-radius: 100%;
}
.testimonial-link:hover .testimonial-img{background: #3e3d3dc7;}
/*End testimonial*/
.text-heading {
    width: 100%;
    text-align: center;
    position: absolute;
    bottom: 0;
    color: #fff;
    background: #00000094;
    padding: 0;
    margin: 0;
}
.h1tag{    
	line-height: normal;
    padding: 25px 0 0 30px;
	font-size: 36px;}
.ptag {
    margin-left: 30px;
    font-size: 18px;
}
.sec-img-heading{
	width: 100%;
    text-align: left;
    position: absolute;
    left: 0;
    bottom: 0;
    height: 100%;
}
.sec-img-content{    
	position: absolute;
    top: 30%;
    left: 5%;
	}
.sec-img-content h1{color:#000;}
.sec-img-content a{padding: 10px 20px; border: 1px solid #ff8a43;}
.sec-img-content p{
	padding: 0px 0 15px;
    color: #000;
    font-size: 15px;
    letter-spacing: 1px;
}
.mar-30-0{margin:30px auto 0;}
.h2-tag{    	
	line-height: normal;    
	font-weight: normal;
    margin: 0;padding: 10px;}
.gray-bg1{background:#f9f9f9;}
.btn-see-more{background:#fff; color:#0e0e0f; border-radius: 0; border: 1px solid #ff8a43;}
.btn-see-more:hover{background:#ff8a43; color:#fff; border-radius: 0;}
.circle{
	display: inline-block;
	border-right: 5px solid transparent;
    border-left: 5px solid transparent;
    border-bottom: 5px solid;
    border-top: 5px solid;
    border-radius: 0%;
    background: #fff;
    color: #fff;
	margin-right: 10px;
	margin-bottom:5px;
	margin-left: 4%;
}
.header-span{color:#fff;}
@media screen and (max-width:480px){
	.top-70 {
		margin-top: 60px!important;
		min-height: 550px;
	}
	.slide h1 {
		color: #fff;
		font-size: 36px;
		line-height: 50px;
		font-family: Helvetica;
		text-align: center;
		padding: 10px;
	}
	.slide-text2 {
		left: 0;
		width: 100%;
		text-align: center;
		position: absolute;
		bottom: 10%;
		right: 0%;
	}
}
.mar-20-0 {
    margin: 20px auto 0;
}
.mar-0-0-10{ margin: 0px auto 10px;}
.mar-10-0-0{ margin: 10px auto 0px;}


.linearrow {
    position: absolute;
    left: 25%;
    top: 23%;
}

.linearrow1 {
    position:  absolute;
    right: 30%;
    top: 23%;
}
	
/******* Section*******/	
.other-section-10 .tab-widget {
    list-style-type: none;
    margin: auto;
    padding: 0;
    display: table;
}
.other-section-10 .tab-pd li {
    padding: 15px;
}

.other-section-10 .tab-widget li {
    vertical-align: middle;
    display: table-cell;
    table-layout: fixed;
    text-align: center;
}
.other-section-10 .tab-widget li>a {
    width: 120px;
    height: 120px;
    color: #fff;
    font-size: 60px;
    border-radius: 80px;
    background-color: rgba(255, 255, 255, 0.34);
}

.flex-cc {
    -webkit-justify-content: center;
    justify-content: center;
    -webkit-align-items: center;
    align-items: center;
    display: flex;
}
.other-section-10 .tab-widget li>a:hover {
    background-color: #fff;
    color: #445268;
    box-shadow: 0 3px 10px 0 rgba(0,0,0,0.15);
}
.mr-t-10 {
    margin-top: 10px;
}

.bold-2 {
    font-weight: 400;
}
.fs16 {
    font-size: 16px;
}

.tab-widget h3,
.white-text{color:#fff}
analatics
.analatics{background-image: url("<?php echo $theme_url?>/images/analatics-white.png");}
.dark hr, hr.light {
    border-color: rgba(255,255,255,0.15);
}

.ico-tiles.m h3 {
    border-left: none;
    border-right: none;
    font-size: 15px;
    text-align: right;
    padding-right: 15px;
}
.ico-tiles.m {
    border-right: 2px dotted #ff8a43;
    border-left: 2px dotted #ff8a43;
    width: 201px;
}
</style> 
<?php echo $this->template->contentEnd();?> 
<div class="section container-fluid padd-0">
        <div class="slider" slide-interval="30000">
            <div class="slide active">
                <div class="slide-img" img-src="<?php echo $theme_url?>/images/consumables.jpg"></div>
				<div class="substrate2"></div>
                <div class="slide-text2">
                    <h1>TERANEX, an intelligent assistant</br>for all your machine needs</h1>
					<h2>
						<span class="header-span">
							<span><span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span> Accessible</span>
							<span><span class="circle"> </span> affordable</span>
							<span><span class="circle"> </span> convenient</span>
						</span>
					</h2>
                   <!-- <p>For your page</p> -->
                </div>
            </div>
            <div class="slide">
                <div class="slide-img" img-src="<?php echo $theme_url?>/images/dig-mfg1.png">
				</div>
                 <!-- <div class="substrate"></div> -->
				 <div class="substrate2"></div>
                <div class="slide-text2">
                    <h1>At TERANEX, we match solutions</br>to our customer needs</h1>
					<h2>
						<span class="header-span">
							<span><span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span>research</span>
							<span><span class="circle"> </span>analytics</span>
							<span><span class="circle"> </span>consulting</span>
						</span>
					</h2>
                   <!-- <p>For your page</p> -->
                </div>
            </div>
            <div class="slide">
                <div class="slide-img" img-src="<?php echo $theme_url?>/images/used-machines222.jpg"></div>
                 <!-- <div class="substrate"></div> -->
				 <div class="substrate2"></div>
                 <div class="slide-text2">
                   <!--   <h1>TERANEX, a one stop for all your machine needs </h1> -->
					<h1>TERANEX, an eco-system for all</br>your manufacturing needs</h1>
                   <h2>
					<span class="header-span">
						<span><span class="circle" style="margin: 0; margin-bottom: 5px; margin-right: 10px;"> </span> open</span>
						<span><span class="circle"> </span> transparent</span>
						<span><span class="circle"> </span> distributed</span>
					</span>
					</h2>
                 </div>
            </div>
           <div class="slide-pre"></div>
            <div class="slide-next"></div>
        </div>
</div>
<section style="">
<div class="container" style="background: #f9f9f9; position:relative;  margin-top: 30px;">
	<center class="pad-0-0-10"><h1>Explore the Marketplace</h1></center>
	<div class="col-sm-12 col-xs-12" style="position: relative;left: 22px;">
	  <div class="col-sm-2 col-xs-12" style="padding-top:12.5%;">
		<div class="ico-tiles m" style="position:relative;right: -73px;top:26px;">
			<h3 style="border-top: 2px dotted #ff8a43; padding-top: 20px;">Finance</h3>
			<h3>Software</h3>
			<h3>Time Study</h3>
			<h3>Live Demo</h3>
			<h3>Live Video chat</h3>
			<h3>Technical Specifications</h3>
			<h3 style="border-bottom: 2px dotted #ff8a43; padding-bottom: 20px;">Live Machine Inspection</h3>
		</div>
	  </div>
	<div class="col-sm-2 col-xs-12" style="margin-top: 8.3%;position: relative;top: 277px;bottom: 0;right: -77px;">
		<div style="border-top: 2px dotted #ff8a43;position: relative;top: 0;"></div>
		<!--<img src="<?php echo $theme_url?>/images/return-arrow43.png" style="height: 348px;"/> -->
	</div>
	<div class="col-sm-3 col-xs-12">
		<div class="ico-tiles">
			<div class="row">
			  <div class="col-sm-offset-1 col-sm-11 col-xs-12">
				<a target="_blank" href="<?php echo site_url();?>ecommerce/product-category/toolings/">
				  <div>
					<img src="<?php echo $theme_url?>/css/marketplace/wrench.png">
				  </div>
					   <h3>Toolings</h3>
					   <p>Toolings are a the key to outstanding applications and superior part quality.</p>
					   <div class="col-sm-6" style="border-right:1px solid #ff8a43; height:63px"></div>
					   <div class="col-sm-6"></div>
				</a>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-offset-1 col-sm-11 col-xs-12" style="padding: 20px;">
				<a target="_blank" href="<?php echo site_url();?>machine">
					<div>
						<img src="<?php echo $theme_url?>/css/marketplace/machine.png">
					</div>
					<h3>Machines</h3>
					<p style="opacity: 1;">Used machines are a cost effective way to enter the industry.</p>
					<div class="col-sm-6" style="border-right:1px solid #ff8a43; height:63px"></div>
					<div class="col-sm-6"></div>
				</a>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-offset-1 col-sm-11 col-xs-12">
				<a target="_blank" href="<?php echo site_url();?>ecommerce/product-category/spare-parts/">
				  <div>
					<img src="<?php echo $theme_url?>/css/marketplace/car-parts.png">
				  </div>
					   <h3>Spares</h3>
					   <p>Spare parts are an essential part of the daily use of machines.</p>
				</a>
			  </div>
			</div>
		</div>
	</div>
	<div class="col-sm-2"style="padding-top: 11.5%;position: relative;left: -31px;top: 42px;">
		<img src="<?php echo $theme_url?>/images/return-arrow34.png" style="height: 389px;" />
	</div>
	<div class="col-sm-3 col-xs-12" style="padding-top: 99px;position: relative;left: -106px;">
		<div class="ico-tiles">
			<div class="row">
			  <div class="col-sm-12 col-xs-12">
				<a target="_blank" href="<?php echo site_url();?>remotetraining">
				  <div>
					<img src="<?php echo $theme_url?>/css/marketplace/eacadmy.png">
				  </div>
					   <h3>Remote training</h3>
					   <p>Programming services take overload burden from your programming office.</p>
				</a>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-12 col-xs-12" style="margin-top: 12px;">
				<a target="_blank" href="<?php echo site_url();?>remoteapplication/">
				  <div>
					<img src="<?php echo $theme_url?>/css/marketplace/training.png">
				  </div>
					   <h3>Remote Application Consulting</h3>
					   <p>Subcontracting expands the product range to offer to your markets.</p>
				</a>
			  </div>
			</div>
			<div class="row">
			  <div class="col-sm-12 col-xs-12" style="margin-top: 8px;">
				<a target="_blank" href="<?php echo site_url();?>consultant">
				  <div>
					<img src="<?php echo $theme_url?>/css/marketplace/support.png">
				  </div>
					   <h3>Remote Machine Service</h3>
					   <p>Remote technical service production.</p>
				</a>
			  </div>
			</div>
		</div>
	</div>
	</div>
	</div>
</section>
<!--<section>
    <div class="container padd-0">
        <div class="col-sm-12 padd-0">
           <h1 class="text-center">Market intelligence</h1>
			<div class="row">
			  <div class="col-sm-4 col-xs-12">
				<div class="gray-bg1">
				 <a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
				 <img src="<?php echo $theme_url?>/images/123.jpg" class="img-responsive">
				 <h2 class="text-center h2-tag">Research</h2>
				 </a>
				</div>
			  </div>
			  <div class="col-sm-4 col-xs-12">
				<div class="gray-bg1">
				 <a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
				 <img src="<?php echo $theme_url?>/images/1234.jpg" class="img-responsive">
				 <h2 class="text-center h2-tag">analytics</h2>
				 </a>
				</div>
			  </div>
			  <div class="col-sm-4 col-xs-12">
				<div class="gray-bg1">
				 <a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
				 <img src="<?php echo $theme_url?>/images/12435.jpg" class="img-responsive">
				 <h2 class="text-center h2-tag">consulting</h2>
				 </a>
				</div>
			  </div>
			</div>
		</div>
    </div>
</section>-->
<section>
    <div class="container padd-0">
        <div class="col-sm-12 padd-0">
           <h1 class="text-center">Collaboration</h1>
			<div class="row">
			  <div class="col-sm-4 col-xs-12">
				<div class="gray-bg1">
				 <a target="_blank" href="<?php echo site_url();?>community/forum">
				 <img src="<?php echo $theme_url?>/images/comm3.jpg" class="img-responsive">
				 <h2 class="text-center h2-tag">Focus Groups</h2>
				 </a>
				</div>
			  </div>
			  <div class="col-sm-4 col-xs-12">
				<div class="gray-bg1">
				 <a target="_blank" href="<?php echo site_url();?>groupbuying">
				 <img src="<?php echo $theme_url?>/images/comm2.jpg" class="img-responsive">
				 <h2 class="text-center h2-tag">Buyer Groups</h2>
				 </a>
				</div>
			  </div>
			  <div class="col-sm-4 col-xs-12">
				<div class="gray-bg1">
				 <a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
				 <img src="<?php echo $theme_url?>/images/123.jpg" class="img-responsive">
				 <h2 class="text-center h2-tag">Xperts Connect</h2>
				 </a>
				</div>
			  </div>
			</div>
		</div>
    </div>
</section>
<section class="other-section other-section-10 dark">
	<div class="container padd-0" style="background-image: url(https://www.braincert.com/images/blur-bg4.jpg); margin-top:30px">
	<div class="col-sm-12" style="padding:29px 0">
		<center>
			<h1 class="white-text">TERANEX Market Intelligence Portfolio</h1>
			<p class="white-text">Teranex offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting <br/> undertakes proactive collaboration with clients to identify new opportunities, new customers and sources of incremental revenues. </p>
		</center>
		<div>
			<ul class="tab-widget icon-tab tab-pd">
				<li>
					<a target="_blank" href="<?php echo site_url();?>research/" data-tb="#service-tab-1" class="flex-cc">
					<i class="fa fa-search" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Research</h3>
				</li>
				<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
				<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon" data-tb="#service-tab-2" class="flex-cc">
					<i class="fa fa-line-chart" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Analytics</h3>
				</li>
				<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
				<li>
					<a target="_blank" href="<?php echo site_url();?>pages/commingsoon" data-tb="#service-tab-3" class="flex-cc">
					<i class="fa fa-users" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Consulting</h3>
				</li>
				<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
				<li>
					<a target="_blank" href="<?php echo site_url();?>mediacenter" data-tb="#service-tab-4" class="flex-cc">
					<i class="fa fa-video-camera" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Media</h3>
				</li>
				<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
				<li><a target="_blank" href="<?php echo site_url();?>events" data-tb="#service-tab-5" class="flex-cc">
					<i class="fa fa-calendar" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Live Events</h3>
				</li>
				<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
				<li><a target="_blank" href="<?php echo site_url();?>pages/commingsoon" data-tb="#service-tab-6" class="flex-cc">
					<i class="fa fa-picture-o" aria-hidden="true"></i></a>
					<h3 class="fs16 bold-2 mr-t-10">Snapshots</h3>
				</li>
			</ul>
		</div>
	</div>
	</div>
</section>
<section>
<div class="container padd-0" style="margin-top:30px">
<div class="counter"style="background: #f9f9f9;">
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
</div>
</section>
<!--<section>
	<div class="container padd-0 media-sec" style="margin-top:30px;">
			<div class="row">
			  <div class="col-sm-6 col-xs-12">
				<div class="gray-bg1" style="position: relative;">
				 <a target="_blank" href="<?php echo site_url();?>mediacenter">
				 <img src="<?php echo $theme_url?>/images/news3.jpg" class="img-responsive">
				 <div class="head2">
					<h2 class="text-center h2-tag">Media</h2>
				 </div>
				 </a>
				</div>
			  </div>
			  <div class="col-sm-6 col-xs-12">
				<div class="gray-bg1" style="position: relative;">
				 <a target="_blank" href="<?php echo site_url();?>events">
				 <img src="<?php echo $theme_url?>/images/liveStream11.jpg" class="img-responsive">
				 <div class="head2">
				 <h2 class="text-center h2-tag">Live Events</h2>
				 </div>
				 </a>
				</div>
			  </div>
			</div>
	</div>
</section> -->
<section class="testimonial">
<div class="container padd-0">
	<div class="row">
		<div class="col-sm-12">
        <h1 class="text-center">Testimonials</h1>
        <!--  <div class="seprator"></div> -->
            <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
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
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
                     <img src="<?php echo $theme_url?>/images/t2.jpg" class="img-responsive" height="auto">
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
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
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
                    <div class="col-sm-6">
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
<script  src="<?php echo $theme_url;?>/js/scrollheader.js"></script>
<script src="<?php echo $theme_url;?>/slider/js/slider.js"></script> 
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
<?php echo $this->template->contentEnd(); ?> 