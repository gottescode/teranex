
<div class="content-wrapper">
    <section class="content-header">
      <h1>Qualification</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."consultant/admin/qualification"?>">Qualification</a></li>
			<li class="active">Update Qualification</li>
		</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Update Qualification</h3>
            </div>
			<?php $this->load->view("_formQualification",$arrayData);	?>
		</div>
	  </div>
	</div>
	</section>
</div> 

