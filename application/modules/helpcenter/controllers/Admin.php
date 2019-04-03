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
	 	$url = site_url()."helpcenter/api/findMultipleCategory/";
		$category_list =  apiCall($url, "get"); 
		//print_r($result);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."helpcenter/api/updatePublishCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('category_list' =>$category_list['result'] , );
		//print_r($arrData);exit;
		$this->template->load("admin/category/list",$arrData);
	}
	public function createCategory() {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			//print_r($pageData);exit;
			$url = site_url()."helpcenter/api/createCategory"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."helpcenter/admin/");	
			} 	
		} 
		

		$this->template->load("admin/category/create",$arrData);
	}
	public function updateCategory($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$url = site_url()."helpcenter/api/updateCategory";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."helpcenter/admin/");			
		}
		$url = site_url()."/helpcenter/api/findSingleCategory/$id";
		$category_data =  apiCall($url, "get"); 
		$arrayData = [
			"category_data"=>$category_data['result'], 
			];
		$this->template->load("admin/category/update",$arrayData);
	}
	public function deleteCategory($id) {  
		$url = site_url()."/helpcenter/api/deleteCategory/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."helpcenter/admin/");		
	} 

	/* helpcenter Sub Category Add / Insert / Update */
	public function SubCatList($sid) {

		$url = site_url()."helpcenter/api/findMultipleSubCat/$sid";
		$subcat_list =  apiCall($url, "get"); 
		//print_r($subcat_list);exit;
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();
			$url = site_url()."helpcenter/api/updatePublishSubCat";
			$response =  apiCall($url, "post",$pageData);
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}  
		}
		$arrData = array('subcat_list' =>$subcat_list['result'] ,'sid' =>$sid );
		//print_r($arrData);exit;
		$this->template->load("admin/subcategory/list",$arrData);
	}
	public function createSubCat($sid) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post();  
			//print_r($pageData);exit;
			$cid = $pageData['helpcenter_category_id']; 
			$url = site_url()."helpcenter/api/createSubCat"; 
			$response =  apiCall($url, "post",$pageData); 
			if($response){
				setFlash("dataMsgSuccess", $response['message']);
				redirect(site_url()."helpcenter/admin/SubCatList/$sid");	
			} 	
		}  
		$arrData = array('helpcenter_category_id' =>$sid);

		$this->template->load("admin/subcategory/create",$arrData);
	}
	public function updateSubCat($id) {  
		if(isset($_POST['btnSubmit'])){
			$pageData = $this->input->post(); 
			$sid = $pageData['helpcenter_category_id']; 
			$url = site_url()."helpcenter/api/updateSubCat";
			$response =  apiCall($url, "post",$pageData);

			if($response){
				setFlash("dataMsgSuccess", $response['message']);
			}
			redirect(site_url()."helpcenter/admin/SubCatList/$sid");			
		}
		$url = site_url()."/helpcenter/api/findSingleSubCat/$id";
		$subcat_data =  apiCall($url, "get"); 
		$arrayData = [
			"subcat_data"=>$subcat_data['result'], 
			"helpcenter_category_id"=>$subcat_data['result']['helpcenter_category_id'], 
			];
			//print_r($arrData);exit;
		$this->template->load("admin/subcategory/update",$arrayData);
	}
	public function deleteSubCat($sid,$id) {  
		$url = site_url()."/helpcenter/api/deleteSubCat/$id";
		$response =  apiCall($url, "get"); 
		setFlash("dataMsgSuccess", $response['message']);
		redirect(site_url()."helpcenter/admin/SubCatList/$sid");		
	} 
	
}

?>
