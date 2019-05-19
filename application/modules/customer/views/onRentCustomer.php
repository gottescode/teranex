<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Machine On-Rent RFQ List</li>
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
											<th>Agreement</th> 
											<th>Finance</th> 
											<th>Insurance</th> 
											<th>TimeLine</th> 
											<th>Enquiry Date</th>
											<th>Quote</th> 
											<th>Status</th> 
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$i=1;
								
										foreach($machineOnRentRequestList as $row){ ?>
										<tr>
											<td><?=$i++;?></td> 
											<td>
													<?  if($row['is_competition']==='Y'){	?>
														<a target="_blank" href="<?=site_url()."uploads/on_rent_documents/".$row['competition_file'];?>" class="btn btn-xs btn-primary">Competition Doc</a>
													<?	}else{ ?>
														
													<?	} ?>
													
													<?	if($row['is_nda']==='Y'){	?>
														<a target="_blank" href="<?=site_url()."uploads/on_rent_documents/".$row['nda_file'];?>" class="btn btn-xs btn-primary">NDA Doc</a>
														
													<?	}else{ ?>
														
													<?	}	?>
											</td>
											<td>
													<?	if($row['is_finance']){ ?>
														<a target="_blank" href="<?=site_url()."customer/machineOnRentFinanceDetails/".$row['id'];?>" class="btn btn-xs btn-primary">Finance Details</a>
														
													<?	}else{ ?>
														
													<?	}	?>
													
											</td>
											<td>
											<?
														if($row['is_insurance']){ ?>
														<a target="_blank" href="<?=site_url()."customer/insuranceDetailsOnRent/".$row['id'];?>" class="btn btn-xs btn-primary">Insurance Details</a>
														
													<?	}else{	?>
													
													<?	} ?>

											</td>
											<td>
												<a target="_blank" href="<?=site_url()."customer/timeLineDetailsOnRent/".$row['id'];?>" class="btn btn-xs btn-primary">TimeLine Details</a>
											</td> 
											<td><?=$row['created_date'];?></td> 
											<td>
												<?  if($row['quote']){	?>
													<a target="_blank" href="<?=site_url()."uploads/on_rent_documents/".$row['quote'];?>" class="btn btn-xs btn-primary">View Quote</a>
												<?	}else{ ?>
													-
												<?	} ?>
											</td>
										
											<td><?php 
													if($row['status'] == 'CA'){ ?>Accepted<?php }
													elseif($row['status'] == 'CR') { ?>Rejected<?php }
													elseif($row['status'] == 'H') { ?>Requested<?php } 
													elseif($row['status'] == 'QS'){ ?>Quote Submitted<?php }
												?>	
											</td>
											<td>
												<?	if($row['status'] == 'QS'){ ?>
													<a href="<?php echo site_url()."customer/acceptOnRentQuoteFromSupplier/".$row['id']?>" class="btn btn-xs btn-primary" onclick="return confirm('Are You Sure To Accept This Quote?')"> Accept Quote</a>
													<a href="<?php echo site_url()."customer/rejectOnRentQuoteFromSupplier/".$row['id']?>" class="btn btn-xs btn-primary" onclick="return confirm('Are You Sure To Reject This Quote?')" > Reject Quote</a>
												<?	}else{	?>
													-
												<?	} ?>
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