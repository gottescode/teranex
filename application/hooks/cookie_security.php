<?php
class CookieSecurity {
    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        $this->CI->load->helper('url');

        //$var = $CI->session->userdata('$CI');
        //if(!isset($this->CI->session)){  //Check if session lib is loaded or not
            //$this->CI->load->library('session');  //If not loaded, then load it here
        //}
    }

    public function cookieValidation()
    {
        $currentURL = current_url();

        if (strpos($currentURL, "loginbackend/login") == FALSE) {

            echo 'Im here'; exit;

            $ip = $_SESSION['ipAddress'];
            if ($this->CI->session->has_userdata('ipAddress') == $ip) {
                redirect("loginbackend/login");
            } else {
                redirect("dashboard");
            }


        }

    }
}
