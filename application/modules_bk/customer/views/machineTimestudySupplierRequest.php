 



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

  <!-- /.container --> 

</div>

<!-- /.myprofile-bg dahboard-bg -->

<div class="welcome-j-bg">

  <div class="container">

    <!-- <div class="col-sm-8 col-lg-10 padd-0">

      <ul>

       

      </ul>

    </div>

    <div class="col-sm-4 col-lg-2 padd-0">

      <ul>

        <li class=""><a href="<?php echo site_url();?>">Go To My Teranex </a> |</li>

        <li class=""><a href="<?php echo site_url()."pages/logout";?>">Sign Out </a></li>

      </ul>

    </div> -->

  </div>

  <!-- /.container --> 

</div>

<!-- /.myprofile-bg dahboard-bg -->

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
						<th>Machine Name</th>
						<th>Brand</th>
						<th>Model</th>
						<th>Description</th>
						<th>Request Date</th>
						<th>Status</th>   
						<th>Uploaded Design</th>\
						<th>Action</th>
					</tr>

				</thead>

				<tbody>

						<?php

						if($TimeStudyReqList >0){ $i=1;

							foreach($TimeStudyReqList  as $rowData){

							?>

							<tr>

								<td><?=$i?></td>

								<td><?=$rowData['category_name']?></td>   
								<td><?=$rowData['brand_name']?></td> 
								<td><?=$rowData['model_name']?></td>
								<td><?=$rowData['description']?></td>
								<td><?=$rowData['enquiry_date']?></td>  
								<td>
								<?php if($rowData['request_status'] == 'A'){ ?>Accepted<?php }
						      elseif($rowData['request_status'] == 'R') { ?>Rejected<?php }
							  elseif($rowData['request_status'] == 'H') { ?>On Hold<?php } 
							  elseif($rowData['request_status'] == 'R') { ?>Rejected<?php }
							  elseif($rowData['request_status'] == 'P') { ?>Processing<?php }  
							  elseif($rowData['request_status'] == 'QS'){ ?>Quote Submitted<?php }
							  elseif($rowData['request_status'] == 'QG') { ?>Quote Genrated<?php } 
							  elseif($rowData['request_status'] == 'D') { ?>Delivered  <?php } 
							  elseif($rowData['request_status'] == 'C') { ?>Completed  <?php } 
							  else { ?>Requested<?php } ?>	
								</td>  

								
								<td><?php
                                    if ($rowData['drawing_upload'] != '') {
                                        echo "<a href='" . site_url() . "uploads/machine_drawing_upload/" . $rowData['drawing_upload'] . "' target='_blank'>Click Here</a>";
                                    }
                                    ?></td>
                                 <td><?php if($rowData['request_status'] !== 'QS'){ ?>

									<a href="<?=site_url()."customer/TimeStudyEstimate/".$rowData['mtr_id'];?>" class="btn btn-xs btn-primary"> Time Estimate </a>
								<?php } else { ?>
							<a href="<?=site_url()."customer/TimeStudyEstimate/".$rowData['mtr_id'];?>" class="btn btn-xs btn-primary"> View </a>

								<?php } ?>
								</td> 
                                
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