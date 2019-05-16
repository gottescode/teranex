<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Machine Time study Request List</li>
      </ul>
    </div>
    <div class="col-sm-6 padd-0">
		<ul>
			<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
		</ul>
	</div>
  </div>
</div>
<div class="welcome-j-bg">
  <div class="container">
	</div>
</div>

<div class="row margin_0" style="background-color: #353537;">
<?php   $this->load->view("cust_side_menu" ); ?>
	<div class="bg_white"> 

		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  

			<?php 	// display messages

			if(hasFlash("dataMsgAddSuccess"))	{	?>

				<div class="alert alert-success alert-dismissible" role="alert">

				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				  <?php echo getFlash("dataMsgAddSuccess"); ?>

				</div>

			<?php }	if(hasFlash("dataMsgAddError"))	{	?>

				<div class="alert alert-danger alert-dismissible" role="alert">

				  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

				  <?php echo getFlash("dataMsgAddError"); ?>

				</div>

			<?php }	

			$userId =  $this->session->userdata('uid');
		?>
		<table id='' class="table table-striped table-hover">
			<thead>
				<tr bgcolor="#CCCCCC">
					<th>Sr.No.</th>
					<th>Part Name</th>
					<th>Material Type</th>
					<th>Application Name</th>
					<th>Drawing File</th>
					<th>Description</th>
				</tr>
				</thead>
				<tbody>
						<?php
						if($timeStudyReqDetails  >0){ $i=1;
							foreach($timeStudyReqDetails as $rowData){
							?>
							<tr>
								<td><?=$i?></td>
								<td><?=$rowData['part_name']?></td>   
								<td><?=$rowData['material_type']?></td>   
								<td><?=$rowData['application_name']?></td> 
								<td><a target="_blank"href = "<?php echo site_url()."uploads/time_study_request/".$rowData['drawing_file']?>">Drawing File</a></td>
								<td><?=$rowData['description']?></td> 
							</tr>
						<?php $i++; }
							echo "";
						}else{
							echo "<tr><td colspan='4'>Record not found</td></tr>";
						}?>
				</tbody>
			</table>
		</div> 

		<div class="clearfix"></div>

	</div>

</div> 

<?php $this->template->contentBegin(POS_BOTTOM);?>

<script language="javascript" type="text/javascript">

</script>

<?php $this->template->contentEnd();	?> 