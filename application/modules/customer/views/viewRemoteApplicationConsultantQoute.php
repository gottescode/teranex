<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
		<ul>
			<li class="myprofile">Quotation</li>
		</ul>
    </div>
    <div class="col-sm-8 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <!-- <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="">
  	<div class=" row-flex">
		<?php   $this->load->view("cust_side_menu" );  ?> 
		<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">   
				<form class="form" name="qoutationAdd" id="traineeAdd" method="post" action="" enctype="multipart/form-data">
					<div class="form-group">
						<label>Number Of Hours :</label> <?php echo $result['number_of_hours']?>
					</div>
					<div class="form-group">
						<label>Lead Time : </label> <?php echo $result['lead_time']?> 
					</div><div class="clearfix"></div>
					<div class="form-group ">
						<label>Program Description :</label> <?php echo $result['program_description']?> 
					</div>
				 
					 <div class="clearfix"></div>
					<div class="form-group ">
					<label>Tax Rate :</label> <?php echo $result['tax_rate']?> 
						 
						<input type="hidden" name="old_document"  value="<?php echo $result['sample_product_drawing']?>"/> 
					</div>
					 <div class="clearfix"></div>
					 
					
					<div class="form-group">
                    <label>Download Attachment</label>
					</div>

					<div class="clearfix"></div>
					    <?php
                                    if ($result['sample_product_drawing'] != '') {
                                        echo "<a href='" . site_url() . "uploads/rfq_application/" . $result['sample_product_drawing'] . "' target='_blank'>Click Here</a>";
                                    }
                        ?>

					 <div class="clearfix"></div>
					 <div class="form-group">
						 <label>Download Quotation</label>
					</div>
					<div class="clearfix"></div>

					    <?php
                                    if ($result['uploaded_quotation'] != '') {
                                        echo "<a href='" . site_url() . "uploads/remote_application_uploaded_quotation/" . $result['uploaded_quotation'] . "' target='_blank'>Click Here</a>";
                                    }
                        ?>

					 <div class="clearfix"></div>
					<div class="form-group col-sm-12 col-xs-6">
                                            <a href="<?=site_url()."customer/RemoteApplicationSEQuotationAcceptBycustomer/".$result['racrp_id']?>" class="btn btn-success">Accept Quotation
                                            </a><br>
                                            <br>
                                            <a href="<?=site_url()."customer/RemoteApplicationSEQuotationAcceptByreject/".$result['racrp_id']?>" class="btn btn-danger">Reject Quotation
                                            </a>

					 
					</div>
				<!-- 	<div class="form-group col-sm-12 col-xs-6">
					   <center><a href="<?=site_url()."customer/remoteApplicationConsultantListAcceptByCustomer/".$result['racrp_id']."/$result[rpr_id]"?>" class="btn btn-success">Accept</a> &nbsp; &nbsp;  </center>
					</div>  -->

				</form>
		</div>
	</div>
	<!-- /.row --> 
	<div class="clearfix"></div><br/>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<?php $this->template->contentEnd();	?> 