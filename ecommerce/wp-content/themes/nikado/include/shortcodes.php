<?php
function nikado_logo_shortcode( $atts ) {
	$nikado_opt = get_option( 'nikado_opt' );

	$atts = shortcode_atts( array(
							'logo_link' => 'yes',
							), $atts, 'roadlogo' );
	$html = '';

	if( isset($nikado_opt['logo_main']['url']) && $nikado_opt['logo_main']['url']!=''){
		$html .= '<div class="logo-container">';
			$html .= '<div class="logo">';

				if($atts['logo_link']=='yes'){
					$html .= '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
				}
					$html .= '<img src="'.esc_url($nikado_opt['logo_main']['url']).'" alt="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" />';

				if($atts['logo_link']=='yes'){
					$html .= '</a>';
				}

			$html .= '</div>';
		$html .= '</div>';
	} else {
		$html .= '<div class="logo-container">';
			$html .= '<h1 class="logo">';

			if($atts['logo_link']=='yes'){
				$html .= '<a href="'.esc_url( home_url( '/' ) ).'" title="'.esc_attr( get_bloginfo( 'name', 'display' ) ).'" rel="home">';
			}
			$html .= bloginfo( 'name' );

			if($atts['logo_link']=='yes'){
				$html .= '</a>';
			}

			$html .= '</h1>';
		$html .= '</div>';
	}
	
	return $html;
}

function nikado_mainmenu_shortcode( $atts ) {
	$nikado_opt = get_option( 'nikado_opt' );

	$atts = shortcode_atts( array(
							'sticky_logoimage' => '',
							), $atts, 'roadmainmenu' );
	$html = '';
	
	ob_start(); ?>
	<div class="main-menu-wrapper" style="display: none;">
		<div class="visible-small mobile-menu"> 
			<div class="mbmenu-toggler"><?php echo esc_html($nikado_opt['mobile_menu_label']);?><span class="mbmenu-icon"><i class="fa fa-bars"></i></span></div>
			<div class="clearfix"></div>
			<?php wp_nav_menu( array( 'theme_location' => 'mobilemenu', 'container_class' => 'mobile-menu-container', 'menu_class' => 'nav-menu' ) ); ?>
		</div> 
		<div class="<?php if(isset($nikado_opt['sticky_header']) && $nikado_opt['sticky_header']) {echo 'header-sticky';} ?> <?php if ( is_admin_bar_showing() ) {echo 'with-admin-bar';} ?>">
			<div class="nav-container" >
				<?php if( isset($atts['sticky_logoimage']) && $atts['sticky_logoimage']!=''){ ?>
					<div class="logo-sticky"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo  wp_get_attachment_url( $atts['sticky_logoimage']);?>" alt="" /></a></div>
				<?php } ?>
				<div class="horizontal-menu visible-large">
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'primary-menu-container', 'menu_class' => 'nav-menu' ) ); ?> 
				</div> 
			</div>  
		</div>
	</div>	
	<?php
	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function nikado_roadcategoriesmenu_shortcode ( $atts ) {

	$nikado_opt = get_option( 'nikado_opt' );

	$html = '';

	ob_start();

	$cat_menu_class = '';

	if(isset($nikado_opt['categories_menu_home']) && $nikado_opt['categories_menu_home']) {
		$cat_menu_class .=' show_home';
	}
	if(isset($nikado_opt['categories_menu_sub']) && $nikado_opt['categories_menu_sub']) {
		$cat_menu_class .=' show_inner';
	}
	?>
	<div class="categories-menu visible-large <?php echo esc_attr($cat_menu_class); ?>">
		<div class="catemenu-toggler"><span><?php if(isset($nikado_opt)) { echo esc_html($nikado_opt['categories_menu_label']); } else { esc_html_e('Category', 'nikado'); } ?></span></div>
		<div class="menu-inner">
			<?php wp_nav_menu( array( 'theme_location' => 'categories', 'container_class' => 'categories-menu-container', 'menu_class' => 'categories-menu' ) ); ?>
			<div class="morelesscate">
				<span class="morecate"><i class="fa fa-caret-right"></i><?php if ( isset($nikado_opt['categories_more_label']) && $nikado_opt['categories_more_label']!='' ) { echo esc_html($nikado_opt['categories_more_label']); } else { esc_html_e('More Categories', 'nikado'); } ?></span>
				<span class="lesscate"><i class="fa fa-caret-up"></i><?php if ( isset($nikado_opt['categories_less_label']) && $nikado_opt['categories_less_label']!='' ) { echo esc_html($nikado_opt['categories_less_label']); } else { esc_html_e('Close Menu', 'nikado'); } ?></span>
			</div>
		</div> 
	</div>
	<?php

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function nikado_roadlangswitch_shortcode( $atts ) {
	$nikado_opt = get_option( 'nikado_opt' );

	$html = '';

	ob_start();

	if (class_exists('SitePress')) { ?>
		<div class="switcher">
			<div class="language"><label><?php echo esc_html__('language:','nikado'); ?></label><?php do_action('icl_language_selector'); ?></div> 
			<div class="currency"><label><?php echo esc_html__('currency:','nikado'); ?></label><?php do_action('currency_switcher'); ?></div> 
		</div> 
	<?php }

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function nikado_roadsocialicons_shortcode( $atts ) {
	$nikado_opt = get_option( 'nikado_opt' );

	$html = '';

	ob_start();

	if(isset($nikado_opt['social_icons'])) {
		echo '<ul class="social-icons">';
		foreach($nikado_opt['social_icons'] as $key=>$value ) {
			if($value!=''){
				if($key=='vimeo'){
					echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-vimeo-square"></i></a></li>';
				} else {
					echo '<li><a class="'.esc_attr($key).' social-icon" href="'.esc_url($value).'" title="'.ucwords(esc_attr($key)).'" target="_blank"><i class="fa fa-'.esc_attr($key).'"></i></a></li>';
				}
			}
		}
		echo '</ul>';
	}

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function nikado_roadminicart_shortcode( $atts ) {

	$html = '';

	ob_start();

	if ( class_exists( 'WC_Widget_Cart' ) ) {
		the_widget('Custom_WC_Widget_Cart');
	}

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
} 

function nikado_roadproductssearch_shortcode( $atts ) {

 $html = '';

 ob_start();

 if( class_exists('WC_Widget_Product_Categories') && class_exists('WC_Widget_Product_Search') ) { ?>
  <div class="header-search">
  	<div class="categories-container">
  		<div class="cate-toggler"><?php esc_html_e('Categories', 'nikado');?></div>
  		<?php the_widget('WC_Widget_Product_Categories', array('hierarchical' => true, 'title' => 'Categories', 'orderby' => 'order')); ?>
  	</div> 
   <?php the_widget('WC_Widget_Product_Search', array('title' => 'Search')); ?>
  </div>
 <?php }

 $html .= ob_get_contents();

 ob_end_clean();
 
 return $html;
}

function nikado_roadcopyright_shortcode( $atts ) {
	$nikado_opt = get_option( 'nikado_opt' );

	$html = '';

	ob_start(); ?>
	<div class="widget-copyright">
		<?php 
		if( isset($nikado_opt['copyright']) && $nikado_opt['copyright']!='' ) {
			echo wp_kses($nikado_opt['copyright'], array(
				'a' => array(
					'href' => array(),
					'title' => array()
				),
				'br' => array(),
				'em' => array(),
				'strong' => array(),
			));
		} else {
			echo 'Copyright <a href="'.esc_url( home_url( '/' ) ).'">'.get_bloginfo('name').'</a> '.date('Y').'. All Rights Reserved';
		} ?>
	</div>

	<?php

	$html .= ob_get_contents();

	ob_end_clean();
	
	return $html;
}

function nikado_brands_shortcode( $atts ) {
	global $nikado_opt;
	$brand_index = 0;
	
	if(isset($nikado_opt['brand_logos'])) {
		$brandfound = count($nikado_opt['brand_logos']);
	}
	$atts = shortcode_atts( array(
							'rowsnumber' => '1',
							'colsnumber' => '6',
							), $atts, 'ourbrands' );
	$html = '';
	
	if(isset($nikado_opt['brand_logos']) && $nikado_opt['brand_logos']) {
		$html .= '<div class="brands-carousel" data-col="'.$atts['colsnumber'].'">';
			foreach($nikado_opt['brand_logos'] as $brand) {
				if(is_ssl()){
					$brand['image'] = str_replace('http:', 'https:', $brand['image']);
				}
				$brand_index ++;
				if ( (0 == ( $brand_index - 1 ) % $atts['rowsnumber'] ) || $brand_index == 1) {
					$html .= '<div class="group">';
				}
				$html .= '<div class="item-col">';
				$html .= '<a href="'.$brand['url'].'" title="'.$brand['title'].'">';
					$html .= '<img src="'.$brand['image'].'" alt="'.$brand['title'].'" />';
				$html .= '</a>';
				$html .= '</div>';
				if ( ( ( 0 == $brand_index % $atts['rowsnumber'] || $brandfound == $brand_index ))  ) {
					$html .= '</div>';
				}
			}
		$html .= '</div>';
	}
	
	return $html;
}

function nikado_counter_shortcode( $atts ) {
	
	$atts = shortcode_atts( array(
							'image' => '',
							'number' => '100',
							'text' => 'Demo text',
							), $atts, 'nikado_counter' );
	$html = '';
	$html.='<div class="nikado-counter">';
		$html.='<div class="counter-image">';
			$html.='<img src="'.wp_get_attachment_url($atts['image']).'" alt="" />';
		$html.='</div>';
		$html.='<div class="counter-info">';
			$html.='<div class="counter-number">';
				$html.='<span>'.$atts['number'].'</span>';
			$html.='</div>';
			$html.='<div class="counter-text">';
				$html.='<span>'.$atts['text'].'</span>';
			$html.='</div>';
		$html.='</div>';
	$html.='</div>';
	
	return $html;
}

function nikado_popular_categories_shortcode( $atts ) {

	$atts = shortcode_atts( array(
		'category' => '',
		'image' => ''
	), $atts, 'popular_categories' );
	
	$html = '';
	
	$html .= '<div class="category-wrapper">';
		$pcategory = get_term_by( 'slug', $atts['category'], 'product_cat', 'ARRAY_A' );
		if($pcategory){

			if ($atts['image']!='') {
			$html .= '<div class="cat-img">';
				$html .= '<a href="'.get_term_link($pcategory['slug'], 'product_cat').'"><img class="category-image" src="'.esc_attr($atts['image']).'" alt="" /></a>';
			$html .= '</div>';
			}
			
			$html .= '<div class="category-list">';
				$html .= '<h3><a href="'. get_term_link($pcategory['slug'], 'product_cat') .'">'. $pcategory['name'] .'</a></h3>';
				
				$html .= '<ul>';
					$args2 = array(
						'taxonomy'     => 'product_cat',
						'child_of'     => 0,
						'parent'       => $pcategory['term_id'],
						'orderby'      => 'name',
						'show_count'   => 0,
						'pad_counts'   => 0,
						'hierarchical' => 0,
						'title_li'     => '',
						'hide_empty'   => 0
					);
					$sub_cats = get_categories( $args2 );

					if($sub_cats) {
						foreach($sub_cats as $sub_category) {
							$html .= '<li><a href="'.get_term_link($sub_category->slug, 'product_cat').'">'.$sub_category->name.'</a></li>';
						}
					}
				$html .= '</ul>';
			$html .= '</div>'; 
		}
	$html .= '</div>';
	
	return $html;
}

function nikado_categoriescarousel_shortcode( $atts ) {
	global $nikado_opt;
	$categories_index = 0;
	if(isset($nikado_opt['cate_images'])){
		$categoriesfound = count($nikado_opt['cate_images']);
	}
	
	$atts = shortcode_atts( array(
							'rowsnumber' => '1',
							'colsnumber' => '6',
							), $atts, 'categoriescarousel' );
	$html = '';
	
	if(isset($nikado_opt['cate_images'])){
		$html .= '<div class="categories-carousel" data-col="'.$atts['colsnumber'].'">';
			foreach($nikado_opt['cate_images'] as $categories) {
				if(is_ssl()){
					$categories['image'] = str_replace('http:', 'https:', $categories['image']);
				}
				$categories_index ++;
				if ( (0 == ( $categories_index - 1 ) % $atts['rowsnumber'] ) || $categories_index == 1) {
					$html .= '<div class="group">';
				}
					$html .= '<div class="item-cate">';
						$html .= '<div class="cate-thumb">';
							$html .= '<a href="'.$categories['url'].'" class="image" title="'.$categories['title'].'">';
								$html .= '<img src="'.$categories['image'].'" alt="'.$categories['title'].'" />';
							$html .= '</a>';
							$html .= '<div class="count">'.$categories['description'].'</div>';
						$html .= '</div>';
						$html .= '<h4 class="title"><a href="'.$categories['url'].'">'.$categories['title'].'</a></h4>'; 
					$html .= '</div>';
				if ( ( ( 0 == $categories_index % $atts['rowsnumber'] || $categoriesfound == $categories_index ))  ) {
					$html .= '</div>';
				}
			}
		$html .= '</div>';
	}
	
	return $html;
}

function nikado_latestposts_shortcode( $atts ) {
	global $nikado_opt;
	$post_index = 0;
	$atts = shortcode_atts( array(
		'posts_per_page' => 5,
		'order' => 'DESC',
		'orderby' => 'post_date',
		'image' => 'wide', //square
		'length' => 20,
		'rowsnumber' => '1',
		'colsnumber' => '4',
		'image1' => 'square',
	), $atts, 'latestposts' );
	
	if($atts['image']=='wide'){
		$imagesize = 'nikado-post-thumbwide';
	} else {
		$imagesize = 'nikado-post-thumb';
	}
	$html = '';

	$postargs = array(
		'posts_per_page'   => $atts['posts_per_page'],
		'offset'           => 0,
		'category'         => '',
		'category_name'    => '',
		'orderby'          => $atts['orderby'],
		'order'            => $atts['order'],
		'exclude'          => '',
		'meta_key'         => '',
		'meta_value'       => '',
		'post_type'        => 'post',
		'post_mime_type'   => '',
		'post_parent'      => '',
		'post_status'      => 'publish',
		'suppress_filters' => true );
	
	$postslist = get_posts( $postargs );

	$html.='<div class="posts-carousel" data-col="'.$atts['colsnumber'].'">';

			foreach ( $postslist as $post ) {
				$post_index ++;
				if ( (0 == ( $post_index - 1 ) % $atts['rowsnumber'] ) || $post_index == 1) {
					$html .= '<div class="group">';
				}
				$html.='<div class="item-col">';
					$html.='<div class="post-wrapper">';
						// author link
						$author_id = $post->post_author;
						$author_url = get_author_posts_url( get_the_author_meta( 'ID', $author_id ) );
						$author_name = get_the_author_meta( 'user_nicename', $author_id );
						
						$html.='<div class="post-thumb">'; 
							$html.='<a href="'.get_the_permalink($post->ID).'">'.get_the_post_thumbnail($post->ID, $imagesize).'</a>';
						$html.='</div>';
						
						$html.='<div class="post-info">';

							$html.='<h3 class="post-title"><a href="'.get_the_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h3>';		
							
							$html.='<span class="author">'.$author_name.'</span>'; 

							$num_comments = (int)get_comments_number($post->ID);
							$write_comments = '';
							if ( comments_open($post->ID) ) {
								if ( $num_comments == 0 ) {
									$comments = wp_kses(__('<span>0</span> comments', 'nikado'), array('span'=>array()));
								} elseif ( $num_comments > 1 ) {
									$comments = '<span>'.$num_comments .'</span>'. esc_html__(' comments', 'nikado');
								} else {
									$comments = wp_kses(__('<span>1</span> comment', 'nikado'), array('span'=>array()));
								}
								$write_comments = '<a href="' . get_comments_link($post->ID) .'">'. $comments.'</a>';
							}
							$html.='<span class="comment">'.$write_comments.'</span>'; 

							$html.='<div class="post-excerpt">';
								$html.= Nikado_Class::nikado_excerpt_by_id($post, $length = $atts['length']);
							$html.='</div>'; 
							$html.='<span class="post-date"><span class="day">'.get_the_date('d ', $post->ID).'</span><span class="month">'.get_the_date('M ', $post->ID).'</span><span class="year">'.get_the_date('Y ', $post->ID).'</span></span>';
							$html.='<a class="readmore" href="'.get_the_permalink($post->ID).'">'.esc_html($nikado_opt['readmore_text']).'</a>';
						 
							
							 
						$html.='</div>';

					$html.='</div>';
				$html.='</div>';
				if ( ( ( 0 == $post_index % $atts['rowsnumber'] || $atts['posts_per_page'] == $post_index ))  ) {
					$html .= '</div>';
				}
			}
	$html.='</div>';

	wp_reset_postdata();
	
	return $html;
}

 
function nikado_magnifier_options($att) {
	$enable_slider 	= get_option('yith_wcmg_enableslider') == 'yes' ? true : false;
			$slider_items = get_option( 'yith_wcmg_slider_items', 3 ); 
			if ( !isset($slider_items) || ( $slider_items == null ) ) $slider_items = 3;
			
	?> 
	<script type="text/javascript" charset="utf-8">
	    var yith_magnifier_options = {
	        enableSlider: <?php if($enable_slider){echo 'true';} else { echo 'false';} ?>,
	        
	        <?php if( $enable_slider ): ?>
	        sliderOptions: {
	            responsive: <?php echo get_option('yith_wcmg_slider_responsive') == 'yes' ? 'true' : 'false' ?>,
	            circular: <?php echo get_option('yith_wcmg_slider_circular') == 'yes' ? 'true' : 'false' ?>,
	            infinite: <?php echo get_option('yith_wcmg_slider_infinite') == 'yes' ? 'true' : 'false' ?>,
	            direction: 'left',
	            debug: false,
	            auto: false,
	            align: 'left',
	            height: 'auto', 
	            //height: "100%", //turn vertical
	            //width: 72,
	            prev    : {
	                button  : "#slider-prev",
	                key     : "left"
	            },
	            next    : {
	                button  : "#slider-next",
	                key     : "right"
	            },
	            //width   : <?php echo yit_shop_single_w() + 18 ?>,
	            scroll : {
	                items     : 1,
	                pauseOnHover: true
	            },
	            items   : {
	                //width: <?php echo yit_shop_thumbnail_w() + 4 ?>,
	                visible: <?php echo apply_filters( 'woocommerce_product_thumbnails_columns', $slider_items ) ?>
	            },
	            swipe : {
	                onTouch:    true,
	                onMouse:    true
	            },
	            mousewheel : {
	                items: 1
	            }
	        },

	        <?php endif ?>
	        
	        showTitle: false,
	        zoomWidth: '<?php echo get_option('yith_wcmg_zoom_width') ?>',
	        zoomHeight: '<?php echo get_option('yith_wcmg_zoom_height') ?>',
	        position: '<?php echo get_option('yith_wcmg_zoom_position') ?>',
	        //tint: <?php //echo get_option('yith_wcmg_tint') == '' ? 'false' : "'".get_option('yith_wcmg_tint')."'" ?>,
	        //tintOpacity: <?php //echo get_option('yith_wcmg_tint_opacity') ?>,
	        lensOpacity: <?php echo get_option('yith_wcmg_lens_opacity') ?>,
	        softFocus: <?php echo get_option('yith_wcmg_softfocus') == 'yes' ? 'true' : 'false' ?>,
	        //smoothMove: <?php //echo get_option('yith_wcmg_smooth') ?>,
	        adjustY: 0,
	        disableRightClick: false,
	        phoneBehavior: '<?php echo get_option('yith_wcmg_zoom_mobile_position') ?>',
	        loadingLabel: '<?php echo stripslashes(get_option('yith_wcmg_loading_label')) ?>'
	    };
	</script>
<?php } ?>