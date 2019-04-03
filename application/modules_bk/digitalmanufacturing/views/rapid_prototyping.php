<?php $this->template->contentBegin(POS_TOP);?>
<style>
.header-container1 h2, .header-container1 p {
    color: #fff;
}
.manu_intro{
	min-height: 351px;
	padding: 0 40px;
}
.manu_intro h2::before{
	background: #a5c049 none repeat scroll 0 0;
    top: 70px;
    content: "";
    height: 2px;
    /*left: 15px;*/
    position: absolute;
    width: 100px;
}
.manu_intro p{
	text-align: justify;
}
.rapid_features{
	text-align: center;
	padding: 20px;
	margin-bottom: 30px;
	box-shadow: 0 7px 22px rgba(19,19,19,.24);

}
.rapid_features h3{
	text-align: center;
}
.rapid_features p{
	text-align: justify;
	min-height: 125px;
}
.feature_icon i{
	color: #a5c049; 
	font-size: 50px;
}
.videosize {
    margin-top: 5px;
    height: 221px;
}
.collaboration-sec1 .h2-tag{
	    padding: 8% 16.5% 0;
}
@media screen and (max-width: 1024px){
.manu_intro{
	min-height: 460px;
}
.manu_intro p{
	min-height: 300px;
}
.manu_intro h2{
	min-height: 66px;
}
.manu_intro h2::before {
    top: 100px;
}
.rapid_features h3{
	min-height: 56px;
}
.rapid_features p {
    min-height: 175px;
}
}
@media screen and (min-width: 415px) and (max-width: 1024px){
	.manu_intro p {
    min-height: 500px;
}
.rapid_features p {
    min-height: 275px;
}
}

@media screen and (max-width: 414px){
.material{
	width: 100%;
}
}
</style>
<?php $this->template->contentEnd();  ?> 
<section class="header-container1" style="background-image: url('<?php echo $theme_url?>/images/rapid_pro_banner.jpg');height: 100%;width: 100%;background-size: cover;">
	<div class="" style="width: 100%;background-color: #000000c4; height: 450px; position: relative;padding:125px 0 ;">
		<center>
			<h2 style="font-size: 40px;">Rapid Prototyping</h2>
			<p style="font-size: 16px;">From concept model to functional assembly, TERANEX<br/> 3D prints your prototype in 2 or 3 days.</p><br/>
			<a href="" class="btn btn_orange btn-lg" style="padding: 10px 20px;">Upload Your File</a>
		</center>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div><br/>
<div class="container">
	<div class="col-sm-12 padd-0">
		<div class="intro">
			<center><h2>Why do you need TERANEX 3D Printing Services to create your prototype</h2>
				<h3>4 reasons to reconsider your rapid prototyping strategy</h3></center>
			<?php foreach($printing_materials3D_list as $printing_materials3D) { ?>	
			<div class="col-sm-6 manu_intro" style="background: #f1f1f1;">
				<h2><?php echo $printing_materials3D['printing_material_name'] ?></h2><br/>
				<p><?php echo $printing_materials3D['printing_material_description'] ?></p>
			</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div><hr/>
		<div class="online_features">
			<center><h2>TERANEX Exclusive Online Features</h2>
			<p>CONTROL YOUR PRODUCT QUALITY, YOUR LEAD TIME AND YOUR PRICE WHILE BENEFITING FROM SUPERIOR 3D TOOLS MADE BY OUR SOFTWARE DEVELOPMENT TEAM</p></center><br/>
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3>75+ Materials</h3>
	                <p>Plastic, Alumide, Metals, Resins are available with tens of finishing options on our professional-grade 3D printers (Selective Laser Sintering, HP Fusion Jet, SLM, DMLS, Polyjet resin printing, CLIP, 3D Systems...). We have a prototype solution for you!</p>
	            </div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-check-square-o"></i>
	                </div>
	                <h3>Superior 3D analysis tools</h3>
	                <p>Upload your files in any of 33+ file format. We'll automatically repair any issue on your 3D file and give you feedback in seconds. We handle your multiple CAD file upload and assembly easily.</p>
	            </div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-bolt"></i>
	                </div>
	                <h3>Instant quote</h3>
	                <p>No need to wait hours to get your quote, our price and turnaround will automatically be provided. You need to decide quickly and focus on your product design: we're here to help you to save on your time budget!</p>
	            </div>
			</div>
			<div class="clearfix"></div>
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-shopping-cart"></i>
	                </div>
	                <h3>Economy Plan</h3>
	                <p>Turnaround time options, shipping plans, quantity, file optimization ... there's many options to help you to get the good price and meet your rapid prototyping budget.</p>
	            </div>
			</div>
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-empire"></i>
	                </div>
	                <h3>Mass production starting at 1</h3>
	                <p>Our clients fabricate thousands of objects without investing in a single industrial tool thanks to additive manufacturing. Quality is guaranteed from 1 to 10,000 parts.</p>
	            </div>
			</div>
			<div class="col-sm-4 col-xs-12">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-cubes"></i>
	                </div>
	                <h3>Control our 3D Printers</h3>
	                <p>Choose online the material and the resolution of your 3D prints, and even choose the orientation if you are an expert or when you order batches. You're the boss of our 3D printing factory!</p>
	            </div>
			</div>
		</div>
		<div class="clearfix"></div><hr/>
		<div class="container">
	  		<h2 style="margin-top: 4px;"><center>Request for Quotation</center></h2>
			<div class="col-sm-12 rfq-bg row-flex">
				<div class="col-sm-8 col-xs-12" style="padding-left: 0;">
					<div class="gray-bg1 collaboration-sec1">
						<img src="<?php echo $theme_url?>/images/used-machines.jpg" class="img-responsive" style="height:350px;">
						<div class="sec-collaboration1">
							<h2 class="h2-tag">An Easy Way to Send buying request to suppliers &amp; get quotes quickly.
								<ul>
									<li>Get quote sfoe your custom request</li>
									<li>Let the right suppliesrs find you</li>
									<li>Close deals with one click</li>
								</ul>
							</h2>
						</div>
					</div>
				</div>
				<div class="col-sm-4" style="background: #fff;">
			        <!-- <form class="form-horizontal" name="#" id="#" method="post" action="">
						<br><br>
						<a href="#" type="submit" data-toggle="modal" data-target="#signinModal" class="btn btn_orange">Request for Quote</a>
	 				</form> -->
	 				 <form class="form-horizontal" name="#" id="#" method="post" action="">
					  <br/><br/>
					<?php if($this->session->userdata('uid') && $this->session->userdata('user_type')){ ?>
					<a href="<?php echo site_url()."digitalmanufacturing/contact_manufacturingRFQ"?>" type="submit" class="btn btn_orange">Request for Quote</a>
					 <?php }else{?>
					<a href='#' type="submit" data-toggle='modal' data-target='#signinModal' class="btn btn_orange">Request for Quote</a>
					 <?php }?>
				</form>
				</div>
			</div>
		</div>
		<div class="clearfix"></div><br/>
		<div class="full-width" id="contact">
			<div class="col-sm-offset-3 col-sm-6 padd-0 text-center">
				<h2>Chat with Us via Text</h2>
				<form role="form" action="" id="contactEnquiry" method="post" enctype="multipart/form-data">
					<?php
						if($user_id==''){ echo "<h3 style='margin-top: 23px;'>Please login before submit request. <a class='orng_clr' href='#'  data-toggle='modal' data-target='#signinModal'>Click Here</a></h3> ";}?>
					<div class="form-group">
					   <textarea class="form-control required" name="message" id="message" placeholder="Write here.."> </textarea>
					</div>
					<div>
					<?php
						if($user_id==''){ ?>
						<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange" value="Send"/>
						<?php }else{?>
						<input type="submit" name="btnContactEnquiry" class="btn btn_orange" value="Send"/>
						<?php }?>
					</div>
				</form>
			</div>
		</div>
		<div class="clearfix"></div><hr/>
		<div class="full-width " id="">
			<div class="">
				<center><h2 style="margin-top: 0;">Chat with Us via Live Video Conference</h2></center>
				<div class="col-sm-offset-2 col-sm-4 padd-0">
					<form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
						<h3>What would you like to do?</h3>
						<div class="form-group">
							<input type="radio" value="V" name="video_chat"> Video chat with a Teranex Consultant<br/><br/>
							<input type="radio" value="B" name="video_chat"> Video chat with a Teranex Programmer<br/> <br/>
						</div>
						<div class="text-center" style="margin-top:10px;">
							<?php
							if($user_id==''){ ?>
							<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange " value="Submit"/>
							<?php }else{?>
							<input type="submit" name="btnMachineVideo" class="btn btn_orange" value="Submit"/>
							<?php }?>
						</div>
					</form>
				</div>
				<div class="col-sm-4 padd-0">
					<video controls class="videosize" >
					  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
					  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
					  	Your browser does not support the video tag.
					</video>
				</div>
			</div>
		</div>
		<div class="clearfix"></div><br/>
	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php echo $this->template->contentEnd(); ?> 
