<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
<!-- Content Header (Page header) -->
	<section class="content-header">
		  <span style="font-size: 24px;padding: 10px;">Contact Us</span>
		  
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="">Contact Us</a></li>
			
		  </ol>
	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
					<div class="box-body">
					 	<div class="col-sm-12">
							<div class="table-responsive">
								<table class="table table-bordered table-striped" id="contact-us">
									<thead>
										<tr>
											<th>Sr.No.</th>
											<th>Email</th>  
											<th>Phone No</th>  
											<th>Subject</th>  
											<th>Message</th>  
											<th>Enquiry Date</th>  
										</tr>
									</thead>
									<tbody>
										<?php $i=1;
										foreach($contactUsList['result'] as $rowData) { 
										?>
											<tr>
												<td><?=$i++?></td>
												<td><?echo $rowData['email_id'];?></td> 
												<td><?echo ucfirst($rowData['phone_no']);?></td> 
												<td><?echo $rowData['subject']?></td> 
												<td><?echo $rowData['message']?></td> 
												<td><?echo $rowData['createdAt']?></td> 
											</tr>
										<? } ?>
									</tbody>
								</table> 
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>			
	</section> 
</div>
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script>
	//DataTable
	$(document).ready(function() {
			$("#contact-us").DataTable({ });
	});
</script>
<?php $this->template->contentEnd();	?> 