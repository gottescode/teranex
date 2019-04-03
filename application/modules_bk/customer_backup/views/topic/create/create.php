<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Create a new topic</li>
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
<div class="row margin_0" style="background-color: #353537;">
	
		<?php   $this->load->view("cust_side_menu" ); ?> 
<div class="bg_white">
		<div class="col-xs-6 col-sm-9 col-md-9 col-lg-offset-2 col-lg-6 col-flex">
			<div class="page-header">
				<!-- <center><h1>Create a new topic</h1></center> -->
			</div>
			<form id="topic_create_form" method="post" action="" enctype="multipart/form-data">
				<?php if ($login_needed) : ?>
		
				<div class="alert alert-danger" role="alert">
					<p>You need to be logged in to create a new topic!</p>
					<p>Please <a href="<?= base_url('login') ?>">login</a> or <a href="<?= base_url('register') ?>">register a new account</a>.</p>
				</div>
	
				<?php else : ?>
				<?php if (validation_errors()) : ?>
			
				<div class="alert alert-danger" role="alert">
					<?= validation_errors() ?>
				</div>
				
				<?php endif; ?>
				<?php if (isset($error)) : ?>
					
						<div class="alert alert-danger" role="alert">
							<?= $error ?>
						</div>
					
				<?php endif; ?>
			
				<?= form_open() ?>
				<div class="border_bot col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;margin-top: 30px; ">
					<div class="form-group">
						<input type="text" class="form_bor_bot" id="title" name="title" placeholder="Topic Title" value="<?= $title ?>"><span class="compulsary">*</span>
					</div>
					<div class="form-group">
						<textarea rows="6" class="form_bor_bot" id="content" name="content" placeholder="Topic content"><?= $content ?></textarea><span class="compulsary">*</span>
					</div>
					<div class="form-group">
						<center><input type="submit" class="btn btn_orange" value="Create topic"></center>
					</div>
				</div>
			</form>
		</div>
	<?php endif; ?>
	<div class="clearfix"></div>
   </div>
</div><!-- .row -->
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>  
<script>  

$("#topic_create_form").validate({
   rules: {  
				title:{
					required:true
				},
				content:{
					required:true
				},
			},
			messages: { 
				title:{
					required:"Please enter topic title"
				},
				content:{
					required:"Please enter Topic content"
				},
			}
		}); 
		</script>
		<?php $this->template->contentEnd();	?> 
