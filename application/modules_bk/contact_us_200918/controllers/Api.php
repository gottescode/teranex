<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("enquiry_model");
    }

	public function findMultiplecontactUs_get() {
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
			$strWhere .= "";		
			$response = [
				"result" => $this->enquiry_model->findMultiplecontactUs($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

}
