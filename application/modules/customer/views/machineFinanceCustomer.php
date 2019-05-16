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
					<th>Machine</th> 
					<th>Personal KYC</th>
					<th>Business eKYC</th>
					<th>Company Document</th>
					<th>Enquiry Date</th>
					<th>Status</th> 
					<th>Supplier Quote</th> 
					<th>Action</th> 
				</tr>
				</thead>
				<tbody>
						<?php
							//print_r($FinanceReqList);exit;
						if($FinanceReqList >0){ $i=1;
							foreach($FinanceReqList as $row){	?>
											<tr>
												<td><?=$i;?></td> 
												<td>
													<p>Machine ID:<?php echo $row['machine_unique_id']?></p>
													<p>Brand:<?php echo $row['brand_name']?></p>
													<p>Model:<?php echo $row['model_name']?></p>
												</td>
												<td>
												<p>	<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['personal_adhar_card']?>" target="_blank">Aadhar Card</a>
												</p>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['personal_pan_card']?>" target="_blank">PAN Card</a>
												</p>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['personal_address_proof']?>" target="_blank">Address</a>
												</p>
												</td>
												<td>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['business_pan_card']?>" target="_blank">PAN Card</a>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['business_address_proof']?>"target="_blank">Business Address</a>
												</p>
												</td>
												
												<td>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['company_bank_statement']?>" target="_blank">Bank Statement</a>
												<p>	<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['company_balance_sheet']?>" target="_blank">Balance Sheet</a>
													</p><a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/finance_request/".$row['company_invoice_sheet']?>" target="_blank">Invoice</a>
												</td>
												<td><?=$row['created_on'];?></td> 
												<td><?php 
														if($row['status'] == 'CA'){ ?>Accepted<?php }
														elseif($row['status'] == 'CR') { ?>Rejected<?php }
														elseif($row['status'] == 'H') { ?>Requested<?php } 
														elseif($row['status'] == 'QS'){ ?>Quote Submitted<?php }
													?>	
												</td>
												<td>
									<? if($row['supplier_quote']!=''){ ?>
										<a target="_blank" href="<?=site_url()."uploads/supplier_quote_finance/".$row['supplier_quote'];?>" class="btn btn-xs btn-primary"> View Quote</a>
									<?	}else{	?>
										-
									<?	}	?>
								</td>
												
												<td>
													<?	if($row['status'] == 'QS'){ ?>
									<a href="<?php echo site_url()."customer/acceptFinanceQuoteFromSupplier/".$row['id']?>" class="btn btn-xs btn-primary" onclick="return confirm('Are You Sure To Accept This Quote?')"> Accept Quote</a>
									<a href="<?php echo site_url()."customer/rejectFinanceQuoteFromSupplier/".$row['id']?>" class="btn btn-xs btn-primary" onclick="return confirm('Are You Sure To Reject This Quote?')" > Reject Quote</a>
										
									<?	} ?>
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