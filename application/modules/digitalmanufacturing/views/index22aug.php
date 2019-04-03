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
</style>
<?php echo $this->template->contentEnd();?>
<section class="other-section other-section-10 dark explore-marketplace">
	<div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/fabrication_newhome-min.png');height: 100%;width: 100%;background-size: cover;">
		<div style="width: 100%;background-color: #000000ad">
			<div class="col-sm-12" style="padding: 30px 0;">
				<center>
					<h1 class="white-text">Remote Fabrication Services</h1>
					<p class="white-text" style="padding: 20px 0;">TERANEX offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting<br/> undertakes proactive collaboration with clients to identify new opportunities, new customers and sources of incremental revenues.</p>
				</center>
				<div>
					<ul class="tab-widget icon-tab tab-pd ">
						<li class="">
							<a target="_blank" href="<?php echo site_url();?>additivemanufacturing/additive_manufacturing/" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-cubes" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Additive Manufacturing</h3>
						</li> 
						<li class="">
							<a target="_blank" href="<?php echo site_url();?>laserprocessing/laser_processing/" data-tb="#service-tab-3" class="flex-cc">
							<i class="fa fa-download" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Laser processing</h3>
						</li>
						<li class="">
							<a target="_blank" href="<?php echo site_url();?>rapidprototyping/rapid_prototyping" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-cube" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Rapid Prototyping</h3>
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
<section>
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
</section>
<div class="clearfix"></div>
<div class="col-sm-12 feature-grey-bg">
    <center>
      <h2>Easy and Fast Way to Start Manufacturing</h2>
    </center>
	<img style="padding-bottom:10px;" src="<?php echo $theme_url?>/images/process0.png" class="img-responsive process-img">
</div>
<br/>
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

<?php echo $this->template->contentEnd(); ?> 