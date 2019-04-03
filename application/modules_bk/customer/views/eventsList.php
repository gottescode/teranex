<div class="container-fluid myprofile-bg dahboard-bg">
    <div class="container">
        <div class="col-sm-4 padd-0">
            <ul>
                <li class="myprofile">Events List</li>
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

<div class="row margin_0" style="background-color: #353537;">
    <?php $this->load->view("cust_side_menu"); ?> 
    <div class="bg_white">
        <div class="col-lg-10 col-md-9 col-sm-9 col-xs-12">  
            <?php
            // display messages
            if (hasFlash("dataMsgAddError")) {
                ?>
                <div class="alert alert-warning alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo getFlash("dataMsgAddError"); ?>
                </div>
            <?php } ?>
            <?php
            if ($eventList) {
                ?>
                <table id='' class="table table-striped table-hover">
                    <thead>
                        <tr bgcolor="#CCCCCC"><td>S.No</td><td>Event Name</td><td>Participant No</td><td>Start Date</td><td>Time</td>  <td>Action</td> <td>Action Event</td> <td>Join Event</td> </tr>
                    </thead>
                    <tbody>
                        <?php
                        $SNo = 1;
                        foreach ($eventList as $rowData) {
                            ?>
                            <tr>
                                <td><? echo $SNo;?></td>
                                <td><? echo $rowData['event_name'];?></td> 
                                <td><? echo $rowData['participant_no'];?></td>
                                <td><? echo date_dmy($rowData['event_start_date']);?></td>  
                                <td><? echo $rowData['event_start_time'];?></td>   
                                <td><a href="<?php echo site_url() . "customer/eventAssignAttendee/" . $rowData['eb_id'] ?>"  >Attendee Assign</a></td>
                                <?php
                                $user_email = $this->session->userdata('user_email');
                                if ($rowData['organizer_name'] == $user_email) {

                                    if ($rowData['event_status'] == 1) {
                                        ?>
                                        <td>
                                            <a class="btn btn-success btn-sm" onClick="myStart(this)" data-id="<?php echo $rowData['event_id']; ?>">Start Event</a></td>
                                    <?php } else if ($rowData['event_status'] == 0) {
                                        ?>
                                <input type="hidden" claas="form-control" id="event_end_time" value="<?php echo $rowData['event_end_time']; ?>"/>
                                <td><a onclick="myClose(this)"  class="btn btn-danger btn-sm" data-id="<?php echo $rowData['event_id']; ?>" >Close Event</a></td>

                                <?php
                            }
                        } else {
                            ?>
                            <td></td>


                            <?php
                        }
                        if ($rowData['organizer_name'] != $user_email) {
                            if ($rowData['session_id'] != '') {
                                ?>
                                <td><a onclick="myJoinEvent(this)" class="btn btn-info btn-sm" data-id="<?php echo $rowData['event_id']; ?>">Join Event</a></td>

                                <?php
                            }
                        }
                        ?>
                        </tr>
                        <?
                        $SNo ++;
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php
                }
                ?>
            </div> 
            <div class="clearfix"></div>
        </div>
    </div> 

    <?php $this->template->contentBegin(POS_BOTTOM); ?>
    <script>
        function myStart(elem) {
            var event_id = $(elem).data("id");
            //alert(event_id);

            if (confirm('Do you want to start event ?'))
            {
                $.ajax({
                    url: "<?php echo site_url(); ?>customer/start_event_organizer",
                    data: {event_id: event_id},
                    dataType: "json",
                    type: "post",
                    success: function (data) {
                        // alert(data.sessionId);
                        window.open("<?php echo site_url(); ?>customer/opentok/" + event_id, "_blank");
                        window.location.reload();

                    }
                });
            }
        }
    </script>
    <script>
        function myClose(elem) {
            var event_id = $(elem).data("id");

            if (confirm('Do you want to close event ?'))
            {
                $.ajax({
                    url: "<?php echo site_url(); ?>customer/close_event",
                    data: {event_id: event_id},
                    dataType: "json",
                    type: "post",
                    success: function (data) {
                        alert('Close event successfully');
                        window.location.reload();
                    }
                });
            }
        }

    </script>
    <script>

        function myJoinEvent(elem) {
            //alert(join_event_id);
              var join_event_id = $(elem).data("id");
            if (confirm('Do you want to Join event ?'))
            {

                window.open("<?php echo site_url(); ?>/customer/opentok/" + join_event_id, "_blank");

            }

        }

    </script>
    <script>

        // close event using onload
        $(window).load(function () {
            var current_time = '<?php echo date('H:i:A'); ?>';
            var event_end_time = '<?php
    foreach ($eventList as $key) {
        $event_end_time = $key['event_end_time'];

        echo '' . $event_end_time . ',';
    }
    ?>';
            var s = event_end_time;
            var end_time = s.slice(0, s.lastIndexOf(","));
            // alert("window load occurred!" + end_time);
            if (event_end_time == end_time) {
                $.ajax({
                    url: "<?php echo site_url(); ?>customer/close_event",
                    data: {event_id: event_id},
                    dataType: "json",
                    type: "post",
                    success: function (data) {
                        alert('Close event successfully');
                        window.location.reload();
                    }
                });
            }
        });



    </script>
    <?php $this->template->contentEnd(); ?> 