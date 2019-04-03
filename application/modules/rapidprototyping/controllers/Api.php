<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {
  function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("rapidprototyping_model");
    }

	
	/* Research added as per category  */
	public function findSingleRapidPrototyping_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	rapid_prototyping_id = $id ";
			$response = [
				"result" => $this->rapidprototyping_model->findSingleLaserProcessing($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 


    public function findMultipleRapidPrototyping_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and rapid_prototyping_id <>$id";
		    }
			$response = [
				"result" => $this->rapidprototyping_model->findMultipleRapidPrototyping($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

	 
	public function createRapidPrototyping_post() {
	 
       
        $this->form_validation->set_rules('rapid_prototyping_name', 'Rapid Prototyping name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->rapidprototyping_model->createRapidPrototyping($data);
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
	
	public function updateRapidPrototyping_post() {
		
        $this->form_validation->set_rules('rapid_prototyping_name', 'Rapid Prototyping  Required', 'trim|required');
		 
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
			$result = $this->rapidprototyping_model->updateRapidPrototyping($data);
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
	
	public function deleteRapidPrototyping_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->rapidprototyping_model->deleteRapidPrototyping($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishRapidPrototyping_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->rapidprototyping_model->updatePublishRapidPrototyping($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 


	/*Additive Manufacturing Processes Add / Insert / Update API  */
	public function findSingleRapidprototypingOnlineFeatures_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND online_feature_id = $id ";
			$response = [
				"result" => $this->rapidprototyping_model->findSingleRapidprototypingOnlineFeatures($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 


    public function findMultipleRapidprototypingOnlineFeatures_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and online_feature_id <> $id";
		    }
			$response = [
				"result" => $this->rapidprototyping_model->findMultipleRapidprototypingOnlineFeatures($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	

	 
	public function createRapidPrototypingOnlineFeatures_post() {
	 
       
        $this->form_validation->set_rules('online_feature_name', 'Feature name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->rapidprototyping_model->createRapidPrototypingOnlineFeatures($data);
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
	
	public function updateRapidPrototypingOnlineFeatures_post() {
		
        $this->form_validation->set_rules('online_feature_name', 'Feature name Required', 'trim|required');
		 
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
			$result = $this->rapidprototyping_model->updateRapidPrototypingOnlineFeatures($data);
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
	
	public function deleteRapidprototypingOnlineFeatures_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->rapidprototyping_model->deleteRapidprototypingOnlineFeatures($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

	public function updatePublishRapidprototypingOnlineFeatures_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->rapidprototyping_model->updatePublishRapidprototypingOnlineFeatures($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 


		

	public function createRfq_post() {
	 
        $this->form_validation->set_rules('part_name', 'Part Name Required', 'trim|required');
        // $this->form_validation->set_rules('material_type', 'Material Type Required', 'trim|required');
        // $this->form_validation->set_rules('application_required', 'Material Type Required', 'trim|required');
		 
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
		// print_r($data);die;
			$page_id = $this->rapidprototyping_model->createRfq($data);
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
	

	 
	
	/**
	 * find Single remote RFQ Customer 
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingle_remote_rfq_consultant_get($drrs_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND drrs_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->rapidprototyping_model->findSingle_remote_rfq_consultant($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}



    /* Assign Programmers */
	public function assignSuppliers_post() {
			 
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
			
			$id = $this->rapidprototyping_model->assignSuppliers($data);
			if($id){
				$response = [ "result" => $id, "message" => "Suppier Assigned Successfully...!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }


 	public function rapidprototypingBySupport_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND drrs.supplier_id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->rapidprototyping_model->rapidprototypingBySupport($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	//supplierList
	// customer post request data
	
	
	public function findSingleDetailsSupplierReq_get($dmr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) { $strWhere = 1;
		    if($dmr_id!=0){
				$strWhere .= " AND dmr_id= '{$dmr_id}' "; 
		    }
			$response = [
				"result" => $this->rapidprototyping_model->findSingleDetailsSupplierReq($strWhere)
			];
		} 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

	public function findMultipleRequestList_get( $strWhere = 1) {
			$response = [
				"result" => $this->rapidprototyping_model->findMultipleRequestList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSupplier_get($start='',$end='') {
			$strWhere =1;
			$strWhere.= " AND user_role ='6'";
		    if($start!=''){
				$strWhere .= " LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->rapidprototyping_model->findMultipleSupplier($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleSupplierPost_post() {
			$data = $this->post(); 

			$strWhere= "   u_user_type = 'S' ";
		    if($data['language']!=''){
				//$strWhere .= " AND FIND_IN_SET($data[language],language)  ";
		    }
		    if($data['supplierName']!=''){
				$strWhere .= " AND u_name LIKE '%$data[supplierName]%' ";
		    }
			if($data['qualification']!=''){
				$strWhere .= " AND qualification='$data[qualification]' ";
		    }
			if($data['exp_yr']!=''){
				$strWhere .= " AND experience='$data[exp_yr]' ";
		    }
			if($data['programmer_type']!=''){
				$strWhere .= " AND programmer_type='$data[programmer_type]' ";
		    }
			
			$response = [
				"result" => $this->rapidprototyping_model->findMultipleSupplier($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}


	/**
	 * View Quatation List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingle_Rapidprototyping_quote_supplier_get($drrs_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($drrs_id!=0){
				$strWhere .= " AND drrs_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->rapidprototyping_model->findSingle_Rapidprototyping_quote_supplier($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


	public function RapidprototypingSuppliers_get($dmrID) {
		if( !(int)$dmrID){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [

				"result" => $this->rapidprototyping_model->RapidprototypingSuppliers($dmrID),
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
	public function SingleRapidprototypingSuppliers_get($dmrID) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($dmrID!=0){
				$strWhere .= " AND dmr_id= '{$dmrID}' "; 
		    }
			$response = [
				"result" => $this->rapidprototyping_model->SingleRapidprototypingSuppliers($strWhere),
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/* Group Buying Request accept by Admin

			30/4/2018

	*/

	public function RapidprototypingSupplierListAcceptByadmin_post() {

		  $data = $this->post(); 
			$page_id = $this->rapidprototyping_model->RapidprototypingSupplierListAcceptByadmin($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Quotation Updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		
		$this->response($response, REST_Controller::HTTP_OK);

		

	}


	  // view quatation
        
        public function findSingle_rapid_Rfq_quotaion_get($drrs_id=0) {
            //echo $drrs_id;die;
		    if($drrs_id!=0){
				$strWhere .= "drrs_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->rapidprototyping_model->findSingle_rapid_Rfq_quotaion($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}



        public function RapidSupplierListAcceptBycustomer_get($drrs_id) {

		if( !(int)$drrs_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->rapidprototyping_model->RapidSupplierListAcceptBycustomer($drrs_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}
        // reject customer quotation
        public function RapidSupplierListAcceptByreject_get($drrs_id) {

		if( !(int)$drrs_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->rapidprototyping_model->RapidSupplierListAcceptByreject($drrs_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

        


	
	
}

?>