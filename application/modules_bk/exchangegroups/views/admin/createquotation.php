 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">

  <link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">

  <!-- Content Wrapper. Contains page content -->

	<div class="content-wrapper">

    <!-- Content Header (Page header) -->

		<section class="content-header">

		  <span style="font-size: 24px;padding: 10px;">Send Quotation</span>

		  

		  <ol class="breadcrumb">

			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>

			<li class=""><a href="<?=site_url()."groupbuying/admin/collective_buying_req_list"?>">Send Quotation</a></li>

			

		  </ol>

		</section>

	 <!-- Main content -->

		<section class="content">

			<div class="row">

				<div class="col-xs-12">

					<div class="box">
							<?php 	// display messages

								if(hasFlash("dataMsgSuccess"))	{	?>

									<div class="alert alert-success alert-dismissible" role="alert">

									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

									  <?php echo getFlash("dataMsgSuccess"); ?>

									</div>

						<?php	}	?>

							<?php 	// display messages

								if(hasFlash("dataMsgError"))	{	?>

									<div class="alert alert-warning alert-dismissible" role="alert">

									  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

									  <?php echo getFlash("dataMsgError"); ?>

									</div>

						<?php	}	?>

						 

						<div class="box-body"> 
							<div class="border_bot ">
								<form class="form-horizontal" role="form" action="" id="product_form" method="post" enctype="multipart/form-data">
									<fieldset>
									  	<div class="form-group">
											<label class="control-label col-sm-3" for="supplier_best_price">Best Supplier Price :<span class="star">*</span></label>
											<div class="col-sm-6">
												<input type="text" name="supplier_best_price" id="supplier_best_price" class="form_bor_bot required numbersOnly" value="<?=$customer_request_data['supplier_best_price']?>">
											</div>
									  	</div>
								
									  	<div class="form-group"> 
											<div class="text-center">
										 		<input type="submit" name="btnSubmit" value="Send Quotation" class="btn btn-primary"> 
										 		<input type="hidden" name="gcr_id" value="<?=$customer_request_data['gcr_id']?>" > 
											</div>
									  	</div>
									</fieldset>
								</form>
							</div>
						</div>

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
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script>
<script type="text/javascript">
	jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
	$("#product_form").validate({
   rules: {  
				supplier_best_price:{
					required:true
				}, 
				
			},
			messages: { 
				supplier_best_price:{
					required:"Please enter best supplier price"
				}, 
				
			}
		});
</script>
<?php $this->template->contentEnd();	?> 