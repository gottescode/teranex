<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Team extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index(){ 
		
        $url = site_url()."pages/api/findMultipleTeam";
        $team_list =  apiCall($url, "get"); 
        //print_r($team_list);exit;
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post();
           // print_r($pageData);exit;
            $url = site_url()."pages/api/updatePublishTeam";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }  
        }
    
        $arrData = array('team_list' =>$team_list['result'] , );
        //print_r($arrData);exit;
        $this->template->load("pages/admin/team/list",$arrData);
	}

        /* Team Member Add / Insert / Update */
  
    public function createTeam() {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            //print_r($pageData);exit;
            $url = site_url()."pages/api/createTeam"; 
            $response =  apiCall($url, "post",$pageData); 
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url()."pages/team");   
            }   
        } 
        

        $this->template->load("pages/admin/team/create",$arrData);
    }
    public function updateTeam($id) {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            $url = site_url()."pages/api/updateTeam";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }
            redirect(site_url()."pages/team");           
        }
        $url = site_url()."/pages/api/findSingleTeam/$id";
        $team_data =  apiCall($url, "get"); 
        $arrayData = [
            "team_data"=>$team_data['result'], 
            ];
        $this->template->load("pages/admin/team/update",$arrayData);
    }
    public function deleteTeam($id) {  
        $url = site_url()."/pages/api/deleteTeam/$id";
        $response =  apiCall($url, "get"); 
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url()."pages/team");       
    }

    public function AdvisoryboardList(){ 
        
        $url = site_url()."pages/api/findMultipleAdvisoryboardTeam";
        $team_list =  apiCall($url, "get"); 
        //print_r($team_list);exit;
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post();
           // print_r($pageData);exit;
            $url = site_url()."pages/api/updatePublishAdvisoryboardTeam";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }  
        }
    
        $arrData = array('team_list' =>$team_list['result'] , );
        //print_r($arrData);exit;
        $this->template->load("pages/admin/Advisoryboard/list",$arrData);
    }

      public function createAdvisoryboardTeam() {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            //print_r($pageData);exit;
            $url = site_url()."pages/api/createAdvisoryboardTeam"; 
            $response =  apiCall($url, "post",$pageData); 
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url()."pages/team/AdvisoryboardList");   
            }   
        } 
        

        $this->template->load("pages/admin/team/create",$arrData);
    }
    public function updateAdvisoryboardTeam($id) {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            $url = site_url()."pages/api/updateAdvisoryboardTeam";
            $response =  apiCall($url, "post",$pageData);
			
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }
            redirect(site_url()."pages/team/AdvisoryboardList");           
        }
        $url = site_url()."/pages/api/findSingleAdvisoryboardTeam/$id";
        $team_data =  apiCall($url, "get"); 
        $arrayData = [
            "team_data"=>$team_data['result'], 
            ];
        $this->template->load("pages/admin/Advisoryboard/update",$arrayData);
    }
    public function deleteAdvisoryboardTeam($id) {  
        $url = site_url()."/pages/api/deleteAdvisoryboardTeam/$id";
        $response =  apiCall($url, "get"); 
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url()."pages/team/AdvisoryboardList");       
    }

}