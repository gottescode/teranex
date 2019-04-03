<style type="text/css">
.paidfeedback .tab{
	/*display: block;*/
}
/** {box-sizing: border-box;}*/
.tab{display: none; /*width: 100%; height: 50%;margin: 0px auto;*/}
.current{display: block;}



/*form {background-color: #ffffff; margin: 100px auto; font-family: Raleway; padding: 40px; width: 40%; min-width: 300px; }*/

h1 {text-align: center; }

/*input {padding: 10px; width: 100%; border: 1px solid #aaaaaa; }*/

button {cursor: pointer; }

button:hover {opacity: 0.8; }
button:focus{
	text-decoration: none;
	outline:none;
}
.previous { }

/* Make circles that indicate the steps of the form: */
/*.step {height: 30px; width: 30px; cursor: pointer; margin: 0 2px; color: #fff; background-color: #bbbbbb; border: none; border-radius: 50%; display: inline-block; opacity: 0.8; padding: 5px}

.step.active {opacity: 1; background-color: #69c769;}

.step.finish {background-color: #4CAF50; }*/

.error {color: #f00; }
.checkbox label.error{
    color: red;
    padding-left: 0;
    position: absolute;
    top: -25px;
    font-size: 14px;
    left: 0;
}

</style>
<!-- <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css"> -->
<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/paidfeedback-bnr.jpg" alt=" ">

<div class="container servay section-pad paidfeedback">
     <div class="col-sm-12 padd-0"> 
         <!-- <?php 	
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
		<?php }	?>	   -->

    </div>

	<div class="col-sm-10">
		<div class="row">
			<div class="col-sm-12">
				<form id="myForm" action="#" method="POST">
				  	<h2>Join Stelmac User Research</h2>
				  	<!-- One "tab" for each step in the form: -->
				  	<div class="tab">
				  	 	<p>Thank you for your interest in participating in research at Stelmac. We regularly conduct different type of user studies including surveys, interviews, and usability studies. Please complete this survey and we'll contact you when a research study looks like a match with your background.</p>
						<p>Your participation will help us to improve the Stelmac website and in turn provide a better experience for you. In addition, those who are qualified and participate in research projects will receive a <strong>monetary compensation (checks, coupons or gift cards)</strong> as a token of appreciation.</p>
				  	</div>
				  	<div class="tab">
					  	<h3> 1. Approximately how long have you been using Stelmac.io ? [Please select one.]</h3>
						<div class="checkbox">
						 	<p>
								<label class="radio">Less than 1 month<input type="radio" name="how_long" checked="checked"><span class="checkround"></span> </label>
								<label class="radio"  value="1 to 6 months">1 to 6 months<input type="radio" name="how_long"><span class="checkround"></span> </label>
								<label class="radio" value="7 to 12 months">7 to­ 12 months<input type="radio" name="how_long"><span class="checkround"></span> </label>
								<label class="radio"  value="1 to 2 years">1 to 2 years<input type="radio" name="how_long"><span class="checkround"></span></label>
								<label class="radio" value="more than 2 years">more than 2 years<input type="radio" name="how_long"><span class="checkround"></span> </label>
								<label class="radio"  value="I have heard of TERANEX.io, but never used it">I have heard of Stelmac.io, but never used it.<input type="radio" name="how_long"> <span class="checkround"></span> </label>
								<label class="radio"  value="Other">Other<input type="radio" name="how_long"><span class="checkround"></span></label>
						  	</p>
					    </div>
						<h3>2. Which ones of the following categories are you interested in sourcing at Stelmac.io? [Please select all that apply.]</h3>
					    <div class="checkbox q-2">
					       	<p>
								<label class="check ">Machines<input type="checkbox" class="rad" name="interested_category"  value="Machines"><span class="checkmark"></span> </label>
								<label class="check" >Spare Parts<input type="checkbox" class="rad" name="interested_category" value="Spare Parts"><span class="checkmark"></span></label>
								<label class="check ">Toolings<input  type="checkbox" class="rad" name="interested_category" value="Toolings"><span class="checkmark"> </span> </label>
								<label class="check ">Raw Materials<input type="checkbox" class="rad" name="interested_category" value="Raw Materials"><span class="checkmark"> </span></label>
								<label class="check ">Software<input type="checkbox" class="rad" name="interested_category" value="Software"><span class="checkmark"></span></label>
								<label class="check ">Application Consulting<input type="checkbox" class="rad" name="interested_category" value="Application Consulting"><span class="checkmark"></span> </label>
								<label class="check ">Digital training<input type="checkbox" class="rad" name="interested_category" value="Digital training"><span class="checkmark"> </span></label>
								<label class="check ">Research Consulting<input type="checkbox" class="rad" name="interested_category" value="Research Consulting"> <span class="checkmark"></span> </label>
								<label class="check ">Other (please specify)<input id="chkbx" type="checkbox" class="rad" name="interested_category" value="Other"> <span class="checkmark"></span></label>
								<input type="text" class="form-control" id="txtbx" style="display:none;width:40%"> 
							</p>
					    </div>
				  	</div>
				  	<div class="tab">
				    	<h3> 3. Approximately how long have you been using Stelmac.io? [Please select one.]</h3>
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
								<label class="radio">I did not visit Stelmac.io within the past 6 months<input type="radio" name="how_long_using_teranex" value="I did not visit Stelmac.io within the past 6 months"> <span class="checkround"> </span></label>
						  	</p>
					    </div>
						<h3> 4. Thinking about the last month, approximately how often did you use Stelmac.io mobile app? [Please select one.]</h3>
						<div class="checkbox">
						  	<p>
								<label class="radio">Daily<input type="radio" name="usage_mobile_app" checked="checked"  value="Daily"><span class="checkround"></span></label>
								<label class="radio" >A few times per week<input type="radio" name="usage_mobile_app" value="A few times per week"><span class="checkround"> </span> </label>
								<label class="radio">About once a week<input type="radio" name="usage_mobile_app" value="About once a week<"><span class="checkround"></span> </label>
								<label class="radio">A few times per month<input type="radio" name="usage_mobile_app" value="A few times per month"><span class="checkround"> </span> </label>
								<label class="radio">Once a month or less<input type="radio" name="usage_mobile_app" value="Once a month or less"><span class="checkround"> </span></label>
								<label class="radio">I have never heard of Stelmac.io mobile app.<input type="radio" name="usage_mobile_app" value="I have never heard of Stelmac.io mobile app"><span class="checkround"></span> </label>
								<label class="radio">I have heard of Stelmac.io mobile app, but never used it.<input type="radio" name="usage_mobile_app" value="I have heard of Stelmac.io mobile app, but never used it"><span class="checkround"></span></label>
						  	</p>
					    </div>
						<h3> 5. Which of the following features or services on Stelmac.io have you used before? [Please select all that apply.]</h3>
						<div class="checkbox q-3">
					       	<p>
								<label class="check ">Category Navigation<input type="checkbox" class="rad" name="feature_service" value="Category Navigation"> <span class="checkmark"></span> </label>
								<label class="check ">Trade Assurance<input type="checkbox" class="rad" name="feature_service" value="Trade Assurance"><span class="checkmark"></span> </label>
								<label class="check ">Wholesale<input type="checkbox" class="rad" name="feature_service" value="Wholesale"><span class="checkmark"></span></label>
								<label class="check ">Inspection Service<input type="checkbox" class="rad" name="feature_service" value="Inspection Service"> <span class="checkmark"></span> </label>
								<label class="check ">Search Box<input type="checkbox" class="rad" name="feature_service" value="Search Box"><span class="checkmark"></span></label>
								<label class="check ">None of the Above<input id="chkbx2" type="checkbox" class="rad" name="feature_service" value="None of the Above"> <span class="checkmark"></span> </label>
								<input type="text" class="form-control " id="txtbx2" style="display:none;width:40%"> </p>
						   	</p>
					    </div>
				  	</div>
				  	<div class="tab">
				    	<h3> 6. What is your MAIN purpose of using Stelmac.io? [Please select one.]</h3>
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
				    	<h3>9. What are you looking to shop at Stelmac.io? [Please select one.]</h3>
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
								<label class="check ">I am the owner.<input type="checkbox" class="rad" name="role_in_company" value="I am the owner"><span class="checkmark"></span> </label>
								<label class="check ">I am the general manager/director.<input type="checkbox" class="rad" name="role_in_company" value="I am the general manager/director"> <span class="checkmark"> </span></label>
								<label class="check ">I am the purchasing manager.<input type="checkbox" class="rad" name="role_in_company" value="I am the purchasing manager"> <span class="checkmark"> </span></label>
								<label class="check ">I am a purchaser/merchandiser/purchasing assistant.<input type="checkbox" class="rad" name="role_in_company" value="I am a purchaser/merchandiser/purchasing assistant"> <span class="checkmark"></span></label>
								<label class="check ">Other (please specify)<input id="chkbx3" type="checkbox" class="rad" name="role_in_company" value="Other"><span class="checkmark"> </span></label>
								<input type="text" class="form-control " id="txtbx3" style="display:none; width:40%"> 
							</p>
					    </div>
				  	</div>
				  	<div class="tab">
				    	<h3> 11. Approximately how much does your business spend in purchasing (for materials, products) in last 12 months? This includes purchases made via AND outside of Stelmac.io. [Please select one.]</h3>
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
				    	<h3> 13. Have your company ever made a purchase on Stelmac.io? (Making a purchase refers to either placing an order directly on Stelmac.io or paying suppliers via the account.)</h3>
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
				  		<div class="border_bot" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
					  		<!-- <p><input placeholder="First name..." name="fname"></p>
						    <p><input placeholder="Last name..." name="lname"></p>
						    <p><input placeholder="E-mail..." name="email"></p>
						    <p><input placeholder="Phone..." name="phone"></p>
						  	<p><input placeholder="dd" name="date"></p>
						    <p><input placeholder="mm" name="month"></p>
						    <p><input placeholder="yyyy" name="year"></p>
						    <p><input placeholder="Username..." name="username"></p>
						    <p><input placeholder="Password..." name="password" type="password"></p> -->
						
						 	<input class="form_bor_bot lettersOnly" name="fname" placeholder="Full name"><span class="compulsary">*</span>
						
						 	<input class="form_bor_bot" name="email" placeholder="Email"><span class="compulsary">*</span>
						
						 	<input class="form_bor_bot numbersOnly" name="phone" placeholder="Phone number" minlength="10" maxlength="10"><span class="compulsary">*</span>
						
						 	<!-- <input class="form_bor_bot" name="country" placeholder="Country you live in"><span class="compulsary">*</span> -->
						 	<select class="form_bor_bot" name="country">
						 		<option value="">Select Country</option>
						 		<option value="india">India</option>
						 	</select><span class="compulsary">*</span>
						
						 	<!-- <input class="form_bor_bot" name="city" placeholder="City"><span class="compulsary">*</span> -->
							<select class="form_bor_bot" name="city">
						 		<option value="">Select City</option>
						 		<option value="pune">Pune</option>
						 	</select><span class="compulsary">*</span>

						 	<input class="form_bor_bot lettersOnly" name="company" placeholder="Name of your company"><span class="compulsary">*</span>
					    
						</div><div class="clearfix"></div><br/>
				  	</div>
				  	<div class="tab">
				     	<p>Thank you for completing this questionnaire! If your submitted questionnaire is qualified and chosen,we will get in touch with you when there is a matching research study in the future.</p>
				  	</div>
				  	<div style="overflow:auto;">
					    <div style="float:right;">
					      	<button type="button" class="previous btn_orange swapcust">Previous</button>
					      	<button type="button" class="next btn_orange swapcust">Next</button>
							<button type="button" class="submit btn_orange swapcust">Submit</button>
					    </div>
				  	</div>
				  <!-- Circles which indicates the steps of the form: -->
				  <!-- <div style="text-align:center;margin-top:40px;">
				    <span class="step">1</span>
				    <span class="step">2</span>
				    <span class="step">3</span>
				    <span class="step">4</span>
				  </div> -->
				</form>
			</div>
		</div>
	</div>
	<div class="col-sm-2 padd-0">
        <br/>
        <div style="border: 1px solid #e7e7e7;">
          <div class="gray_bg">
              <p class="padd_5">Customer Services</p>
            </div>
          <div class="side_option">
            <ul>
              <li><a href="<?php echo site_url()."footer/submitAdispute";?>">Submit a Dispute</a></li>
                <li><a href="<?php echo site_url()."pages/ReportAbuse";?>">Report Abuse</a></li>
                <li><a href="<?php echo site_url()."footer/payLater";?>">Pay Later</a></li>
                <li><a href="<?php echo site_url()."pages/getPaidForYourFeedback";?>">Get Paid for Feedback</a></li>
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
              <li><a href="<?php echo site_url()."footer/inspectionService";?>">Inspection Service</a></li>
              <li><a href="<?php echo site_url()."footer/securePayment";?>">Secure Payments</a></li>
            </ul>
          </div>
        </div>
      </div>
</div>
<div class="clearfix"></div><br/><br/>
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<script>
(function ( $ ) {
  $.fn.multiStepForm = function(args) {
      if(args === null || typeof args !== 'object' || $.isArray(args))
        throw  " : Called with Invalid argument";
      var form = this;
      var tabs = form.find('.tab');
      var steps = form.find('.step');
      steps.each(function(i, e){
        $(e).on('click', function(ev){
          form.navigateTo(i);
        });
      });
      form.navigateTo = function (i) {/*index*/
        /*Mark the current section with the class 'current'*/
        tabs.removeClass('current').eq(i).addClass('current');
        // Show only the navigation buttons that make sense for the current section:
        form.find('.previous').toggle(i > 0);
        atTheEnd = i >= tabs.length - 1;
        form.find('.next').toggle(!atTheEnd);
        // console.log('atTheEnd='+atTheEnd);
        form.find('.submit').toggle(atTheEnd);
        fixStepIndicator(curIndex());
        return form;
      }
      function curIndex() {
        /*Return the current index by looking at which section has the class 'current'*/
        return tabs.index(tabs.filter('.current'));
      }
      function fixStepIndicator(n) {
        steps.each(function(i, e){
          i == n ? $(e).addClass('active') : $(e).removeClass('active');
        });
      }
      /* Previous button is easy, just go back */
      form.find('.previous').click(function() {
        form.navigateTo(curIndex() - 1);
      });

      /* Next button goes forward iff current block validates */
      form.find('.next').click(function() {
        if('validations' in args && typeof args.validations === 'object' && !$.isArray(args.validations)){
          if(!('noValidate' in args) || (typeof args.noValidate === 'boolean' && !args.noValidate)){
            form.validate(args.validations);
            if(form.valid() == true){
              form.navigateTo(curIndex() + 1);
              return true;
            }
            return false;
          }
        }
        form.navigateTo(curIndex() + 1);
      });
      form.find('.submit').on('click', function(e){
        if(typeof args.beforeSubmit !== 'undefined' && typeof args.beforeSubmit !== 'function')
          args.beforeSubmit(form, this);
        /*check if args.submit is set false if not then form.submit is not gonna run, if not set then will run by default*/        
        if(typeof args.submit === 'undefined' || (typeof args.submit === 'boolean' && args.submit)){
          form.submit();
        }
        return form;
      });
      /*By default navigate to the tab 0, if it is being set using defaultStep property*/
      typeof args.defaultStep === 'number' ? form.navigateTo(args.defaultStep) : null;

      form.noValidate = function() {
        
      }
      return form;
  };
}( jQuery ));
</script>
<script type="text/javascript">
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z \.]/g,'');
});
jQuery.validator.addMethod("valEmail1", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');

		$(document).ready(function(){
			$.validator.addMethod('date', function(value, element, param) {
				return (value != 0) && (value <= 31) && (value == parseInt(value, 10));
			}, 'Please enter a valid date!');
			$.validator.addMethod('month', function(value, element, param) {
				return (value != 0) && (value <= 12) && (value == parseInt(value, 10));
			}, 'Please enter a valid month!');
			$.validator.addMethod('year', function(value, element, param) {
				return (value != 0) && (value >= 1900) && (value == parseInt(value, 10));
			}, 'Please enter a valid year not less than 1900!');
			$.validator.addMethod('username', function(value, element, param) {
				var nameRegex = /^[a-zA-Z0-9]+$/;
				return value.match(nameRegex);
			}, 'Only a-z, A-Z, 0-9 characters are allowed');

			var val	=	{
			    // Specify validation rules
			    rules: {
			      	fname: {
			      	required: true
			      	},
			      	email: {
					        required: true,
					        valEmail1:true,
					        email: true
					      },
					phone: {
						required:true,
						minlength:10,
						maxlength:10,
						digits:true
					},
					country:{
						required:true
					},
					city:{
						required:true
					},
					company:{
						required:true
					},
					interested_category:{
						required:true
					},
					feature_service:{
						required:true
					},
					role_in_company:{
						required:true
					}

			    },
			    // Specify validation error messages
			    messages: {
					fname: 		"Please enter name",
					email: {
						required: 	"Please enter email",
						email: 		"Please enter a valid e-mail",
					},
					phone:{
						required: 	"Please enter phone number",
						minlength: 	"Please enter 10 digit mobile number",
						maxlength: 	"Please enter 10 digit mobile number",
						digits: 	"Only numbers are allowed in this field"
					},
					country:{
						required:"Please enter country"
					},
					city:{
						required:"Please enter city"
					},
					company:{
						required:"Please enter company name"
					},
					interested_category:{
						required:"Please select categories you are interested in sourcing"
					},
					feature_service:{
						required:"Please select features or services on TERANEX.io you have used before"
					},
					role_in_company:{
						required:"Please select your role in the company"
					},

					
			    }
			}
			$("#myForm").multiStepForm(
			{
				// defaultStep:0,
				beforeSubmit : function(form, submit){
					console.log("called before submiting the form");
					console.log(form);
					console.log(submit);
				},
				validations:val,
			}
			).navigateTo(0);
		});
	</script>
	<script type="text/javascript">

	//	CUSTOMIZE JQUERY FOR OTHER OPTION	
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
		// FOR SCROLLTOP POSITION

$(".swapcust").click( function() {
   $(window).scrollTop(0);
 });
	</script>
<?php echo $this->template->contentEnd();	?> 