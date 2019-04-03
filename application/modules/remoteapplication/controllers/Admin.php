<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
		$url= site_url()."remoteapplication/api/findMultipleRequestList";
		$requestList = apiCall($url,"get");
		//print_r($requestList);exit;
		$arrayData = [
			"requestList" => $requestList
		];
		$this->template->load("admin/list",$arrayData);
	}
/* Request To Programmer */
	public function request_to_ApplicationEngineer($rpr_id){  
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			//print_r($pageData);exit;
			$url = site_url()."remoteapplication/api/assignApplicationEngineer";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."remoteapplication/admin/request_to_ApplicationEngineer/$rpr_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."remoteapplication/admin/request_to_ApplicationEngineer/$rpr_id");
			}  
		}
		
		$url = site_url()."remoteapplication/api/findMultipleApplicationEngineer/";
		$applicationengineer_user_list =  apiCall($url, "get");
		//print_r($applicationengineer_user_list);exit;
		$arrayData=[
			"applicationengineer_user_list"=>$applicationengineer_user_list['result'],
			"rpr_id"=>$rpr_id
		];
		$this->template->load("admin/request_to_applicationengineer",$arrayData);
	}
	public function videoRequests(){
		$url = site_url()."remoteapplication/api/findMultipleVideoRequest"; 
		$videoRequestList =  apiCall($url, "get"); 
		//print_r($videoRequestList);exit;
		$arrayData = [
			"videoRequestList"=>$videoRequestList['result']
		];
		$this->template->load('admin/videoRequest',$arrayData);
	}

	public function assignSupplier($ravr_id){
		$url = site_url()."remoteapplication/api/findMultipleSupplier/";
		$supplier_user_list =  apiCall($url, "get");
		$arrayData = [
			"supplier_user_list"=>$supplier_user_list['result'],
			"ravr_id"=>$ravr_id
		];
		$this->template->load('admin/request_to_supplier',$arrayData);
	}

	public function ViewRfqRequestFromSE($racrp_id=0) { 

		 if(isset($_POST['btnRfqQuot'])){
			$pageData = $this->input->post();   
			//print_r($pageData);exit;
			$url = site_url()."/remoteapplication/api/RemoteApplicationRFQAcceptByadmin/";
			$requestSupplierList =  apiCall($url,"post",$pageData); 
		 	//print_r($requestSupplierList);exit;

        
			redirect(site_url()."remoteapplication/admin");	
        }

		$url = site_url()."remoteapplication/api/findSingle_quote_engineer/$racrp_id";
		$result = apiCall($url,"get");
		//print_r($result);exit;
		$rpr_id=$result['result']['rpr_id'];
        $url = site_url()."/remoteapplication/api/SingleRemoteApplicationSE/$rpr_id";
        $singleList =  apiCall($url, "get"); 
        //print_r($singleList);exit;
		$arrayData=array( 

			"result"=>$result['result'],   
			"singleList"=>$singleList['result'] 

		); 

	  $this->template->load("admin/viewRemoteApplicationServiceEngineerQoute",$arrayData); 	
	}



	 /**
	 * Remote application RFQ Request From Service Engineer
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function RemoteApplicationServiceEngineer($rpr_id) {  
		$url = site_url()."/remoteapplication/api/RemoteApplicationServiceEngineer/$rpr_id";
        $requestList =  apiCall($url, "get"); 
        //print_r($requestList);exit;
        $url = site_url()."/remoteapplication/api/SingleRemoteApplicationSE/$rpr_id";
        $singleList =  apiCall($url, "get"); 
        // print_r($singleList);exit;
			$arrayData=array( 

				"requestList"=>$requestList['result'], 
				"singleList"=>$singleList['result'],   
			); 
			//print_r($arrayData);exit;
			$this->template->load("admin/RFQ_req_service_engineer",$arrayData); 	
	}


	/**

	 * Remote Application RFQ Request Service Engineer Accept By Admin
	   12-10-2018 Deepak Shinde
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function RemoteApplicationRFQAcceptByadmin($racrp_id){

			$url = site_url()."/remoteapplication/api/RemoteApplicationRFQAcceptByadmin/$racrp_id";

			$requestSupplierList =  apiCall($url, "get"); 
		   // print_r($requestSupplierList);exit;
			redirect(site_url()."remoteapplication/admin");	

	}

}
?>