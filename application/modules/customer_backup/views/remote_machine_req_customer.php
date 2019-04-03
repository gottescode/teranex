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
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Remote On Demand Machine Service Request </li>
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
    <!-- <div class="col-sm-8 col-lg-10 padd-0" >
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
<!-- /.welcome-j-bg -->

<div class="row margin_0" style="background-color: #353537;">
<?php   $this->load->view("cust_side_menu" );  ?> 
	<div class="bg_white">
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
			<table class="table table-striped table-hover" id="datatable">
				<thead>
					<tr bgcolor="#CCCCCC">
						<th>Sr.No.</th>
						<th>Company Name</th>  
						<th>Machine Brand</th>  
						<th>Machine Type</th>  
						<th>Machine Model</th>  
						<th>Consultant Name</th>  
						<th>Request On</th>  
						<th>Action</th>  
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
						<td><?=$rowData['machinebrand']?></td>
						<td><?=$rowData['machinetype']?></td>
						<td><?=$rowData['machinemodel']?></td>
						<td><? if($rowData['consultant_name']){ echo $rowData['consultant_name']; }else{ echo "WAITING";}?></td>
						<td><?=$rowData['request_date_time']?></td>
						<td><?php //if($rowData['isAccepted']=='H'){ echo "HOLD"; }elseif($rowData['isAccepted']=='A'){ echo "ACCEPTED"; }else{ echo "REJECTED"; }?>
							<?php if($rowData['consultant_id']=='0'){ ?>
							<a href="<?=site_url()."customer/remoteOnDemandConsultantCustomer/".$rowData['rmr_id']?>" class="btn btn-xs btn-success" >Consultant List</a> &nbsp; &nbsp;  
								
							<?php  }else{
								?>
							<a href="<?=site_url()."customer/remoteMachineClassScheduleCustomer/".$rowData['rmr_id']?>" class="btn btn-xs btn-info">Course List</a> &nbsp; &nbsp;  
							<?
								} 
							?>
						</td>
					</tr>
					<?php }
					}else{
						echo "<tr><td colspan='8'><center>No Request Found</center></td></tr>";
					} ?>
				</tbody>
			</table>  
		</div>
		<div class="clearfix"></div>
	</div>
</div>