<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php   $this->load->view("cust_side_menu" ); ?> 
		
		<div class="col-xs-6 col-sm-9 col-md-9 col-lg-offset-2 col-lg-6 col-flex">
			<div class="page-header">
				<h1><?= $topic->title ?></h1>
			</div>
		
		
		<?php foreach ($posts as $post) : ?>
			
				<article class="panel panel-default">
					<div class="panel-body">
						<header class="post-header">
							<small><a href="<?= base_url('user/' . $post->author) ?>"><?= $post->author ?></a>, <?= $post->created_at ?></small>
						</header>
						<div class="post-content">
							<?= $post->content ?>
						</div>
					</div>
				</article>
			
		<?php endforeach; ?>
		
		<?php if (isset($_SESSION['uid'])) : ?>
			
				<!--<a href="<?= base_url($forum->slug . '/' . $topic->slug . '/reply') ?>" class="btn btn-default">Reply to this topic</a>-->
			
		<?php endif; ?>
		</div>
		</div>
	</div><!-- .row -->
</div><!-- .container -->

<?php //var_dump($forum, $topic, $posts); ?>