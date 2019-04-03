<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
    }
	public function index(){ 
		
				 
		$arrData=array(  
		); 
		$this->template->load("index",$arrData);
	}
	public function success($paytmentFor,$lastId){ 
		$postData=$this->input->post();
		$pageData['payment_for']=$paytmentFor;
		$pageData['payment_for_id']=$lastId;
		$pageData['pay_date']=date('Y-m-d H:i:s');
		$pageData['status']=$postData['status'];
		$pageData['pay_amount']=$postData['amount'];
		$pageData['txnid']=$postData['txnid'];
		
		  
	 	$url = site_url()."payment/api/paySuccess"; 
		$response =  apiCall($url,"post",$pageData);
		 
		$arrData=array( 
			"postData"=>$postData,
		); 
		
		$this->template->load("success",$arrData);
	}
	public function fail($paytmentFor,$lastId){ 
		$postData=$this->input->post();
		$pageData['payment_for']=$paytmentFor;
		$pageData['payment_for_id']=$lastId;
		$pageData['pay_date']=date('Y-m-d H:i:s');
		$pageData['status']=$postData['status'];
		$pageData['pay_amount']=$postData['amount'];
		$pageData['txnid']=$postData['txnid']; 
	 	$url = site_url()."/payment/api/paySuccess"; 
		$response =  apiCall($url,"post",$pageData);
                
                
                      
		 
		$arrData=array( 
			"postData"=>$postData,
		); 
		$this->template->load("failure",$arrData);
	}
	 
}