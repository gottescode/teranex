<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Exchangegroupapi extends API_Controller {

    // constructor

    function __construct() {

        // parent constructor

        parent::__construct();

        $this->load->model("exchangegroup_model");
    }
/* =========== CONSUMABLE ================ */

    public function findmultipleExchangegroup_get($userId, $strWhere = 1) {
        if (!(int) $userId) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND customer_id = $userId ";
            $response = [
                "result" => $this->exchangegroup_model->findmultipleExchangegroup($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
	public function findmultipleExchangegroupSupplier_get($userId, $strWhere = 1) {
        if (!(int) $userId) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND supplier_id = 0 ";
            $response = [
                "result" => $this->exchangegroup_model->findmultipleExchangegroupSupplier($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
		public function findmultipleExchangegroupAccepted_get($userId, $strWhere = 1) {
        if (!(int) $userId) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
           $strWhere .= " AND supplier_id = $userId ";
            $response = [
                "result" => $this->exchangegroup_model->findmultipleExchangegroupSupplier($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleExchangeRfq_get($id) {	  
		    // get input data 
			$result = $this->exchangegroup_model->findSingleExchangeRfq($id);
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
	public function findSingleExchangeRfqSupplier_get($id) {	  
		    // get input data 
			$result = $this->exchangegroup_model->findSingleExchangeRfqSupplier($id);
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
	public function findSingleExchangeRfqAdmin_get($id) {	  
		    // get input data 
			$result = $this->exchangegroup_model->findSingleExchangeRfqAdmin($id);
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
			$result = $this->exchangegroup_model->findmultipleConsumableRfqByAdminToSupplier($id);
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
			$result = $this->exchangegroup_model->sendQuoatToAdmin($data);
			if($result){
				$response = [ "result" => $result, "message" => "Request Accepted..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Something Went Wrong Please Try Again Later."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function sendQuotToAdminCancel_post() {
		$this->form_validation->set_rules('id', 'Id Required', 'trim|required');
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
			$result = $this->exchangegroup_model->sendQuotToAdminCancel($data);
			if($result){
				$response = [ "result" => $result, "message" => "Request Accepted..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Something Went Wrong Please Try Again Later."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findSingleCountry_get($id) {	  
		    // get input data 
			$result = $this->exchangegroup_model->findSingleCountry($id);
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
	public function findSingleState_get($id) {	  
		    // get input data 
			$result = $this->exchangegroup_model->findSingleState($id);
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
	public function findSingleCity_get($id) {	  
		    // get input data 
			$result = $this->exchangegroup_model->findSingleCity($id);
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
	


}

?>