<div class="container-fluid myprofile-bg dahboard-bg">
  <div class="container">
    <div class="col-sm-offset-1 col-sm-10">
     <!--  <ul>
        <li class="myprofile">Consultants</li>
      </ul> -->
      <h2 class="margin-0"><?php echo $categoryCount['category_name']."(".$categoryCount['machineCount'].")"?></h2>
    </div>
  </div>
  <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->

<div class="container-fluid programmers-grey-bg">
  	<div class="container">
	    <div class="col-sm-offset-1 col-sm-10">
	    	<div class="col-sm-2 col-md-2 padd-0">
		     	<form>
		    	 	<div class="form-group advanced-marg">
		          		<label for="inputEmail3" class="col-sm-4 sort-by padd-0">Sort by:</label>
			          	<div class="col-sm-8 padd-0">
				            <select name="cars" class="form-control input-form ">
				              <option value="volvo">Model</option>
				              <option value="saab">Saab</option>
				              <option value="fiat">Fiat</option>
				              <option value="audi">Audi</option>
				            </select>
			          	</div>
		        	</div>
		        </form>
		    </div>
	    	<div class="col-sm-3 col-md-3">
		        <form class="search-padd" role="search">
			        <div class="col-sm-12 input-group">
			            <input type="text" class="form-control input-form search-go" placeholder="Search" name="q">
			            <div class="input-group-btn">
			                <button class="btn btn-default search-go" type="submit"><span>Go</span></button>
			            </div>
			        </div>
		        </form>
		    </div>
		    <div class="col-sm-2 col-md-2">
		    	 
		    </div>
	     	<div class="col-sm-1 col-md-1"> 
	     		 <a href="" class="btn btn_orange" data-toggle="modal" data-target="#machineadvsearchmodal"><span class="advanced-search">Advanced Search</span></a>
	     	</div>
		    <div class="col-sm-4 col-md-4 sortby-marg padd-0">
		    	<p class="pull-right"><a href="<?php echo site_url()."machine/compare_machine";?>" id = 'compare_count'>Compare Models (0) </a> |<a href = "javascript:void(0)" id="removeItems"> Clear Selection</p>
		     	<p class="pull-right"><span class="one-ten-text">1 - 50</span> of 106 Models</p>
		    </div>
	    </div>
 	</div>
  <!-- /.container --> 
</div>
<!-- /.container-fluid --><br/>
<div class="container-fliud">
	<div class="container">
  		<div class="col-sm-offset-1 col-sm-10 padd-0">
			<div class="">
			<?php if($machineList){
				foreach($machineList as $rowMachine){?>
				<div class="col-sm-4">
					<div class="amit-border" style="min-height: 375px;">
						<img src="<?=base_url().'uploads/machine/'.$rowMachine['machine_image']?>" height="80px" width="100px">
						<div class="amit-text">
							<span class="amit-das-text"><?php echo $rowMachine['model_no'];?>  <br/><?php echo $rowMachine['city_name'].", ".$rowMachine['state_name']?></span>
							<span class="gray_bg"><?php echo $rowMachine['price'];?> INR</span>
							<span><ul class="machine_det">
								<li>Capacity: <?php echo $rowMachine['capacity'];?></li>
								<li>Shot weight: <?php echo $rowMachine['weight'];?></li>
								<li>Type: Toggle</li>
								<li>Col straight bar 2012</li>
							</ul></span><div class="clearfix"></div>
							<div class="machine" style="padding: 10px 20px 0;">
								<span class="pull-left">Compare <input type="checkbox" id="<?=$rowMachine['md_id']?>" class="compare checkbox-inline"></span>
								<span class="pull-right"><a href="<?php echo site_url()."machine/machine_details/".$rowMachine['md_id']."/".formaturl($categoryCount['category_name'])."/".formaturl($rowMachine['model_no']);?>">Details ></a></span>
							</div>
						</div>
					</div>
				</div> 
			<?php }}?> 
			</div>
		</div>
		<!--
		<nav aria-label="...">
		  <ul class="prog-pagi pagination pagination-sm">
			<li class="page-item">
			  <a class="page-link" href="#" tabindex="-1">Result Pages </a>
			</li>
			<li class="page-item"><a class="page-link" href="#">1,</a></li>
			<li class="page-item"><a class="page-link" href="#">2,</a></li>
			<li class="page-item"><a class="page-link" href="#">3,</a></li>
			<li class="page-item"><a class="page-link" href="#">4,</a></li>
			<li class="page-item"><a class="page-link" href="#">5,</a></li>
			<li class="page-item">
			  <a class="page-link" href="#">...Next >></a>
			</li>
		  </ul>
		</nav> -->
	</div> 
	<div class="clearfix"></div>
</div>  
<div class="clearfix"></div><br/>
<div class="container-fliud recent-view">
  <div class="container">
	<div class="col-sm-offset-1 col-md-10">
		<h3>Recently Viewed</h3>
	  	<div class="carousel slide media-carousel" id="media">
			<div class="carousel-inner ">
			  <div class="item  active">
				<div class="row">
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>   
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>             
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>           
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>             
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>                    
				 </div>
			  </div>
			  <div class="item">
				<div class="row">
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>           
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>           
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>          
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>   
				</div>
			  </div>
			  <div class="item">
				<div class="row">
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>             
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>               
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>           
				</div>
			  </div>
			</div>
			<a data-slide="prev" href="#media" class="left carousel-control">‹</a>
			<a data-slide="next" href="#media" class="right carousel-control">›</a>
	  	</div>                          
	</div>
  </div>
</div>
<div class="clearfix"></div><br/>

<div class="container-fliud recent-view">
  <div class="container">
	<div class="col-sm-offset-1 col-md-10">
		<h3>Recommended</h3>
	  	<div class="carousel slide media-carousel" id="media1">
			<div class="carousel-inner ">
			  <div class="item  active">
				<div class="row">
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>   
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>             
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>           
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>             
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>                    
				 </div>
			  </div>
			  <div class="item">
				<div class="row">
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>           
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>            
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>           
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>          
				  	<div class="col-md-2">
						<a class="thumbnail" href="#"><img alt="" src="<?=theme_url().'/images/punching-img1.jpg'?>">
						  	<div class="amit-text text-center">
								<span class="amit-das-text">MEP MTM400 <br/>Bangalore, India<br/>5,555,190 INR</span>
						  	</div>
						</a>
				  	</div>   
				</div>
			  </div>
			</div>
			<a data-slide="prev" href="#media1" class="left carousel-control">‹</a>
			<a data-slide="next" href="#media1" class="right carousel-control">›</a>
	  	</div>                          
	</div>
  </div>
</div>
<div class="clearfix"></div><br/>

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
							<select name="brand" id="brand" class="form_bor_bot">
								<option value="">Brand</option>
								<option value="A">A</option>
								<option value="B">B</option>
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
					  <div class="form-group">
							<select name="model" id="model" class="form_bor_bot">
								<option value="">Model</option>
								<option value="A">A</option>
								<option value="B">B</option>
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
							<select name="location" id="country_id" class="form_bor_bot">
								<option value="">Country</option>
								<?php if($countryList){
									foreach($countryList as $rowContry){?>
										<option value="<?=$rowContry['id']?>"  ><?=$rowContry['country_name']?></option>
								<?php }}?>
							</select>
					  </div> 
					  <div class="form-group">
							<select name="location" id="state_id" class="form_bor_bot">
								<option value="">State</option> 
							</select>
					  </div> 
					  <div class="form-group">
							<select name="location" id="city_id" class="form_bor_bot">
								<option value="">City</option> 
							</select>
					  </div> 
					  <div class="form-group">
						  <input type="submit" name="btnSearch" id="submit" class="btn input-form adv-search form-control" value="Search" />
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
 <script>
var comapareMachine = [];
/* Remove Elements From Cookies */
$('#removeItems').click(function(){
	comapareMachine = [];	
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
		comapareMachine.push($(this).attr('id'));
		var count = comapareMachine.length;
		if(count>3){
			alert('Cannot Compare More Than 4 Machine..!!');
			$(this).attr('checked',false);
			return;
		}
		$('#compare_count').text('Compare Models('+count+')');
		comapareMachineString	= comapareMachine.join(",");
		var cookiesData = $.cookie('comapareMachine',comapareMachineString, { expires: 7, path: '/teranex/' });
	}else{
		var removeItem = $(this).attr('id');
		comapareMachine = jQuery.grep(comapareMachine, function(value) {
			return value != removeItem;
		});
		var count = comapareMachine.length;
		$('#compare_count').text('Compare Models('+count+')');
		comapareMachineString	= comapareMachine.join(",");
		var cookiesData = $.cookie('comapareMachine',comapareMachineString, { expires: 7, path: '/teranex/' });
		}
	});
 </script>
<?php echo $this->template->contentEnd();	?> 