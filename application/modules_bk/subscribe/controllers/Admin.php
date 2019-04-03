<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	// Comments
	public function subscribe() {
		$url = site_url()."/subscribe/api/findMultipleSubscribe/";
		$subscribeList =  apiCall($url, "get");
		//print_r($subscribeList);exit;
		$arrayData = [ 
			"subscribeList" => $subscribeList['result'],
		];
		$this->template->load("admin/subscribe",$arrayData);
	}
	
	public function approve($id) {
		$url = site_url()."/subscribe/api/updateSubscribe/{$id}";
		$result =  apiCall($url, "get");
		
		if($result['result']){
			setFlash("dataMsgSuccess", $response['message']);
			redirect(site_url()."subscribe/admin/subscribe");	
		}else{
			setFlash("dataMsgError", $response['message']);
				redirect(site_url()."customer/admin/");
		} 	
		//print_r($subscribeList);exit;
		$arrayData = [ 
			"subscribeList" => $subscribeList['result'],
		];
		$this->template->load("admin/subscribe",$arrayData);
	}
	
	public function inactive($id) {
		$url = site_url()."/subscribe/api/inactiveSubscribe/{$id}";
		$result =  apiCall($url, "get");
		//print_r($result);exit;
		if($result['result']){
			setFlash("dataMsgSuccess", $response['message']);
			redirect(site_url()."subscribe/admin/subscribe");	
		}else{
			setFlash("dataMsgError", $response['message']);
				redirect(site_url()."subscribe/admin/subscribe/");
		} 	
		//print_r($subscribeList);exit;
		$arrayData = [ 
			"subscribeList" => $subscribeList['result'],
		];
		$this->template->load("admin/subscribe",$arrayData);
	}

}