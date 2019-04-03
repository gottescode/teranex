	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		   <h1>Country List</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."location/country"?>">Country List</a></li>
		  </ol>
		</section>
<section class="content">
			<div class="row">
				<div class="col-xs-12">
					<div class="box">
						<div class="padd-15"><a href="<?=site_url()."location/country/create"?>" class="btn btn-info" > Create </a></div>
                        <?php	// display messages
					if(hasFlash("countrySuccessMsg"))	{	?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("countrySuccessMsg"); ?>
						</div>
			<?php	}
					else if(hasFlash("countryErrorMsg"))	{	?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("countryErrorMsg"); ?>
						</div>
			<?php	}	?>
				
				<div class="box-body">
								
						 			<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
							 <br/>
									 <?php	if(!empty($data)){	?>
								<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
                                    <table id="contry_table" class="table  table-bordered table-striped" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
										<th> <?php echo SR_NO; ?> </th>
										<th> Display Name </th>
										<th> Country Code </th>
										<th> Display Order </th>
										<th> Publish </th>
										<th> Action </th>
									</tr>
                                        </thead>
                                        <tbody>
						<?php	$i = 1;
								foreach($data as $row){	?>
									<tr>
										<td><?php echo $i++; ?></td>
										<td><?php echo $row["country_name"]; ?></td>
										<td><?php echo $row["country_code"]; ?></td>
										<td>
											<input type="text" size="5" name="order_<?php echo $row["id"]; ?>"
												value="<?php echo $row["display_order"]; ?>">
										</td>
										<td align="center">
											<input type="checkbox" name="publish_<?php echo $row["id"]; ?>"	value="Y"
												<?php if($row["publish"] == 'Y') echo "checked"; ?> >
										</td>
										<td align="center">
											<a href="<?php echo site_url()."location/country/update/".$row["id"]; ?>" 
												aria-haspopup="true" title="Update">
													<i class="fa fa-pencil"></i>
											</a>
											&nbsp;&nbsp;
											<a href="<?php echo site_url()."location/country/delete/".$row["id"]; ?>" 
												aria-haspopup="true" title="Delete" onclick="return confirm('Are you sure ? ')" >
													<i class="fa fa-trash-o"></i>
											</a>
											<input type="hidden" name="id[]" value="<?php echo $row["id"]; ?>">
										</td>
									</tr>
									
						<?php	}	?>
									 
								</tbody>
								</table>
								<div class="text-center">	
											<input type="submit" name="btnUpdate" class="btn btn-primary pull-right" value="Update">
									</div>	
								</form>
								<?php }else { ?>
												<div class="alert alert-warning" role="alert">
													No records found
												</div>
									<?php	}	?>
                                </div>
			</div>
		</div>
	</div> 
	</section> 
	</div> 
<?php $this->template->contentBegin(POS_TOP);?>
 <link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<?php $this->template->contentEnd();?>

<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#contry_table').DataTable({
		'pageLength':50
	});
} );
</script>
<?php echo $this->template->contentEnd();	?>   