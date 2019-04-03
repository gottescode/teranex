 <?php $this->template->contentBegin(POS_TOP);?> 

 <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">

 <?php $this->template->contentEnd();	?> 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Schedule Class  List</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 

</div>

<!-- /.myprofile-bg dahboard-bg -->

<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
		<li><?=$course_data['name']?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
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
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC">
						<td>S.No</td> 
						<td>Quotations</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>
				<?php
				foreach($supplierData as $row){ ?>					
					<tr>
						<td><?php print_r($row);?></td> 
						<td><?php print_r($row);?></td> 
						<td>
						<?php if($row['supplier_status']=='H'||$row['supplier_status']=='R'){ ?><a href="<?=site_url()."customer/sendGroupbuyingQuotation/".$row['id']."/".$row['admin_rfq_id']?>" class="btn btn-success"> Send Quotation</a><? }else{
							echo "Quotation Sent";
						} ?></td>
					</tr>
				<?php } ?>
				</tbody>
			</table>

		</div>
	<div class="clearfix"></div>
	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<?php $this->template->contentEnd();	?> 