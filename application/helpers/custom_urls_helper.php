<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



function back_url() {
    $CI = & get_instance();
    return site_url() . "" . BACKEND;
}

function theme_url() {
    $CI = & get_instance();
    return base_url() . "themes/" . $CI->template->theme;
}

function get_parameters() {
    $CI = & get_instance();
    $data = $CI->input->get();
    $str = "";
    if ($data) {
        $str = "?1";
        foreach ($data as $key => $val) {
            $str .= "&" . $key . "=" . $val;
        }
    }
    return $str;
}
function get_contoller_method(){
	 $CI = & get_instance();
	return array('controller'=>strtolower($CI->uri->segment(1)),'controllerMethod'=>strtolower($CI->uri->segment(2)));
}