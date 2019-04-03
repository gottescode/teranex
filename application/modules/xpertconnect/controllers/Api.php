<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("xpertconnect_model");
    }

    public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND xpertconnect_cat_id = $id ";
			$response = [
				"result" => $this->xpertconnect_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCategory_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and xpertconnect_cat_id <>$id";
		    }
			$response = [
				"result" => $this->xpertconnect_model->findMultipleCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCategory_post() {
	 
        $this->form_validation->set_rules('xpertconnect_cat_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->xpertconnect_model->createCategory($data);
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
		$this->form_validation->set_rules('xpertconnect_cat_name', 'Name Required', 'trim|required');
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
			$result = $this->xpertconnect_model->updateCategory($data);
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
				"result" => $this->xpertconnect_model->deleteCategory($page_id),
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
				"result" => $this->xpertconnect_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	
	/* Assign Programmers */
	public function assignProgrammers_post() {
			 
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
			
			$id = $this->xpertconnect_model->assignProgrammers($data);
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
				$strWhere .= " AND raap.programmer_id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->xpertconnect_model->remote_application_consultant($strWhere)
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
				"result" => $this->xpertconnect_model->findSingleDetailsCustomerPrgrammingReq($strWhere)
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
				"result" => $this->xpertconnect_model->findSingle_remote_application_consultant($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findFeaturedListProgrammer_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND id= '{$rpr_id}' "; 
		    }
			$response = [
				"result" => $this->xpertconnect_model->findFeaturedListProgrammer($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findFeaturedListRemoteTraining_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->xpertconnect_model->findFeaturedListRemoteTraining($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
		public function findFeaturedListRemoteApplication_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->xpertconnect_model->findFeaturedListRemoteApplication($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
		public function findFeaturedListRemoteProgramming_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->xpertconnect_model->findFeaturedListRemoteProgramming($strWhere)
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
				"result" => $this->xpertconnect_model->findMultipleRequestList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/**
	 * serach Multiple programers List
	 * @access public
	 * @param   start limit and end limit
	 * @return array of objects
	 */ 
	public function findMultipleProgrammer_get($start='',$end='') {
			$strWhere =1;
			$strWhere.= " AND u_user_type = 'CN' ";
		    if($start!=''){
				$strWhere .= " LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->xpertconnect_model->findMultipleProgrammer($strWhere)
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
			$strWhere= "   u_user_type = 'CN' ";
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
				"result" => $this->xpertconnect_model->findMultipleProgrammer($strWhere)
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
	 
        $this->form_validation->set_rules('part_name', 'Part Name Required', 'trim|required');
        $this->form_validation->set_rules('material_type', 'Material Type Required', 'trim|required');
        $this->form_validation->set_rules('application_required', 'Material Type Required', 'trim|required');
		 
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
			$page_id = $this->xpertconnect_model->createRfq($data);
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
	public function updateXpertConnect_post() {
	 
        $this->form_validation->set_rules('programmer_id', 'Programmer', 'trim|required');
         
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
			$page_id = $this->xpertconnect_model->updateXpertConnect($data);
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
	public function updateRemoteTraining_post() {
	 
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
         
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
			$page_id = $this->xpertconnect_model->updateRemoteTraining($data);
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
	public function updateRemoteApplication_post() {
	 
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
         
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
			$page_id = $this->xpertconnect_model->updateRemoteApplication($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Request sent successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to request record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function updateRemoteProgramming_post() {
	 
        $this->form_validation->set_rules('user_id', 'User ID', 'trim|required');
         
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
			$page_id = $this->xpertconnect_model->updateRemoteProgramming($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Request sent successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to request record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function findMultipleProgrammerRecentlyViewed_post() {
			 // get input data
			$data = $this->post(); 
			$recentlyViewedId = $data['recentlyViewedId'];
			$strWhere= "   MU.uid IN({$recentlyViewedId}) ";
			$response = [
				"result" => $this->xpertconnect_model->findMultipleProgrammer($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleProgrammerRecentlyViewedApplication_post() {
			 // get input data
			$data = $this->post(); 
			$recentlyViewedId = $data['recentlyViewedId'];
			$strWhere= "   MU.uid IN({$recentlyViewedId}) ";
			$response = [
				"result" => $this->xpertconnect_model->findMultipleUserList($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleProgrammerRecentlyViewedProgramming_post() {
			 // get input data
			$data = $this->post(); 
			$recentlyViewedId = $data['recentlyViewedId'];
			$strWhere= "   MU.uid IN({$recentlyViewedId}) ";
			$response = [
				"result" => $this->xpertconnect_model->findMultipleUserList($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleProgrammerRecentlyViewedTraining_post() {
			 // get input data
			$data = $this->post(); 
			$recentlyViewedId = $data['recentlyViewedId'];
			$strWhere= "   MU.uid IN({$recentlyViewedId}) ";
			$response = [
				"result" => $this->xpertconnect_model->findMultipleUserList($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	
	
}

?>