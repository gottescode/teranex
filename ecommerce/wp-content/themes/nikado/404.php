<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package WordPress
 * @subpackage Nikado_Theme
 * @since Nikado 1.0
 */

$nikado_opt = get_option( 'nikado_opt' );

get_header();

?>
	<div class="main-container error404">
		<div class="container">
			<div class="search-form-wrapper">
				<h1>404</h1>
				<h2><?php esc_html_e( "PAGE NOT BE FOUND", 'nikado' ); ?></h2>
				<p class="home-link"><?php esc_html_e( "Sorry but the page you are looking for does not exist, have been removed, name changed or is temporarity unavailable.", 'nikado' ); ?></p>
				<?php get_search_form(); ?>
				<a class="button" href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_html_e( 'Back to home', 'nikado' ); ?>"><?php esc_html_e( 'Back to home page', 'nikado' ); ?></a>
			</div>
		</div> 
	</div>
</div>
<?php get_footer(); ?>