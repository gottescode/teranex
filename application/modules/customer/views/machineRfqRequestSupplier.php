<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Machine Request For Quote List</li>
      </ul>
    </div>
    <div class="col-sm-6 padd-0">
		<ul>
			<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
		</ul>
	</div>
  </div>
</div>

<?php   $this->load->view("cust_side_menu" ); ?>
        <div class="col-md-9">
            <div class="dashReport">
                <div class="tab-content">
                    <div class="tab-pane active" id="User">
                        <div class="tableWrapTabing">
                            <div class="table-responsive">
										<table class="table table-bordered table-striped" id="community_table">
										<thead>
											<tr>
												<th>Sr.No.</th>
												<th>Machine</th> 
												<th>Customer</th> 
												<th>Quote Needed by</th> 
												<th>Delivery Needed by</th> 
												<th>Mode Of Payment</th> 
												<th>Enquiry Date</th>
												<th>RFQ Status</th> 
												<th>Supplier Quote</th> 
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($reqList as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p><b>Machine ID:</b> <?php echo $row['machine_unique_id']?></p>
													<p><b>Brand: </b><?php echo $row['brand_name']?></p>
													<p><b>Model: </b><?php echo $row['model_name']?></p>
												</td>
												<td><?=$row['cust_name'];?></td>
												<td>
													<p><b>Preferred Date: </b><?=date_dmy($row['preferred_date']);?></p>
													<p><b>Currency	: </b><?=$row['currency'];?></p>
												</td> 
												<td>
													<p><b>Preferred Date: </b><?=date_dmy($row['delivery_preferred_date']);?></p>
													<p><b>Paid By	: </b><?=$row['paid_by'];?></p>
													<?php if($row['delivery_address']!=''){ ?>
													<p><b>Delivery Address	: </b><?=$row['delivery_address'];?></p>
													<?	} ?>
												</td> 
												<td>
													<p><b>Advance Payment: </b><?=$row['mode_of_advance_payment'];?></p>
													<p><b>Remaining Payment: </b><?=$row['remaining_payment'];?></p>
												</td> 
												<td><?=$row['created_date'];?></td> 
												<td><?php 
														if($row['status'] == 'CA'){ ?>Accepted<?php }
														elseif($row['status'] == 'CR') { ?>Rejected<?php }
														elseif($row['status'] == 'H') { ?>Requested<?php } 
														elseif($row['status'] == 'QS'){ ?>Quote Submitted<?php }
													?>	
												</td>
												<td>
													<?php if($row['supplier_quote']!=''){
														?>
														
													<a target="_blank" href="<?php echo site_url()."uploads/supplier_quote_machine_rfq/".$row['supplier_quote']?>" class="btn btn-xs btn-primary"> Quote </a>
													<?
														}else{	?>
														<a target="_blank" href="<?php echo site_url()."customer/sendMachineRfqToCustomer/".$row['id']?>" class="btn btn-xs btn-primary"> Send Quote </a>
														<?

														}
													?>
												</td> 
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
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 