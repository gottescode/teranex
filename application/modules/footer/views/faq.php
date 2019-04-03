<style type="text/css">

</style>
<div class="container">
    <center><h1>FAQ</h1></center>
    <div class="col-sm-12 rfq_works1 padd-0">
    	<div class="col-sm-10 pading_left_0">
    	<h3>How it works ?</h3>
    	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
		  	<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingOne">
			      	<h4 class="panel-title">
			        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">#1 Login to TeraneX</a>
			      	</h4>
			    </div>
			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
			      	<div class="panel-body">
			       		<p>Login to TeraneX</p>
			      	</div>
			    </div>
		  	</div>
		  	<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingTwo">
			      	<h4 class="panel-title">
			        	<a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">#2 Submit RFQ </a>
			      	</h4>
			    </div>
			    <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
			      	<div class="panel-body">
			      		<div class="securePayment securePayment_rfq">
							<ul class="step-item-box">
							  <li class="util-left step-item" id="li_0" cust-id="0">
							  	<div class="step-label"> 1</div>
							  	<div class="step-item-title">Invite Request</div>
							  </li>
							  <li class="util-left step-item" id="li_1" cust-id="1">
							  <div class="step-label"> 2</div>
							  <div class="step-item-title">Processing Request</div>
							  </li>
							  <li class="util-left step-item" id="li_2" cust-id="2">
							  <div class="step-label"> 3</div>
							  <div class="step-item-title">Invite Supplier Quotations</div>
							  </li>
							  <li class="util-left step-item" id="li_3" cust-id="3">
							  <div class="step-label"> 4</div>
							  <div class="step-item-title">Awarding</div>
							  </li>
							  <li class="util-left step-item last" id="li_4" cust-id="4">
							  <div class="step-label"> 5</div>
							  <div class="step-item-title">Closing</div>
							  </li>
							</ul>
						</div>
			      	</div>
			    </div>
		  	</div>
		  	<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="headingThree">
			      	<h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseThree" aria-expanded="false" aria-controls="collapseThree">#3 Compare Quotes</a>
			      	</h4>
			    </div>
			    <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
			      	<div class="panel-body">
			        	<p>Compare Quotes</p>
			      	</div>
			    </div>
		  	</div>
		  	<div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="heading4">
			      	<h4 class="panel-title">
			        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse4" aria-expanded="false" aria-controls="collapseThree">#4 Contact Supplier</a>
			      	</h4>
			    </div>
			    <div id="collapse4" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading4">
			      	<div class="panel-body">
			        	<p>Contact Supplier</p>
			      	</div>
			    </div>
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
	
//
	$(document).ready(function () { var elStep = $('.mod-sp-flow .step-item'); elStep.on('mouseenter', function () { var i, index = $(this).index(); elStep.removeClass('cur-prev').eq(index - 1).addClass('cur-prev'); }).on('mouseleave', function () { elStep.removeClass('cur-prev'); }); });  
</script> 

<?php echo $this->template->contentEnd();	?> 