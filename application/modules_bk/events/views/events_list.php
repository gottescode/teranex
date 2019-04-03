<?php $this->template->contentBegin(POS_TOP); ?>
<link href="<?php echo $theme_url ?>/css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $theme_url ?>/css/fullcalendar.print.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/css/events.css"/>
<style>
    #calendar{padding: 10px 0 0 10px;}
    .fc-time{
        display:none;
    }
</style>
<?php echo $this->template->contentEnd(); ?> 
<div class="">
    <img class="img-responsive bnr-images" src="<?php echo $theme_url ?>/images/events_banner.jpg" alt="">
</div>
<div class="container gray-bg padd-0">
    <div class="col-sm-5 padd-0"> 
        <h2>Events List</h2>
        <?php // display messages
        if (hasFlash("eventErrorMsg")) {
            ?>
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo getFlash("eventErrorMsg"); ?>
            </div>
<?php } ?>
        <div class="">
            <div class="col-sm-12 event_list padd-0">
                <!-- Fluid width widget -->        
                <div class="panel list-scroll" >
                    <div class="panel-body padd-0 padd-t-10">
                        <ul class="media-list">
                            <?php if ($event_list) {
                                foreach ($event_list as $rowEvent) {  //print_r($rowEvent);exit; 
                                    ?>
                                    <li class="media" >
                                            <?php if ($this->session->userdata('uid')) { ?>
                                            <a href="#" data-toggle="modal" data-target="#eventModal" class="eventDataPopup" event-name="<?php echo $rowEvent['event_name']; ?>" event_level ="<?php echo $rowEvent['event_user_limit']; ?>" event_cat_name ="<?php echo $rowEvent['event_cat_name']; ?>" event-id="<?php echo $rowEvent['event_id']; ?>" DatePreference="<?php echo  date_dmy($rowEvent['event_start_date']); ?>"  eventPrice="<?php echo $rowEvent['event_price']; ?>" >
                                                <?php } else { ?>
                                                <a  href="#" data-toggle="modal" data-target="#signinModal">
        <?php } ?>
                                                <div class="media-left">
                                                    <div class="panel panel-danger text-center date">
                                                        <div class="panel-heading month">
                                                            <span class="panel-title strong">
        <?php echo date('M', strtotime($rowEvent['event_start_date'])) ?>
                                                            </span>
                                                        </div>
                                                        <div class="panel-body day text-danger">
        <?php echo date('d', strtotime($rowEvent['event_start_date'])) ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><?php echo $rowEvent['event_name']; ?></h4>
                                                    <p class="rcomment readmore">
                                                        <?php
                                                        $text = strhtmldecode($rowEvent['event_description']);
                                                        $text = strip_tags($text);
                                                        echo $text = str_ireplace('</p>', '', $text);
                                                        ?>
                                                        <!--<?php echo strhtmldecode($rowEvent['event_description']); ?>--> 
                                                    </p> 
                                                </div>
                                            </a>
                                            <hr/>
                                    </li>
    <?php }
} ?> 
                        </ul>
                    </div>
                </div>
                <!-- End fluid width widget --> 

            </div>
        </div>
    </div>
    <div class="col-sm-7 padd-0"> 
        <h2>Event Calendar</h2>
        <div id='calendar'></div>
    </div>
</div>
<style type="text/css">
    .checkbox label.error{
        color: red;
        position: absolute;
        padding-left: 0;
        margin-top: 15px;
    }
</style>
<!-- Modal -->
<div class="modal fade" id="eventModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h1 class="modal-title">Request Join The Event</h1></center>
            </div>
            <div class="modal-body">
                <div class="col-sm-12s padd-0  border_bot">
<?php echo form_open(site_url() . "events/eventbooking", array("class" => "form-horizontal eventList")) ?>
                    <div class="form-group padd-0">
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot lettersOnly" id="user_name" name="user_name" placeholder="User Name" value="<?php echo $this->session->userdata('u_name') ?>" required><span class="compulsary">*</span>
                        </div> 
                        <div class="col-sm-6">
                            <input type="email" class="form_bor_bot input-form" id="user_email" name="user_email" placeholder="Email" value="<?php echo $this->session->userdata('user_email') ?>" required><span class="compulsary">*</span>
                        </div>
                    </div>
                    <div class="form-group padd-0">
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot input-form numbersOnly" id="phone_no" name="phone_no" minlength="10" maxlength="10" placeholder="Phone Number" value="<?php echo $this->session->userdata('u_mobileno'); ?>" required><span class="compulsary">*</span>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot input-form numbersOnlyPartcipate" id="participant_no" name="participant_no" placeholder="Number of Participants " pattern = "[1-9]{1,5}" value="" required><span class="compulsary">*</span>
                        </div>
                    </div>		
                    <div class="form-group padd-0">
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot input-form numbersOnly" id="eventPrice" name="eventPrice" placeholder="Event Price"  value="" readonly>
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot input-form numbersOnly" id="totalPrice" name="totalPrice"   placeholder="Total Amount" value="" readonly>
                        </div>
                    </div>
                    <div class="form-group padd-0">
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot input-form " id="eventCatName" name="eventCatName"  value="" placeholder="Event Category Name" readonly >
                        </div>
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot input-form " id="event_name" name="event_name"  value="" placeholder="Event Name" readonly >
                        </div>
                    </div>
                    <div class="form-group padd-0">
                        <div class="col-sm-6">
                            <input type="text" class="form_bor_bot input-form " id="event_level" name="event_user_limit" placeholder="Event Level"  value="" readonly >
                            <input type="hidden" class="form_bor_bot input-form " id="start_time" name="event_start_time" placeholder=""  readonly >
                            <input type="hidden" class="form_bor_bot input-form " id="end_time" name="event_end_time" placeholder=""  readonly >
                        </div>
                        <div class="col-sm-6">
                            <input type='text' class="form_bor_bot input-form" id='datepicker' name="event_start_date" placeholder="dd/mm/yyyy" value="" readonly />
                        </div>
                    </div>
                    <div class="form-group padd-0">
                        <div class="col-sm-6">
                            <img src="" alt="Random letters" id="captcha" style="margin-top: "/>
                        </div>
                        <div class="col-sm-6">
                            <input id="captcha_image" name="captcha" class="form_bor_bot input-form" type="text" placeholder="Enter the captcha code"><span class="compulsary">*</span>
                        </div>
                        Can't read the image? click <a href='javascript: captcha_refresh();'>here</a> to refresh.
                        <input type="hidden" name="otp_no" id="otp_no" value="<?php echo $otp_no; ?>">
                    </div>
                    <div class="form-group padd-0">
                        <div class="checkbox">
                            <label><span class="red">*</span><input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" />I accept privacy policy
                            </label>
                        </div>
                    </div>
                    <div class="form-group padd-0">
                        <div class="col-sm-12">
                            <center><input type="submit" name="btnEventBooking" id="submit" class="btn input-form adv-search btn_orange" value="Book Event" /></center>
                        </div>
                    </div>
                    <input type="hidden" name="eventId" id="eventId" value="0" />
                    <input type="hidden" name="eid" id="eid" value="<?php echo $eid ?>" />

<?php echo form_close() ?>
                </div>
            </div>
        </div>
    </div>
</div>





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
            <form class="form-signin" name="loginPopop" id="loginPopop" method="post" action="<?php echo base_url(); ?>pages/login">
		    	<?php if(hasFlash("ErrorLoginMsg"))	{	?>
					<div class="alert alert-warning alert-dismissible" role="alert">
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  <?php echo getFlash("ErrorLoginMsg"); ?>
					</div>
				<?php }?>
		        
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
						<span class="pull-right" style="padding-top: 0;"><a href="<?php echo site_url()."pages/signIn";?>">Sign Up</a></span>
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






<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel"> </h4>
            </div>
            <div class="modal-body"> 
                <div class="form-group">
                    <label class="col-md-4 label-heading">Start Date</label>
                    <div class="col-md-8" id=""><span id="start_date"></span> <span id="event_start_time"></span> </div><br/>
                </div>
                <div class="form-group">
                    <label   class="col-md-4 label-heading">End Date</label>
                    <div class="col-md-8" id=""><span id="end_date"></span> <span id="event_end_time"></span> </div><br/>

                </div> 
                <div class="form-group">
                    <label for="p-in" class="col-md-4 label-heading">Description</label>
                    <div class="col-md-8 ui-front" id="description">  </div>
                </div>
            </div>
            <div class="modal-footer">
                <?php if ($this->session->userdata('uid')) { ?>
                    <button class="btn btn_orange" id='joinId'onclick="joinPopup()" event-name="" event_level ="" event_cat_name ="" event-id="" DatePreference=""  eventPrice="">Request To Join</button> 
<?php } else { ?>
                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#signinModal" ><button class="btn btn_orange"  >Join</button></a> 
<?php } ?>

            </div>
        </div>
    </div>
</div>

<!--
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"> </h4>
      </div>
        <div class="modal-body"> 
                   <div class="form-group">
                                        <label class="col-md-4 label-heading">Start Date</label>
                                        <div class="col-md-8" id=""><span id="start_date"></span> <span id="event_start_time"></span> </div><br/>
                        </div>
                        <div class="form-group">
                                        <label   class="col-md-4 label-heading">End Date</label>
                                        <div class="col-md-8" id=""><span id="end_date"></span> <span id="event_end_time"></span> </div><br/>
                                   
                        </div> 
                        <div class="form-group">
                                        <label for="p-in" class="col-md-4 label-heading">Description</label>
                                        <div class="col-md-8 ui-front" id="description">  </div>
                        </div>
                </div>
     <div class="modal-footer">
<?php if ($this->session->userdata('uid')) { ?>
                    <button class="btn btn_orange" onclick="joinPopup()" >Join</button> 
<?php } else { ?>
                    <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#signinModal" ><button class="btn btn_orange"  >Join</button></a> 
<?php } ?>
        
      </div>
    </div>
  </div>
</div>

-->
<?php $enddt = new DateTime('now'); // setup a local datetime
//echo time(); echo"sad asd";
?>
<?php $this->template->contentBegin(POS_BOTTOM); ?> 
<script  src="<?php echo $theme_url; ?>/js/moment.min.js"></script>
<script  src="<?php echo $theme_url; ?>/js/fullcalendar.min.js"></script>  
<script>

                    $(document).ready(function () {

                        $('#calendar').fullCalendar({
                            editable: true,
                            height: 300,
                            header: {
                                left: 'title',
                                center: '',
                                right: 'today prev,next'
                            },

                            eventClick: function (event, jsEvent, view) {
                              var user_id="<?php echo $this->session->userdata('uid'); ?>"
                              if(user_id!=''){
                                $('#myModalLabel').html(event.title);
                                $('#description').html(event.description);
                               // alert(moment(event.start));
                                    $('#start_date').html(moment(event.start).format('DD-MMM-Y'));
                                if (event.end) {
                                    $('#end_date').html(moment(event.end).format('DD-MMM -Y'));
                                } else {
                                    $('#end_date').html(moment(event.start).format('DD-MMM-Y'));
                                }
                                $('#event_id').html(event.id);
                                $('#event_end_time').html(event.event_end_time);
                                $('#end_time').val(event.event_end_time);
                                $('#event_start_time').html(event.event_start_time);
                                $('#start_time').val(event.event_start_time);
                                var myInput = document.getElementById('joinId');
                                myInput.setAttribute('event-name', event.title);
                                myInput.setAttribute('event_level', event.event_user_limit);
                                myInput.setAttribute('event_cat_name', event.event_cat_name);
                                myInput.setAttribute('event-id', event.id);
                                myInput.setAttribute('datepreference', event.event_start_date);
                                myInput.setAttribute('eventprice', event.event_price);
                                //alert(myInput.getAttribute('atul'));
                                $('#editModal').modal();
                            }
                            else{
                                $('#signinModal').modal();
                               //alert('hielse');    
                            }
                            
                            },

                            eventSources: [
                                {
                                    events: function (start, end, timezone, callback) {
                                        $.ajax({
                                            url: '<?php echo site_url() ?>events/get_events',
                                            dataType: 'json',
                                            data: {
                                                // our hypothetical feed requires UNIX timestamps
                                                catId: '<?php echo $eid ?>',
                                                start: start.unix(),
                                                end: end.unix()
                                            },
                                            success: function (msg) {
                                               var events = msg.events;
                                                
                                              //  console.log(events);
                                                callback(events);
                                            }
                                        });
                                    }
                                },
                            ]
                        });
                        $("#participant_no").change(function (e) {
                            var participant_no = $(this).val();
                            var eventPrice = $("#eventPrice").val();
                            var totalPrice = parseInt(eventPrice) * parseInt(participant_no);
                            $('#totalPrice').val(totalPrice);
                        });
                    });
                    function joinPopup() {
                        debugger;
                        var event_id = $('#joinId').attr("event-id");
                        var DatePreference = $('#joinId').attr("DatePreference");
                        var tdusrname = $('#joinId').attr("event-name");
                        var event_level = $('#joinId').attr("event_level");

                      // var data_new=date(DatePreference,"dd-M-yyyy");
                        //alert(data_new);
                      
//var d=new Date(DatePreference.split("-").reverse().join("-"));
//
//var dd=d.getDate();
//var mm=d.getMonth()+1;
//var yy=d.getFullYear();
//var newdate=yy+"-"+mm+"-"+dd;
//alert(newdate);
                        
                        var event_cat_name = $('#joinId').attr("event_cat_name");
                        var eventPrice = $('#joinId').attr("eventPrice");
                        $("#event_name").val(tdusrname);
                        $("#eventId").val(event_id);
                        $("#datepicker").val(moment(DatePreference).format('DD-MMM-Y'));
                        $("#event_level").val(event_level);
                        $("#eventPrice").val(eventPrice);
                        $("#eventCatName").val(event_cat_name);
                        $('#editModal').modal('hide');
                        $('#eventModal').modal('show');
                    }
//readmore
                    $(document).ready(function () {
                        var showChar = 100;
                        var ellipsestext = "...";
                        var moretext = "Read More";
                        var lesstext = "Show Less";
                        $('.readmore').each(function () {
                            var content = $(this).html();
                            if (content.length > showChar) {
                                var c = content.substr(0, showChar);
                                var h = content.substr(showChar - 1, content.length - showChar);
                                var html = c + '<span class="moreellipses">' + ellipsestext + '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
                                $(this).html(html);
                            }
                        });
                        $(".morelink").click(function () {
                            if ($(this).hasClass("less")) {
                                $(this).removeClass("less");
                                $(this).html(moretext);
                            } else {
                                $(this).addClass("less");
                                $(this).html(lesstext);
                            }
                            $(this).parent().prev().toggle();
                            $(this).prev().toggle();
                            return false;
                        });
                    });
                    $(".eventDataPopup").click(function () {

// Populate the modal fields.
                        var event_id = $(this).attr("event-id");
                        var DatePreference = $(this).attr("DatePreference");
                        var tdusrname = $(this).attr("event-name");
                        var event_level = $(this).attr("event_level");
                        var event_cat_name = $(this).attr("event_cat_name");
                        var eventPrice = $(this).attr("eventPrice");
                        $("#event_name").val(tdusrname);
                        $("#eventId").val(event_id);
                        $("#datepicker").val(DatePreference);
                        $("#event_level").val(event_level);
                        $("#eventPrice").val(eventPrice);
                        $("#eventCatName").val(event_cat_name);

                    });
</script>
<!-- <script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script> -->  
<script>
    jQuery('.numbersOnlyPartcipate').keyup(function () {
        this.value = this.value.replace(/[^1-9\.]/g, '');
    });

    jQuery('.numbersOnly').keyup(function () {
        this.value = this.value.replace(/[^0-9\.]/g, '');
    });

    jQuery('.lettersOnly').keyup(function () {
        this.value = this.value.replace(/[^A-Za-z \.]/g, '');
    });
    jQuery.validator.addMethod("valEmail1", function (value, element) {
        return this.optional(element) || /^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/.test(value);
    }, 'Please enter a valid email address');

    $('#eventModal').on('hidden.bs.modal', function () {

        $('.eventList').validate().resetForm();
        $('.error').removeClass('error');
        $(this).find('form').trigger('reset');
    });

    $(".eventList").validate({
        rules: {
            user_name: {
                required: true
            },
            user_email: {
                required: true,
                valEmail1: true
            },
            phone_no: {
                required: true
            },
            participant_no: {
                required: true
            },
            // eventPrice:{
            // 	required:true
            // },
            // totalPrice:{
            // 	required:true
            // },
            captcha: {
                required: true
            },
        },
        messages: {
            user_name: {
                required: "Please enter user name"
            },
            user_email: {
                required: "Please enter email id"
            },
            phone_no: {
                required: "Please enter phone number"
            },
            participant_no: {
                required: "Please enter number of participants"
            },
            captcha: {
                required: "Please enter proper captcha"
            },
        }
    });

    var captchaUrl = "<?php echo base_url(); ?>index.php/captcha?page=joinliveevent";
</script>
<script src="<?= $theme_url; ?>/js/captcha.js"></script> 

<?php echo $this->template->contentEnd(); ?> 