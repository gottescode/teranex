
<div class="content-wrapper">
    <section class="content-header">
      <h1>Online Feature List</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."rapidprototyping/admin"?>">Online Feature List</a></li>
			<li class="active">Create Online Feature List</li>
		</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
        <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Create Online Feature List</h3>
            </div>
			<?php $this->load->view("_form",array("action" => "create"));	?>
		</div>
	  </div>
	</div>
	</section>
</div> 


					
					
				