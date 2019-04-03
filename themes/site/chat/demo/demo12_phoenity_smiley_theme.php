<?php

require_once dirname(__FILE__)."/../src/phpfreechat.class.php";

  $params["serverid"]    = md5(__FILE__); // calculate a unique id for this chat
$params["title"]       = "A chat with a customized smiley theme (phoenity theme)";
$params["nick"]        = "guest";  // setup the intitial nickname
$params["theme"]       = "phoenity";
$params["theme_default_path"] = "http://192.168.0.104/teranex/";
$params["theme_default_url"] = "http://192.168.0.104/teranex/";
$params["theme_path"] = "http://192.168.0.104/teranex/";
$params["theme_url"] = "http://192.168.0.104/teranex/";
$chat = new phpFreeChat( $params );

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>phpFreeChat demo</title>

    <?php $chat->printJavascript(); ?>
    <?php $chat->printStyle(); ?>

  </head>

  <body>
    <?php $chat->printChat(); ?>
 
<?php
  echo "<h2>Debug</h2>";
  echo "<pre>";
  $c =& pfcGlobalConfig::Instance();
  print_r($c); 
  echo "</pre>";
?>
  </body>
</html>