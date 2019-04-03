<?php
$this->template->contentBegin(POS_TOP);
$user_id = $this->session->userdata('uid');
$machineID =2001;
// remote application
?>
<!-- chating ui css-->
<style type="text/css">
    img{ max-width:100%;}
    .inbox_people {
        background: #f8f8f8 none repeat scroll 0 0;
        float: left;
        overflow: hidden;
        width: 40%; border-right:1px solid #c4c4c4;
    }
    .inbox_msg {
        border: 1px solid #c4c4c4;
        clear: both;
        overflow: hidden;
        background: #fff;
    }
    .top_spac{ margin: 20px 0 0;}


    .recent_heading {float: left; width:40%;}
    .srch_bar {
        display: inline-block;
        text-align: right;
        width: 60%; padding:
    }
    .headind_srch{ padding:10px 29px 10px 20px; overflow:hidden; border-bottom:1px solid #c4c4c4;}

    .recent_heading h4 {
        color: #05728f;
        font-size: 21px;
        margin: auto;
    }
    .srch_bar input{ border:1px solid #cdcdcd; border-width:0 0 1px 0; width:80%; padding:2px 0 4px 6px; background:none;}
    .srch_bar .input-group-addon button {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        padding: 0;
        color: #707070;
        font-size: 18px;
    }
    .srch_bar .input-group-addon { margin: 0 0 0 -27px;}

    .chat_ib h5{ font-size:15px; color:#464646; margin:0 0 8px 0;}
    .chat_ib h5 span{ font-size:13px; float:right;}
    .chat_ib p{ font-size:14px; color:#989898; margin:auto}
    .chat_img {
        float: left;
        width: 11%;
    }
    .chat_ib {
        float: left;
        padding: 0 0 0 15px;
        width: 88%;
    }

    .chat_people{ overflow:hidden; clear:both;}
    .chat_list {
        border-bottom: 1px solid #c4c4c4;
        margin: 0;
        padding: 18px 16px 10px;
    }
    .inbox_chat { height: 550px; overflow-y: scroll;}

    .active_chat{ background:#ebebeb;}

    .incoming_msg_img {
        display: inline-block;
        width: 8%;
    }
    .incoming_msg_img img{
        border-radius: 15px;
    }
    .received_msg {
        display: inline-block;
        padding: 0 0 0 10px;
        vertical-align: top;
        width: 92%;
    }
    .received_withd_msg p {
        background: #ebebeb none repeat scroll 0 0;
        border-radius: 3px;
        color: #646464;
        font-size: 14px;
        margin: 0;
        padding: 5px 10px 5px 12px;
        width: 100%;
    }
    .time_date {
        color: #747474;
        display: block;
        font-size: 10px;
        margin: 0px 0 8px 0;
    }
    .received_withd_msg { width: 57%;}
    .mesgs {
        /*float: left;*/
        padding: 10px 0px 0 10px;
    }

    .sent_msg p {
        background: #05728f none repeat scroll 0 0;
        border-radius: 3px;
        font-size: 14px;
        margin: 0; color:#fff;
        padding: 5px 10px 5px 12px;
        width:100%;
    }
    .outgoing_msg{ overflow:hidden; margin:26px 0 26px;}
    .sent_msg {
        float: right;
        width: 46%;
    }
    .input_msg_write input {
        background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
        border: medium none;
        color: #4c4c4c;
        font-size: 15px;
        min-height: 50px;
        width: 100%;
        border: 1px solid #c4c4c4;
        /*border-radius: 25px;*/
        padding: 0 10px;
    }

    .type_msg {/*border-top: 1px solid #c4c4c4;*/position: relative;}
    .msg_send_btn {
        background: #05728f none repeat scroll 0 0;
        border: medium none;
        border-radius: 50%;
        color: #fff;
        cursor: pointer;
        font-size: 17px;
        height: 33px;
        position: absolute;
        right: 8px;
        top: 8px;
        width: 33px;
    }
    .msg_send_btn:focus{
        outline: none;
    }
    .input_msg_write input:focus{
        outline: #a5c049;
    }
    .messaging { padding: 0 0 10px 0;}
    .msg_history {
        height: 150px;
        overflow-y: auto;
    }
    #slideshow {
        overflow: hidden;
        width: 389px;
        height: 240px;
        padding: 0;
        margin: 0 auto;
        list-style-type: none;
    }
    .bx-viewport, .bx-viewport img {
        min-height: 250px;
    }
    .finance_type h3 {
        /* padding: 36px 75px; */
        padding: 0px 14px;
    }
    video {
        display: inline-block;
        vertical-align: baseline;
        object-fit: unset;
        width: 476px;
        height: 271px;
        /* object-fit: cover; */
    }
    #slideshow li {
        list-style-type: none;
    }
    .bx-pager { text-align: center; }
    .bx-pager-item { display: inline-block; margin: 0 10px; }
    .bx-pager-item .active { color: #F08A22; }
    .bx-prev { float: left; }
    .bx-next { float: right; }
    /*.bx-prev:before{content: '\f101';} */
    #slide-counter {
        text-align: center;
        /*margin: 15px 0 0 0;*/
        font-size: 14px;
        color: #a5c049;
    }
    .cadcam1 .nbs-flexisel-item img{
        /*height: 170px;  */  
        width: 100%;
    }
    .sldsft .nbs-flexisel-nav-right {
        right: 0px;
    }
    .popover.right{
        right:125px!important;
        margin-left:0px!important;
    }
    .nbs-flexisel-nav-left, .nbs-flexisel-nav-right{display:none}
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-left, 
    .nbs-flexisel-inner:hover .nbs-flexisel-nav-right{display:block;}
    .nbs-flexisel-nav-left {
        left: 10px!important;
    }
    .nbs-flexisel-nav-right {
        right: 10px!important;
    }
    .mar-tb-20 {
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .softbx-bdr {
        /* min-height: 304px;*/
    }
    .videosize{    /*margin-top: 5px;*/
        height: 240px;}

    .table_nb .table>tbody>tr>td, 
    .table_nb .table>tbody>tr>th, 
    .table_nb .table>tfoot>tr>td, 
    .table_nb .table>tfoot>tr>th, 
    .table_nb .table>thead>tr>td, 
    .table_nb .table>thead>tr>th{
        padding-top: 0;
        padding-bottom: 15px;
        line-height: 22px;
        padding-left:0px;
    }
    .bx-controls-direction a {
        margin-top: 2px;
    }
    .row {
        margin-right: -8px;
        margin-left: -8px;
    }
    .finance_type h3 {
        color: #fff;
        font-family: "Helvetica Neue",Helvetica;
    }
    .finance_type .fn {
        border-radius: 10px;
        background-color: rgba(0, 0, 0, 0.6);
        /*-webkit-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        -moz-box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);
        box-shadow: 0px 0px 10px 1px rgba(38, 245, 0, 0.72);*/
        border-radius: 10px;
    }
    @media screen and (max-width: 1024px){
        video{
            width: 100%;
        }
    }
    @media only screen and (max-width: 1024px) and (min-width: 769px)  {
        .container{
            padding: 0;
        }
    }
    .fg_span {
        margin-top: 5px;
        margin-bottom: 20px;
        /* float: left;*/
        /*width: 100%;*/
        display: block;
        margin-left: 10px;
    }
    h3.vconf {
        margin-bottom: 30px;
        margin-top: -2px;
    }
    .videobtn{
        margin-top:5px;
        width:100%;
        float:left;
    }
    table.member_table tr td, th{
        border: 0 !important;
    }
    .technical_spec table.table>thead>tr>th{
        border: 0 !important;
    }
    .service_avail{
        font-size: 20px;
        color: green;
    }
    .service_navail{
        font-size: 20px;
        color: red;
    }
    .dad:hover > .son-1 {
        -moz-transform: scale(2,2);
        -webkit-transform: scale(2,2);
        transform: none;
    }
    /*GALLERY*/
    .gallery .card {
        cursor: pointer;
    }

    .galleryShadow {
        display: none;
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .galleryModal {
        -webkit-transform: scale(0);
        transform: scale(0);
        -webkit-transition: ease all .5s;
        transition: ease all .5s;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background: #000;
        z-index: 10111;
    }

    .galleryModal .galleryContainer {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        width: 80%;
        height: 80%;
    }

    .galleryModal .galleryContainer img {
        position: absolute;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        max-width: 100%;
        max-height: 100%;
        border: 10px solid #fff;
        border-radius: 10px;
    }

    .galleryModal .galleryContainer .galleryText {
        position: absolute;
        width: 100%;
        height: auto;
        top: 100%;
        color: #fff;
        text-align: center;
    }

    .galleryModal .galleryIcon {
        position: absolute;
        font-size: 2rem;
        width: 2rem;
        height: 2rem;
        text-align: center;
        color: #fff;
    }

    .galleryModal .gIquit {
        right: 10px;
        top: 10px;
    }

    .galleryModal .gIleft {
        top: 50%;
        left: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }

    .galleryModal .gIright {
        top: 50%;
        right: 10px;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
    }
</style>


<style>
      .mar-tb-20 {
    margin-top: 20px;
    margin-bottom: 20px;
}
video {
    display: inline-block;
    vertical-align: baseline;
    object-fit: unset;
    width: 396px;
    }
    .fg_span {
    margin-bottom: 30px;
    float: left;
    width: 100%;
}
h3.vconf {
    margin-bottom: 30px;
    margin-top: -2px;
}
.videobtn{
	margin-top:57px;
	width:100%;
	float:left;
}
.videosize {
    margin-top: 5px;
    height: 243px;
}
  </style>
  
<div class="" style="margin-top: 69px;"><img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/machine-breakdown1.jpg" width="100%"></div>
  	<div class="col-sm-12 box-padd padd-0">
		<div class="" style="padding: 0 !important;">
			<div class="container-fluid myprofile-bg dahboard-bg">
			  <div class="container">
			    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
			      <center><h2 class="margin-0">Service Engineers</h2></center>
			    </div>
			  </div> 
			</div>
			<div class="container-fluid programmers-grey-bg">
			  	<div class="container">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
					    <form action="" method="post">
							<div class="col-sm-3 col-md-3 padd-0">
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
									<input type="text" class="form-control input-form search-go" placeholder="Search" name="programerName">
									<div class="input-group-btn">
										<button class="btn btn-default search-go" type="submit" name="btnSearch"><span>Go</span></button>
									</div>
								</div>
							</div>
					    </form>
				     	<div class="col-sm-2 col-md-2"> 
				     		 <!-- <a href="" class="btn btn_orange" data-toggle="modal" data-target="#advsearchmodal"><span class="advanced-search">Advanced Search</span></a> -->
				     	</div>
					    <div class="col-sm-3 col-md-3 sortby-marg padd-0">
					     	<p class="pull-right"><span class="one-ten-text"><?php echo $pageintation['start']?> - <?php echo $pageintation['end']?></span> of <?php echo $pageintation['totalCount'];?> Service Engineers</p>
					    </div>
				    </div>
			 	</div>
			</div>
		</div>
		<br/>
<?php 	 // display messages

	if(hasFlash("dataMsgSuccess"))	{	?>

		<div class="alert alert-success alert-dismissible" role="alert">

		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

		  <?php echo getFlash("dataMsgSuccess"); ?>

		</div>

<?php	}	?>

<?php 	// display messages

	if(hasFlash("dataMsgError"))	{	?>

		<div class="alert alert-warning alert-dismissible" role="alert">

		  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

		  <?php echo getFlash("dataMsgError"); ?>

		</div>

<?php	}	?>
		<div class="container sq-tiles">
			<div class="col-sm-12 padd-0">
		    	<center><h2>Remote Machine Service</h2>
				<p>At Stelmac, we provide live online consulting for business development etc.</p></center>
				<div class="col-sm-4 col-xs-12 padd-8 ">
					<!-- <?php if($this->session->userdata('uid')==''){?>
						<a href="#" data-toggle="modal" data-target="#signinModal">
					<?php }else{?>
						<a href="#" data-toggle="modal" data-target="#ondemandser_modal">
					<?php }?> -->
					<div class=" dad">
					  	<div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/remoteappconsult-min.jpg');"></div>
				    	<div class="son-text">
							<h3>Machine Breakdown</h3>
							<p>With reliable and fast reaction time for a machine breakdown, we ensure high availability and smooth functioning of a machine even under the most demanding situations. </p>
							<?php if($this->session->userdata('uid')==''){?>
								<a href="#" data-toggle="modal" data-target="#signinModal">
							<?php }else{?>
								<a href="#" data-toggle="modal" data-target="#ondemandser_modal">
							<?php }?>View More >></a>
						</div>
					</div>
					<!-- </a> -->
		        </div>

		        <div class="col-sm-4 col-xs-12 padd-8">
					<!-- <?php if($this->session->userdata('uid')==''){?>
						<a href="#" data-toggle="modal" data-target="#signinModal">
					<?php }else{?>
						<a href="#" data-toggle="modal" data-target="#ondemandser_modal">
					<?php }?> -->
					<div class=" dad">
					  	<div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/machine-maintenance-min.jpg');"></div>
				    	<div class="son-text">
							<h3>Machine Maintenance</h3>
							<p>Designed to improve the productivity of a machine while preventing any issues in advance, maintenance schedules ensure high availability and productivity of a machine.</p>
							<?php if($this->session->userdata('uid')==''){?>
						<a href="#" data-toggle="modal" data-target="#signinModal">
					<?php }else{?>
						<a href="#" data-toggle="modal" data-target="#ondemandser_modal">
					<?php }?> View More >></a>
						</div>
					</div>
					<!-- </a> -->
		        </div>

		        <div class="col-sm-4 col-xs-12 padd-8">
					<!-- <?php if($this->session->userdata('uid')==''){?>
						<a href="#" data-toggle="modal" data-target="#signinModal">
					<?php }else{?>
						<a href="#" data-toggle="modal" data-target="#serviceagreement_modal">
					<?php }?> -->
					<div class=" dad">
					  	<div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/service-agreement-min.jpg');"></div>
				    	<div class="son-text">
							<h3>Service Agreement</h3>
							<p>Whether attending your machine personally on site or via remote service, Stelmac highly qualified service engineers are available for installation, diagnosis, repair or maintenance. </p>
							<?php if($this->session->userdata('uid')==''){?>
						<a href="#" data-toggle="modal" data-target="#signinModal">
					<?php }else{?>
						<a href="#" data-toggle="modal" data-target="#serviceagreement_modal">
					<?php }?> View More >></a>
						</div>
					</div>
					<!-- </a> -->
		        </div>
		   	</div>
		</div>
	</div>
<div class="clearfix"></div>
<!-- <div class="container-fliud">
		<div class="container">
	  		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-0">
	  			<h2 style="margin-top: 0;" class="col-sm-12 text-center">Meet Our Service Engineers</h2>
				<div class="">
					<ul class="cadcam1">
						<li id="" >
							<div class="col-sm-12 col-md-12 padd-8">
								<div class="prgrmr amit-border">
									<div class="amit_img_bag">
										<img src="<?php echo $theme_url?>/images/krishna.PNG">							
									</div>
									<div class="amit-text">
										<span class="amit-das-text">david</span>
										<p>Certified Public Bookkeeper</p>
										<div class="prgrmr_det">
											<p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
											<p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
											<p></p>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
										<a href=""><button class="btn btn-default addmore-btn">View Profile </button></a>
									</div>
								</div>
							</div>
						</li>	
						<li id="" >
							<div class="col-sm-12 col-md-12 padd-8">
								<div class="prgrmr amit-border">
									<div class="amit_img_bag">
										<img src="<?php echo $theme_url?>/images/krishna.PNG">							
									</div>
									<div class="amit-text">
										<span class="amit-das-text">david</span>
										<p>Certified Public Bookkeeper</p>
										<div class="prgrmr_det">
											<p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
											<p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
											<p></p>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
										<a href=""><button class="btn btn-default addmore-btn">View Profile </button></a>
									</div>
								</div>
							</div>
						</li>
						<li id="" >
							<div class="col-sm-12 col-md-12 padd-8">
								<div class="prgrmr amit-border">
									<div class="amit_img_bag">
										<img src="<?php echo $theme_url?>/images/krishna.PNG">							
									</div>
									<div class="amit-text">
										<span class="amit-das-text">david</span>
										<p>Certified Public Bookkeeper</p>
										<div class="prgrmr_det">
											<p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
											<p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
											<p></p>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
										<a href=""><button class="btn btn-default addmore-btn">View Profile </button></a>
									</div>
								</div>
							</div>
						</li>
						<li id="" >
							<div class="col-sm-12 col-md-12 padd-8">
								<div class="prgrmr amit-border">
									<div class="amit_img_bag">
										<img src="<?php echo $theme_url?>/images/krishna.PNG">							
									</div>
									<div class="amit-text">
										<span class="amit-das-text">david</span>
										<p>Certified Public Bookkeeper</p>
										<div class="prgrmr_det">
											<p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
											<p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
											<p></p>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
										<a href=""><button class="btn btn-default addmore-btn">View Profile </button></a>
									</div>
								</div>
							</div>
						</li>
						<li id="" >
							<div class="col-sm-12 col-md-12 padd-8">
								<div class="prgrmr amit-border">
									<div class="amit_img_bag">
										<img src="<?php echo $theme_url?>/images/krishna.PNG">							
									</div>
									<div class="amit-text">
										<span class="amit-das-text">david</span>
										<p>Certified Public Bookkeeper</p>
										<div class="prgrmr_det">
											<p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
											<p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
											<p></p>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
										<a href=""><button class="btn btn-default addmore-btn">View Profile </button></a>
									</div>
								</div>
							</div>
						</li>
						<li id="" >
							<div class="col-sm-12 col-md-12 padd-8">
								<div class="prgrmr amit-border">
									<div class="amit_img_bag">
										<img src="<?php echo $theme_url?>/images/krishna.PNG">							
									</div>
									<div class="amit-text">
										<span class="amit-das-text">david</span>
										<p>Certified Public Bookkeeper</p>
										<div class="prgrmr_det">
											<p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
											<p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
											<p></p>
											<div class="clearfix"></div>
										</div>
										<div class="clearfix"></div>
										<a href=""><button class="btn btn-default addmore-btn">View Profile </button></a>
									</div>
								</div>
							</div>
						</li>
					</ul> 
				</div>
			</div>
			<nav aria-label="...">
			 <?php echo pagination($pageintation['totalCount'],$pageintation['page'],$pageintation['show'],site_url()."remoteprogramming/index/",'');?>		
			</nav>
		</div> 
		<div class="clearfix"></div>
		
	</div>  
-->
<div class="container-fliud">
    <div class="container">
        <div class="col-sm-12  padd-0 expert-row">
            <h2 class="col-sm-12 text-center">Meet Our Trainers</h2>
            <div class="row xpert">
                <ul class="cadcam1">
                    <?php 
                    if ($serviceEngineerList) {
                        /* $url = site_url() . "xpertconnect/api/findFeaturedListRemoteTraining/1";
                        $assigned_details = apiCall($url, "get");

                        $assigned_id = $assigned_details['result']['user_id'];
                        $assigned_text = $assigned_details['result']['description']; */
	
                        foreach ($serviceEngineerList['result'] as $rowConsult) {
                            if ($rowConsult['uid'] == $assigned_id) {
                                $name = $rowConsult['u_name'];
                                $u_avatar = $rowConsult['u_avatar'];
							
                            }
                            ?>
                            <li id="" >
                                <div class="col-sm-12 col-md-12 padd-8">
                                    <div class="prgrmr amit-border">
                                        <div class="amit_img_bag">
                                            <img src="<?php echo $theme_url ?>/images/krishna.PNG">
                                            <!-- <?php if ($rowConsult['u_avatar']) { ?>
                                                            <img src="<?= site_url() . '/uploads/customer/' . $rowConsult['u_avatar'] ?>" width="100px" height="100px">
                                            <?php } else { ?>
                                                            <img src="<?= site_url() . '/uploads/customer/user-default.png' ?>" width="100px" height="100px">
                                            <?php } ?> -->
                                        </div>
                                        <div class="amit-text">
                                            <span class="amit-das-text"><?php echo $rowConsult['u_name']; ?></span>
                                            <p>Certified Public Bookkeeper</p>
                                            <div class="prgrmr_det">
                                                <p><span class="left_label">Rate</span> <span class="pull-right"><span style="font-size: 16px;font-weight: bold;">₹ 550</span>/hr</span></p>
                                                <p><span class="left_label">Location</span> <span class="pull-right"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;India</span></p>
                                                <p></p>
                                                <div class="clearfix"></div>
                                            </div>
                                            <div class="clearfix"></div>
                                            <a href="<?php echo site_url() . "consultant/serviceEngineerDetails/" . $rowConsult['uid']; ?>"><button class="btn btn-default addmore-btn">View Profile </button></a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php
                        }
                    }
                    ?>	
                </ul> 
            </div>
        </div>
    </div> 
    <div class="clearfix"></div>
</div> 
	 	
	
<div class="clearfix"></div><br/>
  <div style="background: #f9f9f9;">
        <div class="container">
            <div class="col-sm-12 padd-8">
                <div class="full-width pull-left mar-tb-20" id="chatWithus">
                    <div class="pull-left full-width">
                        <center><h2 style="margin-top: 0;">Chat with Us </h2></center>
                        <div class="col-sm-offset-2 col-sm-4 padd-0">	
                            <form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
                                <h3 class="vconf">What would you likes to do?</h3>
                                <div class="form-group" style="margin-bottom:30px;">
                                    <span class="fg_span" ><input type="radio" value="T" name="video_chat" checked> Text chat</span>
                                    <span class="fg_span" ><input type="radio" value="V" name="video_chat"> Video chat </span>
                                    <span class="fg_span" ><input type="radio" value="B" name=""> Book a live demo</span>
                                </div> 
                                <div class="videobtn">
                                    <?php if ($user_id == '') { ?>
                                        <input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/> 
                                    <?php } else { ?>
                                        <input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit" id="submitrequest" data-custom="<?php echo $this->session->userdata('uid'); ?>"/> 
<?php } ?> 
                                </div>
                            </form>
                        </div>
                        <div class="col-sm-4 padd-0">
                            <div class="T chatbox" style="margin-top: 8px;">
                                <div class="messaging">
                                    <div class="inbox_msg">
                                        <div class="mesgs">
                                            <div class="msg_history" id="msghistory">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="type_msg">
                                    <div class="input_msg_write">
                                        <?php
                                        $user_id = $this->session->userdata('uid');
                                        ?>
                                        <input type="hidden" class="write_msg" value="<?php echo $user_id; ?>" id="userid" placeholder="Type a message" />
                                        <input type="hidden" class="write_msg" value="<?php echo $machineID; ?>" id="machineId" placeholder="Type a message" />
                                        <input type="text" class="write_msg" id="message"  placeholder="Type a message" />
                                        <input type="hidden" class="write_msg" id="type" value="2001" />
                                        <?php
                                        if ($user_id == '' || $user_id == null) {
                                            ?>
                                            <button class="msg_send_btn" type="button" data-toggle="modal" data-target="#signinModal"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
                                        <?php } else { ?>
                                            <button class="msg_send_btn" onclick="chatingFunction(<?php echo $user_id; ?>,<?php echo $machineID; ?>)" type="button"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></button>
<?php } ?>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<div class="clearfix"></div><br/>
<div class="container-fliud r-programming recent-view">
	     <div class="container">
            <center><h2>Recently Viewed</h2></center>
            <ul class="cadcam">
               <?php if ($recently_viewed_data) { ?>
                    <?php
                    $count_recently_viewed = count($recently_viewed_data);
                    foreach ($recently_viewed_data as $row) {
                        ?>
                        <li>
                            <a class="thumbnail" href="<?php echo site_url() . "consultant/expert/consultantDetail/" . $row['uid']; ?>">
                                <img alt="" src="<?php echo $theme_url ?>/images/trainers-img1.jpg">
                                <div class="amit-text text-center">
                                    <span class="amit-das-text"><?php echo $row['u_name']; ?></span>
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
<!-- <div class="container">
	<div class="col-sm-12 padd-0">
		<center><h2>Service Engineers Featured This Month</h2></center>
		<div class="last-sec">
			<div class="col-sm-2 col-md-1 padd-0">
				<img src="<?php echo $theme_url?>/images/trainers-img1.jpg" class="img-responsive" style="border-radius: 50%;height: 70px;width: 70px;">
			</div>
			<div class="col-sm-10 col-md-11 padd-0">
				<p>Emma is an energetic and passionate leader, technologist, and consultant with over 10 years of strategic planning, tactical centered implementation, and management consulting experience. Joshua utilizes proven qualitative and analytical skills driven by business objectives and up to date technology.</p>
			</div>
		</div>
	</div>
</div> -->
<div class="clearfix"></div><br/>
	<!-- Modal -->

<div id="ondemandser_modal" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm">
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <center><h4 class="modal-title">On-Demand Service</h4></center>
	      	</div>
	      	<div class="modal-body">
		      	<div class="col-sm-12 border_bot">
	  				<form class="col-sm-12 form-horizontal" name="#" id="ondemand_form" method="post" action="">
						<div class="form-group ">
							<input type="text" class="form_bor_bot" id="companyname" name="company_name" value= "" placeholder="Company name" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot" id="machinebrand" name="machinebrand" value= "" placeholder="Machnine Brand" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot" id="machinetype" name="machinetype" value= "" placeholder="Machnine Type" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot" id="machinemodel" name="machinemodel" value= "" placeholder="Machnine Model" required><span class="compulsary">*</span>
						</div>
						<div class="form-group">
						  	<input type="text" class="form_bor_bot numbersOnly" id="machineage" name="machineage" value= "" placeholder="Age of Machnine " required><span class="compulsary">*</span>
						</div>
					  	<div class="form-group ">
					  		<select class="form_bor_bot" id="servicetype" name="servicetype">
					  			<option value="">Select Service Type</option>
					  			<option value="Machine Breakdown">Machine Breakdown</option>
					  			<option value="Machine Maintenance">Machine Maintenance</option>
					  		</select>
					  	</div>
					  	<br/>
					  	<div class="form-group">
							<div class="">
								<input type="submit" name="btnOnDemandService" id="btnOnDemandService" class="btn btn_orange" value="Service Request" style="width:100% " />
							</div>
					  	</div>
					</form>
		      	</div><div class="clearfix"></div>
	      	</div>
	    </div>
  	</div>
</div>



<!-- serviceagreement_modal -->

<div id="serviceagreement_modal" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm">
	    <!-- Modal content-->
	    <div class="modal-content">
	      	<div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal">&times;</button>
		        <center><h4 class="modal-title">Service Agreement</h4></center>
	      	</div>
	      	<div class="modal-body">
		      	<div class="col-sm-12 border_bot">
		  			<form class="col-sm-12 form-horizontal" name="service_agreement_form" id="service_agreement_form" method="post" action="<?php echo site_url().'consultant/request_service_support'?>">
							<div class="form-group ">
								<input type="text" class="form_bor_bot" id="company_name" name="company_name" value= "" placeholder="Company name" required><span class="compulsary">*</span>
							</div>
							<div class="form-group">
							  	<input type="text" class="form_bor_bot" id="machine_model_no" name="machine_model_no" value= "" placeholder="Machine Model ID" required><span class="compulsary">*</span>
							</div>
						  	<div class="form-group ">
						  		<select class="form_bor_bot" id="service_type" name="service_type">
						  			<option value="">Select Service Type</option>
						  			<option value="Machine Breakdown">Machine Breakdown</option>
						  			<option value="Machine Maintenance">Machine Maintainence</option>
						  			<option value="Service Agreement">Service Agreement</option>
						  			<option value="On-Demand Service">On-Demand Service</option>
						  		</select><span class="compulsary">*</span>
						  	</div>
							<div class="form-group">
							  	<textarea type="text" class="form_bor_bot" name="problem_note" id="problem_note" placeholder="Nature of problem"></textarea><span class="compulsary">*</span>
							</div><br/>
							<div class="form-group">
								<div class="">
									<input type="submit" name="btnRequest" id="submit" class="btn btn_orange" value="Service Request" style="width: 100%"> 
									<!-- <input type="submit" name="" id="submit" class="btn btn_orange" value="Service Request" style="width: 100%" /> -->
								</div>
							</div>
					</form>
		      	</div><div class="clearfix"></div>
	      	</div>
	    </div>
  	</div>
</div>



<?php $this->template->contentBegin(POS_BOTTOM);?>

<script language="javascript" type="text/javascript">

jQuery('.numbersOnly').keyup(function () { 
    this.value = this.value.replace(/[^0-9\.]/g,'');
});
	
$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chatbox").not(targetBox).hide();
        $(targetBox).show();
    });
});


$(document).ready()

	$("#service_agreement_form").validate({ 

            rules: {

				company_name:{

                	required: true

                }, 

				machine_model_no:{

                	required: true

                },

				service_type:{

                	required: true

                },

				problem_note:{

                	required: true

                },

            },

			messages: { 

				company_name:{

                	required: "Please enter company name"

                }, 

				machine_model_no:{

                	required: "Please enter machine model id"

                },

				service_type:{

                	required: "Please select service type"

                },

				problem_note:{

                	required: "Please enter nature of problem"

                },		

			}

	}); 



	//on demand service 

	$("#ondemand_form").validate({ 

            rules: {

				companyname:{

                	required: true

                }, 

				machinebrand:{

                	required: true

                },

				machinetype:{

                	required: true

                },

				machinemodel:{

                	required: true

                },

                machineage:{

                	required:true

                },

                servicetype:{

                	required:true

                },

            },

			messages: { 

				companyname:{

                	required: "Please enter company name"

                }, 

				machinebrand:{

                	required: "Please enter machine brand"

                },

				machinetype:{

                	required: "Please enter machine type"

                },

				machinemodel:{

                	required: "Please enter machine model"

                },

                machineage:{

                	required:"Please enter age of machine"

                },

                servicetype:{

                	required:"Please select service type"

                },

				servicetype:{

                	required: "Please select service type"

                },	

			}

	}); 

</script>
<script  src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>
<script type="text/javascript">
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
$('.cadcam').each(function(){
	$(this).flexisel({
		visibleItems: 6,
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

     // video chat onclick function

    $("#submitrequest").click(function () {
        var customAttr = $(this).attr("data-custom");
        var radioBoxValue = $("input[name='video_chat']:checked").val();
        if (radioBoxValue == "V") {

            window.open("<?php echo site_url(); ?>/welcome/opentok", "_blank");


        }
    });
</script>
<script type="text/javascript">
    $(document).ready(function () {
        getChatHistory();
    });
    setInterval(function ()
    {
        getChatHistory();
    }, 10000);//time in milliseconds
    // enter text box function

    //                                                    document.getElementById("txt_username").onkeypress = function (event) {
    //                                                        if (event.keyCode == 13 || event.which == 13) {
    //                                                            alert("You are clicked");
    //                                                        }
    //                                                    };

    //                                                    function myFunction(userId, machineId, type) {
    //                                                        $('#message').val();
    //                                                        var msg = $('#message').val();
    //                                                        var type = $("#type").val()
    //                                                         chatingFunction(userId, machineId, type);
    //                                                     }

    //                                                     function getChatHistory()
    //                                                        chatingFunction(userId, machineId, type);
    //                                                    }

    function getChatHistory()
    {
        var userId = $("#userid").val();
        var machineId = $("#machineId").val();
        $.ajax({
            type: 'POST',
            url: "<?php echo base_url(); ?>machine/getChat/",
            data: {userId: userId, machineId: machineId},
            success: function (msg) {
                var data = JSON.stringify(msg);
                var datapars = JSON.parse(data);
                var msg = "";
                var msgFrom = "";
                var msgTo = "";
                var created_at = "";
                var htmlStr = "";
                $.each(datapars, function (eventindex, eventData) {
                    msg = eventData.message;
                    msgFrom = eventData.msg_from;
                    msgTo = eventData.msg_to;
                    created_at = eventData.created_at;
                    if (msgFrom == userId)
                    {
                        htmlStr += "<div class='incoming_msg'>";
<?php if ($u_avatar = $this->session->userdata('u_avatar') != '') { ?>
                            htmlStr += "<div class='incoming_msg_img'> <img src='<?php echo site_url() . "uploads/customer/" . $u_avatar = $this->session->userdata('u_avatar'); ?>' alt='sunil'> </div>";
<?php } else { ?>
                            htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
<?php } ?>
                        htmlStr += "<div class='received_msg'>";
                        htmlStr += "<div class='received_withd_msg'>";
                        htmlStr += "<p>" + msg + "</p>";
                        htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                        htmlStr += "</div>";
                        htmlStr += "</div>";
                    } else
                    {
                        htmlStr += "<div class='outgoing_msg'>";
                        htmlStr += "<div class='sent_msg'>";
                        htmlStr += "<p>" + msg + "</p>";
                        htmlStr += "<span class='time_date'>" + created_at + "</span> ";
                        htmlStr += "</div>";
                        htmlStr += "</div>";
                    }
                });
                $("#msghistory").html(htmlStr);
            },
            error: function (result)
            {
                //alert("3232");
            },
            fail: (function (status) {
                //alert("8888");
            }),
            beforeSend: function (d) {
                //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
            }
        });
    }
    function chatingFunction(userId, machineId, type)
    {
      // alert('hi');
        $('#message').val();
        var msg = $('#message').val();
        var type = $("#type").val();
        //alert(type);

        if (msg != "") {
            $.ajax({
                type: 'POST',
                url: "<?php echo base_url(); ?>machine/saveChat/",
                // data: "userId="+userId+",machineId="+machineId+",msg="+msg,
                data: {userId: userId, machineId: machineId, msg: msg, type: type},
                success: function (msg) {
                    $("#message").val("");
                    $.ajax({
                        type: 'POST',
                        url: "<?php echo base_url(); ?>machine/getChat/",
                        data: {userId: userId, machineId: machineId},
                        success: function (msg) {
                            var data = JSON.stringify(msg);
                            var datapars = JSON.parse(data);
                            var msg = "";
                            var msgFrom = "";
                            var msgTo = "";
                            var created_at = "";
                            var htmlStr = "";
                            $.each(datapars, function (eventindex, eventData) {
                                msg = eventData.message;
                                msgFrom = eventData.msg_from;
                                msgTo = eventData.msg_to;
                                created_at = eventData.created_at;
                                if (msgFrom == userId)
                                {
                                    htmlStr += "<div class='incoming_msg'>";
                                    htmlStr += "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'> </div>";
                                    htmlStr += "<div class='received_msg'>";
                                    htmlStr += "<div class='received_withd_msg'>";
                                    htmlStr += "<p>" + msg + "</p>";
                                    htmlStr += "<span class='time_date'>" + created_at + "</span></div>";
                                    htmlStr += "</div>";
                                    htmlStr += "</div>";
                                } else
                                {
                                    htmlStr += "<div class='outgoing_msg'>";
                                    htmlStr += "<div class='sent_msg'>";
                                    htmlStr += "<p>" + msg + "</p>";
                                    htmlStr += "<span class='time_date'>" + created_at + "</span> ";
                                    htmlStr += "</div>";
                                    htmlStr += "</div>";
                                }
                            });
                            $("#msghistory").html(htmlStr);
                        },
                        error: function (result)
                        {
                            //alert("3232");
                        },
                        fail: (function (status) {
                            //alert("8888");
                        }),
                        beforeSend: function (d) {
                            //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                        }
                    });
                },
                error: function (result)
                {
                    //alert("3232");
                },
                fail: (function (status) {
                    //alert("8888");
                }),
                beforeSend: function (d) {
                    //$('#div_result').html("<center><strong style='color:red'>Please Wait...<br><img height='25' width='120' src='<?php echo base_url(); ?>img/ajax-loader.gif' /></strong></center>");
                }
            });
        }
    }
    $(document).ready(function () {
        // $(".chatbox").hide();
        $('input[type="radio"]').click(function () {
            var inputValue = $(this).attr("value");
            var targetBox = $("." + inputValue);
            $(".chatbox").not(targetBox).hide();
            $(targetBox).show();
        });
    });

</script>

<script type="text/javascript">
    $("#message").keyup(function (event) {
        if (event.keyCode === 13) {
            chatingFunction('<?php echo $user_id; ?>', '<?php echo $machineID; ?>');
        }
    });
    // video chat onclick function

    $("#submitrequest").click(function () {
        var customAttr = $(this).attr("data-custom");
        var radioBoxValue = $("input[name='video_chat']:checked").val();
        if (radioBoxValue == "V") {

            window.open("<?php echo site_url(); ?>/welcome/opentok", "_blank");


        }
    });
</script>

<?php echo $this->template->contentEnd();?> 