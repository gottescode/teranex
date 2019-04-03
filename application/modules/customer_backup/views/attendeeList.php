 

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
	<div class=" bg_white">  
		<div class="col-sm-9 col-md-9 col-lg-10"> 
			<a href="<?php echo site_url()."customer/attendeeAdd"?>"><button class="btn btn_orange">Add Attendee</button></a>
			<?php 	// display messages
				if(hasFlash("dataMsgAddError"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgAddError"); ?>
					</div>
			<?php }	?>
			<?php   
				if($attendeeList)
				{
				?>
					<table id='' class="table table-striped table-hover">
						<thead>
							<tr bgcolor="#CCCCCC"><td>S.No</td><td> Person Name</td><td>Designation</td><td>Email</td><td>Mobile</td>  <td>Addition Date</td><td>Action</td></tr>
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
										<td><? echo  date_dmy($rowData['u_entry_date']);?></td>
										<td>   <a href="<?php echo site_url()?>customer/attendeeDelete/<?=$rowData[uid]?>"   >Delete</a></td>
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
		</div> <div class="clearfix"></div>
	</div>
</div>
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 