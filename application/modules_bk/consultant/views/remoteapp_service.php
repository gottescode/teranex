<link href="<?php echo $theme_url?>/css/scrollheader.css" rel="stylesheet" type="text/css">
<style type="text/css">
	.bx-shadow{
		min-height: 375px;
	}
</style>
<div class="container" style="margin-top:79px"><img src="<?php echo $theme_url?>/images/service-consulting-bg.jpg" width="100%"></div>

<div class="container sq-tiles">
	<?php 	// display messages
			if(hasFlash("dataMsgServiceRequestSuccess"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgServiceRequestSuccess"); ?>
				</div>
	<?php	}	?>
	<?php 	// display messages
			if(hasFlash("dataMsgServiceRequestError"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgServiceRequestError"); ?>
				</div>
	<?php	}	?>
	<div class="col-sm-12 box-padd padd-0">

        <h1>Remote Application Service</h1>
		<p>At TeraneX, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance</p>
        <div class="col-sm-3">
			<div class="bx-shadow">
				<a href="#">
					<img src="<?php echo $theme_url?>/images/ser1.jpg" width="100%">
					<div class="box-cont">
						<h3>Process Optimization</h3>
						<p>At TeraneX, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance</p>
						<!--<span class="lern"><a href="">Learn more...</a></span>-->
					</div>
				</a>
			</div>
        </div>
        <div class="col-sm-3">
			<div class="bx-shadow">
				<a href="#">
					<img src="<?php echo $theme_url?>/images/Application_support.jpg" width="100%">
					<div class="box-cont">
						<h3>Product Enhancement</h3>
						<p>At TeraneX, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance</p>
						<!--<span class="lern"><a href="">Learn more...</a></span>-->
					</div>
				</a>
			</div>
        </div>
        <div class="col-sm-3">
			<div class="bx-shadow">
				<a href="#">
					<img src="<?php echo $theme_url?>/images/service-support.jpg" width="100%">
					<div class="box-cont">
						<h3>Product development / Prototype</h3>
						<p>At TeraneX, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance</p>
						<!--<span class="lern"><a href="">Learn more...</a></span>-->
					</div>
				</a>
			</div>
        </div>
        <div class="col-sm-3">
			<div class="bx-shadow">
			<?php if($this->session->userdata('uid')==''){?>
				<a href="#" data-toggle="modal" data-target="#signinModal">
			<?php }else{?>
				<a href="#" data-toggle="modal" data-target="#serviceagreement_modal">
			<?php }?>
					<img src="<?php echo $theme_url?>/images/ser3.jpg" width="100%">
					<div class="box-cont">
						<h3>Service Agreement</h3>
						<p>At TeraneX, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance</p>
						<!--<span class="lern"><a href="">Learn more...</a></span>-->
					</div>
				</a>
			</div>
        </div>
    </div>
    <!-- <div class="col-sm-12">
    	<center><a href="<?php echo site_url()."consultant/request_service_support"?>" class="btn btn_orange">Request service Support</a></center>
    </div> -->
</div>
<div class="clearfix"></div><br/>
<!-- serviceagreement_modal -->
<div id="serviceagreement_modal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <center><h4 class="modal-title">Service Agreement</h4></center>
      </div>
      <div class="modal-body">
      	<div class="col-sm-12 border_bot">
  			<form class="col-sm-12 form-horizontal" name="#" id="service_agreement_form" method="post" action="<?php echo site_url().'consultant/request_service_support'?>" type="multipart/form-data">
					<div class="form-group ">
						<input type="text" class="form_bor_bot" id="company_name" name="company_name" value= "" placeholder="Company name" required><span class="compulsary">*</span>
					</div>
					<div class="form-group">
					  	<input type="text" class="form_bor_bot" id="machine_model_no" name="machine_model_no" value= "" placeholder="Machnine Model ID" required><span class="compulsary">*</span>
					</div>
				  	<div class="form-group ">
				  		<select class="form_bor_bot" id="service_type" name="service_type">
				  			<option value="">Select Service Type</option>
				  			<option value="Machine Breakdown">Machine Breakdown</option>
				  			<option value="Machine Maintenance">Machine Maintenance</option>
				  			<option value="Service Agreement">Service Agreement</option>
				  			<option value="On-Demand Service">On-Demand Service</option>
				  		</select><span class="compulsary">*</span>
				  	</div>
					<div class="form-group">
					  	<textarea type="text" class="form_bor_bot" name="problem_note" id="problem_note" placeholder="Nature of problem"></textarea><span class="compulsary">*</span>
					</div><br/>
					<div class="form-group">
						<div class="">
							<input type="submit" name="btnRequest" id="submit" class="btn btn_orange" value="Service Request" style="width: 100%"> 
							<!-- <input type="submit" name="" id="submit" class="btn btn_orange" value="Service Request" style="width: 100%" /> -->
						</div>
					</div>
			</form>
      	</div>
      	<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>

<script  src="<?php echo $theme_url?>/js/scrollheader.js"></script>

<script src="<?=$theme_url;?>/js/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript">

$(document).ready()
	$("#service_agreement_form").validate({ 
            rules: {
				company_name:{
                	required: true
                }, 
				machine_model_no:{
                	required: true
                },
				service_type:{
                	required: true
                },
				problem_note:{
                	required: true
                },
            },
			messages: { 
				company_name:{
                	required: "Please enter company name"
                }, 
				machine_model_no:{
                	required: "Please enter machine model id"
                },
				service_type:{
                	required: "Please select service type"
                },
				problem_note:{
                	required: "Please enter nature of problem"
                },		
			}
	}); 

</script>
<?php echo $this->template->contentEnd(); ?>