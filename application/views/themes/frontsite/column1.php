 
<?php 
	$this->load->view($theme_view . '/common/header');
	$this->load->view($theme_view . '/common/menu');
	?> 
<div id="main" role="main">
	<!-- ribbon -->
<?php 	
	if(isset($this->breadcrumbs)) {	?>
		<!-- breadcrumb -->
		<ol class="breadcrumb">
	<?php	$count = count($this->breadcrumbs); 
			$index = 0; 
			$active = '';	?>
			<li><?php echo anchor(site_url()."dashboard/", "Home");?> </li>
	<?php
			foreach($this->breadcrumbs as $label => $link){	
				$index++;
				if($index === $count )
					$active = 'class="active"';
					
				if($link !='') :	?>
					<li <?=$active;?>><?php echo anchor($link, $label);?> </li>
		<?php	else :	?>
					<li <?=$active;?>><?=$label;?></li>
		<?php	endif;	?>
							
	<?php	}	?>
		</ol>
		<!-- end breadcrumb -->
<?php
	}	?>	
	 
	<!-- end ribbon -->
	
	<div id="content">
<?php	// page title
	if(isset($this->page_title)){	?>
		<div class="row">
			<div class="col-xs-12 col-sm-9 col-md-9 col-lg-9">
				<h2 class="page-title txt-color-blueDark">
					<!-- PAGE HEADER -->
					<?php echo $this->page_title; ?>
				</h1>
			</div>
		</div>
<?php
	} // end page title		?>
	
	<!-- widget grid -->
	<section id="widget-grid" class="">
		<!-- START ROW -->
		<div class="row">
			<!-- NEW COL START -->
			<article class="col-xs-12"> 
				<?php	echo $content; 	?> 
			</article>
		</div>
	</section> 
	</div>
	
</div>