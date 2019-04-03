 <?php 
  $this->page_title = "Banner"; 
  $this->breadcrumbs = array(
      "Banner" => site_url()."banner/admin",
      "Update Banner" => "#",
    ); 
 ?>
 

 <section class="content">
  <div class="row">
    <div class="col-xs-12">
     
      <div class="box box-primary">
        <div class="box-header">
          <h3 class="box-title">Update Banner</h3>
        </div>
        <?php $this->load->view("banner/admin/_form");	?>
      </div>
    </div>
  </div>
</section> 
