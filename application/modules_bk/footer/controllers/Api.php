<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("pages_model");
    }
 
    //sign up Profile Data
    public function insertSignUpForm_post() {
        $this->form_validation->set_rules('s_email', 'Email Id Required', 'trim|required');	
        $this->form_validation->set_rules('s_mobileno','MObile No Required', 'trim|required');	
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
			$id = $this->pages_model->insertSignUpForm($data);
			if($id=='E'){
				$response = [ "result" => false, "message" => "Email Id exists" ];
			}
			else if((int)$id){
				$response = [ "result" => $id, "message" => "Profile updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Record insert Failed"
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    } 
    //forgot Password Data
    public function forgotPassword_post() {
        $this->form_validation->set_rules('r_email', 'Email Id Required', 'trim|required');	
        
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
			$id = $this->pages_model->forgotPassword($data);
			if((int)$id){
				$response = [ "result" => $id, "message" => "Profile updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Record not updated"
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    } 
	//Check login frontend user
    public function checkLogin_post() {
        $this->form_validation->set_rules('u_email', 'Email Id Required', 'trim|required');	
        $this->form_validation->set_rules('u_password','Password No Required', 'trim|required');	
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
			$id = $this->pages_model->checkLogin($data);
			 
			 if((int)$id){
				$response = [ "result" => $id, "message" => "Profile updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Login Failed"
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
}

?>
