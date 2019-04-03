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
	public function contactUs() {
		$url = site_url()."/contact_us/api/findMultiplecontactUs/";
		$contactUsList =  apiCall($url, "get");
		$arrayData = [ 
			"contactUsList" => $contactUsList['result'],
		];
		
		$this->template->load("admin/contactUs",$arrayData);
	}

}