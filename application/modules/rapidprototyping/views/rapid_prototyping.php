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
.mar-tb-20 {
    margin-top: 20px;
    margin-bottom: 20px;
}
h3.vconf {
    margin-bottom: 30px;
    margin-top: 0px;
}
.fg_span {
    margin-bottom: 30px;
    float: left;
    width: 100%;
}
.videobtn {
    margin-top: 55px;
    width: 100%;
    float: left;
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
.process1 {
    text-align: center;
    padding: 10px;
    margin-bottom: 10px;
    box-shadow: 0 0px 10px rgba(19, 19, 19, 0.10);
}
.process1 p{
	text-align: justify;
	min-height: 200px;
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
		<div class="row">
			<div class="col-sm-6 manu_intro">
				<h2>What Is Rapid Prototyping ? </h2><br>
				<img src="http://www.teranex.io/beta-V*SRJ!-452656-230718/uploads/digitalmanufacturing/20180628120118.jpg" class="img-responsive" style="height: 300px;width: 100%;"><br>
				
			</div>
			<div class="col-sm-6 manu_intro">
				<p style="margin-top: 85px;">As the name suggests, rapid prototyping is a technique that facilitates the fabrication of a scale model of a product or a part using 3D CAD (Computer Aided Design) data. Rapid prototyping is an additive process that builds objects by placing and joining layers of raw material. The automotive, aerospace, electronics and medical industries are leveraging the benefits of rapid prototyping. Some of methods of rapid prototyping include stereolithography (SLA), selective laser sintering (SLS), fused deposition modelling (FDM), and selective laser melting (SLM).	
			</div>
		</div>
		<div class="clearfix"></div><hr/>
		<section>
			<div class="container">
				<center><h2>Rapid Prototyping Advantages</h2></center>
				<div class="col-sm-12 padd-0">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="process1">
							<h3>Speed of Innovation</h3>
							<p>A major benefit of rapid prototyping is that it drives innovation by means of the speed at which innovative ideas can be transformed into products. Rapid prototyping has gained immense popularity amongst engineers and designers as it provides a fast and accurate method to realize the potential of a product. </p>
						</div>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						<div class="process1">
							<h3>Design Improvements</h3>
							<p>Apart from presenting a proof of concept for clients, rapid prototyping also enables the possibility of incorporating changes based on feedback received. All the iterations that go into finalizing a design can result in significant improvement and can help to address the exact need of the end user. Any flaws in the design can be eliminated prior to mass production.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="clearfix"></div><br/>
		<div class="intro">
			<center><h2>Why do you need TERANEX 3D Printing Services to create your prototype</h2>
				<h3>4 reasons to reconsider your rapid prototyping strategy</h3></center>
			<?php foreach($rapid_prototyping_list as $rapid_prototyping) { ?>	
			<div class="col-sm-6 manu_intro" style="background: #f1f1f1;">
				<h2><?php echo $rapid_prototyping['rapid_prototyping_name'] ?></h2><br/>
				<p><?php echo $rapid_prototyping['rapid_prototyping_description'] ?></p>
			</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div><br/>
		<div class="online_features">
			<center><h2>TERANEX Exclusive Online Features</h2>
			<p>CONTROL YOUR PRODUCT QUALITY, YOUR LEAD TIME AND YOUR PRICE WHILE BENEFITING FROM SUPERIOR 3D TOOLS MADE BY OUR SOFTWARE DEVELOPMENT TEAM</p></center><br/>
			<?php foreach($rapid_prototyping_online_features_list as $rapid_prototyping_online_features) { ?>	
			<div class="col-sm-4 col-xs-12 ">
				<div class="rapid_features">
					<div class="feature_icon">
	                    <i class="fa fa-align-justify"></i>
	                </div>
	                <h3><?php echo $rapid_prototyping_online_features['online_feature_name'] ?></h3>
	                <p><?php echo $rapid_prototyping_online_features['online_feature_description'] ?></p>
	            </div>
			</div>
			<?php } ?>
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
					<a href="<?php echo site_url()."rapidprototyping/rapid_prototypingRFQ"?>" type="submit" class="btn btn_orange">Request for Quote</a>
					 <?php }else{?>
					<a href='#' type="submit" data-toggle='modal' data-target='#signinModal' class="btn btn_orange">Request for Quote</a>
					 <?php }?>
				</form>
				</div>
			</div>
		</div>
		<div class="clearfix"></div><br/>
		<!-- <div class="full-width" id="contact">
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
						<?php } ?>
					</div>
				</form>
			</div>
		</div> -->
		<div class="clearfix"></div>
	</div>
</div>
<div class="clearfix"></div><br>
		
<div style="background: #f9f9f9;">
	<div class="container">
		<div class="col-sm-12 padd-8">
			<div class="full-width pull-left mar-tb-20" id="">
				<div class="pull-left full-width">
					<center><h2 style="margin-top: 0;">Chat with Us </h2></center>
					 <div class="col-sm-offset-2 col-sm-4 padd-0">	
						<form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
							<h3 class="vconf">What would you like to do?</h3>
							<div class="form-group" style="margin-bottom:30px;">
								<span class="fg_span"><input type="radio" value="T" name="video_chat" checked> Text chat with a sales Consultant</span><br/>
								<span class="fg_span"><input type="radio" value="V" name="video_chat"> Video chat with a sales Consultant</span><br/>
								<span>
						
							</div> 
							<div class="videobtn">
								<?php
								if($this->session->userdata('uid')==''){ ?>
								<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
								<?php }else{?>
									 <input type="hidden" id="videochat_request_for" name="videochat_request_for" class="form_bor_bot " value="SheetMetalFabrication">
								<input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/> 
								<?php }?> 
							</div>
						</form>
					</div> 
					<div class="col-sm-4 padd-0">
						<div class="T chatbox" style="margin-top: 8px;">
							<form role="form" action="" id="contactEnquiry" method="post" enctype="multipart/form-data">
								<!-- <?php
									if($user_id==''){ echo "<h3 style='margin-top: 13px;text-align:center;'>Please login before submit request. <a class='orng_clr' href='#'  data-toggle='modal' data-target='#signinModal'>Click Here</a></h3> ";}?> -->
								<div class="form-group">
								   <textarea class="form-control required" name="message" id="message"  placeholder="Write here.." rows="9"></textarea>
								</div>
								<div>
								<?php
									if($user_id==''){ ?>
									<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-right" value="Send"/> 
									<?php }else{?>
									<input type="submit" name="btnContactEnquiry" class="btn btn_orange pull-right" value="Send"/> 
									<?php }?>
								</div>
							</form>
						</div>
						<div class="V chatbox" style="display: none;">
							<video controls class="pull-right videosize">
							  	<source src="http://www.teranex.io/beta-V*SRJ!-452656-230718/themes/site/images/sample-video.mp4" type="video/mp4">
						  		<source src="http://www.teranex.io/beta-V*SRJ!-452656-230718/themes/site/images/sample-video.ogg" type="video/ogg">
							  	Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="clearfix"></div><br>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type="text/javascript">
	$(document).ready(function(){
		// $(".chatbox").hide();
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chatbox").not(targetBox).hide();
        $(targetBox).show();
    });
});

</script>
<?php echo $this->template->contentEnd(); ?> 
