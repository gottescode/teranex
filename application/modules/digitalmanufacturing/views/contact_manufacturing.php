<?php $this->template->contentBegin(POS_TOP);?>
<style>
	.sec-lr ul{
		float: left;
		width: 100%;
		list-style: none;
	}
	.sec-lr .addmore-btn{    margin-top: 10px;}
	.sec-lr h2{
		padding-bottom:10px; 
		 text-align: center;
		margin-bottom:20px; 
		font-size: 17px; 
		margin-top: 2px;
		color: #333;
	}
	.son-text {
    padding: 17% 20px;
}
.son-text h3, .son-text p {
    color: #fff;
    min-height: auto;
	text-align: center;
}
.son-text p{
	min-height: 75px;
}
.videosize {
    margin-top: 5px;
    height: 182px;
}
.row{
    margin-right: -8px;
    margin-left: -8px;
}
.process-img {
    padding-bottom: 10px;
    margin: 0 auto;
    width: 70%;
	filter: grayscale(100%);
}
.mar-tb-20{margin-top:20px;margin-bottom:20px;}
</style>
<?php $this->template->contentEnd();  ?> 

<!-- <img src="<?php echo $theme_url?>/images/punching-machines.jpg" class="img-responsive bnr-images"> -->
<section class="counterbg" style="background: url('<?php echo $theme_url?>/images/punching-machines.jpg');">
	
	<div class=" padd-0" style="width: 100%;background-color: #000000c4; height: 450px; position: relative;padding: 0 150px;">
	<h1 style="text-align: center;color: #fff;;font-size: 36px;padding: 45px 0;margin-bottom: 0;">Connect to TERANEX Digital Manufacturing Platform</h1>
	<center><span style="text-align: center;color: #fff;font-size: 13px;">
		<p><span style="color: #a5c049;font-size: 24px;"><i>" Making Contract Manufacturing Virtual, On-Demand and Convenient "</i><br/></span></p>Fabpilot brings together all the tools you need to manage your entire Additive Manufacturing workflow.<br/>
File analysis and repair, 3D review tools, file optimization, quote generation, 3D Nesting, part tracking, printer fleet management, and post-processing management, all on one cloud based platform.<br/>
Built, tested, and powered by the team at Sculpteo, Fabpilot has been proven to work at industrial production scales.
	</span></center><br/>
		<div class="clearfix"></div>
	</div>
</section>

<div class="clearfix"></div>
  <div class="container padd-0">
    <center>
		<h2>Contract Manufacturing</h2>
		<p class="">At Teranex, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance.</p>
	</center>
  <!-- /.container --> 
<!-- /.myprofile-bg -->
	<div class="col-sm-12 padd-0">
		<div class="row">
			   <?php foreach($digitalmanufacturing_list as $digitalmanufacturings) { ?>
			<div class="col-sm-4 col-xs-12 padd-8">
					<div class=" dad">
						<div class="son-1" style="background-image: url('<?php echo base_url()."uploads/digitalmanufacturing/".$digitalmanufacturings['digitalmanufacturing_cat_image']?>');"> </div>
						<div class="son-text">
							<h3><?php echo $digitalmanufacturings['digitalmanufacturing_cat_name']; ?></h3>
							<p><?php echo $digitalmanufacturings['digitalmanufacturing_cat_description']; ?></p>
							<?php 

							$functionname = $digitalmanufacturings['digitalmanufacturing_cat_name'];
							$functionname = str_replace(" ","_",strtolower($functionname));
							?>
							<center><a href="<?php echo site_url(). 'digitalmanufacturing/'.$functionname.'/'.$digitalmanufacturings['digitalmanufacturing_cat_id'] ?>" class="btn btn-default addmore-btn">Enquire</a></center>
						</div>
					</div>
			</div>
			 <?php } ?> 
		</div>
	</div>
</div>
  <div class="col-sm-12 feature-grey-bg">
    <center>
      <h2>Easy and Fast Way to Start Manufacturing</h2>
    </center>
	<img style="padding-bottom:10px;" src="<?php echo $theme_url?>/images/process0.png" class="img-responsive process-img">
  </div>
<div class="container padd-0">
	<div class="col-sm-12 padd-0">
		<div class="">
			<div class="col-sm-6">
				<div style="width: 100%;">
						<div class="col-lg-12 col-sm-12 padd-0">
							<h2 class="text-center">Customer Benefits</h2>
						</div>
					<div class="sec-lr">
						<hr style="margin-top: 0;"/>
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>Easy to Use</h2>
							</div>
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>3D Design Support</h2>
							</div>
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>On Time Delivery</h2>
							</div>
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>Quality Management</h2>
							</div>
						<div class="clearfix"></div>
					</div>
				</div>
			</div>
			<div class="col-sm-6" style="">
				<div style="width: 100%;">
						<div class="col-lg-12 col-sm-12 padd-0">
							<h2 class="text-center">Partner Benefits</h2>
						</div>
					<div class="sec-lr">
						<hr style="margin-top: 0;" />
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>Improve Capacity</h2>
							</div>
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>On Time Payments</h2>
							</div>
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>Increase ROI</h2>
							</div>
							<div class="col-lg-6 col-sm-6 padd-0">
								<h2>Continuous Improve</h2>
							</div>
					</div>
				</div>
			</div>
		</div>	
		<hr/>
		<div class="clearfix"></div>
	</div>
	<!-- <div class="full-width pull-left" id="contact">
		<div class="col-sm-6 padd-0">
			<h2>Chat with Us via Text</h2>
		</div>
		<div class="col-sm-6 padd-0">
			<form role="form" action="" id="contactEnquiry" method="post" enctype="multipart/form-data">
				<?php
					if($user_id==''){ echo "<h3 style='margin-top: 18px; float:right;'>Please login before submit request. <a class='orng_clr' href='#'  data-toggle='modal' data-target='#signinModal'>Click Here</a></h3> ";}?>
				<div class="form-group">
				   <textarea class="form-control required" name="message" id="message" placeholder="Write here.."> </textarea>
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
		<hr/>
		<div class="clearfix"></div>
	</div>
	<div class="full-width pull-left mar-tb-20" id="">
		<div class="">
			<div class="col-sm-6 padd-0">	
				<h2 style="margin-top: 0;">Chat with Us via Live Video Conference</h2>
				<form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
					<h3>What would you like to do?</h3>
					<div class="form-group">
						<input type="radio" value="V" name="video_chat"> Video chat with a TERANEX Consultant<br/> <br/>
					</div> 
					<div class="" style="margin-top:10px;">
						<?php
						if($user_id==''){ ?>
						<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
						<?php }else{?>
						<input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/> 
						<?php }?> 
					</div>
				</form>
			</div>
			<div class="col-sm-6 padd-0">
				<video controls class="pull-right videosize">
				  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
				  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
				  	Your browser does not support the video tag.
				</video>
			</div>
		</div>
	</div> -->
</div>
<!-- <div class="container mar-tb-20">
		<h2 style="margin-top: 4px;">Request for Quotation</h2>
	<div class="col-sm-12 rfq-bg row-flex">
		<div class="col-sm-8 col-xs-12" style="padding-left: 0;">
			<div class="gray-bg1 collaboration-sec1">
				<img src="<?php echo $theme_url?>/images/used-machines.jpg" class="img-responsive" style="height:350px;">
				<div class="sec-collaboration1">
					<h2 class="h2-tag">An Easy Way to Send buying request to suppliers & get quotes quickly.
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
	        <form class="form-horizontal" name="#" id="#" method="post" action="">
				
				  <div class="col-sm-6">
					  <div class="form-group">
						  <input type="text" class="form-control input-form form_bor_bot" id="#" name="#" placeholder="Quantity"required>
					  </div>
				  </div>
				  <div class="col-sm-6">
					  <div class="form-group">
							<select name="pcs" id="#" class="form-control input-form form_bor_bot"required>
								<option value="">Pieces</option>
								<option value="20">20' Container</option>
								<option value="40">40' Container</option>
								<option value="60">60' Container</option>
								<option value="80">80' Container</option>
								<option value="100">100' Container</option>
								<option value="200">200' Container</option>
								<option value="300">300' Container</option>
								<option value="500">500' Container</option>
							</select>
					  </div>
				  </div>
				  <br/><br/>
				<?php if($this->session->userdata('uid') && $this->session->userdata('user_type')){ ?>
				<a href="<?php echo site_url()."stelmac/contact_manufacturingrfq"?>" type="submit" class="btn btn_orange">Request for Quote</a>
				 <?php }else{?>
				<a href='#' type="submit" data-toggle='modal' data-target='#signinModal' class="btn btn_orange">Request for Quote</a>
				 <?php }?>
			</form>
		</div>
	</div>
</div> -->
<div class="clearfix"></div>
<?
include('footer.php'); 
?>

<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#register").submit(function(){
			
	if($("#Email").val() == "" && $("#MobileNo").val() == "")
	{
		alert("Email or Mobile No. is required");
		return false;
	}
	if($("#Email").val() != "")
	{
		var b = $("#Email").val();
		var atpos=b.indexOf("@");
		var dotpos=b.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=b.length)
		{
		  alert("Not a valid e-mail address");
		  return false;
		}
	}
	if($("#MobileNo").val() != "")
	{
		var check_mobile = $("#MobileNo").val();
		var expression = /\D/;
		if(expression.test(check_this))
		{
			alert("Contact number should be in digits only");
		}
	}

	if($("#Passcode").val() == "")
	{
		alert("Password cannot be empty");
		return false;
	}
		
	if($("#CustomerType").val() == "")
	{
		alert("Customer Type is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to register");
	return yesno;
	});
});
</script>
<script type='text/javascript'>
function refreshCaptcha(){
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>