 

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

 

<div class="row margin_0" style="background-color: #353537;">
<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="bg_white">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  
				<?php 	// display messages

					if(hasFlash("dataMsgAddError"))	{	?>

						<div class="alert alert-warning alert-dismissible" role="alert">

						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

						  <?php echo getFlash("dataMsgAddError"); ?>

						</div>

				<?php }	?>
			<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;"> 
				<form class="form" name="qoutationAdd" id="qoutationAdd" method="post" action="" enctype="multipart/form-data">

					<div class="form-group">
						<label>No Of Hours</label>
						<input type="text" class="form_bor_bot numbersOnly" id="number_of_hours" name="number_of_hours" placeholder="Number of Hours"  value="<?php echo $result['number_of_hours']?>" /><span class="compulsary">*</span>

					</div>

					<div class="form-group">
					<label>Lead Time</label>
						<input type="text" class="form_bor_bot numbersOnly" id="lead_time" name="lead_time" placeholder="Lead Time"   value="<?php echo $result['lead_time']?>"/>

					</div><div class="clearfix"></div>

					<div class="form-group ">
						<label>Program Description</label>
						<textarea class="form_bor_bot  " id="program_description" name="program_description" placeholder="Program Description" ><?php echo $result['rfq_description']?></textarea> 

					</div>
					<div class="form-group ">
   					<label>Amount</label>
						<input type="text" class="form_bor_bot numbersOnly" id="tax_rate" name="tax_rate" placeholder="Amount"   value="<?php echo $result['tax_rate']?>"/> 

						<input type="hidden" name="old_document"  value="<?php echo $result['sample_product_drawing']?>"/> 

					</div>

					<div class="form-group">

                    <label>Download Attachment</label>
					</div><div class="clearfix"></div>

					    <?php
                                    if ($result['sample_product_drawing'] != '') {
                                        echo "<a href='" . site_url() . "uploads/rfq_application/" . $result['sample_product_drawing'] . "' target='_blank'>Click Here</a>";
                                    }
                                    ?>

					 <div class="clearfix"></div>
					 <div class="form-group">

                     <label>Download Quotation</label>
					</div><div class="clearfix"></div>

					    <?php
                                    if ($result['uploaded_quotation'] != '') {
                                        echo "<a href='" . site_url() . "uploads/cnc_machining_uploaded_quotation/" . $result['uploaded_quotation'] . "' target='_blank'>Click Here</a>";
                                    }
                                    ?>

					 <div class="clearfix"></div>

					 <div class="clearfix"></div>
					<div class="form-group col-sm-12 col-xs-6">
                                            <a href="<?=site_url()."customer/RapidSupplierListAcceptBycustomer/".$result['drrs_id']?>" class="btn btn-success">Accept Quotation</a><br>
                                            <br>
                                            <a href="<?=site_url()."customer/RapidSupplierListAcceptByreject/".$result['drrs_id']?>" class="btn btn-danger">Reject Quotation</a>

					 
					</div>
				</form>
			</div>
		</div>
		<div class="clearfix"></div>
	</div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?> 

<!-- <script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  --> 

<script>   
jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
$("#qoutationAdd").validate({

   rules: {  

				number_of_hours:{

					required:true

				},

	 

			},

			messages: { 

				number_of_hours:{

					required:"Please enter number of hours"

				}, 

			}

		}); 

</script>

<?php $this->template->contentEnd();	?> 