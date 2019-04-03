<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();

/* make sure the url end with a trailing slash */
//define("SITE_URL", "http://localhost/Teranex-Git-Development/");
define("SITE_URL","https://beta.stelmac.io/");
//define("SITE_URL","http://localhost/Teranex-Git-Development/");
//echo SITE_URL;die;
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."pages/google_login");

/* * ***** Google related activities start ** */
define("CLIENT_ID","14814969195-teok613bqfmrlg3ob0s1ariqq0g9e5rs.apps.googleusercontent.com"); 
define("CLIENT_SECRET","ULbOptwEqiqXFGDV466fTPFm");

/* permission */
define("SCOPE", 'https://www.googleapis.com/auth/userinfo.email '.
		'https://www.googleapis.com/auth/userinfo.profile');
/* logout both from google and your site **/
// define("LOGOUT_URL", "https://www.google.com/accounts/Logout?continue=https://appengine.google.com/_ah/logout?continue=". urlencode(SITE_URL."logout.php"));
/* * ***** Google related activities end ** */
?>