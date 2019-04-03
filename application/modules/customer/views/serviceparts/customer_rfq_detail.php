<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">User List</li>
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
				   <a href="<?php echo site_url()."customer/groupbuying/rfqListServicePartsCustomer"?>" class="btn btn-xs pull-right">BACK</a>
                        <table class="table table-bordered table-striped " id="" role="grid" aria-describedby="">
                            <thead>
                                <tr role="row"><th>Quantity</th><td><?php echo $rfqData['service_quantity'] ?></td></tr>
                                <tr role="row"><th>Service Part Category </th><td><?php echo $rfqData['servicepart_category'] ?></td></tr>
                                <tr role="row"><th>Service Part Type </th><td><?php echo $rfqData['servicepart_type'] ?></td></tr>
                                <tr role="row"><th>Service Part Brand </th><td><?php echo $rfqData['servicepart_brand'] ?></td></tr>
                                <tr role="row"><th>Service Part Name </th><td><?php echo $rfqData['servicepart_name'] ?></td></tr>
                                <tr role="row"><th>Service Part Frequency</th><td><?php echo $rfqData['cons_freq'] ?></td></tr>
                                <tr role="row"><th>Request Date</th><td><?php echo $rfqData['created_date'] ?></td></tr>
                                <tr role="row"><th>Final Price</th><td><b><?php echo $rfqData['quote_price_by_admin'] ?></b></td></tr>
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