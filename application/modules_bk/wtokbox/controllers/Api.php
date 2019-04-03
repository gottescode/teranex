<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("payment_model");
    }
 
    //sign up Profile Data
    public function paySuccess_post() {
       
            // get input data
			$data = $this->post();
			$id = $this->payment_model->insertPayment($data);
			if(($id)){
				$response = [ "result" => $id, "message" => "Profile insert successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Record insert Failed"
				];
			}
		
		$this->response($response, REST_Controller::HTTP_OK);
    } 
}

?>
