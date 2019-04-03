<div class="container-fluid myprofile-bg dahboard-bg">

  <div class="container">

    <div class="col-sm-6 padd-0">

      <ul>

        <li class="myprofile">Remote Programming List</li>

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

		<div class="col-md-10 col-sm-12 col-xs-12 ">  

			<?php 	// display messages

			if(hasFlash("dataMsgAddError"))	{	?>

			<div class="alert alert-warning alert-dismissible" role="alert">

			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			  <?php echo getFlash("dataMsgAddError"); ?>

			</div>

			<?php }	?>



			<table id='' class="table table-striped table-hover">

				<thead>

					<tr bgcolor="#CCCCCC">

						<th>Sr.No.</th>
						<th>Part Name</th>  
						<th>Request Date Time</th>  
						<th>Status</th>  
			     		<th>Action</th>
					</tr>
				</thead>
				<tbody>
					<?php 
						if($requestList >0){ $i=1;
							foreach($requestList  as $rowData){
							?>
							<tr>
								<td><?=$i++?></td>
								<td><?=$rowData['part_name']?></td> 
								<td><?=$rowData['requested_date']?></td>  
								<td>
								<?php if($rowData['request_status'] == 'A'){ ?>Processing<?php }
						      elseif($rowData['request_status'] == 'R') { ?>Reject<?php }
							  elseif($rowData['request_status'] == 'H') { ?>On Hold<?php } 
							  elseif($rowData['request_status'] == 'R') { ?>Rejected<?php }
							  elseif($rowData['request_status'] == 'P') { ?>Processing<?php }  
							  elseif($rowData['request_status'] == 'QS') { ?>Quote Submitted<?php }
							  elseif($rowData['request_status'] == 'QG') { ?>Processing<?php } 
							  elseif($rowData['request_status'] == 'D') { ?>Processing  <?php } 
							  elseif($rowData['request_status'] == 'C') { ?>Completed  <?php } 
							  else { ?>Requested<?php } ?>	
								</td> 
                                                                
                                <td>
                                
                     <a href="<?=site_url()."customer/viewAdditiveRfqDetails/".$rowData['dmrID']?>" class="btn btn-xs btn-info" >RFQ Details</a>
                     <?php
                                    $user_role=$this->session->userdata('user_role');
                                                                  
                                    if($rowData['request_status'] == 'QS')
                                         { ?>
                      <a href="<?=site_url()."customer/viewCustomerQutation/".$rowData['drrs_id']?>" class="btn btn-xs btn-info" >Requested Quotation</a> &nbsp; &nbsp;  
                                                              <?php } ?>
                                </td>

			

							</tr>

						

						<?php }

							echo "";

						} ?>

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