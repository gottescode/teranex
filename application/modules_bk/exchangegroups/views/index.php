<?php $this->template->contentBegin(POS_TOP);?>
<style>
.mar-tb-20 {
    margin-top: 20px;
    margin-bottom: 20px;
}
video {
    display: inline-block;
    vertical-align: baseline;
    object-fit: unset;
    width: 396px;
    }
.fg_span {
    margin-bottom: 30px;
    float: left;
    width: 100%;
}
h3.vconf {
    margin-bottom: 30px;
    margin-top: -2px;
}
.videobtn{
    margin-top:57px;
    width:100%;
    float:left;
}
.videosize {
    margin-top: 5px;
    height: 243px;
}
</style>
<?php $this->template->contentEnd();  ?> 
<div class="" style="margin-top: 80px;">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/exchangegroup1-min.jpg" alt=" ">
</div>
<div class=" sq-tiles ">
  <div class="col-sm-12 padd-0 ">
    <div class="container">
	 <?php 	// display messages

			if(hasFlash("dataMsgSuccess"))	{	?>
<br/>
			<div class="alert alert-success alert-dismissible" role="alert">

			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			  <?php echo getFlash("dataMsgSuccess"); ?>

			</div>

			<?php }	?>
			<?php 	// display messages

			if(hasFlash("dataMsgError"))	{	?>

			<div class="alert alert-warning alert-dismissible" role="alert">

			  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>

			  <?php echo getFlash("dataMsgError"); ?>

			</div>

			<?php }	?>
        <center> <h2>Exchange Groups</h2>
        <p>content not available</p></center>
        <div class="col-sm-12 padd-0">
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <div class="dad">
                    <div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/exchangegroup2-min.jpeg');"></div>
                    <div class="son-text">
                      <h3>Request</h3>
                      <p>content not available</p>
                    <a href="" data-toggle="modal" data-target="#newModal">ASK</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <div class="dad">
                    <div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/exchangegroup3-min.jpg');"></div>
                    <div class="son-text">
                      <h3>Offer</h3>
                      <p>content not available</p>
                      <!-- <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> View More >></a> -->
                    </div>
                </div>
            </div>
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <div class="dad">
                    <div class="son-1" style="background-image: url('<?php echo $theme_url?>/images/exchangegroup4-min.jpg');"></div>
                    <div class="son-text">
                      <h3>New</h3>
                      <p>content not available</p>
                      <!-- <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> View More >></a> -->
                    </div>
                </div>
            </div>
        </div>
    </div><div class="clearfix"></div>
  </div>
</div><!--.// sq-tiles -->
<div class="clearfix"></div><br/>

<div class="container-fluid">
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-flex padd-0">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12  pading_left_0 ">
        <h2>Recent Post Available</h2>
      </div>
    </div>
    <ul class="cadcam">
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li> 
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li>   
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li>
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li>
    </ul>
  </div>
</div>
<div class="clearfix"></div><br/>
<div class="container-fluid">
  <div class="container">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 row-flex padd-0">
      <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12  pading_left_0 ">
        <h2>Recent Post Requested</h2>
      </div>
    </div>
    <ul class="cadcam1">
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li> 
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li>   
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li>
        <li id="" >
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 padd-lr-5 ">
                <a class="" href="" >
                  <div class="anti_shadow ">
                    <div class="courses-section ">
                      <img class="img-responsive"  src="<?php echo $theme_url?>/images/fabrication_home-min.jpg" alt="">
                      <div class="abt_course">
                        <span class="pull-left full-width">
                          <h4><strong>Name</strong></h4>
                          <p>Location</p>
                          <p class="course_trainer">small description</p>
                        </span>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
        </li>
    </ul>
  </div>
</div>
<div class="clearfix"></div><br/>
<div style="background: #f9f9f9;">
	<div class="container">
		<div class="col-sm-12 padd-8">
			<div class="full-width pull-left mar-tb-20" id="">
				<div class="pull-left full-width">
						<center><h2 style="margin-top: 0;">Chat with Us </h2></center>
					<div class="col-sm-offset-2 col-sm-4 padd-0">
						<form role="form" action="" id="videoconference" method="post" enctype="multipart/form-data">
							<h3 class="vconf">What would you like to do?</h3>
							<div class="form-group">
								<span class="fg_span"><input type="radio" value="T" name="video_chat" checked> Text chat with a Stelmac Consultant</span><br/>
								<span class="fg_span"><input type="radio" value="V" name="video_chat"> Video chat with a Stelmac Consultant</span><br/>
								<!--<span class="fg_span"><input type="radio" value="B" name="video_chat"> Video chat with a Stelmac Programmer</span><br/>-->
							</div>
							<div class="videobtn">
								<?php
								if($user_id==''){ ?>
								<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-left" value="Submit"/>
								<?php }else{?>
								<input type="submit" name="btnMachineVideo" class="btn btn_orange pull-left" value="Submit"/>
								<?php }?>
							</div>
						</form>
					</div>
					<div class="col-sm-4 padd-0">
						<div class="T chatbox" style="margin-top: 8px;">
							<form role="form" action="" id="contactEnquiry" method="post" enctype="multipart/form-data">
							<!-- <?php
								if($user_id==''){ echo "<h3 style='margin-top: 23px; float:right;'>Please login before submit request. <a class='orng_clr' href='#'  data-toggle='modal' data-target='#signinModal'>Click Here</a></h3> ";}?> -->
								<div class="form-group">
								   <textarea class="form-control required" name="message" id="message" placeholder="Write here.." rows="9"> </textarea>
								</div>
								<div>
								<?php
									if($user_id==''){ ?>
									<input type="button"  data-toggle="modal" data-target="#signinModal" class="btn btn_orange pull-right" value="Send"/>
									<?php }else{?>
									<input type="submit" name="btnContactEnquiry" class="btn btn_orange pull-right" value="Send"/>
									<?php }?>
								</div>
							</form>
						</div>
						<div class="V chatbox" style="display: none;">
							<video controls class="pull-right videosize" >
							  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
							  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
							  	Your browser does not support the video tag.
							</video>
						</div>
						<div class="B chatbox" style="display: none;">
							<video controls class="pull-right videosize" >
							  	<source src="<?php echo $theme_url?>/images/sample-video.mp4" type="video/mp4">
							  	<source src="<?php echo $theme_url?>/images/sample-video.ogg" type="video/ogg">
							  	Your browser does not support the video tag.
							</video>
						</div>
					</div>
				</div>
			</div>
		</div><div class="clearfix"></div>
	</div>
</div>
<div class="clearfix"></div><br/>

<div id="newModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">×</button>
        <center><h4 class="modal-title">Details for request</h4></center>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot padd-0">
          <form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
			<fieldset>
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="category_id">Category:<span class="star">*</span></label>
					<div class="col-sm-8">
						<select name="category" id="category" class="form_bor_bot"  required="">
							<option value="">Select Category</option>
							<option value="Material">Material</option>
							<option value="Spares">Spares</option>
							<option value="Toolings">Toolings</option>
						</select>
						
					</div>
			  	</div> 
			   
				<div class="form-group">
					<label class="control-label col-sm-3" for="description"> Description:</label>
					<div class="col-sm-8">
					<textarea   name="description" id="description" class="form-control " ><?=$machine_data['description']?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_country"> Country: </label>
					<div class="col-sm-8">
					<select name="contry_id" id="country_id" onchange="myFunctionState()" class="form_bor_bot">
								<option value="">Select Country</option>
								<?php if($countryList){
									foreach($countryList as $rowCountry){?>
									<option value="<?=$rowCountry['id']?>" ><?=$rowCountry['country_name']?></option>
								<?php }}?>
							</select>	
					</div>
				</div>
				<div class="form-group"><label class="control-label col-sm-3" for="cust_branch_country"> State : </label>
					<div class="col-sm-8">
					<select name="state_id" id="state_id" onchange="myFunctionCity()" class="form_bor_bot">
							<option value="">Select State</option>
							 <?php if($stateList){
								foreach($stateList as $rowState){?>
								<option value="<?=$rowState['sid']?>" <?php if($rowState['sid']==$machine_data['machine_location_state']){ echo "selected";}?> ><?=$rowState['state_name']?></option>
							<?php }}?>
						</select>		
				</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="machine_location_city">   City : </label>
					<div class="col-sm-8">
					<select name="city_id" id="city_id" class="form_bor_bot">
						<option value="">Select City</option> 
							 <?php if($cityList){
									foreach($cityList as $rowCity){?>
									<option value="<?=$rowCity['id']?>" <?php if($rowCity['id']==$machine_data['machine_location_city']){ echo "selected";}?> ><?=$rowCity['city_name']?></option>
								<?php }}?>
					</select>	
					</div>
				 </div>
					 
				<div class="form-group">
					<label class="control-label col-sm-3" for="timeline">Timeline:</label>
					<div class="col-sm-8">
					<textarea   name="timeline" id="timeline" class="form-control " ><?=$machine_data['timeline']?></textarea>
					</div>
				</div> 
		
			  <div class="form-group"> 
				<div class="text-center">
				 <input type="submit" name="Submit" value="Submit" class="btn btn_orange"> 
					</div>
			  </div> 
			</fieldset>
		</form>
			
</div>
		  <div class="clearfix"></div>
		
			<div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?php echo $theme_url;?>/js/jquery.flexisel.js"></script>
<script type="text/javascript">

function myFunctionState() {
    //var x = document.getElementById("brandId").value;
 //  alert(country_id);
	var country_id = $("#country_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getStateList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#state_id').empty();
				 if(result){ 					
						var state_list=result.result; 
						$('#state_id')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select State'));	
						$.each(state_list, function(key, value) { 
							$('#state_id')
							.append($("<option></option>")
							.attr("value",value.sid)
							.text(value.state_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});

}

function myFunctionCity()
{

	var country_id = $("#state_id").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/location/api/getCityList/"+country_id,
		  data: {},
			success: function(result){ 
				$('#city_id').empty();
				 if(result){ 					
						var city_list= result.result;  
						$.each(city_list, function(key, value) { 
							$('#city_id')
							.append($("<option></option>")
							.attr("value",value.id)
							.text(value.city_name));
						});		
					}
				else if(result.error){
				
				} 
			}
		});

}




  $(window).load(function() {
        $('.cadcam').each(function(){
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

$(document).ready(function(){
    $('input[type="radio"]').click(function(){
        var inputValue = $(this).attr("value");
        var targetBox = $("." + inputValue);
        $(".chatbox").not(targetBox).hide();
        $(targetBox).show();
    });
});
jQuery('.numbersOnly').keyup(function () { 
this.value = this.value.replace(/[^0-9\.]/g,'');
});
$(".decimal").keyup(function() {
    var $this = $(this);
    $this.val($this.val().replace(/[^\d.]/g, ''));        
});

</script>
<?php $this->template->contentEnd();  ?> 
