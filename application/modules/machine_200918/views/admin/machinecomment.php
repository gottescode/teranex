 <?php $this->template->contentBegin(POS_TOP);?> 

 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">

 <style type="text/css">
 	.image-upload img {
    margin-right: 10px;
    cursor: pointer;
}
.image-upload > input {
    display: none;
}
 </style>

 <?php $this->template->contentEnd();	

	$imgArray=array("jpeg","JPEG","jpg","JPG","png","PNG");

	$docArray=array("pdf","PDF","DOC","doc","docx","DOCX","txt","TXT");

 

 ?> 

  <!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">

    <!-- Content Header (Page header) -->

		<section class="content-header">

		  <span style="font-size: 24px;padding: 10px;">Machine Comment List</span>

		  <ol class="breadcrumb">

			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>

			<li class=""><a href="#">Machine Comment List</a></li>

			

		  </ol>

		</section>

	 <!-- Main content -->

		<section class="content">

			<div class="row">

				<div class="col-xs-12">

					<div class="box"> 

						 

						<div class="box-body">  

							 <?php if($machineCommentReplyList){

						foreach($machineCommentReplyList as $rowreply){

						

						$url = site_url()."machine/api/machineCommentReplyFileList/".$rowreply['mcr_id'];; 

						$commentReplyFileList =  apiCall($url, "get"); 

						?>

					 

						<div class="row">

							<div class="col-sm-1">

								<?php if($rowComment['u_avatar']){?>

									<img src="<?php echo site_url()."uploads/customer/".$rowComment['u_avatar']?>" class="img-rounded img-responsive" style="width:70px">

								<?php }else{?>

									<img src="<?php echo site_url()."uploads/customer/user-default.png"?>" class="img-rounded img-responsive" style="width:70px">

								<?php }?>

							</div>

							<div class="col-sm-2"><?php if( $rowreply['u_name']){echo $rowreply['u_name'];}else{echo "Admin";}?><br/><?php echo date('M d, h:i A', strtotime( $rowreply['comment_date_time']))?></div> 

							<div class="col-sm-8"><?php echo $rowreply['comment_msg']?> </div>

							

							<div class="col-lg-12">

								<?php if($commentReplyFileList['result']){

									foreach($commentReplyFileList['result'] as $rowName){ 

										$extnFile = explode('.', $rowName['file_name']);

										if(in_array($extnFile[1],$imgArray)){

										  echo "<img src='".site_url()."uploads/machine_reply/".$rowName['file_name']."' width='100px'>";

										}else{

											$docFile[]=$rowName['file_name'];

										}  

										?>

								<?php }

									if($docFile>0){

										echo "<h3>File Document</h3>";

										for($i=0;$i< count($docFile);$i++){ 

											echo "<a href='".site_url()."uploads/machine_reply/".$docFile[$i]."'  target='_blank'>File Attachment</a> &nbsp; &nbsp;";

										}

									} 

								}?>

							</div>

						</div>

						<hr/> 

				<?php  }}?>

						</div>

						<form class="form-horizontal" role="form" action="" id="machine_form" method="post" enctype="multipart/form-data">

							<fieldset> 

							  <div class="form-group">

								<label class="control-label col-sm-3" for="comment_msg">Comment :<span class="star">*</span></label>

								<div class="col-sm-6">

								<textarea name="comment_msg" id='comment_msg' class="form-control  required" ></textarea>

								</div>

							  </div>

							  <div class="form-group"> 

								 <center>

							<div class="image-upload" style="display: inline-block;">

								<label for="file-input">

									<img src="<?php echo theme_url()."/images/attachment.png"?>"/>

								</label>

								<input id="file-input" type="file"  name="commentFile[]" multiple />

							</div>

										<input type="submit" name="btnComment" value="Submit" class="btn btn-primary"> 

								  </center>

							  </div>

							</fieldset>

						</form>

					</div>

				</div>

			</div>			

		</section> 

	</div>

	

	  

<?php $this->template->contentBegin(POS_BOTTOM);?>

	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>

	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 

	<script type="text/javascript">

	$(document).ready(function() {

		$("#community_table").DataTable({

	});	

	}); 

	</script>

<?php $this->template->contentEnd();	?> 