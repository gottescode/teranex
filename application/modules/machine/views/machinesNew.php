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

<section class="banner banner_image machine-listing_banner align-items-center ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>I'm Looking For A</p>
                    <div class="selct-box ">
                        <form class="form-horizontal get_start" name="contact" id="contact" method="post" action="" enctype="multipart/form-data">
                            <div class="arrow">
                                <select name="condition" id="condition" class="dropdow" >
                                    <option value="">Condition</option>
                                    <option value="new" <?php if($machinUsed==="new"){ echo "selected"; }?> >New</option>
                                    <option value="used" <?php if($machinUsed==="used"){ echo "selected"; }?> >Used</option>
                                </select>
                            </div>
                            <div class="arrow">
                                <select name="machine_type" id="subject" class="dropdow" >
                                    <option value="">Machine Type</option>
                                    <?php foreach($categoryList as $row){ ?>

                                        <option value="<?=$row['mc_id']?>" <?php if($catId==$row['mc_id']){ echo "selected"; }?>><?php echo $row['category_name']?></option>
                                    <?}?>
                                </select>
                            </div>
                            <input type="hidden" name="normalSearch"value="Search" />

                            <!-- <div class="col-sm-3">
                                 <input type="submit" name="normalSearch" id="submit" class="btn input-form contact-submit btn_orange" value="Search" />
                             </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<div class="clearfix"></div>


</div>


<section class="sticky-top">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sort-catg  bx-shdw padd_all_50 compare_pair white ">
                    <div class="pagin-sort">
                        <span>Showing  <?php if($machineList){echo count($machineList); }else{echo "0";} ?> <b><b class="font_bold"> </b> <?php echo $categoryCount['category_name']; ?></span>
                    </div>
                    <form class="form-horizontal" name="compareMachines" id="compareMachines" method = "post" action ="<?=site_url()."machine/compare_machine/$catId/$machinUsed"?>">
                        <div class="pair">
                            <input type="hidden" name ="compareMachine_ids" id="compareMachine_ids" value=""/>
                            <a href="javascript:void(0)" class="a-green-btn mar-lt-rt" onclick="compareMachines.submit(); return false;" name ="btnSubmit" id="compare_count">Compare Products</a>
                            <a href="javascript:void(0)" id="removeItems" class="a-green-btn">Clear</a>

                           <!--<button class="green-btn" href = "javascript:void(0)" id="removeItems">Clear</button>-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>



<section class=" macine_list">
    <div class="container">
        <div class="row">
            <div class="col-12">

                <div class="sort-catg mrgn-top bx-shdw padd_all_50 white">
                    <div class="sort-text">
                        <form class="form-inline" name="searchinglist" id="searchinglist" method="post" action="" enctype="multipart/form-data">

                            <div class="languge-sel">
                                <p>Sort</p>
                                <div class="dropdown padd-left">
                                    <button type="button" class="btn dropdown-toggle" name="condition" data-toggle="dropdown">
                                        Price Low ro High
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="#">High</a>
                                        <a class="dropdown-item" href="#">Low</a>

                                    </div>
                                </div>
                            </div>
                            <div class="search_sec">
                                <div class="parnt_serch  languge-sel parnt_serch_respn">
                                    <p class="">Search</p>
                                    <div class="serchbar mar-lt-rt bx-shdw">
                                        <input type="searching" placeholder="Enter your kewords..." id="searching" name="searching">
                                        <input type="hidden" name="searchName" />
                                        <i class="fa fa-search" id="mchlist" ></i>
                                    </div>

                                    <div class="">
                                        <a href="#" class="a-green-btn" data-toggle="modal" data-target="#machineadvsearchmodal">Advanced</a>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="machine-detils">
    <div class="container">
        <div class="row">
            <?php if($machineList){
            $counter=1;
            foreach($machineList as $rowMachine){
            ?>
                <div class="col-md-4">
                    <div class="details bx-shdw white">
                        <div class="d_img">
                            <?php if($rowMachine['machine_image']){
							?>
                                    <img src="<?=base_url().'uploads/machine/'.$rowMachine['machine_image']?>" alt="img">
                            <?
								}else{ ?>

                                 <img src="<?=base_url().'uploads/machine/20180814210347.JPG';?>" alt="img">
                                 <?}
                            ?>
                        </div>
                        <div class="d_dtls padd_all_50">
                            <h3 class="basic-head"><?php echo $rowMachine['modelName'];?></h3>
                            <p><?php echo $rowMachine['city_name'].", ".$rowMachine['state_name']?></p>
                            <h4 class=" hig-for mar-25 basic-head"><?php echo $rowMachine['price'];?> INR</h4>
                            <ul class="macine-listing">
                                <li><b>Capacity:</b><?php echo $rowMachine['capacity'];?></li>
                                <li><b>Weight:</b><?php echo $rowMachine['weight'];?></li>
                                <li><b>Manufacturing:</b><?php echo $rowMachine['year_production']?></li>
                            </ul>
                            <div class="mrgn-top compar-icon">
                                <label>
                                    <input type="checkbox" id="<?=$rowMachine['md_id']?>" class="mycheckbox compare checkbox-inline" name="cc"  />
                                    <span></span>

                                </label>
                                <p class="clickComp" onclick="clickBtn();"> Compare</p>
                                <a href="<?php echo site_url()."machine/machine_details/".$rowMachine['md_id']."/".formaturl($categoryCount['category_name'])."/".formaturl($rowMachine['modelName']);?>" class="a-green-btn">View Details</a>
                            </div>
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
</section>


<section class="macine-page">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="padd_tb_50">
                    <h3 class="basic-head">Recently Viewed</h3>
                </div>
            </div>
        </div>
        <div class="padd_all_50 bx-shdw white">
            <div id="owl-three" class="owl-carousel owl-theme ">
                <div class="item ">
                    <div class="bx-shdw profile_one text-center">
                        <img src="<?php echo $theme_url?>/images/machine_img.jpg" alt="">
                        <div class="enginr scrol-inner">
                            <h4 class="basic-head">TRUMPF V 230</h4>
                            <p>Pune,Maharashtra</p>
                            <h4 class="basic-head pub">$123,456,78</h4>
                            <button type="submit" class="green-btn"> View Profile</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<!-- advance  search -->
<div class="advnce_serch_modal">
    <div class="modal fade" id="machineadvsearchmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content padd_all_50">
                <div class="modal-header">
                    <h5 class="modal-title basic-head" id="exampleModalLabel">Advance Search</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" name="#" id="machine_adv_search" method="post" action="">
                        <div class="parnt_serch">
                        <div class="serchbar bx-shdw">
                            <input type="text" placeholder="Enter Your Keywords..">
                        </div>

                        <div class="machine-klite">
                            <div class="selct-box get_start">
                                <div class="arrow">
                                    <select name="brandId" id="brandId"  class="dropdow" >
                                        <option value="">Brand</option>
                                        <?php if($brandList){
                                        foreach($brandList as $rowBrand){?>
                                        <option value="<?php echo $rowBrand['mb_id']?>"><?php echo $rowBrand['brand_name']?></option>
                                        <?php }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="selct-box get_start">
                                <div class="arrow">
                                    <select ame="brand_model" id="brand_model" class="dropdow" >
                                        <option value="">Model</option>
                                    </select>
                                </div>
                            </div>
                            <div class="selct-box get_start">
                                <div class="arrow">
                                    <select name="machine_type" id="machine_type" class="dropdow" >
                                        <option value="">Machine Type</option>
                                        <?php if($categoryList){
                                            foreach($categoryList as $rowMachine){?>
                                                    <option value="<?php echo $rowMachine['mc_id'];?>"><?php echo ucwords($rowMachine['category_name']);?></option>
                                            <?php }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="selct-box get_start">
                                <div class="arrow">
                                    <select name="condition" id="used" class="dropdow" >
                                        <option value="N">New</option>
                                        <option value="Y">Used</option>
                                    </select>
                                </div>
                            </div>
                            <div class="serchbar bx-shdw">
                                <input type="text" placeholder="Manufacturing Year" id="yom" name="yom">
                            </div>
                            <div class="selct-box get_start">
                                <div class="arrow">
                                    <select name="price" id="price" class="dropdow" >
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
                            </div>
                            <div class="selct-box get_start">
                                <div class="arrow">
                                    <select name="country_id" id="country_id" class="dropdow" >
                                        <option value="">Country</option>
                                        <?php if($countryList){
                                            foreach($countryList as $rowContry){?>
                                                <option value="<?=$rowContry['id']?>"  ><?=$rowContry['country_name']?></option>
                                            <?php }}?>
                                    </select>
                                </div>
                            </div>
                            <div class="state">
                                <div class="selct-box get_start">
                                    <div class="arrow">
                                        <select name="state_id" id="state_id" class="dropdow">
                                            <option value="">State</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="selct-box get_start">
                                    <div class="arrow">
                                        <select name="city_id" id="city_id" class="dropdow" >
                                            <option value="">City</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" name="btnAdvanceSearch" id="submit1" value="Search" class="green-btn">Search</button>
                            </div>
                        </div>
                    </div>
                    </form>

                    <div class="modal-down">

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- advance  search -->

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
		//debugger;
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

 $('#condition,#subject').on('change',function(){
     $('#contact').submit();

 });

 $('#mchlist').click(function () {
     $('#searchinglist').submit();
 });

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