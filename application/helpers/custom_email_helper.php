<?php

/*
  $email_array = array(
  "from_name" =>
  "from_mail" =>
  "to_mail" =>
  "cc" =>
  "bcc" =>
  "subject" =>
  "body" =>
  );
 */

function send_mail($param = array()) {
    // get instance of codeigniter
    /* $CI = & get_instance();
    $CI->load->model("email_master/email_model");
    $settings = $CI->email_model->getEmailData();
    if ($settings) {
        $default_from = $settings["from_mail"];
        $default_to = $settings["to_mail"];
        $default_cc = $settings["cc_mail"];
        $default_bcc = $settings["bcc_mail"];
    } */


    // include file
    require_once "Mail.php";

    if (!$param["from_mail"])
        $param["from_mail"] = $default_from;

    // from
    $from = $param["from_mail"];
    if ($param["from_name"]) {
        $from = $param["from_name"] . " <" . $param["from_mail"] . ">";
    }

    if (!$param["to_mail"])
        $param["to_mail"] = $default_to;

    // to
    $to = $param["to_mail"];
    if ($param["to_name"]) {
        $to = $param["to_name"] . " <" . $param["to_mail"] . ">";
    }

    // cc
    $cc = ($param["cc"]) ? explode($param["cc"]) : array();
    $cc[] = $default_cc;
    $cc = implode(",", $cc);

    // bcc
    $bcc = ($param["bcc"]) ? explode($param["bcc"]) : array();
    $bcc[] = $default_bcc;
    $bcc = implode(",", $bcc);

    // subject
    $subject = $param["subject"];

    // body
    $body = $param["body"];

    // header
    $headers = array();
    $headers['From'] = $from;
    $headers['To'] = $to;
    if ($cc) {
        $headers["Cc"] = $cc;
    }
    if ($bcc) {
        $headers["Bcc"] = $bcc;
    }
    $headers['Content-type'] = ' text/html; charset=iso-8859-1';
    $headers['Subject'] = $subject;

    // config
    // $host = "ssl://secure.emailsrvr.com";
    // $port = "465";
    // $username = "iamtesting@istop.us";
    // $password = "St@rlabs10";

    $host = "smtp.sendgrid.net";
    $port = "587";
    $username = "csuistop";
    $password = "B0aUpJ8M";

    // smtp settings
    $smtp = Mail::factory('smtp', array(
                'host' => $host,
                'port' => $port,
                'auth' => true,
                'username' => $username,
                'password' => $password
                    )
    );

//    print_r($headers);
//    return;


//    $mail = true;
    
    $mail = $smtp->send($to, $headers, $body);
    if (PEAR::isError($mail)) {
        //echo("<p>" . $mail->getMessage() . "</p>");
        return false;
    } else {
        //echo("<p>Message successfully sent!</p>");
        return true;
    }
}

?>