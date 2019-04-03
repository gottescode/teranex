 <?php $this->template->contentBegin(POS_TOP);?> 
 <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.0/themes/smoothness/jquery-ui.css">
 <?php $this->template->contentEnd();	?> 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Course Comment</li>
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
		<li><?=$course_data['name']?></li>
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
<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="bg_white">
		<div class="col-sm-offset-2 col-md-6 col-sm-6 col-xs-12 border_bot" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">  
			<?php 	// display messages
				if(hasFlash("dataMsgCommentSuccess"))	{	?>
					<div class="alert alert-success alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgCommentSuccess"); ?>
					</div>
			<?php }
				if(hasFlash("dataMsgCommentError"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("dataMsgCommentError"); ?>
					</div>
			<?php }	?>
			<form class="form-horizontal" role="form" action="" id="course_form" method="post" enctype="multipart/form-data">
				<fieldset>
				  
				   <div class="form-group">
				   	 <label class="control-label col-sm-3" for="datepicker">Course Name:<span class="star">*</span></label>
					<div class="col-sm-9"><input type="text" name="name" id="" class="form_bor_bot required" value="<?=$course_data['name']?>">  </div>
				 </div>
				   <div class="form-group">
				   	 <label class="control-label col-sm-3" for="comment_head">Subject :<span class="star">*</span></label>
					<div class="col-sm-9">
					<input type="text" name="comment_head" id="comment_head" class="form_bor_bot required" value="<?=($course_data['comment_head'])?>">
					</div>
				 </div>
			 
					  <div class="form-group">
					<label class="control-label col-sm-3" for="user_comment">Comment :<span class="star">*</span></label>
					<div class="col-sm-9">
					<textarea name="user_comment" id='user_comment' class="form_bor_bot required" ><?=$course_data['user_comment']?></textarea>
					</div>
				  </div>
					  <div class="form-group">
					<label class="control-label col-sm-3" for="user_comment">Rating :<span class="star">*</span></label>
					<div class="col-sm-9">
					<select name="course_rating" id='course_rating' class="form_bor_bot required" >
						<option value="1" <?php if($course_data['course_rating']==1){echo "selected";}?>>1</option>
						<option value="2" <?php if($course_data['course_rating']==2){echo "selected";}?>>2</option>
						<option value="3" <?php if($course_data['course_rating']==3){echo "selected";}?>>3</option>
						<option value="4" <?php if($course_data['course_rating']==4){echo "selected";}?>>4</option>
						<option value="5" <?php if($course_data['course_rating']==5){echo "selected";}?>>5</option>
					</select>
					</div>
				  </div>
				 
				  <div class="form-group"> 
					<div class="text-center">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn_orange">  
					  <input type="hidden" name="course_id" value="<?php echo $course_data['courseId']?>"  >   
					  <input type="hidden" name="cbc_id" value="<?php echo $course_data['cbc_id']?>"  >   
					</div>
				  </div>
				</fieldset>
			</form>
		</div><div class="clearfix"></div>
	</div> 
</div>
<!-- /.row -->  
<?php $this->template->contentBegin(POS_BOTTOM);?>
 <script type="text/javascript">
 	$("#course_form").validate({
   rules: {  
				name:{
					required:true
				},
				comment_head:{
					required:true
				},
				user_comment:{
					required:true
				},
				course_rating:{
					required:true
				},
			},
			messages: { 
				name:{
					required:"Please enter course name"
				},
				comment_head:{
					required:"Please enter subject"
				},
				user_comment:{
					required:"Please enter comment"
				},
				course_rating:{
					required:"Please select course ratings"
				},
			}
		}); 
 </script>
<?php $this->template->contentEnd();	?> 