<?php 
	/* Template Name: ci_wp_auth */ 
	/*
	Created By:Kishor Kudale(Deven Infotech Team)
	Date:05-09-2018
	Purpose:Auto login to wordpress when user login from CI login screen.
	*/
	require_once( dirname(__FILE__) . '/../../../wp-load.php' );
	require_once(dirname(__FILE__) . '/../../../wp-includes/user.php');
	$username=$_COOKIE["username"];
	$pass=$_COOKIE["password"];
        
    $user = get_user_by('login', $username);
    $password = $user->user_pass;
if ( $password != '') {
    if ( $user && ($pass==$user->data->user_pass) ) 
    {
        wp_set_current_user($user->ID, $user->user_login);
        wp_set_auth_cookie($user->ID);
        do_action('wp_login', $user->user_login, $user);
    }
} else {
        
            wp_set_current_user($user->ID, $user->user_login);
            wp_set_auth_cookie($user->ID);
            do_action('wp_login', $user->user_login, $user);
      
    
}
	$site_url=str_replace("ecommerce","",site_url())."customer/dashboard";
	wp_redirect($site_url);
	exit;	
?>
