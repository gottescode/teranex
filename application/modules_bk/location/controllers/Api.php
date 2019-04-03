<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("country_model");
		$this->load->model("state_model");
		$this->load->model("city_model");
    }
	// get coutry List
	public function getCountryList_get() {
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
			$strWhere .= "";
			$response = [
				"result" => $this->country_model->getCountryList($strWhere)
			];
				
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function getStateList_get($country_id) {
	 
			$response = [
				"result" => $this->state_model->getStateList($country_id)
			];
				
		$this->response($response, REST_Controller::HTTP_OK);
	}
	// get City List By state ID
	public function getCityList_get($stateID) { 
			$response = [
				"result" => $this->city_model->getCityList($stateID)
			]; 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	// get most popular City List By state ID
	public function cityList_post() { 
		// get input data
		$data = $this->post(); 
		$where=1;
		if($data['more_popular']){
			$where.=" AND more_popular='".$data['more_popular']."'  AND popular='Y' ";
		}
			$response = [
				"result" => $this->city_model->cityList($where)
			]; 
		$this->response($response, REST_Controller::HTTP_OK);
	} 
} 
?>
