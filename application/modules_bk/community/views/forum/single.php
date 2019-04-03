<?php defined('BASEPATH') OR exit('No direct script access allowed'); 
	 $group_id = $forum_id;
	//exit;

?>

<?php $this->template->contentBegin(POS_TOP);?>
<style>
.tbl-topic.table>tbody>tr>td:last-child h3{text-align:left;}
.tbl-topic {font-size: 16px!important; font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;}
.tbl-topic h3,.tbl-topic h4{line-height: 1.5; margin-bottom:0px;}
.tbl-topic h3,.tbl-topic h3 a {
	font-size: 20px;
    margin: 0px;
	font-family: Ciutadella!important;
    color:#005e82!important;
	font-weight:500;
}
.member_detail p{line-height: 24px; padding-left: 10px;}
.member_detail p small{line-height: 22px;}
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
.cmt_member h3, .members h3 {
    margin-bottom: 0px;
    margin-top: 0;
    background: #445268;
    padding: 9px;
    color: #fff;
}
.cmt_member p, .members p{
    margin-bottom: 0px;
	padding-left: 10px;
}
.cmt_member, .members {
    width: 100%!important;
    float: left;
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
.members-bg {
    background: #f4f4f4;
    float: left;
    width: 100%;
    padding: 5px;
    vertical-align: middle;
    margin-bottom: 0;
    border-bottom: 1px solid #ddd;
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
</style>
<?php echo $this->template->contentEnd();?> 
<div>
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
			<div class="col-sm-9 padd-0 f1">
				<!--<div class="col-md-12 text-right padd-0">
				  <ul class="pagination pagination-lg pager" id="myPager"></ul>
				</div>-->
				<?php $i=0; if (isset($topics) && !empty($topics)) : ?>
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
								</th>
							<!-- 	<th class="text-center">
									<h3>Follows	</h3>
								</th>-->
								<th class="text-center">
									<h3>Answers</h3>
								</th>
								<th>
									<span><h3>Created On</h3></span>
								</th>
							</tr>
						</thead>
						
						<tbody id="myTable">
							<?php foreach ($topics as $topic) : ?>
								<?php // $topic->topic_id; exit(); ?>
							<tr>
							  <td>
								<h3><a href="<?= site_url()."community/forum/topic/".$topic->permalink ?>"><?= $topic->title ?></a></h3>
								<p style="font-size:12px"> Created by<a href="#"> <?= $topic->author ?>, </a></p>
								<!--<h4> <?= $topic->created_at ?></h4> -->
							  </td>
							  <td class="text-center">
								<h3><?= $topic->views ?></h3>
							  </td>
							  <td class="text-center">
								<h3 id="<?php echo $i;?>"> </h3>
								<?php $this->template->contentBegin(POS_BOTTOM);?>
								<script type="text/javascript">					
											$.ajax({
									type : "GET",
									url: "<?php echo site_url();?>community/api/likesCountTopic/<?php echo $topic->id ?>",
									dataType: 'json',
									asynch:true, 
									success : function(result){ 
										var result = result;
										$('#'+<?php echo $i; ?>).html(result.result[0].count);
										console.log(result.result[0].count);
											
									}
								});</script>
								<?php $this->template->contentEnd();	$i++;?>  
		
							  </td>
							<!--  <td class="text-center">
								<h3 id="<?php echo $i;?>"> </h3>
								<?php $this->template->contentBegin(POS_BOTTOM);?>
								<script type="text/javascript">					
											$.ajax({
									type : "GET",
									url: "<?php echo site_url();?>community/api/followCountTopic/<?php echo $topic->id ?>",
									dataType: 'json',
									asynch:true, 
									success : function(result){ 
										var result = result;
										$('#'+<?php echo $i; ?>).html(result.result[0].count);
										console.log(result.result[0].count);
											
									}
								});</script>
								<?php $this->template->contentEnd();	$i++;?>  
							  </td>--> 
							  <td class="text-center">
								<h3 id="<?php echo $i;?>"> </h3>
								<?php $this->template->contentBegin(POS_BOTTOM);?>
								<script type="text/javascript">					
											$.ajax({
									type : "GET",
									url: "<?php echo site_url();?>community/api/answerCountTopic/<?php echo $topic->id ?>",
									dataType: 'json',
									asynch:true, 
									success : function(result){ 
										var result = result;
										$('#'+<?php echo $i; ?>).html(result.result[0].count);
										console.log(result.result[0].count);
											
									}
								});</script>
								<?php $this->template->contentEnd();	$i++;?> 
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
			<div class="col-sm-3 f2" style="margin-top: 0!important;padding-right: 0; float:left">
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
					<?php if($moderator_details->moderator_image){?> 
					<div class="members">
						<div class="members-bg">
						    <div class="col-sm-12 padd-0">
								<div class="col-md-3 col-sm-4 padd-0">
									<img src="<?=site_url().'/uploads/customer/'.$moderator_details->moderator_image; ?>" width="100%" height="70px">
								</div>
								<div class="col-md-9 col-sm-8 padd-0 member_detail">
									<p class="text-left"><strong><?php echo $moderator_details->moderator_name ?></strong><br/>
									<small><?php echo $moderator_details->person_designation ?><br/><?php echo $moderator_details->company_name ?></small></p>
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
									<img src="<?=site_url().'/uploads/customer/'.$rowData->u_avatar ?>" width="100%" height="70px">
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
</div>
	
<?php $this->template->contentBegin(POS_BOTTOM);?>

<?php $this->template->contentEnd();	?> 