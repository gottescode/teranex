<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Machine Order Details </li>
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
<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="col-md-10 col-sm-12 col-xs-12 supplier-form">  
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
			<div class="col-sm-12">
			<?php if($orderDetails['nda']=='Y'){?>
				<div class="col-sm-12">
					<h3>NDA: </h3>
			<?php if($orderDetails['customer_nda_status']!='Y'){ ?>
				<form class="form-horizontal" role="form" action="" id="course_form" method="post" enctype="multipart/form-data">
					<div class="form-group">
							<label class="control-label col-sm-3" for="Title">Upload NDA : <span class="star">*</span></label>
							<div class="col-sm-6">
							<input type="file" class="form-control-file" name="customer_nda" id="exampleFormControlFile1">
						</div>
					</div>
					<div class="form-group"> 
						<div class="col-sm-offset-3">
							<input type="submit" name="btnSubmitnda" value="Submit" class="btn btn_orange">  
						</div>
					</div>
				</form>
			<?php } ?>
				<div class="col-sm-3">
				<div class="col-sm-3">
					<a href="<?=base_url()."uploads/machine_order/".$orderDetails['supplier_nda'];?>" target="_blank"><i class="fa fa-download fa-3x" aria-hidden="true"></i>supplier_nda_<?=$orderDetails['supplier_nda'];?></a>
					<?php if($orderDetails['customer_nda']){ ?>
					
					<a href="<?=base_url()."uploads/machine_order/".$orderDetails['customer_nda'];?>" target="_blank"><i class="fa fa-download fa-3x" aria-hidden="true"></i>customer_nda_<?=$orderDetails['customer_nda'];?></a>
					<? } ?>
				</div>
				
				</div>
					<?
						
						}
					?>
				</div>
				<hr/>
				<div class="col-sm-12">
					<h3>Quote: </h3>
					<?php if($orderDetails['quote']==='Y'){
					?>
					
				<div class="col-sm-3">
					<a href="<?=base_url()."uploads/machine_order/".$orderDetails['supplier_quote'];?>" target="_blank"><i class="fa fa-download fa-3x" aria-hidden="true"></i>quote_<?=$orderDetails['supplier_quote'];?></a>
				</div>
					<? } ?>
				
			
				</div>
				<hr/>
				<div class="col-sm-12">
					<h3>Offer: </h3>
					<?php if($offerList){ ?>
					<?
						$count=1;
						foreach($offerList['result'] as $row){
							?>
						<div class="col-sm-3">
							<b><p> Offer <?=$count;?> </p></b>
							<a href="<?=base_url()."uploads/machine_order/".$row['offer'];?>" target="_blank"><i class="fa fa-download fa-3x" aria-hidden="true"></i>offer_<?=$row['offer'];?></a>
						</div>
 					<?
							$count++;
						}
					?>
			<? } ?>
				</div>
				<hr/>
				<div class="col-sm-12">
					<h3>Purchase Order From Customer: </h3>
			<?php if($orderDetails['customer_nda_status']!='Y'){ ?>
					<form class="form-horizontal" role="form" action="" id="course_form" method="post" enctype="multipart/form-data">
						<div class="form-group">
								<label class="control-label col-sm-3" for="Title">Upload PO : <span class="star">*</span></label>
								<div class="col-sm-6">
								<input type="file" class="form-control-file" name="customer_purchase_order" id="customer_purchase_order">
							</div>
						</div>
						<div class="form-group"> 
							<div class="col-sm-offset-3">
								<input type="submit" name="btnSubmitpo" value="Submit" class="btn btn_orange">  
							</div>
						</div>
					</form>
					<?php } ?>
			<?php if($orderDetails['purchase_order']==='Y'){ ?>
				<div class="col-sm-3">
					<a href="<?=base_url()."uploads/machine_order/".$orderDetails['customer_purchase_order'];?>" target="_blank"><i class="fa fa-download fa-3x" aria-hidden="true"></i>PO_<?=$orderDetails['customer_purchase_order'];?></a>
				</div>
			<? } ?>
				</div>
				<hr/>
				<div class="col-sm-12">
					<h3>Sales Order Confirmation: </h3>
					<?php if($orderDetails['soc']!='Y'){ ?>
					<? } ?>
			<?php if($orderDetails['soc']==='Y'){ ?>
					<div class="col-sm-3">
						<a href="<?=base_url()."uploads/machine_order/".$orderDetails['supplier_soc'];?>" target="_blank"><i class="fa fa-download fa-3x" aria-hidden="true"></i>SOC_<?=$orderDetails['supplier_soc'];?></a>
					</div>
			<? } ?>
			
			<?php if($orderDetails['warrenty']==='Y'){ ?>
					<div class="col-sm-12">
					<hr/>
						<h3>Warrenty Details</h3>
						<p>
						<div class="form-group">
								<label class="" for="Title">Warrenty From : <span class="star">*</span></label>
								<div class="">
								 <input type="text" class=" datepicker" name="machine_warrenty_start_date" id="machine_warrenty_start_date" value="<?php if($orderDetails['machine_warrenty_start_date']){
									 echo date_ymd($orderDetails['machine_warrenty_start_date']);
								 }?>">
							</div>
						</div>
						<div class="form-group">
								<label class="control-label col-sm-3" for="Title">Warrenty Till : <span class="star">*</span></label>
								<div class="">
								<input type="text" class="datepicker" name="machine_warrenty_end_date" id="machine_warrenty_end_date"value="<?php if($orderDetails['machine_warrenty_end_date']){
									 echo date_ymd($orderDetails['machine_warrenty_end_date']);
								 }?>">
							</div>
						</div>
						</div>
					<? } ?>
				</div>
			</div>
		</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php $this->template->contentEnd();	?> 