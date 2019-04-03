<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        /* width: 40%; */
        border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
        background: #fff;
    }
    .top_spac{ 
        margin: 20px 0 0;
    }

    .recent_heading {
        float: left; width:40%;
    }
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{
        padding:10px 29px 10px 20px; 
        overflow:hidden; 
        border-bottom:1px solid #c4c4c4;
    }
    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{
        border:1px solid #cdcdcd; 
        /* border-width:0 0 1px 0;
          width:80%; 
          padding:2px 0 4px 6px; */
        width: 85%;
        padding: 6px;
        background:none;
    }
    .srch_bar button{
        padding: 5px;
        margin: 0;
        margin-left: -6px;
    }
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}
    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:11px; float:right;padding: 4px;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }
    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        /*padding: 18px 16px 10px;*/
        padding: 15px;
    }
    .inbox_chat { height: 365px; overflow-y: scroll;}
    .active_chat{ background:#ebebeb;}
    .incoming_msg_img {
        display: inline-block;
        width: 8%;
        float: left;
    }
    .incoming_msg_img img{
        border-radius: 15px;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 10px;
        margin: 0px 0 8px 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        float: left;
        padding: 10px 0px 0 10px;
        width: 100%;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        /*border: medium none;*/
        color: #4c4c4c;
        font-size: 15px;
        min-height: 50px;
        width: 100%;
        border: 1px solid #c4c4c4;
        /*border-radius: 25px;*/
        padding: 0 10px;
    }
    .type_msg {/*border-top: 1px solid #c4c4c4;*/position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 8px;
        top: 8px;
        width: 33px;
    }
    .msg_send_btn:focus{
        outline: none;
    }
    .input_msg_write input:focus{
        outline: #a5c049;
    }
    .messaging { padding: 0 0 10px 0;}
    .msg_history {
        height: 250px;
        overflow-y: auto;
    }

    .tab-content{
        border: 0;
    }
    .nav-tabs>li.chat_list.active>a, .nav-tabs>li.chat_list.active>a:focus, .nav-tabs>li.chat_list.active>a:hover{
        color: #555;
        cursor: default;
        background-color: transparent !important;
        border: 0;
        border-bottom-color: transparent;
        padding: 0;
    }
    .nav>li.chat_list>a:focus, .nav>li.chat_list>a:hover {
        text-decoration: none;
        background-color: #eee0;
        border:0;
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
			 <?php foreach($laser_processing_list as $laser_processing) { ?>
			<div class="col-sm-6 manu_intro">
				<h2><?php echo $laser_processing['laser_processing_material_name'] ?></h2><br/>
				<img src="<?=base_url().'uploads/digitalmanufacturing/'.$laser_processing['laser_processing_material_image']?>" class="img-responsive" style="height: 300px;width: 100%;"><br/>
			</div>
			<div class="col-sm-6 manu_intro">
				<p style="margin-top: 85px;"><?php echo $laser_processing['laser_processing_material_description'] ?>
				</p>
			</div>
			<?php } ?>
		</div>
		<div class="clearfix"></div><hr/>
		<section>
			<div class="container">
				<center><h2><!-- Benefits of -->Laser Processing Advantages</h2></center>
				<div class="col-sm-12 padd-0">
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="process1">
							<h3>Precision & Accuracy </h3>
							<p>Precision is one of the key advantages of laser processing which results in a high degree of accuracy. In addition to accuracy, laser processing is not only faster but also eliminates the need for metal finishing processes as the end product is not subjected to any surface metal damage, has a clean and smooth finish and is devoid of burrs.<!--  Laser processing is a very efficient process that can deliver unrivalled levels of uniformity. --></p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="process1">
							<h3>Minimal Wear and Tear</h3>
							<p>Being a non-contact process, there is no wear and tear of moving parts involved and minimal damage caused to the material. </p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="process1">
							<h3>Cost Effectiveness</h3>
							<p>Other benefits of laser processing include faster production time, reduced human error and reduction in wastage that can be attributed to the level of precision achieved. All these factors collectively also contribute to making the process cost effective. </p>
						</div>
					</div>
					<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
						<div class="process1">
							<h3>Variety of Materials</h3>
							<p>Laser processing can be applied to a wide range of materials of any thickness, which provides freedom of design that in turn translates into a creative product development process.</p>
						</div>
					</div>
				</div>
			</div>
		</section>
		<div class="clearfix"></div><br/>
		<div class="printing_materials">
			<center><h2>Laser Processing Materials</h2></center><br/>
			<?php foreach($laser_processing_material_list as $laser_processing_material) { ?>
			<div class="col-sm-2 material">
				<h3><?php echo $laser_processing_material['material_name'] ?></h3>
				<p><?php echo $laser_processing_material['material_description'] ?></p>
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
					<a href="<?php echo site_url()."laserprocessing/laser_processingRFQ"?>" type="submit" class="btn btn_orange">Request for Quote</a>
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
		</div> -->
		<div class="clearfix"></div><br/>
	</div>
</div>
<div class="clearfix"></div>
		
<div style="background: #f9f9f9;">
	<div class="container">
		<div class="col-sm-12 padd-8">
			<div class="full-width pull-left mar-tb-20" id="">
				<div class="pull-left full-width">
					<center><h2 style="margin-top: 0;">Chat with Us </h2></center>
	<!-- 				<div class="col-sm-offset-2 col-sm-4 padd-0">	
						<form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
							<h3 class="vconf">What would you like to do?</h3>
							<div class="form-group" style="margin-bottom:30px;">
								<span class="fg_span"><input type="radio" value="T" name="video_chat" checked> Text chat with a sales Consultant</span><br/>
								<span class="fg_span"><input type="radio" value="V" name="video_chat"> Video chat with a sales Consultant</span><br/>
								<span>
							
							</div> 
							<div class="videobtn">
								<?php
								if($user_id==''){ ?>
								<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
								<?php }else{?>
								<input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/> 
								<?php }?> 
							</div>
						</form>
					</div> -->
					<div class="col-sm-offset-4 col-sm-4 padd-0">
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