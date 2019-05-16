<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-6 padd-0">
      <ul>
        <li class="myprofile">Manufacturing RFQ Details</li>
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
												<th>Part Name</th> 
												<th>Material Type</th> 
												<th>Application Name</th>
												<th>Drawing File</th>  
												<th>Description</th>
											</tr>
										</thead>
										<tbody>
										<?php 
										$i=1;

											foreach($manufacturingRequestData as $row){ ?>
											<tr>
												<td><?=$i++;?></td> 
												<td><?=$row['part_name'];?></td>
												<td><?=$row['material_type'];?></td>
												<td><?=$row['application_name'];?></td>
												<td><? echo "<a href='" . site_url() . "uploads/on_demand_manufacturing_drawing_upload/" . $row['drawing_file'] . "' target='_blank'>Click Here</a>"; ?></td>
												<td><?=$row['description'];?></td> 
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