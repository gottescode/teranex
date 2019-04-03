<div class="container-fluid myprofile-bg dahboard-bg">

  <div class="container">

    <div class="col-sm-6 padd-0">

      <ul>

        <li class="myprofile">Laser Processing Supplier Details</li>

      </ul>

    </div>
    <div class="col-sm-6 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>

  </div>

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

<div class="row margin_0" style="background-color: #353537;">

<?php   $this->load->view("cust_side_menu" ); ?>

	<div class="bg_white"> 

		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  

			<form id="" name="" class=="form-horizontal" type="multipart/form-data">

				<h3>Part for RFQ:</h3>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Part Name:</label>

						<div class="col-sm-8">

							<?php echo $result['part_name']; ?>

						</div>

					</div>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Material Type:</label>

						<div class="col-sm-8">

							<ul>

							<?php foreach($materialList as $key=>$value) { ?>

								<li><?php echo $value['type_name']; ?> </li>

							<?php } ?>

							</ul>

						</div>

					</div>

					<div class="form-group col-sm-12 checkbox">

						<label class="col-sm-4 contact-label-text">Application(s) Required:</label>

						<div class="col-sm-8 top_10">		

							<ul>

								<?php foreach($applicationList as $key=>$value) { ?>

									<li><?php echo $value['type_name']; ?> </li>

								<?php } ?>

							</ul>

							<!-- <select class="form-control" id="application_required" name="application_required[]" multiple="multiple">

								<option value="">Select Material Type</option>

								<?php foreach($application_required as $rowData) { ?>

									<option value="<?php echo $rowData['aid']; ?>"><?php echo $rowData['type_name']?></option>

								<? } ?>

							</select> -->

						</div>

					</div>

					<hr class="hr-rfq">



					<h3>Attach Drawings:</h3>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Attach Drawings:</label>

						<div class="col-sm-4 top_10">

						<?php if($result['attach_drawing']!=''){?>

						<img src = "<?=base_url()."uploads/rfq_application/".$result['attach_drawing']; ?>" class="img-responsive"/>

						<?php }?>

						</div>

					</div>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Part Description:</label>

						<div class="col-sm-8">

							<?php

								echo $result['part_description'];

							?>

						</div>

					</div>

					<hr class="hr-rfq">



					<h3>Non-Disclosure Agreement</h3>



					<div class="form-group col-sm-12 checkbox">

						<label class="col-sm-4 contact-label-text">Specify NDA:</label>

						<div class="col-sm-8 mar-t-10 profile-checkbox-label">

							<label><input type="checkbox" disabled="disabled" value="N"<?php if($result['no_nda_equired']=='N'){ echo "Checked";}?>>No NDA Required (Allow suppliers to view and quote on the RFQ) </label></br>

							<label><input type="checkbox" disabled="disabled" value="Y"<?php if($result['no_nda_equired']=='Y'){ echo "Checked";}?>>NDA Required (Suppliers must sign NDA before viewing and quoting on this RFQ)</label>

						</div>

					</div>

					<hr class="hr-rfq">



					<h3>Timeline</h3>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Quotes Needed By:</label>

						<div class="col-sm-4">

							<?php echo $result['quotes_needed_by']; ?>

						</div>

					</div>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Work Will Be Awarded By:</label>

						<div class="col-sm-8">

							<?php echo $result['work_will_awarded']; ?>

						</div>

					</div>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Program Needed By:</label>

						<div class="col-sm-8">

							<?php echo $result['program_needed']; ?>

						</div>

					</div>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Quote Quantity:</label>

						<div class="col-sm-8">

							<?php echo $result['quote_quantity']; ?>

						</div>

					</div>

					<div class="form-group col-sm-12">

						<label class="col-sm-4 contact-label-text">Invite Suppliers I know:</label>

						<div class="col-sm-8">

							<?php echo $result['suplr']; ?>

						</div>

					</div>

		  

				<div class="form-group">

				<center>

				<?php   if( $result['supplier_id']!='0'){  }else{?>

					<a class="btn btn-success" href="<?php echo site_url()."customer/customerRequestsRfqForLaserprocessingAccept/".$drrs_id; ?>" >Generate Quotation</a>

					<a class="btn btn-danger" href="<?php echo site_url()."customer/customerRequestsRfqForLaserprocessingReject/".$drrs_id; ?>" >Reject</a>

				<?php }?>

				</center>

				</div>

			</form>
		</div><div class="clearfix"></div>
	</div>
</div> 

	 

<?php $this->template->contentBegin(POS_BOTTOM);?>

<script language="javascript" type="text/javascript">

</script>

<?php $this->template->contentEnd();	?> 