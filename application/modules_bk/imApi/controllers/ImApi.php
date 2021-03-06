<?php
defined('BASEPATH') OR exit('No direct script access allowed');
use ElephantIO\Client;
use ElephantIO\Engine\SocketIO\Version2X;

class ImApi extends REST_Controller
{

    //for requesting model class and checking user authentication
    public function __construct()
    {
        parent::__construct();

        // $this->load->helper("f");
        $this->load->model("Im_group_Model");
        $this->load->model("Im_group_members_Model");
        $this->load->model("Im_message_Model");
        $this->load->model("User_Model");
        $this->load->model("Im_receiver_Model");
        $this->load->model("Im_blocklist");
        $this->load->model("Im_mutelist");

        if(!ID_LOGIN) {
            $headers = apache_request_headers();
            if (isset($headers["authorizationkeyfortoken"])) {
                if (!$this->User_Model->isValidToken($headers["authorizationkeyfortoken"])) {
                    $response = array(
                        "stauts" => array(
                            "code" => REST_Controller::HTTP_UNAUTHORIZED,
                            "message" => "Unauthorized"
                        ),
                        "response" => null
                    );
                    $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                    return;
                }
            } else {
                $response = array(
                    "stauts" => array(
                        "code" => REST_Controller::HTTP_UNAUTHORIZED,
                        "message" => "Unauthorized"
                    ),
                    "response" => null
                );
                $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                return;
            }
        }
    }

    public function getMembers_get()
    {
        if(ID_LOGIN){
            $userId=$this->get("userId");
            if ($userId == null) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Error "
                    ),
                    "response" => "userId is required"
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;
            }
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $g_id = $this->get("groupId",true);
        if ($g_id == null) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "groupId is required"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $membersInfo = array();

        $members = $this->Im_group_members_Model->getMembersWihoutSender($g_id, $userId);

        foreach ($members as $u_id) {
            $membersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
        }

        $meCreator = $this->Im_group_Model->ifThisUserCreator($g_id, $userId);
        $groupFiles=$this->Im_message_Model->getGroupFiles($g_id);
        $groupImages=$this->Im_message_Model->getGroupImages($g_id);

        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success"
            ),
            "response" => array(
                "meCreator" => $meCreator,
                "memberList" => $membersInfo,
                "groupFiles"=>$groupFiles,
                "groupImages"=>$groupImages,
                "mute"=>(int)$this->Im_mutelist->ifExist($userId,$g_id),
                "block"=>(int)$this->Im_group_Model->isBlocked($g_id),
            )

        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    // delete a member from the group
    public function deleteMember_post()
    {
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $this->form_validation->set_rules('memberId', 'memberId', 'required');
        $this->form_validation->set_rules('groupId', 'groupId', 'required');
        $deletedMemberId = $this->post("memberId", true);
        $groupId = $this->post("groupId", true);

        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $groupType=$this->Im_group_Model->getType($groupId);
        if($groupType){
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "Group is personal"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }


        $membersWithDeletedOne=array();
        $meCreator = $this->Im_group_Model->ifThisUserCreator($groupId, $userId);
        if($this->Im_group_members_Model->ifExist($groupId,$deletedMemberId)) {
            $this->memberUpdate($userId, $groupId, $deletedMemberId, "delete");

            //$memberList=$this->Im_group_members_Model->getMembers($groupId);

            /*if (!$meCreator) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_UNAUTHORIZED,
                        "message" => "Error "
                    ),
                    "response" => "Can't delete member"
                );
                $this->response($response, REST_Controller::HTTP_UNAUTHORIZED);
                return;
            }*/

            //$memberList=$this->Im_group_members_Model->getMembers($groupId);
            $membersWithDeletedOne = $this->Im_group_members_Model->getMembers($groupId);
            $this->Im_group_members_Model->delete($groupId, $deletedMemberId);
            $this->Im_receiver_Model->DeleteAll($groupId, $deletedMemberId);
        }
        $membersInfo = array();
        //$membersGroupInfo=array();
        $requestUseMembersInfo=array();

        $members = $this->Im_group_members_Model->getMembers($groupId);
        foreach ($members as $u_id) {
            $membersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
            //$membersGroupInfo[$u_id->u_id]=$this->getGroupInfo($groupId,$u_id->u_id);
        }
        $requestUserMembers=$this->Im_group_members_Model->getMembersWihoutSender($groupId,$userId);
        foreach ($requestUserMembers as $u_id) {
            $requestUseMembersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);

        }
        /*$creatorId = $this->Im_group_Model->get($groupId)->createdBy;
        $meCreator = false;
        if ($userId == $creatorId) {
            $meCreator = true;
        }*/
        if(ID_LOGIN){
            $registerData = array(
                "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                "url" => base_url()
            );
        }else {
            $registerData = array(
                "_r" => $headers["authorizationkeyfortoken"],
                "url" => base_url()
            );
        }
        /*$updateData=array(
            "_r"=>$headers["authorizationkeyfortoken"],
            "groupId"=>$groupId,
            "memberIds"=>$memberList
        );*/
        $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
        $client->initialize();
        $client->emit("register", $registerData);

        foreach ($membersWithDeletedOne as $memberId) {
            $removeGroup = false;
            $newMembersInfo = array();
            if ($memberId->u_id === $deletedMemberId) {
                $removeGroup = true;
            }
            if (!$removeGroup) {
                $otherMembers = $this->Im_group_members_Model->getMembersWihoutSender($groupId, $memberId->u_id);
                foreach ($otherMembers as $u_id) {
                    $newMembersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
                    //$membersGroupInfo[$u_id->u_id]=$this->getGroupInfo($groupId,$u_id->u_id);
                }
            }
            if(ID_LOGIN){
                $updateData = array(
                    "_r" =>"",
                    "userId" => $userId,
                    "groupId" => $groupId,
                    "memberId" => $memberId->u_id,
                    "removeGroup" => $removeGroup,
                    "groupInfo" => $this->getGroupInfo($groupId, $memberId->u_id),
                    "memberList" => $newMembersInfo,


                );
            }else {
                $updateData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "groupId" => $groupId,
                    "memberId" => $memberId->u_id,
                    "removeGroup" => $removeGroup,
                    "groupInfo" => $this->getGroupInfo($groupId, $memberId->u_id),
                    "memberList" => $newMembersInfo,


                );
            }
            $client->emit("deleteMember", $updateData);
        }

        $client->close();
        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success"
            ),
            "response" => array(
                "meCreator" => $meCreator,
                "memberList" => $requestUseMembersInfo,
                "groupInfo" => $this->getGroupInfo($groupId, $userId)
            )

        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    private function memberUpdate($userId, $groupId, $memberId, $updateType)
    {
        $headers = apache_request_headers();
        $receiverType = "group";
        $date = date('Y-m-d');
        $time = date("h:i:s");
        $date_time = date(DATE_ISO8601, time());
        $fileType = "update";
        $message = null;

        $recentMessage=$this->Im_message_Model->getRecentMessage($groupId);
        if ($updateType == "add") {
            $message = $memberId . " is added by " . $userId;
            if($recentMessage!=null) {
                $this->Im_receiver_Model->addPendingForNewMember($memberId, $groupId, $recentMessage->m_id);
            }
        } else if ($updateType == "delete") {
            if((int)$userId===(int)$memberId){
                $message = $memberId . " left the group.";
            }else{
                $message = $memberId . " is removed by " . $userId;
            }
            if($recentMessage!=null) {
                $this->Im_receiver_Model->DeletePendingMessage($groupId, $memberId, $recentMessage->m_id);
            }
        } else if ($updateType == "name") {
            $groupInfo = $this->Im_group_Model->get($groupId);
            $groupName = $groupInfo->name;
            $message = $userId . " change the group name to " . $groupName;
        }
        if ($message != null) {
            $this->Im_message_Model->insert($userId, $groupId, $message, $fileType,null, $receiverType, $date, $time, $date_time);
            $fullMessage = $this->Im_message_Model->getRecentMessageWithUpdate($groupId);
            $senderInfo = $this->User_Model->get_user($userId, null, null);

            $ios_date_time = date_format(date_create($fullMessage->date_time), DATE_ISO8601);

            $fullMessage->ios_date_time = $ios_date_time;
            $fullMessage->message = $this->processUpdate($fullMessage->message);
            if(ID_LOGIN){
                $socketData = array(
                    "_r" => $this->User_Model->getTokenRAWDataById($userId),
                    "to" => $groupId,
                    "receiversId" => [],
                    "message" => $fullMessage,
                    "sender" => $senderInfo,

                );
                $registerData = array(
                    "_r" => $this->User_Model->getTokenRAWDataById($userId),
                    "url" => base_url()
                );
            }else{
                $socketData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "to" => $groupId,
                    "receiversId" => [],
                    "message" => $fullMessage,
                    "sender" => $senderInfo,

                );
                $registerData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "url" => base_url()
                );
            }

            $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
            $client->initialize();
            $client->emit("register", $registerData);
            $client->emit('sendMessage', $socketData);
            //$client->emit("updateMember",$response);
            $client->close();
        }
    }

    private function processUpdate($message)
    {

        $str = explode(" ", $message);

        if (is_numeric($str[0])) {
            $str[0] = $this->User_Model->get_user((int)$str[0],null,null)['firstName'];
        }
        if (is_numeric($str[count($str) - 1])) {
            $str[count($str) - 1] = $this->User_Model->get_user((int)$str[count($str) - 1],null,null)['firstName'];
        }

        return implode(" ", $str);
    }

    private function getGroupInfo($g_id, $userId)
    {
        $membersInfo = array();
        $groupImage = array();
        $groupInfo = $this->Im_group_Model->get($g_id);
        $lastActive = $groupInfo->lastActive;
        $groupName = $groupInfo->name;
        $groupType=(int)$groupInfo->type;
        $block=(int)$groupInfo->block;
        $blocker=0;

        if($groupType && $block){
            $blocker=(int)$this->Im_blocklist->ifExist($userId,$g_id);
        }
        //$me=$this->User_Model->get_user($userId,null,null);
        $recentMessage = $this->Im_message_Model->getRecentMessage($g_id);
        $pendingMessages = $this->Im_receiver_Model->getGroupPendingMessage($g_id, $userId);

        $members = $this->Im_group_members_Model->getMembersWihoutSender($g_id, $userId);
        foreach ($members as $u_id) {
            $membersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
        }
        $totalMember = $this->Im_group_members_Model->getTotalGroupMember($g_id);
        if ($totalMember > 1) {
            if ($totalMember >= 4) {
                for ($i = 0; $i < 3; $i++) {
                    $groupImage[] = $membersInfo[$i]['profilePictureUrl'];
                }
            } else if ($totalMember >= 3) {
                for ($i = 0; $i < 2; $i++) {
                    $groupImage[] = $membersInfo[$i]['profilePictureUrl'];
                }
            } else if ($totalMember <= 2) {
                $groupImage[] = $membersInfo[0]['profilePictureUrl'];
            }
            $totalMember = $totalMember - 1;
        } else {
            $groupImage[] = base_url() . "assets/img/download.png";
            if ($groupName == null || $groupName == "" || $groupName == '""' || $groupName == "''") {
                $groupName = "No Member";
            }
        }

        if ($groupName == null || $groupName == "" || $groupName == '""' || $groupName == "''" || $groupName == "''") {
            $groupName = "";
            if ($totalMember <= 2) {
                for ($i = 0; $i < $totalMember; $i++) {
                    if($totalMember==1){
                        $groupName .= " " . $membersInfo[$i]['firstName']." ".$membersInfo[$i]['lastName'];
                        break;
                    }
                    else if ($i == ($totalMember - 1)) {
                        $groupName .= " " . $membersInfo[$i]['firstName'];
                    } else {
                        $groupName .= " " . $membersInfo[$i]['firstName'] . ",";
                    }
                }
            } elseif ($totalMember >= 3) {
                for ($i = 0; $i < $totalMember; $i++) {
                    if ($i == ($totalMember - 1)) {
                        $groupName .= " " . $membersInfo[$i]['firstName'];
                    } else {
                        $groupName .= " " . $membersInfo[$i]['firstName'] . ",";
                    }
                }
            } else {
                $groupName = "No Member";

            }
        }
        $lastActive = date_format(date_create($lastActive), DATE_ISO8601);
        $meCreator = $this->Im_group_Model->ifThisUserCreator($g_id, $userId);
        if($recentMessage!=null){
            $group = array(
                "groupId" => (int)$g_id,
                "groupImage" => $groupImage,
                "groupName" => trim($groupName),
                "groupType"=>(int)$groupType,
                //"totalMember"=>$totalMember,
                "lastActive" => $lastActive,
                "block"=>$block,
                "meBlocker"=>$blocker,
                "mute"=>(int)$this->Im_mutelist->ifExist($userId,$g_id),
                "members"=>$membersInfo,
                //"me"=>$me,
                "meCreator" => $meCreator,
                "recentMessage" => $recentMessage->message,
                "messageType" => $recentMessage->type,
                "pendingMessage" => $pendingMessages
                //"messageDateTime"=>$recentMessage->date_time,
            );
        }else{
            $group = array(
                "groupId" => (int)$g_id,
                "groupImage" => $groupImage,
                "groupName" => trim($groupName),
                "groupType"=>(int)$groupType,
                //"totalMember"=>$totalMember,
                "lastActive" => $lastActive,
                "block"=>$block,
                "meBlocker"=>$blocker,
                "mute"=>(int)$this->Im_mutelist->ifExist($userId,$g_id),
                //"members"=>$membersInfo,
                //"me"=>$me,
                "meCreator" => $meCreator,
                "recentMessage" => null,
                "messageType" => null,
                "pendingMessage" => $pendingMessages
                //"messageDateTime"=>$recentMessage->date_time,
            );
        }

        return $group;
    }

    public function getGroups_get()
    {  //get all groups
        if(ID_LOGIN){
            $userId=$this->get("userId");
            if ($userId == null) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Error "
                    ),
                    "response" => "userId is required"
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;
            }
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $limit = $this->get("limit", true);
        $start = $this->get("start", true);
        if( $start==null || $limit==null){
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "start and limit is required"
                )
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }

        $group_ids = $this->Im_group_members_Model->getGroups($userId, $limit, $start);
        $groups = array();
        foreach ($group_ids as $g_id) {
            $membersInfo = array();
            $groupImage = array();
            $groupInfo = $this->Im_group_Model->get($g_id->g_id);
            $lastActive = $groupInfo->lastActive;
            $groupName = $groupInfo->name;
            $groupType=(int)$groupInfo->type;
            $block=(int)$groupInfo->block;
            $pendingMessages =0;
            $blocker=0;

            if($groupType && $block){
                $blocker=(int)$this->Im_blocklist->ifExist($userId,$g_id->g_id);
            }

            $recentMessage = $this->Im_message_Model->getRecentMessage($g_id->g_id);
            if( $recentMessage!=null && (int)$recentMessage->sender!=(int)$userId){
                $pendingMessages = $this->Im_receiver_Model->getGroupPendingMessage($g_id->g_id, $userId);
            }
            $members = $this->Im_group_members_Model->getMembersWihoutSender($g_id->g_id, $userId);
            foreach ($members as $u_id) {
                $membersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
            }
            $totalMember = $this->Im_group_members_Model->getTotalGroupMember($g_id->g_id);
            if ($totalMember > 1) {
                if ($totalMember >= 4) {
                    for ($i = 0; $i < 3; $i++) {
                        $groupImage[] = $membersInfo[$i]['profilePictureUrl'];
                    }
                } else if ($totalMember >= 3) {
                    for ($i = 0; $i < 2; $i++) {
                        $groupImage[] = $membersInfo[$i]['profilePictureUrl'];
                    }
                } else if ($totalMember <= 2) {
                    $groupImage[] = $membersInfo[0]['profilePictureUrl'];
                }
                $totalMember = $totalMember - 1;
            } else {
                $groupImage[] = base_url() . "assets/img/download.png";
                if ($groupName == null || $groupName == "" || $groupName == '""' || $groupName == "''") {
                    $groupName = "No Member";
                }
            }

            if ($groupName == null || $groupName == "" || $groupName == '""' || $groupName == "''") {
                $groupName = "";
                if ($totalMember <= 2) {
                    for ($i = 0; $i < $totalMember; $i++) {
                        if($totalMember==1){
                            $groupName .= " " . $membersInfo[$i]['firstName']." ".$membersInfo[$i]['lastName'];
                            break;
                        }
                        else if ($i == ($totalMember - 1)) {
                            $groupName .= " " . $membersInfo[$i]['firstName'];
                        } else {
                            $groupName .= " " . $membersInfo[$i]['firstName'] . ",";
                        }
                    }
                } elseif ($totalMember >= 3) {
                    for ($i = 0; $i < $totalMember; $i++) {
                        if ($i == ($totalMember - 1)) {
                            $groupName .= " " . $membersInfo[$i]['firstName'];
                        } else {
                            $groupName .= " " . $membersInfo[$i]['firstName'] . ",";
                        }
                    }
                } else {
                    $groupName = "No Member";
                }
            }
            $lastActive = date_format(date_create($lastActive), DATE_ISO8601);
            $creatorId = $this->Im_group_Model->get($g_id->g_id)->createdBy;
            $meCreator = $this->Im_group_Model->ifThisUserCreator($g_id->g_id, $userId);
            if ($recentMessage == null) {
                $groups[] = array(
                    "groupId" => (int)$g_id->g_id,
                    "groupImage" => $groupImage,
                    "groupName" => trim($groupName),
                    "groupType"=>(int)$groupType,
                    //"totalMember"=>$totalMember,
                    "lastActive" => $lastActive,
                    "block"=>$block,
                    "meBlocker"=>$blocker,
                    "mute"=>(int)$this->Im_mutelist->ifExist($userId,$g_id->g_id),
                    "members"=>$membersInfo,
                    "meCreator" => $meCreator,
                    "recentMessage" => null,
                    "messageType" => null,
                    "pendingMessage" => $pendingMessages,
                    //"messageDateTime"=>$recentMessage->date_time,
                );
            } else {
                $groups[] = array(
                    "groupId" => (int)$g_id->g_id,
                    "groupImage" => $groupImage,
                    "groupName" => trim($groupName),
                    "groupType"=>(int)$groupType,
                    //"totalMember"=>$totalMember,
                    "lastActive" => $lastActive,
                    "block"=>$block,
                    "meBlocker"=>$blocker,
                    "mute"=>(int)$this->Im_mutelist->ifExist($userId,$g_id->g_id),
                    "members"=>$membersInfo,
                    "meCreator" => $meCreator,
                    "recentMessage" => $recentMessage->message,
                    "messageType" => $recentMessage->type,
                    "pendingMessage" => $pendingMessages,
                    //"messageDateTime"=>$recentMessage->date_time,
                );
            }

        }
        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success",
                "total"=>$this->Im_group_members_Model->getTotalGroups($userId)
            ),
            "response" => $groups
        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    //get pending not pending messages

    public function changeGroupName_post()
    {
        $this->form_validation->set_rules('groupName', 'groupName', 'required');
        $this->form_validation->set_rules('groupId', 'groupId', 'required');
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $groupId = $this->post("groupId", true);
        $groupType=$this->Im_group_Model->getType($groupId);
        if($groupType){
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "Group is personal"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }

        $groupName = $this->post("groupName", true);
        if ($groupName == "" || $groupName == '""' || $groupName == "''") {
            $groupName = null;
        }

        $this->Im_group_Model->update($groupId, $groupName);
        $memberList = $this->Im_group_members_Model->getMembers($groupId);


        /*$members=$this->Im_group_members_Model->getMembersWihoutSender($groupId,$userId);
        foreach ($members as $u_id){

        }*/
        if(ID_LOGIN){
            $updateData = array(
                "_r" =>"",
                "userId" => $userId,
                "groupId" => $groupId,
                "memberIds" => $memberList,
                "groupName" => $groupName
            );
            $registerData = array(
                "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                "url" => base_url()
            );
        }else {
            $updateData = array(
                "_r" => $headers["authorizationkeyfortoken"],
                "groupId" => $groupId,
                "memberIds" => $memberList,
                "groupName" => $groupName
            );
            $registerData = array(
                "_r" => $headers["authorizationkeyfortoken"],
                "url" => base_url()
            );
        }
        $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
        $client->initialize();
        $client->emit("register", $registerData);
        $client->emit("updateGroupName", $updateData);
        $client->close();
        $this->memberUpdate($userId, $groupId, null, "name");
        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success"
            ),
            "response" => null

        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    private function processSeen($m_id,$g_id,$senderId){

        $totalMember=(int)$this->Im_group_members_Model->getTotalGroupMember($g_id);
        $totalSeen=(int)$this->Im_receiver_Model->getTotalReceiver($m_id);
       // $groupType=$this->Im_group_Model->getType($g_id);
        if($totalSeen==null || $totalSeen==0){
            return null;
        }
        if($totalMember==2 && $totalSeen==2){
            $seenData=array(
                "seen"=>"seen ",
                "time"=>null
            );
            $recentMessage=$this->Im_receiver_Model->getReceivedMessageTime($senderId,$g_id,$m_id);
            if($recentMessage!=null){
                $seenData["time"]=$recentMessage;
            }
            return $seenData;
        }
        if($totalMember==$totalSeen && $totalMember!=1){
            $seenData=array(
                "seen"=>"Seen by Everyone",
                "time"=>null
            );
            return $seenData;
        }
        else if ($totalMember==1){
            return null;
        }
        else{
            $membersIds=$this->Im_group_members_Model->getMembersWihoutSender($g_id,$senderId);
            $seen="Seen by ";
            $names=array();
            for ($i=0;$i<count($membersIds);$i++){
                $name=$this->User_Model->getFirstName($membersIds[$i]->u_id);
                if($this->Im_receiver_Model->isReceived($membersIds[$i]->u_id,$g_id,$m_id)){
                    $names[]=$name;
                }

            }
            if(count($names)!=0){
                $seenData=array(
                    "seen"=>$seen.implode(",",$names),
                    "time"=>null
                );
                return $seenData;
            }
            else return null;
        }

    }

    public function getMessage_get()
    {
        if(ID_LOGIN){
            $r_id=$this->get("userId");
            if ($r_id == null) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Error "
                    ),
                    "response" => "userId is required"
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;
            }
        }else{
            $headers = apache_request_headers();
            $r_id = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }

        $isAdminRequest=(bool)$this->get("isAdmin"); // check request is make by admin or not
        $g_id = $this->get("groupId",true);
        $start = $this->get("start",true);
        $limit = $this->get("limit",true);
        $receivedTime=date(DATE_ISO8601, time());
        if($g_id==null || $start==null || $limit==null){
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "groupId,start and limit is required"
                )
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }

        $messages = $this->Im_message_Model->getMessage($g_id, $start, $limit);  //get messages
        $totalMessage = $this->Im_message_Model->getTotalMessage($g_id);
        $data = [];
        $recentMessage=$this->Im_message_Model->getRecentMessage($g_id);
        if($recentMessage!=null && !$isAdminRequest) {
            if($this->Im_receiver_Model->isNotReceived($r_id,$g_id,$recentMessage->m_id)){
                $this->Im_receiver_Model->update($r_id, $g_id, $recentMessage->m_id,date_format(date_create($receivedTime), DATE_ISO8601));
            }

        }

        foreach ($messages as $message) {
            //$seen=null;
            $message->m_id=(int)$message->m_id;
            $senderProfile = $this->User_Model->get_user($message->sender, null, null);
            $ios_date_time = date_format(date_create($message->date_time), DATE_ISO8601);
            $message->ios_date_time = $ios_date_time;
            $message->onlyemoji=(int)$message->onlyemoji;
            if ($message->type == "update") {
                $message->message = $this->processUpdate($message->message);
            }
            $seen=null;
           if(!$isAdminRequest && $recentMessage!=null && (int)$recentMessage->m_id==(int)$message->m_id && (int)$message->sender==$r_id){
                $seen=$this->processSeen($message->m_id,$g_id,$message->sender);
            }
            $data[] = array(
                "sender" => $senderProfile,
                "message" => $message,
                "seen"=>$seen,
            );


        }

        if((int)$start==0 && !$isAdminRequest && $recentMessage!=null && !$this->Im_receiver_Model->isAnnounced($r_id,$g_id,$recentMessage->m_id)){
            $this->Im_receiver_Model->updateAnnounced($r_id,$g_id,$recentMessage->m_id);
            $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
            $client->initialize();
            if(ID_LOGIN){
                $registerData = array(
                    "_r" =>$this->User_Model->getTokenRAWDataById($r_id),
                    "url" => base_url()
                );
            }else {
                $registerData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "url" => base_url()
                );
            }
            $client->emit("register", $registerData);
            $seenData=array(
                "recentMessage"=>(int)$recentMessage->m_id,
                "receivedTime"=>$this->Im_receiver_Model->getReceivedMessageTime($r_id,$g_id,$recentMessage->m_id),
            );
            $client->emit('announceSeen',$seenData);
            $client->close();
        }

        //$client->emit("updateMember",$response);

if($recentMessage!=null){
    $response = array(
        "status" => array(
            "code" => REST_Controller::HTTP_OK,
            "message" => "Success"
        ),
        "totalMessage" =>(int)$totalMessage,
        "recentMessageId"=>(int)$recentMessage->m_id,
        "response" => array_reverse($data)

    );
}
else{
    $response = array(
        "status" => array(
            "code" => REST_Controller::HTTP_OK,
            "message" => "Success"
        ),
        "totalMessage" =>(int)$totalMessage,
        "recentMessageId"=>null,
        "response" => array_reverse($data)

    );
}

        $this->response($response, REST_Controller::HTTP_OK);

    }

    public function createGroupByMember_post()
    {
        if(ID_LOGIN){
            $senderId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
            if ($this->form_validation->run() == FALSE) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Validation Error"
                    ),
                    "response" => validation_errors()
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;
            }
        }else{
            $headers = apache_request_headers();
            $senderId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $date_time = date(DATE_ISO8601, time());
        $users = $this->post("memberId");
        if ($users == null) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "memberId are required. memberId is an array"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        } else {
            $users[] = $senderId;
        }


        $g_ids = array();
        $groupsIds=null;
        if(count($users)==2){
            $groupsIds = $this->Im_group_members_Model->getPersonalGroups($users, null, null);
        }else{
            $groupsIds = $this->Im_group_members_Model->getNonPersonalGroups($users, null, null);
        }
        foreach ($groupsIds as $groupId) {
            $totalReceiver = $this->Im_group_members_Model->getTotalGroupMember($groupId->g_id);
            $getMembers = $this->Im_group_members_Model->getMembers($groupId->g_id);
            $member = array();
            foreach ($getMembers as $getMember) {
                $member[] = $getMember->u_id;
            }
            $diff = array_diff($member, $users);

            if (((int)$totalReceiver) == (count($users)) && count($diff) == 0) {
                $g_ids[] = $groupId->g_id;
                break;
            }
        }
        if (count($g_ids) > 0) {
            $receiverId = $g_ids[0];
        } else {
            $name = $this->post("g_name");
            if ($name == null || $name == "" || $name == '""' || $name == "''") {
                $name = null;
            }
            $groupType=0;
            if(count($users)==2){
                $groupType=1;
            }
            $receiverId = $this->Im_group_Model->insert($name, $date_time,$groupType, $senderId);
            try {
                foreach ($users as $user) {
                    $this->Im_group_members_Model->insert($receiverId, $user);
                }
                // $this->Im_group_members_Model->insert($receiverId,$senderId);
            } catch (Exception $e) {
                $this->Im_group_members_Model->DeleteAll($receiverId);
                $this->Im_group_Model->DeleteAll($receiverId);
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_FOUND,
                        "message" => "Success"
                    ),
                    "response" => "User Not Found"

                );
                $this->response($response, REST_Controller::HTTP_NOT_FOUND);
                return;
            }

        }
        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success"
            ),
            "response" => array(
                "groupId" => (int)$receiverId
            )

        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function sendMessage_post()
    {  // groupId(receiverId Id)(null), users[] if  groupId==null , g_name(null), file(Null) or message(null),date(yyyy-mm-dd),time(hh:mm:ss)
        if(ID_LOGIN){
            $senderId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
            if ($this->form_validation->run() == FALSE) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Validation Error"
                    ),
                    "response" => "User Id is missing"
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;
            }
        }else{
            $headers = apache_request_headers();
            $senderId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $date = date('Y-m-d');
        $time = date("h:i:s");
        $date_time = date(DATE_ISO8601, time());
        $client = new \Emojione\Client(new \Emojione\Ruleset());
        $client->ascii = true;
        // $client->riskyMatchAscii=true; // if enable http:// also converted to emoji


        $receiverId =(int)$this->post("groupId", true);
        if ($receiverId == null) {
            $users = $this->post("memberId", true);
            if ($users == null) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Error "
                    ),
                    "response" => "Either memberId or groupId is required,memberId is an array."
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;

            }
            else if (!is_array($users)) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Error "
                    ),
                    "response" => "memberId is not an array."
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;

            }
            else if($this->Im_blocklist->ifExistInList($senderId,$users))
            {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Error "
                    ),
                    "response" => "Block member detected. Can't send message."
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;
            }else{

                $users[] = $senderId;
            }


            $g_ids = array();
            $groupsIds=null;
            if(count($users)==2){
                $groupsIds = $this->Im_group_members_Model->getPersonalGroups($users, null, null);
            }else{
                $groupsIds = $this->Im_group_members_Model->getNonPersonalGroups($users, null, null);
            }

            foreach ($groupsIds as $groupId) {
                $totalReceiver = $this->Im_group_members_Model->getTotalGroupMember($groupId->g_id);
                $getMembers = $this->Im_group_members_Model->getMembers($groupId->g_id);
                $member = array();
                foreach ($getMembers as $getMember) {
                    $member[] = $getMember->u_id;
                }
                $diff = array_diff($member, $users);

                if (((int)$totalReceiver) == (count($users)) && count($diff) == 0) {
                    $g_ids[] = $groupId->g_id;
                    break;
                }
            }
            if (count($g_ids) > 0) {
                $receiverId = $g_ids[0];
            } else {
                $name = $this->post("g_name");
                if ($name == null || $name == "" || $name == '""' || $name == "''") {
                    $name = null;
                }
                $groupType=0;
                if(count($users)==2){
                    $groupType=1;
                }
                $receiverId = $this->Im_group_Model->insert($name, $date_time,$groupType, $senderId);
                foreach ($users as $user) {
                    $this->Im_group_members_Model->insert($receiverId, $user);
                }
                // $this->Im_group_members_Model->insert($receiverId,$senderId);
            }

        }
        if($this->Im_group_Model->isBlocked($receiverId)){
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "message is blocked"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $message = null;
        $image = null;
        $fileType = null;
        $actualFolderName = "./assets/im/group_$receiverId";
        $actualFileName=null;
        if (!is_dir($actualFolderName)) {
            mkdir($actualFolderName, 0777, true);
        }
        $config['upload_path'] = $actualFolderName;
        $config['allowed_types'] = '*';
        $config['file_name'] = date("mjYGis") . "im" . $this->User_Model->generateRandomString(5) . $receiverId;
        $config['max_size'] = '';


        $this->load->library('upload', $config);
        if (isset($_FILES['file']['tmp_name']) && !empty($_FILES['file']['tmp_name'])) {
            if (!$this->upload->do_upload('file')) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_BAD_REQUEST,
                        "message" => "File upload Error"
                    ),
                    "response" => $this->upload->display_errors()
                );
                $this->response($response, REST_Controller::HTTP_BAD_REQUEST);

            } else {
                $actualFileName=$_FILES['file']['name']; //real file name
                //here $file_data receives an array that has all the info
                //pertaining to the upload, including 'file_name'
                $file_data = $this->upload->data();
                if ($_FILES['file']["type"]=="audio/mp3" || $file_data["file_type"] == "audio/mp3" || $file_data["file_type"] == "audio/mpeg3" || $file_data["file_type"] == "audio/mpg" || $file_data["file_type"] == "audio/mpeg") {
                    $image = $file_data['file_name'];
                    $fileType = "audio";
                } else if ($file_data["file_type"] == "video/mp4" || $file_data["file_type"] == "video/3gp" || $file_data["file_type"] == "video/3gpp" || $file_data["file_type"] == "video/*") {
                    if($file_data["file_type"]== "video/mp4"){
                        $image = $file_data['file_name'];
                    }else{
                        exec("ffmpeg -i " . $file_data['full_path'] . " " . $file_data['file_path'] . $file_data['raw_name'] . ".mp4");
                        $image = $file_data['raw_name'] . '.' . 'mp4';
                    }
                    $fileType = "video";
                } else if($file_data["file_type"] == "image/png" || $file_data["file_type"] == "image/x-png" || $file_data["file_type"] == "image/jpeg"||$file_data["file_type"] == "image/pjpeg") {
                    $config['image_library'] = 'gd2';
                    $config['source_image'] = $file_data['full_path']; //get original image
                    $config['maintain_ratio'] = TRUE;
                    $config['width'] = 700;
                    $config['height'] = 700;
                    $this->load->library('image_lib', $config);
                    if (!$this->image_lib->resize()) {
                        $response = array(
                            "status" => array(
                                "code" => REST_Controller::HTTP_BAD_REQUEST,
                                "message" => "File upload Error"
                            ),
                            "response" => $this->image_lib->display_errors()
                        );
                        $this->response($response, REST_Controller::HTTP_BAD_REQUEST);
                    }
                    $image = $file_data['file_name'];
                    $fileType = "image";
                }else{
                    $image = $file_data['file_name'];
                    $fileType = "document";
                }

            }
            $message = $image;
        } else {
            $fileType = "text";
            $message = $this->post("message", true);
            $message = $client->asciiToUnicode($message);

        }
        $receiverType = "personal";
        $totalReceiver = $this->Im_group_members_Model->getTotalGroupMember($receiverId);
        if ($totalReceiver > 2) {
            $receiverType = "group";
        }

        $oldMessage=$this->Im_message_Model->getRecentMessage($receiverId);
        if($oldMessage!=null){
            $this->Im_receiver_Model->deleteByGroupId($receiverId);
        }
        $memberIds = $this->Im_group_members_Model->getMembers($receiverId);
        $m_id = $this->Im_message_Model->insert($senderId, $receiverId, $message, $fileType,$actualFileName, $receiverType, $date, $time, $date_time);
        $fullMessage = $this->Im_message_Model->getRecentMessageWithUpdate($receiverId);
        $senderInfo = $this->User_Model->get_user($senderId, null, null);
        $this->Im_group_Model->updateLastActiveDate($receiverId, $date_time);


        $ios_date_time = date_format(date_create($fullMessage->date_time), DATE_ISO8601);

        $fullMessage->ios_date_time = $ios_date_time;
        if(ID_LOGIN){
            $socketData = array(
                "_r" =>$this->User_Model->getTokenRAWDataById($senderId),
                "to" => $receiverId,
                "receiversId" => $memberIds,
                "message" => $fullMessage,
                "sender" => $senderInfo,

            );
            $registerData = array(
                "_r" =>$this->User_Model->getTokenRAWDataById($senderId),
                "url" => base_url()
            );
        }else{
            $socketData = array(
                "_r" => $headers["authorizationkeyfortoken"],
                "to" => $receiverId,
                "receiversId" => $memberIds,
                "message" => $fullMessage,
                "sender" => $senderInfo,

            );
            $registerData = array(
                "_r" => $headers["authorizationkeyfortoken"],
                "url" => base_url()
            );
        }

        $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
        $client->initialize();
        $client->emit("register", $registerData);
        $client->emit('sendMessage', $socketData);
        //$client->emit("updateMember",$response);
        $client->close();
        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success"
            ),
             "response" =>$this->getGroupInfo($receiverId,$senderId)

        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function addGroupMember_post() //userId[] , groupId
    {
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $this->form_validation->set_rules('memberId[]', 'memberId[]', 'required');
        $this->form_validation->set_rules('groupId', 'groupId', 'required');

        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $memberIds = $this->post("memberId", true);
        $groupId = $this->post("groupId", true);
        if (!is_array($memberIds)) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "memberId is not an array"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;

        }
        $groupType=$this->Im_group_Model->getType($groupId);
        if($groupType){
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "Group is personal"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        foreach ($memberIds as $memberId) {
            if (!$this->Im_group_members_Model->ifExist($groupId, $memberId)) {
                $this->Im_group_members_Model->insert($groupId, $memberId);

                $this->memberUpdate($userId, $groupId, $memberId, "add");
            }

        }

        // $memberList=$this->Im_group_members_Model->getMembers($groupId);
        $membersInfo = array();
        $requestUseMembersInfo=array();

        $members = $this->Im_group_members_Model->getMembers($groupId);
        foreach ($members as $u_id) {
            $membersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);

        }
        $requestUserMembers=$this->Im_group_members_Model->getMembersWihoutSender($groupId,$userId);
        foreach ($requestUserMembers as $u_id) {
            $requestUseMembersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);

        }

        $meCreator = $this->Im_group_Model->ifThisUserCreator($groupId, $userId);
        if(ID_LOGIN){
            $registerData = array(
                "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                "url" => base_url()
            );
        }else{
            $registerData = array(
                "_r" => $headers["authorizationkeyfortoken"],
                "url" => base_url()
            );
        }


        $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
        $client->initialize();
        $client->emit("register", $registerData);

        foreach ($members as $memberId) {
            $otherMembers = $this->Im_group_members_Model->getMembersWihoutSender($groupId, $memberId->u_id);
            $newMembersInfo = array();
            foreach ($otherMembers as $u_id) {
                $newMembersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
                //$membersGroupInfo[$u_id->u_id]=$this->getGroupInfo($groupId,$u_id->u_id);
            }
            if(ID_LOGIN){
                $updateData = array(
                    "userId" => $userId,
                    "_r" =>"",
                    "groupId" => $groupId,
                    "memberId" => $memberId->u_id,
                    "groupInfo" => $this->getGroupInfo($groupId, $memberId->u_id),
                    "memberList" => $newMembersInfo,

                );
            }else{
                $updateData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "groupId" => $groupId,
                    "memberId" => $memberId->u_id,
                    "groupInfo" => $this->getGroupInfo($groupId, $memberId->u_id),
                    "memberList" => $newMembersInfo,

                );
            }

            $client->emit("addMember", $updateData);
        }
        $client->close();
        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success"
            ),
            "response" => array(
                "meCreator" => $meCreator,
                "memberList" => $requestUseMembersInfo,
                "groupInfo" => $this->getGroupInfo($groupId, $userId)
            )

        );
        $this->response($response, REST_Controller::HTTP_OK);
    }

    public function blockGroup_post(){
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }

        $this->form_validation->set_rules('groupId', 'groupId', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $groupId=$this->post("groupId");

        if($this->Im_group_Model->getType($groupId)){
            $this->Im_blocklist->insert($userId,$groupId);
            if(!$this->Im_group_Model->isBlocked($groupId)) {
                $this->Im_group_Model->updateBlock($groupId, 1);
            }
            if(ID_LOGIN){
                $registerData = array(
                    "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                    "url" => base_url()
                );
            }else{
                $registerData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "url" => base_url()
                );
            }
            $blockData=array(
                "block"=>1,
                "groupId"=>(int)$groupId,
                "memberIds"=>$this->Im_group_members_Model->getMembers($groupId),
                "userId"=>(int)$userId,
                "fullUnblock"=>(int)$this->Im_group_Model->isBlocked($groupId),
                "groupInfo"=>$this->getGroupInfo($groupId,$userId)
            );
            $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
            $client->initialize();
            $client->emit("register", $registerData);
            $client->emit("blockUpdate",$blockData);
            $client->close();
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_OK,
                    "message" => "Success"
                ),
                "response" => array(
                    "block"=>1,
                )

            );
            $this->response($response, REST_Controller::HTTP_OK);
        }else{
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => false
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        }

    }

    public function unblockGroup_post(){
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $this->form_validation->set_rules('groupId', 'groupId', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $groupId=$this->post("groupId");
        if($this->Im_group_Model->getType($groupId)){

            $this->Im_blocklist->delete($userId,$groupId);
            if(!$this->Im_blocklist->ifGroupInList($groupId)) {
                $this->Im_group_Model->updateBlock($groupId, 0);
            }
            if(ID_LOGIN){
                $registerData = array(
                    "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                    "url" => base_url()
                );
            }else{
                $registerData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "url" => base_url()
                );
            }
            $blockData=array(
                "block"=>0,
                "groupId"=>(int)$groupId,
                "memberIds"=>$this->Im_group_members_Model->getMembers($groupId),
                "userId"=>(int)$userId,
                "fullUnblock"=>(int)$this->Im_group_Model->isBlocked($groupId),
                "groupInfo"=>$this->getGroupInfo($groupId,$userId)
            );
            $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
            $client->initialize();
            $client->emit("register", $registerData);
            $client->emit("blockUpdate",$blockData);
            $client->close();
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_OK,
                    "message" => "Success"
                ),
                "response" => array(
                    "block"=>0,
                )

            );
            $this->response($response, REST_Controller::HTTP_OK);
        }else{
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => false
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
        }

    }

    public function muteGroup_post(){
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }

        $this->form_validation->set_rules('groupId', 'groupId', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }

        $groupId=$this->post("groupId");
            $this->Im_mutelist->insert($userId,$groupId);
            if(ID_LOGIN){
                $registerData = array(
                    "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                    "url" => base_url()
                );
            }else{
                $registerData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "url" => base_url()
                );
            }
            $muteData=array(
                "mute"=>1,
                "groupId"=>(int)$groupId,
                "userId"=>(int)$userId
            );
            $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
            $client->initialize();
            $client->emit("register", $registerData);
            $client->emit("muteUpdate",$muteData);
            $client->close();
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_OK,
                    "message" => "Success"
                ),
                "response" => true

            );
            $this->response($response, REST_Controller::HTTP_OK);


    }

    public function unmuteGroup_post(){
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $this->form_validation->set_rules('groupId', 'groupId', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }

        $groupId=$this->post("groupId");

            $this->Im_mutelist->delete($userId,$groupId);
            if(ID_LOGIN){
                $registerData = array(
                    "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                    "url" => base_url()
                );
            }else{
                $registerData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "url" => base_url()
                );
            }
            $muteData=array(
                "mute"=>0,
                "groupId"=>(int)$groupId,
                "userId"=>(int)$userId
            );
            $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
            $client->initialize();
            $client->emit("register", $registerData);
            $client->emit("muteUpdate",$muteData);
            $client->close();
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_OK,
                    "message" => "Success"
                ),
                "response" => true

            );
            $this->response($response, REST_Controller::HTTP_OK);


    }

    public function getBlockList_post(){
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');
            if ($this->form_validation->run() == FALSE) {
                $response = array(
                    "status" => array(
                        "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                        "message" => "Validation Error"
                    ),
                    "response" => validation_errors()
                );
                $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
                return;
            }
        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $blockMembersId=$this->Im_blocklist->getBlockListUserIds($userId);
        $userInfo=array();
        foreach ($blockMembersId as $id){
            $userData=$this->User_Model->get_user($id->u_id,null,null);
            $userData["group"]=(int)$id->g_id;
            $userInfo[]=$userData;
        }

        $response = array(
            "status" => array(
                "code" => REST_Controller::HTTP_OK,
                "message" => "Success"
            ),
            "response" => $userInfo

        );
        $this->response($response, REST_Controller::HTTP_OK);

    }

    public function leaveGroup_post(){
        if(ID_LOGIN){
            $userId=$this->post("userId");
            $this->form_validation->set_rules('userId', 'userId', 'required');

        }else{
            $headers = apache_request_headers();
            $userId = $this->User_Model->getTokenToId($headers["authorizationkeyfortoken"]);
        }
        $this->form_validation->set_rules('groupId', 'groupId', 'required');
        if ($this->form_validation->run() == FALSE) {
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Validation Error"
                ),
                "response" => validation_errors()
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }
        $groupId=(int)$this->post("groupId",true);
        $groupType=$this->Im_group_Model->getType($groupId);
        if($groupType){
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_NOT_ACCEPTABLE,
                    "message" => "Error "
                ),
                "response" => "Group is personal"
            );
            $this->response($response, REST_Controller::HTTP_NOT_ACCEPTABLE);
            return;
        }

        $members=$this->Im_group_members_Model->getMembers($groupId);

            $deletedMemberId=(int)$userId;


            $membersWithDeletedOne=array();
            if($this->Im_group_members_Model->ifExist($groupId,$deletedMemberId)) {
                $this->memberUpdate($userId, $groupId, $deletedMemberId, "delete");
                $membersWithDeletedOne = $members;
                $this->Im_group_members_Model->delete($groupId, $deletedMemberId);
                $this->Im_receiver_Model->DeleteAll($groupId, $deletedMemberId);
            }
            $membersInfo = array();
            //$membersGroupInfo=array();
            $requestUseMembersInfo=array();

            //$members = $this->Im_group_members_Model->getMembers($groupId);
            foreach ($members as $u_id) {
                $membersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
                //$membersGroupInfo[$u_id->u_id]=$this->getGroupInfo($groupId,$u_id->u_id);
            }
            $requestUserMembers=$this->Im_group_members_Model->getMembers($groupId);
            foreach ($requestUserMembers as $u_id) {
                $requestUseMembersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);

            }

            if(ID_LOGIN){
                $registerData = array(
                    "_r" =>$this->User_Model->getTokenRAWDataById($userId),
                    "url" => base_url()
                );
            }else {
                $registerData = array(
                    "_r" => $headers["authorizationkeyfortoken"],
                    "url" => base_url()
                );
            }

            $client = new Client(new Version2X($this->config->item('socket_url'),$this->config->item("socket_local_conf_ssl")));
            $client->initialize();
            $client->emit("register", $registerData);

            foreach ($membersWithDeletedOne as $memberId) {
                $removeGroup = false;
                $newMembersInfo = array();
                if ($memberId->u_id == $deletedMemberId) {
                    $removeGroup = true;
                }
                if (!$removeGroup) {
                    $otherMembers = $this->Im_group_members_Model->getMembersWihoutSender($groupId,$memberId->u_id);
                    foreach ($otherMembers as $u_id) {
                        $newMembersInfo[] = $this->User_Model->get_user($u_id->u_id, null, null);
                        //$membersGroupInfo[$u_id->u_id]=$this->getGroupInfo($groupId,$u_id->u_id);
                    }
                }
                if(ID_LOGIN){
                    $updateData = array(
                        "_r" =>"",
                        "userId" => $userId,
                        "groupId" => $groupId,
                        "memberId" => $memberId->u_id,
                        "removeGroup" => $removeGroup,
                        "groupInfo" => $this->getGroupInfo($groupId, $memberId->u_id),
                        "memberList" => $newMembersInfo,


                    );
                }else {
                    $updateData = array(
                        "_r" => $headers["authorizationkeyfortoken"],
                        "groupId" => $groupId,
                        "memberId" => $memberId->u_id,
                        "removeGroup" => $removeGroup,
                        "groupInfo" => $this->getGroupInfo($groupId, $memberId->u_id),
                        "memberList" => $newMembersInfo,


                    );
                }
                $client->emit("deleteMember", $updateData);
            }

            $client->close();
        if(count($members)==1) {
            $this->Im_receiver_Model->deleteByGroupId($groupId);
            $this->Im_group_members_Model->DeleteAll($groupId);
            $this->Im_message_Model->DeleteAll($groupId);
            $this->Im_group_Model->delete($groupId);
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_OK,
                    "message" => "Success"
                ),
                "response" => true

            );
            $this->response($response, REST_Controller::HTTP_OK);
        }else{
            $response = array(
                "status" => array(
                    "code" => REST_Controller::HTTP_OK,
                    "message" => "Success"
                ),
                "response" => false

            );
            $this->response($response, REST_Controller::HTTP_OK);
        }


    }
}