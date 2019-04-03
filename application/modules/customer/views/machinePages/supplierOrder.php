<?php $this->template->contentBegin(POS_TOP);?>
<?php echo $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Machine Order List</li>
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
<div class="welcome-j-bg">
  	<div class="container">
	    <!-- <div class="col-sm-8 col-lg-10 padd-0">
	      <ul>
	        <li class="">Welcome <? echo ucwords($_SESSION['u_name']);?></li>
	      </ul>
	    </div>
	    <div class="col-sm-4 col-lg-2 padd-0">
	      <ul>
	        <li class=""><a href="<?php echo site_url();?>">Go To My Stelmac </a> |</li>
	        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
	      </ul>
	    </div> -->
  	</div>
</div>
<!-- /.welcome-j-bg -->
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 padd-0">  
		<div class="bg_white">
			<div class="col-sm-12">
				<h3>Machine Order List</h3>
			 	<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC">
							<td>Sr.No</td>
							<td>Machine ID </td>
							<td>Customer Name</td>
							<td>Order Created </td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
						<?php if($orderList['result']>0){ 
									$i=1; 
									foreach($orderList['result']  as $rowData){ ?>
						<tr>
							<td><?=$i++?></td>
							<td><?=$rowData['machine_unique_id']?></td> 
							<td><?=$rowData['userName']?></td> 
							<td><?=$rowData['created_on']?></td>
							<td>
								<a href="<?=site_url()."customer/machineOrdersSupplierDetails/".$rowData['id']?>" class="btn btn-xs btn-info" >Details</a>
							</td>
						</tr>
							<?php } 
							} ?>
					</tbody>
				</table>
		</div><div class="clearfix"></div>
	</div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php echo $this->template->contentEnd();	?> 


  