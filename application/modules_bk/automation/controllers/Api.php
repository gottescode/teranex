<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
		$this->load->model("automation_model");
    }
		
	public function findMultipleAutomationCat_get($id=0) { 
			$response = [
				"result" => $this->automation_model->findMultipleAutomationCat($strWhere)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	public function findSingleAutomationCategory_get( $id, $strWhere = 1) {
		if( !(int)$id ){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$strWhere .= " AND am_id = $id ";
			$response = [
				"result" => $this->automation_model->findSingleAutomationCategory($strWhere)
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
		 
			$id = $this->automation_model->createCategory($data);
			if($id){
				$response = [ "result" => $id, "message" => "Automation Category Has Been  Inserted Successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updateAutomationCategory_post() {
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
			$result = $this->automation_model->updateAutomationCategory($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Category updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function updatePublishAutomationCategory_post() {
		$data = $this->post();
		if( ! $data){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->automation_model->updatePublishAutomationCategory($data),
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
				"result" => $this->automation_model->delete($id),
				"message" => "Record deleted successfully..!!"
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}

/* =============================AUTOMATION DETAILS========================= */
	/*remote Automation Class Schedule 
			18/4/2018
	 * @access public
	 * @param  insert automation details
	 * @return array of post data
	 */
	public function automationInsertDetails_post() {
	   $this->form_validation->set_rules('category_id', 'Categry Name Required', 'trim|required');
         /*$this->form_validation->set_rules('brand_name', 'Brand Name Required', 'trim|required');
        $this->form_validation->set_rules('model_no', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('control_panel', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_w', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_l', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('automation_axes', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('travel_long', 'travel long Required', 'trim|required');
        $this->form_validation->set_rules('travel_cross', 'Travel cross is Required', 'trim|required');
        $this->form_validation->set_rules('automation_power', 'Automation Power is Required', 'trim|required');
        $this->form_validation->set_rules('automation_rpm', 'Automation rpm is Required', 'trim|required');
        $this->form_validation->set_rules('automation_location_city', 'Automation location city Required', 'trim|required');
        $this->form_validation->set_rules('automation_location_state', 'Automation location state Required', 'trim|required');
        $this->form_validation->set_rules('automation_location_country', 'Automation Location Required', 'trim|required');
        $this->form_validation->set_rules('automation_description', 'Automation description Required', 'trim|required');
        //$this->form_validation->set_rules('automation_at_a_glance', 'Automation at glance Required', 'trim|required');
        $this->form_validation->set_rules('automation_history', 'Automation History Required', 'trim|required');
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
		 
			$id = $this->automation_model->automationInsertDetails($data);
			if($id){
				$response = [ "result" => $id, "message" => "Automation Details Has Been  Inserted Successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Automation Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update automation details
	 * @return array of post data
	 */
	public function updateAutomationDetails_post() {
		$this->form_validation->set_rules('category_id', 'Categry Name Required', 'trim|required');
       /* $this->form_validation->set_rules('brand_name', 'Brand Name Required', 'trim|required');
        $this->form_validation->set_rules('model_no', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('control_panel', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_w', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('table_l', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('automation_axes', 'Model no Required', 'trim|required');
        $this->form_validation->set_rules('travel_long', 'travel long Required', 'trim|required');
        $this->form_validation->set_rules('travel_cross', 'Travel cross is Required', 'trim|required');
        $this->form_validation->set_rules('automation_power', 'Automation Power is Required', 'trim|required');
        $this->form_validation->set_rules('automation_rpm', 'automation rpm is Required', 'trim|required');*/
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
			$result = $this->automation_model->updateAutomationDetails($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Details updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Automation Class Schedule 
			18/4/2018
	 * @access public
	 * @param  fetch single details
	 * @return array data
	 */
	public function automationDetailsMultiple_get() {
			$result = $this->automation_model->automationDetailsMultiple();
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Automation Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update automation details
	 * @return array of post data
	 */
	public function findSingleAutomationDetails_get($aid) {
		 
         if ($aid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
			$strWhere = "ad_id = $aid";
			$result = $this->automation_model->findSingleAutomationDetails($strWhere);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*remote Automation Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update automation details
	 * @return array of post data
	 */
	public function deleteAutomationDetails_get($aid) {
		 
         if ($aid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
			
			$result = $this->automation_model->deleteAutomationDetails($aid);
			if($result){
				$response = [ "result" => $result, "message" => "Deleted Successfully...!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*find Automation List Category
			18/4/2018
	 * @access public
	 * @param  get category Id
	 * @return array of 
	 */
	public function findAutomationListCategory_post($cid,$automationUsed) {
		 
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
			$data = $this->post();
			if($data['country_id']){
				$country_id= $data['country_id']; 
				$strWhere.= " AND automation_location_country = $country_id ";
			}
			if($data['state_id']){
				$state_id= $data['state_id']; 
				$strWhere.= " AND automation_location_state = $state_id ";
			} 
			if($data['city_id']){
				$city_id= $data['city_id']; 
				$strWhere.= " AND automation_location_city = $city_id ";
			} 
			if($data['brandId']){
				$brandId= $data['brandId']; 
				$strWhere.= " AND MD.brand_name = $brandId ";
			} 
			if($data['brand_model']){
				$brand_model= $data['brand_model']; 
				$strWhere.= " AND MD.model_no = $brand_model ";
			}   
			if($machinUsed=='new'){ $strWhere.=" AND  isUsed = 'N' ";}
			if($machinUsed=='used'){ $strWhere.=" AND isUsed = 'Y' ";}
			
			$result = $this->automation_model->findAutomationListCategory($strWhere);
			
			
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*find Automation List Category
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
			$result = $this->automation_model->findCategoryCount($cid, $machinUsed);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
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
	$this->form_validation->set_rules('ad_id', 'Automation Design ', 'trim|required');
		 
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
			$page_id = $this->automation_model->createGallery($data);
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
			$strWhere .= " AND ad_id = $id ";
			$response = [
				"result" => $this->automation_model->findMultipleGalleryImages($strWhere)
			];
		} 		
		$this->response($response, REST_Controller::HTTP_OK);
	}	
	
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
				"result" => $this->automation_model->delete_gallary($id),
				"message" => "Record deleted successfully."
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
	}
		/*remote Automation Class Schedule 
			18/4/2018
	 * @access public
	 * @param  update automation details
	 * @return array of post data
	 */
	public function findSingleAutomationDetailsFront_get($aid) {
		 
         if ($aid == FALSE) {
            $response = [
                "result" => false,
                'message' => "Please provide details id"
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {
		    // get input data
	 
			$result = $this->automation_model->findSingleAutomationDetailsFront($aid);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	public function findMultipleComapareAutomations_post(){
		$data  = $this->post();
		$automation_ids = $data['automation_ids'];
		if(!empty($data)){
			$strWhere = " FIND_IN_SET(ad.ad_id,'{$automation_ids}')";
			$result = $this->automation_model->findMultipleComapareAutomations($strWhere);
		}
		$this->response($result, REST_Controller::HTTP_OK);
	}
	/////////////////////////////    automation Finace Request  //////////////////////////////////
	/*automation Finace Request save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function automationFinaceRequestInsert_post() {
	 
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
			$result = $this->automation_model->automationFinaceRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Finance request sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }	
	/*automation Finace Request save
			19/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	public function automationContactRequestInsert_post() {
	 
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
			$result = $this->automation_model->automationContactRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Finance request sent successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		} 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	
	/*automation Finace contact Enquiry as per user 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationContactRequest_get($userid) {
		  
		    // get input data
		 
			$result = $this->automation_model->automationContactRequest($userid);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*automation Finace Request 
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationFinaceRequest_get() {
		  
		    // get input data
		 
			$result = $this->automation_model->automationFinaceRequest();
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function automationRequest_get() {
		  
		    // get input data	
		 
			$result = $this->automation_model->automationRequest();
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*automation  Request  
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationEnquiryRequest_post() {
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
		 
			$id = $this->automation_model->automationEnquiryRequest($data);
			if($id){
				$response = [ "result" => $id, "message" => "Automation Enquiry request sent Successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record...!! Please try again later"
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
////////////////////// automation Brand ////////////////////
	/*automation Brand Request save
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function automationBrandList_get() {
		  
		    // get input data 
			$result = $this->automation_model->findMultipleAutomationBrand();
			if($result){
				$response = [ "result" => $result, "message" => "Automation Brand Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	public function findSingleAutomationBrand_get($id) {
		  
		    // get input data 
			$result = $this->automation_model->findSingleAutomationBrand($id);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Brand Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*automation Brand Request save
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
		 
			$id = $this->automation_model->createBrand($data);
			if($id){
				$response = [ "result" => $id, "message" => "Automation Brand added Successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*update automation Brand   save
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function updateAutomationBrand_post() {
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
			$result = $this->automation_model->updateAutomationBrand($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Category updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*automation Brand delete
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function deleteAutomationBrand_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->automation_model->deleteAutomationBrand($id),
				"message" => "Record deleted successfully..!!"
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
////////////////////// automation Brand ////////////////////
	/*automation Brand Request save
			20/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function automationBrandModelList_get($brand_id='') {
			$strWhere='';
			if($brand_id){
				$strWhere=" brand_id = $brand_id ";
			}
		    // get input data 
			$result = $this->automation_model->findMultipleAutomationBrandModel($strWhere);
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
	public function findSingleAutomationBrandModel_get($id) {
		  
		    // get input data 
			$result = $this->automation_model->findSingleAutomationBrandModel($id);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Brand Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*automation Brand Request save
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
		 
			$id = $this->automation_model->createBrandModel($data);
			if($id){
				$response = [ "result" => $id, "message" => "Automation Brand added Successfully..!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to insert record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/*update automation Brand model  save
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function updateAutomationBrandModel_post() {
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
			$result = $this->automation_model->updateAutomationBrandModel($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Category updated successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/*automation Brand Model delete
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function deleteAutomationBrandModel_get($id) {
		if( !(int)$id){
			$response = [
				"result" => false,
				"message" => "Insufficient information provided.",
			];
		}
		else {
			$response = [
				"result" => $this->automation_model->deleteAutomationBrandModel($id),
				"message" => "Record deleted successfully..!!"
			];
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	/*automation comment Reply list
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function automationCommentReplyList_get($amid) {
 
		// get input data 
		$result = $this->automation_model->automationCommentReplyList($amid);
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
	/*automation comment Reply file list uploaded
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function automationCommentReplyFileList_get($arcid) {
 
		// get input data 
		$result = $this->automation_model->automationCommentReplyFileList($arcid);
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
	/*automation comment Reply 
			21/4/2018
	 * @access public
	 * @param   post data
	 * @return array  
	 */
	 
	public function addAutomationComment_post() {
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
			$result = $this->automation_model->addAutomationComment($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation Reply added successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to update record."
				];
			}
		}		
		$this->response($response, REST_Controller::HTTP_OK);
		
	}
	/* automation Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationContactRequestAdmin_get() {
		  
		    // get input data
		 
			$result = $this->automation_model->automationContactRequestAdmin();
			if($result){
				$response = [ "result" => $result, "message" => "Automation Data get.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Failed to retrive data."
				];
			}
		 
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* automation Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationVideoRequestInsert_post() {
		  
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
			$result = $this->automation_model->automationVideoRequestInsert($data);
			if($result){
				$response = [ "result" => $result, "message" => "Automation video Request added successfully.!!!!" ];
			} else {
				$response = [
					"result" => false,
					'message' => "Faild to add request."
				];
			}
		}	
		$this->response($response, REST_Controller::HTTP_OK);
    }
	/* automation Contact Request Admin
			19/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function automationVideoRequestList_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->automation_model->automationVideoRequestList($userid);
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
	public function automationVideoRequestListSupplier_get($userid) {
		 
		// get input data
		$data = $this->post();
		$result = $this->automation_model->automationVideoRequestListSupplier($userid);
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
	/* automation Contact Request Admin
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findMultipleVideoRequest_get() { 
			$response = [
				"result" => $this->automation_model->findMultipleVideoRequest()
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* get View automation List Ajax request data
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function findAutomationRecommendedListCategory_get($catId, $machinUsed='') { 
			 
			$response = [
				"result" => $this->automation_model->findAutomationRecommendedListCategory($catId, $machinUsed)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	/* get View automation List Ajax request data
		23/4/2018
	 * @access public
	 * @param   
	 * @return array  
	 */
	public function getViewautomationList_post() { 
			$data = $this->post();
			$response = [
				"result" => $this->automation_model->getViewautomationList($data)
			];
		 	
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function findMultipleSupplier_get( $strWhere = 1) {
			$response = [
				"result" => $this->automation_model->findMultipleSupplier($strWhere)
			];
		$this->response($response, REST_Controller::HTTP_OK);
	}
	public function assignSupplier_get() {
			$data = $this->get();
			$response = [
				"result" => $this->automation_model->assignSupplier($data)
			]; 
		$this->response($response, REST_Controller::HTTP_OK);
	}
	
	
}
?>