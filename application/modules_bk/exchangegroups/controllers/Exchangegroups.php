<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exchangegroups extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	/**
		* group buying request form
		16/5/2018
		* @access public
		* @param  post form data
		* @return  
	*/ 
	public function index() {
		 $this->load->model("location/country_model");
	
		 	if(isset($_POST['Submit'])){
				$pageData = $this->input->post(); 
				
				$pageData['customer_id'] = $this->session->userdata('uid');
				$url = site_url()."exchangegroups/api/createExchangeGroup/";
				$response =  apiCall($url, "post",$pageData);
			
				
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."exchangegroups");
				}else{
					setFlash("dataMsgError", 'Something Went Wrong..!!');
					redirect(site_url()."exchangegroups");
				}  
		}
		 
		$arrayData = [
            "categoryList" => $categoryList['result'],
            "countryList" => $this->country_model->getCountryListForSite(),
            "brandList" => $brandList['result']['result'],
            "softwareList" => $softwareList['result']
        ];
        
		$this->template->load("exchangegroups/index",$arrayData);
	} 
}