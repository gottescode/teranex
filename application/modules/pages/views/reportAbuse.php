<style type="text/css">
	.checkbox label.error, .radio label.error{
		display: block;
		color: red;
		font-size: 13px;
		text-transform:none;
	}
</style>
<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/reportabuse-bnr.jpg" alt=" ">
<div class="container section-pad article ReportAbuse">
	
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
    <h2 class="page-1st-heading"> Report Abuse </h2>  
	<div class="article-content">
        <p class="summary">Contact us to report any form of abuse.</p>
		<h3 class="title--mini">Types of Abuse</h3>
		<p>We at Stelmac believe that there can be 5 main types of abuse. These are:</p>
		<h3 class="title--mini">1. Promotes hatred, violence or illegal/offensive activities</h3>
		<p>Users may not share or publish content that promotes hatred or violence towards other groups based on race, ethnicity, religion, disability, gender, age, sexual orientation or gender identity. Please note that individuals are not considered a protected group.</p>
		<p>Users may not share or publish crude content or violent content that is shockingly graphic.</p>
		<p>We will also remove content that threatens, harasses or bullies other people or promotes dangerous and illegal activities.</p>
		<h3 class="title--mini">2. Spam, malware or “phishing”</h3>
		<p>We do not allow spamming or content that transmits viruses, causes pop-ups, attempts to install software without the user’s consent, or otherwise impacts users with malicious code or scripts. We do not allow phishing activity.</p>
		<h3 class="title--mini">3. Private and confidential information</h3>
		<p>We do not allow users to create questions that ask for a respondent’s confidential information. Examples include: passwords, credit card details, bank account numbers or similar types of private information. Please note that we may remove Stelmac's, delete data, and/or block accounts that do not comply.</p>
		<h3 class="title--mini">4. Copyright infringement</h3>
		<p>It is our policy to respond to clear notices of alleged copyright infringement. If you own the copyright to material in a Stelmac, let us know.</p>
		<h3 class="title--mini">5. Nudity</h3>
		<p>We don’t allow the sharing or publishing of content depicting nudity, graphic sex acts or other sexually explicit material. We don’t allow content that drives traffic to pornography.</p>
		<p>We have a zero tolerance policy towards content that exploits children. This means we will terminate the accounts of any user that we find sharing or publishing child abuse content. We will also report the content and its owner to law enforcement.</p>
		<p>We do not allow the sharing or publishing of content that encourages or promotes sexual attraction towards children.</p>
		
		<h3 class="title--mini">How To Report Abuse ?</h3>
		<p style="padding:0">If you feel a Stelmac listing falls into one or more of the above categories, report it to us using the form provided below:
			<div class="col-sm-12 form-bdr">
				<form class="form-horizontal border_bot" name="reportabuse" id="reportabuse" method="post" action="">
					<div class="form-group ">
					  <div class="col-sm-12">
						<h3>1<i class="fa fa-arrow-right"></i>What's the URL of the infringing Stelmac? <span class="red"> *</span></h3>
						<input type="text" name="infringing_url" class="form_bor_bot" >
					  </div>
					</div>
					<div class="form-group ">
					  <div class="col-sm-12">
						<h3>2<i class="fa fa-arrow-right"></i>Which of the following categories does it fall into? <span class="red"> *</span></h3>
						 <div class="checkbox">
							<h3><span>A</span>Promotes hatred, violence or illegal/offensive activities <input type="checkbox" class="radio" value="Promotes hatred, violence or illegal/offensive activities" name="fall_category" required></h3>
							<h3><span>B</span>Spam, malware or phishing <input type="checkbox" class="radio" value="Spam, malware or phishing" name="fall_category" ><i class="helper"></i></h3>
							<h3><span>C</span>Private and confidential information <input type="checkbox" class="radio" value="Private and confidential information " name="fall_category"><i class="helper"></i></h3>
							<h3><span>D</span>Copyright infringement <input type="checkbox" class="radio" value="Copyright infringement" name="fall_category" ><i class="helper"></i></h3>
							<h3><span>E</span>Nudity <input type="checkbox" class="radio" value="Nudity" name="fall_category" ><i class="helper"></i></h3>
						 </div>
					  </div>
					</div>
					<div class="form-group ">
					  <div class="col-sm-12">
						<h3>3<i class="fa fa-arrow-right"></i> Do you have any comments about the offending Stelmac?</h3>
						<p style="padding-left:7%;">Include information about the type of abuse</p>
						<input type="text" name="abuse_type" class="form_bor_bot">
					  </div>
					</div>
					<div class="form-group ">
					  <div class="col-sm-12">
						<h3>4<i class="fa fa-arrow-right"></i> What's your email address? <span class="red">*</span></h3>
						<p style="padding-left:7%;">We may need more information from you</p>
						<input type="text" name="email" class="form_bor_bot" >
					  </div>
					</div>
					<div class="form-group ">
					  <div class="col-sm-12">
						<h3>5<i class="fa fa-arrow-right"></i> Can't find what you're looking for?</h3>
						<input type="text" name="looking_for" class="form_bor_bot">
					  </div>
					</div>
					<div class="form-group col-sm-12 text-center">
					  <center><input type="submit" name="btnReportAbuse" id="submit" class="btn input-form addmore-btn" value="Submit"></center>
					</div>
				</form>
			</div>
		</p>
    </div>
</div>
<div class="col-sm-2 padd-0">
        <br/>
       <!-- <div style="border: 1px solid #e7e7e7;">
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
        <div class="clearfix"></div><br/>-->
      <div style="border: 1px solid #e7e7e7;">
          <div class="gray_bg">
              <p class="padd_5">Trade Services</p>
            </div>
          <div class="side_option">
            <ul>
				<li><a href="<?php echo site_url()."footer/tradeAssurance";?>">Buyer protection</a></li>
				<li><a href="<?php echo site_url()."footer/businessIdentity";?>">Business Identity</a></li>
				<li><a href="<?php echo site_url()."footer/submitAdispute";?>">Dispute Resolution</a></li>
				<li><a href="<?php echo site_url()."pages/getPaidForYourFeedback";?>">Get Paid for Feedback</a></li>
				<li><a href="<?php echo site_url()."footer/inspectionService";?>">Inspection Service</a></li>
				<li><a href="<?php echo site_url()."pages/ReportAbuse";?>">Report Abuse</a></li>
				<!--

				<li><a href="<?php echo site_url()."footer/securePayment";?>">Secure Payments</a></li>
				-->
            </ul>
          </div>
        </div>
      </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script> -->
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
   		infringing_url:{
   			required:true
   		},
		fall_category:{
   			required:true
   		},
	   	email:{
	   		required:true,
	   		valEmail:true
	   	},
   	 },
	messages: { 
		infringing_url:{
   			required:"Please enter infringing URL "
   		},
		fall_category:{
   			required:"Please select one category"
   		},
	   	email:{
	   		required:"Please enter your email address"
	   	},
		}
	}); 
</script>
<?php echo $this->template->contentEnd();	?> 