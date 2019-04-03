<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Snapshot extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	public function index($id=0) {


		

		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."snapshot/api/snapshotSpeakConsultantInsert/"; 
		//	$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		

			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Speak To Consultant Request Submited Successfully"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
				redirect("snapshot");
		}

		if(isset($_POST['btnRequestCall'])){
			$pageData = $this->input->post();  
			$url = site_url()."snapshot/api/snapshotRequestCallInsert/"; 
			//$pageData['report_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){

                $transaction_type = 16;
                $this->user_log($transaction_type);	
				setFlash("dataMsgEnquirySuccess", "Request Successfully Submited"); 
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("snapshot");
		}

		if(isset($_POST['btnanalystQuery'])){
			$pageData = $this->input->post(); 
			$user_type=$this->session->userdata('user_type');
		//print_r($pageData);exit; 
			$pageData['user_type']=$user_type;
			$url = site_url()."snapshot/api/analystQueryInsert/"; 
		

			$response =  apiCall($url, "post",$pageData); 
		 
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Analyst Query Successfully Submited"); 
               $transaction_type = 14;
	           $this->user_log($transaction_type);	

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("snapshot");
		}

		if(isset($_POST['btnsalesQuery'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit; 
			$user_type=$this->session->userdata('user_type');
			$pageData['user_type']=$user_type;
			$url = site_url()."snapshot/api/salesQueryInsert/"; 
			
			$response =  apiCall($url, "post",$pageData); 
		 
			
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Sales Query Successfully Submited"); 
				$transaction_type = 15;
	           $this->user_log($transaction_type);

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("snapshot");
		}


		if(isset($_POST['btnSubscribe'])){
			$pageData = $this->input->post(); 
			 //print_r($pageData);exit; 
			$pageData['user_id']=$this->session->userdata('uid');
			$pageData['user_type']=$this->session->userdata('user_type');
			
		    $url = site_url()."snapshot/api/subscriptionPurchase/"; 
			$response =  apiCall($url, "post",$pageData);
  		    //print_r($response);exit;
			if($response['result']){
				$u_mobileno = $this->db_lib->fetchSingle("master_user","uid='$pageData[user_id]'","u_mobileno" );
					$pageData['surl']=site_url()."payment/success/subscribeData/".$response['result'];
					//print_r($pageData['surl']);exit;
					$pageData['furl']=site_url()."payment/fail/subscribeData/".$response['result'];
						$payAmount =$pageData['subscription_amount'];
					//print_r($payAmount);exit;
					$pageData['amount']= $payAmount; 
					$pageData['firstname']=	$this->session->userdata('u_name'); 
					$pageData['email']	=	$this->session->userdata('user_email'); 
					$pageData['phone'] = $u_mobileno['u_mobileno'];
					$pageData['productinfo']="report Data";


                   $transaction_type = 13;
                    $this->user_log($transaction_type);	  
					 
					$this->session->set_flashdata('payuData',$pageData); 
				 
						redirect(site_url()."payment/index");			
			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
				redirect(site_url()."snapshot");
			}
		}

        $url = site_url()."snapshot/api/findMultipleCategory/";
        $category_list =  apiCall($url, "get"); 
		if ($id>0) {
			$url = site_url()."snapshot/api/findSingleCategory/$id";
			$single_category_details =  apiCall($url, "get"); //print_r($total_category_list);
		
		}else{
			
		$id = $category_list['result'][0]['snapshot_category_id'];
		$url = site_url()."snapshot/api/findSingleCategory/$id";
		$single_category_details =  apiCall($url, "get");// print_r($total_category_list);
		
		}
		$url = site_url()."snapshot/api/findMultipleSubscriptionpublish/";
        $subscription_list =  apiCall($url, "get"); 
		//print_r($subscription_list);exit;
		$url = site_url()."snapshot/api/findMultipleTeam/";
		$team_list =  apiCall($url, "get"); 

		$url = site_url()."snapshot/api/findMultipleClient/";
		$client_list =  apiCall($url, "get"); 

        $arrayData = array(
				'category_list' =>$category_list['result'],
				'subscription_list' =>$subscription_list['result'],
				'single_category_details' =>$single_category_details['result'],
				'team_list' =>$team_list['result'],
				'client_list' =>$client_list['result'] ,
				//'analytics_list' =>$analytics_list['result']
			);

		$this->template->load("index",$arrayData);
	}
	

	

	public function snapshot_category_detail($id) {


		if(isset($_POST['btnSpeakConsultant'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$url = site_url()."snapshot/api/analyticsSpeakConsultantInsert/"; 
			//$pageData['case_study_id']	= $id;
			$response =  apiCall($url, "post",$pageData); 
		 
		
			if($response['result']){
				setFlash("dataMsgEnquirySuccess", "Snapshot To Consultant Request Submited Successfully");

			}else{
				setFlash("dataMsgEnquiryError", $response['message']); 
			}
			redirect("snapshot");
		}

		/*$url = site_url()."snapshot/api/findSingleCategory/$id";
		$category_list =  apiCall($url, "get"); */

		$url = site_url()."snapshot/api/findMultipleCategory/";
        $category_list =  apiCall($url, "get"); 

		$url = site_url()."snapshot/api/findSingleCategory/$id";
		$total_category_list =  apiCall($url, "get"); 
		//print_r($category_list);exit;
		
		$arrayData = array('category_list' =>$category_list['result'],'total_category_list' =>$total_category_list['result'],'id' =>$id);
		//print_r($analytics_list);exit;
		$this->template->load("snapshot_category_detail",$arrayData);
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