<?php $this->template->contentBegin(POS_TOP); ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
<link rel="stylesheet" href="<?=$theme_url;?>/css/toastr.css">
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
                <li class="myprofile">Machine Services</li>
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
                        <div class="">
                                <?php   // display messages
                            if(hasFlash("dataMsgSuccess"))  {   ?>
                                <div class="alert alert-success alert-dismissible" role="alert">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                  <?php echo getFlash("dataMsgSuccess"); ?>
                                </div>
                            <?php   }   ?>
                                <?php   // display messages
                                    if(hasFlash("dataMsgError"))    {   ?>
                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                          <?php echo getFlash("dataMsgError"); ?>
                                        </div>
                            <?php   }   ?>
                             
                            <div class=""> 
                                <a href="<?=site_url()."customer/create_machine"?>" class="btn btn_orange" role="button">Add Machine</a><br/><br/>
                                    
                                <form id="" name="" class="form-horizontal" enctype="multipart/form-data" method="post">
                                <div class="table-responsive">
                        
                                    <table class="table table-bordered table-striped" id="community_table">
                                        <thead>
                                            <tr>
                                                <th>Sr.No.</th>
                                                <th>Category Name</th> 
                                                <th>Brand Name</th> 
                                                <th>Model No.</th> 
                                                <th>Add Images</th> 
                                                <th>Add Services</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $i=1;
                                            foreach($machineCatList as $row){ ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$row['catName'];?></td>
                                                <td><?=$row['brandName'];?></td>
                                                <td><?=$row['modelName'];?></td>
                                                <td>
                                                    <a href="<?=site_url()."customer/add_machineDetail_image/".$row['md_id']; ?>" class="btn  btn-xs btn-success">Add Images</a>
                                                </td>
                                                <td>
                                                    <a href="<?=site_url()."customer/add_machine_services/".$row['md_id']; ?>" class="btn  btn-xs btn-success">Add Services</a>
                                                </td>
                                                <td>
                                                    <a href="<?=site_url()."customer/offerToCustomer/".$row['md_id']; ?>" class="btn  btn-xs btn-success">Offer</a>
                                                    <a href="<?=site_url()."customer/update_machine/".$row['md_id']; ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                                    &nbsp;&nbsp;
                                                    <a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?=site_url()."customer/deleteMachineDetails/".$row['md_id']; ?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                                </td> 
                                            </tr>
                                            <? } ?>
                                        </tbody>
                                    </table>  
                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
            <div class="col-sm-12">
                <h3>My Machine Requests</h3>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Brand </td><td>Model </td> <td style="display:none;">AMC (Y/N) </td><td>Service Type (breakdown/maintenance) </td><td>Created on  </td><td>Status </td><!-- <td>Action</td> --></tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($AllUser) && !empty($AllUser)) {
                            //print_r($AllUser);die;
                            // print_r($key);die;
                            foreach ($AllUser as $key) {
                                ?> 
                                <tr>
                                    <td><?php echo $key['rmr_id']; ?></td>
                                    <td><?php echo $key['machinebrand']; ?></td> 
                                    <td><?php echo $key['machinemodel']; ?></td> 
<!--                                    <td><?php echo $key['company_name']; ?></td> -->
                                    <td><?php echo $key['servicetype']; ?></td> 
                                    <td><?php echo $key['request_date_time']; ?></td> 
                                    <td><?php if($key['payment_status'] == 'A'){ ?>
                                        Accepted <?php } elseif($key['payment_status'] == 'R'){ ?> Rejected <?php } else { ?> Requested <?php } ?></td> 


                                <!--     <td><a href="<?= site_url() . "customer/customer/update_machine_services/" . $key['rmr_id']; ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        &nbsp;&nbsp;<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?= site_url() . "customer/customer/delete_services/" . $key['rmr_id']; ?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td> 	 -->					</tr>
                            <?php }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="clearfix"></div><br/>
<!--                <h3>Superuser</h3>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Customer name</td><td>Supplier name</td><td>Brand </td><td>Model </td> <td>AMC (Y/N) </td><td>Service Type (breakdown/maintenance) </td><td>Created on  </td><td>Status </td><td>Action</td></tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td></td> 
                            <td></td>
                            <td></td> 
                            <td></td> 
                            <td></td> 
                            <td></td> 
                            <td></td> 
                            <td></td>
                            <td> <a href="" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a> &nbsp; &nbsp; <a href="" aria-haspopup="true" title="Delete" ><i class="fa fa-trash" aria-hidden="true"></i></a></td>
                        </tr>
                    </tbody>
                </table>-->
                <div class="clearfix"></div><br/>
               <!--  <h3>Supplier</h3>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Customer name</td><td>Brand </td><td>Model </td> <td>AMC (Y/N) </td><td>Service Type (breakdown/maintenance) </td><td>Created on  </td><td>Status </td><td>Action</td></tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($AllUser) && !empty($AllUser)) {
                          
                            foreach ($AllUser as $key) {
                                if($key['user_type']==1){
                                ?> 
                                <tr>
                                    <td><?php echo $key['rmr_id']; ?></td>
                                    <td><?php echo $this->session->userdata('u_name');?></td>
                                    <td><?php echo $key['machinebrand']; ?></td> 
                                    <td><?php echo $key['machinemodel']; ?></td> 
                                    <td><?php echo $key['company_name']; ?></td> 
                                    <td><?php echo $key['servicetype']; ?></td> 
                                    <td><?php echo $key['request_date_time']; ?></td> 
                                    <td><?php echo $key['payment_status']; ?></td> 


                                     <td><a href="<?= site_url() . "customer/customer/update_machine_services/" . $key['rmr_id']; ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a>
                                        &nbsp;&nbsp;<a onclick="return confirm('Are You Sure To Delete This Entry?')"  href="<?= site_url() . "customer/customer/delete_services/" . $key['rmr_id']; ?>" aria-haspopup="true" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    </td> 						</tr>
                            <?php } }
                        }
                        ?>
                    </tbody>
                </table> -->
            </div><div class="clearfix"></div><br/>
        </div><div class="clearfix"></div>
    </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM); ?>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="<?=$theme_url;?>/plugins/datatables/dataTables.bootstrap.min.js"></script> 
    <script type="text/javascript">
    $(document).ready(function() {
        $("#community_table").DataTable({
             "order": [[ 0, "desc" ]]
    }); 
    }); 
    </script>
<?php echo $this->template->contentEnd(); ?> 


