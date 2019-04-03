 
	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		   <h1>State List</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."location/state"?>">State List</a></li>
		  </ol>
		</section>
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
                        <?php	// display messages
					if(hasFlash("stateSuccessMsg"))	{	?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("stateSuccessMsg"); ?>
						</div>
			<?php	}
					else if(hasFlash("stateErrorMsg"))	{	?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("stateErrorMsg"); ?>
						</div>
			<?php	}	?>
		<div class="box-body">
			
                               
                                <div class="x_content"> 
								<br/>
								<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
									<div class="col-md-3">
										<a href="<?=site_url()."location/state/create"?>" class="btn btn-info" > Create </a>
									</div>
									<div class="col-md-3">
										<select name="country_id" class="form-control">
											<option value="">Select Country</option>
											<?php if($countryList){
												foreach($countryList as $rowCountry){?>
												<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
											<?php }}?>
										</select>
									</div>
									<div class="col-md-4">
										<input type="submit" class="btn btn-primary" name="btnSearch" value="Serach">
									</div>
								</form>
									<div class="clearfix"></div><br />
                                <?php	if(!empty($data)){	?>
								<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
									<table id="stateList" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
												<th> <?php echo SR_NO; ?> </th>
												<th> State Name </th> 
												<th> Publish </th>
												<th> Action </th>
											</tr>
                                        </thead>
                                        <tbody>
						<?php	$i = 1;
								foreach($data as $row){	?>
									<tr>
										<td><?php echo $i++; ?></td> 
										<td><?php echo $row["state_name"]; ?></td>
										 
										<td align="center">
											<input type="checkbox" name="publish_<?php echo $row["id"]; ?>"	value="Y"
												<?php if($row["publish"] == 'Y') echo "checked"; ?> >
										</td>
										<td align="center">
											<a href="<?php echo site_url()."/location/state/update/".$row["sid"]; ?>" 
												aria-haspopup="true" title="Update">
													<i class="fa fa-pencil"></i>
											</a>
											&nbsp;&nbsp;
											<a href="<?php echo site_url()."/location/state/delete/".$row["sid"]."/".$id; ?>" 
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
		</div> 
		</section> 
</div> 
<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" href="<?=$theme_url;?>/plugins/dataTables.bootstrap.min.css">
 
<script src="<?=$theme_url;?>/plugins/dataTables.bootstrap.min.js"></script> 
<script type="text/javascript">
$(document).ready(function() {
    $('#stateList').DataTable();
} );
</script>
<?php echo $this->template->contentEnd();	?>   