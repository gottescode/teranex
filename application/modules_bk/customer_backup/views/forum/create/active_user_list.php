
 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Active User List</li>
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
		 	<!-- Main content -->
			<section class="content-header">
			  <!-- <span style="font-size: 24px;padding: 10px 10px;">Active User List</span> -->
			</section>
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
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="community_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>Name</th>  
										<th>Email</th>  
										<th>Assign Moderator</th>  
									</tr>
								</thead>
								<tbody>
									<?php 
									if($userList >0){ $i=1;
										foreach($userList  as $rowData){
										?>
										<tr>
											<td><?=$i++?></td>
											<td><?=$rowData->u_name;?></td>
											<td><?=$rowData->community_invite_email;?></td>

											<td><input type="radio" name="publish_<?=$rowData->active_status;?>" value="<?=$rowData->uid;?>" onClick="moderatorAssign('<?=$rowData->uid;?>');"></td>
												</tr>
									
									<?php }
									
									}else{
										echo "<tr><td colspan='4'>Record not found</td></tr>";
									}?>
								</tbody>
							</table>  
						</div>
					</form>
				</section> 
			</div><div class="clearfix"></div>
		</div><div class="clearfix"></div>
	</div>
	
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
		$(document).ready(function() {
		$("#community_table").DataTable({
	});	
	}); 
	function moderatorAssign(uid){
		var communiteeID = '<?php echo $community_id ?>';
		
		$.ajax({
		  type: "GET",
		  url: site_url+"/community/api/moderatorAssign/"+communiteeID+"/"+uid,
		  data: {},
			success: function(result){ 
				$('#state_id').empty();
				 if(result){ 					
						var state_list=result.result; 
						 alert('Moderator Assigned SuccessFully..!!');
					}
				else if(result.error){
					alert('Something Went Wrong..!!');
				} 
			}
			
		});
	}
	</script>

<?php $this->template->contentEnd();	?> 

