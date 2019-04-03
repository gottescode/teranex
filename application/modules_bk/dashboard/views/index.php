<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="<?=site_url()."dashboard"?>"><i class="fa fa-home"></i>Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section> 
    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
		<div id="loader">
			<div class="row">
			<?php	// display messages
					if(hasFlash("ErrorMsg"))	{	?>
						<div class="alert alert-warning alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("ErrorMsg"); ?>
						</div>
					<?php	}		// display messages
				if(hasFlash("dataMsgSuccess"))	{ ?>
						<div class="alert alert-success alert-dismissible" role="alert">
						  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  <?php echo getFlash("dataMsgSuccess"); ?>
						</div>
				<?php	} ?>
				<!-- /.col -->	
				<div class="clearfix visible-sm-block"></div>  
			</div> 
			
		</div>  
 	</section> 
</div> 
<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php $this->template->contentEnd();	?> 