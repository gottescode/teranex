<?php $this->template->contentBegin(POS_TOP);?>
<link href="<?php echo $theme_url?>/css/scrollheader.css" rel="stylesheet" type="text/css">
<style>  
.bg-primary {
    color: #fff;
    background-color: #353537;
}
.footer-bars {
    background-color: #353537;
    padding: 5px 0px;
}
.form-control:focus {
    border-color: #ff8a43;
    outline: 0;
    -webkit-box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px rgba(102,175,233,.6);
    box-shadow: inset 0 1px 1px rgba(0,0,0,.075), 0 0 8px #ff8a43bf;
}
.form-control-ser {
    background-color: #fff0;
    box-shadow: inset 0 0 0px 1px #fff0;
}
.navbar-form .btn-link {
    font-weight: 400;
    color: #929292;
    border-radius: 0;
}
.padd-top50{padding-top:50px}

h1 {
    font-family: 'Ciutadella';
    color: #000000;
    font-size: 36px;
    line-height: 62px;
    font-weight: 700;
}
h2{
   font-family: 'Ciutadella';
    color: #000000;
    font-weight: bold;
}
.marketPlace-heading{margin-bottom:35px; font-size:16px;}
.academy{font-size: 16px;}
.addmore-btn{
    border-radius: 0px;
    background-color: #ff8a43;
    color: #FFF;
    padding: 5px 15px;
    border: none;
}
.addmore-btn:hover {
    border-radius: 0px;
    background-color: #FFF; 
    color:#ff8a43;
    padding: 5px 15px;
    border: 1px solid #ff8a43;
}
.slide h1{color:#353537;}
input#newsletter {
    padding: 1px 12px;
}
.newsl-btn {
    border-radius: 0px;
    height: 30px;
    background-color: #ff8a43;
    color: #FFF;
    margin-left: -5px;
    /* line-height: 0; */
}
.newsl {
    border-radius: 0px;
    height: 30px;
}
.sec-bg{padding-top:50px;  float: left; width: 100%;}
@media screen and (min-width:768px){
  .Marketplace {border-right:1px solid #a0a0a0; border-left:1px solid #a0a0a0;}
}
.digital-mfg{}
.ar-set, .ar-set2{position: relative;}
.ar-set{left: 40px; z-index: 99;}
.ar-set2{right: 40px; z-index: 99;}
@media screen and (min-width:1024px){
  .paddsec{padding-top:4%}
}
@media screen and (min-width:1349px){
  .paddsec{padding-top:7%}
}
@media screen and (min-width:2304px){
  .paddsec{padding-top:9%}
}
/*counter*/

.counter {
	background: #353537;
    padding: 20px 0;
}
.count
{
  color: #ffffff;
  text-align: center;
  margin:0;
  line-height: 40px;
}
.counter .text-center{margin:0;    color: #ffffff;}
/*End Counter*/

/*testimonial*/
.testimonial{background:#f9f9f9; padding-bottom:38px;}
.testimonial .item{background: #fff;}
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
    background-color: #373d4b38 !important;
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
    top: 45%;
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
</style> 
<?php echo $this->template->contentEnd(); ?> 
<div class="section">
        <div class="slider" slide-interval="6000">
            <div class="slide active">
                <div class="slide-img" img-src="<?php echo $theme_url?>/images/bnr.jpg"></div>
                <div class="slide-text">
                    <h1>TeraneX, an intelligent assistant<br> for all your machine needs </h1>
                   <!-- <p>For your page</p> -->
                </div>
            </div>
      
          <!--  <div class="slide">
                <div class="slide-img" img-src="<?php echo $theme_url?>/images/used-machines.jpg"></div>
                <div class="substrate"></div>
                <div class="slide-text">
                    <h1>TeraneX, we match  solutions<br>to ours customers needs </h1>
                </div>
            </div>
            <div class="slide">
                <div class="slide-img" img-src="<?php echo $theme_url?>/images/banner-1.jpg"></div>
                <div class="substrate"></div>
                <div class="slide-text">
                    <h1>TeraneX, a one stop for all<br> your machine needs </h1>
                </div>
            </div>
            <div class="slide-pre"></div>
            <div class="slide-next"></div> -->
        </div>
    </div>
<section class="counter">
<div class="container">
<div class="col-sm-12">
<div class="col-sm-3">
	<h1 class="count">11111</h1>
	<h3 class="text-center">No. of users</h3>
</div>
<div class="col-sm-3">
	<h1 class="count">22222</h1>
	<h3 class="text-center">% of industry participation</h3>
</div>
<div class="col-sm-3">
	<h1 class="count">33333</h1>
	<h3 class="text-center">no. of transaction volumes</h3>
</div>
<div class="col-sm-3">
	<h1 class="count">44444</h1>
	<h3 class="text-center">no. of interactions</h3>
</div>
</div>
<div style="clear:both"></div>
</div>
</section>
<section style="padding-bottom: 20px; background: #f9f9f9;">
  <center><h1>Explore the Marketplace</h1></center>
  <div class="clearfix"></div>
<div class="container1">
<div class="col-sm-4 col-xs-12">
<center>
  <div class="row">
        <h2>Machines & Supplies</h2>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Machines1">
           <h3>Machines<br/><br/></h3>
           <p>Used machines are a cost effective<br> way to enter the industry.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Spares1">
           <h3>Spares<br/><br/></h3>
           <p>Spare parts are an essential part of<br> the daily use of machines.</p>
        </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Toolings1">
           <h3>Toolings</h3>
           <p>Toolings are a the key to outstanding <br>applications and superior part quality.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Software1">
           <h3>software</h3>
           <p>Application services help to <br>master new design challenges.</p>
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
    	<a href="<?php echo site_url()."eacademy"?>" class="Cloud">
           <h3>Remote Programming</h3>
           <p>Programming services take overload burden from your programming office.</p>
        </a>
        <!-- <a href="<?php echo site_url()."eacademy"?>" target="_blank" class="eacademy">
           <h3 style="    text-transform: initial;">eAcademy<br/><br/></h3>
           <p>Trainings bring your staff to maximum productivity and increase efficiency</p>
        </a> -->
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Remote-serv">
           <h3>Remote Machine Service</h3>
           <p>Remote technical service production.</p>
        </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Digital">
           <h3>Remote Application Service</h3>
           <p>Subcontracting expands the product<br> range to offer to your markets.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Remote">
           <h3>Remote Monitoring & Control</h3>
           <p>Use your machine data to <br>drive business decisions</p>
        </a>
  </div>

</div>
</div>
</div>
<div class="col-sm-4 col-xs-12 ">
<center>
  <div class="row">
        <h2>Value Net</h2>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="<?php echo site_url()?>community/forum/" class="Machines">
           <h3>user communities<br/><br/></h3>
           <p>Used machines are a cost effective<br> way to enter the industry.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Spares">
           <h3>collaboration groups<br/><br/></h3>
           <p>Spare parts are an essential part of<br> the daily use of machines.</p>
        </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6">
   <!-- <a href="<?php echo site_url()."consultant"?>" class="Toolings">
           <h3>expert connect</h3>
           <p>Toolings are a the key to outstanding <br>applications and superior part quality.</p>
        </a>-->
		<a href="<?php echo site_url()."eacademy"?>" target="_blank" class="eacademy">
           <h3 style="    text-transform: initial;">eAcademy<br/><br/></h3>
           <p>Trainings bring your staff to maximum productivity and increase efficiency</p>
        </a> 
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Software">
           <h3>industry events</h3>
           <p>Application services help to <br>master new design challenges.</p>
        </a>
  </div>
</div>
</div>
</div>
</div>
</section>

<!--<section>
	<a href="<?php echo site_url()."pages/about";?>">
	 <img src="<?php echo $theme_url?>/images/mediaBanner.jpg" class="img-responsive"height="250px" width="100%">
	</a>
</section> -->
<section>
  <div class="container-fluid padd-0">
        <div class="col-sm-12 row-flex padd-0">
          <div class="col-sm-3 col-xs-12">
            <h1 style="">teraneX media</h1>
            <a style="color:#ff8a43;">See more  &nbsp;&nbsp;<span><i class="fa fa-arrow-right"></i></span></a>
          </div>
          
          <div class="col-sm-9 col-xs-12 padd-0">
            <img src="<?php echo $theme_url?>/images/mediaBanner.jpg" class="img-responsive"height="250px" width="auto">
          </div>
      
        </div>
    </div>
</section>
<section class="testimonial">
<div class="container">
	<div class="row">
		<div class="col-sm-12">
        <h1>Testimonials</h1>
        <div class="seprator"></div>
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
                     <img src="<?php echo $theme_url?>/images/person1.jpg" class="img-responsive" height="auto">
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
                     <img src="<?php echo $theme_url?>/images/person2.jpg" class="img-responsive" height="auto">
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
  $('.count').each(function () {
    $(this).prop('Counter',0).animate({
        Counter: $(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            $(this).text(Math.ceil(now));
        }
    });
});
</script>
<?php echo $this->template->contentEnd(); ?> 