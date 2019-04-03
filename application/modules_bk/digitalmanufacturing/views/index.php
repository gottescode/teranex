<?php $this->template->contentBegin(POS_TOP);?>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/Landingpage.css"/> -->
<style type="text/css">
.service{
	margin-bottom: 40px;
	box-shadow: 0 7px 22px rgba(19,19,19,.24);
}
.service_info{
padding: 20px;
}
.service img{
	min-height: 200px;
}
.service p{
	text-align: justify;
	min-height: 75px;
}
.process{
	text-align: center;
    padding: 10px;
    margin-bottom: 30px;
    box-shadow:  0 0px 10px rgba(19, 19, 19, 0.10);
}
.process-img {
    padding-bottom: 10px;
    margin: 0 auto;
    width: 70%;
    filter: grayscale(100%);
}
@media (max-width: 1199px){
	.process h3{
	min-height: 56px;
}
}
.explore-marketplace .tab-widget li {
    padding: 15px 30px;
}
.explore-marketplace .tab-widget li>a {
    margin: 0 auto;
    border-radius: 0;
    background: #00000070;
    /* box-shadow: none; */
    border-bottom: 1px solid #a5c049;
}
/*css new*/
.rapid_features {
    text-align: center;
    padding: 20px;
    margin-bottom: 30px;
    box-shadow: 0 7px 22px rgba(19,19,19,.24);
}
.feature_icon i {
    color: #a5c049;
    font-size: 50px;
}
.rapid_features h3 {
    text-align: center;
}
.rapid_features p {
    text-align: justify;
    min-height: 125px;
}

</style>
<?php echo $this->template->contentEnd();?>
<section class="other-section other-section-10 dark explore-marketplace">
	<div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/fabrication_newhome-min.png');height: 100%;width: 100%;background-size: cover;">
		<div style="width: 100%;background-color: #000000ad">
			<div class="col-sm-12" style="padding: 30px 0;">
				<center>
					<h1 class="white-text">On-Demand Manufacturing</h1>
					<p class="white-text" style="padding: 20px 0;">A one-stop-shop for all your manufacturing needs. We provide you with support to design your products and help you select the best option.</p>
				</center>
				<div>
					<ul class="tab-widget icon-tab tab-pd ">
						<li class="">
							<a target="" href="<?php echo site_url();?>additivemanufacturing/additive_manufacturing/" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-cubes" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Additive Manufacturing</h3>
						</li> 
						<li class="">
							<a target="" href="<?php echo site_url();?>laserprocessing/sheetmetal_processing" data-tb="#service-tab-3" class="flex-cc">
							<i class="fa fa-download" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Sheet Metal Fabrication</h3>
						</li>
						<li class="">
							<a target="" href="<?php echo site_url();?>rapidprototyping/cnc_machining" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-cube" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">CNC Machining</h3>
						</li>
					</ul>
				</div>
			</div><div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div>
<!-- <section>
	<div class="container">
		<center><h2>Welcome to Stelmac</h2>
		<p>At Stelmac, we provide manufacturing solutions in the fields of machine tools, laser technology and electronics</p></center>
		<center><h2>Services</h2></center>
		<div class="col-sm-12 padd-0 services">
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="service">
					<img src="<?php echo $theme_url?>/images/about.jpg" class="img-responsive">
					<div class="service_info">
						<h3>Additive Manufacturing</h3>
						<p>Discover the principles and benefits of using additive manufacturing to create amazing products from 1 to 10,000 units.</p>
						<a href="<?php echo site_url()."additivemanufacturing/additive_manufacturing";?>" class="btn btn_orange">Learn More</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="service">
					<img src="<?php echo $theme_url?>/images/laser_processing.jpg" class="img-responsive">
					<div class="service_info">
						<h3>Laser Processing</h3>
						<p>Discover the principles and advantages of laser processing for models, prototypes or production</p>
						<a href="<?php echo site_url()."laserprocessing/laser_processing";?>" class="btn btn_orange">Learn More</a>
					</div>
				</div>
			</div>
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
				<div class="service">
					<img src="<?php echo $theme_url?>/images/rapid_pro_banner.jpg" class="img-responsive">
					<div class="service_info">
						<h3>Rapid Prototyping</h3>
						<p>From concept model to functional assembly, TERANEX 3D prints your prototype in 2 or 3 days.</p>
						<a href="<?php echo site_url()."rapidprototyping/rapid_prototyping";?>" class="btn btn_orange">Learn More</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section> -->
<div class="clearfix"></div>

<div class="clearfix"></div>
<!-- <section>
	<div class="container">
		<center><h2>Processes</h2></center>
		<div class="col-sm-12 padd-0">
			<?php foreach($process_list as $process) { ?> 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3><?php echo $process['process_name'];?></h3>
					<p><?php echo $process['process_description'];?></p>
				</div>
			</div>
		<?php } ?>
		</div>
	</div>
</section> -->
<!-- <section>
	<div class="container">
		<center><h2>Processes</h2></center>
		<div class="col-sm-12 padd-0">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>3D CAD Modeling </h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>CNC Punching</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>MIG Welding</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>CNC Bending</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>CNC Water Jet</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>Nesting &amp; CNC Programming</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>CNC Laser Cutting</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>Laser Marking</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>Powder Coating</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>CNC Plasma Cutting</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>Laser Welding</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
		 
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="process">
					<h3>TIG Welding</h3>
					<p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers</p>
				</div>
			</div>
				</div>
	</div>
</section> -->
<section>
	<div class="container">
		<div class="online_features">
			<center><h2>Stelmac Exclusive Online Features</h2>
			<p>CONTROL YOUR PRODUCT QUALITY, YOUR LEAD TIME AND YOUR PRICE WHILE BENEFITING FROM SUPERIOR 3D TOOLS MADE BY OUR SOFTWARE DEVELOPMENT TEAM</p></center><br>
				
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3>Choice of Materials</h3>
	                <p>You can choose from our vast range of materials with different finishing options with our 3D printers. We have a solution for all your ideas and prototypes.</p>
	            </div>
			</div>
				
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3>Best-in-Class 3D Analysis Tools</h3>
	                <p>You can upload your 3D files in over 33 file formats. Our best-in-class algorithms can automatically detect flaws and make corrections on your 3D file and give you feedback in seconds. We can work with multiple CAD file uploads and assembly with ease.</p>
	            </div>
			</div>
				
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3>Instant Quotations</h3>
	                <p>You can benefit from our rapidity in responding to RFQs. You can receive a quote, our price and turnaround instantly. We can help in saving time and help focus on the more important aspects such as your product design. </p>
	            </div>
			</div>
				<div class="clearfix"></div>
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3>Economy Plan</h3>
	                <p>With fast turn around time, express shipping options, quantity flexibility and file optimization, we assure you that we will work out the best and most economical plan for you.</p>
	            </div>
			</div>
				
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3>Mass Production</h3>
	                <p>We provide a guarantee of every unit that is fabricated.</p>
	            </div>
			</div>
				
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3>Control Our 3D Printers</h3>
	                <p>You get to control the printing by choosing the material, resolution and even the orientation. </p>
	            </div>
			</div>
					</div>
	</div>
</section>
<div class="clearfix"></div>
<style> .counter_mainrow{text-align:center;background-color:#2b3340;}
.counter_main_inner i {
vertical-align: middle;
font-size: 50px!important;
color: rgba(255, 255, 255, 0.8);
}
.counter_mainrow .counter_main_inner{
padding: 30px 0px;}
.counter_main_innerh1.counter {
font-size: 40px;
padding: 0;
font-weight: bold;
}
.counter_main_inner h1 span{
font-weight:500;
color: #fff;

}
 
.counter_main_inner h3{color:#fff;font-size:23px;}
.counter_main_inner:hover h1 span{
font-weight: 700;
color: #fff;
border-bottom: 2px solid #a5c049;
} 
.counter_main_inner{text-align:center;	}
.counter_mainrow{margin-left:0px!important;margin-right:0px!important;}
.newcp{color:#fff!important;}
.counter_mainrow { 
/* The image used */
background-image: url("http://beta.stelmac.io/themes/site/images/consumables.jpg");

/* Set a specific height */
min-height:287px;

/* Create the parallax scrolling effect */
background-attachment: fixed;
background-position: center;
background-repeat: no-repeat;
background-size: cover;
}

.counter_mainrow{position:relative}
.overlaycounter{
position: absolute;
height: 100%;
background-color: #242525;
width: 100%;
opacity: 0.6;}

 .counter_main_inner:hover i,.counter_main_inner:hover h3,.counter_main_inner:hover h1 span
{color:#a5c049;}
</style>
  <div class="row counter_mainrow" style="">
 <div class="overlaycounter"  >
</div>
<div class="col-md-12 text-center">
		<h1 class="newcp_title" style="color:#fff!important;">Our Presence</h1>
	</div>
  <div class="container">
 
    <div class="col-md-2 counter_main_inner" >
		  <i class="fa fa-industry"></i>		  
  <h1><span class="counter">110</span><span>+</span></h1>
        <h3>CNCs</h3>
    </div>
    
    <div class="col-md-2 counter_main_inner" >
		  <i class="fa fa-dashboard"></i>		  
      <h1><span class="counter">25</span><span>+</span></h1>
        <h3>CMMs</h3>
    </div>
    
    <div class="col-md-2 counter_main_inner" >
		  <i class="fa fa-globe"></i>		  
      <h1><span class="counter">10</span><span>+</span></h1>
        <h3>Cities</h3>
    </div>
    
    <div class="col-md-2 counter_main_inner" >
		  <i class="fa fa-compass"></i>		  
      <h1><span class="counter">14</span><span>+</span></h1>
        <h3>Sectors</h3>
    </div>
    
    <div class="col-md-2 counter_main_inner" >
		  <i class="fa fa-cog"></i>		  
      <h1><span class="counter">12</span><span>+</span></h1>
        <h3>Services</h3>
    </div>
    
    <div class="col-md-2 counter_main_inner" >
		  <i class="fa fa-list-ul"></i>		  
      <h1><span class="counter">25</span><span>+</span></h1>
        <h3>CAD/CAM sheets</h3>
    </div>    </div> 
 
</div> 


  

<div class="col-sm-12 feature-grey-bg">
    <center>
      <h2>Easy and Fast Way to Start Manufacturing</h2>
    </center>
	<img style="padding-bottom:10px;" src="<?php echo $theme_url?>/images/process0.png" class="img-responsive process-img">
</div>
<br/>
<?php $this->template->contentBegin(POS_BOTTOM);?>
 <script src='http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js'></script>
<script src='https://cdn.jsdelivr.net/jquery.counterup/1.0/jquery.counterup.min.js'></script>

<script>$('.counter').counterUp({
delay: 10,
time: 2000
});
$('.counter').addClass('animated fadeInDownBig');
$('h3').addClass('animated fadeIn');</script> 
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

<?php echo $this->template->contentEnd(); ?> 