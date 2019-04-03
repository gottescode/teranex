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
.testimonial{background:#fff; margin-bottom: 30px;}
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
.gray-bg1{background:#f9f9f9;    margin-bottom: 20px;}
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
<div class="container" style="background: #f9f9f9; padding-bottom: 20px;    margin-top: 30px;">
  <center><h1>Explore the Marketplace</h1></center>
<div class="col-sm-4 col-xs-12">
<center>
  <div class="row">
        <h2>Machines &amp; Supplies</h2>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a target="_blank" href="<?php echo site_url();?>machine">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/machine.png">
	  </div>
           <h3>Machines</h3>
           <p>Used machines are a cost effective way to enter the industry.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a target="_blank" href="<?php echo site_url();?>ecommerce/product-category/spare-parts/">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/car-parts.png">
	  </div>
           <h3>Spares</h3>
           <p>Spare parts are an essential part of the daily use of machines.</p>
        </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a target="_blank" href="<?php echo site_url();?>ecommerce/product-category/toolings/">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/wrench.png">
	  </div>
           <h3>Toolings</h3>
           <p>Toolings are a the key to outstanding applications and superior part quality.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a target="_blank" href="https://gotteswork.com/ecommerce/product-category/raw-material/">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/monitor.png">
	  </div>
           <h3>Raw Materials</h3>
           <p>Application services help to master new design challenges.</p>
        </a>
  </div>
</div>
</div>
</div>

<div class="col-sm-4 col-xs-12 Marketplace">
<center>
  <div class="row">
        <h2>Remote Services</h2>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
    	<a target="_blank" href="<?php echo site_url();?>remotetraining">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/eacadmy.png">
	  </div>
           <h3>Remote training</h3>
           <p>Programming services take overload burden from your programming office.</p>
        </a>
        <!-- <a href="<?php echo site_url();?>eacademy" target="_blank" class="eacademy">
           <h3 style="    text-transform: initial;">eAcademy<br/><br/></h3>
           <p>Trainings bring your staff to maximum productivity and increase efficiency</p>
        </a> -->
  </div>

  <div class="col-sm-6 col-xs-6">
    <a target="_blank" href="<?php echo site_url();?>consultant">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/support.png">
	  </div>
           <h3>Remote Machine Service</h3>
           <p>Remote technical service production.</p>
        </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6">
   <!-- <a target="_blank" href="<?php echo site_url();?>consultant/remoteapp_service">-->
    <a target="_blank" href="<?php echo site_url();?>remoteapplication/">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/training.png">
	  </div>
           <h3>Remote Application consulting</h3>
           <p>Subcontracting expands the product range to offer to your markets.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a target="_blank" href="<?php echo site_url();?>remoteprogramming">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/server.png">
	  </div>
           <h3>Remote programming</h3>
           <p>Use your machine data to drive business decisions</p>
        </a>
  </div>

</div>
</div>
</div>
<div class="col-sm-4 col-xs-12 ">
<center>
  <div class="row">
        <h2>collaboration services</h2>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
     <a target="_blank" href="<?php echo site_url();?>community/forum">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/teamwork.png">
	  </div>
           <h3>Focus Group</h3>
           <p>Used machines are a cost effective way to enter the industry.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a target="_blank" href="<?php echo site_url();?>groupbuying/groupbuying/groupbuying">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/network.png">
	  </div>
           <h3>group buying</h3>
           <p>Spare parts are an essential part of the daily use of machines.</p>
        </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6">
	<a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/eacadmy.png">
	  </div>
      <h3>Makers group</h3>
      <p>Trainings bring your staff to maximum productivity and increase efficiency</p>
    </a> 
  </div>

  <div class="col-sm-6 col-xs-6">
     <a target="_blank" href="<?php echo site_url();?>events">
	  <div>
		<img src="<?php echo $theme_url?>/css/marketplace/training.png">
	  </div>
           <h3>live events</h3>
           <p>Application services help to master new design challenges.</p>
        </a>
  </div>
</div>
</div>
</div>
</div>
</section>
 
<section>
    <div class="container padd-0">
        <div class="col-sm-12 padd-0">
           <h1 class="text-center">Market intelligence</h1>
		   <div class="row">
          <div class="col-sm-4 col-xs-12">
			<div class="gray-bg1">
			 <a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
             <img src="<?php echo $theme_url?>/images/123.jpg" class="img-responsive">
			 <h2 class="text-center h2-tag">Market Research</h2>
			 </a>
			</div>
          </div>
          <div class="col-sm-4 col-xs-12">
			<div class="gray-bg1">
			 <a target="_blank" href="<?php echo site_url();?>pages/commingsoon">
             <img src="<?php echo $theme_url?>/images/1234.jpg" class="img-responsive">
			 <h2 class="text-center h2-tag">Business analytics</h2>
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
</section>
<section>
  <div class="container padd-0">
		  <h1 class="text-center mar-0-0-10"><span style="text-transform:lowercase">m</span>Academy</h1>
          <div class="col-sm-12 col-xs-12 padd-0">
            <img style="height:453px; width:100%;" src="<?php echo $theme_url?>/images/21212.jpg" class="img-responsive">
			<div class="sec-img-heading">
				<div class="sec-img-content text-right" style="right:3%;top:48%">
				<h1>digital Training platform</h1>
				<p>Used machines are a cost effective way to enter the industry.</p>
				<a target="_blank" href="<?php echo site_url();?>eacademy" class="btn btn-see-more pull-right"> See More</a>
				</div>
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