<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("exchangegrups_model");
    }
	  
	 
	public function createExchangeGroup_post() {
	 
        $this->form_validation->set_rules('category', 'Name Required', 'trim|required');
        $this->form_validation->set_rules('description', 'Description Required', 'trim|required');
        $this->form_validation->set_rules('contry_id', 'Country Required', 'trim|required');
        $this->form_validation->set_rules('state_id', 'State Required', 'trim|required');
        $this->form_validation->set_rules('city_id', 'City Required', 'trim|required');
        $this->form_validation->set_rules('timeline', 'Timeline Required', 'trim|required');
		 
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
		 
			$page_id = $this->exchangegrups_model->createExchangeGroup($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
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
				"result" => $this->groupbuying_model->findMultipleConsumableCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableBrand_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleConsumableBrand($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableType_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleConsumableType($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableQty_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleConsumableQty($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleConsumableUnit_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleConsumableUnit($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	/* Service DATA */
	public function findMultipleServiceCategory_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleServiceCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceBrand_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleServiceBrand($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceType_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleServiceType($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceQty_post() { 
		$response = [
			"result" => $this->groupbuying_model->findMultipleServiceQty($strWhere)
		];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleServiceUnit_post() { 
		$response = [
			"result" => $this->groupbuying_model->findMultipleServiceUnit($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
	
/* Sheet Metal Data */
	public function findMultipleSheetMetalCategory_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleSheetMetalCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalBrand_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleSheetMetalBrand($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalType_post() { 
			$response = [
				"result" => $this->groupbuying_model->findMultipleSheetMetalType($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* public function findMultipleSheetMetalQty_post() { 
		$response = [
			"result" => $this->groupbuying_model->findMultipleSheetMetalQty($strWhere)
		];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	} */
	public function findMultipleSheetMetalUnit_post() { 
		$response = [
			"result" => $this->groupbuying_model->findMultipleSheetMetalUnit($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalSize_post() { 
		$response = [
			"result" => $this->groupbuying_model->findMultipleSheetMetalSize($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSheetMetalThickness_post() { 
		$response = [
			"result" => $this->groupbuying_model->findMultipleSheetMetalThickness($strWhere)
		];

		$this->response($response, REST_Controller::HTTP_OK);
	}
}

?>