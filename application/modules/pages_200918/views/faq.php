<style type="text/css">

</style>
<div class="container">
    <center><h1>FAQ</h1></center>
    <div class="col-sm-12 rfq_works1 padd-0">
    	<div class="col-sm-10 pading_left_0">
      	<h3>How it works ?</h3>
      	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
      		<?php foreach($faq_list as $rowFaq){ ?>
  		  	 <div class="panel panel-default">
  			    <div class="panel-heading" role="tab" id="headingOne">
  			      	<h4 class="panel-title">
  			        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne"><?php echo $rowFaq['faq_question'] ?></a>
  			      	</h4>
  			    </div>
  			    <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
  			      	<div class="panel-body">
  			       		<p><?php echo $rowFaq['faq_answer'] ?></p>
  			      	</div>
  			    </div>
  		  	</div>
  		  	<?php } ?>
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