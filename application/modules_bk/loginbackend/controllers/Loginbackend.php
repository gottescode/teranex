<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Loginbackend extends BACKEND_Controller {
	
	// constructor of this class
	function __construct()
    {		
		// call parent constructor
		parent::__construct();
		$this->load->model('login_model');
	}
	
	// index page for this controller
	public function index()
	{
		// login check - if not then force to do login
		// else open the dashboard
		if(!$this->login_model->hasLoggedIn()){
			// redirect to login method
			redirect("loginbackend/login");
		}
		else {
			// redirect to dashboard
			redirect("dashboard");
		}
	}
	
	// login method to enter in system
	public function login()
	{		
		// initialize template variables
		$this->template->theme = "admin";
		
		// process data if form is submitted
		if(isset($_POST["btnLogin"]))
		{
			// do login
			$result = $this->login_model->logincheck();
			
			//	if record found make user as logged in user
			if($result != 0){
				// set login status
				$this->login_model->login($result["id"], $result["a_name"]);
				
				// redirect to dashboard
				redirect("dashboard");
			}
			else {
				//	set error message for indicating user not logged in
				setFlash("loginError", "Invalid username or password..!! Please try again..!!");
			}
		}
		
		// variables to pass on login page
		$arrData = array(
			"title" => "Login ". TITLE_SEP ." ". TITLE,
			"meta_keywords" => null,
			"meta_description" => null,
		);
		// load view page 
		$this->load->view("login", $arrData);
	}
	
	// logout method to exit from system
	public function logout()
	{
		// unset login status
		$this->login_model->logout();
		
		// redirect to login method
		redirect("loginbackend/login");
	}
}