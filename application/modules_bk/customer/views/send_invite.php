
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Send Invites</li>
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



<?php   $this->load->view("cust_side_menu" ); ?> 



<div class="col-md-10 col-sm-12 col-xs-12 supplier-form">
			<form class="form" name="community_invite_id" id="community_invite_id" method="post" action="">
				<!--<input type="hidden" name="community_id" value="<?php $_GET['community_id'];?>" />-->
				<div class="form-group col-sm-6">
					<label class="col-sm-12 contact-label-text">Enter email address with comma as separator and max 10-15 a time</label>
					<div class="col-sm-12">
						<textarea rows="6" name="community_invite_email" type="text" class="form-control" id="Email" value="<?php $_GET['community_invite_email'];?>" placeholder=""></textarea>
					</div>
				</div>
				
				
				<div class="form-group col-sm-12 col-xs-6">
				   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn" value="Send Invite" />
				</div>
				
			</form>
	
</div>
</div>
<!-- /.row --> 
	  
</div>
<!-- /.container -->

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
