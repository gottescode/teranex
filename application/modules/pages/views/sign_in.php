<?php $this->template->contentBegin(POS_TOP); ?>
<style type="text/css">
    .sign-up-orng li {
        font-size: 12px;
    }
    .border_bot .form-group{
        margin-bottom: 10px;
    }
    .border_bot .form_bor_bot{
        display: block;
        width: 100%;
        height: 34px;
        padding: 6px 12px;
        font-size: 14px;
        line-height: 1.42857143;
        color: #555;
        background-color: #fff;
        background-image: none;
        border-bottom: 1px solid #ccc;
        border-top: none;
        border-left: none;
        border-right: none;
    }
    .form-signin label{font-weight:normal;margin-bottom: 10px;}

    button.btn-link.ser-icon span.glyphicon-search{
        padding: 3px !important;
    }
    .checkbox label.error , .radio label.error{
        color: red;
        position: absolute;
        top: 20px;
        padding-left: 0;
    }
    /*div ~ label{
        background: red;
    }*/
/*.form-signin .checkbox {
margin: 5px 0;
    }*/
</style>
<?php echo $this->template->contentEnd(); ?>  
<div style="padding:120px 0">
    <div class="container signup-padding">
        <?php
        // display messages
        if (hasFlash("ErrorMsg")) {
            ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" ><span aria-hidden="true">&times;</span></button>
                <?php echo getFlash("ErrorMsg"); ?>
            </div>
            <?php
        }  // display messages
        if (hasFlash("dataMsgSuccessSign")) {
            ?>
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <?php echo getFlash("dataMsgSuccessSign"); ?>
            </div>
        <?php } ?>
        <!-- SIGN IN FORM FLASH MSG -->
        <?php if (hasFlash("ErrorLoginMsg")) { ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 0;"><span aria-hidden="true">&times;</span></button>
                <?php echo getFlash("ErrorLoginMsg"); ?>
            </div>
        <?php } ?>
        <div class="col-sm-6 signup-border"> 
            <div class="border_bot col-sm-offset-2 col-sm-8 " style="background-color: #fff;padding:10px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
                <form class="form-signin" name="register" id="register" method="post" enctype="multipart/form-data" action="" > 
                    <h2 class="form-signin-heading">Sign up</h2>
                    <?php
                    $data = $this->pages_model->fetchDataidWhr();

                    //	print_r($data);die;
                    foreach ($data as $key) {
                        if($key->id!=4){
                        ?>     
                        <div class="col-sm-6 padd-0">   
                            <label class="radio-inline supplier"><input type="radio" id="<?php echo $key->userType; ?>"  value="<?php echo $key->id; ?>" name="supplier">
                                <?php echo $key->userType; ?></label>
                        </div>
                    <?php } } ?>
                    <label id="supplier-error" class="error" for="supplier" style="display: none;">Please select one option</label>
                    <div class="form-group supOption" style="display: none;">
                        <select name="artist_1" id="artist_1" class="form_bor_bot  role" style="width:100%;margin-top: 0px;" >
                        </select><span class="compulsary">*</span>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-bodies">
                            <div class="form-group">
                                <input type="text" class="form_bor_bot "  name="company_name" id="company_name"  placeholder="Company Name"><span class="compulsary">*</span>
                                <input type="hidden" class="form"  name="insert" value="insert">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form_bor_bot "  name="company_website" placeholder="Company Website"><span class="compulsary">*</span>
                            </div>
                        </div>
                    </div>
                    <div class="portlet-body form">
                        <div class="form-company">
                            <div class="form-group ">
                                <input type="text"  name="company_id" id="company_code" class="form_bor_bot code_email" placeholder="Company Code" >
                                <span class="compulsary">*</span>
                           
                            </div>
    
                        </div>
                    </div>
                    <div class="form-group ">
                        <input type="email" id="s_email" name="s_email"  class="form_bor_bot code_email" placeholder="Email ID" >
                        <span class="compulsary">*</span><br>
<!--                       <span class="error_msg" style="color:red;"></span>
                       -->
                    </div>
                    <div class="form-group">
                        <input type="text" class="form_bor_bot numbersOnly"  id="s_mobileno" name="s_mobileno" minlength="10" maxlength="10" placeholder="Mobile Number"><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">	        			
                        <input type="password" id="s_password" name="s_password" class="form_bor_bot " placeholder="Password" ><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">
                        <input type="password" id="conf_password" name="conf_password" class="form_bor_bot" placeholder="Re-confirm password" ><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">
                        <select class="form_bor_bot required"   id="country" name="country">
                            <option value="">Select Country</option>
                            <?php
                            if (isset($countryData)) {
                                foreach ($countryData as $key) {
                                    ?>
                                    <option value="<?php echo $key->country_name; ?>"><?php echo $key->country_name; ?></option>
    <?php }
} ?>
                        </select><span class="compulsary">*</span>
                    </div>

                    <!-- <div class="form-group">
                        <select class="form_bor_bot required" id="SignupType" name="SignupType">
                            <option value="">Select Type</option>
                            <option value="C">Customer</option>
                            <option value="S">Supplier</option>
                            <option value="T">Trainer</option>
                            <option value="P">Programmer</option>
                            <option value="CN">Consultant</option>
                        </select><span class="compulsary">*</span>
                    </div> -->
                    <div class="form-group">
                        <img src="" alt="Random letters" id="captcha" style="margin-top:5px; "/>
                        <span style="float: right;font-size: 25px;padding: 25px 50px 0 0"><a href='javascript: captcha_refresh(); ajaxCaptcha();' data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh" aria-hidden="true"></i></a></span>
                        <!-- <label for='message'>Enter the code here :</label> -->
                        <input type="text" id="captcha_image" name="captcha" class="form_bor_bot captcha"  placeholder="Enter the captcha code here"><span class="compulsary">*</span>
                        <input type="hidden" id="captchCode" name="captchCode" class="form_bor_bot" >

                        <!-- Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh. -->
                        <input type="hidden" name="otp_no" id="otp_no" value="<?php echo $otp_no; ?>">
                    </div><div class="clearfix"></div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                <input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" checked /><span class="red">*</span>I accept <a href="<?php echo site_url() ?>pages/privacystatement" target="_blank"> privacy policy</a>
                            </label>
                        </div><div class="clearfix"></div>
                        <div class="checkbox">
                            <label>
                                <input class="required" name="acceptAggrement" value="Y" id="acceptAggrement" type="checkbox" checked/><span class="red">*</span>I agree to free membership agreement
                            </label>
                        </div><div class="clearfix"></div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="acceptReceive" <?php echo (isset($_POST['acceptReceive']) ? "value='Y'" : "value='N'") ?><?php echo (isset($_POST['acceptReceive']) ? "checked" : "") ?> checked/> &nbsp;I agree to receive marketing material
                            </label>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="text-center">
                            <input type="submit" name="submit" value="Submit" class=" addmore-btn btn_orange" style="height: 34px;width: 100%;"/></center>
                        </div>
                    </div><div class="clearfix"></div>
                    <div class="form-group">
                        <ul class="sign-up-orng">
                            <li>Email ID will be used as user name for sign in.</li>
                            <li>Notifications shall be Sent on the Email ID and Mobile Number </li>
                        </ul>
                        <div class="">
                            <label>
                                Difficulty signing up? <span><a href="<?php echo site_url() . "pages/contact" ?>">Write to us</a></span>
                            </label>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
        <div class="col-sm-6 sign-in">
            <div class="border_bot col-sm-offset-2 col-sm-8 " style="background-color: #fff;padding:10px 40px;box-shadow: 0px 0px 10px #dfdcdc;">
                <form class="form-signin" name="login" id="login" method="post" action="<?php echo site_url() . "pages/login" ?>">
                    <!-- <?php if (hasFlash("ErrorLoginMsg")) { ?>
                                                                        <div class="alert alert-warning alert-dismissible" role="alert">
                                                                          <button type="button" class="close" data-dismiss="alert" aria-label="Close" style="margin-top: 0;"><span aria-hidden="true">&times;</span></button>
                        <?php echo getFlash("ErrorLoginMsg"); ?>
                                                                        </div>
<?php } ?> -->
                    <h2 class="form-signin-heading">Sign in</h2>
                    <div class="form-group">
                        <input type="text" name="u_email" id="u_email" class="form_bor_bot" placeholder="Email ID" ><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">
                        <input type="password" name="u_password" id="u_password" class="form_bor_bot" placeholder="Password" > <span class="compulsary">*</span>
                    </div><div class="clearfix"></div><br/>
                    <div class="form-group">
                        <div class="text-center"><input type="submit" class="btn btn-default form-control addmore-btn btn_orange" name="btnLogin" value="Sign in"></div>
                    </div>
                    <div class="form-group">
                        <div class="checkbox">
                            <label>
                                Forgot Password? <span><a href="" data-toggle="modal" data-target="#resetModal"> Reset  Password</a></span>
                            </label>
                        </div>
                        <div class="checkbox">
                            <label>
                                Difficulty signing in? <span><a href="<?php echo site_url() . "pages/contact" ?>">Write to us</a></span>
                            </label>
                        </div>
                    </div>
                </form>
                <div class="clearfix"></div>
                <?php
                include_once APPPATH . "libraries/linkedin/config.php";
                if (isset($_SESSION["user_id"]) && $_SESSION["user_id"] != "") {
                    // user already logged in the site
                }
                ?>
<?php if ($_SESSION["e_msg"] <> "") { ?>
                    <div class="alert alert-dismissable alert-danger">
                        <button data-dismiss="alert" class="close" type="button">x</button>
                        <p><?php echo $_SESSION["e_msg"]; ?></p>
                    </div>
<?php } ?>
                <div class="form-group" style="margin-top: -80px;">
                    <div class="text-center"><span>OR</span></div>
                    <br>
                    <br>
                    <div class="text-center"><a type="submit" href="<?php echo site_url() . "pages/linked_login" ?>" class="btn btn-primary form-control"  style="width:290px;"  value="Sign in" >Sign in With LinkedIn</a></div>
                </div>
                <br>
                <br>
                <div class="form-group" style="margin-top: -60px;">
                    <div class="text-center"><span></span></div>
                    <br>
                    <br>
                    <div class="text-center"><a type="submit" href="<?php echo site_url() . "pages/google_login" ?>" class="btn btn-danger form-control"  style="width:290px;"  value="Sign in" >Sign in With Google</a></div>
                </div>
  </div>
</div>
                <?php
                // unset if after it display the error.
                $_SESSION["e_msg"] = "";
                ?>
            </div>
        </div>
        <!--  <div class="col-sm-6 sign-in-forms">
             <div class="border_bot col-sm-offset-2 col-sm-8 " style="">
 
             </div>
         </div> -->

    </div><!-- container -->
</div> 

<div id="otp_modal"  role="dialog"  class="modal fade" data-backdrop="static"> 
    <div class="modal-dialog modal-sm">
        <div class="modal-content" style="padding:10px;">
            <div class="modal-header" style="padding: 0px ;padding-bottom: 15px; text-align: center;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">OTP</h4>
            </div>
            <div class=""  id="" style="padding: inherit;">
                <div class="form-group">
                    <input type="text" name="otp" id="otp" class="form-control full-width required" placeholder="OTP">
                </div> 
                <div class="form-group">
                    <center><input type="button" name="btnSubmit" id="save_btn" class="btn btn_orange" value="VERIFY OTP"></center>
                </div>  
            </div>
            <div class="clearfix"></div> 
        </div>
    </div>
</div>

<?php $this->template->contentBegin(POS_BOTTOM); ?>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script> -->
<script language="javascript" type="text/javascript">

    jQuery.validator.addMethod("valEmail1", function (value, element) {
        return this.optional(element) || /^([a-zA-Z0-9_\-\.+]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value);
    }, 'Please enter a valid email address');

    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });
    jQuery('.alphaSpace').keyup(function () {
        this.value = this.value.replace(/[^a-zA-Z \.]/g, '');
    });
    var submit = 0;
    $("#register").validate({
        rules: {
            s_email: {
                required: true,
                valEmail1: true
            },
            s_mobileno: {
                required: true,
                digits: true,
                minlength: 10,
                maxlength: 10
            },
            // SignupType: {
            //     required: true
            // },
            s_password: {
                required: true
            },
            conf_password: {
                required: true,
                equalTo: "#s_password",
            },
            supplier: {
                required: true
            },
            artist_1: {
                required: true
            },
            country: {
                required: true
            },
            captcha: {
                required: true
            },
            acceptPrivacy:{
                required:true
            },
            acceptAggrement:{
                required:true
            },
        },
        messages: {
            s_email: {
                required: "Please enter email"
            },
            s_mobileno: {
                required: "Please enter mobile number"
            },
            // SignupType: {
            //     required: "Please select user type"
            // },
            s_password: {
                required: "Please enter password"
            },
            conf_password: {
                required: "Re-enter your password"
            },
            supplier: {
                required: "Please select one option"
            },
            artist_1: {
                required: "Please select any role"
            },
            country: {
                required: "Please select country"
            },
            captcha: {
                required: "Please enter captcha code"
            },
            acceptPrivacy:{
                required:"Accept privacy policy"
            },
            acceptAggrement:{
                required:"Accept membership agreement"
            },
        },
        submitHandler: function () {
            //var cap=$("#captcha_image").val();
            // alert(cap);

            var mobile_no = $('#s_mobileno').val();
            var otp_no = $('#otp_no').val();
            var country = $('#country').val();

            //alert(country);

            if (country == 'India') {

                if (submit == 0) {
                    debugger;


                    $.ajax({
                        type: "post",
                        url: site_url + 'pages/send_otp/',
                        data: {mobile_no: mobile_no, otp_no: otp_no},
                        dataType: 'json',
                        success: function () {
                            $('#otp_modal').modal('show');
                        },
                        error: function () {
                        }
                    });
                } else {
                    return true;
                }
            } else {
                return true;
            }


            return false;
        }
    });
    $("#s_email").keyup(function () {
        var s_email = $('#s_email').val();
        var admin_id = $("#artist_1").val();

        //alert(admin_id);
        if (admin_id == 1) {
            $.ajax({
                type: "post",
                url: site_url + 'pages/api/checkEmailIdExist',
                data: {s_email: s_email},
                dataType: 'json',
                success: function (result) {
                    if (result.result == 1) {
                        alert("This email id already registered..!!");
                        $('#s_email').val('');
                    }
                },
                error: function () {
                }
            });
        }
    });





    $('#save_btn').click(function () {
        var otp = $("#otp").val();
        var otp_no = $("#otp_no").val();
        var country = $('#country').val();

        if (country=='India')
        {
            if (otp_no == otp) {
                debugger;
                submit = 1;
                //  $('#register').submit();
               // document.getElementById("register").unbind('submit');
                document.getElementById("register").submit.click();
            } else {
                alert("Please enter correct OTP");
            }

        } else

        {
            debugger;
            submit = 1;
            //  $('#register').submit();
            document.getElementById("register").submit();


        }

    });


    $(function () {
        $('.supplier').change(function () {
            $('.form-bodies').hide();
            $('.form-company').hide();
            $('.supOption').show();




            var supplier = $("input[name='supplier']:checked").val();


            $.ajax({
                url: "<?php echo site_url(); ?>pages/user_access",
                data: {supplier: supplier},
                dataType: "json",
                type: "post",
                success: function (data) {

                    //
                    // $("#artist").empty();
                    $('#artist_1').html(data);

                }
            });
        });
    });



    $('.form-bodies').hide();
    $('.form-company').hide();
    $('.role').change(function () {

        var id = $(this).val();
        //  alert(id);
        if (id == 1) {
            // alert('hi-if');
            $('.form-company').hide();
            $('.form-bodies').show();

        } else
        {
            // alert('hi-else');
            $('.form-bodies').hide();
            $('.form-company').show();
        }
    });


    $("#company_name").blur(function () {

        var company = $(this).val();

        $.ajax({
            url: "<?php echo site_url(); ?>pages/companyExists",
            data: {company: company},
            dataType: "json",
            type: "post",
            success: function (data) {
                if (data != '')
                {
                    // alert('already exist');

                }

            }
        });

    });
    
    

    $(".code_email").blur(function () {
     //alert('hi');
        var company_code = $("#company_code").val();
        var company_email = $("#s_email").val();
         //alert(company_code+""+company_email);
      if(company_code!=''&& company_email!='')
      {
        $.ajax({
            url: "<?php echo site_url(); ?>pages/api/checkCodeEmailIdExist",
            data: {company_code: company_code,company_email:company_email},
            dataType: "json",
            type: "post",
            success: function (data) 
           { 
               if(data.result==0)
               {
                   
                      alert('Company code and email not exist');
                      $('#company_code').val('');
                      $('#s_email').val('');
        
                  //$('.error_msg').html('Please enter correct email id and company code');
               }
               else
               {
                   
            
               }
                

            }
        });
        
        }

    })


    // sign onclick pop form

    /*  $("#Freelancer").change(function () {
     // var id = $("#Freelancer").val();
     var id = $("input[name='supplier']:checked").val();
     
     // alert(id);
     
     if (id == 3)
     {
     // alert('freelancer');
     $('.sign-in-forms').show();
     }
     
     });*/


    $('.captcha').blur(function (e) {
        var captchCode = $("#captchCode").val();
        var captcha_image = $("#captcha_image").val();
        // alert(captchCode+""+captcha_image);
        if (captcha_image!='') {
            if (captchCode == captcha_image)
            {
                  
            } 
            else
            {
                alert("Please enter correct captcha code");
                 $('#captchCode').val('');
                 $('#captcha_image').val('');

            }
        }
    });




    var captchaUrl = "<?php echo base_url(); ?>index.php/captcha?page=SignUp";
//alert(captchaUrl);
//login form validation
    $("#login").validate({
        rules: {
            u_email: {
                required: true,
                valemail: true
            },
            u_password: {
                required: true
            },
            SigninType: {
                required: true
            },
        },
        messages: {
            u_email: {
                required: "Please enter email id"
            },
            u_password: {
                required: "Please enter password"
            },
            SigninType: {
                required: "Please select sign in type"
            },
        },
        submitHandler: function (loginPopop) {
            $(".loader").show();
            dataUrl = $("#login").serialize();
            $.ajax({
                type: "POST",
                url: site_url + "pages/ajaxLoginFront",
                data: dataUrl,
                dataType: 'json',
                success: function (result) {
                    $(".loader").fadeOut("slow");
                    if (result.success == 'success') {
//							result.token
                        var responseToken = JSON.stringify(result.token);
                        localStorage.setItem("_r", responseToken);
                        localStorage.setItem("T", result.type);
                        location.reload();
                    } else if (result.fail == 'fail') {
                        alert('Login Failed ');
                    }
                }
            });
        }
    });

    /* $("#login").validate({
     rules: {  
     u_email: {
     required:true
     },
     u_password: {
     required:true
     },
     SigninType: {
     required:true
     },
     },
     messages: { 
     u_email: {
     required:"Please enter email id"
     },
     u_password: {
     required:"Please enter password"
     },
     SigninType: {
     required:"Please select sign in type"
     },
     }
     }); 
     */
//reset form validation
    $("#reset_form").validate({
        rules: {
            r_email: {
                required: true,
                valemail: true
            },
        },
        messages: {
            r_email: "Please enter registered email "
        }
    });


</script>
<script>

</script>
<script src="<?= $theme_url; ?>/js/captcha.js"></script> 
<script>
    var captchCode = "<?php echo $this->session->userdata('captcha_SignUp'); ?>";
    function ajaxCaptcha() {
//alert();
        $.ajax({
            url: "<?php echo site_url(); ?>pages/captchCode",
            data: {company: 1},
            dataType: "json",
            type: "get",
            success: function (data) {
                $("#captchCode").val(data.captcha);

            }
        });
    }

    ajaxCaptcha();

</script>

<?php echo $this->template->contentEnd(); ?> 