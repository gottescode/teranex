 
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-offset-1 col-sm-10">
     <!--  <ul>
        <li class="myprofile">Consultants</li>
      </ul> -->
      <h2 class="margin-0">Programmer</h2>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

<div class="container-fluid programmers-grey-bg">
  	<div class="container">
	    <div class="col-sm-offset-1 col-sm-10">
	    	<div class="col-sm-2 col-md-2 padd-0">
		     	<form>
		    	 	<div class="form-group advanced-marg">
		          		<label for="inputEmail3" class="col-sm-4 sort-by padd-0">Sort by:</label>
			          	<div class="col-sm-8 padd-0">
				            <select name="cars" class="form-control input-form ">
				              <option value="volvo">English</option>
				              <option value="saab">Saab</option>
				              <option value="fiat">Fiat</option>
				              <option value="audi">Audi</option>
				            </select>
			          	</div>
		        	</div>
		        </form>
		    </div>
	    	<div class="col-sm-4 col-md-4">
		        <form class="search-padd" role="search">
			        <div class="col-sm-12 input-group">
			            <input type="text" class="form-control input-form search-go" placeholder="Search" name="q">
			            <div class="input-group-btn">
			                <button class="btn btn-default search-go" type="submit"><span>Go</span></button>
			            </div>
			        </div>
		        </form>
		    </div>
	     	<div class="col-sm-2 col-md-2"> 
	     		 <a href="" class="btn btn_orange" data-toggle="modal" data-target="#advsearchmodal"><span class="advanced-search">Advanced Search</span></a>
	     	</div>
		    <div class="col-sm-4 col-md-4 sortby-marg padd-0">
		     	<p class="pull-right"><span class="one-ten-text">1 - 10</span> of <?php echo count($consultant_list);?> Consultants</p>
		    </div>
	    </div>
 	</div>
  <!-- /.container --> 
</div>
<!-- /.container-fluid -->
<div class="container-fliud">
	<div class="container">
	    <center>
	      <h2 class="meet-some-text">Meet some of our consultants</h2>
	    </center>
  		<div class="col-sm-offset-1 col-sm-10 padd-0">
			<div class="">
				<?php if($programmList){
						foreach($programmList as $rowConsult){
					?>
					<div class="col-sm-3">
						<div class="amit-border">
								<?php if($rowConsult['u_avatar']){?>
								<img src="<?=site_url().'/uploads/customer/'.$rowConsult['u_avatar']?>" height="70px">
								<?php }else{?>
								<img src="<?=site_url().'/uploads/customer/user-default.png'?>" width="70px">
								<?php }?>
							<div class="amit-text">
								<span class="amit-das-text"><?php echo $rowConsult['u_name'];?></span>
								<span class="certified">Certified Public Bookkeeper</span>
								<ul>
									
								</ul>
								<a href="<?php echo site_url()."consultant/consultantDetail/".$rowConsult['uid'];?>"><button class="btn btn-default addmore-btn">View Profile </button></a>
							</div>
						</div>
					</div>
				<?php 	}}?>
<?php echo pagination($pageintation['totalCount'],$pageintation['page'],$pageintation['show'],'','');?>				
			</div>
		</div>
		<nav aria-label="...">
		  <ul class="prog-pagi pagination pagination-sm">
			<li class="page-item">
			  <a class="page-link" href="#" tabindex="-1">Result Pages </a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1,</a></li>
			<li class="page-item"><a class="page-link" href="#">2,</a></li>
			<li class="page-item"><a class="page-link" href="#">3,</a></li>
			<li class="page-item"><a class="page-link" href="#">4,</a></li>
			<li class="page-item"><a class="page-link" href="#">5,</a></li>
			<li class="page-item">
			  <a class="page-link" href="#">...Next >></a>
			</li>
		  </ul>
		</nav>
	</div> 
	<div class="clearfix"></div>
</div>  
<div>
	<center><a href="<?php echo site_url()."remoteprogramming/rfq"?>" class="btn btn_orange">Request for Quote</a></center>
</div>
<div class="clearfix"></div><br/>
<div class="container-fliud recent-view">
  <div class="container">
	<div class="col-sm-offset-1 col-md-10 padd-0">
	  	<ul class="cadcam">
		  	<li id="" >
			  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
					<div class="amit-text text-center">
						<span class="amit-das-text">Amit Das</span>
						<span class="certified">Certified Public Bookkeeper</span>
					</div>
				</a>
			</li>
			<li id="" >
			  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
					<div class="amit-text text-center">
						<span class="amit-das-text">Amit Das</span>
						<span class="certified">Certified Public Bookkeeper</span>
					</div>
				</a>
			</li> 
			<li id="" >
			  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
					<div class="amit-text text-center">
						<span class="amit-das-text">Amit Das</span>
						<span class="certified">Certified Public Bookkeeper</span>
					</div>
				</a>
			</li>
			<li id="" >
			  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
					<div class="amit-text text-center">
						<span class="amit-das-text">Amit Das</span>
						<span class="certified">Certified Public Bookkeeper</span>
					</div>
				</a>
			</li>
			<li id="" >
			  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
					<div class="amit-text text-center">
						<span class="amit-das-text">Amit Das</span>
						<span class="certified">Certified Public Bookkeeper</span>
					</div>
				</a>
			</li>
			<li id="" >
			  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
					<div class="amit-text text-center">
						<span class="amit-das-text">Amit Das</span>
						<span class="certified">Certified Public Bookkeeper</span>
					</div>
				</a>
			</li>
			<li id="" >
			  	<a class="thumbnail" href="#"><img alt="" src="<?php echo $theme_url?>/images/trainers-img1.jpg">
					<div class="amit-text text-center">
						<span class="amit-das-text">Amit Das</span>
						<span class="certified">Certified Public Bookkeeper</span>
					</div>
				</a>
			</li>
	  	</ul>                        
	</div>
  </div>
</div>
<div class="clearfix"></div><br/>
<div class="container-fliud ">
	<div class="feature-this-month-bg">
		<div class="col-sm-offset-1 col-sm-10">
			<center><h4>Consultant Featured This Month</h4></center><br/>
			<div class="col-sm-2">
				<img src="<?php echo $theme_url?>/images/meet-img1.jpg" class="img-responsive">
			</div>
			<div class="col-sm-10">
				<p>Joshua is an energetic and passionate leader, technologist, and consultant with over 10 years of strategic planning, tactical centered implementation, and management consulting experience. Joshua utilizes proven qualitative and analytical skills driven by business objectives and up to date technology. </p>
			</div>
		</div>
	</div> 
</div>
<div class="clearfix"></div><br/>


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
						  <input type="text" class="form_bor_bot" id="#" name="#" placeholder="Keywords">
					  </div>
					  <div class="form-group">
							<select name="Country" id="Country" class="form_bor_bot">
								<option value="">Consultancy Type</option>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
					  </div>
					  <div class="form-group">
							<select name="Country" id="Country" class="form_bor_bot">
								<option value="">Consultant Qualification</option>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
					  </div>
					  <div class="form-group">
							<select name="Country" id="Country" class="form_bor_bot">
								<option value="">Years of Experience</option>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
					  </div>
					  <div class="form-group">
							<select name="#" id="#" class="form_bor_bot">
								<option value="">Language</option>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
					  </div>
					  <div class="form-group">
							<select name="#" id="#" class="form_bor_bot">
								<option value="">Rate</option>
								<option value="A">A</option>
								<option value="B">B</option>
							</select>
					  </div> 
					  <div class="form-group">
						  <input type="submit" name="btnSearch" id="submit" class="btn input-form adv-search form-control" value="Submit" />
					  </div>
				</form>
			</div>
			<div class="clearfix"></div><br/>
	      </div>
	    </div>
  	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
		
<script type="text/javascript">
$('body').on('mouseenter', 'li', function() {
		$(this).addClass('adasd');
 });
$(window).load(function() {
	$('.cadcam').each(function(){
	$(this).flexisel({
		visibleItems: 7,
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
}); 
</script> 
 <?php echo $this->template->contentEnd();	?> 