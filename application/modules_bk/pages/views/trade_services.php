<?php $this->template->contentBegin(POS_TOP);?>

<style type="text/css">
ul.helpcenter_submenu li{
	background: #445268;
}
ul.helpcenter_submenu li.active>a, ul.helpcenter_submenu li:hover, ul.helpcenter_submenu li.active>a:focus, ul.helpcenter_submenu li.active>a:hover{
	border-radius: 0;
}
/*BUSINESS IDENTITY*/
.businessIdentity .box1 {
    padding: 0 15px;
    letter-spacing: 1px;
}
.securePayment .sec-bdr{
	border:none;
	border-bottom:border: 1px solid #bdbdbd;
}
.securePayment .step-label {
    width: unset;
    }
    .securePayment .step-item:hover {
    background-color: #2a93d4;
}
.securePayment .step-item{
	width: 177px;
}
.TradeAssurance .box-bdr div h3{
	min-height: 56px;
}
</style>
<?php echo $this->template->contentEnd();?>
<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/paidfeedback-bnr.jpg" alt=" ">
<div class="container">
    <center> 
	    <h1 class="">Trade Services</h1>
	    <ul class="feature" style="margin-bottom: 20px;"><li>Stelmac focuses on creating a relationship of trust between the buyer and seller and strives to establish a safe and secure environment to conduct business on a single integrated platform.</li></ul>
	    <div class="clearfix"></div>
	</center>
    <div class="clearfix"></div><br/>
    <div class="col-sm-12 padd-0">
	    <div class="col-sm-3 padd-0">
			<div class="helpcenter_menu">
			  	<ul class="nav nav-tabs helpcenter_submenu">
	      			<li class="active"><a data-toggle="tab" href="#tradeAssurance"><img src="<?php echo $theme_url?>/images/whiteicon/money.png" width="32px">&nbsp;&nbsp; Trade Assurance</a></li>
	      			<li><a data-toggle="tab" href="#businessIdentity"><img src="<?php echo $theme_url?>/images/whiteicon/id-card.png" width="32px">&nbsp;&nbsp; Business Identity</a></li>
	      			<li><a data-toggle="tab" href="#inspectionService"><img src="<?php echo $theme_url?>/images/whiteicon/inspection.png" width="32px">&nbsp;&nbsp; Inspection Service</a></li>
	      			<li><a data-toggle="tab" href="#securePayment"><img src="<?php echo $theme_url?>/images/whiteicon/payment-security.png" width="32px">&nbsp;&nbsp; Secure Payment</a></li>
	      		</ul>
			</div>
	    </div>
	    <div class="col-sm-9 padd-0">
	    	<div class="tab-content helpcenter_info" style="padding-right: 0;">
	    		<div class="tab-pane fade in active" id="tradeAssurance">
		    		<div class="helpcenter-heading">
						<p class="padd_5">Trade Assurance</p>
					</div>
					<div class="TradeAssurance">
					  		<p>Our trade assurance program protects the buyer and ensures a hassle free experience in trading. 
					  		<br/>
							Stelmac offers a money back guarantee thereby minimizing the risk in case the terms of the contract are not met.</p>
							<h3>Buyer Protection</h3>
							<p>Stelmac’s trade assurance is a free service that is offered to all the buyers so as to be covered in the event of a delayed shipment, quality or payment issues. A buyer has the option of raising a complaint on the dispute resolution system.</p>
					  		<p>With Trade Assurance, you’ll enjoy:</p>
						<div class="col-sm-12 box-bdr">
							<div class="col-sm-4">
							  	<h3>On-Time Shipment & Delivery </h3>
							  	<p>100% refund will be provided to buyers in the event that shipments fail to be delivered on time as per what was agreed in the contract between the buyer and supplier. </p>
							</div>
							<div class="col-sm-4 borderLR">
							  	<h3>Product Quality </h3>
							  	<p>In case the quality of the delivered product does not match with the description and specifications mentioned on Stelmac, 100% refund would be provided within 7 business days. </p>
							</div>
							<div class="col-sm-4">
							  	<h3>Payment Protection </h3>
							  	<p>Stelmac assures secure and reliable payment processing and the supplier will receive payment only once the buyer is satisfied and has confirmed delivery of the product as per the order specifications.</p>
							</div>
						</div>
						<p>* Please see the <a href="#">Terms & Conditions</a> of the Trade Assurance service.</p>
					</div>
	    		</div>
	    		<div class="tab-pane fade" id="businessIdentity">
		    		<div class="helpcenter-heading">
						<p class="padd_5">Business Identity -Get Verified, Build Trust</p>
					</div>
					<div class="businessIdentity">
						<div class="col-sm-12 box-bdr">
							<div class="col-sm-4">
							  <h3>Display your verification status</h3>
							  <p>Easier recognition means suppliers are 63% more likely to contact buyers with a verified Business Identity.</p>
							</div>
							<div class="col-sm-4 borderLR">
							  <h3>Faster responses from suppliers when verified</h3>
							  <p>Get noticed quickly by suppliers. Higher chance of getting better and faster responses.</p>
							</div>
							<div class="col-sm-4">
							  <h3>Promotional events</h3>
							  <p>Buyers who are verified enjoy more promotional events, held jointly with Stelmac.io's partners.</p>
							</div>
						</div>
						<div class="col-sm-12 btn-verify">
							<a href="javascript:void(0);" class="btn btn_orange">Verify</a>
						</div>
						<div class="col-sm-12 padd-0">
							<h2>Verification Process</h2>
							<div class="col-sm-12 padd-0">
								<h3>Contacts Verification</h3>
								<ul style="float:left">
									<div class="Fstbox box">
										<li class="box1">Apply</li>
									</div>
									<div class="sendbox box">
										<li class="box1">Verification by contacts</li>
									</div>
									<div class="thrdbox box">
										<li class="box1">invite contacts</li>
									</div>
									<div class="fothbox box">
										<li class="box1">Get verified by three contacts</li>
									</div>
									<div class="fifthbox box">
										<li class="box1">Avail benefits</li>
									</div>
								</ul>
							</div>
							<div class="col-sm-12 padd-0">
								<h3>Third Party Verification</h3>
								<ul style="float:left">
									<div class="Fstbox box">
										<li class="box1">Apply</li>
									</div>
									<div class="sendbox box">
										<li class="box1">Verification by Third Party</li>
									</div>
									<div class="thrdbox box">
										<li class="box1">Complete application</li>
									</div>
									<div class="fothbox box">
										<li class="box1">Get verified by third party</li>
									</div>
									<div class="fifthbox box">
										<li class="box1">Avail benefits</li>
									</div>
								</ul>
							</div>
						</div>
					</div>
					
	    		</div>
	    		<div class="tab-pane fade" id="inspectionService">
		    		<div class="helpcenter-heading">
						<p class="padd_5">What Is Stelmac.io Inspection Service?</p>
					</div>
					<div class="inspectionService">
						<div class="col-sm-12 padd-0">
						 	<!-- <h2 style="text-transform: unset;">What Is TERANEX.io Inspection Service?</h2> -->
						    <p class="p"style="line-height: 30px;">With Stelmac.io’s Inspection Service, you can order services from professional 3rd-party inspectors and inspection companies directly on at<a> http://Stelmac.io.</a> The inspector will visit the manufacturing and/or port facilities anywhere in India and make reports, including pictures, to certify that the goods being produced and shipped meet quality standards.</p>

							<p class="p"style="line-height: 30px;">
							Types of inspections generally offered:
							</p>
								<ul class="inspection_service">
									<li>Initial Production Inspection – checks the machinery and materials to be used for your order at the beginning of the production process.</li>
									<li>During Production Inspection – a visual check on the quality of components, materials and finished products during manufacturing.</li>
									<li>Final Random Inspection – a detailed visual inspection of samples selected at random to check that the quality, quantity and packaging conform to your samples and specifications. </li>
									<li>Container Loading Check – supervision during container loading to ensure that the finished and packed goods meet your specifications (product type and quantity).</li>
									<li>Factory Audit – ensures the factory adheres to local and international labor laws; checks the factory’s capabilities, management and operating procedures.</li>
									<li>Other services are available as specified by Inspectors.</li>
								</ul>
						</div>
					</div>
	    		</div>
	    		<div class="tab-pane fade" id="securePayment">
		    		<div class="helpcenter-heading">
						<p class="padd_5">Secure Payment</p>
					</div>
					<div class="securePayment">
						<div class="sec-bdr">	
							<div class="col-sm-12 padd-0">
								<h2>What is Secure Payment service?</h2>
								<p>Stelmac.io Secure Payment aims to provide a safe payment service for all parties engaged in international trade. By partnering with an independent online payment platform (Alipay), TERANEX.io provides payment security to both buyers and suppliers.</p>
							</div>
						</div>
						<div class="sec-bdr">
							<div class="col-sm-12 padd-0">
								<h2>How does it work?</h2>
								 	<!-- <ul class="step-item-box">
										  <li class="util-left step-item" id="li_0" cust-id="0" data-toggle="tooltip" data-placement="bottom" title="If the supplier has not confirmed the logistics arrangements, please contact the supplier.">
										  <div class="step-label"> 1</div>
										  <div class="step-item-title">Buyer places order online</div>
										  </li>
										  <li class="util-left step-item" id="li_1" cust-id="1" data-toggle="tooltip" data-placement="bottom" title="The buyer must make payment within 20 days of confirming the order with the supplier, otherwise the order will be closed.">
										  <div class="step-label"> 2</div>
										  <div class="step-item-title">Buyer Payment</div>
										  </li>
										  <li class="util-left step-item" id="li_2" cust-id="2" data-toggle="tooltip" data-placement="bottom" title="During the delivery period, the supplier must submit the express courier details online as proof of dispatch.">
										  <div class="step-label"> 3</div>
										  <div class="step-item-title">Supplier ships order</div>
										  </li>
										  <li class="util-left step-item" id="li_3" cust-id="3">
										  <div class="step-label"> 4</div>
										  <div class="step-item-title step4">Buyer receives order and confirms online</div>
										  </li>
										  <li class="util-left step-item last" id="li_4" cust-id="4">
										  <div class="step-label"> 5</div>
										  <div class="step-item-title step4">Payment released to supplier</div>
										  </li>
									</ul> -->
								<div class="businessIdentity">
								<ul style="float:left">
									<div class="Fstbox box" data-toggle="tooltip" data-placement="bottom" title="If the supplier has not confirmed the logistics arrangements, please contact the supplier.">
										<li class="box1">1 Buyer places <br/>order online</li>
									</div>
									<div class="sendbox box" data-toggle="tooltip" data-placement="bottom" title="The buyer must make payment within 20 days of confirming the order with the supplier, otherwise the order will be closed.">
										<li class="box1">2 Buyer Payment<br/><br/></li>
									</div>
									<div class="thrdbox box" data-toggle="tooltip" data-placement="bottom" title="During the delivery period, the supplier must submit the express courier details online as proof of dispatch.">
										<li class="box1">3 Supplier ships<br/> order</li>
									</div>
									<div class="fothbox box">
										<li class="box1">4 Buyer receives order <br/>and confirms online</li>
									</div>
									<div class="fifthbox box">
										<li class="box1">5 Payment released <br/>to supplier</li>
									</div>
								</ul>
								</div>
								<div class="clearfix"></div><br/>
								<p>Tips: TERANEX will send Email notifications to the buyer and supplier at every step of the process. Please be aware that emails from: transaction@notice.TERANEX.io are notifications pertaining to your order.</p>
							</div>
						</div>
						<div class="sec-bdr">
							<div class="col-sm-12 padd-0">
								<h2>Payment Security and Refund Options</h2>
								<h3><span class="number-bg">1</span>Payment Security</h3>
								<p>Your money is not released during the trade process until you have confirmed successful delivery of the order. Once confirmed, TERANEX will release payment to the supplier. All of your information will be safely encrypted.</p>
								<h3><span class="number-bg">2</span>Full Refund</h3>
								<p>If the supplier doesn't ship your order on time, or if you don't receive it and it is determined to be the fault of the supplier, you'll get your payment returned directly.</p>
								<h3><span class="number-bg">3</span>Partial Refund & Keeping Products</h3>
								<p>If the products you receive are significantly different from the product requirements agreed on within the contract, you may choose to receive a partial refund and keep the products.</p>
							</div>
						</div>
						<div class="sec-bdr">
							<div class="col-sm-12 padd-0">
								<h2>We support the following payment methods:</h2>
								<img class="img-responsive" style="padding: 10px 0;" src="https://img.alicdn.com/tps/i1/TB1w66FGVXXXXX_apXXszvo1pXX-1105-41.png" />
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

<?php echo $this->template->contentEnd(); ?> 