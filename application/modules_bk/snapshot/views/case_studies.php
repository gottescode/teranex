<?php $this->template->contentBegin(POS_TOP);?>

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
.columns {
    float: left;
    width: 50%;
    padding:0 15px;
}
.price {
    list-style-type: none;
    border: 1px solid #eee;
    margin: 0;
    padding: 0;
    -webkit-transition: 0.3s;
    transition: 0.3s;
	box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2)
}
.price:hover {
    box-shadow:none;
}
.price .header {
    background-color: #22313F;
    color: white;
    font-size: 17px;
}
.price li {
    border-bottom: 1px solid #eee;
    padding: 20px 30px;
    text-align: center;
	 font-size: 15px;
}
.price .grey {
    background-color: #eee0;
	
}
.button {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 10px 25px;
    text-align: center;
    text-decoration: none;
    font-size: 18px;
}
.tag-sec {
    margin:auto;
	display:table;
}
@media only screen and (max-width: 600px) {
    .columns {
        width: 100%;
    }
}
.padd_5 {
    padding: 5px 10px;
    margin-top: 0;
}
.stc{    
	position: absolute;
    right: 0;
    top: 15px;
    min-width: 203px;}
	span.pull-left.full-width h1{
		margin:0px;
	}
	.pull-right.stc a {
		width: 100%;
		padding: 6px 15px;
	}
</style>

<?php $this->template->contentEnd();  ?> 

    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/groupbuying.jpg" alt=" ">

<div class="container">

    <div class="col-sm-12 padd-0"> 
		<span class="pull-left full-width">
			<center>
				<h1>Snapshots</h1>
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

    	

    	<!--<a href="" data-toggle="modal" data-target="#callrequest" class="btn btn_orange pull-right">Request a call</a>-->

	  	<div class="clearfix"></div>

    	<div class="col-sm-3 padd-0">

    		<div class="gray_bg">

	      		<h3 class="padd_5">Categories</h3>

	      	</div>

		  	<ul class="report_category">

		  	  <?php foreach($category_list as $rowCat) { ?>

			    <li class="active" style="display: none;padding: 0;"><a href="#"></a></li>

			    <li><a href="<?php echo site_url()."snapshot/snapshot_category_detail/".formaturl($rowCat['analytics_category_id'])?>"><?php echo $rowCat['analytics_category_name'] ?>
			    </a></li>

			    <?php } ?>

		  	</ul>

	  	</div>

	  	<div class="col-sm-7 caseStudies">
		  	<div class="">
			    <div id="" class="">
			      	<div class="gray_bg">
			      		<h3 class="padd_5">Snapshots</h3>
			      	</div>
					<div class="tag-sec">
						<div class="columns">
						  <ul class="price">
							<li class="header">OEM's</li>
							<li class="grey">6000 / Annual Subscription</li>
							<li>2000 / Quarterly</li>
							<li class="grey"><a href="#" class="btn btn_orange">Subscribe</a></li>
						  </ul>
						</div>
						<div class="columns">
						  <ul class="price">
							<li class="header">Jobshops</li>
							<li class="grey">1000 / Annual Subscription</li>
							<li>300 / Quarterly</li>
							<li class="grey"><a href="#" class="btn btn_orange ">Subscribe</a></li>
						  </ul>
						</div>
					</div>
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
		        	<form class="form-horizontal" name="requestsample" id="requestsample" method="post" action="" novalidate="novalidate">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="name" name="name" placeholder="Full Name" required> <span class="compulsary">*</span>
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
		        	<form class="form-horizontal" name="analystquery" id="analystquery" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="name" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="jobtitle" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group" style="margin-bottom: 0;">
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirements" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><input type="submit" name="btnanalystQuery" id="submit" class="btn btn_orange" value="Submit"></center>
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
		        	<form class="form-horizontal" name="salesquery" id="salesquery" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="name" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" required=""> <span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="jobtitle" name="job_title" placeholder="Job Title" required=""><span class="compulsary">*</span>
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
			      			<input type="text" class="form_bor_bot numbersOnly" id="contact" name="contact_no" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<div class="col-sm-6">
			      				<input type="text" class="form_bor_bot" id="datepicker" name="speak_analyst_date" placeholder="yyyy-mm-dd" required=""><span class="compulsary">*</span>
			      			</div>
			      			<div class="col-sm-6">
			      				<input type="text" class="form_bor_bot time ui-timepicker-input" id="timepicker" name="speak_analyst_time" placeholder="hh:mm" required=""><span class="compulsary">*</span>
			      			</div>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="requirements" name="requirement" placeholder="Requirements">
			      		</div>
			      		<div class="form-group">
			      			<center><input type="submit" name="btnsalesQuery" id="submit" class="btn btn_orange" value="Submit"></center>
			      		</div>
			      	</form>
			      	</div>
		        </div>
		        <div class="clearfix"></div>
	      	</div>
	    </div>
  	</div>
</div>

 <div class="modal fade" id="Webinar" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Webinar</h4></center>

        </div>

        <div class="modal-body">

          	<div class="border_bot col-xs-12 " > 

	      		<form class="form" name="call_request" id="call_request" method="post" action="">

	      			<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="name" name="name" placeholder="Name " value="" required> <span class="compulsary">*</span>

	      			</div><div class="clearfix"></div>

	      			<div class="form-group">

	      				<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" value="" required> <span class="compulsary">*</span>	

	              	</div>

	             	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="jobtitle" name="job_title" placeholder="Job Title" value="" required><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="company" name="company" placeholder="Company" value="" required><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot numbersOnly" id="phone" name="contact_no" placeholder="Contact number" minlength="10" maxlength="10" value="" required><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="zip" name="zip_code" placeholder="Zip Code" value="" required><span class="compulsary">*</span>

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

	      				<textarea type="text" class="form_bor_bot" id="requirements" name="requirement" placeholder="Your requirements" value="" required></textarea> <span class="compulsary">*</span>

	              	</div>

	      		 	<div class="clearfix"></div><br>

	      			<div class="form-group">

	      			   <center><input type="submit" name="btnWebinar" id="submit" class="btn btn_orange" value="Submit"></center>

	      			</div>

	      		</form>

      		</div>

          <div class="clearfix"></div>

        </div>

      </div>

    </div>

  </div>

 <div class="modal fade" id="SpeakToAnalyst" role="dialog">

    <div class="modal-dialog">

      <div class="modal-content">

        <div class="modal-header">

          <button type="button" class="close" data-dismiss="modal">&times;</button>

          <center><h4 class="modal-title">Speak To Analyst</h4></center>

        </div>

        <div class="modal-body">

          	<div class="border_bot col-xs-12 " > 

	      		<form class="form" name="call_request" id="call_request" method="post" action="">

	      			<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="name" name="name" placeholder="Name " value="" required> <span class="compulsary">*</span>

	      			</div><div class="clearfix"></div>

	      			<div class="form-group">

	      				<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" value="" required> <span class="compulsary">*</span>	

	              	</div>

	             	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="jobtitle" name="job_title" placeholder="Job Title" value="" required><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="company" name="company" placeholder="Company" value="" required><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot numbersOnly" id="phone" name="contact_no" placeholder="Contact number" minlength="10" maxlength="10" value="" required><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="zip" name="zip_code" placeholder="Zip Code" value="" required><span class="compulsary">*</span>

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

	      				<textarea type="text" class="form_bor_bot" id="requirements" name="requirement" placeholder="Your requirements" value="" required></textarea> <span class="compulsary">*</span>

	              	</div>

	      		 	<div class="clearfix"></div><br>

	      			<div class="form-group">

	      			   <center><input type="submit" name="btnSpeakAnalyst" id="submit" class="btn btn_orange" value="Submit"></center>

	      			</div>

	      		</form>

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

	      				<input type="text" class="form_bor_bot" id="name" name="name" placeholder="Name " value=""><span class="compulsary">*</span>

	      			</div><div class="clearfix"></div>

	      			<div class="form-group">

	      				<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" value=""><span class="compulsary">*</span>	

	              	</div>

	             	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="job_title" name="job_title" placeholder="Job Title" value=""><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot" id="company" name="company" placeholder="Company" value=""><span class="compulsary">*</span>

	              	</div>

	              	 	<div class="form-group">

	      				<input type="text" class="form_bor_bot numbersOnly" id="zip" name="zip_code" placeholder="Zip Code" value="" required><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<textarea type="text" class="form_bor_bot" id="address" name="address" placeholder="Address" value="" required></textarea><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	              		<select class="form_bor_bot" id="country" name="country">

	              			<option  value="">Select Country</option>

	              			<option name="country" value="India">India</option>

	              		</select><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">

	      				<input type="text" class="form_bor_bot numbersOnly" id="contact_no" name="contact_no" placeholder="Contact No" minlength="10" maxlength="10" value=""><span class="compulsary">*</span>

	              	</div>

	              	<div class="form-group">	              		

	      				<input type="text" class="form_bor_bot" id="requirements" name="requirement" placeholder="Your requirements" value="">

	              	</div>

	      		 	<div class="clearfix"></div><br>

	      			<div class="form-group">

	      			   <center><button type="submit" name="btnSpeakConsultant" id="submit" class="btn btn_orange" value="">Submit</button></center>

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
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
});
jQuery('.alphaNumeric').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z0-9\.]/g,'');
});
jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@(?:\S{1,63})$/.test( value );
}, 'Please enter a valid email address');

$("#call_request1").validate({
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
		   	company:{
		   		required:"Please enter company"
		   	},
		   	country:{
		   		required:"Please select country"
		   	},
		   	contact_no:{
		   		required:"Please enter phone number"
		   	},
		   	zip_code:{
		   		required:"Please enter Zip Code"
		   	},
		   	address:{
		   		required:"Please enter Address"
		   	},
		}
	}); 


// REQUEST FOR SAMPLE
$("#requestsample").validate({
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

	//analystquery
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


 $(".team-mem").click(function(event){

     var id=$(this).data('id');

     debugger;

     //alert(id);

     $.ajax({

        url:"<?php echo base_url('analytics/api/findSingleTeam/') ;?>"+id,

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

