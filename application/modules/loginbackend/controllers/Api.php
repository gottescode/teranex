<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("videos_model");
    }
	public function findSingle_get(  $id, $strWhere = 1) {
	
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insuffient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->videos_model->findSingle($strWhere)
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultiple_get() {
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
			$strWhere .= "";
			$response = [
				"result" => $this->videos_model->findMultiple($strWhere)
			];
				
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function create_post() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
		$this->form_validation->set_rules('url', 'Url', 'trim|required'); 		
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
			$id = $this->videos_model->create($data);
			if($id){
				$response = [ "result" => $id, "message" => "Record inserted successfully." ];
			}
				else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function update_post() {
			
		
        $this->form_validation->set_rules('name', 'Name', 'trim|required'); 
        $this->form_validation->set_rules('url', 'Url', 'trim|required'); 
		
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
			$id = $this->videos_model->update($data);
			if($id){
				$response = [ "result" => $id, "message" => "Record updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function delete_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insuffient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->videos_model->delete($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	public function updaterecords_post() {
            // get input data
			$data = $this->post();
			 
			$result = $this->videos_model->updateRecords($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }

}

?>
