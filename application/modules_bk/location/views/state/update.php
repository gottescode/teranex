 
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<section class="content-header">
		  <h1>State</h1>
		  <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."location/state"?>">State List</a></li>
			<li class=""><a href="">Update State</a></li>
			
		  </ol>
		</section>
<!-- page content -->
   <section class="content">
  <div class="row">
    <div class="col-xs-12">
     
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update State</h3>
        </div>
		<?php $this->load->view("state/_form");	?>
		 </div>
    </div>
  </div>
</section> 
  </div>