 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Remote Application Service Consultant List</li>
      </ul>
    </div>
    <div class="col-sm-6 padd-0">
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
	<div class="bg_white">
		<div class="col-md-10 col-sm-12 col-xs-12">  
			<?php 	// display messages
			if(hasFlash("dataMsgAddError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgAddError"); ?>
				</div>
			<?php }	?>

			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC">
						<th>Sr.No.</th>
						<th>Consulant Name</th>  
						<th>Email</th>  
						<th>Request Date </th>   
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php 
						if($requestProgrammers>0){ $i=1;
							foreach($requestProgrammers  as $rowData){
							?>
							<tr>
								<td><?=$i;?></td>
								<td><?=$rowData['u_name']?></td>  
								<td><?=$rowData['u_email']?></td> 
								<td><?=$rowData['request_programmer_date']?></td>  
								<td>   
								<?php if($rowData['customer_accept_status']=='Y' ){ ?>
									Accepected
								<?php }else{?>
									<a href="<?=site_url()."customer/remoteApplicationConsultantListAcceptByCustomer/".$rowData['racrp_id']."/$rowData[rpr_id]"?>" class="btn btn-xs btn-success">Accept</a> &nbsp; &nbsp;  
									<a href="<?=site_url()."customer/viewRemoteApplicationConsultantQoute/".$rowData['racrp_id']."/$rowData[rpr_id]"?>" class="btn btn-xs btn-success">View Qoutation</a> &nbsp; &nbsp;  
								<?php }?>
								</td> 
							</tr>
						
						<?php $i++; }
							echo "";
						}else{
							echo "<tr><td colspan='5'>Record not found</td></tr>";
						}?>
				</tbody>
			</table>
		</div> 
		<div class="clearfix"></div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 