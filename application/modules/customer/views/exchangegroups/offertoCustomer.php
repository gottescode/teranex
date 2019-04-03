<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">Exchange Group Create Offer</li>
            </ul>
        </div>
        <div class="col-sm-8 padd-0">
            <ul>
                <li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url();?>">Go To My Stelmac </a></li>
            </ul>
        </div>
    </div>
    <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
<div class="welcome-j-bg">
    <div class="container">
        <!-- <div class="col-sm-8 col-lg-10 padd-0">
            <ul>

            </ul>
        </div>
        <div class="col-sm-4 col-lg-2 padd-0">
            <ul>
                <li class=""><a href="<?php echo site_url(); ?>">Go To My Teranex </a> |</li>
                <li class=""><a href="<?php echo site_url() . "pages/logout"; ?>">Sign Out </a></li>
            </ul>
        </div> -->
    </div>
    <!-- /.container --> 
</div>
<!-- /.myprofile-bg dahboard-bg -->
    <?php $this->load->view("customer/cust_side_menu"); ?> 
<div class="row margin_0" style="background-color: #353537;">

    <div class="">
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12 bg_white">  
            <?php
            // display messages
            if (hasFlash("dataMsgProfileSuccess")) {
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgProfileSuccess"); ?>
                </div>
            <?php } if (hasFlash("dataMsgProfileError")) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgProfileError"); ?>
                </div>
            <?php } ?>	
            <div class="col-sm-12">
              
            <div>
               <form class="form-horizontal" role="form" action="" id="category" method="post" enctype="multipart/form-data">
			<fieldset>
			   	<div class="form-group">
					<label class="control-label col-sm-3" for="category_id">Category:<span class="star">*</span></label>
					<div class="col-sm-8">
						<select name="category" id="category" class="form-control required"  required="">
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
					<textarea   name="description" id="description" class="form-control required" ><?=$machine_data['description']?></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="cust_branch_country"> Country: </label>
					<div class="col-sm-8">
					<select name="country_id" id="country_id" onchange="myFunctionState()" class="form-control required">
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
					<select name="state_id" id="state_id" onchange="myFunctionCity()" class="form-control required">
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
					<select name="city_id" id="city_id" class="form-control required">
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
        </div> <div class="clearfix"></div>
    </div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM); ?>
<script language="javascript" type="text/javascript">

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

    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.lettersOnly').keyup(function () {
        this.value = this.value.replace(/[^A-Za-z \.]/g, '');
    });
    jQuery.validator.addMethod("valEmail1", function (value, element) {
        return this.optional(element) || /^([a-zA-Z0-9_\-\.+]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value);
    }, 'Please enter a valid email address');
    $("#category").validate({
        rules: {
            u_name: {
                required: true
            },

            /*user_role:{
             required:true
             },*/
            u_email: {
                required: true,
                valEmail1: true
            },
            u_mobileno: {
                required: true
            },
            company_code: {
                required: true
            },
        },
        messages: {
            u_name: {
                required: "Please enter user name"
            },

            /*user_role:{
             required:"Please select user role"
             },*/
            u_email: {
                required: "Please enter email id"
            },
            u_mobileno: {
                required: "Please enter phone number"
            },
            company_code: {
                required: "Please enter Company Code"
            },
        }
    });
    $("#u_email").keyup(function () {
        var s_email = $('#u_email').val();
        $.ajax({
            type: "post",
            url: site_url + 'pages/api/checkEmailIdExist',
            data: {s_email: s_email},
            dataType: 'json',
            success: function (result) {
                if (result.result == 1) {
                    alert("This Email-Id Already Registered..!!");
                    $('#u_email').val('');
                }
            },
            error: function () {
            }
        });
    });
    $("#company_code").keyup(function () {
        var company_code = $('#company_code').val();
        $.ajax({
            type: "post",
            url: site_url + 'customer/api/checkCompanyCodeExist',
            data: {company_code: company_code},
            dataType: 'json',
            success: function (result) {
                if (result.result == 1) {
                    alert("Company Code Already Registered..!!");
                    $('#company_code').val('');
                }
            },
            error: function () {
            }
        });
    });
</script>
<?php $this->template->contentEnd(); ?> 