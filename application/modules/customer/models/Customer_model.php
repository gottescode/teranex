<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Customer_model extends CI_Model {

    // constructor of this class

    function __construct() {

        // call parent constructor
        $this->customer_path = "uploads/customer/";
        $this->load->library("file_manager");
        $this->customer_details = "customer_details";
        $this->machine_path = "uploads/machine/";
        $this->machine_order_path = "uploads/machine_order/";
        $this->machine_category = "machine_category";
        define('RESIZEWIDTH', '1600');
        define('RESIZEHIGHT', '900');
        parent::__construct();
    }
	

    public function findSingle($strWhere = 1) {
        return $this->db_lib->fetchSingle('user_details UD JOIN master_user MU ON UD.uid=MU.uid', $strWhere, 'UD.*,MU.u_avatar, MU.u_name, MU.u_email,MU.u_mobileno,MU.user_type, MU.u_date_birth, MU.specific_interests, MU.user_resume, MU.profile_summary');
    }

// get chat list


  

    // fecthing multiple customer user list

    public function findMultiple($strWhere) {

        $result = $this->db_lib->fetchMultiple("master_user", $strWhere, ""); //exit; 

        return $result;
    }

    // get chat users
    
             public function findMultipleUsers() 
    {
        $result = $this->db_lib->fetchMultiple("master_user", "");
        return $result;
    }
    


    // fecthing multiple customer user list

    public function findMultipleExpertRequestList($strWhere) {

        $table = "expert_request as er LEFT JOIN master_user as Mu ON Mu.uid = er.user_id";

        $select = "er.*,Mu.u_name as customerName,Mu.u_email as customerEmail";

        $result = $this->db_lib->fetchMultiple($table, $strWhere, $select); //exit; 

        return $result;
    }

    // fecthing multiple customer user list

    public function findMultipleRemoteApplicationRequestList($strWhere) {

        $table = "remote_application_request as rar LEFT JOIN master_user as Mu ON Mu.uid = rar.user_id";

        $select = "rar.*,Mu.u_name as customerName,Mu.u_email as customerEmail";

        $result = $this->db_lib->fetchMultiple($table, $strWhere, $select); //exit; 

        return $result;
    }

    public function xpertMeetingListConsultant($strWhere) {

        $select = "er.topic_discussion as topicDiscussion,er.date_pref as preferredDate,er.created_date as createdDate,er.start_url as launchUrl,er.join_url as joinUrl";

        $result = $this->db_lib->fetchMultiple("expert_request as er", $strWhere, $select); //exit; 

        return $result;
    }

    /* Remote Machine Service List */

    public function remoteServiceCustomerRequestList($strWhere = 1) {

        $table = " remote_machine_aggrement_request as RMAR LEFT JOIN master_user as MU ON RMAR.user_id=MU.uid LEFT JOIN master_user as MAU ON RMAR.consultant_id=MAU.uid LEFT JOIN remote_machine_service_invoice as rmsi ON rmsi.rmr_id=RMAR.rmr_id ";

        $select = " RMAR.*,MAU.u_name as consultant_name,MU.u_name as user_Name,rmsi.final_invoice as final_invoice ";

        return $result = $this->db_lib->fetchMultiple($table, $strWhere . " ORDER BY rmr_id DESC", $select);
    }

    /* REQUEST LIST OF PERTICULAR CONSULTANT */

    public function remoteApplicationServicesBySupport($strWhere) {

        $table = " remote_application_aggrement_request_consultant as raac LEFT JOIN remote_application_aggrement_request as raar ON raac.remote_application_id = raar.rar_id LEFT JOIN master_user as mu ON raar.user_id=mu.uid ";

        $select = " raac.*,raar.*,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";

        $result = $this->db_lib->fetchMultiple($table, $strWhere, $select);

        return $result;
    }

    public function findMultipleAddress($strWhere) {

        $result = $this->db_lib->fetchMultiple("user_details", $strWhere, ""); //exit; 

        return $result;
    }

    public function create($arrData) {

        $count = $arrData['image_id'];

        $arrData["creation_date"] = date('Y-m-d');

        $data1 = $this->file_manager->upload('project_image', $this->customer_path, IMG_FORMAT, "", 1);

        if ($data1[0])
            $arrData["project_image"] = $data1[1];



        $customer_id = $this->db_lib->insert("customer_details", $arrData);

        $count = $arrData['cust_address1'];

        for ($j = 0; $j < count($count); $j++) {

            if ($arrData['cust_address1'][$j] != '') {

                $address = array();

                $address['cust_address1'] = $arrData['cust_address1'][$j];

                $address['cust_address2'] = $arrData['cust_address2'][$j];

                $address['cust_country'] = $arrData['countryAddress'][$j];

                $address['cust_state'] = $arrData['stateAddress'][$j];

                $address['cust_city'] = $arrData['cityAddress'][$j];

                $address['cust_landmark'] = $arrData['cust_landmark'][$j];

                $address['cust_pincode'] = $arrData['cust_pincode'][$j];

                $address['customer_id'] = $customer_id;

                $result = $this->db_lib->insert("customer_address", $address);



                $address = "";
            }
        }

        return $customer_id;

        //}
        //  return false;
        //}
        //  return false;
    }

    public function createRemoteServiceInvoice($arrayData) {

        $arrayData['start_date'] = date_ymd($arrayData['start_date']);

        $arrayData['end_date'] = date_ymd($arrayData['end_date']);

        $arrayData['created_date'] = date('Y-m-d H:i:s');

        return $result = $this->db_lib->insert("remote_application_aggrement_invoice", $arrayData);
    }

    public function update($arrData) {

        $data = $this->file_manager->update('project_image', $this->customer_path, IMG_FORMAT, $arrData["old_image"], 1);

        if ($data[0])
            $arrData["project_image"] = $data[1];





        //insert extra address

        $count = $arrData['cust_address1'];

        for ($j = 0; $j < count($count); $j++) {

            if ($arrData['cust_address1'][$j] != '') {

                $address = array();

                $address['cust_address1'] = $arrData['cust_address1'][$j];

                $address['cust_address2'] = $arrData['cust_address2'][$j];

                $address['cust_country'] = $arrData['countryAddress'][$j];

                $address['cust_state'] = $arrData['stateAddress'][$j];

                $address['cust_city'] = $arrData['cityAddress'][$j];

                $address['cust_landmark'] = $arrData['cust_landmark'][$j];

                $address['cust_pincode'] = $arrData['cust_pincode'][$j];

                $address['customer_id'] = $arrData["id"];

                $result = $this->db_lib->insert("customer_address", $address);



                $address = "";
            }
        }





        //Update Records

        $count = $arrData['updateaddress1'];

        for ($j = 0; $j < count($count); $j++) {

            if ($arrData['updateaddress1'][$j] != '') {

                $upaddress = array();

                $upaddress['cust_address1'] = $arrData['updateaddress1'][$j];

                $upaddress['cust_address2'] = $arrData['updateaddress2'][$j];

                $upaddress['cust_country'] = $arrData['updatecountryAddress'][$j];

                $upaddress['cust_state'] = $arrData['updateStateAddress'][$j];

                $upaddress['cust_city'] = $arrData['updateCityAddress'][$j];

                $upaddress['cust_landmark'] = $arrData['updateLandmark'][$j];

                $upaddress['cust_pincode'] = $arrData['updatePincode'][$j];

                $result = $this->db_lib->update("customer_address", $upaddress, "customer_addrescust_id=" . $arrData['addressId'][$j]);



                $upaddress = "";
            }
        }







        $result = $this->db_lib->update("customer_details", $arrData, "customer_id = " . $arrData["id"]);

        return $result;
    }

    public function deleteCustomer($id) {

        $data = $this->db_lib->fetchSingle("master_user", "uid = $id");

        if ($data)
            $this->file_manager->delete($this->customer_path, $data["u_avatar"]);



        $result = $this->db_lib->delete("master_user", "uid = " . $id);

        return $result;
    }

    public function updatePublishCustomer($data) {

        // get total records

        $ids = $data["id"];

        if (count($ids) > 0) {

            foreach ($ids as $id) {

                // prepare data
                // publish

                if ($data["publish_$id"] == "Y")
                    $arrData["u_access"] = "Y";
                else
                    $arrData["u_access"] = "N";

                // update record

                $result = $this->db_lib->update("master_user", $arrData, "uid = " . $id);
            }

            return true;
        }

        return false;
    }

    public function accpetRequestByConsultant($expert_id) {

        $arrData['is_accepted_by_consultant'] = 'Y';

        return $result = $this->db_lib->update("expert_request", $arrData, " expert_id = " . $expert_id);
    }

    public function accpetRequestByConsultantRemoteApplication($remote_id) {

        $arrData['is_accepted_by_consultant'] = 'Y';

        return $result = $this->db_lib->update("remote_application_request", $arrData, " remote_id = " . $remote_id);
    }

    public function zoomResponseUpdate($data) {

        $data['meeting_status'] = 'Y';

        return $result = $this->db_lib->update("expert_request", $data, " expert_id = " . $data['expert_id']);
    }

    public function zoomResponseUpdateRemoteApplication($data) {

        $data['meeting_status'] = 'Y';

        return $result = $this->db_lib->update("remote_application_request", $data, " remote_id = " . $data['remote_id']);
    }

    public function rejectRequestByConsultant($expert_id) {

        $arrData['is_accepted_by_consultant'] = 'N';

        return $result = $this->db_lib->update("expert_request", $arrData, " expert_id = " . $expert_id);
    }

    public function rejectRequestByConsultantRemoteApplication($remote_id) {

        $arrData['is_accepted_by_consultant'] = 'N';

        return $result = $this->db_lib->update("remote_application_request", $arrData, " remote_id = " . $remote_id);
    }

    public function updateDetails($arrData) {

        if ($arrData['btnDocument'] != '') {

       //echo'hi doc';die;

            $gst = $this->file_manager->update('GSTINImg', $this->customer_path, IMG_FORMAT, $arrData["old_gst"]);

            if ($gst[0])
                $arrData["user_gst_image"] = $gst[1];



            $pan = $this->file_manager->update('PANImg', $this->customer_path, IMG_FORMAT, $arrData["old_pan"]);

            if ($pan[0])
                $arrData["user_pan_image"] = $pan[1];



            $logo = $this->file_manager->update('CompanyLogo', $this->customer_path, IMG_FORMAT, $arrData["old_logo"]);

            if ($logo[0])
                $arrData["user_company_logo"] = $logo[1];



            $cert = $this->file_manager->update('CompanyIncorp', $this->customer_path, IMG_FORMAT, $arrData["old_certificate"]);

            if ($cert[0])
                $arrData["user_certificate"] = $cert[1];
        }

        $user_profile = $this->file_manager->update('userProfile', $this->customer_path, IMG_FORMAT, $arrData["old_user_profile"]);

        if ($user_profile[0])
            $arrUserData["u_avatar"] = $user_profile[1];
            //$arrEUserData["u_avatar"] = $user_profile[1];

            $user_email=$arrData["email"];
            
           // print_r($arrData["email"]);
        $arrUserData["u_date_birth"] = $arrData['u_date_birth'];
        $arrUserData["qualification"] = $arrData['qualification'];
        $arrUserData["c_work_experiance"] = $arrData['c_work_experiance'];
        $arrUserData["u_mobileno"] = $arrData['u_mobileno'];
        $arrUserData["u_name"] = $arrData['u_name'];
        $arrUserData["profile_summary"] = $arrData['profile_summary'];
        $arrData["language"] = implode(",", $arrData['languages']);

        $arrUserData["uid"] = $arrData['uid'];
        $arrData['uid']=$arrData['uid'];

//print_r($arrUserData);die;

        if (!empty($_FILES['userResume']['tmp_name'])) {

            $user_resume = $this->file_manager->update('userResume', $this->customer_path, MIX_FORMAT, $arrData["old_userResume"]);



            if ($user_resume[0])
                $arrUserData["user_resume"] = $user_resume[1];
        }

        $specific_interests = $arrData['specificInterests'];

        $arrUserData["specific_interests"] = implode(",", $arrData['specificInterests']);


        $userExit = $this->db_lib->fetchSingle('user_details', "uid = " . $arrData["uid"],'uid');
        $userdetails = $this->db_lib->fetchSingle('master_user', "uid = " . $arrData["uid"],'user_type,u_name');
        
              $arrECUserData["user_type"] = $userdetails['user_type'];
              //$arrEUserData["display_name"] = $userdetails['u_name'];
           $usertype = $this->db_lib->fetchSingle('user_type_master', "id = " .$arrECUserData["user_type"],'userType');
              //$arrEUserData["user_type"] = $usertype['userType'];


        if ($userExit['uid']) {
            $resultUpdate = $this->db_lib->update("user_details", $arrData, "uid = ".$arrData["uid"]);
           //  print_r($resultUpdate);die;


            if ($arrUserData) {
//print_r($arrUserData);exit;
                $result = $this->db_lib->update("master_user", $arrUserData, "uid=".$arrData["uid"]);
               // $result = $this->db_lib->update("ecommerce_users", $arrEUserData, "user_email="."'$user_email'");
            }

            return $resultUpdate;
        } else {
            echo 'hi';die;

            $result = $this->db_lib->insert("user_details", $arrData);
            return true;
        }

        if ($arrData['addressId']) {



            $ids = $arrData['addressId'];

            if (count($ids) > 0) {

                foreach ($ids as $id) {



                    // publish

                    if ($arrData["address1_$id"])
                        $addData["address1"] = $arrData["address1_$id"];



                    if ($arrData["address2_$id"])
                        $addData["address2"] = $arrData["address2_$id"];



                    if ($arrData["country_name_$id"])
                        $addData["country"] = $arrData["country_name_$id"];



                    if ($arrData["state_name_$id"])
                        $addData["state"] = $arrData["state_name_$id"];



                    if ($arrData["city_name_$id"])
                        $addData["city"] = $arrData["city_name_$id"];



                    // update record

                    $this->db_lib->update("user_address", $addData, "u_address_id = " . $id);
                }

                return true;
            }
        }

        if ($arrData['contactId']) {

            $ids = $arrData['contactId'];

            if (count($ids) > 0) {

                foreach ($ids as $id) {

                    // publish

                    if ($arrData["email_id_$id"])
                        $contData["email_id"] = $arrData["email_id_$id"];



                    if ($arrData["office_phone_no_$id"])
                        $contData["office_phone_no"] = $arrData["office_phone_no_$id"];



                    if ($arrData["contact_person_name_$id"])
                        $contData["contact_person_name"] = $arrData["contact_person_name_$id"];





                    // update record

                    $this->db_lib->update("user_address", $contData, "uc_id = " . $id);
                }

                return true;
            }
        }

        return $result;
    }

    /**

     * Update Password

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function updatePasswords($data) {
        //print_r($data['new_password']);
        $user_id = $data['uid'];
        $oldpassword = md5($data["u_password"]);
        $passwordmatch = $this->db_lib->fetchSingle('master_user', "uid = " . $user_id);
        //print_r($passwordmatch['u_email']);die;
        $user_email=$passwordmatch['u_email'];
        $db_password = $passwordmatch['u_password'];
        if ($oldpassword === $db_password) {
            //print_r($data["newpassword"]);exit;
            $arrData['u_password'] = md5($data["newpassword"]);
            $updata_new["user_pass"] = md5($data["newpassword"]); 
			
	    $this->db_lib->update("ecommerce_users",$updata_new,"user_email='$user_email'" ); 
            $result = $this->db_lib->update("master_user", $arrData, "uid = " . $passwordmatch['uid']);
            return $result;
        } else {
            return false;
        }
    }

    // adding address to user address table

    public function addAddress($arrData) {
        //print_r($arrData);exit;
        $arrData["update_date"] = date('Y-m-d');
        $arrData["entry_date"] = date('Y-m-d');
        $result = $this->db_lib->insert("user_address", $arrData);
        return $result;
    }

    // adding address to user address table

    public function updateAddress($arrData) {

        $arrData["update_date"] = date('Y-m-d');

        $result = $this->db_lib->update("user_address", $arrData, "u_address_id = " . $arrData['u_address_id']);

        return $result;
    }

    // address list as per user ID

    public function findAddressList($strWhere) {

        $result = $this->db_lib->fetchMultiple("user_address UA LEFT JOIN mst_country MC ON UA.country=MC.id LEFT JOIN mst_states MS ON UA.state=MS.sid	LEFT JOIN mst_cities MCI ON UA.city=MCI.id ", $strWhere, "UA.*, MC.country_name,MS.state_name,MCI.city_name");

        return $result;
    }

    // delete Address  

    public function addressDelete($id) {

        $result = $this->db_lib->delete("user_address", "u_address_id = " . $id);

        return $result;
    }

    public function findAddress($strWhere = 1) {

        return $this->db_lib->fetchSingle('user_address', $strWhere, '');
    }

    // user Other Document Upload

    public function otherDocument($arrData) {

        $arrData["entry_date"] = date('Y-m-d');

        $data1 = $this->file_manager->upload('UploadedFile', "uploads/user_document/", MIX_FORMAT, "");

        if ($data1[0]) {

            $arrData["uplodded_file"] = $data1[1];



            return $customer_id = $this->db_lib->insert("user_other_document", $arrData);
        }
    }

    // Document list as per user ID

    public function otherDocumentList($strWhere) {

        $result = $this->db_lib->fetchMultiple("user_other_document ", $strWhere, "");

        return $result;
    }

    // delete Document file

    public function otherDocumentDelete($id) {

        $data = $this->db_lib->fetchSingle("user_other_document", "uod_id = $id");

        if ($data)
            $this->file_manager->delete("uploads/user_document/", $data["uplodded_file"]);



        $result = $this->db_lib->delete("user_other_document", "uod_id = " . $id);

        return $result;
    }

    /* contact Details CRUD */

    public function addContact($arrData) {

        $arrData["update_date"] = date('Y-m-d');

        $result = $this->db_lib->insert("user_contact", $arrData);

        return $result;
    }

    // adding contact to user contact table

    public function updateContact($arrData) {

        $arrData["update_date"] = date('Y-m-d');

        $result = $this->db_lib->update("user_contact", $arrData, "uc_id = " . $arrData['uc_id']);

        return $result;
    }

    // contact list as per user ID

    public function findContactList($strWhere) {

        $result = $this->db_lib->fetchMultiple("user_contact UA  ", $strWhere, "UA.*");

        return $result;
    }

    // delete contact  

    public function contactDelete($id) {

        $result = $this->db_lib->delete("user_contact", "uc_id = " . $id);

        return $result;
    }

    //find single contact details

    public function findContact($strWhere = 1) {

        return $this->db_lib->fetchSingle('user_contact', $strWhere, '');
    }

    /**

     * attendee user List

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function attendeeList($strWhere) {

        return $this->db_lib->fetchMultiple('master_user', $strWhere, '');
    }

    /**

     * attendee user List

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function attendeeAdd($arrData) {



        $arrData["u_entry_date"] = date('Y-m-d');

        $arrData["u_update_date"] = date('Y-m-d');

        $emailExit = $this->db_lib->fetchSingle("master_user", "u_email='$arrData[u_email]'", "uid");

        if ($emailExit['uid'] > 0) {

            $resultDA = 'E';
        } else {



            $data1 = $this->file_manager->upload('uAvatar', $this->customer_path, IMG_FORMAT, "");

            if ($data1[0])
                $arrData["u_avatar"] = $data1[1];



            $resultDA = $this->db_lib->insert('master_user', $arrData);
        }



        return $resultDA;
    }

    /**

     * attendee user delete

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function attendeeDelete($id) {

        $data = $this->db_lib->fetchSingle("master_user", "uid = $id");

        if ($data)
            $this->file_manager->delete($this->customer_path, $data["u_avatar"]);



        $result = $this->db_lib->delete("master_user", "uid = " . $id);

        return $result;
    }

    /**

     *  Trainee / Consultant user List

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function traineeList($strWhere) {

        return $this->db_lib->fetchMultiple('master_user', $strWhere, '');
    }

    /**

     *  Trainee / Consultant user List

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function traineeAdd($arrData) {

  //   print_r($arrData);die;

        $arrData["u_entry_date"] = date('Y-m-d');

        $arrData["u_update_date"] = date('Y-m-d');

        $emailExit = $this->db_lib->fetchSingle("master_user", "u_email='$arrData[u_email]'", "uid");

        if ($emailExit['uid'] > 0) {

            $resultDA = 'E';
        } else {



            $data1 = $this->file_manager->upload('uAvatar', $this->customer_path, IMG_FORMAT, "");

            if ($data1[0])
                $arrData["u_avatar"] = $data1[1];



            $resultDA = $this->db_lib->insert('master_user', $arrData);
        }



        return $resultDA;
    }

    /**

     *  Trainee / Consultant user delete

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function traineeDelete($id) {
        /* $data = $this->db_lib->fetchSingle("master_user", "uid = $id");
          if($data)
          $this->file_manager->delete($this->customer_path, $data["u_avatar"]); */

        $result = $this->db_lib->delete("master_user", "uid = " . $id);
        return $result;
    }

    /**

     *  course Enrollment

     * 

     * @access public

     * @param  userId

     * @return array of course Enrollment list

     */
    public function courseEnrollment($id) {

        //	$result = $this->db_lib->fetchMultiple("course_enrollment CE JOIN course_list CL ON CE.course_id=CL.cid", " enroller_user = " . $id,"CL.name,CE.participant_no,CE.course_start_date,CE.course_start_time,CE.ce_id, CE.course_id");
        $result = $this->db_lib->fetchMultiple("course_enrollment CE JOIN  remotetraining_course_list CL ON CE.course_id=CL.cid", " enroller_user = " . $id, "CL.name,CE.participant_no,CE.course_start_date,CE.course_start_time,CE.ce_id, CE.course_id");

        return $result;
    }

    /**

     *  course Enrollment

     * jaywant Narwade

      11/4/2018

     * @access public

     * @param  userId

     * @return array of course Enrollment list

     */
    public function courseComment($data) {

        if ($data['cbc_id'] != '') {

            $result = $this->db_lib->update("course_commnet_by_customer ", $data, "cbc_id=" . $data['cbc_id']);
        } else {

            $result = $this->db_lib->insert("course_commnet_by_customer ", $data);
        }

        return $result;
    }

    /**

     *  course Enrollment

     * jaywant Narwade

      11/4/2018

     * @access public

     * @param  userId

     * @return array of course Enrollment list

     */
    public function singleCourseComment($id) {



        $result = $this->db_lib->fetchSingle("course_list CL LEFT JOIN  course_commnet_by_customer CBC ON CL.cid= CBC.course_id", "CL.cid=$id", "CL.name,CL.cid AS courseId ,CBC.cbc_id,course_rating,user_comment,comment_head ");



        return $result;
    }

    /**

     *  course Enrollment

     * 

     * @access public

     * @param  userId

     * @return array of course Enrollment list

     */
    public function courseEnrollmentSingle($id) {

        $result = $this->db_lib->fetchSingle("course_enrollment CE JOIN remotetraining_course_list CL ON CE.course_id=CL.cid", " ce_id = " . $id, "CL.name,CE.participant_no,CE.course_start_date,CE.course_start_time,CE.ce_id");

        return $result;
    }

    /**

     *  assign Course from admin List

     * update Dat30-03-2018

     * @access public

     * @param  userId

     * @return array of courseList

     */
    public function assignCourseList($id) {

        $result = $this->db_lib->fetchMultiple("remotetraining_course_list CL JOIN master_user MU ON  CL.trainee_user_id= MU.uid", " trainee_user_id = " . $id, "CL.*,MU.u_name AS trainee_name");

        return $result;
    }

    /**

     *  create Course Schedule list

     *  update Date 30-03-2018

     * @access public

     * @param  userId

     * @return array of courseList

     */
    public function createCourseSchedule($arrData) {

        $arrData['schedule_entry_date'] = date('Y-m-d H:i:s');

        $arrData['course_start_date'] = date_ymd($arrData['courseStartDate']);

        $resultDA = $this->db_lib->insert('course_schecdule_list', $arrData);

        return $resultDA;
    }

    /**

     *  update Course Schedule list

     *  update Date 30-03-2018

     * @access public

     * @param  userId

     * @return array of courseList

     */
    public function updateCourseSchecdule($arrData) {

        $resultDA = $this->db_lib->update('course_schecdule_list', $arrData, "id= " . $arrData['id']);

        return $resultDA;
    }

    public function deleteCourseSchecdule($arrData) {

        $result = $this->db_lib->delete("course_schecdule_list", "id = " . $arrData['id']);

        return $result;
    }

    /**

     * schedule Course List

     * update Date 30-03-2018

     * @access public

     * @param  $userid,$courseId

     * @return array of courseList

     */
    public function scheduleCourse($userid, $courseId) {

        $result = $this->db_lib->fetchMultiple("course_schecdule_list", " trainee_user_id = " . $userid . " AND course_id=$courseId ", "");

        return $result;
    }

    /**

     * assign attendee to course

     * update Dat30-03-2018

     * @access public

     * @param   array Data

     * @return array of courseList

     */
       public function assign_attendee($data) {

           $start_time=$data['start_time'];
           $end_time=$data['end_time'];
           $arrData['assign_date'] = date('Y-m-d');

        $assignUser = $data["assignUser"];
        $assign_by_user = $data['assign_by_user'];
        
        $event_data = $this->db_lib->fetchSingle("event_booking", "event_id= " . $data['event_id']);
        $e_id=$data['event_id'];

         if($event_data['event_id']==$data['event_id'])
         {
                        //  print_r($event_data['participant_no']);die;

           $data_event['participant_no']=$event_data['participant_no'];
            $this->db_lib->update("event_booking", $data_event, "event_id =$e_id");


         }
        $event_name_data = $this->db_lib->fetchSingle("event", "event_id= " . $data['event_id']);

        $event_name=$event_name_data['event_name'];
        
        $ce_id = $data['ce_id'];

        $this->db_lib->delete("course_enrollment_assign_user", " assign_by_user = {$assign_by_user} AND ce_id={$ce_id} ");



        if (count($assignUser) > 0) {

            foreach ($assignUser as $id) {

                $arrData = array();

                // prepare data

                $arrData['assign_date'] = date('Y-m-d');

                $arrData['attendee_user_id'] = $id;

                $arrData['assign_by_user'] = $data['assign_by_user'];

                $arrData['ce_id'] = $data['ce_id'];



                // update record

                $result = $this->db_lib->insert("course_enrollment_assign_user", $arrData);
            }
            
            
             foreach($assignUser as $key)
            {
                      $datamaster = $this->db_lib->fetchSingle("master_user", "uid= " . $key);
                      
          $arrDataEvent['user_id']=$datamaster['uid'];
          $arrDataEvent['user_name']=$datamaster['u_name'];
          $arrDataEvent['user_email']=$datamaster['u_email'];
          $arrDataEvent['phone_no']=$datamaster['u_mobileno'];
        
          $arrDataEvent['participant_no']=$event_data['participant_no'];
          $arrDataEvent['event_amount']=$event_data['event_amount'];
          $arrDataEvent['total_amount']=$event_data['total_amount'];
          $arrDataEvent['entry_date_time']=$event_data['entry_date_time'];
          $arrDataEvent['payment_status']=$event_data['payment_status'];
          $arrDataEvent['event_start_time']=$event_data['event_start_time'];
          $arrDataEvent['event_end_time']=$event_data['event_end_time'];
          $arrDataEvent['event_start_date']=$event_data['event_start_date'];
          $arrDataEvent['event_id']=$event_data['event_id'];
          
                                    $to = $arrDataEvent['user_email'];
                                    $body = '<p>Hello '.$arrDataEvent['user_name'] . ',</p> ';
                                    $body .= '<p>Join us on '.$arrDataEvent['event_start_date'].'.Event details are as follows :</p>';
                //                   $body .= '<p>Click  <a href= "http://test.orendaventures.com/" alt="Here">Here</a> to sign up to Stelmac.io platform with below details – </p>';
                                    $body .= 'Event Name: '. $event_name .'<br/>';
                                    $body .= 'Event Start Date: '. $arrDataEvent['event_start_date'].'<br/>';
                                    $body .= 'Event Start Time: '.$start_time.'<br/>';
                                    $body .= 'Event End Time: '.$end_time.'<br/><br/>';
                                  
                                    $body .= 'If you have difficulty to look event, do contact us at support@stelmac.io.:<br/><br/>';
                                    $body .= 'Thank you,<br/>';
                                    $body .=  SUPPORT_TEAM_NAME . '<br/>';
                                    $body .=  SUPPORT_MAIL;
                                    $email_content = $body;
                                   // print_r($email_content);exit;
                                    $this->load->library('Email_PHPMailer');
                                    $subject = 'Save you date '. $arrDataEvent['event_start_date'].'';
                                    $mailresponse = email_Send($subject, $to, $email_content, $name);  


          
          
             $this->db_lib->insert("event_booking", $arrDataEvent);
             }
        
            
            
            
        }



        return $result;
    }

    /**

     * schedule Course List

     * update Date 30-03-2018

     * @access public

     * @param  enrollId

     * @return array of courseList

     */
    public function courseEnrollmentAssignList($enrollId) {

        $result = $this->db_lib->fetchMultiple("course_enrollment_assign_user", " ce_id = " . $enrollId, "attendee_user_id");

        return $result;
    }

    /**

     * schedule Attendee Course

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function scheduleAttendeeCourse($strWhere) {

        return $this->db_lib->fetchMultiple('course_enrollment CE    JOIN course_enrollment_assign_user CEAU ON CEAU.ce_id=CE.ce_id JOIN master_user MU ON MU.uid=CEAU.attendee_user_id', $strWhere . "  GROUP BY ceau_id ", "  ceau_id,CEAU.ce_id,attendee_user_id,MU.u_name, MU.u_email, MU.u_mobileno ");
    }

    /**

     * schedule Attendee Course

     * 

     * @access public

     * @param  userId

     * @return array of objects

     */
    public function findSingleCourseSchecduleList($strWhere) {

        return $this->db_lib->fetchSingle('course_schecdule_list CSL JOIN remotetraining_course_list CL  ON  CSL.course_id= CL.cid', $strWhere . "  ", "CSL.course_id,CSL.trainee_user_id,CSL.id,CSL.wiziq_class_id,CL.name");
    }

    /**

     * update Course Schedule List BY Trainee USER

     * update Date 31-03-2018

     * @access public

     * @param  array Data

     * @return array of courseList

     */
    public function updateCourseScheduleList($data) {

        $data['updatedDateTime'] = date('Y-m-d H:i:s');

        $ceauId = $data["ceauId"];



        $strWhere = " ceau_id = '$ceauId' ";

        $userdata = $this->db_lib->fetchSingle('course_enrollment_assign_user as CEAU LEFT JOIN master_user as MU ON  CEAU.attendee_user_id= MU.uid', $strWhere, " MU.u_email as email,MU.u_name as name ");



        $email = $userdata['email'];

        $name = $userdata['name'];

        $to = $email;

        $body = '<p>Hi ' . $name . ', </p> ';

        $body .= '<p> Attendee URL : ' . $data['wiziq_attendee_url'] . '</p> <br/>';

        $email_content = $body;

        $this->load->library('Email_PHPMailer');

        $subject = 'Attendee URL';

        $mailresponse = email_Send($subject, $to, $email_content, $name);



        $result = $this->db_lib->update("course_enrollment_assign_user", $data, "ceau_id =$ceauId");



        return $result;
    }

    /**

     * attendee Assign Course by customer List

     * update Dat30-03-2018

     * @access public

     * @param  userId

     * @return array of courseList

     */
    public function attendeeAssignCourseList($id) {

        $result = $this->db_lib->fetchMultiple("course_enrollment_assign_user CEAU JOIN course_enrollment CE ON CEAU.ce_id= CE.ce_id JOIN remotetraining_course_list CL ON  CE.course_id= CL.cid LEFT JOIN course_schecdule_list CSL ON CEAU.course_schecdule_list_id=CSL.id ", " CEAU.attendee_user_id = " . $id, "CL.cid,CL.name AS courseName, CEAU.ceau_id, CEAU.wiziq_attendee_url,CEAU.wizid_class_id, CSL.course_start_time, CSL.course_end_time, CSL.course_start_date");

        return $result;
    }

    /**

     * events List

     * update Dat 04-04-2018

     * @access public

     * @param  userId

     * @return array of courseList

     */


    /**

     * remote Application Service

     * update Dat 06-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteApplicationService($id) {

        $result = $this->db_lib->fetchMultiple("remote_application_aggrement_request", "  user_id = " . $id, "");

        return $result;
    }

//    public function remoteApplicationProgramm($id) {
//
//        $result = $this->db_lib->fetchMultiple("remote_programming_rfq", "  customer_user_id = " . $id, "");
//
//        return $result;
//    }
    
        public function remoteApplicationProgramm($id) {

        $strWhere = "$id = rfq.customer_user_id";
        $result = $this->db_lib->fetchMultiple("remote_programming_rfq as rfq LEFT JOIN remote_application_aggrement_request_programmer as raap ON rfq.rpr_id = raap.rpr_id ", $strWhere, "rfq.rpr_id as dmrID,rfq.*,raap.*");

        return $result;
       
          
    }

    /**

     * remote Application Service Programmer

     * update Dat 06-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteApplicationServiceProgrammers($requestId) {

        $result = $this->db_lib->fetchMultiple("remote_application_aggrement_request_programmer RARC JOIN master_user MU ON RARC.programmer_id=MU.uid", " request_status='A' AND rpr_id = " . $requestId . " ORDER BY customer_accept_status  ", "MU.u_name,MU.u_email, RARC.programmer_id,RARC.rpr_id, request_programmer_date,customer_accept_status,  rarp_id, qoutation_date");

        return $result;
    }

    /**

     * remote Application Service Consultant

     * update Dat 06-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteApplicationServiceConsultant($requestId) {

        $result = $this->db_lib->fetchMultiple("remote_application_aggrement_request_consultant RARC JOIN master_user MU ON RARC.consultant_id=MU.uid", " request_status='A' AND remote_application_id = " . $requestId . " ORDER BY customer_accept_status  ", "MU.u_name,MU.u_email, RARC.consultant_id,RARC.rarc_id, request_consultant_date,customer_accept_status,  remote_application_id");

        return $result;
    }

    public function remoteApplicationServiceOnDemandConsultant($requestId) {

        $result = $this->db_lib->fetchMultiple("remote_ondemand_request_consultant RARC JOIN master_user MU ON RARC.consultant_id=MU.uid", " request_status='A' AND remote_application_id = " . $requestId . " ORDER BY customer_accept_status  ", "MU.u_name,MU.u_email, RARC.consultant_id,RARC.rorc_id, request_consultant_date,customer_accept_status,  remote_application_id");

        return $result;
    }

    /**

     * remote Application Service Consultant

     * update Dat 06-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteApplicationServiceConsultantUpdate($requestId) {

        $data['customer_accept_status'] = 'Y';

        $result = $this->db_lib->update("remote_application_aggrement_request_consultant  ", $data, " rarc_id = " . $requestId);

        $result_data = $this->db_lib->fetchSingle("remote_application_aggrement_request_consultant  ", " rarc_id = " . $requestId);

        $consultant_id = $result_data['consultant_id'];

        $remote_application_id = $result_data['remote_application_id'];

        $updateData['accepted_consultant_id'] = $consultant_id;

        $result = $this->db_lib->update("remote_application_aggrement_request", $updateData, " rar_id = " . $remote_application_id);

        return $result;
    }

    public function remoteApplicationServiceOnDemandConsultantUpdate($requestId) {



        $data['customer_accept_status'] = 'Y';

        $result = $this->db_lib->update("remote_ondemand_request_consultant", $data, "rorc_id=" . $requestId);

        $result_data = $this->db_lib->fetchSingle("remote_ondemand_request_consultant", " rorc_id = " . $requestId);

        $consultant_id = $result_data['consultant_id'];



        $remote_application_id = $result_data['remote_application_id'];

        $updateData['consultant_id'] = $consultant_id;

        $result = $this->db_lib->update("remote_machine_aggrement_request", $updateData, " rmr_id = " . $remote_application_id);

        return $result;
    }

    public function remoteApplicationServiceProgrammerUpdate($rarp_id) {

        $data['customer_accept_status'] = 'Y';

        $result = $this->db_lib->update("remote_application_aggrement_request_programmer  ", $data, " rarp_id = " . $rarp_id);

        $result_data = $this->db_lib->fetchSingle("remote_application_aggrement_request_programmer  ", " rarp_id = " . $rarp_id);



        $programmer_id = $result_data['programmer_id'];

        $rpr_id = $result_data['rpr_id'];

        $updateData['programmer_id'] = $programmer_id;

        $result = $this->db_lib->update("remote_programming_rfq", $updateData, " rpr_id = " . $rpr_id);

        return $result;
    }

    /**

     * remote Application Service Consultant

     * update Dat 06-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function remoteApplicationServiceConsultantUpdateByConsultant($requestId) {

        $data['request_status'] = 'A';

        $result = $this->db_lib->update("remote_application_aggrement_request_consultant  ", $data, " rarc_id = " . $requestId);

        return $result;
    }

    /**

     * remote Application Service Consultant Reject

     * update Dat 06-04-2018

     * @access public

     * @param  rarc_id

     * @return array of requestList

     */
    public function remoteApplicationServiceConsultantUpdateByConsultantReject($requestId) {

        $data['request_status'] = 'R';

        $result = $this->db_lib->update("remote_application_aggrement_request_consultant  ", $data, " rarc_id = " . $requestId);

        return $result;
    }

    /**

     * remote request Service Braincert

     * update Dat 06-04-2018

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function requestServiceBraincert($data) {



        $result = $this->db_lib->insert("remote_application_braincert", $data);

        return $result;
    }

    /**

     * remote request Service Braincert

     * update Dat 06-04-2018

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function requestServiceBraincertUpdate($data) {



        $result = $this->db_lib->update("remote_application_braincert  ", $data, "rab_id= $data[rab_id]");

        return $result;
    }

    /**

     * remote request Service Braincert

     * update Dat 06-04-2018

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function remoteApplicationServicesById($rar_id) {



        $result = $this->db_lib->fetchSingle("remote_application_aggrement_request  RAR JOIN master_user MU ON RAR.user_id=MU.uid LEFT JOIN remote_application_braincert RAB ON RAB.rar_id= RAR.rar_id", "RAR.rar_id= $rar_id", "RAR.*, MU.uid AS customer_user_id, MU.u_name AS customer_user_name,presenter_launchurl ");

        return $result;
    }

    /**

     * remote request Service Braincert for perticular remote application and Customer

     * update Dat 12-04-2018

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function remoteApplicationServicesByIdCustId($rar_id, $uid) {



        $result = $this->db_lib->fetchSingle("remote_application_aggrement_request  RAR JOIN master_user MU ON RAR.user_id=MU.uid LEFT JOIN remote_application_braincert RAB ON RAB.rar_id= RAR.rar_id", "RAR.rar_id= $rar_id AND RAR.user_id = $uid ", "RAR.*, MU.uid AS customer_user_id, MU.u_name AS customer_user_name,presenter_launchurl ");

        return $result;
    }

    /**

     * remote Application Services Brain Cert ist

     * update Dat 06-04-2018

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function remoteApplicationServicesBrainCertList($rar_id) {



        $result = $this->db_lib->fetchMultiple(" remote_application_aggrement_request  RAR LEFT JOIN remote_application_braincert RAB ON RAB.rar_id= RAR.rar_id", "RAB.rar_id= $rar_id ", "RAB.*");

        return $result;
    }

    /**

     * remote Application Services Brain Cert list and Customer by Customer

     * update Dat 12-04-2018

     * @access public

     * @param  Get data

     * @return array of requestList

     */
    public function remoteApplicationServicesBrainCertListbyCust($rar_id, $uid) {



        $result = $this->db_lib->fetchMultiple(" remote_application_aggrement_request  RAR JOIN remote_application_braincert RAB ON RAB.rar_id= RAR.rar_id", "RAB.rar_id= $rar_id AND RAR.user_id = $uid ", "RAB.*");

        return $result;
    }

    /**

     * addExperince

     * update Date 11-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function addExperince($data) {



        $result = $this->db_lib->insert(" user_experince_details ", $data);

        return $result;
    }

    /**

     * find Work Experince List

     * update Date 11-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function findWorkExperinceList($id) {



        $result = $this->db_lib->fetchMultiple(" user_experince_details ", " user_id = $id ");

        return $result;
    }

    /**

     * find Work Experince List

     * update Date 11-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function workExperinceDelete($id) {



        $result = $this->db_lib->delete(" user_experince_details ", " ued_id= $id ");

        return $result;
    }

    /**

     * addExperince

     * update Date 11-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function trainingSpecialties($data) {



        $result = $this->db_lib->insert(" user_specialties_details ", $data);

        return $result;
    }

    /**

     * find Work Experince List

     * update Date 11-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function trainingSpecialtiesList($id) {



        $result = $this->db_lib->fetchMultiple(" user_specialties_details ", " user_id = $id ");

        return $result;
    }

    /**

     * find Work Experince List

     * update Date 11-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function trainingSpecialtiesDelete($id) {



        $result = $this->db_lib->delete(" user_specialties_details ", " usd_id= $id ");

        return $result;
    }

    /**

     * find Work Experince List

     * update Date 11-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function fetchRemoteServiceInvoice($raar_id) {



        $result = $this->db_lib->fetchMultiple(" remote_application_aggrement_invoice ", " raar_id = $raar_id ");

        return $result;
    }

    /**

     * find Work Experince List

     * update Date 12-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function createMachineServiceInvoice($arrayData) {

        $arrayData['start_date'] = date_ymd($arrayData['start_date']);

        $arrayData['end_date'] = date_ymd($arrayData['end_date']);

        $arrayData['created_date'] = date('Y-m-d H:i:s');

        return $result = $this->db_lib->insert("remote_machine_service_invoice", $arrayData);
    }

    /**

     * find Work Experince List

     * update Date 12-04-2018

      jaywant Narwade

     * @access public

     * @param  post data

     * @return array of requestList

     */
    public function fetchMachineServiceInvoice($rmr_id) {



        $result = $this->db_lib->fetchMultiple(" remote_machine_service_invoice ", " rmr_id = $rmr_id ");

        return $result;
    }

    /**

     * events List

     * update Dat 04-04-2018

     * @access public

     * @param  userId

     * @return array of courseList

     */
    public function eventInvoceList($id) {

        $result = $this->db_lib->fetchMultiple("event_booking EB JOIN event EE ON EB.event_id=EE.event_id JOIN payment_module PM ON EB.eb_id=PM.payment_for_id", " EB.user_id = " . $id, "EE.event_name, EB.participant_no, EB.event_start_date, EB.event_start_time,eb_id, PM.status AS paymentStatus, pay_amount, txnid AS trascationId, pay_date");

        return $result;
    }

    /**

     *  course Enrollment Invoce List

     * 

     * @access public

     * @param  userId

     * @return array of course Enrollment list

     */
    public function courseEnrollmentInvoceList($id) {

        $result = $this->db_lib->fetchMultiple("course_enrollment CE JOIN course_list CL ON CE.course_id=CL.cid  JOIN payment_module PM ON CE.ce_id=PM.payment_for_id ", " enroller_user = " . $id, "CL.name,CE.participant_no,CE.course_start_date,CE.course_start_time,CE.ce_id, CE.course_id, PM.status AS paymentStatus, pay_amount, txnid AS trascationId, pay_date");

        return $result;
    }

    /**

     *  remote Machine Class Schedule Insert

     * 12/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteMachineClassScheduleInsert($data) {

        $data['startDate'] = date_ymd($data['courseStartDate']);

        $data['start_time'] = $data['course_start_time'];

        $data['end_time'] = $data['course_end_time'];



        $result = $this->db_lib->insert("remote_machine_service_tokbox", $data);

        return $result;
    }

    /**

     *  remote Machine Class Schedule Insert

     * 12/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteMachineClassScheduleList($rmr_id, $userId) {





        $result = $this->db_lib->fetchMultiple("remote_machine_service_tokbox  ", " rmr_id = $rmr_id AND created_by_user = $userId ", "");

        return $result;
    }

    /**

     *  remote Machine Class Schedule Insert

     * 12/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteMachineClassScheduleListCustomer($rmr_id, $userId) {

        $table = " remote_machine_aggrement_request as rmar LEFT JOIN remote_machine_service_tokbox  as rmst ON rmar.rmr_id = rmst.rmr_id ";

        $select = " rmar.user_id as user_id,rmst.* ";

        $result = $this->db_lib->fetchMultiple($table, " rmar.rmr_id = $rmr_id AND  rmar.user_id= $userId ", $select);

        return $result;
    }

    public function remoteMachineVideoClassScheduleListCustomer($mvr_id, $userId) {

        /* $table = " machine_video_request as rvr LEFT JOIN machine_video_request_tokbox  as mvrt ON rvr.mvr_id = mvrt.mvr_id ";

        $select = " rvr.user_id as user_id,mvrt.* ";

        $result = $this->db_lib->fetchMultiple($table, " rvr.mvr_id = $mvr_id AND  rvr.user_id= $userId ", $select);
 */
		$result = $this->db_lib->fetchMultiple('live_machine_support_zoom', " mvr_id = $mvr_id ORDER by id DESC", "");

        return $result;
      
    }

    /**

     *  remote Machine Class Schedule fetch

     * 13/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteMachineClassScheduleFetchSingle($rmr_id) {

        $result = $this->db_lib->fetchSingle("remote_machine_service_tokbox", " rmst_id = $rmr_id  ", "");

        return $result;
    }

    public function remoteServiceClassScheduleFetchSingle($rab_id) {

        $result = $this->db_lib->fetchSingle("remote_application_braincert", " rab_id = $rab_id ", "");

        return $result;
    }

    /**

     *  remote Machine Class Schedule fetch

     * 13/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteMachineClassScheduleUpdate($data) {

        $rmstId = $data['rmstId'];

        $result = $this->db_lib->update("remote_machine_service_tokbox  ", $data, " rmst_id = $rmstId  ", "");

        return $result;
    }

    public function remoteServiceClassScheduleUpdate($data) {

        $rab_id = $data['rab_id'];

        $result = $this->db_lib->update("remote_application_braincert", $data, " rab_id = $rab_id  ", "");

        return $result;
    }

    /**

     *  remote Machine Update 

     * 13/4/2018 ATUL

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function updateRemoteMachineRequestInvoice($data) {

        $result = $this->db_lib->update("remote_machine_aggrement_request  ", $data, " rmr_id = {$data['rmr_id']}  ");

        return $result;
    }

    /**

     * remote Application Programmer 

     * update Date 16-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function remoteApplicationProgrammAccept($postdata) {

        $postdata['request_status'] = 'A';

        $rarp_id = $postdata['rarp_id'];



        $data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_images/", MIX_FORMAT, $arrData["old_document"]);

        if ($data1[0])
            $postdata["sample_product_drawing"] = $data1[1];



        $result = $this->db_lib->update("remote_application_aggrement_request_programmer  ", $postdata, " rarp_id = " . $rarp_id);

        return $result;
    }

    /**

     * remote Application Service Consultant Reject

     * update Dat 16-04-2018 ATUL 

     * @access public

     * @param  rarc_id

     * @return array of requestList

     */
    public function remoteApplicationProgrammReject($rarp_id) {

        $data['request_status'] = 'R';

        $result = $this->db_lib->update("remote_application_aggrement_request_programmer  ", $data, " rarp_id = " . $rarp_id);

        return $result;
    }

    /**

     *  remote Machine Video Class Schedule Insert

     * 12/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteMachineVideoClassScheduleInsert($data) {

        $data['startDate'] = date_ymd($data['courseStartDate']);

        $data['start_time'] = $data['course_start_time'];

        $data['end_time'] = $data['course_end_time'];



        $result = $this->db_lib->insert("machine_video_request_tokbox  ", $data);

        return $result;
    }

    /* ======================== Machine Video=================== */

    /**

     *   Machine Class Schedule Insert

     * 24/4/2018 Atul Mangave

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteMachineVideoClassScheduleList($mvr_id, $userId) {

        $result = $this->db_lib->fetchMultiple("machine_video_request_tokbox  ", " mvr_id = $mvr_id AND created_by_user = $userId ", "");

        return $result;
    }

    public function remoteMachineVideoClassScheduleFetchSingle($rmr_id) {

        $result = $this->db_lib->fetchSingle("machine_video_request_tokbox  ", " id = $rmr_id  ");

        return $result;
    }

    public function remoteMachineVideoClassScheduleUpdate($data) {

        $id = $data['id'];

        $result = $this->db_lib->update("machine_video_request_tokbox  ", $data, " id = $id  ", "");

        return $result;
    }

    /* ======================== END Machine Video=================== */

    /**

     *  remote Automation Video Class Schedule Insert

     * 09/07/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteAutomationVideoClassScheduleInsert($data) {

        $data['startDate'] = date_ymd($data['courseStartDate']);

        $data['start_time'] = $data['course_start_time'];

        $data['end_time'] = $data['course_end_time'];



        $result = $this->db_lib->insert("automation_video_request_tokbox  ", $data);

        return $result;
    }

    /* ======================== Automation Video=================== */

    /**

     *   Automation Class Schedule Insert

     * 09/07/2018 Deepak Shinde

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function remoteAutomationVideoClassScheduleList($avr_id, $userId) {

        $result = $this->db_lib->fetchMultiple("automation_video_request_tokbox  ", " avr_id = $avr_id AND created_by_user = $userId ", "");

        return $result;
    }

    public function remoteAutomationVideoClassScheduleFetchSingle($rar_id) {

        $result = $this->db_lib->fetchSingle("automation_video_request_tokbox  ", " id = $rar_id  ");

        return $result;
    }

    public function remoteAutomationVideoClassScheduleUpdate($data) {

        $id = $data['id'];

        $result = $this->db_lib->update("automation_video_request_tokbox  ", $data, " id = $id  ", "");

        return $result;
    }

    public function remoteAutomationVideoClassScheduleListCustomer($avr_id, $userId) {

        $table = "automation_video_request as avr LEFT JOIN automation_video_request_tokbox  as avrt ON avr.avr_id = avrt.avr_id ";

        $select = " avr.user_id as user_id,avrt.* ";

        $result = $this->db_lib->fetchMultiple($table, " avr.avr_id = $avr_id AND  avr.user_id= $userId ", $select);

        return $result;
    }

    /* REQUEST LIST OF PERTICULAR CONSULTANT */

    public function remoteOnDemandServicesBySupport($id) {

        $strWhere = "  rorc.consultant_id= '{$id}' ";

        $table = " remote_ondemand_request_consultant as rorc LEFT JOIN remote_machine_aggrement_request as rmar ON rorc.remote_application_id = rmar.rmr_id LEFT JOIN master_user as mu ON rmar.user_id=mu.uid ";

        $select = " rorc.*,rmar.*,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail ";

        $result = $this->db_lib->fetchMultiple($table, $strWhere, $select);

        return $result;
    }

    /**

     * remote Application Service Consultant

     * update Dat 06-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function remoteOnDemandUpdateByConsultant($requestId) {

        $data['request_status'] = 'A';

        $result = $this->db_lib->update("remote_ondemand_request_consultant  ", $data, " rorc_id = " . $requestId);

        return $result;
    }

    /**

     * remote Application Service Consultant

     * update Dat 24-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteOnDemandServiceConsultant($requestId) {

        $result = $this->db_lib->fetchMultiple("remote_ondemand_request_consultant RARC JOIN master_user MU ON RARC.consultant_id=MU.uid", " request_status='A' AND remote_application_id = " . $requestId . " ORDER BY customer_accept_status  ", "MU.u_name,MU.u_email, RARC.consultant_id,RARC.rorc_id, request_consultant_date,customer_accept_status,  remote_application_id");

        return $result;
    }

    /**

     * remote On Demand Consultant Update

     * update Dat 06-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function remoteOnDemandConsultantUpdate($requestId) {

        $data['request_status'] = 'A';

        $result = $this->db_lib->update("remote_ondemand_request_consultant  ", $data, " rorc_id = " . $requestId);

        return $result;
    }

    /**

     * remote On Demand Consultant Update

     * update Dat 06-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function remoteOnDemandConsultantReject($requestId) {

        $data['request_status'] = 'R';

        $result = $this->db_lib->update("remote_ondemand_request_consultant  ", $data, " rorc_id = " . $requestId);

        return $result;
    }

    /**

     * remote On Demand Consultant accepet by customer

     * update Dat 06-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteOnDemandServiceConsultantUpdate($requestId) {

        $data['customer_accept_status'] = 'Y';

        $result = $this->db_lib->update("remote_ondemand_request_consultant  ", $data, " rorc_id = " . $requestId);

        $result_data = $this->db_lib->fetchSingle("remote_ondemand_request_consultant  ", " rorc_id = " . $requestId);

        $consultant_id = $result_data['consultant_id'];

        $remote_application_id = $result_data['remote_application_id'];

        $updateData['consultant_id'] = $consultant_id;

        $result = $this->db_lib->update("remote_machine_aggrement_request", $updateData, " rmr_id = " . $remote_application_id);

        return $result;
    }

    /**

     * remote Application Services Brain Cert list and Customer by Customer

     * update Dat 26-04-2018

     * @access public

     * @param  Get data

     * @return array of requestList

     */
    public function remoteApplicationServicesBrainCertListbyCustSingle($rar_id, $uid) {



        $result = $this->db_lib->fetchSingle(" remote_application_aggrement_request  RAR JOIN remote_application_braincert RAB ON RAB.rar_id= RAR.rar_id", "RAB.rar_id= $rar_id AND presenter_launchurl<>'' AND RAR.user_id = $uid ", "RAB.*,RAR.accepted_consultant_id");

        return $result;
    }

    /**

     * remote On Demand Consultant Update

     * update Dat 26-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function commenttotraineeInsert($data) {

        $byUser = $data['comment_by_user_id'];

        $toUser = $data['comment_to_user_id'];

        $resultData = $this->db_lib->fetchSingle(" trainee_comment ", "comment_by_user_id = $byUser AND comment_to_user_id = '$toUser'", "tc_id");

        if ($resultData['tc_id']) {

            $result = $this->db_lib->update("trainee_comment  ", $data, " tc_id = $resultData[tc_id]");
        } else {

            $result = $this->db_lib->insert("trainee_comment  ", $data);
        }

        return $result;
    }

    /**

     * get comment list as per user id

     * update Dat 26-04-2018

     * @access public

     * @param  Get data

     * @return array of  

     */
    public function commenttotraineeFetchMultiple($uid) {



        $result = $this->db_lib->fetchMultiple(" trainee_comment TC JOIN master_user MU ON TC.comment_by_user_id=MU.uid", "comment_to_user_id= $uid  ", "TC.*,MU.u_avatar,MU.u_name");

        return $result;
    }

    /**

     * remote Application Programmer 

     * update Date 16-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function customerRequestsApplicationAccept($postdata) {

        $postdata['request_status'] = 'QG';

        $racrp_id = $postdata['racrp_id'];



        $data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_application/", MIX_FORMAT, $arrData["old_document"]);

        if ($data1[0])
            $postdata["sample_product_drawing"] = $data1[1];



        $result = $this->db_lib->update("remote_application_consultant_request_programmer  ", $postdata, " racrp_id = " . $racrp_id);

        return $result;
    }

    /**

     * remote Application Service Consultant Reject

     * update Dat 16-04-2018 ATUL 

     * @access public

     * @param  rarc_id

     * @return array of requestList

     */
    public function customerRequestsApplicationReject($rarp_id) {

        $data['request_status'] = 'R';

        $result = $this->db_lib->update("remote_application_consultant_request_programmer  ", $data, " racrp_id = " . $rarp_id);

        return $result;
    }

    /**

     * remote Application Consultant

     * update Dat 16-04-2018 ATUL 

     * @access public

     * @param  rarc_id

     * @return array of requestList

     */
    public function remoteApplicationConsultant($id) {

        $result = $this->db_lib->fetchMultiple("remote_application_rfq RAR LEFT JOIN  remote_application_consultant_tokbox RACT ON RAR.rpr_id=RACT.rpr_id", "  customer_user_id = " . $id, "RAR.*, RACT.rmst_id, RACT.tokbox_sessionid, RACT.tokbox_token, RACT.startDate, RACT.start_time");

        return $result;
    }

    /**

     * remote Application Service Programmer

     * update Dat 06-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteApplicationConsultantList($requestId) {

        $result = $this->db_lib->fetchMultiple("remote_application_consultant_request_programmer RARC JOIN master_user MU ON RARC.programmer_id=MU.uid", " request_status='A' AND rpr_id = " . $requestId . " ORDER BY customer_accept_status  ", "MU.u_name,MU.u_email, RARC.programmer_id,RARC.rpr_id, request_programmer_date,customer_accept_status,  racrp_id");

        return $result;
    }

    /**

     * remote Application Consultant List Update

     * update Dat 06-04-2018

     * @access public

     * @param  userId

     * @return array of requestList

     */
    public function remoteApplicationConsultantListUpdate($rarp_id) {

        $data['customer_accept_status'] = 'Y';

        $result = $this->db_lib->update("remote_application_consultant_request_programmer  ", $data, " racrp_id = " . $rarp_id);

        $result_data = $this->db_lib->fetchSingle("remote_application_consultant_request_programmer  ", " racrp_id = " . $rarp_id);



        $programmer_id = $result_data['programmer_id'];

        $rpr_id = $result_data['rpr_id'];

        $updateData['programmer_id'] = $programmer_id;

        $result = $this->db_lib->update("remote_application_rfq", $updateData, " rpr_id = " . $rpr_id);

        return $result;
    }

    /**

     *  schedule Application Consultant Course Insert  tokbox

     * 30/4/2018

     * @access public

     * @param  post data

     * @return array  

     */
    public function scheduleApplicationConsultantCourseInsert($data) {

        $data['startDate'] = date_ymd($data['courseStartDate']);

        $data['start_time'] = $data['course_start_time'];

        $data['end_time'] = $data['course_end_time'];



        $result = $this->db_lib->insert("remote_application_consultant_tokbox  ", $data);

        return $result;
    }

    /**

     * schedule Application Consultant CourseList tokbox

     * 30/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function scheduleApplicationConsultantCourseList($rpr_id, $userId) {





        $result = $this->db_lib->fetchMultiple("remote_application_consultant_tokbox  ", " rpr_id = $rpr_id AND created_by_user = $userId ", "");

        return $result;
    }

    /**

     *   schedule Application Consultant Course fetch

     * 30/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function scheduleApplicationConsultantCourseFetchSingle($rmr_id) {

        $result = $this->db_lib->fetchSingle("remote_application_consultant_tokbox  ", " rmst_id = $rmr_id  ", "");

        return $result;
    }

    /**

     * schedule Application Consultant Course Update

     * 30/4/2018

     * @access public

     * @param  post data

     * @return array of course Enrollment list

     */
    public function scheduleApplicationConsultantCourseUpdate($data) {

        $rmstId = $data['rmstId'];

        $result = $this->db_lib->update("remote_application_consultant_tokbox  ", $data, " rmst_id = $rmstId  ", "");

        return $result;
    }

    public function zoomResponseInsertRemoteProgramming($data) {

        return $result = $this->db_lib->insert("remote_programming_zoom", $data);
    }

    public function remoteProgrammingClassScheduleListCustomer($rpr_id) {

        $result = $this->db_lib->fetchMultiple('remote_programming_zoom', " rpr_id = $rpr_id ", "");

        return $result;
    }

    /**
     *  remote Video Class Schedule fetch
     * 13/4/2018
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function liveDemoClassScheduleFetchSingle($id) {
        $result = $this->db_lib->fetchSingle("machine_video_request_tokbox", " id = $id ", "");
        return $result;
    }

    public function liveDemoClassScheduleUpdate($data) {
        $id = $data['id'];
        $result = $this->db_lib->update("machine_video_request_tokbox", $data, " id = $id", "");
        return $result;
    }

    /**

     * remote Application Programmer 

     * update Date 16-04-2018

     * @access public

     * @param  rar_id

     * @return array of requestList

     */
    public function customerRequestsGroupBuyingAccept($postdata) {

        $postdata['request_status'] = 'A';

        $gsr = $postdata['gsr_id'];
        //print_r($gsr);exit;


        $data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_application/", MIX_FORMAT, $arrData["old_document"]);

        if ($data1[0])
            $postdata["sample_product_drawing"] = $data1[1];



        $result = $this->db_lib->update("groupbuying_supplier_request  ", $postdata, " gsr_id = " . $gsr);

        return $result;
    }

    /**

     * Group Buying Supplier Reject

     * update Dat 11-07-2018 Deepak Shinde

     * @access public

     * @param  rarc_id

     * @return array of requestList

     */
    public function customerRequestsGroupBuyingReject($gsr) {

        $data['request_status'] = 'R';

        $result = $this->db_lib->update("groupbuying_supplier_request", $data, " gsr_id = " . $gsr);

        return $result;
    }

    public function groupbuyingQuotationList($userId) {

        /* $result = $this->db_lib->fetchMultiple("groupbuying_customer_request  "," customer_id = $userId  ","");

          return $result;
         */
        $strWhere = "customer_id = '$userId' ";
        $result = $this->db_lib->fetchMultiple("groupbuying_customer_request GCR JOIN machine_category MC ON GCR.product_cat=MC.mc_id JOIN machine_brand MB ON GCR.prod_brandName=MB.mb_id JOIN machine_brand_model MBM ON GCR.prod_model=MBM.md_id", $strWhere, "MC.category_name,MB.brand_name,MBM.model_name,GCR.supplier_best_price");

        return $result;
    }

    /**

     * Course Supplier Accpet Request

     * Created at 20-04-2018

     * @access public

     * @param  csr_id

     * @return array of requestList

     */
    public function supplierCourseRfqAccept($postdata) {

        $postdata['request_status'] = 'A';

        $csr = $postdata['csr_id'];
        //print_r($gsr);exit;


        /* 	$data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_application/", MIX_FORMAT,$arrData["old_document"]); 

          if($data1[0])

          $postdata["sample_product_drawing"] = $data1[1]; */



        $result = $this->db_lib->update("course_supplier_request  ", $postdata, " csr_id = " . $csr);

        return $result;
    }

    /**

     * 
      course Supplier Reject

     * update Dat 20-07-2018 Deepak Shinde

     * @access public

     * @param  rarc_id

     * @return array of requestList

     */
    public function supplierCourseRfqReject($csr) {

        $data['request_status'] = 'R';

        $result = $this->db_lib->update("course_supplier_request  ", $data, " csr = " . $csr);

        return $result;
    }

    public function courseRfqList($userId) {

        /* $result = $this->db_lib->fetchMultiple("groupbuying_customer_request  "," customer_id = $userId  ","");

          return $result;
         */
        $strWhere = "customer_id = '$userId' AND CSR.admin_accept_status ='Y'";
        $result = $this->db_lib->fetchMultiple("course_customer_request CCR JOIN machine_category MC ON CCR.product_cat=MC.mc_id JOIN machine_brand MB ON CCR.prod_brandName=MB.mb_id JOIN machine_brand_model MBM ON CCR.prod_model=MBM.md_id JOIN course_supplier_request CSR ON CSR.ccr_id=CCR.ccr_id ", $strWhere, "MC.category_name,MB.brand_name,MBM.model_name,CCR.company_name,CSR.*");

        return $result;
    }

    /*     * **************************************Digital Manufacturing Database Code ******************** */

    /**
     *  Digital Manufacturing Accept 
     * update 29-6-2018 Deepak Shinde
     * @access public
     * @param  rar_id
     * @return array of requestList
     */
    public function digitalmanufacturingRfqAccept($drrs_id) {
        /* $postdata['request_status']='A';
          $drrs_id=$postdata['drrs_id'];

          $data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_images/", MIX_FORMAT,$arrData["old_document"]);
          if($data1[0])
          $postdata["sample_product_drawing"] = $data1[1];

          $result = $this->db_lib->update("additive_manufacturing_rfq_request_supplier  ",$postdata, " drrs_id = ".$drrs_id);
          return $result; */
        $postdata['supplier_accept_status'] = 'Y';
        return $result = $this->db_lib->update("additive_manufacturing_rfq_request_supplier", $postdata, " drrs_id = " . $drrs_id);
    }

    /**
     * Digital Manufacturing Reject 
     * update 29-6-2018 Deepak Shinde
     * @access public
     * @param  rarc_id
     * @return array of requestList
     */
    public function digitalmanufacturingRfqReject($drrs_id) {
        $data['supplier_accept_status'] = 'N';
        $result = $this->db_lib->update("additive_manufacturing_rfq_request_supplier  ", $data, " drrs_id = " . $drrs_id);
        return $result;
    }

    /**
     * remote Application Programmer 
     * update Date 16-04-2018
     * @access public
     * @param  rar_id
     * @return array of requestList
     */
    public function customerRequestsRfqAccept($postdata) {
        $postdata['request_status']='QG';
        $drrs_id = $postdata['drrs_id'];
        $data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_application/", MIX_FORMAT, $arrData["old_document"]);
        if ($data1[0])
            $postdata["sample_product_drawing"] = $data1[1];
        $result = $this->db_lib->update("additive_manufacturing_rfq_request_supplier", $postdata, " drrs_id = " . $drrs_id);
        return $result;
    }

    /**
     * remote Application Service Consultant Reject
     * update Dat 16-04-2018 ATUL 
     * @access public
     * @param  rarc_id
     * @return array of requestList
     */
    public function customerRequestsRfqReject($drrs_id) {
        $data['request_status'] = 'R';
        $result = $this->db_lib->update("additive_manufacturing_rfq_request_supplier  ", $data, " drrs_id = " . $drrs_id);
        return $result;
    }

    public function remoteRfqSupplier($userId) {

       /* $result = $this->db_lib->fetchMultiple("additive_manufacturing_rfq_request_supplier DRRS JOIN master_user MU ON DRRS.supplier_id=MU.uid JOIN additive_manufacturing_rfq DMR ON DMR.dmr_id=DRRS.dmr_id", "DRRS.request_status!='P'", "MU.u_name,MU.u_email, DMR.supplier_id,DRRS.dmr_id, request_supplier_date,customer_accept_status, drrs_id,DMR.part_name,DRRS.request_status");
        return $result;*/
        //if("AMR.supplier_id" == ""){
        $strWhere = "$userId = AMR.customer_user_id AND request_status !='P'";
        $result = $this->db_lib->fetchMultiple("additive_manufacturing_rfq as AMR LEFT JOIN additive_manufacturing_rfq_request_supplier as AMRRS ON AMR.dmr_id=AMRRS.dmr_id", $strWhere, "AMR.dmr_id as dmrID,AMR.*,AMRRS.*");

        return $result;
       
          
    }
     public function ViewAdditiveRfqMultipleDetails($userId) {

     
          $strWhere = "$userId = AMR.customer_user_id";
          $result = $this->db_lib->fetchMultiple("additive_manufacturing_rfq as AMR", $strWhere, "AMR.*");

        return $result;      
    }
    public function viewAdditiveRfqDetails($dmrID) {

        $strWhere = "AMR.dmr_id='$dmrID'";
        $result = $this->db_lib->fetchSingle("additive_manufacturing_rfq as AMR", $strWhere, "AMR.*");

        return $result;
       
          
    }
    
     public function viewRemoteProgramRfqDetails($dmrID) {

            $strWhere = "AMR.rpr_id='$dmrID'";
        $result = $this->db_lib->fetchSingle("remote_programming_rfq as AMR", $strWhere, "AMR.*");

        return $result;
       
          
    }
    public function viewLaserPrcoessingRfqDetails($dmrID) {

        $strWhere = "LPR.dmr_id='$dmrID'";
        $result = $this->db_lib->fetchSingle("laser_processing_rfq as LPR", $strWhere, "LPR.*");

        return $result;
       
          
    }
    public function DigitalmanufacturingSupplierList($requestId) {

        $result = $this->db_lib->fetchMultiple("additive_manufacturing_rfq_request_supplier DRRS JOIN master_user MU ON DRRS.supplier_id=MU.uid", " request_status='A' AND dmr_id = " . $requestId . " ORDER BY customer_accept_status  ", "MU.u_name,MU.u_email, DRRS.supplier_id,DRRS.dmr_id, request_supplier_date, drrs_id");
        return $result;
    }

    public function DigitalmanufacturingSupplierListUpdate($drrs_id) {

        $data['customer_accept_status'] = 'Y';
        $result = $this->db_lib->update("additive_manufacturing_rfq_request_supplier  ", $data, " drrs_id = " . $drrs_id);
        $result_data = $this->db_lib->fetchSingle("additive_manufacturing_rfq_request_supplier  ", " drrs_id = " . $drrs_id);
        $supplier_id = $result_data['supplier_id'];
        $dmr_id = $result_data['dmr_id'];
        $updateData['supplier_id'] = $supplier_id;
        $result = $this->db_lib->update("additive_manufacturing_rfq", $updateData, " dmr_id = " . $dmr_id);
        return $result;
    }

    /*     * ************************* Rapid Prototyping ************************ */

    /**
     * Rapid Prototyping Supplier Accept 
     * update Date 26-07-2018
     * @access public
     * @param  rar_id
     * @return array of requestList
     */
    public function customerRequestsRfqAcceptForRapidprototyping($postdata) {
        $postdata['request_status'] = 'A';
        $drrs_id = $postdata['drrs_id'];
        $data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_application/", MIX_FORMAT, $arrData["old_document"]);
        if ($data1[0])
            $postdata["sample_product_drawing"] = $data1[1];
        $result = $this->db_lib->update("rapid_prototyping_rfq_request_supplier  ", $postdata, " drrs_id = " . $drrs_id);
        return $result;
    }

    /**
     * Rapid Prototyping Supplier Reject
     * update Dat 26-07-2018 Deepak
     * @access public
     * @param  rarc_id
     * @return array of requestList
     */
    public function customerRequestsRfqForRapidprototypingReject($drrs_id) {
        $data['request_status'] = 'R';
        $result = $this->db_lib->update("rapid_prototyping_rfq_request_supplier  ", $data, " drrs_id = " . $drrs_id);
        return $result;
    }

    public function RapidprototypingRfqList($userId) {

        $strWhere = "RPR.customer_user_id = '$userId'";
        $result = $this->db_lib->fetchMultiple("rapid_prototyping_rfq RPR LEFT JOIN rapid_prototyping_rfq_request_supplier RPRRS ON RPRRS.dmr_id=RPR.dmr_id ", $strWhere, "RPR.*,RPR.dmr_id as dmrID,RPRRS.request_status as RQ_Status,RPRRS.*");

        return $result;

    }

     public function viewRapidRfqDetails($dmrID) {

        $strWhere = "RPR.dmr_id='$dmrID'";
        $result = $this->db_lib->fetchSingle("rapid_prototyping_rfq as RPR", $strWhere, "RPR.*");

        return $result;
       
          
    }

    /*     * ************************* Laser Processing ************************ */

    /**
     * Laser Processing Supplier Accept 
     * update Date 26-07-2018
     * @access public
     * @param  rar_id
     * @return array of requestList
     */
    public function customerRequestsRfqForLaserprocessingAccept($postdata) {
        $postdata['request_status'] = 'A';
        $drrs_id = $postdata['drrs_id'];
        $data1 = $this->file_manager->upload('sampleProductDrawing', "uploads/rfq_application/", MIX_FORMAT, $arrData["old_document"]);
        if ($data1[0])
            $postdata["sample_product_drawing"] = $data1[1];
        $result = $this->db_lib->update("laser_processing_rfq_request_supplier  ", $postdata, " drrs_id = " . $drrs_id);
        return $result;
    }

    /**
     * Rapid Prototyping Supplier Reject
     * update Dat 26-07-2018 Deepak
     * @access public
     * @param  rarc_id
     * @return array of requestList
     */
    public function customerRequestsRfqForLaserprocessingReject($drrs_id) {
        $data['request_status'] = 'R';
        $result = $this->db_lib->update("laser_processing_rfq_request_supplier  ", $data, " drrs_id = " . $drrs_id);
        return $result;
    }

 
      public function LaserprocessingRfqList($userId) {

       /* $result = $this->db_lib->fetchMultiple("additive_manufacturing_rfq_request_supplier DRRS JOIN master_user MU ON DRRS.supplier_id=MU.uid JOIN additive_manufacturing_rfq DMR ON DMR.dmr_id=DRRS.dmr_id", "DRRS.request_status!='P'", "MU.u_name,MU.u_email, DMR.supplier_id,DRRS.dmr_id, request_supplier_date,customer_accept_status, drrs_id,DMR.part_name,DRRS.request_status");
        return $result;*/
        //if("AMR.supplier_id" == ""){
        $strWhere = "$userId = LPR.customer_user_id AND request_status !='P'";
        $result = $this->db_lib->fetchMultiple("laser_processing_rfq  LPR LEFT JOIN laser_processing_rfq_request_supplier LPRRS ON LPRRS.dmr_id=LPR.dmr_id", $strWhere, "LPR.dmr_id as dmrID,LPR.*,LPRRS.*");

        return $result;
       
          
    }

    /*     * *** Remote application Video Request ************ */

    /**
     * Remote application Video Class Schedule Insert
     * 13/08/2018
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteappVideoClassScheduleInsert($data) {
        $data['startDate'] = date_ymd($data['courseStartDate']);
        $data['start_time'] = $data['course_start_time'];
        $data['end_time'] = $data['course_end_time'];
        $result = $this->db_lib->insert("remote_application_video_request_tokbox", $data);
        return $result;
    }

    /**
     * Remote application Video Class Schedule Insert
     * 13/08/2018
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteappVideoClassScheduleListCustomer($ravr_id, $userId) {
        $table = " remote_application_video_request as ravr LEFT JOIN remote_application_video_request_tokbox  as ravrt ON ravr.ravr_id = ravrt.ravr_id ";
        $select = " ravr.user_id as user_id,ravrt.* ";
        $result = $this->db_lib->fetchMultiple($table, " ravr.ravr_id = $ravr_id AND  ravr.user_id= $userId ", $select);
        return $result;
    }

    /**
     * Remote Application Class Schedule Insert
     * 13/8/2018 Deepak Shinde
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteappVideoClassScheduleList($ravr_id, $userId) {

        $result = $this->db_lib->fetchMultiple("remote_application_video_request_tokbox  ", " ravr_id = $ravr_id AND created_by_user = $userId ", "");

        return $result;
    }

    /**
     * Remote application Video Class Schedule Insert
     * Deepak Shinde 13/08/2018
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteappVideoClassScheduleFetchSingle($ravr_id) {

        $result = $this->db_lib->fetchSingle("remote_application_video_request_tokbox  ", " id = $ravr_id  ");

        return $result;
    }

    public function remoteappVideoClassScheduleUpdate($data) {
        $id = $data['id'];
        $result = $this->db_lib->update("remote_application_video_request_tokbox  ", $data, " id = $id  ", "");
        return $result;
    }

    /*     * *** Remote Service Video Request ************ */

    /**
     * Remote Service Video Class Schedule Insert
     * 14/08/2018 Deepak Shinde
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteServiceVideoClassScheduleInsert($data) {
        $data['startDate'] = date_ymd($data['courseStartDate']);
        $data['start_time'] = $data['course_start_time'];
        $data['end_time'] = $data['course_end_time'];
        $result = $this->db_lib->insert("remote_service_video_request_tokbox", $data);
        return $result;
    }

    /**
     * Remote Service Class Schedule Insert
     * 13/8/2018 Deepak Shinde
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteServiceVideoClassScheduleList($rsvr_id, $userId) {

        $result = $this->db_lib->fetchMultiple("remote_service_video_request_tokbox  ", "rsvr_id = $rsvr_id AND created_by_user = $userId ", "");

        return $result;
    }

    /**
     * Remote Service Video Class Schedule Insert
     * Deepak Shinde 13/08/2018
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteServiceVideoClassScheduleFetchSingle($rsvr_id) {

        $result = $this->db_lib->fetchSingle("remote_service_video_request_tokbox  ", " id = $rsvr_id  ");

        return $result;
    }

    public function remoteServiceVideoClassScheduleUpdate($data) {
        $id = $data['id'];
        $result = $this->db_lib->update("remote_service_video_request_tokbox  ", $data, " id = $id  ", "");
        return $result;
    }

    /**
     * Remote Services Video Class Schedule Insert
     * 13/08/2018
     * @access public
     * @param  post data
     * @return array of course Enrollment list
     */
    public function remoteServiceVideoClassScheduleListCustomer($rsvr_id, $userId) {
        $table = " remote_service_video_request as rsvr LEFT JOIN remote_service_video_request_tokbox  as rsvrt ON rsvr.rsvr_id = rsvrt.rsvr_id ";
        $select = " rsvr.user_id as user_id,rsvrt.* ";
        $result = $this->db_lib->fetchMultiple($table, " rsvr.rsvr_id = $rsvr_id AND  rsvr.user_id= $userId ", $select);
        return $result;
    }

    public function fetchDataidWhr() {
        $qry = $this->db->query("SELECT * FROM company_master cm,master_user mu WHERE cm.owner_id = mu.uid AND cm.company_id is NOT NULL");
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

    /*     * ***  Add Comapany User **** */

    public function AddCompanyUser($arrData) {
        //print_r($arrData);exit;
        $arrData["entry_date"] = date('Y-m-d');

        $dataw["user_nicename"] = $arrData["u_name"] ;
        $dataw["user_login"] = $arrData["u_email"] ;
        $dataw["user_email"] = $arrData["u_email"] ;
        $dataw["user_registered"] = date('Y-mc-d');

        if ($arrData["is_active"] == "on") {
            $arrData["is_active"] = "1";
        } else {
            $arrData["is_active"] = "0";
        }
        $result = $this->db_lib->insert("master_user", $arrData);
        $resultDA = $this->db_lib->insert("ecommerce_users", $dataw);
        return $result;
    }

    /**
     * Get All User Role
     * @access public
     * @param  user_type
     * @return array of objects
     */
    public function ListUserRole($user_type_id) {


        $strWhere = "URA.role_id=RM.id AND URA.usertype_id='$user_type_id'";
        $result = $this->db_lib->fetchMultiple("usertype_role_association URA JOIN role_master RM", $strWhere, "RM.*");

        return $result;
    }
    /**
     * Get All User Role
     * @access public
     * @param  user_type
     * @return array of objects
     */
    public function ListUserType($user_type_id) {


        $result = $this->db_lib->fetchSingle("user_type_master", " id = $user_type_id ", "");
        return $result;

    }

    /**
     * Check Duplication Company Code 
     * @access public
     * @param  user_type
     * @return array of objects
     */
    public function checkCompanyCodeExist($data) {
        $company_code = $data["company_code"];
        //	print_r($company_code);exit;
        return $companycodeExit = $this->db_lib->fetchSingle("master_user", " company_code='$company_code' ", "uid, company_code, u_user_type, u_name ");
    }

    /* public function findSingleUserActiveStatus($strWhere = 1) {
      return $this->db_lib->fetchSingle('master_user', $strWhere,'');
      } */

    /**
     * Get All Added Users
     * @access public
     * @param  user_type
     * @return array of objects
     */
    public function ListAlluser($id) {


        $strWhere = "MU.u_parent_id='$id'";
        $result = $this->db_lib->fetchMultiple("master_user MU", $strWhere, "MU.*");

        return $result;
    }

    public function UpdateUser($arrData) {
        //print_r($data);exit;!isset($_POST['userName']
        $arrData["updated_date"] = date('Y-m-d');
        if (!isset($arrData["is_active"])) {
            $arrData["is_active"] = "0";
        } else {
            $arrData["is_active"] = "1";
        }
        $result = $this->db_lib->update("master_user", $arrData, "uid = " . $arrData["uid"]);
        return $result;
    }

    public function findSingleUser($strWhere = 1) {
        return $this->db_lib->fetchSingle('master_user', $strWhere, '');
    }

    public function selectAllWhr($tblname, $where, $condition) {

        $result = $this->db_lib->fetchSingle("{$tblname}", " uid = {$condition} ");
        return $result['result'] = $result;
    }

    /*     * ****** Machine Add  *************** */

    public function machineInsertDetails($arrData) {

        $arrData["created_date"] = date('Y-m-d');
        $data1 = $this->file_manager->upload('machine_image', $this->machine_path, IMG_FORMAT, "", 1);
        if ($data1[0])
            $arrData["machine_image"] = $data1[1];

        $video = $this->file_manager->upload('machineVideo', $this->machine_path, VIDEO_FORMAT);
        if ($video[0])
            $arrData["machine_video"] = $video[1];

        return $result = $this->db_lib->insert("machine_details", $arrData);
    }

    /*     * ******* Update Machine ********* */

    public function updateMachineDetails($arrData) {

        $data1 = $this->file_manager->update('machine_image', $this->machine_path, IMG_FORMAT, $arrData['old_image'], 1);
        if ($data1[0])
            $arrData["machine_image"] = $data1[1];

        $video = $this->file_manager->update('machineVideo', $this->machine_path, VIDEO_FORMAT, $arrData['old_video']);

        if ($video[0])
            $arrData["machine_video"] = $video[1];


        return $result = $this->db_lib->update("machine_details", $arrData, " md_id = " . $arrData["id"]);
    }

    public function deleteMachineDetails($id) {
        $data = $this->db_lib->fetchSingle("machine_details", "md_id = $id");
        if ($data)
            $this->file_manager->delete($this->machine_path, $data["machine_video"]);

        $result = $this->db_lib->delete("machine_details", " md_id = " . $id);
        return $result;
    }

    public function machineDetailsMultiple($strWhere) {
        $table = " machine_details as md LEFT JOIN machine_category as mc ON md.category_id = mc.mc_id LEFT JOIN machine_brand MB ON md.brand_name=MB.mb_id  LEFT JOIN machine_brand_model MBM ON md.model_no=MBM.md_id ";
        $select = ' md.*,mc.category_name as catName,MB.brand_name AS brandName, MBM.model_name AS modelName';
        $result = $this->db_lib->fetchMultiple($table, $strWhere, $select);
        $result = [
            'result' => $result
        ];
        return $result;
    }

    public function createGallery($arrData) {
        $data = $this->file_manager->multi_upload('photo_name', $this->machine_path, IMG_FORMAT, "", 1);
        $arData['photo_name'] = $data;
        $arData['md_id'] = $arrData['md_id'];
        foreach ($arData['photo_name'] as $value) {
            if ($data[0])
                $arData['photo_name'] = $value[1];
            $result = $this->db_lib->insert("machine_photos", $arData);
        }
        if ($result) {
            return $result;
        }
        return false;
    }

    public function delete_gallary($id) {
        $data = $this->db_lib->fetchSingle('machine_photos', "mp_id = $id");
        if ($data['photo_name'])
            $this->file_manager->delete($this->path, $data["photo_name"]);

        $result = $this->db_lib->delete('machine_photos', "mp_id = " . $id);
        return $result;
    }

    /*     * *********************** Machine Category **************************** */

    public function findMultipleMachineCat($strWhere = 1) {
        $result = $this->db_lib->fetchMultiple('machine_category', $strWhere, '');
        $result = [
            'result' => $result
        ];
        return $result;
    }

    public function createCategory($arrData) {
        $data1 = $this->file_manager->upload('category_image', $this->machine_path, IMG_FORMAT, "");
        if ($data1[0])
            $arrData["category_image"] = $data1[1];

        $video = $this->file_manager->upload('videoLink', $this->machine_path, VIDEO_FORMAT);
        if ($video[0])
            $arrData["video_upload"] = $video[1];

        $arrData["created_date"] = date('Y-m-d');
        $result = $this->db_lib->insert("machine_category", $arrData);
        return $result;
    }

    public function updateMachineCategory($arrData) {
        $data1 = $this->file_manager->update('category_image', $this->machine_path, IMG_FORMAT, $arrData["old_image"]);
        if ($data1[0])
            $arrData["category_image"] = $data1[1];
        $video = $this->file_manager->update('videoLink', $this->machine_path, VIDEO_FORMAT, $arrData["old_video"]);
        if ($video[0])
            $arrData["video_upload"] = $video[1];

        $result = $this->db_lib->update("machine_category", $arrData, "mc_id = " . $arrData["id"]);

        return $result;
    }

    public function updatePublishMachineCategory($data) {
        // get total records
        $ids = $data["id"];
        if (count($ids) > 0) {
            foreach ($ids as $id) {
                // prepare data
                // publish
                if ($data["publish_$id"] == "Y")
                    $arrData["publish"] = "Y";
                else
                    $arrData["publish"] = "N";
                // update record

                $arrData["display_order"] = $data["display_order_$id"];
                $result = $this->db_lib->update("machine_category", $arrData, "mc_id = " . $id);
            }
            return true;
        }
        return false;
    }

    public function delete($id) {
        $data = $this->db_lib->fetchSingle("machine_category", "mc_id = $id");
        if ($data)
            $this->file_manager->delete($this->machine_path, $data["category_image"]);
        $this->file_manager->delete($this->machine_path, $data["machine_video"]);

        $result = $this->db_lib->delete("machine_category", "mc_id = " . $id);
        return $result;
    }

/////////////////////////////   Add machine Service    //////////////////////////////////


    public function machineServicesInsert($arrData) {
        
        $arrData['request_date_time'] = date('Y-m-d H:i:s');
        return  $this->db_lib->insert('remote_machine_aggrement_request',$arrData);
    }


/////////////////////////////    machine brand    //////////////////////////////////
    /* machine brand Request 
      20/4/2018
     * @access public
     * @param   
     * @return array  
     */
    public function findSingleMachineBrand($id) {
        return $this->db_lib->fetchSingle('machine_brand', " mb_id= $id ", '');
    }

    /* machine brand multile list
      20/4/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findMultipleMachineBrand($strWhere = 1) {
        $result = $this->db_lib->fetchMultiple('machine_brand', $strWhere . " ORDER BY brand_name", '');
        $result = [
            'result' => $result
        ];
        return $result;
    }

    /* machine brand create 
      20/4/2018
     * @access public
     * @param   
     * @return array  
     */

    public function createBrand($arrData) {

        $result = $this->db_lib->insert("machine_brand", $arrData);
        return $result;
    }

    public function updateMachineBrand($arrData) {

        $result = $this->db_lib->update("machine_brand", $arrData, "mb_id = " . $arrData["id"]);

        return $result;
    }

    public function deleteMachineBrand($id) {
        $data = $this->db_lib->fetchSingle("machine_brand", "mb_id = $id");
        if ($data)
            $this->file_manager->delete($this->machine_path, $data["category_image"]);
        $this->file_manager->delete($this->machine_path, $data["machine_video"]);

        $result = $this->db_lib->delete("machine_brand", "mb_id = " . $id);
        return $result;
    }

/////////////////////////////    machine brand Model    //////////////////////////////////
    /* machine brand Model Request 
      21/4/2018
     * @access public
     * @param   
     * @return array  
     */
    public function findSingleMachineBrandModel($id) {
        return $this->db_lib->fetchSingle('machine_brand_model ', " md_id= $id ", '');
    }

    /* machine brand multile list
      21/4/2018
     * @access public
     * @param   
     * @return array  
     */

    public function findMultipleMachineBrandModel($strWhere = 1) {
        $result = $this->db_lib->fetchMultiple('machine_brand_model MBM JOIN machine_brand MB ON MBM.brand_id=MB.mb_id', $strWhere, 'brand_name,MBM.*');
        $result = [
            'result' => $result
        ];
        return $result;
    }

    /* machine brand Model create 
      21/4/2018
     * @access public
     * @param   
     * @return array  
     */

    public function createBrandModel($arrData) {

        $result = $this->db_lib->insert("machine_brand_model", $arrData);
        return $result;
    }

    public function updateMachineBrandModel($arrData) {

        $result = $this->db_lib->update("machine_brand_model", $arrData, "md_id = " . $arrData["id"]);

        return $result;
    }

    public function deleteMachineBrandModel($id) {
        $result = $this->db_lib->delete("machine_brand_model", "md_id = " . $id);
        return $result;
    }
    
    public function insert_log($data)
    {
    //print_r($data['transaction_type']);die;
                  $transaction_type=$data['transaction_type'];
                  $userData['transaction_type']=$transaction_type;
                  $userData['uid']=$data['uid'];
                 //print_r($userData);die;
                  $this->db_lib->insert("user_operation_log",$userData);

    }
    
    
    public function CustomerList($strWhere =1) {

            $result = $this->db_lib->fetchMultiple('remote_machine_aggrement_request', $strWhere,'');
        $result = [
            'result' => $result
        ];
        return $result;
            
    }
      // update machine services
    
    public function updateMachineServices($arrData) {
       // print_r($arrData);die;
        $result = $this->db_lib->update("remote_machine_aggrement_request", $arrData, "rmr_id = " . $arrData["id"]);

        return $result;
    }
    //
    
        
        public function findSingleMachineServices($id) {
		return $this->db_lib->fetchSingle('remote_machine_aggrement_request '," rmr_id= $id ",'');
	}
        
        // delete Machine Services
        
        public function delete_services($id) {

        $result = $this->db_lib->delete("remote_machine_aggrement_request", "rmr_id = " . $id);

        return $result;
    }
    
    //
    
        public function TrainingCoursesList($strWhere =1) {

            $result = $this->db_lib->fetchMultiple('course_customer_request', $strWhere,'');
        $result = [
            'result' => $result
        ];
        return $result;
            
    }
    // training courses 
    public function findSingleTrainingCourses($id) {
		return $this->db_lib->fetchSingle('course_customer_request '," ccr_id= $id ",'');
	}
        
        public function updateTrainingCourses($arrData) {
       // print_r($arrData);die;
        $result = $this->db_lib->update("course_customer_request", $arrData, "ccr_id = " . $arrData["id"]);

        return $result;
    }
    
    
    // deleting training courses
    
    
        public function delete_training_courses($id) {

        $result = $this->db_lib->delete("course_customer_request", "ccr_id = " . $id);

        return $result;
    }


    /***** Remote Application RFQ *****/

     public function findMultiplerfqlist($userId) {
       /* $result = $this->db_lib->fetchMultiple('remote_application_rfq RAR LEFT JOIN remote_application_consultant_request_programmer RACRP ON  RACRP.rpr_id = RAR.rpr_id LEFT JOIN master_user MU ON  MU.uid = RACRP.applicationengineer_id', $strWhere . " ORDER BY rpr_id DESC", 'RACRP.request_status,RACRP.*,MU.u_name,RAR.*');
      
        return $result;*/

        $strWhere = "$userId = RAR.customer_user_id AND RACRP.request_status !='P'";
        $result = $this->db_lib->fetchMultiple("remote_application_rfq as RAR LEFT JOIN remote_application_consultant_request_programmer as RACRP ON  RACRP.rpr_id = RAR.rpr_id", $strWhere, "RAR.rpr_id as rprID,RAR.*,RACRP.*");

        return $result;
    }

     public function viewRemoteApplicationRfqDetails($rprID) {

        $strWhere = "RAR.rpr_id='$rprID'";
        $result = $this->db_lib->fetchSingle("remote_application_rfq as RAR", $strWhere, "RAR.*");

        return $result;
       
          
    }

     public function remoteapplication_rfq_update($arrData) {

        $result = $this->db_lib->update("remote_application_rfq", $arrData, "rpr_id = " . $arrData["id"]);

        return $result;
    }

     public function findSingleremoteapplication_rfq($strWhere = 1) {

         return $this->db_lib->fetchSingle('remote_application_rfq', $strWhere, '');
    }

     public function remoteapplication_rfq_delete($id) {
        $result = $this->db_lib->delete("remote_application_rfq", "rpr_id = " . $id);
        return $result;
    }

     public function findMultiplereportlist($strWhere = 1) {
        $result = $this->db_lib->fetchMultiple('research_licence_purchase RLP LEFT JOIN research_report RR ON  RLP.report_id = RR.report_id', $strWhere . " ORDER BY report_id DESC", 'RR.report_name,RLP.*');
      
        return $result;
    }

    public function findmarketmonitoringlist($strWhere = 1) {
        $result = $this->db_lib->fetchMultiple('snapshots_subscription_purchase SSP LEFT JOIN snapshots_subscription SS ON  SSP.subscription_id = SS.subscription_id', $strWhere . " ORDER BY ssp_id DESC", 'SS.subscription_name,SSP.*');
      
        return $result;
    }

     public function findMultipleTreadServicelist($strWhere = 1) {
        $result = $this->db_lib->fetchMultiple('teranex_report_abuse', $strWhere . " ORDER BY tra_id DESC", '');
      
        return $result;
    }

     public function findmarketGetpaidFeedbacklist($strWhere = 1) {
        $result = $this->db_lib->fetchMultiple('teranex_paid_feedback', $strWhere . " ORDER BY tpf_id DESC", '');
      
        return $result;
    }
    



    public function MachinTimeStudyCustomerRequestList($id) { 
        $result = $this->db_lib->fetchMultiple("machine_timestudy_request MTR JOIN machine_details MD ON MTR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "customer_id=".$id ,"MTR.*, MD.model_no,MD.category_id,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

    public function MachinTimeStudySupplierRequestList($strWhere) { 
        $result = $this->db_lib->fetchMultiple("machine_timestudy_request MTR JOIN machine_details MD ON MTR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", $strWhere ,"MTR.*, MD.model_no,MD.category_id,MD.created_by,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

    public function TimeStudyEstimate($postdata) {

       // $postdata['request_status'] = 'A';
        $data1 = $this->file_manager->upload('upload_quotation', "uploads/time_study_estimate/", MIX_FORMAT, $arrData["old_document"]);
        if ($data1[0])
            $postdata["upload_quotation"] = $data1[1];

          $result = $this->db_lib->insert("machine_timestudy_estimate_response", $postdata);
            
        $postdata['request_status'] = 'QS';
        $mtr_id=$postdata['mtr_id'];
         $result = $this->db_lib->update("machine_timestudy_request", $postdata, " mtr_id = " . $mtr_id);
        return $result;
    }

    public function findSingle_machine_timestudy_estimate_details($mtr_id) { 
        $result = $this->db_lib->fetchSingle("machine_timestudy_request MTR LEFT JOIN machine_timestudy_estimate_response MTER ON MTER.mtr_id=MTR.mtr_id", "MTR.mtr_id=".$mtr_id ,"MTER.*,MTR.*"); 
        return $result;
    }

         // accept cutomer quotation
   public function TimeStudyRequestAcceptBycustomer($mtr_id) 
     { 

        $data['request_status']='C';

        $result = $this->db_lib->update("machine_timestudy_request  ",$data, " mtr_id = ".$mtr_id);


                return $result;

      }
    
    // accept cutomer quotation
        public function TimeStudyRequestRejectBycustomer($mtr_id) 
        { 

        $data['request_status']='R';

        $result = $this->db_lib->update("machine_timestudy_request",$data, " mtr_id = ".$mtr_id);


        return $result;

    }

    public function MachinFinanceCustomerRequestList($id) { 
        $result = $this->db_lib->fetchMultiple("machine_finance_request MFR JOIN machine_details MD ON MFR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "customer_id=".$id ,"MFR.*, MD.model_no,MD.category_id,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

     public function MachinFinanceSupplierRequestList($strWhere) { 
        $result = $this->db_lib->fetchMultiple("machine_finance_request MFR JOIN machine_details MD ON MFR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", $strWhere ,"MFR.*, MD.model_no,MD.category_id,MD.created_by,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

      public function FinanceEstimate($postdata) {

       // $postdata['request_status'] = 'A';
        $data1 = $this->file_manager->upload('upload_quotation', "uploads/finance_estimate/", MIX_FORMAT, $arrData["old_document"]);
        if ($data1[0])
            $postdata["upload_quotation"] = $data1[1];

          $result = $this->db_lib->insert("machine_finance_estimate_response", $postdata);
            
        $postdata['request_status'] = 'QS';
        $mfr_id=$postdata['mfr_id'];
         $result = $this->db_lib->update("machine_finance_request", $postdata, " mfr_id = " . $mfr_id);
        return $result;
    }

     public function findSingle_machine_finance_estimate_details($mfr_id) { 
        $result = $this->db_lib->fetchSingle("machine_finance_request MFR LEFT JOIN machine_finance_estimate_response MFER ON MFER.mfr_id=MFR.mfr_id", "MFR.mfr_id=".$mfr_id ,"MFER.*,MFR.*"); 
        return $result;
    }

     public function findSingle_machine_details($mfr_id) { 
        $result = $this->db_lib->fetchSingle("machine_finance_request MFR LEFT JOIN machine_details MD ON MFR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id","MFR.mfr_id=".$mfr_id,"MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

    public function findSingle_machine_details_insurance($mir_id) { 
        $result = $this->db_lib->fetchSingle("machine_insurance_request MIR LEFT JOIN machine_details MD ON MIR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id"," MIR.mir_id=".$mir_id ,"MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }


          // accept cutomer quotation
   public function FinanceRequestAcceptBycustomer($mfr_id) 
     { 

        $data['request_status']='C';

        $result = $this->db_lib->update("machine_finance_request  ",$data, " mfr_id = ".$mfr_id);


                return $result;

      }
    
    // accept cutomer quotation
        public function FinanceRequestRejectBycustomer($mfr_id) 
        { 

        $data['request_status']='R';

        $result = $this->db_lib->update("machine_finance_request",$data, " mfr_id = ".$mfr_id);


        return $result;

    }

    /****** Machine Insurance Request List ******/

     public function MachinInsuranceCustomerRequestList($id) { 
        $result = $this->db_lib->fetchMultiple("machine_insurance_request MIR JOIN machine_details MD ON MIR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", "customer_id=".$id ,"MIR.*, MD.model_no,MD.category_id,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

    public function MachinInsuranceSupplierRequestList($strWhere) { 
        $result = $this->db_lib->fetchMultiple("machine_insurance_request MIR JOIN machine_details MD ON MIR.machine_id=MD.md_id LEFT JOIN machine_category MC ON MD.category_id=MC.mc_id LEFT JOIN machine_brand MB ON MD.brand_name=MB.mb_id LEFT JOIN machine_brand_model MBM ON MD.model_no=MBM.md_id", $strWhere ,"MIR.*, MD.model_no,MD.category_id,MD.created_by,MD.brand_name,MC.category_name,MB.brand_name,MBM.model_name"); 
        return $result;
    }

    public function InsuranceEstimate($postdata) {

       // $postdata['request_status'] = 'A';
        $data1 = $this->file_manager->upload('upload_quotation', "uploads/finance_estimate/", MIX_FORMAT, $arrData["old_document"]);
        if ($data1[0])
            $postdata["upload_quotation"] = $data1[1];

          $result = $this->db_lib->insert("machine_insurance_estimate_response", $postdata);
            
        $postdata['request_status'] = 'QS';
        $mir_id=$postdata['mir_id'];
         $result = $this->db_lib->update("machine_insurance_request", $postdata, " mir_id = " . $mir_id);
        return $result;
    }

     public function findSingle_machine_insurance_estimate_details($mir_id) { 
        $result = $this->db_lib->fetchSingle("machine_insurance_request MIR LEFT JOIN machine_insurance_estimate_response MIER ON MIER.mir_id=MIR.mir_id", "MIR.mir_id=".$mir_id ,"MIER.*,MIR.*"); 
        return $result;
    }

              // accept cutomer quotation
   public function InsuranceRequestAcceptBycustomer($mir_id) 
     { 
        $data['request_status']='C';
        $result = $this->db_lib->update("machine_insurance_request",$data, " mir_id = ".$mir_id);
                return $result;
      }
    
    // accept cutomer quotation
    public function InsuranceRequestRejectBycustomer($mir_id) 
        { 
        $data['request_status']='R';
        $result = $this->db_lib->update("machine_insurance_request",$data, " mir_id = ".$mir_id);
        return $result;
    }

	/* Supplier Machine Order */
	public function uploadQuote($arrData) {
        $data1 = $this->file_manager->upload('supplier_quote',$this->machine_order_path, MIX_FORMAT, "");
		
        if ($data1[0]) {
			$arrData["supplier_quote"] = $data1[1];
			$arrData["quote"] = 'Y';
			return $customer_id = $this->db_lib->update("machine_order", $arrData," id = ".$arrData['id']);
        }else{
			return false;
		}
		
    }
	public function uploadSoc($arrData) {
        $data1 = $this->file_manager->upload('supplier_soc',$this->machine_order_path, MIX_FORMAT, "");
		
        if ($data1[0]) {
			$arrData["supplier_soc"] = $data1[1];
			$arrData["soc"] = 'Y';
			return $customer_id = $this->db_lib->update("machine_order", $arrData," id = ".$arrData['id']);
        }else{
			return false;
		}
		
    }
	public function uploadnda($arrData) {
        $data1 = $this->file_manager->upload('customer_nda',$this->machine_order_path, MIX_FORMAT, "");
		
        if ($data1[0]) {
			$arrData["customer_nda"] = $data1[1];
			$arrData["customer_nda_status"] = 'Y';
			return $customer_id = $this->db_lib->update("machine_order", $arrData," id = ".$arrData['id']);
        }else{
			return false;
		}
		
    }
	public function uploadpurchaseorder($arrData) {
		
        $data1 = $this->file_manager->upload('customer_purchase_order',$this->machine_order_path, MIX_FORMAT, "");
		
        if ($data1[0]) {
			$arrData["customer_purchase_order"] = $data1[1];
			$arrData["purchase_order"] = 'Y';
			return $customer_id = $this->db_lib->update("machine_order", $arrData," id = ".$arrData['id']);
        }else{
			return false;
		}
		
    }
	
	public function warrentyDetails($arrData) {
			return $customer_id = $this->db_lib->update("machine_order", $arrData," id = ".$arrData['id']);
    }
	
	public function uploadOffer($arrData) {
        $data1 = $this->file_manager->upload('upload_offer',$this->machine_order_path, MIX_FORMAT, "");

        if ($data1[0]) {
			$arrData["offer"] = 'Y';
			$customer_id = $this->db_lib->update("machine_order", $arrData," id = ".$arrData['id']);
			if($customer_id){
				$arrayData["order_id"] = $arrData['id'];
				$arrayData["offer"] = $data1[1];
				return $result = $this->db_lib->insert("machine_order_offer", $arrayData);
			}
		}else{
			return false;
		}
		
    }
	public function orderSingleDetails($strWhere) {
		$table = " machine_order as mo LEFT JOIN master_user as mu ON mu.uid=mo.customer_id ";
		$select = " mo.*,mu.u_name as userName";
		$result = $this->db_lib->fetchSingle($table,$strWhere." ORDER BY mo.id DESC ",$select);
        return $result;
    }
	
	public function orderSingleOfferDetails($strWhere) {
		$result = $this->db_lib->fetchMultiple("machine_order_offer", $strWhere, $select);
        return $result;
    }

	public function supplierListOrder($strWhere) {
		$table = " machine_order as mo 
						LEFT JOIN 
					machine_details as md ON mo.machine_id = md.md_id	
						LEFT JOIN
					master_user as mu ON mu.uid=mo.customer_id ";
		$select = " mo.*,mu.u_name as userName,md.machine_unique_id as machine_unique_id";
		$result = $this->db_lib->fetchMultiple($table,$strWhere." ORDER BY mo.id DESC ",$select);
        return $result;
    }
	public function customerListOrder($strWhere) {
		$table = " machine_order as mo LEFT JOIN 
					machine_details as md ON mo.machine_id = md.md_id LEFT JOIN master_user as mu ON mu.uid=mo.supplier_id ";
		$select = " mo.*,mu.u_name as userName,md.machine_unique_id as machine_unique_id";
		$result = $this->db_lib->fetchMultiple($table,$strWhere." ORDER BY mo.id DESC ",$select);
        return $result;
    }
	
	/* Training Request List */
	
    public function trainingRequestServices($strWhere) {

        $table = " 	technical_service_request as tsr 
					LEFT JOIN 
						master_user as mu ON tsr.customer_id=mu.uid 
							LEFT JOIN
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id	";

        $select = " tsr.*,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail,md.md_id,md.machine_unique_id,md.category_id,model_no,mb.brand_name,mc.category_name,mbm.model_name ";

        $result = $this->db_lib->fetchMultiple($table, $strWhere, $select);

        return $result;
    }
		
	public function requestTrainingRequest($data) {

		$result = $this->db_lib->insert("technical_service_request_tokbox", $data);
		return $result;
    } 
	public function technicalServicestokboxList($tech_req_id) {



        $result = $this->db_lib->fetchMultiple(" technical_service_request_tokbox ", " tech_req_id= $tech_req_id ", "");

        return $result;
    }
	
	public function technicalServiceClassScheduleFetchSingle($id) {

        $result = $this->db_lib->fetchSingle("technical_service_request_tokbox", " id = $id ", "");

        return $result;
    }
	public function requestTrainingUpdate($data) {


		$id = $data['id'];
        $result = $this->db_lib->update("technical_service_request_tokbox", $data, "id= $id ");

        return $result;
    }

	
	
	/* Application Request */
	public function applicationRequestServices($strWhere) {

        $table = "  application_support_request as tsr LEFT JOIN master_user as mu ON tsr.customer_id=mu.uid LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id	 ";

        $select = " tsr.*,tsr.engg_id as req_engg_id,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail,md.parent_id,machine_unique_id,md.category_id,model_no,mc.category_name,mbm.model_name,mb.brand_name ";

        $result = $this->db_lib->fetchMultiple($table, $strWhere, $select);

        return $result;
    }
	
	  public function applicationSupportclassScheduleListConsultant($app_req_id) {

        $result = $this->db_lib->fetchMultiple('application_support_zoom', " app_req_id = $app_req_id ORDER BY id DESC", "");

        return $result;
    }
	public function techncialSupportclassScheduleListConsultant($tech_req_id) {

        $result = $this->db_lib->fetchMultiple('technical_support_zoom', " tech_req_id = $tech_req_id ORDER by id DESC", "");

        return $result;
    }
	public function liveMachineDemoclassScheduleListConsultant($mvr_id) {

        $result = $this->db_lib->fetchMultiple('live_machine_support_zoom', " mvr_id = $mvr_id ORDER by id DESC", "");

        return $result;
    }
	
	public function zoomResponseInsertApplicationSupport($data) {

        return $result = $this->db_lib->insert("application_support_zoom", $data);
    }
	public function zoomResponseInsertTechSupport($data) {

        return $result = $this->db_lib->insert("technical_support_zoom", $data);
    }
	public function zoomResponseInsertMachineLiveDemo($data) {

        return $result = $this->db_lib->insert("live_machine_support_zoom", $data);
    }
	/* Freelancer Model */
	public function freelancerRequestServices($strWhere) {

        $table = " freelancer_support_request as tsr LEFT JOIN master_user as mu ON tsr.customer_id=mu.uid 
						LEFT JOIN 
					machine_details as md ON tsr.machine_id = md.md_id
						LEFT JOIN
					machine_brand as mb ON md.brand_name = mb.mb_id
						LEFT JOIN
					machine_category as mc ON md.category_id = mc.mc_id
						LEFT JOIN
					machine_brand_model as mbm ON md.model_no = mbm.md_id	 ";
 
        $select = " tsr.*,mu.u_name as username,mu.u_mobileno as userMobile,mu.u_email as useremail,md.parent_id,machine_unique_id,md.category_id,model_no,mc.category_name,mbm.model_name,mb.brand_name ";

        $result = $this->db_lib->fetchMultiple($table, $strWhere." ORDER BY tsr.id DESC", $select);

        return $result;
    }
	
	  public function freelancerSupportclassScheduleListConsultant($free_req_id) {

        $result = $this->db_lib->fetchMultiple('freelancer_support_zoom', " free_req_id = $free_req_id ", "");

        return $result;
    }
	
	public function zoomResponseInsertFreelancer($data) {
		
        $result = $this->db_lib->insert("freelancer_support_zoom", $data);
		if($result){
			$upDate['status'] = "W";
			$id=$data['free_req_id'];
        $result = $this->db_lib->update("freelancer_support_request", $upDate," id = $id ");
		}
		return  $result;
    }
	public function freelancertokboxList($free_req_id) {
		$result = $this->db_lib->fetchMultiple(" freelancer_request_tokbox ", " free_req_id= $free_req_id ", "");

        return $result;
    }
	
	public function requestFreelancerRequest($data) {

		$result = $this->db_lib->insert("freelancer_request_tokbox", $data);
		return $result;
    } 
	public function freelancerClassScheduleFetchSingle($id) {

        $result = $this->db_lib->fetchSingle("freelancer_request_tokbox", " id = $id ", "");

        return $result;
    }
	
	public function requestFreelanceUpdate($data) {


		$id = $data['id'];
        $result = $this->db_lib->update("freelancer_request_tokbox", $data, "id= $id ");

        return $result;
    }	
	/* MAchine from Supplier  Insert */
	 public function saleMachineToCustomer($arrData) { 
		$data1 = $this->file_manager->upload('supplier_nda',$this->machine_order_path, MIX_FORMAT, "");
		if ($data1[0]) {
			$arrData["supplier_nda"] = $data1[1];
			return  $this->db_lib->insert('machine_order',$arrData);
        }else{
			return  $this->db_lib->insert('machine_order',$arrData);
		}

    }
}

?>