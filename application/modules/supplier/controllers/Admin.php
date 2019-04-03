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
	 	$url = site_url()."supplier/api/findMultiple/";
		$supplier_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."supplier/api/updatePublishSupplier";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('supplier_list' =>$supplier_list['result'] , );
		$this->template->load("admin/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."supplier/api/create";
			 
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
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."supplier/api/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."supplier/admin/");			
		}
		$url = site_url()."/supplier/api/findSingle/$id";
		$supplier_data =  apiCall($url, "get");
		//print_r($supplier_data);exit;
		/*
		$url = site_url()."/supplier/api/findMultipleAddress/$id";
		$supplier_Address_data =  apiCall($url, "get");

		$url = site_url()."/supplier/api/findAddress/$id";
		$supplierAddressList =  apiCall($url, "get");
		
		// load model
		$this->load->model("location/country_model");
		$this->load->model("location/state_model");
		$this->load->model("location/city_model");
		$country_id =$supplier_data['result']['s_branch_country'];
		$state_id =$supplier_data['result']['s_branch_state'];*/
	
		$arrayData = [
			//"country_id"=>$country_id, 
			"supplier_data"=>$supplier_data['result'], 
			/*"supplier_Address_data"=>$supplier_Address_data['result'], 
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id), 
			"cityList" => $this->city_model->getCityList($state_id), 
			"supplierAddressList"=>$supplierAddressList['result'], */
		];
		$this->template->load("admin/update",$arrayData);
	}
	public function delete($id) {  
		$url = site_url()."/supplier/api/deleteSupplier/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."supplier/admin/");		
	} 

	
}

?>
