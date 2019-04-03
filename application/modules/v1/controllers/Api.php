<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("v1_model");
    }
/* LOGIN API */
	public function login_post() {
		 $this->form_validation->set_error_delimiters('', '');
		 $this->form_validation->set_rules('username', 'Username', 'trim|required');
		 $this->form_validation->set_rules('password', 'Password', 'trim|required');
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
            // get input data
			$data = $this->post(); 
			$resultSndData = $this->v1_model->login($data); 
			
			if($resultSndData){
				$result = array(
						"userData" => $resultSndData,
						"imagePath"=> base_url().'uploads/customer/'
				);
				$response = [ 
								"isSuccess" => true,
								"responseData" => $result,
								"message"=>"Successfully Logged In..!!"
							];
			} else {
				$response = [
								"isSuccess" => false,
								"message" => "Invalid Credentials..!! "
							];
			}
		}
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
/* Free Lancer Request Customers List */
	public function freeLancerCustomerRequestList_get($id=0) {
		    if($id!=0){
				$strWhere = $this->get("strWhere");
				if(!$strWhere) $strWhere = 1;
				$strWhere .= " and user_id ='{$id}'";
				$result =$this->v1_model->xpertMeetingListCustomer($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!! "
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
			}else{
				$response = [
								"isSuccess" => false,
								"message" => "Insuffient Information Provided..!!"
							];
			}
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* Free Lancer Request Consultant List */
	public function freeLancerConsultantRequestList_get($id=0) { 
		
		    if($id!=0){
		    $strWhere = 1;
			$strWhere .= " AND consultant_id ='{$id}'";
			$strWhere .= " AND meeting_status ='Y' ";
			$result = $this->v1_model->xpertMeetingListConsultant($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
			}else{
					$response = [
								"isSuccess" => false,
								"message" => "Insuffient Information Provided..!!"
					];
			}
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* RemoteApplication Request Customers List */
	public function remoteApplicationCustomerRequestList_get($id=0) {
		    if($id!=0){
				$strWhere = $this->get("strWhere");
				if(!$strWhere) $strWhere = 1;
				$strWhere .= " and user_id ='{$id}'";
				$strWhere .= " AND meeting_status ='Y' ";
				$result =$this->v1_model->remoteapplicationMeetingListCustomer($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!! "
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
			}else{
				$response = [
								"isSuccess" => false,
								"message" => "Insuffient Information Provided..!!"
							];
			}
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* RemoteApplication Consultant List */
	public function remoteApplicationConsultantRequestList_get($id=0) { 
		
		    if($id!=0){
		    $strWhere = 1;
			$strWhere .= " AND consultant_id ='{$id}'";
			$strWhere .= " AND meeting_status ='Y' ";
			$result = $this->v1_model->remoteApplicationConsultantRequestList($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
			}else{
					$response = [
								"isSuccess" => false,
								"message" => "Insuffient Information Provided..!!"
					];
			}
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* Remote On demand Service Request List Customer*/
	public function remoteMachineOnDemandRequestListCustomer_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				$strWhere .= " AND user_id = $id AND consultant_id<>0";
				$result =$this->v1_model->remoteMachineOnDemandRequestListCustomer($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function remoteMachineOnDemandRequestListCosultant_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				//$strWhere .= " AND user_id = $id ";
				$strWhere .= " AND rorc.consultant_id= '{$id}' ";
				$result =$this->v1_model->remoteMachineOnDemandRequestListCosultant	($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* Remote on Demand Service Request List As Per RMST ID & USER ID Consultant*/
	public function remoteMachineClassScheduleListConsultant_post() {
		$data = $this->post();
		$this->form_validation->set_error_delimiters('', '');
		$this->form_validation->set_rules('rmrId', 'Remote ID', 'trim|required');
		$this->form_validation->set_rules('uid', 'User ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->remoteMachineClassScheduleList($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
/* Remote on Demand Service Request List As Per RMST ID & USER ID Customer*/
	public function remoteMachineClassScheduleListCustomer_post() {
		$data = $this->post();
		$this->form_validation->set_rules('rmr_id', 'Remote ID', 'trim|required');
		$this->form_validation->set_rules('uid', 'User ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->remoteMachineClassScheduleListCustomer($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
/* Remote On Demand TookBoX Session ID And Token */
	public function remoteMachineOnDemandLaunch_get($rmstId){
	 	if((int)($rmstId)){ 
			$url = site_url()."customer/api/remoteMachineClassScheduleFetchSingle/$rmstId";
			$response =  apiCall($url, "get");
			if($response['result']){
				if($response['result']['tokbox_sessionid']){
					$sessionId=$response['result']['tokbox_sessionid'];
					$token=$response['result']['tokbox_token'];
					$result = array();
					$result['sessionId'] = $response['result']['tokbox_sessionid'];
					$result['token'] = $token;
					//$result = json_encode($result);
					if($result){
						$response = [	"isSuccess" => true,
										"responseData" => $result,
									];
					}else{
						$response = [	"isSuccess" => false,
										"message" => "No Data Found..!! "
									];
					}
				}else{
					require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
					$objTokbox = new tokbox;
					$stringData= $objTokbox->tokenGenration();	
					$stringData['rmstId']=$rmstId;	
					$url = site_url()."customer/api/remoteMachineClassScheduleUpdate/";
					$response =  apiCall($url, "post",$stringData);
					if($response['result']){
						$url = site_url()."customer/api/remoteMachineClassScheduleFetchSingle/$rmstId";
						$response =  apiCall($url, "get");
							if($response['result']['tokbox_sessionid']){
								$result = array();
								$result['sessionId'] = $response['result']['tokbox_sessionid'];
								$result['token'] = $response['result']['tokbox_token'];;
								//$result = json_encode($result);
								if($result){
									$response = [	"isSuccess" => true,
													"responseData" => $result,
												];
								}else{
									$response = [	"isSuccess" => false,
													"message" => "No Data Found..!! "
												];
								}			
							}
					}
					else{
							$response = [	
												"isSuccess" => false,
												"message" => "Something Went Wrong.Please Try Again..!! "
										];
					}	
				}
					$this->response($response, REST_Controller::HTTP_OK);
			}else{
							$response = [	
												"isSuccess" => false,
												"message" => "No Data Found..!! "
										];
					$this->response($response, REST_Controller::HTTP_OK);
			} 
		} 
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* Remote Programming Request List Customer*/
	public function remoteProgrammingRequestListCustomer_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				$strWhere .= " AND customer_user_id = $id ";
				$strWhere .= " AND programmer_id<>0 ";
				$result =$this->v1_model->remoteProgrammingRequestListCustomer($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function remoteProgrammingRequestListProgrammer_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				//$strWhere .= " AND user_id = $id ";
				$strWhere .= " AND programmer_id= '{$id}' ";
				$result =$this->v1_model->remoteProgrammingRequestListCosultant($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* Remote Programming Request List */
	public function remoteProgrammingClassScheduleListProgrammer_post() {
		$data = $this->post();
		$this->form_validation->set_rules('rpr_id', 'Remote ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->remoteProgrammingClassScheduleListConsultant($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function remoteProgrammingClassScheduleListCustomer_post() {
		$data = $this->post();
		$this->form_validation->set_rules('rpr_id', 'Remote ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->remoteProgrammingClassScheduleListCustomer($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
/* =============LIVE DEMO============ */
	public function liveDemoRequestListCustomer_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				$strWhere .= " AND user_id = $id ";
				$result =$this->v1_model->liveDemoRequestListCustomer($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function liveDemoRequestListSupplier_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				//$strWhere .= " AND user_id = $id ";
				$strWhere .= " AND mvr.supplier_id= '{$id}' ";
				$result =$this->v1_model->liveDemoRequestListSupplier($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function liveDemoRequestClassScheduleListCustomer_post() {
		$data = $this->post();
		$this->form_validation->set_rules('mvr_id', 'Machine Video Request ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->liveDemoRequestClassScheduleListCustomer($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	public function liveDemoLaunch_get($id){
	 	if((int)($id)){ 
			$url = site_url()."customer/api/liveDemoClassScheduleFetchSingle/$id";
			$response =  apiCall($url, "get");
		
		 	if($response['result']){
				if($response['result']['tokbox_sessionid']){
					$sessionId=$response['result']['tokbox_sessionid'];
					$token=$response['result']['tokbox_token'];
					$result = array();
					$result['sessionId'] = $response['result']['tokbox_sessionid'];
					$result['token'] = $token;
					//$result = json_encode($result);
					if($result){
						$response = [	"isSuccess" => true,
										"responseData" => $result,
									];
					}else{
						$response = [	"isSuccess" => false,
										"message" => "No Data Found..!! "
									];
					}
				}else{
					require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
					$objTokbox = new tokbox;
					$stringData= $objTokbox->tokenGenration();	
					$stringData['id']=$id;	
					$url = site_url()."customer/api/liveDemoClassScheduleUpdate/";
					$response =  apiCall($url, "post",$stringData);
					
					if($response['result']){
						$url = site_url()."customer/api/liveDemoClassScheduleFetchSingle/$id";
						$response =  apiCall($url, "get");
							if($response['result']['tokbox_sessionid']){
								$result = array();
								$result['sessionId'] = $response['result']['tokbox_sessionid'];
								$result['token'] = $response['result']['tokbox_token'];;
								//$result = json_encode($result);
								if($result){
									$response = [	"isSuccess" => true,
													"responseData" => $result,
												];
								}else{
									$response = [	"isSuccess" => false,
													"message" => "No Data Found..!! "
												];
								}			
							}
					}
					else{
							$response = [	
												"isSuccess" => false,
												"message" => "Something Went Wrong.Please Try Again..!! "
										];
					}	
				}
					$this->response($response, REST_Controller::HTTP_OK);
			} 
		
		} 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function liveDemoRequestClassScheduleListSupplier_post() {
		$data = $this->post();
		$this->form_validation->set_rules('mvr_id', 'Machine Video Request ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->liveDemoRequestClassScheduleListSupplier($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
/* Remote Application Service Request List Customer*/
	public function remoteServiceAggrementRequestListCustomer_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				$strWhere .= " AND user_id = $id ";
				$strWhere .= " AND accepted_consultant_id <> '' ";
				$result =$this->v1_model->remoteServiceAggrementRequestListCustomer($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function remoteServiceAggrementRequestListCosultant_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				$strWhere .= " AND RMAR.accepted_consultant_id= '{$id}' ";
				$result =$this->v1_model->remoteServiceAggrementRequestListCosultant($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function remoteServiceAggrementClassRequestListCustomer_post() {
		$data = $this->post();
		$this->form_validation->set_rules('rar_id', 'Remote ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->remoteServiceAggrementClassRequestListCustomer($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	public function remoteServiceAggrementClassRequestListConsultant_post() {
		$data = $this->post();
		$this->form_validation->set_rules('rar_id', 'Remote ID', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->remoteServiceAggrementClassRequestListCustomer($data); 
			
			if($result){
				$response = [	"isSuccess" => true,
								"responseData" => $result,
							];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	public function remoteserviceAggrementLaunch_get($rab_id){
		$url = site_url()."customer/api/remoteServiceClassScheduleFetchSingle/$rab_id";
			$response =  apiCall($url, "get");
		if((int)($rab_id)){ 
			$url = site_url()."customer/api/remoteServiceClassScheduleFetchSingle/$rab_id";
			$response =  apiCall($url, "get");

			if($response['result']){
				if($response['result']['tokbox_sessionid']){
					$sessionId=$response['result']['tokbox_sessionid'];
					$token=$response['result']['tokbox_token'];
					$result = array();
					$result['sessionId'] = $response['result']['tokbox_sessionid'];
					$result['token'] = $token;
				//	$result = json_encode($result);
					//print_r($result);exit;
					if($result){
						$response = [	"isSuccess" => true,
										"responseData" => $result,
									];
					}else{
						$response = [	"isSuccess" => false,
										"message" => "No Data Found..!! "
									];
					}
				}else{
						require_once APPPATH."modules/wtokbox/controllers/Tokbox.php";
					$objTokbox = new tokbox;
					$stringData= $objTokbox->tokenGenration();	
					$stringData['rab_id']=$rab_id;	
					$url = site_url()."customer/api/remoteServiceClassScheduleUpdate/";
					$response =  apiCall($url, "post",$stringData);
					if($response['result']){
						$url = site_url()."customer/api/remoteServiceClassScheduleFetchSingle/$rab_id";
						$response =  apiCall($url, "get");
							if($response['result']['tokbox_sessionid']){
								$result = array();
								$result['sessionId'] = $response['result']['tokbox_sessionid'];
								$result['token'] = $response['result']['tokbox_token'];;
							//	$result = json_encode($result);
								if($result){
									$response = [	"isSuccess" => true,
													"responseData" => $result,
												];
								}else{
									$response = [	"isSuccess" => false,
													"message" => "No Data Found..!! "
												];
								}			
							}
					}
					else{
							$response = [	
												"isSuccess" => false,
												"message" => "Something Went Wrong.Please Try Again..!! "
										];
					}	
				}
					$this->response($response, REST_Controller::HTTP_OK);
			} 
		} 
		$this->response($response, REST_Controller::HTTP_OK);
	}

/* ============Community============= */
	public function communityList_post() {
		$data = $this->post();
		// print_r($data);exit;
		$this->form_validation->set_rules('limit', 'Limit', 'trim|required');
		$this->form_validation->set_rules('last_id', 'Last ID ', 'trim|required');
		$this->form_validation->set_rules('user_id', 'User ID ', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$user_id = $data['user_id']; 
			$result = $this->v1_model->communityList($data); 
			
			//userDetails
			$userResult = $this->v1_model->getuserDetails($user_id); 
			
			$postData['user_email'] = $userResult['userEmail'];
			//print_r($userResult);exit;
			$url = site_url()."community/api/getCommunityJoinListForUser";
			$response =  apiCall($url, "POST",$postData);
			$communityListFromUser=$response['result'];
			if($communityListFromUser){
				$communityList=array();
				foreach($communityListFromUser as $rowCom){
					array_push($communityList,$rowCom['community_id']);
				}
			}
			if($result){
				$results = array();
				foreach($result as $row){
							$url = site_url()."community/api/communityanswerCount/".$row['id'];
                            $answerCount = apiCall($url,"get");
                            $answerCount =  $answerCount['result']['count'];
							//print_r($answerCount);exit;
							$url = site_url()."community/api/communityviewerCount/".$row['id'];
                            $viewerCount = apiCall($url,"get");
                             if($viewerCount['result'][0]['count']){
                                $viewerCount = $viewerCount['result'][0]['count'];
                             }else{
								$viewerCount = 0;
                             }
					if (in_array("{$row['id']}", $communityList))
						  {
							$row['isCommunityMember'] = 'Y';
							$row['answerCount'] = "{$answerCount}";
							$row['viewerCount'] = "{$viewerCount}";
						  }else{
							$row['isCommunityMember'] = 'N';
							$row['answerCount'] = "{$answerCount}";
							$row['viewerCount'] = "{$viewerCount}";
						  }
					 array_push($results, $row);
				}
				
					$response = [	
									"isSuccess" => true,
									"responseData" => $results,
								];
			}else{
					$response = [	
									"isSuccess" => false,
								"message" => "No Data Found..!! "
								];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	
	public function getuserDetails_get( $id ) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				$strWhere .= " user_id = $id ";
				$result =$this->v1_model->getuserDetails($strWhere);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function topicList_get( $community_id ) {
		if( !(int)$community_id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}else{
				$result =$this->v1_model->topicList($community_id);
				if(!$result){
					$response = [
									"isSuccess" => false,
									"message" => "No data Found..!!"
								];
				}else{
					$response = [ 
									"isSuccess" => true,
									"responseData" => $result,
								];
				}
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function topicList_post() {
		$data = $this->post();
		$this->form_validation->set_rules('limit', 'Limit', 'trim|required');
		$this->form_validation->set_rules('last_id', 'Last ID ', 'trim|required');
		$this->form_validation->set_rules('community_id', 'Community ID ', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
            // get input data
			$data = $this->post(); 
			$result = $this->v1_model->topicList($data); 
			if($result){
				$results = array();
				foreach($result as $row){
							$url = site_url()."community/api/answerCountTopic/".$row['id'];
                            $answerCountTopic = apiCall($url,"get");
                            $answerCountTopic =  $answerCountTopic['result'][0]['count'];
							$url = site_url()."community/api/likesCountTopic/".$row['id'];
                            $likesCountTopic = apiCall($url,"get");
                            $likesCountTopic =  $likesCountTopic['result'][0]['count'];
							$row['likesCountTopic'] = "{$likesCountTopic}";
							$row['answerCountTopic'] = "{$answerCountTopic}";
					
							array_push($results, $row);
				}
				$response = [	"isSuccess" => true,
									"responseData" => $results,
								];
			}else{
				$response = [	"isSuccess" => false,
								"message" => "No Data Found..!! "
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* Share community Request */
	public function shareCommunity_post(){
		$this->form_validation->set_rules('community_id', 'Community ID ', 'trim|required');
		$this->form_validation->set_rules('community_invite_email', 'Community Email', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
			$data = $this->post(); 
			$community_invite_code = random_string('unique');
			$chkdata = array();
			$chkdata['community_id'] = $data['community_id'];
			$chkdata['community_invite_email'] = $data['community_invite_email'];
			$chkResult = $this->v1_model->checkEmailExist($chkdata); 
			if($chkResult){
				$response = [	"isSuccess" => false,
								"message" => "Already Member of community..!! "
							];
			}else{
				$data['community_invite_code'] = $community_invite_code;
				$updateResult = $this->v1_model->updateshareCommunity($data); 
				if($updateResult){
					$community_invite_email = $data['community_invite_email'];
					$link= site_url()."customer/forum/verify".'/'.$community_invite_email.'/'.$community_invite_code;
					$to = $community_invite_email;
					$body = '<p>Hi, </p> '; 
					$body.='<p>Please click this link to activate your account:';
					$body.= '<a href= "'.$link.'">Link</a>';
					$email_content = $body;  
					$this->load->library('Email_PHPMailer');
					$subject = 'Registration Verification: Continuous Imapression :';
					$mailresponse = email_Send($subject,$to,$email_content,$name);
					$response = [	
									"isSuccess" => true,
									"responseData" => "Community Shared Successfully..!!",
								];
				}else{
					$response = [	
									"isSuccess" => false,
									"message" => "Something went wrong..!!"
								];
				}
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
/* JOIN Community Request */
	public function joinCommunity_post(){
		$this->form_validation->set_rules('community_id', 'Community ID ', 'trim|required');
		$this->form_validation->set_rules('user_email', 'Community Email', 'trim|required');
		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
			$data = $this->post(); 
			$community_invite_code = random_string('unique');
			$chkdata = array();
			$chkdata['community_id'] = $data['community_id'];
			$chkdata['community_invite_email'] = $data['user_email'];
			$chkResult = $this->v1_model->checkEmailExist($chkdata); 
			if($chkResult){
				$response = [	"isSuccess" => false,
								"message" => "Already Member of community..!! "
							];
			}else{
				$data['community_invite_code'] = $community_invite_code;
				$updateResult = $this->v1_model->joinCommunity($data); 
				if($updateResult){
					$community_invite_email = $data['user_email'];
					$link= site_url()."customer/forum/verify".'/'.$community_invite_email.'/'.$community_invite_code;
					$to = $community_invite_email;
					$body = '<p>Hi, </p> '; 
					$body.='<p>Please click this link to activate your account:';
					$body.= '<a href= "'.$link.'">Link</a>';
					$email_content = $body;  
					$this->load->library('Email_PHPMailer');
					$subject = 'Registration Verification: Continuous Imapression :';
					$mailresponse = email_Send($subject,$to,$email_content,$name);
					$response = [	
									"isSuccess" => true,
									"responseData" => "Join request added successfully. Please check the Email..!!",
								];
				}else{
					$response = [	
									"isSuccess" => false,
									"message" => "Something went wrong..!!"
								];
				}
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}	
	public function commentListbyTopics_post(){
		$this->form_validation->set_rules('topic_id','Topic ID', 'trim|required');
		$this->form_validation->set_rules('user_id','Topic ID', 'trim|required');
		$this->form_validation->set_rules('limit', 'Limit', 'trim|required');
		$this->form_validation->set_rules('last_id', 'Last ID ', 'trim|required');

		if ($this->form_validation->run() == FALSE) {
            $response = [
                "isSuccess" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        }else{
			$data = $this->post();
			
			$commentList = $this->v1_model->commentListbyTopics($data);
				
				if($commentList){
		
				$results = array();
				foreach($commentList as $row){
					$url = site_url()."community/api/likeCount/".$row['id'];
					$likes = apiCall($url,"get");
					$like = $likes['result']['count'];
					$data['user_id'];
					$data['post_id'] = $row['id'];
					$url = site_url()."community/api/statusLikeDislike/";
					$likes = apiCall($url,"post",$data);
					//print_r($likes);
					if($likes){
						$like_dislike_status = $likes['result']['like_dis'];	
					}else{
						$like_dislike_status	= '';
					}

					$url = site_url()."community/api/dislikeCount/".$row['id'];
					$dislikes = apiCall($url,"get");
					$dislikes = $dislikes['result']['count'];	
					
					$row['likes'] = "{$like}";
					$row['dislikes'] = "{$dislikes}";
					$row['like_dislike_status'] = "{$like_dislike_status}";
					 array_push($results, $row);
				}	  
					$response = [	
								"isSuccess" => true,
								"responseData" => $results,
								"imagePath"=> base_url().'uploads/customer/'
							]; 
			}else{
				$response = [	
								"isSuccess" => false,
								"responseData" => "No Comment Found for this topic..!!",
							];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function replyListbyComment_post(){
			$this->form_validation->set_rules('parent_id','Parent ID', 'trim|required');
			$this->form_validation->set_rules('user_id','user ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$response = [
					"isSuccess" => false,
					'message' => validation_errors()
				];
				$this->response($response, REST_Controller::HTTP_OK);
				return;
			}else{
				$data = $this->post();
				
				$commentList = $this->v1_model->replyListbyComment($data); 
				if($commentList){
					$results = array();
					foreach($commentList as $row){
						$url = site_url()."community/api/likeCount/".$row['id'];
						$likes = apiCall($url,"get");
						$likes = $likes['result']['count'];

						$url = site_url()."community/api/dislikeCount/".$row['id'];
						$dislikes = apiCall($url,"get");
						$dislikes = $dislikes['result']['count'];
						$data['post_id'] = $row['id'];
						$url = site_url()."community/api/statusLikeDislike/";
						$like = apiCall($url,"post",$data);
						if($likes){
							$like_dislike_status = $like['result']['like_dis'];	
						}else{
							$like_dislike_status	= '';
						}

						
						
						$row['likes'] = "{$likes}";
						$row['dislikes'] = "{$dislikes}";
						$row['like_dislike_status'] = "{$like_dislike_status}";
						array_push($results, $row);
					}	  
					
					$response = [	
									"isSuccess" => true,
									"responseData" => $results,
									"imagePath"=> base_url().'uploads/customer/'
								]; 
				}else{
					$response = [	
									"isSuccess" => false,
									"responseData" => "No Comment Found for this topic..!!",
								];
				}
			}
			$this->response($response, REST_Controller::HTTP_OK);
	}	
	public function attachementListForComment_post(){
			$this->form_validation->set_rules('post_id','post ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$response = [
					"isSuccess" => false,
					'message' => validation_errors()
				];
				$this->response($response, REST_Controller::HTTP_OK);
				return;
			}else{
				$data = $this->post();
				
				$commentList = $this->v1_model->attachementListForComment($data); 
				if($commentList){
					$response = [	
									"isSuccess" => true,
									"responseData" => $commentList,
									"attachmentDocumentPath"=> base_url().'uploads/attachmentfiles/'
								]; 
				}else{
					$response = [	
									"isSuccess" => false,
									"responseData" => "No Comment Found for this topic..!!",
								];
				}
			}
			$this->response($response, REST_Controller::HTTP_OK);
	}
	public function communityCreatorAndModrator_post(){
			$this->form_validation->set_rules('community_id','Community ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$response = [
					"isSuccess" => false,
					'message' => validation_errors()
				];
				$this->response($response, REST_Controller::HTTP_OK);
				return;
			}else{
				$data = $this->post();
				
				$community = $this->v1_model->communityCreatorAndModrator($data); 

				if($community){
					$response = [	
									"isSuccess" => true,
									"responseData" => $community,
									"imagePath"=> base_url().'uploads/customer/'
								]; 
				}else{
					$response = [	
									"isSuccess" => false,
									"responseData" => "No data Found..!!",
								];
				}
			}
			$this->response($response, REST_Controller::HTTP_OK);
	}
	public function communityAllMemberList_post(){
			$this->form_validation->set_rules('community_id','Community ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$response = [
					"isSuccess" => false,
					'message' => validation_errors()
				];
				$this->response($response, REST_Controller::HTTP_OK);
				return;
			}else{
				$data = $this->post();
				
				$MemberList = $this->v1_model->communityAllMemberList($data); 
				
				if($MemberList){
					$response = [	
									"isSuccess" => true,
									"responseData" => $MemberList,
									"imagePath"=> base_url().'uploads/customer/'
								]; 
				}else{
					$response = [	
									"isSuccess" => false,
									"responseData" => "No Member Found for this Community..!!",
								];
				}
			}
			$this->response($response, REST_Controller::HTTP_OK);
	}
	public function likeDislike_post(){
			$this->form_validation->set_rules('post_id','Community ID', 'trim|required');
			$this->form_validation->set_rules('topic_id','Community ID', 'trim|required');
			$this->form_validation->set_rules('opr','Community ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$response = [
					"isSuccess" => false,
					'message' => validation_errors()
				];
				$this->response($response, REST_Controller::HTTP_OK);
				return;
			}else{
				$data = $this->post();
				$url = site_url()."community/api/likesCount/";
				$likes = apiCall($url,"post",$data);
				//print_r($likes);exit;
				$likes = $likes['result']['count'];
				$result['count'] = $likes;
				if($likes){
					$response = [	
									"isSuccess" => true,
									"responseData" => $result['count'],
								]; 
				}else{
					$response = [	
									"isSuccess" => false,
									"responseData" => "Something went wrong..!!",
								];
				}
			}
			$this->response($response, REST_Controller::HTTP_OK);
	}
	public function createComment_post(){
			$this->form_validation->set_rules('topic_id','Topic ID', 'trim|required');
			$this->form_validation->set_rules('uid','User ID', 'trim|required');
			$this->form_validation->set_rules('content','Conetent Data', 'trim|required');
			$this->form_validation->set_rules('parent_id','Parent ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
					$response = [
						"isSuccess" => false,
						'message' => validation_errors()
					];
					$this->response($response, REST_Controller::HTTP_OK);
					return;
				}else{
						$data = $this->post();
						$url = site_url()."community/api/createPostComment/";
						$commentResponse = apiCall($url,"post",$data);
						if($commentResponse){
									$response = [	
													"isSuccess" => true,
													"responseData" => $commentResponse,
												]; 
											}else{
												$response = [	
																"isSuccess" => false,
																"responseData" => "No Comment Found for this topic..!!",
															];
											}
				}
				$this->response($response, REST_Controller::HTTP_OK);
	}
	public function addAttchment_post(){
			$this->form_validation->set_rules('post_id','Post ID', 'trim|required');
			$this->form_validation->set_rules('uid','User ID', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
					$response = [
						"isSuccess" => false,
						'message' => validation_errors()
					];
					$this->response($response, REST_Controller::HTTP_OK);
					return;
				}else{
						$data = $this->post();
						$url = site_url()."community/api/createAttachment/";
						$attachmentResponse = apiCall($url,"post",$data);
						if($attachmentResponse){
									$response = [	
													"isSuccess" => true,
													"responseData" => $attachmentResponse,
												]; 
											}else{
												$response = [	
																"isSuccess" => false,
																"responseData" => "Attachment Added Failed..!!",
															];
											}
				}
				$this->response($response, REST_Controller::HTTP_OK);
	}
	
}