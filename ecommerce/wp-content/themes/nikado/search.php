<?php
/**
 * The template for displaying Search Results pages
 *
 * @package WordPress
 * @subpackage Nikado_Theme
 * @since Nikado 1.0
 */

$nikado_opt = get_option( 'nikado_opt' );

get_header();

$nikado_bloglayout = 'nosidebar';
if(isset($nikado_opt['blog_layout']) && $nikado_opt['blog_layout']!=''){
	$nikado_bloglayout = $nikado_opt['blog_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$nikado_bloglayout = $_GET['layout'];
}
$nikado_blogsidebar = 'right';
if(isset($nikado_opt['sidebarblog_pos']) && $nikado_opt['sidebarblog_pos']!=''){
	$nikado_blogsidebar = $nikado_opt['sidebarblog_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$nikado_blogsidebar = $_GET['sidebar'];
}
switch($nikado_bloglayout) {
	case 'sidebar':
		$nikado_blogclass = 'blog-sidebar';
		$nikado_blogcolclass = 9;
		Nikado_Class::nikado_post_thumbnail_size('nikado-category-thumb');
		break;
	case 'largeimage':
		$nikado_blogclass = 'blog-large';
		$nikado_blogcolclass = 9;
		$nikado_postthumb = '';
		break;
	default:
		$nikado_blogclass = 'blog-nosidebar';
		$nikado_blogcolclass = 12;
		$nikado_blogsidebar = 'none';
		Nikado_Class::nikado_post_thumbnail_size('nikado-post-thumb');
}
?>
<div class="main-container">
	<div class="blog-header-title">
		<div class="container">
			<div class="title-breadcrumb-inner">
				<?php Nikado_Class::nikado_breadcrumb(); ?>
				<header class="entry-header">
					<h1 class="entry-title"><?php if(isset($nikado_opt)) { echo esc_html($nikado_opt['blog_header_text']); } else { esc_html_e('Blog', 'nikado');}  ?></h1>
				</header> 
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<?php if($nikado_blogsidebar=='left') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
			
			<div class="col-xs-12 <?php echo 'col-md-'.$nikado_blogcolclass; ?>">
			
				<div class="page-content blog-page <?php echo esc_attr($nikado_blogclass); if($nikado_blogsidebar=='left') {echo ' left-sidebar'; } if($nikado_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php if ( have_posts() ) : ?>
						
						<header class="archive-header">
							<h1 class="archive-title"><?php printf( wp_kses(__( 'Search Results for: %s', 'nikado' ), array('span'=>array())), '<span>' . get_search_query() . '</span>' ); ?></h1>
						</header><!-- .archive-header -->

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>

						<div class="pagination">
							<?php Nikado_Class::nikado_pagination(); ?>
						</div>

					<?php else : ?>

						<article id="post-0" class="post no-results not-found">
							<header class="entry-header">
								<h1 class="entry-title"><?php esc_html_e( 'Nothing Found', 'nikado' ); ?></h1>
							</header>

							<div class="entry-content">
								<p><?php esc_html_e( 'Sorry, but nothing matched your search criteria. Please try again with some different keywords.', 'nikado' ); ?></p>
								<?php get_search_form(); ?>
							</div><!-- .entry-content -->
						</article><!-- #post-0 -->

					<?php endif; ?>
				</div>
			</div>
			<?php if( $nikado_blogsidebar=='right') : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>
		</div>
		
	</div>
</div>
<?php get_footer(); ?>