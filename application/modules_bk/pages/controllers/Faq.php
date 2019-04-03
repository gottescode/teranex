<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Faq extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

    public function index(){ 
        
        $url = site_url()."pages/api/findMultipleFaq";
        $faq_list =  apiCall($url, "get"); 
        //print_r($faq_list);exit;
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post();
           // print_r($pageData);exit;
            $url = site_url()."pages/api/updatePublishFaq";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }  
        }
    
        $arrData = array('faq_list' =>$faq_list['result'] , );
        //print_r($arrData);exit;
        $this->template->load("pages/admin/faq/list",$arrData);
    }

        /* Team Member Add / Insert / Update */
  
    public function createFaq() {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            //print_r($pageData);exit;
            $url = site_url()."pages/api/createFaq"; 
            $response =  apiCall($url, "post",$pageData); 
           // print_r($response);exit;
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url()."pages/faq");   
            }   
        } 
        

        $this->template->load("pages/admin/faq/create",$arrData);
    }
    public function updateFaq($id) {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            $url = site_url()."pages/api/updateFaq";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }
            redirect(site_url()."pages/faq");           
        }
        $url = site_url()."/pages/api/findSingleFaq/$id";
        $faq_data =  apiCall($url, "get"); 
        $arrayData = [
            "faq_data"=>$faq_data['result'], 
            ];
        $this->template->load("pages/admin/faq/update",$arrayData);
    }
    public function deleteFaq($id) {  
        $url = site_url()."/pages/api/deleteFaq/$id";
        $response =  apiCall($url, "get"); 
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url()."pages/faq");       
    }


}