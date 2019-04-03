 
<div class="box-body">
	<div class="col-xs-12">
			<?php   $this->load->view("cust_side_menu" ); ?> 
															
		<!-- form -->
      <div class="col-xs-6 col-sm-9 col-md-9">
			<form class="form-horizontal" role="form" action="" id="community_topic" method="post" enctype="multipart/form-data">
				<fieldset>
               <section class="content-header">
                     <center><h1>Topics</h1></center>
               </section>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="title">Topic Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" class="form-control" id="title" name="title" placeholder="Enter a forum title" value="<?= $title ?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="description">Topic Short Description:<span class="star">*</span></label>
					<div class="col-sm-6">
					<textarea rows="6" class="form-control" id="description" name="description" placeholder="Enter short description for the new forum (max 80 characters)"><?= $description ?></textarea>
					</div>
				  </div>

				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
						<input type="submit" class="btn btn-primary" value="Create Topic">
					 
					</div>
				  </div>
				</fieldset>
			</form> 
      

								<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
									<div class="table-responsive">
	
      									<table class="table table-bordered table-striped" id="community_table">
											<thead>
												<tr>
													<th>Sr.No.</th>
													<th>Topic Name</th>  
													<th>Topic Description</th>  
													<th>Creation Date</th>  
													
												</tr>
											</thead>
											<tbody>
											<?php 
												if($topics->result() >0){ $i=1;
													foreach($topics->result()  as $topic){
													?>
													<tr>
														<td><?=$i++?></td>
														<td><a href="<?= base_url($topic->slug) ?>"><?= $topic->title ?></a></td>
														<td><?= $topic->description ?></td>
                                          <td><?= $topic->created_at ?></td>
														<!--<td><input type="checkbox" name="publish_<?=$rowData['community_id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  -->
														<!--<td><a href="<?=site_url()."community/forum/update/".$rowData['community_id']?>"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
															<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."community/forum/delete_forum/".$forum->id ?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
															
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

<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
<?php $this->template->contentEnd();	?> 