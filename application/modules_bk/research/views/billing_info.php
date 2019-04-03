<?php $this->template->contentBegin(POS_TOP);?>
<style type="text/css">
.our_clients{
	border-bottom: 1px solid #ccc;padding-bottom: 20px;
}
</style>
<?php $this->template->contentEnd();  ?> 
<div class="container" style="margin-top: 80px;">
  <!-- <div class="">
    <img class="img-responsive" src="<?php echo $theme_url?>/images/groupbuying.jpg" alt=" ">
  </div> -->
</div>
<div class="container">
    <center><h1>Billing Information</h1></center>
    <div class="col-sm-12">
	  	<div class="col-sm-8 padd-0">
		  	<div class="report_cat_details">
			    <div id="" class="border_bot ">
			      	<form class="form-horizontal" name="billing_info" id="billing_info" method="post" action="">
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="name" name="name" placeholder="Full Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="email" class="form_bor_bot" id="email" name="email" placeholder="Email" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="companyname" name="companyname" placeholder="Company Name" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="contact" name="contact" placeholder="Contact Number" minlength="10" maxlength="10" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="address" name="address" placeholder="Address" required=""><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<select class="form_bor_bot" id="state" name="state">
			      				<option value="">Select State</option>
			      				<option value="1">1</option>
			      				<option value="2">2</option>
			      			</select><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<select class="form_bor_bot" id="state" name="state">
			      				<option value="">Select City</option>
			      				<option value="1">1</option>
			      				<option value="2">2</option>
			      			</select><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<select class="form_bor_bot" id="country" name="country">
			      				<option value="">Select Country</option>
			      				<option value="1">1</option>
			      				<option value="2">2</option>
			      			</select><span class="compulsary">*</span>
			      		</div>
			      		<div class="form-group">
			      			<input type="text" class="form_bor_bot" id="zipcode" name="zipcode" minlength="6" maxlength="6" placeholder="ZIPCODE" required=""><span class="compulsary">*</span>
			      		</div>
			      	</form>
			    </div>
		  	</div>
	  	</div>
	  	<div class="col-sm-4">
	  		<div class="our_clients">
	  			<div class="gray_bg">
	      			<b><p class="padd_5">Selected Report(s):</p></b>
		      	</div>
		      	<div class="">
		      		<a href="">Automotive Data Analytics Market: By End-User (OEM, After-Market & Insurance); By Type (Software, Services); By Deployment Type (Cloud & On-Premise); By Application (Sales & Marketing, Customer Behaviour & Management & Others) & By Geography - Forecast (2018-2023)</a>
					<p>Price : <?php echo $research_list['report_price'] ?> &nbsp;<a href="">Remove&nbsp;<span><i class="fa fa-times"></i></span></a></p>	
					<p>Licence Type : Single User</p>
				</div>
	  		</div>
	  	</div>
    </div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php $this->template->contentEnd();  ?> 