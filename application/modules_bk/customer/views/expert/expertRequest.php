 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Remote Application Service Request List</li>
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
		<div class="col-sm-9 col-md-9 col-lg-10">  
			<?php 	// display messages
				if(hasFlash("dataMsgAddError"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgAddError"); ?>
					</div>
			<?php }	?>
			<div>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC">
							<th>Sr.No.</th>
							<th>Topic Discussion</th>  
							<th>Start Time</th>  
							<th>Date Preference</th>  
							<th>Status</th>  
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
							<?php 
							if($requestList >0){ $i=1;
								foreach($requestList  as $rowData){
								?>
								<tr>
									<td><?=$i++?></td>
									<td><?=$rowData['topic_discussion']?></td> 
									<td><? if($rowData['start_time']){ echo $rowData['start_time']; }else{ echo "Waiting"; }?></td> 
									
									<td><?=$rowData['date_pref']?></td> 
									<td><?php if($rowData['is_accepted_by_consultant']==='H'){
										 echo "Waiting";
									}elseif($rowData['is_accepted_by_consultant']==='Y'){
										echo "Accepted";
									}else{
										echo "Rejected";
									}?></td> 
									<td><?php
											if($rowData['meeting_status']=='Y'){
												?>
										<a href = "<?php echo $rowData['start_url']; ?>" target="_blank" class="btn btn-xs btn-success">Join Meeting </a>
										<?
											}
											?>
										</td> 
								</tr>
							
							<?php }
								echo "";
							}else{
								echo "<tr><td colspan='6'>Record not found</td></tr>";
							}?>
					</tbody>
				</table>
			</div>
		</div><div class="clearfix"></div>
		
	</div> <div class="clearfix"></div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 