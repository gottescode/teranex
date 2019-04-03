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
					<label class="control-label col-sm-3" for="online_feature_name">Online Feature Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="online_feature_name" id="online_feature_name" class="form_bor_bot required" value="<?=$RapidprototypingOnlineFeatures_list['online_feature_name']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="online_feature_description">Online Feature Description:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="online_feature_description" id="online_feature_description" class="form-control required" ><?=$RapidprototypingOnlineFeatures_list['online_feature_description']?></textarea>
					</div>
				  </div> 

				<!--   <div class="form-group">
					<label class="control-label col-sm-3" for="additive_manufacturing_image">Additive Manufacturing Image :<span class="star">*</span> </label>
					<div class="col-sm-6">
					<input type="file" name="additive_manufacturing_image" id="additive_manufacturing_image" class=""  >
					 <?php if($additiveManufacturing_list['additive_manufacturing_image']){?>
					  <img src="<?=site_url().'/uploads/digitalmanufacturing/'.$additiveManufacturing_list['additive_manufacturing_image']?>" width="100px">
					  <input type="hidden" id="old_image" name="old_image"  value="<?=$additiveManufacturing_list['additive_manufacturing_image']?>">
					  <?php }?>
					</div>
				  </div>  -->
				  
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $RapidprototypingOnlineFeatures_list['online_feature_id']?>"  > 
			
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
			   online_feature_name:{
				   required:true
			   },
				online_feature_description:{
				   required:true
			   },
			  
			},
			messages: { 
			online_feature_name:{
				   required:"Please enter feature name"
			   },
			online_feature_description:{
				   required:"Please enter feature description"
			   },
			  
			}
});  


CKEDITOR.replace( 'case_study_description' );
</script> 
<?php $this->template->contentEnd();	?> 