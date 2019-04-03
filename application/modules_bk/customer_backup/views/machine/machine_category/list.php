<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">

<div class="container-fluid myprofile-bg dahboard-bg">
  	<div class="container">
	    <div class="col-sm-4 padd-0">
		    <ul>
		        <li class="myprofile">Machine Category</li>
		    </ul>
	    </div>
	    <div class="col-sm-8 padd-0">
		  	<ul>
		    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
		  	</ul>
		</div>
  	</div>
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">

  </div>
</div>
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
 <!-- Main content -->
	<div class="bg_white">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">
			<div class="col-xs-12">
				<div class="padd-15">
					<a href="<?php echo site_url()."customer/create_category"?>" class="btn btn_orange">Create Category</a>
				</div><br/>
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
				<div class=""> 
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="community_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Name</th>  
										<th>Display Order</th>  
										<th>Publish</th>  
										<th>Action</th>
									</tr>
								</thead>
								<tbody>
									<?php 
									//print_r($machineCatList);exit;
									if($machineCatList >0){ $i=1;
										foreach($machineCatList['result'] as $row){
										?>
										<tr>
											<td><?=$i++?></td>
											<td><?=$row['category_name']?></td>
											<td><input type="text" name="display_order_<?=$row['mc_id']?>" value="<?=$row['display_order']?>"  ></td>  
											<td><input type="checkbox" name="publish_<?=$row['mc_id']?>" value="Y" <?php if($row["publish"] == 'Y') echo "checked"; ?> ></td>  
											<td>	<a href="<?=site_url()."machine/admin/update/".$row['mc_id']; ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
											&nbsp;&nbsp;<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."machine/admin/delete/".$row['mc_id']; ?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
											</td> 
												<input  type="hidden" name="id[]" value="<?php echo $row["mc_id"];?>">
										</tr>
									<?php }
										echo "";
									}else{
										echo "<tr><td colspan='6'>Record not found</td></tr>";
									}?>
								</tbody>
								<tr><td colspan="6"><input  type='submit' class="btn btn-primary pull-right" name='btnSubmit' value='Update'></td></tr>
							</table>  
						</div>
					</form>
				</div>
			</div>
		</div><div class="clearfix"></div>
	</div>
</div>


	

	  

<?php $this->template->contentBegin(POS_BOTTOM);?>

	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>

	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 

	<script type="text/javascript">

	$(document).ready(function() {

		$("#community_table").DataTable({

	});	

	}); 

	</script>

<?php $this->template->contentEnd();	?> 