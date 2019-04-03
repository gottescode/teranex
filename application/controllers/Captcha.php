<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Captcha extends FRONTEND_Controller {
	
	// constructor
	function __construct()
	{
		// Call the parent constructor
		parent::__construct();
	}
	
	// index page for this controller 
	public function index()
	{
		$from_page = $this->input->get("page");
		if(empty($from_page)){
			exit;
		}
		$this->load->library("Custom_Captcha", "custom_captcha");
		echo $this->custom_captcha->getCaptchaImage($from_page);
	}
}