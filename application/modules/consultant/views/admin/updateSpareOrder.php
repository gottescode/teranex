
<div class="content-wrapper">
    <section class="content-header">
      <h1>Spare Order Update Details</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="#">Spare Order Update Details</a></li>
	</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box box-primary">
            <div class="box-header">
            </div>
			 
<div class="box-body">
	<div class="col-xs-12">
		<?php 	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgError"); ?>
				</div>
	<?php	}	?>
	
		<!-- form -->
		<div class="col-xs-12">
		<h3>Update Details</h3>		
			<form class="form-horizontal" role="form" action="" id="consultant_form" method="post" enctype="multipart/form-data">
				<fieldset>
				   <div class="form-group">
					<label class="control-label col-sm-3" for="title">Title :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="title" id="title" class="form-control required" value="">
					</div>
				  </div> 
				  <div class="form-group">
					<label class="control-label col-sm-3" for="description">Description  :<span class="star">*</span></label>
					<div class="col-sm-6">
					<input type="text" name="description" id="description" class="form-control required" value="">
					</div>
				  </div>
				 

				  <div class="form-group"> 
					<div class="col-sm-offset-4 col-sm-5">
					 <input type="submit" name="btnSubmit" value="Submit" class="btn btn-primary"> 
					  <input type="hidden" name="id" value="<?php echo $spare_req_id?>"  > 
					</div>
				  </div>
				</fieldset>
			</form>
			</br>
			<h3>Delivery Tracking Details</h3>			
			<div class="table-responsive">
									<table class="table table-bordered table-striped" id="consultant_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Title</th>  
												<th>Description</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
											if($deliveryTrackingDetails>0){ $i=1;
												foreach($deliveryTrackingDetails as $row){
										?>
												<tr>
													<td><?=$i++?></td>
													<td><?=$row['title']?></td>
													<td><?=$row['description']?></td>
												</tr>
											<?php }
											}
											?>

										</tbody>
									</table>  
								</div>
								<center>
									<a href="<?=site_url()."consultant/admin/closeOrder/".$spare_req_id;?>" class="btn btn-danger">Close Order</a>
								</center>
														
							</div>
						</div> 
					</div> 
				</div>
			</div>
		</div>
	</section>
</div> 

<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script src="<?=$theme_url?>/js/location.js"></script> 
 
<script> 
$("#consultant_form").validate({
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
					