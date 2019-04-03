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
	<div class="bg_white"  style="min-height:555px;">

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
		<div class="col-xs-12"> 
		<a href="<?php echo site_url()."customer/spare_part_requests"?>" class="btn btn-xs pull-right btn-primary">Back</a>
			<?php foreach($orderDetails as $row){ ?>
				
				<div class="col-sm-12" >
				<p><b>Request On: </b><?php 	$phpdate = strtotime($row['created_on']);echo $mysqldate = date( 'd-m-Y H:i:s', $phpdate ); ?></p>
				
				<p><b>Description:</b> <?php echo $row['description']; ?></p>
				<div class="col-sm-12">
					<div class="col-xs-3">
					<img src="<?php echo base_url()."uploads/training_service_images/".$row['spare_req_images']; ?>" class="img-responsive" >
					</div>
				</div>
				</div>
				
			
		<? } ?>
		<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div> 
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	</div>
	</div>

<!-- /.row -->  

<?php $this->template->contentBegin(POS_BOTTOM);?>


<?php $this->template->contentEnd();	?> 