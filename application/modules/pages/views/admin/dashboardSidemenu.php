
 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
  <style>
  .red{
	  background
  }
  </style>
  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Dashboard Menu List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Dashboard Menu List </a></li>			
		  </ol>
		</section>
		<?
		$menuList = $menuList;
		$comment = array();
		foreach ($menuList as $old_key => $asset)
		{	
			$new_key = $asset['menu_id'];
			$comment[ $new_key ] = $asset;
			//$topic_id = $asset['topic_id'];
		}
		$menuList = $comment;
		// now loop your menuList list, and everytime you find a child, push it 
		//   into its parent
		foreach ($menuList as $k => &$v) {
		  if ($v['parent_id'] != 0) {
			$menuList[$v['parent_id']]['childs'][] =& $v;
		  }
		}
		unset($v);

		// delete the childs menuList from the top level
		foreach ($menuList as $k => $v) {
		  if ($v['parent_id'] != 0) {
			unset($menuList[$k]);
		  }
		}
		
		// now we display the menuList list, this is a basic recursive function
	function display_menuList(array $menuList, $level = 0) {
		
		foreach ($menuList as $info) {
	?>		
		<tr >
		
			<td><?php if($level!=0){  }else{ echo $info['menu_desc']; } ?> </td>
			<td><? if($level!=0){ echo $info['menu_desc']; }else{ echo "-"; } ?></td>
			<td><?php echo $info['menu_for']; ?></td>	
			<td><input type="checkbox" class="menuaccess" name="menuaccess[]" id="menuaccess_<?php echo $info['menu_id'];?>" value="<?php echo $info['menu_id'];?>"><input  type="hidden" name="id[]" value="<?php echo $info["menu_id"]; ?>">
			</td>			
		
		<? if (!empty($info['childs'])) { ?>
		
		
			<? 
				display_menuList($info['childs'], $level +1);
			?>
			
		  <?
			}
		?>		
		</tr>
	<?	} 
	}
	?>
	 <!-- Main content -->
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
							<div class="form-group col-sm-12">
								<label class="col-sm-2 control-label">Type:</label>
								<div class="col-sm-3">
									<select class=" form-control" name="type" id="userType">
										<option value="0">Select Type</option>
										<?php foreach($userTypeList as $row){
										?>
										<option value="<?php echo $row['id'];?>"><?php echo $row['userType'];?></option>
										<?php
										} ?>
									</select>
								</div>
								<label class="col-sm-2 control-label">Role:</label>
								<div class="col-sm-3">
									<select class=" form-control mySelect" name="role" id="mySelect">
										<option value="0">Select Type</option>
									</select>
								</div>
							</div>
							<div class="clearfix"></div><br/>
								<div class="table-responsive">
									<table class="table table-bordered table-striped" id="">
										<thead>
											<tr>
												<th>Menu</th>
												<th>Sub Menu</th> 
												<th>Menu For</th> 
												<th>Access</th>
											</tr>
										</thead>
										<tbody>
										<tr>
											
												<th colspan ="3" class="text-right"> All Check</th>
												<th><input type="checkbox" class="checkAll"  id="checkAll" value=""></th>
										
										</tr>
										<?php 
											display_menuList($menuList); 
										?>
										</tbody>
										<tr>
											<td colspan="4">
												<input  type='submit' class="btn btn-primary pull-right" name='btnSubmit' value='Update'>
											</td>
										</tr>
									</table>  
								</div>
							</form>
						</div>
						
	
					<div class="col-md-12">
						
					</div>
					</div>
				</div>
			</div>			
		</section> 
	</div>	
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
		$("#dashboardMenutable").DataTable({
	});	
	}); 
	
	$("#checkAll").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
});
	var url = "<?php echo site_url()."pages/adminapi/getUserRole?userType="?>";
	$("#userType").change(function () {
		var value = $(this).val();
		$(".menuaccess").prop('checked',false);
	      $.ajax({
					type: "get",
					url: "<?php echo site_url()."pages/adminapi/getUserRole"?>",
					data: {id:value},
					success: function(result){
					//console.log(result);
					if(result==0){
						$('#mySelect').empty();
						$(".menuaccess").prop('checked',false);
					}
					$('#mySelect').empty();
					$('#mySelect')
								.append($("<option></option>")
								.attr("value",0)
								.text('Select Role Type'));
						$.each(result.result, function(i, value) {   
								$('#mySelect')
								.append($("<option></option>")
								.attr("value",value.role_id)
								.text(value.roleName)); 
						});
					}
				});
		
	});

	
$(".mySelect").change(function () {
	var userType = $('#userType').val();
	var userRole = $('#mySelect').val();
	console.log("Selected UserTYPE is: "+userType);
	console.log("Selected userRole is: "+userRole);
	$.ajax({
			type: "get",
			url: "<?php echo site_url()."pages/adminapi/getUserAccessRoles"?>",
			data: {user_type:userType,user_role:userRole},
			success: function(result){	
				if(result){
					$(".menuaccess").prop('checked',false);
					$.each(result.result, function(i, value) {   
						var id = value.menu;
						$('#menuaccess_'+id).prop('checked', true);
					});
				}			
			}						
	});
});
   
	</script>
<?php $this->template->contentEnd();	?> 