<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
	Chat Application  
	Develop By  Jaywant Narwade
	Configuration
	*/
class Chat extends FRONTEND_Controller {

    // constructor
    function __construct() {
        // parent constructor
        parent::__construct(); 
		$GLOBALS['config']= array(
				"keys" => array(),
				"time" => time(),
				"micro" => round(microtime(true) * 1000),
				"ver_num" => "2.2.0"
			);
			$settings= $this->db_lib->fetchSingle(" `chat_settings`  ","","*");
			$GLOBALS["settings"]=$settings;
			
    }

	public function index() { 
		// SEO end Here	
		 
		$arrayData = [ 
		];
		$this->template->load("index",$arrayData);
	}
	public function listing($list,$room_id=0) { 
	 
	 $user_id=$GLOBALS["_SESSION"]["uid"]; 
			$user_room=1; 
		if (isset($list))
		{
			switch($list)
			{
				/*
					Count unread private messages
				*/
				
				case "pms":
				{ 
					if ($GLOBALS["settings"]["private_messages"])
					{
						$query =$this->db_lib->fetchSingle('chat_private_chats', " `im_to` = '$user_id'  AND `im_status` = '1'",'count(im_id) AS countId');   
						if ($query [countId] > 0){
						echo "<a href=\"#privateList\" id=\"pvtlist\">Private Messages</a> (<span id=\"new_count\">{$query [countId]}</span> new)";
						}
					}
					else
					{  
						echo "This feature is unavailable.";
					 
					}
					
					break;
				}
			
				/*
					Check for new private messages
				*/
				
				case "newpms":
				{
					$query_pms = $this->db_lib->fetchMultiple("  `chat_private_chats`","   `im_to` = '$user_id' AND `im_status` = '1'","DISTINCT im_to, im_status, im_from");
					if (count($query_pms) > 0)
					{
						foreach($query_pms as $rowChat)
						{
							$pm_from =$this->db_lib->fetchSingle("  master_user "," uid = '$user_id'"," uid, user_name, active, profile_avatar ");
							
							echo "
							<div class=\"pm\">
								<div class=\"pm_avatar\"><img src=\"template/avatars/{$pm_from["profile_avatar"]}\"></div>
								<div class=\"pm_title\">
									Conversation with <strong>{$pm_from["user_name"]}</strong>
								</div>
								<div class=\"pm_link\">
									<div class=\"pm_go\"><a id=\"private\" href=\"#private\" onclick=\"url('Private Chat', 'private_chat.php?cid={$pm["im_from"]}&who={$pm_from["user_name"]}', '600', '460')\">Open Chat</a></div>						
								</div>
							</div>";
							
							unset($pm_from);
						}
					}
					else
					{
						echo "There are no unread private messages.";
					}
					
					break;
				}
				
				/*
					Update the active user list
				*/
				
				case "active":
				{
					$this->activeUsers();
					
					break;
				}
				
				/*
					Update the rooms list & active user count
				*/
			
				case "rooms":
				{
					//listRooms();
					
					break;
				}
				
				/*
					Update the room topic
				*/
			
				case "topic":
				{
					 
					$query_room = $this->db_lib->fetchSingle("chat_rooms_permanent"," room_id = '{$room_id}'","  room_json, room_desc ");
					
					 
						if ($query_room["room_desc"] != null)
						{
							echo $query_room["room_desc"];
						}
						else
						{
							echo "No topic.";
						}
					 
					
					break;
				}
				
				/*
					Update the room background
				*/
				
				case "background":
				{
					 
					$query_room = $this->db_lib->fetchSingle("chat_rooms_permanent","room_id = '{$room_id}' ","room_id, room_json, room_desc, room_background");
					
					if ($query_room['room_id'] > 0)
					{
						$room = $query_room;
						
						if (isset($room["room_background"]) && $room["room_background"] != null)
						{
							echo $room["room_background"];
						}
						else
						{
							echo "nobg";
						}
					}
					else
					{
						echo "No topic.";
					}
					
					break;
				}
			}
		}
	}
	 
	/*
		This function handles readyChat's online user list.
		It also removes inactive users.
	*/
	public function activeUsers()
	{
		$user_id=$GLOBALS["_SESSION"]["uid"]; 
		$user_room=$GLOBALS["_SESSION"]["user_room"]; 
		/* if (isset($GLOBALS["gSession"])) // Guest Session
		{
			$query_active = $GLOBALS["mysqli"]->query("SELECT user_name, user_id, active, last_active, user_room, rank FROM `users` WHERE `active` = '1' AND `user_room` = '{$GLOBALS["guest"]["guest_room"]}'");
		}
		else // Member Session
		{
			
		} */
		$query_active = $this->db_lib->fetchMultiple(" master_user "," u_access = 'Y' AND `user_room` = '{$user_room}' ORDER BY `rank` DESC"," u_name, uid AS user_id, u_access,   last_active  , user_room, rank");
		/*
			The following creates online MEMBER listings
		*/
	 
		if ( $query_active )
		{
		 
			 foreach($query_active as $rowActive)
			{
				$hex = null;
				 
				$max_time = $rowActive["last_active"] + $GLOBALS["settings"]["idle_kick"] * 100;
			 
				if (time() > $max_time) // User has been inactive too long!
				{
					$data['active']='0' ;
					$this->db_lib->update("master_user",$data,"  uid = '{$rowActive["user_id"]}'");
				}
				else
				{  
					switch($rowActive["rank"])
					{
						case 2: // This user is a moderator
						{
							$rank = "moderator.png";
							$title = "Moderator";
							
							if ($GLOBALS["settings"]["mod_hex"] != null)
							{
								$hex = "style=\"color:{$GLOBALS["settings"]["mod_hex"]};\"";
							}
							
							break;
						}
						case 3: // This user is an administrator
						{
							$rank = "admin.png"; 
							$title = "Administrator";		

							if ($GLOBALS["settings"]["admin_hex"] != null)
							{
								$hex = "style=\"color:{$GLOBALS["settings"]["admin_hex"]};\"";
							}							
							
							break;
						}
						default: // This user has no rank
						{
							$rank = "user.png";			
							$title = "User";
							
							if ($GLOBALS["settings"]["member_hex"] != null)
							{
								$hex = "style=\"color:{$GLOBALS["settings"]["member_hex"]};\"";
							}			
							
							break;
						}
					}
					
					if ($GLOBALS["settings"]["allow_profiles"]) // If profiles have been enabled
					{
						if ($GLOBALS["settings"]["embedded_profiles"]) // Embeded profiles open in a chat window
						{
							$image=site_url()."themes/site/readdychat/icons/{$rank}";
							echo "<div class=\"user\" embedded=\"1\" profile_id=\"{$rowActive["user_id"]}\" user_name=\"{$rowActive["u_name"]}\"><img src=\"$image\" title=\"{$title}\"><a href=\"#\" {$hex}>{$rowActive["u_name"]}</a></div>";
						}
						else // Embedded profiles are disabled, they will open in a new tab/window
						{
							$image=site_url()."themes/site/readdychat/icons/{$rank}";
							echo "<div class=\"user\"><img src=\"$image\" title=\"{$title}\"><a href=\"#profile.php?uid={$rowActive["user_id"]}\" target=\"_blank\" class=\"user_context\" {$hex}>{$rowActive["u_name"]}</a></div>";
						}
					}
					else
					{
						$image=site_url()."themes/site/readdychat/icons/{$rank}";
						echo "<div class=\"user\"><img src=\"$image\" title=\"{$title}\"><a href=\"#\" class=\"user_context\" {$hex}>{$rowActive["u_name"]}</a></div>";
					}
				}
				
				unset($rank, $title);
			}
		}
		
		/*
			The following creates online GUEST listings
		
		
		if (isset($GLOBALS["gSession"])) // Guest Session
		{
			$query_aguests = $this->db_lib->fetchMultiple("  `guests`"," `active` = '1' AND `guest_room` = '{$GLOBALS["guest"]["guest_room"]}'"," guest_name, guest_id, active, guest_room, last_active");
		}
		else // Member Session
		{
			$query_aguests = $this->db_lib->fetchMultiple(" chat_guests "," `active` = '1' AND `guest_room` = '{$GLOBALS["user"]["user_room"]}'"," guest_name, guest_id, active, guest_room, last_active ");
		}
		
		if ($query_aguests)
		{
			foreach ($query_aguests as $guest_list )
			{
				$hex = null;
				
				$max_time = $guest_list["last_active"] + $GLOBALS["settings"]["idle_kick"] * 100;
			
				if (time() > $max_time) // Guest has been inactive too long!
				{
					$data['active']=0;
					 $this->db_lib->update("guests"," `guest_id` = '{$guest_list["guest_id"]}'");
				}
				else
				{
					if ($GLOBALS["settings"]["guest_hex"] != null)
					{
						$hex = "style=\"color:{$GLOBALS["settings"]["guest_hex"]};\"";
					}	
					
					echo "<div class=\"user\" {$hex}>(Guest) {$guest_list["guest_name"]}</div>";
				}
			}
		}	*/	
	}
	/* 
	//profile load
	// public function loadProfile($profile_id){
		 
		// $query_profile = $this->db_lib->fetchSingle("master_user "," `uid` = '{$profile_id}'"," uid AS user_id, user_name, profile_age, profile_bio, profile_avatar, profile_sex");
		
		// if ($query_profile['user_id'] > 0)
		// {
			// $profile = $query_profile ;
			
			// 
				// Profile Gender
			//
			
			// switch($profile["profile_sex"])
			// {
				// case 1:
				// {
					// $sex = "Male";
					
					// break;
				// }
				// case 2:
				// {
					// $sex = "Female";
					
					// break;
				// }
				// default:
				// {
					// $sex = "Unknown Gender";
					
					// break;
				// }
			// }
		
			// 
				// Profile Age
			// 
			
			// if ($profile["profile_age"] == 0) 
			// { 
				// $age = "Unknown Age"; 
			// }
			// else 
			// { 
				// $age = "{$profile["profile_age"]} years old"; 
			// }
			
			//
				// Profile Bio
			// 
			
			// if ($profile["profile_bio"] == "0" || $profile["profile_bio"] == null) 
			// { 
				// $bio = "{$profile["user_name"]} has not shared their bio."; 
			// }
			// else 
			// { 
				// $bio = $profile["profile_bio"]; 
			// }
			
			//
				// Show Avatar
			// 
			
			// if (file_exists("uploads/userAvatars/{$profile["profile_avatar"]}"))
			// {
				// $avaurl = $profile["profile_avatar"];
			// }
			// else
			// {
				// $avaurl = "no_avatar.jpg";
			// }
			
			// 
				// Profile Editing Links
			// 
			
			// if (isset($_SESSION["readyChatUser"]))
			// {
				// if ($user["user_id"] == $profile["user_id"])
				// {
					// $image=site_url()."uploads/userAvatars/{$avaurl}";
					// $avatar = "<a href=\"profile.php?uid={$profile["user_id"]}&edit=1&avatar=1\" target=\"_blank\"><img src=\"$image\"></a>"; 
					// $edit_profile = "<span style=\"font-size:12px;\">(<a href=\"#\" target=\"_blank\">edit your profile</a>)</span>";
				// }
				// elseif ($user["rank"] == 3 || $user["apanel"])
				// {
					// $image=site_url()."uploads/userAvatars/{$avaurl}";
					// $avatar = "<a href=\"#\" target=\"_blank\"><img src=\" {$image}\"></a>";
					// $edit_profile = "<span style=\"font-size:12px;\">(<a href=\"#\" target=\"_blank\">edit {$profile["user_name"]}'s profile</a>)</span>";
				// }
				// else
				// {
					// $image=site_url()."uploads/userAvatars/{$avaurl}";
					// $avatar = "<img src=\"{$image}\">";
					// $edit_profile = "";
				// }
			// }
			// else
			// {
				// $image=site_url()."uploads/userAvatars/{$avaurl}";
				// $avatar = "<img src=\"{$image}\">";
				// $edit_profile = "";
			// }
			
			// /
				// Show Profile
			//
			
			// echo "
			// <div id=\"profile_container\">
				// <div id=\"profile_box\">
					// <div id=\"profile_avatar\">
						// {$avatar}
					// </div>
					// <div id=\"info\">
						// <div class=\"title\"><a href=\"#\" target=\"_blank\">{$profile["user_name"]}</a>'s Profile {$edit_profile}</div>
						// <div class=\"info\">{$sex}</div>
						// <br />
						// <div class=\"title\">{$profile["user_name"]}'s Bio</div>
						// " . nl2br($bio) . "
					// </div>
				// </div>
			// </div>";
		// }
		// else
		// {
			// echo 2; // Unknown Profile
		// }
	// }
	 */
	// notify
	public function notify(){
		if ($GLOBALS["gSession"])
		{
			if ($GLOBALS["guest"]["kicked"] == 1)
			{
				$this->db_lib->delete("chat_guests  "," `guest_id` = '{$GLOBALS["guest"]["guest_id"]}'") or die($mysqli->error);

				if (isset($_SESSION["room_guard"])){ unset($_SESSION["room_guard"]); }
				if (isset($_SESSION["readyChatGuest"])){ unset($_SESSION["readyChatGuest"], $_SESSION["post_key"]); }
				echo 1;
			}
			if ($GLOBALS["guest"]["banned"] == 1)
			{
				$this->db_lib->delete("  chat_guest ", "guest_id = '{$GLOBALS["guest"]["guest_id"]}'") or die($mysqli->error);

				if (isset($_SESSION["room_guard"])){ unset($_SESSION["room_guard"]); }
				if (isset($_SESSION["readyChatGuest"])){ unset($_SESSION["readyChatGuest"], $_SESSION["post_key"]); }
				echo 2;
			}
			elseif ($GLOBALS["guest"]["warned"] == 1)
			{
				$data['warned']=0;
				$this->db_lib->update(" chat_guests ",$data," `guest_id` = '{$GLOBALS["guest"]["guest_id"]}'");
				echo 5 . "(nxt)" . $GLOBALS["guest"]["warning_text"];
			}
		}
		else
		{
			if ($GLOBALS["_SESSION"]["kicked"] == 1)
			{
				$data['active']=0;
				$data['kicked']=0;
				$this->db_lib->update(" master_user",$data,"uid` = '{$GLOBALS["_SESSION"]["uid"]}'");
				unset($_SESSION["readyChatUser"]);
				echo 1;
			}
			elseif ($GLOBALS["_SESSION"]["banned"] == 1)
			{
				$data['active']=0;
				$this->db_lib->update("master_user",$data,"`uid` = '{$GLOBALS["_SESSION"]["uid"]}'");
				unset($_SESSION["readyChatUser"]);
				echo 2;
			}
			elseif (!$GLOBALS["_SESSION"]["active"] )
			{  
				echo 3;
			}
			elseif ($GLOBALS["_SESSION"]["reset"] == 1)
			{
				$data['reset']=0;
				$data['active']=0;
				$data['user_room']=$GLOBALS["settings"]["default_room"];
				$this->db_lib->update(" master_user",$data," `user_id` = '{$GLOBALS["_SESSION"]["uid"]}'");
				echo 4;
			}
			elseif ($GLOBALS["_SESSION"]["warned"] == 1)
			{
				$data['warned']=0; 
				$this->db_lib->update( "master_user",$data,"`user_id` = '{$GLOBALS["_SESSION"]["uid"]}'");
				echo 5 . "(nxt)" . $GLOBALS["_SESSION"]["warning_text"];
			} 
		}
	}
	
	// room list
	public function roomList(){
		$query_rooms = $this->db_lib->fetchMultiple("chat_rooms_permanent","","");
		
		if ($query_rooms )
		{
			foreach ($query_rooms as $room )
			{
				if (isset($room["room_icon"]) && $room["room_icon"] != null)
				{
					$icon = "<img src=\"{$room["room_icon"]}\">";
				}
				else
				{
					$icon = "";
				}
				
				if (isset($room["room_password"]) && $room["room_password"] != null)
				{
					$lock = "<img src=\"template/{$GLOBALS["settings"]["template"]}/icons/password.png\" width=\"12px\" title=\"Password Required\">";
				}
				else
				{
					$lock = "";
				}
				
				/*
					Count how many users/guests are in the room
				*/
				
				$count = $this->db_lib->fetchSingle("master_user ","active = '1' AND `user_room` = '{$room["room_id"]}'"," count(uid) AS countUser");
				$count_g = $this->db_lib->fetchSingle("chat_guests","active= '1' AND `guest_room` = '{$room["room_id"]}'"," count(guest_id) AS countGuests ");
				$total_count = $count['countUser']+ $count_g['countGuests'];
				
				/*
					Create the room listing and display it on the list
				*/
				
				$goto = preg_replace( '/\.[a-z0-9]+$/i' , '', $room["room_json"]);
				echo "
				<div class=\"room\" room_title=\"{$room["room_title"]}\" room_link=\"{$room["room_id"]}\">
					{$icon} {$room["room_title"]} 
					<div class=\"room_count\"> {$lock} {$total_count}/{$room["room_limit"]}</div>
				</div>";
				
				unset($icon, $lock);
			}	
		}	
		else
		{
			echo "<div class=\"room\">No rooms available.</div>";
		}	
	}
	/*
		Query the room information
	*/
	
	public function loadRoom($lastpoll){
		
		 
			if (isset($_SESSION["uid"]))
			{
				$query_room = $this->db_lib->fetchSingle("chat_rooms_permanent "," room_id = '{$GLOBALS["_SESSION"]["user_room"]}' "," room_id, room_json, room_password ");
				$user_name = $GLOBALS["_SESSION"]["u_name"];
			} 
		if ($query_room)
		{
			 
		 	$room_id = $query_room['room_id'];
			
			/*
				Firstly, we check if the room has a password assigned to it or not.
				We then check if the user has the `room_guard` session set. If not, they
				have not previously entered the password and therefore have no authority
				to view the room and its chat log.
				if($room_id["room_password"] != null && $_SESSION["room_guard"] != $room_id["room_id"])
			*/
			
			if ($room_id["room_password"] != 1 )
			{
				echo "<li class=\"announcement\">You are not authorized to view this chat.</li>";
			}
			else // User has authority to view this chat room
			{
				if (isset($_GET["logview"]))
				{
					echo "Log coming soon";
				}
				else
				{
					if (isset($lastpoll) && $lastpoll != null && is_numeric($lastpoll))
					{
						if (!isset($GLOBALS["gSession"]))
						{
							$lastpoll =  $GLOBALS["_SESSION"]["last_poll"];
							$GLOBALS["_SESSION"]["last_poll"]=$GLOBALS["config"]["micro"];
							$data['last_poll']= $GLOBALS["config"]["micro"];
							$this->db_lib->update("master_user",$data," uid = '{$GLOBALS["_SESSION"]["uid"]}'");
						}
						else
						{
							$lastpoll = $GLOBALS["guest"]["last_poll"];
							$data['last_poll'] = $GLOBALS["config"]["micro"];
							$GLOBALS["_SESSION"]["last_poll"]=$GLOBALS["config"]["micro"];
							$this->db_lib->update(" chat_guests",$data," `guest_id` = '{$GLOBALS["guest"]["guest_id"]}'");
						}
						$uid = $GLOBALS["_SESSION"]["uid"];
						$query_chats = $this->db_lib->fetchMultiple("chat_messages","( chat_room  = '{$query_room["room_json"]}' OR  chat_room  = 'ALL') AND `chat_time` > {$lastpoll}  AND  chat_uid  != '{$uid}'","");
						if ($query_chats )
						{	
							foreach ($query_chats as $chat)
							{
								$hex = null; 
								if ($chat["chat_guest"] == 1)
								{
									if ($GLOBALS["settings"]["guest_hex"] != null)
									{
										$hex = "style=\"color:{$GLOBALS["settings"]["guest_hex"]};\"";
									} 
									$guest = "(guest) ";
								}
								else
								{
									$guest = null;
								}
								
								if ($chat["chat_guest"] == 0)
								{
									$query_user =$this->db_lib->fetchSingle("master_user"," uid = '{$chat["chat_uid"]}'"," u_name, rank ");
									if ($query_user['u_name'])
									{
										$list = $query_user;
										
										switch($list["rank"])
										{
											case 2: // This user is a moderator
											{
												if ($GLOBALS["settings"]["mod_hex"] != null)
												{
													$hex = "style=\"color:{$GLOBALS["settings"]["mod_hex"]};\"";
												}
												
												break;
											}
											case 3: // This user is an administrator
											{
												if ($GLOBALS["settings"]["admin_hex"] != null)
												{
													$hex = "style=\"color:{$GLOBALS["settings"]["admin_hex"]};\"";
												}							
												
												break;
											}
											default: // This user has no rank
											{
												if ($GLOBALS["settings"]["member_hex"] != null)
												{
													$hex = "style=\"color:{$GLOBALS["settings"]["member_hex"]};\"";
												}			
												
												break;
											}
										}
									}
								}
								
								if ($chat["chat_room"] != "ALL")
								{
									echo "<div class=\"cm\"><div class=\"cmt\" {$hex}> {$guest}{$chat["chat_user"]}</div><span class=\"cmtm\"> " .  ($chat["chat_text"]) . " </div></div>";
								}
								else
								{
									echo "<li class=\"announcement\"> " .  ($chat["chat_text"]) . " </li>";
								}
							}
						}
						else
						{
							echo "N/N";
						}
					}
					else
					{
						header('location: ../index.php');
					}
				}
			}
		}
	}
	// send Chat
	public function sendChat(){
		if (isset($_POST['content']))
		{
			if (trim(htmlspecialchars(strip_tags($_POST["content"]))) == null || trim($_POST["room"]) == null)
			{
				echo 2;
			}
			else
			{ 
					if ($GLOBALS["_SESSION"]["last_msg"] + $GLOBALS["settings"]["spam"] < time() || $GLOBALS["_SESSION"]["rank"] > 1 && $GLOBALS["settings"]["spam_exempt"] == 1 || $GLOBALS["_SESSION"]["last_msg"] == 0)
					{
						$query_room = $this->db_lib->fetchSingle("chat_rooms_permanent"," room_id = '{$GLOBALS["_SESSION"]["user_room"]}'","  room_id, room_json, room_password");
						
						if ($query_room['room_id'])
						{
							$room = $query_room;
							
						//	echo 1;
							$udata['last_active']	=$GLOBALS["config"]["time"];
							$udata['last_msg']		=$GLOBALS["config"]["time"];
							$udata['active']=1;
							$this->db_lib->update("master_user",$udata,"uid = '{$GLOBALS["_SESSION"]["uid"]}'");
							
							$date = date("H:i", $GLOBALS["config"]["time"]);
							 
						 	$content = htmlspecialchars(strip_tags(($_POST["content"])));
							$strip_content = substr($content, 0, $settings["max_message"]);
							$room = $room["room_json"];
							$data=array();
							$data['chat_room']	=$room;
							$data['chat_user']	=$GLOBALS["_SESSION"]["u_name"];
							$data['chat_uid']	=$GLOBALS["_SESSION"]["uid"];
							$data['chat_text']	=$content;
							$data['chat_time']	=$GLOBALS["config"]["micro"];
							$data['chat_guest']	=0;
							$this->db_lib->insert("chat_messages",$data);
						}
					}
					else
					{
						echo 3;
					}
				 
			}
		}
	}
} 
?>
