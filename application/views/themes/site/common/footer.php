<div class="container-fluid t-footer-bars">
    
    <div class="container">
        
        <div class="footer-col link">
            <h4>About Us</h4>
            <a target="" href="<?php echo site_url() . "pages/about"; ?>">About Stelmac</a>
            <a target="" href="<?php echo site_url() . "pages/teranex_team"; ?>">Team</a>
            <a target="" href="<?php echo site_url() . "helpcenter"; ?>">Help Center</a>
            <a target="" href="<?php echo site_url() . "pages/contact"; ?>">Contact Us</a>

        </div>
        
        <div class="footer-col link" style="padding-left: 0;">
            <h4>Policies & Rules</h4>
            <a target="" href="<?php echo site_url() . "pages/returnscancellations"; ?>">Refund Policy</a>
            <a target="" href="<?php echo site_url() . "pages/privacystatement"; ?>">Privacy Statement</a>
            <a target="" href="<?php echo site_url() . "pages/termsconditions"; ?>">Terms & Conditions of Service</a>
            <a target="" href="<?php echo site_url() . "pages/termsuse"; ?>">Terms of Use</a>
        </div>
        <div class="footer-col link" style="padding-left: 0;">
            <h4>Trade Services</h4>
            <a target="" href="<?php echo site_url() . "footer/tradeAssurance"; ?>">Buyer Protection</a>
            <a target="" href="<?php echo site_url() . "footer/submitAdispute"; ?>">Dispute Resolution</a>
            <a target="" href="<?php echo site_url() . "footer/payLater"; ?>">Machine Finance</a>
            <a target="" href="<?php echo site_url() . "footer/inspectionService"; ?>">Inspection Service</a>
           <!--
				<a target="" href="<?php echo site_url() . "footer/businessIdentity"; ?>">Business Identity</a>
		   --> 
		   
        </div>
        <div class="" style="padding-top: 15px;">
            <h4 style="text-align:center;margin-top: 5px;">Newsletter</h4>
            <p class="" style="padding: 0;float: ;">Intelligence Alert - Delivering the latest
 product</br> trends & industry news to your inbox.</p>
            <div class="">
                <form style="display: block;" id="subscribe_form" name="subscribe_form" class="text-center mob-center-form" method="post" action="" >
                    <input type="text" placeholder="Your email" id="email_id" name= "email_id"class="footer-search-text" value="" required>
                    <input type="submit" id="subscribe" value="Subscribe">
                </form>
                <div class="tips">
                    <p>We’ll never share your email address with a third-party.</p>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <hr/>
    </div>
    <div class="container" style="padding: 20px 0;">
        <div class="col-sm-12 padd-0">
            <div class="col-sm-4 padd-0">
                <div class="text-right mob-center">
                    <span class="ui-footer-sociality-text">Download:</span>
                    <a target="" title="Available on the App Store" href="#" class="app-store">
                        <img src="<?php echo $theme_url ?>/images/apple.png" class="">
                    </a>
                    <a target="" title="Available on Android" href="#" class="app-store">
                        <img src="<?php echo $theme_url ?>/images/playStore.png" class="">
                    </a>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="text-center mob-center">
                    <p>
                        <span class="links"><a target="" href="<?php echo site_url() . "pages/feedback"; ?>">Feedback</a>  |  <a target="" href="<?php echo site_url() . "pages/disclaimer"; ?>">Disclaimer</a>  |  <a target="" href="<?php echo site_url() . "footer/siteMap"; ?>">Sitemap</a>  
                        </span>
                    </p>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="soc-media_footer mob-center">
                    <span class="ui-footer-sociality-text">Follow us:</span>
                    <a target="" href="" aria-haspopup="true" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                    <a target="" href="https://twitter.com/TeranexRA" aria-haspopup="true" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"> </i> </a>
                    <a target="" href="https://www.linkedin.com/company/teranex-research-and-applications" aria-haspopup="true" title="LinkedIn"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                    <a target="" href="https://www.youtube.com/channel/UCNaXBz5Nz7bqYmNnIrUJVTw" aria-haspopup="true" title="YouTube"><i class="fa fa-youtube" aria-hidden="true"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
    <!--<div class="container">
                    <p>
                        <span class="links"><a target="_blank" href="<?php echo site_url() . "pages/feedback"; ?>">Feedback</a>  |  <a target="_blank" href="<?php echo site_url() . "pages/disclaimer"; ?>">Disclaimer</a>  |  <a href="<?php echo site_url() . "footer/faq"; ?>">FAQs</a>  
                    </span>
                    </p>
            </div> -->
    <?php if ($this->session->userdata('uid') == '') { ?>
        <div id="signinModal" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <!-- <h4 class="modal-title">Sign In</h4> -->
                        <h2 class="form-signin-heading">Sign in</h2>
                    </div>
                    <div class="modal-body">
                        <div class="border_bot col-sm-12">
                            <form class="form-signin" name="loginPopop" id="loginPopop" method="post" action="">
                                <?php if (hasFlash("ErrorLoginMsg")) { ?>
                                    <div class="alert alert-warning alert-dismissible" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <?php echo getFlash("ErrorLoginMsg"); ?>
                                    </div>
                                <?php } ?>

                                <div class="form-group">
                                    <input type="text" name="user_email" id="user_email" class="form_bor_bot" placeholder="Email ID" ><span class="compulsary">*</span>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="user_password" id="user_password" class="form_bor_bot" placeholder="Password" ><span class="compulsary">*</span>
                                </div><div class="clearfix"></div><br/>
                                <div class="form-group">
                                    <div class="text-center"><input type="submit" class="btn btn-default form-control addmore-btn btn_orange" name="btnLogin" value="Sign in"></div>
                                </div>
                                <div class="form-group">
                                    <div class="checkbox">
                                        <label>
                                            Forgot Password? <span><a href="" data-toggle="modal" data-target="#resetModal" data-dismiss="modal"> Reset Password</a></span>
                                            <span class="pull-right" style="padding-top: 0;"><a href="<?php echo site_url() . "pages/signIn"; ?>">Sign Up</a></span>
                                        </label>
                                    </div>
                                </div>
                            </form>
                            <div class="clearfix"></div>
                        </div><div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--Reset password modal-->
        <div id="resetModal" class="modal fade" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h1 class="form-signin-heading" style="line-height: 1.1;margin-top: 0px;">Enter email id</h1>
                    </div>
                    <div class="modal-body">
                        <div class="border_bot">
                            <form class="" name="" id="reset_form" method="post" enctype="multipart/form-data" action="<?php echo site_url() . "pages/forgotPassword" ?>" >
                                <div class="form-group">
                                    <input type="email" name="r_email" id="e_email" class="form_bor_bot required" placeholder="Email"><span class="compulsary">*</span>
                                </div>
                                <div class="form-group">
                                    <center><input type="submit" name="resetSubmit" class="btn btn-primary btn_orange" value="Submit" > 
                                        <!-- <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> --></center>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <?php $this->template->contentBegin(POS_BOTTOM); ?>   
    <script language="javascript" type="text/javascript">
        $(function () {
            $("#work_will_awarded").datepicker({dateFormat: "dd-M-yy", maxDate: 0, changeMonth: true, changeYear: true, yearRange: "-70:+0"}).val()
            $("#program_needed").datepicker({dateFormat: "dd-M-yy", maxDate: 0, changeMonth: true, changeYear: true, yearRange: "-70:+0"}).val()
            $("#quotes_needed_by").datepicker({dateFormat: "dd-M-yy", maxDate: 0, changeMonth: true, changeYear: true, yearRange: "-70:+0"}).val()
        });



        $("#subscribe_form").submit(function (e) {
            debugger;

            var form = $(this);
            var url = "<?php echo site_url() . "pages/api/addsubcribe" ?>";
            var email_id = $("#email_id").val();
            $.ajax({
                type: "POST",
                url: url,
                data: {email_id: email_id},
                success: function (result) {
                    console.log();
                    if (result.result == '-1') {
                        alert("This email id is already subscribed with us.");
                    } else if (result.result) {
                        alert("Subscribed successfully. Thank you!");
                    } else
                    {
                        alert("There was problem while subscribing. Please try again later.");
                    }
                }
            });
            e.preventDefault(); // avoid to execute the actual submit of the form.
        });

        $(document).ready(function () {
            $("#footernews").submit(function (e) {
                e.preventDefault();
                if ($("#NewsletterEmail").val() == "")
                {
                    alert("Email is required");
                    return false;
                }
                if ($("#NewsletterEmail").val() != "")
                {
                    var b = $("#NewsletterEmail").val();
                    var atpos = b.indexOf("@");
                    var dotpos = b.lastIndexOf(".");
                    if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= b.length)
                    {
                        alert("Not a valid e-mail address");
                        return false;
                    }
                }
                var email = $('#NewsletterEmail').val();
                var varData = 'email=' + email;
                $.ajax({
                    type: "POST",
                    url: 'subscribe.php',
                    data: varData,
                    success: function (result) {
                        if (jQuery.trim(result) == 'Pass') {
                            alert("Subscribed successfully. Thank you!");
                        } else if (jQuery.trim(result) == 'AlreadyThere') {
                            alert("This email id is already subscribed with us.");
                        } else
                        {
                            alert("There was problem while subscribing. Please try again later.");
                        }
                    }
                });
            });
        });
    </script>
    <script language="javascript" type="text/javascript">
        $(document).ready(function () {
            $('#sticky-social').hide();
        });
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100)
            {
                $('#sticky-social').fadeIn();
            } else
            {
                $('#sticky-social').fadeOut();
            }
        });
    </script>
<?php
$user_id = $this->session->userdata('uid');

$url = site_url() . "pages/api/SessionValue/$user_id";
$data = apiCall($url, "get");
$session_value = $data['result'];

// print_r($data);die;
?>

    <script>

        var counter =<?php if ($session_value['session_value']) {
        echo $session_value['session_value'];
    } else {
        echo "0";
    } ?>;

        var session_exp_time =<?php if ($session_value['session_exp_time']) {
        echo $session_value['session_exp_time'];
    } else {
        echo "0";
    } ?>;
        var is_active =<?php if ($session_value['is_active']) {
        echo $session_value['is_active'];
    } else {
        echo "0";
    } ?>;

        if (is_active == 1)
        {

            //var counter=7195;


            var myVar = setInterval(function ()
            {


                if (counter >= 0)
                {
                    document.getElementById("countdown").innerHTML = "You Will Be Logged Out In 7200 sec means 2 hours <br><b>" + counter + " Sec</b>";
                    document.getElementById("myValue").value = counter;

                }

                if (counter >= session_exp_time)
                {
                    //  alert(counter);
                    $.ajax
                            ({
                                type: 'post',
                                url: "<?php echo site_url(); ?>pages/session_logout",
                                data: {counter: counter},
                                success: function (response)
                                {
                                    alert('please contact us at support@stelmac.com if you want to extended access');
                                    window.location = "<?php echo base_url(); ?>pages/signIn";
                                }
                            });
                }

                counter++;
            }, 1000)
        }


    </script>



    <script>
        var is_active =<?php if ($session_value['is_active']) {
        echo $session_value['is_active'];
    } else {
        echo "0";
    } ?>;
        if (is_active == 1)
        {


            function myFunction1() {
                var counter =<?php if ($session_value['session_value']) {
        echo $session_value['session_value'];
    } else {
        echo "0";
    } ?>;

                //var counter=7195;

                var myVar = setInterval(function ()
                {


                    if (counter >= 0)
                    {
                        document.getElementById("countdown").innerHTML = "You Will Be Logged Out In 7200 sec means 2 hours <br><b>" + counter + " Sec</b>";
                        document.getElementById("myValue").value = counter;

                    }
                    $.ajax
                            ({
                                type: 'post',
                                url: "<?php echo site_url(); ?>pages/save_session",
                                data: {counter: counter},
                                success: function (response)
                                {

                                }
                            });


                    counter++;
                }, 1000)


            }
        }


    </script>

</body>
<?php $this->template->contentEnd(); ?>
