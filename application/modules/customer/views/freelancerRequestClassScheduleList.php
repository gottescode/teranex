 <?php 

 $this->template->contentBegin(POS_TOP);?> 
 <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css">
 <?php $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Freelancer Schedule</li>
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
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  
			<?php 	// display messages
			if(hasFlash("dataMsgWizSuccess"))	{	?>
				<div class="alert alert-success alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgWizSuccess"); ?>
				</div>
			<?php }
			if(hasFlash("dataMsgWizError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgWizError"); ?>
				</div>
			<?php }	?>
			<div class="border_bot">
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
			</div>
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
							<td>Launch</td>
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
									<td><a href="<? echo $rowData['start_url'];?>" class="btn btn-xs btn-success">Launch Meeting</a></td>  
								
									
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
		</div> <div class="clearfix"></div>
	</div>
</div>
<!-- /.row -->  
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