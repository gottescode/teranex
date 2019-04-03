<?php $this->template->contentBegin(POS_TOP);?>
<!-- <link href="<?php echo $theme_url?>/css/jquery.bxslider.min.css" rel="stylesheet" type="text/css"> -->
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/machine.css"/>
<style type="text/css">
#slideshow {
    overflow: hidden;
    width: 389px;
    height: 240px;
    padding: 0;
    margin: 0 auto;
    list-style-type: none;
}
.bx-viewport, .bx-viewport img {
    min-height: 250px;
}
.finance_type h3 {
    padding: 36px 75px;
}
video {
    display: inline-block;
    vertical-align: baseline;
    object-fit: unset;
    width: 396px;
    height: 271px;
    /* object-fit: cover; */
}
#slideshow li {
    list-style-type: none;
}
.bx-pager { text-align: center; }
.bx-pager-item { display: inline-block; margin: 0 10px; }
.bx-pager-item .active { color: #F08A22; }
.bx-prev { float: left; }
.bx-next { float: right; }
/*.bx-prev:before{content: '\f101';} */
#slide-counter {
	text-align: center;
	/*margin: 15px 0 0 0;*/
	font-size: 14px;
	color: #a5c049;
}
.cadcam1 .nbs-flexisel-item img{
	height: 170px;    
	width: 100%;
}
.sldsft .nbs-flexisel-nav-right {
    right: 0px;
}
.popover.right{
	right:125px!important;
	margin-left:0px!important;
}
.nbs-flexisel-nav-left, .nbs-flexisel-nav-right{display:none}
.nbs-flexisel-inner:hover .nbs-flexisel-nav-left, 
.nbs-flexisel-inner:hover .nbs-flexisel-nav-right{display:block;}
.nbs-flexisel-nav-left {
    left: 10px!important;
}
.nbs-flexisel-nav-right {
    right: 10px!important;
}
.mar-tb-20 {
    margin-top: 20px;
    margin-bottom: 20px;
}
.softbx-bdr {
    min-height: 304px;
}
.videosize{    margin-top: 5px;
    height: 243px;}
	
.table_nb .table>tbody>tr>td, 
.table_nb .table>tbody>tr>th, 
.table_nb .table>tfoot>tr>td, 
.table_nb .table>tfoot>tr>th, 
.table_nb .table>thead>tr>td, 
.table_nb .table>thead>tr>th{
	padding-top: 0;
    padding-bottom: 15px;
	line-height: 22px;
	padding-left:0px;
}
.bx-controls-direction a {
    margin-top: 2px;
}
.row {
    margin-right: -8px;
    margin-left: -8px;
}
.finance_type h3 {
    color: #fff;
    font-family: "Helvetica Neue",Helvetica;
}
.finance_type .fn {
    border-radius: 10px;
    background-color: rgba(0, 0, 0, 0.6);
    /*-webkit-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
    -moz-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
    box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);*/
    border-radius: 10px;
}
@media screen and (max-width: 1024px){
	video{
		width: 100%;
	}
}
@media only screen and (max-width: 1024px) and (min-width: 769px)  {
	.container{
		padding: 0;
	}
}
.fg_span {
    margin-bottom: 30px;
    float: left;
    width: 100%;
}
h3.vconf {
    margin-bottom: 30px;
    margin-top: -2px;
}
.videobtn{
	margin-top:5px;
	width:100%;
	float:left;
}
</style>
<?php echo $this->template->contentEnd();
 $user_id = $this->session->userdata('uid');
?> 
<div class="cons-details">
	<div class="container-fluid myprofile-bg dahboard-bg">
	  	<div class="container">
		  	<div class="col-sm-12 padd-0">
				<span class="couns-heading">
					<h2><?php echo $machineDetails['modelName']?></h2>
					<p><?php echo $machineDetails['city_name']?> | <?php echo $machineDetails['state_name']?></p>
				</span>
			</div>
	  	</div>
  	</div>
  	<!-- /.container --> 
<?php 	// display messages
	if(hasFlash("dataMsgEnquirySuccess"))	{	?>
		<div class="alert alert-success alert-dismissible" role="alert">
		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		  <?php echo getFlash("dataMsgEnquirySuccess"); ?>
		</div>
<?php	}	?>
	<!-- /.myprofile-bg -->
	<div class="container-fluid used-machines-nav">
	  	<div class="container">
		  <div class="col-sm-12 padd-0">
		      <ul class="tab_h text-center">
				<li><a href="#at_glance" id="ag1">At a Glance</a></li> 
				<li>|</li> 
				<li><a href="#machine_history">Machine History</a> </li>
		        <li>|</li>
		        <li><a href="#technical_spec">Technical Specifications</a></li>
		        <li>|</li> 
		        <li><a href="#time_Study">Request for time Study</a></li>
		        <li>|</li> 
		        <li><a href="#Software">Software</a></li>
		        <li>|</li>  
		        <li><a href="#finance">Finance</a></li>
		        <li>|</li>  
		        <li style="padding: 0;"><a href="#contact">Contact Us</a></li>
		        <li>|</li>  
		      </ul>
		       <div class="clearfix"></div>
			   <hr/>
		    </div>
	  	</div>
	  <!-- /.container --> 
	</div>
	<!-- /.myprofile-bg -->
	<div class="feature-this-month-bg" id="desc">
		<div class="container">
		  	<div class="col-sm-12 padd-0">
				<p class="rcomment readmore">
				 <?php   echo strhtmldecode($machineDetails['machine_description'])?>
				</p>
			</div>
		</div>
	</div>
	<div class="detail_heading">
	<div class="container">
		<div class="col-sm-12 padd-0">
			<div class="" id="at_glance">
			  	<div class="col-sm-4 padd-0 consu-table table_nb">
					<h2>At a Glance</h2>
			 		 <?php    //echo strhtmldecode($machineDetails['machine_at_a_glance'])?>
					<table class="table tbl-responsive " style="margin-top: -5px;">
						<tbody>
							<tr>
								<th>Brand <span class="pull-right">:</span></th><td> <?php echo $machineDetails['brandName']?></td>
							</tr>
							<tr>
								<th>Model <span class="pull-right">:</span></th><td> <?php echo $machineDetails['modelName']?></td>
							</tr>
							<tr>
								<th>Type <span class="pull-right">:</span></th><td><?php echo $machineDetails['category_name']?></td>
							</tr>
							<tr>
								<th>Year <span class="pull-right">:</span></th><td><?php echo $machineDetails['year_production']?></td>
							</tr>
							<tr>
								<th>Condition <span class="pull-right">:</span></th><td> <?php echo $machineDetails['machine_condition']?></td>
							</tr>
							<tr>
								<th>Location <span class="pull-right">:</span></th><td> <?php echo $machineDetails['city_name'].", ".$machineDetails['state_name']?></td>
							</tr>
							<tr>
								<th>Seller <span class="pull-right">:</span></th><td><?php echo $machineDetails['seller_name']?></td>
							</tr>
							<tr>
								<th style="padding-bottom:0;line-height:1;">Price <span class="pull-right">:</span></th>
								<td style="padding-bottom:0;line-height:1;"><?php echo $machineDetails['price']?></td>
							</tr>
						</tbody>
					</table>
			  	</div>
			  	<div class="col-sm-4 padd-8 consu-table" style="padding-top:0">
			  		<h2>Photos</h2>
			  		<div>
			  			<!-- <ul class="bxslider">
						<?php if($machineAllImages){
							foreach($machineAllImages as $rowMachine){
								if($rowMachine['photo_name']){?>
							<li><img src="<?php echo base_url()."uploads/machine/".$rowMachine['photo_name']?>" width="100%" style="min-height: 187px;"/></li>
						<?php }}}?> 
						</ul> -->
						<ul id="slideshow">
						<?php if($machineAllImages){
							foreach($machineAllImages as $rowMachine){
								if($rowMachine['photo_name']){?>
							<li><img src="<?php echo base_url()."uploads/machine/".$rowMachine['photo_name']?>" width="100%" style="min-height: 187px;"/></li>
						<?php }}}?> 
						</ul> 
						<div id="slide-counter"></div>
						
			  		</div>
			  	</div>
			  	<div class="col-sm-4 padd-8 consu-table" style="padding-top:0">
			  		<h2>Video</h2>
					<?php if($machineDetails['machine_video']){?>
					<video width="100%" height="auto" controls>
					  	<source src='<?php echo site_url()."uploads/machine/".$machineDetails['machine_video']?>' type='video/mp4'>
					  	<source src='<?php echo site_url()."uploads/machine/".$machineDetails['machine_video']?>' type='video/ogg'>
					  	Your browser does not support the video tag.
					</video>
					<?php }?>
			  	</div><hr/>
				<div class="clearfix"></div>
			</div>
			<div class="" id="machine_history">
				<div class="consu-table">
					<h2>Machine History</h2>
						 <?php echo strhtmldecode($machineDetails['machine_history'])?>
				</div>
				<hr/>
			</div>
			
			<div class="" id="technical_spec">
				<div class="pull-left full-width">
					<h2>Technical Specifications</h2> 
					<div class="col-sm-12 technicalSpecifications padd-0">
						 <?php echo strhtmldecode($machineDetails['technical_specification'])?>
					</div>
				</div>
			<center class="pull-left full-width"><?php if($user_id==''){ echo '<a href="" class="btn btn_orange " data-toggle="modal" data-target="#signinModal">Enquire</a>';}else{ echo '<a href="" class="btn btn_orange" data-toggle="modal" data-target="#enquiremodal">Enquire</a>';}?></center>
			<hr/>
			</div> 	
			<div class="" id="Software">
				<div class="pull-left full-width">
					<div class="col-sm-12 padd-0">
						<center><h2>Software List</h2></center>
					</div>
					<div class="col-sm-12 padd-0 sldsft">
						<div class="row">
							<ul class="cadcam1">
								<?php 
									if($softwareList){
									$i=0;
									foreach($softwareList as $rowSoft){ ?>
								<li>
									<div style="margin: 8px;">
										<div class="softbx-bdr soft-list-details" data-toggle="popover" title="Software Name" data-content="Software Details">
											<img src="<?=site_url().'uploads/machine/'.$rowSoft['software_image']?>" alt="<?php  echo $rowSoft['software_name'];?>"/>
												<h3><?php  echo $rowSoft['software_name'];?></h3>
											<h4>Price: <?php  echo $rowSoft['software_price'];?></h4>
										</div>
										<div class="checkbox text-center padd-0">
											<label style="line-height: 22px;"><input type="checkbox" value="">Add to Machine</label>
										</div>
									</div>
								</li>
								<? }
								} ?>
							</ul>
						</div>
					</div>
				</div>
				<!-- <div class="pull-left full-width" id="listDetails">
					<?php 
				
					if($softwareList){
						$i=0;
						foreach($softwareList as $rowSoft){ ?>
					<div class="col-sm-3 soft-list-item <? if($i>4){
						//echo "hide";
					}?>">
						 <div>
							<div class="softbx-bdr soft-list-details" data-original-title="Software Name" data-animation="false" data-easein="fadeIn" rel="popover" data-placement="right" data-content="<?php  echo strhtmldecode($rowSoft['description']);?>">
								<img src="<?=site_url().'uploads/machine/'.$rowSoft['software_image']?>" class="img-responsive" alt="<?php  echo $rowSoft['software_name'];?>" />
								<h3><?php  echo $rowSoft['software_name'];?></h3>
								<h4>Price: <?php  echo $rowSoft['software_price'];?></h4>
							</div>
								<div class="checkbox">
								  <label><input type="checkbox" value="">Add to Machine</label>
								</div>
						</div>
					</div>
					<?php 
					$i++;
						} 
					
					}?>
					 
				</div> -->
			<hr class="full-width pull-left" />
			</div>
			<div class="full-width pull-left" id="finance">
				<div class="">
					<center><h2>Finance the Easy Way</h2></center>
					<div class="col-sm-12 padd-0 finance_types">
						<div class="col-sm-6 padd-0">
							<div class="finance_type">
								<div class="fn fn1">
									<h3>Flexible Payment</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 padd-0">
							<div class="finance_type">
								<div class="fn fn2">
									<h3>Machine as Collateral</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 padd-0">
							<div class="finance_type">
								<div class="fn fn3">
									<h3>Easy Documentation</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-6 padd-0">
							<div class="finance_type">
								<div class="fn fn4">
									<h3>LC Opening Facility</h3>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 padd-0">
						<div class="col-sm-6 padd-0"></div>
						<div class="col-sm-6 padd-0">
							<h3 class="pull-right">Require a Loan ? Let us help you...<a href="" data-toggle='modal' data-target='#loanrequire' class="orng_clr">Click here</a></h3>
						</div>
					</div>
				</div>
				<hr/>
				<div class="clearfix"></div>
			</div>
			<div class="full-width pull-left" id="contact">
					<div class="col-sm-12 padd-0">
						<center><h2 style="margin-bottom:0px">Chat with Us via Text</h2></center>
					</div>
					<div class="col-sm-offset-3 col-sm-6 padd-0">
						<form role="form" action="" id="contactEnquiry" method="post" enctype="multipart/form-data">
							<?php
								if($user_id==''){ echo "<h3 style='margin-top: 13px;text-align:center;'>Please login before submit request. <a class='orng_clr' href='#'  data-toggle='modal' data-target='#signinModal'>Click Here</a></h3> ";}?>
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
					<hr style="margin-top: 32px;" />
					<div class="clearfix"></div>
			</div>
			<div class="full-width pull-left mar-tb-20" id="">
				<div class="pull-left full-width">
					<center><h2 style="margin-top: 0;">Chat with Us via Live Video Conference</h2></center>
					<div class="col-sm-offset-2 col-sm-4 padd-0">	
						<form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
							<h3 class="vconf">What would you like to do?</h3>
							<div class="form-group" style="margin-bottom:30px;">
								<span class="fg_span"><input type="radio" value="V" name="video_chat"> Video chat with a sales Consultant</span><br/>
								<span class="fg_span"><input type="radio" value="B" name="video_chat"> Book a live demo</span><br/>
								<span>
								<!--<input type="radio" value="M" name="video_chat"> machine inspection.<br/> <br/> -->
								<input type="radio" value="H" name="video_chat"> Hire a third party consultant</span><br/>
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
					</div>
					<div class="col-sm-4 padd-0">
						<video controls class="pull-right videosize">
						  	<source src="<?php echo site_url()."uploads/machine/".$machineDetails['machine_video']?>" type="video/mp4">
						  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
						  	Your browser does not support the video tag.
						</video>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div><!-- detail_heading -->
</div> 
<!-- Machine Enquiry modal  -->
<div id="enquiremodal" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <center><h2 class="modal-title">Machine Enquiry</h2></center>
	      </div>
	      <div class="modal-body">
	      	<div class="border_bot col-sm-offset-1 col-sm-10">
				<form class="form-horizontal" name="#" id="machine_enquiry" method="post" action=""> 
						<div class="form-group ">
						  	<input type="text" class="form_bor_bot" id="brand" name="brand" value="<?php echo $machineDetails['brand_name']?>" placeholder="Brand" >
					  	</div>
					  	<div class="form-group ">
						  	<input type="text" class="form_bor_bot" id="machinetype" name="machinetype" value="<?php echo ucwords($machineDetails['category_name'])?>" readonly >
					  	</div>
					  	<div class="form-group ">
						  	<input type="text" class="form_bor_bot" id="model" name="model" value="<?php echo $machineDetails['modelName']?>" readonly>
					  	</div>
					  	<div class="form-group ">
						  	<textarea type="text" name="message" id="MEmessage" class="form_bor_bot" placeholder="Message"></textarea>
					  	</div>
					  	<div class="form-group">
						  	<input type="submit" name="btnEnquiry" id="submit" class="btn input-form adv-search form-control" value="Submit" />
					  	</div>
				</form>
			</div>
			<div class="clearfix"></div><br/>
	      </div>
	    </div>
  	</div>
</div>

<!-- Loan require modal  -->
<div id="loanrequire" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <center><h2 class="modal-title">Loan Enquiry</h2></center>
	      </div>
	      <div class="modal-body">
	      	<div class="border_bot col-sm-12">
       			<form role="form" action="" id="loanEnquiry" method="post" enctype="multipart/form-data">
		 			<div class="form-group">
		 				<input type="text" name="company_name" id="" class="form_bor_bot" placeholder="Company Name"><span class="compulsary">*</span>
		 			</div>
		 			<div class="form-group">
		 				<input type="text" name="contact_person" id="contact_person" class="form_bor_bot" placeholder="Contact Person"><span class="compulsary">*</span>
		 			</div>
		 			<div class="form-group">
		 				<input type="text" name="phone_no" id="phone_no" class="form_bor_bot numbersOnly" minlength="10" maxlength="10" placeholder="Phone Number"><span class="compulsary">*</span>
		 			</div>
		 			<div class="form-group">
		 				<input type="text" name="email_id" id="email_id" class="form_bor_bot" placeholder="Email"><span class="compulsary">*</span>
		 			</div>
		 			<div class="form-group">
		 				<select name="country_id" id="country_id" class="form_bor_bot">
		 					<option value="">Country</option>
		 					<option>india</option>
		 				</select><span class="compulsary">*</span>
		 			</div>
		 			<div>
		 				<center><input type="submit" class="btn btn_orange" name ="btnRequest" value="Submit"></center>
		 			</div>
		 		</form>
			</div>
			<div class="clearfix"></div><br/>
	      </div>
	    </div>
  	</div>
	</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script src="<?=$theme_url?>/js/jquery.bxslider.js"></script>
<script src="<?=$theme_url?>/js/jquery.flexisel.js"></script>	
<script type="text/javascript">
	//IMAGE SLIDER

</script>
<script language="javascript" type="text/javascript">
$(".tab_h").find("a").click(function(e) {
    e.preventDefault();
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top-130
    });
});
	function toggleIcon(e) {
    $(e.target)
        .prev('.panel-heading')
        .find(".more-less")
        .toggleClass('glyphicon-plus glyphicon-minus');
}

$('.panel-group').on('hidden.bs.collapse', toggleIcon);
$('.panel-group').on('shown.bs.collapse', toggleIcon);
$('.technicalSpecifications table').addClass('table table-striped');
</script>

<script type="text/javascript">
// 	$(document).ready(function(){
//     $("ag1").click(function(){
//         $("at_glance").css("padding-top", "100");
//     });
// });
//readmore
$(document).ready(function() {
	var showChar = 600;
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

function SaveDataToLocalStorage(machineId)
{ 
	 
	 var machineIds=[];
    // Parse the serialized data back into an aray of objects
	  machineIds = JSON.parse(localStorage.getItem('sessionMachine'));
    // Push the new data (whether it be an object or anything else) onto the array
	machineIds = jQuery.grep(machineIds, function(value) {
			return value != machineId;
	});
    machineIds.push(machineId); 
    // Re-serialize the array back into a string and store it in localStorage
    localStorage.setItem('sessionMachine', JSON.stringify(machineIds));
}

	$(document).ready(function(){ 
		 machineId =  localStorage.getItem('sessionMachine');
		var startMachineId=[];
		if(machineId=='' || !machineId){	
			startMachineId.push('0');	
			localStorage.setItem('sessionMachine',JSON.stringify(startMachineId));
		}
		SaveDataToLocalStorage('<?php echo $machineDetails['md_id']?>');

		// $('.bxslider').bxSlider({
		// 	auto: true,
  // 			autoControls: false,
		// 	mode: 'horizontal',
		// 	moveSlides: 1,
		// 	slideMargin: 0,
		// 	infiniteLoop: true,
		// 	slideWidth: 660,
		// 	minSlides: 1,
		// 	maxSlides: 1,
		// 	speed: 400,
		// 	controls:true,
		// 	pager:true,
		// });
	});
 
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');
$("#machine_enquiry").validate({
   rules: {  
				name:{
					required:true
				},
				companyname:{
					required:true
				},
				email:{
					required:true,
					valEmail:true
				},
				phone:{
					required:true
				},
			},
			messages: { 
				name:{
					required:"Please enter name"
				},
				companyname:{
					required:"Please enter company name"
				},
				email:{
					required:"Please enter email id"
				},
				phone:{
					required:"Please enter phone number"
				},
			}
		}); 
//loanEnquiry validation
$("#loanEnquiry").validate({
   rules: {  
				contact_person:{
					required:true
				},
				company_name:{
					required:true
				},
				email_id:{
					required:true,
					valEmail:true
				},
				phone_no:{
					required:true
				},
				country_id:{
					required:true
				},
			},
			messages: { 
				contact_person:{
					required:"Please enter contact person name"
				},
				company_name:{
					required:"Please enter company name"
				},
				email_id:{
					required:"Please enter email id"
				},
				phone_no:{
					required:"Please enter phone number"
				},
				country_id:{
					required:"Please select country"
				},
			}
		}); 

//contactEnquiry
$("#contactEnquiry").validate({
   rules: {  
				message:{
					required:true
				},
			},
			messages: { 
				message:{
					required:"Please enter message"
				},
			}
		}); 

$(document).ready(function(){
	$("#listDetails").hide();
    $("#showllist").click(function(){
        $("#listDetails").toggle();
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
    $('[data-toggle="popover"]').popover({
        placement : 'right',
        trigger : 'hover'
    });
});
</script>
<script type="text/javascript">
	(function($){
		$(document).ready(function(){

	            //bxslider
$('#slide-counter').prepend('<strong class="current-index"></strong>/');

var slider = $('#slideshow').bxSlider({
	auto: true,
	pager:false,
	onSliderLoad: function (currentIndex){
		$('#slide-counter .current-index').text(currentIndex + 1);
	},
	onSlideBefore: function ($slideElement, oldIndex, newIndex){
		$('#slide-counter .current-index').text(newIndex + 1);
	}
});

$('#slide-counter').append(slider.getSlideCount());

			});
				 
		})(jQuery);
		
		$(window).load(function() {
			$('.cadcam1').each(function(){
    			$(this).flexisel({
					visibleItems: 4,
					itemsToScroll: 1,         
					autoPlay: {
						enable: false,
						interval: 5000,
						pauseOnHover: true
					},

					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1,
							itemsToScroll: 1
						}, 
						landscape: { 
							changePoint:639,
							visibleItems: 2,
							itemsToScroll: 2
						},
						tablet: { 
							changePoint:769,
							visibleItems: 3,
							itemsToScroll: 3
						}
					}				
				});
			});
		}); 

        </script>
<?php echo $this->template->contentEnd();	?> 