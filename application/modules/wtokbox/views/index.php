<?php  $theme_url = theme_url();?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>OT Accelerator Core</title>

    <link rel="stylesheet" href="<?php echo $theme_url?>/tokbox/public/css/style.css">
    <link rel="stylesheet" href="https://assets.tokbox.com/solutions/css/style.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://static.opentok.com/v2/js/opentok.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore-min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/livestamp/1.1.2/livestamp.min.js"></script>
    <script src="<?php echo $theme_url?>/tokbox/public/js/components/opentok-solutions-logging.js"></script>
    <script src="<?php echo $theme_url?>/tokbox/public/js/components/opentok-text-chat.js"></script>
    <script src="<?php echo $theme_url?>/tokbox/public/js/components/opentok-screen-sharing.js"></script>
    <script src="<?php echo $theme_url?>/tokbox/public/js/components/opentok-annotation.js"></script>
    <script src="<?php echo $theme_url?>/tokbox/public/js/components/opentok-archiving.js"></script>
    <script src="<?php echo $theme_url?>/tokbox/public/js/components/opentok-acc-core.js"></script>
	<script>
	var apiKey= "46066412";
	var	sessionId="<?php echo $session?>";
	var  token="<?php echo $token?>";
	 
	</script>
    <script src="<?php echo $theme_url?>/tokbox/public/js/app.js"></script>
	
	<style>
		.App-control-container {
			position: absolute;
			height: auto;
			width: 100%;
			left: 0px;
			display: flex;
			flex-direction: row;
			align-items: center;
			justify-content: center;
		}
	</style>
</head>

<body>
    <div class="App">
        <div class="App-header">
            <h1>TERANEX</h1>
			<!-- <img src="<?php echo $theme_url?>/images/logo1o11.png" class="App-logo" alt="logo" />  -->
        </div>
        <div class="App-main col-sm-12">
          <div class="col-sm-8" style="float: left;height: 100%;">
            <div class="App-video-container" id="appVideoContainer">
                <div class="App-mask" id="connecting-mask">
                    <progress-spinner dark style="font-size:50px"></progress-spinner>
                    <div class="message with-spinner">Connecting</div>
                </div>
                <div class="App-mask hidden" id="start-mask">
                    <div class="message button clickable" id="start">Click to Start Call</div>
                </div>
                <div id="cameraPublisherContainer" class="video-container hidden"></div>
                <div id="screenPublisherContainer" class="video-container hidden"></div>
                <div id="cameraSubscriberContainer" class="video-container-hidden"></div>
                <div id="screenSubscriberContainer" class="video-container-hidden"></div>
            </div>
            <div id="controls" class='App-control-container hidden'>
                <div class="ots-video-control circle audio" id="toggleLocalAudio"></div>
                <div class="ots-video-control circle video" id="toggleLocalVideo"></div>
            </div>            
		  </div>
          <div class="col-sm-4">
			<div id="chat" class="App-chat-container"></div>
		  </div>
		</div>
    </div>

</body>

</html>