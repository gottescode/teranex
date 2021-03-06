<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<?php   $this->load->view("cust_side_menu" ); ?> 
		</div>
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
		<?php if ($login_needed) : ?>
			
				<div class="alert alert-danger" role="alert">
					<p>You need to be logged in to reply to a topic!</p>
					<p>Please <a href="<?= base_url('login') ?>">login</a> or <a href="<?= base_url('register') ?>">register a new account</a>.</p>
				</div>
		
		<?php else : ?>
			<?php if (validation_errors()) : ?>
				
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				
			<?php endif; ?>
		
				<?= form_open() ?>
					<div class="form-group">
						<label for="reply">Reply</label>
						<textarea rows="6" class="form-control" id="reply" name="reply" placeholder=""><?= $content ?></textarea>
					</div>
					<div class="form-group">
						<input type="submit" class="btn btn-default" value="Reply">
					</div>
				</form>
			</div>
		<?php endif; ?>
	</div><!-- .row -->
</div><!-- .container -->

<?php //var_dump($forum, $topic, $posts); ?>