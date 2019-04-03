<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<?php $this->template->contentBegin(POS_TOP);?>
<link href="<?php echo $theme_url?>/css/ekko-lightbox.css" rel="stylesheet">
<style>
.disp_inline{
	display:inline-block;
}
.border_btm{
border-top: 1px solid #ccc;
padding-top:10px; 
}
.topic_new_answer{
/*border-bottom: 1px solid #f8f4f4;*/
padding: 10px 0px;
}
.post_new_coment{
	/*padding: 20px;
    background-color: #f7f7f7;*/
}
.post-content{
	padding:10px 0;
	margin-bottom: 10px;
}
.coment_action{
	margin-bottom:10px;
}
.coment_action i.fa{
	font-size:20px;
	color: #ff8a43;
}
.topic_answer{
	background-color:#fff;
	border-bottom: 1px solid #f8f4f4;
}
.sub_answer{
	margin-left: 30px;
	border-top: 1px solid #f8f4f4;
	padding: 10px;
	margin-top: 10px;
}
.post_comment{
    background-color: #f7f7f7;
}
.community-owner{
	border:none;
}
.members-bg {
    background: #f7f7f7;
}
.cmt_member img,.members .members-bg img{
	width:50px;
	height: 50px;
	border-radius: 50%;

}
.cmt_member{
	margin-bottom: 50px;
}
.bg_white{
	background-color:#fff;
}
.member_detail p{
	line-height: 15px;
	margin: 0 0 0px;
}
/*readmore*/
a.morelink {
	text-decoration:none;
	outline: none;
}
.morecontent span {
	display: none;
}
.rcomment {
	width: 100%;
}
.addcomment, .give-comment, .addcomment:hover, .give-comment:hover {
    background: #fe8a42;
    color: #fff;
}
.image-upload > input {
    display: none;
}
.image-upload img{
	margin-bottom: 10px;
	cursor: pointer;
}
.cmt_attch a {
    text-align: center;
    display: inline-block;
    padding: 0 10px;
}
.cmt_attch i {
    font-size: 25px;
    color: #ccc;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 25px;
    margin: 5px;
}
</style>
<?php echo $this->template->contentEnd();	?> 
<?
		$uid=$this->session->userdata('uid');
		$user_id = $uid;
		$comment = array();
		foreach ($comments as $old_key => $asset)
		{	
			$new_key = $asset['id'];
			$comment[ $new_key ] = $asset;
			$topic_id = $asset['topic_id'];
		}
		$comments = $comment;
		// now loop your comments list, and everytime you find a child, push it 
		//   into its parent
		foreach ($comments as $k => &$v) {
		  if ($v['parent_id'] != 0) {
			$comments[$v['parent_id']]['childs'][] =& $v;
		  }
		}
		unset($v);

		// delete the childs comments from the top level
		foreach ($comments as $k => $v) {
		  if ($v['parent_id'] != 0) {
			unset($comments[$k]);
		  }
		}
		$details=0;
		// now we display the comments list, this is a basic recursive function
	function display_comments(array $comments, $level = 0) {
		$marginleft=20;
		foreach ($comments as $info) {
			//likes
			$url = site_url()."community/api/likeCount/".$info['id'];
			$likes = apiCall($url,"get");
			$likes = $likes['result']['count'];		
			//Dislikes
			$url = site_url()."community/api/dislikeCount/".$info['id'];
			$dislikes = apiCall($url,"get");
			$dislikes = $dislikes['result']['count'];
			
			$url = site_url()."community/api/commentAttachementlist/".$info['id'];
			$commentAttachementlist = apiCall($url,"get");
			//print_r($commentAttachementlist);
			
			//follows
			$url = site_url()."community/api/foll_Count/".$info['id'];
			$foll_Count = apiCall($url,"get");
			$foll_Count = $foll_Count['result']['count'];
	?>					
		<div class="<?php echo str_repeat('', $level + 1).' comment '.$info['content']; ?> <?php if($level==0){ echo "border_btm"; } ?> " style="margin-left:<?php if($level!=0){ echo ($marginleft)*($level + 1).'px';} ?>">
									<header class="post-header row-flex">
									
										<span class="col-sm-1 padd-0">
										<?php if($info['userImage'] != ''){ ?>
											<img class="img-responsive"src="<?php echo base_url()."uploads/customer/".$info['userImage']; ?>"style="height:70px; width:70px"/>
										 <?php } else { ?>
											<img class="img-responsive"src="<?php echo $theme_url?>/images/blank.jpg"style="height:70px; width:70px"/>
									     <?php } ?>
										</span>
										<span  class="col-sm-11"><a href="<?= base_url('user/'.$info['username']) ?>"><?=$info['username']; ?></a>
										<small style="margin-left:30px">Answered &nbsp; <?= $info['created_at'] ?></small></span>
									</header><!-- post-header -->
									<div class="post-content">
										<div class="read_content rcomment readmore" id="read_content_<?php echo $info['id']; ?>">
											<?=$info['content']; ?>
										</div><?php if($commentAttachementlist['result']){ ?> 
										<div class="cmt_attch">
										
				                            <h5>Comment Attachments :</h5>
											<?php foreach($commentAttachementlist['result'] as $row){
														$extension = explode(".",$row['attached_file']);
														if($extension['1']==='jpg' || $extension['1']==='JPG' || $extension['1']==='png' || $extension['1']==='PNG' || $extension['1']==='jpeg'||$extension['1']==='JPEG' ){
											?>
												<a href="<?php echo base_url();?>/uploads/attachmentfiles/<?php echo $row['attached_file'];?>" data-toggle='lightbox' data-gallery='example-gallery'><img src="<?php echo base_url();?>/uploads/attachmentfiles/<?php echo $row['attached_file'];?>" width='100px' height='56px' class='img-fluid' ><br/><span><?php echo $row['attached_file']; ?></span></a>
					
											<?
												}else{ ?>
												<a class="cmt_attch" href="<?php echo base_url();?>/uploads/attachmentfiles/<?php echo $row['attached_file'];?>" target="_blank"><span><i class="fa fa-file"></i></span><br><span><?php echo $row['attached_file']; ?>	</span></a>
											<? 	} 
												}
											?>
				                      
					                       
				                        </div>   <? } ?>
										<!-- <img src="<?php echo $theme_url?>/images/2.jpg" class="img-responsive"> -->
									</div><!-- post-content -->
									<div class="coment_action">
										<span data-toggle="tooltip" title="Views"><?php echo $info['views']; ?> &nbsp;<i class="fa fa-eye"></i></span>&nbsp;&nbsp;
										<span> 
											<span id="post_<?php echo $info['id']; ?>"><?php echo $likes; ?></span>&nbsp;
											<a href="javascript:void(0)" data-toggle="tooltip" title="Upvote" id="<?php echo $info['id']; ?>" class="likes" opr="L"><i class="fa fa-thumbs-up"></i></a>
										</span>&nbsp;&nbsp;
										<span>
											<span id="post_dis_<?php echo $info['id']; ?>"><?php echo $dislikes; ?></span>&nbsp;
											<a href="javascript:void(0)" data-toggle="tooltip" title="Downvote" id="<?php echo $info['id']; ?>" class="likes" opr="D"> <i class="fa fa-thumbs-down"></i></a>
										</span>&nbsp;&nbsp;
										<span>
												<span id="post_follow_<?php echo $info['id']; ?>"><?php echo $foll_Count; ?></span>
												<a href="javascript:void(0)" data-toggle="tooltip" title="Follow" follow-id="<?php echo $info['id']; ?>" class="follow" ><i class="fa fa-rss"></i> Follow</a>
										</span>&nbsp;&nbsp;
										<span>
											<span id=""></span>
											<a href="javascript:void(0)" data-toggle="tooltip" title="Answer" class="cmt_answer"
											id="answer_button_<?php echo $ans = rand();?>" count-id="<?php echo $ans;?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Answer</a>
										</span>&nbsp;&nbsp;
										<span class="disp_inline">
										<form class="form-horizontal" role="form" id="comment_<?php echo $a = rand();?>" method="post" enctype="multipart/form-data" novalidate="novalidate">
											<div class="image-upload" style="display: inline-block;">
					                            <label for="<?php echo $b= rand();?>">
					                                <img src="<?= theme_url();?>/images/attachment.png" aria-haspopup="true" title="Media">
					                            </label>
					                            <input id="<?php echo $b;?>" type="file" class="attachFile fileUpload" name="commentFile"/>
					                            <input id="<?php echo rand();?>" type="hidden" value="<?php echo $info['id'];?>" name="post_id"/>
												<input type="hidden" class="form-control " id="uid" name="uid"/>
											</div>
											<input type="submit" name="btnSubmit" class="btn btn-primary btn-xs" style= "display:none;margin-bottom:10px;"id= "submit_<?php echo $b;?>" value="Submit"/>

										</form>
										</span>&nbsp;&nbsp;
									</div><!-- coment_action -->
									<div class="post_comment post_cmt " id="post_cmt_<?php echo $ans;?>" style="display:none">
												<div class="input-group">
										<input type="hidden" class="form-control answer" name="post_answer" id="post_answer"  value="You got a response" placeholder="Write your comment here..">
										  <input type="text" class="form-control content " placeholder="Write your comment here..">
										  <span class="input-group-btn">
											<button class="btn give-comment" type="button"  post-id="<?php echo $info['id'];?>">Comment</button>
										  </span>
										</div><!-- /input-group -->
									</div><!-- post_comment -->
									
								</div>	<br/>
		<?
		if (!empty($info['childs'])) {
		  display_comments($info['childs'], $level + 1);
		}
		?>
		<div class="clearfix"></div>	
						
		<?
	  }
	  
	}
?>

	<div class="container">
		<div class="row topic-reply">
			<div class="col-sm-12 bg_white padd-0" >
				<div class="col-md-9 padd-0">
					<div class="page-header">
						<h1><?=$topic->title 
						//print_r($topic->Id);
						
						?></h1>
					</div>
					<div class="topic_new_answer">
						<div class="panel-body">
							<div class="post_new_coment">
									<div class="input-group">
									<input type="text" name="content" id="content" class="form-control content" placeholder="Write your answer here..">
									<input type="hidden" id="comment_post" class="form-control comment_post" value="New discussion kicked-off" 
									<input type="hidden" class="form-control" id = "topic_id" value = "<? echo $topic->id; ?>" name="topic_id" >
									<input type="hidden" class="form-control " value = "<?php 
										echo $this->session->userdata('uid'); ?>" id="uid" name="uid" placeholder="Write your answer here..">
									<span class="input-group-btn">
										<button class="btn addcomment" type="button">Comment</button>
									</span>
								</div>
							</div>
						</div>
					</div>
					<br/>
					<div class="col-md-12">
						<?php 
							display_comments($comments); 
						?>
					</div>
					<?php if (isset($_SESSION['uid'])) : ?>
							<!--
							<div class="col-md-12">
								<a href="<?= site_url().'community/forum/create_post/'.$forum->slug .'/'.$topic->slug.'/reply' ?>" class="btn btn-default">Reply to this topic</a>
							</div>
							-->
					<?php endif; ?>
				</div><!-- .col-sm-9 -->
				<div class="col-sm-3 community-owner">
					<div class=" cmt_member">
					<h3>Community Owners</h3>
					<?php if($forum->user_image){?> 
					<div class="members">
						<div class="members-bg">
						    <div class="col-sm-12 padd-0">
								<div class="col-md-3 col-sm-4 padd-0">
									<img src="<?=site_url().'/uploads/customer/'.$forum->user_image; ?>" width="100%" height="70px">
								</div>
								<div class="col-md-9 col-sm-8 padd-0 member_detail">
									<p class="text-left"><strong><?php echo $forum->user_name ?></strong><br/>
									<small>Designation<br/><?php echo $forum->company_name ?></small></p>
								</div>
							</div>
						</div>
					</div>
					<?php } ?>
				</div>
				<div class=" cmt_member">
					<h3>Moderator</h3>
					<?php if($moderator_detail_single->moderator_image){?> 
					<div class="members">
						<div class="members-bg">
						    <div class="col-sm-12 padd-0">
								<div class="col-md-3 col-sm-4 padd-0">
									<img src="<?=site_url().'/uploads/customer/'.$moderator_detail_single->moderator_image; ?>" width="100%" height="70px">
								</div>
								<div class="col-md-9 col-sm-8 padd-0 member_detail">
									<p class="text-left"><strong><?php echo $moderator_detail_single->moderator_name ?></strong><br/>
									<small><?php echo $moderator_detail_single->person_designation ?><br/><?php echo $moderator_detail_single->company_name ?></small></p>
								</div>
							</div>
						</div>
						
					</div>
					<?php } ?>
				</div>
					<div class="members">
						<h3 class="text-left">Members</h3>
						<?php if($query >0){ $i=1;
												foreach($query  as $rowData){ ?>
						<div class="members-bg">
							<?php if($rowData->u_avatar){?> 
							<div class="col-sm-4">
								<img src="<?=site_url().'/uploads/customer/'.$rowData->u_avatar ?>" width="40px">
							</div>
							<?php } ?>
							<div class="col-sm-8 member_detail">
								<p><strong><?=$rowData->u_name;?></strong><br/>
								<small><?=$rowData->person_designation;?><br/><?=$rowData->user_company_name;?></small></p>
							</div>
						</div>
							<?php } } ?>
					</div><!-- .col-sm-3 -->
				</div><!-- .row -->
			</div>
		</div>
	</div><!-- .container -->

<?php //var_dump($forum, $topic, $posts); ?>
<?php $this->template->contentBegin(POS_BOTTOM);?>
<script src="<?php echo $theme_url?>/js/ekko-lightbox.js"></script>
<script type="text/javascript">
	 $(document).ready(function ($) {
        // delegate calls to data-toggle="lightbox"
        $(document).on('click', '[data-toggle="lightbox"]:not([data-gallery="navigateTo"]):not([data-gallery="example-gallery-11"])', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
            	 alwaysShowClose: true,
                onShown: function() {
                    if (window.console) {
                        return console.log('Checking our the events huh?');
                    }
                },
				onNavigate: function(direction, itemIndex) {
                    if (window.console) {
                        return console.log('Navigating '+direction+'. Current item: '+itemIndex);
                    }
				}
            });
        });

        // disable wrapping
        $(document).on('click', '[data-toggle="lightbox"][data-gallery="example-gallery-11"]', function(event) {
            event.preventDefault();
            return $(this).ekkoLightbox({
                wrapping: false
            });
        });

        //Programmatically call
        $('#open-image').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });
        $('#open-youtube').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });

		// navigateTo
        $(document).on('click', '[data-toggle="lightbox"][data-gallery="navigateTo"]', function(event) {
            event.preventDefault();

            return $(this).ekkoLightbox({
                onShown: function() {

					this.modal().on('click', '.modal-footer a', function(e) {

						e.preventDefault();
						this.navigateTo(2);

                    }.bind(this));

                }
            });
        });
        
    });
</script>
<script>
//readmore
$(document).ready(function() {
	//var user_id = <?php echo $uid=$this->session->userdata('uid'); ?>;
	var showChar = 300;
	var ellipsestext = "...";
	var moretext = "Read More";
	var lesstext = "Show Less";
	$('.readmore').each(function() {
		var content = $(this).html();

		if(content.length > showChar) {

			var c = content.substr(0, showChar);
			var h = content.substr(showChar-1, content.length - showChar);

			var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';

			$(this).html(html);
		}

	});

	$(".morelink").click(function(){
		if($(this).hasClass("less")) {
			$(this).removeClass("less");
			$(this).html(moretext);
		} else {
			$(this).addClass("less");
			$(this).html(lesstext);
		}
		$(this).parent().prev().toggle();
		$(this).prev().toggle();
		return false;
	});
	var topic_id = <?php echo $topic_id; ?>;
	
	$.ajax({

		type : "GET",
		url: "<?php echo site_url();?>community/api/viewerCount/"+topic_id,
		data : { },
		dataType: 'json', 
		success : function(result){ 
			// console.log(result);
		}
	});

	var topic_id = <?php echo $topic_id; ?>;
	
	$.ajax({

		type : "GET",
		url: "<?php echo site_url();?>community/api/viewerCountTopic/"+topic_id,
		data : { },
		dataType: 'json', 
		success : function(result){ 
			 //console.log(result);
		}
	});
	
});
$(".likes").click(function(){
	debugger;
	var post_id = $(this).attr('id');
	var topic_id = <?php echo $topic_id; ?>;
	var uid = <?php echo $uid;?>
	
	var opr = $(this).attr('opr');
	$.ajax({
		type : "POST",
		url: "<?php echo site_url();?>community/api/likesCount/",
		data : {  post_id:post_id,topic_id:topic_id,uid:uid,opr:opr },
		dataType: 'json', 
		success : function(result){ 
		if(opr==='L'){
			var likesCount = result.result.count;
				$('#post_'+post_id).html(likesCount);
			/* var dec_like = $('#post_dis_'+post_id).text();
				dec_like = parseInt(dec_like);
			if(dec_like==0){
				var des_like = parseInt(dec_like);
				$('#post_dis_'+post_id).html(des_like);
			}else{
				var des_like = parseInt(dec_like)-1;
				$('#post_dis_'+post_id).html(des_like);
			} */
		}else{
			var dislikesCount = result.result.count;
			$('#post_dis_'+post_id).html(dislikesCount);
			/* var dec_like = $('#post_'+post_id).text();
				dec_like = parseInt(dec_like);
			if(dec_like==0){
				var des_like = parseInt(dec_like);
				$('#post_'+post_id).html(des_like);
			}else{
				var des_like = parseInt(dec_like)-1;
				$('#post_'+post_id).html(des_like);
			} */
			
		}
				/* var likesCount = result.result.likes;
				$('#post_'+post_id).html(likesCount); */
		}
	});

});
$(".dislikes").click(function(){
	var post_id = $(this).attr('post-id');
	$.ajax({
		type : "GET",
		url: "<?php echo site_url();?>community/api/dislikesCount/"+post_id,
		data : { },
		dataType: 'json', 
		success : function(result){ 
				var dislikesCount = result.result.dislikes;
				$('#post_dis_'+post_id).html(dislikesCount);
		}
	});
});
$(".follow").click(function(){
	var post_id = $(this).attr('follow-id');
	var topic_id = <?php echo $topic_id; ?>;
	var uid = <?php echo $uid; ?>;
	$.ajax({
		type : "POST",
		url: "<?php echo site_url();?>community/api/followCount/",
		data : {  post_id:post_id,topic_id:topic_id,uid:uid },
		dataType: 'json', 
		success : function(result){ 
				var followsCount = result.result.count;
				$('#post_follow_'+post_id).html(followsCount);
		}
	});
});
$(".addcomment").click(function(){
	debugger;
	var uid = <?php echo $uid=$this->session->userdata('uid'); ?>;
	//var uid = 2;
	var topic_id = <?php echo $topic_id; ?>;
	//var topic_id = 17;
	var content = $('#content').val();
	var comment_post = $(this).parent().parent().find('.comment_post').val();
	//alert(comment_post);

	//return;
	var parent_id = 0;
	$.ajax({
		type : "POST",
		url: "<?php echo site_url();?>community/api/createPostComment/",
		data : { uid:uid,topic_id:topic_id,content:content,parent_id:parent_id,comment_post:comment_post },
		dataType: 'json', 
		success : function(result){ 
				if(result.result){
					location.reload();
				}
		}
	});
});
$(".give-comment").click(function(){
	var uid = <?php echo $uid=$this->session->userdata('uid'); ?>;
	var topic_id = <?php echo $topic_id; ?>;
	var content = $(this).parent().parent().find('.content').val();
	var post_answer = $(this).parent().parent().find('.answer').val();

	//alert(post_answer);

	var parent_id = $(this).attr('post-id');

	$.ajax({
		type : "POST",
		url: "<?php echo site_url();?>community/api/createPostComment/",
		data : { uid:uid,topic_id:topic_id,content:content,parent_id:parent_id,post_answer:post_answer },
		dataType: 'json', 
		success : function(result){
				if(result.result){
					$(this).parent().hide();
					location.reload();
				}			
		}
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
	$('.cmt_answer').click(function(){
		debugger;
		var counter_set = $(this).attr('count-id');
		$('#post_cmt_'+counter_set).show();
	});
});

$(document).ready(function(){
        $('.fileUpload').change(function(){
		var id = $(this).attr('id');
			$("#submit_"+id).show();
        });
    });
</script>
<?php echo $this->template->contentEnd();	?> 