
<div class="content-wrapper">
    <section class="content-header">
      <h1>Manufacturing Processes List</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."additivemanufacturing/admin"?>">Manufacturing Processes List</a></li>
			<li class="active"> Manufacturing Processes List</li>
		</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Create Manufacturing Processes List</h3>
            </div>
			<?php $this->load->view("_form",array("action" => "create"));	?>
		</div>
	  </div>
	</div>
	</section>
</div> 


					
					
				