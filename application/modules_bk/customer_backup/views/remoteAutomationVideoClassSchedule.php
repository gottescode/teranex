 <?php 

 $this->template->contentBegin(POS_TOP);?> 
 <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
 <?php $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Remote Class Class  List</li>
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
   <!--  <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
		<li><?=$course_data['name']?></li>
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
						<label class="control-label col-sm-3" for="datepicker">Class Title:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="class_title" id="class_title" class="form_bor_bot required" value="">
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="datepicker">Event Start Date:<span class="star">*</span></label>
						<div class="col-sm-6">
							<input type="text" name="courseStartDate" id="datepicker" class="form_bor_bot required" value="<?=date_dmy($course_data['course_start_date'])?>">
						</div>
					</div>
				<!--  <div class="form-group">
					<label class="control-label col-sm-3" for="datepicker1">Event End Date:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="course_end_date" id="datepicker1" class="form-control required" value="<?=$course_data['course_end_date']?>">
					</div>
				  </div>-->
 				  <div class="form-group">
					<label class="control-label col-sm-3" for="timepicker">Event Start Time:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="course_start_time" id='timepicker' class="form_bor_bot required" value="<?=$course_data['course_start_time']?>">
					</div>
				  </div>
					<div class="form-group">
					<label class="control-label col-sm-3" for="timepicker1">Event End Time:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="course_end_time" id="timepicker1" class="form_bor_bot required" value="<?=$course_data['course_end_time']?>">
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
		if($scheduleList)
		{
		?>
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td> <td>Start Date</td><td>Title</td><td>Start Time</td>  <td>End Time</td><td>Launch</td></tr>
				</thead>
				<tbody>
						<?php
						$SNo = 1;
						foreach($scheduleList  as $rowData)
						{
							?>
							<tr>
								<td><? echo $SNo;?></td> 
								<td><? echo  date_dmy($rowData['startDate']);?></td>
								<td><? echo $rowData['class_title'];?></td>  
								<td><? echo $rowData['start_time'];?></td>
								<td><? echo $rowData['end_time'];?></td>
								<td><?php  
									$scheduleTIme=  strtotime(date('Y-m-d H:i')); 
									$dateS=date( $rowData['startDate']." ".$rowData['start_time']);
									$schedulrTIme =   strtotime($dateS); 
									if($scheduleTIme > $schedulrTIme ){
								?> <a href="<?php echo site_url()."customer/tokboxLunchVideo/".$rowData['id']?>" target="_blank"  class="btn btn-xs btn-primary" >Launch</a></td>
									<?php }?>
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
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
 $(function () {
		$("#datepicker").datepicker({ dateFormat: "dd-mm-yy",minDate: 0, maxDate: "+2M" }).val()
		$('#timepicker,#timepicker1').datetimepicker({
			format: 'HH:mm', 
		});
	});
});
$("#course_form").validate({
			   rules: {	
				   	class_title:{
                    	required:true
				},
					courseStartDate:{
	                    required:true
				},
					course_start_time:{
	                    required:true
				},
					course_end_time:{
	                    required:true
				},
			},
			   messages: {
			   		class_title:{
                    	required:"Please enter class title"
				},
					courseStartDate:{
	                    required:"Please select course start date"
				},
					course_start_time:{
	                    required:"Please select course start time"
				},
					course_end_time:{
	                    required:"Please select course end time"
				},

        	}
					 
	 });

</script>
<?php $this->template->contentEnd();	?> 