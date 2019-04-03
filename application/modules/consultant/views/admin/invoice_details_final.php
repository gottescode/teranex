<div class="content-wrapper">
	<section class="content-header">
	  <span style="font-size: 24px;padding: 10px;">Invoice Details</span>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body"> 		
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
			</div>
		</div>			
	</section> 
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