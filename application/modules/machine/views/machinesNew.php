<?php $this->template->contentBegin(POS_TOP);
$uid = $this->session->userdata('uid');

?>
<style>
.row {
    margin-right: -8px;
    margin-left: -8px;
}
#recentlyViewed img{
	min-height: 100px;
	border-radius: 0;
}
</style>
 <?php echo $this->template->contentEnd();	?>
<section class="other-section other-section-10 dark explore-marketplace">
	<div class=" padd-0 paralax-section1 " style="background-image: url('<? echo base_url()?>/uploads/machine/20180420170413.jpg');height: 100%;width: 100%;background-size: cover;min-height:443px;">
		<div style="width: 100%;background-color: #000000ad ">
			<div class="col-sm-12" style="padding: 30px 0;min-height:443px;">
				<center>
					<h1 class="white-text">Machine</h1>
					<!-- 
					
					<h1 class="white-text">On-Demand Manufacturing</h1>
					-->
					<!-- <p class="white-text" style="padding: 20px 0;">A one-stop-shop for all your manufacturing needs. We provide you with support to design your products and help you select the best option.</p>
					-->
					
				<ul class="list-inline white-text"  style="color: #fff;margin-bottom: 24px;font-size: 16px;">
					<li>Live Machine Sales</li><li>|</li><li>Live Machine Demo</li><li>|</li><li>Time Study</li><li>|</li><li>Software</li><li>|</li><li>Finance</li><li>|</li><li>Remote Services</li><li>|</li><li>Trade Services</li>
				
				</ul>
				</center>
<div class="container">	
	<div class="border_bot col-md-12 col-sm-12 col-xs-12" style="background-color: transparent;">
					<h2 class="white-text">I'm Looking for</h2>
          <form class="form-horizontal" name="contact" id="contact" method="post" action="" enctype="multipart/form-data">
              <div class="form-group">
			   <style>
			   .at option{
					background: transparent;
					color: #000;
				}


			   </style>
			   <div class="col-sm-3">
					<select name="condition" id="condition" style ="background-color:transparent;color:white;" class="form_bor_bot at">
						<option value="">Condition</option>
						<option value="new" <?php if($machinUsed==="new"){ echo "selected"; }?> >New</option>
						<option value="used" <?php if($machinUsed==="used"){ echo "selected"; }?> >Used</option>
					</select>
                </div>
					
			   <div class="col-sm-3">
					<select name="machine_type" id="Subject" class="at form_bor_bot" style ="background-color:transparent;color:white;">
						<option value="">Machine Type</option>
						<?php foreach($categoryList as $row){ ?>
						
						<option value="<?=$row['mc_id']?>" <?php if($catId==$row['mc_id']){ echo "selected"; }?>><?php echo $row['category_name']?></option>
						<?}?>
					</select>
                </div>
			    <div class="col-sm-3">
					<input type="submit" name="normalSearch" id="submit" class="btn input-form contact-submit btn_orange" value="Search" />
				</div>
              
          </form>
      </div>
      </div>
	  </div><div class="clearfix"></div>
		</div>
		<div class="clearfix"></div>
	</div>
</section>
<div class="clearfix"></div>

     <!--
 <div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-12 padd-0">  <ul>
        <li class="myprofile">Consultants</li>
      </ul> 
      <h2 class=""><?php if($categoryCount){ echo $categoryCount['category_name']."(".count($machineList).")"; } ?></h2>
    </div>
  </div>
</div>-->
<!-- 


<div class="container-fluid programmers-grey-bg">

  	<div class="container">
	    <div class="col-sm-12 padd-0">
	    	<div class="col-sm-2 col-md-2 col-xs-12 padd-0">
		     	<form>
		    	 	<div class="form-group advanced-marg">
		          		<label for="inputEmail3" class="col-sm-5 sort-by padd-0">Sort by:</label>
			          	<div class="col-sm-7 padd-0">
				            <select name="cars" class="form-control input-form "> 
								<?php if($language_list){
									foreach($language_list as $rowLanguage){?>
								<option value="<?php echo $rowLanguage['lid']?>"><?php echo $rowLanguage['name']?></option>
								<?php }}?>
				            </select>
			          	</div>
		        	</div>
		        </form>
		    </div>
	    	<div class="col-sm-4 col-md-3 col-xs-12">
		        <form class="search-padd" role="search" method="POST">
			        <div class="col-sm-12 input-group">
			            <input type="text" class="form-control input-form search-go" placeholder="Search" name="searchName">
			            <div class="input-group-btn">
			                <button class="btn btn-default search-go" type="submit" name="searchByName"><span>Go</span></button>
			            </div>
			        </div>
		        </form>
		    </div>
	     	<div class="col-sm-1 col-md-1 col-xs-12 padd-0"> 
	     		 <a style="padding: 5px 10px;" href="" class="btn btn_orange" data-toggle="modal" data-target="#machineadvsearchmodal"><span class="advanced-search">Advanced Search</span></a>
	     	</div>
			<form class="form-horizontal" name="compareMachines1" id="compareMachines1" method = "post" action ="<?=site_url()."machine/compare_machine/$catId/$machinUsed"?>">
				<div class="col-sm-5 col-md-6 col-xs-12 sortby-marg padd-0">
					<p class="pull-right">
					<input type="hidden" name ="compareMachine_ids1" id="compareMachine_ids1" value=""/>
					<a href = "" onclick="compareMachines.submit(); return false;" style="border-radius: 0px;    background-color: #a5c049 !important;  color: #FFF !important;padding: 5px 15px;    border: 1px solid #fff !important;"name ="btnSubmit" id="compare_count1" >Compare Models (0)</a> | <a href = "javascript:void(0)" id="removeItems"> Clear Selection </a> | <span class="one-ten-text"></span><?php echo count($machineList)?> Models</p>
				</div>
			</form>
	    </div>
 	</div>
--> 
</div>

<div class="container" style="    border: 1px solid #ccc;  padding: 18px; margin-top:24px;">
	<div class="col-sm-12 padd-0">
			<div class="col-sm-3 col-md-3 col-xs-12 padd-0">
		     	<form>
		    	 	<div class="form-group advanced-marg">
		          		<label for="inputEmail3" class="col-sm-12 sort-by padd-0">Showing <?php
						if($machineList){
							echo count($machineList);
						}else{
							echo "0";
						} 
						
						
						?></h2> <b><?php echo $categoryCount['category_name']; ?></b></label>
			        </div>
		        </form>
		    </div>
			<div class="col-sm-9 col-md-9 col-xs-12 ">
				<form class="form-horizontal" name="compareMachines" id="compareMachines" method = "post" action ="<?=site_url()."machine/compare_machine/$catId/$machinUsed"?>">
				<div class="col-sm-12 col-md-12 col-xs-12 sortby-marg padd-0 ">
				<span  class="pull-right" style="margin-top:8px">
					<input type="hidden" name ="compareMachine_ids" id="compareMachine_ids" value=""/>
					<a href = "" class = "btns" onclick="compareMachines.submit(); return false;" name ="btnSubmit" id="compare_count" style="border-radius: 0px;    background-color: #a5c049 !important;  color: #FFF !important;padding:10px 20px;    border: 1px solid #fff !important;">Compare Products</a> 
					<a  class = "btns"  style="border-radius: 0px;    background-color: #a5c049 !important;  color: #FFF !important;padding: 10px 20px;    border: 1px solid #fff !important;"   href = "javascript:void(0)" id="removeItems"> Clear </a> 
					</span>
				<!-- 
				
				<span class="one-ten-text"></span><?php echo count($machineList)?> Models</p>
				-->	
				</div>
			</form>
			</div>
	     	<!-- <div class="col-sm-1 col-md-1 col-xs-12 padd-0"> 
	     		 <a style="padding: 5px 10px;" href="" class="btn btn_orange" data-toggle="modal" data-target="#machineadvsearchmodal"><span class="advanced-search">Advanced Search</span></a>
	     	</div> -->
			
	</div>
</div>
<!-- 
<div class="container" style="   margin-top:26px; border: 1px solid #ccc;  padding: 18px;">
	<div class="border_bot col-md-12 col-sm-12 col-xs-12" >
		  <form class="form-horizontal" name="" id="" method="post" action="" enctype="multipart/form-data">
			<div class="col-sm-1 col-md-1 col-xs-1 padd-0" style="width: 3.333333%;">
		     	 	<div class="form-group advanced-marg">
		          		<label for="inputEmail3" class="col-sm-12 sort-by padd-0">Sort</label>
			        </div>
		    </div>
			
			<div class="col-sm-2 col-md-2 col-xs-1 padd-0">
					<select name="condition" id="condition"  class="form_bor_bot ">
						<option value=""><b>Price Low-High</b></option>
						<option value=""><b>Price High-Low</b></option>
						
					</select>
                </div>
				<div class="col-sm-1 col-md-1 col-xs-1" style="">	
		     	 	<div class="form-group advanced-marg" style="text-align: center;    padding-right: 0px;">
		          		<label for="inputEmail3" class="col-sm-12 sort-by">Search</label>
			        </div>
		    </div>

				<div class="col-sm-4">
                  <input type="searching" class="form_bor_bot" id="searching" name="searching" placeholder="Enter Keywords"><span class="compulsary">*</span>
                </div>
				<div class="col-sm-4">
					<div class="col-sm-5">
 <button class="btn btn-default search-go" type="submit" name="searchByName"><span>Search</span></button>					</div>
					<div class="col-sm-7">
					<a style="padding: 5px 10px;" href="" class="btn btn_orange" data-toggle="modal" data-target="#machineadvsearchmodal"><span class="advanced-search">Advanced Search</span></a>
					
					</div>				
				</span>
				</div>				
          </form>
      </div>
      </div>

-->
<div class="container" style="   margin-top:26px; border: 1px solid #ccc;  padding: 18px;">
	<div class="border_bot col-md-12 col-sm-12 col-xs-12" style="    margin-top: 3px;
    margin-bottom: -19px;
">
		  <form class="form-inline" name="" id="" method="post" action="" enctype="multipart/form-data">
		
			<div class="col-sm-3">
				<div class="form-group col-sm-3">
					<label for="sel1" style="font-weight: 100;margin-top:10px;">Sort</label>
					</div>
				<div class="form-group  col-sm-9">
					<select class="form-control" id="condition"name="condition">
						<option value=""><b>Price Low-High</b></option>
						<option value=""><b>Price High-Low</b></option>
						
					</select>
				</div>
			</div>
		<div class="col-sm-9">
			<div class="form-group col-sm-1">
					<label for="sel1" style="font-weight: 100;margin-top:10px;">Search</label>
			</div>
			<div class="form-group col-sm-7">
			  <input type="searching" class="form_bor_bot" id="searching" name="searching" placeholder="Enter Keywords">
			</div>
			<div class="form-group col-sm-4">
				<span class="pull-right" style=" margin-right: -28px;">
					<div class="form-group">
						<button class="btn btn-default search-go" type="submit" name="searchName"><span>Search</span></button>	
					</div>
					<div class="form-group">
						<a style="padding: 5px 10px;" href="" class="btn btn_orange" data-toggle="modal" data-target=	"#machineadvsearchmodal"><span class="advanced-search">Advanced Search</span></a>
					</div>
				</span>
			</div>
		</div>
		  
		</form>	
	</div>
</div>


</div>
<!-- /.container-fluid --><br/>
<div class="container-fliud">
	<div class="container">
  		<div class="col-sm-12 padd-0">
			<div class="row">
			<?php if($machineList){
				$counter=1;
				foreach($machineList as $rowMachine){ 
				?>
				<div class="col-sm-3 padd-8">
					<div class="bx-shadow" style="border:none;min-height: 472px;box-shadow: 0px 0px 10px #dfdcdc;">
						<?php if($rowMachine['machine_image']){
							?>
							
							<img src="<?=base_url().'uploads/machine/'.$rowMachine['machine_image']?>" class="img-responsive" width="100%" style="height: 220px;">
							<?
								}else{ ?>
								
						<img src="<?=base_url().'uploads/machine/20180814210347.JPG';?>" class="img-responsive" width="100%" style="height: 220px;">
								
								<?}
							?>
						<div class="machine_info">
							<center><p  style="padding: 0 15px;font-size: 18px;min-height:45px;margin:0;"><?php echo $rowMachine['modelName'];?></p><span  style="padding: 0 15px;"><?php echo $rowMachine['city_name'].", ".$rowMachine['state_name']?></span>
							<div class="gray_bg" style="padding: 5px 0;">
								<span style="padding: 0 15px;"><?php echo $rowMachine['price'];?> INR</span>
							</div></center>
							<span>
								<ul class="machine_det">
									<li>Capacity: <?php echo $rowMachine['capacity'];?></li>
									<li>Weight: <?php echo $rowMachine['weight'];?></li>
									<!-- <li>Type: Toggle</li>
									<li>Col straight bar 2012</li> -->
									<li>Manufacturing Year:<?php echo $rowMachine['year_production']?> </li>
								</ul>
							</span><div class="clearfix"></div>
							<div class="machine" style="padding: 10px 20px 0;">
								<span class="pull-left ">Compare <input type="checkbox" id="<?=$rowMachine['md_id']?>" class="compare checkbox-inline"> <button class="btn btn-xs btn-success clickComp hide "  onclick="clickBtn();">Compare</button></span>
								<span class="pull-right"><a href="<?php echo site_url()."machine/machine_details/".$rowMachine['md_id']."/".formaturl($categoryCount['category_name'])."/".formaturl($rowMachine['modelName']);?>">Details ></a></span>
							</div><div class="clearfix"></div>
						</div> 
					</div> 
				</div>
			<?php 	
				if($counter%4==0){
					?>
					<div class="clearfix"></div>
					<?
				}
				$counter++;
			}
				}else{
					?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						No Machine Data available for this search..!!
					</div>
			<?
				}
			?> 
			</div>
		</div>
	</div> 
	<div class="clearfix"></div>
</div>  
<div class="clearfix"></div>
<div class="container ">
  <div class=" recent-view">
	<div class=" col-md-12">
		<h3>Recently Viewed</h3>
	  	<ul class="cadcam2 " id="recentlyViewed">  
	  	
	  	</ul>       
	</div>
  </div>
</div>
<div class="clearfix"></div>
<div class="container" style="margin-top: 30px;">
  <div class="recent-view">
	<div class="col-md-12">
		<h3>Recommended</h3>
		<ul class="cadcam1  nbs-flexisel-ul" id="" style="left: -237px;"><li class="nbs-flexisel-item" style="width: 237px;">
	  								<a class="thumbnail" href="https://beta.teranex.io/machine/machine_details/263/bending/adsd-2323"><img alt="" src="https://beta.teranex.io/uploads/machine/20180420174038.jpg" style="min-height:100px;">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">5,000,000 <br>Bangar, Temburong<br>5,000,000 INR</span>
						  	</div>
						</a>
				     
	  	</li><li class="nbs-flexisel-item index adasd" style="width: 237px;">
	  								<a class="thumbnail" href="https://beta.teranex.io/machine/machine_details/263/bending/adsd-2323"><img alt="" src="https://beta.teranex.io/uploads/machine/20180420174038.jpg" style="min-height:100px;">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">5,000,000 <br>Bangar, Temburong<br>5,000,000 INR</span>
						  	</div>
						</a>
				     
	  	</li>  
	  	<li class="nbs-flexisel-item" style="width: 237px;">
	  								<a class="thumbnail" href="https://beta.teranex.io/machine/machine_details/263/bending/adsd-2323"><img alt="" src="https://beta.teranex.io/uploads/machine/20180420174038.jpg" style="min-height:100px;">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">5,000,000 <br>Bangar, Temburong<br>5,000,000 INR</span>
						  	</div>
						</a>
				     
	  	</li>
	  	</ul>
	<!--	<ul class="cadcam1 " id="">  
	  	<li>
	  		<?php if($recommendedMachineList){
					foreach($recommendedMachineList as $rowRecommended){?>
						<a class="thumbnail" href="<?php echo site_url()."machine/machine_details/".$rowMachine['md_id']."/".formaturl($categoryCount['category_name'])."/".formaturl($rowMachine['modelName']);?>"><img alt="" src="<?=base_url().'uploads/machine/'.$rowRecommended['machine_image']?>" style="min-height:100px;" >
						  	<div class="amit-text text-center">
								<span class="amit-das-text"><?php echo $rowRecommended['price'];?> <br/><?php echo $rowRecommended['city_name'].", ".$rowRecommended['state_name'];?><br/><?php echo $rowRecommended['price'];?> INR</span>
						  	</div>
						</a>
				<?php }}?>     
	  	</li>
	  	</ul>                       

	-->	
	</div>
  </div>
</div>
<div class="clearfix"></div>

<div id="machineadvsearchmodal" class="modal fade" role="dialog">
  	<div class="modal-dialog ">
	    <!-- Modal content-->
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal">&times;</button>
	        <center><h2 class="modal-title">Advance Search</h2></center>
	      </div>
	      <div class="modal-body">
	      	<div class="border_bot col-sm-offset-1 col-sm-10">
		        <form class="form-horizontal" name="#" id="machine_adv_search" method="post" action="">
					  <div class="form-group ">
						  <input type="text" style="border: 1px solid #ccc;" class="form_bor_bot" id="keywords" name="keywords" placeholder="Enter your Keywords..">
					  </div>
					  <div class="form-group">
							<select name="brandId" id="brandId" class="form_bor_bot">
								<option value="">Brand</option>
								<?php if($brandList){
									foreach($brandList as $rowBrand){?>
									<option value="<?php echo $rowBrand['mb_id']?>"><?php echo $rowBrand['brand_name']?></option>
								<?php }}?>
							</select>
					  </div>
					  <div class="form-group">
							<select name="brand_model" id="brand_model" class="form_bor_bot">
								<option value="">Model</option> 
							</select>
					  </div>
					  <div class="form-group"> 
							<select name="machine_type" id="machine_type" class="form_bor_bot">
								<option value="">Machine Type</option>
								<?php if($categoryList){
									foreach($categoryList as $rowMachine){?>
									<option value="<?php echo $rowMachine['mc_id'];?>"><?php echo ucwords($rowMachine['category_name']);?></option> 
								<?php }}?>
							</select>
					  </div>
					  <div class="form-group">
							<select name="condition" id="used" class="form_bor_bot"> 
								<option value="N">New</option>
								<option value="Y">Used</option>
							</select>
					  </div>
					  
					  <div class="form-group ">
						  <input type="text" style="border: 1px solid #ccc;margin-top:3px;" class="form_bor_bot" id="yom" name="yom" placeholder="Manufacturing Year">
					  </div>
					  <div class="form-group">
							<select name="price" id="price" class="form_bor_bot">
								<option value="">Price range</option> 
								<option value="0.5-1">50 Lack - 1 Cr</option>
								<option value="1-2">1 Cr - 2 Cr</option>
								<option value="2-3">2 Cr - 3 Cr</option>
								<option value="3-4">3 Cr - 4 Cr</option>
								<option value="4-5">4 Cr - 5 Cr</option>
								<option value="5-6">5 Cr - 6 Cr</option>
								<option value="6-7">6 Cr - 7 Cr</option>
								<option value="7-8">7 Cr - 8 Cr</option>
								<option value="8-10">8 Above </option>
							</select>
					  </div>
					  <div class="form-group">
							<select name="country_id" id="country_id" class="form_bor_bot">
								<option value="">Country</option>
								<?php if($countryList){
									foreach($countryList as $rowContry){?>
										<option value="<?=$rowContry['id']?>"  ><?=$rowContry['country_name']?></option>
								<?php }}?>
							</select>
					  </div> 
					  <div class="form-group">
					  
							<select name="state_id" id="state_id" class="form_bor_bot">
								<option value="">State</option> 
							</select>
					  </div> 
					  <div class="form-group">
							<select name="city_id" id="city_id" class="form_bor_bot">
								<option value="">City</option> 
							</select>
					  </div> 
					  <div class="form-group text-center">
						  <input type="submit" name="btnAdvanceSearch" id="submit1" class="btn btn_orange" value="Search" />
					  </div>
				</form>
			</div>
			<div class="clearfix"></div><br/>
	      </div>
	    </div>
  	</div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
 <script src="<?php echo theme_url()?>/js/jquery.cookie.js"></script>
 <script src="<?=$theme_url?>/js/location.js"></script> 
 <script  src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>
 <script>

 function clickBtn(){
	 $('#compare_count').click();
 }
var comapareMachine = [];
/* Remove Elements From Cookies */
$('#removeItems').click(function(){
	comapareMachine = [];	
	var comapareMachineString = ''
	$('#compareMachine_ids').val(comapareMachineString);
		
	$.removeCookie('comapareMachine', { path: '/teranex/' });
		var count = comapareMachine.length;
		$('#compare_count').text('Compare Products(0)');
		
		if($(this).attr('checked')){
			$('input:checkbox').attr('checked',true);
		}
		else{
			$('input:checkbox').attr('checked',false);
		}	
});
/* Push/Pop Element In array for cookies */
$('.compare').change(function () {
	var isChecked = $(this).is(":checked");
	if(isChecked){
		debugger;
		$(this).parent().find(".clickComp").removeClass("hide");
		comapareMachine.push($(this).attr('id'));
		var count = comapareMachine.length;
		if(count>=2){
		//	$(this).parent().find(".clickComp").removeClass("hide");
		}else{
			
		
		}
		if(count>3){
			alert('Cannot Compare More Than 3 Machine..!!');
			$(this).attr('checked',false);
			return;
		}
		$('#compare_count').text('Compare '+count+' Products');
		comapareMachineString	= comapareMachine.join(",");
		$('#compareMachine_ids').val(comapareMachineString);
		//var cookiesData = $.cookie('comapareMachine',comapareMachineString, { expires: 7, path: '/teranex/' });
	}else{
		$(this).parent().find(".clickComp").addClass("hide");
		var removeItem = $(this).attr('id');
		comapareMachine = jQuery.grep(comapareMachine, function(value) {
			return value != removeItem;
		});
		var count = comapareMachine.length;
		$('#compare_count').text('Compare Models('+count+')');
		
		comapareMachineString	= comapareMachine.join(",");
		$('#compareMachine_ids').val(comapareMachineString);
		
		//var cookiesData = $.cookie('comapareMachine',comapareMachineString, { expires: 7, path: '/teranex/' });
		}
	});

SaveDataToLocalStorage();	
function SaveDataToLocalStorage( )
{ 
 var machineIds=[];
    // Parse the serialized data back into an aray of objects
	  machineIds = JSON.parse(localStorage.getItem('sessionMachine')); 
	  var ajaxData = machineIds.filter(function(v){return v!==''});
	//var ajaxData=machineIds;
	if(machineIds.length>0){
		$.ajax({
			type: "POST",
			url: site_url+"/machine/api/getViewmachineList/",
			data: JSON.stringify(ajaxData) ,
			contentType: "application/json",
			dataType: "json",
			success: function(result){ 
				 
					if(result.result){ 		
						var machinList=result.result;
						$.each(machinList, function(key, value) { 
							var html= '<li><a class="thumbnail" href="'+site_url+'machine/machine_details/'+value.md_id+'/'+value.category_name+'"><img src="'+site_url+'uploads/machine/'+value.machine_image+'" alt="">  <div class="amit-text text-center"> <span class="amit-das-text">'+value.modelName+'<br/>'+value.city_name+', '+value.state_name+'<br/>'+value.price+'  INR</span></div>	</a></li>';
							$("#recentlyViewed").append(html); 
						});	
							$('.cadcam2').each(function(){
    			$(this).flexisel({
					visibleItems: 5,
					itemsToScroll: 1,         
					autoPlay: {
						enable: false,
						interval: 5000,
						pauseOnHover: true
					},

					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1,
							itemsToScroll: 1
						}, 
						landscape: { 
							changePoint:639,
							visibleItems: 2,
							itemsToScroll: 2
						},
						tablet: { 
							changePoint:769,
							visibleItems: 3,
							itemsToScroll: 3
						}
					}			
				});
			});
					}
				else if(result.error){
				
				} 
			}
		});
	
	} 
}
 </script>
 <script type="text/javascript">
 	$('body').on('mouseenter', 'li', function() {

		$(this).addClass('adasd');

 });
 
 
 
 			$(window).load(function() {
				
				$('.cadcam1').each(function(){
    			$(this).flexisel({
					visibleItems: 5,
					itemsToScroll: 1,         
					autoPlay: {
						enable: false,
						interval: 5000,
						pauseOnHover: true
					},

					responsiveBreakpoints: { 
						portrait: { 
							changePoint:480,
							visibleItems: 1,
							itemsToScroll: 1
						}, 
						landscape: { 
							changePoint:639,
							visibleItems: 2,
							itemsToScroll: 2
						},
						tablet: { 
							changePoint:769,
							visibleItems: 3,
							itemsToScroll: 3
						}
					}				
				});
			});
			}); 
// ajax request for brand model
$('#brandId').on('change', function() {
	var brandId = $("#brandId").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/machine/api/machineBrandModelList/"+brandId,
		  data: {},
			success: function(result){ 
				$('#brand_model').empty();
				 if(result){ 					
						var state_list=result.result.result; 
						$('#brand_model')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select Model'));	
						$.each(state_list, function(key, value) { 
							$('#brand_model')
							.append($("<option></option>")
							.attr("value",value.md_id)
							.text(value.model_name));
						});		
					}
				else if(result.error){
				(".removeClass").remove();
				} 
			}
			
		});
});		
 </script>
<?php echo $this->template->contentEnd();?> 