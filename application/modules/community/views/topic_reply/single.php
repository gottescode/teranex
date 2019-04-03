<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row topic-reply">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?= $topic->title ?></h1>
			</div>
		</div>

		<div class="col-md-8">
		
		<!--<div class="col-md-12">
			<h3>Activity Story stream</h3>
		    </hr>
		</div>
	   
        <div class="col-md-12">
			<h3>22 March 2018</h3>
		    </hr>
		</div>-->
		
		<?php foreach ($posts_reply as $post) : ?>
			<div class="col-md-12">
				<article class="panel panel-default">
					<div class="panel-body">
						<header class="post-header">
							<small><a href="<?= base_url('user/' . $post->author) ?>"><?= $post->author ?></a>, <?= $post->created_at ?></small>
						</header>
						<div class="post-content">
							<?= $post->content ?>
						</div>
						<div class="post-content">
							<a href="<?= site_url()."community/forum/topic_reply/".$topic->permalink ?>">Reply</a>
						</div>
					</div>
				</article>
			</div>
		<?php endforeach; ?>
		<?php if (isset($_SESSION['uid'])) : ?>
			<div class="col-md-12">
				<a href="<?= site_url().'community/forum/create_post_reply/'.$forum->slug .'/'.$topic->slug .'/'.$post->slug.'/reply' ?>"
 class="btn btn-default">Reply to this topic</a>
			</div>
		<?php endif; ?>
			</div>
			<div class="col-sm-4 community-owner">
		<div class="text-center">
			<h3>Community Owners</h3>
			<img src="<?php echo $theme_url?>/images/joshua-img.png" />
			<img src="<?php echo $theme_url?>/images/joshua-img.png" />
		</div>
		<div class="members">
			<h3 class="text-center">Members</h3>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="<?php echo $theme_url?>/images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="<?php echo $theme_url?>/images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="<?php echo $theme_url?>/images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
		<div class="members-bg">
		<div class="col-sm-4">
			<img src="<?php echo $theme_url?>/images/joshua-img.png" />
		</div>
		<div class="col-sm-8">
			<h4>Peter Reiley</h4>
		</div>
		</div>
		</div>
		
		
	</div><!-- .row -->
</div><!-- .container -->

<?php //var_dump($forum, $topic, $posts); ?>