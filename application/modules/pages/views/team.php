<section class="banner banner_image contact_us_banner align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>Teranex</p>
                    <h1 class="basic-head">Our Team</h1>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="padd_tb_50">
    <div class="container br-bt">

        <div class="row">
            <?php foreach($team_list as $rowTeam) { ?>
            <div class="col-md-4">
                <div class="profile_enginer padd_all_50 bx-shdw white">
                    <div class="profile_man">
                        <img src="<?=base_url().'uploads/team/'.$rowTeam['team_image']?>" alt="img">
                    </div>
                    <div class="profile_cntnt">
                        <h3 class="mrgn-top"><?php echo $rowTeam['name'] ?></h3>
                        <p><?php echo $rowTeam['designation'] ?></p>
                        <!-- <button class="green-btn mrgn-top"></button> -->
                        <a href="<?php echo $rowTeam['linkdin_url'] ?>" class="link_in"> <i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>



        <div class="row">
            <div class="col-12">
                <div class="padd_tb_50">
                    <h3 class="basic-head">Advisory Board</h3>
                </div>
            </div>
            <?php foreach($team_advisory_list as $rowAdvisoryTeam) { ?>
                <div class="col-md-4">
                    <div class="profile_enginer padd_all_50 bx-shdw white">
                        <div class="profile_man">
                            <img src="<?=base_url().'uploads/team/'.$rowAdvisoryTeam['team_image']?>" alt="img">
                        </div>
                        <div class="profile_cntnt">
                            <h3 class="mrgn-top"><?php echo $rowAdvisoryTeam['name'] ?></h3>
                            <p><?php echo $rowAdvisoryTeam['designation'] ?></p>
                            <!-- <button class="green-btn mrgn-top"></button> -->
                            <a href="<?php echo $rowAdvisoryTeam['linkdin_url'] ?>" class="link_in"> <i class="fa fa-linkedin-square" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

</section>


<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type="text/javascript">
  $( ".team_mem:odd" ).addClass("col-sm-offset-6");
</script>
<?php $this->template->contentEnd();  ?>