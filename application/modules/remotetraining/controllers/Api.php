<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("remotetraining_model");
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
				"result" => $this->remotetraining_model->findSingleCategory($strWhere)
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
				"result" => $this->remotetraining_model->findMultipleCategory($strWhere)
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
		 
			$page_id = $this->remotetraining_model->createCategory($data);
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
			$result = $this->remotetraining_model->updateCategory($data);
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
				"result" => $this->remotetraining_model->deleteCategory($page_id),
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
				"result" => $this->remotetraining_model->updatePublishCategory($data),
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
				"result" => $this->remotetraining_model->findSingleCourse($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCourse_get($id=0,$start='',$end='') { 
	 
		    if($id!=0){
				$strWhere .= "  cat_id = $id  GROUP BY CL.cid ";
		    }
		    if($start!=''){
					$strWhere .= "  LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->remotetraining_model->findMultipleCourse($strWhere)
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
		 
			$page_id = $this->remotetraining_model->createCourse($data);
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
			$result = $this->remotetraining_model->updateCourse($data);
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
				"result" => $this->remotetraining_model->deleteCourse($page_id),
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
				"result" => $this->remotetraining_model->updatePublishCourse($data),
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
				"result" => $this->remotetraining_model->findSingleContent($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleContent_get($id=0) {  
		    if($id!=0){
			$strWhere .= "  course_id = $id";
		    }
			$response = [
				"result" => $this->remotetraining_model->findMultipleContent($strWhere)
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
			$page_id = $this->remotetraining_model->createContent($data);
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
			$result = $this->remotetraining_model->updateContent($data);
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
				"result" => $this->remotetraining_model->deleteContent($page_id),
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
				"result" => $this->remotetraining_model->updatePublishContent($data),
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
				"result" => $this->remotetraining_model->findSingleFaq($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleFaq_get($id=0) {  
		    if($id!=0){
			$strWhere .= "  course_id = $id";
		    }
			$response = [
				"result" => $this->remotetraining_model->findMultipleFaq($strWhere)
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
			$page_id = $this->remotetraining_model->createFaq($data);
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
			$result = $this->remotetraining_model->updateFaq($data);
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
				"result" => $this->remotetraining_model->deleteFaq($page_id),
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
				"result" => $this->remotetraining_model->updatePublishFaq($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	// get trainee User List from master Table traineeUserList 
	public function traineeUserList_get() {
			$strWhere=" u_user_type ='T' ";
			$response = [
				"result" => $this->remotetraining_model->traineeUserList( $strWhere),
				 
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
			$result = $this->remotetraining_model->courseEnrollment($data);
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
				"result" => $this->remotetraining_model->findMultipleComment( $couserId),
				 
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

		/**
	 * serach Trainers programers List
	 * @access public
	 * @param   start limit and end limit
	 * @return array of objects
	 */ 
	public function findMultipleTrainers_get() {
			$strWhere =1;
			$strWhere.= " AND u_user_type = 'T' ";
		  /* if($start!=''){
				$strWhere .= " LIMIT $start, $end";
		    }*/
			$response = [
				"result" => $this->remotetraining_model->findMultipleTrainers($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	} 
	/* 
		findMultiple Trainers Post serach
		20/7/2018
		@param  post Data 
	 * @return array of objects		
	*/
	public function findMultipleTrainersPost_post() {
			 // get input data
			$data = $this->post(); 
			$strWhere= "   u_user_type = 'T' ";
		    if($data['language']!=''){
				$strWhere .= " AND FIND_IN_SET($data[language],language)  ";
		    }
		    if($data['trainerName']!=''){
				$strWhere .= " AND u_name LIKE '%$data[trainerName]%' ";
		    }
		    if($data['start']!=''){
				$strWhere .= " LIMIT $data[start], $data[end]";
		    }
			$response = [
				"result" => $this->remotetraining_model->findMultipleTrainers($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/* Course customer Request
	   20/07/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function courseRequest_post() {
	 
        $this->form_validation->set_rules('product_cat', 'Product Category Required', 'trim|required');
        $this->form_validation->set_rules('prod_brandName', 'Product name Required', 'trim|required');
        $this->form_validation->set_rules('prod_model', 'Model  Required', 'trim|required');
		 
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
		 
			$page_id = $this->remotetraining_model->courseRequest($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Course Request sent successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }

    //collectiveBuyingReqList
	// customer post request data
	
	public function courseReqList_get() {
			$strWhere="";
			$response = [
				"result" => $this->remotetraining_model->courseReqList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}


	/* Assign Supplier */
	public function assignSupplier_post() {
			 
        $this->form_validation->set_rules('id[]', 'select Supplier', 'trim|required'); 
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
			
			$id = $this->remotetraining_model->assignSupplier($data);
			if($id){
				$response = [ "result" => $id, "message" => "Supplier Assigned Successfully...!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to assigned record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }

    //supplierList
	// customer post request data
	
	public function supplierList_get() {
			$strWhere="";
			$response = [
				"result" => $this->remotetraining_model->supplierList()
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

	//supplierList
	// customer post request data
	
	public function requestListAsUser_get($uid) {
			$strWhere="";
			$response = [
				"result" => $this->remotetraining_model->requestListAsUser($uid)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}


	public function requestDetails_get($csrId) {
			$strWhere="";
			$response = [
				"result" => $this->remotetraining_model->requestDetails($csrId)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}

		/**

	 * Course Request From Supplier

	 * Deepak Shinde 12-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function CourseSuppliers_get($ccrID) {

		if( !(int)$ccrID){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->remotetraining_model->CourseSuppliers($ccrID),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**
	 * Single Quotation Supplier List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function SingleCourseSuppliers_get($ccrID) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($ccrID!=0){
				$strWhere .= " AND ccr_id= '{$ccrID}' "; 
		    }
			$response = [
				"result" => $this->remotetraining_model->SingleCourseSuppliers($strWhere),
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * View Quatation List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingle_Course_quote_supplier_get($csr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($csr_id!=0){
				$strWhere .= " AND csr_id= '{$csr_id}' "; 
		    }
			$response = [
				"result" => $this->remotetraining_model->findSingle_Course_quote_supplier($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/* Group Buying Request accept by Admin

			30/4/2018

	*/

	public function CourseSupplierListUpdate_get($csr_id) {

		if( !(int)$csr_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->remotetraining_model->CourseSupplierListUpdate($csr_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}
/* Course Modules */
	public function createCourseModule_post() {
	 
        $this->form_validation->set_rules('course_id', 'Required', 'trim|required');
         
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
		 
			$page_id = $this->remotetraining_model->createCourseModule($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function courseModuleList_get($cid) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and course_id = $cid";
		    }
			$response = [
				"result" => $this->remotetraining_model->courseModuleList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findSingleCourseModule_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->remotetraining_model->findSingleCourseModule($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function updateCourseModule_post() {
		$this->form_validation->set_rules('id', 'Module  Required', 'trim|required');
         
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
			$result = $this->remotetraining_model->updateCourseModule($data);
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
	
	public function deleteCourseModule_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->remotetraining_model->deleteCourseModule($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

	public function createModuleContent_post() {
	 
        $this->form_validation->set_rules('module_title_id', 'Required', 'trim|required');
         
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
		 
			$page_id = $this->remotetraining_model->createModuleContent($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function courseModuleListContent_get($id) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and module_title = $id";
		    }
			$response = [
				"result" => $this->remotetraining_model->courseModuleListContent($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findSingleCourseModuleContent_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->remotetraining_model->findSingleCourseModuleContent($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function updateCourseModuleContent_post() {
		$this->form_validation->set_rules('id', 'Module  Required', 'trim|required');
         
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
			$result = $this->remotetraining_model->updateCourseModuleContent($data);
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
	
	public function deleteCourseModuleContent_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->remotetraining_model->deleteCourseModuleContent($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function createModuleContentSub_post() {
	 
        $this->form_validation->set_rules('module_title_id', 'Required', 'trim|required');
         
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
		 
			$page_id = $this->remotetraining_model->createModuleContentSub($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function courseModuleListContentSub_get($id) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and module_title = $id";
		    }
			$response = [
				"result" => $this->remotetraining_model->courseModuleListContentSub($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findSingleCourseModuleContentSub_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->remotetraining_model->findSingleCourseModuleContentSub($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function updateCourseModuleContentSub_post() {
		$this->form_validation->set_rules('id', 'Module  Required', 'trim|required');
         
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
			$result = $this->remotetraining_model->updateCourseModuleContentSub($data);
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
	
	public function deleteCourseModuleContentSub_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->remotetraining_model->deleteCourseModuleContentSub($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

	
}

?>