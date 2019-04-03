<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
    }

    public function index() {
        $url = site_url() . "remoteprogramming/api/findMultipleRequestList";
        $requestList = apiCall($url, "get");

        $arrayData = [
            "requestList" => $requestList
        ];
        //print_r($arrayData);die;
        $this->template->load("admin/list", $arrayData);
    }

    public function remoteprogrammingCategory() {
        $url = site_url() . "remoteprogramming/api/findMultipleCategory/";
        $category_list = apiCall($url, "get");
        //print_r($category_list);exit;
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "remoteprogramming/api/updatePublishCategory";
            $response = apiCall($url, "post", $pageData);
            if ($response) {
                setFlash("dataMsgSuccess", $response['message']);
            }
        }
        $arrData = array('category_list' => $category_list['result'],);
        //print_r($arrData);exit;
        $this->template->load("admin/category/list", $arrData);
    }

    public function createCategory() {
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            //print_r($pageData);exit;
            $url = site_url() . "remoteprogramming/api/createCategory";
            $response = apiCall($url, "post", $pageData);
            if ($response) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "remoteprogramming/admin/remoteprogrammingCategory");
            }
        }


        $this->template->load("admin/category/create", $arrData);
    }

    public function updateCategory($id) {
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "remoteprogramming/api/updateCategory";
            $response = apiCall($url, "post", $pageData);
            if ($response) {
                setFlash("dataMsgSuccess", $response['message']);
            }
            redirect(site_url() . "remoteprogramming/admin/remoteprogrammingCategory");
        }
        $url = site_url() . "/remoteprogramming/api/findSingleCategory/$id";
        $category_data = apiCall($url, "get");
        $arrayData = [
            "category_data" => $category_data['result'],
        ];
        $this->template->load("admin/category/update", $arrayData);
    }

    public function deleteCategory($id) {
        $url = site_url() . "/remoteprogramming/api/deleteCategory/$id";
        $response = apiCall($url, "get");
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url() . "remoteprogramming/admin/remoteprogrammingCategory");
    }

    /* Request To Programmer */

    public function request_to_programmer($rpr_id) {
        $url = site_url() . "remoteprogramming/api/findMultipleProgrammer/";
        $programmer_user_list = apiCall($url, "get");
        if (isset($_POST['btnSubmit'])) {
            $pageData = $this->input->post();
            $url = site_url() . "remoteprogramming/api/assignProgrammers";
            $response = apiCall($url, "post", $pageData);
            if ($response['result']) {
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url() . "remoteprogramming/admin/request_to_programmer/$rpr_id");
            } else {
                setFlash("dataMsgError", 'Something Went Wrong..!!');
                redirect(site_url() . "remoteprogramming/admin/request_to_programmer/$rpr_id");
            }
        }
        $arrayData = [
            "programmer_user_list" => $programmer_user_list['result'],
            "rpr_id" => $rpr_id
        ];
        $this->template->load("admin/request_to_programmer", $arrayData);
    }

    public function remote_program_req_suppliers($dmrID) {



        $url = site_url() . "/remoteprogramming/api/remote_program_req_suppliers/$dmrID";
        $requestList = apiCall($url, "get");
        //print_r($requestList);exit;
        $url = site_url() . "/remoteprogramming/api/remote_program_req_suppliers_list/$dmrID";
        $singleList = apiCall($url, "get");
        // print_r($singleList);exit;
        $arrayData = array(
            "requestList" => $requestList['result'],
            "singleList" => $singleList['result'],
        );
        //print_r($arrayData);exit;
        $this->template->load("admin/remote_prog_req_supplier_list", $arrayData);
    }

    // add quoation

    public function viewRemoteProgrammerSupplierQoute($drrs_id = 0) {
//echo $drrs_id;die;
        if (isset($_POST['btnRfqQuot'])) {
            $pageData = $this->input->post();
            
            //print_r($pageData);die;
            $url = site_url() . "/remoteprogramming/api/RemoteProgramSupplierListAcceptByadmin/";
            $requestSupplierList = apiCall($url, "post", $pageData);
         //  print_r($requestSupplierList);exit;

            redirect(site_url() . "remoteprogramming/admin/");
        }
        //Application List By Post Method

        $url = site_url() . "/remoteprogramming/api/findSingle_RemoteProgramming_quote_supplier/$drrs_id";
        $result = apiCall($url, "get");
      //  print_r($result);exit;
        $dmr_id=$result['result']['rpr_id'];
        $url = site_url() . "/remoteprogramming/api/remote_program_req_suppliers_list/$dmr_id";
        $singleList = apiCall($url, "get");
        // print_r($singleList);exit;
        $arrayData = array(
            "result" => $result['result'],
            "singleList" => $singleList['result']
        );
//print_r($arrayData);die;
        $this->template->load("admin/ViewRemoteProgramSupplierQuote", $arrayData);
    }
    
    

}

?>