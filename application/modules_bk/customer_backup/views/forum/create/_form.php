  <div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Form</li>
      </ul>
    </div>
    <div class="col-sm-8 padd-0">
  	<ul>
    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
  	</ul>
</div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <!-- <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
		<li></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div> -->
  </div>
  <!-- /.container --> 
</div>
<div class="row margin_0" style="background-color: #353537;">
		<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="bg_white">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12"> 
			<div class="box-body">
				<div class="col-xs-12">
					<?php 	// display messages
					if(hasFlash("dataMsgError"))	{	?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("dataMsgError"); ?>
						</div>
					<?php	}	?>
			
					<form class="form-horizontal" role="form" action="" id="community_form" method="post" enctype="multipart/form-data">
						<fieldset>
						   <div class="form-group">
							<label class="control-label col-sm-3" for="title">Community Name:<span class="star">*</span></label>
							<div class="col-sm-6">
							<input type="text" class="form-control" id="title" name="title" placeholder="Enter a forum title" value="<?= $title ?>">
							</div>
						  </div> 
						  <div class="form-group">
							<label class="control-label col-sm-3" for="description">Community Description:<span class="star">*</span></label>
							<div class="col-sm-6">
							<textarea rows="6" class="form-control" id="description" name="description" placeholder="Enter short description for the new forum (max 80 characters)"><?= $description ?></textarea>
							</div>
						  </div>
						   <!--<div class="form-group">
							<label class="control-label col-sm-3" for="com_moderator">Community Moderator :<span class="star">*</span></label>
							<div class="col-sm-6">
							<input type="text" name="com_moderator" id="com_moderator" class="form-control required" value="<?=$community_data['com_moderator']?>">
							</div>
						  </div>-->

						  <div class="form-group"> 
							<div class="col-sm-offset-4 col-sm-5">
								<input type="submit" class="btn btn-primary btn_orange" value="Create Community">
							 
							</div>
						  </div>
						</fieldset>
					</form>
					
				</div>
			</div>
		</div> <div class="clearfix"></div>
	</div>
</div>
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
 
<script> 
$("#community_form").validate({
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