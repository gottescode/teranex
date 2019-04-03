
<div class="content-wrapper">
    <section class="content-header">
      <h1>Spare Request Details</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."consultant/admin/spare_part_requests"?>">Spare Request Details</a></li>
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
		<div class="col-xs-12" style="min-height:525px;"> 
		<a href="<?php echo site_url()."consultant/admin/spare_part_requests"?>" class="btn btn-xs pull-right btn-primary">Back</a>
			<?php foreach($orderDetails as $row){ ?>
				
				<div class="col-sm-12" >
				<p><b>Request On: </b><?php 	$phpdate = strtotime($row['created_on']);echo $mysqldate = date( 'd-m-Y H:i:s', $phpdate ); ?></p>
				
				<p><b>Description:</b> <?php echo $row['description']; ?></p>
				<div class="col-sm-12">
					<div class="col-xs-3">
					<img src="<?php echo base_url()."uploads/training_service_images/".$row['spare_req_images']; ?>" class="img-responsive" >
					</div>
				</div>
				</div>
				
			
		<? } ?>
		</div>
	
	</div>
	</section>
	
<?php  // $countList=json_encode($countryList) ?>
<?php $this->template->contentBegin(POc_BOTTOM);?>
 
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
					
					
				