<?php
/**
 * The Template for displaying all single posts
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
		break;
	default:
		$nikado_blogclass = 'blog-nosidebar'; //for both fullwidth and no sidebar
		$nikado_blogcolclass = 12;
		$nikado_blogsidebar = 'none';
}
?>
<div class="main-container page-wrapper">
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

			<?php
			$customsidebar = get_post_meta( $post->ID, '_nikado_custom_sidebar', true );
			$customsidebar_pos = get_post_meta( $post->ID, '_nikado_custom_sidebar_pos', true );

			if($customsidebar != ''){
				if($customsidebar_pos == 'left' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col-xs-12 col-md-3">';
						dynamic_sidebar( $customsidebar );
					echo '</div>';
				} 
			} else {
				if($nikado_blogsidebar=='left') {
					get_sidebar();
				}
			} ?>
			
			<div class="col-xs-12 <?php echo 'col-md-'.$nikado_blogcolclass; ?>">
				<div class="page-content blog-page single <?php echo esc_attr($nikado_blogclass); if($nikado_blogsidebar=='left') {echo ' left-sidebar'; } if($nikado_blogsidebar=='right') {echo ' right-sidebar'; } ?>">
					<?php while ( have_posts() ) : the_post(); ?>

						<?php get_template_part( 'content', get_post_format() ); ?>

						<?php comments_template( '', true ); ?>
						
						<!--<nav class="nav-single">
							<h3 class="assistive-text"><?php esc_html_e( 'Post navigation', 'nikado' ); ?></h3>
							<span class="nav-previous"><?php previous_post_link( '%link', '<span class="meta-nav">' . _x( '&larr;', 'Previous post link', 'nikado' ) . '</span> %title' ); ?></span>
							<span class="nav-next"><?php next_post_link( '%link', '%title <span class="meta-nav">' . _x( '&rarr;', 'Next post link', 'nikado' ) . '</span>' ); ?></span>
						</nav><!-- .nav-single -->
						
					<?php endwhile; // end of the loop. ?>
				</div>
			</div>
			<?php
			if($customsidebar != ''){
				if($customsidebar_pos == 'right' && is_active_sidebar( $customsidebar ) ) {
					echo '<div id="secondary" class="col-xs-12 col-md-3">';
						dynamic_sidebar( $customsidebar );
					echo '</div>';
				} 
			} else {
				if($nikado_blogsidebar=='right') {
					get_sidebar();
				}
			} ?>
		</div>
	</div> 
</div>

<?php get_footer(); ?>