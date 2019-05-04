<?php $this->template->contentBegin(POS_TOP); ?>

<?php echo $this->template->contentEnd(); ?>

<section class="banner banner_image customer_dashboard_banner align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>My Dashboard</p>
                    <h1 class="basic-head"> Page Name</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="container-fluid myprofile-bg dahboard-bg">


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

</script>