<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">Service Parts List</li>
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
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC">
						<td>Sr.No</td>
						<td>Name</td>
						<td>Category</td>
						<td>Type</td> 
						<td>Brand</td>
						<td>Frequency</td>
						<td>Quantity</td>
						<td>Status</td>
						<td>Action</td></tr>
                    </thead>
                    <tbody>
						<?php if($rfqData['result']){ $i=1;
								foreach($rfqData['result'] as $row){?>
									<tr>
										<td><?=$i++?></td>
										<td><?=$row['servicepart_name']?></td>
										<td><?=$row['servicepart_category']?></td>
										<td><?=$row['servicepart_type']?></td>
										<td><?=$row['servicepart_brand']?></td>
										<td><?=$row['cons_freq']?></td>
										<td><?=$row['service_quantity']?></td>
										<td>
									<?php if($row['quote_price_by_admin']>0){ ?>
										Accepted
									<? }else{
										echo "Requested";										
									} ?>
								</td> 
                                <td>
									<?php if($row['quote_price_by_admin']>0){ ?>
									
									<a href="<?php echo site_url() ?>customer/groupbuying/quoatationDetailsServiceParts/<?=$row['id']; ?>" class= "btn btn-xs" >Quotation</a> 	
									<? } ?>&nbsp; &nbsp; 
									
								</td>
										
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