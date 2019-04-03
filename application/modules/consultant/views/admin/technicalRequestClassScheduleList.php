 	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
 

  <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Technical Service Meeting List</span>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."consultant/admin/technical_services"?>">Technical Service Request</a></li>
		  </ol>
		</section>
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
							<form class="form-horizontal" role="form" action="" id="course_form" method="post" enctype="multipart/form-data">
					<fieldset>
						<div class="form-group">
							<label class="control-label col-sm-3" for="Title">Meeting Title : <span class="star">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="title" id="title" class="form_bor_bot required" value="">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-3" for="datepicker">Meeting Start Date & Time :<span class="star">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="datetimepicker" id="datetimepicker" class="form_bor_bot required" value="">
							</div>
						</div>
							<div class="form-group">
							<label class="control-label col-sm-3" for="Title">Duration (In Minute) : <span class="star">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="duration" id="duration" class="form_bor_bot numbersOnly required" value="">
							</div>
						</div>
					
						<div class="form-group"> 
							<div class="text-center">
							 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary btn_orange">  
							   
							</div>
						</div>
					</fieldset>
				</form>
					 <?php 
			if($reqData)
			{
			?>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC"><td>S.No</td> 
							<td>Title</td>
							<td>Start Date/Time</td>
							<td>Duration</td>
							<td>Meeting Status</td>
							<td>Update Status</td>
							<td>Action</td>
						</tr>
					</thead>
					<tbody>
							<?php
							$SNo = 1;
							foreach($reqData  as $rowData)
							{
								?>
								<tr>
									<td><? echo $SNo;?></td> 
									<td><? echo $rowData['title'];?></td>
									<td><? echo $rowData['start_time'];?></td>
									<td><? echo $rowData['duration'];?></td>  
									<td>
										<?php if($rowData['meeting_status']==='H'){
											echo "STATUS NOT UPDATED";
										}else{
											echo "UPDATED";
										}
										?>

									</td>  
									<td>
										<a href="<? echo site_url()."consultant/admin/meeting_update_status/".$rowData['id']."/".$tech_req_id?>" class="btn btn-xs btn-success">Update Status</a>	
									</td>  
									<td><a href="<? echo $rowData['start_url'];?>" class="btn btn-xs btn-success">Launch</a></td>  
								</tr>
								<?
								$SNo ++;
							}
						?>
					</tbody>
				</table>
			<?php
			}
			?>
		
						</div>
					</div>
				</div>
			</div>			
		</section> 
	</div>
	
<?php $this->template->contentBegin(POS_BOTTOM);?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
 /* $(function () {
		$("#datepicker").datepicker({ dateFormat: "dd-mm-yy",minDate: 0, maxDate: "+2M" }).val()
		$('#timepicker,#timepicker1').datetimepicker({
			format: 'HH:mm', 
		});
	}); */
	
	jQuery('#datetimepicker').datetimepicker({
		minDate:0,
		format:'Y-m-d H:i:s',
	});
});
</script>
<script>  
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
$("#course_form").validate({
   rules: {  
				title:{
					required:true
				},
				datetimepicker:{
					required:true
				},
	 			duration:{
					required:true
				},
			},
			messages: { 
				title:{
					required:"Please enter meeting title"
				},
				datetimepicker:{
					required:"Please select date and time"
				},
	 			duration:{
					required:"Please enter duration"
				}, 
			}
		}); 
</script>
<?php $this->template->contentEnd();	?> 