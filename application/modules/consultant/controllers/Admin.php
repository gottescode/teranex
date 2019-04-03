<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 

        $this->load->model('consultant_model');
    }

	public function index() {
	 	$url = site_url()."consultant/api/findMultiple/";
		$consultant_list =  apiCall($url, "get"); 
		 
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."consultant/api/updatePublishConsultant";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('consultant_list' =>$consultant_list['result'] , );
		$this->template->load("admin/list",$arrData);
	}
	public function create() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."consultant/api/create";
			 
			$response =  apiCall($url, "post",$pageData,1);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/");	
			} 	
		} 
		// load model
		/*$this->load->model("location/country_model");
		$this->load->model("location/state_model");
		// prepare data
		$arrData = array( 
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id), 
		);*/


		$this->template->load("admin/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."consultant/api/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."consultant/admin/");			
		}
		$url = site_url()."/consultant/api/findSingle/$id";
		$consultant_data =  apiCall($url, "get");
		
		$url = site_url()."/consultant/api/findMultipleAddress/$id";
		$consultantr_Address_data =  apiCall($url, "get");

		$url = site_url()."/consultant/api/findAddress/$id";
		$consultantAddressList =  apiCall($url, "get");
		
		// load model
		$this->load->model("location/country_model");
		$this->load->model("location/state_model");
		$this->load->model("location/city_model");
		$country_id =$consultant_data['result']['s_branch_country'];
		$state_id =$consultant_data['result']['s_branch_state'];
	
		$arrayData = [
			"country_id"=>$country_id, 
			"consultant_data"=>$consultant_data['result'], 
			"consultant_Address_data"=>$consultant_Address_data['result'], 
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id), 
			"cityList" => $this->city_model->getCityList($state_id), 
			"consultantAddressList"=>$consultantAddressList['result'], 
		];
		$this->template->load("admin/update",$arrayData);
	}
	public function deleteConsultant($id) {  
		$url = site_url()."/consultant/api/deleteConsultant/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."consultant/admin/");		
	} 
/* Service Agreement Request Lists */
	public function service_agreement_request() {  
		$url = site_url()."/consultant/api/findMultipleServiceRequestList/";
		$service_request_list =  apiCall($url, "get");
		$arrayData=[
			"service_request_list"=>$service_request_list['result'],
		];
		$this->template->load("admin/service_agreement_request",$arrayData);
	} 
// admin approval

	public function admin_approval()
	{
        	$data['approval_data']=$this->consultant_model->fetchDataidWhr();

        	//print_r($data['approval_data']);die;
		$this->template->load("admin/admin_approval",$data);

	}


/* Request To Consultant */
	public function request_to_consultant($rar_id){  
		$url = site_url()."consultant/api/findMultipleConsultantUsersListSupplierServiceEngg/";
		$consultant_user_list =  apiCall($url, "get");
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/assignconsultant";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/request_to_consultant/$rar_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/request_to_consultant/$rar_id");
			}  
		}
		$arrayData=[
			"consultant_user_list"=>$consultant_user_list['result'],
			"rar_id"=>$rar_id
		];
		$this->template->load("admin/request_to_consultant",$arrayData);
	}
	
/* Remote Machine request */
	public function requestListMachineConsultant(){
		$url = site_url()."consultant/api/findMultipleRequestMachineConsultantList/";
		$req_machine_consultantList =  apiCall($url, "get");
		$arrayData=[
			"req_machine_consultantList"=>$req_machine_consultantList['result']
		];		
		$this->template->load("admin/requestList_remoteMachine",$arrayData);
	}
/* Remote Machine Invoice  */
	public function remoteMachineInvoiceRequest($id=0){
		$url = site_url()."consultant/api/findSingleInvoiceDetailsRemoteMachine/{$id}";
		$invoiceList =  apiCall($url, "get");
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$pageData['start_date'] = date_ymd($pageData['start_date']);
			$pageData['end_date'] = date_ymd($pageData['end_date']);
			$url = site_url()."consultant/api/createFinalInvoice";
			$response = apiCall($url,"POST",$pageData);
			if($response['result']){
				$url = site_url()."consultant/api/updateOldInvoice";
				$response = apiCall($url,"POST",$pageData);
				
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/requestListMachineConsultant");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/requestListMachineConsultant");
			}  
		}
			
		$arrayData=[
			"result"=>$invoiceList['result']
		];		
		$this->template->load("admin/invoice_details",$arrayData);
	}
	/* Remote Machine Invoice  Details*/
	public function remoteMachineInvoiceRequestfinal($id=0){
		
		$url = site_url()."consultant/api/findSingleInvoiceDetailsRemoteMachineFinal/{$id}";
		$invoiceList =  apiCall($url, "get");
		$arrayData=[
			"result"=>$invoiceList['result']
		];		

		$this->template->load("admin/invoice_details_final",$arrayData);
	}
	
	/* Request To Consultant */
	public function request_on_demand_consultant($rar_id){  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/assignconsultantOndemand";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/requestListMachineConsultant/");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/request_on_demand_consultant/$rar_id");
			}  
		}
		$url = site_url()."consultant/api/findMultipleConsultantUsersList/";
		$consultant_user_list =  apiCall($url, "get");
		$url = site_url()."consultant/api/sentRemoteOndemandConsultantList/";
		$aentConsultantUser_list =  apiCall($url, "get");
		$arrayData=[
			"consultant_user_list"=>$consultant_user_list['result'],
			"aentConsultantUser_list"=>$aentConsultantUser_list['result'],
			"rar_id"=>$rar_id
		];
		$this->template->load("admin/request_on_demand_consultant",$arrayData);
	}
	public function qualification() {
	 	$url = site_url()."consultant/api/findMultipleConsultantQualification/";
		$qualificationList  =  apiCall($url, "get"); 
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."consultant/api/updatePublishConsultant";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('qualificationList' =>$qualificationList['result'] , );
		$this->template->load("admin/ConsultantQualification",$arrData);
	}
	public function createQualification() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."consultant/api/createConsultantQualification"; 
			$response =  apiCall($url,"post",$pageData);
		
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/Qualification");	
			}else{
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/Qualification");	
			}
		} 
		$this->template->load("admin/createConsultantQualification",$arrData);
	}
	public function updateQualification($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."consultant/api/updateQualification";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/qualification");			
			}
		}
		$url = site_url()."/consultant/api/findSinglequalification/$id";
		$singleQualData =  apiCall($url, "get");
		$arrayData = [
			"singleQualData"=>$singleQualData['result'], 
			];
		$this->template->load("admin/updateQualification",$arrayData);
	}
	public function deleteQualification($id) {  
		$url = site_url()."/consultant/api/deleteQualification/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."consultant/admin/qualification");		
	} 

	public function videoRequests(){
		$url = site_url()."consultant/api/findMultipleVideoRequest"; 
		$videoRequestList =  apiCall($url, "get"); 
		//print_r($videoRequestList);exit;
		$arrayData = [
			"videoRequestList"=>$videoRequestList['result']
		];
		$this->template->load('admin/videoRequest',$arrayData);
	}

	public function assignProgrammer($rsvr_id){
		$url = site_url()."consultant/api/findMultipleProgrammer/";
		$supplier_user_list =  apiCall($url, "get");
		$arrayData = [
			"programmer_user_list"=>$supplier_user_list['result'],
			"rsvr_id"=>$rsvr_id
		];
		$this->template->load('admin/request_to_programmer',$arrayData);
	}


	public function assign_approval()
	{

    $uid=$this->input->post('uid');
  
  // echo $uid;die;

    $data=array('is_active'=>2);
    $result=$this->consultant_model->updateDetails('master_user','uid',$uid,$data);


	}
	
	/* Technical Services */
	public function technical_services() {  
		$url = site_url()."/consultant/api/findMultipleTechnicalServiceRequestList/";
		$service_request_list =  apiCall($url, "get");
		$arrayData=[
			"service_request_list"=>$service_request_list['result'],
		];
		$this->template->load("admin/technical_service_request",$arrayData);
	} 
	public function meeting_list_technical($tech_req_id) {  
	
		$url = site_url() . "customer/api/techncialSupportclassScheduleListConsultant/$tech_req_id";
        $reqData = apiCall($url, "get");
		$this->load->library('ZoomAPI');
        if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
            //CREATE OBJECT OF PERTICULAR CLASS
			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			$zoomCalls = new ZoomAPI();
			$createUser = $zoomCalls->createMeeting($data);
			$responseArray = json_decode($createUser);
			$responseZoom = (array) $responseArray;
			$responseZoom1 = array();
            $responseZoom1['tech_req_id'] = $tech_req_id;
            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];
            $responseZoom1['join_url'] = $responseZoom['join_url'];
            $responseZoom1['start_time'] = $responseZoom['start_time'];
            $responseZoom1['end_time'] = $endTime;
            $responseZoom1['created_at'] = $responseZoom['created_at'];
            $responseZoom1['host_id'] = $responseZoom['host_id'];
            $responseZoom1['uuid'] = $responseZoom['uuid'];
            $responseZoom1['meeting_id'] = $responseZoom['id'];
            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = 0;
			$url = site_url() . "customer/api/zoomResponseInsertTechSupport/";
			$acceptResponse = apiCall($url, "post", $responseZoom1);
            if ($acceptResponse['result']) {
                setFlash("dataMsgAddSuccess", $acceptResponse['message']);
                redirect(site_url() . "consultant/admin/meeting_list_technical/$tech_req_id");
            } else {
                setFlash("dataMsgAddError", $acceptResponse['message']);
                redirect(site_url() . "consultant/admin/meeting_list_technical/$tech_req_id");
            }
        }
		$arrayData = [
            "reqData" => $reqData['result'],
            "tech_req_id" => $tech_req_id
        ];
		$this->template->load("admin/technicalRequestClassScheduleList",$arrayData);
	} 
	public function meeting_list_application($app_req_id) {  
			$url = site_url() . "customer/api/applicationSupportclassScheduleListConsultant/$app_req_id";
			$reqData = apiCall($url, "get");
			$this->load->library('ZoomAPI');
			if (isset($_POST['btnSubmit'])) {
            $data = $this->input->post();
            //CREATE OBJECT OF PERTICULAR CLASS
			$timestamp1 = $data['datetimepicker'];
			$splitTimeStamp = explode(" ",$timestamp1);
			$date = $splitTimeStamp[0];
			$time = $splitTimeStamp[1];
			$duration = $data['duration'];
			$endTime = date('Y-m-d H:i:s',strtotime('+ '.$duration.' minutes',strtotime($timestamp1)));
			$zoomCalls = new ZoomAPI();
			$createUser = $zoomCalls->createMeeting($data);
			$responseArray = json_decode($createUser);
			$responseZoom = (array) $responseArray;
			$responseZoom1 = array();
            $responseZoom1['app_req_id'] = $app_req_id;
            $responseZoom1['title'] = $data['title'];
            $responseZoom1['start_url'] = $responseZoom['start_url'];
            $responseZoom1['join_url'] = $responseZoom['join_url'];
            $responseZoom1['start_time'] = $responseZoom['start_time'];
            $responseZoom1['end_time'] = $endTime;
            $responseZoom1['created_at'] = $responseZoom['created_at'];
            $responseZoom1['host_id'] = $responseZoom['host_id'];
            $responseZoom1['uuid'] = $responseZoom['uuid'];
            $responseZoom1['meeting_id'] = $responseZoom['id'];
            $responseZoom1['duration'] = $responseZoom['duration'];
            $responseZoom1['created_by'] = 0;
		    $url = site_url() . "customer/api/zoomResponseInsertApplicationSupport/";
			$acceptResponse = apiCall($url, "post", $responseZoom1);
		
            if ($acceptResponse['result']) {
                setFlash("dataMsgAddSuccess", $acceptResponse['message']);
                redirect(site_url() . "consultant/admin/meeting_list_application/$app_req_id");
            } else {
                setFlash("dataMsgAddError", $acceptResponse['message']);
                redirect(site_url() . "consultant/admin/meeting_list_application/$app_req_id");
            }
        }
		$arrayData = [
            "reqData" => $reqData['result'],
            "app_req_id" => $app_req_id
        ];
		$this->template->load("admin/applicationRequestClassScheduleList",$arrayData);
	} 
	
	public function technical_update_status($id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/techServiceUpdateStatus";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/technical_services/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/technical_services/$id");
			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		
		$this->template->load("admin/technical_update_status",$arrayData);
	}
	public function application_update_status($id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/applicationUpdateStatus";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/application_support_request/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/technical_services/$id");
			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		 
		$this->template->load("admin/application_update_status",$arrayData);
	}
	public function meeting_update_status($id,$tech_req_id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/meetingUpdateStatus";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/meeting_list_technical/$tech_req_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/meeting_list_technical/$tech_req_id");
			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		
		$this->template->load("admin/meeting_update_status",$arrayData);
	}
	public function meeting_update_status_application($id,$app_req_id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/meetingUpdateStatusApplication";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/meeting_list_application/$app_req_id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/meeting_list_application/$app_req_id");
			}  
		}
		
		$arrayData = [
            "id" => $id
        ];
		
		$this->template->load("admin/meeting_update_status",$arrayData);
	}
	
	public function request_to_service_aggrement($id){  
		$url = site_url()."consultant/api/findMultipleConsultantUsersListSupplierServiceEngg/";
		$consultant_user_list =  apiCall($url, "get");
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/assignconsultantTrainingRequest";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/request_to_service_aggrement/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/request_to_service_aggrement/$id");
			}  
		}
		$arrayData=[
			"consultant_user_list"=>$consultant_user_list['result'],
			"id"=>$id
		];
		$this->template->load("admin/technical_service_request_to_consultant",$arrayData);
	}
	
	public function request_to_on_demand_consultant($rar_id){  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/assignconsultantTrainingRequest";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/request_to_on_demand_consultant/");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/request_to_on_demand_consultant/$rar_id");
			}  
		}
		$url = site_url()."consultant/api/findMultipleConsultantUsersList/";
		$consultant_user_list =  apiCall($url, "get");
		$url = site_url()."consultant/api/sentRemoteOndemandConsultantList/";
		$aentConsultantUser_list =  apiCall($url, "get");
		$arrayData=[
			"consultant_user_list"=>$consultant_user_list['result'],
			"aentConsultantUser_list"=>$aentConsultantUser_list['result'],
			"id"=>$rar_id
		];
		$this->template->load("admin/request_on_demand_consultant",$arrayData);
	}
	/* Application Support Admin Functionality */
	public function application_support_requests() {  
		$url = site_url()."/consultant/api/findMultipleApplicationRequestList/";
		$service_request_list =  apiCall($url, "get");
		
		$arrayData=[
			"service_request_list"=>$service_request_list['result'],
		];
		$this->template->load("admin/application_support_request",$arrayData);
	} 
	public function request_to_engg($id){  
		$url = site_url()."consultant/api/findMultipleEnggList/";
		$consultant_user_list =  apiCall($url, "get");
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/assignconsultantApplicationRequest";
			
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/request_to_engg/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/request_to_engg/$id");
			}  
		}
		$arrayData=[
			"consultant_user_list"=>$consultant_user_list['result'],
			"id"=>$id
		];
		$this->template->load("admin/request_on_engg",$arrayData);

	}
	/* Spare Part Request */
	public function spare_part_requests() {  
		$url = site_url()."/consultant/api/findMultipleSpareRequestList/";
		$spare_part_list =  apiCall($url, "get");
		
		$arrayData=[
			"service_request_list"=>$spare_part_list['result'],
		];
		$this->template->load("admin/spare_request",$arrayData);
	}	
	public function updateOrderDetails($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."/consultant/api/updateSpareOrderDetails";
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/updateOrderDetails/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/updateOrderDetails/$id");
			}  
		}
		
		$url = site_url()."/consultant/api/findMultipleDeliveryList/$id";
		$deliveryTrackingDetails =  apiCall($url, "get");
		$arrayData=[
			"deliveryTrackingDetails"=>$deliveryTrackingDetails['result'],
			"spare_req_id"=>$id
		];
		$this->template->load("admin/updateSpareOrder",$arrayData);
	}
	public function closeOrder($id){
			//$pageData = $this->input->post();
			$pageData['id'] = $id;
			$pageData['status'] = 'C';
			$url = site_url()."/consultant/api/closeSpareOrderDetails/$id";
			$response =  apiCall($url,"get"); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."consultant/admin/spare_part_requests/$id");
			}else{
				setFlash("dataMsgError", 'Something Went Wrong..!!');
				redirect(site_url()."consultant/admin/spare_part_requests/$id");
			}  
	}
	public function spareReqDetails($id){
			$url = site_url()."/consultant/api/findMultipleSpareDetailsList/$id";
			$orderDetails =  apiCall($url, "get");
			$arrayData=[
				"orderDetails"=>$orderDetails['result']
			];
			$this->template->load("admin/ammendSparePartDetails",$arrayData);
	}
	/* Freelancer Request Details*/ 
	public function freelancer_requests() {  
		$url = site_url()."/consultant/api/findMultipleFreelancerList/";
		$freelancer_request_list =  apiCall($url, "get");
		$arrayData=[
			"consultReqList"=>$freelancer_request_list['result'],
		];
		$this->template->load("admin/freelancer_request",$arrayData);
	} 
	
}