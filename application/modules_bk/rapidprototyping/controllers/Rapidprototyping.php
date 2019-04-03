<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Rapidprototyping extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		//$this->load->model('additivemanufacturing_Model');
        //$this->load->model("pages_model");
    }
	public function index(){ 
		$arrData=array( 
		); 
		$this->template->load("index",$arrData);
	}
	

	public function rapid_prototyping()	{	 
		$url = site_url()."rapidprototyping/api/findMultipleRapidPrototyping";
		$rapid_prototyping_list =  apiCall($url, "get");
		 //print_r($additive_manufacturing_list);exit;

		$url = site_url()."rapidprototyping/api/findMultipleRapidprototypingOnlineFeatures";
		$rapid_prototyping_online_features_list=  apiCall($url, "get");
		
		  $arrData=array(
		  	'rapid_prototyping_list'=>$rapid_prototyping_list['result'],
		  	'rapid_prototyping_online_features_list'=>$rapid_prototyping_online_features_list['result']);  

		// redirect to laser_processing
		$this->template->load("rapid_prototyping" ,$arrData);
	}

	public function rapid_prototypingRFQ() {   

	$url = site_url()."settings/materialtypeapi/findMultiple/";
	$material_list =  apiCall($url, "get");  

	$url = site_url()."settings/applicationrequiredapi/findMultiple/";
	$application_required =  apiCall($url, "get");  
	
		if(isset($_POST['btnRfq'])){ 
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$pageData['material_type'] = implode(",",$pageData['material_type']);
			$pageData['application_required'] = implode(",",$pageData['application_required']);
			$pageData['customer_user_id']  = $this->session->userdata('uid'); 
			
            
	        $transaction_type = 22;
	        $this->user_log($transaction_type);	

			$url  = site_url()."rapidprototyping/api/createRfq/";
			$response= apiCall($url,"POST",$pageData);

			if($response[response]){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."rapidprototyping/cnc_machining");
			}else{
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."rapidprototyping/cnc_machining");
			}
		}
	
		$arrayData  = [
				"material_list"=>$material_list['result'],
				"application_required"=>$application_required['result']
		
		];	
	
		$this->template->load("rapid_prototypingRFQ",$arrayData);
	}

	public function cnc_machining(){ 
		$this->template->load("cnc_machining",$arrData);
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