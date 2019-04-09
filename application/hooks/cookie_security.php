<?php

class CookieSecurity
{
    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        // $this->CI->load->helper('url');
        $this->CI->load->library('session');
        $this->CI->load->library('input');

    }

    public function cookieValidation()
    {
        $currentURL = current_url();
        if (strpos($currentURL, "loginbackend/login") === false) {
            if (
                $this->CI->session->has_userdata('user_id') &&
                $this->CI->session->has_userdata('ipAddr')
            ) {
                if ($this->CI->session->get_userdata('ipAddr')['ipAddr'] !== $this->CI->input->ip_address()) {
                    redirect("loginbackend/login");

                }
            }
        }

    }
}
