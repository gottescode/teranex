
<div class="content-wrapper">
    <section class="content-header">
      <h1>Add Data </h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."machine/machineSoftwareList"?>">Data List</a></li>
			<li class="active">Add Data </li>
		</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Add Data</h3>
            </div>
			<?php $this->load->view("_form",array("action" => "Add"));	?>
		</div>
	  </div>
	</div>
	</section>
</div> 


					
					
				