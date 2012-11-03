<?php
/**
 * Copious functions and definitions
 *
 * @package Copious
 * @since Copious 1.0
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * @since Copious 1.0
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'copious_setup' ) ):
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 *
 * @since Copious 1.0
 */
function copious_setup() {

	/**
	 * Custom template tags for this theme.
	 */
	require( get_template_directory() . '/inc/template-tags.php' );

	/**
	 * Custom functions that act independently of the theme templates
	 */
	//require( get_template_directory() . '/inc/tweaks.php' );

	/**
	 * Custom Theme Options
	 */
	//require( get_template_directory() . '/inc/theme-options/theme-options.php' );

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on Copious, use a find and replace
	 * to change 'copious' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'copious', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails
	 */
	add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'primary' => __( 'Primary Menu', 'copious' ),
	) );

	/**
	 * Add support for the Aside Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', ) );
}
endif; // copious_setup
add_action( 'after_setup_theme', 'copious_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Copious 1.0
 */
function copious_widgets_init() {
	register_sidebar( array(
		'name' => __( 'Sidebar', 'copious' ),
		'id' => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h1 class="widget-title">',
		'after_title' => '</h1>',
	) );
}
add_action( 'widgets_init', 'copious_widgets_init' );

/**
 * Enqueue scripts and styles
 */
function copious_scripts() {
	wp_enqueue_style( 'style', get_stylesheet_uri() );

	wp_enqueue_script( 'small-menu', get_template_directory_uri() . '/js/small-menu.js', array( 'jquery' ), '20120206', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'copious_scripts' );

/**
 * Implement the Custom Header feature
 */
//require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Create Creation Post Type
 */
register_post_type('creations', array(	'label' => 'Creations','description' => 'Things made throughout the years.','public' => true,'show_ui' => true,'show_in_menu' => true,'capability_type' => 'post','hierarchical' => false,'rewrite' => array('slug' => ''),'query_var' => true,'has_archive' => true,'exclude_from_search' => false,'menu_position' => 5,'supports' => array('title','editor','trackbacks','custom-fields','comments','revisions','thumbnail','author',),'taxonomies' => array('post_tag','disciplines',),'labels' => array (
  'name' => 'Creations',
  'singular_name' => 'Creation',
  'menu_name' => 'Creations',
  'add_new' => 'Add Creation',
  'add_new_item' => 'Add New Creation',
  'edit' => 'Edit',
  'edit_item' => 'Edit Creation',
  'new_item' => 'New Creation',
  'view' => 'View Creation',
  'view_item' => 'View Creation',
  'search_items' => 'Search Creations',
  'not_found' => 'No Creations Found',
  'not_found_in_trash' => 'No Creations Found in Trash',
  'parent' => 'Parent Creation',
),) );

// Define icon styles for the custom post type
function copious_creations_icons() {
	?>
<style type="text/css" media="screen">
        #menu-posts-creations .wp-menu-image {
            background: url(<?php bloginfo('template_url') ?>/images/creations-icon.png) no-repeat 6px -32px !important;
        }
        #menu-posts-creations:hover .wp-menu-image, #menu-posts-creations.wp-has-current-submenu .wp-menu-image {
            background-position:6px 0px !important;
        }
        #icon-edit.icon32-posts-creations {background: url(<?php bloginfo('template_url') ?>/images/creations-icon-32x32.png) no-repeat;}
    </style>

<?php }
add_action( 'admin_head', 'copious_creations_icons' );

/**
 * Create Discipline & Role Taxonomies
 */
register_taxonomy('disciplines',array (
  0 => 'creations',
),array( 'hierarchical' => true, 'label' => 'Disciplines','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => ''),'singular_label' => 'Discipline') );
register_taxonomy('roles',array (
  0 => 'creations',
),array( 'hierarchical' => false, 'label' => 'Roles','show_ui' => true,'query_var' => true,'rewrite' => array('slug' => ''),'singular_label' => 'Role') );

/**
 * Register field groups specific to Disciplines
 */

if(function_exists("register_field_group"))
{
	register_field_group(array (
		'id' => '509583430ccc8',
		'title' => 'Discipline Fields',
		'fields' => 
		array (
			0 => 
			array (
				'label' => 'Discipline Icon',
				'name' => 'discipline_icon',
				'type' => 'image',
				'instructions' => '90 x 90 px icon to represent this Discipline (will be scaled to 10 x 10 for menus)',
				'required' => '0',
				'save_format' => 'object',
				'preview_size' => 'thumbnail',
				'key' => 'field_50958337cc24e',
				'order_no' => '0',
			),
			1 => 
			array (
				'label' => 'Short Name',
				'name' => 'discipline_short_name',
				'type' => 'text',
				'instructions' => 'eg. Film',
				'required' => '1',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50958337cc5c5',
				'order_no' => '1',
			),
			2 => 
			array (
				'label' => 'Long Name',
				'name' => 'discipline_long_name',
				'type' => 'text',
				'instructions' => 'eg. Film & Video',
				'required' => '1',
				'default_value' => '',
				'formatting' => 'none',
				'key' => 'field_50958337cc81a',
				'order_no' => '2',
			),
			3 => 
			array (
				'label' => 'Short Description',
				'name' => 'discipline_short_description',
				'type' => 'text',
				'instructions' => 'One sentence, no more than 72 characters.',
				'required' => '1',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_50958337cca42',
				'order_no' => '3',
			),
			4 => 
			array (
				'label' => 'Long Description',
				'name' => 'discipline_long_description',
				'type' => 'textarea',
				'instructions' => 'Not too much, maybe two sentences.',
				'required' => '0',
				'default_value' => '',
				'formatting' => 'html',
				'key' => 'field_50958337cccdc',
				'order_no' => '4',
			),
			5 => 
			array (
				'label' => 'Recent Items Name',
				'name' => 'discipline_recent_items_name',
				'type' => 'text',
				'instructions' => 'eg. “Clips” would display “Recent Clips”',
				'required' => '0',
				'default_value' => 'Items',
				'formatting' => 'none',
				'key' => 'field_50958337cd2c1',
				'order_no' => '5',
			),
		),
		'location' => 
		array (
			'rules' => 
			array (
				0 => 
				array (
					'param' => 'ef_taxonomy',
					'operator' => '==',
					'value' => 'disciplines',
					'order_no' => '0',
				),
			),
			'allorany' => 'all',
		),
		'options' => 
		array (
			'position' => 'normal',
			'layout' => 'no_box',
			'hide_on_screen' => 
			array (
			),
		),
		'menu_order' => 0,
	));
}
/**
 * Hide ACF menu item from the admin menus
 */
 
function hide_admin_menu()
{
	global $current_user;
	get_currentuserinfo();
 
	if($current_user->user_login != 'evanpayne')
	{
		echo '<style type="text/css">#toplevel_page_edit-post_type-acf{display:none;}</style>';
	}
}
 
add_action('admin_head', 'hide_admin_menu');
