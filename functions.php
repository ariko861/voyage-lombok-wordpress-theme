<?php

/////// to allow post thumbnails ///////

add_theme_support( 'post-thumbnails' );

//set_post_thumbnail_size(500, 350);

add_filter('the_content', 'strip_images',2);

function strip_images($content){
	if ( is_archive() ){
		return preg_replace('/<img[^>]+./','',$content);
	} else {
		return $content;
	}

}

// Change le texte du "more..."
function modify_read_more_link() {
    return '<a class="more-link" href="' . get_permalink() . '">En savoir plus</a>';
}
add_filter( 'the_content_more_link', 'modify_read_more_link' );

////// to force install or to recommend external plugins /////


require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'mytheme_require_plugins' );

function mytheme_require_plugins() {

    $plugins = array( 
	    array(
			'name'      => 'Categories Images',
			'slug'      => 'categories-images',
			'required'  => true, // this plugin is mandatory
		),
		array(
			'name'      => 'Poylang',
			'slug'      => 'polylang',
			'required'  => true, // this plugin is mandatory
		),
	);
    $config = array( /* The array to configure TGM Plugin Activation */ );

    tgmpa( $plugins, $config );

}

////////////////////////////////////// /////////////////


////////// to register custom menu ///////////////////

// Register custom navigation menus

function custom_nav_menus() {

	$locations = array(
		'mainmenu' => __( 'mainmenu', 'mainmenu' ),
		'footer' => __( 'footer', 'footer' )
	);
	register_nav_menus( $locations );

}
add_action( 'init', 'custom_nav_menus' );


///// custom menu example @ https://digwp.com/2011/11/html-formatting-custom-menus/
/*
function clean_custom_menus() {
	$menu_name = 'mainmenu'; // specify custom menu slug
	if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
		$menu = wp_get_nav_menu_object($locations[$menu_name]);
		$menu_items = wp_get_nav_menu_items($menu->term_id);

		$menu_list = '';
		$menu_list .= '<ul>' ."\n";
		foreach ((array) $menu_items as $key => $menu_item) {
			$title = $menu_item->title;
			$url = $menu_item->url;
			$menu_list .= "\t\t\t\t\t". '<li><a href="'. $url .'">'. $title .'</a></li>' ."\n";
		}
		$menu_list .= '</ul>' ."\n";
		
	} else {
		// $menu_list = '<!-- no list defined -->';
	}
	echo $menu_list;
}*/

////////////////////////////////////////////////////////////


add_action( 'customize_register', 'mytheme_customize_register' );


function mytheme_customize_register( $wp_customize ) {
   //All our sections, settings, and controls will be added here



///////////// POUR PERSONNALISER FOOTER ////////////////////

$wp_customize->add_section( 'footer' , array(
    'title'      => __( 'Footer', 'mytheme' ),
    'priority'   => 40,
) );

$wp_customize->add_setting( 'footer_line_1', array(
	'default'        => '',
) );

$wp_customize->add_control( 'footer_line_1', array(
	'label'   => 'Footer 1st line ',
	'section' => 'footer',
	'type'    => 'text',
) );

$wp_customize->add_setting( 'footer_line_2', array(
	'default'        => '',
) );

$wp_customize->add_control( 'footer_line_2', array(
	'label'   => 'Footer 2nd line',
	'section' => 'footer',
	'type'    => 'text',
) );

$wp_customize->add_setting( 'footer_line_3', array(
	'default'        => '',
) );

$wp_customize->add_control( 'footer_line_3', array(
	'label'   => 'Footer 3rd line',
	'section' => 'footer',
	'type'    => 'text',
) );
$wp_customize->add_setting( 'footer_line_4', array(
	'default'        => '',
) );

$wp_customize->add_control( 'footer_line_4', array(
	'label'   => 'Footer 4th line',
	'section' => 'footer',
	'type'    => 'text',
) );







//////// POUR CREER LA PERSONNALISATION DU HEADER FRONT-PAGE /////////////

$wp_customize->add_section( 'header_customization' , array(
    'title'      => __( 'Header Customization', 'mytheme' ),
    'priority'   => 30,
) );


$i = 1;

while ($i <= 5 ) {

	$wp_customize->add_setting( 'background_image_'.$i , array(
	    'default'   => null,
	    'transport' => 'refresh',
	) );
	/*
	$wp_customize->add_setting( 'background_image_'.$i.'position' , array(
	    'default'   => '',
	    'transport' => 'refresh',
	) );
	*/
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'background_image_'.$i, array(
		'label'      => __( 'Background Image '.$i, 'mytheme' ),
		'section'    => 'header_customization',
		'settings'   => 'background_image_'.$i,
	) ) );
	/*
	$wp_customize->add_control( new WP_Customize_Header_Image_Control( $wp_customize, 'background_image_'.$i, array(
		'label'      => __( 'Background Image '.$i, 'mytheme' ),
		'section'    => 'header_customization',
		'settings'   => 'background_image_'.$i.'position',
	) ) );
	*/
	$i++;
}

///////////////////////////////////////////////////////////////

////////////////// POUR CREER UN BANDEAU DE POSTS FEATURED DANS LA PAGE D'ACCUEIL /////////////////

$wp_customize->add_section( 'bandeau_posts' , array(
    'title'      => __( 'Bandeau Posts', 'mytheme' ),
    'priority'   => 40,
) );

$wp_customize->add_setting( 'bandeau_post' , array(
    'default'   => 1,
    'transport' => 'refresh',
) );

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'bandeau_post', array(
    'settings' => 'bandeau_post',
    'label'    => __( 'Afficher le bandeau des posts préférés' ),
    'section'  => 'bandeau_posts',
    'type'     => 'checkbox',
) ) );

$wp_customize->add_setting( 'bandeau_post_cat', array(
	'default'        => null,
) );

$wp_customize->add_control( 'bandeau_post_cat', array(
	'label'   => 'Numéro de la catégorie à afficher',
	'section' => 'bandeau_posts',
	'type'    => 'number',
) );
	


///////////////////////////////////////////////////////////////////////////////////




//////////////////////////// POUR PERSONNALISER LE MENU DU FRONT-PAGE IMAGES CIRCULAIRES ///////////////

$wp_customize->add_panel( 'circular_images_customization' , array(
    'title'      => __( 'Circular Images Customization', 'mytheme' ),
    'priority'   => 35,
) );


$wp_customize->add_setting( 'circular_images' , array(
    'default'   => 1,
    'transport' => 'refresh',
) );

$wp_customize->add_section( 'general' , array(
    'title'      => __( 'Global', 'mytheme' ),
    'priority'   => 0,
    'panel'	 => 'circular_images_customization',
) );


$i = 1;

$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'circular_images', array(
    'settings' => 'circular_images',
    'label'    => __( 'Afficher les liens circulaires' ),
    'section'  => 'general',
    'type'     => 'checkbox',
) ) );

while ($i <= 6 ) {

	$wp_customize->add_section( 'circular_image_'.$i , array(
	    'title'      => __( 'Circular Image '.$i, 'mytheme' ),
	    'priority'   => $i,
	    'panel'	 => 'circular_images_customization',
	) );

	$wp_customize->add_setting( 'circular_image_'.$i , array(
	    'default'   => null,
	    'transport' => 'refresh',
	) );
	
	
	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'circular_image_'.$i, array(
		'label'      => __( 'Circular Image '.$i, 'mytheme' ),
		'section'    => 'circular_image_'.$i,
		'settings'   => 'circular_image_'.$i,
	) ) );
	
	$wp_customize->add_setting( 'title_image_'.$i, array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'title_image_'.$i, array(
		'label'   => 'Title of image '.$i,
		'section' => 'circular_image_'.$i,
		'type'    => 'text',
	) );
	
	$wp_customize->add_setting( 'link_image_'.$i, array(
		'default'        => '',
	) );

	$wp_customize->add_control( 'link_image_'.$i, array(
		'label'   => 'Link of image '.$i,
		'section' => 'circular_image_'.$i,
		'type'    => 'text',
	) );

	
	
	$i++;
}

////////////////////////////////////////////////////////////////////////////////////////////////////////

}

//////////////to add custom CSS in wordpress Editor

function wpb_mce_buttons_2($buttons) {
    array_unshift($buttons, 'styleselect');
    return $buttons;
}
add_filter('mce_buttons_2', 'wpb_mce_buttons_2');


/*
* Callback function to filter the MCE settings
*/

function my_mce_before_init_insert_formats( $init_array ) {  
 
// Define the style_formats array
 
    $style_formats = array(  
        array(  
            'title' => 'Content Block',  
            'block' => 'span',  
            'classes' => 'content-block',
            'wrapper' => true, 
        ),  
    );  
    // Insert the array, JSON ENCODED, into 'style_formats'
    $init_array['style_formats'] = json_encode( $style_formats );  
     
    return $init_array;  
   
} 
// Attach callback to 'tiny_mce_before_init' 
add_filter( 'tiny_mce_before_init', 'my_mce_before_init_insert_formats' ); 


function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );
///////////////////////////////////////////////////

//this is to add a custom javascript file and insert a php object in it

wp_enqueue_script('my_custom_javascript', get_template_directory_uri() . '/js/headSlider.js', array('jquery'), null, true);


function myprefix_load_css_and_js() {
    wp_enqueue_style( 'style', get_stylesheet_uri() );
}
add_action( 'wp_enqueue_scripts', 'myprefix_load_css_and_js' );

// For featured images
add_theme_support( 'post-thumbnails' );




////////////// TRANSLATIONS //////////////////
if ( function_exists('pll_register_string') ) {
	pll_register_string('Featured posts title', 'Nos coups de coeur');
	pll_register_string('Offers banner title', 'Nous proposons');
	pll_register_string('category-filter-title', 'Filtrer les résultats');
	pll_register_string('category-filter-explanation', 'Pour affiner votre recherche, cliquez sur les images ci-dessous et sélectionnez une ou plusieurs catégories');
	pll_register_string('no-post', 'Veuillez nous excuser, aucun post ne correspond à votre recherche');
	pll_register_string('contact-button', 'Nous contacter');
	pll_register_string('footer-en-tete', 'Notre société');
	
}


////////////// For date field in contact forms //////////////////
add_filter( 'wpcf7_support_html5_fallback', '__return_true' );



?>
