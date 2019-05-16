<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Manufacturing TimeLine Details</li>
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
												<th>Quote Needed by</th> 
												<th>Work Will Be Awarded by</th> 
												<th>Part needed by</th>
												<th>Quote Quantity</th>  
												<th>Invite Suppliers I Know</th>  
												<th>Delivery Needed by</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;
$row = $manufacturingRequestData;
//											foreach($manufacturingRequestData as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p>Preferred Date: <?=$row['quote_needed_preferred_date'];?></p>
													<p>Currency: <?=$row['currency'];?></p>
												</td>
												<td><p>Preferred Date: <?=$row['work_awarded_by_preferred_date'];?></p></td>
												<td><p>Preferred Date: <?=$row['part_needed_date'];?></p></td>
												<td><?=$row['quote_quantity'];?></td>
												<td><?=$row['invite_suppliers'];?></td>
												<td><p>Paid By: <?=$row['paid_by'];?></p>
												<p>Delivery Address: <?=$row['delivery_address'];?></p></td>
											</tr>
											<?// } ?>
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