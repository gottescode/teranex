<?php
// Send Mail
$to = "technopia.in@gmail.com";
$subject = "My subject";
$txt = "Hello world!";
$headers = "From: gmail@gmail.com" . "\r\n" .
"CC: gmail@gmail.com";

echo mail($to,$subject,$txt,$headers);
?>