<?php

//using composer
require __DIR__ . '/vendor/autoload.php';

// JWT PHP Library https://github.com/firebase/php-jwt
use \Firebase\JWT\JWT;

//function to generate JWT
function generateJWT () {

	//Zoom API credentials from https://developer.zoom.us/me/
	$key = 'nonbz4dRQSuGkc2qVyGe5A';
	$secret = '6Quzh3fLdqTJ9NpF2vEs5BTFFtK0Az7HYqU1';

	$token = array(
		"iss" => $key,
        // The benefit of JWT is expiry tokens, we'll set this one to expire in 1 minute
		"exp" => time() + 60
	);

	return JWT::encode($token, $secret);
}


function getUsers () {
	
    //list users endpoint GET https://api.zoom.us/v2/users
	$ch = curl_init('https://api.zoom.us/v2/users');

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  
    // add token to the authorization header
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		'Authorization: Bearer ' . generateJWT()
	));

	$response = curl_exec($ch);
	echo  curl_error($ch);
	print_r($response);exit;
	$response = json_decode($response);
	return $response;
}

var_dump(getUsers());