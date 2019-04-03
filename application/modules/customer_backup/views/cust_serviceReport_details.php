<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Customer Service Report Details</li>
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
    <!-- <div class="col-sm-8 col-lg-10">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="col-md-9 col-sm-9 col-xs-12 ">  
	<!-- <?php 	// display messages
		if(hasFlash("dataMsgServiceRequestError"))	{	?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgServiceRequestError"); ?>
			</div>
<?php }	if(hasFlash("dataMsgAddError"))	{	?>
			<div class="alert alert-danger alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgAddError"); ?>
			</div>
<?php }	?>
  -->
  <a href="<?php echo site_url()."customer/create_service_report"; ?>" class="btn btn-primary">Create Service Report</a>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC">
						<th>Sr.No.</th> 
						<th>Service Type</th>  
						<th>CSR No.</th>  
						<th>Service Date</th> 
						<th>Customer Name</th> 
						<th>Service Rendered</th>
						<th>Service Time</th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$i=1;
					foreach($serviceReport as $rowData){ ?>
					<tr>
						<td><?=$i++?></td>  
						<td><?php if($rowData['services']){ echo "Remote On Remand"; 
						}else if($rowData['services']){
							
						} ?></td>  
						<td><?=$rowData['csr_no']?></td>  
						<td><?=$rowData['serviceDate']?></td>  
						<td><?=$rowData['cust_name']?></td>  
						<td><?=$rowData['servicerender']?></td>  
						<td><?=$rowData['rendertime']?></td>
					</tr>
					<? }?>
				</tbody>
			</table>
</div> 
<!-- /.row --> 
	  
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 