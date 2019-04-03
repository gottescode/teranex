 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<?php 


		$this->load->view("cust_side_menu" ); ?> 
	 <!-- Main content -->
		<div class="col-xs-6 col-sm-9 col-md-9">
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
					
						<div class="box-body"> 
						
						<br/>
						<a href="<?=site_url()."customer/forum/createCommunity"?>" class="btn btn-info" role="button">Add community</a>
						<?php 	// display messages
						if(hasFlash("dataMsgSuccess"))	{	?>
							<br/>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgSuccess"); ?>
							</div>
						<?php	}	?>
						<?php 	// display messages
						if(hasFlash("dataMsgError"))	{	?>
							<br/>
							<div class="alert alert-warning alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgError"); ?>
							</div>
						<?php	}	?>

							<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
								<div class="table-responsive">
						
									<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Name</th>  
												<th>Community Description</th>  
												<th>Status</th>
												<!--<th>Community Topics</th>
												<th>Latest Topics</th>    -->
												<th>Send Invite</th>  
												<th>Active User List</th>  
												<th>In-Active User List</th>  
												
												<!--<th>Action</th>-->
											</tr>
										</thead>
										<tbody>
										<?php 
// print_r($community_list);
										if($community_list >0){ $i=1;
												foreach($community_list as $row){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><a href="<?= base_url('customer/forum/verify_invitecode/' . $forum->slug) ?>"><?=$row['title'] ?></a></td>
													<td><?=$row['description'] ?></td>
													<td><? if($row['status']=='H'){
														echo "Waiting";
													}elseif($row['status']=='A'){
														echo "Accept";
													}else{
														echo "Reject";
													}?></td>
													
													<!--<td><?php foreach($forum->topic->title as $product) 
										{
       											 echo $product->title.'<br>';
       									}?></td>
													<td><?php if ($forum->latest_topic->title !== null) : ?>
										<p>
											<small><a href="<?= base_url($forum->latest_topic->permalink) ?>"><?= $forum->latest_topic->title ?></a><br>by <a href="<?= base_url('user/' . $forum->latest_topic->author) ?>"><?= $forum->latest_topic->author ?></a>, <?= $forum->latest_topic->created_at ?></small>
										</p>
									<?php else : ?>
										<p>
											<small>no topic yet</small>
										</p>
									<?php endif; ?></td>
-->

									<?
								/*if($_SESSION['CustomerID'] == $data['Moderator'])
								{*/
									?><td>
									<?php 
										if($row['status']=='A'){
									?>
										<a href="<?= site_url()."customer/forum/send_invite_code/". $row['slug'] ?>" class="btn btn-xs btn-success">Invite</a>
										<a class="btn btn-xs btn-primary" href="<?= site_url()."customer/forum/community_topic/". $row['slug'] ?>">Create Topics</a>
									<?
										}
									?>
									</td>
									 <td><a href="<?=site_url()."community/admin/activeuserlist/".$row['slug']?>">Active Users</button>
													 </td>
													<td><a href="<?=site_url()."community/admin/inactiveuserlist/".$row['slug']?>">InActive Users</button></td>

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
												echo "<tr><td colspan='4'>Record not found</td></tr>";
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
