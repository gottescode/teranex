<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/paidfeedback-bnr.jpg" alt=" ">

<div class="container servay section-pad paidfeedback">
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

	<div class="col-sm-10 pading_left_0">
		<form id="regForm" class="form-horizontal"  method="post" action="<?php echo site_url() ?>/pages/getPaidForYourFeedback" enctype="multipart/form-data" >
			<h2>Join TERANEX User Research</h2>
		  <!-- One "tab" for each step in the form: -->
		  	<div class="tab">
			    <p>Thank you for your interest in participating in research at TERANEX. We regularly conduct different type of user studies including surveys, interviews, and usability studies. Please complete this survey and we'll contact you when a research study looks like a match with your background.</p>
				<p>Your participation will help us to improve the TERANEX website and in turn provide a better experience for you. In addition, those who are qualified and participate in research projects will receive a <strong>monetary compensation (checks, coupons or gift cards)</strong> as a token of appreciation.</p>
		  	</div>
		  	<div class="tab">
				<h3> 1. Approximately how long have you been using TERANEX.io ? [Please select one.]</h3>
				<div class="checkbox">
				 	<p>
						<label class="radio">Less than 1 month<input type="radio" name="how_long" checked="checked"><span class="checkround"></span> </label>
						<label class="radio"  value="1 to 6 months">1 to 6 months<input type="radio" name="how_long"><span class="checkround"></span> </label>
						<label class="radio" value="7 to 12 months">7 to­ 12 months<input type="radio" name="how_long"><span class="checkround"></span> </label>
						<label class="radio"  value="1 to 2 years">1 to 2 years<input type="radio" name="how_long"><span class="checkround"></span></label>
						<label class="radio" value="more than 2 years">more than 2 years<input type="radio" name="how_long"><span class="checkround"></span> </label>
						<label class="radio"  value="I have heard of TERANEX.io, but never used it">I have heard of TERANEX.io, but never used it.<input type="radio" name="how_long"> <span class="checkround"></span> </label>
						<label class="radio"  value="Other">Other<input type="radio" name="how_long"><span class="checkround"></span></label>
				  	</p>
			    </div>
				<h3>2. Which ones of the following categories are you interested in sourcing at TERANEX.io? [Please select all that apply.]</h3>
			    <div class="checkbox q-2">
				    <p>
						<label class="check ">Machines<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category"  value="Machines"><span class="checkmark"></span> </label>
						<label class="check" >Spare Parts<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Spare Parts"><span class="checkmark"></span></label>
						<label class="check ">Toolings<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Toolings"><span class="checkmark"> </span> </label>
						<label class="check ">Raw Materials<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Raw Materials"><span class="checkmark"> </span></label>
						<label class="check ">Software<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Software"><span class="checkmark"></span></label>
						<label class="check ">Application Consulting<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Application Consulting"><span class="checkmark"></span> </label>
						<label class="check ">Digital training<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Digital training"><span class="checkmark"> </span></label>
						<label class="check ">Research Consulting<input oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Research Consulting"> <span class="checkmark"></span> </label>
						<label class="check ">Other (please specify)<input id="chkbx" oninput="this.className = ''" type="checkbox" class="rad" name="interested_category" value="Other"> <span class="checkmark"></span></label>
						<input type="text" class="form-control" id="txtbx" style="display:none;width:40%"> 
					</p>
			    </div>
		  	</div>
		  	<div class="tab">
			    <h3> 3. Approximately how long have you been using TERANEX.io? [Please select one.]</h3>
				<div class="checkbox">
				 	<p>
						<label class="radio">Daily<input type="radio" name="how_long_using_teranex" checked="checked" value="Daily"><span class="checkround"></span></label>
						<label class="radio">A few times per week<input type="radio" name="how_long_using_teranex" value="A few times per week"><span class="checkround"> </span></label>
						<label class="radio">About once a week<input type="radio" name="how_long_using_teranex"
							value="About once a week"><span class="checkround"></span> </label>
						<label class="radio">A few times per month<input type="radio" name="how_long_using_teranex" value="A few times per month"><span class="checkround"> </span> </label>
						<label class="radio">A few times per month<input type="radio" name="how_long_using_teranex" value="A few times per month"><span class="checkround"> </span> </label>
						<label class="radio">About once a month<input type="radio" name="how_long_using_teranex" value="About once a month"><span class="checkround"></span> </label>
						<label class="radio">About once every few months<input type="radio" name="how_long_using_teranex" value="About once every few months"><span class="checkround"> </span></label>
						<label class="radio">I did not visit TERANEX.io within the past 6 months<input type="radio" name="how_long_using_teranex" value="I did not visit TERANEX.io within the past 6 months"> <span class="checkround"> </span></label>
				  	</p>
			    </div>
				<h3> 4. Thinking about the last month, approximately how often did you use TERANEX.io mobile app? [Please select one.]</h3>
				<div class="checkbox">
				 	<p>
						<label class="radio">Daily<input type="radio" name="usage_mobile_app" checked="checked"  value="Daily"><span class="checkround"></span></label>
						<label class="radio" >A few times per week<input type="radio" name="usage_mobile_app" value="A few times per week"><span class="checkround"> </span> </label>
						<label class="radio">About once a week<input type="radio" name="usage_mobile_app" value="About once a week<"><span class="checkround"></span> </label>
						<label class="radio">A few times per month<input type="radio" name="usage_mobile_app" value="A few times per month"><span class="checkround"> </span> </label>
						<label class="radio">Once a month or less<input type="radio" name="usage_mobile_app" value="Once a month or less"><span class="checkround"> </span></label>
						<label class="radio">I have never heard of TERANEX.io mobile app.<input type="radio" name="usage_mobile_app" value="I have never heard of TERANEX.io mobile app"><span class="checkround"></span> </label>
						<label class="radio">I have heard of TERANEX.io mobile app, but never used it.<input type="radio" name="usage_mobile_app" value="I have heard of TERANEX.io mobile app, but never used it"><span class="checkround"></span></label>
				  	</p>
			    </div>
				<h3> 5. Which of the following features or services on TERANEX.io have you used before? [Please select all that apply.]</h3>
				<div class="checkbox q-3">
			       	<p>
						<label class="check ">Category Navigation<input oninput="this.className = ''" type="checkbox" class="rad" name="feature_service" value="Category Navigation"> <span class="checkmark"></span> </label>
						<label class="check ">Trade Assurance<input oninput="this.className = ''" type="checkbox" class="rad" name="feature_service" value="Trade Assurance"><span class="checkmark"></span> </label>
						<label class="check ">Wholesale<input oninput="this.className = ''" type="checkbox" class="rad" name="feature_service" value="Wholesale"><span class="checkmark"></span></label>
						<!-- <label class="check ">AliSourcePro (Get Quotations Now or Post Buying Requests)<input oninput="this.className = ''" type="checkbox" class="rad" name="Q5"><span class="checkmark"></span></label> -->
						<label class="check ">Inspection Service<input oninput="this.className = ''" type="checkbox" class="rad" name="feature_service" value="Inspection Service"> <span class="checkmark"></span> </label>
						<label class="check ">Search Box<input oninput="this.className = ''" type="checkbox" class="rad" name="feature_service" value="Search Box"><span class="checkmark"></span></label>
						<label class="check ">None of the Above<input id="chkbx2" oninput="this.className = ''" type="checkbox" class="rad" name="feature_service" value="None of the Above"> <span class="checkmark"></span> </label>
						<input type="text" class="form-control " id="txtbx2" style="display:none;width:40%"> 
					</p>
			    </div>
		  	</div>
		  	<div class="tab">
			    <h3> 6. What is your MAIN purpose of using TERANEX.io? [Please select one.]</h3>
				<div class="checkbox">
					<p>
						<label class="radio">Shop products<input type="radio" name="main_purpose" checked="checked" value="Shop products"><span class="checkround"></span> </label>
						<label class="radio">Search for suppliers<input type="radio" name="Search for suppliers" value=""><span class="checkround"> </span> </label>
						<label class="radio">Look for the latest market/product information for my business (e.g. popular products, price trends, etc.)<input type="radio" name="main_purpose" value="Look for the latest market/product information for my business (e.g. popular products, price trends, etc.)"><span class="checkround"></span></label>
						<label class="radio">Other (please specify)<input type="radio" name="main_purpose" value="Other"><span class="checkround"> </span> </label>
						<input type="text" class="form-control" style="width:40%"> 
					</p>
			    </div>
			    <h3> 7. Which of the following BEST describes your business? [Please select one.]</h3>
				<div class="checkbox">
					<p>
						<label class="radio">Manufacturer /OEM<input type="radio" name="describes_business" checked="checked" value="Manufacturer /OEM"><span class="checkround"></span> </label>
						<label class="radio">Distributor / Agent<input type="radio" name="describes_business"  value="Distributor / Agent"><span class="checkround"></span> </label>
						<label class="radio">jobshop<input type="radio" name="describes_business" value="jobshop"><span class="checkround"></span></label>
						<label class="radio">Buying Office<input type="radio" name="describes_business" value="Buying Office"><span class="checkround"></span> </label>
						<label class="radio">Sourcing Agent<input type="radio" name="describes_business" value="Sourcing Agent"><span class="checkround"></span> </label>
						<label class="radio">Trade service provider (logistics, quality control, etc.)<input type="radio" name="describes_business" value="Trade service provider (logistics, quality control, etc.)"> <span class="checkround"></span></label>
						<label class="radio">Other (please specify)<input type="radio" name="describes_business" value="Other"><span class="checkround"> </span> </label>
						<input type="text" class="form-control" style="width:40%">
					</p>
			    </div>
				<h3> 8. How many employees are there in your business (including yourself)? [Please select one.]</h3>
				<div class="checkbox">
				 	<p>
						<label class="radio">1<input type="radio" name="how_many_employees" checked="checked" value="1"><span class="checkround"></span></label>
						<label class="radio" >2 - 4<input type="radio" name="how_many_employees" value="2-4"><span class="checkround"></span></label>
						<label class="radio">5 - 9<input type="radio" name="how_many_employees" value="5-9"><span class="checkround"></span></label>
						<label class="radio">10 - 49<input type="radio" name="how_many_employees" value="10-49"><span class="checkround"></span></label>
						<label class="radio">50 - 99<input type="radio" name="how_many_employees" value="50-99"><span class="checkround"></span></label>
						<label class="radio">100 - 199<input type="radio" name="how_many_employees" value="100-199"><span class="checkround"></span></label>
						<label class="radio">200 or more<input type="radio" name="how_many_employees" value="200 or more"><span class="checkround"></span></label>
				 	</p>
			    </div>
		  	</div>
		  	<div class="tab">
				<h3>9. What are you looking to shop at TERANEX.io? [Please select one.]</h3>
				<div class="checkbox">
				 	<p>
						<label class="radio">Shop for business purposes only.<input type="radio" name="shop_at_teranex" checked="checked" value="Shop for business purposes only."><span class="checkround"> </span> </label>
						<label class="radio">Mainly shop for business purposes, occasionally for personal purposes (e.g. for self/friends/family).<input type="radio" name="shop_at_teranex" value="Mainly shop for business purposes, occasionally for personal purposes (e.g. for self/friends/family)"><span class="checkround"></span></label>
						<label class="radio">Shop for both business and personal purposes. I spend equal time on both.<input type="radio" name="shop_at_teranex" value="Shop for both business and personal purposes. I spend equal time on both."> <span class="checkround"></span></label>
						<label class="radio">Mainly shop for personal purposes, occasionally for business purposes.<input type="radio" name="shop_at_teranex" value="Mainly shop for personal purposes, occasionally for business purposes."> <span class="checkround"> </span></label>
						<label class="radio">Shop for personal purposes only.<input type="radio" name="shop_at_teranex" value="Shop for personal purposes only"><span class="checkround"></span></label>
				 	</p>
			    </div>
				<h3> 10. What is your role in the company? [Please select all that apply.]</h3>
				<div class="checkbox q-4">
				    <p>
						<label class="check ">I am the owner.<input oninput="this.className = ''" type="checkbox" class="rad" name="role_in_company" value="I am the owner"><span class="checkmark"></span> </label>
						<label class="check ">I am the general manager/director.<input oninput="this.className = ''" type="checkbox" class="rad" name="role_in_company" value="I am the general manager/director"> <span class="checkmark"> </span></label>
						<label class="check ">I am the purchasing manager.<input oninput="this.className = ''" type="checkbox" class="rad" name="role_in_company" value="I am the purchasing manager"> <span class="checkmark"> </span></label>
						<label class="check ">I am a purchaser/merchandiser/purchasing assistant.<input oninput="this.className = ''" type="checkbox" class="rad" name="role_in_company" value="I am a purchaser/merchandiser/purchasing assistant"> <span class="checkmark"></span></label>
						<label class="check ">Other (please specify)<input id="chkbx3" oninput="this.className = ''" type="checkbox" class="rad" name="role_in_company" value="Other"><span class="checkmark"> </span></label>
						<input type="text" class="form-control " id="txtbx3" style="display:none; width:40%"> 
					</p>
			    </div>
		  	</div>
		  	<div class="tab">
			 	<h3> 11. Approximately how much does your business spend in purchasing (for materials, products) in last 12 months? This includes purchases made via AND outside of TERANEX.io. [Please select one.]</h3>
				<div class="checkbox">
				 <p>
					<label class="radio">$0<input type="radio" name="business_spend_in_purchasing" checked="checked" value="$0"><span class="checkround"></span></label>
					<label class="radio">$1 ­- $9,999<input type="radio" name="business_spend_in_purchasing" value="$1 ­- $9,999"><span class="checkround"></span></label>
					<label class="radio">$10,000 - $49,999<input type="radio" name="business_spend_in_purchasing" value="$10,000 - $49,999"><span class="checkround"> </span></label>
					<label class="radio">$50,000 - $99,999<input type="radio" name="business_spend_in_purchasing" value="$50,000 - $99,999<"><span class="checkround"> </span></label>
					<label class="radio">$100,000 - $499,999<input type="radio" name="business_spend_in_purchasing" value="$100,000 - $499,999"><span class="checkround"> </span></label>
					<label class="radio">$500,000 - $999,999<input type="radio" name="business_spend_in_purchasing" value="$500,000 - $999,999"><span class="checkround"> </span></label>
					<label class="radio">$1,000,000 - $4,999,999<input type="radio" name="business_spend_in_purchasing" value="$1,000,000 - $4,999,999"><span class="checkround"> </span></label>
					<label class="radio">$5,000,000 - $9,999,999<input type="radio" name="business_spend_in_purchasing" value="$5,000,000 - $9,999,999"><span class="checkround"> </span></label>
					<label class="radio">$10,000,000 - $99,999,999<input type="radio" name="business_spend_in_purchasing" value="$10,000,000 - $99,999,999"><span class="checkround"> </span></label>
					<label class="radio">$100,000,000 or more<input type="radio" name="business_spend_in_purchasing" value="$100,000,000 or more"><span class="checkround"> </span></label>
				 </p>
			    </div>
			 	<h3> 12. Approximately what is the annual revenue of your business last year? [Please select one.]</h3>
				<div class="checkbox">
				 <p>
					<label class="radio">$0 or less<input type="radio" name="annual_revenue" checked="checked" value="$0 or less"><span class="checkround"></span></label>
					<label class="radio">$1 ­ $9,999<input type="radio" name="annual_revenue" value="$1 ­ $9,999"><span class="checkround"></span></label>
					<label class="radio">$10,000 - $49,999<input type="radio" name="annual_revenue" value="$10,000 - $49,999"><span class="checkround"></span> </label>
					<label class="radio">$50,000 - $99,999<input type="radio" name="annual_revenue" value="$50,000 - $99,999"><span class="checkround"></span> </label>
					<label class="radio">$100,000 - $499,999<input type="radio" name="annual_revenue" value="$100,000 - $499,999"><span class="checkround"> </span> </label>
					<label class="radio">$500,000 - $999,999<input type="radio" name="annual_revenue" value="$500,000 - $999,999"><span class="checkround"> </span></label>
					<label class="radio">$1,000,000 - $1,999,999<input type="radio" name="annual_revenue" value="$1,000,000 - $1,999,999"><span class="checkround"> </span></label>
					<label class="radio">$2,000,000 or more<input type="radio" name="annual_revenue" value="$2,000,000 or more"><span class="checkround"> </span> </label>
				 </p>
			    </div>
		  	</div>
			<div class="tab">
				<h3> 13. Have your company ever made a purchase on TERANEX.io? (Making a purchase refers to either placing an order directly on TERANEX.io or paying suppliers via the account.)</h3>
				<div class="checkbox">
				 <p>
					<label class="radio">Yes<input type="radio" name="paying_supplier" checked="checked" value="Yes"><span class="checkround"></span></label>
					<label class="radio">No<input type="radio" name="paying_supplier" value="No"><span class="checkround"></span></label>
				 </p>
			    </div>
			 	<h3> 14. What is your gender? [Please select one.]</h3>
				<div class="checkbox">
					<p>
						<label class="radio">Male<input type="radio" name="gender" checked="checked" value="Male"><span class="checkround"></span></label>
						<label class="radio">Female<input type="radio" name="gender" value="Female"><span class="checkround"></span></label>
						<label class="radio">I prefer not to say<input type="radio" name="gender" value="I prefer not to say"><span class="checkround"> </span></label>
					</p>
			    </div>
				<h3> 15. Which is your age range? [Please select one.]</h3>
				<div class="checkbox">
				 <p>
					<label class="radio">17 or younger<input type="radio" name="age" checked="checked" value="17 or younger"><span class="checkround"></span> </label>
					<label class="radio">18-24<input type="radio" name="age" value="18-24"><span class="checkround"></span></label>
					<label class="radio">25-34<input type="radio" name="age" value="25-34"><span class="checkround"></span></label>
					<label class="radio">35-44<input type="radio" name="age" value="35-44"><span class="checkround"></span></label>
					<label class="radio">45-54<input type="radio" name="age" value="45-54"><span class="checkround"></span></label>
					<label class="radio">55-64<input type="radio" name="age" value="55-64"><span class="checkround"></span></label>
					<label class="radio">65 or older<input type="radio" name="age" value="65 or older"><span class="checkround"></span></label>
				 </p>
				</div>
			</div>
		  	<div class="tab">
			 	<h3> 16. Please provide your contact information so that we can get in touch with you to schedule a study when available.This information will be kept strictly confidential.</h3>
				<div class="border_bot col-sm-offset-3 col-md-6 col-sm-6 col-xs-12 " style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
				   <!-- <form class="form-horizontal" name="contact" id="contact_info" method="post" action="#" > -->
					   	<div class="form-group">
						 	<input class="form_bor_bot alphaSpace" name="name" placeholder="Full name" required><span class="compulsary">*</span>
						</div>
					   	<div class="form-group">
						 	<input class="form_bor_bot" name="email" placeholder="Email" required><span class="compulsary">*</span>
						</div>
					   	<div class="form-group">
						 	<input class="form_bor_bot numbersOnly"  name="phone" placeholder="Phone number" minlength="10" maxlength="10" required><span class="compulsary">*</span>
						</div>
					   	<div class="form-group">
						 	<input class="form_bor_bot" name="country" placeholder="Country you live In" required><span class="compulsary">*</span>
						</div>
					   	<div class="form-group">
						 	<input class="form_bor_bot " name="city" placeholder="City" required><span class="compulsary">*</span>
						</div>
					   	<div class="form-group">
						 	<input class="form_bor_bot " name="company" placeholder="Name of your company" required><span class="compulsary">*</span>
					    </div>
				    <!-- </form> -->
				</div>
			</div>
		  	<div class="tab">
		  		<p>Thank you for completing this questionnaire! If your submitted questionnaire is qualified and chosen,we will get in touch with you when there is a matching research study in the future.</p>
		  	</div>
		  	<div style="overflow:auto; float: left; width: 100%; padding-bottom: 10px;">
		    	<div style="float:right;">
			      	<button class="btn btn_orange" type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button>
			      	<button class="btn btn_orange swapnext" name="contactformSubmit" type="submit" id="nextBtn" onclick="nextPrev(1)">Next</button>
		    	</div>
		  	</div>
		  <!-- Circles which indicates the steps of the form: -->
		  	<div style="text-align:center;margin-top:40px;">
			    <span class="step"></span>
			    <span class="step"></span>
			    <span class="step"></span>
			    <span class="step"></span>
			    <span class="step"></span>
			    <span class="step"></span>
			    <span class="step"></span>
			    <span class="step"></span>
			    <span class="step"></span>
		  	</div>
		</form>
	</div>
	<div class="col-sm-2 padd-0">
        <br/>
        <div style="border: 1px solid #e7e7e7;">
          <div class="gray_bg">
              <p class="padd_5">Customer Services</p>
            </div>
          <div class="side_option">
            <ul>
              <li><a href="<?php echo site_url()."footer/helpCenter";?>">Help Center</a></li>
              <li><a href="<?php echo site_url()."footer/ReportAbuse";?>">Report Abuse</a></li>
              <li><a href="<?php echo site_url()."footer/submitAdispute";?>">Submit a Dispute</a></li>
              <li><a href="<?php echo site_url()."footer/getPaidForYourFeedback";?>">Get Paid for Feedback</a></li>
            </ul>
          </div>
        </div>
        <div class="clearfix"></div><br/>
        <div style="border: 1px solid #e7e7e7;">
          <div class="gray_bg">
              <p class="padd_5">Trade Services</p>
            </div>
          <div class="side_option">
            <ul>
              <li><a href="<?php echo site_url()."footer/tradeAssurance";?>">Trade Assurance</a></li>
              <li><a href="<?php echo site_url()."footer/businessIdentity";?>">Business Identity</a></li>
              <li><a href="<?php echo site_url()."footer/securePayment";?>">Secure Payments</a></li>
              <li><a href="<?php echo site_url()."footer/inspectionService";?>">Inspection Service</a></li>
            </ul>
          </div>
        </div>
      </div>
</div>
<div class="clearfix"></div><br/>
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<script>
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
	jQuery('.alphaSpace').keyup(function () { 
    this.value = this.value.replace(/[^a-zA-Z \.]/g,'');
});
var currentTab = 0; // Current tab is set to be the first tab (0)
showTab(currentTab); // Display the crurrent tab

function showTab(n) {
  // This function will display the specified tab of the form...
  var x = document.getElementsByClassName("tab");
  
  x[n].style.display = "block";
  //... and fix the Previous/Next buttons:
  if (n == 0) {
    document.getElementById("prevBtn").style.display = "none";
  } else {
    document.getElementById("prevBtn").style.display = "inline";
  }
  if (n == (x.length - 1)) {
    document.getElementById("nextBtn").innerHTML = "Submit";

  } else {
    document.getElementById("nextBtn").innerHTML = "Next";
  }
  //... and run a function that will display the correct step indicator:
  fixStepIndicator(n)
}
function nextPrev(n) {
  // This function will figure out which tab to display
  var x = document.getElementsByClassName("tab");
  // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
  // Hide the current tab:
  x[currentTab].style.display = "none";
  // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
  // if you have reached the end of the form...
  if (currentTab >= x.length) {
    // ... the form gets submitted:
    document.getElementById("regForm").submit();
    return false;
  }
  // Otherwise, display the correct tab:
  showTab(currentTab);
}
function validateForm() {
  // This function deals with validation of the form fields
  var x, y, z, i, valid = true;
  x = document.getElementsByClassName("tab");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByClassName("rad");
	
  // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
	  //var name_rad = z[i].name;
	 
	//$(".q-2 input[type=text]").removeClass("invalid");

    // If a field is empty...
    if (y[i].value == "") {
      // add an "invalid" class to the field:
      y[i].className += " invalid";
	 
	  if(y[i].id==='txtbx'){
		 // y[i].className.remove("invalid");
		  var elem = document.getElementById(y[i].id);
		  elem.classList.remove('invalid'); // Remove class
			if ($('#chkbx').is(":checked")) {
				alert('Please Enter some Text');
              valid = false; 
            }else {
				var elem = document.getElementById(y[i].id);
				elem.classList.remove('invalid'); // Remove class
			}
			if ($("[name='interested_category']").is(":checked")) {
				//alert('Please Enter Text');
              //valid = false; 
            }else {
				alert('Please Select at list one checkbox');
				
			}
			
		 }
	     if(y[i].id==='txtbx2'){
		 // y[i].className.remove("invalid");
		  var elem = document.getElementById(y[i].id);
		  elem.classList.remove('invalid'); // Remove class
			if ($('#chkbx2').is(":checked")) {
				alert('Please Enter some Text');
              valid = false; 
            }else {
				var elem = document.getElementById(y[i].id);
				elem.classList.remove('invalid'); // Remove class
			}
			if ($("[name='feature_service']").is(":checked")) {
				//alert('Please Enter Text');
              //valid = false; 
            }else {
				alert('Please Select at list one checkbox');
				
			}
		 }
	     if(y[i].id==='txtbx3'){
		 // y[i].className.remove("invalid");
		  var elem = document.getElementById(y[i].id);
		  elem.classList.remove('invalid'); // Remove class
			if ($('#chkbx3').is(":checked")) {
				alert('Please Enter some Text');
              valid = false; 
            }else {
				var elem = document.getElementById(y[i].id);
				elem.classList.remove('invalid'); // Remove class
			}
			if ($("[name='role_in_company']").is(":checked")) {
				//alert('Please Enter Text');
              //valid = false; 
            }else {
				alert('Please Select at list one checkbox');
				
			}
		 }
	    // and set the current valid status to false
		if(!y[i].id==='txtbx'){
			valid = false;
		}
		if(!y[i].id==='txtbx2'){
			valid = false;
		}
		if(!y[i].id==='txtbx3'){
			valid = false;
		}
    }
  } 
  
  function checkValidation(name_rad){
	  if($('input[name='+name_rad+']:checked').length<=0)
{
      valid = false;
 
}
  }
  for (i = 0; i < z.length; i++) {
	  var name_rad = z[i].name;
	if(i==0){
		checkValidation(name_rad)
	}
  } 
  // If the valid status is true, mark the step as finished and valid:
  if (valid) {
    document.getElementsByClassName("step")[currentTab].className += " finish";
  }
  return valid; // return the valid status
}
function fixStepIndicator(n) {
	//debugger;
  // This function removes the "active" class of all steps...
  var i, x = document.getElementsByClassName("step");
  for (i = 0; i < x.length; i++) {
    x[i].className = x[i].className.replace(" active", "");
  }
  //... and adds the "active" class on the current step:
  x[n].className += " active";
}




	$(function () {
        $("#chkbx").click(function () {
			
            if ($(this).is(":checked")) {
               $("#txtbx").show(); 
				$("#txtbx").removeClass("invalid");
            } 
			else {
                $("#txtbx").hide().val("");
				$("input[type=text]").removeClass("invalid");
            }
        });
        $("#chkbx2").click(function () {
			
            if ($(this).is(":checked")) {
               $("#txtbx2").show(); 
				$("#txtbx2").removeClass("invalid");
            } 
			else {
                $("#txtbx2").hide().val("");
				$("input[type=text]").removeClass("invalid");
            }
        });
        $("#chkbx3").click(function () {
			
            if ($(this).is(":checked")) {
               $("#txtbx3").show(); 
				$("#txtbx3").removeClass("invalid");
            } 
			else {
                $("#txtbx3").hide().val("");
				$("input[type=text]").removeClass("invalid");
            }
        });
    });


//CONTACT INFO VALIDATION
	// $("#contact_info").validate({
   	
	// }); 

//$(function() {
 //  $("#regForm").validate({
 //    rules: { 
	// 	   	name:{
	// 	   		required:true
	// 	   	},
	// 	   	email:{
	// 	   		required:true,
	// 	   		valEmail1:true
	// 	   	},
	// 	   	phone:{
	// 	   		required:true
	// 	   	},
	// 	   	country:{
	// 	   		required:true
	// 	   	},
	// 	   	city:{
	// 	   		required:true
	// 	   	},
	// 	   	company:{
	// 	   		required:true
	// 	   	},
 //   	 },
	// messages: { 
	// 		name:{
 //   				required:"Please enter your name"
	// 	   	},
	// 	   	email:{
	// 	   		required:"Please enter email"
	// 	   	},
	// 	   	phone:{
	// 	   		required:"Please enter phone number"
	// 	   	},
	// 	   	country:{
	// 	   		required:"Please select country"
	// 	   	},
	// 	   	city:{
	// 	   		required:"Please enter city"
	// 	   	},
	// 	   	company:{
	// 	   		required:"Please enter company"
	// 	   	},
	// 	}    
 //  });
  // $('#nextBtn').click(function() {
  //       $("#regForm").valid();
  //   });
//});
</script>
<script type="text/javascript">
	$(".swapnext").click( function() {
   $(window).scrollTop(0);
 });
</script>
<?php echo $this->template->contentEnd();	?> 