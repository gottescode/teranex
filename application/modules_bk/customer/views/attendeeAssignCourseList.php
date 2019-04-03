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
        <li class=""><a href="<?php echo site_url()."";?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<?php   $this->load->view("cust_side_menu" ); ?> 
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
													<td><?=$rowData['courseName']?></td> 
													<td><?=$rowData['course_start_date']?></td> 
													<td><?=$rowData['course_start_time']?></td>  
													<td><?=$rowData['course_end_time']?></td>  
													 
													<td> 
													<?php if($rowData['wiziq_attendee_url']!=''){?>
														 <a href="<?=addhttp($rowData['wiziq_attendee_url'])?>" target="_blank">Launch Class</a> &nbsp; &nbsp;
													<?php }?>
													</td> 

												</tr>
											
											<?php }
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