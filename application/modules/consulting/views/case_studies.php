<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
<style>
.btn_blu{
	background-color: #1e282c;color: #fff;
	border-radius: 0;
	    padding: 6px 7px;
	    font-size: 12px;
}
.btn_blu:hover, .btn_blu:focus{
	background-color: #fff;
	color: #1e282c;
	border: 1px solid #1e282c;
	border-radius: 0;
}
	.emp-profile p{float:left;width:100%}
	.emp-profile p div:first-child{font-weight:700}
	.emp-profile .prof-img{
		width: 70%;
		display: block;
		border-radius: 50%;
		margin: auto;
	}
	.emp-profile .modal-header {
		padding: 15px;
		border-bottom: 1px solid #a5c049;
		background: #a5c049;
		color: #fff;
	}
</style>
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" ">
</div>
<div class="container">

    <div class="col-sm-12 padd-0"> 
		<span class="pull-left full-width">
			<center>
				<h1>Consulting</h1>
			</center>
		</span>
    	<div class="pull-right stc">
    		<a href="" data-toggle="modal" data-target="#speakconsultant" class="col-sm-2 btn btn_orange pull-right">Speak To Consultant</a>
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
    	<!--<a href="" data-toggle="modal" data-target="#Webinar" class="btn btn_orange pull-right">Webinar</a>-->
    	<!--<div class="pull-right full-width">
	    	<a href="" data-toggle="modal" data-target="#speakconsultant" class="col-sm-2 btn btn_orange  pull-right">Speak To Consultant</a>
	    </div>
    	<a href="" data-toggle="modal" data-target="#callrequest" class="btn btn_orange pull-right">Request a call</a>-->
	  	<div class="clearfix"></div>
    	<div class="col-sm-3 padd-0">
    		<div class="gray_bg">
	      		<h3 class="padd_5">Categories</h3>
	      	</div>
		  	<ul class="report_category">
		  	  <?php foreach($category_list as $rowCat) { ?>
			    <li class="active" style="display: none;padding: 0;"><a href="#"></a></li>
			    <li><a href="<?php echo site_url()."consulting/consulting_category_detail/".formaturl($rowCat['consulting_category_id'])?>"><?php echo $rowCat['consulting_category_name'] ?>
			    </a></li>
			    <?php } ?>
		  	</ul>
	  	</div>
	  	<div class="col-sm-7 caseStudies">
		  	<div class=" report_cat_details">
			    <div id="" class="">
			      	<div class="gray_bg">
			      		<h3 class="padd_5">Case Studies Details</h3>
			      	</div>
					<img src="<?=base_url().'uploads/consulting/'.$consulting_list['case_study_image']?>" class="img-responsive">
					<h4><?php echo $consulting_list['case_study_name'] ?></h4>
			      	<p><?php echo  strhtmldecode($consulting_list['case_study_description']) ?></p>
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
	  		<div class="our_clients" style="border: 1px solid #ccc;">
		      	<div class="text-center"  style="padding: 0 15px;"><br/>
		      		<div><a href="" class="btn btn_blu full-width" data-toggle="modal" data-target="#reqsample">Request Sample</a></div>
		      		<!-- <div><a href="" class="btn btn_blu full-width" data-toggle="modal" data-target="#speakconsultant" >Speak to Consultant</a></div> -->
				</div>
	  		</div>
	  		<br/>
	  		<div class="our_clients" style="border: 1px solid #ccc;padding: 0 15px;">
	  			<div class="">
	      			<h4>Need Assistance?</h4>
		      	</div>
		      	<div class="col-sm-12 padd-0"><br/>
		      		<div class="col-xs-6 round_btn"><a href="" data-toggle="modal" data-target="#analyst_query"><span><i class="fa fa-envelope"></i></span><br/> Analyst Query</a></div>
		      		<div class="col-xs-6 round_btn"><a href="" data-toggle="modal" data-target="#sales_query"><span><i class="fa fa-phone"></i></span><br/> Sales Query</a></div>
				</div><div class="clearfix"></div><br/>
	  		</div>
	  		<div class="our_clients our_team" style="border-bottom: 1px solid #ccc;padding-bottom: 20px;float:left; width:100% ">
	  			<div class="gray_bg">
	      			<h3 class="padd_5">Our Team</h3>
		      	</div>
		      	<?php foreach($team_list as $team) { ?>
		      	<div class="team_block">
					<div style="float:left">
						<img src="<?=base_url().'uploads/team/'.$team['team_image']?>" width="82">
					</div>
					<div class="team-details">
						<a href="" data-toggle="modal" data-target="#team"  data-id='<?php echo $team['team_id']?>' class="team-mem"><h5><?php echo $team['name'] ?></h5></a>
						<p><?php echo $team['designation'] ?></p>
					</div>
				</div>
		      <?php } ?>
		      	
			</div>
	  	</div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade emp-profile" id="team" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Team Member</h4></center>
        </div>
        <div class="modal-body" style="padding: 15px 0;">
          	<div class="border_bot col-xs-12 padd-0"> 
	          	<div class="col-sm-offset-3 col-sm-6">
					<p><img id="image" src="" class="prof-img"></img></p>
				</div>
	           	<p id="name"></p>
		      	<p id="designation"></p>
		      	<p id="role"></p>
		      	<p id="experiance"></p>
		      	<p id="prev_company"></p>
		      	<p id="specialization"></p> 
		      	<p id="qualification"></p>
		      	<p id="team_image"></p>
      		</div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>

<!-- Modal -->
<!-- Modal REQUEST FOR SAMPLE-->
<div id="reqsample" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<center><h4 class="modal-title">Request For Sample</h4></center>
	      	</div>
	      	<div class="modal-body">
		        <div class="col-sm-12 border_bot">
		          <div class="col-sm-12">
		        	<form class="form-horizontal" name="requestsample" id="requestsample" method="post" action="" novalidate="novalidate">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot lettersOnly" id="name1" name="name" placeholder="Full Name" required> <span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot lettersOnly" id="company" name="company" placeholder="Company" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot lettersOnly" id="job_title" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact_no" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
		      				<p class="margin-0"><input type="radio" name="reason" value="Budget Limitations" checked> Budget Limitations</p>
		      				<p class="margin-0"><input type="radio" name="reason" value="I have a custom requirement" > I have a custom requirement</p>
		      				<p class=""><input type="radio" name="reason" value="Need to talk to sales person" > Need to talk to sales person</p>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirement" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><button type="submit" name="btnRequest" id="submit" class="btn btn_orange" value="">Submit</button></center>
			      		</div>
			      	</form>
			      </div>
		        </div>
		        <div class="clearfix"></div>
	      	</div>
	    </div>
  	</div>
</div>

<!-- Modal ANALYST QUERY-->
<div id="analyst_query" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<center><h4 class="modal-title">Analyst Query</h4></center>
	      	</div>
	      	<div class="modal-body">
		        <div class="col-sm-12 border_bot">
		          <div class="col-sm-12">
		        	<form class="form-horizontal" name="analystquery" id="analystquery" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot lettersOnly" id="name2" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email1" name="email" placeholder="Email" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot lettersOnly" id="jobtitle1" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirements" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><input type="submit" name="btnanalystQuery" id="submit1" class="btn btn_orange" value="Submit"></center>
			      		</div>
			      	</form>
			      </div>
		        </div>
		        <div class="clearfix"></div>
	      	</div>
	    </div>
  	</div>
</div>
<!-- Modal SALES QUERY-->
<div id="sales_query" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<center><h4 class="modal-title">Sales Query</h4></center>
	      	</div>
	      	<div class="modal-body">
		        <div class="col-sm-12 border_bot">
		        	<div class="col-sm-12">
		        	<form class="form-horizontal" name="salesquery" id="salesquery" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot lettersOnly" id="name3" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email2" name="email" placeholder="Email" required=""> <span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot lettersOnly" id="jobtitle" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group"> 
			      			<input type="text" class="form_bor_bot lettersOnly" id="company1" name="company" placeholder="Company" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact1" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<div class="col-sm-6">
			      				<input type="text" class="form_bor_bot" id="datepicker" name="speak_analyst_date" placeholder="dd-mm-yyyy" required=""><span class="compulsary">*</span>
			      			</div>
			      			<div class="col-sm-6">
			      				<input type="text" class="form_bor_bot" id="timepicker" name="speak_analyst_time" placeholder="hh:mm" required=""><span class="compulsary">*</span>
			      			</div>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirements1" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><input type="submit" name="btnsalesQuery" id="submit2" class="btn btn_orange" value="Submit"></center>
			      		</div>
			      	</form>
			      	</div>
		        </div>
		        <div class="clearfix"></div>
	      	</div>
	    </div>
  	</div>
</div>

<!-- Modal speakconsultant-->
<div class="modal fade" id="speakconsultant" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">Speak to Consultant</h4></center>
        </div>
        <div class="modal-body">
          	<div class="border_bot col-xs-12">
	      		<form class="form" name="call_request" id="call_request" method="post" action="">
	      			<div class="form-group">
	      				<input type="text" class="form_bor_bot lettersOnly" id="name4" name="name" placeholder="Name " value="" required > <span class="compulsary">*</span>
	      			</div>
	      			<div class="form-group">
	      				<input type="email" class="form_bor_bot" id="email3" name="email" placeholder="Email" value="" required> <span class="compulsary">*</span>	
	              	</div>
	             	<div class="form-group">
	      				<input type="text" class="form_bor_bot lettersOnly" id="job_title1" name="job_title" placeholder="Job Title" value="" required><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<input type="text" class="form_bor_bot lettersOnly" id="company2" name="company" placeholder="Company" value="" required> <span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<input type="text" class="form_bor_bot numbersOnly" id="zip" name="zip_code" minlength="6" maxlength="6" placeholder="Zip Code" value="" required><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<textarea type="text" class="form_bor_bot" id="address" name="address" placeholder="Address" value="" required></textarea> <span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	              		<select class="form_bor_bot" id="country" name="country" required>
	              			<option  value="">Select Country</option>
	              			<option name="country" value="India">India</option>
	              		</select><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<input type="text" class="form_bor_bot numbersOnly" id="contact_no1" name="contact_no" placeholder="Contact No" minlength="10" maxlength="10" value="" required><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">	              		
	      				<input type="text" class="form_bor_bot" id="requirements2" name="requirement" placeholder="Your requirements" value="">
	              	</div>
	      		 	<div class="clearfix"></div><br>
	      			<div class="form-group">
	      			   <center><button type="submit" name="btnSpeakConsultant" id="submit3" class="btn btn_orange">Submit</button></center>
	      			</div>
	      		</form>
      		</div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>
 

<?php $this->template->contentBegin(POS_BOTTOM);?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {

 $(function () {

		$("#datepicker").datepicker({ dateFormat: "dd-M-yy", minDate: 0, changeMonth:true,changeYear: true,yearRange: "-70:+0" }).val()

		$('#timepicker').datetimepicker({

			format: 'HH:mm',

		});

	});

});
// $(function() {
               
// 			   $("#timepicker").timepicker({ 'step': 15});
//        });
</script>
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
jQuery('.lettersOnly').keyup(function () { 
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
// REQUEST FOR SAMPLE

$('#reqsample').on('hidden.bs.modal', function () {
    $('#requestsample').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#requestsample").validate({
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
		   	contact_no:{
		   		required:"Please enter contact number"
		   	},
		}
	}); 

	//analystquery
$('#analyst_query').on('hidden.bs.modal', function () {
    $('#analystquery').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#analystquery").validate({
   	rules: { 
		   	name:{
		   		required:true
		   	},
		   	email:{
		   		required:true,
		   		valEmail:true
		   	},
		   	job_title:{
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
		   	contact_no:{
		   		required:"Please enter contact number"
		   	},
		}
	}); 
	//salesquery
	$('#sales_query').on('hidden.bs.modal', function () {
    $('#salesquery').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#salesquery").validate({
   	rules: { 
		   	name:{
		   		required:true
		   	},
		   	email:{
		   		required:true,
		   		valEmail:true
		   	},
		   	job_title:{
		   		required:true
		   	},
		   	company:{
		   		required:true
		   	},
		   	contact_no:{
		   		required:true
		   	},
		   	speak_analyst_date:{
		   		required:true
		   	},
		   	speak_analyst_time:{
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
		   		required:"Please enter company name"
		   	},
		   	contact_no:{
		   		required:"Please enter contact number"
		   	},
		   	speak_analyst_date:{
		   		required:"Please select date"
		   	},
		   	speak_analyst_time:{
		   		required:"Please select time"
		   	},
		}
	}); 

		</script>
<script type="text/javascript">
 $(".team-mem").click(function(event){
     var id=$(this).data('id');
     debugger;
     //alert(id);
     $.ajax({
        url:"<?php echo base_url('consulting/api/findSingleTeam/') ;?>"+id,
        type: "GET",
        data:{id: id },
        async:false,
        dataType:'json',

         success: function(data) {
        	
        	result = data.result;
        	$('#image').attr('src','<?=base_url().'uploads/team/'?>'+result.team_image);
        	$('#name').html('<div class="col-sm-5">name: </div>'+'<div class="col-sm-7">'+ result.name +'</div>');
        	$('#designation').html('<div class="col-sm-5">Designation : </div>'+'<div class="col-sm-7">'+ result.designation +'</div>');
        	$('#role').html('<div class="col-sm-5">Role :</div>'+'<div class="col-sm-7">'+ result.role +'</div>');
        	$('#experiance').html('<div class="col-sm-5">Experiance :</div>' + '<div class="col-sm-7">'+ result.experiance +'</div>');
        	$('#prev_company').html('<div class="col-sm-5">Previous Company : </div>' + '<div class="col-sm-7">'+ result.prev_company +'</div>');
        	$('#specialization').html('<div class="col-sm-5">Specialization : </div>'+ '<div class="col-sm-7">'+ result.specialization +'</div>');
        	$('#qualification').html('<div class="col-sm-5">Qualification : </div>' + '<div class="col-sm-7">'+  result.qualification +'</div>');
        
        },
       
    });
 });
 </script>
<?php $this->template->contentEnd();  ?> 
