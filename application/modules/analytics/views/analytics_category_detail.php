<?php $this->template->contentBegin(POS_TOP);?>
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
    <!-- <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" "> -->
</div>
<div class="container">
	<div class="col-sm-12 padd-0"> 
		<span class="pull-left full-width">
			<center>
				<h1>Analytics</h1>
			</center>
		</span>
    	<div class="pull-right stc">
    		<a href="" data-toggle="modal" data-target="#speakconsultant" class="col-sm-2 btn btn_orange pull-right">Speak to Consultant</a>
         </div>
    </div>
    
    <div class="col-sm-12 padd-0"> 

    	
	             <?php 	// display messages
					   if(hasFlash("dataMsgEnquirySuccess"))	{	?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("dataMsgEnquirySuccess"); ?>
						</div>
			     <?php }	if(hasFlash("dataMsgEnquiryError"))	{	?>
							<div class="alert alert-danger alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgEnquiryError"); ?>
							</div>
				<?php }	?>	  

    </div>
    <div class="col-sm-12 padd-0">
    	<!--<a href="" data-toggle="modal" data-target="#SpeakToAnalyst" class="btn btn_green pull-right">Speak To Analyst</a>
    	<a href="" data-toggle="modal" data-target="#Webinar" class="btn btn_orange pull-right">Webinar</a>-->
	  	<div class="clearfix"></div>
    	<div class="col-sm-3 padd-0">
    		<div class="gray_bg">
	      		<h3 class="padd_5">Categories</h3>
	      	</div>
		  	<ul class="report_category">
		  		<?php foreach ($total_category_list as $rowCat) { ?>
			    <li class="active" style="display: none;padding: 0;"><a href="#"></a></li>
			    <li><a href="<?php echo site_url()."analytics/analytics_category_detail/".formaturl($rowCat['analytics_category_id'])?>"><?php echo $rowCat['analytics_category_name'] ?>
			    </a></li>
			     	<?php } ?>
				 <li><a href="<?php echo site_url()."snapshot" ?>">Market Monitoring
			    </a></li>	
		  	</ul>
	  	</div>
	  	<div class="col-sm-7">
		  	<div class=" report_cat_details">
			    <div id="" class="">
			      	<div class="gray_bg">
			      		
			      		<h3 class="padd_5"><?php echo $category_list['analytics_category_name'] ?></h3>
			      			
			      	</div>
			      	<p><?php echo strhtmldecode($category_list['analytics_category_description']) ?></p>
					<h4>Reports</h4>
					
					<ul class="all_report">
						<?php foreach ($analytics_list as $rowCaseStudy) { ?>
			      		<li>
			      			<div class="row">
			      				<?php if($rowCaseStudy['case_study_image'] != ''){ ?>
										
								<div class="col-sm-2">
									<img src="<?=base_url().'uploads/analytics/'.$rowCaseStudy['case_study_image']?>" class="img-responsive" style="width:100px">
								</div> 

							    <?php } else { ?>
							    <div class="col-sm-2">
									<img src="<?php echo $theme_url?>/images/blank.jpg" class="img-responsive" style="width:100px">
								</div> 
							    <?php } ?>
								<div class="col-sm-10">
									<a href="<?php echo site_url()."analytics/case_studies/".formaturl($rowCaseStudy['case_study_id'])?>"> <?php echo $rowCaseStudy['case_study_name'] ?></a>
									<p>Updated on:  <?php echo $rowCaseStudy['updated_date']?></p>
									<p><a href=""> <?php echo $rowCaseStudy['analytics_category_name']?></a></p>
								</div>
							</div>
						</li>
						<?php }?>
			      	</ul>
				
					<!-- <ul class="col-sm-12 consulting">
						<?php foreach ($analytics_list as $rowCaseStudy) { ?>
						<li class="col-sm-6">
							<img src="<?=base_url().'uploads/analytics/'.$rowCaseStudy['case_study_image']?>" class="img-responsive">
							<h5><?php echo $rowCaseStudy['case_study_name'] ?></h5>
							<h5><a href="<?php echo site_url()."analytics/case_studies/".formaturl($rowCaseStudy['case_study_id'])?>">Know More</a></h5>
						</li>
						<?php }?>
					</ul> -->
					
			    </div>
		  	</div>
	  	</div>
	  	<div class="col-sm-2 padd-0">
	  		<div class="our_clients" style="border-bottom: 1px solid #ccc;padding-bottom: 20px;">
	  			<div class="gray_bg">
	      			<h3 class="padd_5">Our Clients</h3>
		      	</div>
		      	<div class="bxslider">
				 	<div><img src="<?php echo $theme_url?>/images/logo.jpg" width="200"></div>
				  	<div><img src="<?php echo $theme_url?>/images/logo1oo.jpg" width="200"></div>
				  	<div><img src="<?php echo $theme_url?>/images/logo2trans.png" width="200"></div>
				</div>
	  		</div>
	  		<div class="our_clients" style="border-bottom: 1px solid #ccc;padding-bottom: 10px;">
	  			<div class="gray_bg">
	      			<h3 class="padd_5">Tweet</h3>
		      	</div>
		      	<div class="bxslider">
				 	<div><img src="<?php echo $theme_url?>/images/logo.jpg" width="150"></div>
				  	<div><img src="<?php echo $theme_url?>/images/logo1oo.jpg" width="150"></div>
				  	<div><img src="<?php echo $theme_url?>/images/logo2trans.png" width="150"></div>
				</div>
	  		</div>
	  		<div class="our_clients" style="border-bottom: 1px solid #ccc;padding-bottom: 20px;">
	  			<div class="gray_bg">
	      			<h3 class="padd_5">Industry Videos</h3>
		      	</div>
		      	<div class="video-scroll">
				  	<div>
						<h5>Videos</h5>
						<video width="100%" controls height="auto">
						  <source src="<?php echo $theme_url?>/images/sample.mp4" type="video/mp4">
						  <source src="<?php echo $theme_url?>/images/sample.ogg" type="video/ogg">
						  Your browser does not support the video tag.
						</video>
					</div>
				  	<div>
						<h5>Videos</h5>
						<video width="100%" controls height="auto">
						  <source src="<?php echo $theme_url?>/images/sample.mp4" type="video/mp4">
						  <source src="<?php echo $theme_url?>/images/sample.ogg" type="video/ogg">
						  Your browser does not support the video tag.
						</video>
					</div>
				  	<div>
						<h5>Videos</h5>
						<video width="100%" controls height="auto">
						  <source src="<?php echo $theme_url?>/images/sample.mp4" type="video/mp4">
						  <source src="<?php echo $theme_url?>/images/sample.ogg" type="video/ogg">
						  Your browser does not support the video tag.
						</video>
					</div>
				</div>
	  		</div>
	  	</div>
    </div>
</div>
 <!-- Modal Speak to Consultant-->
  <div class="modal fade" id="speakconsultant" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Speak to Consultant</h4></center>
        </div>
        <div class="modal-body">
          	<div class="border_bot col-xs-12 " > 
	      		<form class="form" name="call_request" id="call_request" method="post" action="" novalidate="novalidate">
	      			<div class="form-group">
	      				<input type="text" class="form_bor_bot alphaSpace" id="name" name="name" placeholder="Name " value=""><span class="compulsary">*</span>
	      			</div><div class="clearfix"></div>
	      			<div class="form-group">
	      				<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" value=""><span class="compulsary">*</span>	
	              	</div>
	             	<div class="form-group">
	      				<input type="text" class="form_bor_bot alphaSpace" id="jobtitle" name="job_title" placeholder="Job Title" value=""><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<input type="text" class="form_bor_bot alphaSpace" id="company" name="company" placeholder="Company" value=""><span class="compulsary">*</span>
	              	</div>
	              	 	<div class="form-group">
	      				<input type="text" class="form_bor_bot numbersOnly" id="zip" name="zip_code" minlength="6" maxlength="6" placeholder="Zip Code" value="" required><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<textarea type="text" class="form_bor_bot" id="address" name="address" placeholder="Address" value="" required></textarea> <span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	              		<select class="form_bor_bot" id="country" name="country">
	              			<option  value="">Select Country</option>
	              			<option name="country" value="India">India</option>
	              		</select><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<input type="text" class="form_bor_bot numbersOnly" id="phone" name="contact_no" placeholder="Contact No" minlength="10" maxlength="10" value=""><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">	              		
	      				<input type="text" class="form_bor_bot" id="requirements" name="requirement" placeholder="Your requirements" value="">
	              	</div>
	      		 	<div class="clearfix"></div><br>
	      			<div class="form-group">
	      			   <center><input type="submit" name="btnSpeakConsultant" id="submit" class="btn btn_orange" value="Submit"></center>
	      			</div>
	      		</form>
      		</div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>


<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?php echo $theme_url;?>/js/jquery.bxslider.min.js"></script>
<script type="text/javascript">
$('.bxslider').bxSlider({
  auto: true,
  controls:false,
  autoControls: false,
  stopAutoOnClick: false,
  pager: false,
  slideWidth: 200
});
</script>
<script type="text/javascript">
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.alphaSpace').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
jQuery('.alphaNumeric').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z0-9\.]/g,'');
});
jQuery.validator.addMethod("valEmail1", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');
$('#speakconsultant').on('hidden.bs.modal', function () {
    $('#call_request').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#call_request").validate({
   	rules: { 
		   	name:{
		   		required:true
		   	},
		   	email:{
		   		required:true,
		   		valEmail1:true
		   	},
		   	job_title:{
		   		required:true
		   	},
		   	company:{
		   		required:true
		   	},
		   	zip_code:{
		   		required:true
		   	},
		   	address:{
		   		required:true
		   	},
		   	country:{
		   		required:true
		   	},
		   	contact_no:{
		   		required:true
		   	},
   	 },
	messages: { 
			name:{
   				required:"Please enter your name"
		   	},
		   	email:{
		   		required:"Please enter email"
		   	},
		   	job_title:{
		   		required:"Please enter job title"
		   	},
		   	company:{
		   		required:"Please enter company"
		   	},
		   	zip_code:{
		   		required:"Please enter zip code"
		   	},
		   	address:{
		   		required:"Please enter address"
		   	},
		   	country:{
		   		required:"Please select country"
		   	},
		   	contact_no:{
		   		required:"Please enter phone number"
		   	},
		}
	}); 
</script>
<?php $this->template->contentEnd();  ?> 
