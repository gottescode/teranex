
<div class="content-wrapper">
    <section class="content-header">
      <h1>Spare Order Update Details</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Spare Order Update Details</a></li>
	</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Create Consultant</h3>
            </div>
			 
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
			<form class="form-horizontal" role="form" action="" id="consultant_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="c_email">Email ID :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_email" id="c_email" class="form-control required" value="<?=$consultant_data['c_email']?>">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_mobileno">Mobile No  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_mobileno" id="c_mobileno" class="form-control required" value="<?=$consultant_data['c_mobileno']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="c_name">Consultant Name :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_name" id="c_name" class="form-control required" value="<?=$consultant_data['c_name']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="c_work_experiance">Consultant Work Experiance  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_work_experiance" id="c_work_experiance" class="form-control required" value="<?=$consultant_data['c_work_experiance']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="c_from_date">From Date :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_from_date" id="c_from_date" class="form-control required" value="<?=$consultant_data['c_from_date']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_to_date">To Date :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_to_date" id="c_to_date" class="form-control required" value="<?=$consultant_data['c_to_date']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_company_name">Company Name<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_company_name" id="c_company_name" class="form-control required" value="<?=$consultant_data['c_company_name']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="c_job_profile">Job Profile<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_job_profile" id="c_job_profile" class="form-control required" value="<?=$consultant_data['c_job_profile']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_multiple_experiance">Multiple Experiance <span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_multiple_experiance" id="c_multiple_experiance" class="form-control required" value="<?=$consultant_data['c_multiple_experiance']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="c_total_experiance">Total Experiance <span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_total_experiance" id="c_total_experiance" class="form-control required" value="<?=$consultant_data['c_total_experiance']?>">
					</div>
				  </div>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="c_qualification">Qualification<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_qualification" id="c_qualification" class="form-control required" value="<?=$consultant_data['c_qualification']?>">
					</div>
				  </div>

				 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_languages">Languages<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_languages" id="c_languages" class="form-control required" value="<?=$consultant_data['c_languages']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_languages">Languages<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_languages" id="c_languages" class="form-control required" value="<?=$consultant_data['c_languages']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_key_specification">Key Specialization<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_key_specification" id="c_key_specification" class="form-control required" value="<?=$consultant_data['c_key_specification']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_profile_summary">Profile summary<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_profile_summary" id="c_profile_summary" class="form-control required" value="<?=$consultant_data['c_profile_summary']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_alternate_no">Alternet No<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_alternate_no" id="c_alternate_no" class="form-control required" value="<?=$consultant_data['c_alternate_no']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_date_of_birth">Date Of Birth<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_date_of_birth" id="c_date_of_birth" class="form-control required" value="<?=$consultant_data['c_date_of_birth']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_per_hour_cost">Per Hour Cost<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_per_hour_cost" id="c_per_hour_cost" class="form-control required" value="<?=$consultant_data['c_per_hour_cost']?>">
					</div>
				  </div>
				  <div class="form-group">
					<label class="control-label col-sm-3" for="c_selection_of_expertise">Selection Of Experties<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="c_selection_of_expertise" id="c_selection_of_expertise" class="form-control required" value="<?=$consultant_data['c_selection_of_expertise']?>">
					</div>
				  </div>
				 <div class="form-group">
					<label class="control-label col-sm-3" for="c_pictures">Picture :<span class="star">*</span></label>
					<div class="col-sm-5"> 
					  <input type="file" id="c_pictures" name="c_pictures" class="form-control" accept="image/*">
					  <?php if($consultant_data['project_image']){?>
					  <img src="<?=site_url().'/uploads/consultantFile/'.$supplier_data['c_pictures']?>" width="100px">
					  <input type="hidden" id="old_compnayLogo" name="old_compnayLogo"  value="<?=$supplier_data['c_pictures']?>">
					  <?php }?>
					 
					</div>
				  </div>


				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $consultant_data['id']?>"  > 
					</div>
				  </div>
				</fieldset>
			</form>
			
		</div>
	
	</div>
</div> 

		</div>
	  </div>
	</div>
	</section>
</div> 

<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
 
<script> 
$("#consultant_form").validate({
   rules: {  
				image: "required", 
			},
			messages: { 
				image: "Please Select Image", 
			}
		}); 
var x = 0;
$("#somebutton").click(function () {
	 x++;
  $("#container").append('<div class="form-group"><div class="col-sm-12"><input type="file" class="form-control" name="screenshot_image['+x+']" id="screenshot_image"><input type="hidden" name="image_id['+x+']"></div></div>');
});
</script>

 
<?php $this->template->contentEnd();	?> 
					
					
				