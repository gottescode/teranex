
<div class="content-wrapper">
    <section class="content-header">
      <h1>Automation Brand Model List</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class=""><a href="<?=site_url()."automation/admin/automation_brand_model"?>">Brand Model List </a></li>
      <li class="active">Update Brand Model</li>
	</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Update Brand Model</h3>
            </div>
		<?php $this->load->view("_form",$arrayData);	?>
		</div>
	  </div>
	</div>
	</section>
</div> 

