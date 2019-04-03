 <div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Create Community</li>
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
		<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height:300px;">  
			<form class="form-horizontal" role="form" action="" id="community_form" method="post" enctype="multipart/form-data">
				<div class="col-sm-12">
					<fieldset>
					   		<div class="form-group">
								<input type="text" name="title" id="title" class="form_bor_bot required" value="<?=$community_data['title']?>" placeholder="Title"><span class="compulsary">*</span>
							</div>
							<div class="form-group">
								<input type="text" name="description" id="description" class="form_bor_bot required" value="<?=$community_data['description']?>" placeholder="Description"><span class="compulsary">*</span>
							</div>
						  <!--<div class="form-group">
							<label class="control-label col-sm-3" for="cust_branch_country">Moderator: </label>
							<div class="col-sm-6">
							<select name="moderator" id="moderator" class="form-control">
										<option value="">Select Moderator</option>
										<?php
										foreach ($userList as $row)
										{
										        echo '<option value="'.$row->uid.'">'.$row->u_name.'</option>';     
										}?>
							</select>	
							</div>
						  </div>-->
					   	<div class="form-group">
							 <center><input type="submit" name="btnSubmit" value="Submit" class="btn btn-default  submit-btn btn_orange"></center> 
							  <input type="hidden" name="id" value="<?php echo $community_data['id']?>"  > 
					  	</div>
					</fieldset>
				</div>
			</form>
		</div>
		<div class="clearfix"></div>
	</div>/
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
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
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  
$("#community_form").validate({
   rules: {  
				title:{
					required:true
				},
				description:{
					required:true
				},
			},
			messages: { 
				title:{
					required:"Please enter title"
				},
				description:{
					required:"Please enter description"
				},
			}
		}); 
</script>
<?php echo $this->template->contentEnd();	?> 