 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Remote Application Programmer Request List</li>
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
			if(hasFlash("dataMsgAddSuccess"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgAddSuccess"); ?>
				</div>
			<?php }	if(hasFlash("dataMsgAddError"))	{	?>
				<div class="alert alert-danger alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgAddError"); ?>
				</div>
			<?php }	
			$userId =  $this->session->userdata('uid');
			?>
	 
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC">
						<th>Sr.No.</th>
						<th>User Name</th>  
						<th>Request Date</th>   
						<th>Action</th>
					</tr>
				</thead>
				<tbody>
						<?php
						
						if($programmReqList >0){ $i=1;
							foreach($programmReqList  as $rowData){
							?>
							<tr>
								<td><?=$i?></td>
								<td><?=$rowData['username']?></td>   
								<td><?php  $phpMySqlDate = strtotime($rowData['requested_date']);	
									echo $mysqldate = date('d-m-Y H:i:s', $phpMySqlDate);	?>
								</td>  
								<td><?php if($rowData['programmer_id'] == $userId){ echo "Accepcted";  ?>
										<a href="<?php echo site_url()."customer/scheduleRemoteMachineprogramming/{$rowData['rpr_id']}"?>" class="btn btn-xs btn-info" >Meeting List</a>
								
								<? } ?>
									<a href="<?=site_url()."customer/customerRequestsProgrammer/".$rowData['rarp_id']."/".$rowData['rpr_id'];?>" class="btn btn-xs btn-primary"> View </a>
								</td> 
							</tr>
						
						<?php $i++; }
							echo "";
						}else{
							echo "<tr><td colspan='4'>Record not found</td></tr>";
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