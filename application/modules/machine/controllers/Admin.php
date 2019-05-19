<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
		
    }

	public function index() {
		$url= site_url()."machine/api/findMultipleMachineCat";
		$machineCatList = apiCall($url,"get");
		
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			
			$url = site_url()."machine/api/updatePublishMachineCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				
				redirect(site_url()."machine/admin/");	
			} else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/");	
			}  
		}
		$arrayData = [
			"machineCatList" => $machineCatList['result']
		];
		$this->template->load("admin/list",$arrayData);
	}
	public function create_category() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/createCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/");	
			} 	
		} 
		$this->template->load("admin/create",$arrData);
	}
	public function update($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/updateMachineCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/");	
			}			
		}
		$url = site_url()."/machine/api/findSingleMachineCategory/$id";
		$result =  apiCall($url, "get");
		$arrayData = [
			"result"=>$result['result'], 
			];
		$this->template->load("admin/update",$arrayData);
	}
	public function delete($id) {  
		$url = site_url()."/machine/api/delete/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."machine/admin/");		
	} 
		
/* =====================MACHINE DETAILS======================= */
	public function machineList() {
		$url= site_url()."machine/api/machineDetailsMultiple";
		$machineCatList = apiCall($url,"get");
		$arrayData = [
			"machineCatList"=>$machineCatList['result']['result']
		];
		$this->template->load("admin/machine/list",$arrayData);
	}
	public function create_machine() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
                        $pageData['machine_software_id']=implode(",",$pageData['machine_software_id']);  
                        $url = site_url()."machine/api/machineInsertDetails";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machineList");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machineList");	
			} 	
		}
		$this->load->model("location/country_model");
		$url= site_url()."machine/api/findMultipleMachineCat";
		$categoryList = apiCall($url,"get");
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get");
                
                $url = site_url() . "machine/api/machineSoftwareList";
                $softwareList = apiCall($url, "get");
			
		$arrayData = [
			"categoryList"=>$categoryList['result'],
			"countryList" => $this->country_model->getCountryListForSite(),
			"brandList" =>$brandList['result']['result'],
                        "softwareList" => $softwareList['result']

		];	
	//	print_r($arrayData);die;	
		$this->template->load("admin/machine/create",$arrayData);
	}
	/*remote Machine Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update machine details
	 * @return array of post data
	 */
	public function update_machine($mid) {
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/updateMachineDetails";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machineList");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machineList");	
			} 	
		}
		$this->load->model("location/country_model");
		$this->load->model("location/state_model");
		$this->load->model("location/city_model");
		$url = site_url()."machine/api/findSingleMachineDetails/$mid";
		$machineDetails = apiCall($url,"get");
		$url	= site_url()."machine/api/findMultipleMachineCat";
		$categoryList = apiCall($url,"get");
		$country_id	=	$machineDetails['result']['machine_location_country'];
		$state_id	=	$machineDetails['result']['machine_location_state'];
		
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get");
		
		$url	= site_url()."machine/api/machineBrandModelList/".$machineDetails['result']['brand_name'];
		$brandModelList = apiCall($url,"get");
                
                    $url = site_url() . "machine/api/machineSoftwareList";
                $softwareList = apiCall($url, "get");
                
                $url = site_url() . "machine/api/machineBrandModelList/" . $machineDetails['result']['brand_name'];
        $brandModelList = apiCall($url, "get");
        $machine_software_list = explode( ",", $machineDetails['result']['machine_software_id']);
		
		$arrayData = [
			"machine_data"=>$machineDetails['result'],
			"country_id"=>$country_id,
			"categoryList"=>$categoryList['result'],
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id), 
			"cityList" => $this->city_model->getCityList($state_id),
			"brandList" =>$brandList['result']['result'],
			"brandModelList" =>$brandModelList['result']['result'],
                        "softwareList" => $softwareList['result'],
                        "machine_software_list" => $machine_software_list

		];		
                
            //  print_r($arrayData);die;  
		$this->template->load("admin/machine/update",$arrayData);
	}
	public function deleteMachineDetails($id) {  
		$url = site_url()."/machine/api/deleteMachineDetails/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."machine/admin/machineList");		
	} 
	////////////////         Machine gallery  ///////////////////////////
	public function add_machineDetail_image($md_id) {
				if(isset($_POST['btnSubmit'])){
						$pageData = $this->input->post();  
						$url = site_url()."machine/api/createGallery";
						$response =  apiCall($url, "post",$pageData);
						if($response['result']){
							setFlash("dataMsgSuccess", $response['message']);
							redirect("machine/admin/add_machineDetail_image/{$pageData['md_id']}");	
						}else{
							setFlash("dataMsgError", $response['message']);
							
							redirect("machine/admin/add_machineDetail_image/{$pageData['md_id']}");
						}
				
				}

		$url = site_url()."machine/api/findMultipleGalleryImages/$md_id"; 
		$machineAllImages =  apiCall($url, "get"); 
		$arrayData = [ 
			"machineAllImages" => $machineAllImages ,
			"md_id" => $md_id 
		]; 					
		$this->template->load('admin/machine/machine_gallary',$arrayData);
	}
	public function delete_gallary($id,$pid) { 
		$url = site_url()."/machine/api/delete_gallary/$id"; 
		$response =  apiCall($url,"get");  
		setFlash("dataMsgSuccess", $response['message']);
		redirect("machine/admin/add_machineDetail_image/$pid");		
	} 
	/////////////////////////////    machine Finace Request  //////////////////////////////////
	/*machine Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineFinaceRequest() { 
		$url = site_url()."machine/api/machineFinaceRequest"; 
		$machineFinace =  apiCall($url, "get"); 
	//	print_r($machineFinace);exit;
		$arrayData = [ 
			"machineFinace" => $machineFinace['result'] , 
		]; 					
		$this->template->load('admin/machine/machineFinaceRequest',$arrayData);
	} 

	/////////////////////////////    machine Time study Request  //////////////////////////////////
	/*machine Time study Request 
		11-11-2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineTimeStudyRequest() { 
		$url = site_url()."machine/api/machineTimeStudyRequest"; 
		$machineTimeStudy =  apiCall($url, "get"); 
		//print_r($machineTimeStudy);exit;
		$arrayData = [ 
			"machineTimeStudy" => $machineTimeStudy['result'] , 
		]; 					
		$this->template->load('admin/machine/machineTimeStudyRequest',$arrayData);
	} 
	/////////////////////////////    machine Insurance Request  //////////////////////////////////
	/*machine Insurance Request 
			09/11/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineInsuranceRequest() { 
		$url = site_url()."machine/api/machineInsuranceRequest"; 
		$machineInsurance =  apiCall($url, "get"); 
		//print_r($machineInsurance);exit;
		$arrayData = [ 
			"machineInsurance" => $machineInsurance['result'] , 
		]; 					
		$this->template->load('admin/machine/machineInsuranceRequest',$arrayData);
	} 
	public function machineRequest() { 
		$url = site_url()."machine/api/machineRequest"; 
		$machineRequestList =  apiCall($url, "get"); 
		$arrayData = [ 
			"machineRequestList" => $machineRequestList['result'] , 
		]; 					
		$this->template->load('admin/machine/machineRequest',$arrayData);
	} 
			
/* =====================MACHINE DETAILS======================= */
	/*master Machine Brand List 
			20/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	public function machine_brand() {
		 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get");
	 
		$arrayData = [
			"brandList"=>$brandList['result'],  
		];		
		$this->template->load("admin/brand/list",$arrayData);
	}
	/*delett master Machine Brand  
			20/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	public function deleteMachineBrand($id) {  
		$url = site_url()."/machine/api/deleteMachineBrand/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."machine/admin/machine_brand");		
	}
	public function create_brand() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/createBrand";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machine_brand");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machine_brand");	
			} 	
		} 
		$this->template->load("admin/brand/create",$arrData);
	}
	public function update_brand($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/updateMachineBrand";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machine_brand");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machine_brand");	
			}			
		}
		$url = site_url()."/machine/api/findSingleMachineBrand/$id";
		$result =  apiCall($url, "get");
		$arrayData = [
			"result"=>$result['result'], 
			];
		$this->template->load("admin/brand/update",$arrayData);
	}		
/* =====================MACHINE Branch Model DETAILS======================= */
	/*master Machine Brand Model List 
			21/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	public function machine_brand_model() {
	 
		$url	= site_url()."machine/api/machineBrandModelList";
		$brandModelList = apiCall($url,"get");
	 
		$arrayData = [
			"brandModelList"=>$brandModelList['result'],  
		];		
		$this->template->load("admin/brand_model/list",$arrayData);
	}
	public function deleteMachineBrandModel($id) {  
		$url = site_url()."/machine/api/deleteMachineBrandModel/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."machine/admin/machine_brand_model");		
	}
	public function create_brandModel() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/createBrandModel";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machine_brand_model");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machine_brand_model");	
			} 	
		} 
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get");
		$arrayData = [
			"brandList"=>$brandList['result']['result'],  
		];	
		$this->template->load("admin/brand_model/create",$arrayData);
	}
	public function update_brandModel($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/updateMachineBrandModel";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machine_brand_model");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machine_brand_model");	
			}			
		}
		$url = site_url()."/machine/api/findSingleMachineBrandModel/$id";
		$result =  apiCall($url, "get");
		$url	= site_url()."machine/api/machineBrandList";
		$brandList = apiCall($url,"get");
		$arrayData = [
			"result"=>$result['result'],
			"brandList"=>$brandList['result']['result'],  			
			];
		$this->template->load("admin/brand_model/update",$arrayData);
	}
	/*master Machine Brand Model comment list
			21/4/2018
	 * @access public
	 * @param  
	 * @return array of post data
	 */
	 
	public function machineFinaceComment() {  
		 
		$url = site_url()."machine/api/machineContactRequestAdmin/"; 
		$machineContactRequest =  apiCall($url, "get"); 
		$arrayData = array(  "machineContactRequest"=>$machineContactRequest['result'] ); 
		
		$this->template->load("admin/machinelist",$arrayData);
	}
/**
	 * machine comment as per user List
		21/4/2018
	 * @access public
	 * @param   
	 * @return array of objects
	 */ 
	public function machinecomment($mcid) {  
		$user_id = $this->session->userdata('uid');
		if(isset($_POST['btnComment'])){
			$pageData = $this->input->post(); 
			$pageData['user_id'] = $user_id; 
			$pageData['machine_comment_id'] = $mcid; 
			$pageData['comment_date_time'] = date('Y-m-d H:i:s'); 
			$url = site_url()."machine/api/addMachineComment"; 
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgCommentSuccess", $response['message']); 
			}else{
				setFlash("dataMsgCommentError", $response['message']); 
			}
		}
		
		$url = site_url()."machine/api/machineCommentReplyList/$mcid"; 
		$machineCommentReplyList =  apiCall($url, "get"); 
		
		$arrayData = array(  "machineCommentReplyList"=>$machineCommentReplyList['result'] ); 
		$this->template->load("admin/machinecomment",$arrayData);
	}	
	/* public function videoRequests(){
		$url = site_url()."machine/api/findMultipleVideoRequest"; 
		$videoRequestList =  apiCall($url, "get"); 
		$arrayData = [
			"videoRequestList"=>$videoRequestList['result']
		];
		$this->template->load('admin/videoRequest',$arrayData);
	} */
	public function videoRequests(){
		  $url = site_url() . "customer/api/liveMachineDemoclassScheduleListConsultant/$mvr_id";
        $reqData = apiCall($url, "get");
		
		$arrayData = [
			"reqData"=>$reqData['result']
		];
		$this->template->load('admin/videoRequest',$arrayData);
	}
	public function assignSupplier($mvr_id){
		$url = site_url()."machine/api/findMultipleSupplier/";
		$supplier_user_list =  apiCall($url, "get");
		$arrayData = [
			"supplier_user_list"=>$supplier_user_list['result'],
			"mvr_id"=>$mvr_id
		];
		$this->template->load('admin/request_to_supplier',$arrayData);
	}
	/* 
		machine software List
		11/5/2018 
	 * @access public
	 * @param   
	 * @return array of objects
	*/
	public function machineSoftwareList(){
		$url = site_url()."machine/api/machineSoftwareList/";
		$softwareList =  apiCall($url, "get");
		$arrayData = [
			"softwareList"=>$softwareList['result']
		];
		$this->template->load('admin/software/list',$arrayData);
	}
	/* 
		machine software create
		11/5/2018 
	 * @access public
	 * @param   
	 * @return array of objects
	*/
	public function machineSoftwareCreate(){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/machineSoftwareCreate";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machineSoftwareList");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machineSoftwareList");	
			} 	
		} 
		
		$url= site_url()."machine/api/findMultipleMachineCat";
		$categoryList = apiCall($url,"get");
		$arrayData = [
			"categoryList"=>$categoryList['result'],  
		];
		$this->template->load('admin/software/create',$arrayData);
	}
	/* 
		machine software update
		11/5/2018
	 * @access public
	 * @param   
	 * @return array of objects
	*/
	public function machineSoftwareUpdate($ms_id){
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."machine/api/machineSoftwareUpdate";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."machine/admin/machineSoftwareList");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."machine/admin/machineSoftwareList");	
			} 	
		} 
		
		$url= site_url()."machine/api/findSingleMachineSoftware/$ms_id";
		$machine_data = apiCall($url,"get");
		$url= site_url()."machine/api/findMultipleMachineCat";
		$categoryList = apiCall($url,"get"); 
		
		$machine_category_id= $machine_data['result']['machine_category_id'];
	 	
		$url= site_url()."/machine/api/findMachineListCategory/$machine_category_id/blank";
		$machineList = apiCall($url,"post");
			
		$arrayData = [
			"categoryList"=>$categoryList['result'],  
			"machineList"=>$machineList['result'],  
			"machine_data"=>$machine_data['result'],  
		];
		$this->template->load('admin/software/update',$arrayData);
	}
	
	public function deleteMachineSoftware($id) {  
		$url = site_url()."/machine/api/deleteMachineSoftware/$id";
		$response =  apiCall($url, "get"); 
		
		setFlash("dataMsgSuccess",$response['message']);
		redirect(site_url()."machine/admin/machineSoftwareList");		
	} 
	/* Machine Time Study Request List */

/* Time Study Request */
	public function machineTimeStudyRequestAll() { 
		$url = site_url()."machine/api/machineTimeStudyRequestAll"; 
		$machineTimeStudy =  apiCall($url, "get"); 
		$arrayData = [ 
			"machineTimeStudy" => $machineTimeStudy['result'] , 
		]; 					
		$this->template->load('admin/machine/machineTimeStudyRequestAll',$arrayData);
	}
	public function ViewTimeStudyRequestDetails($id) {
        $url = site_url() . "/customer/api/machinTimeStudyRequestDetails/$id";
        $timeStudyReqDetails = apiCall($url, "get");
		$arrayData = array(
            "timeStudyReqDetails" => $timeStudyReqDetails['result'],
            "rfqID" => $id
        );
		$this->template->load('admin/machine/machineTimeStudyRequestDetails',$arrayData);
    }
	
/* Machine Finance Request List */
	public function machineFinanceRequestAll() { 
		$url = site_url()."machine/api/machineFinanceRequestAll"; 
		$machineFinance =  apiCall($url, "get"); 
		$arrayData = [ 
			"machineFinance" => $machineFinance['result'] , 
		]; 					
		$this->template->load('admin/machine/machineFinanceRequestAll',$arrayData);
	}
/* Machine RFQ */
	public function machineRfq() { 
		$url = site_url()."machine/api/machineRfqAll"; 
		$machineRfqAll =  apiCall($url, "get"); 
		$arrayData = [ 
			"machineRfqAll" => $machineRfqAll['result'] , 
		]; 					
		$this->template->load('admin/machine/machineRfqAll',$arrayData);
	}
/* On Demand Man RFQ  */
	public function onDemandManufacturingRfq() { 
		$url = site_url()."machine/api/onDemandManufacturingRfq"; 
		$data =  apiCall($url, "get"); 
		$arrayData = [ 
			"data" => $data['result'] , 
		]; 					
		$this->template->load('admin/machine/onDemandManufacturing',$arrayData);
	}
	public function viewOnDemandManufacturingDetails($id) {
        $url = site_url() . "/customer/api/onDemandManRfqDetails/$id";
        $rfqDetails = apiCall($url, "get");
	
		$arrayData = array(
            "rfqDetails" => $rfqDetails['result'],
            "rfqID" => $id
        );
		$this->template->load('admin/machine/onDemandDetails',$arrayData);
    }
	public function financeRequestForMaufacturing($rfq_id) {
        $url = site_url() . "/customer/api/financeRequestForMaufacturing/$rfq_id";
        $financeRfqDetails = apiCall($url, "get");
		$data = array(
            "financeRfqDetails" => $financeRfqDetails['result'],
            "rfqID" => $rfq_id
        );
		$this->template->load('admin/machine/onDemandRfqFinance',$data);
    }
	public function timeLineDetailsForMaufacturing($id) {
         $url = site_url() . "/customer/api/manufacturingTimeLineDetails/$id";
        $manufacturingRequestData = apiCall($url, "get");
		$arrayData = array(
            "manufacturingRequestData" => $manufacturingRequestData['result'],
            "rfqID" => $id
        );
        $this->template->load("admin/machine/onDemandTimeLineDetails", $arrayData);
		
    }
	
/* On Demand Prg RFQ  */
	public function onDemandProgrammingRfq() { 
		$url = site_url()."machine/api/onDemandProgrammingRfq"; 
		$data =  apiCall($url, "get"); 
		
		$arrayData = [ 
			"data" => $data['result'] , 
		]; 					
		$this->template->load('admin/machine/onDemandProgrammings',$arrayData);
	}
	public function viewOnDemandProgrammingDetails($id) {
        $url = site_url() . "/customer/api/onDemandPrgRfqDetails/$id";
        $rfqDetails = apiCall($url, "get");
	
		$arrayData = array(
            "rfqDetails" => $rfqDetails['result'],
            "rfqID" => $id
        );
		$this->template->load('admin/machine/onDemandDetailsPrg',$arrayData);
    }
	public function financeRequestForProgramming($rfq_id) {
        $url = site_url() . "/customer/api/financeRequestForProgramming/$rfq_id";
        $financeRfqDetails = apiCall($url, "get");
		$data = array(
            "financeRfqDetails" => $financeRfqDetails['result'],
            "rfqID" => $rfq_id
        );
		$this->template->load('admin/machine/onDemandRfqFinancePrg',$data);
    }
	public function timeLineDetailsForProgramming($id) {
         $url = site_url() . "/customer/api/programmingTimeLineDetails/$id";
        $manufacturingRequestData = apiCall($url, "get");
		
		$arrayData = array(
            "manufacturingRequestData" => $manufacturingRequestData['result'],
            "rfqID" => $id
        );
        $this->template->load("admin/machine/onDemandTimeLineDetailsPrg", $arrayData);
		
    }
/* On Rent */
	public function machineOnRentRequestList() { 
		$url = site_url()."machine/api/machineOnRentRequestList"; 
		$machineOnRentRequestList =  apiCall($url, "get"); 
		// print_r($machineOnRentRequestList);exit;
		$arrayData = [ 
			"machineOnRentRequestList" => $machineOnRentRequestList['result'] , 
		]; 					
		$this->template->load('admin/machine/machineOnRentRequestAll',$arrayData);
	}
	public function machineOnRentFinanceDetails($rfq_id) { 
		$url = site_url()."machine/api/machineOnRentFinanceDetails/$rfq_id"; 
		$machineFinance =  apiCall($url, "get");
		$arrayData = [ 
			"machineFinance" => $machineFinance['result'] , 
		]; 					
		$this->template->load('admin/machine/machineOnRentFinanceDetails',$arrayData);
	}
	public function insuranceDetailsOnRent($rfq_id) { 
		$url = site_url()."machine/api/insuranceDetailsOnRent/$rfq_id"; 
		$machineInsurance =  apiCall($url, "get");
		
		$url = site_url()."machine/api/insuranceMachineDetailsOnRent/$rfq_id"; 
		$machineDetailsInsurance =  apiCall($url, "get");
		
		$arrayData = [ 
			"machineInsurance" => $machineInsurance['result'] , 
			"machineDetailsInsurance" => $machineDetailsInsurance['result'] , 
		]; 					
		$this->template->load('admin/machine/machineOnRentInsuranceDetails',$arrayData);
	}
	public function timeLineDetailsOnRent($id) { 
		$url = site_url()."machine/api/machineOnRentRequestListSingle/$id"; 
		$machineOnRentRequestList =  apiCall($url, "get"); 
		$arrayData = [ 
			"machineOnRentRequestList" => $machineOnRentRequestList['result'] , 
		]; 					
		$this->template->load('admin/machine/machineOnRentRequestAllTimeline',$arrayData);
	}
	public function sendQuoteToCustomer($id) { 
	
	if (isset($_POST['btnSubmit'])) {
			$pageData = $this->input->post();
			$pageData['rfq_id'] = $id;
			$url = site_url() . "/customer/api/sendQuoteToCustomerOnRent/";
			$response = apiCall($url, "POST",$pageData);
			if ($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url() . "machine/admin/machineOnRentRequestList/$rfqID");
            } else {
				setFlash("dataMsgError", $response['message']);
				redirect(site_url() . "machine/admin/machineOnRentRequestList/$rfqID");
			 }
	    }
	
						
		$this->template->load('admin/machine/machineOnRentSendQuote',$arrayData);
	}
	
}
?>