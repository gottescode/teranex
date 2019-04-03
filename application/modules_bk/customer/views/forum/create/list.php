<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
  <div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">User's Community</li>
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
								<a href="<?=site_url()."customer/forum/createCommunity"?>" class="btn btn_orange" role="button">Add community</a><br/><br/>
								<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<!-- <h3>User's Community</h3> -->
									<div class="table-responsive">
							
										<table class="table table-bordered table-striped" id="community_table">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Name</th>  
													<th>Community Description</th>  
													<!--<th>Community Topics</th>-->
													<!--<th>Latest Topics</th> -->   
													<th>Send Invite</th>  
													<th>Status</th>  
													<th>User Lists</th>  
													<!--<th>Action</th>-->
												</tr>
											</thead>
											<tbody>
											<?php 
												if($forums >0){ $i=1;
													foreach($forums as $forum){
													?>
													<tr>
													
														<td><?=$i++?></td>
														<td><?= $forum->title ?></td>
														<td><?= $forum->description ?></td>
														<!--<td><?php foreach($forum->topic->title as $product) 
											{
	       											 echo $product->title.'<br>';
	       									}?></td>-->
														<!--<td><?php if ($forum->latest_topic->title !== null) : ?>
											<p>
												<small><a href="<?= base_url($forum->latest_topic->permalink) ?>"><?= $forum->latest_topic->title ?></a><br>by <a href="<?= base_url('user/' . $forum->latest_topic->author) ?>"><?= $forum->latest_topic->author ?></a>, <?= $forum->latest_topic->created_at ?></small>
											</p>
										<?php else : ?>
											<p>
												<small>no topic yet</small>
											</p>
										<?php endif; ?></td>-->


											<?
										/*if($_SESSION['CustomerID'] == $data['Moderator'])
										{*/
									
											?>
										
										<td>
										<?php 
											 $status = $forum->status;
										?>
										<?php 
											if($status==='A'){
										?>
											<a class="btn btn-xs btn-success" href="<?= site_url()."customer/forum/send_invite_code/". $forum->slug ?>">Invite</a>
										
											<a class="btn btn-xs btn-primary" href="<?= site_url()."customer/forum/create_topic/".$forum->slug ?>">Create Topics</a>
										<?
											}
										?>
										</td>
										<td>
											<?php 
												if($status==='A'){
													echo "Accepted";
												}elseif($status==='R'){
													echo "Rejected";
												}else{
													echo "Waiting";
												}
											?>
										</td>
										
										<td>
											<a href="<?=site_url()."customer/forum/activeuserlist/".$forum->slug ?>" class="btn btn-success btn-xs">Active Users</a>
											<a href="<?=site_url()."customer/forum/inactiveuserlist/".$forum->slug ?>" class="btn btn-warning btn-xs">InActive Users</a>
										</td>
										<?
										/*}
										/*else
										{
											?><td>-</td><?
										}*/
										?>
														<!--<td><input type="checkbox" name="publish_<?=$rowData['community_id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  -->
														<!--<td><!--<a href="<?=site_url()."community/forum/update/".$rowData['community_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;-->
															<!--<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."community/forum/delete_forum/".$forum->id ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
															
												<input  type="hidden" name="id[]" value="<?= $forum->id ?>">
										
														</td> -->

													</tr>
												
												<?php }
												
												}else{
													echo "<tr><td colspan='6'>Record not found</td></tr>";
												}?>
												 
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
