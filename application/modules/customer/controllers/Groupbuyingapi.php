<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Groupbuyingapi extends API_Controller {

    // constructor

    function __construct() {

        // parent constructor

        parent::__construct();

        $this->load->model("groupbuying_model");
    }
/* =========== CONSUMABLE ================ */

    public function findmultipleConsumableRfq_get($userId, $strWhere = 1) {
        if (!(int) $userId) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND customer_id = $userId ";
            $response = [
                "result" => $this->groupbuying_model->findmultipleConsumableRfq($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleConsumableRfq_get($id) {	  
		    // get input data 
			$result = $this->groupbuying_model->findSingleConsumableRfq($id);
			if($result){
				$response = [ "result" => $result, "message" => "Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findmultipleConsumableRfqByAdminToSupplier_get($id) {	  
		    // get input data 
			$result = $this->groupbuying_model->findmultipleConsumableRfqByAdminToSupplier($id);
			if($result){
				$response = [ "result" => $result, "message" => "Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function sendQuotToAdmin_post() {
		$this->form_validation->set_rules('id', 'Name Required', 'trim|required');
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
			$result = $this->groupbuying_model->sendQuoatToAdmin($data);
			if($result){
				$response = [ "result" => $result, "message" => "Quotation has been sent successfully..!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Something Went Wrong Please Try Again Later."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* =========== Service Parts =========== */
	public function findmultipleServicePartsRfq_get($userId, $strWhere = 1) {
        if (!(int) $userId) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND customer_id = $userId ";
            $response = [
                "result" => $this->groupbuying_model->findmultipleServicePartsRfq($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleServicePartsRfq_get($id) {	  
		    // get input data 
			$result = $this->groupbuying_model->findSingleServicePartsRfq($id);
			if($result){
				$response = [ "result" => $result, "message" => "Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findmultipleServicePartsRfqByAdminToSupplier_get($id) {	  
		    // get input data 
			$result = $this->groupbuying_model->findmultipleServicePartsRfqByAdminToSupplier($id);
			if($result){
				$response = [ "result" => $result, "message" => "Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function sendQuotToAdminServiceParts_post() {
		$this->form_validation->set_rules('id', 'Name Required', 'trim|required');
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
			$result = $this->groupbuying_model->sendQuotToAdminServiceParts($data);
			if($result){
				$response = [ "result" => $result, "message" => "Quotation has been sent successfully..!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Something Went Wrong Please Try Again Later."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findmultipleSheetMetalRfq_get($userId, $strWhere = 1) {
        if (!(int) $userId) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND customer_id = $userId ";
            $response = [
                "result" => $this->groupbuying_model->findmultipleSheetMetalRfq($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleSheetMetalRfq_get($id) {	  
		    // get input data 
			$result = $this->groupbuying_model->findSingleSheetMetalRfq($id);
			if($result){
				$response = [ "result" => $result, "message" => "Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findmultipleSheetMetalRfqByAdminToSupplier_get($id) {	  
		    // get input data 
			$result = $this->groupbuying_model->findmultipleSheetMetalRfqByAdminToSupplier($id);
			if($result){
				$response = [ "result" => $result, "message" => "Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function sendQuotToAdminSheetMetal_post() {
		$this->form_validation->set_rules('id', 'Name Required', 'trim|required');
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
			$result = $this->groupbuying_model->sendQuotToAdminSheetMetal($data);
			if($result){
				$response = [ "result" => $result, "message" => "Quotation has been sent successfully..!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Something Went Wrong Please Try Again Later."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}

	
	
	
	
	
		
	public function createBrandModel_post() {
	    $this->form_validation->set_rules('model_name', 'Name Required', 'trim|required'); 
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
		 
			$id = $this->customer_model->createBrandModel($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine brand added successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	/*machine Brand Model delete
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function deleteMachineBrandModel_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->deleteMachineBrandModel($id),
				"message" => "Record deleted successfully..!!"
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}


}

?>