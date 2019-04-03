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

			<form class="form-horizontal" role="form" action="" id="event_form" method="post" enctype="multipart/form-data">

				<fieldset>

				   <div class="form-group">

					<label class="control-label col-sm-3" for="report_name">Report Name:<span class="star">*</span></label>

					<div class="col-sm-6">

					<input type="text" name="report_name" id="report_name" class="form_bor_bot required" value="<?=$research_data['report_name']?>">

					</div>

				  </div> 

				    <div class="form-group">

				   	 <label class="control-label col-sm-3" for="report_single_price">Report Single User Price:<span class="star">*</span></label>

					<div class="col-sm-6">

					<input type="text" name="report_single_price" id="report_single_price" class="form_bor_bot numbersOnly required" value="<?=$research_data['report_single_price']?>">

					</div>

				 </div>

				 <div class="form-group">

				   	 <label class="control-label col-sm-3" for="report_corporate_price">Report Corporate Price:<span class="star">*</span></label>

					<div class="col-sm-6">

					<input type="text" name="report_corporate_price" id="report_corporate_price" class="form_bor_bot numbersOnly required" value="<?=$research_data['report_corporate_price']?>">

					</div>

				 </div>





				   <div class="form-group">

				   	 <label class="control-label col-sm-3" for="report_date">Report Date:<span class="star">*</span></label>

					<div class="col-sm-6">

					<input type="text" name="report_date" id="datepicker" class="form_bor_bot required" value="<?=$research_data['report_date']?>">

					</div>

				 </div>



				   <div class="form-group">

					<label class="control-label col-sm-3" for="report_description">Report Description:<span class="star">*</span></label>

					<div class="col-sm-8">

					<textarea   name="report_description" id="report_description" class="form-control required" ><?=$research_data['report_description']?></textarea>

					</div>

				  </div> 

				   

				      <div class="form-group">

					<label class="control-label col-sm-3" for="report_table_of_content">Report Table Of Content:<span class="star">*</span></label>

					<div class="col-sm-8">

					<textarea   name="report_table_of_content" id="report_table_of_content" class="form-control required" ><?=$research_data['report_table_of_content']?></textarea>

					</div>

				  </div> 



				     <div class="form-group">

					<label class="control-label col-sm-3" for="report_tables_figures">Report Table Figures:<span class="star">*</span></label>

					<div class="col-sm-8">

					<textarea   name="report_tables_figures" id="report_tables_figures" class="form-control required" ><?=$research_data['report_tables_figures']?></textarea>

					</div>

				  </div> 



				     <div class="form-group">

					<label class="control-label col-sm-3" for="report_customization_option">Report Customization Option:<span class="star">*</span></label>

					<div class="col-sm-8">

					<textarea   name="report_customization_option" id="report_customization_option" class="form-control required" ><?=$research_data['report_customization_option']?></textarea>

					</div>

				  </div> 

				



					<div class="form-group">

					<label class="control-label col-sm-3" for="report_image">Image:<span class="star">*</span> </label>

					<div class="col-sm-6">

					<input type="file" name="report_image" id="report_image" class="" accept="image/*" >

					 <?php if($research_data['report_image']){?>

					  <img src="<?=site_url().'/uploads/research/'.$research_data['report_image']?>" width="100px">

					  <input type="hidden" id="old_image" name="old_image"  value="<?=$research_data['report_image']?>">

					  <?php }?>

					</div>

				  </div> 



				 

				  <div class="form-group"> 

					<div class="col-sm-offset-4 col-sm-5">

					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 

					  <input type="hidden" name="id" value="<?php echo $research_data['report_id']?>"  > 

					  <input type="hidden" name="report_category_id" value="<?php echo $report_category_id ?>"  > 

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

               $("#datepicker,#datepicker1").datepicker({ dateFormat: "dd-mm-yy" }).val()

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

jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});

$("#event_form").validate({
ignore:[],
   rules: {  

			   report_name:{
				   required:true
			   },
			   report_single_price:{
				   required:true
			   },
report_corporate_price:{
				   required:true
			   },
report_date:{
				   required:true
			   },
report_table_of_content:{
				   required:true
			   },
report_tables_figures:{
				   required:true
			   },
report_customization_option:{
				   required:true
			   },
report_image:{
				   required:true
			   },
				report_description:{

				   required:true

			   },

		

			},

			messages: { 

				report_name:{

				   required:"Please enter report name"

			   },
			   report_single_price:{
				   required:"Please enter single user price"
			   },
report_corporate_price:{
				   required:"Please enter corporate price"
			   },
report_date:{
				   required:"Please select date"
			   },
report_table_of_content:{
				   required:"Please enter table of content"
			   },
report_tables_figures:{
				   required:"Please enter report table figures"
			   },
report_customization_option:{
				   required:"Please enter customization option"
			   },
report_image:{
				   required:"Please select report image"
			   },
				report_description:{

				   required:"Please enter report description"

			   },

			 

			}

});  





CKEDITOR.replace( 'report_description' );

CKEDITOR.replace( 'report_table_of_content' );

CKEDITOR.replace( 'report_tables_figures' );

CKEDITOR.replace( 'report_customization_option' );

CKEDITOR.replace( 'key_features' );

</script> 

<?php $this->template->contentEnd();	?> 