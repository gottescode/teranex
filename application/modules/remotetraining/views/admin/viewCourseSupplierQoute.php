

<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Course Suppliers Quotation</span>
  
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
	
					

					<div class="box-body " style="">   

				<form class="form col-sm-offset-5" name="qoutationAdd" id="traineeAdd" method="post" action="" enctype="multipart/form-data">

					<div class="form-group">

						<label>Course Date :</label> <?php echo $result['course_date']?>

					</div>

					<div class="form-group">

						<label>Course Time : </label> <?php echo $result['course_time']?> 

					</div><div class="clearfix"></div>

					
					 <div class="clearfix"></div>

					 
 <?php //print_r($singleList['supplier_id']);exit;
?>
					<div class="form-group">
                       <?php if($singleList['supplier_id'] == '0'){
?>
   <center><a href="<?=site_url()."remotetraining/admin/CourseSupplierListAcceptByadmin/".$result['csr_id']?>" class="btn btn-success">Accept</a> &nbsp; &nbsp;  </center>

<?php   }else{

echo "Already Allocated";
}  ?>
					
					</div> 

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