<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("machine_model");
    }
		
	public function findMultipleMachineCat_get($id=0) { 
			$response = [
				"result" => $this->machine_model->findMultipleMachineCat($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findSingleMachineCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND mc_id = $id ";
			$response = [
				"result" => $this->machine_model->findSingleMachineCategory($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}

	public function createCategory_post() {
	    $this->form_validation->set_rules('category_name', 'Name Required', 'trim|required');
        $this->form_validation->set_rules('short_description', 'Name Required', 'trim|required');
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
		 
			$id = $this->machine_model->createCategory($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine category has been inserted ssuccessfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateMachineCategory_post() {
		$this->form_validation->set_rules('category_name', 'Name Required', 'trim|required');
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
			$result = $this->machine_model->updateMachineCategory($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine category updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updatePublishMachineCategory_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machine_model->updatePublishMachineCategory($data),
				"message" => "Record updated successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	} 
	
	public function delete_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machine_model->delete($id),
				"message" => "Record deleted successfully..!!"
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

/* =============================MACHINE DETAILS========================= */
	/*remote Machine Class Schedule 
			18/4/2018
	 * @access public
	 * @param  insert machine details
	 * @return array of post data
	 */
	public function machineInsertDetails_post() {
	    $this->form_validation->set_rules('category_id', 'Categry Name Required', 'trim|required');
        $this->form_validation->set_rules('brand_name', 'Brand Name Required', 'trim|required');
        $this->form_validation->set_rules('model_no', 'Model no Required', 'trim|required');
       /* $this->form_validation->set_rules('control_panel', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_w', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_l', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('machine_axes', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('travel_long', 'travel long Required', 'trim|required');
        $this->form_validation->set_rules('travel_cross', 'Travel cross is Required', 'trim|required');
        $this->form_validation->set_rules('machine_power', 'Machine Power is Required', 'trim|required');
        $this->form_validation->set_rules('machine_rpm', 'machine rpm is Required', 'trim|required');
        $this->form_validation->set_rules('machine_location_city', 'machine location city Required', 'trim|required');
        $this->form_validation->set_rules('machine_location_state', 'machine location state Required', 'trim|required');
        $this->form_validation->set_rules('machine_location_country', 'machine Location Required', 'trim|required');
        $this->form_validation->set_rules('machine_description', 'machine description Required', 'trim|required');*/
        //$this->form_validation->set_rules('machine_at_a_glance', 'Machine at glance Required', 'trim|required');
        /*$this->form_validation->set_rules('machine_history', 'Machine History Required', 'trim|required');
        $this->form_validation->set_rules('technical_specification', 'Technical Specification Required', 'trim|required');*/
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
		 
			$id = $this->machine_model->machineInsertDetails($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine details has been inserted successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Machine Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update machine details
	 * @return array of post data
	 */
	public function updateMachineDetails_post() {
		$this->form_validation->set_rules('category_id', 'Categry Name Required', 'trim|required');
        $this->form_validation->set_rules('brand_name', 'Brand Name Required', 'trim|required');
        $this->form_validation->set_rules('model_no', 'Model no Required', 'trim|required');
      /*  $this->form_validation->set_rules('control_panel', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_w', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_l', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('machine_axes', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('travel_long', 'travel long Required', 'trim|required');
        $this->form_validation->set_rules('travel_cross', 'Travel cross is Required', 'trim|required');
        $this->form_validation->set_rules('machine_power', 'Machine Power is Required', 'trim|required');
        $this->form_validation->set_rules('machine_rpm', 'machine rpm is Required', 'trim|required');*/
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
			$result = $this->machine_model->updateMachineDetails($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine details updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Machine Class Schedule 
			18/4/2018
	 * @access public
	 * @param  fetch single details
	 * @return array data
	 */
	public function machineDetailsMultiple_get() {
			$result = $this->machine_model->machineDetailsMultiple();
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Machine Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update machine details
	 * @return array of post data
	 */
	public function findSingleMachineDetails_get($mid) {
		 
         if ($mid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
			$strWhere = "   md_id = $mid ";
			$result = $this->machine_model->findSingleMachineDetails($strWhere);
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Machine Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update machine details
	 * @return array of post data
	 */
	public function deleteMachineDetails_get($mid) {
		 
         if ($mid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
			
			$result = $this->machine_model->deleteMachineDetails($mid);
			if($result){
				$response = [ "result" => $result, "message" => "Deleted successfully...!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*find Machine List Category
			18/4/2018
	 * @access public
	 * @param  get category Id
	 * @return array of 
	 */
	public function findMachineListCategory_post($cid,$machinUsed) {
		 
         if ($cid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
			 // get input data
			$strWhere = " category_id = $cid ";
			$strWhere.= "AND  MD.publish = 'Y' ";
			$data = $this->post();
			if($data['country_id']){
				$country_id= $data['country_id']; 
				$strWhere.= " AND machine_location_country = $country_id ";
			}
			if($data['state_id']){
				$state_id= $data['state_id']; 
				$strWhere.= " AND machine_location_state = $state_id ";
			} 
			if($data['city_id']){
				$city_id= $data['city_id']; 
				$strWhere.= " AND machine_location_city = $city_id ";
			} 
			if($data['brandId']){
				$brandId= $data['brandId']; 
				$strWhere.= " OR MD.brand_name = $brandId ";
			} 
			if($data['brand_model']){
				$brand_model= $data['brand_model']; 
				$strWhere.= " OR MD.model_no = $brand_model ";
			}   
			if($machinUsed=='new'){ $strWhere.=" AND  isUsed = 'N' ";}
			if($machinUsed=='used'){ $strWhere.=" AND isUsed = 'Y' ";}
			
			$result = $this->machine_model->findMachineListCategory($strWhere);
			
			
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findMachineListByName_post($cid,$machinUsed) {
		  
         if ($cid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
			 // get input data
			$strWhere = "  MD.publish = 'Y' ";
			$data = $this->post();
			if($data['searching']){
				$name= $data['searching']; 
				$strWhere.= " AND MBM.model_name LIKE '%$name%' ";
			}
			$result = $this->machine_model->findMachineListByName($strWhere);
			
			
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function findMachineListByNameAdvance_post() {
		 
			 // get input data
			$data = $this->post();
			$CAT_ID = $data['machine_type'];
			$strWhere= "  MD.publish = 'Y' ";
			$strWhere.= " AND category_id = {$CAT_ID} ";
			if($data['keywords']){
				$name= $data['keywords']; 
				$strWhere.= " AND MBM.model_name LIKE '%$name%' ";
			}
			
			
			
			if($data['brandId']){
				$brandId= $data['brandId']; 
				$strWhere.= " AND MD.brand_name= $brandId";
			}
			if($data['brand_model']){
				$model_no= $data['brand_model']; 
				$strWhere.= " AND MD.model_no= $model_no";
			}
			
			if($data['yom']){
				$year_production = $data['yom'];
				$strWhere.= " AND MD.year_production= $year_production";
				
			}
			if($data['country_id']){
				$country_id = $data['country_id'];
				$strWhere.= " AND MD.machine_location_country = $country_id";
				
			}
			if($data['state_id']){
				$machine_location_state = $data['state_id'];
				$strWhere.= " AND MD.machine_location_state= $machine_location_state";
				
			}
			if($data['city_id']){
				$year_production = $data['city_id'];
				$strWhere.= " AND MD.machine_location_city= $machine_location_city";
				
			}
			if($data['condition']=='N'){ $strWhere.=" AND  isUsed = 'N' ";}
			if($data['condition']=='Y'){ $strWhere.=" AND isUsed = 'Y' ";}
			
			$result = $this->machine_model->findMachineListByName($strWhere);
			
			
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		$this->response($response, REST_Controller::HTTP_OK);
    }

	/*find Machine List Category
			18/4/2018
	 * @access public
	 * @param  get category Id
	 * @return array of 
	 */
	public function findCategoryCount_get($cid, $machinUsed='') {
		 
         if ($cid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
			$strWhere = "   ";
			$result = $this->machine_model->findCategoryCount($cid, $machinUsed);
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function createGallery_post() {
	$this->form_validation->set_rules('md_id', 'Machine Design ', 'trim|required');
		 
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
			$page_id = $this->machine_model->createGallery($data);
			if($page_id){
				$response = [ "result" => $page_id, "message" => "Record inserted successfully." ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findMultipleGalleryImages_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insuffient information provided.",
			];
		}
		else {
			$strWhere .= " AND md_id = $id ";
			$response = [
				"result" => $this->machine_model->findMultipleGalleryImages($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
//	public function findUserProfileDetails_get($id) {
//            //echo $id;die;
//	   	     $strWhere .= "uid = $id ";
//			$response = [
//				"result" => $this->machine_model->findUserProfileDetails($strWhere)
//			];
//			
//		$this->response($response, REST_Controller::HTTP_OK);
//	}	
	
	public function delete_gallary_get($id) {
		//echo $id;
		if( !(int)$id){
			//print_r($response);exit();
			$response = [
				"result" => false,
				"message" => "Insuffient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machine_model->delete_gallary($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*remote Machine Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update machine details
	 * @return array of post data
	 */
	public function findSingleMachineDetailsFront_get($mid) {
		 
         if ($mid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
	 
			$result = $this->machine_model->findSingleMachineDetailsFront($mid);
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function findMultipleComapareMachines_post(){
		$data  = $this->post();
		$machine_ids = $data['machine_ids'];
		if(!empty($data)){
			$strWhere = " FIND_IN_SET(md.md_id,'{$machine_ids}')";
			$result = $this->machine_model->findMultipleComapareMachines($strWhere);
		}
		$this->response($result, REST_Controller::HTTP_OK);
	}
	/////////////////////////////    machine Finace Request  //////////////////////////////////
	/*machine Finace Request save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function machineFinaceRequestInsert_post() {
	 
		$this->form_validation->set_rules('company_name', 'Company Nameis Required', 'trim|required');
        $this->form_validation->set_rules('contact_person', 'Contact Person is Required', 'trim|required');
        $this->form_validation->set_rules('phone_no', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email id is Required', 'trim|required');
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
			$result = $this->machine_model->machineFinaceRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine finance request sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	


    /////////////////////////////    machine Insurance Request  //////////////////////////////////
	/*machine Insurance Request save
		08-11-2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function machineInsuranceRequestInsert_post() {
	 
		$this->form_validation->set_rules('company_name', 'Company Nameis Required', 'trim|required');
        $this->form_validation->set_rules('contact_person', 'Contact Person is Required', 'trim|required');
        $this->form_validation->set_rules('phone_no', 'Phone No is Required', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email id is Required', 'trim|required');
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
			$result = $this->machine_model->machineInsuranceRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine Insurance request sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	

    /////////////////////////////    machine Insurance Request  //////////////////////////////////
	/*machine Insurance Request save
		08-11-2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function machineTimeStudyInsert_post() {
	 
		
		    // get input data
			$data = $this->post();
			$result = $this->machine_model->machineTimeStudyInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine Time study request sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
	
		$this->response($response, REST_Controller::HTTP_OK);
    }	
	/*machine Finace Request save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function machineContactRequestInsert_post() {
	 
		$this->form_validation->set_rules('message', 'message Required', 'trim|required'); 
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
			$result = $this->machine_model->machineContactRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine finance request sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	
	/*machine Finace contact Enquiry as per user 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineContactRequest_get($userid) {
		  
		    // get input data
		 
			$result = $this->machine_model->machineContactRequest($userid);
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*machine Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineFinaceRequest_get() {
		  
		    // get input data
		 
			$result = $this->machine_model->machineFinaceRequest();
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }

    /*machine Time study Request 
	11-11-2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineTimeStudyRequest_get() {
		  
		    // get input data
		 
			$result = $this->machine_model->machineTimeStudyRequest();
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
    /*machine Insurance Request 
	09-11-2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineInsuranceRequest_get() {
		  
		    // get input data
		 
			$result = $this->machine_model->machineInsuranceRequest();
			if($result){
				$response = [ "result" => $result, "message" => "Machine Insurance data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function machineRequest_get() {
		  
		    // get input data
		 
			$result = $this->machine_model->machineRequest();
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*machine  Request  
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineEnquiryRequest_post() {
	    $this->form_validation->set_rules('message', 'message Required', 'trim|required');
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
		 
			$id = $this->machine_model->machineEnquiryRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine enquiry request sent successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record...!! Please try again later"
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
////////////////////// machine Brand ////////////////////
	/*machine Brand Request save
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function machineBrandList_get() {
		  
		    // get input data 
			$result = $this->machine_model->findMultipleMachineBrand();
			if($result){
				$response = [ "result" => $result, "message" => "Machine brand data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleMachineBrand_get($id) {
		  
		    // get input data 
			$result = $this->machine_model->findSingleMachineBrand($id);
			if($result){
				$response = [ "result" => $result, "message" => "Machine brand data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*machine Brand Request save
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function createBrand_post() {
	    $this->form_validation->set_rules('brand_name', 'Name Required', 'trim|required'); 
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
		 
			$id = $this->machine_model->createBrand($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine brand added successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*update machine Brand   save
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function updateMachineBrand_post() {
		$this->form_validation->set_rules('brand_name', 'Name Required', 'trim|required');
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
			$result = $this->machine_model->updateMachineBrand($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine category updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*machine Brand delete
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function deleteMachineBrand_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machine_model->deleteMachineBrand($id),
				"message" => "Record deleted successfully..!!"
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
////////////////////// machine Brand ////////////////////
	/*machine Brand Request save
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function machineBrandModelList_get($brand_id='') {
			$strWhere='';
			if($brand_id){
				$strWhere=" brand_id = $brand_id ";
			}
		    // get input data 
			$result = $this->machine_model->findMultipleMachineBrandModel($strWhere);
			if($result){
				$response = [ "result" => $result  ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleMachineBrandModel_get($id) {
		  
		    // get input data 
			$result = $this->machine_model->findSingleMachineBrandModel($id);
			if($result){
				$response = [ "result" => $result, "message" => "Machine brand data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*machine Brand Request save
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function createBrandModel_post() {
	    $this->form_validation->set_rules('model_name', 'Name Required', 'trim|required'); 
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
		 
			$id = $this->machine_model->createBrandModel($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine brand added successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*update machine Brand model  save
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function updateMachineBrandModel_post() {
		$this->form_validation->set_rules('model_name', 'Name Required', 'trim|required');
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
			$result = $this->machine_model->updateMachineBrandModel($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine category updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*machine Brand Model delete
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function deleteMachineBrandModel_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->machine_model->deleteMachineBrandModel($id),
				"message" => "Record deleted successfully..!!"
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	/*machine comment Reply list
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function machineCommentReplyList_get($mcid) {
 
		// get input data 
		$result = $this->machine_model->machineCommentReplyList($mcid);
		if($result){
			$response = [ "result" => $result];
		} else {
			$response = [
				"result" => false,
				'message' => "Faild to retrive record."
			];
		}
	 
		$this->response($response, REST_Controller::HTTP_OK);
	}	
	/*machine comment Reply file list uploaded
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function machineCommentReplyFileList_get($mrcid) {
 
		// get input data 
		$result = $this->machine_model->machineCommentReplyFileList($mrcid);
		if($result){
			$response = [ "result" => $result];
		} else {
			$response = [
				"result" => false,
				'message' => "Faild to retrive record."
			];
		}
	 
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	/*machine comment Reply 
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function addMachineComment_post() {
		$this->form_validation->set_rules('comment_msg', 'Message Required', 'trim|required');
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
			$result = $this->machine_model->addMachineComment($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine reply added successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	/* machine Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineContactRequestAdmin_get() {
		  
		    // get input data
		 
			$result = $this->machine_model->machineContactRequestAdmin();
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* machine Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineVideoRequestInsert_post() {
		  
		$this->form_validation->set_rules('video_chat', 'Video Chat Required', 'trim|required');
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
			$result = $this->machine_model->machineVideoRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine video request added successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function machineVideoRequestInsertNew_post() {
		  
		$this->form_validation->set_rules('machine_id', 'Video Chat Required', 'trim|required');
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
			$result = $this->machine_model->machineVideoRequestInsertNew($data);
			if($result){
				$response = [ "result" => $result, "message" => "Machine video request added successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* machine Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineVideoRequestList_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->machine_model->machineVideoRequestList($userid);
		if($result){
			$response = [ "result" => $result ];
		} else {
			$response = [
				"result" => false,
				'message' => " Data Not Found"
			];
		}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function machineVideoRequestListSupplier_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->machine_model->machineVideoRequestListSupplier($userid);
		if($result){
			$response = [ "result" => $result ];
		} else {
			$response = [
				"result" => false,
				'message' => " Data Not Found"
			];
		}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* machine Contact Request Admin
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findMultipleVideoRequest_get() { 
			$response = [
				"result" => $this->machine_model->findMultipleVideoRequest()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* get View machine List Ajax request data
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findMachineRecommendedListCategory_get($catId, $machinUsed='') { 
			 
			$response = [
				"result" => $this->machine_model->findMachineRecommendedListCategory($catId, $machinUsed)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* get View machine List Ajax request data
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function getViewmachineList_post() { 
			$data = $this->post();
			$response = [
				"result" => $this->machine_model->getViewmachineList($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSupplier_get( $strWhere = 1) {
			$response = [
				"result" => $this->machine_model->findMultipleSupplier($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function assignSupplier_get() {
			$data = $this->get();
			$response = [
				"result" => $this->machine_model->assignSupplier($data)
			]; 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	/* machine software List
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineSoftwareList_get(){ 
			
			$response = [
				"result" => $this->machine_model->machineSoftwareList()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* machine software List
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findSingleMachineSoftware_get($ms_id) {  
			$response = [
				"result" => $this->machine_model->findSingleMachineSoftware($ms_id)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* machine software List
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function deleteMachineSoftware_get($ms_id) {  
			$response = [
				"result" => $this->machine_model->deleteMachineSoftware($ms_id),
				"message"=> " Record has been deleted Successfully...!!"
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* machine software create
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineSoftwareCreate_post() {
	    $this->form_validation->set_rules('machine_category_id', 'Category Required', 'trim|required');
        $this->form_validation->set_rules('machine_id', 'Machine Name Required', 'trim|required');
        $this->form_validation->set_rules('software_name', 'Software Name Required', 'trim|required');
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
		 
			$id = $this->machine_model->machineSoftwareCreate($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine software added successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* machine software create
		11//5/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function machineSoftwareUpdate_post() {
	    $this->form_validation->set_rules('machine_category_id', 'Category Required', 'trim|required');
        $this->form_validation->set_rules('machine_id', 'Machine Name Required', 'trim|required');
        $this->form_validation->set_rules('software_name', 'Software Name Required', 'trim|required');
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
		 
			$id = $this->machine_model->machineSoftwareUpdate($data);
			if($id){
				$response = [ "result" => $id, "message" => "Machine software updated successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
    
    public function financersoftwareList_get(){ 
			
			$response = [
				"result" => $this->machine_model->financersoftwareList()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);

	}
	
	/* NEW API's */
	public function createTimeStudyRequest_post() {
	    $this->form_validation->set_rules('machine_id', 'Machine Id ', 'trim|required');
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
		 
			$id = $this->machine_model->createTimeStudyRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "Time Study Request has been submitted successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	/* Time Study Request List */
	public function machineTimeStudyRequestAll_get() {
		  
		    // get input data
		 
			$result = $this->machine_model->machineTimeStudyRequestAll();
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function createFinanceRequest_post() {
	    $this->form_validation->set_rules('machine_id', 'Machine Id ', 'trim|required');
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
		 
			$id = $this->machine_model->createFinanceRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "Finance Request has been submitted successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function machineFinanceRequestAll_get() {
		  
		    // get input data
		 
			$result = $this->machine_model->machineFinanceRequestAll();
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }

	public function createMachineRfqRequest_post() {
	    $this->form_validation->set_rules('machine_id', 'Machine Id ', 'trim|required');
	    $this->form_validation->set_rules('supplier_id', 'Supplier Id ', 'trim|required');
	    $this->form_validation->set_rules('customer_id', 'Customer Id ', 'trim|required');
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
		 
			$id = $this->machine_model->createMachineRfqRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "Request Quote for machine has been submitted successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function machineRfqAll_get() {
			// get input data
			$result = $this->machine_model->machineRfqAll();
			if($result){
				$response = [ "result" => $result, "message" => "Machine RFQ Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function onDemandManufacturingRfq_get() {
			// get input data
			$result = $this->machine_model->onDemandManufacturingRfq();
			if($result){
				$response = [ "result" => $result, "message" => "Machine RFQ Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function onDemandProgrammingRfq_get() {
			// get input data
			$result = $this->machine_model->onDemandProgrammingRfq();
			if($result){
				$response = [ "result" => $result, "message" => "Machine RFQ Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	
	public function createonDemandManufacturingRequest_post() {
	    $this->form_validation->set_rules('machine_id', 'Machine Id ', 'trim|required');
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
		 
			$id = $this->machine_model->createonDemandManufacturingRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "Finance Request has been submitted successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function createonDemandProgrammingRequest_post() {
	    $this->form_validation->set_rules('machine_id', 'Machine Id ', 'trim|required');
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
		 
			$id = $this->machine_model->createonDemandProgrammingRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "Finance Request has been submitted successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function machineOnRentRequestList_get() {
			// get input data
			$result = $this->machine_model->machineOnRentRfqAll();
			if($result){
				$response = [ "result" => $result, "message" => "Machine RFQ Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function machineOnRentRequestListCustomer_get($customer_id) {
			// get input data
			$result = $this->machine_model->machineOnRentRequestListCustomer($customer_id);
			if($result){
				$response = [ "result" => $result, "message" => "Machine RFQ Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function machineOnRentRequestListSingle_get($id) {
			// get input data
			$result = $this->machine_model->machineOnRentRequestListSingle($id);
			if($result){
				$response = [ "result" => $result, "message" => "Machine RFQ Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function machineOnRentFinanceDetails_get($rfq_id=0) {
		  
		    // get input data
		 
			$result = $this->machine_model->machineOnRentFinanceDetails($rfq_id);
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function insuranceDetailsOnRent_get($rfq_id=0) {
		  
		    // get input data
		 
			$result = $this->machine_model->insuranceDetailsOnRent($rfq_id);
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function insuranceMachineDetailsOnRent_get($rfq_id=0) {
		  
		    // get input data
		 
			$result = $this->machine_model->insuranceMachineDetailsOnRent($rfq_id);
			if($result){
				$response = [ "result" => $result, "message" => "Machine data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function createonRentRequest_post() {
	    $this->form_validation->set_rules('customer_id', 'Customer Id ', 'trim|required');
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
		 
			$id = $this->machine_model->createonRentRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "On Rent Request has been submitted successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function machineTypeData_get() {
			// get input data
			$result = $this->machine_model->machineTypeData();
			if($result){
				$response = [ "result" => $result, "message" => "Machine Type Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function serviceTypeData_get() {
			// get input data
			$result = $this->machine_model->serviceTypeData();
			if($result){
				$response = [ "result" => $result, "message" => "Service Type Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function infrasturctureData_get() {
			// get input data
			$result = $this->machine_model->infrasturctureData();
			if($result){
				$response = [ "result" => $result, "message" => "Service Type Data.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
}
?>