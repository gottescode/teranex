
<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/hepldesk-bnr.jpg" alt=" ">
</div>
<div class="container">
    <div class="col-sm-offset-3 col-sm-6 helpcenter_search">
    	<center><h1>Help Center</h1></center>
    	<form class="search-padd" role="search">
	        <div class="col-sm-12 input-group">
	            <input type="text" class="form-control input-form search-go" placeholder="Search" name="q">
	            <div class="input-group-btn">
	                <button class="btn btn-default search-go" type="submit"><span><i class="fa fa-search"></i></span></button>
	            </div>
	        </div>
        </form>
    </div>
    <div class="clearfix"></div><br/>
    <div class="col-sm-12 padd-0">
    	<div class="col-sm-10 padd-0">
		    <div class="col-sm-4 padd-0">
				<div class="panel-group helpcenter_menu" id="accordion" role="tablist" aria-multiselectable="true">
				  	<div class="panel panel-default">
				  		<?php $i = 0; foreach($category_list as $rowCat) { ?>
				  			<?php//  print_r($rowCat['helpcenter_category_id'][0]);exit; ?>
					    <div class="panel-heading" role="tab" id="headingOne">
					      	<h4 class="panel-title">
					        	<a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $rowCat['helpcenter_category_id'] ?>" aria-expanded="true" aria-controls="collapseOne" data-assigned-id="<?php echo $rowCat['helpcenter_category_id'] ?>" onclick="updateClick(this)"><?php echo $rowCat['helpcenter_category_name'] ?></a>
					      	</h4>
					    </div>
					    <div id="collapse<?php echo $rowCat['helpcenter_category_id'] ?>" 
					    	<?php  if ($i == 0) { ?>  class="panel-collapse collapse in" <?php  } else { ?>  class="panel-collapse collapse" <?php } ?>role="tabpanel" aria-labelledby="headingOne">

					     <?php foreach($subcat_list as $rowSubCat) { 
					     	 if($rowSubCat['helpcenter_category_id'] == $rowCat['helpcenter_category_id']) { ?>
					      	<div class="panel-body">
					      		<ul class="nav nav-tabs helpcenter_submenu">
					      			 <?php if($rowSubCat['helpcenter_category_id'] == '1'){ ?> <li class="active"><?php  } else { ?> <li> <?php } ?>
					            <a href="<?php echo site_url()?>helpcenter/<?php echo $rowSubCat['sub_cat_id'] ?>"><?php echo $rowSubCat['sub_cat_name'] ?></a></li>
					      			
					      		</ul>
					      	</div>
					      <?php } } ?>
					    </div>
					   	  
					      <?php $i++; }  ?>
				  	</div>
				</div>
		    </div>
		    <div class="col-sm-8 padd-0">
		    	<div class="tab-content helpcenter_info">
		    		<div class="tab-pane fade in active">
		    			
			    		<div class="helpcenter-heading">
							<p class="padd_5"><?php echo $helpcenter_list['sub_cat_name'] ?></p>
						</div>
						<p><?php echo html_entity_decode($helpcenter_list['sub_cat_description']); ?></p>
			    	
		    		</div>
		    		
		    	</div>
		    </div>
		    <div class="col-sm-12 padd-0">
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
	        </div><br/>
      	</div>
    </div>
</div>

<!-- <script type="text/javascript">
    function updateClick(element) {
    var id = $(element).data('assigned-id');
   //alert(id);
     $.ajax({

           	type: "POST",
			url: "<?php echo base_url(); ?>" + "helpcenter/index/" +id,
			dataType: 'json',
			data: {id: id},
			success: function(res) {

				alert(res);
			}


        });
}

</script> -->

