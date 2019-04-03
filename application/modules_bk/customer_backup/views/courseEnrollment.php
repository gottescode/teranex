 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Course Enrollment List</li>
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
		<div class="col-md-10 col-sm-12 col-xs-12">  
			<?php 	// display messages
			if(hasFlash("dataMsgAddError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgAddError"); ?>
				</div>
			<?php }	?>
			<?php   
			if($courseList)
			{
			?>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC"><td>S.No</td><td> Course Name</td><td>Participant No</td><td>Start Date</td><td>Time</td>  <td>Action</td></tr>
					</thead>
					<tbody>
							<?php
							$SNo = 1;
							foreach($courseList  as $rowData)
							{
								?>
								<tr>
									<td><? echo $SNo;?></td>
									<td><? echo $rowData['name'];?></td> 
									<td><? echo $rowData['participant_no'];?></td>
									<td><? echo date_dmy($rowData['course_start_date']);?></td>  
									<td><? echo $rowData['course_start_time'];?></td>   
									<td><a href="<?php echo site_url()."customer/assign_attendee/".$rowData['ce_id']?>" >Attendee Assign</a> &nbsp; <a href="<?php echo site_url()."customer/course_comment/".$rowData['course_id']."/".formaturl($rowData['name'])?>" >Comment</a></td>
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
<!-- /.row --> 
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 