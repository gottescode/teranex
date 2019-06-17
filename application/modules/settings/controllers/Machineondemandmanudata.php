<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Machineondemandmanudata extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }
	/* FrontEnd Data	*/
	public function frontEndData() {
	 	$url = site_url()."settings/machineondemandmanuapi/findMultipleFront/";
		$data =  apiCall($url, "get"); 
		
		/* FrontEND API */
		
		/* FirstBlock Better, Faster, Cheaper With CloudMachines*/
		$from = 1;
		$to = 4;
		$url = site_url()."settings/machineondemandmanuapi/findMultipleFrontEnd/$from/$to";
		$FirstBlockdata =  apiCall($url, "get"); 
		
		/* Second The Easy And Fast Way To Start Manufacturing */
		$from = 7;
		$to = 10;
		$url = site_url()."settings/machineondemandmanuapi/findMultipleFrontEnd/$from/$to";
		$secondBlockdata =  apiCall($url, "get"); 
		
		/* ThirdBlock Our Manufacturing Capabilities*/
		$from = 11;
		$to = 13;
		$url = site_url()."settings/machineondemandmanuapi/findMultipleFrontEnd/$from/$to";
		$thirdBlockdata =  apiCall($url, "get"); 
		//strhtmldecode($thirdBlockdata['description'])
		
		$arrData = array('data' =>$data['result']);
		$this->template->load("machineondemandmanu/machineonrentfrontend/list",$arrData);
	}
	public function createfrontEndData() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineondemandmanuapi/createFront"; 
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/frontEndData");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentfrontend/frontEndData");	
			}	
		} 
		 
	
		$this->template->load("machineondemandmanu/machineonrentfrontend/create");
	}
	public function updatefrontEndData($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
 
			$url = site_url()."settings/machineondemandmanuapi/updateFront";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/frontEndData");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentfrontend/frontEndData");	
			}
		}
		$url = site_url()."settings/machineondemandmanuapi/findSingleFront/$id";
		$updateData =  apiCall($url, "get");
		$arrayData = [
			"updateData"=>$updateData['result'] 
		];
		$this->template->load("machineondemandmanu/machineonrentfrontend/update",$arrayData);
	}
	public function deleteFront($id) {  
		$url = site_url()."settings/machineondemandmanuapi/deleteFront/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineondemandmanudata/frontEndData");		
	}
	
	public function frontEndDataSoftware() {
		
		/* Front END API

		$url = site_url()."settings/machineondemandmanuapi/findMultipleFrontSoftware/";
		$frontendSoftwaredata =  apiCall($url, "get"); 
		

		*/
	 	$url = site_url()."settings/machineondemandmanuapi/findMultipleFrontSoftware/";
		$data =  apiCall($url, "get"); 
		
		$arrData = array('data' =>$data['result']);
		$this->template->load("machineondemandmanu/machineonrentfrontendSoftware/list",$arrData);
	}
	public function createfrontEndDataSoftware() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineondemandmanuapi/createFrontSoftware"; 
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/frontEndDataSoftware");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/frontEndDataSoftware");	
			}	
		} 
		 
	
		$this->template->load("machineondemandmanu/machineonrentfrontendSoftware/create");
	}
	public function updatefrontEndDataSoftware($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineondemandmanuapi/updateFrontSoftware";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/frontEndDataSoftware");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineonrentfrontend/frontEndDataSoftware");	
			}
		}
		$url = site_url()."settings/machineondemandmanuapi/findSingleFrontSoftware/$id";
		$updateData =  apiCall($url, "get");
		$arrayData = [
			"updateData"=>$updateData['result'] 
		];
		$this->template->load("machineondemandmanu/machineonrentfrontendSoftware/update",$arrayData);
	}
	public function deleteFrontSoftware($id) {  
		$url = site_url()."settings/machineondemandmanuapi/deleteFrontSoftware/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineondemandmanudata/frontEndDataSoftware");		
	}
	
/* Machine On Demand Block data */
	public function machineOnRentCatData() {
		/* Front END Machine On Rent Category Data
			$url = site_url()."settings/machineondemandmanuapi/findMultipleMachineOnrentCat/";
			$material_list =  apiCall($url, "get"); 
		*/
		
		$url = site_url()."settings/machineondemandmanuapi/findMultipleMachineOnrentCat/";
		$material_list =  apiCall($url, "get");  
		
		$arrData = array('material_list' =>$material_list['result'] , );
		$this->template->load("machineondemandmanu/machineMachineOnrentCat/list",$arrData);
	}
	public function createmachineOnRentCatData() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineondemandmanuapi/createMachineOnrentCat"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/machineOnRentCatData");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/machineOnRentCatData");	
			}	
		} 
		 
	
		$this->template->load("machineondemandmanu/machineMachineOnrentCat/create");
	}
	public function updatemachineOnRentCatData($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineondemandmanuapi/updateMachineOnrentCat";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."settings/machineondemandmanudata/machineOnRentCatData");			
		}
		$url = site_url()."settings/machineondemandmanuapi/findSinglemachineondemandmanuCat/$id";
		$type_data =  apiCall($url, "get");
		$arrayData = [
			"type_data"=>$type_data['result'], 
			"type_list"=>$type_list['result'], 
		];
		$this->template->load("machineondemandmanu/machineMachineOnrentCat/update",$arrayData);
	}
	public function deletemachineOnRentCatData($id) {  
		$url = site_url()."settings/machineondemandmanuapi/deleteMachineOnrentCat/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineondemandmanudata/machineOnRentCatData");		
	} 

	public function machineOnRentCatDataSub($cat_id) {
		
		/* Front End API Pass categoryid 
			$url = site_url()."settings/machineondemandmanuapi/findMultipleFrontSubCatrgory/$cat_id";
			$sub_data =  apiCall($url, "get"); 
		*/
		
		/* Machine Sucateogry Data */
		$url = site_url()."settings/machineondemandmanuapi/findMultipleFrontSubCatrgory/$cat_id";
		$data =  apiCall($url, "get"); 
		
		$data['cat_id'] = $cat_id;
		$arrData = array('data' =>$data['result'],"cat_id"=>$cat_id);
		$this->template->load("machineondemandmanu/machineonrentfrontendSubdata/list",$arrData);
	}
	public function createmachineOnRentCatDataSub($cat_id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$pageData['cat_id'] = $cat_id;
			$url = site_url()."settings/machineondemandmanuapi/createFrontSubCatrgory"; 
			$response =  apiCall($url, "post",$pageData);
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/machineondemandmanuCatDataSub/$cat_id");	
			}
			else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/machineondemandmanuCatDataSub/$cat_id");	
			}	
		} 
		 $arrayData = [
				'cat_id' => $cat_id
			];
	
		$this->template->load("machineondemandmanu/machineonrentfrontendSubdata/create",$arrayData);
	}
	public function updatemachineOnRentCatDataSub($cat_id,$id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."settings/machineondemandmanuapi/updateFrontSubCatrgory";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/machineOnRentCatDataSub/$cat_id/$id");	
			}else{
				setFlash("dataMsgError", $response['message']);
				redirect(site_url()."settings/machineondemandmanudata/machineOnRentCatDataSub/$cat_id/$id");
			}
		}
		$url = site_url()."settings/machineondemandmanuapi/findSingleFrontSubCatrgory/$id";
		$updateData =  apiCall($url, "get");
		
		$arrayData = [
			"updateData"=>$updateData['result'] 
		];
		$this->template->load("machineondemandmanu/machineonrentfrontendSubdata/update",$arrayData);
	}
	public function deletemachineOnRentCatDataSub($cat_id,$id) {  
		$url = site_url()."settings/machineondemandmanuapi/deleteFrontSubCatrgory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."settings/machineondemandmanudata/machineOnRentCatDataSub/$cat_id");
	}
	
}

?>
