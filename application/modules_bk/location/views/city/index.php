 
<div class="content-wrapper">
    <section class="content-header">
      <h1>City List</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."location/city"?>">City List</a></li>
			<li class="active">City List</li>
		</ol>
    </section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box">
                        <?php	// display messages
                        if(hasFlash("citySuccessMsg"))	{	?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        	<?php echo getFlash("citySuccessMsg"); ?>
                        </div>
                        <?php	}
                        else if(hasFlash("cityErrorMsg"))	{	?>
                        <div class="alert alert-warning alert-dismissible" role="alert">
                        	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        	<?php echo getFlash("cityErrorMsg"); ?>
                        </div>
                        <?php	}	?>
                        <div class="box-body">
                        	<a href="<?=site_url()."location/city/create"?>" class="btn btn-info" > Create City</a>
							<div class="x_content"> 
								<form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
                            		<br/>
                            		<br/>
									<div class="col-md-3">
										<select name="country_id" id="country_id" class="form-control">
											<option value="">Select Country</option>
											<?php if($countryList){
												foreach($countryList as $rowCountry){?>
												<option value="<?=$rowCountry['id']?>" <?php if($rowCountry['id']==$country_id){ echo "selected";}?> ><?=$rowCountry['country_name']?></option>
											<?php }}?>
										</select>
									</div>
									<div class="col-md-3">
										<select name="state_id" id="state_id" class="form-control">
											<option value="">Select State</option>
										 <?php if($stateList){
												foreach($stateList as $rowState){?>
												<option value="<?=$rowState['id']?>" <?php if($rowState['id']==$stateid){ echo "selected";}?> ><?=$rowState['state_name']?></option>
											<?php }}?>
										</select>
									</div>
									<div class="col-md-4">
										<input type="submit" class="btn btn-primary" name="searchList" value="Serach">
									</div>
								</form>
							</div>
                            <div class="clearfix"></div><br/>
                        	<?php	if(!empty($cityList)){	?>
                        	<form id="cityList" name="cityList" class="form-horizontal" enctype="multipart/form-data" method="post">
                        		<table id="cityListTable" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        			<thead>
                        				<tr>
                        					<th> <?php echo SR_NO; ?> </th>
                        					<th> City Name </th> 
                        					<th> Publish </th>
                        					<th> Action </th>
                        				</tr>
                        			</thead>
                        			<tbody>
                        				<?php	$i = 1;
                        				foreach($cityList as $row){	?>
                        				<tr>
                        					<td><?php echo $i++; ?></td> 
                        					<td><?php echo $row["city_name"]; ?></td>
                        				 
                        					<td align="center">
                        						<input type="checkbox" name="publish_<?php echo $row["id"]; ?>"	value="Y"
                        						<?php if($row["publish"] == 'Y') echo "checked"; ?> >
                        					</td>
                        					<td align="center">
                        						<a href="<?php echo site_url()."/location/city/update/".$row["id"]; ?>" 
                        							aria-haspopup="true" title="Update">
                        							<i class="fa fa-pencil"></i>
                        						</a>
                        						&nbsp;&nbsp;
                        						<a href="<?php echo site_url()."/location/city/delete/".$row["id"]; ?>" 
                        							aria-haspopup="true" title="Delete" onclick="return confirm('Are you sure delete this entry? ')" >
                        							<i class="fa fa-trash-o"></i>
                        						</a>
                        				<input type="hidden" name="cityid[]" value="<?php echo $row["id"]; ?>">
                        					</td>
                        				</tr>
                        				<?php	}	?>
                        				
                        				<input type="hidden" name="cityids" value="sa">
                        			</tbody>
                        		</table>
                        		<div class="text-center">	
                        			<input type="submit" name="btnUpdate" class="btn btn-primary pull-right" value="Update">
                        		</div>	
                        	</form>
                        	<?php }else { ?>
							<br/>
							<br/>
                        	<div class="alert alert-warning" role="alert">
                        		No records found. Please Search.
                        	</div>
                        	<?php	}	?>
                        </div>
                    </div>
                </div>
            </div> 
        </section>
            <!-- /page content -->
    </div> 
 
 
<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
	
<?php $this->template->contentEnd();?>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="<?=$theme_url;?>/js/location.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#cityListTable').DataTable({
		"pageLength": 50
	});
} );
</script> 
<?php echo $this->template->contentEnd();	?>   