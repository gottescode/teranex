

<link rel="stylesheet" href="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
  <span style="font-size: 24px;padding: 10px;">Exchange Group Request List</span>
  
  <ol class="breadcrumb">
	<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
	<li class="active">Request List</li>
	
  </ol>
</section>
	 <!-- Main content -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<?php 	// display messages
						if(hasFlash("dataMsgSuccess"))	{	?>
							<div class="alert alert-success alert-dismissible" role="alert">
							  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  <?php echo getFlash("dataMsgSuccess"); ?>
							</div>
				<?php	}	?>
				<div class="box-body"> 
				
				     <div class="col-sm-12">
                <div>
                   <div class="col-xs-12">
				   <a href="<?php echo site_url()."exchangegroups/admin"?>" class="btn btn-xs pull-right">BACK</a>
                        <table class="table table-bordered table-striped " id="" role="grid" aria-describedby="">
                            <thead>
                                <tr role="row"><th>Category</th><td><?php echo $rfqData['category'] ?></td></tr>
                                <tr role="row"><th>Requested On </th><td><?php echo $rfqData['request_on'] ?></td></tr>
                                <tr role="row"><th>Description </th><td><?php echo $rfqData['description'] ?></td></tr>
                                <tr role="row"><th>Timeline </th><td><?php echo $rfqData['timeline'] ?></td></tr>
                                <tr role="row"><th>Country </th><td><?php echo $country_name; ?></td></tr>
                                <tr role="row"><th>State </th><td><?php echo $state_name; ?></td></tr>
                                <tr role="row"><th>City </th><td><?php echo $city_name; ?></td></tr>
                                <tr role="row"><th>Customer Name</th><td><?php if($rfqData['customer_name']){ echo $rfqData['customer_name']; }else{
									echo "-";
								} ?></td></tr>
                                  <tr role="row"><th>Supplier Name</th><td><?php if($rfqData['supplier_name']){ echo $rfqData['supplier_name']; }else{
									echo "-";
								} ?></td></tr>  
								<tr role="row"><th>Supplier Comment</th><td><?php if($rfqData['supplier_comments']){ echo $rfqData['supplier_comments']; }else{
									echo "-";
								} ?></td></tr>
                                <tr role="row"><th>Request Accepted On</th><td><?php if($rfqData['request_accepted']){ echo $rfqData['request_accepted']; }else{
									echo "-";
								} ?></td></tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div> <div class="clearfix"></div>
      </div>
			</div>
		</div>
	</div>			
</section> 
</div>
	
	  
<?php $this->template->contentBegin(POS_BOTTOM);?>
	<script src="<?=$theme_url;?>/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
	<script type="text/javascript">
	$(document).ready(function() {
		$("#product_table").DataTable({
		    "order": [[ 0, "desc" ]]
	});	
	}); 
	</script>
<?php $this->template->contentEnd();	?> 

<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">Exchange Group Enquiry Details</li>
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
                <li class=""><a href="<?php echo site_url(); ?>">Go To My Teranex </a> |</li>
                <li class=""><a href="<?php echo site_url() . "pages/logout"; ?>">Sign Out </a></li>
            </ul>
        </div> -->
    </div>
    <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
    <?php $this->load->view("customer/cust_side_menu"); ?> 
<div class="row margin_0" style="background-color: #353537;">

    <div class="">
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 bg_white">  
            <?php
            // display messages
            if (hasFlash("dataMsgProfileSuccess")) {
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgProfileSuccess"); ?>
                </div>
            <?php } if (hasFlash("dataMsgProfileError")) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgProfileError"); ?>
                </div>
            <?php } ?>	
            <div class="col-sm-12">
                <div>
                   <div class="col-xs-12">
				   <a href="<?php echo site_url()."customer/exchangegroup/rfqListExchangeGroupSupplier"?>" class="btn btn-xs pull-right">BACK</a>
                        <table class="table table-bordered table-striped " id="" role="grid" aria-describedby="">
                            <thead>
                                <tr role="row"><th>Category</th><td><?php echo $rfqData['category'] ?></td></tr>
                                <tr role="row"><th>Requested On </th><td><?php echo $rfqData['request_on'] ?></td></tr>
                                <tr role="row"><th>Description </th><td><?php echo $rfqData['description'] ?></td></tr>
                                <tr role="row"><th>Timeline </th><td><?php echo $rfqData['timeline'] ?></td></tr>
                                <tr role="row"><th>County </th><td><?php echo $country_name; ?></td></tr>
                                <tr role="row"><th>State </th><td><?php echo $state_name; ?></td></tr>
                                <tr role="row"><th>City </th><td><?php echo $city_name; ?></td></tr>
                                <tr role="row"><th>Customer Name</th><td><?php if($rfqData['u_name']){ echo $rfqData['u_name']; }else{
									echo "-";
								} ?></td></tr>
                                <tr role="row"><th>Request Accepted On</th><td><?php if($rfqData['request_accepted']){ echo $rfqData['request_accepted']; }else{
									echo "-";
								} ?></td></tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div> <div class="clearfix"></div>
        </div>
    </div> 
</div>
<?php $this->template->contentBegin(POS_BOTTOM); ?>
<script language="javascript" type="text/javascript">
    
</script>
<?php $this->template->contentEnd(); ?> 