
<div class="content-wrapper">
    <section class="content-header">
      <h1>
      Setting
      </h1>
     
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Profile Setting</h3>
            </div>
			<div class="box-body">
				<div class="col-xs-12">
     		<?php	if(hasFlash("dataMsgSuccess"))	{	?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("dataMsgSuccess"); ?>
						</div>
			<?php	} 	?>
				
				<!-- form --> 
							<form id="update_profile" name="change_password" class="form-horizontal" enctype="multipart/form-data" method="post">
												<fieldset>
										<legend>Edit Profile </legend>					
												<div class="form-group">
													<label class="col-md-3 control-label" for="text-field">Name &nbsp;<span class="red">*</span>:</label>
													<div class="col-md-4">
														<input type="text" id="a_name" name="a_name" class="form-control required" value="<?php echo $result['a_name'];?>">
													</div>
												</div>
												
												<div class="form-group">
													<label class="col-md-3 control-label" for="text-field">Username &nbsp;<span class="red">*</span>:</label>
													<div class="col-md-4">
														<input type="text" id="a_email" name="a_email" class="form-control" value="<?php echo $result['a_email'];?>" readonly>
													</div>
												</div>
										
										 
											<div class="form-group">
												<label class="col-md-3 control-label" for="profile_img">Profile image <span class="red">*</span>:</label>
												<div class="col-md-8"> 
												  <input type="file" id="profile_img" name="profile_img" class="" >
											 <img src="<?=site_url().'uploads/admin_profile_img/'.$result['user_profile_pic'];?>" width="100px"style="margin-top:10px;">
												  
												  <input type="hidden" id="old_image" name="old_image"  value="<?=$result['user_profile_pic']?>">
												</div>
											</div>
																		
											<input type="hidden" id="id" name="id" value="<?=$result['id']?>">
											<div class="form-group">
												<div class="col-md-offset-3 col-md-8">
													<button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button> 
												</div>
											</div>
											</fieldset>	
										</form>
				
				</div>
			</div>
			</div>
	  </div>
	</div>
	</section>
</div> 
<!-- /page content -->

<!-- form validation -->
<?php $this->template->contentBegin(POS_BOTTOM);	?>  
    <script src="<?=$theme_url;?>/js/jquery.validate.min.js"></script>
    <script src="<?=$theme_url;?>/js/admin_setting_validation.js"></script>
<?php echo $this->template->contentEnd();	?>                               
	