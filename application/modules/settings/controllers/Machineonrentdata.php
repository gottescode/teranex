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
		$to = 8;
		$url = site_url()."settings/machineonrentapi/findMultipleFrontEnd/$from/$to";
		$secondBlockdata =  apiCall($url, "get"); 
		
		/* ThirdBlock */
		$from = 9;
		$to = 11;
		$url = site_url()."settings/machineonrentapi/findMultipleFrontEnd/$from/$to";
		$thirdBlockdata =  apiCall($url, "get"); 
		
		/* FourthBlock */
		$from = 12;
		$to = 15;
		$url = site_url()."settings/machineonrentapi/findMultipleFrontEnd/$from/$to";
		$fourthBlockdata =  apiCall($url, "get"); 
		
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
	
}

?>
