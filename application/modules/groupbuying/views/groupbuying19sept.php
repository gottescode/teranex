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
    <img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/indexbckg.jpg" alt=" ">
</div>
<div class=" sq-tiles ">
  <div class="col-sm-12 padd-0 ">
    <div class="container">
        <center> <h2>collective buying</h2>
        <p>At TERANEX, we provide live online consulting for business development etc.</p></center>
        <div class="col-sm-12 padd-0">
          <?php foreach($groupbuying_list as $groupbuyings) { ?>
             <?php if($this->session->userdata('uid')==''){ ?>
            <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
              <!-- <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> -->
                <div class="dad">
                    <div class="son-1" style="background-image: url('<?php echo base_url()."uploads/groupbuying/".$groupbuyings['groupbuying_cat_image']?>');"></div>
                    <div class="son-text">
                      <h3><?php echo $groupbuyings['groupbuying_cat_name']; ?> </h3>
                      <p><?php echo $groupbuyings['groupbuying_cat_description']; ?> </p>
                      <a href="#"  data-toggle="modal" data-target="#signinModal" type="submit"> View More >></a>
                    </div>
                </div>
              <!-- </a> -->
            </div>
               <?php } else {?>
              <div class="col-sm-4 padd-8 pading_left_0" style="padding-right: 10px;">
                <!-- <a href="" data-toggle="modal" data-target="#groupbuyingmodal"> -->
                  <div class=" dad">
                    <div class="son-1" style="background-image: url('<?php echo base_url()."uploads/groupbuying/".$groupbuyings['groupbuying_cat_image']?>');"></div>
                    <div class="son-text">
                      <h3><?php echo $groupbuyings['groupbuying_cat_name']; ?> </h3>
                      <p><?php echo $groupbuyings['groupbuying_cat_description']; ?> </p>
                      <a href="" data-toggle="modal" data-target="#groupbuyingmodal"> View More >></a>
                    </div>
                </div>
               <!-- </a>     -->
             </div>
                <?php }?>
         <?php } ?> 
    </div>
    </div>
  <div class="clearfix"></div>
  <div class="clearfix"></div>
</div><!--.// sq-tiles -->
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
								<span class="fg_span"><input type="radio" value="T" name="video_chat" checked> Text chat with a Teranex Consultant</span><br/>
								<span class="fg_span"><input type="radio" value="V" name="video_chat"> Video chat with a Teranex Consultant</span><br/>
								<!--<span class="fg_span"><input type="radio" value="B" name="video_chat"> Video chat with a Teranex Programmer</span><br/>-->
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

<!-- Modal -->
<div id="groupbuyingmodal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Details for collective buying request</h4>
      </div>
      <div class="modal-body">
        <div class="col-sm-12 border_bot">
          <form class="" name="" id="buyingrequest" method="post" enctype="multipart/form-data" action="#" >
              <div class="form-group">
                  <select class="form_bor_bot" name="product_cat" id="product_cat">
                    <option value="">Select Product Category</option>
                      <?php if($machineCatList){
                        foreach($machineCatList as $rowCat){?>
                          <option value="<?php echo $rowCat['mc_id']?>" ><?php echo $rowCat['category_name']?></option>
                      <?php }}?>
                  </select> 
                 <!--  <input type="text" id="product_cat" name="product_cat" class="form_bor_bot" value="value come from backend" readonly> -->
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="prod_brandName" id="prod_brandName">
                    <option value="">Select Brand</option>
                    <?php if($brandList){
                      foreach($brandList as $rowBrand){?>
                    <option value="<?php echo $rowBrand['mb_id']?>"  <?php if($rowProduct['prod_brandName']==$rowBrand['mb_id']){ echo "selected";}?>><?php echo $rowBrand['brand_name']?></option>
                      <?php }}?>
                  </select><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <select class="form_bor_bot" name="prod_model" id="prod_model">
                    <option value="">Select Product Model</option>
                  </select><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="monthly_consum" name="monthly_consum" class="form_bor_bot numbersOnly" placeholder="Average Monthly Consumption" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="quartly_consum" name="quartly_consum" class="form_bor_bot numbersOnly" placeholder="Average Quarterly Consumption" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="monthly_forcast" name="monthly_forcast" class="form_bor_bot numbersOnly" placeholder="Expected Monthly Forecast" ><span class="compulsary">*</span>
              </div>
              <div class="form-group">
                  <input type="text" id="buying_price" name="buying_price" class="form_bor_bot decimal" placeholder="Current Buying Price" ><span class="compulsary">*</span>
              </div>
              <div class="clearfix"></div>
              <div class="text-center">
                  <input type="submit" name="addSubmit" id="submit" class="btn btn_orange" value="Submit" />
              </div>
          </form>
        </div><div class="clearfix"></div>
      </div>
    </div>
  </div>
</div>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?=$theme_url?>/js/jquery.validate.min.js"></script> 
<script type="text/javascript">
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


$('#groupbuyingmodal').on('hidden.bs.modal', function () {
    $('#buyingrequest').validate().resetForm();
    $('.error').removeClass('error');
    $(this).find('form').trigger('reset');
});
$("#buyingrequest").validate({
    rules: {  
        product_cat:{
          required:true
        },
        prod_brandName:{
          required:true
        },
        monthly_consum:{
          required:true
        },
        quartly_consum:{
          required:true
        },
        monthly_forcast:{
          required:true
        },
        buying_price:{
          required:true
        },
        prod_model:{
        	required:true
        },
      },
    messages: { 
      product_cat:{
        required:"Please select product category"
      },
      prod_brandName:{
        required:"Please select brand"
      },
      monthly_consum:{
          required:"Please enter average monthly consumption"
        },
        quartly_consum:{
          required:"Please enter average quarterly consumption"
        },
        monthly_forcast:{
          required:"Please enter expected monthly forecast for next 1 year"
        },
        buying_price:{
          required:"Please enter current buying price"
        },
        prod_model:{
        	required:"Please select product model"
        },
    }
  }); 
  $('#prod_brandName').on('change', function() {
	var prod_brandName = $("#prod_brandName").val();
		 $.ajax({
		  type: "GET",
		  url: site_url+"/machine/api/machineBrandModelList/"+prod_brandName,
		  data: {},
			success: function(result){ 
				$('#prod_model').empty();
				 if(result){ 	 
						var state_list=result.result.result; 
						$('#prod_model')
							.append($("<option></option>")
							.attr("value",'')
							.text('Select Product Module'));	
						$.each(state_list, function(key, value) { 
							$('#prod_model')
							.append($("<option></option>")
							.attr("value",value.md_id)
							.text(value.model_name));
						});		
					}
				else if(result.error){
				
				} 
			}
			
		});
});
</script>
<?php $this->template->contentEnd();  ?> 
