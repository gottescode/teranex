
<div class="content-wrapper">
    <section class="content-header">
      <h1>Community</h1>
     <ol class="breadcrumb">
			<li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-dashboard"></i> Home</a></li>
			<li class=""><a href="<?=site_url()."community/admin"?>">Community</a></li>
			<li class="active">Create Community</li>
		</ol>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
         
          <div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Create Community</h3>
            </div>
	<?php $this->load->view("_form",array("action" => "create"));	?>
		</div>
	  </div>
	</div>
	</section>
</div> 


					
					
				