<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("consulting_model");
    }

	public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND consulting_category_id = $id ";
			$response = [
				"result" => $this->consulting_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCategory_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and consulting_category_id <>$id";
		    }
			$response = [
				"result" => $this->consulting_model->findMultipleCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCategory_post() {
	 
        $this->form_validation->set_rules('consulting_category_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->consulting_model->createCategory($data);
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
		$this->form_validation->set_rules('consulting_category_name', 'Name Required', 'trim|required');
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
			$result = $this->consulting_model->updateCategory($data);
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
				"result" => $this->consulting_model->deleteCategory($page_id),
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
				"result" => $this->consulting_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	  /* Research added as per category  */
	public function findSingleCaseStudy_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	case_study_id = $id ";
			$response = [
				"result" => $this->consulting_model->findSingleCaseStudy($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCaseStudy_get($id=0,$front='') { 
	        $strWhere= '1 ';
		    if($id!=0){
			$strWhere .= " AND CCS.consulting_category_id = $id";
		    }
		    if($front!=''){
		//	$strWhere .= " AND  report_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->consulting_model->findMultipleCaseStudy($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findMultipleConsulting_get($id=0,$front='') { 
	 
		    if($id!=0){
			$strWhere .= "  CCS.consulting_category_id = $id";
		    }
		    if($front!=''){
			$strWhere .= " AND  updated_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->consulting_model->findMultipleConsulting($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCaseStudy_post() {
	 
       
        $this->form_validation->set_rules('case_study_name', 'Case Study name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->consulting_model->createCaseStudy($data);
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
	
	public function updateCaseStudy_post() {
		
        $this->form_validation->set_rules('case_study_name', 'Case Study name  Required', 'trim|required');
		 
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
			$result = $this->consulting_model->updateCaseStudy($data);
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
	
	public function deleteCaseStudy_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consulting_model->deleteCaseStudy($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishCaseStudy_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consulting_model->updatePublishCaseStudy($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 

	/////////////////////////////    Research Report Sample  //////////////////////////////////
	/*Request a Call Save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function consultingRequestCallInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->consulting_model->consultingRequestCallInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

	/*Request a Call  
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function consultingRequestCall_get() {
		  
		    // get input data
		 
			$result = $this->consulting_model->consultingRequestCall();
		
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	 
	 /////////////////////////////  consulting Speak Consultant ///////////////////////////////
	/*consulting Speak Consultant
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function consultingSpeakConsultantInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->consulting_model->consultingSpeakConsultantInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

	/*consulting Speak Consultant  
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function consultingSpeakConsultant_get() {
		  
		    // get input data
		 
			$result = $this->consulting_model->consultingSpeakConsultant();
		   // print_r($result);exit;
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	 
	 /////////////////////////////    Webinar  //////////////////////////////////
	/*Webinar
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function webinarInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->consulting_model->webinarInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

	/*Webinar 
			22/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function webinar_get() {
		  
		    // get input data
		
			$result = $this->consulting_model->webinar();
		
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }


      /////////////////////////////   Analyst Query  //////////////////////////////////
	/*Analyst Query Save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function analystQueryInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->consulting_model->analystQueryInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Analyst Inquiry Report sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	


    /*Analyst Query 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function analystQuery_get() {
		  
		    // get input data
		    
			$result = $this->consulting_model->analystQuery();
		
			if($result){
				$response = [ "result" => $result, "message" => "Analyst Inquiry  Report Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }

     /////////////////////////////   Sales Query  //////////////////////////////////
	/*Sales Query Save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function salesQueryInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->consulting_model->salesQueryInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Sales Inquiry  Report sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	


    /*Sales Query 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function salesQuery_get() {
		  
		    // get input data
		    
			$result = $this->consulting_model->salesQuery();
		
			if($result){
				$response = [ "result" => $result, "message" => "Sales Inquiry  Report Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }



     /*Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

	 public function findSingleTeam_get($id, $strWhere = 1) {
	
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND team_id = $id ";
			$response = [
				"result" => $this->consulting_model->findSingleTeam($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleTeam_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and team_id <>$id";
		    }
			$response = [
				"result" => $this->consulting_model->findMultipleTeam($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createTeam_post() {
	 
        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->consulting_model->createTeam($data);
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
	
	public function updateTeam_post() {
		$this->form_validation->set_rules('name', 'Name Required', 'trim|required');
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
			$result = $this->consulting_model->updateTeam($data);
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
	
	public function deleteTeam_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consulting_model->deleteTeam($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishTeam_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consulting_model->updatePublishTeam($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 

	 /*Client List
	  06/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

	 public function findSingleClient_get($id, $strWhere = 1) {
	
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND client_id = $id ";
			$response = [
				"result" => $this->consulting_model->findSingleClient($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleClient_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and client_id <>$id";
		    }
			$response = [
				"result" => $this->consulting_model->findMultipleClient($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createClient_post() {
	 
        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->consulting_model->createClient($data);
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
	
	public function updateClient_post() {
		$this->form_validation->set_rules('name', 'Name Required', 'trim|required');
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
			$result = $this->consulting_model->updateClient($data);
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
	
	public function deleteClient_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consulting_model->deleteClient($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishClient_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consulting_model->updatePublishClient($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	 
}

?>