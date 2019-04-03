<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groupbuying extends FRONTEND_Controller {

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
		$user_id = $this->session->userdata('uid');
	/* 	if($user_id==''){
			redirect(site_url()."pages/signIn");	
			exit;
		} */
		if(isset($_POST['addSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$pageData['customer_id']	= $user_id;
			$url = site_url()."groupbuying/api/buyingRequest"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataGroupMsgSuccess", $response['message']);
				redirect(site_url()."groupbuying/index/");	
			} 	
		} 
		
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get"); 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get"); 
		//print_r($brandList);exit;
		$url	= site_url()."machine/api/machineBrandModelList";
		$brandModelList = apiCall($url,"get");
		$url = site_url()."groupbuying/api/findMultipleCategory/";
		$groupbuying_list =  apiCall($url, "get");
		 
		$arrayData=array("machineCatList"=>$machineCatList['result']['result'],'groupbuying_list'=>$groupbuying_list['result'],"brandList"=>$brandList['result']['result'],"brandModelList"=>$brandModelList['result']['result'],);	
			
		$this->template->load("groupbuying",$arrayData);
	} 
}