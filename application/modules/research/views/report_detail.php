<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">

<style type="text/css">
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
.report_cat_details ul.all_report li .row {
    margin-bottom: 5px;
}
.modal-dialog {
    width: 400px;
    margin: 30px auto;
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
   <!--  <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" "> -->
</div>
<div class="container">
    <div class="col-sm-12 padd-0"> 
		<span class="pull-left full-width">
			<center>
				<h1>Research</h1>
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
    	<div class="col-sm-3 padd-0">
    		<div class="gray_bg">
	      		<h3 class="padd_5">Categories</h3>
	      	</div>
	      	<?php if($category_list){
					foreach($category_list as $rowCat){
						//print_r($category_list);exit;
					?>
		  	 	<ul class="report_category">
			    <li class="active" style="display: none;padding: 0;"><a href="#"></a></li>
			    <li><a href="<?php echo site_url()."research/research_list/$rowCat[report_category_id]/".formaturl($rowCat['report_category_name'])?>"><?php echo $rowCat['report_category_name']?></a></li>
			    <!--<li><a href="<?php echo site_url();?>research/report_category">Category2</a></li>
			    <li><a href="<?php echo site_url();?>research/report_category">Category3</a></li>
			    <li><a href="<?php echo site_url();?>research/report_category">Category4</a></li>-->
		  	</ul>
		  	<?php }}?>
	  	</div>
	  	

	  	<div class="col-sm-7">
		  	<div class="report_cat_details">
			    <div id="" class="">
			    	<div class="gray_bg">
			      		<h3 class="padd_5">Reports Details</h3>
			      	</div>
			      	<div class="">
						<div class="col-sm-2 padd-0">
							<img src="<?=base_url().'uploads/research/'.$research_list['report_image']?>" class="img-responsive" style="width:100px">
						</div> 
						<div class="col-sm-10">
							<a href="<?php echo site_url()."research/report_detail/".formaturl($research_list['report_id'])?>"><?php echo $research_list['report_name']?></a>
							<p>Updated on: <?php echo $research_list['report_date']?> | Price: <?php echo $research_list['report_single_price'] ?></p>	
							<div class="share_on">
								<a href="#" class="btn btn_fb"><i class="fa fa-facebook"></i> Share</a>
								<a href="#" class="btn btn_tw"><i class="fa fa-twitter"></i> Tweet</a>
								<a href="#" class="btn btn_print"><i class="fa fa-pinterest"></i> Save</a>
								<a href="#" class="btn btn_gp"><i class="fa fa-google-plus"></i> </a>
							</div>
						</div>
					</div>    
					<div class="clearfix"></div><br/>
					<div class="report_desc">
						<ul class="nav nav-tabs desc_tab">
						    <li class="active"><a data-toggle="tab" href="#r1">Report Description</a></li>
						    <li><a data-toggle="tab" href="#r2">Table of contents</a></li>
						    <li><a data-toggle="tab" href="#r3">Table and figures</a></li>
						    <li><a data-toggle="tab" href="#r4">Customization Options</a></li>
						</ul>
						<div class="tab-content">
						    <div id="r1" class="tab-pane fade in active">
						      	<h3>Report Description</h3>
						      	<p><?php echo strhtmldecode($research_list['report_description']);?></p>
					    	</div>
					    	<div id="r2" class="tab-pane fade">
						      	<h3>Table of contents</h3>
						      	<p><?php echo strhtmldecode($research_list['report_table_of_content']);?></p>
					    	</div>
					    	<div id="r3" class="tab-pane fade">
						      	<h3>Table and figures</h3>
						      	<p><?php echo strhtmldecode($research_list['report_tables_figures']);?></p>
					    	</div>
					    	<div id="r4" class="tab-pane fade">
						      	<h3>Customization Options</h3>
						      	<form class="" name="cust_option_form" > 
						      		<div class="form-group">
						      			<input type="checkbox" name="cust_option[]"  id="myCheckboxes" value="Company Profile"> Company Profile
						      		</div>
						      		<div class="form-group">
						      			<input type="checkbox" name="cust_option[]" id="myCheckboxes1"  value="Analyst Briefing"> Analyst Briefing
						      		</div>
						      		<div class="form-group">
						      			<input type="checkbox" name="cust_option[]" id="myCheckboxes2"  value="Data Tables"> Data Tables
						      		</div>
						      		<div class="form-group">
						      			<input type="checkbox" name="cust_option[]" id="myCheckboxes3"  value="Key Contacts"> Key Contacts
						      		</div>
						      		<div class="form-group">
						      			<input type="checkbox" name="cust_option[]" id="myCheckboxes4"  value="Free Customization"> Free Customization
						      		</div>
						      		<div class="form-group">
						      			<center><input class="btn btn_orange" value="Submit" data-toggle="modal" data-target="#mymodel" onclick="return submitForm()"></center>
						      		</div>
						      	</form>

						    </div>
						</div>
					</div> 
			    </div>
		  	</div>
	  	</div>
	  	<div class="col-sm-2 padd-0">
	  		<div class="our_clients" style="border: 1px solid #ccc;">
	  			<div class="gray_bg">
	      			<b><p class="padd_5">Please select Licence</p></b>
		      	</div>
		      	<div class="" style="padding: 0 15px;">
		      		<form name="licenceform" id="licenceform" type="multipart/form-data"  method="post" >
			      		<div class="radio">
						    <label class="pading_left_0"><input type="radio" name="licence_type"  class="required" value="Single" required>Single User Licence: Rs <?php echo $research_list['report_single_price'] ?></label>
						</div>
						<div class="radio">
						    <label class="pading_left_0"><input type="radio" name="licence_type" class="required" value="Corporate" required>Corporate User Licence: Rs <?php echo $research_list['report_corporate_price'] ?></label>
						</div>
						<div>
						<?php if($this->session->userdata('uid')==''){?>
							<a href="#" data-toggle="modal" data-target="#signinModal" class="btn btn_orange full-width" style="font-size: 12px;">Buy Now</a>
						<?php }else{?> 
							<button type="submit" name="btnLicence" value="linc" class="btn btn_orange full-width" style="font-size: 12px;">Buy Now</button>
							<input type="hidden" name="licence_single" value="<?php echo $research_list['report_single_price'] ?>">
							<input type="hidden" name="licence_corporate" value="<?php echo $research_list['report_corporate_price'] ?>">
						<?php } ?>
						</div>
					</form>
				</div>
	  		</div><br/>
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
	  		</div><br/>
	  		<div class="our_clients our_team" style="border: 1px solid #ccc;padding-bottom: 20px;float:left; width:100% ">
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
    <div class="clearfix"></div><br/>
</div>
<!--Modal TEAM DETAIL -->
<div class="modal fade emp-profile" id="team" role="dialog">
    <div class="modal-dialog">
      	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <center><h4 class="modal-title">Team Member</h4></center>
	        </div>
	        <div class="modal-body">
	          	<div class="border_bot col-xs-12"> 
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
<!-- Modal REQUEST FOR SAMPLE-->
<div id="reqsample" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<center><h4 class="modal-title">REQUEST FOR SAMPLE</h4></center>
	      	</div>
	      	<div class="modal-body">
		        <div class="col-sm-12 border_bot">
		          <div class="col-sm-12">
		        	<form class="form form-horizontal" name="requestsample" id="requestsample" method="post" action="" novalidate="novalidate">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot alphaSpace" id="name1" name="name" placeholder="Full Name" required> <span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="job_title" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact_no" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
		      				<p class="margin-0"><input type="radio" name="reason" value="Budget Limitations" > Budget Limitations</p>
		      				<p class="margin-0"><input type="radio" name="reason" value="I have a custom requirement" > I have a custom requirement</p>
		      				<p class=""><input type="radio" name="reason" value="Need to talk to sales person" > Need to talk to sales person</p>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirement" name="requirement" placeholder="Requirements">
			      		</div>
			      		<!--<div class="form-group">
			      			<input type="text" class="form_bor_bot numbersOnly" id="zipcode" name="zipcode" minlength="6" maxlength="6" placeholder="ZIPCODE" required=""><span class="compulsary">*</span>
			      		</div>-->
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
<!-- Modal INQUIRY BEFORE BUYING-->
<div id="inquiry_buying" class="modal fade" role="dialog">
  	<div class="modal-dialog">
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<center><h4 class="modal-title">INQUIRY BEFORE BUYING</h4></center>
	      	</div>
	      	<div class="modal-body">
		        <div class="col-sm-12 border_bot">
		          <div class="col-sm-12">
		        	<form class="form form-horizontal" name="inquirybuying" id="inquirybuying" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot alphaSpace" id="name2" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email1" name="email" placeholder="Email" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="jobtitle" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirements5" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><input type="submit" name="btnInquirybuying" id="submit1" class="btn btn_orange" value="Submit"></center>
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
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<center><h4 class="modal-title">ANALYST QUERY</h4></center>
	      	</div>
	      	<div class="modal-body">
		        <div class="col-sm-12 border_bot">
		          <div class="col-sm-12">
		        	<form class="form form-horizontal" name="analystquery" id="analystquery" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot alphaSpace" id="name3" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email2" name="email" placeholder="Email" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="jobtitle1" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact1" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirements1" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><input type="submit" name="btnanalystQuery" id="submit2" class="btn btn_orange" value="Submit"></center>
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
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
	        	<button type="button" class="close" data-dismiss="modal">&times;</button>
	        	<center><h4 class="modal-title">SALES QUERY</h4></center>
	      	</div>
	      	<div class="modal-body">
		        <div class="col-sm-12 border_bot">
		        	<div class="col-sm-12">
		        	<form class="form form-horizontal" name="salesquery" id="salesquery" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot alphaSpace" id="name4" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email3" name="email" placeholder="Email" required=""> <span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="jobtitle2" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="company" name="company" placeholder="Company" required=""><span class="compulsary">*</span>
			      		</div>
			      		<!--<div class="form-group">
			      			<select class="form_bor_bot" id="country" name="country">
			      				<option value="">Select Country</option>
			      				<option value="1">1</option>
			      			</select><span class="compulsary">*</span>
			      		</div>-->
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact2" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<div class="col-sm-6">
			      				<input type="text" class="form_bor_bot" id="datepicker" name="speak_analyst_date" placeholder="dd-mm-yyyy" required=""><span class="compulsary">*</span>
			      			</div>
			      			<div class="col-sm-6">
			      				<!-- <input type="text" class="form_bor_bot numbersOnly time ui-timepicker-input" id="timepicker" name="speak_analyst_time" placeholder="hh:mm" required=""><span class="compulsary">*</span> -->
			      				<input type="text" class="form_bor_bot " id="timepicker" name="speak_analyst_time" placeholder="hh:mm" required=""><span class="compulsary">*</span>
			      			</div>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirements2" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><input type="submit" name="btnsalesQuery" id="submit3" class="btn btn_orange" value="Submit"></center>
			      		</div>
			      	</form>
			      	</div>
		        </div>
		        <div class="clearfix"></div>
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
	      				<input type="text" class="form_bor_bot alphaSpace" id="name5" name="name" placeholder="Name " value="" required><span class="compulsary">*</span>
	      			</div><div class="clearfix"></div>
	      			<div class="form-group">
	      				<input type="email" class="form_bor_bot" id="email4" name="email" placeholder="Email" value="" required><span class="compulsary">*</span>	
	              	</div>
	             	<div class="form-group">
	      				<input type="text" class="form_bor_bot" id="jobtitle3" name="job_title" placeholder="Job Title" value="" required><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<input type="text" class="form_bor_bot" id="company1" name="company" placeholder="Company" value="" required><span class="compulsary">*</span>
	              	</div>
	              	 	<div class="form-group">
	      				<input type="text" class="form_bor_bot numbersOnly" id="zip" name="zip_code" placeholder="Zip Code" minlength="6" maxlength="6" value="" required><span class="compulsary">*</span>
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
	      				<input type="text" class="form_bor_bot numbersOnly" id="phone" name="contact_no" placeholder="Contact No" minlength="10" maxlength="10" value="" required><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">	              		
	      				<input type="text" class="form_bor_bot" id="requirements3" name="requirement" placeholder="Your requirements" value="">
	              	</div>
	      		 	<div class="clearfix"></div><br>
	      			<div class="form-group">
	      			   <center><button type="submit" name="btnSpeakConsultant" id="submit4" class="btn btn_orange" value="">Submit</button></center>
	      			</div>
	      		</form>
      		</div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
</div>
<!-- Modal REQUEST FOR CUSTOMIZATION-->
<div class="modal fade" id="mymodel" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <center><h4 class="modal-title">REQUEST FOR CUSTOMIZATION</h4></center>
        </div>
        <div class="modal-body">
          	<div class="border_bot col-xs-12 " > 
          		<h3>Customization request for :<span id="myResponse"></span></h3>
	      		<form class="form" name="request_customization" id="request_customization" method="post" action="" novalidate="novalidate">
	      			<div class="form-group">
	      				<input type="text" class="form_bor_bot alphaSpace" id="name6" name="name" placeholder="Name " value="" required><span class="compulsary">*</span>
	      			</div><div class="clearfix"></div>
	      			<div class="form-group">
	      				<input type="email" class="form_bor_bot" id="email5" name="email" placeholder="Email" value="" required><span class="compulsary">*</span>	
	              	</div>
	             	<div class="form-group">
	      				<input type="text" class="form_bor_bot" id="jobtitle4" name="job_title" placeholder="Job Title" value="" required><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">
	      				<input type="text" class="form_bor_bot" id="company2" name="company_name" placeholder="Company" value=""><span class="compulsary">*</span>
	              	</div>
	              	
	              	<!-- <div class="form-group">
	              		<select class="form_bor_bot" id="country" name="country">
	              			<option  value="">Select Country</option>
	              			<option name="country" value="India">India</option>
	              		</select><span class="compulsary">*</span>
	              	</div> -->
	               	<div class="form-group">
	      				<input type="text" class="form_bor_bot numbersOnly" id="phone1" name="contact_no" placeholder="Contact No" minlength="10" maxlength="10" value=""><span class="compulsary">*</span>
	              	</div>
	              	<div class="form-group">	              		
	      				<input type="text" class="form_bor_bot" id="requirements4" name="requirement" placeholder="Your requirements" value="">
	              	</div>
	      		 	<div class="clearfix"></div><br>
	      			<div class="form-group">
	      			   <center><input type="submit" name="btnReportCustomization" id="submit5" class="btn btn_orange" value="Submit"></center>
	      			  <input type="hidden" name="cust_option"  value="Company Profile"> 
	      			</div>
	      			<div id="myResponsevalue"></div>
	      		</form>
      		</div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
<!-- Modal Research Team-->
  <div class="modal fade emp-profile" id="team" role="dialog">
    <div class="modal-dialog">
      	<div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>
	          <center><h4 class="modal-title">Team Member</h4></center>
	        </div>
	        <div class="modal-body">
	          	<div class="border_bot col-xs-12"> 
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
	
	//readmore
$(document).ready(function() {
	var showChar = 400;
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
//slider
$('.bxslider').bxSlider({
  auto: true,
  controls:false,
  autoControls: false,
  stopAutoOnClick: false,
  pager: false,
  slideWidth: 200
});
</script>
<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script> -->
<script type="text/javascript">
     function genericSocialShare(url){
     window.open(url,'sharer','toolbar=0,status=0,width=648,height=395');
     return true;
    }
</script>

<a href="javascript:void(0)" onclick="javascript:genericSocialShare('[CustomSocialShareLink]')">[Social Media Share Text/Image]</a>
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

$('.modal').on('hidden.bs.modal', function () {
    $('.form').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
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

//inquirybuying
$("#inquirybuying").validate({
   	rules: { 
		   	name:{
		   		required:true
		   	},
		   	email:{
		   		required:true,
		   		valEmail1:true
		   	},
		   	jobtitle:{
		   		required:true
		   	},
		   	contact:{
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
		   	jobtitle:{
		   		required:"Please enter job title"
		   	},
		   	contact:{
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
		   		valEmail1:true
		   	},
		   	job_title:{
		   		required:true
		   	},
		   	company:{
		   		required:true
		   	},
		   	country:{
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
		   	country:{
		   		required:"Please select country"
		   	},
		   	contact_no:{
		   		required:"Please enter contact number"
		   	},
		   	speak_analyst_date:{
		   		required:"Please Select Date"
		   	},
		   	speak_analyst_time:{
		   		required:"Please Select Time"
		   	},
		}
	}); 

//request for CUSTOMIZATION
$('#mymodel').on('hidden.bs.modal', function () {
    $('#request_customization').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#request_customization").validate({
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
		   	company_name:{
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
		   	company_name:{
		   		required:"Please enter company name"
		   	},
		   	contact_no:{
		   		required:"Please enter contact number"
		   	},
		}
	}); 

// Speak to Consultant
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
		   	country:{
		   		required:true
		   	},
		   	contact_no:{
		   		required:true
		   	},
		   	zip_code:{
		   		required:true
		   	},
		   	address:{
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
		   	zip_code:{
		   		required:"Please enter zipcode"
		   	},
		   	company:{
		   		required:"Please enter company name"
		   	},
		   	address:{
		   		required:"Please enter address"
		   	},
		   	country:{
		   		required:"Please select country"
		   	},
		   	contact_no:{
		   		required:"Please enter contact number"
		   	},
		}
	}); 	


	function submitForm() {
		var atLeastOneIsChecked = $('input[name="cust_option[]"]:checked').length > 0;
		if(atLeastOneIsChecked){
			$('#mymodel').modal('show');
		}else{
			alert('Please select atleast one customization..!!'); 
			return;
		}
		debugger;
var form = document.cust_option_form;

//var form = document.request_customization;

var dataString = $(form).serialize();
console.log(dataString);


$.ajax({

	type:'POST',
    url:"<?php echo base_url('research/report_customization') ;?>",
    data: dataString,
    success: function(data){
	     
        $('#myResponse').html(data);
        $('#myResponsevalue').html('<input type="hidden" name="cust_option"  value="'+data+'">');
        //alert($name);
    }
});
return false;
}

$(".team-mem").click(function(event){

     var id=$(this).data('id');

     debugger;

     //alert(id);

     $.ajax({

        url:"<?php echo base_url('snapshot/api/findSingleTeam/') ;?>"+id,

        type: "GET",

        data:{id: id },

        async:false,

        dataType:'json',



         success: function(data) {

        	

        	result = data.result;

        	$('#image').attr('src','<?=base_url().'uploads/team/'?>'+result.team_image);

        	$('#name').html('<div class="col-sm-4">name: </div>'+'<div class="col-sm-8">'+ result.name +'</div>');

        	$('#designation').html('<div class="col-sm-4">Designation : </div>'+'<div class="col-sm-8">'+ result.designation +'</div>');

        	$('#role').html('<div class="col-sm-4">Role :</div>'+'<div class="col-sm-8">'+ result.role +'</div>');

        	$('#experiance').html('<div class="col-sm-4">Experiance :</div>' + '<div class="col-sm-8">'+ result.experiance +'</div>');

        	$('#prev_company').html('<div class="col-sm-4">Previous Company : </div>' + '<div class="col-sm-8">'+ result.prev_company +'</div>');

        	$('#specialization').html('<div class="col-sm-4">Specialization : </div>'+ '<div class="col-sm-8">'+ result.specialization +'</div>');

        	$('#qualification').html('<div class="col-sm-4">Qualification : </div>' + '<div class="col-sm-8">'+  result.qualification +'</div>');

        

        },

       

    });

 });
</script>

<?php $this->template->contentEnd();  ?> 