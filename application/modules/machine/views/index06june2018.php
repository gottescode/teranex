<?php $this->template->contentBegin(POS_TOP);?>
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/css/machine.css"/>
<?php echo $this->template->contentEnd();	?>
<div class="container-fluid used-machines-nav fix_nav" style="">
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

<div class="col-sm-6 pull-left padd-8">
	<div id="catDetails_<?=$rowCat['mc_id']?>" class="parent">
		<!-- <div class="" style="margin-top: 50px;position: relative;" >
			<img class="img_hvr" src="" width="100%" >
		</div> -->
		<div class="col-sm-12 child" style="background:url('<?php echo $imgback;?>'); min-height: 300px;">
			<div class="col-sm-12 padd-0 child1" >
	           	<h1><?=ucwords($rowCat['category_name'])?></h1>
	           	<div class="child_p">
	           		<p><?=strhtmldecode($rowCat['short_description'])?></p>
	           	</div>
				<div class="col-sm-12 padd-0">
					<!-- <a href="<?php echo site_url()."machine/machineList/".$rowCat['mc_id']."/used/".formaturl($rowCat['category_name']); ?>" class="btn btn_orange">  <?=ucwords($rowCat['category_name'])?> Used</a>
					<a href="<?php echo site_url()."machine/machineList/".$rowCat['mc_id']."/new/".formaturl($rowCat['category_name']); ?>" class="btn btn_orange"> <?=ucwords($rowCat['category_name'])?></a> -->
					<a href="<?php echo site_url()."machine/machineList/".$rowCat['mc_id']."/used/".formaturl($rowCat['category_name']); ?>" class="btn btn-xs btn_orange">Used</a>
					<a href="<?php echo site_url()."machine/machineList/".$rowCat['mc_id']."/new/".formaturl($rowCat['category_name']); ?>" class="btn btn-xs btn_orange">New</a>
				</div>
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
</script>

<?php echo $this->template->contentEnd();	?> 