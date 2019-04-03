<div class="container">
	<div class="col-sm-offset-1 col-sm-10">
		<div class="">
		</div>
	</div>
</div>
<style type="text/css">
 	
 </style>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Remote Machine Invoice Details </li>
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
       
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

  	<div class=" row-flex">
	<?php   $this->load->view("cust_side_menu" );  ?> 
		<div class="col-sm-10 ">  
			
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
									<form class="form-horizontal" role="form" action="" id="course_form" method="post" enctype="multipart/form-data">
							<fieldset>
								<div class="form-group">
									<label class="control-label col-sm-3" for="datepicker"> Start Date:<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="start_date" id="start_date" class="form-control required" value="<?=date_dmy($result['start_date'])?>" readonly >
									</div>
								</div>			  
								<div class="form-group">
									<label class="control-label col-sm-3" for="datepicker"> End Date:<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="end_date" id="end_date" class="form-control required" value="<?=date_dmy($result['end_date'])?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="timepicker">Start Time:<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="star_time" id='timepicker' class="form-control  required" value="<?=$result['star_time']?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="timepicker1">End Time:<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="end_time" id="timepicker1" value="<?=$result['end_time']?>"  class="form-control required" readonly>
									</div>
								</div>
								
								<div class="form-group">
									<label class="control-label col-sm-3" for="timepicker1">Total Hours:<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="total_hours" id="total_hours" class="form-control required" value="<?=$result['total_hours']?>" readonly>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="timepicker1">Total Amounts:<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="total_amount" id="total_amount" class="form-control required" value="<?=$result['total_amount']?>">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="">Commission :<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="margin" id="margin" class="form-control required" value="<?=$result['margin']?>">
									</div>
								</div>
								<div class="form-group">
									<label class="control-label col-sm-3" for="timepicker1">Total Amount With %:<span class="star">*</span></label>
									<div class="col-sm-6">
										<input type="text" name="total_amount_perc" id="total_amount_per" class="form-control required" value="<?=$result['total_amount_perc']?>">
									</div>
								</div>
							</fieldset>
						</form>
					</div>
				</div>


<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script type="text/javascript">
	$('.margin').change(function(){
		var margin_percent = $(this).val();
		var total = $('#total_amount').val();
		var per_amount = (parseInt(total)/100)*parseInt(margin_percent);
		var totalAmount = parseInt(per_amount)+parseInt(total);
		$('#total_amount_per').val('');
		$('#total_amount_per').val(totalAmount);
	});
	$('#total_amount').keyup(function(){
		var margin_percent = $('.margin').val();
		var total = $('#total_amount').val();
		var per_amount = (parseInt(total)/100)*parseInt(margin_percent);
		var totalAmount = parseInt(per_amount)+parseInt(total);
		$('#total_amount_per').val('');
		$('#total_amount_per').val(totalAmount);
	});
	</script>
<?php $this->template->contentEnd();	?> 