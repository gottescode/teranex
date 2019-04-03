 <?php $this->template->contentBegin(POS_TOP);?> 
 <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
 <?php $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Remote Application Service Invoice</li>
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
    <!-- <div class="col-sm-8 col-lg-10">
      <ul>
		<li><?=$course_data['name']?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="col-md-10 col-sm-12 col-xs-12 ">  
	<?php 	// display messages
		if(hasFlash("dataMsgAddSuccess"))	{	?>
			<div class="alert alert-success alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgAddSuccess"); ?>
			</div>
<?php }
		if(hasFlash("dataMsgAddError"))	{	?>
			<div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			  <?php echo getFlash("dataMsgAddError"); ?>
			</div>
<?php }	?>

		<?php if($invoiceList){?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC">
						<th>Sr.No.</th>
						<th>Start Date</th>  
						<th>End Date</th>  
						<th>Star Time</th>  
						<th>Total Hrs</th>  
						<th>Total Amount</th>  
					</tr>
				</thead>
				<tbody>
						<?php
						
						if($invoiceList >0){ $i=1;
							foreach($invoiceList  as $rowData){
							?>
							<tr>
								<td><?=$i?></td>
								<td><?=$rowData['start_date']?></td>   
								<td><?=$rowData['end_date']?></td>   
								<td><?=$rowData['star_time']?></td>   
								<td><?=$rowData['total_hours']?></td> 
								<td><?=$rowData['total_amount']?></td>   
							</tr>
						
						<?php $i++; } 
						} ?>
				</tbody>
			</table>
	 
	<?php	}
		else{		?>
			<br/><br/>
		<div class="border_bot" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
			<form class="form-horizontal" role="form" action="" id="course_form" method="post" enctype="multipart/form-data">
				<fieldset>
					<div class="form-group">
						<label class="control-label col-sm-3" for="datepicker"> Start Date:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="start_date" id="datepicker" class="form_bor_bot required" value="">
						</div>
					</div>			  
					<div class="form-group">
						<label class="control-label col-sm-3" for="datepicker1"> End Date:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="end_date" id="datepicker" class="form_bor_bot required" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="timepicker">Start Time:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="star_time" id='timepicker' class="form_bor_bot  required" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="timepicker1">End Time:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="end_time" id="timepicker1" class="form_bor_bot required">
						</div>
					</div>
					
					<div class="form-group">
						<label class="control-label col-sm-3" for="timepicker1">Total Hours:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="total_hours" id="total_hours" class="form_bor_bot required" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="timepicker1">Total Amounts:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="total_amount" id="total_amount" class="form_bor_bot required" value="">
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
		<?php }?>
<!-- /.row -->  
<?php $this->template->contentBegin(POS_BOTTOM);?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
 $(function () {
		$("#datepicker,#datepicker1").datepicker({ dateFormat: "dd-mm-yy",minDate: 0,changeMonth:true,changeYear: true, maxDate: "+2M" }).val();
		$('#timepicker,#timepicker1').datetimepicker({
			format: 'HH:mm', 
		});
	});
});
$("#course_form").validate({ 
        rules: { 
            start_date:{
            	required:true
            },
            end_date:{
            	required:true
            },
            star_time:{
            	required:true
            },
            end_time:{
            	required:true
            },
            total_hours:{
            	required:true
            },
            total_amount:{
            	required:true
            },
        },
		messages: { 
			start_date:{
            	required:"Please select start date"
            },
            end_date:{
            	required:"Please select end date"
            },
            star_time:{
            	required:"Please select start time"
            },
            end_time:{
            	required:"Please select end time"
            },
            total_hours:{
            	required:"Please enter total time"
            },
            total_amount:{
            	required:"Please enter total amount"
            },
           
        }
   });
</script>
<?php $this->template->contentEnd();	?> 