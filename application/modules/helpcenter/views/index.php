
<section class="banner banner_image help_banner align-items-center">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="banner_text">
                    <p>Teranex Help Center</p>

                    <div class="selct-box get_start">
                        <p>I need help with</p>
                        <div class="arrow">
                            <select name="" id="" class="dropdow" >
                                <option value="New">Getting Started</option>
                                <option value="New">Item I</option>
                                <option value="New">Item II</option>
                                <option value="New">Item III</option>
                            </select>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
    </div>
</section>

    <section class="mrgn-top">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="sort-catg bx-shdw padd_all_50 white">
                        <div class="sort-text">
                            <div class="search_sec">
                                <div class="parnt_serch  help_seerch parnt_serch_respn">
                                    <p class="">Search</p>
                                    <div class="serchbar mar-lt-rt bx-shdw">
                                        <input type="text" placeholder="Enter your kewords...">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


            <section class="mrgn-top">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="bx-shdw padd_all_50 help_sign_box white">
                                <h3>How do I sign up?</h3>
                                <p class="mrgn-top">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries.</p>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="bx-shdw padd_all_50 help_sign_box resp_15_help white">
                                        <h3 class="padin-15">How do I sign in the Teranex Web Platform?</h3>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="bx-shdw padd_all_50 help_sign_box resp_15_help white">
                                        <h3 class="padin-15">How do I sign in the Teranex Web Platform?</h3>
                                    </div>
                                </div>
                                <div class="col-md-6 mrgn-top">
                                    <div class="bx-shdw padd_all_50 help_sign_box resp_15_help white">
                                        <h3 class="padin-15">How do I sign in the Teranex Web Platform?</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <div class="col-sm-8 padd-0">
                <div class="tab-content helpcenter_info">
                    <div class="tab-pane fade in active">

                        <div class="helpcenter-heading">
                            <p class="padd_5"><?php echo $helpcenter_list['sub_cat_name'] ?></p>
                        </div>
                        <p><?php echo html_entity_decode($helpcenter_list['sub_cat_description']); ?></p>

                    </div>

                </div>
            </div>

            <section>
                <div class="container">
                    <div class="row ">
                        <div class="col-12">
                            <div class="padd_tb_50">
                                <h3 class="basic-head">Quick Links</h3>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="padd_all_50 bx-shdw quk_link white">
                                <ul>
                                    <li><a href="<?php echo site_url()."footer/submitAdispute";?>">Submit a Dispute</a></li>
                                    <li><a href="<?php echo site_url()."pages/ReportAbuse";?>">Report Abuse</a></li>
                                    <li><a href="<?php echo site_url()."footer/payLater";?>">Pay Later</a></li>
                                </ul>
                                <ul>
                                    <li><a href="<?php echo site_url()."pages/getPaidForYourFeedback";?>">Get Paid for Feedback</a></li>
                                    <li><a href="<?php echo site_url()."footer/tradeAssurance";?>">Trade Assurance</a></li>
                                    <li><a href="<?php echo site_url()."footer/businessIdentity";?>">Business Identity</a></li>
                                </ul>
                                <ul>
                                    <li><a href="<?php echo site_url()."footer/inspectionService";?>">Inspection Service</a></li>
                                    <li><a href="<?php echo site_url()."footer/securePayment";?>">Secure Payments</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>


<!-- <script type="text/javascript">
    function updateClick(element) {
    var id = $(element).data('assigned-id');
   //alert(id);
     $.ajax({

           	type: "POST",
			url: "<?php echo base_url(); ?>" + "helpcenter/index/" +id,
			dataType: 'json',
			data: {id: id},
			success: function(res) {

				alert(res);
			}


        });
}

</script> -->

