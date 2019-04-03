<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Events extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index() {
		$url = site_url()."events/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 		
	
		$arrayData = array('category_list' =>$category_list['result'] , );
		$this->template->load("index",$arrayData);
	}
	public function events_list($eid) {
		$url = site_url()."events/api/findMultipleEvent/$eid/front";
		$event_list =  apiCall($url, "get");	
		$arrayData = array('event_list' =>$event_list['result'] ,'eid' =>$eid );
		$this->template->load("events_list",$arrayData);
	}

        public function user_log($data) {
        //  echo 'hi';die;
        //print_r($data);die;
        $pageData['transaction_type'] = $data;
        $pageData['uid'] = $this->session->userdata('uid');

        //print_r($pageData);die;
        $url = site_url() . "/customer/api/insertUserLog";
        $response = apiCall($url, "post", $pageData);
        //print_r($response);die;
    }
}

?>
