<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Talkwithexpertapi extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("talkwithexpert_model");
    }

	
	public function findMultiple_get($id=0) { 
		$strWhere = $this->get("strWhere");
		if(!$strWhere) $strWhere = 1;
		    if($id!=0){
			$strWhere .= " and id <>$id";
		    }
			$response = [
				"result" => $this->talkwithexpert_model->findMultiple($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function create_post() {
	 
         $this->form_validation->set_rules('f_name', 'First Name', 'trim|required');
         $this->form_validation->set_rules('l_name', 'Last Name', 'trim|required');
		 
		 if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {

            // get input data
			$data = $this->post(); 
		 
			$type_id = $this->talkwithexpert_model->create($data);
			if($type_id){
				$response = [ "result" => $type_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		
		
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
 
}

?>