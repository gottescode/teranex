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
											<th>Name</th>  
											<th>Company Name</th>  
											<th>Phone No</th>  
											<th>Email</th>  
											<th>Address</th>   
											<th>Subject</th>  
											<th>Message</th>  
										</tr>
									</thead>
									<tbody>
										<?php $i=1;
										foreach($contactUsList['result'] as $rowData) { 
										?>
											<tr>
												<td><?=$i++?></td>
												<td><?echo ucfirst($rowData['person_name']);?></td> 
												<td><?echo ucfirst($rowData['company_name']);?></td> 
												<td><?echo ucfirst($rowData['phone_no']);?></td> 
												<td><?echo $rowData['email_id'];?></td> 
												<td><?echo "<b>Country:</b>".$rowData['country_name'].",<br> <b>State:</b> ".$rowData['country_state'].",<br> <b>City:</b> ".$rowData['city_name'];?></td>
												<td><?echo $rowData['subject']?></td> 
												<td><?echo $rowData['message']?></td> 
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