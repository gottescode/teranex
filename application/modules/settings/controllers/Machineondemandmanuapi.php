<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Machineondemandmanuapi extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("machineondemandmanu_model");
    }

	public function findSingle_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->machineondemandmanu_model->findSingle($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultiple_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultiple($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function create_post() {
	 
        $this->form_validation->set_rules('name', 'name Required', 'trim|required');
		 
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
		 
			$type_id = $this->machineondemandmanu_model->create($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function update_post() {
		$this->form_validation->set_rules('name', 'Type name Required', 'trim|required');
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
			$result = $this->machineondemandmanu_model->update($data);
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
	
	public function deletetype_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machineondemandmanu_model->deletetype($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	
	public function findSingleService_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->machineondemandmanu_model->findSingleService($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleService_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleService($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function createService_post() {
	 
        $this->form_validation->set_rules('name', 'name Required', 'trim|required');
		 
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
		 
			$type_id = $this->machineondemandmanu_model->createService($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateService_post() {
		$this->form_validation->set_rules('name', 'Type name Required', 'trim|required');
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
			$result = $this->machineondemandmanu_model->updateService($data);
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
	
	public function deletetypeService_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machineondemandmanu_model->deletetypeService($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	 
	
	public function findSingleInfra_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->machineondemandmanu_model->findSingleInfra($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleInfra_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleInfra($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function createInfra_post() {
	 
        $this->form_validation->set_rules('name', 'name Required', 'trim|required');
		 
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
		 
			$type_id = $this->machineondemandmanu_model->createInfra($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateInfra_post() {
		$this->form_validation->set_rules('name', 'Type name Required', 'trim|required');
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
			$result = $this->machineondemandmanu_model->updateInfra($data);
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
	
	public function deletetypeInfra_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machineondemandmanu_model->deletetypeInfra($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	 
/* FrontEnd Data */

	public function findSingleFront_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->machineondemandmanu_model->findSingleFront($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleFront_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleFront($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findMultipleFrontEnd_get($from,$to) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleFrontEnd($from,$to)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function createFront_post() {
	 
        $this->form_validation->set_rules('title', 'name Required', 'trim|required');
		 
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
		 
			$type_id = $this->machineondemandmanu_model->createFront($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateFront_post() {
		$this->form_validation->set_rules('title', 'title Required', 'trim|required');
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
			$result = $this->machineondemandmanu_model->updateFront($data);
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
	
	public function deleteFront_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machineondemandmanu_model->deleteFront($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function findSingleFrontSoftware_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->machineondemandmanu_model->findSingleFrontSoftware($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleFrontSoftware_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleFrontSoftware($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findMultipleFrontEndSoftware_get($from,$to) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleFrontEnd($from,$to)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function createFrontSoftware_post() {
	 
        $this->form_validation->set_rules('title', 'name Required', 'trim|required');
		 
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
		 
			$type_id = $this->machineondemandmanu_model->createFrontSoftware($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateFrontSoftware_post() {
		$this->form_validation->set_rules('title', 'title Required', 'trim|required');
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
			$result = $this->machineondemandmanu_model->updateFrontSoftware($data);
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
	
	public function deleteFrontSoftware_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machineondemandmanu_model->deleteFrontSoftware($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	/* Front Cat Data */
	public function findSingleMachineOnrentCat_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->machineondemandmanu_model->findSingleMachineOnrentCat($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function findMultipleMachineOnrentCat_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " ";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleMachineOnrentCat($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function createMachineOnrentCat_post() {
	 
        $this->form_validation->set_rules('title', 'name Required', 'trim|required');
		 
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
		 
			$type_id = $this->machineondemandmanu_model->createMachineOnrentCat($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateMachineOnrentCat_post() {
		$this->form_validation->set_rules('title', 'Type name Required', 'trim|required');
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
			$result = $this->machineondemandmanu_model->updateMachineOnrentCat($data);
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
	
	public function deleteMachineOnrentCat_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machineondemandmanu_model->deleteMachineOnrentCat($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function findSingleFrontSubCatrgory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND id = $id ";
			$response = [
				"result" => $this->machineondemandmanu_model->findSingleFrontSubCatrgory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findMultipleFrontSubCatrgory_get($cat_id) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($cat_id!=0){
			$strWhere .= " AND cat_id = $cat_id";
		    }
			$response = [
				"result" => $this->machineondemandmanu_model->findMultipleFrontSubCatrgory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function createFrontSubCatrgory_post() {
	 
        $this->form_validation->set_rules('sub_cat_main_title', 'name Required', 'trim|required');
        $this->form_validation->set_rules('block_title', 'name Required', 'trim|required');
        $this->form_validation->set_rules('description', 'name Required', 'trim|required');
		 
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
		 
			$type_id = $this->machineondemandmanu_model->createFrontSubCatrgory($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateFrontSubCatrgory_post() {
		$this->form_validation->set_rules('sub_cat_main_title', 'name Required', 'trim|required');
        $this->form_validation->set_rules('block_title', 'name Required', 'trim|required');
        $this->form_validation->set_rules('description', 'name Required', 'trim|required');
		
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
			$result = $this->machineondemandmanu_model->updateFrontSubCatrgory($data);
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
	
	public function deleteFrontSubCatrgory_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machineondemandmanu_model->deleteFrontSubCatrgory($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
}

?>