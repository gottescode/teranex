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
	 	$url = site_url()."allusers/api/findMultiple/";
		$alluser_list =  apiCall($url, "get"); 
	   // print_r($alluser_list);exit;
	    $url = site_url()."allusers/api/usertype/";
		$user_type =  apiCall($url, "get"); 
		//print_r($user_type);exit;
		$url = site_url()."allusers/api/userrole/";
		$user_role =  apiCall($url, "get"); 
		//print_r($user_role);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."allusers/api/updatePublishAllusers";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('alluser_list' =>$alluser_list['result'] ,
						'user_type' =>$user_type['result'] ,
						'user_role' =>$user_role['result'] ,
		 );
		$this->template->load("admin/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."allusers/api/create";
			 
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				//email 
				$to = $pageData['u_email'];
				$password=$pageData['u_password'];
				$body = '<p>Hi, </p> '; 
				$body = '<p>Teranex Admin created your account please login with below Username and Password, </p> '; 
				$body.="<p>UserName: {$to} </p>";
				$body.="<p>Password: {$password} </p>";
				$email_content = $body;
				$this->load->library('Email_PHPMailer');
				$subject = 'Supplier Registration: Continuous Imapression :';
				$mailresponse = email_Send($subject,$to,$email_content,$name);	

				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."supplier/admin/");	
			} 	
		} 
		// load model
		$this->load->model("location/country_model");
		$this->load->model("location/state_model");
		// prepare data
		$arrData = array( 
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id), 
		);
		$this->template->load("admin/create",$arrData);
	}
	public function update($id) { 

	    $url = site_url()."allusers/api/usertype/";
		$user_type =  apiCall($url, "get"); 
		//print_r($user_type);exit;
		$url = site_url()."allusers/api/userrole/";
		$user_role =  apiCall($url, "get"); 

		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$pageData['session_exp_time'] = $pageData['session_exp_time']*60*60;
			//print_r($pageData['session_exp_time']);exit;
			$url = site_url()."allusers/api/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."allusers/admin/");			
		}
		$url = site_url()."/allusers/api/findSingle/$id";
		$allusers_data =  apiCall($url, "get");
	  // print_r($allusers_data);exit;
		$arrayData = [
			"allusers_data"=>$allusers_data['result'],
			'user_type' =>$user_type['result'] ,
			'user_role' =>$user_role['result'] , 
		];
		$this->template->load("admin/update",$arrayData);
	}
	public function delete($id) {  
		$url = site_url()."/allusers/api/deleteAlluser/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."allusers/admin/");		
	} 

	
}

?>
