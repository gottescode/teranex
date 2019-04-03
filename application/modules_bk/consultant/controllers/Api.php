<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("consultant_model");
    }

	public function findSingle_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND consultant_id = $id ";
			$response = [
				"result" => $this->consultant_model->findSingle($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findSinglequalification_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->consultant_model->findSinglequalification($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* SINGLE CONSULTANT DATA */
	public function findSingleConsultant_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND mu.uid = $id ";
			$response = [
				"result" => $this->consultant_model->findSingleConsultant($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function remoteServiceRequestList_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND consultant_id = $id ";
			$response = [
				"result" => $this->consultant_model->remoteServiceRequestList($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function rejectRequestRemoteService_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			
			$response = [
				"result" => $this->consultant_model->rejectRequestRemoteService($id)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function acceptRequestRemoteService_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			
			$response = [
				"result" => $this->consultant_model->acceptRequestRemoteService($id)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findMultiple_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;

			$response = [
				"result" => $this->consultant_model->findMultiple($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceEngineer_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;

			$response = [
				"result" => $this->consultant_model->findMultipleServiceEngineer($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsultantQualification_get($id=0) { 
		//$strWhere = $this->get("strWhere");
		//if(!$strWhere) $strWhere = 1;

			$response = [
				"result" => $this->consultant_model->findMultipleConsultantQualification()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
/*  Invoice List*/
	public function findSingleInvoiceDetails_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		$strWhere = " raai.raar_id = {$id} ";
			$response = [
				"result" => $this->consultant_model->findSingleInvoiceDetails($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
/*  Invoice List RemoteMachine*/
	public function findSingleInvoiceDetailsRemoteMachine_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		$strWhere = " rmsi.rmr_id = {$id} ";
			$response = [
				"result" => $this->consultant_model->findSingleInvoiceDetailsRemoteMachine($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
/*  Invoice List RemoteMachine Final*/
	public function findSingleInvoiceDetailsRemoteMachinefinal_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		$strWhere = " rmsi.rmr_id = {$id} ";
			$response = [
				"result" => $this->consultant_model->findSingleInvoiceDetailsRemoteMachinefinal($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* Requested Service List */
	public function findMultipleServiceRequestList_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
			$strWhere .= " and rar_id <>$id";
		    
			$response = [
				"result" => $this->consultant_model->findMultipleServiceRequestList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsultantUsersList_get($id=0) { 
		$strWhere = 1;
		$strWhere .= " AND uid <>$id";
		$strWhere .= " AND user_type=1 AND user_role=3 OR user_type=3 AND user_role=3 ";
		$response = [
			"result" => $this->consultant_model->findMultipleConsultantUsersList($strWhere)
		];
		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsultantUsersListSupplierServiceEngg_get($id=0) { 
		$strWhere = 1;
		$strWhere .= " AND uid <>$id";
		$strWhere .= " AND user_type=1 AND user_role=3 ";
		$response = [
			"result" => $this->consultant_model->findMultipleConsultantUsersList($strWhere)
		];
		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findMultipleAddress_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and consultant_id=$id";
		    }
			$response = [
				"result" => $this->consultant_model->findMultipleAddress($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findMultipleRequestMachineConsultantList_get($id=0) { 
			$response = [
				"result" => $this->consultant_model->findMultipleRequestMachineConsultantList()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	
	public function create_post() {
	 
        $this->form_validation->set_rules('c_email', 'Email Id Required', 'trim|required');
		 
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
		 
			$page_id = $this->consultant_model->create($data);
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
	public function createConsultantQualification_post() {
	 
        $this->form_validation->set_rules('qualification', 'Qualification ', 'trim|required');
		 
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
		 
			$page_id = $this->consultant_model->createConsultantQualification($data);
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
	/* Create Final Invoice by admin */
	public function createFinalInvoice_post() {
	 
        $this->form_validation->set_rules('total_amount_perc', 'Total Amount Required', 'trim|required');
        $this->form_validation->set_rules('total_amount', 'Total amount Required', 'trim|required');
		 
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
		 
			$page_id = $this->consultant_model->createFinalInvoice($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Final Invoice Created Successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* Create Remote M/C Request From Customer */
	public function createRemoteMachineRequest_post() {
	 
        $this->form_validation->set_rules('user_id', 'User Id Required', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Company Name Required', 'trim|required');
 
		 
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
		 //print_r($data);die;
			$page_id = $this->consultant_model->createRemoteMachineRequest($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Consultant Requested Successfully added...!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* Create Expert Request */
	public function createExpertRequest_post() {
	 
        $this->form_validation->set_rules('user_id', 'User Id Required', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Company Name Required', 'trim|required');
 
		 
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
		 
			$page_id = $this->consultant_model->createExpertRequest($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Consultant Requested Successfully added...!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateOldInvoice_post() {
		$this->form_validation->set_rules('rmr_id', 'rmr_id Required', 'trim|required');
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
			$result = $this->consultant_model->updateOldInvoice($data);
			if($result){
				$response = [ "result" => $result, "message" => "Final Invoice Created Successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function update_post() {
		$this->form_validation->set_rules('c_email', 'Email Id Required', 'trim|required');
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
			$result = $this->consultant_model->update($data);
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
	public function updateQualification_post() {
		$this->form_validation->set_rules('qualification', 'Qualification is Required', 'trim|required');
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
			$result = $this->consultant_model->updateQualification($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function deleteConsultant_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consultant_model->deleteConsultant($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	public function deleteQualification_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consultant_model->deleteQualification($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishConsultant_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->consultant_model->updatePublishConsultant($data),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	
	// address list as per Consaltant_id
	public function findAddress_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and consultant_id = $id";
		    }
			$response = [
				"result" => $this->consultantr_model->findAddressList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	// address list as per Consaltant_id
	public function requestServiceSupport_post($id=0) { 
		$this->form_validation->set_rules('service_type', 'service type Required', 'trim|required');
		$this->form_validation->set_rules('company_name', 'Company Name Required', 'trim|required');
		$this->form_validation->set_rules('machine_model_no', 'Machine Model No Required', 'trim|required');
		
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
			$result = $this->consultant_model->requestServiceSupport($data);
			if($result>0){
				$response = [ "result" => $result, "message" => "Request added successfully. Your Request No <strong>$result</strong>  " ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function assignconsultant_post() {
			 
        $this->form_validation->set_rules('id[]', 'select Consultant', 'trim|required'); 
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
			
			$id = $this->consultant_model->assignconsultant($data);
			if($id){
				$response = [ "result" => $id, "message" => "Consultant Assigned Successfully...!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function assignconsultantOndemand_post() {
			 
        $this->form_validation->set_rules('id[]', 'select Consultant', 'trim|required'); 
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
			
			$id = $this->consultant_model->assignconsultantOndemand($data);
			if($id){
				$response = [ "result" => $id, "message" => "Consultant Assigned Successfully...!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	//
	public function sentRemoteOndemandConsultantList_get($rar_id) { 
			$data = $this->consultant_model->sentRemoteOndemandConsultantList($rar_id);
			if($data){
				$response = [ "result" => $data ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to fetch record."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }  
	
	public function findSingleRecentlyViewed_get( $uid, $strWhere = 1) {
		if( !(int)$uid ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND user_id = $uid ";
			$response = [
				"result" => $this->consultant_model->findSingleRecentlyViewed($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findSingleRecentlyViewedRemoteApplication_get( $uid, $strWhere = 1) {
		if( !(int)$uid ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND user_id = $uid ";
			$response = [
				"result" => $this->consultant_model->findSingleRecentlyViewedRemoteApplication($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findSingleRecentlyViewedRemoteProgramming_get( $uid, $strWhere = 1) {
		if( !(int)$uid ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND user_id = $uid ";
			$response = [
				"result" => $this->consultant_model->findSingleRecentlyViewedRemoteProgramming($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findSingleRecentlyViewedRemoteTraining_get( $uid, $strWhere = 1) {
		if( !(int)$uid ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND user_id = $uid ";
			$response = [
				"result" => $this->consultant_model->findSingleRecentlyViewedRemoteTraining($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findSingleRecentlyViewedServiceEngineer_get( $uid, $strWhere = 1) {
		if( !(int)$uid ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND user_id = $uid ";
			$response = [
				"result" => $this->consultant_model->findSingleRecentlyViewedServiceEngineer($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function updateRecentlyViewed_post() {
		$this->form_validation->set_rules('programmer_ids', 'programmer_ids', 'trim|required');
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
			$result = $this->consultant_model->updateRecentlyViewed($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function updateRecentlyViewedApplication_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->updateRecentlyViewedApplication($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function updateRecentlyViewedProgramming_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->updateRecentlyViewedProgramming($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function updateRecentlyViewedTraining_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->updateRecentlyViewedTraining($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function updateRecentlyViewedServiceEnginner_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->updateRecentlyViewedServiceEnginner($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function createRecentlyViewed_post() {
		$this->form_validation->set_rules('programmer_ids', 'programmer_ids', 'trim|required');
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
			$result = $this->consultant_model->createRecentlyViewed($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function createRecentlyViewedApplication_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->createRecentlyViewedApplication($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function createRecentlyViewedProgramming_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->createRecentlyViewedProgramming($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function createRecentlyViewedTraining_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->createRecentlyViewedTraining($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function createRecentlyViewedServiceEngineer_post() {
		$this->form_validation->set_rules('consultant_ids', 'consultant_ids', 'trim|required');
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
			$result = $this->consultant_model->createRecentlyViewedServiceEngineer($data);
			if($result){
				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
/* Create RemoteApplication Request */
	public function createRemoteApplicationRequest_post() {
	 
        $this->form_validation->set_rules('user_id', 'User Id Required', 'trim|required');
        $this->form_validation->set_rules('company_name', 'Company Name Required', 'trim|required');
 
		 
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
		 
			$page_id = $this->consultant_model->createRemoteApplicationRequest($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Remote Application Requested Successfully added...!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }


    /***********************************/
 	/* Remote Service Video Request Admin
	   12/8/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function VideoRequestInsert_post() {
		  
		$this->form_validation->set_rules('video_chat', 'Video Chat Required', 'trim|required');
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
			$result = $this->consultant_model->VideoRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine video Request added successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
    }

    /* Remote Service Video Request Admin
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findMultipleVideoRequest_get() { 
			$response = [
				"result" => $this->consultant_model->findMultipleVideoRequest()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findMultipleProgrammer_get( $strWhere = 1) {
			$response = [
				"result" => $this->consultant_model->findMultipleProgrammer($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function assignProgrammer_get() {
			$data = $this->get();
			$response = [
				"result" => $this->consultant_model->assignProgrammer($data)
			]; 
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function VideoRequestListProgrammer_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->consultant_model->VideoRequestListProgrammer($userid);
		if($result){
			$response = [ "result" => $result ];
		} else {
			$response = [
				"result" => false,
				'message' => " Data Not Found"
			];
		}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }

    	/* machine Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function VideoRequestList_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->consultant_model->VideoRequestList($userid);
		if($result){
			$response = [ "result" => $result ];
		} else {
			$response = [
				"result" => false,
				'message' => " Data Not Found"
			];
		}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
}

?>