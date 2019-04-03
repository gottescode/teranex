<?php

if (!defined('BASEPATH'))

    exit('No direct script access allowed');



class Api extends API_Controller {



    // constructor

    function __construct() {

        // parent constructor

        parent::__construct();

		$this->load->model("customer_model");

    }



	public function findSingle_get( $id, $strWhere = 1) {

		if( !(int)$id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$strWhere .= " AND MU.uid = $id ";

			$response = [

				"result" => $this->customer_model->findSingle($strWhere)

			];

		} 		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	 

	

	public function findMultiple_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

		    }

			$strWhere .= " and u_user_type ='C'";

			$response = [

				"result" => $this->customer_model->findMultiple($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	public function findMultipleExpertRequestList_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

		    }

			$strWhere .= " and user_id ='{$id}'";

			$response = [

				"result" => $this->customer_model->findMultipleExpertRequestList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	public function findMultipleExpertRequestListConsultant_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

		    }

			$strWhere .= " and consultant_id ='{$id}'";

			$response = [

				"result" => $this->customer_model->findMultipleExpertRequestList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}
	public function findMultipleRemoteApplicationRequestList_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
		    }
			$strWhere .= " and user_id ='{$id}'";
			$response = [
				"result" => $this->customer_model->findMultipleRemoteApplicationRequestList($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleRemoteRequestListConsultant_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

		    }

			$strWhere .= " and consultant_id ='{$id}'";

			$response = [

				"result" => $this->customer_model->findMultipleRemoteApplicationRequestList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	public function xpertMeetingListConsultant_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

		    }

			$strWhere .= " AND consultant_id ='{$id}'";

			$strWhere .= " AND meeting_status ='Y'";

			$response = [

				"result" => $this->customer_model->xpertMeetingListConsultant($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}



	public function remoteApplicationServicesBySupport_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

				$strWhere .= " AND consultant_id= '{$id}' "; 

		    }

			$response = [

				"result" => $this->customer_model->remoteApplicationServicesBySupport($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	public function accpetRequestByConsultant_get($expert_id) { 

			$result = $this->customer_model->accpetRequestByConsultant($expert_id);

			if($result){

				$response = [ "result" => $result, "message" => "Request Accepted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to update record."

				];

			}

			$this->response($response, REST_Controller::HTTP_OK);

	}

	public function accpetRequestByConsultantRemoteApplication_get($remote_id) { 

			$result = $this->customer_model->accpetRequestByConsultantRemoteApplication($remote_id);

			if($result){

				$response = [ "result" => $result, "message" => "Request Accepted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to update record."

				];

			}

			$this->response($response, REST_Controller::HTTP_OK);

	}

	public function rejectRequestByConsultant_get($expert_id) { 

			$result = $this->customer_model->rejectRequestByConsultant($expert_id);

			if($result){

				$response = [ "result" => $result, "message" => "Request Accepted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to update record."

				];

			}

			

			$this->response($response, REST_Controller::HTTP_OK);

	}

	

	public function rejectRequestByConsultantRemoteApplication_get($remote_id) { 

			$result = $this->customer_model->rejectRequestByConsultantRemoteApplication($remote_id);

			if($result){

				$response = [ "result" => $result, "message" => "Request Accepted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to update record."

				];

			}

			

			$this->response($response, REST_Controller::HTTP_OK);

	}

	

	public function findMultipleAddress_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

			$strWhere .= " and customer_id=$id";

		    }

			$response = [

				"result" => $this->customer_model->findMultipleAddress($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	public function create_post() {

	 

        $this->form_validation->set_rules('cust_email', 'Email Id Required', 'trim|required');

		 

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

		 

			$page_id = $this->customer_model->create($data);

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

	public function zoomResponseInsertRemoteProgramming_post() {

	 

        $this->form_validation->set_rules('start_url', 'start_url Required', 'trim|required');

        $this->form_validation->set_rules('join_url', 'join_url Required', 'trim|required');

        $this->form_validation->set_rules('start_time', 'start_time Required', 'trim|required');

        $this->form_validation->set_rules('host_id', 'host_id Required', 'trim|required');

		 

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

		 

			$page_id = $this->customer_model->zoomResponseInsertRemoteProgramming($data);

			if($page_id){

				$response = [ "result" => $page_id, "message" => "Meeting Scheduled successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		}

		

		$this->response($response, REST_Controller::HTTP_OK);

    }

/* CREATE INVOICE */

	public function createRemoteServiceInvoice_post() {

	 

        $this->form_validation->set_rules('start_date', 'Start Time Required', 'trim|required');

        $this->form_validation->set_rules('end_date', 'end_date Required', 'trim|required');

        $this->form_validation->set_rules('star_time', 'star_time Required', 'trim|required');

        $this->form_validation->set_rules('end_time', 'end_time Required', 'trim|required');

        $this->form_validation->set_rules('total_hours', 'total_hours Is Required', 'trim|required');

        $this->form_validation->set_rules('total_amount', 'total_amounts Is Required', 'trim|required');

        $this->form_validation->set_rules('raar_id', 'Raar Id Is Required', 'trim|required');

		 

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

		 

			$id = $this->customer_model->createRemoteServiceInvoice($data);

			if($id){

				$response = [ "result" => $id, "message" => "Invoice Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}

		

		$this->response($response, REST_Controller::HTTP_OK);

    }

	/* Atul Mangave

		25 May ZoomApi Response Update Old row

	*/

	public function zoomResponseUpdate_post() {

	

		    // get input data

			$data = $this->post();

			$result = $this->customer_model->zoomResponseUpdate($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to update record."

				];

			}

		$this->response($response, REST_Controller::HTTP_OK);

    }

	public function zoomResponseUpdateRemoteApplication_post() {

	

		    // get input data

			$data = $this->post();

			$result = $this->customer_model->zoomResponseUpdateRemoteApplication($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to update record."

				];

			}

		$this->response($response, REST_Controller::HTTP_OK);

    }

	public function update_post() {

		$this->form_validation->set_rules('cust_email', 'Email Id Required', 'trim|required');

		 if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => validation_errors()

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        }else{

		    // get input data

			$data = $this->post();

			$result = $this->customer_model->update($data);

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

	

	public function deleteCustomer_get($page_id) {

		if( !(int)$page_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->deleteCustomer($page_id),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	//

	public function updatePublishCustomer_post() {

		$data = $this->post();

		if( ! $data){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->updatePublishCustomer($data),

				"message" => "Record Updated successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	} 



  // address single as per customer_id 

	public function findAddress_get($id=0) { 

		 

		    if($id!=0){

				$strWhere .= "   u_address_id = $id";

		    }

			$response = [

				"result" => $this->customer_model->findAddress($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

  // address list as per customer_id 

	public function findAddressList_get($id=0) { 

		 

		    if($id!=0){

				$strWhere .= "   user_id = $id";

		    }

			$response = [

				"result" => $this->customer_model->findAddressList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

  // bank Details list as per customer_id 

	public function bankDetails_get($id=0) { 

		$strWhere = $this->get("strWhere");

		 

		    if($id!=0){

			$strWhere .= "   UD.uid = $id";

		    }

			$response = [

				"result" => $this->customer_model->findSingle($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	// bank details update

	public function updateDetails_post() {

		 

		    // get input data

			$data = $this->post();

			$result = $this->customer_model->updateDetails($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record updated successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to update record."

				];

			}

		 

		$this->response($response, REST_Controller::HTTP_OK);

    }



    // Update Password

	public function updatePassword_post() {
		    // get input data
			$data = $this->post();
			//print_r($data);exit;
			$result = $this->customer_model->updatePasswords($data);
			if($result){
				$response = [ "result" => $result, "message" => "Password updated successfully.!!!!"];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}		 
		$this->response($response, REST_Controller::HTTP_OK);
    }

	//add user address

	public function addAddress_post() {

		$this->form_validation->set_rules('address_type', 'Address Type Required', 'trim|required');

		$this->form_validation->set_rules('address1', 'Address 1 Required', 'trim|required');

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

			$result = $this->customer_model->addAddress($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 

		$this->response($response, REST_Controller::HTTP_OK);

    }

	//update user address

	public function updateAddress_post() {

		$this->form_validation->set_rules('address_type', 'Address Type Required', 'trim|required');

		$this->form_validation->set_rules('address1', 'Address 1 Required', 'trim|required');

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

			$result = $this->customer_model->updateAddress($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record Updated successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 

		$this->response($response, REST_Controller::HTTP_OK);

    }

	// delete Address File from server

	public function addressDelete_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->addressDelete($id),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	//add user address

	public function otherDocument_post() {

		$this->form_validation->set_rules('file_name_text', 'File Name Required', 'trim|required'); 

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

			$result = $this->customer_model->otherDocument($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 

		$this->response($response, REST_Controller::HTTP_OK);

    }

	// fetch multiple file list 

	public function otherDocumentList_get($id=0) { 

	 

		    if($id!=0){

			$strWhere .= "   user_id = $id";

		    }

			$response = [

				"result" => $this->customer_model->otherDocumentList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	// delete doument File from server

	public function otherDocumentDelete_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->otherDocumentDelete($id),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	

	/* contact List */

		//add user address

	public function addContact_post() {

		$this->form_validation->set_rules('contact_person_name', 'Contact_ Person  Name Required', 'trim|required');

		 

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

			$result = $this->customer_model->addContact($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 

		$this->response($response, REST_Controller::HTTP_OK);

    }

	//update user address

	public function updateContact_post() {

		$this->form_validation->set_rules('contact_person_name', 'Contact_ Person  Name Required', 'trim|required');

		 

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

			$result = $this->customer_model->updateContact($data);

			if($result){

				$response = [ "result" => $result, "message" => "Record Updated successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 

		$this->response($response, REST_Controller::HTTP_OK);

    }

	// delete contact File from server

	public function contactDelete_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->contactDelete($id),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

  // address single as per customer_id 

	public function findContact_get($id=0) { 

		 

		    if($id!=0){

				$strWhere .= "  uc_id = $id ";

		    }

			

			$response = [

				"result" => $this->customer_model->findContact($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

  // address list as per customer_id 

	public function findContactList_get($id=0) { 

		 

		    if($id!=0){

				$strWhere .= "   user_id = $id";

		    }

			$response = [

				"result" => $this->customer_model->findContactList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * attendee user List

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function attendeeList_get($userId=0) { 

		 

		    if($userId!=0){

				$strWhere .= "   u_parent_id = $userId";

		    }

			$response = [

				"result" => $this->customer_model->attendeeList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * attendee user Add

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function attendeeAdd_post() { 

		$this->form_validation->set_rules('u_name', 'User  Name Required', 'trim|required');

		$this->form_validation->set_rules('u_email', 'User Email Required', 'trim|required');

		$this->form_validation->set_rules('u_mobileno', 'User Mobile Required', 'trim|required');

		 

		 if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => validation_errors()

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post();

			$result = $this->customer_model->attendeeAdd($data);

			if($result=='E'){

				$response = [ "result" => false, "message" => "Email Id exits" ];

			}

			else if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

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

	 * attendee delete

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function attendeeDelete_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->attendeeDelete($id),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 * Trainee / Consultant user List

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function traineeList_get($userId=0) { 

		 

		    if($userId!=0){

				$strWhere .= "u_parent_id = $userId";

		    }

			$response = [

				"result" => $this->customer_model->traineeList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * Trainee / Consultant user Add

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function traineeAdd_post() { 

		$this->form_validation->set_rules('u_name', 'User  Name Required', 'trim|required');

		$this->form_validation->set_rules('u_email', 'User Email Required', 'trim|required');

		$this->form_validation->set_rules('u_mobileno', 'User Mobile Required', 'trim|required');

		 

		 if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => validation_errors()

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post();

			$result = $this->customer_model->traineeAdd($data);

			if($result=='E'){

				$response = [ "result" => false, "message" => "Email Id exists" ];

			}

			else if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

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

	 * Trainee / Consultant delete

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function traineeDelete_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->traineeDelete($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);		
	}



	/**

	 * course Enrollment

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function courseEnrollment_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->courseEnrollment($id),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 * assign Course from admin List

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function assignCourseList_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->assignCourseList($id),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 * create Course Schedule

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function createCourseSchedule_post() { 

		$this->form_validation->set_rules('trainee_user_id', 'User Required', 'trim|required'); 

		 

		 if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => validation_errors()

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post();

			$result = $this->customer_model->createCourseSchedule($data);

			if($result=='E'){

				$response = [ "result" => false, "message" => "Email Id exits" ];

			}

			else if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

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

	 * schedule Course List as per user login

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function scheduleCourse_get($userid,$courseId) {

		if( !(int)$userid){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->scheduleCourse($userid,$courseId) 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 * Update Course Schedule

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function updateCourseSchecduleCancel_post() { 

		$this->form_validation->set_rules('id', 'ID Fields is Required', 'trim|required'); 

		 

		 if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => validation_errors()

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post();

			$result = $this->customer_model->updateCourseSchecdule($data);

			if($result=='E'){

				$response = [ "result" => false, "message" => "Email Id exits" ];

			}

			else if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

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

	 * create Course Schedule

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function updateCourseSchecdule_post() { 

		$this->form_validation->set_rules('wiziq_presenter_url', 'Presenter url Required', 'trim|required'); 

		$this->form_validation->set_rules('wiziq_class_id', ' class id Required', 'trim|required'); 

		 

		 if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => validation_errors()

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post();

			$result = $this->customer_model->updateCourseSchecdule($data);

			if($result=='E'){

				$response = [ "result" => false, "message" => "Email Id exits" ];

			}

			else if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 			

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/* DELETE COURSE */

	public function deleteCourseSchecdule_post() { 

		$this->form_validation->set_rules('id', 'ID  Required', 'trim|required'); 

		 

		 if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => validation_errors()

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post();

			$result = $this->customer_model->deleteCourseSchecdule($data);

			if($result){ 

				$response = [ "result" => $result, "message" => "Something went wrong..!!!!" ];

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

	 * create Course Schedule

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function courseEnrollmentSingle_get($enrollId) { 

		 

		 if ($enrollId == FALSE) {

            $response = [

                "result" => false,

                'message' => "enrollId Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			 

			$result = $this->customer_model->courseEnrollmentSingle($enrollId);

			

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

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

	 *  

	 * 

	 * @access public

	 * @param   

	 * @return array of objects

	 */

	public function assign_attendee_post() { 

		 

		$this->form_validation->set_rules('participant_no', 'Presenter No Required', 'trim|required'); 

		$this->form_validation->set_rules('ce_id', 'Course Enrollment Required', 'trim|required'); 

		 

		if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => "enrollId Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post(); 

			$result = $this->customer_model->assign_attendee($data);

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

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

	 * course Enrollment Assign List

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function courseEnrollmentAssignList_get($enrollId) { 

		 

		 if ($enrollId == FALSE) {

            $response = [

                "result" => false,

                'message' => "enrollId Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			 

			$result = $this->customer_model->courseEnrollmentAssignList($enrollId);

			if( $result){ 

				$response = [ "result" => $result, "message" => "" ];

			}  

		} 			

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 * schedule Attendee Course user List

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function scheduleAttendeeCourse_get($courserId,$id) { 

		 

		    if($courserId!=0){

				$strWhere = "   CE.course_id = $courserId";

		    }

			$response = [

				"result" => $this->customer_model->scheduleAttendeeCourse($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * findSingle Course Schecdul eList

	 * 

	 * @access public

	 * @param  $courserId,$id

	 * @return array of objects

	 */

	public function findSingleCourseSchecduleList_get($id) { 

		 

		    if($id!=0){

				$strWhere = "   id = $id";

		    }

			$response = [

				"result" => $this->customer_model->findSingleCourseSchecduleList($strWhere)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	

	 

	/**

	 * assign Schedule Class List BY Trainee

	 * 

	 * @access public

	 * @param  trainee USer

	 * @return array of objects

	 */

	public function updateCourseScheduleList_post() { 

		

		$this->form_validation->set_rules('wiziq_attendee_url', 'attendee_url Required', 'trim|required'); 

		 

		if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => "enrollId Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post(); 

			$result = $this->customer_model->updateCourseScheduleList($data);

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

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

	 * assign Course from customer List

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function attendeeAssignCourseList_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->attendeeAssignCourseList($userId),

				"message" => "Record deleted successfully."

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *events List List

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function eventsList_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->eventsList($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote Application Service

	 * 

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteApplicationService_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationService($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteApplicationProgramm_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationProgramm($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote Application Service

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationServiceProgrammers_get($requestId) {

		if( !(int)$requestId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceProgrammers($requestId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote Application Service

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationServiceConsultant_get($requestId) {

		if( !(int)$requestId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceConsultant($requestId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteApplicationServiceOnDemandConsultant_get($requestId) {

		if( !(int)$requestId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceOnDemandConsultant($requestId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote Application Service update

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationServiceConsultantUpdate_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceConsultantUpdate($remote_application_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteApplicationServiceOnDemandConsultantUpdate_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceOnDemandConsultantUpdate($remote_application_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/* REMOTE APPLCIATION PROGRAMMER ACCEPT BY CUSTOMER  */

	public function remoteApplicationServiceProgrammerUpdate_get($rarp_id) {

		if( !(int)$rarp_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceProgrammerUpdate($rarp_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 *remote Application Service update

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationServiceConsultantUpdateByConsultant_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceConsultantUpdateByConsultant($remote_application_id),

				"message" => "Request Accepted Successfully...!!",

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

/**

	 *remote Application Service Rejection For consultant

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationServiceConsultantUpdateByConsultantReject_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationServiceConsultantUpdateByConsultantReject($remote_application_id),

				"message" => "Request Rejected Successfully...!!",

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

/**

	 *remote request Service Braincert

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function requestServiceBraincert_post() {

		

			$data = $this->post(); 

			$result = $this->customer_model->requestServiceBraincert($data);

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function requestServiceBraincertUpdate_post() {

		$this->form_validation->set_rules('rab_id', 'Class id Required', 'trim|required'); 

		 

		if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => "enrollId Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post(); 

			$result = $this->customer_model->requestServiceBraincertUpdate($data);

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Record Inserted successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 			

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteApplicationServicesById_get($rar_id) {

	    

			$response = [

				"result" => $this->customer_model->remoteApplicationServicesById($rar_id)

			];

		 

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteApplicationServicesByIdCustId_get($rar_id,$uid) {

			

			$response = [

				"result" => $this->customer_model->remoteApplicationServicesByIdCustId($rar_id,$uid)

			];

		 

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteApplicationServicesBrainCertList_get($rar_id) {

	    

			$response = [

				"result" => $this->customer_model->remoteApplicationServicesBrainCertList($rar_id)

			];

		 

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteApplicationServicesBrainCertListbyCust_get($rar_id,$uid) {

	    

			$response = [

				"result" => $this->customer_model->remoteApplicationServicesBrainCertListbyCust($rar_id,$uid)

			];

		 

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/* Remote Machine Request List*/

	public function remoteServiceRequestList_get( $id, $strWhere = 1) {

		if( !(int)$id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$strWhere .= " AND consultant_id = $id ";

			$response = [

				"result" => $this->customer_model->remoteServiceRequestList($strWhere)

			];

		} 		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	public function remoteServiceCustomerRequestList_get( $id, $strWhere = 1) {

		if( !(int)$id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$strWhere .= " AND user_id = $id ";

			$response = [

				"result" => $this->customer_model->remoteServiceCustomerRequestList($strWhere)

			];

		} 		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 *remote Application Service Rejection For consultant

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  post data

	 * @return array of objects

	 */

	public function courseComment_post() {

		$this->form_validation->set_rules('comment_head', 'Comment Head Required', 'trim|required'); 

		$this->form_validation->set_rules('user_comment', 'Comment Required', 'trim|required'); 

		 

		if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => "enrollId Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post(); 

			$result = $this->customer_model->courseComment($data);

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Comment Updated successfully.!!!!" ];

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

	 *remote Application Service Rejection For consultant

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  course ID

	 * @return array of objects

	 */

	public function singleCourseComment_get($id) {

		if( !(int)$id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else { 

			$response = [

				"result" => $this->customer_model->singleCourseComment($id)

			];

		} 						

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 *remote Application Service Rejection For consultant

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function addExperince_post() {

		$this->form_validation->set_rules('title', 'Work Title Required', 'trim|required'); 

		$this->form_validation->set_rules('exp_details', 'Experince Details Required', 'trim|required'); 

		 

		if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => "data Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post(); 

			$result = $this->customer_model->addExperince($data);

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Comment Updated successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 										

		$this->response($response, REST_Controller::HTTP_OK);

	}

	//

	/**

	 *remote Application Service Rejection For consultant

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  course ID

	 * @return array of objects

	 */

	public function findWorkExperinceList_get($userid) {

		if( !(int)$userid ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else { 

			$response = [

				"result" => $this->customer_model->findWorkExperinceList($userid)

			];

		} 						

		$this->response($response, REST_Controller::HTTP_OK);

	}

	//

	/**

	 *work Experince Delete

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  course ID

	 * @return array of objects

	 */

	public function workExperinceDelete_get($id) {

		if( !(int)$id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else { 

			$response = [

				"result" => $this->customer_model->workExperinceDelete($id)

			];

		} 						

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 *training Specialties

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  add Experince

	 * @return array of objects

	 */

	public function trainingSpecialties_post() {

		$this->form_validation->set_rules('title', ' Title Required', 'trim|required'); 

		  

		if ($this->form_validation->run() == FALSE) {

            $response = [

                "result" => false,

                'message' => "data Not available"

            ];

            $this->response($response, REST_Controller::HTTP_OK);

            return;

        } 

		else {   

			$data = $this->post(); 

			$result = $this->customer_model->trainingSpecialties($data);

			if((int)$result){ 

				$response = [ "result" => $result, "message" => "Comment Updated successfully.!!!!" ];

			} else {

				$response = [

					"result" => false,

					'message' => "Faild to insert record."

				];

			}

		} 										

		$this->response($response, REST_Controller::HTTP_OK);

	}

	//

	/**

	 *training Specialties List

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  course ID

	 * @return array of objects

	 */

	public function trainingSpecialtiesList_get($userid) {

		if( !(int)$userid ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else { 

			$response = [

				"result" => $this->customer_model->trainingSpecialtiesList($userid)

			];

		} 						

		$this->response($response, REST_Controller::HTTP_OK);

	}

	//

	/**

	 *training Specialties Delete

	 * jaywant narwade

			11/4/2018

	 * @access public

	 * @param  course ID

	 * @return array of objects

	 */

	public function trainingSpecialtiesDelete_get($id) {

		if( !(int)$id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else { 

			$response = [

				"result" => $this->customer_model->trainingSpecialtiesDelete($id)

			];

		} 						

		$this->response($response, REST_Controller::HTTP_OK);

	}

	

	/**

	 *remote Application Service Invoice generation

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  raar_id

	 * @return array of objects

	 */

	public function fetchRemoteServiceInvoice_get($raar_id) {

		if( !(int)$raar_id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else { 

			$response = [

				"result" => $this->customer_model->fetchRemoteServiceInvoice($raar_id)

			];

		} 						

		$this->response($response, REST_Controller::HTTP_OK);

	}

	

	/**

	 *Machine Application Service Invoice generation

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  raar_id

	 * @return array of objects

	 */

	public function createMachineServiceInvoice_post() {

	 

        $this->form_validation->set_rules('start_date', 'Start Time Required', 'trim|required');

        $this->form_validation->set_rules('end_date', 'end_date Required', 'trim|required');

        $this->form_validation->set_rules('star_time', 'star_time Required', 'trim|required');

        $this->form_validation->set_rules('end_time', 'end_time Required', 'trim|required');

        $this->form_validation->set_rules('total_hours', 'total_hours Is Required', 'trim|required');

        $this->form_validation->set_rules('total_amount', 'total_amounts Is Required', 'trim|required');

        $this->form_validation->set_rules('rmr_id', 'Request Is Required', 'trim|required');

		 

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

		 

			$id = $this->customer_model->createMachineServiceInvoice($data);

			if($id){

				$response = [ "result" => $id, "message" => "Invoice Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}

		

		$this->response($response, REST_Controller::HTTP_OK);

    }

	

	/**

	 *Machine Service Invoice generation

	 * jaywant narwade

			12/4/2018

	 * @access public

	 * @param  rmr_id

	 * @return array of objects

	 */

	public function fetchMachineServiceInvoice_get($rmr_id) {

		if( !(int)$rmr_id ){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else { 

			$response = [

				"result" => $this->customer_model->fetchMachineServiceInvoice($rmr_id)

			];

		} 						

		$this->response($response, REST_Controller::HTTP_OK);

	}

	

	/**

	 *event Invoce List

	 * jaywant Narwade  12/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function eventInvoceList_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->eventInvoceList($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *event Invoce List

	 * jaywant Narwade  12/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function courseEnrollmentInvoceList_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->courseEnrollmentInvoceList($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 * remote Machine Class Schedule Insert

	 * jaywant Narwade  12/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteMachineClassScheduleInsert_post() {

		$this->form_validation->set_rules('class_title', 'class title Required', 'trim|required');

        $this->form_validation->set_rules('courseStartDate', 'course Start Date Required', 'trim|required');

        $this->form_validation->set_rules('course_start_time', 'star time Required', 'trim|required');

        $this->form_validation->set_rules('course_end_time', 'end time Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->remoteMachineClassScheduleInsert($data);

			if($id){

				$response = [ "result" => $id, "message" => "Class Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	

	/**

	 *event Invoce List

	 * jaywant Narwade  12/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteMachineClassScheduleList_get($rmr_id,$userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteMachineClassScheduleList($rmr_id, $userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

		/**

	 * Customer Shechdule Course List

	 * jaywant Narwade  12/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteMachineClassScheduleListCustomer_get($rmr_id,$userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteMachineClassScheduleListCustomer($rmr_id, $userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote Machine Class Schedule FetchSingle

	 * jaywant Narwade  13/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteMachineClassScheduleFetchSingle_get($rmstId) {

		if( !(int)$rmstId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteMachineClassScheduleFetchSingle($rmstId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK); 

	}

	//

	/**

	 * remote Machine Class Schedule Insert

	 * jaywant Narwade  12/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteMachineClassScheduleUpdate_post() {

		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');

        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');

          

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

		 

			$id = $this->customer_model->remoteMachineClassScheduleUpdate($data);

			if($id){

				$response = [ "result" => $id, "message" => "Invoice Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 * remote Machine Class Schedule Insert

	 * Atul  13/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function updateRemoteMachineRequestInvoice_post() {

		$this->form_validation->set_rules('rmr_id', 'RMR Required', 'trim|required');

        $this->form_validation->set_rules('invoiceByConsultant', 'Invoice By consultant  Required', 'trim|required');

          

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

		 

			$id = $this->customer_model->updateRemoteMachineRequestInvoice($data);

			if($id){

				$response = [ "result" => $id, "message" => "Invoice Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

/**

	 *remote Application Programm update

	 * Atul Mangave 16-Apr-2018

	 update 9/5/2018 jaywant

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationProgrammAccept_post() {

		$this->form_validation->set_rules('number_of_hours', 'number of hours Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->remoteApplicationProgrammAccept($data);

			if($id){

				$response = [ "result" => $id, "message" => "Quotation updated successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Update Quotation."

				];

			}

		}	 

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 *remote Application Programm update

	 * Atul Mangave 16-Apr-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationProgrammReject_get($rarp_id) {

		if( !(int)$rarp_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationProgrammReject($rarp_id),

				"message" => "Request Rejected Successfully...!!",

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

	}




		/**

	 * remote Machine Class Schedule Insert

	 * jaywant Narwade  24/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteMachineVideoClassScheduleInsert_post() {

		$this->form_validation->set_rules('class_title', 'Start Time Required', 'trim|required');

        $this->form_validation->set_rules('courseStartDate', 'course Start Date Required', 'trim|required');

        $this->form_validation->set_rules('course_start_time', 'star time Required', 'trim|required');

        $this->form_validation->set_rules('course_end_time', 'end time Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->remoteMachineVideoClassScheduleInsert($data);

			if($id){

				$response = [ "result" => $id, "message" => "Record Inserted Successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 * Machine Video

	 * Atul Mangave  24/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteMachineVideoClassScheduleList_get($mvr_id,$userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteMachineVideoClassScheduleList($mvr_id, $userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteMachineVideoClassScheduleListCustomer_get($mvr_id,$userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteMachineVideoClassScheduleListCustomer($mvr_id, $userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	public function remoteMachineVideoClassScheduleFetchSingle_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteMachineVideoClassScheduleFetchSingle($id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK); 

	}



	

	public function remoteMachineVideoClassScheduleUpdate_post() {

		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');

        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');

          

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

		 

			$id = $this->customer_model->remoteMachineVideoClassScheduleUpdate($data);

			if($id){

				$response = [ "result" => $id, "message" => "  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	


		/**

	 * remote Automation Class Schedule Insert

	 * Deepak Shinde 09/7/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteAutomationVideoClassScheduleInsert_post() {

		$this->form_validation->set_rules('class_title', 'Start Time Required', 'trim|required');

        $this->form_validation->set_rules('courseStartDate', 'course Start Date Required', 'trim|required');

        $this->form_validation->set_rules('course_start_time', 'star time Required', 'trim|required');

        $this->form_validation->set_rules('course_end_time', 'end time Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->remoteAutomationVideoClassScheduleInsert($data);

			if($id){

				$response = [ "result" => $id, "message" => "Record Inserted Successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 * Automation Video

	 *Deepak Shinde  09/07/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteAutomationVideoClassScheduleList_get($avr_id,$userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteAutomationVideoClassScheduleList($avr_id, $userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteAutomationVideoClassScheduleListCustomer_get($avr_id,$userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteAutomationVideoClassScheduleListCustomer($avr_id, $userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	public function remoteAutomationVideoClassScheduleFetchSingle_get($id) {

		if( !(int)$id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteAutomationVideoClassScheduleFetchSingle($id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK); 

	}



	

	public function remoteAutomationVideoClassScheduleUpdate_post() {

		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');

        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');

          

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

		 

			$id = $this->customer_model->remoteAutomationVideoClassScheduleUpdate($data);

			if($id){

				$response = [ "result" => $id, "message" => "  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 * remote On Demand Services By Support

	 * jaywant narwade 24/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteOnDemandServicesBySupport_get($id=0) { 

		$strWhere = $this->get("strWhere");

		if(!$strWhere) $strWhere = 1;

		    if($id!=0){

				$strWhere .= " AND rorc.consultant_id= '{$id}' "; 

		    }

			$response = [

				"result" => $this->customer_model->remoteOnDemandServicesBySupport($id)

			];

		 	

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 *remote Application Service update

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteOnDemandUpdateByConsultant_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteOnDemandUpdateByConsultant($remote_application_id),

				"message" => "Request Accepted Successfully...!!",

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote Application Service

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteOnDemandServiceConsultant_get($requestId) {

		if( !(int)$requestId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteOnDemandServiceConsultant($requestId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote on demand constant update

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteOnDemandConsultantUpdate_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteOnDemandConsultantUpdate($remote_application_id),

				"message" => "Request Accepted Successfully...!!",

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remote on demand constant

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteOnDemandConsultantReject_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteOnDemandConsultantReject($remote_application_id),

				"message" => "Request Accepted Successfully...!!",

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 *remoteon demand service acccpted by customer 

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteOnDemandServiceConsultantUpdate_get($remote_application_id) {

		if( !(int)$remote_application_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteOnDemandServiceConsultantUpdate($remote_application_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remoteon demand service acccpted by customer 

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationServicesBrainCertListbyCustSingle_get($rar_id,$uid) {

	    

			$response = [

				"result" => $this->customer_model->remoteApplicationServicesBrainCertListbyCustSingle($rar_id,$uid)

			];

		 

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *remoteon demand service acccpted by customer 

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function commenttotraineeInsert_post() {

	    $this->form_validation->set_rules('comment_head', 'Subject Required', 'trim|required');

        $this->form_validation->set_rules('user_comment', 'user comment Required', 'trim|required');

          

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

			$id = $this->customer_model->commenttotraineeInsert($data);

			if($id){

				$response = [ "result" => $id, "message" => "  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		 

		 

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	//

	/**

	 *comment to trainee Fetch Multiple

	 * 

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function commenttotraineeFetchMultiple_get($uid) {

	    

			$response = [

				"result" => $this->customer_model->commenttotraineeFetchMultiple($uid)

			];

		 

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 *rcustomer Requests Application Accept

	 * Atul Mangave 16-Apr-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function customerRequestsApplicationAccept_post() { 

		$this->form_validation->set_rules('number_of_hours', 'number of hours Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->customerRequestsApplicationAccept($data);

			if($id){

				$response = [ "result" => $id, "message" => "Quotation updated successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Update Quotation."

				];

			}

		}		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 *customer Requests Application Reject_get

	 * Atul Mangave 27-Apr-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function customerRequestsApplicationReject_get($rarp_id) {

		if( !(int)$rarp_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->customerRequestsApplicationReject($rarp_id),

				"message" => "Request Rejected Successfully...!!",

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * remote Application Consultant

	 * Atul Mangave 27-Apr-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationConsultant_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationConsultant($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 * remote Application Consultant

	 * Atul Mangave 27-Apr-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function remoteApplicationConsultantList_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationConsultantList($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/* REMOTE APPLCIATION PROGRAMMER ACCEPT BY CUSTOMER

			30/4/2018

	*/

	public function remoteApplicationConsultantListUpdate_get($rarp_id) {

		if( !(int)$rarp_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteApplicationConsultantListUpdate($rarp_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	/**

	 * remote Machine Class Schedule Inserttokbox

	 * jaywant Narwade  30/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function scheduleApplicationConsultantCourseInsert_post() {

		$this->form_validation->set_rules('class_title', 'class title Required', 'trim|required');

        $this->form_validation->set_rules('courseStartDate', 'course Start Date Required', 'trim|required');

        $this->form_validation->set_rules('course_start_time', 'star time Required', 'trim|required');

        $this->form_validation->set_rules('course_end_time', 'end time Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->scheduleApplicationConsultantCourseInsert($data);

			if($id){

				$response = [ "result" => $id, "message" => "Class Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *schedule Application Consultant CourseList tokbox

	 * jaywant Narwade  30/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function scheduleApplicationConsultantCourseList_get($rpr_id,$userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->scheduleApplicationConsultantCourseList($rpr_id, $userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	/**

	 *schedule Application Consultant Course FetchSingle

	 * jaywant Narwade  30/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function scheduleApplicationConsultantCourseFetchSingle_get($rmstId) {

		if( !(int)$rmstId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->scheduleApplicationConsultantCourseFetchSingle($rmstId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK); 

	}

	/**

	 * remote Machine Class Schedule Insert

	 * jaywant Narwade 30/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function scheduleApplicationConsultantCourseUpdate_post() {

		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');

        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');

          

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

		 

			$id = $this->customer_model->scheduleApplicationConsultantCourseUpdate($data);

			if($id){

				$response = [ "result" => $id, "message" => "Invoice Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	

	

		/**

	 * Customer Shechdule Course List Remote Programming

	 * jaywant Narwade  12/4/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteProgrammingclassScheduleListCustomer_get($rpr_id) {

		if( !(int)$rpr_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteProgrammingclassScheduleListCustomer($rpr_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

	public function remoteProgrammingclassScheduleListConsultant_get($rpr_id) {

		if( !(int)$rpr_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteProgrammingclassScheduleListCustomer($rpr_id),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}

/**

	 *remote Machine Class Schedule FetchSingle

	 * Atul Mangave 28/06/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

 */

	public function remoteServiceClassScheduleFetchSingle_get($rab_id) {

		if( !(int)$rab_id){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->remoteServiceClassScheduleFetchSingle($rab_id),

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK); 

	}

	

	//

	/**

	 * remote Machine Class Schedule Insert

	 * Atul Mangave  28/06/2018

	 * @access public

	 * @param  userId

	 * @return array of objects

	 */

	public function remoteServiceClassScheduleUpdate_post() {

		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');

        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');

          

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

		 

			$id = $this->customer_model->remoteServiceClassScheduleUpdate($data);

			if($id){

				$response = [ "result" => $id, "message" => "Invoice Created  successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Insert record."

				];

			}

		}	

		$this->response($response, REST_Controller::HTTP_OK);

		

	}
		/**
	*Live Demo Class Schedule FetchSingle
	* jaywant Narwade  25 June 2011
	* @access public
	* @param  userId
	* @return array of objects
	*/
	public function liveDemoClassScheduleFetchSingle_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->liveDemoClassScheduleFetchSingle($id),
				 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK); 
	}
/**
	 * remote Machine Class Schedule Insert
	 * jaywant Narwade  12/4/2018
	 * @access public
	 * @param  userId
	 * @return array of objects
	 */
	public function liveDemoClassScheduleUpdate_post() {
		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');
        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');
          
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
		 
			$id = $this->customer_model->liveDemoClassScheduleUpdate($data);
			if($id){
				$response = [ "result" => $id, "message" => "Class Scheduled successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Insert record."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
    
    

	 /**

	 *customer Requests Group Buying Accept

	 * Deepak shinde 11-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function customerRequestsGroupBuyingAccept_post() { 

		$this->form_validation->set_rules('number_of_hours', 'number of hours Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->customerRequestsGroupBuyingAccept($data);

			if($id){

				$response = [ "result" => $id, "message" => "Quotation updated successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Update Quotation."

				];

			}

		}		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * customer Requests RFQ Reject

	 * Deepak shinde 09-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function customerRequestsGroupBuyingReject_get($gsr) {

		if( !(int)$gsr){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->customerRequestsGroupBuyingReject($gsr),

				"message" => "Request Rejected Successfully...!!",

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

	}


/**

	 * Group Buying Quotation List

	 * Deepak Shinde 12-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function groupbuyingQuotationList_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->groupbuyingQuotationList($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}


	 /**

	 *customer Requests Group Buying Accept

	 * Deepak shinde 11-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function supplierCourseRfqAccept_post() { 

		$this->form_validation->set_rules('course_date', 'course date Required', 'trim|required');

        

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

		 

			$id = $this->customer_model->supplierCourseRfqAccept($data);

			if($id){

				$response = [ "result" => $id, "message" => "Quotation updated successfully." ];

			} else {

				$response = [

					"result" => false,

					'message' => "Failed to Update Quotation."

				];

			}

		}		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * customer Requests RFQ Reject

	 * Deepak shinde 09-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function supplierCourseRfqReject_get($csr) {

		if( !(int)$csr){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->supplierCourseRfqReject($csr),

				"message" => "Request Rejected Successfully...!!",

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

	}

	/**

	 * Group Buying Quotation List

	 * Deepak Shinde 12-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function courseRfqList_get($userId) {

		if( !(int)$userId){

			$response = [

				"result" => false,

				"message" => "Insufficient information provided.",

			];

		}

		else {

			$response = [

				"result" => $this->customer_model->courseRfqList($userId),

				 

			];

		}		

		$this->response($response, REST_Controller::HTTP_OK);

		

	}
	
	
/***********************************   Digital Manufacturing API'S List *********************/

	/**
	 * Digital Manufacturing RFQ update
	 * Deepak Shinde 29-06-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function digitalmanufacturingRfqAccept_get($drrs_id) {
		$result = $this->customer_model->digitalmanufacturingRfqAccept($drrs_id);
			if($result){
				$response = [ "result" => $result, "message" => "Request Accepted successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to update record."
				];
			}
			$this->response($response, REST_Controller::HTTP_OK);
	}
	/**
	 * Digital Manufacturing RFQ update
	 * Deepak Shinde 29-06-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function digitalmanufacturingRfqReject_get($drrs_id) {
		if( !(int)$drrs_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->digitalmanufacturingRfqReject($drrs_id),
				"message" => "Request Rejected Successfully...!!",
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

    /**
	 *customer Requests RFQ Accept For Additive
	 * Deepak shinde 09-07-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function customerRequestsRfqAccept_post() { 
	$this->form_validation->set_rules('number_of_hours', 'number of hours Required', 'trim|required');
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
			$id = $this->customer_model->customerRequestsRfqAccept($data);
			if($id){
				$response = [ "result" => $id, "message" => "Quotation updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Update Quotation."
				];
			}
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * customer Requests RFQ Reject
	 * Deepak shinde 09-07-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */

	public function customerRequestsRfqReject_get($drrs_id) {
		if( !(int)$drrs_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->customerRequestsRfqReject($drrs_id),
				"message" => "Request Rejected Successfully...!!",
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * remote Application Consultant
	 * Atul Mangave 27-Apr-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function remoteRfqSupplier_get($userId) {
		if( !(int)$userId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->remoteRfqSupplier($userId),
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);		
	}

	/**
	 * remote Application Consultant
	 * Deepak Shinde 27-Apr-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function DigitalmanufacturingSupplierList_get($requestId) {
		if( !(int)$requestId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->DigitalmanufacturingSupplierList($requestId),				 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}	
	/* REMOTE APPLCIATION PROGRAMMER ACCEPT BY CUSTOMER

			30/4/2018

	*/
	public function DigitalmanufacturingSupplierListUpdate_get($drrs_id) {
		if( !(int)$drrs_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->DigitalmanufacturingSupplierListUpdate($drrs_id),
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}
    /*
	 *customer Requests RFQ Accept For Rapid

	 * Deepak shinde 09-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function customerRequestsRfqAcceptForRapidprototyping_post() { 

		$this->form_validation->set_rules('number_of_hours', 'number of hours Required', 'trim|required');
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
			$id = $this->customer_model->customerRequestsRfqAcceptForRapidprototyping($data);
			if($id){
				$response = [ "result" => $id, "message" => "Quotation updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Update Quotation."
				];
			}
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * customer Requests RFQ Reject
	 * Deepak shinde 09-07-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
 */
	public function customerRequestsRfqForRapidprototypingReject_get($drrs_id) {
		if( !(int)$drrs_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->customerRequestsRfqForRapidprototypingReject($drrs_id),
				"message" => "Request Rejected Successfully...!!",
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * Rapid Prototyping Quotation List
	 * Deepak Shinde 12-07-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function RapidprototypingRfqList_get($userId) {
		if( !(int)$userId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->RapidprototypingRfqList($userId),
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}


	/**

	 *customer Requests RFQ Accept For Laser Processing

	 * Deepak shinde 26-07-2018

	 * @access public

	 * @param  requestId

	 * @return array of objects

	 */

	public function customerRequestsRfqForLaserprocessingAccept_post() { 

		$this->form_validation->set_rules('number_of_hours', 'number of hours Required', 'trim|required');
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
			$id = $this->customer_model->customerRequestsRfqForLaserprocessingAccept($data);
			if($id){
				$response = [ "result" => $id, "message" => "Quotation updated successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Update Quotation."
				];
			}
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * customer Requests RFQ Reject
	 * Deepak shinde 09-07-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
 */
	public function customerRequestsRfqForLaserprocessingReject_get($drrs_id) {
		if( !(int)$drrs_id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->customerRequestsRfqForLaserprocessingReject($drrs_id),
				"message" => "Request Rejected Successfully...!!",
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * Rapid Prototyping Quotation List
	 * Deepak Shinde 12-07-2018
	 * @access public
	 * @param  requestId
	 * @return array of objects
	 */
	public function LaserprocessingRfqList_get($userId) {
		if( !(int)$userId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->LaserprocessingRfqList($userId),
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	/**
	 * Remote Application Class Schedule Insert
	 * Deepak Shinde  13/08/2018
	 * @access public
	 * @param  userId
	 * @return array of objects
	 */
	public function remoteappVideoClassScheduleInsert_post() {
		$this->form_validation->set_rules('class_title', 'Start Time Required', 'trim|required');
        $this->form_validation->set_rules('courseStartDate', 'course Start Date Required', 'trim|required');
        $this->form_validation->set_rules('course_start_time', 'star time Required', 'trim|required');
        $this->form_validation->set_rules('course_end_time', 'end time Required', 'trim|required');
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
			$id = $this->customer_model->remoteappVideoClassScheduleInsert($data);
			if($id){
				$response = [ "result" => $id, "message" => "Record Inserted Successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Insert record."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
	}	

	/**
	 * Remote Application Video
	 * Deepak Shinde  13/08/2018
	 * @access public
	 * @param  userId
	 * @return array of objects
	 */
	public function remoteappVideoClassScheduleList_get($ravr_id,$userId) {
		if( !(int)$userId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->remoteappVideoClassScheduleList($ravr_id, $userId),				 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);	
	}	

	public function remoteappVideoClassScheduleFetchSingle_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->remoteappVideoClassScheduleFetchSingle($id),
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK); 
	}

	public function remoteappVideoClassScheduleUpdate_post() {

		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');
        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');
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
			$id = $this->customer_model->remoteappVideoClassScheduleUpdate($data);
			if($id){
				$response = [ "result" => $id, "message" => "  successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Insert record."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function remoteappVideoClassScheduleListCustomer_get($ravr_id,$userId) {
		if( !(int)$userId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->remoteappVideoClassScheduleListCustomer($ravr_id, $userId),			 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		

	}


	/**
	 * Remote service Class Schedule Insert
	 * Deepak Shinde  14/08/2018
	 * @access public
	 * @param  userId
	 * @return array of objects
	 */
	public function remoteServiceVideoClassScheduleInsert_post() {
		$this->form_validation->set_rules('class_title', 'Start Time Required', 'trim|required');
        $this->form_validation->set_rules('courseStartDate', 'course Start Date Required', 'trim|required');
        $this->form_validation->set_rules('course_start_time', 'star time Required', 'trim|required');
        $this->form_validation->set_rules('course_end_time', 'end time Required', 'trim|required');
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
			$id = $this->customer_model->remoteServiceVideoClassScheduleInsert($data);
			if($id){
				$response = [ "result" => $id, "message" => "Record Inserted Successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Insert record."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
	}	


	/**
	 * Remote Service Video
	 * Deepak Shinde  13/08/2018
	 * @access public
	 * @param  userId
	 * @return array of objects
	 */
	public function remoteServiceVideoClassScheduleList_get($rsvr_id,$userId) {
		if( !(int)$userId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->remoteServiceVideoClassScheduleList($rsvr_id, $userId),				 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);	
	}	

	public function remoteServiceVideoClassScheduleFetchSingle_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->remoteServiceVideoClassScheduleFetchSingle($id),
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK); 
	}

	public function remoteServiceVideoClassScheduleUpdate_post() {

		$this->form_validation->set_rules('tokbox_sessionid', 'tokbox sessionid Required', 'trim|required');
        $this->form_validation->set_rules('tokbox_token', 'tokbox token  Required', 'trim|required');
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
			$id = $this->customer_model->remoteServiceVideoClassScheduleUpdate($data);
			if($id){
				$response = [ "result" => $id, "message" => "  successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to Insert record."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function remoteServiceVideoClassScheduleListCustomer_get($rsvr_id,$userId) {
		if( !(int)$userId){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->customer_model->remoteServiceVideoClassScheduleListCustomer($rsvr_id, $userId),			 
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		

	}


}

?>