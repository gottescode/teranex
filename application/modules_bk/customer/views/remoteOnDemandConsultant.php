 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Remote On Demand Service Consultant List</li>
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
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  
			<?php 	// display messages
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
	 
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC">
							<th>Sr.No.</th>
							<th>User Name</th>  
							<th>Service Type</th>  
							<th>Company Name</th>  
							<th>Machine Model No</th>  
							<th>Request Date</th>   
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
							<?php
							
							if($consultReqList >0){ $i=1;
								foreach($consultReqList  as $rowData){
								?>
								<tr>
									<td><?=$i?></td>
									<td><?=$rowData['username']?></td>   
									<td><?=$rowData['service_type']?></td>   
									<td><?=$rowData['company_name']?></td> 
									<td><?=$rowData['machinemodel']?></td>   
									<td><?
										$phpMySqlDate = strtotime($rowData['request_date_time']);	
										echo $mysqldate = date('d-m-Y H:i:s', $phpMySqlDate);
										?></td>  
									<td>   
									<?php  if($rowData['customer_accept_status']=='Y' ){ 
										if(($this->session->userdata('uid'))==$rowData['consultant_id']){		
										?>
											Accepted &nbsp;
										<a href="<?=site_url()."customer/remoteMachineClassSchedule/".$rowData['rmr_id'];?>" class="btn btn-xs btn-primary">Schedule Course</a>
										<a href="<?=site_url()."customer/remoteMachineServiceInvoice/".$rowData['rmr_id'];?>" class="btn btn-xs btn-info">Invoice</a>
										
										<?	}else{
										?>Allocated To Other
										<?
											}
										?>
									<?php }elseif($rowData['accepted_consultant_id']==0){
												if($rowData['request_status']=='A'||$rowData['request_status']=='H'){
											?>
												<a href="<?=site_url()."customer/remoteOnDemandConsultantReject/".$rowData['rorc_id']; ?>" class="btn btn-danger btn-xs" onclick="return confirm('Are You Sure To Reject?')">Reject</a> &nbsp;  
										<? }
										if($rowData['request_status']=='R'||$rowData['request_status']=='H'){ ?>
										<a href="<?=site_url()."customer/remoteOnDemandConsultant/".$rowData['rorc_id']; ?>" class="btn btn-success btn-xs" onclick="return confirm('Are You Sure To Accept?')">Accept</a> &nbsp; &nbsp;  
										<? } ?>
									<?php }?>
									</td> 
								</tr>
							
							<?php $i++; }
								echo "";
							}else{
								echo "<tr><td colspan='7'>Record not found</td></tr>";
							}?>
					</tbody>
				</table>
		 
		</div> <div class="clearfix"></div>
	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 