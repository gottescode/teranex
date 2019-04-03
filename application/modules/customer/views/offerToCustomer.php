 

<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">User List</li>
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
<div class="row margin_0" style="background-color: #353537;">

    <?php $this->load->view("cust_side_menu"); ?> 
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
            <div class="col-sm-offset-2 col-sm-8 border_bot" style="background-color: #fff;padding:20px 40px;box-shadow: 0px 0px 10px #dfdcdc;margin-top: 30px;">
                <form class="form" name="alluserform" id="alluserform" method="post" action="">
                    <div class="form-group">
                        <select class="form_bor_bot" id="customer_id" name="customer_id">
                            <option value="">Select User</option>
                            <?php foreach ($AllUser as $userRole) { ?>
                                    <option value="<?php echo  $userRole['uid'];?>"> <?php echo $userRole['u_name']; ?></option>
                            <?php } ?>	
                        </select><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">
							<p>NDA</p>
							<div class="radio">
								<label><input type="radio" name="nda" value="Y">Yes</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="nda" value="N" >No</label>
							</div>
                    </div>
					<div class="form-group">
							<label class="control-label col-sm-3" for="Title">Upload NDA : <span class="star">*</span></label>
							<div class="">
							<input type="file" class="form-control-file" name="supplier_nda" id="supplier_nda">
						</div>
					</div>
					<br>
                     <div class="form-group">
							<p>Machine Warrenty</p>
							<div class="radio">
								<label><input type="radio" name="warrenty" value="Y">Yes</label>
							</div>
							<div class="radio">
								<label><input type="radio" name="warrenty" value="N" >No</label>
							</div>
                    </div>
                    <div class="form-group"> 
						<div class="col-sm-offset-3">
							<input type="submit" name="btnUploadQuote" value="Submit" class="btn btn_orange">  
						</div>
					</div>
				
                </form>
            </div>
            <div class="clearfix"></div>
            </div>
        </div>
            <div class="clearfix"></div>
            
            
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
    $(".company_code").blur(function () {
       
        var company_code = $('#company_code').val();
        if(company_code!=''){
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
    }
    });
</script>
<?php $this->template->contentEnd(); ?> 