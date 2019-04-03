<?php $this->template->contentBegin(POS_TOP); ?>
<style type="text/css">

    .profile-left h3 {
        margin-right: -20px;
        margin-left: -20px;
        margin-top: 0;
    }
    .company-details ul.nav li{
        width: 20%;
        text-align: center;
        border: 1px solid #ccc !important;
        margin: 0;
    }
    .company-details ul.nav li a, .nav-tabs>li>a:hover{
        color: #555 !important;
        border: none !important;
        margin:0 !important;
    }
    .company-details ul.nav-tabs {
        border-bottom: none !important;
    }
    .company-details ul.nav-tabs li:hover,  .company-details ul.nav-tabs li:focus, .company-details ul.nav-tabs li:active{
        /* border-bottom: none !important;*/
        background-color: #ccc !important;
        outline: none !important;
    }
    .company-details .nav-tabs>li.active>a, .company-details .nav-tabs>li.active>a:focus, .company-details .nav-tabs>li.active>a:hover, .company-details .nav-tabs>li.active>a:hover, .company-details .nav-tabs>li>a, .company-details .nav-tabs>li>a:focus, .company-details .nav-tabs>li>a:hover, .company-details .nav-tabs>li>a:hover,{
        background-color: #ccc !important;
        border-radius: 0px !important;
        outline: none !important;
        border-color: #ccc !important;
    }
    .company-details .nav-tabs>li.active a{
        background: #ccc !important;
        border-radius: 0 !important;
    }
</style> 
<?php echo $this->template->contentEnd(); ?> 
<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">Training Courses</li>
            </ul>
        </div>
        <div class="col-sm-8 padd-0">
            <ul>
                <li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url(); ?>">Go To My Stelmac </a></li>
            </ul>
        </div>
    </div>
    <!-- /.container --> 
</div>
<div class="welcome-j-bg">
    <div class="container">
        <!-- <div class="col-sm-8 col-lg-10 padd-0">
          <ul>
            <li class="">Welcome <? echo ucwords($_SESSION['u_name']);?></li>
          </ul>
        </div>
        <div class="col-sm-4 col-lg-2 padd-0">
          <ul>
            <li class=""><a href="<?php echo site_url(); ?>">Go To My Stelmac </a> |</li>
            <li class=""><a href="<?php echo site_url() . "pages/logout"; ?>">Sign Out </a></li>
          </ul>
        </div> -->
    </div>
</div>
<!-- /.welcome-j-bg -->
<div class="row margin_0" style="background-color: #353537;">
    <?php $this->load->view("cust_side_menu"); ?> 
    <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 padd-0">  
        <div class="bg_white">
            <div class="col-sm-12">
                <h3>Customer</h3>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Request Course Title </td><td>Duration  </td><td>No. Of Participants</td><td>Buying Price </td></tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($AllUser) && !empty($AllUser)) {

                            foreach ($AllUser as $key) {
                                    ?> 
                                    <tr>
                                        <td><?php echo $key['ccr_id']; ?></td>
                                        <td><?php echo $key['request_date']; ?></td> 
                                        <td><?php echo $key['company_name']; ?></td> 
                                        <!-- <td><?php echo $key['servicetype']; ?></td> -->
                                        <td><?php echo $key['noofparticipants']; ?></td> 
                                        <td><?php echo $key['buying_price']; ?></td>

<!-- 
                                        <td><a href="<?= site_url() . "customer/customer/update_training_courses/" . $key['ccr_id']; ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            &nbsp;&nbsp;<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?= site_url() . "customer/customer/delete_training_courses/" . $key['ccr_id']; ?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                        </td> 		 -->				</tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="clearfix"></div><br/>
<!--                <h3>Superuser</h3>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Created on </td><td>Request Course Title </td><td>Duration </td><td>Cost</td><td>Status </td><td>Action</td></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td></td> 
                            <td></td>
                            <td></td> 
                            <td></td> 
                            <td></td>
                            <td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                </table>-->

            </div><div class="clearfix"></div><br/>
        </div><div class="clearfix"></div>
    </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM); ?>

<?php echo $this->template->contentEnd(); ?> 


