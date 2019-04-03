<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("supplier_model");
    }

	public function findSingle_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND uid = $id ";
			$response = [
				"result" => $this->supplier_model->findSingle($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultiple_get( ) { 
	 
			$strWhere = "   u_user_type='S' ";
			$response = [
				"result" => $this->supplier_model->findMultiple($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

		public function findMultipleAddress_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and supplier_id=$id";
		    }
			$response = [
				"result" => $this->supplier_model->findMultipleAddress($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function create_post() {
	 
        $this->form_validation->set_rules('u_email', 'Email Id Required', 'trim|required');
		 
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {

            // get input data
			$data = $this->post(); 
		 
			$page_id = $this->supplier_model->create($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function update_post() {
		$this->form_validation->set_rules('u_email', 'Email Id Required', 'trim|required');
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
			$data = $this->post();
			$result = $this->supplier_model->update($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function deleteSupplier_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->supplier_model->deleteSupplier($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishSupplier_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->supplier_model->updatePublishSupplier($data),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	
	// address list as per supplier_id
	public function findAddress_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and supplier_id = $id";
		    }
			$response = [
				"result" => $this->supplier_model->findAddressList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


	public function checkEmailIdExist_post() {
			$data = $this->post();
			$response = [
				"result" => $this->supplier_model->checkEmailIdExist($data)
			];
			//print_r($response['result']);exit;
			if($response['result']){
				$response = array("result"=>"1","message"=>"Email-Id Already Exist");
				
			}else{
				$response = array("result"=>"0");
			}
		$this->response($response, REST_Controller::HTTP_OK);
	}
}

?>