 <?php
	 $image_path_url  = base_url().'uploads/machine';
?>
<div class="content-wrapper">
<section class="content-header">
    <h1>Machine Gallery List</h1>
    <ol class="breadcrumb">
    <li><a href="<?=site_url()?>dashboard/"><i class="fa fa-dashboard"></i>Home</a></li>
    <li class="active">Machine Gallery List</li>
    </ol>
</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
			<?php	// display messages
			if(hasFlash("dataMsgError"))	{	?>
				<div class="alert alert-warning alert-dismissible" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				  <?php echo getFlash("dataMsgError"); ?>
				</div>
			<?php	}		// display messages
			if(hasFlash("dataMsgSuccess"))	{	?>
				<div class="alert alert-success alert-success" role="alert">
				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <?php echo getFlash("dataMsgSuccess"); ?>
				</div>
			<?php	}	?>
				<div class="box-body border_bot">
					<form class="form-horizontal" role="form" id="image_form" action="" method="post" enctype="multipart/form-data">
	                    <div class="form-group">
	                    	<label for="photo_name" class="col-sm-3 control-label">Image: <span class="star">*</span></label>
	                    	<div class="col-sm-6">

	                     		<input  class="form_bor_bot required" name="photo_name[]" id="photo_name" type="file" multiple>
	                    	</div>
	                  	</div>
	                    <div class=" text-center">
	                      <button type="submit" name="btnSubmit" class="btn btn-primary">Submit</button>
	                  </div>
	                  <input type="hidden" name="md_id" id="md_id" value="<?=$md_id?>">
	                </form>
					<div class="clearfix"></div><br/>
				 	<div class="col-sm-12">
						<table class="table table-bordered table-striped" id="gallery">
							<thead>
								<tr>
									<th>SR.NO</th>
									<th>IMAGE</th>
									<th>ACTION</th>
								</tr>
							</thead>
								<tbody>
								<?php
								$i=1;
								foreach($machineAllImages['result'] as $row){
								?>
								<tr>
										<td><?php echo $i;?></td>
										<td><img src="<? echo $image_path_url.'/'.$row['photo_name'];?>" alt="" height="100" width="180" hspace="10" vspace="10"><br></td>

										<td>
											<a onclick="return confirm('Are you sure delete this entry?')"  href="<?=site_url()."machine/admin/delete_gallary/".$row['mp_id'].'/'.$row['md_id']?>"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
										</td>

									</tr>
									<?
									$i++;
									} ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>
	<script type="" src="<?=$theme_url?>/js/additional-methods.js"></script>

<script>
		jQuery.validator.addMethod("lettersonly", function(value, element){
        return this.optional(element) || /^[a-zA-Z\s]+$/i.test(value);
        }, "Only alphabetical characters");

	$("#image_form").validate({
	rules: {
					img_id	: {
					required:true,
					lettersonly:true
				}
			},
			messages: {
					image: {
					required:"Please Enter image "
				}

			}
		});
</script>
<?php $this->template->contentEnd();	?>
<?php $this->template->contentBegin(POS_BOTTOM);?>

	<script type="text/javascript">
	$(document).ready(function() {
		$("#gallery").DataTable({
	});
	} );



<?php $this->template->contentEnd();	?>














