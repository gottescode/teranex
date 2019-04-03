<?php $this->template->contentBegin(POS_TOP);?>
<style>
.header-container1 h2, .header-container1 p {
    color: #fff;
}
.manu_intro{
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
.describe-list li {
    margin-top: 25px;
    vertical-align: top;
}
.describe-list li i {
	color: #a5c049;
    font-size: 30px;
    margin-right: 10px;
}
.material{
	width: 20%;
	border:1px solid #ccc;
}
.material p{
	text-align: justify;
}
.material h3::before{
	background: #a5c049 none repeat scroll 0 0;
    top: 60px;
    content: "";
    height: 2px;
    left: 15px;
    position: absolute;
    width: 50px;
}
.videosize {
    margin-top: 5px;
    height: 221px;
}
.collaboration-sec1 .h2-tag{
	    padding: 8% 16.5% 0;
}
@media screen and (max-width: 768px){
.manu_intro h2::before{
	top: 100px;
	}
.material h3 {
    font-size: 16px;
}
}
@media screen and (max-width: 414px){
.material{
	width: 100%;
}
}
</style>
<?php $this->template->contentEnd();  ?> 
<section class="header-container1" style="background-image: url('<?php echo $theme_url?>/images/laser_banner.jpg');height: 100%;width: 100%;background-size: cover;">
	<div class="" style="width: 100%;background-color: #000000c4; height: 450px; position: relative;padding:125px 0 ;">
		<center>
			<h2 style="font-size: 40px;">Laser Processing</h2>
			<p style="font-size: 16px;">Discover the principles and advantages of laser processing<br/> for models, prototypes or production.</p><br/>
			<a href="" class="btn btn_orange btn-lg" style="padding: 10px 20px;">Upload Your File</a>
		</center>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div><br/>
<div class="container">
	<div class="col-sm-12 padd-0">
		<div class="row">
			 <?php foreach($additive_manufacturing_list as $additive_manufacturing) { ?>
			<div class="col-sm-6 manu_intro">
				<h2><?php echo $additive_manufacturing['additive_manufacturing_name'] ?></h2><br/>
				<img src="<?=base_url().'uploads/digitalmanufacturing/'.$additive_manufacturing['additive_manufacturing_image']?>" class="img-responsive" style="height: 300px;width: 100%;"><br/>
				<p><?php echo $additive_manufacturing['additive_manufacturing_description'] ?>
				</p>
			</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div><hr/>
		<div class="printing_materials">
			<center><h2>Laser Processing Materials</h2></center><br/>
			<?php foreach($printing_materials3D_list as $printing_materials3D) { ?>
			<div class="col-sm-2 material">
				<h3><?php echo $printing_materials3D['printing_material_name'] ?></h3>
				<p><?php echo $printing_materials3D['printing_material_description'] ?></p>
			</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div><br/>
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