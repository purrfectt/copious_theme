<?php /**
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
 * Register field groups for Categories (our custom color bands)
 */

if(function_exists("register_field_group"))
{
  register_field_group(array (
    'id' => '5095a0ebb97ca',
    'title' => 'Post Category Fields',
    'fields' => 
    array (
      0 => 
      array (
        'label' => 'Custom Color',
        'name' => 'custom_color',
        'type' => 'color_picker',
        'instructions' => 'This is the Custom Color for the Blog bands under the primary content.',
        'required' => '0',
        'default_value' => '#eee',
        'key' => 'field_5095a0e2b4e3c',
        'order_no' => '0',
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
          'value' => 'category',
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