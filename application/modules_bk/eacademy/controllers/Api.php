<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("eacademy_model");
    }

	public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->eacademy_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCategory_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and id <>$id";
		    }
			$response = [
				"result" => $this->eacademy_model->findMultipleCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCategory_post() {
	 
        $this->form_validation->set_rules('cat_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->eacademy_model->createCategory($data);
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
	
	public function updateCategory_post() {
		$this->form_validation->set_rules('cat_name', 'Name Required', 'trim|required');
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
			$result = $this->eacademy_model->updateCategory($data);
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
	
	public function deleteCategory_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->deleteCategory($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishCategory_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	 
	 /* course added as per category  */
	public function findSingleCourse_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND cid = $id ";
			$response = [
				"result" => $this->eacademy_model->findSingleCourse($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCourse_post($id=0,$start='',$end='') { 
			$strWhere="1";
			$data = $this->post(); 
		    if($id!=0 &&  $data['s_category']=='' ){
				$strWhere .= " AND cat_id = $id  ";
		    }
			 // get input data
			if($data){
				if($data['s_category']){
					$strWhere .= " AND cat_id = $data[s_category] ";
				}
				if($data['course_level']){
					$strWhere .= " AND course_level = $data[course_level] ";
				}
			}
		    
			$strWhere .= "  GROUP BY CL.cid ";
		    
		    if($start!=''){
					$strWhere .= "  LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->eacademy_model->findMultipleCourse($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCourse_post() {
	 
        $this->form_validation->set_rules('cat_id', 'category  Required', 'trim|required');
        $this->form_validation->set_rules('name', 'Course name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->eacademy_model->createCourse($data);
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
	
	public function updateCourse_post() {
		$this->form_validation->set_rules('cat_id', 'category  Required', 'trim|required');
        $this->form_validation->set_rules('name', 'Course name  Required', 'trim|required');
		 
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
			$result = $this->eacademy_model->updateCourse($data);
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
	
	public function deleteCourse_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->deleteCourse($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishCourse_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->updatePublishCourse($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 /* content CRUD API */ 
	public function findSingleContent_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND content_id = $id ";
			$response = [
				"result" => $this->eacademy_model->findSingleContent($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleContent_get($id=0) {  
		    if($id!=0){
			$strWhere .= "  course_id = $id";
		    }
			$response = [
				"result" => $this->eacademy_model->findMultipleContent($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createContent_post() {
	 
        $this->form_validation->set_rules('course_id', 'Course  Required', 'trim|required');
        $this->form_validation->set_rules('title', 'Content name  Required', 'trim|required');
		 
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
			$page_id = $this->eacademy_model->createContent($data);
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
	
	public function updateContent_post() {
		 $this->form_validation->set_rules('course_id', 'Course  Required', 'trim|required');
        $this->form_validation->set_rules('title', 'Content name  Required', 'trim|required');
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
			$result = $this->eacademy_model->updateContent($data);
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
	
	public function deleteContent_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->deleteContent($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishContent_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->updatePublishContent($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	/* FAQ CRUD */ 
	public function findSingleFaq_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND fid = $id ";
			$response = [
				"result" => $this->eacademy_model->findSingleFaq($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleFaq_get($id=0) {  
		    if($id!=0){
			$strWhere .= "  course_id = $id";
		    }
			$response = [
				"result" => $this->eacademy_model->findMultipleFaq($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createFaq_post() {
	 
        $this->form_validation->set_rules('course_id', 'Course  Required', 'trim|required');
        $this->form_validation->set_rules('title', 'Content name  Required', 'trim|required');
		 
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
			$page_id = $this->eacademy_model->createFaq($data);
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
	
	public function updateFaq_post() {
		$this->form_validation->set_rules('course_id', 'Course  Required', 'trim|required');
        $this->form_validation->set_rules('title', 'Content name  Required', 'trim|required');
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
			$result = $this->eacademy_model->updateFaq($data);
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
	
	public function deleteFaq_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->deleteFaq($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishFaq_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->eacademy_model->updatePublishFaq($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	// get trainee User List from master Table traineeUserList 
	public function traineeUserList_get() {
			$strWhere=" u_user_type ='T' ";
			$response = [
				"result" => $this->eacademy_model->traineeUserList( $strWhere),
				 
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	// get trainee User List from master Table  course Enrollment 
	public function courseEnrollment_post() {
		$this->form_validation->set_rules('course_id', 'Course  Required', 'trim|required');
        $this->form_validation->set_rules('firstname', 'User name  Required', 'trim|required');
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
			$result = $this->eacademy_model->courseEnrollment($data);
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
	
	
	/**
	 *find Multiple Comment as per course List
	 * jaywant narwade
			11/4/2018
	 * @access public
	 * @param  post data
	 * @return array of objects
	 */
	public function findMultipleComment_get( $couserId) {
			 
			$response = [
				"result" => $this->eacademy_model->findMultipleComment( $couserId),
				 
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
}

?>