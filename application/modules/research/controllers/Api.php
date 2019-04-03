<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("research_model");
    }

	public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND report_category_id = $id ";
			$response = [
				"result" => $this->research_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCategory_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and report_category_id <>$id";
		    }
			$response = [
				"result" => $this->research_model->findMultipleCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCategory_post() {
	 
        $this->form_validation->set_rules('report_category_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->research_model->createCategory($data);
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
		$this->form_validation->set_rules('report_category_name', 'Name Required', 'trim|required');
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
			$result = $this->research_model->updateCategory($data);
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
				"result" => $this->research_model->deleteCategory($page_id),
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
				"result" => $this->research_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	 
	 /* Research added as per category  */
	public function findSingleResearch_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND report_id = $id ";
			$response = [
				"result" => $this->research_model->findSingleResearch($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleResearch_get($id=0,$front='') { 
	 $strWhere= '1 ';
		    if($id!=0){
			$strWhere .= " AND RS.report_category_id = $id";
		    }
		    if($front!=''){
		//	$strWhere .= " AND  report_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->research_model->findMultipleResearch($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findMultipleReport_get($id=0,$front='') { 
	 
		    if($id!=0){
			$strWhere .= "  RS.report_category_id = $id";
		    }
		    if($front!=''){
			$strWhere .= " AND  report_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->research_model->findMultipleReport($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createResearch_post() {
	 
       
        $this->form_validation->set_rules('report_name', 'Report name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->research_model->createResearch($data);
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
	
	public function updateResearch_post() {
		
        $this->form_validation->set_rules('report_name', 'Report name  Required', 'trim|required');
		 
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
			$result = $this->research_model->updateResearch($data);
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
	
	public function deleteResearch_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->research_model->deleteResearch($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishResearch_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->research_model->updatePublishResearch($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
/////////////////////////////    Research Report Sample  //////////////////////////////////
	/*Research Report Sample Save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function researchReportSampleInsert_post() {
	 
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
			$result = $this->research_model->researchReportSampleInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Research Report Sample sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

	/*Research Report Sample 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function researchReportSample_get() {
		  
		    // get input data
		 
			$result = $this->research_model->researchReportSample();
		
			if($result){
				$response = [ "result" => $result, "message" => "Report Sample Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }



    /////////////////////////////    Research Report Sample  //////////////////////////////////
	/*Research Report Sample Save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function inquiryBeforeBuyingInsert_post() {
	 
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
			$result = $this->research_model->inquiryBeforeBuyingInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Research Inquiry Before Buying  Report sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	


    /*Research Report Sample 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function inquiryBeforeBuying_get() {
		  
		    // get input data
		    
			$result = $this->research_model->inquiryBeforeBuying();
		
			if($result){
				$response = [ "result" => $result, "message" => "Report Inquiry Before Buying Data get.!!!!" ];
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
			$result = $this->research_model->analystQueryInsert($data);
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
		    
			$result = $this->research_model->analystQuery();
		
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
			$result = $this->research_model->salesQueryInsert($data);
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
		    
			$result = $this->research_model->salesQuery();
		
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




     /////////////////////////////  Research Speak Consultant ///////////////////////////////
	/*Research Speak Consultant
			22/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function researchSpeakConsultantInsert_post() {
	 
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
			$result = $this->research_model->researchSpeakConsultantInsert($data);
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

	/*Analytics Speak Consultant  
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function researchSpeakConsultant_get() {
		  
		    // get input data
		 
			$result = $this->research_model->researchSpeakConsultant();
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


	/**
	 * licence Purchase
	 21/5/2018
	 * @access public
	 * @param  form post data
	 * @return array of objects
	 */  
	public function licencePurchase_post() {
	 
        $this->form_validation->set_rules('report_id', 'report details Required', 'trim|required');
        $this->form_validation->set_rules('user_id', 'user Details Required', 'trim|required');
        $this->form_validation->set_rules('licence_type', 'Licence Type Required', 'trim|required');
        $this->form_validation->set_rules('licence_amount', 'Licence Amount Required', 'trim|required');
		 
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
			$purchase_id = $this->research_model->licencePurchase($data);
			if($purchase_id){
				$response = [ "result" => $purchase_id, "message" => "Request sent successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to request record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*research purchases list 
			21/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function research_purchases_list_get($uid=0) {
		  
		    // get input data 
			if($uid>0){
				$whereCond= " user_id = $uid ";
			}else{
				$whereCond=" 1 ";
			}
			$result = $this->research_model->research_purchases_list($whereCond); 
			if($result){
				$response = [ "result" => $result, "message" => "Report Sample Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }


     /////////////////////////////   Report Customization //////////////////////////////////
	/* Report Customization
			15/6/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function report_customizationInsert_post() {
	 
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
			$result = $this->research_model->report_customizationInsert($data);
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


    /*Report Customization
			15/6/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function report_customization_get() {
		  
		    // get input data
		    
			$result = $this->research_model->report_customization();
		
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
				"result" => $this->research_model->findSingleTeam($strWhere)
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
				"result" => $this->research_model->findMultipleTeam($strWhere)
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
		 
			$page_id = $this->research_model->createTeam($data);
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
			$result = $this->research_model->updateTeam($data);
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
				"result" => $this->research_model->deleteTeam($page_id),
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
				"result" => $this->research_model->updatePublishTeam($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 

	/////////////////////////////    Report Customization //////////////////////////////////
	/*Report Customization Sample Save
			31/07/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function reportCustomizationInsert_post() {
	 
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
			$result = $this->research_model->reportCustomizationInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Research Report Sample sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

	/*Research Report Sample 
			06/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function reportCustomizationList_get() {
		  
		    // get input data
		 
			$result = $this->research_model->reportCustomizationList();
		
			if($result){
				$response = [ "result" => $result, "message" => "Report Sample Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
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
				"result" => $this->research_model->findSingleClient($strWhere)
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
				"result" => $this->research_model->findMultipleClient($strWhere)
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
		 
			$page_id = $this->research_model->createClient($data);
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
			$result = $this->research_model->updateClient($data);
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
				"result" => $this->research_model->deleteClient($page_id),
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
				"result" => $this->research_model->updatePublishClient($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 


}

?>