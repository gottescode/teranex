 <?php $this->template->contentBegin(POS_TOP);?>
 <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
 <?php $this->template->contentEnd();	?> 
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
	<?php	}	?>
	
		<!-- form -->
		<div class="col-xs-12"> 
			<form class="form-horizontal" role="form" action="" id="event_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="event_name">Event Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="event_name" id="event_name" class="form-control required" value="<?=$event_data['event_name']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="event_description">Event Description:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="event_description" id="event_description" class="form-control required" ><?=$event_data['event_description']?></textarea>
					</div>
				  </div> 
				   <div class="form-group">
				   	 <label class="control-label col-sm-3" for="event_start_date">Level :<span class="star">*</span></label>
					<div class="col-sm-6">
						<select class="form-control input-form required" id="event_level" name="event_level">
							<option value="">Select Level</option>
							<option value="Beginner" <?php if($event_data['event_level']){echo "selected";}?>>Beginner </option>
							<option value="Intermediate" <?php if($event_data['event_level']){echo "selected";}?>>Intermediate</option>
							<option value="Advanced" <?php if($event_data['event_level']){echo "selected";}?> >Advanced</option>
						</select>	
					</div>
				 </div>
				   <div class="form-group">
				   	 <label class="control-label col-sm-3" for="event_start_date">Event Price:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="event_price" id="event_price" class="form-control required" value="<?=$event_data['event_price']?>">
					</div>
				 </div>
				   <div class="form-group">
				   	 <label class="control-label col-sm-3" for="event_start_date">Event Start Date:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="event_start_date" id="datepicker" class="form-control required" value="<?=$event_data['event_start_date']?>">
					</div>
				 </div>
				<!--  <div class="form-group">
					<label class="control-label col-sm-3" for="event_end_date">Event End Date:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="event_end_date" id="datepicker1" class="form-control required" value="<?=$event_data['event_end_date']?>">
					</div>
				  </div>-->
 				  <div class="form-group">
					<label class="control-label col-sm-3" for="event_start_time">Event Start Time::<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="event_start_time" id='timepicker' class="form-control  required" value="<?=$event_data['event_start_time']?>">
					</div>
				  </div>
					<div class="form-group">
						<label class="control-label col-sm-3" for="event_end_time">Event End Time::<span class="star">*</span></label>
						<div class="col-sm-6">
						<input type="text" name="event_end_time" id="timepicker1" class="form-control required" value="<?=$event_data['event_end_time']?>">
						</div>
					</div>
				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $event_data['event_id']?>"  > 
					  <input type="hidden" name="event_cat_id" value="<?php echo $event_cat_id?>"  > 
					</div>
				  </div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js" type="text/javascript" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>

<script> 
 $(function() {
               $("#datepicker,#datepicker1").datepicker({ dateFormat: "yy-mm-dd" }).val()
       });
	
	 </script>
<script type="text/javascript">
            $(function () {
                $('#timepicker,#timepicker1').datetimepicker({
                   format: 'HH:mm'
                });
            });
        </script>
<script> 

$("#event_form").validate({
   rules: {  
			   event_name:{
				   required:true
			   },
				event_description:{
				   required:true
			   },
			   event_start_date:{
				   required:true
			   },
			   event_end_date:{
				   required:true
			   },
			   event_start_time:{
				   required:true
			   },
			   event_end_time:{
				   required:true
			   },
			},
			messages: { 
				event_name:{
				   required:"Please enter event name"
			   },
				event_cat_description:{
				   required:"Please enter event description"
			   },
			   event_start_date:{
				   required:"Please select even start date"
			   },
			   event_end_date:{
				   required:"Please select event end date"
			   },
			   event_start_time:{
				   required:"Please select start time"
			   },
			   event_end_time:{
				   required:"Please select end time"
			   },
			}
});  


CKEDITOR.replace( 'event_description' );
CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 