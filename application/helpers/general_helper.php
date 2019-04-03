<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


	
//function str_makerand($minlength, $maxlength, $useupper, $usespecial, $usenumbers) {
function str_makerand($length, $useupper = 0, $usenumbers = 0, $usespecial = 0) {
    $key = "";
    $charset = "abcdefghijklmnopqrstuvwxyz"; 
    if ($useupper)
		$charset = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    if ($usenumbers)
        $charset .= "0123456789";
    if ($usespecial)
        $charset .= "~@#$%^*()_+-={}|][";   // Note: using all special characters this reads: "~!@#$%^&*()_+`-={}|\\]?[\":;'><,./"; 
    /* if ($minlength > $maxlength)
        $length = mt_rand($maxlength, $minlength);
    else
        $length = mt_rand($minlength, $maxlength); */
    for ($i = 0; $i < $length; $i++)
        $key .= $charset[(mt_rand(0, (strlen($charset) - 1)))];
    return $key;
}

function remove_directory($directory, $empty = FALSE) {
    if (substr($directory, -1) == '/') {
        $directory = substr($directory, 0, -1);
    }

    if (!file_exists($directory) || !is_dir($directory)) {
        return FALSE;
    } elseif (!is_readable($directory)) {

        return FALSE;
    } else {

        $handle = opendir($directory);
        while (FALSE !== ($item = readdir($handle))) {
            if ($item != '.' && $item != '..') {
                $path = $directory . '/' . $item;
                if (is_dir($path)) {
                    remove_directory($path);
                } else {
                    unlink($path);
                }
            }
        }
        closedir($handle);
        if ($empty == FALSE) {
            if (!rmdir($directory)) {
                return FALSE;
            }
        }
        return TRUE;
    }
}
// send mail using PHPMailer library	
	function email_Send($subject,$to,$body,$Cc='',$Bcc='',$from='noreply@stelmac.io')
	{ 
			$mailer = new PHPMailer();
			 
			//server setting
			$mailer->IsSMTP(); 
		    $mailer->SMTPAuth = true; // There was a syntax error here (SMPTAuth)
			//$mailer->SMTPSecure = 'tls';
			/* $mailer->Host = "smtpout.asia.secureserver.net"; */
			$mailer->Host = "smtpout.secureserver.net";
			$mailer->Mailer = "smtp";
			$mailer->Port = 25;
			$mailer->Username = "noreply@stelmac.io";
			$mailer->Password = "teranex@123";
			$mailer->AddCC(trim($Cc));
			$mailer->AddBCC(trim($Bcc));
			
			$mailer->From = $from;  // This HAVE TO be your gmail adress 
			$mailer->FromName = 'teranex'; // This is the from name in the email, you can put anything you like here
			$mailer->Body = $body;
			$mailer->Subject = $subject;
			$mailer->AddAddress($to);  
			//If $mailer->Body contains html tags.
			$mailer->isHTML(true);
			// This is where you put the email adress of the person you want to mail 
			if(!$mailer->Send())
			{
				$data["message"] = "Error: " . $mail->ErrorInfo;
				
				echo "Mailer Error: " . $mailer->ErrorInfo;
				return false;
			}
			else
			{
				$data["message"] = "Message sent correctly!";
				return true;
			}
			return;
	
	}

	
// send mail using PHPMailer library	
	function email_SMTP_Send()
	{ 
		// Instantiate a new PHPMailer 
		$mail = new PHPMailer;

		// Tell PHPMailer to use SMTP
		$mail->isSMTP();

		// Replace sender@example.com with your "From" address. 
		// This address must be verified with Amazon SES.
		$mail->setFrom('support@teranex.in', 'Sender Name');

		// Replace recipient@example.com with a "To" address. If your account 
		// is still in the sandbox, this address must be verified.
		// Also note that you can include several addAddress() lines to send
		// email to multiple recipients.
		$mail->addAddress('jaywant.narwade@teranex.co', 'Recipient Name');

		// Replace smtp_username with your Amazon SES SMTP user name.
		$mail->Username = 'AKIAIDS4WVPJFN7K5EYA';

		// Replace smtp_password with your Amazon SES SMTP password.
		$mail->Password = 'AioGnnCT3jPMzpd3vMezYvRBzaGUG+KU5rMC6hKlXZTk';
			
		// Specify a configuration set. If you do not want to use a configuration
		// set, comment or remove the next line.
		$mail->addCustomHeader('X-SES-CONFIGURATION-SET', 'ConfigSet');
		 
		// If you're using Amazon SES in a region other than US West (Oregon), 
		// replace email-smtp.us-west-2.amazonaws.com with the Amazon SES SMTP  
		// endpoint in the appropriate region.
		$mail->Host = 'email-smtp.us-west-2.amazonaws.com';

		// The subject line of the email
		$mail->Subject = 'Amazon SES test (SMTP interface accessed using PHP)';

		// The HTML-formatted body of the email
		$mail->Body = '<h1>Email Test</h1>
			<p>This email was sent through the 
			<a href="https://aws.amazon.com/ses">Amazon SES</a> SMTP
			interface using the <a href="https://github.com/PHPMailer/PHPMailer">
			PHPMailer</a> class.</p>';

		// Tells PHPMailer to use SMTP authentication
		$mail->SMTPAuth = true;

		// Enable TLS encryption over port 587
		$mail->SMTPSecure = 'tls';
		$mail->Port = 587;

		// Tells PHPMailer to send HTML-formatted email
		$mail->isHTML(true);

		// The alternative email body; this is only displayed when a recipient
		// opens the email in a non-HTML email client. The \r\n represents a 
		// line break.
		$mail->AltBody = "Email Test\r\nThis email was sent through the 
			Amazon SES SMTP interface using the PHPMailer class.";

		if(!$mail->send()) {
			echo "Email not sent. " , $mail->ErrorInfo , PHP_EOL;
		} else {
			echo "Email sent!" , PHP_EOL;
		}
	
	}

// set data (message) to be displayed
function setFlash($variable, $message) {
    $CI = & get_instance();
    $CI->session->set_userdata($variable, $message);
}

// retrieve data (message) wich is set to display
function getFlash($variable) {
    $CI = & get_instance();
    if ($CI->session->userdata($variable)) {
        $message = $CI->session->userdata($variable);
        $CI->session->unset_userdata($variable);
    }
    else
        $message = "";
    return $message;
}

// check whether any data has been set or not
function hasFlash($variable) {
    $CI = & get_instance();
    if ($CI->session->userdata($variable))
        return true;
    return false;
}

// dates between specified date range
function date_range($first, $last, $step = '+1 day', $output_format = 'Y-m-d') {
    $dates = array();
    $current = strtotime($first);
    $last = strtotime($last);

    while ($current <= $last) {

        $dates[] = date($output_format, $current);
        $current = strtotime($step, $current);
    }

    return $dates;
}

function strhtmldecode($str) {
    $strRemoveGarbageChar = str_replace("&nbsp;", " ", htmlspecialchars_decode($str, ENT_QUOTES));
    $strDecoded = html_entity_decode($strRemoveGarbageChar);
    $strRemoveDoubleDots = str_replace("../", "", $strDecoded);
    $strNew = str_replace("themes/common/uploaded/", base_url() . "themes/common/uploaded/", $strRemoveDoubleDots);
    return $strNew;
}

function quotestoascii($strValue) {
//	  $strValue = (!get_magic_quotes_gpc()) ? htmlspecialchars($strValue,ENT_QUOTES) : $strValue;
//	  $strValue = ($strValue != "") ? $strValue  : "";
    return htmlspecialchars($strValue, ENT_QUOTES);
}

function addhttp($url) {
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function imageresize($src, $max_width, $max_height) {
    $size = getimagesize($src);
    $width = $size[0];
    $height = $size[1];

    $x_ratio = $max_width / $width;
    $y_ratio = $max_height / $height;

    if (($width <= $max_width) && ($height <= $max_height)) {
        $tn_width = $width;
        $tn_height = $height;
    } else if (($x_ratio * $height) < $max_height) {
        $tn_height = ceil($x_ratio * $height);
        $tn_width = $max_width;
    } else {
        $tn_width = ceil($y_ratio * $width);
        $tn_height = $max_height;
    }
	if($tn_width && $tn_height){
		return ' width="' . $tn_width . '" height="' . $tn_height . '" ';
	}
		return true;
}

//converts dmy format date to ymd format
function date_ymd($dmy_date) {
    $explode_date = explode('-', $dmy_date);
    $ymd_date = "";
    $ymd_date = $explode_date[2] . "-" . $explode_date[1] . "-" . $explode_date[0];
    return $ymd_date;
}

//converts ymd format date to dmy format
function date_dmy($ymd_date) {
    $explode_date = explode('-', $ymd_date);
    $dmy_date = "";
    $dmy_date = $explode_date[2] . "-" . $explode_date[1] . "-" . $explode_date[0];
    return $dmy_date;
}

//converts ymd format date to dmy format
function date_mdy($mdy_date) {
    $explode_date = explode('-', $mdy_date);
    $dmy_date = "";
    $dmy_date = $explode_date[1] . "-" . $explode_date[2] . "-" . $explode_date[0];
    return $dmy_date;
}

/* pagination start */

function pagination($total, $page, $shown, $url, $data = "") {
    $pages = ceil($total / $shown);
    $range_start = ( ($page >= 5) ? ($page - 3) : 1 );
    $range_end = ( (($page + 5) > $pages ) ? $pages : ($page + 5) );

    if ($page >= 1) {
        $r[] = '<li><a href="' . $url . $data . '">&laquo; First</a></li>';
        $r[] = '<li><a href="' . $url . ( $page - 1 ) . $data . '">&lsaquo; Previous</a></li>';
        $r[] = ( ($range_start > 1) ? '<li><a href="#"> ...</a></li> ' : '' );
    }

    if ($range_end > 1) {
        foreach (range($range_start, $range_end) as $key => $value) {
            if ($value == ($page + 1))
                $r[] = '<li class="active"><a  href="#">' . $value . '</a></li>';
            else
                $r[] = '<li><a href="' . $url . ($value - 1) . $data . '">' . $value . '</a></li>';
        }
    }

    if (( $page + 1 ) < $pages) {
        $r[] = ( ($range_end < $pages) ? ' <li><a href="#"> ...</a> ' : '' );
        $r[] = '<li><a href="' . $url . ( $page + 1 ) . $data . '">Next &rsaquo;</a></li>';
        $r[] = '<li><a href="' . $url . ( $pages - 1 ) . $data . '">Last &raquo;</a></li>';
    }

    return ( (isset($r)) ? '<div class="paging_bootstrap"><ul class="pagination">' . implode("\r\n", $r) . '</ul></div>' : '');
}

function printprice($val) {
    return number_format($val);
}

function printpricenew($val, $dec = 2) {
    return number_format($val, $dec, '.', ' ');
}

function get_unique_numeric_string(){   
	 list($usec, $sec) = explode(" ", microtime());   
	 $string = str_replace(".","",($usec + $sec));
	 $string1= "CP-";
	 $string = $string;
	 $string = $string1 .''. $string;
	 return $string;
 }
/* unique no. for quotation Number */
function get_unique_numeric_string_quotation(){   
	 list($usec, $sec) = explode(" ", microtime());   
	 $string = str_replace(".","",($usec + $sec));
	 $string1= "QN-";
	 $string = $string;
	 $string = $string1 .''. $string;
	 return $string;
 }
 /* Random String Generator */
 function RandomString()
{
	$rand = substr(md5(microtime()),rand(0,26),5);
    return $rand;
}
 function RandomStrings()
{
	$rand = substr(md5(microtime()),rand(0,26),5);
    return $rand;
}
/* unique no. for Package Number */
function get_unique_numeric_string_package(){   
	 list($usec, $sec) = explode(" ", microtime());   
	 $string = str_replace(".","",($usec + $sec));
	 $string1= "MI-";
	 $string = $string;
	 $string = $string1 .''. $string;
	 return $string;
 }
  /* unique no. for Package Number for Payment*/
function get_unique_numeric_string_package_payment(){   
	 list($usec, $sec) = explode(" ", microtime());   
	 $string = str_replace(".","",($usec + $sec));
	 $string1= "PP";
	 $string = $string;
	 $string = $string1 .''. $string;
	 return $string;
 }
 function get_unique_num_cart(){   
	 list($usec, $sec) = explode(" ", microtime());   
	 $string = str_replace(".","",($usec + $sec));
	 $string = $string;
	 $string = $string;
	 return $string;
 }
	//SMS SEND
		function sms_send($to,$sms_text){
		 $userName = SMS_user_name;
		 $senderId = SMS_senderId;
		 $key = SMS_key;
		 $accusage = SMS_accusage; 
		  
		//alot solution link
		$url = SMS_url."?username=$userName&password=$key&to=".$to."&message=".urlencode($sms_text)."&sender=$senderId&msgtype=unicode";
		 return openurl($url);  
	}	
	
	function openurl($url){
		$ch = curl_init();
		 curl_setopt($ch, CURLOPT_URL, $url);
		 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		 $response = curl_exec($ch);
		 curl_close($ch);
		 if($response){
			return true;
		 }else{
			return false;
		 }
	}
	
	
function formaturl($url)
{
	$pattern=array(" ","(",")","&amp;","&","br","/","  ","--","---");
	$with=array("-","-","-","and","and","","","","","");
	$tmp =str_replace($pattern,$with,trim(strtolower($url)));

	for($i=0;$i<strlen($tmp);$i++)
	{
			$code=ord($tmp{$i});
			if(($code >=48 && $code<=57)||($code >=65 && $code <= 90)||($code >=97 && $code<=122)||($tmp{$i}=="-")||($tmp{$i}=="/")||($tmp{$i}=="_"))
			{
				$returl .=$tmp{$i};
			}
			else
			{
				if($tmp{$i}==".")
				{
					 if((substr($tmp,$i+1,3)=="htm")||(substr($tmp,$i+1,3)=="php"))
					 {
					 	$returl .=$tmp{$i};
					 }
				}
			}
	}	

	return($returl);
}
 // SEO url generation
function isUrlExists($tblName,$priMaryKey, $urlSlug){ 
	if(!empty($tblName) && !empty($urlSlug)){
		$ci = & get_instance();
		$ci->db->from($tblName);
		//$ci->db->where('url_slug',$urlSlug);
		
		 $ci->db->where('url_slug', $urlSlug);
		$query = $ci->db->get();
		if($query->num_rows() > 0){
			$ci->db->select_max($priMaryKey);
			$result= $ci->db->get($tblName)->row_array();
			$nextId= $result[$priMaryKey]+1;
			$urlSlug = $urlSlug.'-'.$nextId; 
		}else{
			return $urlSlug;
		} 
	  //  $rowNum = $ci->db->count_all_results();
		return $urlSlug;
	}else{
		return true;
	}
}

function curlUrlCall($url,$parameter){
			$ch = curl_init();

			curl_setopt($ch, CURLOPT_URL,$url);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS,$parameter);
 
		// receive server response ...
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

			$server_output = curl_exec ($ch);

			curl_close ($ch);
			
			if( ($server_output))
			{
				return json_decode($server_output);
			}
			if(curl_error($c))
			{
				return 'error:' . curl_error($c);
			}
}
/// Price range 
function getMinPrice() {	
		$arr;
		$arr[1000000]='10 Lacks'; 
		for($i=5; $i < 10 ;$i=$i+10){
			$arr[100000 * $i]=$i.' Lacks';
		}
		$arr[1000000]='1 Crore';
		
		return $arr;
	}
function getMaxPrice() {
	$arr;
	$arr[3000000]='3 Lacks';
	for($i=5; $i < 100 ;$i=$i+5)
		$arr[100000 * $i]=$i.' Lacks';
	$arr[10000000]='1 Crore';
	$arr[10200000]='1 Crore 20 Lacks';
	$arr[10400000]='1 Crore 40 Lacks';
	$arr[10600000]='1 Crore 60 Lacks';
	$arr[10800000]='1 Crore 80 Lacks';
	$arr[20000000]='2 Crore';
	$arr[20500000]='2 Crore 50 Lacks';
	
	return $arr;
}