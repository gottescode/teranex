<?php $this->template->contentBegin(POS_TOP);?>
<link href="<?php echo $theme_url?>/css/scrollheader.css" rel="stylesheet" type="text/css">
<style>  

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
.slide h1{color:#fff;}
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

</style> 
<?php echo $this->template->contentEnd(); ?> 
<div class="section">
        <div class="slider" slide-interval="6000">
            <div class="slide active">
                <div class="slide-img" img-src="<?php echo $theme_url?>/images/used-machines.jpg"></div>
                <div class="substrate"></div>
                <div class="slide-text">
                    <h1>TeraneX, an ecosystem for<br> all your machine needs </h1>
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
    	<!-- <a href="#" class="Cloud">
           <h3>Remote Programming</h3>
           <p>Programming services take overload burden from your programming office.</p>
        </a> -->
        <a href="<?php echo site_url()."eacademy"?>" target="_blank" class="eacademy">
           <h3 style="    text-transform: initial;">eAcademy<br/><br/></h3>
           <p>Trainings bring your staff to maximum productivity and increase efficiency</p>
        </a>
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
    <a href="<?php echo site_url()."consultant"?>" class="Toolings">
           <h3>expert connect</h3>
           <p>Toolings are a the key to outstanding <br>applications and superior part quality.</p>
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
<section>
  <div class="container-fluid padd-0">
        <div class="col-sm-12 row-flex padd-0">
          <div class="col-sm-3 col-xs-12 padd-0 " style="padding:0px 30px;min-height: 370px;">
            <h1 style="">Manufacturing Hub</h1>
            <a style="color:#ff8a43;">See more  &nbsp;&nbsp;<span><i class="fa fa-arrow-right"></i></span></a>
          </div>
          
          <div class="col-sm-3 col-xs-12 padd-0 " style="background-color: #f9f9f9;min-height: 370px;">
            <img src="<?php echo $theme_url?>/images/cloud_programming.jpg" class="img-responsive"/>
            <div style="padding:10px 30px;">
                <h2 style="font-size: 20px;">Cloud Programming</h2>
                <p class="academy">Trainings bring your staff to maximum productivity and increase efficiency  </p>
                <span class="lern"><a href="http://localhost/wp" target="_blank">Learn more...</a></span>
            </div>
          </div>

          <div class="col-sm-3 col-xs-12 padd-0 " style=" min-height: 370px;">
            <img src="<?php echo $theme_url?>/images/additive_manufacturing.png" class="img-responsive"/>
            <div style="padding:10px 30px;">
                <h2 style="font-size: 20px;">Additive Manufacturing</h2>
                <p class="academy">Subcontracting expands the product range to offer to your markets.</p>
                <span class="lern"><a href="#" target="_blank">Learn more...</a></span>
            </div>
          </div>

          

          <div class="col-sm-3 col-xs-12 padd-0 " style="background-color: #f9f9f9;min-height: 370px;">
            <img src="<?php echo $theme_url?>/images/laser_processing.jpg" class="img-responsive "/>
            <div style="padding: 10px 30px;">
                <h2 style="text-transform: initial; font-size: 20px;">Laser Processing</h2>
                <p class="academy">Trainings bring your staff to maximum productivity and increase efficiency  </p>
                <span class="lern"><a href="<?php echo site_url()."eAcademy"?>" target="_blank">Learn more...</a></span>
            </div>
          </div>
      
        </div>
    </div>
</section>
<section>
  <div class="container-fluid padd-0">
        <div class="col-sm-12 row-flex padd-0">
          <div class="col-sm-3 col-xs-12 padd-0 " style="background-color: #f9f9f9;min-height: 370px;">
            <img src="<?php echo $theme_url?>/images/companyimg.png" class="img-responsive "/>
            <div style="padding: 10px 30px;">
                <h2 style=" font-size: 20px;">Company</h2>
                	<div class="link1" style="">
		              <ul>
		                <li><a href="<?php echo site_url()."pages/about";?>">About Us</a></li>
		                <li><a href="<?php echo site_url()."pages/contact";?>">Contact Us</a></li>
		                <li><a href="<?php echo site_url()."pages/team";?>">Team</a></li>
		              </ul>
		          </div>
            </div>
          </div>
        
          <div class="col-sm-3 col-xs-12 padd-0 " style=" min-height: 370px;">
            <img src="<?php echo $theme_url?>/images/partners.png" class="img-responsive"/>
            <div style="padding:10px 30px;">
                <h2 style="font-size: 20px;">Partners</h2>
                <div class="link1" style="">
		              <ul>
		                <li><a href="<?php echo site_url()."pages/suppliers";?>">Suppliers </a></li>
		                <li><a href="<?php echo site_url()."pages/serviceproviders";?>">Service Providers</a></li>
		                <li><a href="<?php echo site_url()."pages/market_place";?>">Marketplace</a></li>
		              </ul>
		        </div>
            </div>
          </div>

          <div class="col-sm-3 col-xs-12 padd-0 " style="background-color: #f9f9f9;min-height: 370px;">
            <img src="<?php echo $theme_url?>/images/news.jpg" class="img-responsive"/>
            <div style="padding:10px 30px;">
                <h2 style="font-size: 20px;">media center</h2>
                <p class="academy">Trainings bring your staff to maximum productivity and increase efficiency  </p>
                <span class="lern"><a href="http://localhost/wp" target="_blank">Learn more...</a></span>
            </div>
          </div>

          <div class="col-sm-3 col-xs-12 padd-0 " style="padding:0px 30px;min-height: 370px;">
            <h1 style="">Inside Teranex</h1>
            <a style="color:#ff8a43;"><span><i class="fa fa-arrow-left"></i></span> &nbsp;&nbsp;See more </a>
          </div>
      
        </div>
    </div>
  <div class="clearfix"></div>
</section>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script  src="<?php echo $theme_url;?>/js/scrollheader.js"></script>

<script type='text/javascript'>
  jQuery(document).ready(function() {
    function count($this){
      var current = parseInt($this.html(), 10);
      current = current + 1; /* Where 1 is increment */

      $this.html(++current);
      if(current > $this.data('count')){
        $this.html($this.data('count'));
      } else {
        setTimeout(function(){count($this)}, 50);
      }
    }

    jQuery(".stat-count").each(function() {
      jQuery(this).data('count', parseInt(jQuery(this).html(), 10));
      jQuery(this).html('0');
      count(jQuery(this));
    });
  });
</script>

<?php echo $this->template->contentEnd(); ?> 