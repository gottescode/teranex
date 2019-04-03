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

    public function saveChat() {
        $userID = $_POST['userId'];
        
       // echo $userID;die;        
        $admin_user = $_POST['admin_user'];
        if ($admin_user != '') 
        {
          $pageData['msg_from']=0;
          $pageData['msg_to']= $userID;
        }
       else 
       {
          $pageData['msg_from']=$userID;
          $pageData['msg_to']=0;
       }
       
       
        $referenceId = $_POST['machineId'];
        $type = $_POST['type'];

        //echo $userID.$referenceId.$type;die;
        $msg = $_POST['msg'];
        $url = site_url() . "machine/api/chatMsgInsert/";
    
        $pageData['type'] = $type;
        $pageData['reference_id'] = $referenceId;
        $pageData['admin_user'] = $admin_user;
        $pageData['message'] = $msg;
        $response = apiCall($url, "post", $pageData);

        if ($response['result']) {
            setFlash("dataMsgContactSuccess", $response['message']);
        } else {
            setFlash("dataMsgContactError", $response['message']);
        }
    }

    public function getChat() {
        $userID = $_POST['userId'];
        $referenceId = $_POST['machineId'];
        //$url = site_url()."machine/api/chatMsgHistory/"; 
        $pageData['msg_from'] = $userID;
        $pageData['msg_to'] = 0;
        $pageData['type'] = 1;
        $pageData['reference_id'] = $referenceId;
        $url = site_url() . "machine/api/chatMsgHistory/";
        $response = apiCall($url, "post", $pageData);
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function machine_details($mid) {


        if (isset($_POST['btnRequest'])) {
            $pageData = $this->input->post();

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

        $url = site_url() . "machine/api/findMultipleGalleryImages/$mid";
        $machineAllImages = apiCall($url, "get");
        
         
      
//        $url = site_url() . "machine/api/findUserProfileDetails/$user_id";
//        $UserProfileDetails = apiCall($url,"get",'',1);
        
      
        $url = site_url() . "machine/api/machineSoftwareList/$mid";
        $softwareList = apiCall($url, "get");

        $arrayData = array("machineID" => $mid, "machineDetails" => $machineDetails['result'], "machineAllImages" => $machineAllImages['result'],
            "softwareList" => $softwareList['result'],"UserProfileDetails"=>$UserProfileDetails['result']);
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

}
