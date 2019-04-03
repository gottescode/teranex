 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Add Other Files</li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
  <div class="container">
    <div class="col-sm-8 col-lg-10 padd-0">
      <ul>
        <li class="">Welcome <? echo $_SESSION['CustomerCompany'];?></li>
      </ul>
    </div>
    <div class="col-sm-4 col-lg-2 padd-0">
      <ul>
        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>
        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>
      </ul>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.welcome-j-bg -->

<div class="row margin_0" style="background-color: #353537;">
	<?php   $this->load->view("cust_side_menu" ); ?> 
	
	<div class="bg_white"> 
		<div class="border_bot col-sm-offset-2 col-sm-6 col-xs-12" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;height: 250px;margin-top: 30px;">
			<form class="form" name="upload_otherdoc_form" id="upload_otherdoc_form" method="post" action="" enctype="multipart/form-data">
					<div class="form-group"><!-- 
						<label class="">File Name <span class="red">*</span></label> -->
						<input type="text" name="file_name_text" id="file_name_text" class="form_bor_bot" placeholder="File Name" /><span class="compulsary">*</span>
					</div><div class="clearfix"></div>
					<div class="form-group">
						<label class="">Upload File <span class="red">*</span></label>
						<input type="file" name="UploadedFile" id="UploadedFile" class="" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt, .pptx,.txt,.pdf" />
					</div><div class="clearfix"></div><br/>
					<div class="form-group col-sm-12 col-xs-6">
					   <center><input type="submit" name="submit" id="submit" class="btn btn_orange" value="Add Files" /></center>
					</div>
			</form><div class="clearfix"></div>
		</div>
		<div class="col-xs-6 col-sm-9 col-md-9 col-lg-10 col-flex ">
			<?php
			if($documentList)
			{
			?>
				<table id='' class="table table-striped table-hover">
					<thead>
						<tr bgcolor="#CCCCCC"><td>S.No</td><td>File Name</td><td>Uploaded Date</td><td>View File</td><td>Delete</td></tr>
					</thead>
					<tbody>
							<?php
							$SNo = 1;
							foreach($documentList as $data)
							{
								?>
								<tr>
									<td><?php echo $SNo;?></td>
									<td><?php echo $data['file_name_text'];?></td>
									<td><?php echo date_dmy($data['entry_date']);?></td>
									<td><?php  if($data['uplodded_file']!=''){ echo "<a href='".site_url()."uploads/user_document/".$data[uplodded_file]."' target='_blank' >Click Here</a>" ;}?></td>
									<td><a href="<?php echo site_url()?>customer/otherDocumentDelete/<?=$data[uod_id]?>"   >Delete</a></td>
								</tr>
								<?
								$SNo = $SNo + 1;
							}
						?>
					</tbody>
				</table>
			<?php
			}
			?>
		</div><div class="clearfix"></div>
	</div><div class="clearfix"></div>
	
</div>
<!-- /.row --> 
	
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
$(document).ready(function() {
$("#company").submit(function(){ 
	if($("#Name").val() == "")
	{
		alert("File Name is required");
		return false;
	}

	var yesno = confirm("Are you sure to save");
	return yesno;
	});
});
</script>
 
<script>  
$("#upload_otherdoc_form").validate({
   rules: {  
				file_name_text:{
					required:true
				},
				UploadedFile:{
					required:true,
					 extension: "pdf|doc|docx|txt|png|jpg|jpeg"
				},
			},
			messages: { 
				file_name_text:{
					required:"Please enter file name"
				},
				UploadedFile:{
					required:"Please select file to upload"
				},
			}
		}); 
		</script>
<?php $this->template->contentEnd();	?> 