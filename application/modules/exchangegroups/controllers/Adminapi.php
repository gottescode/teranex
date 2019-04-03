<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Adminapi extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("exchangegrups_model");
    }
	  
	 public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND groupbuying_cat_id = $id ";
			$response = [
				"result" => $this->exchangegrups_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 public function getAllUserInfo_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND uid = $id ";
			$response = [
				"result" => $this->exchangegrups_model->getAllUserInfo($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* Supplier Rfq List */
	public function adminRfqList_get( $id=1, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->exchangegrups_model->adminRfqList($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function singleRfqDetails_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->exchangegrups_model->singleRfqDetails($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function supplierQuotationList_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND supplier_status = 'A' AND admin_rfq_id= {$id} ";
			$response = [
				"result" => $this->exchangegrups_model->supplierQuotationList($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function consumableCustrequestList_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		  $response = [
				"result" => $this->exchangegrups_model->consumableCustrequestList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCategory_post() {
	 
        $this->form_validation->set_rules('groupbuying_cat_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->exchangegrups_model->createCategory($data);
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
	
	public function sendConsumableQuotation_post() {
		$this->form_validation->set_rules('supplier_price', 'Supplier Price', 'trim|required');
		$this->form_validation->set_rules('id', 'id', 'trim|required');
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
			$result = $this->exchangegrups_model->sendConsumableQuotation($data);
			if($result){
				$response = [ "result" => $result, "message" => "Quotation Sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
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
				"result" => $this->exchangegrups_model->deleteCategory($page_id),
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
				"result" => $this->exchangegrups_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	

	public function productList_get() {
			$response = [
				"result" => $this->exchangegrups_model->productList()
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function productSingle_get($gpid) {
			$strWhere="gp_id =$gpid";
			$response = [
				"result" => $this->exchangegrups_model->findSingleProduct($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function productDelete_get($gpid) {
			$strWhere="gp_id =$gpid";
			$response = [
				"result" => $this->exchangegrups_model->productDelete($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	//collective Buying Requst by admin 
	/* Product Add api call
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function adminRfq_post() {
		$this->form_validation->set_rules('prod_category', 'Product Category Required', 'trim|required');
        $this->form_validation->set_rules('prod_model', 'Product name Required', 'trim|required');
        $this->form_validation->set_rules('prod_brand', 'Brand Name Required', 'trim|required');
        $this->form_validation->set_rules('product_specification', 'Product Specification Required', 'trim|required');
		 
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
		 
			$page_id = $this->exchangegrups_model->adminRfq($data);
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
	/* Product Add api call
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function productAdd_post() {
	 
        $this->form_validation->set_rules('prod_category', 'Product Category Required', 'trim|required');
        $this->form_validation->set_rules('prod_name', 'Product name Required', 'trim|required');
        $this->form_validation->set_rules('prod_brandName', 'Brand Name Required', 'trim|required');
        $this->form_validation->set_rules('product_price', 'Product Price Required', 'trim|required');
		 
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
		 
			$page_id = $this->exchangegrups_model->productAdd($data);
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
	/* Product Add api call
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function productUpdate_post() {
	 
        $this->form_validation->set_rules('prod_category', 'Product Category Required', 'trim|required');
        $this->form_validation->set_rules('prod_name', 'Product name Required', 'trim|required');
        $this->form_validation->set_rules('prod_brandName', 'Brand Name Required', 'trim|required');
        $this->form_validation->set_rules('product_price', 'Product Price Required', 'trim|required');
		 
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
		 
			$page_id = $this->exchangegrups_model->productUpdate($data);
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
	 
	/* buying customer Request
		14/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function buyingRequest_post() {
	 
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
		 
			$page_id = $this->exchangegrups_model->buyingRequest($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Collective Buying Request sent successfully." ];
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
	
	public function collectiveBuyingReqList_get() {
			$strWhere="";
			$response = [
				"result" => $this->exchangegrups_model->collectiveBuyingReqList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	//collectiveBuyingReqList
	// customer post request data
	
	/* public function adminRfqList_get() {
			$strWhere="";
			$response = [
				"result" => $this->exchangegrups_model->adminRfqList($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	} */
	//supplierList
	// customer post request data
	
	public function supplierList_get() {
			$strWhere="";
			$response = [
				"result" => $this->exchangegrups_model->supplierList()
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function rfqDetails_post() {
			$data = $this->post(); 
			$id = $data['rfq_ids'];
			$strWhere =" id IN ({$id}) ";
			$response = [
				"result" => $this->exchangegrups_model->rfqDetails($strWhere)
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
			
			$id = $this->exchangegrups_model->assignSupplier($data);
			if($id){
				$response = [ "result" => $id, "message" => "Supplier Assigned Successfully...!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to assign."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	//supplierList
	// customer post request data
	
	public function requestListAsUser_get($uid) {
			$strWhere="";
			$response = [
				"result" => $this->exchangegrups_model->requestListAsUser($uid)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	//supplierList
	// customer post request data
	
	public function requestDetails_get($gsrId) {
			$strWhere="";
			$response = [
				"result" => $this->exchangegrups_model->requestDetails($gsrId)
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

	public function GroupbuyingSuppliers_get($garID) {

		if( !(int)$garID){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->exchangegrups_model->GroupbuyingSuppliers($garID),

				 

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
	public function findSingle_GroupBuying_quote_supplier_get($gsr_id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($gsr_id!=0){
				$strWhere .= " AND gsr_id= '{$gsr_id}' "; 
		    }
			$response = [
				"result" => $this->exchangegrups_model->findSingle_GroupBuying_quote_supplier($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/* Group Buying Request accept by Admin

			30/4/2018

	*/

	public function GroupBuyingSupplierListUpdate_get($gsr_id) {

		if( !(int)$gsr_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->exchangegrups_model->GroupBuyingSupplierListUpdate($gsr_id),

				 

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
	public function SingleGroupbuyingSuppliers_get($garID) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($garID!=0){
				$strWhere .= " AND gar_id= '{$garID}' "; 
		    }
			$response = [
				"result" => $this->exchangegrups_model->SingleGroupbuyingSuppliers($strWhere),
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}


	public function findSingleCustomerRequestList_get($gcrID) {
			$strWhere="";
			$response = [
				"result" => $this->exchangegrups_model->findSingleCustomerRequestList($gcrID)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}


	public function updateQuotationSupplierPrice_post() {
		$this->form_validation->set_rules('admin_price', 'Price Required', 'trim|required');
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
			//print_r($data);exit;
			$result = $this->exchangegrups_model->updateQuotationSupplierPrice($data);
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

	 * Group Buying Request From Supplier

	 * Atul Mangave 19-09-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */
	 
	public function findMultipleConsumableCategory_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleConsumableCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableBrand_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleConsumableBrand($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableType_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleConsumableType($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableQty_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleConsumableQty($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableUnit_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleConsumableUnit($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	/* Service DATA */
	public function findMultipleServiceCategory_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleServiceCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceBrand_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleServiceBrand($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceType_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleServiceType($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceQty_post() { 
		$response = [
			"result" => $this->exchangegrups_model->findMultipleServiceQty($strWhere)
		];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceUnit_post() { 
		$response = [
			"result" => $this->exchangegrups_model->findMultipleServiceUnit($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
	
/* Sheet Metal Data */
	public function findMultipleSheetMetalCategory_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleSheetMetalCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalBrand_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleSheetMetalBrand($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalType_post() { 
			$response = [
				"result" => $this->exchangegrups_model->findMultipleSheetMetalType($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* public function findMultipleSheetMetalQty_post() { 
		$response = [
			"result" => $this->exchangegrups_model->findMultipleSheetMetalQty($strWhere)
		];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	} */
	public function findMultipleSheetMetalUnit_post() { 
		$response = [
			"result" => $this->exchangegrups_model->findMultipleSheetMetalUnit($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalSize_post() { 
		$response = [
			"result" => $this->exchangegrups_model->findMultipleSheetMetalSize($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalThickness_post() { 
		$response = [
			"result" => $this->exchangegrups_model->findMultipleSheetMetalThickness($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
}

?>