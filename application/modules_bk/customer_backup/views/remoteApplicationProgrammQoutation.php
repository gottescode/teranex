 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Quotation</li>
      </ul>
    </div>
    <div class="col-sm-8 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <!-- <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?>
	<div class="bg_white">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12"> 
			<div class="border_bot col-sm-offset-1 col-md-10 col-sm-10 col-xs-10" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">  
				<?php 	// display messages
						if(hasFlash("dataMsgAddError"))	{	?>
							<div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgAddError"); ?>
							</div>
				<?php }	?>
					<form class="form" name="qoutationAdd" id="traineeAdd" method="post" action="" enctype="multipart/form-data">
						<div class="form-group">
							<label class="control-label col-sm-4" for="">Number of Hours:<span class="star">*</span></label>
							<div class="col-sm-6">
								<input type="text" class="form_bor_bot numbersOnly" id="number_of_hours" name="number_of_hours" placeholder="Number of Hours"  value="<?php echo $result['number_of_hours']?>" />
							</div>
						</div><div class="clearfix"></div><br/>
						<div class="form-group">
							<label class="control-label col-sm-4" for="">Lead Time:</label>
							<div class="col-sm-6">
								<input type="text" class="form_bor_bot numbersOnly" id="lead_time" name="lead_time" placeholder="Lead Time"   value="<?php echo $result['lead_time']?>"/>
							</div>
						</div><div class="clearfix"></div><br/>
						<div class="form-group ">
							<label class="control-label col-sm-4" for="">Program Description:</label>
							<div class="col-sm-6">
								<textarea class="form_bor_bot  " id="program_description" name="program_description" placeholder="Program Description" ><?php echo $result['program_description']?></textarea> 
							</div>
						</div><div class="clearfix"></div><br/>
						<div class="form-group">
							<label class="control-label col-sm-4" for="">Sample Product Drawing File:</label>
							<div class="col-sm-6">
								<input type="file" class="" id="sampleProductDrawing" name="sampleProductDrawing" placeholder=""  /> 
							</div>
						</div><div class="clearfix"></div><br/>
						<div class="form-group ">
							<label class="control-label col-sm-4" for="">Tax Rate:</label>
							<div class="col-sm-6">
								<input type="text" class="form_bor_bot numbersOnly" id="tax_rate" name="tax_rate" placeholder="Tax Rate"   value="<?php echo $result['tax_rate']?>"/> 
								<input type="hidden" name="old_document"  value="<?php echo $result['sample_product_drawing']?>"/> 
							</div>
						</div>
						 <div class="clearfix"></div><br/>
						 
						<div class="form-group col-sm-12 col-xs-6">
						<?php if( $result['request_status']=='A'){  }else{?>
						   <center><input type="submit" name="btnSubmit" id="submit" class="btn btn-default submit-btn btn_orange" value="Add Quotation" /></center>
						<?php }?>
						</div>
						 
					</form>
			</div>
		</div><div class="clearfix"></div><br/>
	</div>
	
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/location.js"></script>  
<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#qoutationAdd").submit(function(){
			
	if($("#AddressType").val() == "")
	{
		alert("Address Type is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>
  
<script>  
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');

$("#traineeAdd").validate({
   rules: {  
				number_of_hours:{
					required:true
				},
	 
			},
			messages: { 
				number_of_hours:{
					required:"Please enter number of hours"
				}, 
			}
		}); 
</script>
<?php $this->template->contentEnd();	?> 