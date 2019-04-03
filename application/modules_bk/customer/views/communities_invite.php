<!-- Content Wrapper. Contains page content -->
   <div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Send Invites </li>
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
<!-- /.myprofile-bg dahboard-bg -->




<?php   $this->load->view("cust_side_menu" ); ?> 



<div class="col-md-10 col-sm-12 col-xs-12 ">
		
			<form class="form" name="community_invite_id" id="community_invite_id" method="post" action="">
				<input type="hidden" name="community_id" value="<?php $_GET['community_id'];?>" />
				<div class="form-group col-sm-offset-2 col-sm-7">
					<label class="col-sm-12 contact-label-text">Enter email address with comma as separator and max 10-15 a time</label>
					<div class="col-sm-12">
						<textarea rows="6" name="community_invite_email" type="text" class="form-control" id="Email" value="<?php $_GET['community_invite_email'];?>" placeholder=""></textarea>
					</div>
				</div>
				
				
				<div class="form-group col-sm-12 col-xs-6 text-center">
				   <input type="submit" name="submit" id="submit" class="btn btn-default submit-btn btn_orange" value="Send Invite" />
				</div>
				
			</form>
	
</div>
</div>
<!-- /.row --> 
	  
</div>
<!-- /.container -->

<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#communities").submit(function(){
			
	if($("#Email").val() == "")
	{
		alert("Email address is required");
		return false;
	}
	
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>