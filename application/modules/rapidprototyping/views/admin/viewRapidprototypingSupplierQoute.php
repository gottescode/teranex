

<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Rapid Prototyping Suppliers Quotation</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class=""><a href="">Quotation</a></li>
	
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
	
					

					<div class="border_bot col-sm-offset-3 col-md-4 col-sm-4 col-xs-12 supplier-form" style="background-color: #fff;padding:40px 40px;box-shadow: 0px 0px 10px #dfdcdc;">   

				<form class="form" name="qoutationAdd" id="traineeAdd" method="post" action="" enctype="multipart/form-data">

					<div class="form-group">

						<label>Number Of Hours :</label> <?php echo $result['number_of_hours']?>

					</div>

					<div class="form-group">

						<label>Lead Time : </label> <?php echo $result['lead_time']?> 

					</div><div class="clearfix"></div>

					<div class="form-group ">

						<label>Program Description :</label> <?php echo $result['rfq_description']?> 

					</div>

				 

					 <div class="clearfix"></div>

					<div class="form-group ">

					<label>Tax Rate :</label> <?php echo $result['tax_rate']?> 

						 

						<input type="hidden" name="old_document"  value="<?php echo $result['sample_product_drawing']?>"/> 

					</div>

					 <div class="clearfix"></div>
					 <div class="form-group ">
					<label>Upload Quotation:</label> 
					<input type="file" class="" id="quotation_uploaded" name="quotation_uploaded" placeholder=""  />
					</div>
					 <div class="clearfix"></div>
					<?php  if($singleList['supplier_id'] == '0'){ ?>
					 <div class="form-group ">
					<input type="hidden" class="" id="drrs_id" name="drrs_id" value="<?php echo $result['drrs_id']?>" />
					<input type="submit" name="btnRfqQuot" id="btnRfqQuot" class="btn btn-success" value="Accept Quotation" />
					</div>
					 <div class="clearfix"></div>

					 <?php   }else{

						echo "Already Accepted";
					}  ?>
					 
 <?php //print_r($singleList['supplier_id']);exit;
?>
					<!-- <div class="form-group col-sm-12 col-xs-6">
                       <?php if($singleList['supplier_id'] == '0'){
?>
   <center><a href="<?=site_url()."rapidprototyping/admin/RapidprototypingSupplierListAcceptByadmin/".$result['drrs_id']?>" class="btn btn-success">Accept</a> &nbsp; &nbsp;  </center>

<?php   }else{

echo "Already Allocated";
}  ?>
					
					</div>  -->

				</form>

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
		$("#product_table").DataTable({
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 