<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("user_model");
		$this->load->model("site_model");
    }

    	public function findSingleTestimonial_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND testimonial_id = $id ";
			$response = [
				"result" => $this->site_model->findSingleTestimonial($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleTestimonial_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and testimonial_id <>$id";
		    }
			$response = [
				"result" => $this->site_model->findMultipleTestimonial($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createTestimonial_post() {
	 
        $this->form_validation->set_rules('client_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->site_model->createTestimonial($data);
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
	
	public function updateTestimonial_post() {
		$this->form_validation->set_rules('client_name', 'Name Required', 'trim|required');
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
			$result = $this->site_model->updateTestimonial($data);
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
	
	public function deleteTestimonial_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->site_model->deleteTestimonial($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishTestimonial_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->site_model->updatePublishTestimonial($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 

	public function create_post() {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
		 
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
		 
			$page_id = $this->user_model->create($data);
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
	public function adduserData_post() {
        $this->form_validation->set_rules('email', 'email', 'trim|required');
		 
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
		 
			$page_id = $this->user_model->adduserData($data);
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
	//Password change
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
			$id = $this->user_model->change_password($data);
			if($id){
				$response = [ "result" => $id, "message" => "Password updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Please enter correct old Password and new password"
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	//Email Change
	public function updateEmail_post() {
        $this->form_validation->set_rules('old_email', 'Old Email', 'trim|required');
		$this->form_validation->set_rules('new_email', 'New Email', 'trim|required'); 		
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
			$id = $this->user_model->updateEmail($data);
			if($id){
				$response = [ "result" => $id, "message" => "Email updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Please enter correct old Email and new Email"
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
    //update Profile Data
    public function updateProfileData_post() {
        $this->form_validation->set_rules('fname', 'first name', 'trim|required');	
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
			$id = $this->user_model->updateProfileData($data);
			if($id){
				$response = [ "result" => $id, "message" => "Profile updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Record Update Failed"
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
    //insert data into Grievance
     public function insertGrievance_post() {
        $this->form_validation->set_rules('griev_type', 'Grievance type', 'trim|required');	
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
			$id = $this->user_model->insertGrievance($data);
			if($id){
				$response = [ "result" => $id, "message" => "Record insert successfully" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert"
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
   public function findmultiple_get($id) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insuffient information provided.",
			];
		}
		else {
			$strWhere .= "  user_id = $id ";
			$response = [
				"result" => $this->user_model->findmultiple($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
//get design Data
	public function fetchSingleDesignPackage_post() {
		$data = $this->post();
		$package_code = $data['package_code'];
		$strWhere = "enquiry_number = '{$package_code}' ";		
			 $response = [
				"result" => $this->user_model->fetchSingleDesignPackage($strWhere)
			]; 
		
		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	//get Predefine Package  Data
	public function fetchSinglePredefineDesignPackage_post() {
		$data = $this->post(); 
		$package_code = $data['package_code'];
		//print_r($package_code);
		$strWhere=1;
		if($package_code)
		{
			$strWhere = "package_code = '{$package_code}' ";		
			$response = [
				"result" => $this->user_model->fetchSinglePredefineDesignPackage($strWhere)
			];
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
	}
}

?>
