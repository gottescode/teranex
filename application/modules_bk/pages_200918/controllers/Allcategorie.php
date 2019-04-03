<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Allcategorie extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

   
    public function index(){ 
        
        $url = site_url()."pages/api/findMultipleAllcategorie";
        $Allcategorie_list =  apiCall($url, "get"); 
        //print_r($Allcategorie_list);exit;
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post();
           // print_r($pageData);exit;
            $url = site_url()."pages/api/updatePublishAllcategorie";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }  
        }
    
        $arrData = array('Allcategorie_list' =>$Allcategorie_list['result'] , );
        //print_r($arrData);exit;
        $this->template->load("pages/admin/allcategorie/list",$arrData);
    }

        /* Allcategorie  Add / Insert / Update */
  
    public function createAllcategorie() {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            //print_r($pageData);exit;
            $url = site_url()."pages/api/createAllcategorie"; 
            $response =  apiCall($url, "post",$pageData); 
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url()."pages/allcategorie");   
            }   
        } 
        

        $this->template->load("pages/admin/allcategorie/create",$arrData);
    }
    public function updateAllcategorie($id) {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            $url = site_url()."pages/api/updateAllcategorie";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }
            redirect(site_url()."pages/allcategorie");           
        }
        $url = site_url()."/pages/api/findSingleAllcategorie/$id";
        $allcategorie_data =  apiCall($url, "get"); 
       // print_r($Allcategorie_data);exit;
        $arrayData = [
            "allcategorie_data"=>$allcategorie_data['result'], 
            ];
        $this->template->load("pages/admin/allcategorie/update",$arrayData);
    }
    public function deleteAllcategorie($id) {  
        $url = site_url()."/pages/api/deleteAllcategorie/$id";
        $response =  apiCall($url, "get"); 
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url()."pages/allcategorie");       
    }

    public function SubCategorieList($cid) {

        $url = site_url()."pages/api/findMultipleSubCategorie/$cid";
        $subcat_list =  apiCall($url, "get"); 
        //print_r($subcat_list);exit;
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post();
            $url = site_url()."pages/api/updatePublishSubCategorie";
            $response =  apiCall($url, "post",$pageData);
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }  
        }
        $arrData = array('subcat_list' =>$subcat_list['result'] ,'cid' =>$cid );
        //print_r($arrData);exit;
        $this->template->load("pages/admin/subcategories/list",$arrData);
    }
    public function createSubcat($cid) {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post();  
           // print_r($pageData);exit;
            $cid = $pageData['cat_id']; 
            $url = site_url()."pages/api/createSubcat"; 
            $response =  apiCall($url, "post",$pageData); 
            if($response){
                setFlash("dataMsgSuccess", $response['message']);
                redirect(site_url()."pages/allcategorie/SubCategorieList/$cid");  
            }   
        }  
        $arrData = array('cat_id' =>$cid);

        $this->template->load("pages/admin/subcategories/create",$arrData);
    }
    public function updateSubcat($id) {  
        if(isset($_POST['btnSubmit'])){
            $pageData = $this->input->post(); 
            //print_r($pageData);exit;
            $cid = $pageData['cat_id']; 
            $url = site_url()."pages/api/updateSubcat";
            $response =  apiCall($url, "post",$pageData);

            if($response){
                setFlash("dataMsgSuccess", $response['message']);
            }
            redirect(site_url()."pages/allcategorie/SubCategorieList/$cid");          
        }
        $url = site_url()."/pages/api/findSingleSubCategorie/$id";
        $subcategories_data =  apiCall($url, "get"); 
       // print_r($subcategories_data);exit;
        $arrayData = [
            "subcategories_data"=>$subcategories_data['result'], 
            "cat_id"=>$subcategories_data['result']['cat_id'], 
            ];
            //print_r($arrData);exit;
        $this->template->load("pages/admin/subcategories/update",$arrayData);
    }
    public function deleteSubcat($cid,$id) {  
        $url = site_url()."/pages/api/deleteSubcat/$id";
        $response =  apiCall($url, "get"); 
        setFlash("dataMsgSuccess", $response['message']);
        redirect(site_url()."pages/allcategorie/SubCategorieList/$cid");      
    } 



}