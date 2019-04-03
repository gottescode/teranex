<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends BACKEND_Controller {
	
	// constructor
	function __construct()
	{
		// Call the parent constructor
		parent::__construct();
		// theme variables 
		// load model
		$this->load->model("city_model");
	}
	
	// index page for this controller 
	public function index()
	{
		// get main menu id
		$stateid = -1;
		    $country_id =-1;
		
		// if form is submitted
		if(isset($_POST["btnUpdate"])){
			$data = $this->input->post(); 
			// update data
			$result = $this->city_model->updateRecords($data);
			if($result){
				setFlash("citySuccessMsg", "City updated successfully..!!");
			}
			else {
				setFlash("cityErrorMsg", "Failed to update record..!!");
			}
		}
		// search List
		if(isset($_POST["searchList"])){
			
			$data = $this->input->post();	
			$stateid=$data['state_id'];
			$country_id=$data['country_id'];
		}
		
		// load model
		$this->load->model("country_model");
		$this->load->model("state_model");
		
		// prepare data
		$arrData = array(
			"cityList" => $this->city_model->getCityList($stateid),
			"countryList" => $this->country_model->getCountryListForSite(),
			"stateList" => $this->state_model->getStateList($country_id),
			"country_id" => $country_id,
			"stateid" => $stateid,
		);
		 
		// load view page
		$this->template->load("city/index",$arrData); 
	}
	
	// create sub menu
	public function create()
	{
		$data = $this->city_model->getCityById(0);
		// if form submitted
		if(isset($_POST["btnSubmit"])){
			$data = $this->input->post();
			// insert data
			$result = $this->city_model->create($data);
			if($result){
				setFlash("citySuccessMsg", "City inserted successfully..!!");
				redirect("location/city/");
				exit;
			}
			else {
				setFlash("subMenuErrorMsg", "Failed to insert record..!!");
			}
		}
		
		// load model
		$this->load->model("country_model");
		$this->load->model("state_model");
		
			 
		// get country list
		$countryUrl = site_url()."location/api/getCountryList/"; 
		$countryList =  apiCall($countryUrl, "get");  
		 
		$stateList = $this->state_model->getStateList();
		$arrayData = [  
			"stateList" => $stateList, 
			"data" => $data , 
			"countryId" => 0, 
			"state_id" => 0 , 
			"countryList" => $countryList['result'],  
			"stateList" => array(),  
		];
		// load view page
		$this->template->load("city/create", $arrayData );
	}
	
	// update sub menu
	public function update($id = 0)
	{
		// load model
		$this->load->model("state_model");
		$this->load->model("country_model");
		// if form submitted
		if(isset($_POST["btnSubmit"])){
			$data = $this->input->post();
			$data["description"] = $_POST["description"];
			$data["id"] = $id;
			// update data
			$result = $this->city_model->update($data);
			if($result){
				setFlash("citySuccessMsg", "City updated successfully..!!");
				redirect("location/city/");
				exit;
			}
			else {
				setFlash("cityErrorMsg", "Failed to update record..!!");
			}
		}
		else {
			// prepare data
			$data = $this->city_model->getCityById($id);
		//	print_r();exit;
			$state_id=$data['state_id'];
			
			$stateUrl = site_url()."location/api/getStateSingle/$state_id"; 
			$stateResult =  apiCall($stateUrl, "get"); 
			$countryId=$stateResult['result']['country_id']; 
			// get  state list
			 $stateListUrl = site_url()."location/api/getStateList/{$data['country_id']}"; 
			$stateListResult =  apiCall($stateListUrl, "get"); 
			//print_r($stateListResult);exit;
		}
		 
		// get country list
		$countryUrl = site_url()."location/api/getCountryList/"; 
		$countryList =  apiCall($countryUrl, "get");  
		 
		$stateList = $this->state_model->getStateList(); 
		$arrayData = [  
			"stateList" => $stateList, 
			"data" => $data , 
			"countryId" => $countryId , 
			"state_id" => $state_id , 
			"countryList" => $countryList['result'],  
			"stateList" => $stateListResult['result'],  
		];
		
		// load view page
		$this->template->load("city/update", $arrayData );
	}
	
	// delete city 
	public function delete($id = 0)
	{
		$result = $this->city_model->delete($id);
		if($result){
			setFlash("citySuccessMsg", "City deleted successfully..!!");
		}
		else {
			setFlash("cityErrorMsg", "Failed to deleted record..!!");
		}
		redirect("location/city/");
	}
	
	// list By State   
	public function listbystate($id = 0)
	{
		$id = $_POST['sid'];
		$cityList= $this->city_model->getCityForSite($id);
		echo json_encode(array("cityList"=>$cityList));
	}
}