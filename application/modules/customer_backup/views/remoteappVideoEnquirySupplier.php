 <?php $this->template->contentBegin(POS_TOP);?>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Remote Application Video Request</li>
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
		<li></li>
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
			<table id='' class="table table-striped table-hover">
				<thead>
				<tr bgcolor="#CCCCCC">
					<td>S.No</td>
					<!--<td>Machine Name</td> -->
					<td>Customer  Name</td> 
					<td>Request Regarding </td> 
					<td>Addition Date</td> 
					<td>Action </td> 
				</tr>
				</thead>
				<tbody> 
				<?php if($VideoRequestList){ 
						$SNo = 1;
						foreach($VideoRequestList  as $rowData)
						{
							
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<!--<td><? echo $rowData['brand_name']." ".$rowData['model_no'];?></td>-->
								<td><? echo $rowData['UserName']; ?></td>
								<td><?php if($rowData['video_chat']=='V'){	echo " Video chat with a Teranex."; }
									if($rowData['video_chat']=='C'){	echo "Consultant"; }
									if($rowData['video_chat']=='B'){	echo "Book a live demo or machine inspection."; }
									if($rowData['video_chat']=='H'){	echo "Hire a third party consultant."; }
									?>
								</td>  
								<td><? echo ($rowData['enquiry_date']);?></td> 
								<td>
								
										<a href="<?=site_url()."customer/remoteappVideoClassSchedule/".$rowData['ravr_id'];?>" class="btn btn-xs btn-primary">Schedule Class</a>
								
								</td> 
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