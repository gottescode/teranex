<?php 
	function validate_recaptcha(){
	
		$url = 'https://www.google.com/recaptcha/api/siteverify';
		$data = array(
			'secret' => RECAPTCHA_SECRET,
			'response' => $_POST["g-recaptcha-response"]
		);
		$options = array(
			'http' => array (
				'method' => 'POST',
				'content' => http_build_query($data)
			)
		);
		$context  = stream_context_create($options);
		$verify = file_get_contents($url, false, $context);
		$captcha_success=json_decode($verify, true);
		if ($captcha_success['success']==false) {
			return array('status' => false, 'msg' => implode(', ', $captcha_success['error-codes']) );
		} else if ($captcha_success['success']==true) {
			return array('status' => true, 'msg' => 'User verified..!!');
		}
	
	}
?>