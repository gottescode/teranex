<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Supplier extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }

	public function index() { 
		// SEO end Here	
		$url = site_url()."/supplier/api/findMultiple/";
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
	public function supplierDetail($id) {
		$url = site_url()."/supplier/api/findSingle/$id";
		$project_data =  apiCall($url, "get");
        $url = site_url()."/supplier/api/findMultipleImage/$id";
		$project_images =  apiCall($url, "get");
        $url = site_url()."/supplier/api/findMultiple/$id";
		$Project_list =  apiCall($url, "get","");
         
		 
		$arrayData = [
			"project_data"=>$project_data,
			"project_images"=>$project_images,
			'Project_list' => $Project_list['result'],
		];
		//print_r($Project_list);exit;
		$this->template->load("projectDetail",$arrayData);
	}
}

?>
