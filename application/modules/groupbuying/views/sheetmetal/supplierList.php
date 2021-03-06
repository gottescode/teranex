<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Supplier User List</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class=""><a href="">Request List</a></li>
	<li class=""><a href="">Supplier User List</a></li>
	
  </ol>
</section>
	 <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				
				<div class="box-body"> 
					<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post" action= "<?php echo site_url()."groupbuying/sheetmetal/assignSupplierForRequest"?>">
						<div class="table-responsive">
							<table class="table table-bordered table-striped" id="product_table">
								<thead>
									<tr>
										<th>Sr.No.</th>
										<th>User Name</th>
										<th>Email ID</th>  
										<th>Mobile No</th>  

										<th>Action</th> 
									</tr>
								</thead>
								<tbody>
								<?php

								if($supplierList){ $i=1;
									foreach($supplierList as $rowData){?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$rowData['u_name']?></td>
										<td><?=$rowData['u_email']?></td>
										<td><?=$rowData['u_mobileno']?></td>
										<td><input type="checkbox" name="publish_<?=$rowData['uid']?>" value="Y" ></td>
										<input type="hidden" name="id[]" value="<?php echo $rowData["uid"]; ?>">
									</tr>
								<?php }}?>
								<tr>
									<td  colspan=5>
										<input type="submit" name="btnSubmitSupplier" id="updateBtnStyle1" class="btn btn-primary pull-right btn-xs" value="Assign to Supplier">
									</td>
								</tr>
								</tbody>
							</table>  
						<input type="hidden" name="rfq_ids" value="<?php echo $rfq_ids; ?>">
						<input type="hidden" name="sheet_quantity" value="<?php echo $sheet_quantity; ?>">
						<input type="hidden" name="sheet_metal_name" value="<?php echo $sheet_metal_name; ?>">
						<input type="hidden" name="title" value="<?php echo $title; ?>">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>			
</section> 
</div>
	
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
	
<?php $this->template->contentEnd();	?> 