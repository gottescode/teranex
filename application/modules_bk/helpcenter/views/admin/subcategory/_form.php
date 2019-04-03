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
			<form class="form-horizontal" role="form" action="" id="subcategory_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="sub_cat_name">Sub Category Name:<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="sub_cat_name" id="sub_cat_name" class="form-control required" value="<?=$subcat_data['sub_cat_name']?>">
					</div>
				  </div> 
				   
				   <div class="form-group">
					<label class="control-label col-sm-3" for="sub_cat_description"> Description:<span class="star">*</span></label>
					<div class="col-sm-8">
					<textarea   name="sub_cat_description" id="sub_cat_description" class="form-control required" ><?=$subcat_data['sub_cat_description']?></textarea>
					</div>
				  </div> 
				  
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $subcat_data['sub_cat_id']?>"  > 
					  <input type="hidden" name="helpcenter_category_id" value="<?php echo $helpcenter_category_id ?>"  > 
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

$("#subcategory_form").validate({
	ignore: [],
   rules: {  
			   sub_cat_name:{
				   required:true
			   },
				sub_cat_description:{
				   required:true
			   },
			 
			},
			messages: { 
				sub_cat_name:{
				   required:"Please enter Help center Sub Category name"
			   },
				sub_cat_description:{
				   required:"Please enter Help center Sub Category description"
			   },
			  
			  
			}
});  


CKEDITOR.replace( 'sub_cat_description' );

</script> 
<?php $this->template->contentEnd();	?> 