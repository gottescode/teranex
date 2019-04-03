<?php
// Use $theme to get access of views from specified theme folder in views=>layouts
// as $this->load->view($theme_view.'your_view');

?>
<?php $this->load->view($theme_view . '/common/header'); ?>
<!--=== Content Part ===-->
<div  class="header-bradcome top-70"><?=$content;?><div class="clearfix"></div></div>
<!-- End Content Part --> 
<?php $this->load->view($theme_view . '/common/footer'); ?>
