 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Freelancer Request </li>
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
							<th>M/C ID</th>  
							<th>M/C Category</th>  
							<th>M/C Brand</th>  
							<th>M/C Model No</th>  
							<th>Problem Note</th>  
							<th>Request Date</th>   
							<th>Status</th>   
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
									<td><? if($rowData['freelance_type']=='M'){	echo "Machine Service"; }else{ echo "Application Service";	}?></td>   
									<td><?=$rowData['machine_unique_id']?></td>  
									<td><?=$rowData['category_name']?></td>   
									<td><?=$rowData['brand_name']?></td>   
									<td><?=$rowData['model_name']?></td>  
									<td><?=$rowData['error_description']?></td>  
									<td><?
										echo $phpMySqlDate = $rowData['created_on'];	
										?>
									</td>  
									<td><?php if($rowData['status']=='R'){
										echo "Requested";
									}elseif($rowData['status']=='W'){
										echo "Waiting";
									}elseif($rowData['status']=='D'){
										echo "Delivered";
									}elseif($rowData['status']=='C'){
										echo "Closed";
									}?>
									</td>  
									<td>   
									<a href="<?=site_url()."customer/scheduleListFreelancerRequest/".$rowData['id'];?>" class="btn btn-xs btn-primary">Meeting</a>
									<!-- 
									<?php if($rowData['freelance_type']=='M'){
									?>
									
									<a href="<?=site_url()."customer/scheduleCourseFreelancer/".$rowData['id'];?>" class="btn btn-xs btn-primary">TokBox Meeting</a>
									<?	
										}else{
									?>	
									<a href="<?=site_url()."customer/scheduleListFreelancerRequest/".$rowData['id'];?>" class="btn btn-xs btn-primary">Zoom Meeting</a>
									
									<?	} ?>
									
									-->
									</td> 
								</tr>
							
							<?php $i++; }
								echo "";
							}else{
								echo "<tr><td colspan='8'>Record not found</td></tr>";
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