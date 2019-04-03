<?php $this->template->contentBegin(POS_TOP);?>
	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" type="text/css" href="<?php echo $theme_url;?>/readdychat/css/readyChatMain.css" />
	<style>
		input:disabled {
			background:#f8f8f8;
		}
	</style>
<?php echo $this->template->contentEnd();	?> 
 
	<!-- Loading Progress GIF -->
	<div class="progress-indicator"><img src="<?php echo $theme_url;?>/readdychat/images/loading.gif" title="" alt=""></div>
	
	<!-- Background Dimmer -->
	<div id="dimmer"></div>
	
	<div id="message_container">
		<div id="message_box">
			<div id="message_header">
				<div id="message_title">Alert!</div>
				<div id="top_error"></div>
				<a id="close" href="">Continue</a>
			</div>
			
			<!-- Room requires a password -->
			<div id="message_area">This is a message box</div>
			<div id="box_entry">
				<input id="rpw" type="text" name="pwinput" placeholder="Enter Room Password">
				<div class="room" id="rtj" room_link="none">Enter Room</div>
			</div>
		</div>
	</div>
	
	<!-- Content Box -->
	<div id="contentbox_container">
		<div id="contentbox">
			<div id="contentbox_header">
				<div id="content_title">Default Title</div>
				<a id="close_profile" href="">Continue</a>
				<?php if ($GLOBALS["settings"]["private_messages"]): ?><div id="private_chat"></div><?php endif; ?>
			</div>
			<div id="contentbox_html"></div>
		</div>
	</div>
	
	<!-- Smiley Box -->
	<div id="smiley_container">
		<div id="smiley_box">
			<div id="message_header">
				<div id="message_title">Insert a smiley</div>
				<a id="close_smilies" href="">Continue</a>
			</div>
			<div id="smiley_area"></div>
		</div>
	</div>
	
	<!-- Main Container -->
	<div id="container">
		<div id="logo"> 
			<?php
				if (!$gSession && $settings["private_messages"])
				{
					echo "<div id=\"pvt_head\"></div>";
				} 	 
			?>
		</div>
		
		<!-- Chat Area -->
		<div id="chat_area">
			<!-- Chat Topic -->
			<div id="topic"> 
				<div id="topic_text"></div>
			</div>
			
			<!-- Alert Area (Kick/Ban Messages) -->
			<div id="alert">
				<div id="alert_text"></div>
			</div>
			
			<!-- Main Chat Area -->
			<ul id="messages"></ul>
		</div>
		
		<!-- User List Display -->
		<div id="user_list">
			<img src="<?php echo $theme_url;?>/readdychat/images/loading_small_2.gif">
		</div>
		
		<!-- Rooms List Display
		<div id="rooms_list">
			<img src="<?php echo $theme_url;?>/readdychat/images/loading_small_2.gif">
		</div> -->
		
		<!-- readyChat Feature Icons -->
		<div id="icons">
			<img id="sfx" style="cursor:pointer;" src="<?php echo $theme_url;?>/readdychat/icons/sfx_on.png" title="Click to disable sound effects">
			<img id="smilies" style="cursor:pointer;" src="<?php echo $theme_url?>/readdychat/smilies/smile.png" title="Send a smiley">
			<img id="autoscroll" style="cursor:pointer;" src="<?php echo $theme_url;?>/readdychat/icons/scroll.png" title="Disable Auto Scroll">
			<?php
				if ($settings["games"])
				{
					echo "<img id=\"games\" style=\"cursor:pointer;\" src=\"template/{$GLOBALS["settings"]["template"]}/icons/games.png\" title=\"Play Games\">";
				}
			?>
			<img id="credits" style="cursor:pointer; border:0px;" src="<?php echo $theme_url;?>/readdychat/icons/qmark.png" title="Credits">
			<a href="logout.php"><img id="quit" style="cursor:pointer; border:0px;" src="<?php echo $theme_url;?>/readdychat/icons/quit.png" title="Logout"></a>
		</div>

		<!-- Chat Input Box -->
		<div id="input_area">
			<form id="chatform" name="chatform" action="" method="post">
				<?php
					/*
						If this user is a guest and the administrator has disabled guest chat, show a message in the input box!
					*/
					
					if (!$settings["guest_chat"] && $gSession)
					{
						$gc = "placeholder=\"Become a registered member to chat!\" DISABLED";
					}
					else
					{
						$gc = null;
					}
				?>
				
				<!-- Input Text Area -->
				<input type="text" name="content" id="content" maxlength="<?php echo $settings["max_message"]; ?>" autocomplete="off" <?php echo $gc; ?> />
				
				<?php
					/*
						If this user has moderator/admin permissions, they require a secondary authentication key
						to prevent CSRF.
					*/
					
					if (!$gSession && $user["rank"] > 1)
					{
						echo "<input type=\"hidden\" name=\"admin_token\" value=\"" . md5($_SESSION["admin_key"]) . "\" />";				
					}
				?>
				
				<!-- Authentication Token -->
				<input type="hidden" name="token" value="<?php echo md5(sha1(rand(323, 4000)));//$post_key; ?>" />
				
				<?php 
					/*
						The following values are place holders to improve the feel of speed.
						Values cannot be changed to manipulate the chat system.
					*/
					
					if (!$gSession)
					{
						echo "<input type=\"hidden\" name=\"name\" id=\"name\" value=\"{$GLOBALS["_SESSION"]["u_name"]}\" />";
					}
					else
					{
						echo "<input type=\"hidden\" name=\"name\" id=\"name\" value=\"(Guest) {$GLOBALS["guest"]["guest_name"]}\" />";
					}
				?>
				
				<button type="submit">Send</button>
			</form>
		</div>
	</div>
	 
 
<?php $this->template->contentBegin(POS_BOTTOM);?>
<!-- ReadyChat Required JavaScript --> 
<script type="text/javascript" src="<?php echo $theme_url;?>/readdychat/js/3rdparty/emotify.js"></script>
<script type="text/javascript">
					var goto = "empty";
					var autopoll = 0;
					var room = 1;
					var autoscroll = 1;
					var kicked = 0;
					var roomKey = 0;
					var inputReady = 0;
					var pms = 1;
					var time = 1521008838;
					var lastMsg = 0;
					var audioAlerts = 1;
					var spammed = false;
					var spamTimer = 1;
					var siteTitle = "readyChat";
					var site_template = "defaultTemplate";
				var colourHEX = "";var spamExempt = 0;var my_id = 1;</script>

<script type="text/javascript" src="<?php echo $theme_url;?>/readdychat/js/rc.emoticons.js"></script>
<script type="text/javascript" src="<?php echo $theme_url;?>/readdychat/js/rc.language.js"></script>
<script type="text/javascript" src="<?php echo $theme_url;?>/readdychat/js/readyChat.js"></script>
<?php echo $this->template->contentEnd();	?> 