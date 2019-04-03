 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Attendee User List</li>
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
		<li class=""><?=$courseData['name']?></li>
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
		<div class="col-md-10 col-sm-12 col-xs-12 "> 
			 
			<?php 	// display messages
				if(hasFlash("dataMsgAttSuccess"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgAttSuccess"); ?>
					</div>
			<?php }	?>
			<?php  $assignUser=array();
				if($attendeeList)
				{
					if($courseEnrollmentAssignList){ 
						 foreach($courseEnrollmentAssignList as $rowAssign){
						 	$assignUser[]=$rowAssign['attendee_user_id'];
						 } 
					} 
				?>
				<form class="form-horizontal" role="form" action="" id="assignUser_form" method="post" enctype="multipart/form-data">
					<table id='' class="table table-striped table-hover">
						<thead>
							<tr bgcolor="#CCCCCC"><td>S.No</td><td> Person Name</td><td>Designation</td><td>Email</td><td>Mobile</td><td>Assign</td></tr>
						</thead>
						<tbody>
								<?php 
								$SNo = 1;
								foreach($attendeeList  as $rowData)
								{
									?>
									<tr>
										<td><? echo $SNo;?></td>
										<td><? echo $rowData['u_name'];?></td>
										<td><? echo "Attendee";?></td>
										<td><? echo $rowData['u_email'];?></td>
										<td><? echo $rowData['u_mobileno'];?></td>  
										<td><input type="checkbox" name="assignUser[]" class="assignUser"  value="<?php echo $rowData['uid'];?>" <?php if(in_array($rowData['uid'],$assignUser)){ echo "checked";}?> required/></td>
									</tr>
									<?php
									$SNo ++;
								}
							?>
						</tbody>
					</table>
                                    <input type="hidden" name="ce_id" value="<?php echo $eventId;?>">
					<input type="hidden" name="participant_no" id="participant_no" value="<?php echo $eventdata[0]['participant_no']?>" >
                                        <input type="hidden" name="event_name"  value="<?php echo $singleeventdata[0]['event_name']?>">
                                        <center><input type="submit" name="btnSubmit" id="btnSubmit"  class="btn btn_orange" value="Assign Event"></center>
				</form>
				<?php
				}
				?>
		</div><div class="clearfix"></div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">  
	var participant_no=$('#participant_no').val();	 
	$('input[type=checkbox]').on('change', function (e) {
		if ($('input[type=checkbox]:checked').length > participant_no) {
			$(this).prop('checked', false);
			alert("allowed only "+participant_no);
		}
	}); 
</script>
<?php $this->template->contentEnd();	?> 