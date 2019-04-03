<style type="text/css">

</style>

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


<div class="container">
    <center><h1>Service Providers</h1></center>
    <div class="col-sm-12 rfq_works1 padd-0">
    	<div class="col-sm-10 pading_left_0">
	    	<h3></h3>
	    	<div class="border_bot col-md-12 col-sm-12 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:;">
          		<form class="form-horizontal" name="service_providers" id="service_providers" method="post" action="">
	             	<div class="form-group ">
	                  	<input type="text" class="form_bor_bot" id="provider_name" name="provider_name" placeholder="Provider Name"><span class="compulsary">*</span>
	                </div>
	                <div class="form-group">
	                  	<input type="text" class="form_bor_bot" id="company_name" name="company_name" placeholder="company name"><span class="compulsary">*</span>
	                </div>
	                <div class="form-group">
                   		<textarea rows="4" cols="50" name="company_address" id="company_address" class="form_bor_bot" placeholder="company address"></textarea><span class="compulsary">*</span>
	                </div>
	              	<div class="form-group col-sm-12 text-center">
	            	  	<center><input type="submit" name="btnServiceProvider" id="submit" class="btn input-form contact-submit btn_orange" value="Submit"></center>
	              	</div>
          		</form>
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
 <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>
	$("#service_providers").validate({
   rules: {  
        provider_name:{
          required:true
        },
        company_name:{
          required:true
        },
        company_address:{
          required:true
        },
      },
      messages: { 
        provider_name:{
          required:"Please enter Provider name"
        },
        company_name:{
          required:"Please enter Company Name"
        },
        company_address:{
          required:"Please enter address"
        },
      }
    }); 

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