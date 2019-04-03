<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("administrator_model");
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
	public function password_post() {
        $this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
		$this->form_validation->set_rules('new_password', 'New Password', 'trim|required'); 		
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
			$id = $this->administrator_model->change_password($data);
			if($id){
				$response = [ "result" => $id, "message" => "Record updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Please enter correct old Password and new password"
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleProfile_get(  $id, $strWhere = 1) { 
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insuffient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->administrator_model->findSingleProfile($strWhere)
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function updateProfile_post() {
			 
		$this->form_validation->set_rules('a_name', 'User Name', 'trim|required'); 
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
			$id = $this->administrator_model->updateAdminProfileData($data);
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

}

?>
