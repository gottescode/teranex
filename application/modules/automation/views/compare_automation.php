<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/machine.css"/>
<?php echo $this->template->contentEnd();	?>
<?php 
$uid = $this->session->userdata('uid');
$u_name = $this->session->userdata('u_name');

if($data['compareAutomation_ids']){
	$data['automation_ids'] = $data['compareAutomation_ids']; 
	$url = site_url()."automation/api/findMultipleComapareAutomations";
	$result = apiCall($url,"POST",$data);
	$result = $result['result'];
	//print_r($result);exit;
}else{
	//echo "No  machine data has been Selected for comparision";
}
?>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-10">
     <!--  <ul>
        <li class="myprofile">Consultants</li>
      </ul> -->
      <h2 class="margin-0">Compare Automations</h2>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

<div class="container-fluid programmers-grey-bg">
  	<div class="container">
	    <div class="col-sm-offset-1 col-sm-10">
	    	<div class="col-sm-8 col-md-8 padd-0">
		     	<p><a href="<?php echo site_url()."automation/automationList/{$catId}/{$automationUsed}"?>">Back to Results</a> | <a href="<?php echo site_url()."automation/automationList/{$catId}/{$automationUsed}"?>">See more models</a></p>
		    </div>
		    <div class="col-sm-4 col-md-4 sortby-marg padd-0">
		     	 <!--<p class="pull-right"><a href="">Print <span><i class="fa fa-print"></i></span></a> </p> --> 
		    </div>
	    </div>
 	</div>
  <!-- /.container --> 
</div>
<!-- /.container-fluid --><br/>
<div class="container-fliud">
	<div class="container"><?php if($data['compareAutomation_ids']){ ?>
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
			<li class="list-group-item borderli "><center><img src="<?=base_url().'/uploads/automation/'.$row['automation_image'];?>" height="80px" width="100px"></center></li>
			<li class="list-group-item backBorder"><?php  echo $row['brand_name']; ?> </li>
			<li class="list-group-item"><?php  echo $row['model_no']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['table_w']?> </li>
			<li class="list-group-item"><?php  echo $row['table_l']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['automation_axes']?> </li>
			<li class="list-group-item"><?php  echo $row['travel_long']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['travel_cross']?> </li>
			<li class="list-group-item"><?php  echo $row['automation_power']?> </li>
			<li class="list-group-item backBorder"><?php  echo $row['automation_rpm']?> </li>
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
	<?php }else{
		?>
		<h3> Please Select more than two Automations to compare..!!</h3>
		<?
	}?>
	</div> 
	<div class="clearfix"></div>
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
		        <form class="form-horizontal" name="#" id="automation_enquiry" method="post" action="">
					  	<div class="form-group ">
						  	<input type="text" class="form_bor_bot" id="brand_name" name="brand_name" placeholder="Brand">
					  	</div>
					  	<div class="form-group ">
						  	<input type="text" class="form_bor_bot" id="model" name="model" placeholder="Model">
						  	<input type="hidden" class="" id="compared_automation_ids" name="compared_automation_ids" placeholder="compared_automation_ids" value= "<?php echo $data['compareMachine_ids']; ?>">
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
$("#automation_enquiry").validate({
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