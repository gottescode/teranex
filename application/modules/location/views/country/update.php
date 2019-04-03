 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>Country</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."location/country"?>">country List</a></li>
			<li class=""><a href="">Update Country</a></li>
			
		  </ol>
		</section>
<!-- page content -->
	<section class="content">
	  <div class="row">
		<div class="col-xs-12">
		 
		  <div class="box box-primary">
			<div class="box-header">
			  <h3 class="box-title">Update Country</h3>
			</div>
			<?php $this->load->view("country/_form");	?>
			</div>
		</div>
	</div>
	</section>
</div>
<!-- /page content -->