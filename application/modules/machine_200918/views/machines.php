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
<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-12 padd-0">
     <!--  <ul>
        <li class="myprofile">Consultants</li>
      </ul> -->
     <h2 class=""><?php if($categoryCount){ echo $categoryCount['category_name']."(".count($machineList).")"; } ?></h2>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

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
			<form class="form-horizontal" name="compareMachines" id="compareMachines" method = "post" action ="<?=site_url()."machine/compare_machine/$catId/$machinUsed"?>">
				<div class="col-sm-5 col-md-6 col-xs-12 sortby-marg padd-0">
					<p class="pull-right">
					<input type="hidden" name ="compareMachine_ids" id="compareMachine_ids" value=""/>
					<a href = "" onclick="compareMachines.submit(); return false;" name ="btnSubmit" id="compare_count" >Compare Models (0)</a> | <a href = "javascript:void(0)" id="removeItems"> Clear Selection </a> | <span class="one-ten-text">1 - 50</span> of 106 Models</p>
				</div>
			</form>
	    </div>
 	</div>
  <!-- /.container --> 
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
						<img src="<?=base_url().'uploads/machine/'.$rowMachine['machine_image']?>" width="100%" style="height: 220px;">
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
		<ul class="cadcam1 " id="">  
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
	</div>
  </div>
</div>
<div class="clearfix"></div>

<div id="machineadvsearchmodal" class="modal fade" role="dialog">
  	<div class="modal-dialog modal-sm">
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
						  <input type="text" class="form_bor_bot" id="keywords" name="keywords" placeholder="Keywords">
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
							<select name="used" id="used" class="form_bor_bot"> 
								<option value="N">New</option>
								<option value="Y">Used</option>
							</select>
					  </div>
					  
					  <div class="form-group ">
						  <input type="text" class="form_bor_bot" id="yom" name="yom" placeholder="Year of Manufacture">
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
						  <input type="submit" name="btnSearch" id="submit" class="btn btn_orange" value="Search" />
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
		$('#compare_count').text('Compare Models(0)');
		
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
		$('#compare_count').text('Compare Models('+count+')');
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