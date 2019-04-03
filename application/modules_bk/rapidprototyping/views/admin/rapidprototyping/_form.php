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
		<div class="col-xs-12 border_bot"> 
			<form class="form-horizontal" role="form" action="" id="casestudy_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="rapid_prototyping_name">Rapid Prototyping Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="rapid_prototyping_name" id="rapid_prototyping_name" class="form_bor_bot required" value="<?=$Rapidprototyping_list['rapid_prototyping_name']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="rapid_prototyping_description">Rapid Prototyping Description:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="rapid_prototyping_description" id="rapid_prototyping_description" class="form-control required" ><?=$Rapidprototyping_list['rapid_prototyping_description']?></textarea>
					</div>
				  </div> 

				  <div class="form-group">
					<label class="control-label col-sm-3" for="rapid_prototyping_image">Rapid Prototyping Image: </label>
					<div class="col-sm-6">
					<input type="file" name="rapid_prototyping_image" id="rapid_prototyping_image" class=""  >
					 <?php if($Rapidprototyping_list['rapid_prototyping_image']){?>
					  <img src="<?=site_url().'/uploads/additivemanufacturing/'.$Rapidprototyping_list['rapid_prototyping_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$Rapidprototyping_list['rapid_prototyping_image']?>">
					  <?php }?>
					</div>
				  </div> 
				  
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $Rapidprototyping_list['rapid_prototyping_id']?>"  > 
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

$("#casestudy_form").validate({
   rules: {  
			   rapid_prototyping_name:{
				   required:true
			   },
				rapid_prototyping_description:{
				   required:true
			   },
			  
			},
			messages: { 
				rapid_prototyping_name:{
				   required:"Please enter rapid prototyping name"
			   },
				rapid_prototyping_description:{
				   required:"Please enter rapid prototyping description"
			   },
			  
			}
});  


CKEDITOR.replace( 'case_study_description' );
</script> 
<?php $this->template->contentEnd();	?> 