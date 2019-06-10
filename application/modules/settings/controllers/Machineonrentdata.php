<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Machineonrentdata extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function machineType() {
	 	$url = site_url()."settings/machineonrentapi/findMultiple/";
		$material_list =  apiCall($url, "get");  
		 
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("machineonrent/machinetype/list",$arrData);
	}
	public function createMachine() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/create"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineType");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineType");	
			}	
		} 
		 
	
		$this->template->load("machineonrent/machinetype/create");
	}
	public function updateMachine($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/update";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/machineonrentdata/machineType");			
		}
		$url = site_url()."settings/machineonrentapi/findSingle/$id";
		$type_data =  apiCall($url, "get");
		$url = site_url()."settings/machineonrentapi/findMultipleParent/";
		$type_list =  apiCall($url, "get");  
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("machineonrent/machinetype/update",$arrayData);
	}
	public function deletetypeMachine($id) {  
		$url = site_url()."settings/machineonrentapi/deletetype/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineonrentdata/machineType");		
	} 
/* Service Data */
	public function serviceType() {
	 	$url = site_url()."settings/machineonrentapi/findMultipleService/";
		$material_list =  apiCall($url, "get");  
		 
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("machineonrent/machineservicetype/list",$arrData);
	}
	public function createMachineService() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/createService"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/serviceType");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentdata/serviceType");	
			}	
		} 
		 
	
		$this->template->load("machineonrent/machineservicetype/create");
	}
	public function updateMachineService($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/updateService";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/machineonrentdata/serviceType");			
		}
		$url = site_url()."settings/machineonrentapi/findSingleService/$id";
		$type_data =  apiCall($url, "get");
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("machineonrent/machineservicetype/update",$arrayData);
	}
	public function deletetypeMachineService($id) {  
		$url = site_url()."settings/machineonrentapi/deletetypeService/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineonrentdata/serviceType");		
	} 
/* Infrastructure Data */
	public function infrastructureType() {
	 	$url = site_url()."settings/machineonrentapi/findMultipleInfra/";
		$material_list =  apiCall($url, "get");  
		 
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("machineonrent/machineinfratype/list",$arrData);
	}
	public function createMachineInfra() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/createInfra"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/infrastructureType");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentdata/infrastructureType");	
			}	
		} 
		 
	
		$this->template->load("machineonrent/machineinfratype/create");
	}
	public function updateMachineInfra($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/updateInfra";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/machineonrentdata/infrastructureType");			
		}
		$url = site_url()."settings/machineonrentapi/findSingleInfra/$id";
		$type_data =  apiCall($url, "get");
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("machineonrent/machineinfratype/update",$arrayData);
	}
	public function deletetypeMachineInfra($id) {  
		$url = site_url()."settings/machineonrentapi/deletetypeInfra/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineonrentdata/infrastructureType");		
	} 

	/* FrontEnd Data	*/
	
	public function frontEndData() {
	 	$url = site_url()."settings/machineonrentapi/findMultipleFront/";
		$data =  apiCall($url, "get"); 
		/* FrontEND API */
		
		/* FirstBlock */
		$from = 1;
		$to = 6;
		$url = site_url()."settings/machineonrentapi/findMultipleFrontEnd/$from/$to";
		$FirstBlockdata =  apiCall($url, "get"); 
		
		/* Second */
		$from = 7;
		$to = 10;
		$url = site_url()."settings/machineonrentapi/findMultipleFrontEnd/$from/$to";
		$secondBlockdata =  apiCall($url, "get"); 
		
		/* ThirdBlock */
		$from = 11;
		$to = 14;
		$url = site_url()."settings/machineonrentapi/findMultipleFrontEnd/$from/$to";
		$thirdBlockdata =  apiCall($url, "get"); 
		
		$arrData = array('data' =>$data['result']);
		$this->template->load("machineonrent/machineonrentfrontend/list",$arrData);
	}
	
	public function createfrontEndData() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/createFront"; 
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/frontEndData");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentfrontend/frontEndData");	
			}	
		} 
		 
	
		$this->template->load("machineonrent/machineonrentfrontend/create");
	}
	public function updatefrontEndData($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/updateFront";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/frontEndData");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentfrontend/frontEndData");	
			}
		}
		$url = site_url()."settings/machineonrentapi/findSingleFront/$id";
		$updateData =  apiCall($url, "get");
		$arrayData = [
			"updateData"=>$updateData['result'] 
		];
		$this->template->load("machineonrent/machineonrentfrontend/update",$arrayData);
	}
	
	public function deleteFront($id) {  
		$url = site_url()."settings/machineonrentapi/deleteFront/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineonrentdata/frontEndData");		
	}
	
	public function frontEndDataSoftware() {
		
		/* Front END API

		$url = site_url()."settings/machineonrentapi/findMultipleFrontSoftware/";
		$frontendSoftwaredata =  apiCall($url, "get"); 
		

		*/
	 	$url = site_url()."settings/machineonrentapi/findMultipleFrontSoftware/";
		$data =  apiCall($url, "get"); 
		
		$arrData = array('data' =>$data['result']);
		$this->template->load("machineonrent/machineonrentfrontendSoftware/list",$arrData);
	}
	
	public function createfrontEndDataSoftware() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/createFrontSoftware"; 
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/frontEndDataSoftware");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentfrontend/frontEndDataSoftware");	
			}	
		} 
		 
	
		$this->template->load("machineonrent/machineonrentfrontendSoftware/create");
	}
	public function updatefrontEndDataSoftware($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/updateFrontSoftware";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/frontEndDataSoftware");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentfrontend/frontEndDataSoftware");	
			}
		}
		$url = site_url()."settings/machineonrentapi/findSingleFrontSoftware/$id";
		$updateData =  apiCall($url, "get");
		$arrayData = [
			"updateData"=>$updateData['result'] 
		];
		$this->template->load("machineonrent/machineonrentfrontendSoftware/update",$arrayData);
	}
	
	public function deleteFrontSoftware($id) {  
		$url = site_url()."settings/machineonrentapi/deleteFrontSoftware/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineonrentdata/frontEndDataSoftware");		
	}
	
/* Machine On rent Block data */
	public function machineOnRentCatData() {
		/* Front END Machine On Rent Category Data
			$url = site_url()."settings/machineonrentapi/findMultipleMachineOnrentCat/";
			$material_list =  apiCall($url, "get"); 
		*/
		
		$url = site_url()."settings/machineonrentapi/findMultipleMachineOnrentCat/";
		$material_list =  apiCall($url, "get");  
		 
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("machineonrent/machineMachineOnrentCat/list",$arrData);
	}
	public function createmachineOnRentCatData() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/createMachineOnrentCat"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineOnRentCatData");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineOnRentCatData");	
			}	
		} 
		 
	
		$this->template->load("machineonrent/machineMachineOnrentCat/create");
	}
	public function updatemachineOnRentCatData($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/updateMachineOnrentCat";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/machineonrentdata/machineOnRentCatData");			
		}
		$url = site_url()."settings/machineonrentapi/findSingleMachineOnrentCat/$id";
		$type_data =  apiCall($url, "get");
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("machineonrent/machineMachineOnrentCat/update",$arrayData);
	}
	public function deletemachineOnRentCatData($id) {  
		$url = site_url()."settings/machineonrentapi/deleteMachineOnrentCat/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineonrentdata/machineOnRentCatData");		
	} 

	public function machineOnRentCatDataSub($cat_id) {
		
		/* Front End API Pass categoryid 
			$url = site_url()."settings/machineonrentapi/findMultipleFrontSubCatrgory/$cat_id";
			$sub_data =  apiCall($url, "get"); 
		*/
		
		/* Machine Sucateogry Data */
		$url = site_url()."settings/machineonrentapi/findMultipleFrontSubCatrgory/$cat_id";
		$data =  apiCall($url, "get"); 
		
		$data['cat_id'] = $cat_id;
		$arrData = array('data' =>$data['result'],"cat_id"=>$cat_id);
		$this->template->load("machineonrent/machineonrentfrontendSubdata/list",$arrData);
	}
	public function createmachineOnRentCatDataSub($cat_id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$pageData['cat_id'] = $cat_id;
			$url = site_url()."settings/machineonrentapi/createFrontSubCatrgory"; 
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineOnRentCatDataSub/$cat_id");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineOnRentCatDataSub/$cat_id");	
			}	
		} 
		 $arrayData = [
				'cat_id' => $cat_id
			];
	
		$this->template->load("machineonrent/machineonrentfrontendSubdata/create",$arrayData);
	}
	public function updatemachineOnRentCatDataSub($cat_id,$id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineonrentapi/updateFrontSubCatrgory";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineOnRentCatDataSub/$cat_id/$id");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentdata/machineOnRentCatDataSub/$cat_id/$id");
			}
		}
		$url = site_url()."settings/machineonrentapi/findSingleFrontSubCatrgory/$id";
		$updateData =  apiCall($url, "get");
		
		$arrayData = [
			"updateData"=>$updateData['result'] 
		];
		$this->template->load("machineonrent/machineonrentfrontendSubdata/update",$arrayData);
	}
	public function deletemachineOnRentCatDataSub($cat_id,$id) {  
		$url = site_url()."settings/machineonrentapi/deleteFrontSubCatrgory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineonrentdata/machineOnRentCatDataSub/$cat_id");
	}
	
}

?>
