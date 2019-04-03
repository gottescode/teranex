<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Machine</li>
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
 <!-- Main content -->
	<div class="bg_white">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
			<section class="content">
				<div class="row">
					<div class="col-xs-12">
						<div class="box">
								<?php 	// display messages
							if(hasFlash("dataMsgSuccess"))	{	?>
								<div class="alert alert-success alert-dismissible" role="alert">
								  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								  <?php echo getFlash("dataMsgSuccess"); ?>
								</div>
							<?php	}	?>
								<?php 	// display messages
									if(hasFlash("dataMsgError"))	{	?>
										<div class="alert alert-warning alert-dismissible" role="alert">
										  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
										  <?php echo getFlash("dataMsgError"); ?>
										</div>
							<?php	}	?>
							 
							<div class="box-body"> 
								<a href="<?=site_url()."customer/create_machine"?>" class="btn btn_orange" role="button">Add Machine</a><br/><br/>
									
						<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Category Name</th> 
												<th>Brand Name</th> 
												<th>Model No.</th> 
												<th>Add Images</th> 
												<th>Action</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($machineCatList as $row){ ?>
											<tr>
												<td><?=$i++;?></td>
												<td><?=$row['catName'];?></td>
												<td><?=$row['brandName'];?></td>
												<td><?=$row['modelName'];?></td>
												<td>
													<a href="<?=site_url()."customer/add_machineDetail_image/".$row['md_id']; ?>" class="btn  btn-xs btn-success">Add Images</a>
												</td>
												<td>
													<a href="<?=site_url()."customer/update_machine/".$row['md_id']; ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
													&nbsp;&nbsp;
													<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."customer/deleteMachineDetails/".$row['md_id']; ?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
												</td> 
											</tr>
											<? } ?>
										</tbody>
									</table>  
								</div>
							</form>
							</div>
						</div>
					</div>
				</div>			
			</section> 
		</div>
		<div class="clearfix"></div>
	</div>
</div>
	
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
		$("#community_table").DataTable({
		     "order": [[ 0, "desc" ]]
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 
