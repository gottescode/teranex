<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class State extends BACKEND_Controller {
	
	// constructor
	function __construct()
	{
		// Call the parent constructor
		parent::__construct(); 
		// load model
		$this->load->model("state_model");
	}
	
	// index page for this controller 
	public function index($id=0)
	{
		
		
		// if form is submitted
		if(isset($_POST["btnUpdate"])){
			$data = $this->input->post();
			
			// update data
			$result = $this->state_model->updateRecords($data);
			if($result){
				setFlash("stateSuccessMsg", "Record has been updated successfully..!!");
			}
			else {
				setFlash("stateErrorMsg", "Failed to update record..!!");
			}
		}
		//$id=0;
		// if form is submitted
		if(isset($_POST["btnSearch"])){
			$data = $this->input->post(); 
			// get main menu id
			$id = $_POST['country_id'];
		}
		
		// load model
		$this->load->model("location/country_model");
		
		// prepare data
		$arrData = array(
			"data" => $this->state_model->getStateList($id),
			"countryList" => $this->country_model->getCountryListForSite(),
			"id" => $id
		);
		
		// load view page
		$this->template->load("state/index", $arrData);
	}
	
	// create sub menu
	public function create()
	{
		// if form submitted
		if(isset($_POST["btnSubmit"])){
			$data = $this->input->post();
			// insert data
			$result = $this->state_model->create($data);
			if($result){
				setFlash("stateSuccessMsg", "Record has been inserted successfully..!!");
				redirect("location/state/");
				exit;
			}
			else {
				setFlash("subMenuErrorMsg", "Failed to insert record..!!");
			}
		}
		
		// load model
		$this->load->model("country_model");
		// get country list
		$countryList = $this->country_model->getCountryListForSite();
		$data = $this->state_model->getStateById(0);
		// load view page
		$this->template->load("state/create", array("data" => $data, "countryList" => $countryList) );
	}
	
	// update sub menu
	public function update($id = 0)
	{
		// if form submitted
		if(isset($_POST["btnSubmit"])){
			$data = $this->input->post();
			$data["description"] = $_POST["description"];
			$data["id"] = $id;
			// update data
			$result = $this->state_model->update($data);
			if($result){
				setFlash("stateSuccessMsg", "Record has been updated successfully..!!");
				redirect("location/state/");
				exit;
			}
			else {
				setFlash("stateErrorMsg", "Failed to update record..!!");
			}
		}
		else {
			// prepare data
			$data = $this->state_model->getStateById($id);
		}
		
		// load model
		$this->load->model("country_model");
		// get country  list
		$countryList = $this->country_model->getCountryList();
		
		// load view page
		$this->template->load("state/update", array("data" => $data, "countryList" => $countryList) );
	}
	
	// delete state 
	public function delete($id = 0,$bid)
	{
		 	
		$this->session->set_userdata($session);
		$result = $this->state_model->delete($id);
		if($result){
			setFlash("stateSuccessMsg", "Record has been deleted successfully..!!");
		}
		else {
			setFlash("stateErrorMsg", "Failed to deleted record..!!");
		} 
		//$this->template->load("state/index", $arrData);
		redirect("location/state/index/$bid");
	}
	
	// get state list By Country id  
	public function listbycountry($id = 0)
	{
		$id = $id;
		$stateList= $this->state_model->getStateList($id);
		echo json_encode($stateList);
	}
}