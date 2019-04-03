<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Remoteapplication extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }
	
	
	public function consultantDetails($id) {
		$uid  = $this->session->userdata('uid');
		if($uid){
		//get Single record from recently viewed
		$url = site_url()."consultant/api/findSingleRecentlyViewedRemoteApplication/$uid";
		$recently_viewed_data =  apiCall($url,"get");
		$pageData['recentlyViewedId'] = $recently_viewed_data['result']['consultant_ids'];
		
		if($recently_viewed_data['result']){
			$recently_viewed_data1 = $recently_viewed_data['result']['consultant_ids'];
			$recently_viewed_data = $recently_viewed_data['result']['consultant_ids'];
			$checkInarray = explode(',',$recently_viewed_data);
		

			if (!(in_array($id, $checkInarray))) {
					$oldarray = $checkInarray;
					array_push($oldarray,$id);
					//add new programmer
					$newData['consultant_ids'] = implode(",",$oldarray);
					$newData['user_id'] = $uid;
					$url = site_url()."consultant/api/updateRecentlyViewedApplication/";
					$result = apiCall($url,"POST",$newData); 
			}
		}else{
			$newData['consultant_ids'] = $id;
			
			$newData['user_id'] = $uid;
			
			$url = site_url()."consultant/api/createRecentlyViewedApplication/";
			$result = apiCall($url,"POST",$newData);
			
		}
		//get recently Viewd Data
		$url = site_url()."xpertconnect/api/findMultipleProgrammerRecentlyViewedApplication/";
		$recently_viewed_data =  apiCall($url,"post",$pageData);

		}
		
	
		$url = site_url()."consultant/api/findSingleConsultant/$id";
		$consultant_data =  apiCall($url,"get");
		
		//Customer User Data
		$uid  = $this->session->userdata('uid');
		$url = site_url()."consultant/api/findSingleConsultant/$uid";
		$customer_data =  apiCall($url, "get");
			
		if(isset($_POST['btnAvailabilty'])){	
				$pageData = $this->input->post();
				$pageData['user_id'] = $uid;
				$url = site_url()."consultant/api/createRemoteApplicationRequest";
				$response  = apiCall($url,"post",$pageData);
			
				if($response['result']){
					setFlash("dataMsgSuccess", $response['message']);
					redirect(site_url()."consultant/remoteapplication/consultantDetails/$id");	
				}else{
					setFlash("dataMsgError", $response['message']);
					redirect(site_url()."consultant/remoteapplication/consultantDetails/$id");	
				}
			}
		$url = site_url()."customer/api/findWorkExperinceList/$id";
		$workList =  apiCall($url, "get"); 
		$url = site_url()."customer/api/commenttotraineeFetchMultiple/$id";
		$commentList =  apiCall($url, "get");
	 	 
		$arrayData = [
			"workList"=>$workList['result'], 
			"commentList"=>$commentList['result'], 
			"consultant_data"=>$consultant_data['result'], 
			"customer_data"=>$customer_data['result']
		]; 
		$this->template->load("consultant_details",$arrayData);
	}

}