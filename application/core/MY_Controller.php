<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Controller for Api
 */
require APPPATH . '/libraries/REST_Controller.php';
class API_Controller extends REST_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		
		$this->load->library("form_validation");
		$this->form_validation->CI =& $this;
        $this->form_validation->set_error_delimiters("", "");
    }
}

/**
 * Controller for frontend design
 */
class FRONTEND_Controller extends MX_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		
        // define template variables
        $this->template->theme = "site";
        $this->template->layout = "column1";  
 
    }		
}

/**
 * Controller for backend
 */
class BACKEND_Controller extends MX_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();

        // define template variables
        $this->template->theme = "admin";
        $this->template->layout = "column1";
		$this->load->model("loginbackend/login_model");
		

		if(!$this->login_model->hasLoggedIn() && $this->uri->segment(2)!='login'){
			// redirect to login method
			redirect("loginbackend/login");
		}

    } 
}
