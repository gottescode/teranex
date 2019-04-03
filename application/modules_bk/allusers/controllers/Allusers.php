<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allusers extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }

	public function index() { 
		// SEO end Here	
		$url = site_url()."/allusers/api/findMultiple/";
		$project_data =  apiCall($url, "get");
		$arrayData = [
			"project_data"=>$project_data
		];
		$this->template->load("project",$arrayData);
	}
	public function profile() { 
		// SEO end Here	
		//print_r($this->session->userdata());
		if($this->session->userdata('uid')){
			$user_id = $this->session->userdata('uid');
			$arrayData=array();
			$this->template->load("profile",$arrayData);
		}
		else{
			redirect("pages/login");
		}
	}
	
}

?>
