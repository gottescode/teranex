<?php $this->template->contentBegin(POS_TOP);?>

<style type="text/css">
ul.helpcenter_submenu li{
	background: #445268;
}
ul.helpcenter_submenu li.active>a, ul.helpcenter_submenu li:hover, ul.helpcenter_submenu li.active>a:focus, ul.helpcenter_submenu li.active>a:hover{
	border-radius: 0;
}
/*REPORT ABUSE*/
.checkbox label.error, .radio label.error{
	display: block;
	color: red;
	font-size: 13px;
	text-transform:none;
}
/*GET PAID FOR YOUR FEEDBACK*/
.paidfeedback .tab{
	/*display: block;*/
}
.paidfeedback .tab{display: none; /*width: 100%; height: 50%;margin: 0px auto;*/}
.paidfeedback .current{display: block;}

.paidfeedback h1 {text-align: center; }

.paidfeedback button {cursor: pointer; }

.paidfeedback button:hover {opacity: 0.8; }
.paidfeedback button:focus{
	text-decoration: none;
	outline:none;
}
.paidfeedback .previous { }
.paidfeedback .error {color: #f00; }
.paidfeedback .checkbox label.error{
    color: red;
    padding-left: 0;
    position: absolute;
    top: -25px;
    font-size: 14px;
    left: 0;
}
</style>
<?php echo $this->template->contentEnd();?>
<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/paidfeedback-bnr.jpg" alt=" ">
<div class="container">
    <center> 
	    <h1 class="">Customer Services</h1>
	    <ul class="feature" style="margin-bottom: 20px;"><li>TERANEX offers a range of intelligence reports to help customers make purchase and sales decisions. Our revenue impact consulting</li></ul>
	    <div class="clearfix"></div>
	</center>
    <div class="clearfix"></div><br/>
    <div class="col-sm-12 padd-0">
	    <div class="col-sm-3 padd-0">
			<div class="helpcenter_menu">
			  	<ul class="nav nav-tabs helpcenter_submenu">
	      			<li class="active"><a data-toggle="tab" href="#submitadispute"><img src="<?php echo $theme_url?>/images/whiteicon/auction.png" width="32px">&nbsp;&nbsp; Submit a Dispute</a></li>
	      			<li><a data-toggle="tab" href="#reportAbuse"><img src="<?php echo $theme_url?>/images/whiteicon/analysis.png" width="32px">&nbsp;&nbsp; Report Abuse</a></li>
	      			<li><a data-toggle="tab" href="#payLater"><img src="<?php echo $theme_url?>/images/whiteicon/headset.png" width="32px">&nbsp;&nbsp; Pay Later</a></li>
	      			<li><a data-toggle="tab" href="#getPaidforFeedback"><img src="<?php echo $theme_url?>/images/whiteicon/rating.png" width="32px">&nbsp;&nbsp; Get Paid for Feedback</a></li>
	      		</ul>
			</div>
	    </div>
	    <div class="col-sm-9 padd-0">
	    	<div class="tab-content helpcenter_info" style="padding-right: 0;">
	    		<div class="tab-pane fade in active" id="submitadispute">
		    		<div class="helpcenter-heading">
						<p class="padd_5">Submit and Resolving Disputes</p>
					</div>
					<div class="submitAdispute">
						<div class="col-md-4 col-sm-12 ">
							<h3><i class="fa fa-weixin" aria-hidden="true"></i>Contact the supplier</h3>
							<p>If your order hasn't arrived within the agreed timeframe, or is delivered but isn't as described, contact the supplier via email or TradeManager. Most suppliers will quickly resolve any issues.</p>
						</div>
						<div class="col-md-4 col-sm-12 bdrL-R">
							<h3><i class="fa fa-desktop" aria-hidden="true"></i>Open a dispute to get a refund</h3>
							<p>If you were unable to resolve the issue with the supplier, you can submit a refund request by clicking Open Dispute before the applicable deadline. This function is available 5 days after the shipping date, and allows you to formally discuss solutions with the supplier.</p>
						</div>
						<div class="col-md-4 col-sm-12 ">
							<h3 style="left: 23px;"><i class="fa fa-shield" aria-hidden="true" style="left: -25px;"></i>Escalate the dispute to TERANEX.io’s Customer Service Team</h3>
							<p>If you are not satisfied with the supplier’s solution, you can Escalate the dispute to our Customer Service Team. We will mediate between you and the supplier to resolve the problem.</p>
						</div>
					</div>
	    		</div>
	    		<div class="tab-pane fade" id="reportAbuse">
		    		<div class="helpcenter-heading">
						<p class="padd_5">Report Abuse</p>
					</div>
					<div class="article ReportAbuse">
						<div class="article-content">
					        <p class="summary">At TERANEX, we believe in creating a powerful tool for asking questions online. We also believe that this tool should be used ethically, to help people “Ask Awesomely!”. If you believe a TERANEX is not being used in this way, you can report it for abuse.</p>
							<h3 class="title--mini">Types of Abuse</h3>
							<p>We sort the various kinds of abuse into 5 main types. These are:</p>
							<h3 class="title--mini">1. Promotes hatred, violence or illegal/offensive activities</h3>
							<p>Users may not share or publish content that promotes hatred or violence towards other groups based on race, ethnicity, religion, disability, gender, age, sexual orientation or gender identity. Please note that individuals are not considered a protected group.</p>
							<p>Users may not share or publish crude content or violent content that is shockingly graphic.</p>
							<p>We will also remove content that threatens, harasses or bullies other people or promotes dangerous and illegal activities.</p>
							<h3 class="title--mini">2. Spam, malware or “phishing”</h3>
							<p>We do not allow spamming or content that transmits viruses, causes pop-ups, attempts to install software without the user’s consent, or otherwise impacts users with malicious code or scripts. We do not allow phishing activity.</p>
							<h3 class="title--mini">3. Private and confidential information</h3>
							<p>We do not allow users to create questions that ask for a respondent’s confidential information. Examples include: passwords, credit card details, bank account numbers or similar types of private information. Please note that we may remove TERANEXs, delete data, and/or block accounts that do not comply.</p>
							<h3 class="title--mini">4. Copyright infringement</h3>
							<p>It is our policy to respond to clear notices of alleged copyright infringement. If you own the copyright to material in a TERANEX, let us know.</p>
							<h3 class="title--mini">5. Nudity</h3>
							<p>We don’t allow the sharing or publishing of content depicting nudity, graphic sex acts or other sexually explicit material. We don’t allow content that drives traffic to pornography.</p>
							<p>We have a zero tolerance policy towards content that exploits children. This means we will terminate the accounts of any user that we find sharing or publishing child abuse content. We will also report the content and its owner to law enforcement.</p>
							<p>We do not allow the sharing or publishing of content that encourages or promotes sexual attraction towards children.</p>
							
							<h3 class="title--mini">Report Abuse</h3>
							<p style="padding:0">If you feel a TERANEX falls into one or more of the above categories, report it to us using the below TERANEX.
								<div class="col-sm-12 form-bdr">
									<form class="form-horizontal border_bot" name="reportabuse" id="reportabuse" method="post" action="#">
										<div class="form-group ">
										  <div class="col-sm-12">
											<h3>1<i class="fa fa-arrow-right"></i>What's the URL of the infringing TERANEX? <span> *</span></h3>
											<input type="text" class="form_bor_bot" >
										  </div>
										</div>
										<div class="form-group ">
										  <div class="col-sm-12">
											<h3>2<i class="fa fa-arrow-right"></i>Which of the following categories does it fall into? <span> *</span></h3>
											 <div class="checkbox">
												<h3><span>A</span>Promotes hatred, violence or illegal/offensive activities <input type="checkbox" class="radio" value="1" name="remember" required></h3>
												<h3><span>B</span>Spam, malware or phishing <input type="checkbox" class="radio" value="1" name="remember" ><i class="helper"></i></h3>
												<h3><span>C</span>Private and confidential information <input type="checkbox" class="radio" value="1" name="remember"><i class="helper"></i></h3>
												<h3><span>D</span>Copyright infringement <input type="checkbox" class="radio" value="1" name="remember" ><i class="helper"></i></h3>
												<h3><span>E</span>Nudity <input type="checkbox" class="radio" value="1" name="remember" ><i class="helper"></i></h3>
											 </div>
										  </div>
										</div>
										<div class="form-group ">
										  <div class="col-sm-12">
											<h3>3<i class="fa fa-arrow-right"></i> Do you have any comments about the offending TERANEX?</h3>
											<p style="padding-left:7%;">Include information about the type of abuse</p>
											<input type="text" class="form_bor_bot">
										  </div>
										</div>
										<div class="form-group ">
										  <div class="col-sm-12">
											<h3>4<i class="fa fa-arrow-right"></i> What's your email address? <span>*</span></h3>
											<p style="padding-left:7%;">We may need more information from you</p>
											<input type="text" class="form_bor_bot" >
										  </div>
										</div>
										<div class="form-group ">
										  <div class="col-sm-12">
											<h3>4<i class="fa fa-arrow-right"></i> Can't find what you're looking for?</h3>
											<input type="text" class="form_bor_bot">
										  </div>
										</div>
										<div class="form-group col-sm-12 text-center">
										  <center><input type="submit" name="submit" id="submit" class="btn input-form addmore-btn" value="Submit"></center>
										</div>
									</form>
								</div>
							</p>
					    </div>
					</div>
	    		</div>
	    		<div class="tab-pane fade" id="payLater">
		    		<div class="helpcenter-heading">
						<p class="padd_5">Pay Later</p>
					</div>
					<div>
						
					</div>	
	    		</div>
	    		<div class="tab-pane fade" id="getPaidforFeedback">
		    		<div class="helpcenter-heading">
						<p class="padd_5">Get Paid for Feedback</p>
					</div>
					<div class="servay paidfeedback">
						<div class="row">
							<div class="col-sm-12">
								<form id="myForm" action="#" method="POST">
								  	<h2>Join TERANEX User Research</h2>
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
								  		<div class="border_bot" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
										 	<input class="form_bor_bot lettersOnly" name="fname" placeholder="Full name"><span class="compulsary">*</span>
										
										 	<input class="form_bor_bot" name="email" placeholder="Email"><span class="compulsary">*</span>
										
										 	<input class="form_bor_bot numbersOnly" name="phone" placeholder="Phone number" minlength="10" maxlength="10"><span class="compulsary">*</span>
										
										 	<input class="form_bor_bot lettersOnly" name="country" placeholder="Country you live in"><span class="compulsary">*</span>
										
										 	<input class="form_bor_bot lettersOnly" name="city" placeholder="City"><span class="compulsary">*</span>
										
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
								</form>
							</div>
						</div>
					</div>
	    		</div>
	    	</div>
	    </div>
    </div>
</div>
<div class="clearfix"></div><br/>


<?php $this->template->contentBegin(POS_BOTTOM);?>
<!-- REPORT ABUSE JQUERY -->
<script>
	jQuery.validator.addMethod("valEmail", function(value, element) {
  return this.optional( element ) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test( value );
}, 'Please enter a valid email address');

	$("input:checkbox").on('click', function() {
	  // in the handler, 'this' refers to the box clicked on
	  var $box = $(this);
	  if ($box.is(":checked")) {
		// the name of the box is retrieved using the .attr() method
		// as it is assumed and expected to be immutable
		var group = "input:checkbox[name='" + $box.attr("name") + "']";
		// the checked state of the group/box on the other hand will change
		// and the current value is retrieved using .prop() method
		$(group).prop("checked", false);
		$box.prop("checked", true);
	  } else {
		$box.prop("checked", false);
	  }
	});

	$("#reportabuse").validate({
   	rules: { 
		   	url_infri:{
		   		required:true
		   	},
		   	email_add:{
		   		required:true,
		   		valEmail:true
		   	},
		   	remember:{
		   		required:true
		   	},

   	 },
	messages: { 
		   	url_infri:{
		   		required:"Please enter URL"
		   	},
		   	email_add:{
		   		required:"Please enter email address"
		   	},
		   	remember:{
		   		required:"Please select one category"
		   	},
		}
	}); 
</script>
<!-- GET PAID FOR FEEDBACK -->
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



jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
jQuery('.lettersOnly').keyup(function () { 
    this.value = this.value.replace(/[^A-Za-z\.]/g,'');
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
<?php echo $this->template->contentEnd(); ?> 