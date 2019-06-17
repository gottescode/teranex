<?php 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Talkwithexperts extends BACKEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
    }

	public function index() {
	 	$url = site_url()."settings/talkwithexpertapi/findMultiple/";
		$data =  apiCall($url, "get"); 
		$arrData = array(
						'data' =>$data['result']
					);
		$this->template->load("talkwithexpert/list",$arrData);
	}
}

?>
