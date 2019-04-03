<?php $this->template->contentBegin(POS_TOP); ?>

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

                <!--            <li class="myprofile">Machine Services List </li>-->
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

    </div>
</div>
<!-- /.welcome-j-bg -->

<div class="">
    <div class=" row-flex">
        <!-- /.myprofile-bg dahboard-bg --> 
        <?php $this->load->view("cust_side_menu"); ?>  
        <div class="col-xs-12 col-sm-9 col-md-9 col-lg-10 mar-20-btm">
            <div class="box box-primary">
                <div class="box-header">
                    <h3 class="box-title">Update Training Courses </h3>
                </div>
                <?php $this->load->view("_form", $arrayData); ?>
            </div>
        </div>
    </div>
</div>



