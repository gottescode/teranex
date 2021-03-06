<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Machine extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
    }

    public function index() {
        $url = site_url() . "machine/api/findMultipleMachineCat";
        $machineCatList = apiCall($url, "get");

        $arrayData = array("categoryList" => $machineCatList['result']['result']);
        $this->template->load("index", $arrayData);
    }

    public function machineList($catId = 0, $machinUsed = 0) {
        if ($_POST['btnSearch'] == 'Search') {
            $pageData = $this->input->post();
            $catId = $pageData['machine_type'];
            $machinUsed = $pageData['used'];
        }
        $url = site_url() . "/machine/api/findMachineListCategory/$catId/$machinUsed";
        $machineList = apiCall($url, "post", $pageData);
        //print_r($machineList);exit;
        if (isset($_POST['searchName'])) {
            $pageData = $this->input->post();
            $url = site_url() . "/machine/api/findMachineListByName/$catId/$machinUsed";
            $machineList = apiCall($url, "post", $pageData);
            //$machineCounts = count($machineList['result']);
        }

        // $url = site_url()."/machine/api/findMachineListCategory/$catId/$machinUsed";
        // $machineList =  apiCall($url, "post",$pageData );


        $url = site_url() . "/machine/api/findMachineRecommendedListCategory/$catId/$machinUsed";
        $recommendedMachineList = apiCall($url, "get");

        $url = site_url() . "machine/api/findMultipleMachineCat";
        $machineCatList = apiCall($url, "get");


        $url = site_url() . "/machine/api/findCategoryCount/$catId/$machinUsed";
        $categoryCount = apiCall($url, "get");
		$this->load->model("location/country_model");

        $url = site_url() . "machine/api/machineBrandList";
        $brandList = apiCall($url, "get");

        $url = site_url() . "settings/languageapi/findMultiple/";
        $language_list = apiCall($url, "get");

        $arrayData = array("machineList" => $machineList['result'], "catId" => $catId, "categoryCount" => $categoryCount['result'], "categoryList" => $machineCatList['result'] ['result'], "countryList" => $this->country_model->getCountryListForSite(), "recommendedMachineList" => $recommendedMachineList['result'], "brandList" => $brandList['result']['result'], "language_list" => $language_list['result'], "machinUsed" => $machinUsed);

        $this->template->load("machines", $arrayData);
    }
	public function machineListNew($catId = 0, $machinUsed = 0) {
		$url = site_url() . "machine/api/findMultipleMachineCat";
        $machineCatList = apiCall($url, "get");
		if($catId==='machineList' AND $machinUsed==='machines'){
            $catsId = 12;
            $machinsUsed = 'new';
			
		}
		
		
		if ($_POST['btnSearch'] == 'Search') {
            $pageData = $this->input->post();
            $catId = $pageData['machine_type'];
            $machinUsed = $pageData['used'];
        }
        if ($_POST['normalSearch'] == 'Search') {
            $pageData = $this->input->post();
            $catId = $pageData['machine_type'];
            $machinUsed = $pageData['condition'];
        }
        if($catId==='machineList' AND $machinUsed==='machines'){
            $catsId = 12;
            $machinsUsed = 'used';
			$url = site_url() . "/machine/api/findMachineListCategory/$catsId/$machinsUsed";
			$machineList = apiCall($url, "post", $pageData);
			
		}else{
			$url = site_url() . "/machine/api/findMachineListCategory/$catId/$machinUsed";
			$machineList = apiCall($url, "post", $pageData);
        	
		}
		
		if (isset($_POST['searchName'])) {
            $pageData = $this->input->post();

            $url = site_url() . "/machine/api/findMachineListByName/$catId/$machinUsed";
            $machineList = apiCall($url, "post", $pageData);
			$catId='machineLists';
            //$machineCounts = count($machineList['result']);
			
		}
		if (isset($_POST['btnAdvanceSearch'])) {
            $pageData = $this->input->post();
			$catId = $pageData['machine_type'];
			if($pageData['condition']=='N'){
				$machinUsed = "used";
			}else{
			$machinUsed = "new";
				
			}
            $url = site_url() . "/machine/api/findMachineListByNameAdvance";
            $machineList = apiCall($url, "post", $pageData);
            //$machineCounts = count($machineList['result']);
        }

        // $url = site_url()."/machine/api/findMachineListCategory/$catId/$machinUsed";
        // $machineList =  apiCall($url, "post",$pageData );

    $url = site_url() . "machine/api/findMultipleMachineCat";
        $machineCatList = apiCall($url, "get");
		
        
		if($catId==='machineList' AND $machinUsed==='machines'){
            $catsId = 12;
            $machinsUsed = 'used';
			$url = site_url() . "/machine/api/findCategoryCount/$catsId/$machinsUsed";
			$categoryCount = apiCall($url, "get");
			$url = site_url() . "/machine/api/findMachineRecommendedListCategory/$catsId/$machinsUsed";
			$recommendedMachineList = apiCall($url, "get");
			
		}else{
			$url = site_url() . "/machine/api/findCategoryCount/$catId/$machinUsed";
			$categoryCount = apiCall($url, "get");
			$url = site_url() . "/machine/api/findMachineRecommendedListCategory/$catId/$machinUsed";
			$recommendedMachineList = apiCall($url, "get");
		}
		
        $this->load->model("location/country_model");

        $url = site_url() . "machine/api/machineBrandList";
        $brandList = apiCall($url, "get");

        $url = site_url() . "settings/languageapi/findMultiple/";
        $language_list = apiCall($url, "get");

        $arrayData = array(
							"machineList" => $machineList['result'], 
							"catId" => $catId,
							"categoryCount" => $categoryCount['result'], 
							"categoryList" => $machineCatList['result'] ['result'], 
							"countryList" => $this->country_model->getCountryListForSite(), 
							"recommendedMachineList" => $recommendedMachineList['result'], 
							"brandList" => $brandList['result']['result'], 
							"language_list" => $language_list['result'], 
							"machinUsed" => $machinUsed
							);

        $this->template->load("machinesNew", $arrayData);
    }

    public function compare_machine($catId = 0, $machinUsed = 0) {
        $data = $this->input->post();
        if (isset($_POST['btnEnquiry'])) {
            $pageData = $this->input->post();
            $url = site_url() . "machine/api/machineEnquiryRequest/";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", $response['message']);
                redirect("machine");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
                redirect("machine");
            }
        }
        $arrayData = [
            "data" => $data,
            "catId" => $catId,
            "automationUsed" => $machinUsed
        ];

        $this->template->load("compare_machine", $arrayData);
    }

    /* get single Machine details with multiple photo
      19/4/2018
     * @access public
     * @param  get machine Id
     * @return array   
     */

    public function machine_details($mid) {


        if (isset($_POST['btnRequest'])) {
            $pageData = $this->input->post();
            $user_id = $this->session->userdata('uid');
            $userType = $this->session->userdata('user_type');
            $pageData['customer_id'] = $user_id;
            $pageData['user_type'] = $userType;
            $url = site_url() . "machine/api/machineFinaceRequestInsert/";
            $pageData['machine_id'] = $mid;

            $response = apiCall($url, "post", $pageData);

            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", $response['message']);
                redirect("machine/machine/machine_details/$mid");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }
        }
        if (isset($_POST['btnRequestInsurance'])) {
            $pageData = $this->input->post();
            $user_id = $this->session->userdata('uid');
            $userType = $this->session->userdata('user_type');
            $pageData['customer_id'] = $user_id;
            $pageData['user_type'] = $userType;
            //print_r($pageData);exit;
            $url = site_url() . "machine/api/machineInsuranceRequestInsert/";
            $pageData['machine_id'] = $mid;
            $response = apiCall($url, "post", $pageData);
            
            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", $response['message']);
                redirect("machine/machine/machine_details/$mid");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }
        }
         if (isset($_POST['btnRequestTimeStudy'])) {
            $user_id = $this->session->userdata('uid');
            $userType = $this->session->userdata('user_type');
            //print_r($userType);exit;
            $pageData = $this->input->post();
            $pageData['machine_id'] = $mid;
            $pageData['customer_id'] = $user_id;
            $pageData['user_type'] = $userType;
            //print_r($pageData);exit;
            $url = site_url() . "machine/api/machineTimeStudyInsert/";
            $response = apiCall($url, "post", $pageData);
           // print_r( $response);exit;
            if ($response['result']) {
                setFlash("dataMsgEnquirySuccess", $response['message']);
                redirect("machine/machine/machine_details/$mid");
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
            }
        }
        if (isset($_POST['btnContactEnquiry'])) {
            $user_id = $this->session->userdata('uid');
            if ($user_id) {
                $pageData = $this->input->post();
                $url = site_url() . "machine/api/machineContactRequestInsert/";
                $pageData['user_id'] = $user_id;
                $pageData['machine_id'] = $mid;
                $response = apiCall($url, "post", $pageData);

                if ($response['result']) {
                    setFlash("dataMsgContactSuccess", $response['message']);
                } else {
                    setFlash("dataMsgContactError", $response['message']);
                }
            } else {
                redirect("pages/signIn");
            }
        }
        if (isset($_POST['btnMachineVideo'])) {
            $user_id = $this->session->userdata('uid');
            if ($user_id) {
                $pageData = $this->input->post();
                $url = site_url() . "machine/api/machineVideoRequestInsert/";
                $pageData['user_id'] = $user_id;
                $pageData['machine_id'] = $mid;
                $pageData['supplier_id'] =  $pageData['created_by'];
				if($pageData['created_by']){
					$pageData['supplier_status'] =  'A';
					
					$uid = $pageData['created_by'];
					$emailData = $this->db_lib->fetchSingle('master_user',' uid = '.$uid,'');
					$to = $emailData['u_email'];
					$body = '<p>Hello '.$emailData['u_name'] . ',</p> ';
					$body .= 'You Have New Request for Machine Demo.Please check the Dashboard..!!';
					$email_content = $body;
					$this->load->library('Email_PHPMailer'); 
					$subject = 'Book Live Demo';
					 $mailresponse = email_Send($subject, $to, $email_content,'');
				}
                $response = apiCall($url, "post", $pageData);
                if ($response['result']) {
                    setFlash("dataMsgEnquirySuccess", $response['message']);
                } else {
                    setFlash("dataMsgEnquirySuccess", $response['message']);
                }
            } else {
                redirect("pages/signIn");
            }
        }
        if (isset($_POST['btnEnquiry'])) {
            $user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
            $pageData['md_id'] = $mid;
            $pageData['compared_machine_ids'] = $mid;
            $pageData['u_id'] = $user_id;
            $url = site_url() . "machine/api/machineEnquiryRequest/";
            $response = apiCall($url, "post", $pageData);
            //print_r($response);exit;
            if ($response['result']) {
                $transaction_type=24;
                $this->user_log($transaction_type);   
                setFlash("dataMsgEnquirySuccess", $response['message']);
            } else {
                setFlash("dataMsgEnquiryError", $response['message']);
                //redirect("machine/machine_details/$mid");
            }
        }
        $url = site_url() . "machine/api/findSingleMachineDetailsFront/$mid";
        $machineDetails = apiCall($url, "get");
        $machine_software_list = explode( ",", $machineDetails['result']['machine_software_id']);

        
        //print_r($machine_software_list);die;

        $url = site_url() . "machine/api/findMultipleGalleryImages/$mid";
        $machineAllImages = apiCall($url, "get");
        
         
      
//        $url = site_url() . "machine/api/findUserProfileDetails/$user_id";
//        $UserProfileDetails = apiCall($url,"get",'',1);
        
      
        $url = site_url() . "machine/api/machineSoftwareList/$mid";
        $softwareList = apiCall($url, "get");

        $arrayData = array("machineID" => $mid, "machineDetails" => $machineDetails['result'], "machineAllImages" => $machineAllImages['result'],
            "softwareList" => $softwareList['result'],"UserProfileDetails"=>$UserProfileDetails['result'],
             "machine_software_list" => $machine_software_list);
       // print_r($arrayData);die;
        $this->template->load("machine_details", $arrayData);
    }

    public function softwarelist() {
        $this->template->load("softwarelist", $arrayData);
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
	
	/* New Code May2019*/
    public function time_study_request($machine_id,$supplier_id) {
		if(isset($_POST['submit'])) {
			$user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
			$pageData['customer_id'] = $user_id;
			$pageData['supplier_id'] = $supplier_id;
			$url = site_url()."machine/api/createTimeStudyRequest";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
			} else {
				setFlash("dataMsgSuccess", $response['message']);
			}
		}
        $this->template->load("time_study_request");
	}
	public function finance_request($machine_id,$supplier_id) {
		if(isset($_POST['submit'])) {
			$user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
			$pageData['customer_id'] = $user_id;
			$pageData['machine_id'] = $machine_id;
			$pageData['supplier_id'] = $supplier_id;
			$pageData['created_by'] = $user_id;
			$url = site_url()."machine/api/createFinanceRequest";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/finance_request/$machine_id/$supplier_id");
			} else {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/finance_request/$machine_id/$supplier_id");
			}
		}
        $this->template->load("finance_request");
	}
	public function machine_video_request_demo($mid,$supplier_id){
		if (isset($_POST['submit'])) {
             $user_id = $this->session->userdata('uid');
			 $user_id = $this->session->userdata('uid');
            if ($user_id) {
                $pageData = $this->input->post();
                $url = site_url() . "machine/api/machineVideoRequestInsertNew/";
                $pageData['user_id'] = $user_id;
                $pageData['machine_id'] = $mid;
                $pageData['supplier_id'] =  $supplier_id;
				/* if($supplier_id){
					$uid = $supplier_id;
					$emailData = $this->db_lib->fetchSingle('master_user',' uid = '.$uid,'');
					$to = $emailData['u_email'];
					$body = '<p>Hello '.$emailData['u_name'] . ',</p> ';
					$body .= 'You Have New Request for Machine Demo.Please check the Dashboard..!!';
					$email_content = $body;
					$this->load->library('Email_PHPMailer'); 
					$subject = 'Book Live Demo';
					$mailresponse = email_Send($subject, $to, $email_content,'');
				} */
                $response = apiCall($url, "post", $pageData);
				if ($response['result']) {
                    setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("machine/machine_video_request_demo/$mid/$supplier_id");
                } else {
                    setFlash("dataMsgEnquirySuccess", $response['message']);
					redirect("machine/machine_video_request_demo/$mid/$supplier_id");
                }
            } else {
                redirect("pages/signIn");
            }
      
		}
				$this->template->load("machine_video_request");
	}
	public function machine_rfq($machine_id,$supplier_id) {
		if(isset($_POST['submit'])) {
			$user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
			$pageData['customer_id'] = $user_id;
			$pageData['created_by'] = $user_id;
			$pageData['machine_id'] = $machine_id;
			$pageData['supplier_id'] = $supplier_id;
			$url = site_url()."machine/api/createMachineRfqRequest";
			$response =  apiCall($url, "post",$pageData);
			
			if($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/machine_rfq/$machine_id/$supplier_id");
			} else {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/machine_rfq/$machine_id/$supplier_id");
			}
		}
        $this->template->load("machine_rfq_request_form");
	}
	public function createonDemandManufacturingRequest($machine_id,$supplier_id) {
	
		
		if(isset($_POST['submit'])) {
			$user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
			$pageData['customer_id'] = $user_id;
			$pageData['created_by'] = $user_id;
			$pageData['machine_id'] = $machine_id;
			$pageData['supplier_id'] = $supplier_id;
			$url = site_url()."machine/api/createonDemandManufacturingRequest";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/createonDemandManufacturingRequest/$machine_id/$supplier_id");
			} else {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/createonDemandManufacturingRequest/$machine_id/$supplier_id");
			}
		}
        $this->template->load("onDemandManufacturingRequest",$arrayData);
	}
	public function createonDemandProgrammingRequest($machine_id,$supplier_id) {
		if(isset($_POST['submit'])) {
			$user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
			$pageData['customer_id'] = $user_id;
			$pageData['created_by'] = $user_id;
			$pageData['machine_id'] = $machine_id;
			$pageData['supplier_id'] = $supplier_id;
			$url = site_url()."machine/api/createonDemandProgrammingRequest";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/createonDemandProgrammingRequest/$machine_id/$supplier_id");
			} else {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/createonDemandProgrammingRequest/$machine_id/$supplier_id");
			}
		}
        $this->template->load("createonDemandProgrammingRequest",$arrayData);
	}
	public function createonRentRequest() {
		$url = site_url() . "/machine/api/machineTypeData";
        $machineTypeData = apiCall($url, "get");
		$url = site_url() . "/machine/api/serviceTypeData";
        $serviceData = apiCall($url, "get");
		$url = site_url() . "/machine/api/infrasturctureData";
        $infrastructureData = apiCall($url, "get");
		
		if(isset($_POST['submit'])) {
			$user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
			$pageData['customer_id'] = $user_id;
			$pageData['created_by'] = $user_id;
			$url = site_url()."machine/api/createonRentRequest";
			$response =  apiCall($url, "post",$pageData,1);
			print_r($response);exit;
			if($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/createonRentRequest/");
			} else {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/createonRentRequest/");
			}
		}
		$arrayData = [
            "machineTypeData" => $machineTypeData['result'],
            "serviceData" => $serviceData['result'],
            "infrastructureData" => $infrastructureData['result']
        ];
        $this->template->load("createonRentRequest",$arrayData);
	}
	public function talkwithexpert() {
		
		if(isset($_POST['btnsubmit'])) {
			$user_id = $this->session->userdata('uid');
            $pageData = $this->input->post();
			$pageData['customer_id'] = $user_id;
			$pageData['created_by'] = $user_id;
			$pageData['created_on'] = ;
			$pageData['technology_intrest'] = implode(', ',$pageData['technology_intrest']);
			$url = site_url()."settings/talkwithexpertapi/create";
			$response =  apiCall($url, "post",$pageData);
			if($response['result']) {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/talkwithexpert");
			} else {
				setFlash("dataMsgSuccess", $response['message']);
				redirect("machine/talkwithexpert");
			}
		}
		$this->template->load("talkwithexpert");
	}
	
}
