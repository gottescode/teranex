 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">community</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<!-- <li class=""><a href="<?=site_url()."community/admin"?>">community</a></li> -->
			<li class=""active>Community</li>
			
		  </ol>
		</section>
	 <!-- Main content -->
		<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="padd-15">
							<a href="<?=site_url()."community/admin/create"?>" class="btn btn-info" role="button">Add community</a>
						</div>
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
												<th>User Name </th>  
												<th>Title</th>  
												<th>Community Description</th>  
												<th>Publish</th>  
												<th>Action</th>
												<!--<th>Send Invite</th>-->
												<th>Active User List</th> 
												<th>InActive User List</th>  
												<th>Status</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
											if($community_list >0){ $i=1;
												foreach($community_list  as $rowData){
												?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$rowData['u_name']?></td>
													<td><?=$rowData['title']?></td>
													<td><?=$rowData['description']?></td>

													<td><input type="checkbox" name="publish_<?=$rowData['id']?>" value="Y" <?php if($rowData["publish"] == 'Y') echo "checked"; ?> ></td>  
													<td><a href="<?=site_url()."community/admin/update/".$rowData['id']?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."community/admin/delete/".$rowData['id']?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>&nbsp; &nbsp;
														<a href="<?=site_url()."community/admin/create"?>" aria-haspopup="true" title="Create"><i style="" class="fa fa-plus-square"></i></a>
											<input  type="hidden" name="id[]" value="<?php echo $rowData["id"]; ?>">
									<?php if($rowData['status']=='H'){
														?>
													<button type="button" name="" id="accept_<?=$i?>" comm-id="<?=$rowData['id']?>" class="btn btn-success btn-xs accept_comm">Accept</button>
													<button type="button" name="" id="reject_<?=$i?>" comm-id="<?=$rowData['id']?>" class="btn btn-danger btn-xs reject_comm">Reject</button>
													<?
													}elseif($rowData['status']=='A'){
														?>
													<button type="button" name="" id="reject_<?=$i?>" comm-id="<?=$rowData['id']?>" class="btn btn-danger btn-xs reject_comm">Reject</button>
													<? }elseif($rowData['status']=='R'){ ?>
													<button type="button" name="" id="accept_<?=$i?>" comm-id="<?=$rowData['id']?>" class="btn btn-success btn-xs accept_comm">Accept</button>
												
													<?php } ?>
													</td> 
													<!--<td><a href="<?=site_url()."community/admin/send_invite_code/".$rowData['slug']?>">Invite</a></td>-->
													<td><a href="<?=site_url()."community/admin/activeuserlist/".$rowData['id']?>">Active Users</a ></td>
													<td><a href="<?=site_url()."community/admin/inactiveuserlist/".$rowData['id']?>">InActive Users</a ></td>
													<td><?php if($rowData['status']=='A'){ echo "Accepted"; }else if($rowData['status']=='R'){ echo "Rejected";	}else{
														 echo "Hold";
													}?></td>
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
	<table>
                <tr>
                    <th><center><input type="radio" name="id"></center></th>
                    
                    <th><center>Moderator Name</center></th>
                   
                </tr>
                <?php foreach($userList as $rows):?>
                <tr>
                    <td><input type="radio" name="id" value="<?php echo $rows['uid'] ?>" <?php echo set_radio('id', '$rows[uid]'); ?>></td>
                    <td><a href="<?php echo site_url('itemView/viewItems/'.$rows['uid']); ?>"><?php echo $rows['uid'] ?></a></td>
                    
                    <td><?php echo $rows['u_name'] ?></td>
                   
    
                    <td><input type="checkbox" <?php if($rows['checkoutAllowed'] == 'Yes') echo " checked='checked' "; ?>></td>
                </tr>
                <?php endforeach; ?>
            </table>


    
     <!--Bootstrap model for edit start-->
    <div id="myModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content" id="model_data">
                  //append form data here
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
	<script>
 function updateItem()
{

    var CHECKBOXIDS = PASS_CHECKBOX_CHECKEDVALUE;
    $('#model_data').html('');
    $.ajax({
        url: "<?php echo site_url('Search/displayItem');?>",
        type: "POST",
        dataType: "html",
        data: {'<?php echo $this->security->get_csrf_token_name(); ?>': '<?php echo $this->security->get_csrf_hash(); ?>', 'checkids': CHECKBOXIDS, },
        catch : false,
        success: function (data) {
            $('#model_data').append(data);

        }
    });
}


/* ACCEPT REJECT Community */
$(".accept_comm").click(function() {
		var comm_id = $(this).attr('comm-id');
		var comm_id_btn = $(this).attr('id');
		$.ajax({
			type : "GET",
			url: "<?php echo site_url();?>community/api/AcceptCommunity/"+comm_id,
			data : { },
			dataType: 'json', 
			success : function(result){ 
				if(result.result){
					$('#'+comm_id_btn).hide();
					alert('Community Accepted Successfully..!!');
					location.reload();
				}else{
					alert('Something Went Wrong..!!Please try Again later..!!');
				}
			}
		});
});
$(".reject_comm").click(function() {
		var comm_id = $(this).attr('comm-id');
		var comm_id_btn = $(this).attr('id');
		$.ajax({
			type : "GET",
			url: "<?php echo site_url();?>community/api/RejectCommunity/"+comm_id,
			data : { },
			dataType: 'json', 
			success : function(result){ 
				if(result.result){
					$('#'+comm_id_btn).hide();
					alert('Community Rejected Successfully..!!');
					location.reload();
				}else{
					alert('Something Went Wrong..!!Please try Again later..!!');
				}
			}
		});
});
</script>
<?php $this->template->contentEnd();	?> 