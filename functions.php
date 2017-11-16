<?php
/**
 * Minus Plus Est functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Minus_Plus_Est
 */

if ( ! function_exists( 'minus_plus_est_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function minus_plus_est_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Minus Plus Est, use a find and replace
		 * to change 'minus-plus-est' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'minus-plus-est', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'minus-plus-est' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'minus_plus_est_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'minus_plus_est_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function minus_plus_est_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'minus_plus_est_content_width', 640 );
}
add_action( 'after_setup_theme', 'minus_plus_est_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function minus_plus_est_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'minus-plus-est' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'minus-plus-est' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'minus_plus_est_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function minus_plus_est_scripts() {
	wp_enqueue_style( 'minus-plus-est-style', get_stylesheet_uri() );
		
	wp_enqueue_script( 'lazysizes-js', get_template_directory_uri() . '/js/lazysizes.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'imagesloaded-js', get_template_directory_uri() . '/js/imagesloaded.min.js', array('jquery'), '20151215', true );
	
	wp_enqueue_script( 'stickykit-js', get_template_directory_uri() . '/js/sticky-kit.min.js', array('jquery'), '20151215', true );

    wp_enqueue_script( 'fluidvids-js', get_template_directory_uri() . '/js/fitvids.min.js', array('jquery'), '20151215', true );

	if ( ! is_admin() && is_singular() ) { // if single post and not admin page
		wp_enqueue_script( 'chocolat-js', get_template_directory_uri() . '/js/chocolat.min.js', array('jquery'), '20151215', true );
	}    
	
	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery'), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'minus_plus_est_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// remove emoji junk from header
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );

// custom post types
function custom_post_type() {
 
// Set UI labels for Custom Post Type
    $labels = array(
        'name'                => _x( 'Portfolio', 'Post Type General Name', 'minus-plus-est' ),
        'singular_name'       => _x( 'Portfolio Item', 'Post Type Singular Name', 'minus-plus-est' ),
        'menu_name'           => __( 'Portfolio', 'minus-plus-est' ),
        'parent_item_colon'   => __( 'Parent Portfolio Item', 'minus-plus-est' ),
        'all_items'           => __( 'All Portfolio', 'minus-plus-est' ),
        'view_item'           => __( 'View Portfolio Item', 'minus-plus-est' ),
        'add_new_item'        => __( 'Add New Portfolio Item', 'minus-plus-est' ),
        'add_new'             => __( 'Add New', 'minus-plus-est' ),
        'edit_item'           => __( 'Edit Portfolio Item', 'minus-plus-est' ),
        'update_item'         => __( 'Update Portfolio Item', 'minus-plus-est' ),
        'search_items'        => __( 'Search Portfolio Item', 'minus-plus-est' ),
        'not_found'           => __( 'Not Found', 'minus-plus-est' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'minus-plus-est' ),
    );
     
// Set other options for Custom Post Type
     
    $args = array(
        'label'               => __( 'Portfolio', 'minus-plus-est' ),
        'description'         => __( 'Portfolio Item', 'minus-plus-est' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
        'hierarchical'        => false,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
         
        // This is where we add taxonomies to our CPT
        'taxonomies' => array( 'category' ),
    );
     
    // Registering your Custom Post Type
    register_post_type( 'Portfolio', $args );
 
}
 
/* Hook into the 'init' action so that the function
* Containing our post type registration is not 
* unnecessarily executed. 
*/
 
add_action( 'init', 'custom_post_type', 0 );




 
 // change markup of responsize images for lazysizes.js
 add_filter( 'wp_get_attachment_image_attributes', 'gs_change_attachment_image_markup' );
/**
 * Change src and srcset to data-src and data-srcset, and add class 'lazyload'
 * @param $attributes
 * @return mixed
 */
function gs_change_attachment_image_markup($attributes){

    if (isset($attributes['src'])) {
        
        $attributes['data-src'] = $attributes['src'];
        $attributes['src']      = ''; //could add default small image or a base64 encoded small image here
        
    }
    
    if (isset($attributes['srcset'])) {
        
        $attributes['data-srcset'] = $attributes['srcset'];
        $attributes['srcset'] = '';
        
    }
    
    $attributes['class'] .= ' lazyload';
    return $attributes;

}




// add custom image sizes for theme


//add_image_size( 'articlePortrait', 696, 928, true );
add_image_size( 'item-image-small', 600, 9999, false );
add_image_size( 'item-image-med', 900, 9999, false );
add_image_size( 'item-image-large', 1200, 9999, false );
add_image_size( 'item-image-huge', 1700, 9999, false );


// theme options
add_action( 'admin_menu', 'mpe_add_admin_menu' );
add_action( 'admin_init', 'mpe_settings_init' );


function mpe_add_admin_menu(  ) { 

	add_options_page( 'Minus Plus Est', 'Minus Plus Est', 'manage_options', 'minus_plus_est', 'mpe_options_page' );

}


function mpe_settings_init(  ) { 

	register_setting( 'pluginPage', 'mpe_settings' );

	add_settings_section(
		'mpe_pluginPage_section', 
		__( 'Your section description', 'minus-plus-est' ), 
		'mpe_settings_section_callback', 
		'pluginPage'
	);

	add_settings_field( 
		'mpe_text_field_0', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_0_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_textarea_field_1', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_textarea_field_1_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_text_field_2', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_2_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_text_field_3', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_3_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_text_field_4', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_4_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_text_field_5', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_5_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_text_field_6', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_6_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_text_field_7', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_7_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);

	add_settings_field( 
		'mpe_text_field_8', 
		__( 'Settings field description', 'minus-plus-est' ), 
		'mpe_text_field_8_render', 
		'pluginPage', 
		'mpe_pluginPage_section' 
	);


}


function mpe_text_field_0_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_0]' value='<?php echo $options['mpe_text_field_0']; ?>'>
	<?php

}


function mpe_textarea_field_1_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<textarea cols='40' rows='5' name='mpe_settings[mpe_textarea_field_1]'><?php echo $options['mpe_textarea_field_1']; ?></textarea>
	<?php

}


function mpe_text_field_2_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_2]' value='<?php echo $options['mpe_text_field_2']; ?>'>
	<?php

}


function mpe_text_field_3_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_3]' value='<?php echo $options['mpe_text_field_3']; ?>'>
	<?php

}


function mpe_text_field_4_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_4]' value='<?php echo $options['mpe_text_field_4']; ?>'>
	<?php

}


function mpe_text_field_5_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_5]' value='<?php echo $options['mpe_text_field_5']; ?>'>
	<?php

}


function mpe_text_field_6_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_6]' value='<?php echo $options['mpe_text_field_6']; ?>'>
	<?php

}


function mpe_text_field_7_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_7]' value='<?php echo $options['mpe_text_field_7']; ?>'>
	<?php

}


function mpe_text_field_8_render(  ) { 

	$options = get_option( 'mpe_settings' );
	?>
	<input type='text' name='mpe_settings[mpe_text_field_8]' value='<?php echo $options['mpe_text_field_8']; ?>'>
	<?php

}


function mpe_settings_section_callback(  ) { 

	echo __( 'This section description', 'minus-plus-est' );

}


function mpe_options_page(  ) { 

	?>
	<form action='options.php' method='post'>

		<h2>Minus Plus Est</h2>

		<?php
		settings_fields( 'pluginPage' );
		do_settings_sections( 'pluginPage' );
		submit_button();
		?>

	</form>
	<?php

}

?>