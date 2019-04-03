<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	 $group_id = $forum_id;
	//exit;

?>
	<link href="<?php echo base_url("assets/newTheme/assets2/reset.css") ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/bootstrap-multiselect.css")."?".rand(5,50000); ?>">
    <link href="<?php echo base_url("assets/newTheme/assets/css/vendors/vendors.css")."?".rand(5,50000); ?>" rel="stylesheet" type="text/css">
    <!-- Load extra page specific css -->
    <!-- Overwrite vendors -->
    <link href="<?php echo base_url("assets/newTheme/assets/css/vendors/vendors-overwrites.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/newTheme/assets/css/styles.css")."?".rand(5,50000); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/newTheme/assets/css/fastselect.min.css") ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/newTheme/assets/css/magicsuggest.css")."?".rand(5,50000); ?>" rel="stylesheet" type="text/css">
	<link href="<?php echo base_url("assets/newTheme/assets2/custom2.css")."?".rand(5,50000); ?>" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url("assets/newTheme/assets/css/toastr.min.css") ?>" rel="stylesheet" type="text/css">
    <!-- #####End styles-->
    <!-- #####Begin JS-->
    <!-- add your scripts to the end of the page for sake of page load speed-->
    <!-- scripts that need to be at head section-->

    <!-- #####End JS-->
    <!-- #####Begin load google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Sintony:400,700&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400,400italic,700,700italic&amp;
    subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="<?php echo base_url("assets/css/jquery-ui.min.css") ?>">
    <!-- #####Begin JS-->
    <!-- add your scripts to the end of the page for sake of page load speed-->
    <!-- scripts that need to be at head section-->
    <!-- #####End JS-->
    <!-- #####Begin load google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Sintony:400,700&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400,400italic,700,700italic&amp;subset=latin,greek,cyrillic" rel="stylesheet" type="text/css">
    <!-- #####End load google fonts-->
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/pp.png') ?>">
    <link href="<?php echo base_url("assets/newTheme/assets/css/twemoji-picker.css") ?>" rel="stylesheet" type="text/css">
    <!--<link href="<?php /*echo base_url("assets/newTheme/assets/css/perfect-scrollbar.css")."?".rand(5,50000); */?>" rel="stylesheet" type="text/css">-->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/css/perfect-scrollbar.min.css" rel="stylesheet" type="text/css">
<!-- Modals -->
<div id="addNewMemberModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade in" style="display: none;padding-right: 17px;">
    <div role="document" class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="oli oli-delete_sign"></i></span></button>
                <h4 class="modal-title myUpdateModalLabel" style="background-color: #75aef3">Add new member </h4>

                <div class="modal-body" >
                    <p><strong>Search members by there name</strong></p>
                    <div class="form-group">
                        <input type="text" id="addNewMemberInput" multiple class="form-control" >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-small btn-round btn-skin-green"  data-toggle="modal" id="newMemberAddBtn">Add</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="changeNameModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" class="modal fade in" style="display: none;padding-right: 17px;">
    <div role="document" class="modal-dialog">
        <div class="modal-content" >
            <div class="modal-header">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="oli oli-delete_sign"></i></span></button>
                <h4 class="modal-title myUpdateModalLabel" style="background-color: #75aef3">Change name </h4>
                <div class="modal-body" >
                    <p><strong>Give a new name</strong></p>
                    <div class="form-group">
                        <input type="text" id="groupName" class="form-control" placeholder="Group Name" required="required">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-small btn-round btn-skin-green"  data-toggle="modal" id="changeNameBtn">Save</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="newMessageModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" class="modal fade in" style="display: none;padding-right: 17px;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-radius: 6px;">
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="oli oli-delete_sign"></i></span></button>
                <h4 id="myModalLabel" class="modal-title" style="background-color: #75aef3">Start a new conversation</h4>
                <div class="modal-body " id="newMModalBody" style="margin-bottom: 110px">
                    <form id="newMessageForm" role="form">
                        <div class="form-group m-bottom-20">
                            <input type="text" id="addMemberInput" multiple class="form-control" >
                        </div>
                        <div class="form-group col-md-12 col-xl-12 col-sm-12 col-xs-12 m-bottom-20" style="padding-top: 5px;padding-right: 5px; height: 90px" >
                            <textarea style="max-height: 100px; height: 90px border: 0"  id="newMessageText" type="text" name="message" class="form-control" placeholder="Your message....."></textarea>
                        </div>
                        <!--<div class="form-group col-md-2 col-xl-2 col-sm-2 col-xs-2 pad-1 m-bottom-20 " style="margin-top: 10px;">
                            <img src="<?php /*echo base_url('assets/img/i-camera.png')*/?>" id="newMessagefileIV"  style="float:left;cursor: pointer; width: 50px;height: 50px">
                            <input type="file" class="hidden" id="newMessageFile" name="file" accept="video/3gpp,video/mp4,video/3gp,image/x-png,image/jpeg">
                        </div>-->

                    </form>
                </div>
                <div class="modal-footer" style="background-color: white;">
                    <div class="form-group col-md-12 col-xl-12 col-sm-12 col-xs-12">
                        <a href="#" class="btn-primary btn-small btn-rounded btn-skin-green col-md-12 col-xl-12 col-sm-12 col-xs-12" id="newSendMessage"><i class="fa fa-envelope"></i>  Send</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="connectionErrorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" class="modal fade in" style="display: none;padding-right: 17px;">
    <div role="document" class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="border-radius: 6px;">
                <!--<button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true"><i class="oli oli-delete_sign"></i></span></button>-->
                <h4 id="myModalLabel" class="modal-title" style="background-color: #bc0200">Connection lost</h4>
                <div class="modal-body " >
                    <p>Connecting...</p>
                </div>
                <!--<div class="modal-footer" style="background-color: white;">
                    <div class="form-group col-md-12 col-xl-12 col-sm-12 col-xs-12">
                        <a href="#" class="btn-primary btn-small btn-rounded btn-skin-green col-md-12 col-xl-12 col-sm-12 col-xs-12" id="newSendMessage"><i class="fa fa-envelope"></i>  Send</a>
                    </div>
                </div>-->
            </div>
        </div>
    </div>
</div>

<?php $this->template->contentBegin(POS_TOP);?>
<style>
@media (min-width: 1200px){
	.container {
		width: 1215px!important;
	}
}
.menu-right-icon{    right: 42px;}
.btn-group {
    margin: 3px 0 0 7px;
}
@media (min-width: 768px){
.navbar-form {
    width: 89%!important;
    /* border: none!important; */
}
}
.question-summary{
    border-bottom: 1px solid #ccc;}
	
.commu-log, .summery-details{
    float: left;
}
.log-align{
    float: left;
    text-align: center;
	padding: 20px 10px;
	}
.tags {
    float: right;
	padding: 10px;
}
.tags a img{
	width:auto;
	height:auto;
	margin: 0 10px;
}
.asking-user {
    float: left;
    width: 100%;
}
.asking-user span{
	float: right;
    padding: 10px 20px;
}
.summery-details h3{
	margin-top: 7px;
    margin-bottom: 18px;
}
.mini-counts{font-size:22px;}
@media screen and (max-width:480px){
	.tags {
    float: left;
}
	
}
#connectionErrorModal{display:none!important;}
.modal-backdrop.fade.in {
    display: none!important;
}

.topic_actn{
	text-align:left;
	padding:0px 15px;
	margin-bottom:10px;
}
.topic_actn i.fa{
	font-size:20px;
}
.members-bg {
    background: #f7f7f7;
}
.cmt_member{
    margin-top: -4px;
	margin-bottom: 20px;
	float:left;
}
.cmt_member img,.members .members-bg img{
	width:50px;
	height: 50px;
	border-radius: 50%;

}
.bg_white{
	background-color:#fff;
	padding-top:0px;
}
.member_detail p{
	line-height: 15px;
	margin: 0 0 0px;
}
.bg_white{
	background-color:#fff;
}
.question-summary{
    border-bottom: 1px solid #ccc;}
	
.commu-log, .summery-details{
    float: left;
}
.log-align{
    float: left;
    text-align: center;
	padding: 20px 10px;
	}
.tags {
    float: right;
	padding: 10px;
}
.tags a img{
	width:auto;
	height:auto;
	margin: 0 10px;
}
.asking-user {
    float: left;
    width: 100%;
}
.asking-user span{
	float: right;
    padding: 10px 20px;
}
.summery-details h3{
	margin-top: 7px;
    margin-bottom: 18px;
}
.tags1 {text-align:center;}
.tags1 a .fa {
    font-size: 20px;
    padding: 20px 10px;
    color: #ff8a43;
}
.mini-counts{font-size:22px;}
@media screen and (max-width:480px){
	.tags {
    float: left;
}
	
}
.chat-txt{width:100%!important}
.middleSection{
	padding: 0px;
    border: 1px solid rgba(0, 0, 0, 0.1);
    height: 590px;
}
.groupNameDiv2{
	font-size: 14px;
	font-weight: bold
}
.groupNameDiv{
	text-align: left; 
	padding-bottom: 21px;
	display: none;
}
.chatBox{
	overflow: scroll;
	overflow-x: hidden;
    height: 280px!important;
}
.rightSection.persons2{
	padding: 0;
	border-left: 1px solid rgba(0, 0, 0, .10);
	border-top: 1px solid rgba(0, 0, 0, .10); 
	text-overflow: ellipsis;
	overflow-x: hidden;
	overflow-y: hidden 
}
.group1 {
	padding-top: 5px;
	padding-right: 5px
}
.middleSection.full-chatbox{
    height: 340px!important;
	margin-bottom: 20px;
}

h1, h2, h3, h4, h5, h6{font-family: Ciutadella!important;}
.tbl-topic.table>tbody>tr>td:last-child h3{text-align:left;}
.tbl-topic {font-size: 16px!important; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;}
.tbl-topic h3,.tbl-topic h4{line-height: 1.5; margin-bottom:0px;	}
.tbl-topic h3,.tbl-topic h3 a {
	font-size: 20px;
    margin: 0px;
	font-family: Ciutadella!important;
    color:#005e82!important;
	font-weight:500;
}
.tbl-topic h3 a:hover, .tbl-topic h3 a:focus, .tbl-topic a:hover, .tbl-topic a:focus {
    color: #005e82!important;
	text-decoration: none!important;
}
.tbl-topic td:first-child(text-align:left;)
.tbl-topic td{text-align:center;}
.tbl-topic td:last-child span{float:right; text-align: center;}
.tbl-topic.table>tbody>tr>td{
	vertical-align: middle!important;
}
.tbl-topic {
    margin: 0;
}
.topic-sec{
	font-family: Ciutadella!important;
}
.topic-sec i.fa.fa-edit {
    font-size: 18px;
    color: #ff8a43;
}
.members {
    float: left;
}
.navbar-form .btn-link{
	right: 1px;
    border: none;
}
#myPager {
    margin: 0;
}
.pager li>a, #myPager.pager li>span {
    display: inline-block;
    padding: 1px 10px!important;
    background-color: #fff;
    border: 1px solid #ddd;
    border-radius: 0px!important;
}
.padd-0 {
    padding: 0!important;
}
.cmt_member h3, .members h3 {
    margin-bottom: 10px;
}
h2 {
    font-family: 'Ciutadella'!important;
    color: #005e82!important;
	margin-top: 20px!important;
    margin-bottom: 20px!important;
	text-transform: capitalize!important;
	font-size: 30px!important;
	font-weight: 500!important;
    line-height: 1.1!important;
}
.tbl-topic h4{
	line-height: 1.5;
    margin-bottom: 0px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif!important;
    font-weight: 500;
    font-size: 16px;
}

.tbl-topic>thead {
    background: #445268;
}
.tbl-topic thead h3{
	color:#fff!important;
}
.table>thead>tr>th{border:none!important;}
.tbl-topic span {
    float: right;
}
.tbl-topic>thead>tr>th span h3 {
    margin-right: 50px;
}
/*** Header css***/
.menu-center .nav>li>a {
    padding: 10px 10px !important;
    font-size: 16px;
	letter-spacing: 1px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif!important;
}
.navbar-default .navbar-nav>li>a {
    color: #777;
}
.navbar-default .navbar-nav>.open>a, .navbar-default .navbar-nav>.open>a:focus, .navbar-default .navbar-nav>.open>a:hover {
    color: #555;
    background-color: #e7e7e7;
}
.multi-column-dropdown h5 {
    padding: 5px 15px;
    font-weight: bold;
	font-size: 14px;
	color: #333333;
	margin-top: 10px;
    margin-bottom: 10px;
	letter-spacing: 1px;
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif!important;
}
.multi-column-dropdown li a {
    display: block;
    clear: both;
    line-height: 1.228571429;
    color: #606060;
    white-space: normal;
    font-family: 'HelveticaNeueLTStd-Lt'!important;
}
.dropdown-menu li a {
    padding: 5px 15px;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif!important;
}
.multi-column-dropdown li a {
    text-transform: capitalize;
    font-weight: normal;
}
a:focus, a:hover {
    color: #23527c;
    text-decoration: none!important;
}
.navbar-default .navbar-nav>li>a {
    color: #777;
}
.navbar-default .navbar-nav>li>a:focus, .navbar-default .navbar-nav>li>a:hover {
    color: #333;
    background-color: transparent;
}
.ddl-user {
    top: 30px!important;
    min-width: 300px!important;
}
.agreement label {
    font-size: 12px!important;
    line-height: 21px!important;
	font-family: "Helvetica Neue",Helvetica,Arial,sans-serif!important;
}
.btn-group.open .dropdown-toggle {
    box-shadow: none!important;
}

</style>
<?php echo $this->template->contentEnd();?> 
<div class="" style="margin-top:79px">
	<img class="img-responsive bnr-images" src="<?php echo $theme_url?>/images/usercomunitybanr.jpg">
</div>

	<div class="container padd-0">
		<div class="col-md-12 padd-0">
			<center>
				<h2><?=$forum->title;
			
				//user_image
				?></h2>
				<p><?= $forum->description ?></p>
			</center>
		</div>
		<div class="col-md-12 bg_white topic-sec padd-0">
			<div class="col-md-9 padd-0">
				<div class="col-md-12 text-right padd-0">
				  <ul class="pagination pagination-lg pager" id="myPager"></ul>
				</div>
				<div class="table-responsive" style="float:left; width:100%">
				  <table class="table table-striped tbl-topic">
					<thead>
						<tr>
							<th>
								<h3>Topic Name</h3>
							</th>
							<th class="text-center">
								<h3>Views</h3>
							</th>
							<th class="text-center">
								<h3>Likes</h3>
							</th class="text-center">
							<th class="text-center">
								<h3>Follows	</h3>
							</th>
							<th class="text-center">
								<h3>Answers</h3>
							</th>
							<th>
								<span><h3>Created On</h3></span>
							</th>
						</tr>
					</thead>
					<tbody id="myTable">
						<?php if (isset($topics) && !empty($topics)) : ?>
						<?php foreach ($topics as $topic) : ?>
						<tr>
						  <td>
							<h3><a href="<?= site_url()."community/forum/topic/".$topic->permalink ?>"><?= $topic->title ?></a></h3>
							<p style="font-size:12px"> Created by<a href="#"> <?= $topic->author ?>, </a></p>
							<!--<h4> <?= $topic->created_at ?></h4> -->
						  </td>
						  <td class="text-center">
							<h3>10 </h3>
						  </td>
						  <td class="text-center">
							<h3>10 </h3>
						  </td>
						  <td class="text-center">
							<h3>10 </h3>
						  </td>
						  <td class="text-center">
							<h3>10 </h3>
						  </td>
						  <td>
							<span><!--<h3> <a href="<?= base_url('user/' . $topic->latest_post->author) ?>"><?= $topic->latest_post->author ?></a></h3> -->
							<h4><?= $topic->latest_post->created_at ?></h4></span>
						  </td>
						</tr>
						<?php endforeach; ?>
						</tbody>
					</table>   
				</div>
				<?php else : ?>
					<h4>No topic yet...</h4>
				<?php endif; ?>
			</div>
			<div class="col-sm-3" style="margin-top: 0!important;padding-right: 0;">
				<div class=" cmt_member">
					<h3>Community Owners</h3>
					<?php if($forum->user_image){?> 
					<div class="members">
						<div class="members-bg">
						    <div class="col-sm-12 padd-0">
								<div class="col-md-3 col-sm-4 padd-0">
									<img src="<?=site_url().'/uploads/customer/'.$forum->user_image; ?>" width="40px">
								</div>
								<div class="col-md-9 col-sm-8 padd-0 member_detail">
									<p class="text-left"><strong>Name</strong><br/>
									<small>Designation<br/>Company Name</small></p>
								</div>
							</div>
						</div>
						<div class="members-bg">
							<div class="col-sm-12 padd-0">
								<div class="col-md-3 col-sm-4 padd-0">
									<img src="<?=site_url().'/uploads/customer/'.$forum->user_image; ?>" width="40px">
								</div>
								<div class="col-md-9 col-sm-8 padd-0 member_detail">
									<p class="text-left"><strong>Name</strong><br/>
									<small>Designation<br/>Company Name</small></p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class="members">
					<h3 class="">Members</h3>
					<?php if($userList >0){ 
					   foreach($userList  as $rowData) { ?>
							<?php if($rowData->u_avatar){?> 
						<div class="members-bg">
								<div class="col-md-3 col-sm-4 padd-0">
									<img src="<?=site_url().'/uploads/customer/'.$rowData->u_avatar ?>" width="40px">
								</div>
							<div class="col-md-9 col-sm-8 padd-0 member_detail">
								<p><strong><?=$rowData->u_name;?></strong><br/>
								<small><?=$rowData->person_designation;?><br/><?=$rowData->user_company_name;?></small></p>
							</div>
						</div>
							<?php } ?>
					<?php } } ?>
				</div><!-- .col-sm-3 -->
			</div>
			<?php //if (isset($_SESSION['uid'])) : ?>
				<!--<div class="col-md-12">
					<a href="<?= base_url($forum->slug . '/create_topic') ?>" class="btn btn-default">Create a new topic</a>
				</div>-->
			<?php //endif; ?>
		</div><!-- .row -->
		<section class="page-contents">
			<div class="leftSection col-xl-3 col-md-3 col-sm-12 col-xs-12 hide" style="padding: 0;">
				<div class="chat-search col-md-12" id="convStart"  style="cursor: pointer;">
					<div class="form-group col-md-12 col-sm-12 col-xs-12" id="newMessage">
						<div class="col-md-12" style="padding: 0;font-size: 18px;font-weight: bold">
							<span class="" style="padding: 0;sty"><i class="fa fa-edit fa-large" style="color: #388ded" > </i></span>Start a conversation 
						</div>
					</div>
				</div>
				<div style="float:left; width: 100%" id="groupDiv">
					<ul class="persons" id="groups">
					</ul>
				</div>
			</div>
				<div class="middleSection full-chatbox col-xl-6 col-md-12 col-sm-12 col-xs-12">
					<div class="chat-search col-md-12 groupNameDiv">
					   <div class="col-md-12 col-xl-12 col-xs-12 col-sm-12">
							<div class="groupNameDiv2">
								<span class="UserNames group-name group-name-style text-center"></span>
							</div>
					   </div>
					</div>
					<div class="chat chatBox col-md-12 col-xl-12 col-sm-12 col-xs-12 1" id="chatBox" ></div>
					<form id="messageForm">
						 <div class="form-group group1  col-md-10 col-xl-10 col-sm-8 col-xs-8 ">
						   <textarea style="max-height: 50px; border: 0"  id="message" type="text" name="message" class="chat-txt form-control" placeholder="Your message....."></textarea>
						</div>
						<div class="form-group col-md-2 col-xl-2 col-sm-3 col-xs-4 pad-1" style="margin-top: 10px">
							<img title="Send File/Audio" src="<?php echo base_url('assets/img/fileAttach.png')?>" id="fileIV1" style="float:left;cursor: pointer; width: 25px;height: 22px;margin-left: 0px;">
							<img title="Send Picture/Video" src="<?php echo base_url('assets/img/cam.png')?>" id="fileIV" style="float:left;cursor: pointer; width: 25px;height: 25px;margin-left: 10px;">
							<input type="file" class="hidden" id="messageFile1" name="documents" accept="application/pdf,application/msword,application/vnd.ms-excel,application/vnd.ms-powerpoint,text/csv,text/plain,application/zip,application/x-zip-compressed,audio/mp3,audio/x-ms-wma">
							<input type="file" class="hidden" id="messageFile" name="pictureVideo" accept="video/3gpp,video/mp4,video/3gp,image/x-png,image/jpeg">
							<!--<i id="sendMessage" class="fa fa-send fa-2x pad-5" style="color: #82d6d5;cursor: pointer; margin-left: 10px;width: 25px;height: 25px"></i>-->
							<img title="Send Message" src="<?php echo base_url('assets/img/pp.png')?>" id="sendMessage" style="cursor: pointer; margin-left: 10px;width: 25px;height: 25px">
						</div>
					</form>
					<div class="col-md-12 col-xl-12 col-sm-12 col-xs-12 text-center pad-20 hidden" id="blockmessage" >
						You cannot reply to this conversation.
					</div>
				</div>
				<div class="rightSection persons2 hide col-xl-3 col-md-3 col-sm-12 col-xs-12" id="rightSection">
					<div class="groupInfoContent">
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 text-center  person2 rightGroupImages" style="padding-top: 10px;padding-bottom:10px;display: flex;justify-content: center;"   >
					</div>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 text-center pad-10" >
						<div class="be-use-name group-name" ></div>
					</div>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 text-center pad-2" style="padding-bottom: 5px" >
						<div class="preview be-user-info" style="font-size: 10px; padding-bottom:5px;border-bottom:1px solid rgba(0, 0, 0, .10) "></div>
					</div>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12  pad-5 hidden optionHubar" id="editGroupName">
						<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 pad-5"  style="cursor: pointer;color: #75aef3;padding-right: 0;"> <i class="fa fa-pencil pad-10"></i><strong>Change Convertation Name</strong></div>
					</div>

					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12  pad-5 hidden optionHubar" id="addMember" data-group="">
						<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 pad-5" style="cursor: pointer;color: #75aef3;padding-right: 0;"><i class="fa fa-plus pad-10"></i><strong>Add People</strong></div>
					</div>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12  pad-5 hidden optionHubar" id="blockOptions"  >
						<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 pad-5 hidden" id="block" style="cursor: pointer;color: #75aef3;padding-right: 0;"><i class="fa fa-ban pad-10"></i><strong>Block</strong></div>
						<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 pad-5 hidden" id="unblock" style="cursor: pointer;color: #75aef3;padding-right: 0;"><i class="fa fa-ban pad-10"></i><strong>Unblock</strong></div>
					</div>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12  pad-5 hidden optionHubar" id="leaveGroup">
						<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 pad-5"  style="cursor: pointer;color: #75aef3;padding-right: 0;"> <i class="fa fa-sign-out pad-10"></i><strong>Leave Group</strong></div>
					</div>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12  pad-5 optionHubar" id="muteOptions" style="border-bottom: 1px solid rgba(0, 0, 0, .10);" >
						<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 pad-5 hidden" id="mute" style="cursor: pointer;color: #75aef3;padding-right: 0;"><i class="fa fa-bell-slash pad-10"></i><strong>Mute</strong></div>
						<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 pad-5 hidden" id="unmute" style="cursor: pointer;color: #75aef3;padding-right: 0;"><i class="fa fa-bell pad-10"></i><strong>Unmute</strong></div>
					</div>
					<ul class="persons personsList" id="groupMembers" ></ul>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 hidden" id="attachment">
						<div class="sectionName">Sheared Files</div>
						<ul class="attachment" id="attachmentList" >

						</ul>
					</div>
					<div class="col-md-12 col-xl-12 col-xs-12 col-sm-12 hidden" id="imageAttachment">
						<div class="sectionName" >Sheared Images</div>
						<div class="row ol-lightbox-gallery" style="list-style: none;padding: 0;" id="ImageAttachmentList" >

						</div>
					</div>
					</div>
				</div>
		</section>
	</div>
	
	<!-- .container -->

<?php //var_dump($forum, $topics); ?>


<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?php echo base_url("assets/newTheme/assets/js/vendors/vendors.js") ?>"></script>
<!-- Local Revolution tools-->
<!-- Only for local and can be removed on server-->

<script src="<?php echo base_url("assets/newTheme/assets/js/custom.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/jquery-dateFormat.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/jquery.playSound.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/toastr.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/anchorme.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/fastselect.standalone.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/magicsuggest.js") ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.20.1/moment.min.js"></script>
<!-- <script src="<?php /*echo base_url("assets/newTheme/assets/js/socket.io.min.js")."?".rand(5,50000); */?>"></script>-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.0.4/socket.io.js"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/socket.io-file-client.js") ?>"></script>

<script src="<?php echo base_url("assets/js/scripts/jwt-decode.min.js") ?>"></script>
<script src="<?php echo base_url("assets/js/jquery-ui.min.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/clamp.min.js") ?>"></script>

<script src="//vjs.zencdn.net/5.4.6/video.min.js"></script>
<script>
    var baseUrl="<?php echo base_url() ?>";
	var gid = <? echo $group_id; ?>;
	
</script>

<script src="<?php echo base_url("assets/js/video.min.js")?>"></script>
<script src="<?php echo base_url("assets/js/scripts/fullcalendar.min.js") ?>"></script>

<script>
    let $buoop = {
        notify:{e:-1,f:-1,o:-1,s:-1,c:-1},
        insecure:true,
        api:5,
        text:"Your browser, {brow_name}, is too old for Chat manager: <a{up_but}>update</a>.",
        style: "top",
        container: document.body,
        jsshowurl: "//browser-update.org/update.show.min.js",
        l: false,
    };
    function $buo_f(){
        let e = document.createElement("script");
        e.src = "//browser-update.org/update.min.js";
        document.body.appendChild(e);
    };
    try {document.addEventListener("DOMContentLoaded", $buo_f,false)}
    catch(e){window.attachEvent("onload", $buo_f)}
</script>
<script type="text/javascript" src="<?php echo base_url("assets/newTheme/assets/js/loadingoverlay.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/newTheme/assets/js/loadingoverlay_progress.js") ?>"></script>
<script src="<?php echo base_url("assets/newTheme/assets/js/si.js")."?".rand(5,50000); ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/newTheme/assets/js/twemoji-picker.js") ?>"></script>
<script type="text/javascript" src="<?php echo base_url("assets/newTheme/assets/js/mediaelement-and-player.min.js") ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/0.7.0/js/perfect-scrollbar.jquery.min.js"></script>
<!--<script type="text/javascript" src="<?php /*echo base_url("assets/newTheme/twemoji/2/twemoji.min.js")."?".rand(5,50000) */?>"></script>-->
<script src="//twemoji.maxcdn.com/2/twemoji.min.js?2.2.3"></script>
<!--<script type="text/javascript" src="<?php /*echo base_url("assets/newTheme/assets/js/perfect-scrollbar.jquery.js")."?".rand(5,50000) */?>"></script>-->
<!--<script type="text/javascript" src="<?php /*echo base_url("assets/newTheme/assets/js/perfect-scrollbar.jquery.min.js") */?>"></script>-->
<script>
    $(document).ready(function () {
        let t=null;
        let name=null;
        let pic=null;

        let tc=null;
        window.setInterval(function() {
//            window.scrollTo(0,0);
            if(String(localStorage.getItem("T"))=="token"){
                t=localStorage.getItem("_r");
                name=jwt_decode(t).firstName;
                pic=jwt_decode(t).profilePicture;
            }else{
                t=JSON.parse(localStorage.getItem("_r"));
                name=t.firstName;
                pic=t.profilePicture;
            }
            $("#userNameTop").html(name);
            $("#userImageTop").attr("src",pic);
            tc=localStorage.getItem("_r");
            if(tc===null||tc===""||tc===''){
                location.href="<?php echo base_url('userview/logout') ?>";
            }
        },1000);
    });
</script>


<script type="text/javascript">

    toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toast-bottom-left",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    };

    $(document).ready(function () {


        window.mobileAndTabletcheck = function() {
            let check = false;
            (function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4))) check = true;})(navigator.userAgent||navigator.vendor||window.opera);
            return check;
        };
        let viewHeight=null;
        let viewWidth=null;

        //window.scrollTo(0,0);
        $(window).bind("resize",function () {
            if(window.mobileAndTabletcheck()){
              //  location.href="<?php echo base_url('mobile/im') ?>";
            }
            //window.scrollTo(0,0);
             viewHeight=$(window).height();
             viewWidth=$(window).width();
            if(viewWidth>995){
               // $("body").addClass("controlOverflow");
            }else if($("body").hasClass("controlOverflow")){
                //$("body").removeClass("controlOverflow");
            }
            if(viewWidth<990){

                $('#convStart').css("height",61);
                $('.persons').css({"margin-top":0});
                $(".rightSection").css({'margin-top': '30px'});
                $(".groupNameDiv").css({"padding-bottom":'32px'});
                $('.video').css({'margin-left': '-34px'});

            }
            else {
                $(".rightSection").css({'margin-top': '0px'});
                $(".groupNameDiv").css({"padding-bottom":'21px'});
                $('.video').css({'margin-left': '0px'});
            }
            /*if(viewHeight<776){
             $("#newMModalBody").css("margin-bottom", "155px");
             }else {
             $("#newMModalBody").css("margin-bottom", "160px");
             }*/
            if(viewWidth<990){
                $(".leftSection").css({"height":(viewHeight-95)});
                $(".middleSection").css({"height":(viewHeight-95)});
                $(".rightSection").css({"height":(viewHeight-95)});
            }
            else{
                $(".leftSection").css({"height":590});
                $(".middleSection").css({"height":590});
                $(".rightSection").css({"height":590});
                $("body").css({"height":590});
            }
            $(".chat").css({"height":(viewHeight-170)});
            $('#groups').css({"height":(viewHeight-110)});
            $(".rightSection").css({"height":(viewHeight-50)});
            //$('.personsList').css({"height":(viewHeight-250)});
        }).trigger("resize");

        /*
           --------Global variables
         */
        let chatBox=$('#chatBox');
        let groupBox=$("#groups");
        let videoObjects=[];
        let responce=null;
        let userId=null;
        let type=1;
        let ID_BASED=false;
        if(String(localStorage.getItem("T"))=="token"){
             responce=localStorage.getItem("_r");
             userId=jwt_decode(responce).userId;
            type=jwt_decode(responce).userType;
        }else{
            responce=JSON.parse(localStorage.getItem("_r"));
            userId=responce.userId;
            ID_BASED=true;
        }
        let start=0;
        let limit=30;
        let groupLimit=30;
        let groupStart=0;
        let totalGroup=null;
        let friendStart=0;
        let friendLimit=30;
        let totalFriend=null;
        let totalRetivedMessage=0;
        let activeGroupId=null;
        let activeGroupmember=null;
        let groupIds=[];
        let time=[];
        let groupImages={};
        let groupType=null;
        let mute=0;
        let block=0;
        let groupObjects={};
        let scrollPosition=null;
        let notRequested=true;
        let meBlocker=0;
        let messageLoading=false;

        let typing = false;
        let typingTimeout = undefined;
        let lastMessageDate=null;
        let LastMessageId=null;
        let firstmessageDate=null;
        let topMessage=null;
        let addexpendDropdown=null;
        let addMemberexpendDropdown=null;
        let membersId=[];
        let presentTypingDiv=null;
        let messageFormhtml=$("#messageForm").html();

        let magicSuggestOption={
            placeholder: 'Search for members...',
            maxSelection:null,
            allowFreeEntries:false,
            // data: q,
            renderer: function(data){
                return '<div style="padding: 5px; overflow:hidden;">' +
                    '<div style="float: left;"><img style="width: 25px;height: 25px" src="' + data.picture + '" /></div>' +
                    '<div style="float: left; margin-left: 5px">' +
                    '<div style="font-weight: bold; color: #333; font-size: 12px; line-height: 11px">' + data.name + '</div>' +
                    '<div style="color: #999; font-size: 9px">' + data.email + '</div>' +
                    '</div>' +
                    '</div><div style="clear:both;"></div>'; // make sure we have closed our dom stuff
            }
        };
        let addmember=$('#addMemberInput').magicSuggest(magicSuggestOption);
        let newMemberInput=$('#addNewMemberInput').magicSuggest(magicSuggestOption);
        /*let momentOptions={
            sameDay: '[Today at] h:mm a',
            nextDay: '[Tomorrow at] at h:mm a',
            nextWeek: 'dddd [at] h:mm a',
            lastDay: '[Yesterday at] h:mm a',
            lastWeek: '[Last] dddd [at] h:mm a',
            sameElse: 'MMM DD, YYYY h:mm a'
        };*/
        let momentOptions={
            sameDay: '[Today at] h:mm a',
            nextDay: '[Tomorrow at] at h:mm a',
            nextWeek: 'dddd [at] h:mm a',
            lastDay: 'MMMM DD, YYYY h:mm a',
            lastWeek: 'MMMM DD, YYYY h:mm a',
            sameElse: 'MMMM DD, YYYY h:mm a'
        };
        let momentOptions2={
            sameDay: 'h:mm a',
            nextDay: '[Tomorrow at] at h:mm a',
            nextWeek: 'dddd [at] h:mm a',
            lastDay: '[Yesterday at] h:mm a',
            lastWeek: '[Last] dddd [at] h:mm a',
            sameElse: 'MMM DD, YYYY h:mm a'
        };
        // --------- Global Functions--------------



        function typingTimeoutFunction(){
            let data={
                    _r:token,
                    groupId:activeGroupId
                };

            typing = false;
            socket.emit("notTyping",JSON.stringify(data));
        }
        function onKeyDownNotEnter(){
            let data={
                _r:token,
                groupId:activeGroupId
            };
            if(!typing) {
                typing = true;
                socket.emit("typing",JSON.stringify(data));
                typingTimeout = setTimeout(typingTimeoutFunction, 3000);
            } else {
                clearTimeout(typingTimeout);
                typingTimeout = setTimeout(typingTimeoutFunction, 3000);
            }

        }
        function initVideo(id){

            $("#"+id).mediaelementplayer({
                    // Do not forget to put a final slash (/)
                    pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
                    // this will allow the CDN to use Flash without restrictions
                    // (by default, this is set as `sameDomain`)
                    shimScriptAccess: 'always',

                    success: function (player, node) {


                        $(player).closest('.mejs__container').find("div.mejs__overlay-button").css({"height":"110px"});
                        $(player).closest('.mejs__container').find("div.mejs__controls").css({"background":"#32cdc7"});
                       // $(player).closest('.mejs__container').find("div.mejs__controls").css({"background":"transparent"});
                        $(player).closest('.mejs__container').css({"background":"transparent"});



                    }
                });


        }

        function initAudio(id){

           $("#"+id).mediaelementplayer({
                // Do not forget to put a final slash (/)
                pluginPath: 'https://cdnjs.com/libraries/mediaelement/',
                // this will allow the CDN to use Flash without restrictions
                // (by default, this is set as `sameDomain`)
                shimScriptAccess: 'always',
                success: function (player, node) {


                    $(player).closest('.mejs__container').find("div.mejs__controls").css({"border-radius":"50px"});
                    $(player).closest('.mejs__container').css({"background":"transparent"});
                    $(player).closest('.mejs__container').find("div.mejs__mediaelement").css({"border-radius":"50px"});
                    $(player).closest('.mejs__container').find("div.mejs__mediaelement").css({"background-color":"transparent"});

                }
            });

        }
        // this function used to clear new message div
        function resetNewMessage () {
            $("#newMessageFile").replaceWith($("#newMessageFile").val('').clone(true));
            $('#newMessagefileIV').attr("src","<?php echo base_url('assets/img/i-camera.png')?>");

            $('.twemoji-textarea').html("");
            $('.twemoji-textarea-duplicate').html("");
            $('#newMessageText').text("");
            $('#newMessageText').val("");
            $('.close').trigger("click");

        }

        // this function used to clear message div
        function reset () {
            $("#messageFile").replaceWith($("#messageFile").val('').clone(true));
            $('#fileIV').attr("src","<?php echo base_url('assets/img/i-camera.png')?>");

            $("#messageFile1").replaceWith($("#messageFile1").val('').clone(true));
            $('#fileIV1').attr("src","<?php echo base_url('assets/img/fileAttach.png')?>");

            $('.twemoji-textarea').html("");
            $('.twemoji-textarea-duplicate').html("");
            $('#message').text("");
            $('#message').val("");

        }

        // function for checking image/video type and size before uploading
        function imageChange(event) {
            let file = this.files[0];
            let imagefile = file.type;
            let size=file.size;
            let match= ["image/jpeg","image/png","image/jpg","video/3gpp","video/mp4","video/3gp","audio/mp3"];
            if(size>20971520){
                toastr.error("Max limit 20Mb exceeded");
                return ;
            }

            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4]) || (imagefile==match[5])||(imagefile==match[6])))
            {
                toastr.error("This type of file is not allowed");
                return false;
            }else {
                $('#sendMessage').trigger('click');
                /* let type=null;
                 let url=URL.createObjectURL(this.files[0]);
                 if((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])){
                 type=new Image();
                 type.src=url;
                 type.onload = function() {
                 captureImage(type);
                 };

                 }
                 else{
                 type = document.createElement('video');
                 let source = document.createElement('source');
                 source.setAttribute('src',url);
                 type.appendChild(source);
                 type.muted = true;
                 type.play();
                 setTimeout(function(){
                 type.pause(); // note the [0] to access the native element
                 captureImage(type);
                 }, 3000);

                 }*/

            }
        }

        function attachChange(event) {
            let file = this.files[0];
            let attachFile = file.type;
            let matched=false;
            let size=file.size;
            let match= ["application/pdf","application/msword","application/vnd.ms-excel","application/vnd.ms-powerpoint","text/csv","text/plain","application/zip","application/x-zip-compressed","audio/mp3","audio/x-ms-wma","audio/mpeg3","audio/mpg","audio/mpeg"];
            if(size>20971520){
                toastr.error("Max limit 20Mb exceeded");
                return false ;
            }

            for(let i=0;i<match.length;i++){
                if(attachFile===match[i]){
                    matched=true;
                }
            }
            if(matched){
                $('#sendMessage').trigger('click');
            }else{
                toastr.error("This type of file is not allowed");
                return false;
            }
            /*if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4]) || (imagefile==match[5])||(imagefile==match[6])))
            {
                toastr.error("This type of file is not allowed");
                return false;
            }else {
                $('#sendMessage').trigger('click');


            }*/
        }

        // function for checking image/video type and size before uploading
        function imageChangeNewMessage(event) {
            let file = this.files[0];
            let imagefile = file.type;
            let size=file.size;
            let match= ["image/jpeg","image/png","image/jpg","video/3gpp","video/mp4","video/3gp","audio/mp3"];
            if(size>20971520){
                toastr.error("Max limit 20Mb exceeded");
                return ;
            }

            if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]) || (imagefile==match[3]) || (imagefile==match[4]) || (imagefile==match[5]) || (imagefile==match[6])))
            {
                toastr.error("This type of file is not allowed");
                return false;
            }else {

                $('#newSendMessage').trigger('click');
                /*let type=null;
                 let url=URL.createObjectURL(this.files[0]);
                 if((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2])){
                 type=new Image();
                 type.src=url;
                 type.onload = function() {
                 captureImagenewMessage(type);
                 };

                 }
                 else{
                 type = document.createElement('video');
                 let source = document.createElement('source');
                 source.setAttribute('src',url);
                 type.appendChild(source);
                 type.muted = true;
                 type.play();
                 setTimeout(function(){
                 type.pause(); // note the [0] to access the native element
                 captureImagenewMessage(type);
                 }, 3000);

                 }*/

            }
        }

        // Api pagination functions
        function increaseStart() {
            start+=limit;
        }
        function resetStart() {
            start=0;
        }
        function resetRetiveMessage(){
            totalRetivedMessage=0;
        }
        function increaseGroupLimit() {
            groupStart+=groupLimit;
        }
        function resetFriendStart() {
            friendStart=0;
        }
        function increaseFriendsLimit() {
            friendStart+=friendLimit;
        }
        function addNewGroup(group) {
            let html="";
            groupIds.push(group.groupId);
            groupObjects[group.groupId]=group;
            time[group.groupId]=group.lastActive;
            if(group.pendingMessage>0){
                html += " <li class=\"person font-bold-black\" data-chat=\"person1\" id='group_"+group.groupId+"' data-type=\""+group.groupType+"\" data-block=\""+group.block+"\" data-mute=\""+group.mute+"\" data-group=\""+group.groupId+"\">";
            }else {
                html += " <li class=\"person\" data-chat=\"person1\" id='group_"+group.groupId+"' data-type=\""+group.groupType+"\" data-block=\""+group.block+"\" data-mute=\""+group.mute+"\" data-group=\""+group.groupId+"\">";
            }

            groupImages[group.groupId]=group.groupImage;
            html +='<span id="groupImage_'+group.groupId+'">';
            for (j=0;j<group.groupImage.length;j++){

                html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+group.groupImage[j]+"\" >";
            }
            html +='</span>';
            html += "                        <span class=\"name\" id='groupName_"+group.groupId+"' style=\"overflow: hidden\"><div>"+group.groupName+"</div><\/span>";
            let date=moment(group.lastActive,moment.ISO_8601).fromNow();

            html += "                        <span id='time_"+group.groupId+"' class=\"time\">"+date+"<\/span>";
            if(group.messageType==="text"){
                let recentMessage=group.recentMessage;
                if(recentMessage===null){
                    recentMessage='';
                }
                html += "                        <span style='float: left' id='messageType_"+group.groupId+"' class=\"preview\">"+recentMessage+"<\/span>";

            }else{
                let messageType=group.messageType;
                if(messageType===null){
                    messageType='';
                }
                html += "                        <span style='float: left' id='messageType_"+group.groupId+"' class=\"preview\">"+messageType+"<\/span>";
            }
            if(group.mute){
                html += "                        <div style='' id='mute_"+group.groupId+"' class=\"mute-pad  text-right\" ><i class=\"fa fa-bell-slash\"></i><\/div>";
            }else{
                html += "                        <div style='' id='mute_"+group.groupId+"' class=\"mute-pad hidden text-right\" ><i class=\"fa fa-bell-slash\"></i><\/div>";
            }


            html += "                    <\/li>";

            $("#groups").prepend(html);
        }

        // this function prints group list on the left side
        function printGroupListAppend(groups) {
            let html="";
            groupIds=[];

            time={};
            for(let i=0;i<groups.length;i++){
                groupObjects[groups[i].groupId]=groups[i];
                groupIds.push(groups[i].groupId);
                time[groups[i].groupId]=groups[i].lastActive;
                if(groups[i].pendingMessage>0) {
                    html += " <li class=\"person font-bold-black\" data-chat=\"person1\" id='group_" + groups[i].groupId + "' data-mecreator=\"" + groups[i].meCreator + "\"  data-type=\"" + groups[i].groupType + "\" data-block=\"" + groups[i].block + "\" data-mute=\"" + groups[i].mute + "\" data-group=\"" + groups[i].groupId + "\">";
                }else{
                    html += " <li class=\"person \" data-chat=\"person1\" id='group_" + groups[i].groupId + "' data-mecreator=\"" + groups[i].meCreator + "\"  data-type=\"" + groups[i].groupType + "\" data-block=\"" + groups[i].block + "\" data-mute=\"" + groups[i].mute + "\" data-group=\"" + groups[i].groupId + "\">";
                }
                groupImages[groups[i].groupId]=groups[i].groupImage;
                html +='<span id="groupImage_'+groups[i].groupId+'">';
                for (j=0;j<groups[i].groupImage.length;j++){

                    html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+groups[i].groupImage[j]+"\" >";
                }
                html +='</span>';
                html += "                        <span class=\"name\" id='groupName_"+groups[i].groupId+"' style=\"overflow: hidden\"><div>"+groups[i].groupName+"</div><\/span>";
                let date=moment(groups[i].lastActive,moment.ISO_8601).fromNow();

                html += "                        <span id='time_"+groups[i].groupId+"' class=\"time\">"+date+"<\/span>";
                if(groups[i].messageType==="text"){
                    let recentMessage=groups[i].recentMessage;
                    if(recentMessage===null){
                        recentMessage='';
                    }
                    html += "                        <span style='float: left' id='messageType_"+groups[i].groupId+"' class=\"preview\">"+recentMessage+"<\/span>";

                }else{
                    let messageType=groups[i].messageType;
                    if(messageType===null){
                        messageType='';
                    }
                    html += "                        <span style='float: left' id='messageType_"+groups[i].groupId+"' class=\"preview\">"+messageType+"<\/span>";
                }
                if(groups[i].mute){
                    html += "                        <div style='' id='mute_"+groups[i].groupId+"' class=\"mute-pad  text-right\" ><i class=\"fa fa-bell-slash\"></i><\/div>";
                }else{
                    html += "                        <div style='' id='mute_"+groups[i].groupId+"' class=\"mute-pad hidden text-right\" ><i class=\"fa fa-bell-slash\"></i><\/div>";
                }

                html += "                    <\/li>";
            }
            $("#groups").append(html);
            let scrollXClone=$(".ps__scrollbar-x-rail").clone();
            let scrollYClone=$(".ps__scrollbar-y-rail").clone();
            $(".ps__scrollbar-x-rail").remove();
            $(".ps__scrollbar-y-rail").remove();
            $("#groups").append(scrollXClone);
            $("#groups").append(scrollYClone);

        }
        function printGroupList(groups){
            let html="";
            groupIds=[];

            time={};
            for(let i=0;i<groups.length;i++){
                groupIds.push(groups[i].groupId);
                groupObjects[groups[i].groupId]=groups[i];
                time[groups[i].groupId]=groups[i].lastActive;
				//debugger ;
                if(groups[i].pendingMessage>0) {
                    html += " <li class=\"person font-bold-black\" data-chat=\"person1\" id='group_" + groups[i].groupId + "' data-mecreator=\"" + groups[i].meCreator + "\"  data-type=\"" + groups[i].groupType + "\" data-block=\"" + groups[i].block + "\" data-mute=\"" + groups[i].mute + "\" data-group=\"" + groups[i].groupId + "\">";
                }else{
                    html += " <li class=\"person \" data-chat=\"person1\" id='group_" + groups[i].groupId + "' data-mecreator=\"" + groups[i].meCreator + "\"  data-type=\"" + groups[i].groupType + "\" data-block=\"" + groups[i].block + "\" data-mute=\"" + groups[i].mute + "\" data-group=\"" + groups[i].groupId + "\">";
                }
                groupImages[groups[i].groupId]=groups[i].groupImage;
                html +='<span id="groupImage_'+groups[i].groupId+'">';
                for (j=0;j<groups[i].groupImage.length;j++){

                    html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+groups[i].groupImage[j]+"\" >";
                }
                html +='</span>';
                html += "                        <span class=\"name\" id='groupName_"+groups[i].groupId+"' style=\"overflow: hidden\"><div>"+groups[i].groupName+"</div><\/span>";
                let date=moment(groups[i].lastActive,moment.ISO_8601).fromNow();

                html += "                        <span id='time_"+groups[i].groupId+"' class=\"time\">"+date+"<\/span>";
                if(groups[i].messageType==="text"){
                    let recentMessage=groups[i].recentMessage;
                    if(recentMessage===null){
                        recentMessage='';
                    }
                    html += "                        <span style='float: left' id='messageType_"+groups[i].groupId+"' class=\"preview\">"+recentMessage+"<\/span>";

                }else{
                    let messageType=groups[i].messageType;
                    if(messageType===null){
                        messageType='';
                    }
                    html += "                        <span style='float: left' id='messageType_"+groups[i].groupId+"' class=\"preview\">"+messageType+"<\/span>";
                }
                if(groups[i].mute){
                    html += "                        <div style='' id='mute_"+groups[i].groupId+"' class=\"mute-pad  text-right\" ><i class=\"fa fa-bell-slash\"></i><\/div>";
                }else{
                    html += "                        <div style='' id='mute_"+groups[i].groupId+"' class=\"mute-pad hidden text-right\" ><i class=\"fa fa-bell-slash\"></i><\/div>";
                }

                html += "                    <\/li>";
            }
            $("#groups").html(html);
        }

        //This function is used to get the group list
        function getGroupList(callback) {

            let url ="<?php echo base_url('imApi/getGroups?limit=') ?>"+groupLimit+"&start=0";
            if(ID_BASED){
                url="<?php echo base_url('imApi/getGroups?limit=') ?>"+groupLimit+"&start=0&userId="+userId;
            }
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                },
                "processData": false,
                "contentType": false,
                "statusCode": {
                    401: function(error) {
                       location.href="<?php echo base_url('userview/logout') ?>";
                    }
                }
            };

            $.ajax(settings).done(function (response) {
 //debugger;
                let groups=response.response;
                totalGroup=parseInt(response.status.total);
                if(totalGroup==0){
                    $('#addMember').attr('data-group',null);
                    $('#addMember').addClass("hidden");
                    chatBox.html('<img id="blankImg" src="<?php echo base_url('assets/img/nomess.png');?>" class="img-responsive blankImg" style="width:500px;margin-top: 20px;">');
                    chatBox.addClass("text-center");
                    $(".groupInfoContent").addClass("hidden");
                   
                }else{
                    //$('#addMember').removeClass("hidden");
                    //$("#editGroupName").removeClass("hidden");
                    $(".groupInfoContent").removeClass("hidden");
                    printGroupList(groups);
					//debugger;
                    // $("#groups li").first().trigger("click");
                    if(callback!=null|| callback!=""){
                        if(groups.length>0){
                            callback(true);
                        }else {
                            callback(false);
                        }

                    }else {
                        // $("#groups li").first().trigger("click",[{update:true}]);
						
					$("#groups li[id*='group_"+gid+"']").trigger("click",[{update:true}]);

                   
					}
                }



            });

        }

        //this function is used to print the group member list on the right side
        function printGroupMembers(members,meCreator,groupId) {
            let html="";
            membersId=[];

            for (i=0;i<members.length;i++){
                membersId.push(members[i].userId);
                html += "<li class=\"person\"  style=\"padding-top: 5px;padding-bottom: 0px;height:50px;cursor: default;\">";
                if(members[i].active===1){
                    html += "                        <img class='memberStatus memberActive' id='member_"+members[i].userId+"' src=\""+members[i].profilePictureUrl+"\" alt=\"\" \/>";
                }else {
                    html += "                        <img class='memberStatus' id='member_"+members[i].userId+"' src=\""+members[i].profilePictureUrl+"\" alt=\"\" \/>";
                }
                html += "                        <span  class=\"name\"><div style='margin-top: 8px'>"+members[i].firstName+" "+members[i].lastName +"</div><\/span>";
                if(parseInt(groupType)===0){
                    html += "                        <span class=\"time\" style='padding-top: 5px' ><a href=\"#\" data-group=\""+groupId+"\" data-member=\""+members[i].userId+"\" class=\"btn-danger btn-extra-small btnMemberDelete\"><i class=\"fa fa-trash\"><\/i><\/a><\/span>";
                }
                html += "                    <\/li>";
            }
            $('#groupMembers').html(html);
        }
        function printGroupFiles(groupFiles){
            if(groupFiles.length>0){
                if($("#attachment").hasClass("hidden")){
                    $("#attachment").removeClass("hidden");
                }
            }
            else{
                if(!$("#attachment").hasClass("hidden")){
                    $("#attachment").addClass("hidden");
                }
            }

            let strVar="";
            for(let i=0;i<groupFiles.length;i++){
                strVar += "<li>";
                strVar += "                        <i class=\"oli oli-document\"><\/i>";
                strVar += "                        <span>";
                strVar += "                            <a  target='_blank'style=\"color: #75aef3;\" href='"+groupFiles[i].message+"'>";
                strVar +=groupFiles[i].fileName;
                strVar += "                            <\/a>";
                strVar += "                        <\/span>";
                strVar += "                    <\/li>";
            }
            $("#attachmentList").html(strVar);
        }
        function printGroupImages(groupImages){
            if(groupImages.length>0){
                if($("#imageAttachment").hasClass("hidden")){
                    $("#imageAttachment").removeClass("hidden");
                }
            }
            else{
                if(!$("#imageAttachment").hasClass("hidden")){
                    $("#imageAttachment").addClass("hidden");
                }
            }

            let strVar="";
            for(let i=0;i<groupImages.length;i++){
                strVar += "<div class=\"col-md-4 col-xl-4 col-xs-4 col-sm-4 pad-5\">";
                strVar += "                            <a style='height: 100px;width: 100px' href='"+groupImages[i].message+"' class=\"ol-hover hover-5 ol-lightbox\">";
                strVar += "                                <img style='height: 100px;width: 100px'  src='"+groupImages[i].message+"' alt=\"image hover\">";
                strVar += "                                <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                strVar += "                                <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div>";
                strVar += "                            <\/a>";
                strVar += "                    <\/div>";
            }
            $("#ImageAttachmentList").html(strVar);
            lightBox.init();
        }
        //This function is used to get the group member list
        function getGroupMembers(groupId) {
            let url="<?php echo base_url('imApi/getMembers?groupId=') ?>"+groupId;
            if(ID_BASED){
                url="<?php echo base_url('imApi/getMembers?groupId=') ?>"+groupId+"&userId="+userId;
            }
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                },
                "processData": false,
                "contentType": false,
                "beforeSend":function () {
                    $('#groupMembers').html('<img id="loadinggroupmembers" src="<?php echo base_url('assets/img/loadingMessage.gif')?>" class="img-responsive" style="width:50px;margin-top: 20px;">');
                    $('#groupMembers').addClass("text-center");
                },
                "success":function () {
                    $("#loadinggroupmembers").remove();
                    $('#groupMembers').removeClass("text-center");
                }
            };
            $.ajax(settings).done(function (response) {
                let members=response.response.memberList;
                let meCreator=response.response.meCreator;
                let groupFiles=response.response.groupFiles;
                let groupImages=response.response.groupImages;
                printGroupMembers(members,meCreator,groupId);
                printGroupFiles(groupFiles);
                printGroupImages(groupImages);
            });

        }

        //This function is used to print the group name and three member image on the right side top
        function printGroupInfo(groupId,groupImages,groupName){
            let html="";
            let images=groupImages[groupId];
            for(i=0;i<images.length;i++){
                html += "<img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+images[i]+"\" >";
            }
            $('.rightGroupImages').html(html);
            $('.be-use-name').html(groupName);
            $clamp($('.be-use-name')[0], { clamp: 2, useNativeClamp: false });
        }

        function clampData() {
            $('.clamp-desc').each(function (index,element) {
                $clamp(element, {clamp: 3, useNativeClamp: false});
            });
            $('.clamp-title').each(function (index,element) {
                $clamp(element, {clamp: 3, useNativeClamp: false});
            });
        }
        //This function is used to  get friend list of user
        function getMembers(callback) {   // get friends list
            resetFriendStart();
            let url= "<?php echo base_url('user/friendList?start=') ?>"+friendStart+"&limit="+friendLimit;
            if(ID_BASED){
                url="<?php echo base_url('user/friendList?start=') ?>"+friendStart+"&limit="+friendLimit+"&userId="+userId;
            }
            let settings={
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                },
                "dataType" : 'json'
            };
            $.ajax(settings).done(function (response) {

                let data=response.response.friends;
                totalFriend=response.response.total;
                callback(data);
            });
        }

        //This function is used to clear the current chat box for retrieving new message for the new group
        function clearChatBox() {
            chatBox.html('');
        }

        //This function is used to create the preview for a link sheared in message
        function getLinkPreview(linkData,link){
            let defaultImage="<?php echo base_url('/assets/img/compact_camera1600.png') ?>";
            if(linkData.playerOrImageUrl.type==='player'){
                return "<div class='i-wrapper'><iframe src='"+linkData.playerOrImageUrl.url+"' class='medea-frame iframe-wrapper' allowfullscreen></iframe></div>";
            }
            else if(linkData.playerOrImageUrl.type==='file'){
                let image = "<img src='" + linkData.playerOrImageUrl.url + "' id='tImg' width='100%' onerror='this.onError=null;this.src="+"\""+String(defaultImage)+"\""+"' >";
                return "<div class='linkPreview-wrapper'>" +
                    "<a href='" + link + "' target=\"_blank\">" +
                    "<div id='texts'>" +
                    "<div id='thumbnail' >" + image +
                    "</div> " +
                    "<div id='desc'>" +
                    "<div id='title'>" +
                    "<div class='clamp-title'>" + linkData.host +
                    "</div>" +
                    "</div>" +
                    "<div class='clamp-desc'>" +
                    "</div> " +
                    "<div id='meta'>" +
                    "<div id='domain'>" + linkData.host +
                    "</div>" +
                    "<div class='clear'></div>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</div>";
            }
            else {
                let image = "<img src='<?php echo base_url("/assets/img/compact_camera1600.png") ?>' id='tImg_blank' width='100%'>";
                if(linkData.playerOrImageUrl.url!=null){
                     image = "<img src='" + linkData.playerOrImageUrl.url + "' id='tImg' width='100%' onerror='this.onError=null;this.src="+"\""+String(defaultImage)+"\""+"' >";
                    return "<div class='linkPreview-wrapper'>" +
                        "<a href='" + link + "' target=\"_blank\">" +
                        "<div id='texts'>" +
                        "<div id='thumbnail' >" + image +
                        "</div> " +
                        "<div id='desc'>" +
                        "<div id='title'>" +
                        "<div class='clamp-title'>" + linkData.title +
                        "</div>" +
                        "</div>" +
                        "<div class='clamp-desc'>" + linkData.description +
                        "</div> " +
                        "<div id='meta'>" +
                        "<div id='domain'>" + linkData.host +
                        "</div>" +
                        "<div class='clear'></div>" +
                        "</div>" +
                        "</div>" +
                        "</div>" +
                        "</a>" +
                        "</div>";
                }
                return "<div class='linkPreview-wrapper'>" +
                    "<a href='" + link + "' target=\"_blank\">" +
                    "<div id='texts'>" +
                    "<div id='thumbnail' >" + image +
                    "</div> " +
                    "<div id='desc'>" +
                    "<div id='title'>" +
                    "<div class='clamp-title'>" + linkData.title +
                    "</div>" +
                    "</div> " +
                    "<div class='clamp-desc'>" + linkData.description +
                    "</div> " +
                    "<div id='meta'>" +
                    "<div id='domain'>" + linkData.host +
                    "</div>" +
                    "<div class='clear'></div>" +
                    "</div>" +
                    "</div>" +
                    "</div>" +
                    "</a>" +
                    "</div>";
            }
        }

        //This function is used to format the links and add the emojis send by user
        function parseMessage(message,onlyemoji) {
            if(onlyemoji){
                return  twemoji.parse(
                    anchorme(message,{
                        //truncate:[15,10],
                        attributes:[
                            function(urlObj){
                                if(urlObj.protocol !== "mailto:")
                                    return {name:"target",value:"blank"};
                            }
                        ]
                    }),{className:"emoji2x"}
                );
            }
            return  twemoji.parse(
                anchorme(message,{
                    //truncate:[15,10],
                    attributes:[
                        function(urlObj){
                            if(urlObj.protocol !== "mailto:")
                                return {name:"target",value:"blank"};
                        }
                    ]
                })
            );
        }

        //This function is used to retrieve messages from server based on group id
        function getMessage(groupId) {
//debugger;
            if(start==1){
                start=0;
            }
            let url="<?php echo base_url('imApi/getMessage?groupId=') ?>"+groupId+"&limit="+limit+"&start="+start;
            if(ID_BASED){
                url="<?php echo base_url('imApi/getMessage?groupId=') ?>"+groupId+"&limit="+limit+"&start="+start+"&userId="+userId;
            }
            let settings={
                "async": true,
                "crossDomain": true,
                "url": url,
                "method": "GET",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                },
                "processData": false,
                "contentType": false,
                "beforeSend":function () {
                    messageLoading=true;
                    chatBox.html('<img id="loadingMessage" src="<?php echo base_url('assets/img/loadingMessage.gif')?>" class="img-responsive blankImg" style="">');
                    chatBox.addClass("text-center");
                    chatBox.addClass("vertical-alignment");
                },
                "success":function () {
                   messageLoading=false;
                    $("#loadingMessage").remove();
                    chatBox.removeClass("text-center");
                    chatBox.removeClass("vertical-alignment");
                }

            };
            $.ajax(settings).done(function (result) {

                let data=result.response;
                let html="";
                totalRetivedMessage+=data.length;

                if(data.length===0){
                    chatBox.html('<img id="blankImg" src="<?php echo base_url('assets/img/nomess.png')?>" class="img-responsive blankImg">');
                    chatBox.addClass("text-center");
                    chatBox.addClass("vertical-alignment");

                }else{
                    chatBox.removeClass("text-center");
                    chatBox.removeClass("vertical-alignment");
                    lastMessageDate=moment(data[data.length-1].message.ios_date_time);
                    LastMessageId=parseInt(data[data.length-1].message.m_id);
                    let currentDate=moment(moment().toISOString());

                    topMessage=data[0].message.m_id;
                    let today=false;
                    for(let i=0;i<data.length;i++) {

                        let sender = data[i].sender;
                        let message = data[i].message;

                        let senderId = data[i].sender.userId;
                        let messageDate = moment(data[i].message.ios_date_time);
                        let seen=data[i].seen;
                        if(moment(moment().toISOString()).diff(messageDate, 'days')===0 && !today){
                            html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                            html += moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions2);
                            html += "                <\/div>";
                            currentDate = messageDate;
                            today=true;
                        }
                       else if (currentDate.diff(messageDate, 'days') !==0 && (currentDate.diff(messageDate, 'days') >= 1 || currentDate.diff(messageDate, 'days') <= -1)) {
                            html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                            html += moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions2);
                            html += "                <\/div>";
                            currentDate = messageDate;
                        }
                        else if ( moment(moment().toISOString()).diff(messageDate, 'days')===0 && (currentDate.diff(messageDate, 'minutes') <= -30 || currentDate.diff(messageDate, 'minutes') >= 30)) {
                            html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                            html += moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions2);
                            html += "                <\/div>";
                            currentDate = messageDate;
                        }
                        if (message.type === "update") {
                            html += "<div id='message_" + message.m_id + "' class=\"fw-im-message  text-center fw-im-othersender update-message-font\"  data-og-container=\"\">";
                            html += "<i  class='oli oli-newspaper'></i> "+ message.message;
                            html += "                <\/div>";
                        }

                        else {
                            if (parseInt(senderId) === parseInt(userId)) {

                                html += "<div class=\"fw-im-message  fw-im-isme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                                if (message.type === "text") {
                                    if(message.onlyemoji){
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message,true) + "<\/div>";
                                    }else{
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message,false) + "<\/div>";
                                    }
                                    if (message.linkData !== null) {
                                        html += getLinkPreview(JSON.parse(message.linkData), message.link);
                                    }
                                }
                                if (message.type === "image") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                                    html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                                    html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                                    html += "                            <\/div>";
                                }
                                if (message.type === "video") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                    html += "                        <video class='mediaVideo' id='video_" + message.m_id + "' poster='"+message.poster+"'  width=\"250px\" class=' ' height=\"150px\" controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "audio") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                                    html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%' controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "document") {
                                   // html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                    html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href="+message.message +" ><i class=\"fa fa-arrow-circle-down\"></i> "+message.fileName+"<\/a></div>";
                                    //html += "                    <\/div>";
                                }
                                html += "                    <div class=\"fw-im-message-author\"  title=\"" + sender.firstName + " " + sender.lastName + "\">";
                                html += "                        <img src=\"" + sender.profilePictureUrl + "\" >";
                                html += "                    <\/div>";
                                if(seen===null){
                                    html += "                    <div class=\"fw-im-message-time seen hidden  seenId_"+ message.m_id+"\">";
                                    html += "                        <span class='seenMessage_"+ message.m_id+"'>"+seen+"<\/span>";
                                    html += "                    <\/div>";
                                }
                                else{
                                    if(seen.time!==null){
                                        html += "                    <div class=\"fw-im-message-time seen  seenId_"+ message.m_id+"\">";
                                        html += "                        <span class='seenMessage_"+ message.m_id+"'>"+seen.seen+moment(seen.time, moment.ISO_8601).calendar(null, momentOptions2)+"<\/span>";
                                        html += "                    <\/div>";
                                    }else{
                                        html += "                    <div class=\"fw-im-message-time seen  seenId_"+ message.m_id+"\">";
                                        html += "                        <span class='seenMessage_"+ message.m_id+"'>"+seen.seen+"<\/span>";
                                        html += "                    <\/div>";
                                    }

                                }

                                html += "                <\/div>";
                            }
                            else {
                                html += "                <div class=\"fw-im-message  fw-im-isnotme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                                if (message.type === "text") {
                                    if(message.onlyemoji){
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message,true) + "<\/div>";
                                    }else{
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message,false) + "<\/div>";
                                    }
                                    if (message.linkData !== null) {

                                        html += getLinkPreview(JSON.parse(message.linkData), message.link);
                                    }
                                }
                                if (message.type === "image") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                                    html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                                    html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                                    html += "                            <\/div>";
                                }
                                if (message.type === "video") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\">";
                                    html += "                        <video class='mediaVideo' id='video_" + message.m_id + "' poster='"+message.poster+"' class=' ' width=\"250px\" height=\"150px\" controls=\"true\" preload='none'  name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "audio") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                                    html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%' controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "document") {
                                   // html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                    html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href="+message.message +"   ><i class=\"fa fa-arrow-circle-down\"></i> "+message.fileName+"<\/a></div>";
                                    //html += "                    <\/div>";
                                }
                                html += "                    <div class=\"fw-im-message-author\"  title=\"" + sender.firstName + " " + sender.lastName + "\">";
                                if (sender.active === 1) {
                                    html += "                        <img class='auth_" + senderId + " authStatus memberActive'  src=\"" + sender.profilePictureUrl + "\" >";
                                } else {
                                    html += "                        <img class='auth_" + senderId + " authStatus' src=\"" + sender.profilePictureUrl + "\" >";
                                }
                                html += "                    <\/div>";
                                /* html += "                    <div class=\"fw-im-message-time\">";
                                 html += "                        <span style=\"cursor:help\" title=\""+moment(message.ios_date_time,moment.ISO_8601).format('LLLL')+"\">"+moment(message.ios_date_time,moment.ISO_8601).calendar(null,momentOptions)+"<\/span>";
                                 html += "                    <\/div>";*/
                                html += "                <\/div>";
                            }


                        }
                    }

                    firstmessageDate=currentDate;
                    chatBox.html("");
                    chatBox.append(html);
                    chatBox.scrollTop(0);

                    for(i=0;i<data.length;i++){
                        let allMessage=data[i].message;
                        if(allMessage.type=="video"){
                           /* videoObjects.push(videojs("video_"+allMessage.m_id, {}, function(){
                                    // Player (this) is initialized and ready.
                                })
                            );*/
                            initVideo("video_"+allMessage.m_id);
                        }else if(allMessage.type=="audio"){
                            initAudio("audio_"+allMessage.m_id);
                        }
                    }

                    let height=chatBox[0].scrollHeight;
                    //scrollPosition=height;
                    //chatBox.scrollTop( chatBox.prop( "scrollHeight" ) );
                    chatBox.scrollTop(height);

                    //$('#notice_'+groupId).addClass("hidden");
                    lightBox.init();
                    chatBox.perfectScrollbar({suppressScrollX:true});
                    clampData();


                }


            });

        }

        //This function is used to send message to the server
        function sendMessage(form,sendFile,newmessage) {
            let settings=null;
            if(ID_BASED) {
                form.append("userId", userId);
            }
            let url="<?php echo base_url('imApi/sendMessage') ?>";
            if(sendFile){
                let progress1 = new LoadingOverlayProgress();
                settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": url,
                    "method": "POST",
                    "headers": {
                        "authorization": "Basic YWRtaW46MTIzNA==",
                        "authorizationkeyfortoken": String(responce),
                        "cache-control": "no-cache",
                        "postman-token": "58e7510b-ad46-6037-fc4d-028915069e2b"
                    },
                    "xhr": function() {

                        let xhr = new window.XMLHttpRequest();

                        xhr.upload.addEventListener("progress", function(evt) {
                            if(sendFile) {
                                let percentComplete = evt.loaded / evt.total;
                                percentComplete = parseInt(percentComplete * 100);

                                if (percentComplete >= 100) {
                                    //clearInterval(iid1);
                                    delete progress1;
                                    $("body").LoadingOverlay("hide");
                                    return;
                                }
                                progress1.Update(percentComplete);
                            }
                        }, false);

                        return xhr;
                    },
                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form,
                    "error":function (e) {
                        let err=JSON.parse(e.responseText);
                        toastr.error(err.response);
                    },
                    "beforeSend":function () {
                        $('.close').trigger("click");
                        if(sendFile){
                            $("body").LoadingOverlay("show", {
                                custom  : progress1.Init()
                            });
                        }

                    },
                    "complete":function () {
                        delete progress1;
                        $("body").LoadingOverlay("hide");
                    }
                };
            }else{
                typingTimeoutFunction();
                settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": url,
                    "method": "POST",
                    "headers": {
                        "authorization": "Basic YWRtaW46MTIzNA==",
                        "authorizationkeyfortoken": String(responce),
                        "cache-control": "no-cache",
                        "postman-token": "58e7510b-ad46-6037-fc4d-028915069e2b"
                    },
                    "processData": false,
                    "contentType": false,
                    "mimeType": "multipart/form-data",
                    "data": form,
                    "error":function (e) {
                        let err=JSON.parse(e.responseText);
                        toastr.error(err.response);
                    },
                    "beforeSend":function () {
                        $('.close').trigger("click");

                    },
                    "complete":function () {

                    }
                };
            }

            $.ajax(settings).done(function (res) {
                    let json=JSON.parse(res);
                    let group=json.response;

                resetNewMessage();
                if(newmessage){

                            $("#group_"+group.groupId).remove();
                            $('.person').removeClass('active');
                            addNewGroup(group);
                            $('#groups li').first().trigger("click",[{update:true}]);

                }

            });
        }

        // unused function. have a plan used in the future
        function captureImage(file) {
            let canvas = document.createElement("canvas");
            canvas.width = 40;
            canvas.height = 40;

            canvas.strokeStyle = 'black';
            canvas.lineWidth = 1;
            canvas.getContext('2d').strokeRect(0, 0, canvas.width, canvas.height);
            canvas.getContext('2d').drawImage(file, 0, 0, canvas.width-1, canvas.height-1);

            let img = document.getElementById("fileIV");
            img.src = canvas.toDataURL("image/png");
            //$output.prepend(img);
        };
        function captureImagenewMessage(file) {
            let canvas = document.createElement("canvas");
            canvas.width = 40;
            canvas.height = 40;

            canvas.strokeStyle = 'black';
            canvas.lineWidth = 1;
            canvas.getContext('2d').strokeRect(0, 0, canvas.width, canvas.height);
            canvas.getContext('2d').drawImage(file, 0, 0, canvas.width-1, canvas.height-1);

            let img = document.getElementById("newMessagefileIV");
            img.src = canvas.toDataURL("image/png");
            //$output.prepend(img);
        };




        //update the message time on the left side
        function updateTime() {
            for (i=0;i<groupIds.length;i++){
                let date=moment(time[groupIds[i]],moment.ISO_8601).fromNow();
                $('#time_'+groupIds[i]).html(date);
            }

        }

// -----------------End of Global functions --------------------------//

        $('#groups').perfectScrollbar({suppressScrollX:true});
        //$('#groupMembers').perfectScrollbar({suppressScrollX:true});
        $('#rightSection').perfectScrollbar({suppressScrollX:true});
        chatBox.perfectScrollbar({suppressScrollX:true});




        $(addmember).on('expand', function(c){
           addexpendDropdown=$('.ms-res-ctn.dropdown-menu').perfectScrollbar({suppressScrollX:true});
            initaddexpendDropdown();
        });

        $(addmember).on('collapse', function(c){
            addexpendDropdown.perfectScrollbar("destroy");
        });

        $(newMemberInput).on('expand', function(c){
            addMemberexpendDropdown=$('.ms-res-ctn.dropdown-menu').perfectScrollbar({suppressScrollX:true});
            initaddMemberexpendDropdown();
        });

        $(newMemberInput).on('collapse', function(c){
            addMemberexpendDropdown.perfectScrollbar("destroy");
        });


        $(newMemberInput).on('keyup', function(e, m, v){
            let value=this.getRawValue().replace(/<script[^>]*>/gi, "&lt;script&gt;").replace(/<\/script[^>]*>/gi, "&lt;/script&gt;").replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi," ").replace(/&nbsp;/gi," ").trim();
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('user/filterFriendList?key=') ?>" + value,
                "method": "GET",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                },
                "dataType": 'json'
            };
            $.ajax(settings).done(function (response) {
                request=true;
                let res = response.response;
                let oldData=[];
                for (let i = 0; i < res.length; i++) {
                    if (res[i].userStatus !== 0) {
                        let md = {
                            id: parseInt(res[i].userId),
                            name: res[i].firstName + " " + res[i].lastName,
                            picture: res[i].profilePictureUrl,
                            email: res[i].userEmail
                        };
                        oldData.push(md);
                        //expendDropdown.append(getMagicData(md));
                    }
                }
                //addmember.setData(oldData);
                newMemberInput.setData(oldData);
            });

        });

        $(addmember).on('keyup', function(e, m, v){
            let value=this.getRawValue().replace(/<script[^>]*>/gi, "&lt;script&gt;").replace(/<\/script[^>]*>/gi, "&lt;/script&gt;").replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi," ").replace(/&nbsp;/gi," ").trim();
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('user/filterFriendList?key=') ?>" + value,
                "method": "GET",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                },
                "dataType": 'json'
            };
            $.ajax(settings).done(function (response) {
                request=true;
                let res = response.response;
                let oldData=[];
                for (let i = 0; i < res.length; i++) {
                    if (res[i].userStatus !== 0) {
                        let md = {
                            id: parseInt(res[i].userId),
                            name: res[i].firstName + " " + res[i].lastName,
                            picture: res[i].profilePictureUrl,
                            email: res[i].userEmail
                        };
                        oldData.push(md);
                        //expendDropdown.append(getMagicData(md));
                    }
                }
                addmember.setData(oldData);
                //newMemberInput.setData(oldData);
            });

        });

        function initaddexpendDropdown() {


            let request = true;
            addexpendDropdown.on("ps-y-reach-end", function () {
                increaseFriendsLimit();
                if (request && friendStart <totalFriend) {
                    request = false;

                    let settings = {
                        "async": true,
                        "crossDomain": true,
                        "url": "<?php echo base_url('user/friendList?start=') ?>" + friendStart + "&limit=" + friendLimit,
                        "method": "GET",
                        "headers": {
                            "authorization": "Basic YWRtaW46MTIzNA==",
                            "authorizationkeyfortoken": String(responce),
                            "cache-control": "no-cache",
                            "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                        },
                        "dataType": 'json'
                    };
                    $.ajax(settings).done(function (response) {
                        request=true;
                        let res = response.response.friends;
                        let oldData=addmember.getData();
                        for (let i = 0; i < res.length; i++) {
                            if (res[i].userStatus !== 0) {
                                let md = {
                                    id: parseInt(res[i].userId),
                                    name: res[i].firstName + " " + res[i].lastName,
                                    picture: res[i].profilePictureUrl,
                                    email: res[i].userEmail
                                };
                                oldData.push(md);
                                //expendDropdown.append(getMagicData(md));
                            }
                        }
                        addmember.setData(oldData);
                        //newMemberInput.setData(oldData);
                    });
                }
            });
        }

        function initaddMemberexpendDropdown()  {


            let request = true;
            addMemberexpendDropdown.on("ps-y-reach-end", function () {
                increaseFriendsLimit();
                if (request && friendStart <totalFriend) {
                    request = false;

                    let settings = {
                        "async": true,
                        "crossDomain": true,
                        "url": "<?php echo base_url('user/friendList?start=') ?>" + friendStart + "&limit=" + friendLimit,
                        "method": "GET",
                        "headers": {
                            "authorization": "Basic YWRtaW46MTIzNA==",
                            "authorizationkeyfortoken": String(responce),
                            "cache-control": "no-cache",
                            "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                        },
                        "dataType": 'json'
                    };
                    $.ajax(settings).done(function (response) {
                        request=true;
                        let res = response.response.friends;
                        let oldData=newMemberInput.getData();
                        for (let i = 0; i < res.length; i++) {
                            if (res[i].userStatus !== 0) {
                                let md = {
                                    id: parseInt(res[i].userId),
                                    name: res[i].firstName + " " + res[i].lastName,
                                    picture: res[i].profilePictureUrl,
                                    email: res[i].userEmail
                                };
                                oldData.push(md);
                                //expendDropdown.append(getMagicData(md));
                            }
                        }
                       // addmember.setData(oldData);
                        newMemberInput.setData(oldData);
                    });
                }
            });
        }

        let requested=true;
        groupBox.on("ps-y-reach-end",function () {
            increaseGroupLimit();
            if(requested && groupStart<totalGroup){
                requested=false;

                let url="<?php echo base_url('imApi/getGroups?limit=') ?>"+groupLimit+"&start="+groupStart;
                let settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": url,
                    "method": "GET",
                    "headers": {
                        "authorization": "Basic YWRtaW46MTIzNA==",
                        "authorizationkeyfortoken": String(responce),
                        "cache-control": "no-cache",
                        "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                    },
                    "processData": false,
                    "contentType": false,
                    "beforeSend":function () {
                        groupBox.append("<div class='text-center groupLoader'><div class='loader'></div></div>");
                    },
                    "complete":function () {
                        $('.groupLoader').remove();

                    }
                };
                $.ajax(settings).done(function (response) {

                    let groups=response.response;
                    printGroupListAppend(groups);
                    requested=true;

                });



            }


        });


        chatBox.on("ps-scroll-up",function() {
            if (notRequested && chatBox.scrollTop()===0) {
                notRequested=false;
                increaseStart();

                let url="<?php echo base_url('imApi/getMessage?groupId=') ?>" + activeGroupId + "&limit="+limit+"&start=" + start+"&userId="+userId;


                let settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": url,
                    "method": "GET",
                    "headers": {
                        "authorization": "Basic YWRtaW46MTIzNA==",
                        "authorizationkeyfortoken": String(responce),
                        "cache-control": "no-cache",
                        "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                    },
                    "processData": false,
                    "contentType": false,
                    "beforeSend":function () {
                        chatBox.prepend("<div class='loader'></div>");
                    },
                    "complete":function () {
                        $('.loader').remove();

                    }
                };
                $.ajax(settings).done(function (result) {
                    $('.loader').remove();
                    notRequested=true;
                    let data = result.response;
                    if(data.length===0){
                        notRequested=false;
                        return;
                    }
                    if(totalRetivedMessage===result.totalMessage){
                        resetStart();
                        return;
                    }
                    let html = "";
                    let currentDate=firstmessageDate;
                    let currentTopMessage=topMessage;
                    topMessage=data[0].message.m_id;
                    for (let i = 0; i < data.length; i++) {
                        let self = data[i].self;
                        let sender = data[i].sender;
                        let message = data[i].message;

                        let senderId = data[i].sender.userId;
                        let messageDate = moment(data[i].message.ios_date_time, moment.ISO_8601);


                        if (currentDate.date() - messageDate.date() >= 1 || currentDate.date() - messageDate.date() <= -1) {
                            if (currentDate !== messageDate) {
                                html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                                html += moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions2);
                                html += "                <\/div>";
                                currentDate = messageDate;
                            }
                        }
                        if (message.type === "update") {
                            html += "<div id='message_" + message.m_id + "' class=\"fw-im-message  text-center fw-im-othersender update-message-font\"  data-og-container=\"\">";
                            html += "<i   class='oli oli-newspaper'></i> "+ message.message;
                            html += "                <\/div>";
                        }

                        else {
                            if (parseInt(senderId) === parseInt(userId)) {
                                html += "<div  class=\"fw-im-message  fw-im-isme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                                if (message.type === "text") {
                                    if(message.onlyemoji){
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message,true) + "<\/div>";
                                    }else{
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message,false) + "<\/div>";
                                    }
                                    if (message.linkData != null) {
                                        html += getLinkPreview(JSON.parse(message.linkData), message.link);
                                    }
                                }
                                if (message.type === "image") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                                    html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                                    html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                                    html += "                            <\/div>";
                                }
                                if (message.type === "video") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                    html += "                        <video class='mediaVideo' id='video_" + message.m_id + "' poster='"+message.poster+"' class=' '  width=\"250px\" height=\"150px\" controls=\"true\" preload='none'  name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "audio") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                                    html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%'  controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "document") {
                                    //html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                    html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href="+message.message +"  ><i class=\"fa fa-arrow-circle-down\"></i> "+message.fileName+"<\/a></div>";
                                    //html += "                    <\/div>";
                                }
                                html += "                    <div class=\"fw-im-message-author\"   title=\"" + sender.firstName + " " + sender.lastName + "\">";
                                html += "                        <img src=\"" + sender.profilePictureUrl + "\" >";
                                html += "                    <\/div>";
                                /*html += "                    <div class=\"fw-im-message-time\">";
                                html += "                        <span style=\"cursor:help\" title=\"" + moment(message.ios_date_time,moment.ISO_8601).format('LLLL') + "\">" + moment(message.ios_date_time,moment.ISO_8601).calendar(null,momentOptions) + "<\/span>";
                                html += "                    <\/div>";*/
                                html += "                <\/div>";
                            }
                            else {
                                html += "                <div class=\"fw-im-message  fw-im-isnotme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                                if (message.type === "text") {
                                    if(message.onlyemoji){
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message,true) + "<\/div>";
                                    }else{
                                            html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message,false) + "<\/div>";
                                    }
                                    if (message.linkData !== null) {
                                        html += getLinkPreview(JSON.parse(message.linkData), message.link);
                                    }
                                }
                                if (message.type === "image") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                                    html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                                    html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                                    html += "                            <\/div>";
                                }
                                if (message.type === "video") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\">";
                                    html += "                        <video class='mediaVideo' id='video_" + message.m_id + "' poster='"+message.poster+"' class=' '  width=\"250px\" height=\"150px\" controls=\"true\"  preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "audio") {
                                    html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                                    html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%'  controls=\"true\" preload='none'  name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                                    html += "                    <\/div>";
                                }
                                if (message.type === "document") {
                                    //html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                    html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href="+message.message +" ><i class=\"fa fa-arrow-circle-down\"></i> "+message.fileName+"<\/a></div>";
                                    //html += "                    <\/div>";
                                }
                                html += "                    <div class=\"fw-im-message-author\"  title=\"" + sender.firstName + " " + sender.lastName + "\">";
                                if (sender.active === 1) {
                                    html += "                        <img class='auth_" + senderId + " authStatus memberActive'  src=\"" + sender.profilePictureUrl + "\" >";
                                } else {
                                    html += "                        <img class='auth_" + senderId + " authStatus' src=\"" + sender.profilePictureUrl + "\" >";
                                }
                                html += "                    <\/div>";
                                /* html += "                    <div class=\"fw-im-message-time\">";
                                 html += "                        <span style=\"cursor:help\" title=\"" + moment(message.ios_date_time,moment.ISO_8601).format('LLLL') + "\">" + moment(message.ios_date_time,moment.ISO_8601).calendar(null,momentOptions) + "<\/span>";
                                 html += "                    <\/div>";*/
                                html += "                <\/div>";
                            }
                        }
                    }


                    totalRetivedMessage+=data.length;

                    chatBox.prepend(html);
                    for(i=0;i<data.length;i++){
                        let allMessage=data[i].message;
                        if(allMessage.type=="video"){
                           /* videoObjects.push(videojs("video_"+allMessage.m_id, {}, function(){
                                    // Player (this) is initialized and ready.
                                })
                            );*/
                            initVideo("video_"+allMessage.m_id);
                        }else if(allMessage.type=="audio"){
                            initAudio("audio_"+allMessage.m_id);
                        }
                    }
                    /*if(data.length>0){
                     let m_id=data[data.length-1].message.m_id;
                     chatBox.animate({scrollTop:$("#message_"+m_id).offset().top},3);
                     }*/
                    // let height=chatBox[0].scrollHeight;
                    let elmnt = document.getElementById("message_"+currentTopMessage);

                    if(data.length!==0){
                        if(!elmnt){
                            chatBox.scrollTop(scrollPosition);
                        }
                        else{
                            elmnt.scrollIntoView();
                        }

                    }

                    lightBox.init();
                    $('.loader').hide();
                    clampData();
                    window.scrollTo(0,0);

                });
            }
        });
        //$(".rightSection").perfectScrollbar();

        $('#newMessageText').twemojiPicker({
            init: "Your message.....",
            size: '30px',
            icon: 'grinning',
            iconSize: '25px',
            height: '90px',
            width: '100%',
            border:'0',
            category: ['smile', 'cherry-blossom', 'video-game', 'oncoming-automobile', 'symbols'],
            categorySize: '20px',
            pickerPosition: 'bottom',
            pickerHeight: '150px',
            pickerWidth: '100%'
        });

        let sendMessageSettings= {
            init: "Your message.....",
            size: '30px',
            icon: 'grinning',
            iconSize: '25px',
            height: '50px',
            width: '100%',
            border:'0',
            category: ['smile', 'cherry-blossom', 'video-game', 'oncoming-automobile', 'symbols'],
            categorySize: '20px',
            pickerPosition: 'top',
            pickerHeight: '150px',
            pickerWidth: '100%'
        };



        if(responce!=null && responce!='' && type==1)
        {

            getGroupList(function (data) {
                if(data){
                    /*let token={
                        _r:String(responce)
                    };
					
                    socket.emit("messageNotification",JSON.stringify(token));*/
                    
					$("#groups li[id*='group_"+gid+"']").trigger("click",[{update:true}]);

                }
            });
        }

        else {
            location.href="<?php echo base_url("userview/logout")  ?>";
        }


        $('#message').twemojiPicker(sendMessageSettings);

        $(".twemoji-list").perfectScrollbar({suppressScrollX:true});

        $('#groups').on("click",".person",function (e,update) {

            if(mejs){
                delete mejs.players;
                mejs.players=[];
            }
            if($(".groupInfoContent").hasClass("hidden")){
                $(".groupInfoContent").removeClass("hidden");
            }
            if($(this).hasClass("person-hover")){
                $(this).removeClass('person-hover');
            }
            let oldGroupId=activeGroupId;
            if($("#group_"+oldGroupId).hasClass("font-bold-black")){
                $("#group_"+oldGroupId).removeClass("font-bold-black");
            }
            if(oldGroupId!==null|| oldGroupId!==""){
                socket.emit("leaveRoom",oldGroupId);
            }
            let groupId =parseInt( $(this).attr('data-group'));
            activeGroupId=groupId;
            notRequested=true;
            $('#chatBox').perfectScrollbar('destroy');
            $("#rightSection").scrollTop(0);
            for(i=0;i<videoObjects.length;i++){
                videoObjects[i].dispose();
            }
            videoObjects=[];
            resetStart();
            resetRetiveMessage();
            if ($(this).hasClass('active')) {
                return false;
            }

             groupType=parseInt(groupObjects[groupId].groupType);
             mute=parseInt(groupObjects[groupId].mute);
             block=parseInt(groupObjects[groupId].block);
            meBlocker=parseInt(groupObjects[groupId].meBlocker);
             if(groupType){
                 if($("#blockOptions").hasClass("hidden")){
                     $("#blockOptions").removeClass("hidden");
                 }
             }else{
                 if(!$("#blockOptions").hasClass("hidden")){
                     $("#blockOptions").addClass("hidden");
                 }
             }
                if(block){
                    $("#messageForm").hide();
                    if($("#blockmessage").hasClass("hidden")) {
                        $("#blockmessage").removeClass("hidden");
                    }
                    if(meBlocker) {
                        if ($("#unblock").hasClass("hidden")) {
                            $("#unblock").removeClass("hidden");
                        }
                        if (!$("#block").hasClass("hidden")) {
                            $("#block").addClass("hidden");
                        }
                    }else{
                        if (!$("#unblock").hasClass("hidden")) {
                            $("#unblock").addClass("hidden");
                        }
                        if ($("#block").hasClass("hidden")) {
                            $("#block").removeClass("hidden");
                        }
                    }

                }else{
                    if(!$("#blockmessage").hasClass("hidden")) {
                        $("#blockmessage").addClass("hidden");
                    }
                    $("#messageForm").show();
                    if(!meBlocker) {
                        if (!$("#unblock").hasClass("hidden")) {
                            $("#unblock").addClass("hidden");
                        }
                        if ($("#block").hasClass("hidden")) {
                            $("#block").removeClass("hidden");
                        }
                    }else{
                        if ($("#unblock").hasClass("hidden")) {
                            $("#unblock").removeClass("hidden");
                        }
                        if (!$("#block").hasClass("hidden")) {
                            $("#block").addClass("hidden");
                        }
                    }

                }
                if(mute){
                    if($("#unmute").hasClass("hidden")){
                        $("#unmute").removeClass("hidden");
                    }
                    if(!$("#mute").hasClass("hidden")){
                        $("#mute").addClass("hidden");
                    }
                }else{
                    if(!$("#unmute").hasClass("hidden")){
                        $("#unmute").addClass("hidden");
                    }
                    if($("#mute").hasClass("hidden")){
                        $("#mute").removeClass("hidden");
                    }
                }
            if(groupType==1){
                if (!$('#addMember').hasClass('hidden')) {
                    $('#addMember').addClass('hidden');
                }
                if(!$("#editGroupName").hasClass('hidden')){
                    $("#editGroupName").addClass('hidden');
                }
                if(!$("#leaveGroup").hasClass('hidden')){
                    $("#leaveGroup").addClass('hidden');
                }
            }else{
                if ($('#addMember').hasClass('hidden')) {
                    $('#addMember').removeClass('hidden');
                }
                if($("#editGroupName").hasClass('hidden')){
                    $("#editGroupName").removeClass('hidden');
                }
                if($("#leaveGroup").hasClass('hidden')){
                    $("#leaveGroup").removeClass('hidden');
                }
            }


            let personName = groupObjects[groupId].groupName;
            if($("#group_"+groupId).hasClass("font-bold-black")){
                $("#group_"+groupId).removeClass("font-bold-black");
            }

            $('.UserNames').html(personName);
            $('.person').removeClass('active');
            $(this).addClass('active');

            $('#addMember').attr('data-group',groupId);
            $('#editGroupName').attr('data-group',groupId);
            let updateList=true;
            if(typeof update!=='undefined' ){
                updateList=update.update;
            }
            if(updateList){
                getGroupMembers(groupId);
            }


            clearChatBox();
            getMessage(groupId,start,limit);

            reset();


            printGroupInfo(groupId,groupImages,personName);

            socket.emit("joinRoom",groupId);

        });



        $('#groupMembers').on("click",".btnMemberDelete",function (e) {
            let groupId = activeGroupId;
            let memberId=$(this).attr('data-member');
            let form=new FormData();
            form.append("groupId",groupId);
            form.append("memberId",memberId);
            form.append("userId",userId);
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('imApi/deleteMember') ?>",
                "method": "POST",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                },
                "processData": false,
                "contentType": false,
                "data":form
            };

            $.ajax(settings).done(function (res) {
                //let data=JSON.parse(response)

                printGroupMembers(res.response.memberList,res.response.meCreator,groupId);
                groupImages[groupId]=res.response.groupInfo.groupImage;

                let html="";
                for (let j=0;j<res.response.groupInfo.groupImage.length;j++){

                    html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+res.response.groupInfo.groupImage[j]+"\" >";
                }
                $("#groupImage_"+groupId).html(html);
                $("#groupName_"+groupId).html("<div>"+res.response.groupInfo.groupName+"</div>");
                $(".UserNames").html(res.response.groupInfo.groupName);
                printGroupInfo(groupId,groupImages,res.response.groupInfo.groupName);
                toastr.info("Member deleted");
                // getGroupMembers(groupId);

            });

        });



        $('#addMember').on("click",function (e) {

            getMembers(function (res) {
                let q=[];
                for(i=0;i<res.length;i++) {
                    if(res[i].userStatus!=0) {
                        let md = {
                            id: parseInt(res[i].userId),
                            name: res[i].firstName + " " + res[i].lastName,
                            picture: res[i].profilePictureUrl,
                            email: res[i].userEmail
                        };
                        q.push(md);
                    }
                }

                newMemberInput.setData(q);
                newMemberInput.clear();

                $('#addNewMemberModal').modal('show');
            });
        });

        $("#newMemberAddBtn").on("click",function (e) {
            let userIds=newMemberInput.getValue();
            let groupId= activeGroupId;

            if(userIds.length>0) {
                let form = new FormData();
                for (i = 0; i < userIds.length; i++) {
                    form.append("memberId[]", userIds[i]);
                }
                form.append("groupId", groupId);
                form.append("userId",userId);
                let settings = {
                    "async": true,
                    "crossDomain": true,
                    "url": "<?php echo base_url('imApi/addGroupMember/') ?>",
                    "method": "POST",
                    "headers": {
                        "authorization": "Basic YWRtaW46MTIzNA==",
                        "authorizationkeyfortoken": String(responce),
                        "cache-control": "no-cache",
                        "postman-token": "eb27c011-391a-0b70-37c5-609bcd1d7b6d"
                    },
                    "processData": false,
                    "contentType": false,
                    "data": form
                };
                $.ajax(settings).done(function (res) {

                    printGroupMembers(res.response.memberList, res.response.meCreator, groupId);
                    groupImages[groupId]=res.response.groupInfo.groupImage;

                    let html="";
                    for (let j=0;j<res.response.groupInfo.groupImage.length;j++){

                        html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+res.response.groupInfo.groupImage[j]+"\" >";
                    }
                    $("#groupImage_"+groupId).html(html);
                    $("#groupName_"+groupId).html("<div>"+res.response.groupInfo.groupName+"</div>");
                    $(".UserNames").html(res.response.groupInfo.groupName);
                    printGroupInfo(groupId,groupImages,res.response.groupInfo.groupName);
                    newMemberInput.clear();
                    toastr.info("member add successful");
                    $('#addNewMemberModal').modal('hide');
                    // getGroupMembers(groupId);

                });

            }
        });


        $('#newMessage').on("click",function (e) {

            resetNewMessage ();
            getMembers(function (res) {
                let q=[];
                for(i=0;i<res.length;i++) {
                    if(res[i].userStatus!=0) {
                        let md = {
                            id: parseInt(res[i].userId),
                            name: res[i].firstName + " " + res[i].lastName,
                            picture: res[i].profilePictureUrl,
                            email: res[i].userEmail
                        };
                        q.push(md);
                    }
                }

                addmember.setData(q);
                addmember.clear();
                addmember.empty();

                $('#newMessageModal').modal('show');
            });
        });

        $('#newMessagefileIV').on("click",function () {
            $("#newMessageFile").click();
        });

        $('#fileIV').on("click",function () {
            $("#messageFile").click();
        });
        $('#fileIV1').on("click",function () {
            $("#messageFile1").click();
        });

        $("#messageFile").change(imageChange);
        $("#messageFile1").change(attachChange);

        $("#newMessageFile").change(imageChangeNewMessage);



        $('#newMessageText_twemoji').on("keyup input",function (e) {
            if (e.which == 13) {
                $('#newSendMessage').trigger('click');
            }
        });

        $('#message_twemoji').on("keyup input",function (e) {

            if (e.which == 13) {
                $('#sendMessage').trigger('click');
            }else{
                onKeyDownNotEnter();
            }
        });

        $('#sendMessage').on("click",function (event) {
			
            let receiverId=activeGroupId;
            if(receiverId===null || receiverId===""){
                return;
            }
            if(messageLoading){
                return;
            }
            $('.close').trigger("click");

            $("#message").find("div:has(br)").each(function(){
                if($(this).html() === '<br>' || $(this).html() === '<br />'){
                    $(this).remove();
                }
            });
            let message=$('#message').text();
            let mainFileObject=null;
            let file=$("#messageFile").val();
            if(file===null || file===""){
                file=$("#messageFile1").val();
                mainFileObject=$("#messageFile1")[0].files[0];
            }
            else{
                mainFileObject=$("#messageFile")[0].files[0];
            }

            let modmessage=message.replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi," ").replace(/&nbsp;/gi," ").trim();
            if((modmessage === null || modmessage==="") && (file===null || file==="")){
                reset ();
                return;

            }
            if(modmessage != null || modmessage!=""){

                $('#message').val(modmessage);
            }

            let date=moment().format("YYYY-MM-DD");
            let time=moment().format("HH:mm:ss");

            let form=new FormData($('#messageForm')[0]);
            form.append("groupId",receiverId);

            form.append("file",mainFileObject);
            reset();
            if(file===null || file===""){

                sendMessage(form,false,false);
            }
            else {
                sendMessage(form,true,false);
            }


        });

        $('#newSendMessage').on("click",function (event) {
            //$('.close').trigger("click");

            let message=$('#newMessageText').text();
            let modmessage=message.replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi," ").replace(/&nbsp;/gi," ").trim();
            let file=$("#newMessageFile").val();
            if((modmessage == null || modmessage=="") && (file==null || file=="")){
                // resetNewMessage();
                return;

            }
            if(modmessage != null || modmessage!=""){

                $('#newMessageText').val(modmessage);
            }


            let date=moment().format("YYYY-MM-DD");
            let time=moment().format("HH:mm:ss");
            let userIds=addmember.getValue();
            if(userIds.length==0){
                return;
            }
            let form=new FormData($('#newMessageForm')[0]);
            for(i=0;i<userIds.length;i++){
                form.append("memberId[]",userIds[i]);
            }
            form.append("date",date);
            form.append("time",time);

            sendMessage(form,false,true);
            $('#groups').scrollTop(0);
            //updateGroupList();

        });

        $('#editGroupName').on("click",function (event) {
            $("#groupName").css("border", "1px solid #ccc");
            $("#changeNameModal").modal("show");

        });

        $("#groupName").focus(function () {
            $(this).css("border", "1px solid #ccc");
        });

        $('#changeNameBtn').on("click",function () {
            let groupId=activeGroupId;
            let groupName=$("#groupName").val();
            groupName=groupName.replace(/<script[^>]*>/gi, "&lt;script&gt;").replace(/<\/script[^>]*>/gi, "&lt;/script&gt;").replace(/(<([^>]+)>)/ig,"").replace(/&nbsp;/gi," ").replace(/&nbsp;/gi," ").trim();
            if (groupName==null || groupName==""){
                $('#groupName').css("border","1px solid red");
                toastr.error("Group name is empty");
                return;
            }
            let form=new FormData();
            form.append("groupId",groupId);
            form.append("groupName",groupName);
            form.append("userId",userId);
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('imApi/changeGroupName') ?>",
                "method": "POST",
                "headers": {
                    "authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "cache-control": "no-cache",
                    "postman-token": "2a391657-45a9-1a7b-9a67-9b16b0dda13a"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };
            $.ajax(settings).done(function (response) {
                toastr.info("Group name update successful");
                $("#changeNameModal").modal("hide");
                groupObjects[groupId].groupName=groupName;
                $("#groupName").val("");
            })
        });

        $("#block").on("click",function () {
            let groupId =activeGroupId;
            let form = new FormData();
            form.append("groupId",groupId);
            form.append("userId",userId);
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('imApi/blockGroup') ?>",
                "method": "POST",
                "headers": {
                    "Authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "Cache-Control": "no-cache",
                    "Postman-Token": "4272ac4e-661d-4865-b1dd-857fcd936e96"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };

            $.ajax(settings).done(function (response) {
                toastr.info("Block successful");
            });
        });
        $("#unblock").on("click",function () {
            let groupId =activeGroupId;
            let form = new FormData();
            form.append("groupId",groupId);
            form.append("userId",userId);
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('imApi/unblockGroup') ?>",
                "method": "POST",
                "headers": {
                    "Authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "Cache-Control": "no-cache",
                    "Postman-Token": "4272ac4e-661d-4865-b1dd-857fcd936e96"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };

            $.ajax(settings).done(function (response) {
                toastr.info("Unblock successful");
            });
        });
        $("#mute").on("click",function () {
            let groupId =activeGroupId;
            let form = new FormData();
            form.append("groupId",groupId);
            form.append("userId",userId);
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('imApi/muteGroup') ?>",
                "method": "POST",
                "headers": {
                    "Authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "Cache-Control": "no-cache",
                    "Postman-Token": "4272ac4e-661d-4865-b1dd-857fcd936e96"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };

            $.ajax(settings).done(function (response) {
                toastr.info("Message muted successful");
            });
        });
        $("#unmute").on("click",function () {
            let groupId =activeGroupId;
            let form = new FormData();
            form.append("groupId",groupId);
            form.append("userId",userId);
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('imApi/unmuteGroup') ?>",
                "method": "POST",
                "headers": {
                    "Authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "Cache-Control": "no-cache",
                    "Postman-Token": "4272ac4e-661d-4865-b1dd-857fcd936e96"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };

            $.ajax(settings).done(function (response) {
                toastr.info("Unmuting successful");
            });
        });
        $(".persons").on("mouseenter",".person", function(){
                if($(this).hasClass("active")){
                    return;
                }else{
                    if(!$(this).hasClass("person-hover")){
                        $(this).addClass('person-hover');
                    }
                }

            });
        $(".persons").on("mouseleave",".person", function(){
            if($(this).hasClass("person-hover")){
                $(this).removeClass('person-hover')
            }

        });
        $("#leaveGroup").on("click",function () {
            let form = new FormData();
            form.append("groupId", activeGroupId);
            form.append("userId",userId);
            let settings = {
                "async": true,
                "crossDomain": true,
                "url": "<?php echo base_url('imApi/leaveGroup') ?>",
                "method": "POST",
                "headers": {
                    "Authorization": "Basic YWRtaW46MTIzNA==",
                    "authorizationkeyfortoken": String(responce),
                    "Cache-Control": "no-cache",
                    "Postman-Token": "a64d0529-ed6e-434b-8b39-1f5331ba0b0c"
                },
                "processData": false,
                "contentType": false,
                "mimeType": "multipart/form-data",
                "data": form
            };

            $.ajax(settings).done(function (response) {
                toastr.info("You successfully leave the group.");
            });
        });

//------------------  Web sockt section ------------------------------

        socket.on('newMessage',function (res) {
			
            chatBox.find('#blankImg').hide();
            chatBox.removeClass("text-center");
            chatBox.removeClass("vertical-alignment");
            chatBox.perfectScrollbar({suppressScrollX:true});

            if($(".groupInfoContent").hasClass("hidden")){
                $(".groupInfoContent").removeClass("hidden");
            }
            let data=res;
            let sender=data.sender;
            let message=data.message;

            let html="";
            let seen=data.seen;
            let messageDate=moment(message.ios_date_time,moment.ISO_8601);
            LastMessageId=parseInt(message.m_id);
            if(!lastMessageDate){
                html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                html +=moment(message.ios_date_time,moment.ISO_8601).calendar(null,momentOptions2);
                html += "                <\/div>";
                lastMessageDate=messageDate;
            }
            else if(lastMessageDate.date()-messageDate.date()>=1 || lastMessageDate.date()-messageDate.date()<=-1){
                if(lastMessageDate!==messageDate){
                    html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                    html +=moment(message.ios_date_time,moment.ISO_8601).calendar(null,momentOptions2);
                    html += "                <\/div>";
                    lastMessageDate=messageDate;
                }
            } else if ( lastMessageDate.diff(messageDate, 'minutes') <= -30) {
                html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                html +=moment(message.ios_date_time,moment.ISO_8601).calendar(null,momentOptions2);
                html += "                <\/div>";
                lastMessageDate=messageDate;
            }
            if(message.type === "update"){
                html += "<div id='message_" + message.m_id + "' class=\"fw-im-message  text-center fw-im-othersender update-message-font\" data-og-container=\"\">";
                html +="<i class='oli oli-newspaper'></i> "+ message.message;
                html += "                <\/div>";
            }

           else {

                $(".fw-im-message-time").addClass("hidden");
                if (parseInt(sender.userId) !== parseInt(userId)) {

                    html += "<div  class=\"fw-im-message fw-im-isnotme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                    if (message.type === "text") {
						
                        if(message.onlyemoji){
							
                              html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message,true) + "<\/div>";
                        }else{
                             html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message,false) + "<\/div>";
                        }
                        if (message.linkData !== null) {
                            html += getLinkPreview(JSON.parse(message.linkData), message.link);

                        }
                    }
                    if (message.type === "image") {
                        html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                        html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                        html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                        html += "                            <\/div>";
                    }
                    if (message.type === "video") {
                        html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                        html += "                        <video class='mediaVideo' id='video_" + message.m_id + "' poster='"+message.poster+"' class=' ' width=\"250px\" height=\"150px\" controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                        html += "                    <\/div>";
                    }
                    if (message.type === "audio") {
                        html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                        html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%'  controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                        html += "                    <\/div>";
                    }
                    if (message.type === "document") {
                        //html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                        html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href="+message.message +" ><i class=\"fa fa-arrow-circle-down\"></i> "+message.fileName+"<\/a></div>";
                        //html += "                    <\/div>";
                    }
                    html += "                    <div class=\"fw-im-message-author\"  title=\"" + sender.firstName + " " + sender.lastName + "\">";
                    if (sender.active === 1) {
                        html += "                        <img class='auth_" + sender.userId + " authStatus memberActive'  src=\"" + sender.profilePictureUrl + "\" >";
                    } else {
                        html += "                        <img class='auth_" + sender.userId + " authStatus' src=\"" + sender.profilePictureUrl + "\" >";
                    }
                    html += "                    <\/div>";

                    html += "                <\/div>";
                    if(!mute) {
                        $.playSound("<?php echo base_url('assets/img/nf')?>");
                        toastr.info("New Message from " + sender.firstName + " " + sender.lastName);
                    }
                } else {
                    html += "<div  class=\"fw-im-message  fw-im-isme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                    if (message.type === "text") {
                        if(message.onlyemoji){
                              html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message,true) + "<\/div>";
                        }else{
                             html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message,false) + "<\/div>";
                        }

                        if (message.linkData !== null) {
                            html += getLinkPreview(JSON.parse(message.linkData), message.link);

                        }
                    }
                    if (message.type === "image") {
                        html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                        html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                        html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                        html += "                            <\/div>";
                    }
                    if (message.type === "video") {
                        html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                        html += "                        <video class='mediaVideo' class='mediaVideo' id='video_" + message.m_id + "' poster='"+message.poster+"' class=' ' width=\"250px\" height=\"150px\" controls=\"true\" preload='none'  name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                        html += "                    <\/div>";
                    }
                    if (message.type === "audio") {
                        html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                        html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%'  controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                        html += "                    <\/div>";
                    }
                    if (message.type === "document") {
                        //html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                        html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href="+message.message +" ><i class=\"fa fa-arrow-circle-down\"></i> "+message.fileName+"<\/a></div>";
                        //html += "                    <\/div>";
                    }
                    html += "                    <div class=\"fw-im-message-author\"  title=\"" + sender.firstName + " " + sender.lastName + "\">";
                    html += "                        <img src=\"" + sender.profilePictureUrl + "\" >";
                    html += "                    <\/div>";
                    if(seen===null){
                        html += "                    <div class=\"fw-im-message-time seen hidden seenId_"+ message.m_id+"\">";
                        html += "                        <span class='seenMessage_"+ message.m_id+"'><\/span>";
                        html += "                    <\/div>";
                    }else {
                        if(seen.time!==null){
                            html += "                    <div class=\"fw-im-message-time seen  seenId_"+ message.m_id+"\">";
                            html += "                        <span class='seenMessage_"+ message.m_id+"'>"+seen.seen+moment(seen.time, moment.ISO_8601).calendar(null, momentOptions2)+"<\/span>";
                            html += "                    <\/div>";
                        }else{
                            html += "                    <div class=\"fw-im-message-time seen  seenId_"+ message.m_id+"\">";
                            html += "                        <span class='seenMessage_"+ message.m_id+"'>"+seen.seen+"<\/span>";
                            html += "                    <\/div>";
                        }
                    }
                    html += "                <\/div>";

                }
            }
            if(presentTypingDiv){
                $(html).insertBefore(presentTypingDiv);
            }else{
                chatBox.append(html);
            }


            if (message.type == "video") {
                initVideo("video_" + message.m_id);
            }else if(message.type=="audio"){

                initAudio("audio_" + message.m_id);
            }
            let groupId=data.to;
            if(message.type=="text"){
                $('#messageType_'+groupId).html(message.message);

            }else if(message.type!=="update"){
                $('#messageType_'+groupId).html(message.type);
                lightBox.init();
            }
            $('#time_'+groupId).html(moment(message.ios_date_time,moment.ISO_8601).fromNow());
            time[groupId]=message.ios_date_time;

            let height=chatBox[0].scrollHeight;
            chatBox.scrollTop(height);
            clampData();
            if(activeGroupId===parseInt(data.to)){
                let elementData=$("#group_"+activeGroupId).clone();
                $("#group_"+activeGroupId).remove();
                $("#groups").prepend(elementData);
                $("#groups").scrollTop(0);
            }
        });

        socket.on("getFetchOnReconnect",function (data) {
		    //message section
            let messages=data.activeGroupMessages;
            let html="";
            let message=null;
            let seen=null;
            let messageDate=null;
            let sender=null;
            if(messages.length>0) {
                LastMessageId = parseInt(messages[messages.length - 1].message.m_id);
                time[activeGroupId] = messages[messages.length - 1].message.ios_date_time;

                $(".fw-im-message-time").addClass("hidden");
                for (let i = 0; i < messages.length; i++) {
                    message = messages[i].message;
                    sender = messages[i].sender;
                    seen = message.seen;
                    messageDate = moment(message.ios_date_time, moment.ISO_8601);
                    if (!lastMessageDate) {
                        html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                        html += moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions2);
                        html += "                <\/div>";
                        lastMessageDate = messageDate;
                    }
                    else if (lastMessageDate.date() - messageDate.date() >= 1 || lastMessageDate.date() - messageDate.date() <= -1) {
                        if (lastMessageDate !== messageDate) {
                            html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                            html += moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions2);
                            html += "                <\/div>";
                            lastMessageDate = messageDate;
                        }
                    } else if (lastMessageDate.diff(messageDate, 'minutes') <= -30) {
                        html += "<div class=\"fw-im-message  text-center fw-im-othersender\" data-og-container=\"\">";
                        html += moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions2);
                        html += "                <\/div>";
                        lastMessageDate = messageDate;
                    }
                    if (message.type === "update") {
                        html += "<div id='message_" + message.m_id + "' class=\"fw-im-message  text-center fw-im-othersender update-message-font\" data-og-container=\"\">";
                        html += "<i class='oli oli-newspaper'></i> " + message.message;
                        html += "                <\/div>";
                    }

                    else {

                        if (parseInt(sender.userId) !== parseInt(userId)) {

                            html += "<div  class=\"fw-im-message fw-im-isnotme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                            if (message.type === "text") {
                                if (message.onlyemoji) {
                                    html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message, true) + "<\/div>";
                                } else {
                                    html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message, false) + "<\/div>";
                                }
                                if (message.linkData !== null) {
                                    html += getLinkPreview(JSON.parse(message.linkData), message.link);

                                }
                            }
                            if (message.type === "image") {
                                html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                                html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                                html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                                html += "                            <\/div>";
                            }
                            if (message.type === "video") {
                                html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                html += "                        <video class='mediaVideo' id='video_" + message.m_id + "' poster='" + message.poster + "' class=' ' width=\"250px\" height=\"150px\" controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                                html += "                    <\/div>";
                            }
                            if (message.type === "audio") {
                                html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                                html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%'  controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                                html += "                    <\/div>";
                            }
                            if (message.type === "document") {
                                //html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href=" + message.message + " ><i class=\"fa fa-arrow-circle-down\"></i> " + message.fileName + "<\/a></div>";
                                //html += "                    <\/div>";
                            }
                            html += "                    <div class=\"fw-im-message-author\"  title=\"" + sender.firstName + " " + sender.lastName + "\">";
                            if (sender.active === 1) {
                                html += "                        <img class='auth_" + sender.userId + " authStatus memberActive'  src=\"" + sender.profilePictureUrl + "\" >";
                            } else {
                                html += "                        <img class='auth_" + sender.userId + " authStatus' src=\"" + sender.profilePictureUrl + "\" >";
                            }
                            html += "                    <\/div>";

                            html += "                <\/div>";

                        } else {
                            html += "<div  class=\"fw-im-message  fw-im-isme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time, moment.ISO_8601).calendar(null, momentOptions) + "\">";
                            if (message.type === "text") {
                                if (message.onlyemoji) {
                                    html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\" style='background-color:transparent;'>" + parseMessage(message.message, true) + "<\/div>";
                                } else {
                                    html += "                    <div id='message_" + message.m_id + "' class=\"fw-im-message-text\">" + parseMessage(message.message, false) + "<\/div>";
                                }

                                if (message.linkData !== null) {
                                    html += getLinkPreview(JSON.parse(message.linkData), message.link);

                                }
                            }
                            if (message.type === "image") {
                                html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\"><a style=\"width: 200px;height: 200px\" href=\"" + message.message + "\" class=\"ol-hover hover-5 ol-lightbox\"><img height=\"200px\" width=\"200px\" src=\"" + message.message + "\" alt=\"image hover\">";
                                html += "                            <div class=\"ol-overlay ov-light-alpha-80\"><\/div>";
                                html += "                            <div class=\"icons\"><i class=\"fa fa-camera\"><\/i><\/div><\/a>";
                                html += "                            <\/div>";
                            }
                            if (message.type === "video") {
                                html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                html += "                        <video class='mediaVideo' class='mediaVideo' id='video_" + message.m_id + "' poster='" + message.poster + "' class=' ' width=\"250px\" height=\"150px\" controls=\"true\" preload='none'  name=\"media\"><source src=\"" + message.message + "\" type=\"video\/mp4\"><\/video>";
                                html += "                    <\/div>";
                            }
                            if (message.type === "audio") {
                                html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments mediaAudio-player-wrapper\" >";
                                html += "                        <audio class='mediaAudio' id='audio_" + message.m_id + "' style='width:100%;height:100%;' width='100%' height='100%'  controls=\"true\" preload='none' name=\"media\"><source src=\"" + message.message + "\" type=\"audio\/mp3\"><\/audio>";
                                html += "                    <\/div>";
                            }
                            if (message.type === "document") {
                                //html += "<div id='message_" + message.m_id + "' class=\"fw-im-attachments\" >";
                                html += "                        <div class=\"fw-im-message-text\"><a target='_blank' id='document_" + message.m_id + "' href=" + message.message + " ><i class=\"fa fa-arrow-circle-down\"></i> " + message.fileName + "<\/a></div>";
                                //html += "                    <\/div>";
                            }
                            html += "                    <div class=\"fw-im-message-author\"  title=\"" + sender.firstName + " " + sender.lastName + "\">";
                            html += "                        <img src=\"" + sender.profilePictureUrl + "\" >";
                            html += "                    <\/div>";
                            if (seen === null) {
                                html += "                    <div class=\"fw-im-message-time seen hidden seenId_" + message.m_id + "\">";
                                html += "                        <span class='seenMessage_" + message.m_id + "'><\/span>";
                                html += "                    <\/div>";
                            } else {
                                if (seen.time !== null) {
                                    html += "                    <div class=\"fw-im-message-time seen  seenId_" + message.m_id + "\">";
                                    html += "                        <span class='seenMessage_" + message.m_id + "'>" + seen.seen + moment(seen.time, moment.ISO_8601).calendar(null, momentOptions2) + "<\/span>";
                                    html += "                    <\/div>";
                                } else {
                                    html += "                    <div class=\"fw-im-message-time seen  seenId_" + message.m_id + "\">";
                                    html += "                        <span class='seenMessage_" + message.m_id + "'>" + seen.seen + "<\/span>";
                                    html += "                    <\/div>";
                                }
                            }
                            html += "                <\/div>";

                        }
                    }
                }
                if (presentTypingDiv) {
                    $(html).insertBefore(presentTypingDiv);
                } else {
                    chatBox.append(html);
                }

                for (let i = 0; i < messages.length; i++) {
                    message = messages[i].message;
                    if (message.type == "video") {
                        initVideo("video_" + message.m_id);
                    } else if (message.type == "audio") {

                        initAudio("audio_" + message.m_id);
                    }
                }
                lightBox.init();
                let height=chatBox[0].scrollHeight;
                chatBox.scrollTop(height);
                clampData();
            }
            //group section
            let groups=data.groups;
            for(let i=0;i<groups.length;i++){
                groupObjects[groups[i].groupId]=groups[i];
                if(document.getElementById("group_"+groups[i].groupId)){
                    $("#group_"+groups[i].groupId).remove();
                }
                addNewGroup(groups[i]);
                if(activeGroupId===parseInt(groups[i].groupId)){
                    $(".person").removeClass("active");
                    $("#group_"+activeGroupId).addClass("active");
                    $(".UserNames").html(groups[i].groupName);
                    let meCreator= groups[i].meCreator;
                    printGroupMembers(groups[i].members,meCreator,groups[i].groupId);
                    groupImages[data.groupId]=groups[i].groupImage;
                    printGroupInfo(groups[i].groupId,groupImages,groups[i].groupName);

                }
            }
            if(messages.length!==0 || groups.length!==0){
                $.playSound("<?php echo base_url('assets/img/nf')?>");
            }




        });

        socket.on("userTyping",function (data) {
            let typerGroupId=parseInt(data.groupId);
            if(parseInt(data.userId)!==parseInt(userId) && typerGroupId===activeGroupId) {
                let html="";

                html += "<div id='group_"+data.groupId+data.userId+"' class=\"fw-im-message fw-im-isnotme fw-im-othersender\" data-og-container=\"\" style=\"cursor:help\" title=\"" + moment(message.ios_date_time,moment.ISO_8601).calendar(null,momentOptions) + "\">";
                html += "                    <div  class=\"fw-im-message-text\" style='background-color: transparent;white-space: unset;'>";

                html += "<div class=\"typing-indicator\">";
                html += "  <span><\/span>";
                html += "  <span><\/span>";
                html += "  <span><\/span>";
                html += "<\/div>";

                html += "<\/div>";
                html += "                    <div class=\"fw-im-message-author\" title=\"" + data.userName + "\">";
                html += "                        <img src=\"" + data.profilePicture + "\" title=\"" + data.userName + "\">";
                html += "                    <\/div>";
                html += "                <\/div>";

                chatBox.append(html);

                let height=chatBox[0].scrollHeight;
                chatBox.scrollTop(height);
                presentTypingDiv=$("#group_"+data.groupId+data.userId);
                if(!mute) {
                    $.playSound("<?php echo base_url('assets/img/typing')?>");
                }
            }

        });
        
        socket.on("receiveSeen",function (data) {
            let m_id=data.forMessage;
            let seenMessage=data.seen;
            $(".seenId_"+m_id).removeClass("hidden");
            if(seenMessage) {
                if (seenMessage.time != null && seenMessage.seen!==null) {
                    $(".seenMessage_" + m_id).html(seenMessage.seen + moment(seenMessage.time, moment.ISO_8601).calendar(null, momentOptions2));
                } else if(seenMessage.seen!==null) {
                    $(".seenMessage_" + m_id).html(seenMessage.seen);
                }
            }
            let elmnt = $(".seenMessage_"+m_id)[0];
            if(elmnt){

                elmnt.scrollIntoView();
            }
        });
        
        socket.on("userNotTyping",function (data) {
            let typerGroupId=parseInt(data.groupId);
            let currentGroupId=activeGroupId;
            $("#group_"+data.groupId+data.userId).remove();
            if(presentTypingDiv && presentTypingDiv.is("#group_"+data.groupId+data.userId)){
                presentTypingDiv=null;
            }
            let height=chatBox[0].scrollHeight;
            chatBox.scrollTop(height);

        });

        socket.on("reconnect",function () {
            socket.emit("register",JSON.stringify(tokenData));

            let groupId=activeGroupId;
            if (groupId!=null || groupId!=""){
                socket.emit("joinRoom",parseInt(groupId));
            }
            let data={
                _r: token,
                userId:userId,
                activeGroupId:activeGroupId,
                lastMessageId:LastMessageId,
            };
            socket.emit("fetchOnReconnect",data);
            $('#connectionErrorModal').modal('hide');

        });

        socket.on("reconnecting",function () {
            $(".memberStatus").removeClass("memberActive");
            $(".authStatus").removeClass("memberActive");

            $('#connectionErrorModal').modal({backdrop:'static',keyboard:false,show:true});

        });

        socket.on("updateGroupNameData",function (res) {
            let data={
              "groupId":parseInt(res.groupId),
              "groupName":res.groupName
            };
            if(document.getElementById('group_' + data.groupId) ){
                // group is present and user is currently in this group
                    if(activeGroupId===data.groupId){
                        $("#groupName_"+data.groupId).html("<div>"+data.groupName+"</div>");
                        $('.be-use-name').html(data.groupName);
                        $(".UserNames").html(data.groupName);
                        $clamp($('.be-use-name')[0], { clamp: 2, useNativeClamp: false });
                    }
                // group is present but user currently not chatting on this group
                 else{
                        $("#groupName_"+data.groupId).html("<div>"+data.groupName+"</div>");
                    }
            }

        });

        socket.on("addNewMember",function (res) {
            let data={
              "groupId":parseInt(res.groupId),
                "group":res.groupInfo,
                "members":res.memberList
            };

            let currentGroupId = parseInt(activeGroupId);
            // check group is present but user is not chatting on this group
            if (document.getElementById('group_' + data.groupId) && currentGroupId!==data.groupId){
                let html="";
                for (j=0;j<data.group.groupImage.length;j++){

                    html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+data.group.groupImage[j]+"\" >";
                }
                $("#groupImage_"+data.groupId).html(html);
                $("#groupName_"+data.groupId).html("<div>"+data.group.groupName+"</div>");

            }
            // check group is present and user is currently chatting on this group
            else if(currentGroupId===data.groupId && document.getElementById('group_' + currentGroupId)){
                let html="";
                for (let j=0;j<data.group.groupImage.length;j++){

                    html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+data.group.groupImage[j]+"\" >";
                }
                $("#groupImage_"+data.groupId).html(html);
                $("#groupName_"+data.groupId).html("<div>"+data.group.groupName+"</div>");
                $(".UserNames").html(data.group.groupName);
                let meCreator= $("#group_"+data.groupId).attr("data-mecreator");
                printGroupMembers(data.members,meCreator,data.groupId);
                groupImages[data.groupId]=data.group.groupImage;
                printGroupInfo(data.groupId,groupImages,data.group.groupName);
            }
            // check group is not present
            else{
                addNewGroup(data.group);
            }
        });

        socket.on("deleteAMember",function (res) {

            let data={
                "groupId":parseInt(res.groupId),
                "group":res.groupInfo,
                "members":res.memberList,
                "removeGroup":res.removeGroup
            };

            let currentGroupId = parseInt(activeGroupId);
            // current user is the removed one
            if(data.removeGroup===true && document.getElementById('group_' + data.groupId)){
                // group is present and user is currently on this group
                    if(currentGroupId==data.groupId){
                        $("#group_"+currentGroupId).remove();
                        $("#groups").scrollTop(0);
                        $('#groups li').first().trigger("click",[{update:true}]);
                    }
                // group is present and user is not chatting on this group
                    else{
                        $("#group_"+data.groupId).remove();
                    }
            }
            // group is present and user is currently on this group
            else if(!data.removeGroup &&document.getElementById('group_' + data.groupId) && currentGroupId===data.groupId){
                let html="";
                for (let j=0;j<data.group.groupImage.length;j++){

                    html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+data.group.groupImage[j]+"\" >";
                }
                $("#groupImage_"+data.groupId).html(html);
                $("#groupName_"+data.groupId).html("<div>"+data.group.groupName+"</div>");
                $(".UserNames").html(data.group.groupName);
                let meCreator= $("#group_"+data.groupId).attr("data-mecreator");
                printGroupMembers(data.members,meCreator,data.groupId);
                groupImages[data.groupId]=data.group.groupImage;
                printGroupInfo(data.groupId,groupImages,data.group.groupName);
            }
            // group is present and user is not chatting on this group
            else if(document.getElementById('group_' + data.groupId)){
                let html="";
                for (j=0;j<data.group.groupImage.length;j++){

                    html += "                        <img class=\"img-responsive img-circle\" style=\"width: 40px; height: 40px;border-radius: 50%\" src=\""+data.group.groupImage[j]+"\" >";
                }
                $("#groupImage_"+data.groupId).html(html);
                $("#groupName_"+data.groupId).html("<div>"+data.group.groupName+"</div>");
            }

        });

        socket.on("pendingMessage",function (res) {

            let currentGroupId=parseInt(activeGroupId);

                    let data=JSON.parse(res);
                    let groupData=data.groupData;
                    let senderId=parseInt(data.senderId);
                        //if sender is not the current user
                        if(senderId!==parseInt(userId)) {


                            // if group present in list then remove the group
                            if (document.getElementById('group_' + groupData.groupId)) {
                                $("#group_" + groupData.groupId).remove();
                            }
                            //if group is not present on grouplist or removed from grouplist then add the group on top
                            addNewGroup(groupData);

                            $('.person').removeClass('active');
                            $('#group_' + currentGroupId).addClass('active');
                            // if(parseInt(data.totalPending)!=0){

                            if(!groupObjects[groupData.groupId].mute) {
                                $.playSound("<?php echo base_url('assets/img/nf')?>");
                                toastr.info("New message received");
                            }
                            //}
                        }
                        // if group is present in the group list on left
                        else if (document.getElementById('group_' + groupData.groupId)) {
                            $("#group_" + groupData.groupId).remove();
                            addNewGroup(groupData);
                            if(parseInt(groupData.groupId)===parseInt(activeGroupId)) {
                                $('#group_' + groupData.groupId).addClass('active');
                                $("#groups").scrollTop(0);
                            }else{
                                if($("#group_"+groupData.groupId).hasClass("font-bold-black")){
                                    $("#group_"+groupData.groupId).removeClass("font-bold-black");
                                }
                           }

                           // }

                           /* if(groupData.messageType==="text"){
                                $('#messageType_'+groupData.groupId).html(groupData.recentMessage);
                            }else{
                                $('#messageType_'+groupData.groupId).html(groupData.messageType);
                            }
                            $('#time_'+groupData.groupId).html(moment(groupData.lastActive,moment.ISO_8601).fromNow());
                            time[groupData.groupId]=groupData.lastActive;*/
                        }

                        // otherwise do nothimg

        });

        socket.on("updateStatus",function (res) {

            let data=JSON.parse(res);
            if(parseInt(data.status)===1){
                if(!$("#member_"+data.userId).hasClass("memberActive")){
                    $("#member_"+data.userId).addClass("memberActive");
                }
                if(!$(".auth_"+data.userId).hasClass("memberActive")){
                    $(".auth_"+data.userId).addClass("memberActive");
                }
            }else{
                if($("#member_"+data.userId).hasClass("memberActive")){
                    $("#member_"+data.userId).removeClass("memberActive");
                }
                if($(".auth_"+data.userId).hasClass("memberActive")){
                    $(".auth_"+data.userId).removeClass("memberActive");
                }
            }

        });

        socket.on("updateStatusOnReconnect",function (res) {
            let data=JSON.parse(res);
            for(let i=0;i<data.friendsIds.length;i++){
                if(!$("#member_"+data.friendsIds[i].userId).hasClass("memberActive")){
                    $("#member_"+data.friendsIds[i].userId).addClass("memberActive");
                }
                if(!$(".auth_"+data.friendsIds[i].userId).hasClass("memberActive")){
                    $(".auth_"+data.friendsIds[i].userId).addClass("memberActive");
                }
            }

        });

        socket.on("blockStatus",function (data) {

            if(activeGroupId===data.groupId){
                if(data.block){
                    if(parseInt(userId)===parseInt(data.userId)) {
                        if (!$("#block").hasClass("hidden")) {
                            $("#block").addClass("hidden");
                        }
                        if ($("#unblock").hasClass("hidden")) {
                            $("#unblock").removeClass("hidden");
                        }

                    }

                }else{
                    if(parseInt(userId)===parseInt(data.userId)) {
                        if ($("#block").hasClass("hidden")) {
                            $("#block").removeClass("hidden");
                        }
                        if (!$("#unblock").hasClass("hidden")) {
                            $("#unblock").addClass("hidden");
                        }
                    }

                }
                if(data.fullUnblock){
                    if($("#blockmessage").hasClass("hidden")) {
                        $("#blockmessage").removeClass("hidden");
                    }

                    $("#messageForm").hide();
                }else{
                    if(!$("#blockmessage").hasClass("hidden")) {
                        $("#blockmessage").addClass("hidden");
                    }
                    $("#messageForm").show();
                }
            }
            groupObjects[data.groupId]=data.blockGroup;
            block=data.block;

        });

        socket.on("muteStatus",function (data) {
            if(activeGroupId===data.groupId){
                if(!data.mute){
                    if($("#mute").hasClass("hidden")){
                        $("#mute").removeClass("hidden");
                    }
                    if(!$("#unmute").hasClass("hidden")){
                        $("#unmute").addClass("hidden");
                    }
                    if(!$("#mute_"+data.groupId).hasClass("hidden")){
                        $("#mute_"+data.groupId).addClass("hidden");
                    }
                }else{
                    if(!$("#mute").hasClass("hidden")){
                        $("#mute").addClass("hidden");
                    }
                    if($("#unmute").hasClass("hidden")){
                        $("#unmute").removeClass("hidden");
                    }
                    if($("#mute_"+data.groupId).hasClass("hidden")){
                        $("#mute_"+data.groupId).removeClass("hidden");
                    }
                }

            }
            groupObjects[data.groupId].mute=data.mute;
            mute=data.mute;
        });

//------------------ End of web socket section -------------------------

        setInterval(updateTime, 60000);
    });

$(function(){
  //$(".dropdown-toggle").dropdown('toggle'); // this works
  $('.dropdown-toggle').click(function(e){
      e.stopPropagation();
    $(".dropdown-toggle").dropdown('toggle');// this doesn't
  });
 $('.userClick').click(function(e){
      e.stopPropagation();
    $(".dropdown-toggle").dropdown('toggle');// this doesn't
  });
});
</script>
<script type="text/javascript">
	$.fn.pageMe = function(opts){
    var $this = this,
        defaults = {
            perPage:5,
            showPrevNext: false,
            hidePageNumbers: false
        },
        settings = $.extend(defaults, opts);
    
    var listElement = $this;
    var perPage = 5; 
    var children = listElement.children();
    var pager = $('.pager');
    
    if (typeof settings.childSelector!="undefined") {
        children = listElement.find(settings.childSelector);
    }
    
    if (typeof settings.pagerSelector!="undefined") {
        pager = $(settings.pagerSelector);
    }
    
    var numItems = children.size();
    var numPages = Math.ceil(numItems/perPage);

    pager.data("curr",0);
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="prev_link">«</a></li>').appendTo(pager);
    }
    
    var curr = 0;
    while(numPages > curr && (settings.hidePageNumbers==false)){
        $('<li><a href="#" class="page_link">'+(curr+1)+'</a></li>').appendTo(pager);
        curr++;
    }
    
    if (settings.showPrevNext){
        $('<li><a href="#" class="next_link">»</a></li>').appendTo(pager);
    }
    
    pager.find('.page_link:first').addClass('active');
    pager.find('.prev_link').hide();
    if (numPages<=1) {
        pager.find('.next_link').hide();
    }
  	pager.children().eq(1).addClass("active");
    
    children.hide();
    children.slice(0, perPage).show();
    
    pager.find('li .page_link').click(function(){
        var clickedPage = $(this).html().valueOf()-1;
        goTo(clickedPage,perPage);
        return false;
    });
    pager.find('li .prev_link').click(function(){
        previous();
        return false;
    });
    pager.find('li .next_link').click(function(){
        next();
        return false;
    });
    
    function previous(){
        var goToPage = parseInt(pager.data("curr")) - 1;
        goTo(goToPage);
    }
     
    function next(){
        goToPage = parseInt(pager.data("curr")) + 1;
        goTo(goToPage);
    }
    
    function goTo(page){
        var startAt = page * perPage,
            endOn = startAt + perPage;
        
        children.css('display','none').slice(startAt, endOn).show();
        
        if (page>=1) {
            pager.find('.prev_link').show();
        }
        else {
            pager.find('.prev_link').hide();
        }
        
        if (page<(numPages-1)) {
            pager.find('.next_link').show();
        }
        else {
            pager.find('.next_link').hide();
        }
        
        pager.data("curr",page);
      	pager.children().removeClass("active");
        pager.children().eq(page+1).addClass("active");
    
    }
};

$(document).ready(function(){
    
  $('#myTable').pageMe({pagerSelector:'#myPager',showPrevNext:true,hidePageNumbers:false,perPage:4});
    
});
</script>

<?php $this->template->contentEnd();	?> 