<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends BACKEND_Controller{
	
	// constructor
	function __construct()
	{ 
		// Call the parent constructor
		parent::__construct();
        $this->load->database();

    }
	// index page for this controller 
	public function index(){
		 $url = site_url()."/pages/api/signUpUserCount/";
		$signUpUserList =  apiCall($url, "get");  
	 	 $url = site_url()."/user/api/receiptCount/";
		$receiptCount =  apiCall($url, "get");  
	 	 $url = site_url()."/pages/api/feedbackCount/";
		$feedbackCount =  apiCall($url, "get");  
		$arrayData=array(
			"signUpUserList"=>$signUpUserList['result'],
			"feedbackCount"=>$feedbackCount['result'],
			"receiptCount"=>$receiptCount['result']
		);
		$this->template->load("index",$arrayData);

	}
        
        
	public function updateprofile() {
		//echo "hi";exit;
		$user_id = $this->session->userdata('user_id');
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();

			$pageData['uid'] = $user_id; 
			$url = site_url()."dashboard/api/updateProfile";
			$response =  apiCall($url, "post",$pageData);
			$this->session->set_userdata($session);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			} 		
		} 
		$url = site_url()."/dashboard/api/findSingleProfile/$user_id/";
		$result =  apiCall($url, "get"); 
		 
		$arrayData=array("result"=>$result['result']);
			 
		$this->template->load("profile",$arrayData);
	}
	public function changePassword() {
        $id = $this->session->userdata('user_id');

        if (isset($_POST['btnSubmit'])) {

            $pageData = $this->input->post();

            $newDate = date("Y-m-d");
            $pageData['id'] = 1;
            $pageData['newDate'] = $newDate;
            $url = site_url() . "dashboard/api/password";
            $response = apiCall($url, "post", $pageData);
            if ($response) {
                setFlash("passwordSuccessMsg", $response['message']);

            }
        }
        $this->template->load("changepassword");
	}

}