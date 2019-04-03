 

<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-4 padd-0">
      <ul>
        <li class="myprofile">Automation List</li>
      </ul>
    </div>
    <div class="col-sm-8 padd-0">
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
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  
			<!-- <div class="alert alert-warning alert-dismissible" role="alert">
			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			</div> -->
			<table id='' class="table table-striped table-hover">
				<thead>
					<tr bgcolor="#CCCCCC"><td>S.No</td><td> Machine Name</td><td>Message</td><td>Enquiry Date</td> <td>Action</td></tr>
				</thead>
				<tbody>
				<?php if($machineContactRequest){ $i=1;
					foreach($machineContactRequest as $requestMachine){?>
							<tr>
								<td><?php echo $i++;?></td>
								<td><?php echo $requestMachine['model_no'].", ".$requestMachine['brand_name'];?></td> 
								<td><?php echo $requestMachine['message'];?></td>
								<td><?php echo $requestMachine['enquiry_date'];?></td> 
								<td> <a href="<?php echo site_url()."customer/machinecomment/".$requestMachine['mc_id']."/".formaturl($requestMachine['model_no'])."/".formaturl($requestMachine['brand_name']);?>"  class="btn btn-xs btn-primary">Comment</a></td>
							</tr>
				<?php }}?>
				</tbody>
			</table>
		</div> 
<!-- /.row --> <div class="clearfix"></div>
	</div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script language="javascript" type="text/javascript">
</script>
<?php $this->template->contentEnd();	?> 