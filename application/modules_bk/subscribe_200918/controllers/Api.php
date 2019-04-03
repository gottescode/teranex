<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("subscribe_model");
    }

	public function findMultipleSubscribe_get() {
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
			$strWhere .= "";		
			$response = [
				"result" => $this->subscribe_model->findMultipleSubscribe($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function updateSubscribe_get($id) {
		//$strWhere = $this->get("strWhere");
		$result = $this->subscribe_model->updateSubscribe($id);
		if($result){
			
			$response = [
				"result" => $result,
				"message" => " Approved Successfully..!!"
			];
		}else{
			$response = [
				"result" => $result,
				"message" => " Failed To Approve..!!"
			];
		}
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

}
