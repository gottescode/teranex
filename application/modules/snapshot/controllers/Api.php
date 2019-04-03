<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("snapshot_model");
    }

	public function findSingleCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND snapshot_category_id = $id ";
			$response = [
				"result" => $this->snapshot_model->findSingleCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleCategory_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and snapshot_category_id <>$id";
		    }
			$response = [
				"result" => $this->snapshot_model->findMultipleCategory($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createCategory_post() {
	 
        $this->form_validation->set_rules('snapshot_category_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->snapshot_model->createCategory($data);
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
		$this->form_validation->set_rules('snapshot_category_name', 'Name Required', 'trim|required');
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
			$result = $this->snapshot_model->updateCategory($data);
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
				"result" => $this->snapshot_model->deleteCategory($page_id),
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
				"result" => $this->snapshot_model->updatePublishCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 

	 public function findSingleSubscription_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND subscription_id = $id ";
			$response = [
				"result" => $this->snapshot_model->findSingleSubscription($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleSubscriptionpublish_get($id=0) { 
		$strWhere = $this->get("strWhere");

		if(!$strWhere) 
			$strWhere = 1;
		    $strWhere .= " AND publish ='Y'";
		    if($id!=0){
			$strWhere .= " AND subscription_id <>$id";

		    }
			$response = [
				"result" => $this->snapshot_model->findMultipleSubscriptionpublish($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function findMultipleSubscription_get($id=0) { 
		$strWhere = $this->get("strWhere");

		if(!$strWhere) 
			$strWhere = 1;
		
		    if($id!=0){
			$strWhere .= " AND subscription_id <>$id";

		    }
			$response = [
				"result" => $this->snapshot_model->findMultipleSubscription($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	public function createSubscription_post() {
	 
        $this->form_validation->set_rules('subscription_name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->snapshot_model->createSubscription($data);
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
	
	public function updateSubscription_post() {
		$this->form_validation->set_rules('subscription_name', 'Name Required', 'trim|required');
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
			$result = $this->snapshot_model->updateSubscription($data);
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
	
	public function deleteSubscription_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->snapshot_model->deleteSubscription($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishSubscription_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->snapshot_model->updatePublishSubscription($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	 
	 
	
	 
	 /////////////////////////////  Snapshots Speak Consultant ///////////////////////////////
	/*Snapshots Speak Consultant
			04-07-2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function snapshotSpeakConsultantInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->snapshot_model->snapshotSpeakConsultantInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

	/*Snapshots Speak Consultant  
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function snapshotSpeakConsultant_get() {
		  
		    // get input data
		 
			$result = $this->snapshot_model->snapshotSpeakConsultant();
		   // print_r($result);exit;
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	 

	/**
	 * Subscription Purchase
	 21/5/2018
	 * @access public
	 * @param  form post data
	 * @return array of objects
	 */  
	public function subscriptionPurchase_post() {
	 
        $this->form_validation->set_rules('subscription_id', 'Subscription details Required', 'trim|required');
     /*   $this->form_validation->set_rules('user_id', 'user Details Required', 'trim|required');
       
        $this->form_validation->set_rules('subscription_amount', 'Subscription Amount Required', 'trim|required');*/
		 
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
			$purchase_id = $this->snapshot_model->subscriptionPurchase($data);
			if($purchase_id){
				$response = [ "result" => $purchase_id, "message" => "Request sent successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to request record."
				];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*Subscription purchases list 
			21/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function subscription_purchases_list_get($uid=0) {
		  
		    // get input data 
			if($uid>0){
				$whereCond= " user_id = $uid ";
			}else{
				$whereCond=" 1 ";
			}
			$result = $this->snapshot_model->subscription_purchases_list($whereCond); 
			if($result){
				$response = [ "result" => $result, "message" => "Report Sample Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }



	 /*Team
			06/06/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

	 public function findSingleTeam_get($id, $strWhere = 1) {
	
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND team_id = $id ";
			$response = [
				"result" => $this->snapshot_model->findSingleTeam($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleTeam_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and team_id <>$id";
		    }
			$response = [
				"result" => $this->snapshot_model->findMultipleTeam($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createTeam_post() {
	 
        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->snapshot_model->createTeam($data);
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
	
	public function updateTeam_post() {
		$this->form_validation->set_rules('name', 'Name Required', 'trim|required');
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
			$result = $this->snapshot_model->updateTeam($data);
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
	
	public function deleteTeam_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->snapshot_model->deleteTeam($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishTeam_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->snapshot_model->updatePublishTeam($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 

		/////////////////////////////    Snapshot Report Sample  //////////////////////////////////
	/*Request a Call Save
			19/7/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function snapshotRequestCallInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->snapshot_model->snapshotRequestCallInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

	/*Request a Call  
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function snapshotRequestCall_get() {
		  
		    // get input data
		 
			$result = $this->snapshot_model->snapshotRequestCall();
		
			if($result){
				$response = [ "result" => $result, "message" => "Request a Call Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	 



	  /////////////////////////////   Snapshot Query  //////////////////////////////////
	/*Snapshot Query Save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function analystQueryInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->snapshot_model->analystQueryInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Analyst Inquiry Report sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	




    /*Analyst Query 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function analystQuery_get() {
		  
		    // get input data
		    
			$result = $this->snapshot_model->analystQuery();
		
			if($result){
				$response = [ "result" => $result, "message" => "Analyst Inquiry  Report Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }

     /////////////////////////////   Sales Query  //////////////////////////////////
	/*Sales Query Save
			19/5/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function salesQueryInsert_post() {
	 
		$this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('email', 'Email ID is Required', 'trim|required');
        $this->form_validation->set_rules('job_title', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('contact_no', 'Contact Number is Required', 'trim|required');
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
			$result = $this->snapshot_model->salesQueryInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Sales Inquiry  Report sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	


    /*Sales Query 
			19/5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function salesQuery_get() {
		  
		    // get input data
		    
			$result = $this->snapshot_model->salesQuery();
		
			if($result){
				$response = [ "result" => $result, "message" => "Sales Inquiry  Report Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }

     /*Client List
	  06/08/2018
	 * @access public
	 * @param   
	 * @return array  
	 */

	 public function findSingleClient_get($id, $strWhere = 1) {
	
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND client_id = $id ";
			$response = [
				"result" => $this->snapshot_model->findSingleClient($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	 
	
	public function findMultipleClient_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and client_id <>$id";
		    }
			$response = [
				"result" => $this->snapshot_model->findMultipleClient($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	 
	public function createClient_post() {
	 
        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');
		 
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
		 
			$page_id = $this->snapshot_model->createClient($data);
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
	
	public function updateClient_post() {
		$this->form_validation->set_rules('name', 'Name Required', 'trim|required');
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
			$result = $this->snapshot_model->updateClient($data);
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
	
	public function deleteClient_get($page_id) {
		if( !(int)$page_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->snapshot_model->deleteClient($page_id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	//
	public function updatePublishClient_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->snapshot_model->updatePublishClient($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 

	 

	
}

?>