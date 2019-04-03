<div class="content-wrapper">
    <section class="content-header">
      <h1>  Setting  </h1>
	</section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box">
            
			<div class="box-body">
				<div class="col-xs-12">                            
				<?php	// display messages
					if(hasFlash("passwordSuccessMsg"))	{	?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("passwordSuccessMsg"); ?>
						</div>
			<?php	}
					else if(hasFlash("passwordErrorMsg")) {	?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("passwordErrorMsg"); ?>
						</div>
			<?php	}	?>
				
				<!-- form --> 
					<form id="change_password" name="change_password" class="form-horizontal" enctype="multipart/form-data" method="post">
						<fieldset>
					<legend>Change Passward</legend>					
						<div class="form-group">
							<label class="col-md-3 control-label" for="text-field">Old Password&nbsp; <span class="red">*</span>:</label>
							<div class="col-md-4">
								<input type="password" id="old_password" name="old_password" class="form-control required">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="text-field">New Password&nbsp; <span class="red">*</span>:</label>
							<div class="col-md-4">
								<input type="password" id="new_password" name="new_password" class="form-control required">
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="text-field">Confirm Password&nbsp; <span class="red">*</span>:</label>
							<div class="col-md-4">
								<input type="password" id="confirm_password" name="confirm_password" class="form-control required">
							</div>
						</div>
						<input type="hidden" id="hidden" name="hidden" class="" value="">
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

<!-- form validation -->
<?php $this->template->contentBegin(POS_BOTTOM);	?>
    
    <script src="<?=$theme_url;?>/js/jquery.validate.min.js"></script>
    <script src="<?=$theme_url;?>/js/change_password_validate.js"></script>
<?php echo $this->template->contentEnd();	?>                               
 