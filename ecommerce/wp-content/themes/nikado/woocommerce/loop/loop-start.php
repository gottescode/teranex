<?php
/**
 * Product Loop Start
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     3.3.0
 */

global $wp_query, $woocommerce_loop;

$nikado_opt = get_option( 'nikado_opt' );

$shoplayout = 'sidebar';
if(isset($nikado_opt['shop_layout']) && $nikado_opt['shop_layout']!=''){
	$shoplayout = $nikado_opt['shop_layout'];
}
if(isset($_GET['layout']) && $_GET['layout']!=''){
	$shoplayout = $_GET['layout'];
}
$shopsidebar = 'left';
if(isset($nikado_opt['sidebarshop_pos']) && $nikado_opt['sidebarshop_pos']!=''){
	$shopsidebar = $nikado_opt['sidebarshop_pos'];
}
if(isset($_GET['sidebar']) && $_GET['sidebar']!=''){
	$shopsidebar = $_GET['sidebar'];
}
switch($shoplayout) {
	case 'fullwidth':
		Nikado_Class::nikado_shop_class('shop-fullwidth');
		$shopcolclass = 12;
		$shopsidebar = 'none';
		$productcols = 4;
		break;
	default:
		Nikado_Class::nikado_shop_class('shop-sidebar');
		$shopcolclass = 9;
		$productcols = 3;
}

$nikado_viewmode = Nikado_Class::nikado_show_view_mode();
?>
<div class="shop-products products row <?php echo esc_attr($nikado_viewmode);?> <?php echo esc_attr($shoplayout);?>">