<div class="home-page-container banner-without-overlay height-550" style="background: url(<?php echo $theme_url ?>/images/2-teranex-desktop-ourteam-bg.jpg)">
    <div class="container">
        <div class="banner-content-text">
            <span>Teranex </span>
            <b>Our Team</b>
        </div>
    </div>
</div>
<div class="home-page-body-container">
<div class="home-inner-block-set">
    <div class="container">
        <div class="full-width">
            <div class="row">
                <?php foreach($team_list as $rowTeam) { ?>
                <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                    <div class="home-card-set ">
                        <div class="programmer-image mb-4">
                            <img class="thumb-img" src="<?=base_url().'uploads/team/'.$rowTeam['team_image']?>" alt="Jane Doe">
                        </div>
                        <div class="programmer-name"><?php echo $rowTeam['name'] ?></div>
                        <div class="programmer-desigination mb-2"><?php echo $rowTeam['designation'] ?></div>
                        <a href="<?php echo $rowTeam['linkdin_url'] ?>" class="btn btn-social-link"> <i class="ion-social-linkedin" aria-hidden="true"></i></a>

                    </div>
                </div>
                <?php } ?>

            </div>
        </div>
    </div>
</div>
    <div class="home-inner-block-set">
        <div class="container">
            <div class="card-title pb-4">Advisory Board</div>
            <div class="full-width">
                <div class="row">
                    <?php foreach($team_advisory_list as $rowAdvisoryTeam) { ?>
                    <div class="col-12 col-sm-12 col-md-6 col-lg-4 col-xl-4">
                        <div class="home-card-set ">
                            <div class="programmer-image mb-4">
                                <img class="thumb-img" src="<?=base_url().'uploads/team/'.$rowAdvisoryTeam['team_image']?>" alt="Jane Doe">
                            </div>
                            <div class="programmer-name"><?php echo $rowAdvisoryTeam['name'] ?></div>
                            <div class="programmer-desigination mb-2"><?php echo $rowAdvisoryTeam['designation'] ?></div>
                            <a href="<?php echo $rowAdvisoryTeam['linkdin_url'] ?>" class="btn btn-social-link"> <i class="ion-social-linkedin" aria-hidden="true"></i></a>

                        </div>
                    </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type="text/javascript">
  $( ".team_mem:odd" ).addClass("col-sm-offset-6");
</script>
<?php $this->template->contentEnd();  ?>