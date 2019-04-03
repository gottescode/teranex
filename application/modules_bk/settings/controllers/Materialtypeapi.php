<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Materialtypeapi extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("materialtype_model");
    }

	public function findSingle_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND mtid = $id ";
			$response = [
				"result" => $this->materialtype_model->findSingle($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* Find type by using Id */
	public function findmultipletypes_post() {
			$data  = $this->post();
			$material_type = $data['material_type'];
			$strWhere = " FIND_IN_SET( mtid,'{$material_type}' )>0 ";
			$response = [
				"result" => $this->materialtype_model->findMultiple($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultiple_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= "  ";
		    }
			$response = [
				"result" => $this->materialtype_model->findMultiple($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleParent_get( ) { 
		 
			$strWhere .= "   utid <>0 AND parent_utid=0";
		    
			$response = [
				"result" => $this->materialtype_model->findMultipleParent($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function create_post() {
	 
        $this->form_validation->set_rules('type_name', 'Type name Required', 'trim|required');
		 
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
		 
			$type_id = $this->materialtype_model->create($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
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
		$this->form_validation->set_rules('type_name', 'Type name Required', 'trim|required');
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
			$result = $this->materialtype_model->update($data);
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
	
	public function deletetype_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->materialtype_model->deletetype($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	 
}

?>