<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("remoteapplication_model");
    }
	
	/* Assign Programmers */
	public function assignApplicationEngineer_post() {
			 
        $this->form_validation->set_rules('id[]', 'select Application Engineer', 'trim|required'); 
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
			
			$id = $this->remoteapplication_model->assignApplicationEngineer($data);
			if($id){
				$response = [ "result" => $id, "message" => "Programmers Assigned Successfully...!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function remote_application_consultant_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND raap.applicationengineer_id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->remoteapplication_model->remote_application_consultant($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/**
	 * find Single Details Customer Prgramming request
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingleDetailsCustomerPrgrammingReq_get($rpr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND rpr_id= '{$rpr_id}' "; 
		    }
			$response = [
				"result" => $this->remoteapplication_model->findSingleDetailsCustomerPrgrammingReq($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


	/**
	 * find Single Details Customer Prgramming request
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingleDetailsStatusRFQ_get($rpr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND rpr_id= '{$rpr_id}' "; 
		    }
			$response = [
				"result" => $this->remoteapplication_model->findSingleDetailsStatusRFQ($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/**
	 * find Single remote application consultant 
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingle_remote_application_consultant_get($rpr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND racrp_id= '{$rpr_id}' "; 
		    }
			$response = [
				"result" => $this->remoteapplication_model->findSingle_remote_application_consultant($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	/**
	 * fetch Multiple Request List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findMultipleRequestList_get( $strWhere = 1) {
			$response = [
				"result" => $this->remoteapplication_model->findMultipleRequestList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}


	
	/**
	 * serach Multiple programers List
	 * @access public
	 * @param   start limit and end limit
	 * @return array of objects
	 */ 
	public function findMultipleApplicationEngineer_get($start='',$end='') {
			$strWhere =1;
			$strWhere.= " AND user_role ='6'";
		    if($start!=''){
				$strWhere .= " LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->remoteapplication_model->findMultipleApplicationEngineer($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	} 
	/* 
		findMultiple Programmer Post serach
		3/5/2018
		@param  post Data 
	 * @return array of objects		
	*/
	public function findMultipleProgrammerPost_post() {
			 // get input data
			$data = $this->post(); 
			//$strWhere= "   u_user_type = 'CN' ";
			$strWhere= "   user_type = 3 AND user_role=6 OR user_type = 4 AND user_role=6 ";
		    if($data['language']!=''){
				$strWhere .= " AND FIND_IN_SET($data[language],language)  ";
		    }
		    if($data['programerName']!=''){
				$strWhere .= " AND u_name LIKE '%$data[programerName]%' ";
		    }
		    if($data['start']!=''){
				$strWhere .= " LIMIT $data[start], $data[end]";
		    }
			$response = [
				"result" => $this->remoteapplication_model->findMultipleProgrammer($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	/**
	 * insert RFQ  
	 * @access public
	 * @param  form post data
	 * @return array of objects
	 */  
	public function createRfq_post() {
	 
        $this->form_validation->set_rules('part_name', 'Application Name Required', 'trim|required');
		//$this->form_validation->set_rules('material_type', 'Material Type Required', 'trim|required');
        //$this->form_validation->set_rules('application_required', 'Material Type Required', 'trim|required');
		 
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
			$page_id = $this->remoteapplication_model->createRfq($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Request sent successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to request record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }

  	/* Remote Apllication Video Request Admin
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
			$result = $this->remoteapplication_model->VideoRequestInsert($data);
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
	/* machine Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function VideoRequestList_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->remoteapplication_model->VideoRequestList($userid);
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
	public function VideoRequestListSupplier_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->remoteapplication_model->VideoRequestListSupplier($userid);
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
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findMultipleVideoRequest_get() { 
			$response = [
				"result" => $this->remoteapplication_model->findMultipleVideoRequest()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findMultipleSupplier_get( $strWhere = 1) {
			$response = [
				"result" => $this->remoteapplication_model->findMultipleSupplier($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function assignSupplier_get() {
			$data = $this->get();
			$response = [
				"result" => $this->remoteapplication_model->assignSupplier($data)
			]; 
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/********* Remote Application RFQ Request *******/

	public function remote_application_rfq_request_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND raap.applicationengineer_id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->remoteapplication_model->remote_application_rfq_request($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}




	/**
	 * Remote Application Request From Supplier
	 * Deepak Shinde 12-10-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function RemoteApplicationServiceEngineer_get($rpr_id) {
		if( !(int)$rpr_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
		$response = [
				"result" => $this->remoteapplication_model->RemoteApplicationServiceEngineer($rpr_id),				
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}


	/**
	 * View Quatation List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingle_quote_engineer_get($racrp_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($racrp_id!=0){
				$strWhere .= " AND racrp_id= '{$racrp_id}' "; 
		    }
			$response = [
				"result" => $this->remoteapplication_model->findSingle_quote_engineer($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


	/**
	 * Remote Application Get Data
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function SingleRemoteApplicationSE_get($rpr_id) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND rpr_id= '{$rpr_id}' "; 
		    }
			$response = [
				"result" => $this->remoteapplication_model->SingleRemoteApplicationSE($strWhere),
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/* Remote Application RFQ accept by Admin
	   30/4/2018
	*/
	/*public function RemoteApplicationRFQAcceptByadmin_get($racrp_id) {
	if( !(int)$racrp_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->remoteapplication_model->RemoteApplicationRFQAcceptByadmin($racrp_id),			 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}*/

	public function RemoteApplicationRFQAcceptByadmin_post() {
            // get input data
			$data = $this->post(); 
			$page_id = $this->remoteapplication_model->RemoteApplicationRFQAcceptByadmin($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}	
		$this->response($response, REST_Controller::HTTP_OK);
	}

    public function RemoteApplicationSEQuotationAcceptBycustomer_get($racrp_id) {
		if( !(int)$racrp_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->remoteapplication_model->RemoteApplicationSEQuotationAcceptBycustomer($racrp_id),		
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}
        // reject customer quotation
      public function RemoteApplicationSEQuotationAcceptByreject_get($racrp_id) {
		if( !(int)$racrp_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->remoteapplication_model->RemoteApplicationSEQuotationAcceptByreject($racrp_id),			 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);	

	}

	
}

?>