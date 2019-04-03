<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {
  function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("additivemanufacturing_model");
    }

	
	/* Research added as per category  */
	public function findSingleAdditiveManufacturing_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	additive_manufacturing_id = $id ";
			$response = [
				"result" => $this->additivemanufacturing_model->findSingleAdditiveManufacturing($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	/*public function findMultipleAdditiveManufacturing_get($id=0,$front='') { 
	        //$strWhere= '1 ';
		    if($id!=0){
			$strWhere .= " AND additive_manufacturing_id = $id";
		    }
		    if($front!=''){
		//	$strWhere .= " AND  report_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findMultipleAdditiveManufacturing($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}*/


    public function findMultipleAdditiveManufacturing_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and additive_manufacturing_id <>$id";
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findMultipleAdditiveManufacturing($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	

	 
	public function createAdditiveManufacturing_post() {
	 
       
        $this->form_validation->set_rules('additive_manufacturing_name', 'Additive Manufacturing name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->additivemanufacturing_model->createAdditiveManufacturing($data);
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
	
	public function updateAdditiveManufacturing_post() {
		
        $this->form_validation->set_rules('additive_manufacturing_name', 'Additive MAnufacturing name  Required', 'trim|required');
		 
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
			$result = $this->additivemanufacturing_model->updateAdditiveManufacturing($data);
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
	
	public function deleteAdditiveManufacturing_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->deleteAdditiveManufacturing($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishAdditiveManufacturing_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->updatePublishAdditiveManufacturing($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 


	/*Additive Manufacturing Processes Add / Insert / Update API  */
	public function findSingleAdditiveManufacturingProcesses_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	additive_manufacturing_process_id = $id ";
			$response = [
				"result" => $this->additivemanufacturing_model->findSingleAdditiveManufacturingProcesses($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 


    public function findMultipleAdditiveManufacturingProcesses_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and additive_manufacturing_process_id <> $id";
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findMultipleAdditiveManufacturingProcesses($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	

	 
	public function createAdditiveManufacturingProcesses_post() {
	 
       
        $this->form_validation->set_rules('additive_manufacturing_process_name', 'Additive Manufacturing Process name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->additivemanufacturing_model->createAdditiveManufacturingProcesses($data);
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
	
	public function updateAdditiveManufacturingProcesses_post() {
		
        $this->form_validation->set_rules('additive_manufacturing_process_name', 'Additive MAnufacturing name  Required', 'trim|required');
		 
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
			$result = $this->additivemanufacturing_model->updateAdditiveManufacturingProcesses($data);
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
	
	public function deleteAdditiveManufacturingProcesses_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->deleteAdditiveManufacturingProcesses($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

	public function updatePublishAdditiveManufacturingProcesses_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->updatePublishAdditiveManufacturingProcesses($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 


		/*3D Printing Materials Add / Insert / Update API  */


	public function findSinglePrintingMaterials3D_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	printing_materials_id = $id ";
			$response = [
				"result" => $this->additivemanufacturing_model->findSinglePrintingMaterials3D($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultiplePrintingMaterials3D_get($id=0,$front='') { 
	        $strWhere= '1 ';
		    if($id!=0){
			$strWhere .= " AND printing_materials_id  <> $id";
		    }
		    if($front!=''){
		//	$strWhere .= " AND  report_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findMultiplePrintingMaterials3D($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	

	 
	public function createPrintingMaterials3D_post() {
	 
       
        $this->form_validation->set_rules('printing_material_name', '3D Printing Material name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->additivemanufacturing_model->createPrintingMaterials3D($data);
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
	
	public function update3DPrintingMaterials_post() {
		
        $this->form_validation->set_rules('printing_material_name', '3D Printing Material name  Required', 'trim|required');
		 
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
			$result = $this->additivemanufacturing_model->update3DPrintingMaterials($data);
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
	
	public function deletePrintingMaterials3D_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->deletePrintingMaterials3D($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

	public function updatePublishPrintingMaterials3D_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->updatePublishPrintingMaterials3D($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 

			/*3D Printing Application Add / Insert / Update API  */


	public function findSinglePrintingApplication_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND 	printing_application_id = $id ";
			$response = [
				"result" => $this->additivemanufacturing_model->findSinglePrintingApplication($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultiplePrintingApplication_get($id=0,$front='') { 
	        $strWhere= '1 ';
		    if($id!=0){
			$strWhere .= " AND printing_application_id <> $id";
		    }
		    if($front!=''){
		//	$strWhere .= " AND  report_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findMultiplePrintingApplication($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	

	 
	public function createPrintingApplication_post() {
	 
       
        $this->form_validation->set_rules('printing_application_name', '3D Printing Applicationname  Required', 'trim|required');
		 
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
		 
			$page_id = $this->additivemanufacturing_model->createPrintingApplication($data);
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
	
	public function updatePrintingApplication_post() {
		
        $this->form_validation->set_rules('printing_application_name', '3D Printing Applicationname  Required', 'trim|required');
		 
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
			$result = $this->additivemanufacturing_model->updatePrintingApplication($data);
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
	
	public function deletePrintingApplication_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->deletePrintingApplication($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

	public function updatePublishPrintingApplication_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->additivemanufacturing_model->updatePublishPrintingMaterials3D($data),
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
		 
			$page_id = $this->additivemanufacturing_model->createRfq($data);
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
			
			$id = $this->additivemanufacturing_model->assignSuppliers($data);
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
	public function remoteApplicationProgrammBySupport_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				$strWhere .= " AND drrs.supplier_id= '{$id}' "; 
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->remoteApplicationProgrammBySupport($strWhere)
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
				"result" => $this->additivemanufacturing_model->findSingleDetailsSupplierReq($strWhere)
			];
		} 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


    public function findSingleDetailsSupplierReqList_get($dmr_id=0) { 
		
		    if($dmr_id!=0){
				$strWhere .= " dmr_id= '{$dmr_id}' "; 
		    
			$response = [
				"result" => $this->additivemanufacturing_model->findSingleDetailsSupplierReqList($strWhere)
			];
		} 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findMultipleRequestList_get( $strWhere = 1) {
			$response = [
				"result" => $this->additivemanufacturing_model->findMultipleRequestList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSupplier_get($start='',$end='') {
			$strWhere.= "user_role=6";
		    if($start!='')
		    {
				$strWhere .= "LIMIT $start, $end";
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findMultipleSupplier($strWhere)
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleSupplierPost_post() {
			$data = $this->post(); 

			$strWhere= "   user_type = 1";
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
				"result" => $this->additivemanufacturing_model->findMultipleSupplier($strWhere)
			];
		 
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
				"result" => $this->additivemanufacturing_model->findSingle_remote_rfq_consultant($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}




		/**

	 * Group Buying Request From Supplier

	 * Deepak Shinde 12-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function AdditivemanufacturingSuppliers_get($dmrID) {

		if( !(int)$dmrID){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->additivemanufacturing_model->AdditivemanufacturingSuppliers($dmrID),

				 

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
	public function findSingle_AdditiveManufacturing_quote_supplier_get($drrs_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($drrs_id!=0){
				$strWhere .= " AND drrs_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findSingle_AdditiveManufacturing_quote_supplier($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * Single Quotation Supplier List
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function SingleAdditiveManufacturingSuppliers_get($dmrID) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($dmrID!=0){
				$strWhere .= " AND dmr_id= '{$dmrID}' "; 
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->SingleAdditiveManufacturingSuppliers($strWhere),
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/* Group Buying Request accept by Admin

			30/4/2018

	*/

	public function AdditiveManufacturingSupplierListAcceptByadmin_post() {
            // get input data
			$data = $this->post(); 
			$page_id = $this->additivemanufacturing_model->AdditiveManufacturingSupplierListAcceptByadmin($data);
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
        
        // view quatation
        
        public function findSingle_remote_Rfq_quataion_get($drrs_id=0) {
            //echo $drrs_id;die;
		    if($drrs_id!=0){
				$strWhere .= "drrs_id= '{$drrs_id}' "; 
		    }
			$response = [
				"result" => $this->additivemanufacturing_model->findSingle_remote_Rfq_quataion($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
        
        public function AdditiveManufacturingSupplierListAcceptBycustomer_get($drrs_id) {

		if( !(int)$drrs_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->additivemanufacturing_model->AdditiveManufacturingSupplierListAcceptBycustomer($drrs_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}
        // reject customer quotation
        public function AdditiveManufacturingSupplierListAcceptByreject_get($drrs_id) {

		if( !(int)$drrs_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->additivemanufacturing_model->AdditiveManufacturingSupplierListAcceptByreject($drrs_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	
	
}

?>