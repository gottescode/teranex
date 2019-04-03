<?php $this->template->contentBegin(POS_TOP); ?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/css/events.css"/>

<style type="text/css">
    .margin_10_top{
        margin-top: 10px;
    }
</style>
<?php echo $this->template->contentEnd(); ?>
<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-6 padd-0">
            <ul>
                <li class="myprofile">My Dashboard </li>
            </ul>
        </div>

        <div class="col-sm-6 padd-0">
            <ul>
                <li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url(); ?>">Go To My Stelmac </a></li>
            </ul>
        </div>
    </div>

    <?php if (hasFlash("dataLinkedSuccessSign")) {
        ?>
        <div class="alert alert-success alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo getFlash("dataLinkedSuccessSign"); ?>
        </div>
    <?php } ?>

    <?php
    // display messages
    if (hasFlash("ErrorMsgLinked")) {
        ?>
        <div class="alert alert-warning alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
            <?php echo getFlash("ErrorMsgLinked"); ?>
        </div>
    <?php }  // display messages
    ?>
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

<div class="">
    <div class=" row-flex">
        <!-- /.myprofile-bg dahboard-bg -->
        <?php $this->load->view("cust_side_menu"); ?>
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 mar-20-btm">

        </div>
    </div>
</div>
<!-- /.col-sm-6 col-lg-6 col-lg-offset-1-->
<div class="modal fade" id="eventModal" data-backdrop="static" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <center><h3 class="modal-title">Please fill your profile Details</h3></center>
            </div>
            <form class="form-loginlinkedin" name="loginlinkedin" id="loginlinkedin" method="post" action="<?php echo base_url(); ?>pages/updateLinkedIn">
                <div class="modal-body">
                    <div class="col-sm-12s padd-0  border_bot">
                        <div class="form-group " >
                            <?php
                            // $data = $this->pages_model->fetchDataidWhr();

                            $url = site_url()."pages/api/get_usertype";
                            $data =  apiCall($url, "get");
                            $user_type = $data['result'];
                            //print_r($user_type);die;
                            foreach ($user_type as $key) {
                                if($key['id'] !=4){
                                    //   print_r($key);
                                    ?>
                                    <div class="col-sm-6" style="margin-bottom: 10px;">
                                        <label class="radio-inline supplier"><input type="radio" id="<?php echo $key['userType']; ?>"  value="<?php echo $key['id']; ?>" name="supplier" required>
                                            <?php echo $key['userType']; ?></label>
                                    </div>
                                <?php } } ?>
                        </div><div class="clearfix"></div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form_bor_bot input-form numbersOnly" id="u_name" name="u_name" placeholder="User Name"  value="<?php echo $this->session->userdata('u_name'); ?>" readonly>
                                <input type="hidden" class="form_bor_bot input-form numbersOnly"  name="uid" value="<?php echo $this->session->userdata('uid'); ?>"  readonly>
                                <input type="hidden" class="form_bor_bot input-form numbersOnly"  name="user_email" value="<?php echo $this->session->userdata('user_email'); ?>"  readonly>
                            </div>
                        </div><div class="clearfix"></div><br/>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <input type="text" class="form_bor_bot input-form" id="email" name="u_email" value="<?php echo $this->session->userdata('user_email'); ?>"  placeholder="Email Address" value="" readonly>
                            </div>
                        </div><div class="clearfix"></div><br/>

                        <div class="form-group padd-0">
                            <div class="col-sm-12">
                                <input type="text" class="form_bor_bot company_name" id="company_name" name="company_name" placeholder="Company Name"  required><span class="compulsary">*</span>
                            </div>
                        </div><div class="clearfix"></div>
                        <div class="form-group">
                            <div class="col-sm-12">
                                <select class="form_bor_bot" id="company_type" name="company_type" required>
                                    <option value="">Select Company Type</option>
                                    <option value="Partnership">Partnership</option>
                                    <option value="Proprietorship">Proprietorship</option>
                                    <option value="Private Limited">Private Limited</option>
                                    <option value="Public Limited">Public Limited</option>
                                    <option value="Freelancer">Freelancer</option>
                                </select>
                                <span class="compulsary">*</span>
                            </div>
                        </div><div class="clearfix"></div>
                        <div class="form-group padd-0">
                            <div class="col-sm-12">
                                <center><input type="submit" name="updateLinkedin" id="submit" class="btn input-form adv-search btn_orange" value="submit" /></center>
                            </div>
                        </div>
                        <?php echo form_close() ?>
                    </div><div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>




<script>
    <?php
    $user_id = $this->session->userdata('uid');
    //echo $user_id;die;
    $profile_data = $this->customer_model->selectAllWhr('user_details', 'uid', $user_id);
    //print_r($profile_data);die;
    ?>
    var LID = "<?php
        if ($profile_data['LID']) {
            echo $profile_data['LID'];
        } else {
            echo '';
        }
        ?>"

    var GID = "<?php
        if ($profile_data['GID']) {
            echo $profile_data['GID'];
        } else {
            echo '';
        }
        ?>"

    if (LID==1 || GID==1)
    {
        window.onload = function ()
        {
            $('#eventModal').modal('show');
        }
    } else
    {


    }


</script>

<script type="text/javascript">

    $(document).ready(function () {
        $("#loginlinkedin").validate({
            rules: {
                u_name: {
                    required: true,
                },
                email: {
                    required: true,
                },
                company_name: {
                    required: true,
                },
                company_type: {
                    required: true,
                },
            },
            messages: {
                u_name: "Please enter your name"
            },
            email: {
                required: "Please enter your email"
            },
            company_name: {
                required: "Please enter your company_name"
            },
            company_type: {
                required: "Please enter your company_type"
            },
        });
    });
</script>
<script>






    //    	$(document).ready(function() {
    //   $("#company_name").blur(function () {
    //            var company = $("#company_name").val();
    //           // alert(company);
    //
    //            $.ajax({
    //                url: "<?php echo site_url(); ?>pages/api/checkCompanyExist",
    //                data: {company: company},
    //                dataType: "json",
    //                type: "post",
    //                success: function (result) {
    //                    if (result.result == 1) {
    //                        alert("This company already registered..!!");
    //                        $('#company_name').val('');
    //                    }
    //
    //                }
    //            });
    //
    //        });
    //        	});

</script>