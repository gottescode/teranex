 
<div class="content-wrapper">
    <section class="content-header">
      <h1>City List</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."settings/suppliertype"?>">City List</a></li>
			<li class="active">Create City</li>
		</ol>
    </section>
<!-- page content -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
     
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Create City</h3>
        </div>
        <?php $this->load->view("city/_form");   ?>
         </div>
    </div>
  </div>
</section> 
  </div>
<!-- /page content -->