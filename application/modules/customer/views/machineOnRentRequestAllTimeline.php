<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Machine On-Rent TimeLine Details</li>
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
												<th>Set-Up Form</th> 
												<th>Weekdays Form</th> 
												<th>Shift Form </th> 
												<th>Work Will Be Awarded By</th>  
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;$row = $machineOnRentRequestList;
											?>
											<tr>
												<td><?=$i++;?></td> 
												<td>
													<p>Preferred Date: <?=$row['quote_needed_pref_date']?></p>
													<p>Currency: <?=$row['currency']?></p>
												</td>
												<td>
													<p>Preferred Date: <?=$row['set_up_form_pref_date']?></p>
													<p>To: <?=$row['set_up_to_date']?></p>
												</td>
												<td>
													<p>Preferred Date: <?=$row['weekdays_pref_date_from']?></p>
													<p>To: <?=$row['weekdays_pref_date_to']?></p>
												</td>
												<td>
													<p>Preferred Date: <?=$row['shift_from']?></p>
													<p>To: <?=$row['shift_to']?></p>
												</td>
												<td>
													<p><?=$row['work_awarded_date']?></p>
												</td>
											</tr>
											
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