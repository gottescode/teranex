<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Machine On-Rent Finance Details</li>
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
												<th>Finance Type </th>
												<th>Personal KYC</th>
												<th>Business eKYC</th>
												<th>Company Document</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
											foreach($machineFinance as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td><?=$row['finance_type'];?></td> 
												<td>
												<p>	<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['personal_adhar_card']?>" target="_blank">Aadhar Card</a>
												</p>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['personal_pan_card']?>" target="_blank">PAN Card</a>
												</p>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['personal_address_proof']?>" target="_blank">Address</a>
												</p>
												</td>
												<td>
												<p>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['business_pan_card']?>" target="_blank">PAN Card</a>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['business_address_proof']?>"target="_blank">Business Address</a>
												</p>
												</td>
												<td>
													<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['company_bank_statement']?>" target="_blank">Bank Statement</a>
												<p>	<a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['company_balance_sheet']?>" target="_blank">Balance Sheet</a>
													</p><a class="btn-xs btn-primary" href="<?php echo site_url()."uploads/on_rent_documents/".$row['company_invoice_sheet']?>" target="_blank">Invoice</a>
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