<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<div class="container">
	<div class="row topic-reply">
		<div class="col-md-12">
			<div class="page-header">
				<h1><?= $topic->title ?></h1>
			</div>
		</div>
		<div class="col-md-8">
		
		<!--<<div class="col-md-12">
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
					</div>
				</article>
			</div>
		<?php endforeach; ?>

		<?php if ($login_needed) : ?>
			<div class="col-md-12">
				<div class="alert alert-danger" role="alert">
					<p>You need to be logged in to reply to a topic!</p>
					<p>Please <a href="<?= base_url('login') ?>">login</a> or <a href="<?= base_url('register') ?>">register a new account</a>.</p>
				</div>
			</div>
		<?php else : ?>
			<?php if (validation_errors()) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= validation_errors() ?>
					</div>
				</div>
			<?php endif; ?>
			<?php if (isset($error)) : ?>
				<div class="col-md-12">
					<div class="alert alert-danger" role="alert">
						<?= $error ?>
					</div>
				</div>
			<?php endif; ?>
			<div class="col-md-12">
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
					
   </div> 
	</div><!-- .row -->
</div><!-- .container -->

<?php //var_dump($forum, $topic, $posts); ?>