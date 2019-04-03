 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Events List</li>
      </ul>
    </div>
    <div class="col-sm-8 padd-0">
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
			if(hasFlash("dataMsgAddError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgAddError"); ?>
				</div>
				<?php }	?>
				<?php   
				if($eventList)
				{
				?>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC"><td>S.No</td><td>Event Name</td><td>Participant No</td><td>Start Date</td><td>Time</td>  <td>Action</td></tr>
					</thead>
					<tbody>
							<?php
							$SNo = 1;
							foreach($eventList  as $rowData)
							{
								?>
								<tr>
									<td><? echo $SNo;?></td>
									<td><? echo $rowData['event_name'];?></td> 
									<td><? echo $rowData['participant_no'];?></td>
									<td><? echo date_dmy($rowData['event_start_date']);?></td>  
									<td><? echo $rowData['event_start_time'];?></td>   
									<td><a href="<?php echo site_url()."customer/eventAssignAttendee/".$rowData['eb_id']?>"  >Attendee Assign</a></td>
								</tr>
								<?
								$SNo ++;
							}
						?>
					</tbody>
				</table>
				<?php
				}
				?>
		</div> 
		<div class="clearfix"></div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 