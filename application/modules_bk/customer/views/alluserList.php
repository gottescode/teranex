 

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
                <center><h3 style="margin:0;">Add User</h3></center>
                <form class="form" name="alluserform" id="alluserform" method="post" action="">
                    
                    <!-- <div class="form-group">
                            <select class="form_bor_bot" id="usertype" name="usertype">
                                    <option value="">Select User Type</option>
                                    <option value="1">1</option>
                            </select><span class="compulsary">*</span>
                    </div> -->
                    <div class="form-group">
                        <select class="form_bor_bot" id="user_role" name="user_role">
                            <option value="">Select Role</option>
                            <?php foreach ($user_type_role as $userRole) { ?>
                                    <option value="<?php echo  $userRole['id'];?>"<?php if ($userRole['id']==$user_data['user_role']) echo ' selected="selected"'; ?>><?php echo $userRole['roleName']; ?></option>

                            <?php } ?>	
                        </select><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form_bor_bot lettersOnly" id="u_name" name="u_name" placeholder=" Name" value="<? echo $user_data['u_name'];?>"  /><span class="compulsary">*</span>
                    </div><div class="clearfix"></div>

                    <div class="form-group">
                        <input type="email" class="form_bor_bot " id="u_email" name="u_email" placeholder="Email ID" value="<? echo $user_data['u_email'];?>"  /><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form_bor_bot company_code" id="company_code" name="company_code" placeholder="Company code" value="<? echo $user_data['company_code'];?>" /><span class="compulsary">*</span>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form_bor_bot numbersOnly" id="u_mobileno" name="u_mobileno" minlength="10" maxlength="10" placeholder="Phone Number" value="<? echo $user_data['u_mobileno'];?>"  /><span class="compulsary">*</span>
                    </div>
                    
                    <div class="form-group">
<?php 

//print_r($user_data['is_active']);die;
//if($user_data['is_active']!=''){?>
                        <input type="checkbox" name="is_active"  id="is_active" <?php
                        if ($user_data['is_active'] == '') { ?>
                            checked
                       <?php  } ?>  <?php
                        if ($user_data['is_active'] == '1') {
                            echo "value='1' checked";
                        } elseif($user_data['is_active'] == '0') {
                            echo "value='1' unchecked";
                        }
                        ?> /> IsActive?
<?php// } else{ ?>
               <!--         <input type="checkbox" name="is_active"  id="is_active" value="1" checked /> IsActive?
                      -->  
<?php //} ?>
                    </div>
                    <div class="clearfix"></div>
                    <div class="form-group">
                        <center><input type="submit" name="AddCompanyUser" id="submit" class="btn btn_orange" value="Submit" /></center>
                        <input type="hidden" name="uid" value="<? echo $user_data['uid'];?>"  >
                    </div>
                </form>
            </div>
            <div class="clearfix"></div>
            <div>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>Sr.No</td><td>Name</td><td>Role</td><td>Email</td> <td>Phone No.</td><td>Company Code</td><td>Action</td></tr>
                    </thead>
                    <tbody>
                        <?php
                        $SNo = 1;
                        foreach ($AllUser as $alluserdata) {
                            ?>
                            <tr>
                                <td><? echo $SNo;?></td>
                                <td><? echo $alluserdata['u_name'];?></td> 
                                <td><?

                                    foreach($user_type_role as $key){
                                    if($alluserdata['user_role']==$key['id']){

                                    echo $key['roleName']; } }?></td>
                                <td><? echo $alluserdata['u_email'];?></td> 
                                <td><? echo $alluserdata['u_mobileno'];?></td> 
                                <td><? echo $alluserdata['company_code'];?></td> 
                                <td><a href="<?php echo site_url() ?>customer/AlluserUpdate/<?= $alluserdata['uid'] ?>" aria-haspopup="true" title="Update"><i class="fa fa-pencil" aria-hidden="true"></i></a></a></td>
                            </tr>
                            <?php
                            $SNo = $SNo + 1;
                        }
                        ?>
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