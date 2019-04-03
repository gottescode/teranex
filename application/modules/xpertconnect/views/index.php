 <?php $this->template->contentBegin(POS_TOP);

$uid = $this->session->userdata('uid');



?>

<style type="text/css">

.row {

    margin-right: -8px;

    margin-left: -8px;

}

.nbs-flexisel-inner {

    margin-bottom: 20px!important;

}
.nav_search .navbar-form .btn-link{
	    padding: 6px 7.5px;
}
 </style>

 <?php echo $this->template->contentEnd();	?>

 	<div class="" style="margin-top:79px"><img src="<?php echo $theme_url?>/images/puzzle.jpg" width="100%"></div>



	<div class="sq-tiles expert-row">

		<?php 	// display messages

				if(hasFlash("dataMsgServiceRequestSuccess"))	{	?>

					<div class="alert alert-success alert-dismissible" role="alert">

					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					  <?php echo getFlash("dataMsgServiceRequestSuccess"); ?>

					</div>

		<?php	}	?>

		<?php 	// display messages

				if(hasFlash("dataMsgServiceRequestError"))	{	?>

					<div class="alert alert-success alert-dismissible" role="alert">

					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

					  <?php echo getFlash("dataMsgServiceRequestError"); ?>

					</div>

		<?php	}	?>

		<div class="col-sm-12 box-padd padd-0">

			<div class="" style="padding: 0 !important;">

				<div class="container-fluid myprofile-bg dahboard-bg">

				  <div class="container">

				    <div class="col-sm-12">

				      <center><h2 class="margin-0">Freelancers</h2></center>

				    </div>

				  </div> 

				</div>

				<div class="container-fluid programmers-grey-bg">

				  	<div class="container">

					    <div class="col-sm-12 padd-0">

						    <form action="" method="post">

								<div class="col-sm-3 col-md-3 padd-0">

									<div class="form-group advanced-marg">

										<label for="inputEmail3" class="col-sm-4 sort-by padd-0">Sort by:</label>

										<div class="col-sm-8 padd-0">

											<select name="language" class="form-control input-form ">

												<?php if($language_list){

													foreach($language_list as $rowLang){?>

													<option value="<?php echo $rowLang['lid'];?>"><?php echo $rowLang['name'];?></option> 

												<?php }}?>

											</select>

										</div>

									</div>

								</div>

								<div class="col-sm-4 col-md-4">

									<div class="col-sm-12 input-group">

										<input type="text" class="form-control input-form search-go" placeholder="Search" name="programerName">

										<div class="input-group-btn">

											<button class="btn btn-default search-go" type="submit" name="btnSearch"><span>Go</span></button>

										</div>

									</div>

								</div>

						    </form>

					     	<div class="col-sm-2 col-md-2"> 

					     		 <a href="" class="btn btn_orange" data-toggle="modal" data-target="#advsearchmodal"><span class="advanced-search">Advanced Search</span></a>

					     	</div>

						    <div class="col-sm-3 col-md-3 sortby-marg padd-0">

						     	<p class="pull-right"><span class="one-ten-text"><?php echo $pageintation['start']?> - <?php echo $pageintation['end']?></span> of <?php echo $pageintation['totalCount'];?> Consultants</p>

						    </div>

					    </div>

				 	</div>

				</div>

			</div>

			<div class="container padd-0">

	        <center>

	        	<h2>Freelancer Connect</h2>

			<p>At TeraneX, we provide both live and structured training courses in the fields of CAD/CAM, Machine Operation and Maintenance</p>

			</center> 

			<div class="row box-padd">

				<?php foreach($xpertconnect_list as $xpertconnects) { ?>

				<div class="col-sm-4 col-xs-12 padd-8">

					<!-- <a href=""> -->

					<div class=" dad">

					  	<div class="son-1" style="background-image: url('<?php echo base_url()."uploads/xpertconnect/".$xpertconnects['xpertconnect_cat_image']?>');"></div>

				    	<div class="son-text">

							<h3><?php echo $xpertconnects['xpertconnect_cat_name']; ?> </h3>

							<p><?php echo $xpertconnects['xpertconnect_cat_description']; ?></p>
							<a href=""> View More >></a>
						</div>

					</div>

					<!-- </a> -->

				</div>

				 <?php } ?> 

			</div>

			</div>

	    </div>

		<div class="clearfix"></div>

	</div>

	<div id="programmer_div">

		<!-- /.container-fluid -->

		<div class="container-fliud">

			<div class="container">

		  		<div class="col-sm-12  padd-0 expert-row">

		  			<h2 class="col-sm-12 text-center">Meet Our Freelancers</h2>

					<div class="row xpert">

						<ul class="cadcam1">

						<?php 

						$url = site_url()."xpertconnect/api/findFeaturedListProgrammer/1";

						$assigned_details =  apiCall($url, "get");

						

						$assigned_id = $assigned_details['result']['programmer_id'];

						$assigned_text = $assigned_details['result']['description'];

						if($programmerList){

								foreach($programmerList as $rowConsult){

									if($rowConsult['uid']==$assigned_id){

										$name = $rowConsult['u_name'];

										 $u_avatar = $rowConsult['u_avatar'];

										

									}

							?>

							<li id="" >

								<div class="col-sm-12 col-md-12 padd-8">

									<div class="prgrmr amit-border">

										<div class="amit_img_bag">

											<img src="<?php echo $theme_url?>/images/krishna.PNG">

											<!-- <?php if($rowConsult['u_avatar']){?>

											<img src="<?=site_url().'/uploads/customer/'.$rowConsult['u_avatar']?>" width="100px" height="100px">

											<?php }else{?>

											<img src="<?=site_url().'/uploads/customer/user-default.png'?>" width="100px" height="100px">

											<?php }?> -->

										</div>

										<div class="amit-text">

											<span class="amit-das-text"><?php echo $rowConsult['u_name'];?></span>

											<!--<span class="certified">Certified Public Bookkeeper</span>-->

											<p>Certified Public Bookkeeper</p>

												<div class="prgrmr_det">

													<p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ <?php echo $rowConsult['consultant_per_hour_rate'];?></span>/hr</span></p>

													<p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>

													<p></p>

													<div class="clearfix"></div>

												</div>

												<div class="clearfix"></div>

											<a href="<?php echo site_url()."consultant/expert/consultantDetail/".$rowConsult['uid'];?>"><button class="btn btn-default addmore-btn">View Profile </button></a>

										</div>

									</div>

								</div>

							</li>

						<?php 	}}?>	

						</ul> 

					</div>

				</div>

				<nav aria-label="...">

				 <?php echo pagination($pageintation['totalCount'],$pageintation['page'],$pageintation['show'],site_url()."remoteprogramming/index/",'');?>		

				</nav>

			</div> 

			<div class="clearfix"></div>

		</div>  

		

		<div class="clearfix"></div>

	</div>  

	

	<div class="container-fliud r-programming recent-view">

		<div class="container">

			<center><h2>Recently Viewed</h2></center>

			<ul class="cadcam">

			<li>

				  	<a class="thumbnail" href="https://www.teranex.io/beta-V*SRJ!-452656-230718/consultant/expert/consultantDetail/9">

						<img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">

						<div class="amit-text text-center">

							<span class="amit-das-text">Elle</span>

							<span class="certified">Certified Public Bookkeeper</span>

						</div>

					</a>

				</li>

				<li>

				  	<a class="thumbnail" href="https://www.teranex.io/beta-V*SRJ!-452656-230718/consultant/expert/consultantDetail/11">

						<img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">

						<div class="amit-text text-center">

							<span class="amit-das-text">justinn</span>

							<span class="certified">Certified Public Bookkeeper</span>

						</div>

					</a>

				</li>

			<?php 

			

			if($recently_viewed_data){ ?>

			<?php 

			$count_recently_viewed = count($recently_viewed_data);

			foreach($recently_viewed_data as $row){

				

				?>

				<li>

				  	<a class="thumbnail" href="<?php echo site_url()."consultant/expert/consultantDetail/".$row['uid'];?>">

						<img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">

						<div class="amit-text text-center">

							<span class="amit-das-text"><?php echo  $row['u_name'];?></span>

							<span class="certified">Certified Public Bookkeeper</span>

						</div>

					</a>

				</li>

			<?php

				}	

			?>

			  	<?php } ?>

				

		  	</ul>     

		</div>

	</div>

	

	<div class="clearfix"></div>

	

	<div class="container-fliud ">

		<div class="container">

			<div class="col-sm-12 padd-0">

				<center><h2>Freelancers Featured This Month</h2></center>

				<div class="last-sec">

					<div class="col-sm-2 col-md-1 padd-0">

						<img src="<?php echo site_url();?>/uploads/customer/<?php echo $u_avatar; ?>" class="img-responsive" style="border-radius: 50%;height: 70px;width: 70px;">

					</div>

					<div class="col-sm-10 col-md-11 padd-0">

						<p><?php echo $assigned_text; ?></p>

					</div>

				</div>

				

			</div>

		</div>

		<div class="clearfix"></div>

	</div>

	<div id="advsearchmodal" class="modal fade" role="dialog">

	  	<div class="modal-dialog modal-sm">

		    <!-- Modal content-->

		    <div class="modal-content">

		      <div class="modal-header">

		        <button type="button" class="close" data-dismiss="modal">&times;</button>

		        <center><h2 class="modal-title">Advance Search</h2></center>

		      </div>

		      <div class="modal-body">

		      	<div class="border_bot col-sm-offset-1 col-sm-10">

			        <form class="form-horizontal" name="#" id="#" method="post" action="">

						  <div class="form-group ">

							  <input type="text" class="form_bor_bot" id="keywords" name="#" placeholder="Keywords"style="padding-left: 17px;">

						  </div>

						  <div class="form-group">

								<select name="consultancytype" id="consultancytype" class="form_bor_bot">

									<option value="">Programmer Type</option>

									<option value="Assembly">Assembly</option>

									<option value="Component">Component</option>

									<option value="Part">Part</option>

								</select>

						  </div>

						  <div class="form-group">

								<select name="consultant" id="consultant" class="form_bor_bot">

									<option value="">Consultant Qualification</option>

									<option value="A">A</option>

									<option value="B">B</option>

								</select>

						  </div>

						  <div class="form-group">

								<select name="exp_yr" id="exp_yr" class="form_bor_bot">

									<option value="">Years of Experience</option>

									<option value="1">1</option>

									<option value="2">2</option>

									<option value="3">3</option>

									<option value="4">4</option>

									<option value="5">5</option>

								</select>

						  </div>

						  <div class="form-group">

								<select name="language" id="language" class="form_bor_bot">

									<option value="">Language</option>

									<?php if($language_list){

											foreach($language_list as $rowLang){?>

											<option value="<?php echo $rowLang['lid'];?>"><?php echo $rowLang['name'];?></option> 

									<?php }}?>

								</select>

						  </div>

						  <div class="form-group">

								<select name="rate" id="rate" class="form_bor_bot">

									<option value="">Rate</option>

									<option value="1">1</option>

									<option value="2">2</option>

									<option value="3">3</option>

									<option value="4">4</option>

									<option value="5">5</option>

								</select>

						  </div> 

						  <div class="form-group text-center">

							  <input type="submit" name="btnSearch" id="submit" class="btn btn_orange" value="Submit" />

						  </div>

					</form>

				</div>

				<div class="clearfix"></div>

		      </div>

		    </div>

	  	</div>

	</div>

<?php $this->template->contentBegin(POS_BOTTOM);?>

<script type="text/javascript">



$('body').on('mouseenter', 'li', function() {

		$(this).addClass('adasd');

 });

$(document).ready(function() {

	 

	//  $("#programmer_div").addClass('hide');	

  

	//$("#programmer_div").addClass('hide');

}); 

</script>

<!-- <script  src="<?php echo $theme_url;?>/js/scrollheader.js"></script> -->

<script  src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>

<script type="text/javascript">



//CADCAM1

$('.cadcam1').each(function(){

	$(this).flexisel({

		visibleItems: 4,

		itemsToScroll: 1,         

		autoPlay: {

			enable: false,

			interval: 5000,

			pauseOnHover: true

		},

		responsiveBreakpoints: { 

			portrait: { 

				changePoint:480,

				visibleItems: 1,

				itemsToScroll: 1

			}, 

			landscape: { 

				changePoint:639,

				visibleItems: 2,

				itemsToScroll: 2

			},

			tablet: { 

				changePoint:769,

				visibleItems: 3,

				itemsToScroll: 3

			}

		}				

	});

});



 //CADCAM1

$('.cadcam').each(function(){

	$(this).flexisel({

		<?php 

				if($count_recently_viewed=='1'){

			?>

		visibleItems: 1,

		<?

			}

		?>

		<?php 

				if($count_recently_viewed=='2'){

			?>

		visibleItems: 2,

		<?

			}

		?>

		<?php 

				if($count_recently_viewed=='3'){

			?>

		visibleItems: 3,

		<?

			}

		?>

		<?php 

				if($count_recently_viewed>'3'){

			?>

		visibleItems: 4,

		<?

			}

		?>

		itemsToScroll: 1,         

		autoPlay: {

			enable: false,

			interval: 5000,

			pauseOnHover: true

		},

		responsiveBreakpoints: { 

			portrait: { 

				changePoint:480,

				visibleItems: 1,

				itemsToScroll: 1

			}, 

			landscape: { 

				changePoint:639,

				visibleItems: 3,

				itemsToScroll: 3

			},

			tablet: { 

				changePoint:769,

				visibleItems: 4,

				itemsToScroll: 4

			}

		}				

	});

}); 



</script>

 

<?php echo $this->template->contentEnd();?> 