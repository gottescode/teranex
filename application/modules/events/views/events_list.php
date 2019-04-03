<?php $this->template->contentBegin(POS_TOP); ?>
<link href="<?php echo $theme_url ?>/css/fullcalendar.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo $theme_url ?>/css/fullcalendar.print.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?php echo $theme_url; ?>/css/events.css"/>
<style>
    #calendar{padding: 10px 0 0 10px;}
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
                                            <a href="#" data-toggle="modal" data-target="#eventModal" class="eventDataPopup" event-name="<?php echo $rowEvent['event_name']; ?>" event_level ="<?php echo $rowEvent['event_level']; ?>" event_cat_name ="<?php echo $rowEvent['event_cat_name']; ?>" event-id="<?php echo $rowEvent['event_id']; ?>" DatePreference="<?php echo date_dmy($rowEvent['event_start_date']); ?>"  eventPrice="<?php echo $rowEvent['event_price']; ?>" >
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

                  

                        });
                        $("#participant_no").change(function (e) {
                            var participant_no = $(this).val();
                            var eventPrice = $("#eventPrice").val();
                            var totalPrice = parseInt(eventPrice) * parseInt(participant_no);
                            $('#totalPrice').val(totalPrice);
                        });
                    });
              

</script>
<!-- <script src="<?= $theme_url ?>/js/jquery.validate.min.js"></script> -->  
<script>
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
            //  required:true
            // },
            // totalPrice:{
            //  required:true
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