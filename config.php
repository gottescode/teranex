<?php

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE);
ob_start();


/* * ***** google related activities start ** */
//define("API_KEY", "81vh2og1r78fsm");
//define("SECRET_KEY", "LzbplodoEOkxIBU4");

define("API_KEY", "818cyyz8o0tm29");
define("SECRET_KEY", "QJbCjuVx3Kqhfy1T");

/* make sure the url end with a trailing slash */
define("SITE_URL",  "http://".$_SERVER['HTTP_HOST']."/");
/* the page where you will be redirected for authorzation */
define("REDIRECT_URL", SITE_URL."pages/linked_login");
/* Set the scope */
define("SCOPE", 'r_basicprofile r_emailaddress' );

//define("LOGOUT_URL", SITE_URL."pages/linked_login");
/* * ***** google realted activities end ** */

?>
