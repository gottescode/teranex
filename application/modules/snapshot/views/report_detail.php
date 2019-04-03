<?php $this->template->contentBegin(POS_TOP);?>
<?php $this->template->contentEnd();  ?> 
<div class="container" style="margin-top: 80px;">
  <div class="">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/groupbuying.jpg" alt=" ">
  </div>
</div>
<div class="container">
    <center><h1>Category name</h1></center>
    <div class="col-sm-12 padd-0">
    	<div class="col-sm-3">
    		<div class="gray_bg">
	      		<h3 class="padd_5">Categories</h3>
	      	</div>
		  	<ul class="report_category">
			    <li class="active" style="display: none;padding: 0;"><a href="#"></a></li>
			    <li><a href="#home">Category1</a></li>
			    <li><a href="#menu1">Category2</a></li>
			    <li><a href="#menu2">Category3</a></li>
			    <li><a href="#menu3">Category4</a></li>
		  	</ul>
	  	</div>
	  	<div class="col-sm-7 padd-0">
		  	<div class="report_cat_details">
			    
			    <div id="" class="">
			      	<div class="row" style="margin-top: 20px;">
						<div class="col-sm-2">
							<img src="http://192.168.0.104/teranex/uploads/customer/user-default.png" class="img-responsive" style="width:100px">
						</div> 
						<div class="col-sm-10">
							<a href="<?php echo site_url();?>research/report_detail">Automotive Data Analytics Market: By End-User (OEM, After-Market & Insurance); By Type (Software, Services); By Deployment Type (Cloud & On-Premise); By Application (Sales & Marketing, Customer Behaviour & Management & Others) & By Geography - Forecast (2018-2023)</a>
							<p>Updated on: 27 November, 2017 | Price: $4250</p>			
						</div>
					</div>    
					<div class="report_desc">
						<ul class="nav nav-tabs desc_tab">
						    <li class="active"><a data-toggle="tab" href="#r1">Report Description</a></li>
						    <li><a data-toggle="tab" href="#r2">Table of contents</a></li>
						    <li><a data-toggle="tab" href="#r3">Table and figures</a></li>
						    <li><a data-toggle="tab" href="#r4">Customization Options</a></li>
						</ul>
						<div class="tab-content">
						    <div id="r1" class="tab-pane fade in active">
						      	<h3>HOME</h3>
						      	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
					    	</div>
					    	<div id="r2" class="tab-pane fade">
						      	<h3>Menu 1</h3>
						      	<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
					    	</div>
					    	<div id="r3" class="tab-pane fade">
						      	<h3>Menu 2</h3>
						      	<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
					    	</div>
					    	<div id="r4" class="tab-pane fade">
						      	<h3>Menu 3</h3>
						      	<p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
						    </div>
						</div>
					</div>  	
			    </div>
			    
		  	</div>
	  	</div>
	  	<div class="col-sm-2">
	  		<div class="our_clients" style="border-bottom: 1px solid #ccc;padding-bottom: 20px;">
	  			<div class="gray_bg">
	      			<h3 class="padd_5">Our Clients</h3>
		      	</div>
		      	<div class="bxslider">
				 	<div><img src="<?php echo $theme_url?>/images/logo.jpg" width="150"></div>
				  	<div><img src="<?php echo $theme_url?>/images/logo1oo.jpg" width="150"></div>
				  	<div><img src="<?php echo $theme_url?>/images/logo2trans.png" width="150"></div>
				</div>
	  		</div>
	  	</div>
    </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?php echo $theme_url;?>/js/jquery.bxslider.min.js"></script>

<script type="text/javascript">
	//readmore
$(document).ready(function() {
	var showChar = 400;
	var ellipsestext = "...";
	var moretext = "Read More";
	var lesstext = "Show Less";
	$('.readmore').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});
//slider
$('.bxslider').bxSlider({
  auto: true,
  controls:false,
  autoControls: false,
  stopAutoOnClick: false,
  pager: false,
  slideWidth: 200
});
</script>
<?php $this->template->contentEnd();  ?> 
