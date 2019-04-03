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

}