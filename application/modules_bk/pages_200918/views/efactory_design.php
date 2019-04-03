<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
 
.other-section-10 .tab-widget li>a:hover {
    background-color: #00000070;
    color: #a5c049;
    box-shadow: 0 3px 10px 0 rgba(0,0,0,0.15);
}
.explore-marketplace .tab-widget li>a:hover ~ h3{
	color: #a5c049;
}
.other-section-10 .tab-widget li>a {
    border-radius: 0;
    border-bottom: 1px solid #a5c049;
}
.other-section-10 .tab-widget li>a {
    width: 120px;
    height: 120px;
    color: #fff;
    font-size: 60px;
    /*border-radius: 80px;*/
    background-color: #00000070;
    box-shadow: 0 7px 22px rgba(19, 19, 19, 0.5);
}
</style>
<?php echo $this->template->contentEnd();	?> 
<section class="other-section other-section-10 dark">
	<!-- <div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/machineindex.jpg');height: 100%;width: 100%;background-size: cover;"> -->
	<div class=" padd-0 paralax-section1 " style="background-image: url('<? echo $theme_url?>/images/onlinecourse-macademy-min.jpg');height: 100%;width: 100%;background-size: cover;">
		<div style="width: 100%;background-color: #0000007d">
			<div class="col-sm-12" style="padding: 30px 0;">
				<center>
					<h1 class="white-text">Design</h1>
					<p class="white-text" style="padding: 20px 0;">Work with a skilled product designer to turn your ideas into real products.<br/> We can start from scratch or evolve a product for on-going fabrication.</p>
				</center>
				<div>
					<ul class="tab-widget icon-tab tab-pd">
						<li>
							<a target="_blank" href="javascript:void(0)" data-tb="#service-tab-1" class="flex-cc">
							<i class="fa fa-file-code-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Design</h3>
						</li>
						<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						<li>
							<a target="_blank" href="<?php echo site_url()."remoteprogramming";?>" data-tb="#service-tab-2" class="flex-cc">
							<i class="fa fa-code" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Programming</h3>
						</li>
						<!-- <li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						
						<li>
							<a target="_blank" href="javascript:void(0)" data-tb="#service-tab-5" class="flex-cc">
							<i class="fa fa-file-text-o" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Projects</h3>
						</li>
						<li><i class="fa fa-plus fa-lg" aria-hidden="true"></i></li>
						<li>
							<a target="_blank" href="<?php echo site_url()."macademy/online_testing";?>" data-tb="#service-tab-6" class="flex-cc">
							<i class="fa fa-check" aria-hidden="true"></i></a>
							<h3 class="fs16 bold-2 mr-t-10">Online Testing</h3>
						</li> -->
					</ul>
				</div>
			</div><div class="clearfix"></div>
		</div><div class="clearfix"></div>
	</div>
</section>


<div class="clearfix"></div><br/>

<?php $this->template->contentBegin(POS_BOTTOM);?>
	
	
<?php echo $this->template->contentEnd();	?> 