<?php
//Shortcodes for Visual Composer

add_action( 'vc_before_init', 'nikado_vc_shortcodes' );
function nikado_vc_shortcodes() {
	
	//Site logo
	vc_map( array(
		'name' => esc_html__( 'Logo', 'nikado'),
		'base' => 'roadlogo',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Logo Link?', 'nikado' ),
				'param_name' => 'logo_link',
				'value' => array(
					'Yes'	=> 'yes',
					'No'	=> 'no',
				),
			),
		)
	) );

	//Main Menu
	vc_map( array(
		'name' => esc_html__( 'Main Menu', 'nikado'),
		'base' => 'roadmainmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Upload sticky logo image', 'nikado' ),
				'param_name' => 'sticky_logoimage',
				'value' => '',
			),
		)
	) );

	//Categories Menu
	vc_map( array(
		'name' => esc_html__( 'Categories Menu', 'nikado'),
		'base' => 'roadcategoriesmenu',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
		)
	) );

	//Language Currency Switcher
	vc_map( array(
		'name' => esc_html__( 'Language, Currency Switcher', 'nikado'),
		'base' => 'roadlangswitch',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
		)
	) );

	//Social Icons
	vc_map( array(
		'name' => esc_html__( 'Social Icons', 'nikado'),
		'base' => 'roadsocialicons',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
		)
	) );

	//Mini Cart
	vc_map( array(
		'name' => esc_html__( 'Mini Cart', 'nikado'),
		'base' => 'roadminicart',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
		)
	) );

	//Products Search
	vc_map( array(
		'name' => esc_html__( 'Product Search', 'nikado'),
		'base' => 'roadproductssearch',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
		)
	) );

	//Copyright
	vc_map( array(
		'name' => esc_html__( 'Copyright information', 'nikado'),
		'base' => 'roadcopyright',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
		)
	) );
	//Brand logos
	vc_map( array(
		'name' => esc_html__( 'Brand Logos', 'nikado' ),
		'base' => 'ourbrands',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'nikado' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '6', 'nikado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'nikado' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			),
		)
	) );

	//popular category
	vc_map( array(
		"name" => esc_html__( "Popular Categories", "nikado" ),
		"base" => "popular_categories",
		"class" => "",
		"category" => esc_html__( "Theme", "nikado"),
		"params" => array(
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Category slug", "nikado" ),
				"param_name" => "category",
				"value" => "",
			),
			array(
				"type" => "textfield",
				"holder" => "div",
				"class" => "",
				"heading" => esc_html__( "Thumbnail URL", "nikado" ),
				"param_name" => "image",
				"value" => "",
			),
		)
	) );

	//Categories carousel
	vc_map( array(
		'name' => esc_html__( 'Categories Carousel', 'nikado' ),
		'base' => 'categoriescarousel',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'nikado' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '6', 'nikado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'nikado' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			),
		)
	) );
	
	//MailPoet Newsletter Form
	vc_map( array(
		'name' => esc_html__( 'Newsletter Form (MailPoet)', 'nikado' ),
		'base' => 'wysija_form',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Form ID', 'nikado' ),
				'param_name' => 'id',
				'value' => '',
				'description' => esc_html__( 'Enter form ID here', 'nikado' ),
			),
		)
	) );
	
	//Latest posts
	vc_map( array(
		'name' => esc_html__( 'Latest posts', 'nikado' ),
		'base' => 'latestposts',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of posts', 'nikado' ),
				'param_name' => 'posts_per_page',
				'value' => esc_html__( '5', 'nikado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Image scale', 'nikado' ),
				'param_name' => 'image',
				'value' => array(
						'Wide'	=> 'wide',
						'Square'	=> 'square',
					),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Excerpt length', 'nikado' ),
				'param_name' => 'length',
				'value' => esc_html__( '20', 'nikado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of columns', 'nikado' ),
				'param_name' => 'colsnumber',
				'value' => esc_html__( '4', 'nikado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of rows', 'nikado' ),
				'param_name' => 'rowsnumber',
				'value' => array(
						'1'	=> '1',
						'2'	=> '2',
						'3'	=> '3',
						'4'	=> '4',
					),
			),
		)
	) );
	
	//Testimonials
	vc_map( array(
		'name' => esc_html__( 'Testimonials', 'nikado' ),
		'base' => 'woothemes_testimonials',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number of testimonial', 'nikado' ),
				'param_name' => 'limit',
				'value' => esc_html__( '10', 'nikado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Author', 'nikado' ),
				'param_name' => 'display_author',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display Avatar', 'nikado' ),
				'param_name' => 'display_avatar',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Avatar image size', 'nikado' ),
				'param_name' => 'size',
				'value' => '',
				'description' => esc_html__( 'Avatar image size in pixels. Default is 50', 'nikado' ),
			),
			array(
				'type' => 'dropdown',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Display URL', 'nikado' ),
				'param_name' => 'display_url',
				'value' => array(
					'Yes'	=> 'true',
					'No'	=> 'false',
				),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Category', 'nikado' ),
				'param_name' => 'category',
				'value' => esc_html__( '0', 'nikado' ),
				'description' => esc_html__( 'ID/slug of the category. Default is 0', 'nikado' ),
			),
		)
	) );
	
	
	//Rotating tweets
	vc_map( array(
		'name' => esc_html__( 'Rotating tweets', 'nikado' ),
		'base' => 'rotatingtweets',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Twitter user name', 'nikado' ),
				'param_name' => 'screen_name',
				'value' => '',
			),
		)
	) );

	//Twitter feed
	vc_map( array(
		'name' => esc_html__( 'Twitter feed', 'nikado' ),
		'base' => 'AIGetTwitterFeeds',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Your Twitter Name(Without the "@" symbol)', 'nikado' ),
				'param_name' => 'ai_username',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number Of Tweets', 'nikado' ),
				'param_name' => 'ai_numberoftweets',
				'value' => '',
			),
			// array(
			// 	'type' => 'textfield',
			// 	'holder' => 'div',
			// 	'class' => '',
			// 	'heading' => esc_html__( 'Your Title', 'nikado' ),
			// 	'param_name' => 'ai_tweet_title',
			// 	'value' => '',
			// ),
		)
	) );
	
	//Google map
	vc_map( array(
		'name' => esc_html__( 'Google map', 'nikado' ),
		'base' => 'nikado_map',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Map Height', 'nikado' ),
				'param_name' => 'map_height',
				'value' => esc_html__( '400', 'nikado' ),
				'description' => esc_html__( 'Map height in pixels. Default is 400', 'nikado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Map Zoom', 'nikado' ),
				'param_name' => 'map_zoom',
				'value' => esc_html__( '17', 'nikado' ),
				'description' => esc_html__( 'Map zoom level, min 0, max 21. Default is 17', 'nikado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'nikado' ),
				'param_name' => 'lat1',
				'value' => '',
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'nikado' ),
				'param_name' => 'long1',
				'value' => '',
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'nikado' ),
				'param_name' => 'address1',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'nikado' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'nikado' ),
				'param_name' => 'marker1',
				'value' => '',
				'description' => esc_html__( 'Upload marker image, image size: 40x46 px', 'nikado' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'nikado' ),
				'param_name' => 'description1',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, h1, h2, h3', 'nikado' ),
				'group' => 'Marker 1'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'nikado' ),
				'param_name' => 'lat2',
				'value' => '',
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'nikado' ),
				'param_name' => 'long2',
				'value' => '',
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'nikado' ),
				'param_name' => 'address2',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'nikado' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'nikado' ),
				'param_name' => 'marker2',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'nikado' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'nikado' ),
				'param_name' => 'description2',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h2, h2, h3', 'nikado' ),
				'group' => 'Marker 2'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'nikado' ),
				'param_name' => 'lat3',
				'value' => '',
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'nikado' ),
				'param_name' => 'long3',
				'value' => '',
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'nikado' ),
				'param_name' => 'address3',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'nikado' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'nikado' ),
				'param_name' => 'marker3',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'nikado' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'nikado' ),
				'param_name' => 'description3',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h3, h3, h3', 'nikado' ),
				'group' => 'Marker 3'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'nikado' ),
				'param_name' => 'lat4',
				'value' => '',
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'nikado' ),
				'param_name' => 'long4',
				'value' => '',
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'nikado' ),
				'param_name' => 'address4',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'nikado' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'nikado' ),
				'param_name' => 'marker4',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'nikado' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'nikado' ),
				'param_name' => 'description4',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h4, h4, h4', 'nikado' ),
				'group' => 'Marker 4'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Latitude', 'nikado' ),
				'param_name' => 'lat5',
				'value' => '',
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Longtitude', 'nikado' ),
				'param_name' => 'long5',
				'value' => '',
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Address', 'nikado' ),
				'param_name' => 'address5',
				'value' => '',
				'description' => esc_html__( 'If you donot enter coordinate, enter address here', 'nikado' ),
				'group' => 'Marker 5'
			),
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Marker image', 'nikado' ),
				'param_name' => 'marker5',
				'value' => '',
				'description' => esc_html__( 'Upload marker image', 'nikado' ),
				'group' => 'Marker 5'
			),
			array(
				'type' => 'textarea',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Description', 'nikado' ),
				'param_name' => 'description5',
				'value' => '',
				'description' => esc_html__( 'Allowed HTML tags: a, i, em, br, strong, p, h5, h5, h5', 'nikado' ),
				'group' => 'Marker 5'
			),
		)
	) );
	
	//Counter
	vc_map( array(
		'name' => esc_html__( 'Counter', 'nikado' ),
		'base' => 'nikado_counter',
		'class' => '',
		'category' => esc_html__( 'Theme', 'nikado'),
		'params' => array(
			array(
				'type' => 'attach_image',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Image icon', 'nikado' ),
				'param_name' => 'image',
				'value' => '',
				'description' => esc_html__( 'Upload icon image', 'nikado' ),
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Number', 'nikado' ),
				'param_name' => 'number',
				'value' => '',
			),
			array(
				'type' => 'textfield',
				'holder' => 'div',
				'class' => '',
				'heading' => esc_html__( 'Text', 'nikado' ),
				'param_name' => 'text',
				'value' => '',
			),
		)
	) );
}
?>