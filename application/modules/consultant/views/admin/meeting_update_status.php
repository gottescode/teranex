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
							<label class="control-label col-sm-3" for="Title">Status : <span class="star">*</span></label>
							<div class="col-sm-6">
								<select class="form-control col-sm-3" name="meeting_status" >
									<option value="Y">Completed</option>
									<option value="N">Unattended</option>
								</select>
							</div>
						</div>
							<div class="form-group">
							<label class="control-label col-sm-3" for="Title">Description : <span class="star">*</span></label>
							<div class="col-sm-6">
								<input type="text" name="meeting_description" id="meeting_description" class="form-control required" value="">
							</div>
						</div>
					
						<div class="form-group"> 
							<div class="text-center">
							<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary btn_orange">  
							<input type="hidden" name="id" id="id" class="form-control required" value="<?php echo $id?>">
							   
							</div>
						</div>
					</fieldset>
				</form>
		
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