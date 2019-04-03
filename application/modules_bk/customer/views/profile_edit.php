<?php $this->template->contentBegin(POS_TOP); ?>
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

<style type="text/css">
    .margin_10_top{
        margin-top: 10px;
    } 
</style> 
<?php echo $this->template->contentEnd(); ?> 
<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile"><a href="<?php echo site_url() . "customer/dashboard"; ?>">My Dashboard</a></li>
            </ul>
        </div>
        <div class="col-sm-8 padd-0">
            <ul>
                <li class="" style="float: right;margin: 6px 0;"><a href="<?php echo site_url(); ?>">Go To My Stelmac </a></li>
            </ul>
        </div>
    </div>
    <!-- /.container --> 
</div>

<div class="welcome-j-bg">
    <div class="container">
        <!-- <div class="col-sm-8 col-lg-9 padd-0">
          <ul>
            <li class="">Welcome <? echo ucwords($_SESSION['u_name']);?></li>
          </ul>
        </div>
        <div class="col-sm-4 col-lg-3 padd-0">
          <ul>
            <li class=""><a href="<?php echo site_url() . "" ?>">Go To My Teranex </a> |</li>
            <li class=""><a href=""><span><i class="fa fa-pencil"></i></span> Edit Profile</a> |</li>
            <li class=""><a href="<?php echo site_url() . "pages/logout"; ?>">Sign Out </a></li>
          </ul>
        </div> -->
    </div>
</div>
<!-- /.welcome-j-bg -->

<div class="container">
    <div class=" row-flex">
        <!-- /.myprofile-bg dahboard-bg --> 

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 mar-20-btm padd-0">
            <?php
            
           // print_r($customer_data);die;
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
            <div class="contact-right-text  ">
                <br />  
                <form class="form-horizontal border_bot"  name="editprofile" id="editprofile" method="post" action="" enctype="multipart/form-data" novalidate="novalidate">
                    <div class="">
                        <div class="col-sm-6  white-bg pading_left_0">
                            <div class="profile-left">
                                <h3>Personal </h3>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Full Name</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form_bor_bot alphaSpace" name="u_name" id="u_name" placeholder="Full Name" value="<?php echo $customer_data['u_name'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Birth date</label>
                                    <div class="col-sm-8">
                                  
                                        <input type="hidden" class="form_bor_bot " name="uid"  value="<?php echo $this->session->userdata('uid');?>">
                                         <?php if($customer_data['u_date_birth']=='00-00-0000'){?>
                                            <input type="text" class="form_bor_bot " name="u_date_birth" id="datepicker">
                                         <?php }else { ?>
                                             <input type="text" class="form_bor_bot " name="u_date_birth" id="datepicker" value="<?php echo  date('d-m-Y', strtotime($customer_data['u_date_birth'])); ?>">
                                         <?php } ?>
                                      
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Language</label>
                                    <div class="col-sm-8"> 
                                        <!-- <?php $language = explode(",", $customer_data['language']) ?> 
                                        <select name="languages[]" id="language" class="form_bor_bot" style="    min-height: 80px;" multiple>
                                        <?php
                                        if ($language_list) {
                                            foreach ($language_list as $rowLang) {
                                                ?>
                                                                                                <option value="<?php echo $rowLang['lid']; ?>" <?php
                                                if (in_array($rowLang['lid'], $language)) {
                                                    echo "selected";
                                                }
                                                ?>><?php echo $rowLang['name']; ?></option> 
                                                <?php
                                            }
                                        }
                                        ?>
                                        </select> -->
                                        <?php $language = explode(",", $customer_data['language']) ?>
                                        <select class="js-example-basic-multiple form_bor_bot" name="languages[]" id="language" multiple="multiple">
                                            <?php
                                            if ($language_list) {
                                                foreach ($language_list as $rowLang) {
                                                    ?>
                                                    <option value="<?php echo $rowLang['lid']; ?>" <?php
                                                    if (in_array($rowLang['lid'], $language)) {
                                                        echo "selected";
                                                    }
                                                    ?>><?php echo $rowLang['name']; ?></option> 
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Profile Summary</label>
                                    <div class="col-sm-8">
                                        <textarea  class="form_bor_bot" name="profile_summary" id="profile_summary" placeholder="profile summary"  ><?php echo $customer_data['profile_summary'] ?></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Qualification</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form_bor_bot" name="qualification" id="qualification" placeholder="Qualification" value="<?php echo $customer_data['qualification'] ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Experience(Yrs)</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form_bor_bot" name="c_work_experiance" id="c_work_experiance" placeholder="Experience" value="<?php echo $customer_data['c_work_experiance'] ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Profile Photo  </label>
                                    <div class="col-sm-8">
                                        <input type="file" name="userProfile" id="userProfile" class="form_bor_bot" />
                                        <?php if ($customer_data['u_avatar']) { ?>
                                            <img src="<?php echo site_url() . "uploads/customer/" . $customer_data['u_avatar'] ?>" width="100px" />
                                        <?php } ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Resume</label>
                                    <div class="col-sm-8">
                                        <input type="file" class="form_bor_bot" name="userResume" id="userResume"   >
                                        <input type="hidden"   name="old_userResume"   value="<?php echo $customer_data['user_resume'] ?>"  >
                                    </div>
                                    <?php
                                    if ($customer_data['user_resume'] != '') {
                                        echo "<a href='" . site_url() . "uploads/customer/" . $customer_data['user_resume'] . "' target='_blank'>Click Here</a>";
                                    }
                                    ?>
                                </div>
                            </div><br/>
                            <div class="profile-left">
                                <h3>Company</h3>
                                <div class="form-group">
                                    <label class="col-sm-4 contact-label-text">Company Name</label>
                                    <div class="col-sm-8 margin_10_top">
                                        <input type="text" class="form_bor_bot" name="user_company_name" id="companyname" placeholder="Company Name" value="<? echo $customer_data['user_company_name'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Company Type</label>
                                    <div class="col-sm-8 margin_10_top">

                                        <select class="form_bor_bot" id="user_company_type" name="user_company_type">
                                            <option value="">Select Company Type</option> 
                                            <option value="Partnership" <?php
                                            if ($customer_data['user_company_type'] == 'Partnership') {
                                                echo "selected";
                                            }
                                            ?>>Partnership</option>
                                            <option value="Proprietorship" <?php
                                            if ($customer_data['user_company_type'] == 'Proprietorship') {
                                                echo "selected";
                                            }
                                            ?>>Proprietorship</option>
                                            <option value="Private Limited" <?php
                                            if ($customer_data['user_company_type'] == 'Private Limited') {
                                                echo "selected";
                                            }
                                            ?>>Private Limited</option>
                                            <option value="Public Limited" <?php
                                            if ($customer_data['user_company_type'] == 'Public Limited') {
                                                echo "selected";
                                            }
                                            ?>>Public Limited</option>
                                            
                                           <option value="Freelancer"<?php
                                            if ($customer_data['user_company_type']=='Freelancer') {
                                                echo "selected";
                                            }
                                            ?>>Freelancer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">GSTIN</label>
                                    <div class="col-sm-8 margin_10_top">
                                        <input type="text" class="form_bor_bot alphaCapNumeric" name="user_gst_no" id="user_gst_no" placeholder="GSTIN" value="<? echo $customer_data['user_gst_no'];?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">PAN</label>
                                    <div class="col-sm-8 margin_10_top">
                                        <input type="text" class="form_bor_bot alphaCapNumeric" name="user_pan_no" id="user_pan_no" minlength="10" maxlength="10" placeholder="PAN" value="<?php echo $customer_data['user_pan_no']; ?>">
                                    </div>
                                </div>
                            </div><br/>
                           
                        </div>

                        <div class="col-sm-6 pading_right_0">
                            <div class="contact-right-text comp-profile-img" style="">
                                <center>
                                    <?php if ($customer_data['u_avatar']) { ?>
                                        <img src="<?php echo site_url() . "uploads/customer/" . $customer_data['u_avatar'] ?>" width="" class="img-responsive" />
                                        <?php
                                        $c++;
                                    } else {
                                        ?>
                                        <img src="<?php echo theme_url() . "/images/PersonPlaceholder.png" ?>" width="" class="img-responsive" />
                                    <?php } ?>
                                </center>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div><br/>
                             <div class="profile-left">
                                <h3>Contact</h3>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Email Address</label>
                                    <div class="col-sm-8 margin_10_top">
                                        <input type="email" class="form_bor_bot" name="email" id="email" placeholder="Email Address"  value="<?php echo $customer_data['u_email'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Mobile No</label>
                                    <div class="col-sm-8 margin_10_top">
                                        <input type="text" class="form_bor_bot numbersOnly" name="u_mobileno" id="mobile" minlength="10" maxlength="10" placeholder="Mobile Number" value="<?php echo $customer_data['u_mobileno'] ?>" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label  class="col-sm-4 contact-label-text">Website</label>
                                    <div class="col-sm-8 margin_10_top">
                                        <input type="text" class="form_bor_bot" name="user_company_website" id="website" placeholder="Website" value="<?php echo $customer_data['user_company_website']; ?>">
                                    </div>
                                </div>
                            </div><br/>
                            <div class="profile-left">
                                <h3>Specific Interests</h3>
                                <?php
                                if ($userTypeList) {
                                    if ($customer_data['specific_interests']) {
                                        $specificInterests = explode(",", $customer_data['specific_interests']);
                                    }
                                    foreach ($userTypeList as $rowType) {
                                        ?>
                                        <div class="col-sm-6">
                                            <div class="form-group checkbox profile-checkbox-label">
                                                <label>
                                                    <input type="checkbox" name="specificInterests[]"  id="specificInterests" value="<?= $rowType['utid'] ?>" <?php
                                                    if (in_array($rowType['utid'], $specificInterests)) {
                                                        echo "checked";
                                                    }
                                                    ?>><?= $rowType['type_name'] ?></label>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>
                            <!-- <div id="exTab2" class="col-sm-12 padd-0" style="margin-top:;">
                                <ul class="nav nav-tabs profile-tabs">
                                    <?php
                                    if ($customerContactList) {
                                        $c = 1;
                                        foreach ($customerContactList as $rowCustomer) {
                                            ?>
                                            <li class="col-sm-4 padd-0 <?php
                                            if ($c == 1) {
                                                echo "active";
                                            }
                                            ?>"> <a  href="#<?php
                                                    if ($j == 1) {
                                                        echo "active";
                                                    }
                                                    ?>" data-toggle="tab">Contact Details <?php echo $c; ?></a> </li>
                                                <?php
                                                $c++;
                                            }
                                        } else {
                                            ?>
                                        <li class="col-sm-4 padd-0 <?php
                                        if ($c == 1) {
                                            echo "active";
                                        }
                                        ?>"> <a  href="#<?php
                                                if ($j == 1) {
                                                    echo "active";
                                                }
                                                ?>" data-toggle="tab">Contact Details</a> </li>
                                        <?php } ?>
                                </ul>
                                <div class="tab-content">
                                    <?php
                                    if ($customerContactList) {
                                        $c = 1;
                                        foreach ($customerContactList as $rowContact) {
                                            ?>

                                            <?php $c++; ?>
                                            <div class="tab-pane active <?php
                                            if ($c == 1) {
                                                echo "active";
                                            }
                                            ?>" id="<?php echo $c; ?>">
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">Contact Person Name</label>
                                                    <div class="col-sm-7 margin_10_top">
                                                        <input type="text" class="form_bor_bot alphaSpace" name="contact_person_name_<?php echo $rowContact['uc_id']; ?>" id="contact_person_name" placeholder="Contact Person Name" value="<?php echo $rowContact['contact_person_name']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">Office Phone No</label>
                                                    <div class="col-sm-7 margin_10_top">
                                                        <input type="text" class="form_bor_bot numbersOnly" name="office_phone_no_<?php echo $rowContact['uc_id']; ?>" id="office_phone_no" placeholder="Office Phone No" value="<?php echo $rowContact['office_phone_no']; ?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">Email</label>
                                                    <div class="col-sm-7 margin_10_top"> 
                                                        <input type="email" class="form_bor_bot" name="email_id_<?php echo $rowContact['uc_id']; ?>" id="email_id" placeholder="Email" value="<?php echo $rowContact['email_id']; ?>" />
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="contactId[]" value="<?php echo $rowContact['uc_id']; ?>">
                                            <?php
                                        }
                                    }
                                    ?>
                                </div>
                            </div>
                            <div class="clearfix"></div><br/>
                            <div id="exTab12" class="col-sm-12 padd-0">
                                <ul class="nav nav-tabs profile-tabs">
                                    <?php
                                    if ($customerAddressList) {
                                        $j = 1;
                                        foreach ($customerAddressList as $rowCustomer) {
                                            ?>
                                            <li class="col-sm-4 padd-0 <?php
                                            if ($j == 1) {
                                                echo "active";
                                            }
                                            ?>"> <a  href="#<?= $rowCustomer['u_address_id'] ?>" data-toggle="tab">Address Details <?= $j ?></a> </li>
                                                <?php
                                                $j++;
                                            }
                                        } else {
                                            ?>
                                        <li class="col-sm-4 padd-0 <?php
                                        if ($j == 1) {
                                            echo "active";
                                        }
                                        ?>"> <a  href="#<?= $rowCustomer['u_address_id'] ?>" data-toggle="tab">Address Details</a> </li>
                                        <?php } ?>
                                </ul>
                                <div class="tab-content">
                                    <?php
                                    if ($customerAddressList) {
                                        $j = 1;
                                        foreach ($customerAddressList as $rowCustomer) {
                                            ?>
                                            <div class="tab-pane <?php
                                            if ($j == 1) {
                                                echo "active";
                                            }
                                            ?>" id="<?= $rowCustomer['u_address_id'] ?>">
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">Address 1</label>
                                                    <div class="col-sm-7 margin_10_top">
                                                        <input type="text" class="form_bor_bot" name="address1_<?= $rowCustomer['u_address_id'] ?>" id="address1" placeholder="Address 1" value="<? echo $rowCustomer['address1'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">Address 2</label>
                                                    <div class="col-sm-7 margin_10_top">
                                                        <input type="text" class="form_bor_bot" name="address2_<?= $rowCustomer['u_address_id'] ?>" id="address2" placeholder="Address 2" value="<? echo $rowCustomer['address2'];?>">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">Country</label>
                                                    <div class="col-sm-7 margin_10_top"> 
                                                        <select class="form_bor_bot" name="country_name_<?= $rowCustomer['u_address_id'] ?>" id="country_id_<?= $rowCustomer['u_address_id'] ?>" class="form-control" onChange="countryAddress(this.value,<?= $rowCustomer['u_address_id'] ?>)">
                                                            <option value="">Select Country</option>
                                                            <?php
                                                            if ($countryList) {
                                                                foreach ($countryList as $rowCountry) {
                                                                    ?>
                                                                    <option value="<?= $rowCountry['id'] ?>" <?php
                                                                    if ($rowCountry['id'] == $rowCustomer['country']) {
                                                                        echo "selected";
                                                                    }
                                                                    ?> ><?= $rowCountry['country_name'] ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>	 
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">State</label>
                                                    <div class="col-sm-7 margin_10_top"> 
                                                        <select class="form_bor_bot"  name="state_name_<?= $rowCustomer['u_address_id'] ?>" id="stateAddress<?= $rowCustomer['u_address_id'] ?>" class="form-control" onChange="stateAddress(this.value,<?= $rowCustomer['u_address_id'] ?>)">
                                                            <option value="">Select State</option>
                                                            <?php
                                                            $stateList = $this->state_model->getStateList($rowCustomer['country']);
                                                            if ($stateList) {
                                                                foreach ($stateList as $rowState) {
                                                                    ?>
                                                                    <option value="<?= $rowState['sid'] ?>" <?php
                                                                    if ($rowState['sid'] == $rowCustomer['state']) {
                                                                        echo "selected";
                                                                    }
                                                                    ?> ><?= $rowState['state_name'] ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>		
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">City</label>
                                                    <div class="col-sm-7 margin_10_top">
                                                        <select class="form_bor_bot" name="city_name_<?= $rowCustomer['u_address_id'] ?>" id="cityAddress<?= $rowCustomer['u_address_id'] ?>"  >
                                                            <option value="">Select City</option> 
                                                            <?php
                                                            $cityList = $this->city_model->getCityList($rowCustomer['state']);
                                                            if ($cityList) {
                                                                foreach ($cityList as $rowCity) {
                                                                    ?>
                                                                    <option value="<?= $rowCity['id'] ?>" <?php
                                                                    if ($rowCity['id'] == $rowCustomer['city']) {
                                                                        echo "selected";
                                                                    }
                                                                    ?> ><?= $rowCity['city_name'] ?></option>
                                                                            <?php
                                                                        }
                                                                    }
                                                                    ?>
                                                        </select>	
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="col-sm-5 contact-label-text">Post Code</label>
                                                    <div class="col-sm-7 margin_10_top">
                                                        <input type="text" class="form_bor_bot numbersOnly" name="pincode_<?= $rowCustomer['u_address_id'] ?>" id="pincode" minlength="6" maxlength="6" placeholder="Post Code" value="<? echo $rowCustomer['pincode'];?>">
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="hidden" name="addressId[]" value="<?php echo $rowCustomer['u_address_id']; ?>">
                                            <?php
                                            $j++;
                                        }
                                    }
                                    ?>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="clearfix"></div><br/>
                    <div>
                        <center><input type="submit" name="btnUpdate" class="btn btn_orange" value="Update Profile"> </center>
                    </div>
                    <input type="hidden" name="old_user_profile"  value="<?php echo $customer_data['u_avatar']; ?>"/>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- /.col-sm-6 col-lg-6 col-lg-offset-1--> 
<?php $this->template->contentBegin(POS_BOTTOM); ?><!-- 
<script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script> -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/additional-methods.js"></script>
<script type="text/javascript">

                                                    $(function () {
                                                        $("#datepicker").datepicker({dateFormat: "dd-M-yy", maxDate: 0, changeMonth: true, changeYear: true, yearRange: "-70:+0"}).val()
                                                    });
                                                    jQuery('.numbersOnly').keyup(function () {
                                                        this.value = this.value.replace(/[^0-9\.]/g, '');
                                                    });
                                                    jQuery('.lettersOnly').keyup(function () {
                                                        this.value = this.value.replace(/[^A-Za-z\.]/g, '');
                                                    });
                                                    jQuery('.alphaSpace').keyup(function () {
                                                        this.value = this.value.replace(/[^A-Za-z \.]/g, '');
                                                    });
                                                    jQuery('.alphaNumeric').keyup(function () {
                                                        this.value = this.value.replace(/[^A-Za-z0-9\.]/g, '');
                                                    });
                                                    jQuery('.alphaCapNumeric').keyup(function () {
                                                        this.value = this.value.replace(/[^A-Z0-9\.]/g, '');
                                                    });
                                                    jQuery.validator.addMethod("valemail", function (value, element) {
                                                        return this.optional(element) || /^([a-zA-Z0-9_.\-+])+\@(([a-zA-Z0-9-])+.)+([a-zA-Z0-9]{2,4})$/i.test(value);
                                                    }, "Please enter a valid email address.");

                                                    jQuery.validator.addMethod("valPan", function (value, element) {
                                                        return this.optional(element) || /[A-Za-z]{5}\d{4}[A-Za-z]{1}/g.test(value);
                                                    }, 'Please enter a valid PAN number');

                                                    jQuery.validator.addMethod("valGst", function (value, element) {
                                                        return this.optional(element) || /[0-9]{2}[A-Z]{5}[0-9]{4}[A-Z]{1}[1-9A-Z]{1}Z[0-9A-Z]{1}/g.test(value);
                                                    }, 'Please enter a valid GST number');

                                                    $("#editprofile").validate({
                                                        rules: {
                                                            user_gst_no: {
                                                                valGst: true
                                                            },
                                                            user_pan_no: {
                                                                valPan: true
                                                            },
                                                            email: {
                                                                valemail: true
                                                            },
                                                        },
                                                        messages: {}
                                                    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script type="text/javascript">
                                                    $(document).ready(function () {
                                                        $('.js-example-basic-multiple').select2();
                                                    });
</script>
<script src="<?= $theme_url ?>/js/location.js"></script> 
<?php echo $this->template->contentEnd(); ?> 