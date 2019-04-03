<?php
   /**
    * nikado functions and definitions
    */
  
   /**
   * Require files
   */
      //TGM-Plugin-Activation
   require_once( get_template_directory().'/class-tgm-plugin-activation.php' );
      //Init the Redux Framework
   if ( class_exists( 'ReduxFramework' ) && !isset( $redux_demo ) && file_exists( get_template_directory().'/theme-config.php' ) ) {
      require_once( get_template_directory().'/theme-config.php' );
   }
      // Theme files
   if ( !class_exists( 'nikado_widgets' ) && file_exists( get_template_directory().'/include/nikadowidgets.php' ) ) {
      require_once( get_template_directory().'/include/nikadowidgets.php' );
   }
   
   if ( !class_exists( 'vertical_menu_widgets' ) && file_exists( get_template_directory().'/include/vertical_menu_widgets.php' ) ) {
      require_once( get_template_directory().'/include/vertical_menu_widgets.php' );
   }
   if ( file_exists( get_template_directory().'/include/wooajax.php' ) ) {
      require_once( get_template_directory().'/include/wooajax.php' );
   }
   if ( file_exists( get_template_directory().'/include/map_shortcodes.php' ) ) {
      require_once( get_template_directory().'/include/map_shortcodes.php' );
   }
   if ( file_exists( get_template_directory().'/include/shortcodes.php' ) ) {
      require_once( get_template_directory().'/include/shortcodes.php' );
   } 
   Class Nikado_Class {
      
      /**
      * Global values
      */
      static function nikado_post_odd_event(){
         global $wp_session;
         
         if(!isset($wp_session["nikado_postcount"])){
            $wp_session["nikado_postcount"] = 0;
         }
         
         $wp_session["nikado_postcount"] = 1 - $wp_session["nikado_postcount"];
         
         return $wp_session["nikado_postcount"];
      }
      static function nikado_post_thumbnail_size($size){
         global $wp_session;
         
         if($size!=''){
            $wp_session["nikado_postthumb"] = $size;
         }
         
         return $wp_session["nikado_postthumb"];
      }
      static function nikado_shop_class($class){
         global $wp_session;
         
         if($class!=''){
            $wp_session["nikado_shopclass"] = $class;
         }
         
         return $wp_session["nikado_shopclass"];
      }
      static function nikado_show_view_mode(){
   
         $nikado_opt = get_option( 'nikado_opt' );
         
         $nikado_viewmode = 'grid-view'; //default value
         
         if(isset($nikado_opt['default_view'])) {
            $nikado_viewmode = $nikado_opt['default_view'];
         }
         if(isset($_GET['view']) && $_GET['view']!=''){
            $nikado_viewmode = $_GET['view'];
         }
         
         return $nikado_viewmode;
      }
      static function nikado_shortcode_products_count(){
         global $wp_session;
         
         $nikado_productsfound = 0;
         if(isset($wp_session["nikado_productsfound"])){
            $nikado_productsfound = $wp_session["nikado_productsfound"];
         }
         
         return $nikado_productsfound;
      }
      
      /**
      * Constructor
      */
      function __construct() {
         // Register action/filter callbacks
         
            //WooCommerce - action/filter
         add_theme_support( 'woocommerce' );
         remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
         remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);
         add_filter( 'get_product_search_form', array($this, 'nikado_woo_search_form'));
         add_filter( 'woocommerce_shortcode_products_query', array($this, 'nikado_woocommerce_shortcode_count'));
         add_action( 'woocommerce_share', array($this, 'nikado_woocommerce_social_share'), 35 );
         add_action( 'woocommerce_archive_description', array($this, 'nikado_woocommerce_category_image'), 2 );
         
            //move message to top
         remove_action( 'woocommerce_before_shop_loop', 'wc_print_notices', 10 );
         add_action( 'woocommerce_show_message', 'wc_print_notices', 10 );
   
            //remove cart total under cross sell
         remove_action( 'woocommerce_cart_collaterals', 'woocommerce_cart_totals', 10 );
         add_action( 'cart_totals', 'woocommerce_cart_totals', 5 );
   
         //remove add to cart button after item
         remove_action('woocommerce_after_shop_loop_item', 'woocommerce_template_loop_add_to_cart', 10);
         
            //Single product organize  
   
         remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
         add_action( 'upsell_products', 'woocommerce_upsell_display', 15 );
         
         
            //WooProjects - Project organize
         remove_action( 'projects_before_single_project_summary', 'projects_template_single_title', 10 );
         add_action( 'projects_single_project_summary', 'projects_template_single_title', 5 );
         remove_action( 'projects_before_single_project_summary', 'projects_template_single_short_description', 20 );
         remove_action( 'projects_before_single_project_summary', 'projects_template_single_gallery', 40 );
         add_action( 'projects_single_project_gallery', 'projects_template_single_gallery', 40 );
         
            //WooProjects - projects list
         remove_action( 'projects_loop_item', 'projects_template_loop_project_title', 20 );
         
            //Theme actions
         add_action( 'after_setup_theme', array($this, 'nikado_setup'));
         add_action( 'tgmpa_register', array($this, 'nikado_register_required_plugins')); 
         add_action( 'widgets_init', array($this, 'nikado_override_woocommerce_widgets'), 15 );
         
         add_action( 'wp_enqueue_scripts', array($this, 'nikado_scripts_styles') );
         add_action( 'wp_head', array($this, 'nikado_custom_code_header'));
         add_action( 'widgets_init', array($this, 'nikado_widgets_init'));
         add_action( 'add_meta_boxes', array($this, 'nikado_add_meta_box'));
         add_action( 'save_post', array($this, 'nikado_save_meta_box_data'));
         add_action('comment_form_before_fields', array($this, 'nikado_before_comment_fields'));
         add_action('comment_form_after_fields', array($this, 'nikado_after_comment_fields'));
         add_action( 'customize_register', array($this, 'nikado_customize_register'));
         add_action( 'customize_preview_init', array($this, 'nikado_customize_preview_js'));
         add_action('init', array($this, 'nikado_remove_redux_framework_notification'));
         add_action('admin_enqueue_scripts', array($this, 'nikado_admin_style'));
         
            //Theme filters
         add_filter( 'woocommerce_get_price_html', array($this, 'nikado_woo_price_html'), 100, 2 );
         add_filter( 'loop_shop_per_page', array($this, 'nikado_woo_change_per_page'), 20 );
         add_filter( 'woocommerce_output_related_products_args', array($this, 'nikado_woo_related_products_limit'));
         add_filter( 'get_search_form', array($this, 'nikado_search_form'));
         add_filter('excerpt_more', array($this, 'nikado_new_excerpt_more'));
         add_filter( 'excerpt_length', array($this, 'nikado_change_excerpt_length'), 999 );
         add_filter('wp_nav_menu_objects', array($this, 'nikado_first_and_last_menu_class'));
         add_filter( 'wp_page_menu_args', array($this, 'nikado_page_menu_args'));
         add_filter('dynamic_sidebar_params', array($this, 'nikado_widget_first_last_class'));
         add_filter('dynamic_sidebar_params', array($this, 'nikado_mega_menu_widget_change'));
         add_filter( 'dynamic_sidebar_params', array($this, 'nikado_put_widget_content'));
         
         //Adding theme support
         if ( ! isset( $content_width ) ) {
            $content_width = 625;
         }
      }
      
      /**
      * Filter callbacks
      * ----------------
      */
      //Change price html
      function nikado_woo_price_html( $price, $product ){
   
         if($product->get_type()=="variable") {
            if($product->get_variation_sale_price() && $product->get_variation_regular_price()!=$product->get_variation_sale_price()){
               $rprice = $product->get_variation_regular_price();
               $sprice = $product->get_variation_sale_price();
               
               return '<span class="special-price">'.( ( is_numeric( $sprice ) ) ? wc_price( $sprice ) : $sprice ) .'</span><span class="old-price">'. ( ( is_numeric( $rprice ) ) ? wc_price( $rprice ) : $rprice ) .'</span>'.$product->get_price_suffix();
            } else {
               $rprice = $product->get_variation_regular_price();
               return '<span class="regular-price">' . ( ( is_numeric( $rprice ) ) ? wc_price( $rprice ) : $rprice ) . '</span>'.$product->get_price_suffix();
            }
         }
         if ( $product->get_price() > 0 ) {
            if ( $product->get_price() && $product->get_regular_price() && ( $product->get_price()!=$product->get_regular_price() )) {
            $rprice = $product->get_regular_price();
            $sprice = $product->get_price();
            return '<span class="special-price">'.( ( is_numeric( $sprice ) ) ? wc_price( $sprice ) : $sprice ) .'</span><span class="old-price">'. ( ( is_numeric( $rprice ) ) ? wc_price( $rprice ) : $rprice ) .'</span>'.$product->get_price_suffix();
            } else {
            $sprice = $product->get_price();
            return '<span class="regular-price">' . ( ( is_numeric( $sprice ) ) ? wc_price( $sprice ) : $sprice ) . '</span>'.$product->get_price_suffix();
            }
         } else {
            return '<span class="regular-price">0</span>'.$product->get_price_suffix();
         }
      }
      // Change products per page
      function nikado_woo_change_per_page() {
         $nikado_opt = get_option( 'nikado_opt' );
         
         return $nikado_opt['product_per_page'];
      }
      //Change number of related products on product page. Set your own value for 'posts_per_page'
      function nikado_woo_related_products_limit( $args ) {
         global $product;
   
         $nikado_opt = get_option( 'nikado_opt' );
   
         $args['posts_per_page'] = $nikado_opt['related_amount'];
   
         return $args;
      }
      // Count number of products from shortcode
      function nikado_woocommerce_shortcode_count( $args ) {
         $nikado_productsfound = new WP_Query($args);
         $nikado_productsfound = $nikado_productsfound->post_count;
         
         global $wp_session;
         
         $wp_session["nikado_productsfound"] = $nikado_productsfound;
         
         return $args;
      }
      //Change search form
      function nikado_search_form( $form ) {
         if(get_search_query()!=''){
            $search_str = get_search_query();
         } else {
            $search_str = esc_html__( 'Search...', 'nikado' );
         }
         
         $form = '<form role="search" method="get" id="blogsearchform" class="searchform" action="' . esc_url(home_url( '/' ) ). '" >
         <div class="form-input">
            <input class="input_text" type="text" value="'.esc_attr($search_str).'" name="s" id="search_input" />
            <button class="button" type="submit" id="blogsearchsubmit">'.esc_html__('search','nikado').'</button>
            </div>
         </form>';
          
         return $form;
      }
      //Change woocommerce search form
      function nikado_woo_search_form( $form ) {
         global $wpdb;
         
         if(get_search_query()!=''){
            $search_str = get_search_query();
         } else {
            $search_str = esc_html__( 'Search product...', 'nikado' );
         }
         
         $form = '<form role="search" method="get" id="searchform" action="'.esc_url( home_url( '/'  ) ).'">';
            $form .= '<div class="form-input">';
               $form .= '<input type="text" value="'.esc_attr($search_str).'" name="s" id="ws" placeholder="" />';
               $form .= '<button class="btn btn-primary" type="submit" id="wsearchsubmit">'.esc_html__('search','nikado').'</button>';
               $form .= '<input type="hidden" name="post_type" value="product" />';
            $form .= '</div>';
         $form .= '</form>';
           
         return $form;
      }
      // Replaces the excerpt "more" text by a link
      function nikado_new_excerpt_more($more) {
         return '';
      }
      //Change excerpt length
      function nikado_change_excerpt_length( $length ) {
         $nikado_opt = get_option( 'nikado_opt' );
         
         if(isset($nikado_opt['excerpt_length'])){
            return $nikado_opt['excerpt_length'];
         }
         
         return 22;
      }
      //Add 'first, last' class to menu
      function nikado_first_and_last_menu_class($items) {
         $items[1]->classes[] = 'first';
         $items[count($items)]->classes[] = 'last';
         return $items;
      }
      /**
       * Filter the page menu arguments.
       *
       * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
       *
       * @since Nikado 1.0
       */
      function nikado_page_menu_args( $args ) {
         if ( ! isset( $args['show_home'] ) )
            $args['show_home'] = true;
         return $args;
      }
      //Add first, last class to widgets
      function nikado_widget_first_last_class($params) {
         global $my_widget_num;
         
         $class = '';
         
         $this_id = $params[0]['id']; // Get the id for the current sidebar we're processing
         $arr_registered_widgets = wp_get_sidebars_widgets(); // Get an array of ALL registered widgets  
   
         if(!$my_widget_num) {// If the counter array doesn't exist, create it
            $my_widget_num = array();
         }
   
         if(!isset($arr_registered_widgets[$this_id]) || !is_array($arr_registered_widgets[$this_id])) { // Check if the current sidebar has no widgets
            return $params; // No widgets in this sidebar... bail early.
         }
   
         if(isset($my_widget_num[$this_id])) { // See if the counter array has an entry for this sidebar
            $my_widget_num[$this_id] ++;
         } else { // If not, create it starting with 1
            $my_widget_num[$this_id] = 1;
         }
   
         if($my_widget_num[$this_id] == 1) { // If this is the first widget
            $class .= ' widget-first ';
         } elseif($my_widget_num[$this_id] == count($arr_registered_widgets[$this_id])) { // If this is the last widget
            $class .= ' widget-last ';
         }
         
         $params[0]['before_widget'] = str_replace('first_last', ' '.$class.' ', $params[0]['before_widget']);
         
         return $params;
      }
      //Change mega menu widget from div to li tag
      function nikado_mega_menu_widget_change($params) {
         
         $sidebar_id = $params[0]['id'];
         
         $pos = strpos($sidebar_id, '_menu_widgets_area_');
         
         if ( !$pos == false ) {
            $params[0]['before_widget'] = '<li class="widget_mega_menu">'.$params[0]['before_widget'];
            $params[0]['after_widget'] = $params[0]['after_widget'].'</li>';
         }
         
         return $params;
      }
      // Push sidebar widget content into a div
      function nikado_put_widget_content( $params ) {
         global $wp_registered_widgets;
   
         if( $params[0]['id']=='sidebar-category' ){
            $settings_getter = $wp_registered_widgets[ $params[0]['widget_id'] ]['callback'][0];
            $settings = $settings_getter->get_settings();
            $settings = $settings[ $params[1]['number'] ];
            
            if($params[0]['widget_name']=="Text" && isset($settings['title']) && $settings['text']=="") { // if text widget and no content => don't push content
               return $params;
            }
            if( isset($settings['title']) && $settings['title']!='' ){
               $params[0][ 'after_title' ] .= '<div class="widget_content">';
               $params[0][ 'after_widget' ] = '</div>'.$params[0][ 'after_widget' ];
            } else {
               $params[0][ 'before_widget' ] .= '<div class="widget_content">';
               $params[0][ 'after_widget' ] = '</div>'.$params[0][ 'after_widget' ];
            }
         }
         
         return $params;
      }
      
      /**
      * Action hooks
      * ----------------
      */
      /**
       * nikado setup.
       *
       * Sets up theme defaults and registers the various WordPress features that
       * nikado supports.
       *
       * @uses load_theme_textdomain() For translation/localization support.
       * @uses add_editor_style() To add a Visual Editor stylesheet.
       * @uses add_theme_support() To add support for post thumbnails, automatic feed links,
       *    custom background, and post formats.
       * @uses register_nav_menu() To add support for navigation menus.
       * @uses set_post_thumbnail_size() To set a custom post thumbnail size.
       *
       * @since Nikado 1.0
       */
      function nikado_setup() {
         /*
          * Makes nikado available for translation.
          *
          * Translations can be added to the /languages/ directory.
          * If you're building a theme based on nikado, use a find and replace
          * to change 'nikado' to the name of your theme in all the template files.
          */
         load_theme_textdomain( 'nikado', get_template_directory() . '/languages' );
   
         // This theme styles the visual editor with editor-style.css to match the theme style.
         add_editor_style();
   
         // Adds RSS feed links to <head> for posts and comments.
         add_theme_support( 'automatic-feed-links' );
   
         // This theme supports a variety of post formats.
         add_theme_support( 'post-formats', array( 'image', 'gallery', 'video', 'audio' ) );
   
         // Register menus  
         register_nav_menu( 'primary', esc_html__( 'Primary Menu', 'nikado' ) );
         register_nav_menu( 'mobilemenu', esc_html__( 'Mobile Menu', 'nikado' ) );
         register_nav_menu( 'categories', esc_html__( 'Categories Menu', 'nikado' ) ); 
   
         /*
          * This theme supports custom background color and image,
          * and here we also set up the default background color.
          */
         add_theme_support( 'custom-background', array(
            'default-color' => 'e6e6e6',
         ) );
   
         /*
          * Let WordPress manage the document title.
          * By adding theme support, we declare that this theme does not use a
          * hard-coded <title> tag in the document head, and expect WordPress to
          * provide it for us.
          */
         add_theme_support( 'title-tag' );
         
         // This theme uses a custom image size for featured images, displayed on "standard" posts.
         add_theme_support( 'post-thumbnails' );
   
         set_post_thumbnail_size( 1170, 9999 ); // Unlimited height, soft crop
         add_image_size( 'nikado-category-thumb', 1170, 520, true ); // (cropped)
         add_image_size( 'nikado-post-thumb', 1170, 674, true ); // (cropped)
         add_image_size( 'nikado-post-thumbwide', 370, 213, true ); // (cropped)
      }
      //Override woocommerce widgets
      function nikado_override_woocommerce_widgets() {
         //Show mini cart on all pages
         if ( class_exists( 'WC_Widget_Cart' ) ) {
            unregister_widget( 'WC_Widget_Cart' ); 
            include_once( get_template_directory().'/woocommerce/class-wc-widget-cart.php' );
            register_widget( 'Custom_WC_Widget_Cart' );
         }
      }
      // Add image to category description
      function nikado_woocommerce_category_image() {
         if ( is_product_category() ){
            global $wp_query;
            
            $cat = $wp_query->get_queried_object();
            $thumbnail_id = get_woocommerce_term_meta( $cat->term_id, 'thumbnail_id', true );
            $image = wp_get_attachment_url( $thumbnail_id );
            
            if ( $image ) {
               echo '<p class="category-image-desc"><img src="' . esc_url($image) . '" alt="" /></p>';
            }
         }
      }
      //Display social sharing on product page
      function nikado_woocommerce_social_share(){
         $nikado_opt = get_option( 'nikado_opt' );
      ?>
<div class="share_buttons">
   <?php if ($nikado_opt['share_code']!='') {
      echo wp_kses($nikado_opt['share_code'], array(
         'div' => array(
            'class' => array()
         ),
         'span' => array(
            'class' => array(),
            'displayText' => array()
         ),
      ));
      } ?>
</div>
<?php
   }
   /**
    * Enqueue scripts and styles for front-end.
    *
    * @since Nikado 1.0
    */
   function nikado_scripts_styles() {
      global $wp_styles, $wp_scripts;
   
      $nikado_opt = get_option( 'nikado_opt' );
      
      /*
       * Adds JavaScript to pages with the comment form to support
       * sites with threaded comments (when in use).
      */
      
      if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
         wp_enqueue_script( 'comment-reply' );
      
      // Add Bootstrap JavaScript
      wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '3.2.0', true );
      
      // Add Slick files
      wp_enqueue_script( 'slick', get_template_directory_uri() . '/js/slick/slick.min.js', array('jquery'), '1.3.15', true );
      wp_enqueue_style( 'slick', get_template_directory_uri() . '/js/slick/slick.css', array(), '1.3.15' );
      
      // Add Chosen js files
      wp_enqueue_script( 'chosen', get_template_directory_uri() . '/js/chosen/chosen.jquery.min.js', array('jquery'), '1.3.0', true );
      wp_enqueue_script( 'chosenproto', get_template_directory_uri() . '/js/chosen/chosen.proto.min.js', array('jquery'), '1.3.0', true );
      wp_enqueue_style( 'chosen', get_template_directory_uri() . '/js/chosen/chosen.min.css', array(), '1.3.0' );
      
      // Add parallax script files
      
      // Add Fancybox
      wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.pack.js', array('jquery'), '2.1.5', true );
      wp_enqueue_script( 'fancybox-buttons', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-buttons.js', array('jquery'), '1.0.5', true );
      wp_enqueue_script( 'fancybox-media', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-media.js', array('jquery'), '1.0.6', true );
      wp_enqueue_script( 'fancybox-thumbs', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-thumbs.js', array('jquery'), '1.0.7', true );
      wp_enqueue_style( 'fancybox-css', get_template_directory_uri() . '/js/fancybox/jquery.fancybox.css', array(), '2.1.5' );
      wp_enqueue_style( 'fancybox-buttons', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-buttons.css', array(), '1.0.5' );
      wp_enqueue_style( 'fancybox-thumbs', get_template_directory_uri() . '/js/fancybox/helpers/jquery.fancybox-thumbs.css', array(), '1.0.7' );
      
      //Superfish
      wp_enqueue_script( 'superfish', get_template_directory_uri() . '/js/superfish/superfish.min.js', array('jquery'), '1.3.15', true );
      
      //Add Shuffle js
      wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/js/modernizr.custom.min.js', array('jquery'), '2.6.2', true );
      wp_enqueue_script( 'shuffle', get_template_directory_uri() . '/js/jquery.shuffle.min.js', array('jquery'), '3.0.0', true );
   
      //Add mousewheel
      wp_enqueue_script( 'mousewheel', get_template_directory_uri() . '/js/jquery.mousewheel.min.js', array('jquery'), '3.1.12', true );
      
      // Add jQuery countdown file
      wp_enqueue_script( 'countdown', get_template_directory_uri() . '/js/jquery.countdown.min.js', array('jquery'), '2.0.4', true );
      
      // Add jQuery counter files
      wp_enqueue_script( 'waypoints', get_template_directory_uri() . '/js/waypoints.min.js', array('jquery'), '1.0', true );
      wp_enqueue_script( 'counterup', get_template_directory_uri() . '/js/jquery.counterup.min.js', array('jquery'), '1.0', true );
      
      // Add variables.js file
      wp_enqueue_script( 'variables-js', get_template_directory_uri() . '/js/variables.js', array('jquery'), '20140826', true );
      
      // Add nikado-theme.js file
      wp_enqueue_script( 'nikado-theme-js', get_template_directory_uri() . '/js/nikado-theme.js', array('jquery'), '20140826', true );
   
      // Add owl-carousel file
      wp_enqueue_script( 'owl-carousel', get_template_directory_uri() . '/js/owl.carousel.js', array('jquery'), '1.3.3', true ); 
      wp_enqueue_script( 'owl-carousel-min', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '1.3.3', true );
   
      $font_url = $this->nikado_get_font_url();
      if ( ! empty( $font_url ) )
         wp_enqueue_style( 'nikado-fonts', esc_url_raw( $font_url ), array(), null );
   
      // Loads our main stylesheet.
      wp_enqueue_style( 'nikado-style', get_stylesheet_uri() );
      
      // Mega Main Menu
      wp_enqueue_style( 'megamenu-css', get_template_directory_uri() . '/css/megamenu_style.css', array(), '2.0.4' );
   
      // Load fontawesome css
      wp_enqueue_style( 'fontawesome', get_template_directory_uri() . '/css/font-awesome.min.css', array(), '4.7.0' );
   
      // Load animate css
      wp_enqueue_style( 'animate', get_template_directory_uri() . '/css/animate.css', array());
   
      // Load Linearicons css
      wp_enqueue_style( 'linearicons', get_template_directory_uri() . '/css/linearicons.css', array(), '1.0.0');
      // Load Elegant css
      wp_enqueue_style( 'Elegant', get_template_directory_uri() . '/css/elegant-icons.css', array());
    
   
       
   
      // Load owl-carousel css
      wp_enqueue_style( 'owl.carousel', get_template_directory_uri() . '/css/owl.carousel.css', array(), '1.3.3');
      
      // Load bootstrap css
      wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), '3.2.0' );
      
      // Compile Less to CSS
      $previewpreset = (isset($_REQUEST['preset']) ? $_REQUEST['preset'] : null);
         //get preset from url (only for demo/preview)
      if($previewpreset){
         $_SESSION["preset"] = $previewpreset;
      }
      $presetopt = 1;
      if(!isset($_SESSION["preset"])){
         $_SESSION["preset"] = 1;
      }
      if($_SESSION["preset"] != 1) {
         $presetopt = $_SESSION["preset"];
      } else { /* if no preset varialbe found in url, use from theme options */
         if(isset($nikado_opt['preset_option'])){
            $presetopt = $nikado_opt['preset_option'];
         }
      }
      if(!isset($presetopt)) $presetopt = 1; /* in case first time install theme, no options found */
      
      if(isset($nikado_opt['enable_less'])){
         if($nikado_opt['enable_less']){
            $themevariables = array(
               'body_font'=> $nikado_opt['bodyfont']['font-family'],
               'text_color'=> $nikado_opt['bodyfont']['color'],
               'text_selected_bg' => $nikado_opt['text_selected_bg'],
               'text_selected_color' => $nikado_opt['text_selected_color'],
               'text_size'=> $nikado_opt['bodyfont']['font-size'],
               'border_color'=> $nikado_opt['border_color']['border-color'],
               'background_opt'=> $nikado_opt['background_opt']['background-color'],
               
               'heading_font'=> $nikado_opt['headingfont']['font-family'],
               'heading_color'=> $nikado_opt['headingfont']['color'],
               'heading_font_weight'=> $nikado_opt['headingfont']['font-weight'],
               
               'menu_font'=> $nikado_opt['menufont']['font-family'],
               'menu_color'=> $nikado_opt['menufont']['color'],
               'menu_font_size'=> $nikado_opt['menufont']['font-size'],
               'menu_font_weight'=> $nikado_opt['menufont']['font-weight'],
               'sub_menu_bg' => $nikado_opt['sub_menu_bg'],
               'sub_menu_color' => $nikado_opt['sub_menu_color'],
               
               'link_color' => $nikado_opt['link_color']['regular'],
               'link_hover_color' => $nikado_opt['link_color']['hover'],
               'link_active_color' => $nikado_opt['link_color']['active'],
               
               'primary_color' => $nikado_opt['primary_color'],
               
               'sale_color' => $nikado_opt['sale_color'],
               'saletext_color' => $nikado_opt['saletext_color'],
               'rate_color' => $nikado_opt['rate_color'],
   
               'topbar_color' => $nikado_opt['topbar_color'],
               'topbar_link_color' => $nikado_opt['topbar_link_color']['regular'],
               'topbar_link_hover_color' => $nikado_opt['topbar_link_color']['hover'],
               'topbar_link_active_color' => $nikado_opt['topbar_link_color']['active'],
   
               'header_color' => $nikado_opt['header_color'],
               'header_link_color' => $nikado_opt['header_link_color']['regular'],
               'header_link_hover_color' => $nikado_opt['header_link_color']['hover'],
               'header_link_active_color' => $nikado_opt['header_link_color']['active'],
   
               'price_font'=> $nikado_opt['pricefont']['font-family'],
               'price_color'=> $nikado_opt['pricefont']['color'], 
               'price_size'=> $nikado_opt['pricefont']['font-size'],
               'price_font_weight'=> $nikado_opt['pricefont']['font-weight'],
   
               'footer_color' => $nikado_opt['footer_color'],
               'footer_link_color' => $nikado_opt['footer_link_color']['regular'],
               'footer_link_hover_color' => $nikado_opt['footer_link_color']['hover'],
               'footer_link_active_color' => $nikado_opt['footer_link_color']['active'],
            );
            
            if(isset($nikado_opt['header_sticky_bg']['rgba']) && $nikado_opt['header_sticky_bg']['rgba']!="") {
               $themevariables['header_sticky_bg'] = $nikado_opt['header_sticky_bg']['rgba'];
            } else {
               $themevariables['header_sticky_bg'] = 'rgba(68,68,68,0.95)';
            }
            if(isset($nikado_opt['header_bg']['background-color']) && $nikado_opt['header_bg']['background-color']!="") {
               $themevariables['header_bg'] = $nikado_opt['header_bg']['background-color'];
            } else {
               $themevariables['header_bg'] = '#fff';
            }
            if(isset($nikado_opt['page_content_background']['background-color']) && $nikado_opt['page_content_background']['background-color']!="") {
               $themevariables['page_content_background'] = $nikado_opt['page_content_background']['background-color'];
            } else {
               $themevariables['page_content_background'] = '#fff';
            }
            if(isset($nikado_opt['footer_bg']['background-color']) && $nikado_opt['footer_bg']['background-color']!="") {
               $themevariables['footer_bg'] = $nikado_opt['footer_bg']['background-color'];
            } else {
               $themevariables['footer_bg'] = '#282727';
            }
            switch ($presetopt) { 
               case 3:  
                  $themevariables['header_sticky_bg'] = '#fff';
                  $themevariables['menu_color'] = '#333745';  
               break; 
                
            }
   
            if(function_exists('compileLessFile')){
               compileLessFile('reset.less', 'reset'.$presetopt.'.css', $themevariables);
               compileLessFile('global.less', 'global'.$presetopt.'.css', $themevariables);
               compileLessFile('pages.less', 'pages'.$presetopt.'.css', $themevariables);
               compileLessFile('woocommerce.less', 'woocommerce'.$presetopt.'.css', $themevariables);
               compileLessFile('portfolio.less', 'portfolio'.$presetopt.'.css', $themevariables);
               compileLessFile('layouts.less', 'layouts'.$presetopt.'.css', $themevariables);
               compileLessFile('responsive.less', 'responsive'.$presetopt.'.css', $themevariables);
            }
         }
      }
      
      // Load main theme css style files
      wp_enqueue_style( 'nikado-css-reset', get_template_directory_uri() . '/css/reset'.$presetopt.'.css', array('bootstrap'), '1.0.0' );
      wp_enqueue_style( 'nikado-css-global', get_template_directory_uri() . '/css/global'.$presetopt.'.css', array('nikado-css-reset'), '1.0.0' );
      wp_enqueue_style( 'nikado-css-pages', get_template_directory_uri() . '/css/pages'.$presetopt.'.css', array('nikado-css-global'), '1.0.0' );
      wp_enqueue_style( 'nikado-css-woocommerce', get_template_directory_uri() . '/css/woocommerce'.$presetopt.'.css', array('nikado-css-pages'), '1.0.0' );
      wp_enqueue_style( 'nikado-css-portfolio', get_template_directory_uri() . '/css/portfolio'.$presetopt.'.css', array('nikado-css-woocommerce'), '1.0.0' );
      wp_enqueue_style( 'nikado-css-layouts', get_template_directory_uri() . '/css/layouts'.$presetopt.'.css', array('nikado-css-portfolio'), '1.0.0' );
      wp_enqueue_style( 'nikado-css-responsive', get_template_directory_uri() . '/css/responsive'.$presetopt.'.css', array('nikado-css-layouts'), '1.0.0' );
      wp_enqueue_style( 'nikado-css-custom', get_template_directory_uri() . '/css/opt_css.css', array('nikado-css-responsive'), '1.0.0' );
      
      if(function_exists('WP_Filesystem')){
         if ( ! WP_Filesystem() ) {
            $url = wp_nonce_url();
            request_filesystem_credentials($url, '', true, false, null);
         }
         
         global $wp_filesystem;
         //add custom css, sharing code to header
         if($wp_filesystem->exists(get_template_directory(). '/css/opt_css.css')){
            $customcss = $wp_filesystem->get_contents(get_template_directory(). '/css/opt_css.css');
            
            if(isset($nikado_opt['custom_css']) && $customcss!=$nikado_opt['custom_css']){ //if new update, write file content
               $wp_filesystem->put_contents(
                  get_template_directory(). '/css/opt_css.css',
                  $nikado_opt['custom_css'],
                  FS_CHMOD_FILE // predefined mode settings for WP files
               );
            }
         } else {
            $wp_filesystem->put_contents(
               get_template_directory(). '/css/opt_css.css',
               $nikado_opt['custom_css'],
               FS_CHMOD_FILE // predefined mode settings for WP files
            );
         }
      }
      
      //add javascript variables
      ob_start(); ?>
var nikado_brandnumber = <?php if(isset($nikado_opt['brandnumber'])) { echo esc_js($nikado_opt['brandnumber']); } else { echo '6'; } ?>,
nikado_brandscrollnumber = <?php if(isset($nikado_opt['brandscrollnumber'])) { echo esc_js($nikado_opt['brandscrollnumber']); } else { echo '2';} ?>,
nikado_brandpause = <?php if(isset($nikado_opt['brandpause'])) { echo esc_js($nikado_opt['brandpause']); } else { echo '3000'; } ?>,
nikado_brandanimate = <?php if(isset($nikado_opt['brandanimate'])) { echo esc_js($nikado_opt['brandanimate']); } else { echo '700';} ?>;
var nikado_brandscroll = false;
<?php if(isset($nikado_opt['brandscroll'])){ ?>
nikado_brandscroll = <?php echo esc_js($nikado_opt['brandscroll'])==1 ? 'true': 'false'; ?>;
<?php } ?>
var nikado_categoriesnumber = <?php if(isset($nikado_opt['categoriesnumber'])) { echo esc_js($nikado_opt['categoriesnumber']); } else { echo '6'; } ?>,
nikado_categoriesscrollnumber = <?php if(isset($nikado_opt['categoriesscrollnumber'])) { echo esc_js($nikado_opt['categoriesscrollnumber']); } else { echo '2';} ?>,
nikado_categoriespause = <?php if(isset($nikado_opt['categoriespause'])) { echo esc_js($nikado_opt['categoriespause']); } else { echo '3000'; } ?>,
nikado_categoriesanimate = <?php if(isset($nikado_opt['categoriesanimate'])) { echo esc_js($nikado_opt['categoriesanimate']); } else { echo '700';} ?>;
var nikado_categoriesscroll = 'false';
<?php if(isset($nikado_opt['categoriesscroll'])){ ?>
nikado_categoriesscroll = <?php echo esc_js($nikado_opt['categoriesscroll'])==1 ? 'true': 'false'; ?>;
<?php } ?>
var nikado_blogpause = <?php if(isset($nikado_opt['blogpause'])) { echo esc_js($nikado_opt['blogpause']); } else { echo '3000'; } ?>,
nikado_bloganimate = <?php if(isset($nikado_opt['bloganimate'])) { echo esc_js($nikado_opt['bloganimate']); } else { echo '700'; } ?>;
var nikado_blogscroll = false;
<?php if(isset($nikado_opt['blogscroll'])){ ?>
nikado_blogscroll = <?php echo esc_js($nikado_opt['blogscroll'])==1 ? 'true': 'false'; ?>;
<?php } ?>
var nikado_testipause = <?php if(isset($nikado_opt['testipause'])) { echo esc_js($nikado_opt['testipause']); } else { echo '3000'; } ?>,
nikado_testianimate = <?php if(isset($nikado_opt['testianimate'])) { echo esc_js($nikado_opt['testianimate']); } else { echo '700'; } ?>;
var nikado_testiscroll = false;
<?php if(isset($nikado_opt['testiscroll'])){ ?>
nikado_testiscroll = <?php echo esc_js($nikado_opt['testiscroll'])==1 ? 'true': 'false'; ?>;
<?php } ?>
var nikado_catenumber = <?php if(isset($nikado_opt['catenumber'])) { echo esc_js($nikado_opt['catenumber']); } else { echo '6'; } ?>,
nikado_catescrollnumber = <?php if(isset($nikado_opt['catescrollnumber'])) { echo esc_js($nikado_opt['catescrollnumber']); } else { echo '2';} ?>,
nikado_catepause = <?php if(isset($nikado_opt['catepause'])) { echo esc_js($nikado_opt['catepause']); } else { echo '3000'; } ?>,
nikado_cateanimate = <?php if(isset($nikado_opt['cateanimate'])) { echo esc_js($nikado_opt['cateanimate']); } else { echo '700';} ?>;
var nikado_catescroll = false;
<?php if(isset($nikado_opt['catescroll'])){ ?>
nikado_catescroll = <?php echo esc_js($nikado_opt['catescroll'])==1 ? 'true': 'false'; ?>;
<?php } ?>
var nikado_menu_number = <?php if(isset($nikado_opt['categories_menu_items'])) { echo esc_js((int)$nikado_opt['categories_menu_items']+1); } else { echo '9';} ?>;
var nikado_sticky_header = false;
<?php if(isset($nikado_opt['sticky_header'])){ ?>
nikado_sticky_header = <?php echo esc_js($nikado_opt['sticky_header'])==1 ? 'true': 'false'; ?>;
<?php } ?>
jQuery(document).ready(function(){
jQuery("#ws").focus(function(){
if(jQuery(this).val()=="<?php echo esc_html__( 'Search product...', 'nikado' )?>"){
jQuery(this).val("");
}
});
jQuery("#ws").focusout(function(){
if(jQuery(this).val()==""){
jQuery(this).val("<?php echo esc_html__( 'Search product...', 'nikado' )?>");
}
});
jQuery("#wsearchsubmit").click(function(){
if(jQuery("#ws").val()=="<?php echo esc_html__( 'Search product...', 'nikado' )?>" || jQuery("#ws").val()==""){
jQuery("#ws").focus();
return false;
}
});
jQuery("#search_input").focus(function(){
if(jQuery(this).val()=="<?php echo esc_html__( 'Search...', 'nikado' )?>"){
jQuery(this).val("");
}
});
jQuery("#search_input").focusout(function(){
if(jQuery(this).val()==""){
jQuery(this).val("<?php echo esc_html__( 'Search...', 'nikado' )?>");
}
});
jQuery("#blogsearchsubmit").click(function(){
if(jQuery("#search_input").val()=="<?php echo esc_html__( 'Search...', 'nikado' )?>" || jQuery("#search_input").val()==""){
jQuery("#search_input").focus();
return false;
}
});
});
<?php
   $jsvars = ob_get_contents();
   ob_end_clean();
   
   if(function_exists('WP_Filesystem')){
      if($wp_filesystem->exists(get_template_directory(). '/js/variables.js')){
         $jsvariables = $wp_filesystem->get_contents(get_template_directory(). '/js/variables.js');
         
         if($jsvars!=$jsvariables){ //if new update, write file content
            $wp_filesystem->put_contents(
               get_template_directory(). '/js/variables.js',
               $jsvars,
               FS_CHMOD_FILE // predefined mode settings for WP files
            );
         }
      } else {
         $wp_filesystem->put_contents(
            get_template_directory(). '/js/variables.js',
            $jsvars,
            FS_CHMOD_FILE // predefined mode settings for WP files
         );
      }
   }
   //add css for footer, header templates
   $jscomposer_templates_args = array(
      'orderby'          => 'title',
      'order'            => 'ASC',
      'post_type'        => 'templatera',
      'post_status'      => 'publish',
      'posts_per_page'   => 30,
   );
   $jscomposer_templates = get_posts( $jscomposer_templates_args );
   
   if(count($jscomposer_templates) > 0) {
      foreach($jscomposer_templates as $jscomposer_template){
         if($jscomposer_template->post_title == $nikado_opt['header_layout'] || $jscomposer_template->post_title == $nikado_opt['footer_layout']){
            $jscomposer_template_css = get_post_meta ( $jscomposer_template->ID, '_wpb_shortcodes_custom_css', false );
            wp_add_inline_style( 'nikado-css-custom', $jscomposer_template_css[0] );
         }
      }
   }
   
   //page width
   wp_add_inline_style( 'nikado-css-custom', '.wrapper.box-layout, .wrapper.box-layout .container, .wrapper.box-layout .row-container {max-width: '.$nikado_opt['box_layout_width'].'px;}' );
   }
   
   //add sharing code to header
   function nikado_custom_code_header() {
   global $nikado_opt;
   
   if ( isset($nikado_opt['share_head_code']) && $nikado_opt['share_head_code']!='') {
      echo wp_kses($nikado_opt['share_head_code'], array(
         'script' => array(
            'type' => array(),
            'src' => array(),
            'async' => array()
         ),
      ));
   }
   }
   /**
   * Register sidebars.
   *
   * Registers our main widget area and the front page widget areas.
   *
   * @since Nikado 1.0
   */
   function nikado_widgets_init() {
   $nikado_opt = get_option( 'nikado_opt' );
   
   register_sidebar( array(
      'name' => esc_html__( 'Blog Sidebar', 'nikado' ),
      'id' => 'sidebar-1',
      'description' => esc_html__( 'Sidebar on blog page', 'nikado' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title"><span>',
      'after_title' => '</span></h3>',
   ) );
   
   register_sidebar( array(
      'name' => esc_html__( 'Shop Sidebar', 'nikado' ),
      'id' => 'sidebar-shop',
      'description' => esc_html__( 'Sidebar on shop page (only sidebar shop layout)', 'nikado' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title"><span>',
      'after_title' => '</span></h3>',
   ) );
   
   register_sidebar( array(
      'name' => esc_html__( 'Pages Sidebar', 'nikado' ),
      'id' => 'sidebar-page',
      'description' => esc_html__( 'Sidebar on content pages', 'nikado' ),
      'before_widget' => '<aside id="%1$s" class="widget %2$s">',
      'after_widget' => '</aside>',
      'before_title' => '<h3 class="widget-title"><span>',
      'after_title' => '</span></h3>',
   ) );
   
   if(isset($nikado_opt['custom-sidebars']) && $nikado_opt['custom-sidebars']!=""){
      foreach($nikado_opt['custom-sidebars'] as $sidebar){
         $sidebar_id = str_replace(' ', '-', strtolower($sidebar));
         
         if($sidebar_id!='') {
            register_sidebar( array(
               'name' => $sidebar,
               'id' => $sidebar_id,
               'description' => $sidebar,
               'before_widget' => '<aside id="%1$s" class="widget %2$s">',
               'after_widget' => '</aside>',
               'before_title' => '<h3 class="widget-title"><span>',
               'after_title' => '</span></h3>',
            ) );
         }
      }
   }
   }
   static function nikado_meta_box_callback( $post ) {
   
   // Add an nonce field so we can check for it later.
   wp_nonce_field( 'nikado_meta_box', 'nikado_meta_box_nonce' );
   
   /*
    * Use get_post_meta() to retrieve an existing value
    * from the database and use the value for the form.
    */
   $value = get_post_meta( $post->ID, '_nikado_post_intro', true );
   
   echo '<label for="nikado_post_intro">';
   esc_html_e( 'This content will be used to replace the featured image, use shortcode here', 'nikado' );
   echo '</label><br />';
   wp_editor( $value, 'nikado_post_intro', $settings = array() );
   }
   static function nikado_custom_sidebar_callback( $post ) {
   global $wp_registered_sidebars;
   
   $nikado_opt = get_option( 'nikado_opt' );
   
   // Add an nonce field so we can check for it later.
   wp_nonce_field( 'nikado_meta_box', 'nikado_meta_box_nonce' );
   
   /*
    * Use get_post_meta() to retrieve an existing value
    * from the database and use the value for the form.
    */
   
   //show sidebar dropdown select
   $csidebar = get_post_meta( $post->ID, '_nikado_custom_sidebar', true );
   
   echo '<label for="nikado_custom_sidebar">';
   esc_html_e( 'Select a custom sidebar for this post/page', 'nikado' );
   echo '</label><br />';
   
   echo '<select id="nikado_custom_sidebar" name="nikado_custom_sidebar">';
      echo '<option value="">'.esc_html__('- None -', 'nikado').'</option>';
      foreach($wp_registered_sidebars as $sidebar){
         $sidebar_id = $sidebar['id'];
         if($csidebar == $sidebar_id){
            echo '<option value="'.$sidebar_id.'" selected="selected">'.$sidebar['name'].'</option>';
         } else {
            echo '<option value="'.$sidebar_id.'">'.$sidebar['name'].'</option>';
         }
      }
   echo '</select><br />';
   
   //show custom sidebar position
   $csidebarpos = get_post_meta( $post->ID, '_nikado_custom_sidebar_pos', true );
   
   echo '<label for="nikado_custom_sidebar_pos">';
   esc_html_e( 'Sidebar position', 'nikado' );
   echo '</label><br />';
   
   echo '<select id="nikado_custom_sidebar_pos" name="nikado_custom_sidebar_pos">'; ?>
<option value="left" <?php if($csidebarpos == 'left') {echo 'selected="selected"';}?>><?php echo esc_html__('Left', 'nikado'); ?></option>
<option value="right" <?php if($csidebarpos == 'right') {echo 'selected="selected"';}?>><?php echo esc_html__('Right', 'nikado'); ?></option>
<?php echo '</select>';
   }
   
   function nikado_add_meta_box() {
   
      $screens = array( 'post', 'page' );
   
      foreach ( $screens as $screen ) {
         if($screen == 'post'){
            add_meta_box(
               'nikado_post_intro_section',
               esc_html__( 'Post featured content', 'nikado' ),
               'Nikado_Class::nikado_meta_box_callback',
               $screen
            );
            add_meta_box(
               'nikado_custom_sidebar',
               esc_html__( 'Custom Sidebar', 'nikado' ),
               'Nikado_Class::nikado_custom_sidebar_callback',
               $screen
            );
         }
         if($screen == 'page'){
            add_meta_box(
               'nikado_custom_sidebar',
               esc_html__( 'Custom Sidebar', 'nikado' ),
               'Nikado_Class::nikado_custom_sidebar_callback',
               $screen
            );
         }
      }
   }
   function nikado_save_meta_box_data( $post_id ) {
   
      /*
       * We need to verify this came from our screen and with proper authorization,
       * because the save_post action can be triggered at other times.
       */
   
      // Check if our nonce is set.
      if ( ! isset( $_POST['nikado_meta_box_nonce'] ) ) {
         return;
      }
   
      // Verify that the nonce is valid.
      if ( ! wp_verify_nonce( $_POST['nikado_meta_box_nonce'], 'nikado_meta_box' ) ) {
         return;
      }
   
      // If this is an autosave, our form has not been submitted, so we don't want to do anything.
      if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
         return;
      }
   
      // Check the user's permissions.
      if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
   
         if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
         }
   
      } else {
   
         if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
         }
      }
   
      /* OK, it's safe for us to save the data now. */
      
      // Make sure that it is set.
      if ( ! ( isset( $_POST['nikado_post_intro'] ) || isset( $_POST['nikado_custom_sidebar'] ) ) )  {
         return;
      }
   
      // Sanitize user input.
      $my_data = sanitize_text_field( $_POST['nikado_post_intro'] );
      // Update the meta field in the database.
      update_post_meta( $post_id, '_nikado_post_intro', $my_data );
   
      // Sanitize user input.
      $my_data = sanitize_text_field( $_POST['nikado_custom_sidebar'] );
      // Update the meta field in the database.
      update_post_meta( $post_id, '_nikado_custom_sidebar', $my_data );
   
      // Sanitize user input.
      $my_data = sanitize_text_field( $_POST['nikado_custom_sidebar_pos'] );
      // Update the meta field in the database.
      update_post_meta( $post_id, '_nikado_custom_sidebar_pos', $my_data );
      
   }
   //Change comment form
   function nikado_before_comment_fields() {
      echo '<div class="comment-input">';
   }
   function nikado_after_comment_fields() {
      echo '</div>';
   }
   /**
    * Register postMessage support.
    *
    * Add postMessage support for site title and description for the Customizer.
    *
    * @since Nikado 1.0
    *
    * @param WP_Customize_Manager $wp_customize Customizer object.
    */
   function nikado_customize_register( $wp_customize ) {
      $wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
      $wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
      $wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
   }
   /**
    * Enqueue Javascript postMessage handlers for the Customizer.
    *
    * Binds JS handlers to make the Customizer preview reload changes asynchronously.
    *
    * @since Nikado 1.0
    */
   function nikado_customize_preview_js() {
      wp_enqueue_script( 'nikado-customizer', get_template_directory_uri() . '/js/theme-customizer.js', array( 'customize-preview' ), '20130301', true );
   }
   // Remove Redux Ads, Notification
   function nikado_remove_redux_framework_notification() {
      if ( class_exists('ReduxFrameworkPlugin') ) {
         remove_filter( 'plugin_row_meta', array( ReduxFrameworkPlugin::get_instance(), 'plugin_metalinks'), null, 2 );
      }
      if ( class_exists('ReduxFrameworkPlugin') ) {
         remove_action('admin_notices', array( ReduxFrameworkPlugin::get_instance(), 'admin_notices' ) );    
      }
   }
   function nikado_admin_style() {
     wp_enqueue_style('admin-styles', get_template_directory_uri().'/css/admin.css');
   }
   /**
   * Utility methods
   * ---------------
   */
   
   //Add breadcrumbs
   static function nikado_breadcrumb() {
      global $post;
   
      $nikado_opt = get_option( 'nikado_opt' );
      
      $brseparator = '<span class="separator">/</span>';
      if (!is_home()) {
         echo '<div class="breadcrumbs">';
         
         echo '<a href="';
         echo esc_url( home_url( '/' ));
         echo '">';
         echo esc_html__('Home', 'nikado');
         echo '</a>'.$brseparator;
         if (is_category() || is_single()) {
            the_category($brseparator);
            if (is_single()) {
               echo ''.$brseparator;
               the_title();
            }
         } elseif (is_page()) {
            if($post->post_parent){
               $anc = get_post_ancestors( $post->ID );
               $title = get_the_title();
               foreach ( $anc as $ancestor ) {
                  $output = '<a href="'.get_permalink($ancestor).'" title="'.get_the_title($ancestor).'">'.get_the_title($ancestor).'</a>'.$brseparator;
               }
               echo wp_kses($output, array(
                     'a'=>array(
                        'href' => array(),
                        'title' => array()
                     ),
                     'span'=>array(
                        'class'=>array()
                     )
                  )
               );
               echo '<span title="'.$title.'"> '.$title.'</span>';
            } else {
               echo '<span> '.get_the_title().'</span>';
            }
         }
         elseif (is_tag()) {single_tag_title();}
         elseif (is_day()) {printf( esc_html__( 'Archive for: %s', 'nikado' ), '<span>' . get_the_date() . '</span>' );}
         elseif (is_month()) {printf( esc_html__( 'Archive for: %s', 'nikado' ), '<span>' . get_the_date( _x( 'F Y', 'monthly archives date format', 'nikado' ) ) . '</span>' );}
         elseif (is_year()) {printf( esc_html__( 'Archive for: %s', 'nikado' ), '<span>' . get_the_date( _x( 'Y', 'yearly archives date format', 'nikado' ) ) . '</span>' );}
         elseif (is_author()) {echo "<span>".esc_html__('Archive for','nikado'); echo'</span>';}
         elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<span>".esc_html__('Blog Archives','nikado'); echo'</span>';}
         elseif (is_search()) {echo "<span>".esc_html__('Search Results','nikado'); echo'</span>';}
         
         echo '</div>';
      } else {
         echo '<div class="breadcrumbs">';
         
         echo '<a href="';
         echo esc_url( home_url( '/' ) );
         echo '">';
         echo esc_html__('Home', 'nikado');
         echo '</a>'.$brseparator;
         
         if(isset($nikado_opt['blog_header_text']) && $nikado_opt['blog_header_text']!=""){
            echo esc_html($nikado_opt['blog_header_text']);
         } else {
            echo esc_html__('Blog', 'nikado');
         }
         
         echo '</div>';
      }
   }
   static function nikado_limitStringByWord ($string, $maxlength, $suffix = '') {
   
      if(function_exists( 'mb_strlen' )) {
         // use multibyte functions by Iysov
         if(mb_strlen( $string )<=$maxlength) return $string;
         $string = mb_substr( $string, 0, $maxlength );
         $index = mb_strrpos( $string, ' ' );
         if($index === FALSE) {
            return $string;
         } else {
            return mb_substr( $string, 0, $index ).$suffix;
         }
      } else { // original code here
         if(strlen( $string )<=$maxlength) return $string;
         $string = substr( $string, 0, $maxlength );
         $index = strrpos( $string, ' ' );
         if($index === FALSE) {
            return $string;
         } else {
            return substr( $string, 0, $index ).$suffix;
         }
      }
   }
   static function nikado_excerpt_by_id($post, $length = 10, $tags = '<a><em><strong>') {
   
      if(is_int($post)) {
         // get the post object of the passed ID
         $post = get_post($post);
      } elseif(!is_object($post)) {
         return false;
      }
    
      if(has_excerpt($post->ID)) {
         $the_excerpt = $post->post_excerpt;
         return apply_filters('the_content', $the_excerpt);
      } else {
         $the_excerpt = $post->post_content;
      }
    
      $the_excerpt = strip_shortcodes(strip_tags($the_excerpt), $tags);
      $the_excerpt = preg_split('/\b/', $the_excerpt, $length * 2+1);
      $excerpt_waste = array_pop($the_excerpt);
      $the_excerpt = implode($the_excerpt);
    
      return apply_filters('the_content', $the_excerpt);
   }
   /**
    * Return the Google font stylesheet URL if available.
    *
    * The use of Open Sans by default is localized. For languages that use
    * characters not supported by the font, the font can be disabled.
    *
    * @since nikado 1.2
    *
    * @return string Font stylesheet or empty string if disabled.
    */
   function nikado_get_font_url() {
      $fonts_url = '';
       
      /* Translators: If there are characters in your language that are not
      * supported by Open Sans, translate this to 'off'. Do not translate
      * into your own language.
      */
      $open_sans = _x( 'on', 'Open Sans font: on or off', 'nikado' );
       
      if ( 'off' !== $open_sans ) {
         $font_families = array();
   
         if ( 'off' !== $open_sans ) {
            $font_families[] = 'Open Sans:700italic,400,800,600';
         }
         
         $query_args = array(
            'family' => urlencode( implode( '|', $font_families ) ),
            'subset' => urlencode( 'latin,latin-ext' ),
         );
          
         $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
      }
       
      return esc_url_raw( $fonts_url );
   }
   /**
    * Displays navigation to next/previous pages when applicable.
    *
    * @since Nikado 1.0
    */
   static function nikado_content_nav( $html_id ) {
      global $wp_query;
   
      $html_id = esc_attr( $html_id );
   
      if ( $wp_query->max_num_pages > 1 ) : ?>
<nav id="<?php echo esc_attr($html_id); ?>" class="navigation" role="navigation">
   <h3 class="assistive-text"><?php esc_html_e( 'Post navigation', 'nikado' ); ?></h3>
   <div class="nav-previous"><?php next_posts_link( wp_kses(__( '<span class="meta-nav">&larr;</span> Older posts', 'nikado' ),array('span'=>array('class'=>array())) )); ?></div>
   <div class="nav-next"><?php previous_posts_link( wp_kses(__( 'Newer posts <span class="meta-nav">&rarr;</span>', 'nikado' ), array('span'=>array('class'=>array())) )); ?></div>
</nav>
<?php endif;
   }
   /* Pagination */
   static function nikado_pagination() {
      global $wp_query;
   
      $big = 999999999; // need an unlikely integer
      
      echo paginate_links( array(
         'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
         'format' => '?paged=%#%',
         'current' => max( 1, get_query_var('paged') ),
         'total' => $wp_query->max_num_pages,
         'prev_text'    => esc_html__('Previous', 'nikado'),
         'next_text'    =>esc_html__('Next', 'nikado'),
      ) );
   }
   /**
    * Template for comments and pingbacks.
    *
    * To override this walker in a child theme without modifying the comments template
    * simply create your own nikado_comment(), and that function will be used instead.
    *
    * Used as a callback by wp_list_comments() for displaying the comments.
    *
    * @since Nikado 1.0
    */
   static function nikado_comment( $comment, $args, $depth ) {
      $GLOBALS['comment'] = $comment;
      switch ( $comment->comment_type ) :
         case 'pingback' :
         case 'trackback' :
         // Display trackbacks differently than normal comments.
      ?>
<li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
   <p><?php esc_html_e( 'Pingback:', 'nikado' ); ?> <?php comment_author_link(); ?> <?php edit_comment_link( esc_html__( '(Edit)', 'nikado' ), '<span class="edit-link">', '</span>' ); ?></p>
   <?php
      break;
      default :
      // Proceed with normal comments.
      global $post;
      ?>
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
   <article id="comment-<?php comment_ID(); ?>" class="comment">
      <div class="comment-avatar">
         <?php echo get_avatar( $comment, 50 ); ?>
      </div>
      <div class="comment-info">
         <header class="comment-meta comment-author vcard">
            <?php
               printf( '<cite><b class="fn">%1$s</b> %2$s</cite>',
                  get_comment_author_link(),
                  // If current post author is also comment author, make it known visually.
                  ( $comment->user_id === $post->post_author ) ? '<span>' . esc_html__( 'Post author', 'nikado' ) . '</span>' : ''
               );
               printf( '<time datetime="%1$s">%2$s</time>',
                  get_comment_time( 'c' ),
                  /* translators: 1: date, 2: time */
                  sprintf( esc_html__( '%1$s at %2$s', 'nikado' ), get_comment_date(), get_comment_time() )
               );
               ?>
            <div class="reply">
               <?php comment_reply_link( array_merge( $args, array( 'reply_text' => esc_html__( 'Reply', 'nikado' ), 'after' => '', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
            </div>
            <!-- .reply -->
         </header>
         <!-- .comment-meta -->
         <?php if ( '0' == $comment->comment_approved ) : ?>
         <p class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'nikado' ); ?></p>
         <?php endif; ?>
         <section class="comment-content comment">
            <?php comment_text(); ?>
            <?php edit_comment_link( esc_html__( 'Edit', 'nikado' ), '<p class="edit-link">', '</p>' ); ?>
         </section>
         <!-- .comment-content -->
      </div>
   </article>
   <!-- #comment-## -->
   <?php
      break;
      endswitch; // end comment_type check
      }
      /**
      * Set up post entry meta.
      *
      * Prints HTML with meta information for current post: categories, tags, permalink, author, and date.
      *
      * Create your own nikado_entry_meta() to override in a child theme.
      *
      * @since Nikado 1.0
      */
      static function nikado_entry_meta() {
      
      // Translators: used between list items, there is a space after the comma.
      $tag_list = get_the_tag_list( '', ', ' );
      
      $num_comments = (int)get_comments_number();
      $write_comments = '';
      if ( comments_open() ) {
      if ( $num_comments == 0 ) {
         $comments = esc_html__('0 comments', 'nikado');
      } elseif ( $num_comments > 1 ) {
         $comments = $num_comments . esc_html__(' comments', 'nikado');
      } else {
         $comments = esc_html__('1 comment', 'nikado');
      }
      $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
      }
      
      $utility_text = esc_html__( '%1$s Tags: %2$s', 'nikado' );
      
      printf( $utility_text, $write_comments, $tag_list);
      }
      static function nikado_entry_meta_small() {
      
      // Translators: used between list items, there is a space after the comma.
      $categories_list = get_the_category_list(', ');
      
      $author = sprintf( '<span class="author vcard"><a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
      esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
      esc_attr( sprintf( wp_kses(__( 'View all posts by %s', 'nikado' ), array('a'=>array())), get_the_author() ) ),
      get_the_author()
      );
      
      $utility_text = esc_html__( 'Posted by %1$s  %2$s', 'nikado' );
      
      printf( $utility_text, $author, $categories_list );
      
      }
      static function nikado_entry_comments() {
      
      $date = sprintf( '<time class="entry-date" datetime="%3$s">%4$s</time>',
      esc_url( get_permalink() ),
      esc_attr( get_the_time() ),
      esc_attr( get_the_date( 'c' ) ),
      esc_html( get_the_date() )
      );
      
      $num_comments = (int)get_comments_number();
      $write_comments = '';
      if ( comments_open() ) {
      if ( $num_comments == 0 ) {
         $comments = wp_kses(__('<span>0</span> comments', 'nikado'), array('span'=>array()));
      } elseif ( $num_comments > 1 ) {
         $comments = '<span>'.$num_comments .'</span>'. esc_html__(' comments', 'nikado');
      } else {
         $comments = wp_kses(__('<span>1</span> comment', 'nikado'), array('span'=>array()));
      }
      $write_comments = '<a href="' . get_comments_link() .'">'. $comments.'</a>';
      }
      
      $utility_text = esc_html__( '%1$s', 'nikado' );
      
      printf( $utility_text, $write_comments );
      }
      /**
      * TGM-Plugin-Activation
      */
      function nikado_register_required_plugins() {
      
      $plugins = array(
      array(
         'name'               => esc_html__('Plazathemes Helper', 'nikado'),
         'slug'               => 'roadthemes-helper',
         'source'             => get_template_directory() . '/plugins/roadthemes-helper.zip',
         'required'           => true,
         'version'            => '1.0.0',
         'force_activation'   => false,
         'force_deactivation' => false,
         'external_url'       => '',
      ),
      array(
         'name'               => esc_html__('Mega Main Menu', 'nikado'),
         'slug'               => 'mega_main_menu',
         'source'             => get_template_directory() . '/plugins/mega_main_menu.zip',
         'required'           => true,
         'external_url'       => '',
      ),
      array(
         'name'               => esc_html__('Revolution Slider', 'nikado'),
         'slug'               => 'revslider',
         'source'             => get_template_directory() . '/plugins/revslider.zip',
         'required'           => true,
         'external_url'       => '',
      ),
      array(
         'name'               => 'Import Sample Data',
         'slug'               => 'road-importdata',
         'source'             => get_template_directory() . '/plugins/road-importdata.zip',
         'required'           => true,
         'external_url'       => '',
      ),
      array(
         'name'               => esc_html__('Visual Composer', 'nikado'),
         'slug'               => 'js_composer',
         'source'             => get_template_directory() . '/plugins/js_composer.zip',
         'required'           => true,
         'external_url'       => '',
      ),
      array(
         'name'               => esc_html__('Templatera', 'nikado'),
         'slug'               => 'templatera',
         'source'             => get_template_directory() . '/plugins/templatera.zip',
         'required'           => true,
         'external_url'       => '',
      ),
      array(
         'name'               => esc_html__('Essential Grid', 'nikado'),
         'slug'               => 'essential-grid',
         'source'             => get_template_directory() . '/plugins/essential-grid.zip',
         'required'           => true,
         'external_url'       => '',
      ),
       
      // Plugins from the WordPress Plugin Repository.
      array(
         'name'               => esc_html__('Redux Framework', 'nikado'),
         'slug'               => 'redux-framework',
         'required'           => true,
         'force_activation'   => false,
         'force_deactivation' => false,
      ),
      array(
         'name'      => esc_html__('Contact Form 7', 'nikado'),
         'slug'      => 'contact-form-7',
         'required'  => true,
      ),
       
      array(
         'name'      => esc_html__('Instagram Feed', 'nikado'),
         'slug'      => 'instagram-feed',
         'required'  => false,
      ),
      array(
         'name'      => esc_html__('Latest Tweets Widget', 'nikado'),
         'slug'      => 'latest-tweets-widget',
         'required'  => false,
      ),
      array(
         'name'      => esc_html__('WS Facebook Like Box Widget', 'nikado'),
         'slug'      => 'ws-facebook-likebox',
         'required'  => false,
      ),
      array(
         'name'      => 'MailChimp for WordPress',
         'slug'      => 'mailchimp-for-wp',
         'required'  => true,
      ),
      array(
         'name'      => esc_html__('Shortcodes Ultimate', 'nikado'),
         'slug'      => 'shortcodes-ultimate',
         'required'  => true,
      ),
      array(
         'name'      => esc_html__('Simple Local Avatars', 'nikado'),
         'slug'      => 'simple-local-avatars',
         'required'  => false,
      ),
      array(
         'name'      => esc_html__('Testimonials', 'nikado'),
         'slug'      => 'testimonials-by-woothemes',
         'required'  => true,
      ),
      array(
         'name'      => esc_html__('TinyMCE Advanced', 'nikado'),
         'slug'      => 'tinymce-advanced',
         'required'  => false,
      ),
      array(
         'name'      => esc_html__('Widget Importer & Exporter', 'nikado'),
         'slug'      => 'widget-importer-exporter',
         'required'  => false,
      ),
      array(
         'name'      => esc_html__('WooCommerce', 'nikado'),
         'slug'      => 'woocommerce',
         'required'  => true,
      ),
      array(
         'name'      => esc_html__('YITH WooCommerce Compare', 'nikado'),
         'slug'      => 'yith-woocommerce-compare',
         'required'  => false,
      ),
      array(
         'name'      => esc_html__('YITH WooCommerce Wishlist', 'nikado'),
         'slug'      => 'yith-woocommerce-wishlist',
         'required'  => false,
      ),
      array(
         'name'      => esc_html__('YITH WooCommerce Zoom Magnifier', 'nikado'),
         'slug'      => 'yith-woocommerce-zoom-magnifier',
         'required'  => false,
      ),
      );
      
      /**
      * Array of configuration settings. Amend each line as needed.
      * If you want the default strings to be available under your own theme domain,
      * leave the strings uncommented.
      * Some of the strings are added into a sprintf, so see the comments at the
      * end of each line for what each argument will be.
      */
      $config = array(
      'default_path' => '',                      // Default absolute path to pre-packaged plugins.
      'menu'         => 'tgmpa-install-plugins', // Menu slug.
      'has_notices'  => true,                    // Show admin notices or not.
      'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
      'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
      'is_automatic' => false,                   // Automatically activate plugins after installation or not.
      'message'      => '',                      // Message to output right before the plugins table.
      'strings'      => array(
         'page_title'                      => esc_html__( 'Install Required Plugins', 'nikado' ),
         'menu_title'                      => esc_html__( 'Install Plugins', 'nikado' ),
         'installing'                      => esc_html__( 'Installing Plugin: %s', 'nikado' ), // %s = plugin name.
         'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'nikado' ),
         'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'nikado' ), // %1$s = plugin name(s).
         'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'nikado' ), // %1$s = plugin name(s).
         'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'nikado' ), // %1$s = plugin name(s).
         'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'nikado' ), // %1$s = plugin name(s).
         'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'nikado' ), // %1$s = plugin name(s).
         'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'nikado' ), // %1$s = plugin name(s).
         'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'nikado' ), // %1$s = plugin name(s).
         'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'nikado' ), // %1$s = plugin name(s).
         'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'nikado' ),
         'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'nikado' ),
         'return'                          => esc_html__( 'Return to Required Plugins Installer', 'nikado' ),
         'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'nikado' ),
         'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'nikado' ), // %s = dashboard link.
         'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
      )
      );
      
      tgmpa( $plugins, $config );
      
      }
      }
      
      // Instantiate theme
      $Nikado_Class = new Nikado_Class();
      
      //Fix duplicate id of mega menu
      function nikado_mega_menu_id_change($params) {
      ob_start('nikado_mega_menu_id_change_call_back');
      }
      function nikado_mega_menu_id_change_call_back($html){
      //$html = preg_replace('/id="primary"/', 'id="mega_main_menu_first"', $html, 1);
      //$html = preg_replace('/id="main_ul-primary"/', 'id="mega_main_menu_ul_first"', $html, 1);
      
      return $html;
      }
      add_action('wp_loaded', 'nikado_mega_menu_id_change');
      
      function nikado_prefix_enqueue_script() { 
      $script = '<script type="text/javascript">
      var ajaxurl = "'.admin_url('admin-ajax.php').'";
      </script>';
      echo ''.$script; 
      }
      add_action( 'wp_enqueue_scripts', 'nikado_prefix_enqueue_script' ); 
      
      
      /*add_role(
       'supplier',
       __( 'Supplier' ),
       array(
      'read' => true, // true allows this capability
      'edit_posts' => true, // Allows user to edit their own posts
      'edit_pages' => true, // Allows user to edit pages
      'edit_others_posts' => true, // Allows user to edit others posts not just their own
      'create_posts' => true, // Allows user to create new posts
      'manage_categories' => true, // Allows user to manage post categories
      'publish_posts' => true, // Allows the user to publish, otherwise posts stays in draft mode
      'edit_themes' => true, // false denies this capability. User can’t edit your theme
      'install_plugins' => true, // User cant add new plugins
      'update_plugin' => true, // User can’t update any plugins
      'update_core' => false // user cant perform core updates
       )
      );*/
      
      
      /*function remove_menus(){
      
      if ( current_user_can( 'supplier' ) ) {
      remove_menu_page( 'index.php' );                  //Dashboard
      remove_menu_page( 'jetpack' );                    //Jetpack* 
      remove_menu_page( 'edit.php' );                   //Posts
      remove_menu_page( 'upload.php' );                 //Media
      remove_menu_page( 'edit.php?post_type=page' );    //Pages
      remove_menu_page( 'edit-comments.php' );          //Comments
      remove_menu_page( 'themes.php' );                 //Appearance
      remove_menu_page( 'plugins.php' );                //Plugins
      remove_menu_page( 'users.php' );                  //Users
      remove_menu_page( 'tools.php' );                  //Tools
      remove_menu_page( 'options-general.php' );        //Settings
      }
      }
      add_action( 'admin_menu', 'remove_menus' );*/
      
      // Display Fields
      add_action('woocommerce_product_options_general_product_data', 'woocommerce_product_custom_fields');
      
      // Save Fields
      add_action('woocommerce_process_product_meta', 'woocommerce_product_custom_fields_save');
      
      
     /* function woocommerce_product_custom_fields()
      {
       global $woocommerce, $post;
       echo '<div class="product_custom_field">';
       // Custom Product Text Field
       woocommerce_wp_text_input(
           array(
               'id' => '_product_brand_name',
               'placeholder' => 'Product Brand Name',
               'label' => __('Product Brand Name', 'woocommerce'),
               'desc_tip' => 'true'
           )
       );
      
        woocommerce_wp_text_input(
           array(
               'id' => '_product_model',
               'placeholder' => 'Product Model',
               'label' => __('Product Model', 'woocommerce'),
               'desc_tip' => 'true'
           ) 
       );
       //Custom Product Number Field
       woocommerce_wp_text_input(
           array(
               'id' => '_product_manufacturing_year ',
               'placeholder' => 'Product Manufacturing Year ',
               'label' => __('Product Manufacturing Year ', 'woocommerce'),
               'type' => 'number',
               'custom_attributes' => array(
                   'step' => 'any',
                   'min' => '0'
               )
           )
       );
      
      
      }
      
      function woocommerce_product_custom_fields_save($post_id)
      {
       // Custom Product Text Field
       $woocommerce_custom_product_text_field = $_POST['_product_brand_name'];
       print_r($woocommerce_custom_product_text_field);exit();
       if (!empty($woocommerce_custom_product_text_field))
           update_post_meta($post_id, '_product_brand_name', esc_attr($woocommerce_custom_product_text_field));
      // Custom Product Number Field
       $woocommerce_custom_product_number_field = $_POST['_product_model'];
       if (!empty($woocommerce_custom_product_number_field))
           update_post_meta($post_id, '_product_model', esc_attr($woocommerce_custom_product_number_field));
      // Custom Product Textarea Field
       $woocommerce_custom_procut_textarea = $_POST['_custom_product_textarea'];
       if (!empty($woocommerce_custom_procut_textarea))
           update_post_meta($post_id, '_custom_product_textarea', esc_html($woocommerce_custom_procut_textarea));
      
      }*/
      
      function displaymenu(){
      
                                 
      if ( has_nav_menu( 'primary' ) ) : ?>
         <style type="text/css">
.cust_nav_new{
   width: 100%;
}
.nav_search{
   width: 59%;
}
.width_full_nav{
   width: 100%;
}
.sroll_nav_search{
   width: 59%;
}
.width41{
width: 41%;
}
@media (min-width: 1024px) and (max-width:1199px) {
   .width_full_nav{
      width: 100%;
   }
   .nav_search {
    width: 49%;
   }
   .sroll_nav_search{
      width: 49%;
   }
   .width41{
   width: 51%;
   }
   
}
@media (min-width: 992px) and (max-width:1023px) {
   .width_full_nav{
      width: 100%;
   }
   .nav_search {
    width: 65%;
   }
   .sroll_nav_search{
      width: 50%;
   }
   .width41{
   width: 51%;
   }
   
}
@media (min-width: 768px) and (max-width:991px) {
   .width_full_nav{
      width: 100%;
   }
   .nav_search {
    width: 40%;
   }
   .sroll_nav_search{
      width: 55%;
   }
   .width41{
   width: 60%;
   }
   
}
</style>

      <?php //$_SERVER['SERVER_NAME'] ="www.teranex.io/beta-V*SRJ!-452656-230718" ?>
		<?php $_SERVER['SERVER_NAME'] =str_replace("/ecommerce","",site_url());?>
   <div class="navbar-fixed-top">
      <div class="container padd-0">
         <nav id="navigation" class="navbar navbar-default navbar-ex">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
               <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar "></span>
               <span class="icon-bar "></span>
               <span class="icon-bar "></span>
               </button>
               <a class="navbar-brand" style="padding-left: 0;" href="<?php echo $_SERVER['SERVER_NAME'];?>/">
               <img src="<?php echo get_template_directory_uri(); ?>/images/logo20.jpg" class="img-responsive">
               </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				<div class="ipad-menu ipro-menu">
					<div class="menu-center">
						
                  <ul class="nav navbar-nav navbar-nav-ex cust_nav_new" style="">
                       <li class="nav_search " style="padding-right: ;">
                              <form class="navbar-form menu-ico-mar">
                                 <div class="form-group" style="margin-bottom:0px;">
                                    <input type="text" class="form-control form-control-ser" placeholder="Search" style="" />
                                    <button type="submit" class="btn btn-link ser-icon"><span class="glyphicon glyphicon-search"> </span> </button>
                                 </div>
                              </form>
                       </li>
                       <li class="dropdown mrgn_lft">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Machine Market <span class="caret"></span></a>
                           <ul class="dropdown-menu multi-column columns-3 dropdown-menu-right">
                              <div class="">
                                 <div class="col-sm-3 padd-0">
                                    <ul class="multi-column-dropdown">
                                       <h5>Collaborate</h5>
                                       <li class="divider"></li>
                                       <li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/community/forum" target="">User Communities</a></li>
                                       <li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/groupbuying" target="">Collective Buyers</a></li>
                                       <!-- <li><a href="<?php echo site_url();?>xpertconnect" target="">Freelancer Groups</a></li> -->
                                       <li><a href="" target="">Exchanges Groups</a></li>
                                    </ul>
                                 </div>
                                 <div class="col-sm-3 padd-0">
                                    <ul class="multi-column-dropdown">
                                       <h5>Source</h5>
                                       <li class="divider"></li>
                                       <li><a href="<?php echo site_url()?>machine" target="">Machines</a></li>
                                       <!-- <li><a href="<?php echo site_url()?>automation" target="">Automation</a></li> -->
                                       <li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/ecommerce/product-category/toolings/" target=""> Toolings</a></li>
                                       <li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/ecommerce/product-category/spare-parts" target="">Spares</a></li>
                              
                                    </ul>
                                 </div>
                                 <div class="col-sm-3 padd-0">
                                    <ul class="multi-column-dropdown">
                                       <h5>Connect</h5>
                                       <li class="divider"></li>
                                       <li><a target="" href="<?php echo $_SERVER['SERVER_NAME'];?>/consultant">Machine Services</a></li>
                                       <li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/remoteapplication" target="">Application Support</a></li>
                                       <li><a target="" href="<?php echo $_SERVER['SERVER_NAME'];?>/remotetraining">Training Courses</a></li>
                                    </ul>
                                 </div>
                                 <div class="col-sm-3 padd-0">
                                    <ul class="multi-column-dropdown">
                                       <h5>Trust</h5>
                                       <li class="divider"></li>
                                       <li><a target="" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/market_intelligence">Market Intelligence</a></li>
                                       <li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/trade_services" target="">Trade Services</a></li>
                                       <li><a target="" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/customer_services">Customer Services</a></li>
                                    </ul>
                                 </div>
                              </div>
                           </ul>
                       </li>
                       <li class="dropdown">
                           <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">eFactory <span class="caret"> </span></a>
                           <ul class="dropdown-menu">
                              <li><a target="" href="<?php echo $_SERVER['SERVER_NAME'];?>/remotetraining/online_courses">Learn</a></li>
                              <li><a target="" href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/efactory_design">Design</a></li>
                              <li><a target="" href="<?php echo $_SERVER['SERVER_NAME'];?>/digitalmanufacturing">Produce</a></li>
                             
                           </ul>
                       </li>
                       

						      <div class="btn-group-ico">
									<?php 
										$current_user = wp_get_current_user();
										$user_name="";
										if(!empty($current_user))
										{
											$user_name=$current_user->display_name;
										}
									?>
									<div class="btn-group">
									  <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="<?php echo(is_user_logged_in()?$user_name.' | '.'Sign Out':'Sign in'); ?>" >
									  <img src="<?php echo get_template_directory_uri(); ?>/images/user.png">
									  </a>
										<ul class="dropdown-menu dropdown-menu-right ddl-user mob-ddl">
											<?php
											if(is_user_logged_in())
											{
											?>
												<li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/customer/profile">Dashboard</a></li>
												<li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/logout">Sign Out</a></li>
											<?php
											}
											else
											{
											?>	
												<li><a href="<?php echo $_SERVER['SERVER_NAME'];?>/pages/signIn">Sign In</a></li>
												<li class="divider"></li>
												<li class="socialAcc">
													<div class="col-sm-12">
													<h5>Continue with:</h5>
													<a target="_blank" href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
													<a target="_blank" href="https://twitter.com/TeranexRA"><i class="fa fa-twitter" aria-hidden="true"> </i> </a>
													<a target="_blank" href="https://www.linkedin.com/company/teranex-research-and-applications"> <i class="fa fa-linkedin" aria-hidden="true"></i></a>
													<a target="_blank" href="https://www.youtube.com/channel/UCNaXBz5Nz7bqYmNnIrUJVTw"><i class="fa fa-youtube" aria-hidden="true"></i></a>
													</div>
												</li>
											<?php
											}
											?>	
											<li class="agreement"> 
												<div class="form-group">
												   <div class="checkbox">
													  <label class="full-width pull-left">
														 <input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" checked disabled>I agree to Free Membership Agreement
													  </label>
													  <label class="full-width pull-left">
														 <input class="required" name="acceptPrivacy" id="acceptPrivacy" type="checkbox" checked disabled>I  agree to Receive Marketing Materials
													  </label>
												   </div>
												</div>
											</li>
										</ul>
									</div>
									<div class="btn-group">
									  <a href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="My Teranex">
									  <img src="<?php echo get_template_directory_uri(); ?>/images/lins.png">
									  </a>
									  <ul class="dropdown-menu dropdown-menu-right ddl-menu">
									  <li><a href="#">My Teranex</a></li>
									  <li class="divider"></li>
									  <li><a href="#">Message Center</a></li>
									  <li><a href="#">Manage RFQ</a></li>
									  <li><a href="#">My Orders</a></li>
									  <li><a href="#">My Accounts</a></li>
									  <li class="divider"></li>
									  <li><a class="full-width pull-left" href="#" >My Submit RFQ</a>
										<div class="col-sm-12 agreement">
										   <label class="full-width pull-left">Get multiple quotes within 24 hours!</label>
										</div>
									  </li>
									  </ul>
									</div>
									 <div class="btn-group">
                             <?php if ( class_exists( 'WC_Widget_Cart' ) ) {
                                  the_widget('Custom_WC_Widget_Cart');
                                             } ?>
                           </div>
								</div>
					
					</div>
               </div>
            </div>
         </nav>
      </div>
      <div class="clearfix"></div>
   </div>

   <?php endif;  
   }
   add_shortcode( 'displaymenu', 'displaymenu' );
   
   function my_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/images/logo-teranex.png);
      height:65px;
      width:320px;
      background-size: 320px 65px;
      background-repeat: no-repeat;
        padding-bottom: 30px;
        }
       body.login.login-action-login.wp-core-ui.locale-en-us {
    background: #fff;
}
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
