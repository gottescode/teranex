<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Machine On-Rent Insurance Details</li>
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
									<div class="table-responsive">
								<table class="table table-bordered table-striped" id="community_table">
									<thead>
										<tr>
											<th>Sr.No.</th>
											<th>Insurance Type </th>
											<th>Name</th>
											<th>Business Name</th>
											<th>Business Address</th>
											<th>City</th>
											<th>PinCode</th>
											<th>Email-ID</th>
											<th>Phone Number</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$i=1;
										foreach($machineInsurance as $row){ ?>
										<tr>
											<td><?=$i++;?></td> 
											<td><?=$row['insurance_type'];?></td> 
											<td><?=$row['first_name']." ".$row['last_name'];?></td> 
											<td><?=$row['business_name'];?></td> 
											<td><?=$row['business_address'];?></td> 
											<td><?=$row['city'];?></td> 
											<td><?=$row['pincode'];?></td> 
											<td><?=$row['email_id'];?></td> 
											<td><?=$row['phone_no'];?></td>									
										</tr>
										<? } ?>
									</tbody>
								</table>  
							</div>
							<h3> Machine Cover Details</h3>
							<div class="table-responsive">
								<table class="table table-bordered table-striped" id="community_table">
									<thead>
										<tr>
											<th>Sr.No.</th>
											<th>Machine </th>
											<th>Quantity </th>
											<th>Cover End</th>
											<th>Cover Start</th>
											<th>Cover Amount</th>
										</tr>
									</thead>
									<tbody>
									<?php 
									$i=1;
										foreach($machineDetailsInsurance as $row){ ?>
										<tr>
											<td><?=$i++;?></td> 
											<td><?=$row['name'];?></td> 
											<td><?=$row['qty'];?></td> 
											<td><?=$row['cover_start_date'];?></td> 
											<td><?=$row['cover_end_date'];?></td> 
											<td><?=$row['cover_amount'];?></td> 
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
        </div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 