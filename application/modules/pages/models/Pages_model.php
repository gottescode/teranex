<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pages_model extends CI_Model {

    // constructor of this class
    function __construct() {
        // call parent constructor 
        parent::__construct();
        $this->teams_path = "uploads/team/";
        $this->load->library("file_manager");
        $this->pages = "pages";

        $this->tableName = 'demo_users';
        $this->primaryKey = 'id';
    }

    // create signup 
    public function insertSignUpForm($data) {
        // print_r($data);die;
        $post_company_code = $data["company_id"];
        $post_email = $data["s_email"];

        if ($data["company_id"] != '') {
            //echo 'company_code';die;
            $company_codedata = $this->db_lib->fetchSingle("master_user", " company_code = '{$post_company_code}'");
            // print_r($company_codedata);
            $exist_code = $company_codedata['company_code'];
            $exist_email = $company_codedata['u_email'];
        }



        $dataS["u_user_type"] = $data["SignupType"];
        $dataS["country_name"] = $data["country"];
        $dataS["added_by"] = '0';
        $dataS["u_email"] = $data["s_email"];
        $dataS["u_mobileno"] = $data["s_mobileno"];
        $dataS["user_verify_code"] = $data["user_verify_code"];
        $dataS["user_type"] = $data["supplier"];

        $dataS["user_role"] = $data["artist_1"];
        $dataS["accept_marketing"] = $data["acceptAggrement"];

        if ($data["acceptReceive"] != '') {
            $dataS["accept_receive"] = 'Y';
        }

        $dataS["accept_receive"] = 'N';


        $dataS["u_password"] = md5($data["s_password"]);
        $dataS["added_id"] = 0;
        $dataS["u_mobile_verified"] = "Y";
        $dataS["u_entry_date"] = date('Y-mc-d');





        $datacid["company_id"] = $data["company_id"];

        $datacid["owner_id"] = $data["supplier"];
        /*         * * Wordpress Database User Insert *** */
        $dataw["user_login"] = $data["s_email"];
        $dataw["user_pass"] = md5($data["s_password"]);
        $dataw["user_email"] = $data["s_email"];
        $dataw["user_registered"] = date('Y-mc-d');

        //echo $exist_code.$post_company_code;die;
        if ($exist_code != '') {

            //  echo'hi update';die;  
            //$this->db_lib->update("ecommerce_users", $dataw, "user_email='$exist_email'");
            return $this->db_lib->update("master_user", $dataS, "u_email='$exist_email' AND company_code ='$post_company_code'");

            $resultDA = 1;
        } else {
            // echo'insert rc';die;

            $result = $this->db_lib->insert("master_user", $dataS);
            //$dataw['ID']=$result;
           // $resultDA = $this->db_lib->insert("ecommerce_users", $dataw);

            $sdata['uid'] = $result;

            //user details insert
            $datac['uid'] = $result;
            $datac["user_company_name"] = $data["company_name"];
            $datac["user_company_website"] = $data["company_website"];

            $resultDA = $this->db_lib->insert("user_details", $datac);

            if ($data["SignupType"] == 'S') {
                $sresult = $this->db_lib->insert("supplier_details", $sdata);
            }

            if ($data["SignupType"] == 'C') {
                $sresult = $this->db_lib->insert("customer_details", $sdata);
            }

            return $resultDA;
        }
    }

    // check login from master User
//    public function checkLogin($data) {
//        $u_email = $data["u_email"];
//        $sresult = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' ", "uid, u_email,is_active");
//        $isactive = $sresult['is_active'];
//        $u_password = md5($data["u_password"]);
//
//
//        $sresult = '';
//        if ($isactive['is_active'] == 1) {
//            $emailExit = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' AND u_password ='$u_password' AND is_active=1", "uid, u_email,u_user_type,user_type,user_role,u_name,u_password,u_parent_id,u_avatar,u_mobileno");
//            $updata['last_active'] = time();
//
//            if ($emailExit['uid']) {
//                $this->db_lib->update("master_user", $updata, "u_email='$u_email' AND u_password ='$u_password'  ");
//                $sresult = $emailExit;
//            }
//        } else if ($isactive['is_active'] == 2) {
//            // print_r($u_password.$u_email);die;
//            $sresult = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' AND u_password ='$u_password' AND is_active=2", "uid, u_email,u_user_type,user_type,user_role,u_name,u_password,u_parent_id,u_avatar,u_mobileno");
//
//            $updata['last_active'] = time();
//
//            if ($emailExit['uid']) {
//                $this->db_lib->update("master_user", $updata, "u_email='$u_email' AND u_password ='$u_password'  ");
//                $sresult = $emailExit;
//            }
//        } else if ($isactive['is_active'] == 0) {
//            //echo'failed';die;
//            $sresult = 3;
//        }
//
//
//        return $sresult;
//    }
    
    
    public function checkLogin($data) {
        $u_email = $data["u_email"];
        $sresult = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' ", "uid, u_email,is_active,email_actie_status");
        $isactive = $sresult['is_active'];
        $u_password = md5($data["u_password"]);
        $email_actie_status = $sresult["email_actie_status"]; 


        $sresult = '';
        if ($email_actie_status == 1) {
            if ($isactive['is_active'] == 1) {
                $emailExit = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' AND u_password ='$u_password' AND is_active=1", "uid, u_email,u_user_type,user_type,user_role,u_name,u_password,u_parent_id,u_avatar,u_mobileno");
                $updata['last_active'] = time();

                if ($emailExit['uid']) {
                    $this->db_lib->update("master_user", $updata, "u_email='$u_email' AND u_password ='$u_password'  ");
                    $sresult = $emailExit;
                }
            } else if ($isactive['is_active'] == 2) {
                // print_r($u_password.$u_email);die;
                $sresult = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' AND u_password ='$u_password' AND is_active=2", "uid, u_email,u_user_type,user_type,user_role,u_name,u_password,u_parent_id,u_avatar,u_mobileno");

                $updata['last_active'] = time();

                if ($emailExit['uid']) {
                    $this->db_lib->update("master_user", $updata, "u_email='$u_email' AND u_password ='$u_password'  ");
                    $sresult = $emailExit;
                }
            } else if ($isactive['is_active'] == 0) {
                //echo'failed';die;
                $sresult = 3;
            }
        } else {
            $sresult = 4;
        }

        return $sresult;
    }


    // linkedin login

    public function checkLoginLinkedin($data) {
        //print_r($data);die;
        $u_email = $data["u_email"];
        $sresult = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' ", "uid, u_email,is_active");
        $isactive = $sresult['is_active'];
        $sresult = '';
        if ($isactive['is_active'] == 1) {
            $emailExit = $this->db_lib->fetchSingle("master_user", "u_email='$u_email'AND is_active=1", "uid, u_email,u_user_type,user_type,user_role,u_name,u_password,u_parent_id,u_avatar,u_mobileno");
            $updata['last_active'] = time();

            if ($emailExit['uid']) {
                $this->db_lib->update("master_user", $updata, "u_email='$u_email'");
                $sresult = $emailExit;
            }
        } else if ($isactive['is_active'] == 2) {
            $sresult = $this->db_lib->fetchSingle("master_user", "u_email='$u_email' AND is_active=2", "uid, u_email,u_user_type,user_type,user_role,u_name,u_password,u_parent_id,u_avatar,u_mobileno");

            $updata['last_active'] = time();

            if ($emailExit['uid']) {
                $this->db_lib->update("master_user", $updata, "u_email='$u_email'");
                $sresult = $emailExit;
            }
        }


        return $sresult;
    }

    public function checkEmailIdExist($data) {
        $u_email = $data["s_email"];
        return $emailExit = $this->db_lib->fetchSingle("master_user", " u_email='$u_email' ", "uid, u_email, u_user_type, u_name ");
    }
    public function checkCompanyExist($data) {
        $company = $data["company"];
        return $emailExit = $this->db_lib->fetchSingle("user_details", " user_company_name='$company' ","uid,user_company_name");
    }

    public function checkCodeEmailIdExist($data) {
        $company_code = $data["company_code"];
        $company_email = $data["company_email"];
        return $emailExit = $this->db_lib->fetchSingle("master_user", " u_email='$company_email' AND company_code='$company_code' ", "uid");
    }

    public function update_user($emailId, $user_verify_code) {


        $this->db->where('u_email', $emailId);
        $this->db->where('user_verify_code', $user_verify_code);
        $data = array(
            'u_email_verified' => 'Y',
            'email_actie_status' => 1
            
        );
        return $this->db->update('master_user', $data);
    }
	public function zoomResponseUpdateVideoChatRequest($data) {
		$vcr_id = $data['vcr_id'];
		$data['status'] = 'QS';
		
		
		return $this->db_lib->update("video_chat_requests", $data, " vcr_id=$vcr_id ");
	}

    public function updateLinkedIn($data) 
    {
        if($data["supplier"]==3)
            {
            $dataud["user_company_type"]='Freelancer'; 
            }
            else
            {
               $dataud["user_company_type"]=$data["company_type"];     
                
            }
        $uid = $data["uid"];
       // $user_email = $data["user_email"];
        $datamu["u_name"] = $data["u_name"];
        $datamu["user_type"] =$data["supplier"];
        $datamu["user_role"] =1;
        $user_type =$data["supplier"];
        //$usertypedata = $this->db_lib->fetchSingle("user_type_master", "id='{$user_type}'","userType");
        //$dataeu["user_type"]=$data["supplier"];
        $dataud["LID"]=2;
        $dataud["GID"]=2;
        $dataud["user_company_name"]=$data["company_name"];     
        $this->db_lib->update("master_user",$datamu,"uid='$uid'");
       // $this->db_lib->update("ecommerce_users",$dataeu,"user_email='$user_email'");
        $result=$this->db_lib->update("user_details",$dataud,"uid='$uid'");
       
        return $result;
    }

    // create signup 
    public function forgotPassword($data) {
        //echo 'hi model';die;
        $emailExit = $this->db_lib->fetchSingle("master_user", "u_email='$data[r_email]'", "uid");
        if ($emailExit['uid'] > 0) {
            $updata["u_password"] = md5($data["r_password"]);
            //$updata_new["user_pass"] = md5($data["r_password"]);

           // $this->db_lib->update("ecommerce_users", $updata_new, "user_email='$data[r_email]'");
            return $this->db_lib->update("master_user", $updata, "u_email='$data[r_email]'");
        } else {
            $resultDA = '';
        }
        return $resultDA;
    }

    public function forgotPasswordUser($data) {
        //echo 'hi model';die;
/*        $emailExit = $this->db_lib->fetchSingle("ecommerce_users", "user_email='$data[r_email]'", "id");
        if ($emailExit['uid'] > 0) {
            $updata["user_pass"] = md5($data["r_password"]);
            return $this->db_lib->update("ecommerce_users", $updata, "user_email='$data[r_email]' ");
        } else {
            $resultDA = '';
        }
        return $resultDA;*/
    }

    /* Teranex Team
      06/06/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleTeam($strWhere = 1) {
        return $this->db_lib->fetchSingle('teranex_team', $strWhere, '');
    }

    public function findMultipleTeam($strWhere) {
        $result = $this->db_lib->fetchMultiple("teranex_team", $strWhere, ""); //exit; 
        return $result;
    }

    public function createTeam($arrData) {
        $arrData["updated_date"] = date('Y-m-d');
        $data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT, "", 1);
        if ($data1[0])
            $arrData["team_image"] = $data1[1];
        return $result = $this->db_lib->insert("teranex_team", $arrData);
    }

    public function updateTeam($arrData) {

        $arrData["updated_date"] = date('Y-m-d');
        $data = $this->file_manager->update('teranex_team', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
        if ($data[0])
            $arrData["team_image"] = $data[1];
        $result = $this->db_lib->update("teranex_team", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }

    public function deleteTeam($id) {

        $result = $this->db_lib->delete("teranex_team", "team_id = " . $id);
        if ($data)
            $this->file_manager->delete($this->teams_path, $data["team_image"]);
        return $result;
    }

    public function updatePublishTeam($data) {
        // get total records
        $ids = $data["team_id"];
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                // prepare data
                // publish
                if ($data["publish_$id"] == "Y")
                    $arrData["publish"] = "Y";
                else
                    $arrData["publish"] = "N";
                // update record
                //$arrData["display_order"]=$data["display_order_$id"];
                $result = $this->db_lib->update("teranex_team", $arrData, "team_id = " . $id);
            }
            return true;
        }
        return false;
    }

    /* Advisory Board  Team
      06/06/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleAdvisoryboardTeam($strWhere = 1) {
        return $this->db_lib->fetchSingle('teranex_advisoryboardteam', $strWhere, '');
    }

    public function findMultipleAdvisoryboardTeam($strWhere) {
        $result = $this->db_lib->fetchMultiple("teranex_advisoryboardteam", $strWhere, ""); //exit; 
        return $result;
    }

    public function createAdvisoryboardTeam($arrData) {
        $arrData["updated_date"] = date('Y-m-d');
        $data1 = $this->file_manager->upload('team_image', $this->teams_path, IMG_FORMAT, "", 1);
        if ($data1[0])
            $arrData["team_image"] = $data1[1];
        return $result = $this->db_lib->insert("teranex_advisoryboardteam", $arrData);
    }

    public function updateAdvisoryboardTeam($arrData) {

        $arrData["updated_date"] = date('Y-m-d');
        $data = $this->file_manager->update('teranex_advisoryboardteam', $this->teams_path, IMG_FORMAT, $arrData["old_image"]);
		
        if ($data[0])
            $arrData["team_image"] = $data[1];
        $result = $this->db_lib->update("teranex_advisoryboardteam", $arrData, "team_id = " . $arrData["id"]);
        return $result;
    }

    public function deleteAdvisoryboardTeam($id) {

        $result = $this->db_lib->delete("teranex_advisoryboardteam", "team_id = " . $id);
        if ($data)
            $this->file_manager->delete($this->teams_path, $data["team_image"]);
        return $result;
    }

    public function updatePublishAdvisoryboardTeam($data) {
        // get total records
        $ids = $data["team_id"];
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                // prepare data
                // publish
                if ($data["publish_$id"] == "Y")
                    $arrData["publish"] = "Y";
                else
                    $arrData["publish"] = "N";
                // update record
                //$arrData["display_order"]=$data["display_order_$id"];
                $result = $this->db_lib->update("teranex_advisoryboardteam", $arrData, "team_id = " . $id);
            }
            return true;
        }
        return false;
    }

    /* All categories
      06/06/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleAllcategorie($strWhere = 1) {
        return $this->db_lib->fetchSingle('teranex_all_categories', $strWhere, '');
    }

    public function findMultipleAllcategorie($strWhere) {
        $result = $this->db_lib->fetchMultiple("teranex_all_categories", $strWhere, ""); //exit; 
        return $result;
    }

    public function createAllcategorie($arrData) {
        $arrData["updated_date"] = date('Y-m-d');
        return $result = $this->db_lib->insert("teranex_all_categories", $arrData);
    }

    public function updateAllcategorie($arrData) {

        $arrData["updated_date"] = date('Y-m-d');
        $result = $this->db_lib->update("teranex_all_categories", $arrData, "cat_id = " . $arrData["id"]);
        return $result;
    }

    public function deleteAllcategorie($id) {

        $result = $this->db_lib->delete("teranex_all_categories", "cat_id = " . $id);
        return $result;
    }

    public function updatePublishAllcategorie($data) {
        // get total records
        $ids = $data["cat_id"];
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                // prepare data
                // publish
                if ($data["publish_$id"] == "Y")
                    $arrData["publish"] = "Y";
                else
                    $arrData["publish"] = "N";
                // update record
                //$arrData["display_order"]=$data["display_order_$id"];
                $result = $this->db_lib->update("teranex_all_categories", $arrData, "cat_id = " . $id);
            }
            return true;
        }
        return false;
    }

    /* Case Study CRUD operation */

    public function findSingleSubCategorie($strWhere = 1) {
        return $this->db_lib->fetchSingle('teranex_sub_categories', $strWhere, '');
    }

    public function findMultipleSubCategorie($strWhere) {
        $result = $this->db_lib->fetchMultiple("teranex_sub_categories ACS JOIN teranex_all_categories AC ON ACS.cat_id=AC.cat_id", $strWhere, "ACS.*,AC.cat_name"); //exit; 
        return $result;
    }

    public function createSubcat($arrData) {

        $arrData["updated_date"] = date('Y-m-d');
        return $rid = $this->db_lib->insert("teranex_sub_categories", $arrData);
    }

    public function updateSubcat($arrData) {
        $arrData["updated_date"] = date('Y-m-d');
        $result = $this->db_lib->update("teranex_sub_categories", $arrData, "sub_cat_id = " . $arrData["id"]);
        return $result;
    }

    public function deleteSubcat($id) {
        $data = $this->db_lib->fetchSingle("teranex_sub_categories", "sub_cat_id = $id");

        $result = $this->db_lib->delete("teranex_sub_categories", "sub_cat_id = " . $id);
        return $result;
    }

    public function updatePublishCaseStudy($data) {
        // get total records
        $ids = $data["sub_cat_id"];
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                // prepare data
                // publish
                if ($data["publish_$id"] == "Y")
                    $arrData["publish"] = "Y";
                else
                    $arrData["publish"] = "N";
                // update record
                //$arrData["display_order"]=$data["display_order_$id"];
                $result = $this->db_lib->update("teranex_sub_categories", $arrData, "sub_cat_id = " . $id);
            }
            return true;
        }
        return false;
    }

    /* Teranex FAQ
      30/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findSingleFaq($strWhere = 1) {
        return $this->db_lib->fetchSingle('teranex_faq', $strWhere, '');
    }

    public function findMultipleFaq($strWhere) {
        $result = $this->db_lib->fetchMultiple("teranex_faq", $strWhere, ""); //exit; 
        return $result;
    }

    public function createFaq($arrData) {
        $arrData["updated_date"] = date('Y-m-d');

        return $result = $this->db_lib->insert("teranex_faq", $arrData);
    }

    public function updateFaq($arrData) {

        $arrData["updated_date"] = date('Y-m-d');

        $result = $this->db_lib->update("teranex_faq", $arrData, "faq_id = " . $arrData["id"]);
        return $result;
    }

    public function deleteFaq($id) {

        $result = $this->db_lib->delete("teranex_faq", "faq_id = " . $id);
        return $result;
    }

    public function updatePublishFaq($data) {
        // get total records
        $ids = $data["faq_id"];
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                // prepare data
                // publish
                if ($data["publish_$id"] == "Y")
                    $arrData["publish"] = "Y";
                else
                    $arrData["publish"] = "N";
                // update record
                //$arrData["display_order"]=$data["display_order_$id"];
                $result = $this->db_lib->update("teranex_faq", $arrData, "faq_id = " . $id);
            }
            return true;
        }
        return false;
    }

    /* Pages Data */

    // master pages fetching single record 
    public function findSingle($strWhere = 1) {
        return $this->db_lib->fetchSingle($this->pages . " pg ", $strWhere, "pg.*");
    }

    // pages list for menu admin
    public function pagesList($strWhere = 1) {
        return $this->db_lib->fetchMultiple($this->pages . " pg ", $strWhere, "id,page_title");
    }

    //Update Page 
    public function update($arrData) {
        $result = $this->db_lib->update($this->pages, $arrData, "id = " . $arrData["id"]);
        return $result;
    }

    /////////////////////////////     Request for quotation //////////////////////////////////
    /* Request for quotation  save
      31/07/2018
     * @access public
     * @param   post data
     * @return inserted id  
     */
    public function rfqInsert($data) {

        $data['publish_date'] = date('Y-m-d H:i:s');
        $result = $this->db_lib->insert("teranex_quotation", $data);
        return $result;
    }

    /*  Request for quotation 
      22/5/2018
     * @access public
     * @param   
     * @return array  
     */

    public function requestforQuotation() {
        $result = $this->db_lib->fetchMultiple("teranex_quotation", $strWhere, ""); //exit; 
        return $result;
    }

    /////////////////////////////     Supplier Memebership //////////////////////////////////
    /* Supplier Memebership  save
      31/07/2018
     * @access public
     * @param   post data
     * @return inserted id  
     */
    public function SupplierMembership($data) {

        $data['publish_date'] = date('Y-m-d H:i:s');
        $result = $this->db_lib->insert("teranex_supplier_membership", $data);
        return $result;
    }

    /*  Supplier Memebership 
      31/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function SupplierMembershipList() {
        $result = $this->db_lib->fetchMultiple("teranex_supplier_membership", $strWhere, ""); //exit; 
        return $result;
    }

    /////////////////////////////     Service Providers  //////////////////////////////////
    /* Supplier Memebership  save
      31/07/2018
     * @access public
     * @param   post data
     * @return inserted id  
     */
    public function ServiceProviders($data) {

        $data['publish_date'] = date('Y-m-d H:i:s');
        $result = $this->db_lib->insert("teranex_service_provider", $data);
        return $result;
    }

    /*  Supplier Memebership 
      31/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function ServiceProvidersList() {
        $result = $this->db_lib->fetchMultiple("teranex_service_provider", $strWhere, ""); //exit; 
        return $result;
    }

    /* CONTACT US Form Data */

    public function contactInsert($data) {
        $data['created_date'] = date('Y-m-d');
        $result = $this->db_lib->insert("contact_us", $data);
        return $result;
    }

    public function addsubcribe($data) {
        $email = $data['email_id'];
        $result = $this->db_lib->fetchSingle("subscribe", "email_id='$email' ");
        if ($result) {
            $result = -1;
            return $result;
        } else {
            $result = $this->db_lib->insert("subscribe", $data);
            return $result;
        }
    }

    /////////////////////////////   Get Paid For YourFeedback //////////////////////////////////
    /* Get Paid For YourFeedback  save
      17/08/2018
     * @access public
     * @param   post data
     * @return inserted id  
     */
    public function PaidForYourFeedback($data) {

        $data['publish_date'] = date('Y-m-d H:i:s');
        $result = $this->db_lib->insert("teranex_paid_feedback", $data);
        return $result;
    }

    /* Get Paid For YourFeedback
      17/08/2018
     * @access public
     * @param   
     * @return array  
     */

    public function PaidForYourFeedbackList() {
        $result = $this->db_lib->fetchMultiple("teranex_paid_feedback", $strWhere, ""); //exit; 
        return $result;
    }

    public function PaidForYourFeedbackSingleDetails($strWhere = 1) {
        return $this->db_lib->fetchSingle('teranex_paid_feedback', $strWhere, '');
    }

    /////////////////////////////    Report Abuse //////////////////////////////////
    /* Report Abuse  save
      23/07/2018
     * @access public
     * @param   post data
     * @return inserted id  
     */
    public function ReportAbuse($data) {

        $data['publish_date'] = date('Y-m-d H:i:s');
        $result = $this->db_lib->insert("teranex_report_abuse", $data);
        return $result;
    }

    /*  Report Abuse
      23/07/2018
     * @access public
     * @param   
     * @return array  
     */

    public function ReportAbuseList() {
        $result = $this->db_lib->fetchMultiple("teranex_report_abuse", $strWhere, ""); //exit; 
        return $result;
    }

    // user_type
    // public function user_type_master($id)
    // {
    //   $this->db->select("*");
    //   $this->db->from("role_master");
    //   $this->db->where('id != ', 9);
    //   $query = $this->db->get();
    // // echo $this->db->last_query();die;
    //   return $query->result();
    // }
    // public function user_type_master2($id)
    // {
    //   $this->db->select("*");
    //   $this->db->from("role_master");
    //   $this->db->where('id != ', 1);
    //   $query = $this->db->get();
    // // echo $this->db->last_query();die;
    //   return $query->result();
    // }


    public function Add_data($tablename, $data) {
        $query = $this->db->insert($tablename, $data);
        // $user_id = $this->db->insert_id();
        // echo $this->$db->last_query();die;
        if ($query) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    public function fetchDataDESC($table_name, $id) {
        $this->db->select('*')->from($table_name)->where($id);
        $qry = $this->db->get();
        if ($qry->num_rows() > 0) {
            foreach ($qry->result() as $row) {
                $tbl_data[] = $row;
            } return $tbl_data;
        } else {
            return false;
        }
    }

    public function selectAllWhr($tblname, $where, $condition, $where_email, $condition_email) {
        $this->db->where($where, $condition);
        $this->db->where($where_email, $condition_email);
        $query = $this->db->get($tblname);
        //echo $this->db->last_query();die;
        if (!empty($query->result_array())) {
            return 1;
        } else {
            return 0;
        }
    }
    public function selectAllWhrSingle($tblname, $where, $condition) {
        $this->db->where($where, $condition);
        $query = $this->db->get($tblname);
       // echo $this->db->last_query();die;
        if (!empty($query->result_array())) {
            return 1;
        } else {
            return 0;
        }
    }

    public function fetchDataidWhr() {
        $qry = $this->db->query("SELECT * FROM `user_type_master`
ORDER BY `user_type_master`.`id`  ASC");
        //   print_r($qry->result_array());
        // return $qry->result_array();

        if ($qry->num_rows() > 0) {
            foreach ($qry->result() as $row) {
                $tb1_data[] = $row;
            }
            //print_r($tb1_data);
            return $tb1_data;
        } else {
            return false;
        }
        //return $tb1_data->result_array();
    }

    public function user_type_master($id) {
        $qry = $this->db->query("  SELECT rm.roleName,rm.id FROM  usertype_role_association a,role_master rm,user_type_master utm  where a.usertype_id=utm.id and a.role_id=rm.id

          and utm.id=$id");
        //   print_r($qry->result_array());
        // return $qry->result_array();

        if ($qry->num_rows() > 0) {
            foreach ($qry->result() as $row) {
                $tb1_data[] = $row;
            }
            //print_r($tb1_data);
            return $tb1_data;
        } else {
            return false;
        }
        //return $tb1_data->result_array();
    }

    public function checkUser($data = array()) {
        $this->db->select($this->primaryKey);
        $this->db->from($this->tableName);
        $this->db->where(array('oauth_provider' => $data['oauth_provider'], 'oauth_uid' => $data['oauth_uid']));
        $prevQuery = $this->db->get();
        $prevCheck = $prevQuery->num_rows();

        if ($prevCheck > 0) {
            $prevResult = $prevQuery->row_array();
            $data['modified'] = date("Y-m-d H:i:s");
            $update = $this->db->update($this->tableName, $data, array('id' => $prevResult['id']));
            $userID = $prevResult['id'];
        } else {
            $data['created'] = date("Y-m-d H:i:s");
            $data['modified'] = date("Y-m-d H:i:s");
            $insert = $this->db->insert($this->tableName, $data);
            $userID = $this->db->insert_id();
        }

        return $userID ? $userID : FALSE;
    }

    public function updateDetails($tblname, $where, $condition, $data) {
        $this->db->where($where, $condition);
        $query = $this->db->update($tblname, $data);
        //  echo $this->db->last_query();die;
        return $query;
        //echo $query;
    }

    public function fetchData() {
        $qry = $this->db->query("SELECT * FROM mst_country");
        //   print_r($qry->result_array());
        // return $qry->result_array();

        if ($qry->num_rows() > 0) {
            foreach ($qry->result() as $row) {
                $tb1_data[] = $row;
            }
            //print_r($tb1_data);
            return $tb1_data;
        } else {
            return false;
        }
        //return $tb1_data->result_array();
    }

    public function fetchUserCountData($email) {
        $qry = $this->db->query("SELECT  COUNT(*) AS count FROM master_user where u_email='$email'");
        if ($qry->num_rows() > 0) {
            foreach ($qry->result() as $row) {
                $tb1_data[] = $row;
            }
            //print_r($tb1_data);
            return $tb1_data;
        } else {
            return false;
        }
    }

    public function selectAllWhrNew($tblname, $where, $condition) {
        if (isset($condition)) {
            $result = $this->db_lib->fetchSingle("{$tblname}", " uid = {$condition} ");
            return $result['result'] = $result;
        }
    }

    public function SessionValue($id) {

        $result = $this->db_lib->fetchSingle("master_user", " uid = {$id}");
        return $result['result'] = $result;
    }


    public function findSingleuserrole($strWhere = 1) {
        return $this->db_lib->fetchSingle('role_master', $strWhere, '');
    }

     public function findSingleusertype($strWhere = 1) {
        return $this->db_lib->fetchSingle('user_type_master', $strWhere, '');
    }

     /* Get All Video Chat Request 
       20-11-2018
     * @access public
     * @param   
     * @return array  
     */

    public function VideoChatRequestList() {
        $result = $this->db_lib->fetchMultiple("video_chat_requests VCR LEFT JOIN master_user as MU ON MU.uid=VCR.customer_id", $strWhere, "VCR.*,MU.u_name"); //exit; 
        return $result;
    }




}

?>
