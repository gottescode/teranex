 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Assign Course  List</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="row margin_0" style="background-color: #353537;">
<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="bg_white">
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">  
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
							<th>Name</th>  
							<th>Date</th>  
							<th>Start Time</th>  
							<th>End Time</th>  
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
							<?php 
												if($courseList >0){ $i=1;
													foreach($courseList  as $rowData){
													?>
													<tr>
														<td><?=$i++?></td>
														<td><?=$rowData['name']?></td> 
														<td><?=$rowData['trainee_name']?></td> 
														<td><?=$rowData['course_start_date']?></td> 
														<td><?=$rowData['course_start_time']?></td> 
	 
														 
														<td> 
															 <a href="<?=site_url()."customer/scheduleCourse/".$rowData['cid']?>" class="btn btn-xs btn-success">Schedule Class</a> &nbsp; &nbsp;
															 
															<input  type="hidden" name="id[]" value="<?php echo $rowData["cid"]; ?>"> 
														</td> 

													</tr>
												
												<?php }
													echo "";
												}else{
													echo "<tr><td colspan='6'>Record not found</td></tr>";
												}?>
					</tbody>
				</table>
		 
		</div> <div class="clearfix"></div>
	</div>
</div>
<!-- /.row --> 
	  
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 