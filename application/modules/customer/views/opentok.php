<?php
require "vendor/autoload.php";

use OpenTok\OpenTok;
use OpenTok\Session;
use OpenTok\Role;
use OpenTok\MediaMode;
use GuzzleHttp\HandlerStack;

$API_KEY = "46220382";
$API_SECRET = "8dd0dafebf26232084c7e3183ee154fa25ecca0b";
$opentok = new OpenTok($API_KEY, $API_SECRET);

// Create a session that attempts to use peer-to-peer streaming:
$session = $opentok->createSession();
$session = $opentok->createSession(array('mediaMode' => MediaMode::ROUTED));
// Store this sessionId in the database for later use
//$sessionId = $session->getSessionId();
//$token = $opentok->generateToken($sessionId);
?>

<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <link href="<?php echo site_url(); ?>/assets/app.css" rel="stylesheet" type="text/css">
        <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

        <script type="text/javascript">
            var apiKey = '<?php echo $API_KEY; ?>';
            var sessionId = '<?php echo $result[0]['session_id']; ?>';
            var token = '<?php echo $result[0]['token_id']; ?>';
            var u_name = '<?php echo $this->session->userdata('user_email'); ?>';

    //alert(''+sessionId+'<br>'+token+'<br>'+apiKey+''+u_name);

            function myEndEvent() {

                var event_id = '<?php echo $result[0]['event_id']; ?>';
                var apiKey = '<?php echo $API_KEY; ?>';
                var sessionId = '<?php echo $result[0]['session_id']; ?>';
                //alert(event_id+'id'+apiKey+'key'+sessionId);
                if (confirm('Do you want to end event ?'))
                {

                    var session = OT.initSession(apiKey, sessionId);
                    session.on("sessionDisconnected", function (event) {
                        alert("The session disconnected. " + event.reason);
                    });

                    //window.location.replace("<?php echo site_url(); ?>/customer/eventsList");
                    window.location = '<?php echo site_url(); ?>/customer/close_event/' + event_id;
                }
            }
            
            
                

            

        </script>
        <script src="<?php echo site_url(); ?>/assets/app.js"></script>
    </head>
    <body>
        <button id="publish">Publish</button>
    <?php 
    $user_email=$this->session->userdata('user_email');
    if ($result[0]['organizer_name']==$user_email) { ?>  
 <button id="unpublish">Stop Meeting</button>
 <?php } ?>
    <div id="videos">
        <div id="subscriber"></div>
        <div id="publisher"></div>
    </div>
        

    </body>
</html>