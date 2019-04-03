<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">Exchange Group Offered List</li>
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
            if (hasFlash("dataMsgSuccess")) {
                ?>
                <div class="alert alert-success alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgSuccess"); ?>
                </div>
            <?php } if (hasFlash("dataMsgError")) { ?>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgProfileError"); ?>
                </div>
            <?php } ?>	
            <div class="col-sm-12">
              <a href="<?php echo site_url()."customer/exchangegroup/offertoCustomer"?>" class="btn btn-info ">New</a></br>
            <div>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC">
						<td>Sr.No</td>
						<td>Category</td>
						<td>Description</td>
						<td>Timeline</td>
						<td>Address</td>
						<td>Offered On</td>
					</tr>
                    </thead>
                    <tbody>
						<?php 
						
						
						if($offeredData){ $i=1;
								foreach($offeredData as $row){
									
									$country_id = $row['country_id'];
									$state_id = $row['state_id'];
									$city_id = 	$row['city_id'];
									
									$url = site_url()."customer/exchangegroupapi/findSingleCountry/{$country_id}";
									$countryName =  apiCall($url,"get");
									
									$url = site_url()."customer/exchangegroupapi/findSingleState/{$state_id}";
									$stateName =  apiCall($url,"get");
								
									$url = site_url()."customer/exchangegroupapi/findSingleCity/{$city_id}";
									$cityName =  apiCall($url,"get");
									?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$row['category']?></td>
										<td><?=$row['description']?></td>
										<td><?=$row['timeline']?></td>
										<td><?php 
												echo "Country: ".$countryName['result']['country_name']."</br>";
												echo "State: ".$stateName['result']['state_name']."</br>";
												echo "City: ".$cityName['result']['city_name']."</br>";

										?></td>
										<td><? echo date('d-M-Y, g:i A', strtotime($row['created_date'])); ?></td>
					
                             
										
									</tr>
							<?php }
						}?>
                        
                    </tbody>
                </table>
            </div>
        </div> <div class="clearfix"></div>
    </div>
</div> 
<?php $this->template->contentBegin(POS_BOTTOM); ?>
<script language="javascript" type="text/javascript">
    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.lettersOnly').keyup(function () {
        this.value = this.value.replace(/[^A-Za-z \.]/g, '');
    });
    jQuery.validator.addMethod("valEmail1", function (value, element) {
        return this.optional(element) || /^([a-zA-Z0-9_\-\.+]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value);
    }, 'Please enter a valid email address');
    $("#alluserform").validate({
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