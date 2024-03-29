<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">OnDemand Manufacturing RFQ List</li>
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
								<table class="table table-striped">
									<thead>
										<tr>
											<th>Sr.No.</th>
											<th>Machine</th> 
											<th>Customer Name</th> 
											<th>NDA</th> 
											<th>Finance</th> 
											<th>Sent Quote</th> 
											<th>Enquiry Date</th>
											<th>RFQ Status</th> 
											<th>TimeLine Details</th> 
											<th>Action</th> 
										</tr>
									</thead>
									<tbody>
										<?php 
											$i=1;
											
											foreach($rfqData as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p><b>Machine ID:</b> <?php echo $row['machine_unique_id']?></p>
													<p><b>Brand: </b><?php echo $row['brand_name']?></p>
													<p><b>Model: </b><?php echo $row['model_name']?></p>
												</td>
												<td><?php echo $row['cust_name']; ?></td>
												<td>
													<? if($row['nda']==='Y'){ ?>
													<a target="_blank" href="<?php echo site_url()."uploads/on_demand_manufacturing_nda/".$row['nda_file']?>" class="btn btn-xs btn-primary"> NDA </a>
													<?	}else{	?>
														-
													<?	}	?>
												</td> 
												<td> 
													<? if($row['finance_status']==='Y'){ ?>
													<a target="_blank" href="<?php echo site_url()."customer/viewFinanceDocumentsDetails/".$row['id']?>" class="btn btn-xs btn-primary"> Finance Details</a>
													<?php } ?>
												</td> 
												<td>
													<?php if($row['supplier_quote']){
														?>
													<a target="_blank" href="<?php echo site_url()."uploads/supplier_quote_on_demand_manufacturing/".$row['supplier_quote']?>" class="btn btn-xs btn-primary"> Quote </a>
													<?
														}else{
															?>
													<a target="_blank" href="<?php echo site_url()."customer/sendManufactringQuoteToCustomer/".$row['id']?>" class="btn btn-xs btn-primary"> Send Quote </a>
													<?	}
													?>
												</td>
												<td><?=$row['created_date'];?></td> 
											<td><?php 
														if($row['status'] == 'CA'){ ?>Customer Accepted<?php }
														elseif($row['status'] == 'CR') { ?>Customer Rejected<?php }
														elseif($row['status'] == 'H') { ?>Requested<?php } 
														elseif($row['status'] == 'QS'){ ?>Quote Submitted<?php }
													?>	
												</td>
												
												<td>
													<a target="_blank" href="<?php echo site_url()."customer/viewManufacturingRequestDetails/".$row['id']?>" class="btn btn-xs btn-primary"> RFQ Details</a>
													
													<?	if($row['status'] == 'QS'){ ?>
													
												<?	} ?>
												</td>
												<td>
													<a target="_blank" href="<?php echo site_url()."customer/viewManufacturingTimeLineDetails/".$row['id']?>" class="btn btn-xs btn-primary"> Timeline Details</a>
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