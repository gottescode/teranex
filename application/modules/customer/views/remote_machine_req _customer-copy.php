<div class="container">
	<div class="col-sm-offset-1 col-sm-10">
		<div class="">
		</div>
	</div>
</div>
<style type="text/css">
 	
 </style>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Remote Machine Service Request </li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

  	<div class=" row-flex">
	<?php   $this->load->view("cust_side_menu" );  ?> 
		<div class="col-sm-10 ">  
			
				<?php 	// display messages
								if(hasFlash("dataMsgSuccess"))	{	?>
									<div class="alert alert-success alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <?php echo getFlash("dataMsgSuccess"); ?>
									</div>
						<?php	}	?>
							<?php 	// display messages
								if(hasFlash("dataMsgError"))	{	?>
									<div class="alert alert-warning alert-dismissible" role="alert">
									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
									  <?php echo getFlash("dataMsgError"); ?>
									</div>
						<?php	}	?>
									<table class="table table-bordered table-striped" id="datatable">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Company Name</th>  
												<th>Topic</th>    
												<th>Consultant Name</th>  
												<th>Request On</th>  
												<th>Status</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
											if($requestListRemoteService >0){ $i=1;
												foreach($requestListRemoteService as $rowData){
										?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$rowData['company_name']?></td>
												<td><?=$rowData['topic_discussion']?></td>
												<td><?=$rowData['consultant_name']?></td>
												<td><?=$rowData['request_date_time']?></td>
												<td><?php //if($rowData['isAccepted']=='H'){ echo "HOLD"; }elseif($rowData['isAccepted']=='A'){ echo "ACCEPTED"; }else{ echo "REJECTED"; }?>
													<?php if($rowData['accepted_consultant_id']=='0'){ ?>
													<a href="<?=site_url()."customer/remoteApplicationServiceConsultant/".$rowData['rar_id']?>" class="btn btn-xs btn-success" >Consultant List</a> &nbsp; &nbsp;  
														
													<?php  }else{
														?>
													<a href="<?=site_url()."customer/scheduledCoursesCustomer/".$rowData['rar_id']?>" class="btn btn-xs btn-info">Course List</a> &nbsp; &nbsp;  
													<?
														} 
													?>
												</td>
											</tr>
											<?php }
											}else{
												echo "<tr><td colspan='6'><center>No Request Found</center></td></tr>";
											} ?>
										</tbody>
									</table>  
								</div>
							</div>