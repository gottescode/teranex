 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4">
      <ul>
        <li class="myprofile">Update Password</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10">
      <ul>
        <li class="">Welcome  </li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2">
      <ul>
        <li class=""><a href="#">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="container">
  <div class="row row-flex">
<?php   $this->load->view("cust_side_menu" ); ?> 

<div class="col-md-10 col-sm-12 col-xs-12 supplier-form">   
		<form class="form" name="changepassword" id="changepassword" method="post" action="">
			 
			<div class="form-group">
				<div class="col-sm-6">
					<label class="">Old Password <span class="red">*</span></label>
					<input type="text" class="form-control input-form" id="u_password" name="u_password" placeholder="Old Password " value="<? echo $user_data['u_password'];?>"  />
				</div><div class="clearfix"></div>
			</div>
			<div class="form-group">
			     <div class="col-sm-6">
					<label class="">New Password <span class="red">*</span></label>
					<input type="text" class="form-control input-form" id="newpassword" name="new_password" placeholder="New Password" value="<? echo $user_data['newpassword'];?>"  />	        			
	        	 </div>
	        </div>
	        <div class="form-group">
			     <div class="col-sm-6">
					<label class="">Confirm New Password <span class="red">*</span></label>
					<input type="text" class="form-control input-form" id="conf_password" name="conf_password" placeholder="Confirm New Password" value="<? echo $user_data['conf_password'];?>"  />	        			
	        	 </div>
	        </div>
	        		
			 <div class="clearfix"></div><br/>
			<div class="form-group">
			   <center><input type="submit" name="btnChangepassword" id="submit" class="btn btn-default submit-btn" value="Change Password" /></center>
			</div>
		</form>
		
</div>
</div>
<!-- /.row --> 
	  
</div>
 <?php $this->template->contentBegin(POS_BOTTOM);?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script language="javascript" type="text/javascript">


$(document).ready(function() {
$("#changepassword").submit(function(){
	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});

$(document).ready(function () {
 var submit =0;
	$("#changepassword").validate({ 
            rules: {   
				
				u_password:{
                	required: true
                },
                newpassword:{
                	required: true
                },
				conf_password:{
                	required: true,
                	equalTo: "#newpassword",
                },
				
            },
			messages: { 
				
				u_password:{
                	required: "Please enter Old Password"
                }, 
				newpassword:{
                	required: "Please enter password"
                },
				conf_password:{
                	required: "Re-enter your password"
                },				
			},
			 
	}); 
	}); 
	

</script>
<script src="<?=$theme_url;?>/js/captcha.js"></script> 
<?php echo $this->template->contentEnd();	?> 