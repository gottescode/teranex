<?php

class HttpsResponse
{
    var $CI;

    function __construct()
    {
        $this->CI =& get_instance();
        // $this->CI->load->helper('url');


    }

    public function redirect_ssl()
    {
        $class =  $this->CI->router->fetch_class();
        $exclude =  array('loginbackend');  // add more controller name to exclude ssl.
        if(!in_array($class,$exclude)) {
            // redirecting to ssl.
            $this->CI->config->config['base_url'] = str_replace('http://', 'https://',
                $this->CI->config->config['base_url']);
            if ($_SERVER['SERVER_PORT'] != 443) redirect($this->CI->uri->uri_string());
        } else {

            // redirecting with no ssl.
            $CI->config->config['base_url'] = str_replace('https://', 'http://', $CI->config->config['base_url']);
            if ($_SERVER['SERVER_PORT'] == 443) redirect($CI->uri->uri_string());
        }

    }
}
