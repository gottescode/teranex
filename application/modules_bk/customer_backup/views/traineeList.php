 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Trainee / Consultant User List</li>
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

			<div class="">
				<a href="<?php echo site_url()."customer/traineeAdd"?>"><button class="btn btn-primary btn_orange">Add Trainee / Consultant</button></a><br/> <br/> 
			</div>
			
			<?php 	// display messages
				if(hasFlash("dataMsgAddError"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgAddError"); ?>
					</div>
			<?php }	?>
			<?php   
				if($traineeList)
				{
				?>
				<div class="table-responsive">
									
					<table class="table table-bordered table-striped" id="community_table">
						<thead>
							<tr bgcolor="#CCCCCC"><td>S.No</td><td> Person Name</td><td>Designation</td><td>Email</td><td>Mobile</td>  <td>Addition Date</td><td>Action</td></tr>
						</thead>
						<tbody>
								<?php
								$SNo = 1;
								foreach($traineeList  as $rowData)
								{
									?>
									<tr>
										<td><? echo $SNo;?></td>
										<td><? echo $rowData['u_name'];?></td>
										<td><? if($rowData['u_user_type']=='T'){echo "Trainee";}  if($rowData['u_user_type']=='CN'){echo "Consultant";} if($rowData['u_user_type']=='P'){echo "Programmer";} ?></td>
										<td><? echo $rowData['u_email'];?></td>
										<td><? echo $rowData['u_mobileno'];?></td>  
										<td><? echo  date_dmy($rowData['u_entry_date']);?></td>
										<td>   <a href="<?php echo site_url()?>customer/traineeDelete/<?=$rowData[uid]?>"    class="btn btn-xs btn-danger">Delete</a></td>
									</tr>
									<?
									$SNo ++;
								}
							?>
						</tbody>
					</table>
				</div>
				<?php
				}
				?>
		</div> <div class="clearfix"></div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
		$("#community_table").DataTable({
		     "order": [[ 0, "desc" ]]
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 