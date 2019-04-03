<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/machine.css"/>
<style type="text/css">
	.son-text p{
		min-height: 75px;
	}
</style>
<?php echo $this->template->contentEnd();	?>
 <div class="">
		<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/machine_indexnew-min.jpg" alt="">
		<div class="clearfix"></div>
		<center><h2>Machines</h2></center>
 </div>
<div class="clearfix"></div>
<div class="container-fluid used-machines-nav " id="id_fix_nav" style="">
  	<div class="container padd-0">
	  <div class=" col-sm-12 padd-0">
	  	<ul class="machine_cat">
			<?php if($categoryList){
				foreach($categoryList as $rowCat){?>
				<li><a href="#catDetails_<?=$rowCat['mc_id']?>"><?=ucwords($rowCat['category_name'])?></a></li><li class="divider">|</li>
			<?php }}  ?>
		</ul> 
	  </div>
	</div>
</div>
<div class="clearfix"></div><br/>
<div class=" container M_align padd-0">
<?php if($categoryList){
				foreach($categoryList as $rowCat){?>
					<?php $imgback= base_url()."uploads/machine/".$rowCat['category_image']?>

<div class="col-sm-4 pull-left padd-8">
	<div id="catDetails_<?=$rowCat['mc_id']?>" class="dad" style="margin-bottom: 0;">
		<div class="col-sm-12 son-1" style="background:url('<?php echo $imgback;?>'); min-height: 300px;"></div> 
			<div class="col-sm-12 padd-0 son-text" >
	           	<h3><?=ucwords($rowCat['category_name'])?></h3>
	           	<div class="child_p">
	           		<?=strhtmldecode($rowCat['short_description'])?>
	           	</div>
				<div class="col-sm-12 padd-0">
					<a href="<?php echo site_url()."machine/machineList/".$rowCat['mc_id']."/used/".formaturl($rowCat['category_name']); ?>" class="btn btn-xs btn_orange">Used</a>
					<a href="<?php echo site_url()."machine/machineList/".$rowCat['mc_id']."/new/".formaturl($rowCat['category_name']); ?>" class="btn btn-xs btn_orange">New</a>
				</div>
		   	</div>
		
	</div>
</div>
<?php }}  ?>
<div class="clearfix"></div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script>
	$("ul").find("a").click(function(e) {
    var section = $(this).attr("href");
    $("html, body").animate({
        scrollTop: $(section).offset().top-145
    });
});

	//
	var nav = jQuery("#id_fix_nav");
  var content = jQuery("#id_fix_nav").offset();

  jQuery(window).scroll(function(){
       var screenPosition = jQuery(document).scrollTop() + 100;
        if (screenPosition < 350) {
           nav.removeClass( "fix_nav" );
        }
        if (screenPosition >= 350) {
            nav.addClass("fix_nav");
        }
    });

</script>

<?php echo $this->template->contentEnd();	?> 