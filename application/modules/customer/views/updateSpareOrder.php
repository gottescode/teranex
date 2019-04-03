 <?php $this->template->contentBegin(POS_TOP);?> 

 <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">

 <?php $this->template->contentEnd();	?> 

<div class="container-fluid myprofile-bg dahboard-bg">

  <div class="container">

    <div class="col-sm-4 padd-0">

      <ul>

        <li class="myprofile">Spare Order Details</li>

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

		<li><?=$course_data['name']?></li>

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

<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?>
	<div class="bg_white">

	<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  

		<?php 	// display messages

		if(hasFlash("dataMsgWizSuccess"))	{	?>

			<div class="alert alert-success alert-dismissible" role="alert">

			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			  <?php echo getFlash("dataMsgWizSuccess"); ?>

			</div>

		<?php }

		if(hasFlash("dataMsgWizError"))	{	?>

			<div class="alert alert-warning alert-dismissible" role="alert">

			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			  <?php echo getFlash("dataMsgWizError"); ?>

			</div>

		<?php }	?>
			<div class="border_bot">
			<a href="<?=site_url()."customer/spare_part_requests"?>" class="btn pull-right btn-xs btn-primary">Back</a>
			<form class="form-horizontal" role="form" action="#" id="course_form" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label class="control-label col-sm-3" for="datepicker">Title:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="title" id="title" class="form_bor_bot required" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="datepicker">Description:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="description" id="description" class="form_bor_bot required" value="">
						</div>
					</div>
					<input type="hidden" name="id" value="<?php echo $spare_req_id?>"  > 
					<center>
						<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary btn_orange">  
					</center>
</div>

				  </div>

				</fieldset>

			</form>
		
	 
		<h3>Delivery Tracking Details</h3>			
			<div class="table-responsive">
									<table class="table table-bordered table-striped" id="consultant_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Title</th>  
												<th>Description</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
											if($deliveryTrackingDetails>0){ $i=1;
												foreach($deliveryTrackingDetails as $row){
										?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$row['title']?></td>
													<td><?=$row['description']?></td>
												</tr>
											<?php }
											}
											?>

										</tbody>
									</table>  
								</div>
								<center>
									<a href="<?=site_url()."customer/closeOrder/".$spare_req_id;?>" class="btn btn-danger">Close Order</a>
								</center>
														
						
	</div> <div class="clearfix"></div>
	</div>	</div>
</div>

<!-- /.row -->  

<?php $this->template->contentBegin(POS_BOTTOM);?>


<?php $this->template->contentEnd();	?> 