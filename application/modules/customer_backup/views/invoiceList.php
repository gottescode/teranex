 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Invoice List</li>
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
<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 bg_white"> 
		 
			<?php 	// display messages
				if(hasFlash("dataMsgAddError"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgAddError"); ?>
					</div>
				<?php }	?>
				<?php   
					if($eventInvoceList)
					{
					?>
					<h3>Event List and Payment Status</h3>
					<table id='' class="table table-striped table-hover">
						<thead>
							<tr bgcolor="#CCCCCC"><td>S.No</td><td> Event Name</td><td>Pay Amount</td><td>TrascationId</td>  <td>Pay Date</td>  <td>Status</td><td>Action</td></tr>
						</thead>
						<tbody>
								<?php
								$SNo = 1;
								foreach($eventInvoceList  as $rowData)
								{
									?>
									<tr>
										<td><?php echo $SNo;?></td>
										<td><?php echo $rowData['event_name'];?></td> 
										<td><?php echo $rowData['pay_amount'];?></td>  
										<td><?php echo $rowData['trascationId'];?></td>  
										<td><?php echo $rowData['pay_date'];?></td> 
										<td><?php echo $rowData['paymentStatus'];?></td> 
										<td><?php if($rowData['paymentStatus']){?><a class="btn btn-primary btn-xs">Download Invoice</a><?php }?></td> 
									</tr>
									<?
									$SNo ++;
								}
							?>
						</tbody>
					</table>
				<?php
				}
				?>
			<?php   
				if($courseInvoceList)
				{
				?>
					<h3>Course List and Payment Status</h3>
					<table id='' class="table table-striped table-hover">
						<thead>
							<tr bgcolor="#CCCCCC"><td>S.No</td><td> Event Name</td><td>Pay Amount</td><td>TrascationId</td>  <td>Pay Date</td>  <td>Status</td><td>Action</td></tr>
						</thead>
						<tbody>
								<?php
								$SNo = 1;
								foreach($courseInvoceList  as $rowData)
								{
									?>
									<tr>
										<td><?php echo $SNo;?></td>
										<td><?php echo $rowData['name'];?></td> 
										<td><?php echo $rowData['pay_amount'];?></td>  
										<td><?php echo $rowData['trascationId'];?></td>  
										<td><?php echo $rowData['pay_date'];?></td> 
										<td><?php echo ucwords($rowData['paymentStatus']);?></td> 
										<td><?php if($rowData['paymentStatus']=='success'){?><a class="btn btn-primary btn-xs">Download Invoice</a><?php }?></td> 
									</tr>
									<?
									$SNo ++;
								}
							?>
						</tbody>
					</table>
				<?php
				}
				?>
		</div> 
		<div class="clearfix"></div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 