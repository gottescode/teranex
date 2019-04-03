<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Api extends API_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct();
        $this->load->model("pages_model");
    }

    //find single page data
    public function findSingle_get($page_id, $strWhere = 1) {

        if (!(int) $page_id) {
            $response = [
                "result" => false,
                "message" => "Insuffient information provided.",
            ];
        } else {
            $strWhere .= "  AND pg.id = $page_id ";
            $response = [
                "result" => $this->pages_model->findSingle($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function checkEmailIdExist_post() {
        $data = $this->post();
        $response = [
            "result" => $this->pages_model->checkEmailIdExist($data)
        ];
        //print_r($response['result']);exit;
        if ($response['result']) {
            $response = array("result" => "1", "message" => "Email-Id Already Exist");
        } else {
            $response = array("result" => "0");
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function checkCodeEmailIdExist_post() {
        $data = $this->post();
        $response = [
            "result" => $this->pages_model->checkCodeEmailIdExist($data)
        ];
        //print_r($response['result']);exit;
        if ($response['result']) {
            $response = array("result" => "1", "message" => "Email-Id Already Exist");
        } else {
            $response = array("result" => "0");
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //sign up Profile Data
    public function insertSignUpForm_post() {
        $this->form_validation->set_rules('s_email', 'Email Id Required', 'trim|required');
        $this->form_validation->set_rules('s_mobileno', 'MObile No Required', 'trim|required');
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
            $id = $this->pages_model->insertSignUpForm($data);

            if ($id==0) {
                $response = ["result" =>0];
            } else if($id==1) {
                $response = [ "result" =>1];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //forgot Password Data
    public function forgotPassword_post() {

        //echo 'hi api';die;
        $this->form_validation->set_rules('r_email', 'Email Id Required', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $response = [
                "result" => false,
                'message' => validation_errors()
            ];
            $this->response($response, REST_Controller::HTTP_OK);
            return;
        } else {

            // echo 'hi';die;
            // get input data
            $data = $this->post();
            $id = $this->pages_model->forgotPassword($data);
            //$id=$this->pages_model->forgotPasswordUser($data);
            if ((int) $id) {
                $response = ["result" => $id, "message" => "Profile updated successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Record not updated"
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //Check login frontend user
//    public function checkLogin_post() {
//        $this->form_validation->set_rules('u_email', 'Email Id Required', 'trim|required');
//        $this->form_validation->set_rules('u_password', 'Password No Required', 'trim|required');
//        if ($this->form_validation->run() == FALSE) {
//            $response = [
//                "result" => false,
//                'message' => validation_errors()
//            ];
//            $this->response($response, REST_Controller::HTTP_OK);
//            return;
//        } else {
//
//            // get input data
//            $data = $this->post();
//            
//           // print_r($data);die;
//            $id = $this->pages_model->checkLogin($data);
//            // print_r($id);die;
//            if ($id==3) {
//                $response = [
//                    "result" => false,
//                    'message' => "Your trial access is over,please contact us at support@stelmac.io for further details"
//                ];
//            } else if ((int) $id) {
//                $response = ["result" => $id, "message" => "Profile updated successfully."];
//            } else {
//                $response = [
//                    "result" => false,
//                    'message' => "Wrong Email ID or Password.Try again or click Reset password to reset it."
//                ];
//            }
//        }
//
//        $this->response($response, REST_Controller::HTTP_OK);
//    }
    
        public function checkLogin_post() {
        $this->form_validation->set_rules('u_email', 'Email Id Required', 'trim|required');
        $this->form_validation->set_rules('u_password', 'Password No Required', 'trim|required');
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

            // print_r($data);die;
            $id = $this->pages_model->checkLogin($data);
            //print_r($id);die;
            if ($id == 3) {
                $response = [
                    "result" => false,
                    'message' => "Your trial access is over,please contact us at support@stelmac.io for further details"
                ];
            } else if ((int) $id) {
                if ($id == 4) {
                    $response = [
                        "result" => false,
                        'message' => "Please active your account through your email address."
                    ];
                } else {
                    $response = ["result" => $id, "message" => "Profile updated successfully."];
                }
            } else {
                $response = [
                    "result" => false,
                    'message' => "Wrong Email ID or Password.Try again or click Reset password to reset it."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function checkLoginlinkedin_post() {

        $this->form_validation->set_rules('u_email', 'Email Id Required', 'trim|required');
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
            //   print_r($data);die;
            $id = $this->pages_model->checkLoginLinkedin($data);
            //print_r($id);exit;
            if ($id) {
                $response = ["result" => $id, "message" => "Profile updated successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Login Failed"
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Teranex Team
      27/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleTeam_get($id, $strWhere = 1) {

        if (!(int) $id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND team_id = $id ";
            $response = [
                "result" => $this->pages_model->findSingleTeam($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function findMultipleTeam_get($id = 0) {
        $strWhere = $this->get("strWhere");
        if (!$strWhere)
            $strWhere = 1;
        if ($id != 0) {
            $strWhere .= " and team_id <>$id";
        }
        $response = [
            "result" => $this->pages_model->findMultipleTeam($strWhere)
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function createTeam_post() {

        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');

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

            $page_id = $this->pages_model->createTeam($data);
            if ($page_id) {
                $response = ["result" => $page_id, "message" => "Record inserted successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to insert record."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function updateTeam_post() {
        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');
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
            $result = $this->pages_model->updateTeam($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Record updated successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to update record."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function deleteTeam_get($page_id) {
        if (!(int) $page_id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->deleteTeam($page_id),
                "message" => "Record deleted successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //
    public function updatePublishTeam_post() {
        $data = $this->post();
        if (!$data) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->updatePublishTeam($data),
                "message" => "Record updated successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Teranex  Advisory Board Team
      27/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleAdvisoryboardTeam_get($id, $strWhere = 1) {

        if (!(int) $id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND team_id = $id ";
            $response = [
                "result" => $this->pages_model->findSingleAdvisoryboardTeam($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function findMultipleAdvisoryboardTeam_get($id = 0) {
        $strWhere = $this->get("strWhere");
        if (!$strWhere)
            $strWhere = 1;
        if ($id != 0) {
            $strWhere .= " and team_id <>$id";
        }
        $response = [
            "result" => $this->pages_model->findMultipleAdvisoryboardTeam($strWhere)
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function createAdvisoryboardTeam_post() {

        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');

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

            $page_id = $this->pages_model->createAdvisoryboardTeam($data);
            if ($page_id) {
                $response = ["result" => $page_id, "message" => "Record inserted successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to insert record."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function updateAdvisoryboardTeam_post() {
        $this->form_validation->set_rules('name', 'Name Required', 'trim|required');
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
            $result = $this->pages_model->updateAdvisoryboardTeam($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Record updated successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to update record."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function deleteAdvisoryboardTeam_get($page_id) {
        if (!(int) $page_id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->deleteAdvisoryboardTeam($page_id),
                "message" => "Record deleted successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //
    public function updatePublishAdvisoryboardTeam_post() {
        $data = $this->post();
        if (!$data) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->updatePublishAdvisoryboardTeam($data),
                "message" => "Record updated successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* All categories
      27/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleAllcategorie_get($id, $strWhere = 1) {

        if (!(int) $id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND cat_id = $id ";
            $response = [
                "result" => $this->pages_model->findSingleAllcategorie($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function findMultipleAllcategorie_get($id = 0) {
        $strWhere = $this->get("strWhere");
        if (!$strWhere)
            $strWhere = 1;
        if ($id != 0) {
            $strWhere .= " and cat_id <>$id";
        }
        $response = [
            "result" => $this->pages_model->findMultipleAllcategorie($strWhere)
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function createAllcategorie_post() {

        $this->form_validation->set_rules('cat_name', 'Name Required', 'trim|required');

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

            $page_id = $this->pages_model->createAllcategorie($data);
            if ($page_id) {
                $response = ["result" => $page_id, "message" => "Record inserted successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to insert record."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function updateAllcategorie_post() {
        $this->form_validation->set_rules('cat_name', 'Name Required', 'trim|required');
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
            $result = $this->pages_model->updateAllcategorie($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Record updated successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to update record."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function deleteAllcategorie_get($page_id) {
        if (!(int) $page_id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->deleteAllcategorie($page_id),
                "message" => "Record deleted successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //
    public function updatePublishAllcategorie_post() {
        $data = $this->post();
        if (!$data) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->updatePublishAllcategorie($data),
                "message" => "Record updated successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Research added as per category  */

    public function findSingleSubCategorie_get($id, $strWhere = 1) {
        if (!(int) $id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND 	sub_cat_id = $id ";
            $response = [
                "result" => $this->pages_model->findSingleSubCategorie($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function findMultipleSubCategorie_get($id = 0, $front = '') {
        $strWhere = '1 ';
        if ($id != 0) {
            $strWhere .= " AND ACS.cat_id = $id";
        }
        if ($front != '') {
            //	$strWhere .= " AND  report_date >  '".date('Y-m-d')."'";
        }
        $response = [
            "result" => $this->pages_model->findMultipleSubCategorie($strWhere)
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* public function findMultipleAnalytics_get($id=0,$front='') { 

      if($id!=0){
      $strWhere .= "  ACS.analytics_category_id = $id";
      }
      if($front!=''){
      $strWhere .= " AND  updated_date >  '".date('Y-m-d')."'";
      }
      $response = [
      "result" => $this->research_model->findMultipleAnalytic($strWhere)
      ];

      $this->response($response, REST_Controller::HTTP_OK);
      } */

    public function createSubcat_post() {


        $this->form_validation->set_rules('subcat_name', 'Sub cat name  Required', 'trim|required');

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

            $page_id = $this->pages_model->createSubcat($data);
            if ($page_id) {
                $response = ["result" => $page_id, "message" => "Record inserted successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to insert record."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function addsubcribe_post() {

        $this->form_validation->set_rules('email_id', 'Email', 'trim|required');

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

            $page_id = $this->pages_model->addsubcribe($data);

            if ($page_id === -1) {
                $response = ["result" => $page_id, "message" => "Email-Id Already Subscribed."];
            } else if ($page_id) {
					$to = $data['email_id'];
                    $body = '<p>Hi, </p> ';
                    $body .= "<p>You have successfully subscribed with us.</p>";
                    $body .= '<a href= "' . addhttp($link) . '" alt="click Here">click Here</a>';
                    $email_content = $body;
                    $this->load->library('Email_PHPMailer');
                    $subject = 'Stelmac: NewsLetter';
                    $mailresponse = email_Send($subject, $to, $email_content, $name); 
				if($mailresponse)
				{
					  $response = ["result" => $page_id, "message" => "Email-Id Subscribed successfully."];
				}else{
					  $response = ["result" => $page_id, "message" => "Email-Id Sending Failed."];
					
				}
				
              
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to insert record."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function contactInsert_post() {


        $this->form_validation->set_rules('phone_no', 'Phone number', 'trim|required');
        $this->form_validation->set_rules('email_id', 'Email-Id', 'trim|required');
        $this->form_validation->set_rules('message', 'Message', 'trim|required');

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

            $page_id = $this->pages_model->contactInsert($data);
            if ($page_id) {
                $response = ["result" => $page_id, "message" => "Record inserted successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to insert record."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function updateSubcat_post() {

        $this->form_validation->set_rules('subcat_name', 'sub cat name  Required', 'trim|required');

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
            $result = $this->pages_model->updateSubcat($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Record updated successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to update record."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function deleteSubcat_get($page_id) {
        if (!(int) $page_id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->deleteSubcat($page_id),
                "message" => "Record deleted successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function updatePublishSubCat_post() {
        $data = $this->post();
        if (!$data) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->updatePublishSubCat($data),
                "message" => "Record updated successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Teranex FAQ'S
      27/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleFaq_get($id, $strWhere = 1) {

        if (!(int) $id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND faq_id = $id ";
            $response = [
                "result" => $this->pages_model->findSingleFaq($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function findMultipleFaq_get($id = 0) {
        $strWhere = $this->get("strWhere");
        if (!$strWhere)
            $strWhere = 1;
        if ($id != 0) {
            $strWhere .= " and faq_id <>$id";
        }
        $response = [
            "result" => $this->pages_model->findMultipleFaq($strWhere)
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function createFaq_post() {

        $this->form_validation->set_rules('faq_question', 'Faq Question is Required', 'trim|required');

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

            $page_id = $this->pages_model->createFaq($data);
            if ($page_id) {
                $response = ["result" => $page_id, "message" => "Record inserted successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to insert record."
                ];
            }
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function updateFaq_post() {
        $this->form_validation->set_rules('faq_question', 'Name Required', 'trim|required');
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
            $result = $this->pages_model->updateFaq($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Record updated successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to update record."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function deleteFaq_get($page_id) {
        if (!(int) $page_id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->deleteFaq($page_id),
                "message" => "Record deleted successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //
    public function updatePublishFaq_post() {
        $data = $this->post();
        if (!$data) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $response = [
                "result" => $this->pages_model->updatePublishFaq($data),
                "message" => "Record updated successfully."
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Menu List For admin Pannel */

    public function pagesList_get($strWhere = 1) {

        $strWhere .= "1";
        $response = [
            "result" => $this->pages_model->pagesList($strWhere)
        ];

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function update_post() {
        $this->form_validation->set_rules('id', 'Page ID', 'trim|required|numeric');
        $this->form_validation->set_rules('page_content', 'Page Content', 'trim|required');

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
            $result = $this->pages_model->update($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Record updated successfully."];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to update record."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /////////////////////////////    RFQ Submission Teranex  //////////////////////////////////
    /* RFQ Home Page
      30/07/2018
     * @access public
     * @param   post data
     * @return array  
     */
    public function rfqInsert_post() {

        $this->form_validation->set_rules('product_name', 'Name is Required', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'Product Quantity is Required', 'trim|required');
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
            $result = $this->pages_model->rfqInsert($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Request a Call sent successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to add request."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Request for Quotation
      31-07-2018
     * @access public
     * @param   
     * @return array  
     */

    public function requestforQuotation_get() {

        // get input data

        $result = $this->pages_model->requestforQuotation();

        if ($result) {
            $response = ["result" => $result, "message" => "Request a Quotation Data get.!!!!"];
        } else {
            $response = [
                "result" => false,
                'message' => "Failed to retrive data."
            ];
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    /////////////////////////////    Supplier Memebership //////////////////////////////////
    /* Supplier Memebership
      30/07/2018
     * @access public
     * @param   post data
     * @return array  
     */
    public function SupplierMembership_post() {

        $this->form_validation->set_rules('supplier_name', 'Supplier Name is Required', 'trim|required');

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
            $result = $this->pages_model->SupplierMembership($data);
            if ($result) {
                $response = ["result" => $result, "message" => "Supplier request sent successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to add request."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Supplier Memebership
      31-07-2018
     * @access public
     * @param   
     * @return array  
     */

    public function SupplierMembershipList_get() {

        // get input data

        $result = $this->pages_model->SupplierMembershipList();

        if ($result) {
            $response = ["result" => $result, "message" => "Supplier Request Data get.!!!!"];
        } else {
            $response = [
                "result" => false,
                'message' => "Failed to retrive data."
            ];
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    /////////////////////////////    Service Providers //////////////////////////////////
    /* Service Providers
      30/07/2018
     * @access public
     * @param   post data
     * @return array  
     */
    public function ServiceProviders_post() {

        $this->form_validation->set_rules('provider_name', 'Service Provider Name is Required', 'trim|required');

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
            $result = $this->pages_model->ServiceProviders($data);
            //print_r($result);exit;
            if ($result) {
                $response = ["result" => $result, "message" => "Service Provider  request sent successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to add request."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Supplier Memebership
      31-07-2018
     * @access public
     * @param   
     * @return array  
     */

    public function ServiceProvidersList_get() {

        // get input data
        $this->form_validation->set_rules('provider_name', 'Service Provider Name is Required', 'trim|required');
        $result = $this->pages_model->ServiceProvidersList();

        if ($result) {
            $response = ["result" => $result, "message" => "Service Provider Request Data get.!!!!"];
        } else {
            $response = [
                "result" => false,
                'message' => "Failed to retrive data."
            ];
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    /////////////////////////////   Get Paid For YourFeedback //////////////////////////////////
    /* Get Paid For YourFeedback
      17/08/2018
     * @access public
     * @param   post data
     * @return array  
     */
    public function PaidForYourFeedback_post() {

        $this->form_validation->set_rules('name', 'Name is Required', 'trim|required');
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
            $result = $this->pages_model->PaidForYourFeedback($data);
            //print_r($result);exit;
            if ($result) {
                $response = ["result" => $result, "message" => "Feedback request sent successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to add request."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Get Paid For YourFeedback
      17-08-2018
     * @access public
     * @param   
     * @return array  
     */

    public function PaidForYourFeedbackList_get() {

        // get input data

        $result = $this->pages_model->PaidForYourFeedbackList();

        if ($result) {
            $response = ["result" => $result, "message" => "Feedback Request Data get.!!!!"];
        } else {
            $response = [
                "result" => false,
                'message' => "Failed to retrive data."
            ];
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function PaidForYourFeedbackSingleDetails_get($id, $strWhere = 1) {
        if (!(int) $id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            $strWhere .= " AND tpf_id = $id ";
            $response = [
                "result" => $this->pages_model->PaidForYourFeedbackSingleDetails($strWhere)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /////////////////////////////    Report Abuse //////////////////////////////////
    /*  Report Abuse
      30/07/2018
     * @access public
     * @param   post data
     * @return array  
     */
    public function ReportAbuse_post() {

        $this->form_validation->set_rules('infringing_url', 'URL is Required', 'trim|required');

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
            $result = $this->pages_model->ReportAbuse($data);
            //print_r($result);exit;
            if ($result) {
                $response = ["result" => $result, "message" => "Report Abuse  request sent successfully.!!!!"];
            } else {
                $response = [
                    "result" => false,
                    'message' => "Faild to add request."
                ];
            }
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Report Abuse
      31-07-2018
     * @access public
     * @param   
     * @return array  
     */

    public function ReportAbuseList_get() {

        // get input data
        $this->form_validation->set_rules('infringing_url', 'Service Provider Name is Required', 'trim|required');
        $result = $this->pages_model->ReportAbuseList();

        if ($result) {
            $response = ["result" => $result, "message" => "Service Provider Request Data get.!!!!"];
        } else {
            $response = [
                "result" => false,
                'message' => "Failed to retrive data."
            ];
        }

        $this->response($response, REST_Controller::HTTP_OK);
    }

    /* Teranex Team
      27/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function SessionValue_get($id) {

        if (!(int) $id) {
            $response = [
                "result" => false,
                "message" => "Insufficient information provided.",
            ];
        } else {
            //echo $id;die;
            //$strWhere .= " AND uid = $id ";
            $response = [
                "result" => $this->pages_model->SessionValue($id)
            ];
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
        public function updateLinkedIn_post() {

        $data = $this->post();
        	//print_r($data);exit;
			$response = [
				"result" => $this->pages_model->updateLinkedIn($data)
			];
		
		$this->response($response, REST_Controller::HTTP_OK);
	}
        
           public function checkCompanyExist_post() {
        $data = $this->post();
        $response = [
            "result" => $this->pages_model->checkCompanyExist($data)
        ];
        //print_r($response['result']);exit;
        if ($response['result']) {
            $response = array("result" => "1", "message" => "Company  Already Exist");
        } else {
            $response = array("result" => "0");
        }
        $this->response($response, REST_Controller::HTTP_OK);
    }
    
    
    public function get_usertype_get() {

            $response = [
                "result" => $this->pages_model->fetchDataidWhr()
            ];
        
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function findSingleuserrole_get($user_role_id) {

            $strWhere .= "id = $user_role_id ";
            $response = [
                "result" => $this->pages_model->findSingleuserrole($strWhere)
            ];
 
        $this->response($response, REST_Controller::HTTP_OK);
    }

      public function findSingleusertype_get($user_type_id) {

            $strWhere .= "id = $user_type_id ";
            $response = [
                "result" => $this->pages_model->findSingleusertype($strWhere)
            ];
 
        $this->response($response, REST_Controller::HTTP_OK);
    }

}

?>
