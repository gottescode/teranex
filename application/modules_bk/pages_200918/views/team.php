<div class="container">
	<center>
		<h2> Meet Our Team </h2>
	</center>
	<div class="col-sm-12 padd-0">
		<div class="team-padd-bott">
<?php foreach($team_list as $rowTeam) { ?>
      <div class="col-sm-12 paddTB-10 team_mem">
        <div class="col-sm-3 padd-0 mem_img"> 
          <img style="-webkit-filter: grayscale(100%); filter: grayscale(100%);" src="<?=base_url().'uploads/team/'.$rowTeam['team_image']?>" class="team-img-bor img-responsive">
        </div>
        <div class="col-sm-3 padd-0"> 
          <div class="team-text">
                      <h3><?php echo $rowTeam['name'] ?></h3>
                      <p><strong><?php echo $rowTeam['designation'] ?></strong></p>
                      <p><?php echo $rowTeam['role'] ?></p>
                <a href="<?php echo $rowTeam['linkdin_url'] ?>" target="_blank"><i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
  <?php } ?>
		<!-- 	<div class="col-sm-12 paddTB-10">
				<div class="col-sm-3 padd-0"> 
					<img style="-webkit-filter: grayscale(100%); filter: grayscale(100%);" src="<?php echo $theme_url?>/images/team/team-1.jpg" class="team-img-bor img-responsive">
				</div>
				<div class="col-sm-3 padd-0"> 
					<div class="team-text">
                      <h3>Soumitra Joshi</h3>
                      <p><strong>Co-Founder & M.D.</strong></p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        			  <a href="https://www.linkedin.com/in/soumitra-joshi-15786539/" target="_blank"><i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i></a>
					</div>
				</div>
			</div>
			<div class="col-sm-12 paddTB-10">
				<div class="col-sm-offset-6 col-sm-3 padd-0"> 
					 <img style="-webkit-filter: grayscale(100%); filter: grayscale(100%);" src="<?php echo $theme_url?>/images/team/team-2.jpg" class="team-img-bor img-responsive">
				</div>
				<div class="col-sm-3 padd-0"> 
					<div class="team-text">
                      <h3>Sarah Johns</h3>
                      <p><strong>Chief Financial Officer</strong></p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        			   <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
				</div>
			</div>
			<div class="col-sm-12 paddTB-10">
				<div class="col-sm-3 padd-0"> 
					 <img style="-webkit-filter: grayscale(100%); filter: grayscale(100%);" src="<?php echo $theme_url?>/images/team/team-4.jpg" class="team-img-bor img-responsive">
				</div>
				<div class="col-sm-3 padd-0"> 
					<div class="team-text">
                      <h3>George Sanders</h3>
                      <p><strong>Chief Sales Manager</strong></p>
                      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        			  <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
					</div>
				</div>
			</div> -->
            <!--   <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-4.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>George Sanders</h3>
                      <p>Chief Sales Manager</p>
        			  <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>
             <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-3.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>Don Bradman</h3>
                      <p>Regional Engineer</p>
        			        <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>
              <div class="team-block"> <img src="<?php echo $theme_url?>/images/team-5.jpg" class="team-img-bor">
                  <div class="team-text">
                      <h3>Ron Lesley</h3>
                      <p>President & Chief Executive Officer</p>
          			      <i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i>
                  </div>
              </div>-->
        </div>
    </div>
    <!-- <div class="col-sm-12 padd-0">
  		<div class="team-padd-bott row" style="float: none;">
  		<center><h2> Advisory board  </h2></center>
      <?php foreach($team_advisory_list as $rowAdvisoryTeam) { ?>
            <div class="col-sm-4">
      		      <img style="-webkit-filter: grayscale(100%); filter: grayscale(100%); margin: 0 auto;" src="<?=base_url().'uploads/team/'.$rowAdvisoryTeam['team_image']?>" class="img-responsive" height="243" width="243">
                  <div class="team-text"style="text-align: center;">
                    <h3><?php echo $rowAdvisoryTeam['name'] ?></h3>
                    <p><?php echo $rowAdvisoryTeam['designation'] ?></p>
        			      <a href="<?php echo $rowAdvisoryTeam['linkdin_url'] ?>" target="_blank"><i class="team-social-media fa fa-linkedin-square" aria-hidden="true"></i></a>
                </div>
            </div>
      <?php } ?>
  		</div>
    </div> -->
    <div class="clearfix"></div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>
<script type="text/javascript">
  $( ".team_mem:odd" ).addClass("col-sm-offset-6");
</script>
<?php $this->template->contentEnd();  ?> 