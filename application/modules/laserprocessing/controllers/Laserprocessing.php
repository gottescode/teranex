<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Laserprocessing extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		//$this->load->model('additivemanufacturing_Model');
        //$this->load->model("pages_model");
    }
	public function index(){ 
		$arrData=array( 
		); 
		$this->template->load("index",$arrData);
	}
	public function remote_programming()	{	 
		// redirect to remote_programming
		$this->template->load("remote_programming" );
	}
	public function laser_processing()	{	

	
		$url = site_url()."laserprocessing/api/findMultipleLaserProcessing";
		$laser_processing_list =  apiCall($url, "get");
		// print_r($laser_processing_list);exit;

		$url = site_url()."laserprocessing/api/findMultipleLaserProcessingMaterial";
		$laser_processing_material_list =  apiCall($url, "get");
		 //print_r($laser_processing_material_list);exit;
		  $arrData=array(
		  	'laser_processing_list'=>$laser_processing_list['result'],
		  	'laser_processing_material_list'=>$laser_processing_material_list['result']);  

		// redirect to laser_processing
		$this->template->load("laser_processing" ,$arrData);
	}

	public function laser_processingRFQ() {   

	$url = site_url()."settings/materialtypeapi/findMultiple/";
	$material_list =  apiCall($url, "get");  

	$url = site_url()."settings/applicationrequiredapi/findMultiple/";
	$application_required =  apiCall($url, "get");  
	
		if(isset($_POST['btnRfq'])){ 
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$user_type=$this->session->userdata('user_type');
			$pageData['user_type']=$user_type;
			$pageData['material_type'] = implode(",",$pageData['material_type']);
			$pageData['application_required'] = implode(",",$pageData['application_required']);
			$pageData['customer_user_id']  = $this->session->userdata('uid'); 
	
                   //  print_r($pageData);die;
			$url  = site_url()."laserprocessing/api/createRfq/";
			$response= apiCall($url,"POST",$pageData);

			if($response[response]){
                            
	                 $transaction_type = 21;
                         $this->user_log($transaction_type);	
          
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."laserprocessing/sheetmetal_processing");
			}else{
				setFlash("ErrorMsg", $response['message']);
				redirect(site_url()."laserprocessing/sheetmetal_processing");
			}
		}
	
		$arrayData  = [
				"material_list"=>$material_list['result'],
				"application_required"=>$application_required['result']
		
		];	
	
		$this->template->load("laser_processingRFQ",$arrayData);
	}
	public function sheetmetal_processing()	{	

	if(isset($_POST['btnMachineVideo'])){
							//print_r("Hello");exit;
							$pageData = $this->input->post();  
							$pageData['customer_id']	= $this->session->userdata('uid');
							$pageData['requested_date']	= date('Y-m-d');;

							$url = site_url()."groupbuying/api/videoChatRequest"; 
							$response =  apiCall($url, "post",$pageData); 
							if($response['result']){
								setFlash("dataMsgSuccess", $response['message']);
								redirect(site_url()."laserprocessing/laser_processing");	
							} 	
				}   
		// redirect to remote_programming
		$this->template->load("sheetmetal_processing" );
	}


	public function user_log($data) {
        //  echo 'hi';die;
        //print_r($data);die;
        $pageData['transaction_type'] = $data;
        $pageData['uid'] = $this->session->userdata('uid');

        //print_r($pageData);die;
        $url = site_url() . "/customer/api/insertUserLog";
        $response = apiCall($url, "post", $pageData);
        //print_r($response);die;
    }
	
}