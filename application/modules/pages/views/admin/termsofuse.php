<?php $this->template->contentBegin(POS_TOP);?>
 <script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script> 
 <?php $this->template->contentEnd();	?> 
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Terms Of Use</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class=""><a href="">Terms Of Use</a></li>
	
  </ol>
</section>
	 <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<?php 	// display messages
						if(hasFlash("dataMsgSuccess"))	{	?>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgSuccess"); ?>
							</div>
				<?php	}	?>
				<div class="box-body"> 
					<div class="padd-15"></div>
					<form id="termsofuse" name="termsofuse" class="form-horizontal" enctype="multipart/form-data" method="post">
						<div class="form-group">
							<label class="control-label col-sm-3" for="description">Description :<span class="star">*</span></label>
							<div class="col-sm-8">
							<textarea name="description" id="description" class="form-control required" ></textarea>
							</div>
						</div> 
						<div class="form-group"> 
							<div class="text-center">
							 	<input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary">
							  	<input type="hidden" name="id" value=""  > 
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>			
</section> 
</div>
	
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> 
<script> 

$("#termsofuse").validate({
	ignore : [],
   rules: {  
				description:{
				   required:true
			   },
			},
		messages: { 
			description:{
				required:"Please enter description"
			},
		}
});  

CKEDITOR.replace( 'description' );
CKEDITOR.replace( 'key_features' );
</script> 
<?php $this->template->contentEnd();	?> 