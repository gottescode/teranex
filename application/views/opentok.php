<?php
require "vendor/autoload.php";
use OpenTok\OpenTok;
use OpenTok\Session;
use OpenTok\Role; 
use OpenTok\MediaMode;
$API_KEY = "46220382";
$API_SECRET = "8dd0dafebf26232084c7e3183ee154fa25ecca0b";
$opentok = new OpenTok($API_KEY, $API_SECRET);

// Create a session that attempts to use peer-to-peer streaming:
$session = $opentok->createSession();
$session = $opentok->createSession(array('mediaMode' => MediaMode::ROUTED ));
// Store this sessionId in the database for later use
$sessionId = $session->getSessionId();
$token = $opentok->generateToken($sessionId);

//echo $sessionId.'<br>'.$token.'<br>';die;
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
	<link href="<?php echo site_url();?>/assets/app.css" rel="stylesheet" type="text/css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <script type="text/javascript">
        var apiKey = '<?php echo $API_KEY; ?>';
        var sessionId = '<?php echo $sessionId; ?>';
        var token = '<?php echo $token; ?>';
    </script>
    <script src="<?php echo site_url();?>/assets/app.js"></script>
</head>
<body>
    <div id="publisher"></div>

    <div id="subscribers"></div>
</body>
</html>