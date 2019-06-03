<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("event_model");
    }

	public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND event_cat_id = $id ";
			$response = [
				"result" => $this->event_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCategory_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and event_cat_id <>$id and publish='Y' ";
		    }else{
				
			$strWhere .= " and publish='Y' ";
			}
			$response = [
				"result" => $this->event_model->findMultipleCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultiplecommunityList_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
				//$strWhere .= " and event_cat_id <>$id and publish='Y' ";
		    }else{
				
			$strWhere .= " AND	status = 'A' ";
			}
			$response = [
				"result" => $this->event_model->findMultiplecommunityList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function userData_post() {
	 
            // get input data
			$data = $this->post(); 
			$admin = $data['admin_id'];
			$mod = $data['mod_id'];
			$strWhere = " 1 "; 
			if($admin){
				$strWhere.= " AND uid = $admin  ";
			}
			if($mod){
				$strWhere.= " AND uid = $mod  ";
				
			}
			$userData = $this->event_model->userData($strWhere);
		
		$this->response($userData, REST_Controller::HTTP_OK);
    }
	public function createCategory_post() {
	 
        $this->form_validation->set_rules('event_cat_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->event_model->createCategory($data);
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
		$this->form_validation->set_rules('event_cat_name', 'Name Required', 'trim|required');
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
			$result = $this->event_model->updateCategory($data);
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
				"result" => $this->event_model->deleteCategory($page_id),
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
				"result" => $this->event_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	 
	 /* Event added as per category  */
	public function findSingleEvent_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND event_id = $id ";
			$response = [
				"result" => $this->event_model->findSingleEvent($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleEvent_get($id=0,$front='') { 
	 
		    if($id!=0){
			$strWhere .= "  EV.event_cat_id = $id";
		    }
		    if($front!=''){
			$strWhere .= " AND  event_start_date >  '".date('Y-m-d')."'";
		    }
			$response = [
				"result" => $this->event_model->findMultipleEvent($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findMultipleEventByCommunityID_get($community_id) { 
	 
		    $strWhere .= "  EV.community_id = $community_id";
		    //$strWhere .= " AND  event_start_date >  '".date('Y-m-d')."'";
		    $response = [
				"result" => $this->event_model->findMultipleEvent($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createEvent_post() {
	 
        //$this->form_validation->set_rules('event_id', 'category  Required', 'trim|required');
        $this->form_validation->set_rules('event_name', 'Event name  Required', 'trim|required');
		 
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
		 
			$page_id = $this->event_model->createEvent($data);
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
	
	public function updateEvent_post() {
		//$this->form_validation->set_rules('event_id', 'category  Required', 'trim|required');
        $this->form_validation->set_rules('event_name', 'Event name  Required', 'trim|required');
		 
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
			$result = $this->event_model->updateEvent($data);
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
	
	public function deleteEvent_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->event_model->deleteEvent($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function updatePublishEvent_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->event_model->updatePublishEvent($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	
	public function getEvents_get($catId,$start_format,$end_format) {
			$where= "  EV.event_cat_id='$catId' AND event_start_date  >= '$start_format'  AND event_end_date <= '$end_format' ";
			$response = [
				"result" => $this->event_model->findMultipleEvent($where), 
			];
		 
		$this->response($response, REST_Controller::HTTP_OK);
		
	}  
	public function eventBooking_post() {
	 
        $this->form_validation->set_rules('eventId', 'Event ID  Required', 'trim|required');
        $this->form_validation->set_rules('event_name', 'Event name  Required', 'trim|required');
        $this->form_validation->set_rules('totalPrice', 'Total Price Required', 'trim|required');
		 
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
		 
			$page_id = $this->event_model->eventbooking($data);
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
    
    // Get Organizer 
    
    public function findMultipleOrganier_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= "user_type IN(1,2,3,4) and user_role=1";
		    }
			$response = [
				"result" => $this->event_model->findMultipleOrganier($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
}

?>