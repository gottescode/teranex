<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {
  function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("laserprocessing_model");
    }

	
	/* Research added as per category  */
	public function findSingleLaserProcessing_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	laser_processing_material_id = $id ";
			$response = [
				"result" => $this->laserprocessing_model->findSingleLaserProcessing($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 


    public function findMultipleLaserProcessing_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and laser_processing_material_id <>$id";
		    }
			$response = [
				"result" => $this->laserprocessing_model->findMultipleLaserProcessing($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

	 
	public function createLaserProcessing_post() {
	 
       
        $this->form_validation->set_rules('laser_processing_material_name', 'laser processing name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->laserprocessing_model->createLaserProcessing($data);
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
	
	public function updateLaserProcessing_post() {
		
        $this->form_validation->set_rules('laser_processing_material_name', 'laser processingname  Required', 'trim|required');
		 
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
			$result = $this->laserprocessing_model->updateLaserProcessing($data);
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
	
	public function deleteLaserProcessing_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->laserprocessing_model->deleteLaserProcessing($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishLaserProcessing_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->laserprocessing_model->updatePublishLaserProcessing($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 


	/*Additive Manufacturing Processes Add / Insert / Update API  */
	public function findSingleLaserProcessingMaterial_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	material_id = $id ";
			$response = [
				"result" => $this->laserprocessing_model->findSingleLaserProcessingMaterial($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 


    public function findMultipleLaserProcessingMaterial_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and material_id <> $id";
		    }
			$response = [
				"result" => $this->laserprocessing_model->findMultipleLaserProcessingMaterial($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	

	 
	public function createLaserProcessingMaterial_post() {
	 
       
        $this->form_validation->set_rules('material_name', 'Material name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->laserprocessing_model->createLaserProcessingMaterial($data);
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
	
	public function updateLaserProcessingMaterial_post() {
		
        $this->form_validation->set_rules('material_name', 'Material name   Required', 'trim|required');
		 
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
			$result = $this->laserprocessing_model->updateLaserProcessingMaterial($data);
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
	
	public function deleteLaserProcessingMaterial_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->laserprocessing_model->deleteLaserProcessingMaterial($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

	public function updatePublishLaserProcessingMaterial_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->laserprocessing_model->updatePublishLaserProcessingMaterial($data),
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
		 
			$page_id = $this->laserprocessing_model->createRfq($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Quotation Submitted." ];
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
				"result" => $this->laserprocessing_model->findSingle_remote_rfq_consultant($strWhere)
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
			
			$id = $this->laserprocessing_model->assignSuppliers($data);
			if($id){
				$response = [ "result" => $id, "message" => "Supplier Assigned Successfully...!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }


 	public function laserprocessingBySupport_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND drrs.supplier_id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->laserprocessing_model->laserprocessingBySupport($strWhere)
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
				"result" => $this->laserprocessing_model->findSingleDetailsSupplierReq($strWhere)
			];
		} 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

	public function findMultipleRequestList_get( $strWhere = 1) {
			$response = [
				"result" => $this->laserprocessing_model->findMultipleRequestList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSupplier_get($start='',$end='') {
			$strWhere =1;
			$strWhere.= " AND user_role =6";
		    if($start!=''){
				$strWhere .= " LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->laserprocessing_model->findMultipleSupplier($strWhere)
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
				"result" => $this->laserprocessing_model->findMultipleSupplier($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * View Quatation List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function findSingle_Laserprocessing_quote_supplier_get($drrs_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($drrs_id!=0){
				$strWhere .= " AND drrs_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->laserprocessing_model->findSingle_Laserprocessing_quote_supplier($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function LaserprocessingSuppliers_get($dmrID) {
		if( !(int)$dmrID){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [

				"result" => $this->laserprocessing_model->LaserprocessingSuppliers($dmrID),
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
	public function SingleLaserprocessingSuppliers_get($dmrID) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($dmrID!=0){
				$strWhere .= " AND dmr_id= '{$dmrID}' "; 
		    }
			$response = [
				"result" => $this->laserprocessing_model->SingleLaserprocessingSuppliers($strWhere),
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/* Group Buying Request accept by Admin

			30/4/2018

	*/
	/*public function LaserprocessingSupplierListAcceptByadmin_get($drrs_id) {
		if( !(int)$drrs_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->laserprocessing_model->LaserprocessingSupplierListAcceptByadmin($drrs_id),
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);	
	}*/
        
        
        public function LaserProcessingSupplierListAcceptByadmin_post() {
            // get input data
			$data = $this->post(); 
			$page_id = $this->laserprocessing_model->LaserProcessingSupplierListAcceptByadmin($data);
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
        
        public function findSingle_laser_Rfq_quataion_get($drrs_id=0) {
            //echo $drrs_id;die;
		    if($drrs_id!=0){
				$strWhere .= "drrs_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->laserprocessing_model->findSingle_laser_Rfq_quataion($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
        public function LaserProcessingSupplierListAcceptBycustomer_get($drrs_id) {

		if( !(int)$drrs_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->laserprocessing_model->LaserProcessingSupplierListAcceptBycustomer($drrs_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}
        // reject customer quotation
        public function LaserProcessingSupplierListAcceptByreject_get($drrs_id) {

		if( !(int)$drrs_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->laserprocessing_model->LaserProcessingSupplierListAcceptByreject($drrs_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	


	
	
}

?>