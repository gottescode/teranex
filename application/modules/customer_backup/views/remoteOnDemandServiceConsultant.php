 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6">
      <ul>
        <li class="myprofile">Remote On Demand Consultant List</li>
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
    <!-- <div class="col-sm-8 col-lg-10">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
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
<div class="col-md-9 col-sm-9 col-xs-12 supplier-form">  
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
						if($requestConsultantList >0){ $i=1;
							foreach($requestConsultantList  as $rowData){
							?>
							<tr>
								<td><?=$i?></td>
								<td><?=$rowData['u_name']?></td>  
								<td><?=$rowData['u_email']?></td> 
								<td><?=$rowData['request_consultant_date']?></td>  
								<td>   
								<?php if($rowData['customer_accept_status']=='Y' ){ $accepct="Yes";?>
									Accepted
								<?php }else if($accepct==""){?>
									<a href="<?=site_url()."customer/remoteOnDemandServiceConsultant/".$rowData['remote_application_id']."/$rowData[rorc_id]"?>" class="btn btn-success">Accept</a> &nbsp; &nbsp;  
								<?php }?>
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
<!-- /.row --> 
	  
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 