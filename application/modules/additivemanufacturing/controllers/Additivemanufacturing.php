<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Additivemanufacturing extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
     $this->load->model('additivemanufacturing_model');
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

	
	
	public function additive_manufacturing()	{	


			if(isset($_POST['btnMachineVideo'])){
							//print_r("Hello");exit;
							$pageData = $this->input->post();  
							$pageData['customer_id']	= $this->session->userdata('uid');
							$pageData['requested_date']	= date('Y-m-d');;

							$url = site_url()."groupbuying/api/videoChatRequest"; 
							$response =  apiCall($url, "post",$pageData); 
							if($response['result']){
								setFlash("dataMsgSuccess", $response['message']);
								redirect(site_url()."additivemanufacturing/additive_manufacturing");	
							} 	
				} 
 
		$url = site_url()."additivemanufacturing/api/findMultipleAdditiveManufacturing";
		$additive_manufacturing_list =  apiCall($url, "get");
		//print_r($additive_manufacturing_list);exit;

		$url = site_url()."additivemanufacturing/api/findMultipleAdditiveManufacturingProcesses";
		$additive_manufacturing_processes_list =  apiCall($url, "get");
		
		$url = site_url()."additivemanufacturing/api/findMultiplePrintingMaterials3D";
		$printing_materials3D_list =  apiCall($url, "get");
		//print_r($printing_materials3D_list);exit;

		$url = site_url()."additivemanufacturing/api/findMultiplePrintingApplication";
		$additive_manufacturing_printing_application =  apiCall($url, "get");
		
		  $arrData=array(
		  	'additive_manufacturing_list'=>$additive_manufacturing_list['result'],
		  	'additive_manufacturing_processes_list'=>$additive_manufacturing_processes_list['result'],
		  	'printing_materials3D_list'=>$printing_materials3D_list['result'],
		  	'additive_manufacturing_printing_application'=>$additive_manufacturing_printing_application['result']);  

		// redirect to laser_processing
		$this->template->load("additive_manufacturing" ,$arrData);
	}

	
	public function additive_manufacturingRFQ() {   

	$url = site_url()."settings/materialtypeapi/findMultiple/";
	$material_list =  apiCall($url, "get");  

	$url = site_url()."settings/applicationrequiredapi/findMultiple/";
	$application_required =  apiCall($url, "get");  
	
		if(isset($_POST['btnRfq'])){ 
			$pageData = $this->input->post(); 
		//	print_r($pageData);exit;
			$pageData['material_type'] = implode(",",$pageData['material_type']);
			$pageData['application_required'] = implode(",",$pageData['application_required']);
			$pageData['customer_user_id']  = $this->session->userdata('uid'); 
			
			$url  = site_url()."additivemanufacturing/api/createRfq/";
			$response= apiCall($url,"POST",$pageData);
			// user call log
   		    $transaction_type =20;
            $this->user_log($transaction_type);
			if($response[response]){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."additivemanufacturing/additive_manufacturing");
			}else{
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."additivemanufacturing/additive_manufacturing");
			}
		}
	
		$arrayData  = [
				"material_list"=>$material_list['result'],
				"application_required"=>$application_required['result']
		
		];	
	
		$this->template->load("additive_manufacturingRFQ",$arrayData);
	}
        
            public function manufacturing_import() {
     
        if (isset($_POST["import"])) {
            $filename = $_FILES["file"]["tmp_name"];
            //$config['allowed_types'] = 'gif|jpg|jpeg|png|pdf|bmp';
          //$config['allowed_types'] = '*';
                 //echo"hi";die(); 
            if ($_FILES["file"]["size"] > 0) {
                $file = fopen($filename, "r");
                while (($importdata = fgetcsv($file, 10000, ",")) !== FALSE) {
                    $data = array(
                        'additive_manufacturing_id' => $importdata[1],
                        'additive_manufacturing_name' => $importdata[2],
                        'additive_manufacturing_description' => $importdata[3],
                        'additive_manufacturing_image' => $importdata[4]
                    );
//                     echo "<pre>";
//                      print_r($data);die; 
                    $insert = $this->additivemanufacturing_model->insertCSV($data);
                }
                fclose($file);
                $this->session->set_flashdata('message',
                        'Data are imported successfully..');
               	$this->template->load("additive_manufacturing");
 
            } else {
                $this->session->set_flashdata('message',
                        'Something went wrong..');
                $this->template->load("additive_manufacturing");
 
            }
        }
    }

    // user log 


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