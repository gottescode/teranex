<?php $this->template->contentBegin(POS_BOTTOM);?>
	<!-- <link href="<?php echo $theme_url?>/css/scrollheader.css" rel="stylesheet" type="text/css"> -->
	<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/events.css"/>
	<style>
		.row {
			margin-right: -10px;
			margin-left: -10px;
		}
		.son-text h3{
			min-height: auto;
		}
		 .son-text p{
		 	min-height: 125px;
		 }
		 .process-img {
    padding-bottom: 10px;
    margin: 0 auto;
    width: 70%;
    filter: grayscale(100%);
}
	</style>
<?php echo $this->template->contentEnd();?> 
 <div class="">
		<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/comm21.jpg" style="width:1349px;height:450px" alt="">
 </div>
 <div>
 	
 </div>
 	
 	<div class="col-sm-12 padd-0 ">
		<!-- <form class="form-horizontal" method ="POST" action="" enctype="multipart/form-data">
			<input type="text" name="event_name"/>
			<input type="submit" name="eventSearch" value="Submit" class="btn btn-primary"/>
		</form> -->
		<div class="" style="padding: 0 !important;">
			<div class="container-fluid myprofile-bg dahboard-bg">
			  <div class="container">
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
			      <center><h2 class="margin-0">Search Events</h2></center>
			    </div>
			  </div> 
			</div>
			<div class="container-fluid programmers-grey-bg">
			  	<div class="container">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
					    <form action="" method="post" enctype="multipart/form-data">
							<div class="col-sm-4 col-md-4 padd-0">
								<!-- <div class="form-group advanced-marg">
									<label for="inputEmail3" class="col-sm-4 sort-by padd-0">Sort by:</label>
									<div class="col-sm-8 padd-0">
										<select name="language" class="form-control input-form ">
											<?php if($language_list){
												foreach($language_list as $rowLang){?>
												<option value="<?php echo $rowLang['lid'];?>"><?php echo $rowLang['name'];?></option> 
											<?php }}?>
										</select>
									</div>
								</div> -->
							</div>
							<div class="col-sm-4 col-md-4">
								<div class="col-sm-12 input-group">
									<input type="text" class="form-control input-form search-go" placeholder="Search" name="event_name">
									<div class="input-group-btn">
										<button class="btn btn-default search-go" type="submit" name="eventSearch"><span>Go</span></button>
									</div>
								</div>
							</div>
					    </form>
				     	<div class="col-sm-2 col-md-2"> 
				     		<!--  <a href="" class="btn btn_orange" data-toggle="modal" data-target="#advsearchmodal"><span class="advanced-search">Advanced Search</span></a> -->
				     	</div>
					    <div class="col-sm-4 col-md-4 sortby-marg padd-0">
					     	<!-- <p class="pull-right"><span class="one-ten-text"><?php echo $pageintation['start']?> - <?php echo $pageintation['end']?></span> of <?php echo $pageintation['totalCount'];?> Events</p> -->
					    </div>
				    </div>
			 	</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="container">
			<div class="">
				<center><h2>Events</h2></center>
				<?php if($category_list){
					foreach($category_list as $rowCat){
					?>
					<div class="">
						<div class="col-sm-4 col-xs-12 padd-8 ">
							<!-- <?php if($this->session->userdata('uid')==''){?>
								<a href="#" data-toggle="modal" data-target="#signinModal">
							<?php }else{?>
								<a href="#" data-toggle="modal" data-target="#ondemandser_modal">
							<?php }?> -->
							<div class=" dad">
								<?php if($rowCat['event_cat_image']){?> 
								<div class="son-1" style="background-image: url('<?=site_url().'uploads/event/'.$rowCat['event_cat_image']?>');"></div>
								  <?php }?>
						    	<div class="son-text">
									<h3><?php echo $rowCat['event_cat_name']?></h3>
									<p><?php echo strhtmldecode($rowCat['event_cat_description'])?></p>
									<a class="btn btn_orange" href="<?php echo site_url()."events/events_list/$rowCat[event_cat_id]/".formaturl($rowCat['event_cat_name'])?>">View Events List</a>
								</div>
							</div>
							<!-- </a> -->
				        </div>
					  	<!-- <div class="row-flex white-bg ">
							<div class="col-sm-3 padd-0">
								 <?php if($rowCat['event_cat_image']){?> 
								<img class="img-responsive event-img" src="<?=site_url().'uploads/event/'.$rowCat['event_cat_image']?>">
								  <?php }?>
								
							</div>
							<div class="col-sm-7 gray-bg">
								<div class="event-heading">
									<h3><?php echo $rowCat['event_cat_name']?></h3>
									<p class="rcomment readmore"><?php echo strhtmldecode($rowCat['event_cat_description'])?></p>
								</div>
							</div>
							<div class="col-sm-2 padd-0 event-list-bg">
								<a href="<?php echo site_url()."events/events_list/$rowCat[event_cat_id]/".formaturl($rowCat['event_cat_name'])?>"><img class="img-responsive event-cal" src="<?php echo $theme_url?>/images/calendar.png" alt=" ">
								<h3>View Events List</h3></a>
							</div>
					  	</div><div class="clearfix"></div> -->
					</div>
				<?php }}?>
			</div>
			<div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
	<div class="clearfix"></div>
	<!-- <div class="feature-grey-bg"> -->
	<div class="">
		<div class="">
		  	<center><h2>How a Live Event Works</h2>	
		  	<p>Anyone in the audience can engage in an Interactive Event as a passive viewer, or an active participant on stage. Here’s how it works.</p></center>
		  	<div class="col-sm-12 col-container padd-0">
				<img class="img-responsive process-img" src="<?php echo $theme_url?>/images/event_process2.png" alt="">
		  	</div>
		</div>
		<div class="clearfix"></div>
	</div>
	<?php $this->template->contentBegin(POS_BOTTOM);?>
		<!-- <script  src="<?php echo $theme_url;?>/js/scrollheader.js"></script> -->
<script>
//readmore
$(document).ready(function() {
	var showChar = 200;
	var ellipsestext = "...";
	var moretext = "Read More";
	var lesstext = "Show Less";
	$('.readmore').each(function() {
		var content = $(this).html();
		if(content.length > showChar) {
			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);
			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
			$(this).html(html);
		}
	});
	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
});
</script>
	<?php echo $this->template->contentEnd();?> 