 
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
  print_r($params);
  print_r($_SERVER);
  echo "</pre>";
?>


  </body>
</html>