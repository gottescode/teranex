<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Exchange Group Request List</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Request List</li>
	
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
				<div class="box-body"> 
				<div class="padd-15">
				
				</div>
				      <table id='product_table' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC">
						<td>Sr.No</td>
						<td>Category</td>
						<td>Description</td>
						<td>Timeline</td>
						<td>Address</td>
						<td>Offered On</td>
					</tr>
                    </thead>
                    <tbody>
						<?php 
						
						
						if($offeredData){ $i=1;
								foreach($offeredData as $row){
									
									$country_id = $row['country_id'];
									$state_id = $row['state_id'];
									$city_id = 	$row['city_id'];
									
									$url = site_url()."customer/exchangegroupapi/findSingleCountry/{$country_id}";
									$countryName =  apiCall($url,"get");
									
									$url = site_url()."customer/exchangegroupapi/findSingleState/{$state_id}";
									$stateName =  apiCall($url,"get");
								
									$url = site_url()."customer/exchangegroupapi/findSingleCity/{$city_id}";
									$cityName =  apiCall($url,"get");
									?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$row['category']?></td>
										<td><?=$row['description']?></td>
										<td><?=$row['timeline']?></td>
										<td><?php 
												echo "Country: ".$countryName['result']['country_name']."</br>";
												echo "State: ".$stateName['result']['state_name']."</br>";
												echo "City: ".$cityName['result']['city_name']."</br>";

										?></td>
										<td><?php  echo date('d-M-Y, g:i A', strtotime($row['created_date']));?></td>
					
                             
										
									</tr>
							<?php }
						}?>
                        
                    </tbody>
                </table>
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
		   // "order": [[ 0, "desc" ]]
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 