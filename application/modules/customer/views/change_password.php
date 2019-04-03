 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Update Password</li>
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
<div class="welcome-j-bg">
  <div class="container">
    <!-- <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
        <li class="">Welcome  </li>
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
<!-- /.welcome-j-bg -->
<div class="clearfix"></div>
<div class="row margin_0" style="background-color: #353537;">
	   <?php   $this->load->view("cust_side_menu" ); ?> 
    <div class="bg_white">
      <div class="col-sm-9 col-md-9 col-lg-10">
	  <div class="clearfix"></div>
			<?php 	// display messages
				if(hasFlash("dataMsgSuccess"))	{	?>
						<br><div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgSuccess"); ?>
					</div>
			<?php	}	?>	
			<?php 	// display messages
				if(hasFlash("dataMsgError"))	{	?>
						<br><div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgError"); ?>
					</div>
			<?php	}	?>
      	<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;"> 
      		<form class="form" name="changepassword" id="changepassword" method="post" action="">
      			<div class="form-group">
      				<input type="password" class="form_bor_bot" id="u_password" name="u_password" placeholder="Old Password " value="<? echo $user_data['u_password'];?>"  /><span class="compulsary">*</span>
      			</div><div class="clearfix"></div>
      			<div class="form-group">
      				<input type="password" class="form_bor_bot" id="newpassword" name="newpassword" placeholder="New Password" value="<? echo $user_data['newpassword'];?>"  /><span class="compulsary">*</span>	
              	</div>
             	 	<div class="form-group">
      				<input type="password" class="form_bor_bot" id="conf_password" name="conf_password" placeholder="Confirm New Password" value="<? echo $user_data['conf_password'];?>"  /><span class="compulsary">*</span>
              	</div>
      		 	<div class="clearfix"></div><br/>
      			<div class="form-group">
      			   <center><input type="submit" name="btnChangepassword" id="submit" class="btn btn_orange" value="Change Password" /></center>
      			</div>
      		</form>
      	</div>
      </div><div class="clearfix"></div>
    </div><div class="clearfix"></div>
</div>
	<!-- /.row --> 
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
                	required: "Please enter new password"
                },
				        conf_password:{
                	required: "Re-enter your new password"
                },				
			      }, 
	      }); 
	}); 
	

</script>
<script src="<?=$theme_url;?>/js/captcha.js"></script> 
<?php echo $this->template->contentEnd();	?> 