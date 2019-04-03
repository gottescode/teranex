<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">

</style>
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" ">
</div>
<div class="container">
    <center><h1>Category</h1></center>
    <div class="col-sm-12">
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
	  	<div class="col-sm-9 padd-0">
		  	<div class=" report_cat_details">
			    <div id="home" class="">
			    	<div class="gray_bg">
			      		<h3 class="padd_5">Category1</h3>
			      	</div>
			      	<div class="cat_details">
			      		<p class="rcomment readmore">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
			      		<table class="table table-stripped report_detail_table">
			      			<thead>
			      				<tr class="gray_bg">
			      					<th class="r_b">Title</th>
			      					<th class="r_b">Updated</th>
			      					<th>Price</th>
			      				</tr>
			      			</thead>
			      			<tbody>
			      				<tr>
			      					<td>
			      						<a href="<?php echo site_url();?>research/report_detail">India Farm Equipment Market: By Type (Tractors, Fertilizing, Plant Protection Equipment, Harvesting Equipment, Irrigation Equipment, Others); By Phase (Land Development, Sowing, Planting, Cultivation, Harvesting, Threshing, Others); By State - Forecast(2018 - 2023)</a><br/>
			      						<p>By: TERANEX</p>
			      						<a href="<?php echo site_url();?>research/report_detail">Read more..</a>
			      					</td>
			      					<td>16 May, 2018</td>
			      					<td>$ 4250</td>
			      				</tr>
			      				<tr>
			      					<td>
			      						<a href="<?php echo site_url();?>research/report_detail">India Farm Equipment Market: By Type (Tractors, Fertilizing, Plant Protection Equipment, Harvesting Equipment, Irrigation Equipment, Others); By Phase (Land Development, Sowing, Planting, Cultivation, Harvesting, Threshing, Others); By State - Forecast(2018 - 2023)</a><br/>
			      						<p>By: TERANEX</p>
			      						<a href="<?php echo site_url();?>research/report_detail">Read more..</a>
			      					</td>
			      					<td>16 May, 2018</td>
			      					<td>$ 4250</td>
			      				</tr>
			      				<tr>
			      					<td>
			      						<a href="<?php echo site_url();?>research/report_detail">India Farm Equipment Market: By Type (Tractors, Fertilizing, Plant Protection Equipment, Harvesting Equipment, Irrigation Equipment, Others); By Phase (Land Development, Sowing, Planting, Cultivation, Harvesting, Threshing, Others); By State - Forecast(2018 - 2023)</a><br/>
			      						<p>By: TERANEX</p>
			      						<a href="<?php echo site_url();?>research/report_detail">Read more..</a>
			      					</td>
			      					<td>16 May, 2018</td>
			      					<td>$ 4250</td>
			      				</tr>
			      				<tr>
			      					<td>
			      						<a href="<?php echo site_url();?>research/report_detail">India Farm Equipment Market: By Type (Tractors, Fertilizing, Plant Protection Equipment, Harvesting Equipment, Irrigation Equipment, Others); By Phase (Land Development, Sowing, Planting, Cultivation, Harvesting, Threshing, Others); By State - Forecast(2018 - 2023)</a><br/>
			      						<p>By: TERANEX</p>
			      						<a href="<?php echo site_url();?>research/report_detail">Read more..</a>
			      					</td>
			      					<td>16 May, 2018</td>
			      					<td>$ 4250</td>
			      				</tr>
			      			</tbody>
			      		</table>
			      	</div>
			      	
			    </div>
		  	</div>
	  	</div>
    </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>
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

</script>
<?php $this->template->contentEnd();  ?> 
