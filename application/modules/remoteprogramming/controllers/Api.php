<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("remoteprogramming_model");
    }
	
	public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND cat_id = $id ";
			$response = [
				"result" => $this->remoteprogramming_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCategory_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and cat_id <>$id";
		    }
			$response = [
				"result" => $this->remoteprogramming_model->findMultipleCategory($strWhere)
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
		 
			$page_id = $this->remoteprogramming_model->createCategory($data);
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
			$result = $this->remoteprogramming_model->updateCategory($data);
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
				"result" => $this->remoteprogramming_model->deleteCategory($page_id),
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
				"result" => $this->remoteprogramming_model->updatePublishCategory($data),
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
			
			$id = $this->remoteprogramming_model->assignProgrammers($data);
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
	public function remoteApplicationProgrammBySupport_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND raap.programmer_id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->remoteprogramming_model->remoteApplicationProgrammBySupport($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findSingleDetailsCustomerPrgrammingReq_get($rpr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND rpr_id= '{$rpr_id}' "; 
		    }
			$response = [
				"result" => $this->remoteprogramming_model->findSingleDetailsCustomerPrgrammingReq($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
	public function findSingleDetailsCustomerPrgrammingReq_rarp_id_get($rpr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rpr_id!=0){
				$strWhere .= " AND rarp_id= '{$rpr_id}' "; 
		    }
			$response = [
				"result" => $this->remoteprogramming_model->findSingleDetailsCustomerPrgrammingReq_rarp_id($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

	public function findMultipleRequestList_get( $strWhere = 1) {
			$response = [
				"result" => $this->remoteprogramming_model->findMultipleRequestList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleProgrammer_get($start='',$end='') {
			$strWhere =1;
			$strWhere.= " AND user_role = 7 ";
		    if($start!=''){
				$strWhere .= " LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->remoteprogramming_model->findMultipleProgrammer($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleProgrammerPost_post() {
			$data = $this->post(); 

			$strWhere= "   u_user_type = 'P' ";
		    if($data['language']!=''){
				//$strWhere .= " AND FIND_IN_SET($data[language],language)  ";
		    }
		    if($data['programerName']!=''){
				$strWhere .= " AND u_name LIKE '%$data[programerName]%' ";
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
				"result" => $this->remoteprogramming_model->findMultipleProgrammer($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	 
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
		 
			$page_id = $this->remoteprogramming_model->createRfq($data);
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
	//9/5/2018
	//findSingle remote application aggrement request programmer
	public function findSingle_remote_application_aggrement_request_programmer_get($rarp_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($rarp_id!=0){
				$strWhere .= " AND rarp_id= '{$rarp_id}' "; 
		    }
			$response = [
				"result" => $this->remoteprogramming_model->findSingle_remote_application_aggrement_request_programmer($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
        
                public function findSingle_remote_prog_Rfq_quataion_get($rarp_id=0) {
            //echo $drrs_id;die;
		    if($rarp_id!=0){
				$strWhere .= "rarp_id= '{$rarp_id}' "; 
		    }
			$response = [
				"result" => $this->remoteprogramming_model->findSingle_remote_prog_Rfq_quataion($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
        
        


public function remote_program_req_suppliers_get($dmrID) {

		if( !(int)$dmrID){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->remoteprogramming_model->remote_program_req_suppliers($dmrID),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}


	public function remote_program_req_suppliers_list_get($dmrID) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($dmrID!=0){
				$strWhere .= " AND rpr_id= '{$dmrID}' "; 
		    }
			$response = [
				"result" => $this->remoteprogramming_model->remote_program_req_suppliers_list($strWhere),
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
        public function RemoteProgramSupplierListAcceptByadmin_post() {
            // get input data
			$data = $this->post(); 
			$page_id = $this->remoteprogramming_model->RemoteProgramSupplierListAcceptByadmin($data);
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
        
        	public function findSingle_RemoteProgramming_quote_supplier_get($drrs_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($drrs_id!=0){
				$strWhere .= " AND rarp_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->remoteprogramming_model->findSingle_RemoteProgramming_quote_supplier($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
        
        public function RemoteProgrammerAcceptBycustomer_get($rarp_id) {

		if( !(int)$rarp_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->remoteprogramming_model->RemoteProgrammerAcceptBycustomer($rarp_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}
        
        public function RemoteProgrammerSupplierListAcceptByreject_get($rarp_id) {

		if( !(int)$rarp_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->remoteprogramming_model->RemoteProgrammerSupplierListAcceptByreject($rarp_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}


       
	
}

?>