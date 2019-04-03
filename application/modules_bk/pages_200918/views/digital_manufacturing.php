 
<?php $this->template->contentBegin(POS_TOP);?>

<link href="<?php echo $theme_url?>/css/scrollheader.css" rel="stylesheet" type="text/css">
<style>
.bx-align{
	border: 1px solid;
	padding: 20px 60px;
    border-radius: 10px;
	margin-bottom: 20px;
	}
	.bx-align i.fa {
		margin-right: 10px;
	}
	.bx-align h2{margin:0px}
	.bx-align li{line-height:30px}
	.process div{display: inline-block;}
	.icon img{width: 100px; margin:0 auto;}
	.icon {
		border: 1px solid #425168;
		padding: 20px 10px 0;
		text-align: center;
		margin: 10px;
		border-radius: 10px;
		max-width: 165px;
		width: 150px;
	}
	.ico-mar {
		width: 100%;
		margin: 0 auto;
		float: left;
		text-align: center;
	}
	@media screen and (max-width:519px){
		.arow img{
			display:none
		}
		.icon {
			border: 1px solid #425168;
			padding: 20px 10px 0;
			text-align: center;
			margin: 10px;
			border-radius: 10px;
			max-width: 350px;
			width: 200px;
		}
		.bx-align{float: none!important;}
	}
	@media screen and (min-width:520px){
		.arow img{width: 50px;}
		.arow {
			position: relative;
			top: -40px;
		}
	}
</style>
<?php echo $this->template->contentEnd();?> 

<div class="container" style="margin-top: 69px;"><img src="<?php echo $theme_url?>/images/dmfg.jpg" width="100%"></div>
    <div class="container sq-tiles">
		<div class="col-sm-12 box-padd padd-0">
            <center> <h1>Contract Manufacturing with Teranex</h1>
			<p>At TeraneX, we provide live online consulting for business development etc.</p></center>
			<div class="col-sm-offset-1 col-sm-10 ">
		       <!--  <div class="col-sm-3">
					<div class="bx-shadow">
							<a href="<?php echo site_url()."consultant/consultantslist";?>">
						<img src="<?php echo $theme_url?>/images/ser1.jpg" width="100%">
						<div class="box-cont">
							<h3>Programming with Stelmac</h3>
							<p>At TeraneX, we provide live online consulting for business development etc.</p>
						</div>
						</a>
					</div>
		        </div> -->
		        <div class="col-sm-4">
					<div class="bx-shadow">
						<a href="">
							<img src="<?php echo $theme_url?>/images/Application_support.jpg" width="100%">
							<div class="box-cont">
								<h3>Assembly </h3>
								<p>TeraneX, we provide live online consulting for business development, process engineering, product development  etc.</p>
							</div>
						</a>
					</div>
		        </div>
		        <div class="col-sm-4">
					<div class="bx-shadow">
						<a href="">
							<img src="<?php echo $theme_url?>/images/service-support.jpg" width="100%">
							<div class="box-cont">
								<h3>Component</h3>
								<p>TeraneX, we provide live online consulting for business development, process engineering, product development  etc.</p>
							</div>
						</a>
					</div>
		        </div>
		        <div class="col-sm-4">
					<div class="bx-shadow">
						<a href="">
							<img src="<?php echo $theme_url?>/images/ser3.jpg" width="100%">
							<div class="box-cont">
								<h3>Part</h3>
								<p> TeraneX, we provide live online consulting for business development, process engineering, product development  etc.</p>
							</div>
						</a>
			        </div>
		       	</div>
   			</div>
       	</div>
       	<div class="clearfix"></div>
       	<div>
		<center>
		   
			<?php
			$urls = site_url().'pages/digital_manufacturingRFQ';
 $user_id = $this->session->userdata('uid');
	//exit;	
	if($user_id==''){ echo '<a href="" class="btn btn_orange " data-toggle="modal" data-target="#signinModal">Enquire</a>';}else{ echo '<a href="'.$urls.' " class="btn btn_orange" >Enquire</a>';}?>
		</center>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-12 padd-0 process">
			<center><h1>Easy and Fast Way to Start Manufacturing</h1>  </center>
			<div class="ico-mar">
			<div class="icon">
				<img src="<?php echo $theme_url?>/images/1st.png" class="img-responsive" />
				<h3>Raise RFQ</h3>
			</div>
			<div class="arow">
				<img src="<?php echo $theme_url?>/images/aro.png" class="img-responsive" />
			</div>
				<div class="icon">
				<img src="<?php echo $theme_url?>/images/2nd.png" class="img-responsive" />
				<h3>Receive Quote</h3>
			</div>
			<div class="arow">
				<img src="<?php echo $theme_url?>/images/aro.png" class="img-responsive" />
			</div>
				<div class="icon">
				<img src="<?php echo $theme_url?>/images/3rd.png" class="img-responsive" />
				<h3>Confirm Order</h3>
			</div>
			<div class="arow">
				<img src="<?php echo $theme_url?>/images/aro.png" class="img-responsive" />
			</div>
				<div class="icon">
				<img src="<?php echo $theme_url?>/images/4th.png" class="img-responsive" />
				<h3>Production </h3>
			</div>
			<div class="arow">
				<img src="<?php echo $theme_url?>/images/aro.png" class="img-responsive" />
			</div>
				<div class="icon">
				<img src="<?php echo $theme_url?>/images/5th.png" class="img-responsive" />
				<h3>Delivery</h3>
			</div>
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="col-sm-12 padd-0">
			  <center><h1>Sign Up With Teranex Today</h1>  </center>
			<div class="col-sm-6">
				<div class="pull-right bx-align">
					<h2 class="text-center">Customer</h2>
					<ul style="list-style-type: none;">
						<li><i class="fa fa-check" aria-hidden="true"></i>Easy to use</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>3D Design Support</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>On Time Delevery</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>Quality Management</li>
					</ul>
					<div class="text-center">
						<a href="<?php echo site_url()."pages/signIn"?>" class="btn btn_orange " >Sign Up</a>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="pull-left bx-align">
					<h2 class="text-center">Partner</h2>
					<ul style="list-style-type: none;">
						<li><i class="fa fa-check" aria-hidden="true"></i>Improve Capacity</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>On Time payments</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>Increase ROI</li>
						<li><i class="fa fa-check" aria-hidden="true"></i>Continues Improve</li>
					</ul>
					<div class="text-center">
						<a href="<?php echo site_url()."pages/signIn"?>" class="btn btn_orange " >Sign Up</a>
					</div>
				</div>
			</div>
		</div>
	</div><!--.// sq-tiles -->
	 
		
<?php $this->template->contentBegin(POS_BOTTOM);?> 
<?php echo $this->template->contentEnd();?> 