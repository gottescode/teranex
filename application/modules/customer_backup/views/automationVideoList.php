 <?php $this->template->contentBegin(POS_TOP);?> 
  
 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Automation Comment</li>
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
		<li>Automation Name</li>
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
		<div class="col-md-10 col-sm-12 col-xs-12">  
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td> Person Name</td> <td>Addition Date</td> <td>Action</td> </tr>
				</thead>
				<tbody> 
				<?php if($automationVideoRequestList){ 
						$SNo = 1;
						foreach($automationVideoRequestList  as $rowData)
						{
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><?php if($rowData['video_chat']=='V'){echo " Video chat with a Teranex.";};
									if($rowData['video_chat']=='C'){echo "Consultant";};
									if($rowData['video_chat']=='B'){echo "Book a live demo or machine inspection.";};
									if($rowData['video_chat']=='H'){echo "Hire a third party consultant.";};
									?>
								</td>  
								<td><? echo ($rowData['enquiry_date']);?></td> 
								<td><a href="<?php echo site_url()."customer/AutomationVideoClassScheduleCustomer/".$rowData['avr_id']?>" class="btn btn-xs btn-info">Course List</a></td> 
							</tr>
							<?
							$SNo ++;
						}
						}
					?>
				</tbody>
			</table>
		</div> <div class="clearfix"></div>
	</div>
</div>
<!-- /.row -->  
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<?php $this->template->contentEnd();	?> 