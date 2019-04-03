<?php 
	/* Template Name: ci_wp_auth */ 
	/*
	Created By:Kishor Kudale(Deven Infotech Team)
	Date:05-09-2018
	Purpose:Auto login to wordpress when user login from CI login screen.
	*/
	require_once( dirname(__FILE__) . '/../../../wp-load.php' );
	require_once(dirname(__FILE__) . '/../../../wp-includes/pluggable.php');
	wp_logout();
	$site_url=str_replace("ecommerce","",site_url())."pages/signIn";
	wp_redirect($site_url);
	exit;
?>
