<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/securepayment-bnr.jpg" alt=" ">
<div class="container padd-top securePayment">
	<div class="col-sm-12 padd-0"><br/>
		<div class="col-sm-10 pading_left_0">
			<div class="sec-bdr">	
				<div class="col-sm-12">
					<h2>What is Secure Payment service?</h2>
					<p>Stelmac promises utmost security for all private and financial data via secure end-to-end encryption. Payment to the supplier is not released until successful closure of an order, which requires confirmation from the buyer.</p>
				</div>
			</div>
			<div class="sec-bdr">
				<div class="col-sm-12">
					<h2>How does it work?</h2>
					<p>Stelmac’s secure payment service offers fast, easy and safe online processing. Payments can be made via net banking, debit card or credit card.</p>
					<ul class="step-item-box">
					  <li class="util-left step-item" id="li_0" cust-id="0" data-toggle="tooltip" data-placement="bottom" title="Buyer selects a product & places an order. An email intimation regarding the transaction is sent to the buyer & seller simultaneously.">
					  <div class="step-label"> 1</div>
					  <div class="step-item-title">Order Placed</div>
					  </li>
					  <li class="util-left step-item" id="li_1" cust-id="1" data-toggle="tooltip" data-placement="bottom" title="The buyer makes the payment securely via any one of the options available on Stelmac.">
					  <div class="step-label"> 2</div>
					  <div class="step-item-title">Payment Processed</div>
					  </li>
					  <li class="util-left step-item" id="li_2" cust-id="2" data-toggle="tooltip" data-placement="bottom" title="Once the supplier ships the order, an email is sent to the buyer with the shipping date and expected delivery date.">
					  <div class="step-label"> 3</div>
					  <div class="step-item-title">Order Shipped</div>
					  </li>
					  <li class="util-left step-item" id="li_3" cust-id="3" data-toggle="tooltip" data-placement="bottom" title="Once the buyer receives the product, the seller is also informed and the buyer has 3 business days to close the order and mark it as complete on Stelmac.io. ">
					  <div class="step-label"> 4</div>
					  <div class="step-item-title step4">Order Delivered</div>
					  </li>
					  <li class="util-left step-item last" id="li_4" cust-id="4" data-toggle="tooltip" data-placement="bottom" title="Once the buyer has updated the order status as complete, Stelmac will release the payment to the supplier in 3 business days.">
					  <div class="step-label"> 5</div>
					  <div class="step-item-title step4">Payment Released</div>
					  </li>
					</ul>
					<p>Tips: Stelmac will send Email notifications to the buyer and supplier at every step of the process. Please be aware that emails from: transaction@notice.Stelmac.io are notifications pertaining to your order.</p>
				</div>
			</div>
			<div class="sec-bdr">
				<div class="col-sm-12">
					<h2>Payment Return & Refund Options</h2>
					<h3><span class="number-bg">1</span>Payment Security</h3>
					<p>Your money is not released during the trade process until you have confirmed successful delivery of the order. Once confirmed, Stelmac will release payment to the supplier. All of your information will be safely encrypted.</p>
					<h3><span class="number-bg">2</span>Full Refund</h3>
					<p>If the supplier doesn't ship your order on time, or if you don't receive it and it is determined to be the fault of the supplier, you'll get your payment returned directly.</p>
					<h3><span class="number-bg">3</span>Partial Refund & Keeping Products</h3>
					<p>If the products you receive are significantly different from the product requirements agreed on within the contract, you may choose to receive a partial refund and keep the products.</p>
				</div>
			</div>
			<div class="sec-bdr">
				<div class="col-sm-12">
					<h2>We support the following payment methods:</h2>
					<img class="img-responsive" style="padding: 10px 0;" src="https://img.alicdn.com/tps/i1/TB1w66FGVXXXXX_apXXszvo1pXX-1105-41.png" />
				</div>
			</div>
		</div>
		<div class="col-sm-2 padd-0">
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
</div>



<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script>

 $(".step-item").mouseover(function(){
	 $(".util-left").each( function(i,item){
		$(item).removeClass('cur-prev');
	});
	 if($(this).attr('cust-id')>0){
		var cust_id = 	 $(this).attr('cust-id');
		var final_id = parseInt(cust_id)-1;
		$('#li_'+final_id).addClass("cur-prev");
	 }
    });
 $(".step-item").mouseout(function(){
        $(".step-item").removeClass("cur-prev");
    });
	
</script>
<script> $(document).ready(function () { var elStep = $('.mod-sp-flow .step-item'); elStep.on('mouseenter', function () { var i, index = $(this).index(); elStep.removeClass('cur-prev').eq(index - 1).addClass('cur-prev'); }).on('mouseleave', function () { elStep.removeClass('cur-prev'); }); });  </script> 

<script>
$(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip();   
});
</script>
<?php echo $this->template->contentEnd();	?> 