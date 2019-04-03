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
	 	$url = site_url()."customer/api/findMultiple/";
		$customer_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."customer/api/updatePublishCustomer";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('customer_list' =>$customer_list['result'] , );
		$this->template->load("admin/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."customer/api/create";
			
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."customer/admin/");	
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
		//print_r($arrData);
			//exit;
		$this->template->load("admin/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."customer/api/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."customer/admin/");			
		}
		$url = site_url()."/customer/api/findSingle/$id";
		$customer_data =  apiCall($url, "get");
 

	    $url = site_url()."/customer/api/findAddressList/$id";
		$customerAddressList =  apiCall($url, "get");

		$url = site_url()."/customer/api/findMultipleAddress/$id";
		$customer_Address_data =  apiCall($url, "get");
		// load model
		$this->load->model("location/country_model");
		$this->load->model("location/state_model");
		$this->load->model("location/city_model");
		$country_id =$supplier_data['result']['cust_branch_country'];
		$state_id =$supplier_data['result']['cust_branch_state'];
		$arrayData = [
			"country_id"=>$country_id,
			"customer_data"=>$customer_data['result'], 
			"customer_Address_data"=>$customer_Address_data['result'], 
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id), 
			"cityList" => $this->city_model->getCityList($state_id),
			"customerAddressList"=>$customerAddressList['result'], 
		];
		$this->template->load("admin/update",$arrayData);
	}
	public function delete($id) {  
		$url = site_url()."/customer/api/deleteCustomer/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."customer/admin/");		
	} 
	
	
}
?>
