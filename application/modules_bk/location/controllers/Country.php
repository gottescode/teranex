<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Country extends BACKEND_Controller { 
	// constructor
	function __construct()
	{
		// Call the parent constructor
		parent::__construct();
			$this->load->model("country_model");
	}
	// index page for this controller 
	public function index()
	{
		// if form is submitted
		if(isset($_POST["btnUpdate"])){
			$data = $this->input->post(); 
			// update data
			$result = $this->country_model->updateRecords($data);
			if($result){
				setFlash("countrySuccessMsg", "Country updated successfully..!!");
			}
			else {
				setFlash("countryErrorMsg", "Failed to update record..!!");
			}
		}
		
		// prepare data
		$arrData = array(
			"data" => $this->country_model->getCountryList(),
		);
		
		// load view page
		$this->template->load("country/index", $arrData);
	}
	
	// create country location
	public function create()
	{
		$data ='';
		// if form submitted
		if(isset($_POST["btnSubmit"])){
			$data = $this->input->post();
			// insert data
			$result = $this->country_model->create($data);
			if($result){
				setFlash("countrySuccessMsg", "Country inserted successfully..!!");
				redirect("location/country/");
				exit;
			}
			else {
				setFlash("countryErrorMsg", "Failed to insert record..!!");
			}
		}
		
		// load view page
		$this->template->load("country/create", array("data" => $data) );
	}
	
	// update country location
	public function update($id = 0)
	{
		$data ='';
		// if form submitted
		if(isset($_POST["btnSubmit"])){
			$data = $this->input->post();
			$data["id"] = $id;
			// update data
			$result = $this->country_model->update($data);
			if($result){
				setFlash("countrySuccessMsg", "Country updated successfully..!!");
				redirect("location/country/");
				exit;
			}
			else {
				setFlash("countryErrorMsg", "Failed to update record..!!");
			}
		}
		else {
			// prepare data
			$data = $this->country_model->getCountryById($id);
		}

		// load view page
		$this->template->load("country/update", array("data" => $data) );
	}
	
	// delete country location
	public function delete($id = 0)
	{
		$result = $this->country_model->delete($id);
		if($result){
			setFlash("countrySuccessMsg", "Country deleted successfully..!!");
		}
		else {
			setFlash("countryErrorMsg", "Failed to deleted record..!!");
		}
		redirect("location/country/");
	}
}