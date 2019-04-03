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
	
		$url	= site_url()."exchangegroups/adminapi/adminRfqList";
		$rfqList = apiCall($url,"get"); 
	
		$arrayData=array("rfqList"=>$rfqList );	
			
		$this->template->load("admin/rfqList",$arrayData);
	}
	
	public function viewDetailsSupplier($id) {
		$userId = $this->session->userdata('uid');	
		
		$url = site_url()."customer/exchangegroupapi/findSingleExchangeRfqAdmin/{$id}";
		$rfqData =  apiCall($url,"get");

		$contry_id = $rfqData['result']['contry_id'];
		$state_id = $rfqData['result']['state_id'];
		$city_id = $rfqData['result']['city_id'];
		
		$url = site_url()."customer/exchangegroupapi/findSingleCountry/{$contry_id}";
		$countryName =  apiCall($url,"get");
		
		$url = site_url()."customer/exchangegroupapi/findSingleState/{$state_id}";
		$stateName =  apiCall($url,"get");
	
		$url = site_url()."customer/exchangegroupapi/findSingleCity/{$city_id}";
		$cityName =  apiCall($url,"get");

		$arrayData = [
						"rfqData"=>$rfqData['result'],
						"country_name"=>$countryName['result']['country_name'],
						"state_name"=>$stateName['result']['state_name'],
						"city_name"=>$cityName['result']['city_name'],
						"rfqData"=>$rfqData['result']
					];
		$this->template->load("admin/customer_rfq_detail_for_supplier", $arrayData);
	}
	
	

	
}
?>