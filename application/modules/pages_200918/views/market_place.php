<?php $this->template->contentBegin(POS_TOP);?>
<style>  
/* header css */ 
section{padding:0; float:left;width: 100%;}
body{background:None;}
.navbar-fixed-top{border-bottom: none;}
.navbar-fixed-top.scrolled {
    border-bottom: 1px solid #000;
}
.nav>li>a:focus, .nav>li>a:hover {
    text-decoration: none;
    background-color: #eee0;
}
.nav>li>a {
    position: relative;
    display: block;
    padding: 10px 15px;
    color: #fff;
    font-size: 16px;
}
  .navbar-fixed-top.scrolled {
  background-color: #fff !important;
  transition: background-color 200ms linear;
}
.nav .open>a, .nav .open>a:focus, .nav .open>a:hover {
    background-color: #eee0;
    border-color: #337ab7;
}
.bg-primary {
    color: #fff;
    background-color: #337ab700;
}
.scrolled li a {color:#777}
.navbar-form .btn-link {
    font-weight: 400;
    color: #ffffff;
    border-radius: 0;
}
.form-control-ser{
  background-color: #fff0;
    box-shadow: inset 0 0 0px 1px #fff;}
.trans{display:block}
.non-trans{display:none}
.header-bradcome{margin-top:0px;} 
/*end header */ 

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
<section style="padding: 50px 0; background: #f9f9f9;">
<div class="container1">
<!-- <div class="col-sm-4 col-xs-12">
<center>
  <div class="row">
        <h1>marketplace</h1>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Machines1">
           <h3>Machines</h3>
           <p>Used machines are a cost effective<br> way to enter the industry.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Spares1">
           <h3>Spares</h3>
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
</div> -->
<div class="col-sm-6 col-xs-12 Marketplace" style="border-left: none;">
<center>
  <div class="row">
        <h1>forum</h1>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="<?php echo site_url()?>community/forum/" class="Machines">
           <h3>user communities</h3>
           <p>Used machines are a cost effective<br> way to enter the industry.</p>
        </a>
  </div>

  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Spares">
           <h3>collaboration groups</h3>
           <p>Spare parts are an essential part of<br> the daily use of machines.</p>
        </a>
  </div>
</div>
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Toolings">
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
<div class="col-sm-6 col-xs-12">
<center>
  <div class="row">
        <h1>Remote Services</h1>
        <p class="marketPlace-heading">Get inspired to build your business</p>
    </div>
</center>
<div class="ico-tiles">
<div class="row">
  <div class="col-sm-6 col-xs-6">
    <a href="#" class="Cloud">
           <h3>Remote Programming</h3>
           <p>Programming services take overload burden from your programming office.</p>
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
</div>
</section>
<section>
  <div class="container-fluid padd-0">
    <div class="col-sm-12 row-flex padd-0">
      <div class="col-sm-6 col-xs-12 padd-0">
        <img src="<?php echo $theme_url?>/images/eacademy.jpg" class="img-responsive pull-right"/>
      </div>
      <div class="col-sm-6 col-xs-12 padd-0 paddsec"style="padding-left: 50px;">
        <h2>TeraneX eAcademy</h2>
        <p class="academy">Trainings bring your staff to maximum productivity and increase efficiency  </p>
        <span class="lern"><a href="<?php echo site_url()."eAcademy"?>" target="_blank">Learn more...</a></span>
      </div>
        </div>
    </div>
</section>
<section>
  <div class="container-fluid padd-0">
    <div class="col-sm-12 padd-0 row-flex ">
      <div class="col-sm-6 col-xs-12 padd-0 text-right paddsec"style="padding-right: 50px;">
        <h2>Digital Manufacturing</h2>
        <p class="academy">Subcontracting expands the product range to offer to your markets.</p>
        <span class="lern"><a href="#" target="_blank">Learn more...</a></span>
      </div>
      <div class="col-sm-6 col-xs-12 padd-0">
        <img src="<?php echo $theme_url?>/images/Capture9.jpg" class="img-responsive pull-left"/>
      </div>
        </div>
    </div>
</section>
<section>
  <div class="container-fluid padd-0">
    <div class="col-sm-12 padd-0 row-flex ">
      <div class="col-sm-6 col-xs-12 padd-0">
        <img src="<?php echo $theme_url?>/images/news.jpg" class="img-responsive pull-right"/>
      </div>
      <div class="col-sm-6 col-xs-12 padd-0 paddsec" style="padding-left: 50px;">
        <h2>media center</h2>
        <p class="academy">Trainings bring your staff to maximum productivity and increase efficiency  </p>
        <span class="lern"><a href="http://localhost/wp" target="_blank">Learn more...</a></span>
      </div>
        </div>
    </div>
</section>
<section>
  <div class="container-fluid padd-0">
<div id="carousel-example-generic1" class="carousel slide pull-left" data-ride="carousel">
  <!-- Indicators -->
<div class="col-sm-12 row-flex news-txt padd-0">
    <div class="ar-set ">
    
    <a class="left" href="#carousel-example-generic1" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>      </a> <br>
   </div>
   
   <div class="col-xs-12 col-sm-12 pull-left news-txt news-bg-col">
   <div class="carousel-inner" role="listbox">
      <div class="item next left">
    <div class="col-sm-12 row-flex padd-0"style="border: 1px solid #e0e0e0;">
      <div class="col-sm-6"style="padding: 0 5%;">
        <h2 style="padding-top: 20%;">Blechexpo exhibition</h2>
        <h4> Blechexpo exhibition will be held from 7th to 10th November 2017 in Stuttgart, Germany.
        </h4>
        <span class="lern"><a href="http://www.blechexpo-messe.de/en" target="_blank">Learn more...</a></span>
      </div>
      <div class="col-sm-6 news-txt">
        <img src="<?php echo $theme_url?>/images/bending-tools1.jpg" class="image img-responsive" height="200px" width="735px"/>
      </div>
     </div>
    </div>
      <div class="item active left">
    <div class="col-sm-12 row-flex padd-0"style="border: 1px solid #e0e0e0;">
      <div class="col-sm-6"style="padding: 0 5%;">
        <h2 style="padding-top:20%;">Blechexpo exhibition</h2>
        <h4> Blechexpo exhibition will be held from 7th to 10th November 2017 in Stuttgart, Germany.
        </h4>
        <span class="lern"><a href="http://www.blechexpo-messe.de/en" target="_blank">Learn more...</a></span>
      </div>
      <div class="col-sm-6 news-txt">
        <img src="<?php echo $theme_url?>/images/bending-tools1.jpg" class="image img-responsive" height="200px" width="735px"/>
      </div>
    </div>
    </div>
     </div>
   </div>
  <div class="ar-set2 news-txt">
    <a class="right " href="#carousel-example-generic1" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>      </a>   <br>
 </div>
  </div>
 
</div>
</div>
<div class="clearfix"></div>
</section>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type='text/javascript'>
$(function () {
  $(document).scroll(function () {
    var $nav = $(".navbar-fixed-top");
    $nav.toggleClass('scrolled', $(this).scrollTop() > $nav.height());
  });
});
</script>
<script>
$(document).ready(function(){
  $(".logo-hide").hide();
  $("span.icon-bar.non-trans").hide();
});

$(window).scroll(function() {

    if ($(this).scrollTop()>90)
     {
        $('.trans').hide();
        $('.non-trans').show();
    $(".logo-hide").show();
     }
    else
     {
      $('.non-trans').hide();
      $('.trans').show();
    $(".logo-hide").hide();
     }
 }); 
</script>

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