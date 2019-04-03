  <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Machine Comment</li>
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
		<li>Machine Name</li>
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
		<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12">  
			<table id='consultant_table' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC">
						<td>S.No</td>
						<td>Machine Details</td>
						<td>Engineer Name</td>
						<td>Engineer Name</td>
						<td>Action</td> 
					</tr>
				</thead>
				<tbody> 
				<?php if($machineVideoRequestList){ 
						$SNo = 1;
						foreach($machineVideoRequestList  as $rowData)
						{
							?>
							<tr>
								<td><? echo $SNo;?></td>
								<td><?php /* if($rowData['video_chat']=='V'){echo " Video chat with a Teranex.";};
									if($rowData['video_chat']=='C'){echo "Consultant";};
									if($rowData['video_chat']=='B'){echo "Book a live demo or machine inspection.";};
									if($rowData['video_chat']=='H'){echo "Hire a third party consultant.";};
							 */	//	print_r($rowData);
							 
							 
							 ?>
							 <p>Machine ID: <?=$rowData['machine_unique_id'];?></p>
							 <p>Machine Category: <?=$rowData['category_name'];?></p>
							 <p>Machine Brand: <?=$rowData['brand_name'];?></p>
							 <p>Machine Model: <?=$rowData['model_name'];?></p>
								</td>  
								<td><? if($rowData['engg_name']){ echo $rowData['engg_name'];}else{ "-"; }?></td> 
								<td><? echo ($rowData['enquiry_date']);?></td> 
								<td><a href="<?php echo site_url()."customer/MachineVideoClassScheduleCustomer/".$rowData['mvr_id']?>" class="btn btn-xs btn-info">Demo Meeting List</a></td> 
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
<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
		$("#consultant_table").DataTable({
			'pageLength':50
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 