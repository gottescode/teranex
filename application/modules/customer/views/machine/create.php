
<div class="container-fluid myprofile-bg dahboard-bg">
  	<div class="container">
	    <div class="col-sm-4 padd-0">
	      	<ul>
	        	<li class="myprofile">Machine</li>
	      	</ul>
	    </div>
	    <div class="col-sm-8 padd-0">
		  	<ul>
		    	<li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
		  	</ul>
		</div>
  	</div>
</div>
<div class="welcome-j-bg">
	<div class="container">

	</div>
</div>
<div class="row margin_0" style="background-color: #353537;">
		<?php   $this->load->view("cust_side_menu" ); ?> 
	<div class="">
		<div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 bg_white"> 
			<div class="content-wrapper">
			    <div class="box box-primary">
					<?php $this->load->view("_form",array("action" => "Add"));	?>
				</div>
			</div>
			<div class="clearfix"></div>
		</div><div class="clearfix"></div>
	</div>
</div>



					
					
				