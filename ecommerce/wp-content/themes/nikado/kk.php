<?php /* Template Name: Register */ ?>
<?php
//http://localhost/orendaventures/ecommerce/wp-content/themes/nikado/kk.php
//echo "welcome";

	
	require_once( dirname(__FILE__) . '/../../../wp-load.php' );
	require_once(dirname(__FILE__) . '/../../../wp-includes/user.php');
	$username='admin';
	$pass='admin';
    $user = get_user_by('login', $username);

    if ( $user && wp_check_password( $pass, $user->data->user_pass, $user->ID) ) {
        wp_set_current_user($user->ID, $user->user_login);
        wp_set_auth_cookie($user->ID);
        do_action('wp_login', $user->user_login);
		echo "done";die;
        wp_redirect( "http://localhost/orendaventures/ecommerce/wp-admin/" );
        exit;
    }

    //wp_redirect( home_url() );
   // exit;
    
    
 
	
	
	
	
	//require_once(dirname(__FILE__) . '/../../../wp-includes/user.php');
/*
	require_once( dirname(__FILE__) . '/../../../wp-load.php' );

    $errors = array();

    $username = 'admin';
    $password = 'admin';
    $remember = true;
    $remember = ($remember) ? "true" : "false";

    $login_data = array();
    $login_data['user_login'] = $username;
    $login_data['user_password'] = $password;
    $login_data['remember'] = $remember;
    $user_verify = wp_signon($login_data, true);

    if (is_wp_error($user_verify)) {
    	//print_r($user_verify);die;
        $errors[] = 'Invalid username or password. Please try again!';
    } else {
        wp_set_auth_cookie($user_verify->ID);
       // echo "GANESHA";die;
        //wp_redirect("https://test.orendaventures.com/ecommerce/wp-admin/");
       // exit;
    }

*/

 
?>
