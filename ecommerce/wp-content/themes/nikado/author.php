<?php
/**
 * The template for displaying Author Archive pages
 *
 * Used to display archive-type pages for posts by an author.
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
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

						<?php
							/* Queue the first post, that way we know
							 * what author we're dealing with (if that is the case).
							 *
							 * We reset this later so we can run the loop
							 * properly with a call to rewind_posts().
							 */
							the_post();
						?>

						<header class="archive-header">
							<h1 class="archive-title"><?php printf( esc_html__( 'Author Archives: %s', 'nikado' ), '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( "ID" ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>
						</header><!-- .archive-header -->

						<?php
							/* Since we called the_post() above, we need to
							 * rewind the loop back to the beginning that way
							 * we can run the loop properly, in full.
							 */
							rewind_posts();
						?>

						<?php
						// If a user has filled out their description, show a bio on their entries.
						if ( get_the_author_meta( 'description' ) ) : ?>
						<div class="author-info archives">
							<div class="author-avatar">
								<?php
								/**
								 * Filter the author bio avatar size.
								 *
								 * @since Nikado 1.0
								 *
								 * @param int $size The height and width of the avatar in pixels.
								 */
								$author_bio_avatar_size = apply_filters( 'nikado_author_bio_avatar_size', 68 );
								echo get_avatar( get_the_author_meta( 'user_email' ), $author_bio_avatar_size );
								?>
							</div><!-- .author-avatar -->
							<div class="author-description">
								<h2><?php printf( esc_html__( 'About %s', 'nikado' ), get_the_author() ); ?></h2>
								<p><?php the_author_meta( 'description' ); ?></p>
							</div><!-- .author-description	-->
						</div><!-- .author-info -->
						<?php endif; ?>

						<?php /* Start the Loop */ ?>
						<?php while ( have_posts() ) : the_post(); ?>
							<?php get_template_part( 'content', get_post_format() ); ?>
						<?php endwhile; ?>
						
						<div class="pagination">
							<?php Nikado_Class::nikado_pagination(); ?>
						</div>

					<?php else : ?>
						<?php get_template_part( 'content', 'none' ); ?>
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