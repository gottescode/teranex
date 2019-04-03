<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/machine.css"/>
<style type="text/css">
.mar-tb-20 {
    margin-top: 20px;
    margin-bottom: 20px;
}
.softbx-bdr {
    min-height: 304px;
}
.videosize{    
	margin-top: 5px;
    height: 243px;
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
video {
    display: inline-block;
    vertical-align: baseline;
    object-fit: unset;
    width: 396px;
    height: 271px;
    /* object-fit: cover; */
}
</style>
<?php echo $this->template->contentEnd();	?>
<?php 
$uid = $this->session->userdata('uid');
$u_name = $this->session->userdata('u_name');

if($data['compareMachine_ids']){
	$data['machine_ids'] = $data['compareMachine_ids']; 
	$url = site_url()."machine/api/findMultipleComapareMachines";
	$result = apiCall($url,"POST",$data);
	$result = $result['result'];
}else{
	//echo "No  machine data has been Selected for comparision";
}
?>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-8 padd-0">
     <!--  <ul>
        <li class="myprofile">Consultants</li>
      </ul> -->
      <h2 class="margin-0">Compare Machines</h2>
    </div>
    <div class="col-sm-4">
     	<p class="pull-right"><a href="<?php echo site_url()."machine/machineList/{$catId}/{$machinUsed}"?>">Back to Results</a> | <a href="<?php echo site_url()."machine/machineList/{$catId}/{$machinUsed}"?>">See more models</a></p>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

<!-- <div class="container-fluid programmers-grey-bg">
  	<div class="container">
	    <div class="col-sm-offset-1 col-sm-10 padd-0">
	    	<div class="col-sm-8 col-md-8 padd-0">
		     	<p><a href="<?php echo site_url()."machine/machineList/{$catId}/{$machinUsed}"?>">Back to Results</a> | <a href="<?php echo site_url()."machine/machineList/{$catId}/{$machinUsed}"?>">See more models</a></p>
		    </div>
		    <div class="col-sm-4 col-md-4 sortby-marg padd-0">
		    </div>
	    </div>
 	</div>
</div> -->
<!-- /.container-fluid --><br/>
<div class="container-fliud">
	<div class="container">
	<?php if($data['compareMachine_ids']){ ?>
<div class="col-xs-12">
	<div class = "col-md-3 col-xs-3" style="padding:0px">
		<ul class="list-group align">
			<li class="list-group-item borderli" style="padding-top: 90px"></li>
			<li class="list-group-item backBorder">Brand Name  </li>
			<li class="list-group-item ">Model No. :</li>
			<li class="list-group-item backBorder">Table W :</li>
			<li class="list-group-item">Table L :</li>
			<li class="list-group-item backBorder">Axes :</li>
			<li class="list-group-item">Travel Long :</li>
			<li class="list-group-item backBorder">Travel Cross :</li>
			<li class="list-group-item">Power :</li>
			<li class="list-group-item backBorder">RPM :</li>
		</ul>
	</div>

	<?php 
	$i=1;
	foreach($result as $row){ 
	?>
	<div class = "col-md-3 col-xs-3"  style="padding:0px">
		<ul class="list-group ">
			<li class="list-group-item borderli "><center><img src="<?=base_url().'/uploads/machine/'.$row['machine_image'];?>" height="80px" width="100px"></center></li>
			<li class="list-group-item backBorder"><?php  echo $row['brand_name']; ?> </li>
			<li class="list-group-item"><?php  echo $row['model_no']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['table_w']?> </li>
			<li class="list-group-item"><?php  echo $row['table_l']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['machine_axes']?> </li>
			<li class="list-group-item"><?php  echo $row['travel_long']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['travel_cross']?> </li>
			<li class="list-group-item"><?php  echo $row['machine_power']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['machine_rpm']?> </li>
			<li class="list-group-item ">
			<?php if($uid){
				?>
				<center><a href="javascript:void(0)" class="btn btn_orange modalOpen"  id="<?php echo $row['md_id']; ?> " model_no="<?php  echo $row['model_no']?>" brand_name = "<?php  echo $row['brand_name']?>" >Enquire</a></center>
			<? }else{ ?>
				<center><a href="" class="btn btn_orange" data-toggle="modal" data-target="#signinModal">Enquire</a></center>
			<?php }
			?>
			</li>
		</ul>
	</div>
	<? $i++; } 
	?>
</div>
	</div> 
	<? }else{
		?>
		<h3> Please Select more than two machine's to compare..!!</h3>
		<?
	} ?>
	<div class="clearfix"></div>
</div>  
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
								<span class="fg_span"><input type="radio" value="B" name="video_chat"> Book a live demo</span><br/>
								<span>
								<!--<input type="radio" value="M" name="video_chat"> machine inspection.<br/> <br/> -->
								<!-- <input type="radio" value="H" name="video_chat"> Hire a third party consultant</span><br/> -->
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
							  	<source src="<?php echo site_url()."uploads/machine/".$machineDetails['machine_video']?>" type="video/mp4">
							  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
							  	Your browser does not support the video tag.
							</video>
						</div>
						<div class="B chatbox" style="display: none;">
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
	</div>
</div>

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
						  	<input type="text" class="form_bor_bot" id="brand_name" name="brand_name" placeholder="Brand">
					  	</div>
					  	<div class="form-group ">
						  	<input type="text" class="form_bor_bot" id="model" name="model" placeholder="Model">
						  	<input type="hidden" class="" id="compared_machine_ids" name="compared_machine_ids" placeholder="compared_machine_ids" value= "<?php echo $data['compareMachine_ids']; ?>">
						  	<input type="hidden" class="" id="md_id" name="md_id" value= "">
						  	<input type="hidden" class="" id="u_id" name="u_id" value= "<?php echo $uid; ?>">
					  	</div>
					  	<div class="form-group ">
						  	<textarea type="text" name="message" id="message" class="form_bor_bot" placeholder="Message"></textarea>
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

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
	$(document).ready(function(){
		// $(".chatbox").hide();
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chatbox").not(targetBox).hide();
        $(targetBox).show();
    });
}); 

$('.modalOpen').click(function (){
	$('#enquiremodal').modal('show');
	$('#brand_name').val($(this).attr('brand_name'));
	$('#model').val($(this).attr('model_no'));
	$('#md_id').val($(this).attr('id'));
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
					required:"Please enter full name"
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
</script>
<?php echo $this->template->contentEnd();	?>