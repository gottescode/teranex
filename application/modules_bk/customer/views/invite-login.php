<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Verify invite code</li>
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
		<div class="col-xs-6 col-sm-9 col-md-9 col-lg-offset-2 col-lg-8 col-flex">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
		<?php	}	?>
	        <div class="col-md-6 col-md-offset-1">
	            <div class="login-panel panel panel-default">
	                <div class="panel-heading text-center" style="padding: 10px;">
	                    <h3 class="panel-title" >Join community With Invite Code </h3>
	                </div>
	                <div class="panel-body">
	     	            <form role="form" method="post" onsubmit="return checkEmptyInput();" action="<?php site_url('customer/forum/verify_invitecode/'.$forum_slug)?>">
	                    	 <fieldset>
	                            <div class="form-group">
	                                <input class="form-control" id="community_invite_code" placeholder="Community invite code" name="community_invite_code" type="text" autofocus>
	                            </div>
	                            <div class="form-group">
	                              
	                                <input class="form-control" type="hidden" name="community_id" value="<?php echo  $community_id;?>" />
	                            </div>
	                           
	                            <input id="login-submit" type="submit" value="Join Community" class="btn btn-success btn-block">
	                        </fieldset>
	                    </form>
	                </div>
	          </div>
			</div>
		</div>
		<div class="clearfix"></div>
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
	
