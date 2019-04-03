<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Macademy extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		 
    }
	
	public function index() {  
		$this->template->load("index",$arrData);
	}
	public function virtual_classroom() { 
		$this->template->load("virtual_classroom",$arrayData);
	} 
	public function unified_contents() { 
		$this->template->load("unified_contents",$arrayData);
	} 
	public function practical() { 
		$this->template->load("practical",$arrayData);
	} 
	public function projects() { 
		$this->template->load("projects",$arrayData);
	} 
	public function online_testing() { 
		$this->template->load("online_testing",$arrayData);
	} 
	
}

?>
