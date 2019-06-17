<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Digitalmanufacturing extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model('digitalmanufacturing_Model');
        //$this->load->model("pages_model");
    }
	public function index(){ 
		$arrData=array( 
		); 
		$this->template->load("index",$arrData);
	}
	public function about()	{	 
		// redirect to about
		$this->template->load("about" );
	}
	public function contact()	{	 
		// redirect to contact
		$this->template->load("contact" );
	}
	public function disclaimer()	{	 
		// redirect to disclaimer
		$this->template->load("disclaimer" );
	}
	public function privacy_statement()	{	 
		// redirect to privacy_statement
		$this->template->load("privacy_statement" );
	}
	public function refund_policy()	{	 
		// redirect to refundPolicy
		$this->template->load("refund_policy" );
	}
	public function terms_conditions()	{	 
		// redirect to terms_conditions
		$this->template->load("terms_conditions" );
	}
	public function terms_of_use()	{	 
		// redirect to terms_of_use
		$this->template->load("terms_of_use" );
	}
	public function media()	{	 
		// redirect to media
		$this->template->load("media" );
	}
	public function join_our_forum()	{	 
		// redirect to join_our_forum
		$this->template->load("join_our_forum" );
	}
	public function site_map()	{	 
		// redirect to site_map
		$this->template->load("site_map" );
	}
	public function remote_programming()	{	 
		// redirect to remote_programming
		$this->template->load("remote_programming" );
	}
	public function contact_manufacturing()	{	

	    $url = site_url()."digitalmanufacturing/api/findMultipleCategory/";
		$digitalmanufacturing_list =  apiCall($url, "get");
		//print_r($digitalmanufacturing_list);exit;
		$arrData=array('digitalmanufacturing_list'=>$digitalmanufacturing_list['result']); 
		//print_r($arrayData);exit;
		// redirect to contact_manufacturing
		$this->template->load("contact_manufacturing",$arrData);
	}
	
	public function additive_manufacturing($amid)	{	
		$url = site_url()."digitalmanufacturing/api/findMultipleAdditiveManufacturing/$amid";
		$additive_manufacturing_list =  apiCall($url, "get");
		 
		$url = site_url()."digitalmanufacturing/api/findMultipleAdditiveManufacturingProcesses/$amid";
		$additive_manufacturing_processes_list =  apiCall($url, "get");
		//print_r($additive_manufacturing_processes_list);exit;
		$url = site_url()."digitalmanufacturing/api/findMultiplePrintingMaterials3D/$amid";
		$printing_materials3D_list =  apiCall($url, "get");
		//print_r($printing_materials3D_list);exit;
		$url = site_url()."digitalmanufacturing/api/findMultiplePrintingApplication/$amid";
		$printing_application_list =  apiCall($url, "get");
		//print_r($printing_application_list);exit;
		  $arrData=array('additive_manufacturing_list'=>$additive_manufacturing_list['result'],'additive_manufacturing_processes_list'=>$additive_manufacturing_processes_list['result'],'printing_materials3D_list'=>$printing_materials3D_list['result'],'printing_application_list'=>$printing_application_list['result']);  

		// redirect to additive_manufacturing
		$this->template->load("additive_manufacturing",$arrData );
	}
	public function laser_processing($amid)	{	 
		$url = site_url()."digitalmanufacturing/api/findMultipleAdditiveManufacturing/$amid";
		$additive_manufacturing_list =  apiCall($url, "get");
		 //print_r($additive_manufacturing_list);exit;
		
		$url = site_url()."digitalmanufacturing/api/findMultiplePrintingMaterials3D/$amid";
		$printing_materials3D_list =  apiCall($url, "get");
		//print_r($printing_materials3D_list);exit;
		
		  $arrData=array('additive_manufacturing_list'=>$additive_manufacturing_list['result'],'printing_materials3D_list'=>$printing_materials3D_list['result']);  

		// redirect to laser_processing
		$this->template->load("laser_processing" ,$arrData);
	}
	public function rapid_prototyping($amid)	{	 
		// redirect to rapid_prototyping

		$url = site_url()."digitalmanufacturing/api/findMultiplePrintingMaterials3D/$amid";
		$printing_materials3D_list =  apiCall($url, "get");
		//print_r($printing_materials3D_list);exit;
		 $arrData=array('printing_materials3D_list'=>$printing_materials3D_list['result']); 

		$this->template->load("rapid_prototyping", $arrData);
	}

	public function contact_manufacturingRFQ() {   

	$url = site_url()."settings/materialtypeapi/findMultiple/";
	$material_list =  apiCall($url, "get");  

	$url = site_url()."settings/applicationrequiredapi/findMultiple/";
	$application_required =  apiCall($url, "get");  
	
		if(isset($_POST['btnRfq'])){ 
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$pageData['material_type'] = implode(",",$pageData['material_type']);
			$pageData['application_required'] = implode(",",$pageData['application_required']);
			$pageData['customer_user_id']  = $this->session->userdata('uid'); 
			
			$url  = site_url()."digitalmanufacturing/api/createRfq/";
			$response= apiCall($url,"POST",$pageData);

			if($response[response]){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/contact_manufacturing");
			}else{
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."digitalmanufacturing/contact_manufacturing");
			}
		}
	
		$arrayData  = [
				"material_list"=>$material_list['result'],
				"application_required"=>$application_required['result']
		
		];	
	
		$this->template->load("contact_manufacturingRFQ",$arrayData);
	}
	
}